<?php

class EventsController extends AppController{
	
	var $uses = array("Event","Band");

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');		
    }

    public function isAuthorized($user) {
    	return true;
    }

    public function index(){
        $events = array();
        $eventsAll = $this->Event->find("all");// a faire propre.
        foreach ($eventsAll as $event){
            $push = true;
            foreach ($event["Band"] as $band) {
                if ($band['id'] == AuthComponent::user('id')) {
                    $push = false;
                }
            }
            if($push)
                array_push($events, $event);
        }
        $myEvents = $this->Band->findById(AuthComponent::user('id'));
    	$this->set("events",$events);
    	$this->set("myEvents",$myEvents);
    }

    public function apply($event_id){
    	$this->request->data['Event']['id'] = $event_id;
    	$this->request->data['Band']['id'] = AuthComponent::user('id');
		if($this->Event->saveAll($this->request->data))
		{
			$this->redirect(array("action" => "index"));
			$this->Session->setFlash("OK");

		}
		else
			$this->Session->setFlash("KO");
	}

    public function unapply($event_id){
        /*$this->request->data['Band']['id'] = AuthComponent::user('id');
        $id = $this->Band->find('first',array("condtions" => array(
            "Band.id" => AuthComponent::user('id'),
            "Event.id" => $event_id
            )));
       
        if(true){
            $this->Session->setFlash('Done');
        }*/
        if($this->Event->query('delete from bands_events where band_id = '.AuthComponent::user('id').' and event_id = '.$event_id)){

        }
        $this->redirect(array("action" => "index"));
    }

    public function edit($eventId){
        $event = $this->Event->findById($eventId);
        $responses = array("Waiting","Accepted","Denied");

        $this->set("responses",$responses);
        $this->set("event",$event);
        $this->set("eventId",$eventId);
    }

    public function confirmBand($idEvent,$idBand,$param){
        $this->layout = null;
        echo $idEvent. " " . $idBand . " " . $param;
        switch ($param) {
            case '0':
                $param = "Waiting";
                break;
            case '1':
                $param = "Accepted";
                break;
            case '2':
                $param = "Denied";
                break;
            default:
                # code...
                break;
        }
        if($this->Event->query('Update bands_events set confirmed = "'. $param .'" where band_id = ' . $idBand . ' and event_id = '.$idEvent))
        {
           // $this->Session->setFlash("OK");
        }
        else
        {
            //$this->Session->setFlash("KO");
        }
    }
}

?>
<div class="textDisplay">
	<h1>Bring Your Own Music</h1>

	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat magna in ipsum sollicitudin, at gravida nibh lobortis. Pellentesque feugiat, metus id sagittis venenatis, lacus justo ultrices lorem, non tincidunt augue risus sit amet justo. Donec non porta augue, in congue turpis. Ut sit amet felis tincidunt, mollis tortor ac, convallis magna. Nunc pretium consequat eros id euismod. Duis imperdiet non odio et mattis. Ut hendrerit malesuada augue in egestas. Proin convallis pulvinar lectus sed tristique. Donec vehicula felis non leo lobortis rutrum. Nullam pharetra purus ipsum. Vestibulum vitae consectetur ipsum. Integer eget hendrerit quam. Aenean mattis, diam sed vehicula venenatis, nisl mi consequat magna, nec fringilla diam massa in erat. Praesent purus orci, dapibus nec pulvinar ut, tincidunt eget nisi. Sed congue nisl a justo fermentum, eget euismod tortor blandit. Donec at eros nec orci porta feugiat in eget neque.
	</p>
	<p>
	Mauris id arcu libero. Vivamus viverra lorem eu augue porttitor, sed condimentum felis fermentum. Morbi viverra risus at risus pharetra iaculis. Nulla sed venenatis dolor, vel lobortis felis. Morbi sed eleifend arcu, vel varius odio. Proin pulvinar sagittis urna, sed accumsan lorem lacinia id. Ut odio libero, pellentesque ac elit ac, pellentesque pharetra justo. Proin interdum euismod pulvinar.
</p>
<p>
	Nulla vitae tellus risus. Aenean laoreet magna magna, non scelerisque nibh cursus nec. Vivamus convallis justo ut enim facilisis, pulvinar iaculis sapien eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur nec pretium nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris vulputate tincidunt dignissim. Etiam tempus nisi mauris, sit amet interdum lorem ullamcorper ac.
</p>
<p>
	Proin scelerisque elementum tortor, quis blandit nulla dictum at. Proin interdum ipsum a viverra ullamcorper. Suspendisse sed commodo nibh. Donec placerat justo dapibus, tincidunt augue a, pharetra sapien. Pellentesque at convallis nulla, dapibus lacinia neque. Aliquam dignissim volutpat quam eu tristique. Nullam lacinia ullamcorper purus, quis placerat lectus sollicitudin suscipit. Vestibulum ornare odio vel tellus scelerisque ornare. Aliquam non commodo velit. Phasellus auctor purus sapien, vitae viverra lacus tempus ac. Maecenas augue tellus, malesuada ac adipiscing in, rhoncus sed neque. Aenean faucibus nibh vitae aliquam bibendum. Pellentesque convallis dui sit amet erat suscipit, vel sollicitudin mauris porta.
</p><p>
	Aenean ullamcorper orci id dui laoreet, vel molestie est semper. Vestibulum dapibus sem libero. Sed dignissim varius est, a sagittis nisi iaculis eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In commodo in ante sed ornare. Praesent nec dolor quis lacus elementum cursus. Mauris at nisl massa. Curabitur ac nibh augue.
	</p>
</div>

<div class="rightDisplay">
	<div class="tableDisplay" id="home_bands">
		<h1>Last bands registred</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Created</th>
			</tr>
			<?php foreach ($bands as $band): ?>
			<tr >
				<td>
					<?php echo $this->Html->link($band['Display']['Band']['name'],array(
						'controller' => 'bands',
						'action' => 'index',
						$band['Display']['User']['id']));
					?>
				</td>
				<td><?php echo $band['Display']['User']['created'] ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div class="tableDisplay" id="home_live">
		<h1>Live around you</h1>
	</div>
</div>
<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
            
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Etes-vous sûr ?'));
            ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>       
    </tr>
    <?php endforeach; ?>

    <?php echo $this->Html->link(
        'Ajouter un Post',
        array('controller' => 'posts', 'action' => 'add')
    ); ?>
</table>

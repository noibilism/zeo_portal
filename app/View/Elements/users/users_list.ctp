
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add User'), array('plugin' => false, 'controller' => 'users', 'action' => 'add_user'), array('escape' => false)); ?>
    </button>
    <h3 class="block-title">All Users</h3>
</div>
<?php
    if(empty($users)){
        echo 'No user found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Username</th>
    <th class="hidden-xs">E-Mail</th>
    <th class="hidden-xs" style="width: 15%;">Last Login Date</th>
    <th class="hidden-xs" style="width: 15%;">Role</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($users as $user){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $user['User']['username']; ?></td>
    <td class="hidden-xs"><?php echo $user['User']['email']; ?></td>
    <td class="hidden-xs"><?php echo $user['User']['updated']; ?></td>
    <td class="hidden-xs"><span class="label label-primary"><?php echo $this->requestAction(array('controller' => 'Users','action' => 'getRoleName',$user['User']['role_id']));?></span></td>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit User"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'users', 'action'=>'update_user',$user['User']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove User"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'users', 'action'=>'delete',$user['User']['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

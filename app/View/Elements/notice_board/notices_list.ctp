
<div class="block">
<div class="block-header">
    <?php if($role == 1){ ?>
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add A Notice to The Notice Board'), array('plugin' => false, 'controller' => 'users', 'action' => 'add_notice'), array('escape' => false)); ?>
    <?php } ?>
    </button>
    <h3 class="block-title">Notice Board</h3>
</div>
<?php
    if(empty($notices)){
        echo 'No Notice found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Title</th>
    <th class="hidden-xs" style="width: 15%;">Content</th>
    <?php if($role == 1){ ?>
    <th class="text-center" style="width: 10%;">Actions</th>
    <?php } ?>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($notices as $notice){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $notice['NoticeBoard']['title']; ?></td>
    <td class="hidden-xs"><?php echo $notice['NoticeBoard']['content']; ?></td>
    <?php if($role == 1){ ?>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit User"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'users', 'action'=>'update_notice',$notice['NoticeBoard']['id']))); ?></button>
        </div>
    </td>
    <?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

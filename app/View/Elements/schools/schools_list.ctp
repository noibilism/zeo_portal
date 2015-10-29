
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add School'), array('plugin' => false, 'controller' => 'schools', 'action' => 'add_school'), array('escape' => false)); ?>
    </button>
    <h3 class="block-title">All Schools</h3>
</div>
<?php
    if(empty($schools)){
        echo 'No School found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>School Name</th>
    <th class="hidden-xs">Registration Number</th>
    <th class="hidden-xs" style="width: 15%;">E-Mail Address</th>
    <th class="hidden-xs" style="width: 15%;">Type</th>
    <th class="hidden-xs" style="width: 15%;">Phone</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($schools as $school){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $school['School']['name']; ?></td>
    <td class="hidden-xs"><?php echo $school['School']['reg_no']; ?></td>
    <td class="hidden-xs"><?php echo $school['School']['email']; ?></td>
    <td class="hidden-xs"><?php echo $this->requestAction(array('controller' => 'Schools','action' => 'getSchoolTypeName',$school['School']['school_type_id']));?></td>
    <td class="hidden-xs">
        <span class="label label-primary"><?php echo $school['School']['phone']; ?></span>
    </td>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit School"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'schools', 'action'=>'update_school',$school['School']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View School Profile"><?php echo $this->Html->image('sch.png', array('url' => array('controller'=>'schools', 'action'=>'school_profile',$school['School']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove School"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'schools', 'action'=>'delete',$school['School']['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

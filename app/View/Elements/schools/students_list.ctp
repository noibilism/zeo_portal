
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add A Student'), array('plugin' => false, 'controller' => 'schools', 'action' => 'add_student'), array('escape' => false)); ?>
    </button>
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Import Students In Bulk'), array('plugin' => false, 'controller' => 'schools', 'action' => 'add_bulk_student'), array('escape' => false)); ?>
    </button>
    <?php if($curr == 'enrol_class'){ ?>
    <h3 class="block-title">Enrolled Students For <?php echo $class_name; ?></h3>
    <?php }else{ ?>
    <h3 class="block-title">Students List</h3>
    <?php } ?>
</div>
<?php
    if(empty($students)){
        echo 'No Student found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Student Name</th>
    <th>Portal Identification No</th>
    <th class="hidden-xs">Day or Boarding</th>
    <th class="hidden-xs" style="width: 15%;">Sex</th>
    <th class="hidden-xs" style="width: 15%;">Age</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php  echo $this->Form->create('School', array('action'=>'enrol_class')); ?>
<?php
        $i = 1;
        foreach($students as $stu){
        $student = $stu['Student'];
        $datetime1 = date_create($student['d_o_b']);
        $datetime2 = date_create(date('Y-m-d'));
        $age = date_diff($datetime1, $datetime2);

?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $student['name']; ?></td>
    <td class="font-w600"><?php echo $student['pin']; ?></td>
    <td class="hidden-xs"><?php echo $student['day_boarding']; ?></td>
    <td class="font-w600"><?php echo $student['sex']; ?></td>
    <td class="hidden-xs"><?php echo $age->format("%Y"); ?> Years</td>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Student"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'schools', 'action'=>'update_student',$student['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Student"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'schools', 'action'=>'delete_student',$student['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

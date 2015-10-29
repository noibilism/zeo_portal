
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('New Enrolments'), array('plugin' => false, 'controller' => 'Enrolments', 'action' => 'new_enrolment'), array('escape' => false)); ?>
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
    <th>Sex</th>
    <th class="hidden-xs">Class</th>
    <?php if($role == 1){ ?>
    <th class="hidden-xs" style="width: 15%;">School</th>
    <?php } ?>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($students as $stu){
        $student = $stu['StdEnrolment'];
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $student_name[$student['student_id']]; ?></td>
    <td class="font-w600"><?php echo $student['sex']; ?></td>
    <td class="hidden-xs"><?php echo $class_name[$student['class_id']]; ?></td>
    <?php if($role == 1){ ?>
    <td class="font-w600"><?php echo $class_name[$student['school_id']]; ?></td>
    <?php } ?>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Student"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'enrolments', 'action'=>'update_enrolment',$student['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Student"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'enrolments', 'action'=>'delete_enrolment',$student['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

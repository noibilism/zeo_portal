
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add Exam'), array('plugin' => false, 'controller' => 'Examinations', 'action' => 'add_exam'), array('escape' => false)); ?>
    </button>
    <h3 class="block-title">All Examinations</h3>
</div>
<?php
    if(empty($exams)){
        echo 'No Exam found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Exam Name</th>
    <th class="hidden-xs">Session</th>
    <th class="hidden-xs" style="width: 15%;">Registration Fee</th>
    <th class="hidden-xs" style="width: 15%;">Registration Start Date</th>
    <th class="hidden-xs" style="width: 15%;">Registration Closing Date</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($exams as $exam){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $exam['Exam']['name']; ?></td>
    <td class="hidden-xs"><?php echo $this->requestAction(array('controller' => 'Users','action' => 'getSessionName',$exam['Exam']['session_id']));?></td>
    <td class="hidden-xs"><?php echo $exam['Exam']['fee']; ?></td>
    <td class="hidden-xs"><?php echo $this->Time->niceShort($exam['Exam']['reg_start']); ?></td>
    <td class="hidden-xs"><?php echo $this->Time->niceShort($exam['Exam']['reg_close']); ?></td>

    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Exam"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'Examinations', 'action'=>'update_exam',$exam['Exam']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Enrolments for this Exam"><?php echo $this->Html->image('sch.png', array('url' => array('controller'=>'Examinations', 'action'=>'delete',$exam['Exam']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Exam"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'Examinations', 'action'=>'delete',$exam['Exam']['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

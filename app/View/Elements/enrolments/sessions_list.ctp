
<div class="block">
<div class="block-header">
    <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('New Enrolment'), array('plugin' => false, 'controller' => 'Enrolments', 'action' => 'new_enrolment'), array('escape' => false)); ?>
    </button>
    <h3 class="block-title">All Sessions</h3>
</div>
<?php
    if(empty($sch_sess)){
        echo 'No Session found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Session</th>
    <th class="hidden-xs">Current Session</th>
    <th class="hidden-xs" style="width: 15%;">Enrolment Start Date</th>
    <th class="hidden-xs" style="width: 15%;">Enrolment End Date</th>
    <th class="hidden-xs" style="width: 15%;">No of Students Enrolled</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($sch_sess as $ses){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $ses['SchSession']['name']; ?></td>
    <?php $c_s = $ses['SchSession']['current_session']; ?>
    <td class="hidden-xs"><?php if($c_s == 1){ echo 'Yes'; }else{ echo 'No'; }  ?></td>
    <td class="hidden-xs"><?php echo $this->Time->niceShort($ses['SchSession']['enrolment_start']); ?></td>
    <td class="hidden-xs"><?php echo $this->Time->niceShort($ses['SchSession']['enrolment_stop']); ?></td>
    <td><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getSchoolEnrolmentsBySession',$sch_id, $ses['SchSession']['id']))); ?></td>
    <td class="text-center">
        <div class="btn-group">
            <?php if($role == 1){ ?>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Session"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'users', 'action'=>'update_session',$ses['SchSession']['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Session"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'users', 'action'=>'delete_session',$ses['SchSession']['id']))); ?></button>
            <?php }else{ ?>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Session"><?php echo $this->Html->image('enrol.png', array('url' => array('controller'=>'enrolments', 'action'=>'school_enrolments',$ses['SchSession']['id']))); ?></button>
            <?php } ?>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

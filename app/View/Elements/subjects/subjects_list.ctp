
<div class="block">
    <div class="block-header">
        <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add Subject'), array('plugin' => false, 'controller' => 'users', 'action' => 'add_subject'), array('escape' => false)); ?>
        </button>
        <h3 class="block-title">All Subject</h3>
    </div>
    <?php
    if(empty($subjects)){
        echo 'No Subject found!';
    }else{
?>
    <div class="block-content">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Subject Name</th>
<!--
                <th class="hidden-xs">Registration Number</th>
                <th class="hidden-xs" style="width: 15%;">E-Mail Address</th>
                <th class="hidden-xs" style="width: 15%;">Type</th>
                <th class="hidden-xs" style="width: 15%;">Year of Establishment</th>
-->
                <th class="text-center" style="width: 10%;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
        $i = 1;
        foreach($subjects as $subject){
?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td class="font-w600"><?php echo $subject['Subject']['name']; ?></td>
<!--                <td class="hidden-xs"><?php echo $school['School']['reg_no']; ?></td>
                <td class="hidden-xs"><?php echo $school['School']['email']; ?></td>
                <td class="hidden-xs"><?php echo $this->requestAction(array('controller' => 'Schools','action' => 'getSchoolTypeName',$school['School']['school_type_id']));?></td>
                <td class="hidden-xs">
                    <span class="label label-primary"><?php echo $school['School']['y_o_e']; ?></span>
                </td>-->
                <td class="text-center">
                    <div class="btn-group">
                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Subject"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'users', 'action'=>'update_subject',$subject['Subject']['id']))); ?></button>
                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Subject"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'users', 'action'=>'delete_subject',$subject['Subject']['id']))); ?></button>
                    </div>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>

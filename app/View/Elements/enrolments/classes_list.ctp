
<div class="block">
    <div class="block-header">
        <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add Class'), array('plugin' => false, 'controller' => 'users', 'action' => 'add_class'), array('escape' => false)); ?>
        </button>
        <h3 class="block-title">All Class</h3>
    </div>
    <?php
    if(empty($classes)){
        echo 'No Class found!';
    }else{
?>
    <div class="block-content">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Class Name</th>
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
        foreach($classes as $class){
?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td class="font-w600"><?php echo $class['SchClass']['name']; ?></td>
<!--                <td class="hidden-xs"><?php echo $school['School']['reg_no']; ?></td>
                <td class="hidden-xs"><?php echo $school['School']['email']; ?></td>
                <td class="hidden-xs"><?php echo $this->requestAction(array('controller' => 'Schools','action' => 'getSchoolTypeName',$school['School']['school_type_id']));?></td>
                <td class="hidden-xs">
                    <span class="label label-primary"><?php echo $school['School']['y_o_e']; ?></span>
                </td>-->
                <td class="text-center">
                    <div class="btn-group">
                        <?php if($role == 1){ ?>
                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Class"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'users', 'action'=>'update_class',$class['SchClass']['id']))); ?></button>
                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Class"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'users', 'action'=>'delete_class',$class['SchClass']['id']))); ?></button>
                        <?php }else{ ?>
                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Enrol Students for this class"><?php echo $this->Html->image('enrol.png', array('url' => array('controller'=>'schools', 'action'=>'enrol_class',$class['SchClass']['id']))); ?></button>
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

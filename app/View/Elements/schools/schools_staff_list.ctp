
<div class="block">
<?php
    if(empty($staffs)){
        echo 'No School Personnel found!';
    }else{
?>
<div class="block-content">
<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
<table class="table table-bordered table-striped js-dataTable-full">
<thead>
<tr>
    <th class="text-center"></th>
    <th>Staff Name</th>
    <th class="hidden-xs">Designation</th>
    <th class="hidden-xs" style="width: 15%;">Highest Qualification</th>
    <th class="hidden-xs" style="width: 15%;">Discipline</th>
    <th class="hidden-xs" style="width: 15%;">Year Acquired</th>
    <th class="hidden-xs" style="width: 15%;">E-Mail Address</th>
    <th class="hidden-xs" style="width: 15%;">Phone</th>
    <th class="text-center" style="width: 10%;">Actions</th>
</tr>
</thead>
<tbody>
<?php
        $i = 1;
        foreach($staffs as $school){
?>
<tr>
    <td class="text-center"><?php echo $i++; ?></td>
    <td class="font-w600"><?php echo $school['name']; ?></td>
    <td class="hidden-xs"><?php echo $school['type']; ?></td>
    <td class="hidden-xs"><?php echo $school['qualification']; ?></td>
    <td class="hidden-xs"><?php echo $school['discipline']; ?></td>
    <td class="hidden-xs"><?php echo $school['year_acquired']; ?></td>
    <td class="hidden-xs"><?php echo $school['email']; ?></td>
    <td class="hidden-xs"><?php echo $school['phone']; ?></td>
    <td class="text-center">
        <div class="btn-group">
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit School Personnel"><?php echo $this->Html->image('edit.png', array('url' => array('controller'=>'schools', 'action'=>'update_school_staff',$school['id']))); ?></button>
            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove School Personnel"><?php echo $this->Html->image('del.png', array('url' => array('controller'=>'schools', 'action'=>'delete_school_staff',$school['id']))); ?></button>
        </div>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
<?php } ?>

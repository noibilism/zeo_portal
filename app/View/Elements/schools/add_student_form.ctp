<?php
        $day_boarding = array('Day'=>'Day', 'Boarding'=>'Boarding');
        $sex = array('Male'=>'Male', 'Female'=>'Female');
?>
<div class="block block-themed">
    <div class="block-header bg-success">
        <ul class="block-options">
            <li>
                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
            </li>
            <li>
                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
            </li>
        </ul>
        <h3 class="block-title">Add A Student</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('Student', array('class'=>'form-horizontal push-5-t'));?>
        <?php if($curr == 'add_student'){ ?>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Portal Identification Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('pin', array('class'=>'form-control', 'label'=>false,'value'=>$pin, 'readonly'=>'readonly')); ?>
            </div>
        </div>
        <?php }else{ ?>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Portal Identification Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('pin', array('class'=>'form-control', 'label'=>false,'readonly'=>'readonly')); ?>
            </div>
        </div>
        <?php } ?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Student Name</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Student Full Name here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Student Sex</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('sex', array('class'=>'form-control', 'label'=>false, 'options'=>$sex)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Date of Birth</label>
            <div class="col-xs-12">
                <?php  echo $this->Form->input('d_o_b', array('class'=>'form-control', 'label'=>false, 'type'=>'date', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 30,
                'maxYear' => date('Y') - 2,));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-password2">Day or Boarding Student</label>
            <div class="col-xs-12">
                <?php  echo $this->Form->input('day_boarding', array('class'=>'form-control', 'label'=>false, 'options'=>$day_boarding));
                ?>
            </div>
        </div>
                    <?php echo $this->Form->hidden('school_id', array('class'=>'form-control', 'value'=>$sch_id)); ?>
                    <?php echo $this->Form->hidden('school_type_id', array('class'=>'form-control', 'value'=>$type)); ?>

        <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add Student', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

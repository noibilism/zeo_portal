<?php
        $rec_status = array('1'=>'Unregistered', '2'=>'In Process of Approval', '3'=>'Approved');
        $location = array('1'=>'Urban', '2'=>'Rural');
        $own_status = array('1'=>'Community - NGO', '2'=>'Individual', '3'=>'Corporation', '4'=>'Faith - Based');
        $shifts = array('1'=>'Single', '2'=>'Double');
        $yesorno = array('1'=>'Yes', '0'=>'No');
        $sch_cats = array('1'=>'Regular', '2'=>'Islamiyyah Integrated', '3'=>'Science & Technical College', '4'=>'Special School');
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
        <h3 class="block-title">Update Your School Facilities</h3>
    </div>
    <div class="block-content">
        <?php echo $this->Form->create('SchoolProperty', array('class'=>'form-horizontal push-5-t'));?>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">School Name</label>
            <div class="col-xs-12">

                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'value'=>$name,'readonly'=>'readonly')); ?>
                    <?php echo $this->Form->hidden('school_id', array('class'=>'form-control', 'label'=>false,'value'=>$sch_id)); ?>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">No of Classrooms</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('classrooms', array('class'=>'form-control', 'options'=>$nos, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">No of Toilets</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('toilets', array('class'=>'form-control', 'options'=>$nos, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">No of Laboratories</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('labs', array('class'=>'form-control', 'options'=>$nos, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">No of Computers</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('computers', array('class'=>'form-control', 'options'=>$nos, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Recognition Status</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('recognition_status', array('class'=>'form-control', 'options'=>$rec_status, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Location</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('location', array('class'=>'form-control', 'options'=>$location, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Ownership Status</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('ownership_status', array('class'=>'form-control', 'options'=>$own_status, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">How Many Shifts Does The School Operate</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('shifts', array('class'=>'form-control', 'options'=>$shifts, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Does the School Share Facilitites with Any Other School?</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('shared', array('class'=>'form-control', 'options'=>$yesorno, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Type of School</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('school_category', array('class'=>'form-control', 'options'=>$sch_cats, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Does Your School Belong to Any Association? If Yes Enter Below</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('school_association', array('class'=>'form-control','label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Does the School Have a School Based Management Committee?</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('sbmc', array('class'=>'form-control', 'options'=>$yesorno, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Does the School Have a Which Met atleast Once Last Year?</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('pta', array('class'=>'form-control', 'options'=>$yesorno, 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Date of Last Inspection?</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('inspection_date', array('class'=>'form-control', 'type'=>'date', 'label'=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <?php     echo $this->Form->submit('Update School Details', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

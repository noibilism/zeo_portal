<?php
        $designation = array('Principal'=>'Principal', 'Headmaster'=>'Headmaster', 'Vice Principal 1'=>'Vice Principal 1', 'Vice Principal 2'=>'Vice Principal 2', 'Teacher'=>'Teacher');
        $location = array('1'=>'Urban', '2'=>'Rural');
        $qual_type_options = array('BSc'=>'BSc', 'B.Ed'=>'B.Ed', 'B.A'=>'B.A', 'HND'=>'HND', 'OND'=>'OND', 'NCE'=>'NCE');
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
        <h3 class="block-title">Add A School Personnel</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('SchoolStaff', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Staff Name</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Staff Name here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Designation</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('type', array('class'=>'form-control', 'label'=>false,'options'=>$designation)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Phone Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('phone', array('class'=>'form-control', 'label'=>false)); ?>
            </div>
        </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-email">Email</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Email here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Highest Qualification</label>
                <div class="col-xs-12">
                    <?php  echo $this->Form->input('qualification', array('class'=>'form-control', 'options' => $qual_type_options, 'label'=>false));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Discipline</label>
                <div class="col-xs-12">
                    <?php  echo $this->Form->input('discipline', array('class'=>'form-control', 'label'=>false));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Year Acquired</label>
                <div class="col-xs-12">
                    <?php  echo $this->Form->input('year_acquired', array('class'=>'form-control', 'label'=>false, 'type'=>'date', 'dateFormat' => 'Y', 'minYear' => date('Y') - 70,
                    'maxYear' => date('Y'),));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add Staff', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

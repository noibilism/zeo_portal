
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
        <h3 class="block-title">Add An Examination</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('Exam', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">School Name</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Exam Name here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Session</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('session_id', array('class'=>'form-control', 'label'=>false,'options'=>$ses)); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Registration Fee</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('fee', array('class'=>'form-control', 'label'=>false,)); ?>
            </div>
        </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-email">Registration Start Date</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('reg_start', array('class'=>'form-control', 'label'=>false)); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Registration Closing Date</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('reg_close', array('class'=>'form-control', 'label'=>false)); ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add Exam', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>


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
        <h3 class="block-title">Update A Session</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('SchSession', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Name</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Session Name here...')); ?>
                    <?php echo $this->Form->hidden('id'); ?>

                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-password2">Current Session?</label>
            <div class="col-xs-12">
                <?php  echo $this->Form->input('current_session', array('class'=>'form-control', 'options' => array(1=>'Yes', 0=>'No'), 'label'=>false));
                ?>
            </div>

        </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password">Enrolment Starts</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('enrolment_start', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-password">Enrolment Stops</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('enrolment_stop', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
            </div>
        </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add School Session', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the Session') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

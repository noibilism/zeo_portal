
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
        <h3 class="block-title">Change Your Password</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('User', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password">Current Password</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('old_password', array('class'=>'form-control', 'type'=>'password', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password">New Password</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('new_password', array('class'=>'form-control', 'type'=>'password', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Confirm Password</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('new_password_repeat', array('class'=>'form-control', 'type'=>'password' ,'maxLength' => 255,'label'=>false,'placeholder'=>'Confirm Password...')); ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Change Your Password', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to change the password') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

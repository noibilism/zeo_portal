
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
        <h3 class="block-title">Add A User</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('User', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Username</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('username', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Username here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-email">Email</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Email here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password">Password</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('password', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Confirm Password</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('password_confirm', array('class'=>'form-control', 'type'=>'password' ,'maxLength' => 255,'label'=>false,'placeholder'=>'Confirm Password...')); ?>
                </div>

            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">Role</label>
                <div class="col-xs-12">
                    <?php  echo $this->Form->input('role_id', array('class'=>'form-control', 'options' => $role_options, 'label'=>false));
                    ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add User', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

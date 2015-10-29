
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
        <h3 class="block-title">Add A School</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('School', array('class'=>'form-horizontal push-5-t'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">School Name</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter School here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Registration Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('reg_no', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter School Registration Number here...')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Portal Registration Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('portal_reg_no', array('class'=>'form-control', 'label'=>false,'value'=>$portal_reg_no, 'readonly'=>'readonly')); ?>
            </div>
        </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-email">Email</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Email here...')); ?>
                </div>
            </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Phone Number</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('phone', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Email here...')); ?>
            </div>
        </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-password2">School Type</label>
                <div class="col-xs-12">
                    <?php  echo $this->Form->input('school_type_id', array('class'=>'form-control', 'options' => $sch_type_options, 'label'=>false));
                    ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Add School', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add the user') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

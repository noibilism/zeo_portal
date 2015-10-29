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
        <h3 class="block-title">Enrol Students In Bulk</h3>
    </div>
    <div class="block-content">
            <?php echo $this->Form->create('Enrolment', array('class'=>'form-horizontal push-5-t', 'type'=>'file'));?>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Session</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('file', array('class'=>'form-control', 'label'=>false,'value'=>$curr_session, 'readonly'=>'readonly')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Select Class</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('class_id', array('class'=>'form-control', 'label'=>false,'options'=>$classes)); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="register1-username">Excel File</label>
                <div class="col-xs-12">
                    <?php echo $this->Form->input('file', array('class'=>'form-control', 'label'=>false,'type'=>'file')); ?>
                </div>
            </div>
        <div class="form-group">
                <div class="col-xs-12">
                    <?php     echo $this->Form->submit('Upload Students', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to upload file') ); ?>
                </div>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>


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
        <h3 class="block-title">Update A Notice on The Notice Board</h3>
    </div>
    <div class="block-content">
        <?php echo $this->Form->create('NoticeBoard', array('class'=>'form-horizontal push-5-t'));?>
        <div class="form-group">
            <label class="col-xs-12" for="register1-username">Title</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('title', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Username here...')); ?>
                <?php echo $this->Form->hidden('id'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-email">Content</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('content', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Email here...')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-password">Notice Starts</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('publish_start', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Enter Password here...')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12" for="register1-password2">Notice Ends</label>
            <div class="col-xs-12">
                <?php echo $this->Form->input('publish_end', array('class'=>'form-control', 'label'=>false,'placeholder'=>'Confirm Password...')); ?>
            </div>

        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <?php     echo $this->Form->submit('Update Notice on Notice Board', array('class' => 'btn btn-sm btn-success',  'title' => 'Click here to add') ); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

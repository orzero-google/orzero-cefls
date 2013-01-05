<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
//        'enctype'=>'multipart/form-data',
        'class'=>'well'
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

	<div class="row">
        <?php echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort',array('style'=>'width:40px;')); ?>
		<?php echo $form->error($model,'sort'); ?><span class="help-block info" style="display: inline-block;">越小排在越前面</span>
	</div>

	<div class="row buttons">
		<?php
        $lable_name = $model->isNewRecord ? '新增' : '保存';
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$lable_name)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
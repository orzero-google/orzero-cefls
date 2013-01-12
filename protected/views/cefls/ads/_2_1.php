<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'well'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->textAreaRow($model, 'title', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60)); ?>
		<?php echo $form->error($model,'img'); ?>
        <br />
        <?php
        if(!empty($model->img)){
            echo '<img src="'.$model->img.'" style="max-width:640px;" />';
        }
        ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order',array('style'=>'width:40px;')); ?>
		<?php echo $form->error($model,'order'); ?><span class="help-block info" style="display: inline-block;">越小排在越前面</span>
	</div>

	<div class="row buttons">
		<?php
        $lable_name = $model->isNewRecord ? '新增' : '保存';
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$lable_name)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'well'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60)); ?>
		<?php echo $form->error($model,'img'); ?>
        <?php
        if(!empty($model->img)){
            echo '<img src="/images/temp/'.$model->img.'" style="max-width:640px;" />';
        }
        ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownListRow($model, 'type', array('首页轮播', '主题图1', '主题图2', '主题图3', '主题图4', '主题图5', '主题图6', '主题图7', '主题图8', '主题图9'));  ?>
	</div>

	<div class="row">
        <?php echo $form->dropDownListRow($model, 'cid', array('隐藏', '显示'));  ?>
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
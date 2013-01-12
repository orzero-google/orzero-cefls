<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
//        'enctype'=>'multipart/form-data',
        'class'=>'well'
    ),
));
$list_array = array(
    62=>'英语佳作',
    63=>'法语佳作',
    64=>'德语佳作',
);
    ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->dropDownListRow($model, 'cid', $list_array);  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'from'); ?>
        <?php echo $form->textField($model,'from',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author'); ?>
        <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'excerpt', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
    </div>

	<div class="row">
<!--        --><?php //echo $form->labelEx($model,'content'); ?>
        <?php
        /*
        $this->widget('application.extensions.tinymce.ETinyMce', array(
        $this->widget('application.extensions.xheditor.JXHEditor', array(
//            'id'=>'Article_content',
//            'name'=>'Article[content]',
            'model'=>$model,
            'attribute'=>'content',
//            'useSwitch' => false,
//            'editorTemplate'=>'full',
            'htmlOptions'=>array('cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
        ));*/
        Yii::app()->clientScript->registerScript('ueditor', 'var ue = new UE.ui.Editor();ue.render(\'Article_content\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;'));
        ?>
<!--        --><?php //echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
        <?php echo $form->error($model,'content'); ?>
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
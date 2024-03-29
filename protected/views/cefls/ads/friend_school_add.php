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
        <?php echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>25, 'style'=>'width:655px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'img'); ?>
        <?php echo $form->fileField($model,'img',array('size'=>60)); ?>
        <?php echo $form->error($model,'img'); ?>
        <?php
        if(!empty($model->img)){
            echo '<img src="'.$model->img.'" style="max-width:640px;" />';
        }
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'url'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'url'); ?>
    </div>

    <div class="row buttons">
        <?php
        $lable_name = $model->isNewRecord ? '新增' : '保存';
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$lable_name)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'ads-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'well'),
)); ?>

    <?php echo $form->errorSummary($model); ?>



    <div class="row">
        <label for="Ads_img">形象照片</label>
        <?php echo $form->fileField($model,'file',array('size'=>60)); ?>
        <?php echo $form->error($model,'file'); ?>
        <?php
        if(!empty($model->file)){
            echo '<img src="'.$model->file.'" style="max-width:640px;" />';
        }
        ?>
    </div>

    <div class="row">
        <label class="required" for="Article_author">名字<span class="required">*</span></label>
        <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>


    <div class="row">
        <label class="required" for="Article_title">职位<span class="required">*</span></label>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
<!--        <label class="required" for="Article_content">介绍<span class="required">*</span></label>-->
        <?php
        /*
        $this->widget('application.extensions.tinymce.ETinyMce', array(
        $this->widget('application.extensions.xheditor.JXHEditor', array(
            'model'=>$model,
            'attribute'=>'content',
//            'useSwitch' => false,
//            'editorTemplate'=>'full',
            'htmlOptions'=>array('cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
        ));*/
        Yii::app()->clientScript->registerScript('ueditor', 'var ue = new UE.ui.Editor();ue.render(\'Article_content\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;'));
        ?>
        <?php echo $form->error($model,'content'); ?>
    </div>

<?php
    $jsdw = get_jsdw_type();
    $jsdw = array_merge($jsdw, array(-1=>'领导班子'));
?>

    <div class="row">
        <?php echo $form->dropDownListRow($model, 'cid', $jsdw);  ?>
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
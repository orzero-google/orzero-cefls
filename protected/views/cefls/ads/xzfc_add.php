<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'ads-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'well'),
)); ?>

    <?php echo $form->errorSummary($model); ?>



    <div class="row">
        <label for="Ads_img">个人照片</label>
        <?php echo $form->fileField($model,'img',array('size'=>60)); ?>
        <?php echo $form->error($model,'img'); ?>
        <?php
        if(!empty($model->img)){
            echo '<img src="'.$model->img.'" style="max-width:640px;" />';
        }
        ?>
    </div>

    <div class="row">
        <label class="required" for="Ads_title">名字<span class="required">*</span></label>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>


    <div class="row">
        <label class="required" for="Ads_url">获奖说明<span class="required">*</span></label>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'url'); ?>
    </div>

    <div class="row">
<!--        <label for="Ads_content">内容描述</label>-->
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
        ));*/ ?>
                <?php
        Yii::app()->clientScript->registerScript('ueditor', 'var ue = new UE.ui.Editor();ue.render(\'Ads_content\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;')); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->dropDownListRow($model, 'cid', get_xzfc_type());  ?>
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
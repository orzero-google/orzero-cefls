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
<h2 style="margin: 10px auto;text-align: center;border: 1px solid #CCCCCC;">英文</h2>
    <div class="row">
        <?php echo $form->labelEx($model,'title_en'); ?>
        <?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'from_en'); ?>
        <?php echo $form->textField($model,'from_en',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'from_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author_en'); ?>
        <?php echo $form->textField($model,'author_en',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'author_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'excerpt_en', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
    </div>

    <div class="row">
<!--        --><?php //echo $form->labelEx($model,'content_en'); ?>
        <?php
        /*
        $this->widget('application.extensions.tinymce.ETinyMce', array(
        $this->widget('application.extensions.xheditor.JXHEditor', array(
            'model'=>$model,
            'attribute'=>'content_en',
//            'useSwitch' => false,
//            'editorTemplate'=>'full',
            'htmlOptions'=>array('cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
        ));*/
        Yii::app()->clientScript->registerScript('ueditor1', 'var ue1 = new UE.ui.Editor();ue1.render(\'ArticleForeign_content_en\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content_en', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;'));
        ?>
        <?php echo $form->error($model,'content_en'); ?>
    </div>

    <br /><br /><br /><br /><br /><br />
    <h2 style="margin: 10px auto;text-align: center;border: 1px solid #CCCCCC;">法文</h2>
    <div class="row">
        <?php echo $form->labelEx($model,'title_fr'); ?>
        <?php echo $form->textField($model,'title_fr',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title_fr'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'from_fr'); ?>
        <?php echo $form->textField($model,'from_fr',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'from_fr'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author_fr'); ?>
        <?php echo $form->textField($model,'author_fr',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'author_fr'); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'excerpt_fr', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
    </div>

    <div class="row">
<!--        --><?php //echo $form->labelEx($model,'content_fr'); ?>
        <?php
        /*
        $this->widget('application.extensions.tinymce.ETinyMce', array(
        $this->widget('application.extensions.xheditor.JXHEditor', array(
            'model'=>$model,
            'attribute'=>'content_fr',
//            'useSwitch' => false,
//            'editorTemplate'=>'full',
            'htmlOptions'=>array('cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
        ));*/
        Yii::app()->clientScript->registerScript('ueditor2', 'var ue2 = new UE.ui.Editor();ue2.render(\'ArticleForeign_content_fr\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content_fr', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;'));
        ?>
        <?php echo $form->error($model,'content_fr'); ?>
    </div>

    <br /><br /><br /><br /><br /><br />

    <h2 style="margin: 10px auto;text-align: center;border: 1px solid #CCCCCC;">德文</h2>
    <div class="row">
        <?php echo $form->labelEx($model,'title_de'); ?>
        <?php echo $form->textField($model,'title_de',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'title_de'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'from_de'); ?>
        <?php echo $form->textField($model,'from_de',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'from_de'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author_de'); ?>
        <?php echo $form->textField($model,'author_de',array('size'=>60,'maxlength'=>255,'style'=>'width:490px;')); ?>
        <?php echo $form->error($model,'author_de'); ?>
    </div>

    <div class="row">
        <?php echo $form->textAreaRow($model, 'excerpt_de', array('class'=>'span8', 'rows'=>5, 'style'=>'width:500px;')); ?>
    </div>

    <div class="row">
<!--        --><?php //echo $form->labelEx($model,'content_de'); ?>
        <?php
        /*
        $this->widget('application.extensions.tinymce.ETinyMce', array(
        $this->widget('application.extensions.xheditor.JXHEditor', array(
            'model'=>$model,
            'attribute'=>'content_de',
//            'useSwitch' => false,
//            'editorTemplate'=>'full',
            'htmlOptions'=>array('cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
        ));*/
        Yii::app()->clientScript->registerScript('ueditor3', 'var ue3 = new UE.ui.Editor();ue3.render(\'ArticleForeign_content_de\');', CClientScript::POS_READY);
        echo $form->textAreaRow($model, 'content_de', array('class'=>'span8', 'rows'=>5, 'style'=>'width:655px;'));
        ?>
        <?php echo $form->error($model,'content_de'); ?>
    </div>

    <br /><br /><br />

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
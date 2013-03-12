<?php
$model = new UserChangePassword;
if (Yii::app()->user->id) {

    // ajax validator
    if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
    {
        echo UActiveForm::validate($model);
        Yii::app()->end();
    }

    if(isset($_POST['UserChangePassword'])) {
        $model->attributes=$_POST['UserChangePassword'];
        if($model->validate()) {
            $new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
            $new_password->password = UserModule::encrypting($model->password);
            $new_password->activkey=UserModule::encrypting(microtime().$model->password);
            $new_password->save();
            Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
            $this->redirect(array("user/logout"));
        }
    }
}
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'changepassword-form',
//    'enableAjaxValidation'=>true,
//    'clientOptions'=>array(
//        'validateOnSubmit'=>true,
//    ),
)); ?>
    <p class="note">密码修改后需要重新登录</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'oldPassword'); ?>
        <?php echo $form->passwordField($model,'oldPassword'); ?>
        <?php echo $form->error($model,'oldPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
        <p class="hint">
            <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'verifyPassword'); ?>
        <?php echo $form->passwordField($model,'verifyPassword'); ?>
        <?php echo $form->error($model,'verifyPassword'); ?>
    </div>


    <div class="row submit">
        <?php echo CHtml::submitButton(UserModule::t("Save")); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
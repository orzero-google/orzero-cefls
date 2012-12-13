<div class="top"></div>
<?php
$model=new ContactForm;
if(isset($_POST['ContactForm']))
{
    $model->attributes=$_POST['ContactForm'];
    if($model->validate())
    {
        $headers="From: {$model->email}\r\nReply-To: {$model->email}";

        $user_info = '
        <table>
            <tr>
                <td class="lefttitle" height="95px">发信人</td>
                <td width="339px">
                    <p><span>*</span>姓　　名：'.$model->name.'</p>
                    <p><span>*</span>电子邮箱：'.$model->email.'</p>
                    <p>&nbsp;通讯地址：'.$model->address.'</p>
                </td>
                <td width="339px">
                    <p><span>*</span>单　　位：'.$model->company.'</p>
                    <p>&nbsp;联系电话：'.$model->mobile.'</p>
                    <p>&nbsp;邮政编码：'.$model->zip.'</p>
                </td>
            </tr>
        </table>
        ';

        $model->body.=$user_info;

        mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
        Yii::app()->user->setFlash('contact','感谢您联系我们！');
        $this->refresh();
    }
}

$this->widget('application.extensions.flash.Flash', array(
    'keys'=>array('success','error'),
    'htmlOptions'=>array('class'=>'flash'),
)); ?><!-- flashes -->

<div class="middle">
    <?php $form=$this->beginWidget('CActiveForm'); ?>
        <table class="email" cellpadding="0px" cellspacing="0px" width="712px" height="555">
            <tr><td colspan="3"><?php echo $form->errorSummary($model); ?>&nbsp;</td></tr>
            <tr class="title">
                <td width="34px" height="40px;">&nbsp;</td>
                <td width="678px" colspan="2">成都市实验外国语学校校长</td>
            </tr>
            <tr>
                <td class="lefttitle" height="130">发信人</td>
                <td width="339">
                    <p><span>*</span>姓　　名：<?php echo $form->textField($model,'name'); ?></p>
                    <p><span>*</span>电子邮箱：<?php echo $form->textField($model,'email'); ?></p>
                    <p>&nbsp;通讯地址：<?php echo $form->textField($model,'address'); ?></p>
                </td>
                <td width="339">
                    <p><span>*</span>单　　位：<?php echo $form->textField($model,'company'); ?></p>
                    <p>&nbsp;联系电话：<?php echo $form->textField($model,'mobile'); ?></p>
                    <p>&nbsp;邮政编码：<?php echo $form->textField($model,'zip'); ?></p>
                </td>
            </tr>
            <tr>
                <td class="lefttitle" height="50">主题</td>
                <td colspan="2"><?php echo $form->textField($model,'subject', array('class'=>'title')); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><?php echo $form->textArea($model,'body'); ?></td>
            </tr>

            <?php if(extension_loaded('gd')): ?>
            <tr>
                <td class="lefttitle" height="80">验证码</td>
                <td colspan="2">
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model,'verifyCode'); ?>
                </td>
            </tr>
            <?php endif; ?>
        </table>

        <div class="aboutsubmit"><input type="submit" class="emailsubmit" value="提交"/></div>
    <?php $this->endWidget(); ?>
</div>

<div class="bottom"></div>
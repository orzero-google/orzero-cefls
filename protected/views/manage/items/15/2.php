<?php
$user = User::model()->findByPk(1);
if(isset($_POST['email'])){
    $user->email = $_POST['email'];
    $user->save();
}
echo '欢迎'.$user_info['username'].'登陆<br><br>';
?>




设置管理员信箱：
<form method="POST">
<input name="email" value="<?php echo $user->email;?>">
<input type="submit" value="更新">
<input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken;?>">
</form>
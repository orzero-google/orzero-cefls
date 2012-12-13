<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-7
 * Time: 下午9:57
 * .
 */

$cid = 4;
$time = date("Y-m-d H:i:s");

//$id=Yii::app()->request->getParam('id', 0);
//$model = ArticleForeign::model()->article_list($cid)->findByPk($id);
$model = ArticleForeign::model()->article_list($cid)->find();

if(empty($model)){
    $model = new ArticleForeign;
}else{

}

$model->uid=Yii::app()->user->id;
$model->cid=$cid;
$model->enabled=1;
$model->audit=1;
$model->grade=0;
$model->createtime=empty($model->createtime) ? $time : $model->createtime;
$model->updatetime=$time;
$model->sort=0;
$model->type=0;

if(isset($_POST['ArticleForeign']))
{
    $model->attributes=$_POST['ArticleForeign'];

    if($model->save())
        $this->redirect(array('manage/index', 'pid'=>$menu_pid, 'cid'=>4));
}

echo $this->renderPartial('//cefls/article/foreign_add', array('model'=>$model));


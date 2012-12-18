<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-7
 * Time: 下午9:57
 * .
 */

$cid = 68;
$time = date("Y-m-d H:i:s");

$id=Yii::app()->request->getParam('id', 0);
$model = Article::model()->article_list($cid)->findByPk($id);

if(empty($model)){
    $model = new Article;
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

if(isset($_POST['Article']))
{
    $model->attributes=$_POST['Article'];
    if($model->save())
        $this->redirect(array('manage/index', 'pid'=>8, 'cid'=>2));
}

echo $this->renderPartial('//cefls/article/article_add', array('model'=>$model));


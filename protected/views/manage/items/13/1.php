<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-7
 * Time: 下午9:57
 * .
 */

//$cid = Yii::app()->request->getParam('cid', 0);
$time = date("Y-m-d H:i:s");

$id=Yii::app()->request->getParam('id', 0);
$model = Article::model()->open()->findByPk($id);

if(empty($model)){
    $model = new Article;
}else{

}

$model->uid=Yii::app()->user->id;
//$model->cid=$cid;
$model->enabled=1;
$model->audit=1;
$model->grade=0;
$model->createtime=empty($model->createtime) ? $time : $model->createtime;
$model->updatetime=$time;
$model->sort=0;
$model->type=-13;

if(isset($_POST['Article']))
{
    $model->attributes=$_POST['Article'];
    /*
    $article_old = Article::model()->findByAttributes(array('title'=>$model->title));
    if(isset($article_old->aid) && $article_old->aid != $model->aid){
        $this->pageTitle=Yii::app()->name;
        $this->renderPartial('//cefls/error', array('message'=>'文章已经存在'));
        die;
    }
    */

    if($model->save())
        $this->redirect(array('manage/index', 'pid'=>13, 'cid'=>2));
}

echo $this->renderPartial('//manage/items/13/list_article_add', array('model'=>$model));


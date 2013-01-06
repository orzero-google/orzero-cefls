<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-7
 * Time: 下午9:57
 * .
 */
$id=Yii::app()->request->getParam('id', 0);
$model = Article::model()->open()->findByPk($id);
$img_root = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'jsdw'.DIRECTORY_SEPARATOR;

$img_old = '';
$img_temp = '';
if(empty($model)){
    $model = new Article;
}else{
    $img_old = $img_root.basename($model->file);
    $img_temp = $model->file;
}
$model->cid = 40;
$model->type=-12;
if(empty($model->uid)){
    $model->uid = Yii::app()->user->id;
}
$model->audit = 0;
$model->grade = 0;
if(empty($model->createtime)){
    $model->createtime = date("Y-m-d H:i:s");
}
$model->updatetime = date("Y-m-d H:i:s");
$model->sort = 0;

if(isset($_POST['Article']))
{
    $model->attributes=$_POST['Article'];
    if(empty($model->file)){
        $model->file = $img_temp;
    }

    $img = CUploadedFile::getInstance($model, 'file');
    if(!empty($img)){
        if(!empty($img_old)){
            @unlink($img_old);
        }
//        if(!is_dir($img_root))
//            mkdir($img_root,0777,true);
        $img_name  = md5(rand(1,100).date('YmdHis').rand(1,1000)).'.'.$img->extensionName;
        if (is_object($img)) {
            $img->saveAs($img_root.$img_name);
            $model->file='/images/jsdw/'.$img_name;
        }
    }

    if($model->save())
        $this->redirect(array('manage/index', 'pid'=>12, 'cid'=>2));
}

echo $this->renderPartial('//cefls/article/jsfc_add', array('model'=>$model, 'img_root'=>$img_root));


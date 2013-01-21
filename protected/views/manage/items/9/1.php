<?php
/**
 * Created by ORZERO.COM .
 * User: xami520@gmail.com
 * Date: 12-12-7
 * Time: 下午9:57
 * .
 */
$id=Yii::app()->request->getParam('id', 0);
$model = Ads::model()->open()->findByPk($id);
$img_root = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'xzfc'.DIRECTORY_SEPARATOR;

$img_old = '';
$img_temp = '';
if(empty($model)){
    $model = new Ads;
}else{
    $img_old = $img_root.basename($model->img);
    $img_temp = $model->img;
}

$model->type=-10;

if(isset($_POST['Ads']))
{
    $model->attributes=$_POST['Ads'];
    if(empty($model->img)){
        $model->img = $img_temp;
    }

    $img = CUploadedFile::getInstance($model, 'img');
    if(!empty($img)){
        if(!empty($img_old)){
            @unlink($img_old);
        }
//        if(!is_dir($img_root))
//            mkdir($img_root,0777,true);
        $img_name  = md5(rand(1,100).date('YmdHis').rand(1,1000)).'.'.$img->extensionName;
        if (is_object($img)) {
            $img->saveAs($img_root.$img_name);
            $model->img='/images/xzfc/'.$img_name;
        }
    }

    if($model->save()){
        if(in_array($pid, array(9))){
            $this->redirect(array('manage/index', 'pid'=>$pid, 'cc'=>$model->cid));
        }else{
            $this->redirect(array('manage/index', 'pid'=>$pid, 'cid'=>2));
        }
    }

}

echo $this->renderPartial('//cefls/ads/xzfc_add', array('model'=>$model, 'img_root'=>$img_root));


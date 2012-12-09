<?php

class CateController extends Controller
{
    public $layout='admin';
	public function actionIndex()
	{
        $pid=Yii::app()->request->getParam('pid', 0);
        $cid=Yii::app()->request->getParam('cid', 0);
        $sub_menu = Menu::model()->findByPk($cid);
		$this->render('index', array(
            'pid'=>$pid,
            'cid'=>$cid,
            'sub_menu'=>$sub_menu
        ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
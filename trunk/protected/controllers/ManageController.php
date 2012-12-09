<?php

class ManageController extends Controller
{
    public $layout='admin';
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','login','captcha'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('password','pay','deljob','upjob',
                    'pxs','jobs','upxscj', 'delxscj','deluser','delav',
                    'upinfo','message','delmsg','repmsg','post','upPost',
                'adviser'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actions()
    {
        return (
            array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
                'minLength'=>4,
                'maxLength'=>4,
                'width'=>60,
                'height'=>30
            ))
        );
    }

    public function actionIndex()
    {
        if(empty(YII::app()->user->id)){
            $this->redirect('user/login');
            return;
        }
        $user_info=User::model()->findByPk(YII::app()->user->id);

        $cid=Yii::app()->request->getParam('cid', 0);
        $pid=Yii::app()->request->getParam('pid', 0);
        $this->render('index',array(
            'cid'=>$cid,
            'pid'=>$pid,
            'user_info'=>$user_info
        ));
    }

}
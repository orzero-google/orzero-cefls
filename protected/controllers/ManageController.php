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
                'actions'=>array('admin','del_article','del_ads','del_article_foreign'),
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

    public function actionDel_article(){
        $pid=Yii::app()->request->getParam('pid', 0);
        $cid=Yii::app()->request->getParam('cid', 0);
        $id=Yii::app()->request->getParam('id', 0);

        $article = Article::model()->findByPk($id);
        $article->enabled=0;
        if($article->save()){
            $this->redirect(array('manage/index', 'pid'=>$pid, 'cid'=>$cid));
        }
    }

    public function actionDel_article_foreign(){
        $pid=Yii::app()->request->getParam('pid', 0);
        $cid=Yii::app()->request->getParam('cid', 0);
        $id=Yii::app()->request->getParam('id', 0);

        $article = ArticleForeign::model()->findByPk($id);
        $article->enabled=0;
        if($article->save()){
            $this->redirect(array('manage/index', 'pid'=>$pid, 'cid'=>$cid));
        }
    }

    public function actionDel_ads(){
        $pid=Yii::app()->request->getParam('pid', 0);
        $cid=Yii::app()->request->getParam('cid', 0);
        $id=Yii::app()->request->getParam('id', 0);

        $article = Ads::model()->findByPk($id);
        $article->enabled=0;
        if($article->save()){
            $this->redirect(array('manage/index', 'pid'=>$pid, 'cid'=>$cid));
        }
    }

    public function actionIndex()
    {
        $cs=Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $dir = Yii::getPathOfAlias('ext.ueditor');
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $cs->registerScriptFile($baseUrl.'/editor_all.js',CClientScript::POS_HEAD );
        $cs->registerScriptFile($this->createUrl('site/ueditor', array('_'=>md5(rand(),rand()))),CClientScript::POS_HEAD );
        $dir = Yii::getPathOfAlias('ext.ueditor.themes.default');
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $cs->registerCssFile($baseUrl.'/ueditor.css');
//        $cs->registerScript('ueditor', 'var ue = new UE.ui.Editor();ue.render(\'Article_content\');', CClientScript::POS_READY);


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
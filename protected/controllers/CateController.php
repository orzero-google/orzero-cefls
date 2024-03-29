<?php

class CateController extends Controller
{
    public $layout='admin';
	public function actionIndex()
	{
        $pid=Yii::app()->request->getParam('pid', 0);
        $cid=Yii::app()->request->getParam('cid', 0);
        if(empty($cid)){
            $cid_obj = Menu::model()->find('`t`.`parent_id` = '.$pid.' order by `t`.`menu_id` asc ');
            $cid=$cid_obj->menu_id;
        }
        $top_menu = Menu::model()->findByPk($pid);
        $sub_menu = Menu::model()->findByPk($cid);

        if(empty($pid)){
            $this->render('cate', array(
                'cid'=>$cid,
                'sub_menu'=>$sub_menu
            ));
        }else{
            $this->render('index', array(
                'pid'=>$pid,
                'cid'=>$cid,
                'sub_menu'=>$sub_menu,
                'top_menu'=>$top_menu,
            ));
        }
	}

    public function actionArticle_one($id){
        $article = Article::model()->findByPk($id);
        echo $this->renderPartial('//cefls/article_one',array('article'=>$article));
    }

    public function actionAds_one($id){
        $article = Ads::model()->findByPk($id);
        echo $this->renderPartial('//cefls/article_one',array('article'=>$article));
    }

    public function actionForeign_one($id, $key){
        $article = ArticleForeign::model()->findByPk($id);
        echo $this->renderPartial('//cefls/foreign_one',array('article'=>$article, 'key'=>$key));
    }

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
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
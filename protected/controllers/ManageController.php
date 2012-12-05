<?php

class ManageController extends Controller
{
    public $layout='site';
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

        $cate=Yii::app()->request->getParam('cate', 1);
        $this->render('index',array(
            'cate'=>$cate,
            'user_info'=>$user_info
        ));
    }

    public function actionPassword()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $old_pass=Yii::app()->request->getParam('old_pass', '');
        $new_pass=Yii::app()->request->getParam('new_pass', '');
        $re_pass=Yii::app()->request->getParam('re_pass', '');

        $user=Users::model()->with('p')->findByPk(YII::app()->user->id);
        $direct=$this->createUrl('manage/index',array('cate'=>2));


        $error=array();
        if(empty($old_pass)){
            $error[]='旧密码不能为空';
        }
        if(empty($new_pass)){
            $error[]='新密码不能为空';
        }
        if(UserModule::encrypting($old_pass)!=$user->password){
            $error[]='旧密码错误';
        }
        if($old_pass==$new_pass){
            $error[]='新密码要不同于旧密码';
        }
        if(strlen($new_pass)<4){
            $error[]='新密码长度至少为4位';
        }
        if($re_pass!=$new_pass){
            $error[]='两次新密码输入不一致';
        }
        if(isset($error[0])){
            $this->render('//site/error',array(
                'message'=>$error[0],
                'direct'=>$direct,
            ));
            return;
        }


        $user->password=UserModule::encrypting($new_pass);
        if($user->save()){
            $msg='密码修改成功';
        }



        $this->render('//site/info',array(
            'msg'=>$msg,
            'direct'=>$direct,
        ));
    }

    public function actionPays()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $model=new Pays;
        $direct=$this->createUrl('manage/index',array('cate'=>3));
        $error=array();
        pr($_POST);

        if(isset($_POST['Pays']))
        {
            if(isset($_POST['Pays']['year']) && in_array($_POST['Pays']['year'], array(1,2,3))){
                if($_POST['Pays']['year']==1){
                   if($_POST['Pays']['money']!=100){
                       $error[]='付款金额错误';
                   }
                }elseif($_POST['Pays']['year']==2){
                    if($_POST['Pays']['money']!=170){
                        $error[]='付款金额错误';
                    }
                }elseif($_POST['Pays']['year']==3){
                    if($_POST['Pays']['money']!=230){
                        $error[]='付款金额错误';
                    }
                }
            }else{
                $error[]='请选择付款年限';
            }

            if(isset($_POST['Pays']['type']) && in_array($_POST['Pays']['type'], array(1,2,3))){

            }else{
                $error[]='请选择付款类型';
            }

            if(isset($error[0])){
                $this->render('//site/error',array(
                    'message'=>$error[0],
                    'direct'=>$direct,
                ));
                return;
            }

            $model->attributes=$_POST['Pays'];
            $model->uid=YII::app()->user->id;
            $model->pay_time=time();
            $model->post_time=time();
            $model->status=0;

            if($model->save()){
                $this->render('//site/info',array(
                    'msg'=>'提交信息成功',
                    'direct'=>$direct,
                ));
                return;
            }
        }
    }


    public function actionJobs()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $msg='';
        $direct=$this->createUrl('manage/index',array('cate'=>5));

        $model=new Job;
        if(isset($_POST['Job']))
        {
            $model->attributes=$_POST['Job'];
        }
        $model->other = $_POST['Job']['other'];

        $model->uid=YII::app()->user->id;
        $model->createtime=date("Y-m-d");
        $model->validate();
        $form=new  CActiveForm;
        $error=$form->errorSummary($model);
        if(empty($error)){
            $model->save();
            $this->render('//site/info',array(
                'msg'=>'职位发布成功',
                'direct'=>$this->createUrl('manage/index',array('cate'=>6)),
            ));
        }else{
            $this->render('//site/error',array(
                'message'=>$error,
                'direct'=>$direct,
            ));
        }
    }

    public function actionDeljob()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $id=Yii::app()->request->getParam('id', 0);
        $job=Job::model()->find('jid='.intval($id).' AND uid='.YII::app()->user->id);
         if(!empty($job)){
             $job->status=0;
             $job->save();
             $this->render('//site/info',array(
                 'msg'=>'职位删除成功',
                 'direct'=>$this->createUrl('manage/index',array('cate'=>6)),
             ));
         }
    }

    public function actionUpjob()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $id=Yii::app()->request->getParam('id', 0);
        $model=Job::model()->find('jid='.intval($id).' AND uid='.YII::app()->user->id);
        if(empty($model)){
            $this->render('//site/error',array(
                'message'=>'没有权限',
            ));
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Job']))
        {
            $model->attributes=$_POST['Job'];
            if($model->save()){
                $this->render('//site/info',array(
                    'msg'=>'职位信息更新成功',
                    'direct'=>$this->createUrl('manage/index',array('cate'=>6)),
                ));
            } else{
                $form=new  CActiveForm;
                $error=$form->errorSummary($model);
                $this->render('//site/error',array(
                    'message'=>$error,
                ));
            }

        }

    }

    public function actionPxs()
    {

        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $user=Users::model()->with('p')->findByPk(YII::app()->user->id);

        $msg='';
        $direct=$this->createUrl('manage/index',array('pid'=>3,'cate'=>9,'iid'=>2));

//        pr($_POST['Job']);
        $model=new Article();
        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];
        }

        $model->uid=YII::app()->user->id;
        $model->cid=23;
        $model->audit=0;
        $model->grade=0;
        $model->createtime=date("Y-m-d H:i:s");
        $model->updatetime=0;
        $model->excerpt=empty($user->p->nickname)?$user->username:$user->p->nickname;
        $model->enabled=1;
        $model->sort=0;
        $model->type=1;
        $model->clicknumber=0;

        $model->validate();
        $form=new  CActiveForm;
        $error=$form->errorSummary($model);
        if(empty($error)){
            $model->save();
            $this->render('//site/info',array(
                'msg'=>'学术报告发布成功',
                'direct'=>$direct,
            ));
        }else{
            $this->render('//site/error',array(
                'message'=>$error,
                'direct'=>$this->createUrl('manage/index',array('cate'=>8)),
            ));
        }
    }

    public function actionPost()
    {
        $cid=intval(Yii::app()->request->getParam('cid',0));

        if($cid==24){
            $up_cid=16;
            $list_cid=18;
            $title='产权成果';
        }elseif($cid==25){
            $up_cid=17;
            $list_cid=19;
            $title='学术动态';
        }else{
            $this->render('//site/error',array(
                'message'=>'参数有问题',
                'direct'=>$this->createUrl('manage/index'),
            ));
        }
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $user=Users::model()->with('p')->findByPk(YII::app()->user->id);



        $model=new Article();
        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];

            $model->uid=YII::app()->user->id;
            $model->cid=$cid;
            $model->audit=0;
            $model->grade=0;
            $model->createtime=date("Y-m-d H:i:s");
            $model->updatetime=date("Y-m-d H:i:s");
            if($cid!=24 && $cid!=25){
                $model->excerpt=empty($user->p->nickname)?$user->username:$user->p->nickname;
            }
            $model->enabled=1;
            $model->sort=0;
            $model->type=1;
            $model->clicknumber=0;

            $model->validate();
            $form=new  CActiveForm;
            $error=$form->errorSummary($model);
            if(empty($error)){
                $model->save();
                $this->render('//site/info',array(
                    'msg'=>$title.'发布成功',
                    'direct'=>$this->createUrl('manage/index',array('cate'=>$list_cid)),
                ));
            }else{
                $this->render('//site/error',array(
                    'message'=>$error,
                    'direct'=>$this->createUrl('manage/index',array('cate'=>$up_cid)),
                ));
            }
        }
    }

    public function actionUpxscj()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $id=Yii::app()->request->getParam('id', 0);
        $model=Article::model()->find('aid='.intval($id).' AND uid='.YII::app()->user->id.' AND cid=23');
        if(empty($model)){
            $this->render('//site/error',array(
                'message'=>'没有权限',
            ));
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];
            $model->audit=0;
            if($model->save()){
                $this->render('//site/info',array(
                    'msg'=>'学术成就更新成功,需要重新等待管理审核',
                    'direct'=>$this->createUrl('manage/index',array('cate'=>9)),
                ));
            } else{
                $form=new  CActiveForm;
                $error=$form->errorSummary($model);
                $this->render('//site/error',array(
                    'message'=>$error,
                ));
            }

        }

    }

    public function actionUpPost()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $id=Yii::app()->request->getParam('id', 0);
        $cid=Yii::app()->request->getParam('cid', 0);

        $model=Article::model()->find('aid='.intval($id).' AND uid='.YII::app()->user->id);
        if(empty($model)){
            $this->render('//site/error',array(
                'message'=>'没有权限，只有发布者可以更改',
            ));
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];
            if($model->cid==23){
                $model->audit=0;
                $msg='更新成功,需要重新等待管理审核';
            } else {
                $msg='更新成功';
            }


            if($model->save()){


                $this->render('//site/info',array(
                    'msg'=>$msg,
                    'direct'=>$this->createUrl('manage/index',array('cate'=>$cid)),
                ));
            } else{
                $form=new  CActiveForm;
                $error=$form->errorSummary($model);
                $this->render('//site/error',array(
                    'message'=>$error,
                ));
            }

        }

    }

    public function actionDelxscj()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $cid=Yii::app()->request->getParam('cid', 0);
        $id=Yii::app()->request->getParam('id', 0);
        $iid=Yii::app()->request->getParam('iid', 0);
        $pid=Yii::app()->request->getParam('pid', 0);
        $article=Article::model()->find('aid='.intval($id).' AND uid='.YII::app()->user->id.' AND cid=23');

        if(empty($article)){
            $user=Users::model()->findByPk(YII::app()->user->id);
            if($user->superuser){
                $article=Article::model()->findByPk(intval($id));
            }
        }


        if(!empty($article)){
            $article->enabled=0;
            $article->save();
            $this->render('//site/info',array(
                'msg'=>'删除成功',
                'direct'=>$this->createUrl('manage/index',array('pid'=>$pid,'cate'=>$cid, 'iid'=>$iid)),
            ));
        }else{
            $this->render('//site/info',array(
                'msg'=>'没有权限',
                'direct'=>$this->createUrl('manage/index',array('cate'=>$cid)),
            ));
        }
    }

    public function actionDeluser()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $id=Yii::app()->request->getParam('id', 0);
        $user=Users::model()->findByPk($id);
        if(!empty($user)){
            $user->status=0;
            $user->save();
            $this->render('//site/info',array(
                'msg'=>'用户删除成功',
            ));
        }
    }

    public function actionUpinfo()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $id=Yii::app()->request->getParam('id', 0);
        $user=Users::model()->with('info')->findByPk($id);

        if(!empty($user)){
            $old_info=array(
                'director'=>isset($user->info->director)?$user->info->director:0,
                'expert'=>isset($user->info->expert)?$user->info->expert:0,
//                'audit'=>isset($user->info->audit)?$user->info->audit:0,
                'manager'=>isset($user->info->manager)?$user->info->manager:0,
            );

            $new_info=array(
                'director'=>$_POST['director'][$id],
                'expert'=>$_POST['expert'][$id],
//                'audit'=>$_POST['audit'][$id],
                'manager'=>$_POST['manager'][$id],
            );

            $message=array(
                'director'=>array('1'=>'恭喜，您被管理员设置为理事成员','0'=>'您被管理员取消理事成员资格'),
                'expert'=>array('1'=>'恭喜，您被管理员设置为专家成员','0'=>'您被管理员取消专家成员资格'),
//                'audit'=>array('0'=>'您的注册资料未通过审核','-1'=>'您的注册资料未审核','1'=>'恭喜，您的注册资料通过审核'),
                'manager'=>array('0'=>'您的被管理员取消管理团队资格','1'=>'恭喜，您的被管理员设置为管理团队成员'),
            );

            $info=UsersInfo::model()->findByPk($user->id);
            if(empty($info)){
                $info = new UsersInfo;
                $info->user_id=$user->id;
            }

            $info->director=$new_info['director'];
            $info->expert=$new_info['expert'];
//            $info->audit=$new_info['audit'];
            $info->manager=$new_info['manager'];
            $info->save();

            $this->render('_info',array(
                'user'=>$user,
                'old_info'=>$old_info,
                'new_info'=>$new_info,
                'message'=>$message,
            ));
        }
    }

    public function actionMessage()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }
        $message=$_POST['message'];
        $to_uid=intval($_POST['to_uid']);
        if(!empty($message) && ($to_uid>0)){
            $m=new Message();
            foreach($message as $v){
                $m->pid=0;
                $m->post_uid=YII::app()->user->id;
                $m->to_uid=$to_uid;
                $m->content=$v['content'];
                $m->status=0;
                $m->c_delete=1;
                $m->c_replay=1;
                $m->open=1;
                $m->title=$v['title'];
                $m->view=1;
                $m->time=date("Y-m-d H:i:s");
                $m->save();
            }
            $this->render('//site/info',array(
                'msg'=>'用户权限已经更新',
                'direct'=>$this->createUrl('manage/index',array('cate'=>14)),
            ));
            return;
        }

    }

    public function actionDelmsg()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $id=Yii::app()->request->getParam('id', 0);
        $user=Message::model()->findByPk($id);
        if(!empty($user)){
            if($user->c_delete==0){
                $this->render('//site/info',array(
                    'msg'=>'此消息不可删除',
                ));
                return;
            }
            $user->status=-1;
            $user->save();
            $this->render('//site/info',array(
                'msg'=>'删除消息成功',
            ));
        }
    }

    public function actionRepmsg()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $pid=intval(Yii::app()->request->getParam('pid', 0));
        $content=Yii::app()->request->getParam('content', 0);
        if(empty($content)){
            $this->render('//site/info',array(
                'msg'=>'请填写留言内容',
            ));
            return;
        }

        $criteria=new CDbCriteria;
        $criteria->condition='`t`.`status` > -1 AND `t`.`id` = :pid AND `t`.`open`=1 AND `t`.`view`=1 AND (`t`.`post_uid`=:post_uid OR `t`.`to_uid`=:to_uid)';
        $criteria->with=array('post_user','to_user');
        $criteria->params=array(':post_uid'=>YII::app()->user->id, ':to_uid'=>YII::app()->user->id, ':pid'=>$pid);
        $criteria->order="`t`.`time` ASC";

        $pmsg=Message::model()->find($criteria);

        if(!empty($pmsg)){
            if($pmsg->c_replay==0){
                $this->render('//site/info',array(
                    'msg'=>'当前消息不允许回复',
                ));
                return;
            }

            if(YII::app()->user->id==$pmsg->post_uid){        //发信
                $to_uid=$pmsg->to_uid;
                $pmsg->status=2;
                $pmsg->save();
            }elseif(YII::app()->user->id==$pmsg->to_uid){      //收信
                $pmsg->status=1;
                $pmsg->save();
                $to_uid=$pmsg->post_uid;
            }

            $new_msg=new Message();
            $new_msg->pid=$pmsg->id;
            $new_msg->post_uid=YII::app()->user->id;
            $new_msg->to_uid=$to_uid;
            $new_msg->content=$content;
            $new_msg->status=0;
            $new_msg->c_delete=1;
            $new_msg->c_replay=0;
            $new_msg->open=1;
            $new_msg->title='';
            $new_msg->view=1;
            $new_msg->time=date("Y-m-d H:i:s");
            $new_msg->save();
            $this->redirect($this->createUrl('manage/index', array('cate'=>15,'id'=>$pid)));

        }else{
            $this->render('//site/info',array(
                'msg'=>'请不要恶意提交数据',
            ));
            return;
        }
    }

    public function actionAdviser()
    {
        $model=new Adviser;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Adviser']))
        {
            $model->attributes=$_POST['Adviser'];
            $model->mktime=time();
            $model->status=1;

            //上传文件
//            pd($_POST);

            $photo = CUploadedFile::getInstance($model, 'photo');
            if(!empty($photo)){
                $photo_root = Yii::app()->getBasePath().'/../images/user/zc/';
                if(!is_dir($photo_root))
                    mkdir($photo_root,0777,true);
                $newName  = md5(rand(1,100).date('YmdHis').rand(1,1000)).'.'.$photo->extensionName;
                if (is_object($photo)) {
                    $photo->saveAs($photo_root.$newName);
                    $model->photo='/images/user/zc/'.$newName;
                }
            }

            if($model->save())
            {
                $this->render('//site/info',array(
                    'msg'=>'设置智策顾问成功',
                    'direct'=>$this->createUrl('manage/index',array('cate'=>23)),
                ));
            }else{
                foreach($model->errors as $e_k => $e_v){
                    break;
                }
                $this->render('//site/error',array(
                    'message'=>$e_v[0],
                ));
            }
        }


    }

    public function actionDelav()
    {
        if(empty(YII::app()->user->id)){
            throw new CHttpException(400,'请先登录.');
        }

        $id=Yii::app()->request->getParam('id', 0);
        $av=Adviser::model()->findByPk($id);

        if(!empty($av)){
            $av->status=0;
            $av->save();
            $this->render('//site/info',array(
                'msg'=>'删除成功',
            ));
        }
        $this->render('//site/info',array(
            'msg'=>'没有权限',
        ));
    }

}
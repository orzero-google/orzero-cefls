<?php
$this->pageTitle=Yii::app()->name . ' - '.'会员中心';

if(isset($user_info->superuser) && $user_info->superuser==1){
    //管理员
    $items=array(
     array('name'=>'个人信息管理', 'pid'=>'1', 'items'=>array(
        array('name'=>'修改注册信息', 'cate'=>'1', 'iid'=>'1'),
        array('name'=>'密码修改', 'cate'=>'2', 'iid'=>'2'),
        array('name'=>'交纳会费', 'cate'=>'3', 'iid'=>'3'),
        array('name'=>'站内消息', 'cate'=>'4', 'iid'=>'4'),
        array('name'=>'会员升级', 'cate'=>'10', 'iid'=>'5'),
//        array('name'=>'站内信件详情', 'cate'=>'15'),
     )),

    array('name'=>'招聘信息', 'pid'=>'2', 'items'=>array(
        array('name'=>'招聘信息发布', 'cate'=>'5', 'iid'=>'1'),
        array('name'=>'已经发布的招聘职位', 'cate'=>'6', 'iid'=>'2'),
        array('name'=>'应聘者信息', 'cate'=>'7', 'iid'=>'3'),
        array('name'=>'审核招聘信息', 'cate'=>'26', 'iid'=>'4'),
//        array('name'=>'修改招聘信息', 'cate'=>'11'),
    )),

    array('name'=>'会员学术成就', 'pid'=>'3', 'items'=>array(
        array('name'=>'发布会员学术成就', 'cate'=>'8', 'iid'=>'1'),
        array('name'=>'已经发布的会员学术成就', 'cate'=>'9', 'iid'=>'2'),
//        array('name'=>'审核学术成就', 'cate'=>'24'),
//        array('name'=>'修改学术成就', 'cate'=>'12'),
    )),

    array('name'=>'会员产权成果', 'pid'=>'4', 'items'=>array(
        array('name'=>'发布会员产权成果', 'cate'=>'16', 'iid'=>'1'),
        array('name'=>'已经发布会员产权成果', 'cate'=>'18', 'iid'=>'2'),
//        array('name'=>'修改产权成果', 'cate'=>'20'),
    )),

    array('name'=>'学术论道撷英', 'pid'=>'5', 'items'=>array(
        array('name'=>'发布学术论道撷英', 'cate'=>'17', 'iid'=>'1'),
        array('name'=>'已经发布学术论道撷英', 'cate'=>'19', 'iid'=>'2'),
//        array('name'=>'修改学术动态', 'cate'=>'21'),
    )),

    array('name'=>'智策顾问', 'pid'=>'6', 'items'=>array(
        array('name'=>'新增智策顾问', 'cate'=>'22', 'iid'=>'1'),
        array('name'=>'管理智策顾问', 'cate'=>'23', 'iid'=>'2'),
    )),

        array('name'=>'关于学会', 'cate'=>'25', 'items'=>array(
            array('name'=>'学会概况', 'iid'=>'10'),
            array('name'=>'章法条则', 'iid'=>'11'),
            array('name'=>'组织结构', 'iid'=>'12'),
            array('name'=>'大事纪要', 'iid'=>'13'),
        )),

    array('name'=>'会员管理', 'pid'=>'7', 'items'=>array(
        array('name'=>'会员权限审核', 'cate'=>'14', 'iid'=>'1'),
        array('name'=>'会员发布审核', 'cate'=>'27', 'iid'=>'2'),
        array('name'=>'会员付费信息', 'cate'=>'28', 'iid'=>'3'),
    )),

        array('name'=>'学会动态', 'cate'=>'29', 'items'=>array(
            array('name'=>'公示公告', 'iid'=>'16'),
            array('name'=>'学会活动', 'iid'=>'17'),
            array('name'=>'关注学会', 'iid'=>'18'),
        )),

        array('name'=>'站内文章管理', 'pid'=>'8', 'items'=>array(
            array('name'=>'已经发布站内文章', 'cate'=>'30', 'iid'=>'1'),
        )),

        array('name'=>'理事', 'pid'=>'9', 'items'=>array(
            array('name'=>'年度理事列表', 'cate'=>'31', 'iid'=>'19'),
        )),

        array('name'=>'[进入管理后台]', 'cate'=>'13'),


    );
    $user_title='管理员';
    $user_type='管理员';
}
elseif($user_info->p->type_pg==1 && in_array($user_info->p->type_p_vasn, array(1,2,3,4))){
    $user_type='个人会员';
    //个人会员
    if($user_info->p->type_p_vasn==1){
        //尊贵会员
        $items=array(
            array('name'=>'修改注册信息', 'cate'=>'1'),
            array('name'=>'密码修改', 'cate'=>'2'),
            array('name'=>'交纳会费', 'cate'=>'3'),
            array('name'=>'站内邮箱', 'cate'=>'4'),
            array('name'=>'发布学术成就', 'cate'=>'8'),
            array('name'=>'已发布的学术成就', 'cate'=>'9'),
        );
        $user_title='尊最会员';
        if(!in_array($cate, array(1,2,3,4,8,9,15,12))){
            $this->oz_error('没有权限','/');
            return;
        }

    }elseif($user_info->p->type_p_vasn==2) {
        //高级会员
        $items=array(
            array('name'=>'修改注册信息', 'cate'=>'1'),
            array('name'=>'密码修改', 'cate'=>'2'),
            array('name'=>'交纳会费', 'cate'=>'3'),
            array('name'=>'站内邮箱', 'cate'=>'4'),
            array('name'=>'会员升级', 'cate'=>'10'),
            array('name'=>'发布学术成就', 'cate'=>'8'),
            array('name'=>'已发布的学术成就', 'cate'=>'9'),
        );
        $user_title='高级会员';
        if(!in_array($cate, array(1,2,3,4,8,9,10,15,12))){
            $this->oz_error('没有权限','/');
            return;
        }

    }elseif($user_info->p->type_p_vasn==3) {
        //普善会员
        $items=array(
            array('name'=>'修改注册信息', 'cate'=>'1'),
            array('name'=>'密码修改', 'cate'=>'2'),
            array('name'=>'交纳会费', 'cate'=>'3'),
            array('name'=>'站内邮箱', 'cate'=>'4'),
            array('name'=>'会员升级', 'cate'=>'10'),
        );
        $user_title='普善会员';
        if(!in_array($cate, array(1,2,3,4,10,15,12))){
            $this->oz_error('没有权限','/');
            return;
        }

    }elseif($user_info->p->type_p_vasn==4) {
        //晋学会员
        $items=array(
            array('name'=>'修改注册信息', 'cate'=>'1'),
            array('name'=>'密码修改', 'cate'=>'2'),
            array('name'=>'交纳会费', 'cate'=>'3'),
            array('name'=>'站内邮箱', 'cate'=>'4'),
            array('name'=>'会员升级', 'cate'=>'10'),
        );
        $user_title='晋学会员';
        if(!in_array($cate, array(1,2,3,4,10,15,12))){
            $this->oz_error('没有权限','/');
            return;
        }
    }
}
elseif($user_info->p->type_pg==2 && in_array($user_info->p->type_g_pebg, array(1,2,3,4))){
    $user_type='团体会员';
    //团体会员会员
    if($user_info->p->type_g_pebg==1){
        //公共机构
        $user_title='公共机构';

    }elseif($user_info->p->type_g_pebg==2) {
        //学校教育
        $user_title='学校教育';

    }elseif($user_info->p->type_g_pebg==3) {
        //公司企业
        $user_title='公司企业';

    }elseif($user_info->p->type_g_pebg==4) {
        //其他团体
        $user_title='其他团体';

    }
    $items=array(
        array('name'=>'修改注册信息', 'cate'=>'1'),
        array('name'=>'密码修改', 'cate'=>'2'),
        array('name'=>'交纳会费', 'cate'=>'3'),
        array('name'=>'站内邮箱', 'cate'=>'4'),
        array('name'=>'招聘信息发布', 'cate'=>'5'),
        array('name'=>'已经发布的招聘职位', 'cate'=>'6'),
        array('name'=>'应聘者信息', 'cate'=>'7'),
    );
    if(!in_array($cate, array(1,2,3,4,5,6,7,15,11,12))){
        $this->oz_error('没有权限','/');
        return;
    }
}

$pid=Yii::app()->request->getParam('pid', 0);
$iid=Yii::app()->request->getParam('iid', 0);
$_menu_sidebar='';
$c=1;
$cs=Yii::app()->clientScript;
foreach($items as $one){
    if(!empty($one['items'])){
        $c++;
        $cs->registerScript('items'.$c,'$("#cid-sub-'.$c.'").click(function(){$("#id-sub-'.$c.'").toggle();});');
        $_one_url='javascript:viod();';
    }else{
        $_one_url=$this->createUrl('manage/index',array('cate'=>$one['cate']));
    }

    if((isset($one['cate']) && $one['cate']==$cate) || (isset($one['pid']) && $one['pid']==$pid)){
        $_menu_sidebar.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').' class="m"><span class="first"></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
    }else{
        $_menu_sidebar.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').'><span></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
    }

    $items_html='';
    if(!empty($one['items'])){
        foreach($one['items'] as $i_one){
            if(isset($one['pid'])){
                $i_one_url=$this->createUrl('manage/index',array('pid'=>$one['pid'], 'cate'=>$i_one['cate'], 'iid'=>$i_one['iid']));
            }elseif(isset($one['cate'])){
                $i_one_url=$this->createUrl('manage/index',array('cate'=>$one['cate'], 'iid'=>$i_one['iid']));
            }

            $items_html.='<li'.(((isset($one['cate']) && $one['cate']==$cate) && $iid==$i_one['iid']) || ($iid==$i_one['iid'] && (isset($one['pid']) && $one['pid']==$pid))?' class="x"':'').'><span></span><a href="'.
                $i_one_url.'">'.$i_one['name'].'</a></li>';
        }
        $_menu_sidebar .= '<li style="display: block;" id="id-sub-'.$c.'" class="sub"><ul class="sub-leftmenu">'.$items_html.'</ul></li>';
    }
}



//$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/change.js',CClientScript::POS_HEAD );




?>

<div class="subpageContainer">
    <div class="left">
        <!--标题-->
        <div class="k-title sub-title">
            <div class="l"><?php echo '会员管理中心'; ?></div>
            <div class="r"></div>
        </div>
        <!--列表内容-->
        <div class="subpage-left-content">
            <ul class="leftmenu black">
                <?php echo $_menu_sidebar; ?>
            </ul>
        </div>
        <!--底部圆角-->
        <div class="k-fot sub-fot"> <span class="fotright"></span> </div>
        <!--圆角结束-->
    </div>
    <div class="right">
        <div class="detailContent-title">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'htmlOptions'=>array('class'=>'local'),
                'separator'=>'&nbsp;&gt;&nbsp;',
                'links'=>array(
                    '会员管理中心'=>$this->createUrl('manage/index'),
                ),
                'homeLink'=>'当前位置：首页',
                'tagName'=>'span',
            )); ?><!-- breadcrumbs -->
            <?php endif?>
        </div>

        <?php
//            echo $this->renderPartial('items/'.$cate, array(
//                'user_info'=>$user_info,
//                'user_title'=>$user_title,
//                'user_type'=>$user_type,
//            ));
        ?>
    </div>
    <div class="clear"></div>
</div>
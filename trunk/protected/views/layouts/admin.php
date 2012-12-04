<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/css.css" />

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/menu.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/sub-lunhuan.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/side.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/add.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/banner.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/add.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!--最外面-->
<div class="wrapper" id="wrap">
    <div id="main" class="clearfix">
        <!-- 顶部模块-->
        <div class="header black">
            <div  class="hot"><span><a href="/">返回首页</a></span>|<span><a href="/index.php?r=article/title&name=联系我们">联系我们</a></span>
                |
                <span class="member black1"><a href="<?php echo $this->createUrl('manage/index');?>">会员中心</a></span></div>
            <div class="search">
                <form method="post" action="<?php echo $this->createUrl('article/search');?>">
                    <input type="text" name="search" id="search" class="input" size="40"/>
                    <div id="selectItem2" class="selectItemhidden">
                        <!--                    <div id="selectItemAd" class="selectItemtit bgc_ccc">-->
                        <!--                        <h2 id="selectItemTitle" class="selectItemleft">搜索框内容提示</h2>-->
                        <!--                        <div id="selectItemClose" class="selectItemright">关闭</div>-->
                        <!--                    </div>-->
                        <div id="selectItemCount" class="selectItemcont">
                            <div id="selectSub">
                                学术成就文章、个人会员技能优势标签关键词
                            </div>
                        </div>
                    </div>
                    <div class="but"><input type="submit" id="theLink" style="font-size: 0;" onclick="if(search.value.length<3){alert('至少三个字符');return false;}" /></div>
                </form>
            </div>
        </div><!-- header -->

        <!-- 菜单模块-->
        <div id="mainmenu">
            <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'关于学会', 'url'=>array('/cate/list', 'pid'=>1), 'itemOptions'=>array('class'=>'w90', 'onmouseover'=>'javascript:cmenu(0);')),
                array('label'=>'学会动态', 'url'=>array('/cate/list', 'pid'=>2), 'itemOptions'=>array('class'=>'w90', 'onmouseover'=>'javascript:cmenu(1);')),
                array('label'=>'学会大家庭', 'url'=>array('/cate/list', 'pid'=>3), 'itemOptions'=>array('class'=>'w100', 'onmouseover'=>'javascript:cmenu(2);')),
                array('label'=>'学会专家团', 'url'=>array('/cate/list', 'pid'=>4), 'itemOptions'=>array('class'=>'w100', 'onmouseover'=>'javascript:cmenu(3);')),
                array('label'=>'会员学术成就', 'url'=>array('/cate/list', 'pid'=>5), 'itemOptions'=>array('class'=>'w116', 'onmouseover'=>'javascript:cmenu(4);')),
                array('label'=>'会员产权成果', 'url'=>array('/cate/list', 'pid'=>6), 'itemOptions'=>array('class'=>'w116', 'onmouseover'=>'javascript:cmenu(5);')),
                array('label'=>'学术论道撷英', 'url'=>array('/cate/list', 'pid'=>7), 'itemOptions'=>array('class'=>'w116', 'onmouseover'=>'javascript:cmenu(6);')),
                array('label'=>'学术刊物集萃', 'url'=>array('/cate/list', 'pid'=>8), 'itemOptions'=>array('class'=>'w116', 'onmouseover'=>'javascript:cmenu(7);')),
                array('label'=>'团体会员招聘', 'url'=>array('/cate/list', 'pid'=>9), 'itemOptions'=>array('class'=>'w116', 'onmouseover'=>'javascript:cmenu(8);')),
            ),
            'htmlOptions'=>array('class'=>'menu mouse'),
        )); ?>
            <div id="index-menu-1" class='submenu red'>
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'htmlOptions'=>array('class'=>'main_menu'),
                    'separator'=>'&nbsp;|&nbsp;',
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>false,
                    'tagName'=>'p',
                )); ?><!-- breadcrumbs -->
                <?php endif?>
            </div>
        </div><!-- mainmenu -->

        <?php echo $content; ?>

        <div class="clear"></div>


        <!--end -->
    </div>
</div><!-- page -->

<!-- 版权信息-->
<div class="copyright black" id="footer">
    <p>&nbsp;</p>
    <p><span><a href="/index.php?r=article/title&name=关于我们" title="关于我们">关于我们</a></span>
        <span><a href="/index.php?r=article/title&name=网站声明" title="网站声明">网站声明</a></span>
        <span><a href="/index.php?r=article/title&name=联系我们" title="联系我们">联系我们</a></span></p>
    <p> 网站版权所有者：四川省计算机学会    运维支持单位：成都互正超媒网络科技有限公司 </p>
    <p> Copyright©2011-2014  (www.spcf.cn )    All Right Reserved </p>
    <p>蜀ICP备12010408号-1</p>
</div>
<!--    <div class="h8"></div>-->

<script>
    jQuery.fn.selectCity = function(targetId) {
        var _seft = this;
        var targetId = $(targetId);

        this.click(function(){
            var A_top = $(this).offset().top + $(this).outerHeight(true);  //  1
            var A_left =  $(this).offset().left;
            targetId.bgiframe();
            targetId.show().css({"position":"absolute","top":A_top+"px" ,"left":A_left+"px"});
        });

        targetId.find("#selectItemClose").click(function(){
            targetId.hide();
        });

        $(document).click(function(event){
            if(event.target.id!=_seft.selector.substring(1)){
                targetId.hide();
            }
        });

        targetId.click(function(e){
            e.stopPropagation(); //  2
        });

        return this;
    }
    $(function(){
        $("#search").selectCity("#selectItem2");
    });

    var tt='<?php echo CHtml::encode($this->pageTitle); ?>';
    var i=0;
    function flash_title()
    {
        var tmp='';
        for(var m=i;m<tt.length;m++){
            tmp+=tt.substring(m, m+1);
        }

        document.title=tmp+'\u2000|\u2000'+tt.substring(0, i);

        i++;
        if(i==tt.length+1){
            i=0;
        }
        setTimeout("flash_title()",800);
    }
    flash_title();
</script>

<?php
$user=new User;
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/jquery.bgiframe.js',CClientScript::POS_HEAD );
$header_img=Ads::model()->find('type=2');
if(isset($header_img->img)){
    $cs->registerCss('header',
        '.header {
        background-image: url("/../images/gallery/'.$header_img->img.'");
    }');
}
?>

</body>
</html>

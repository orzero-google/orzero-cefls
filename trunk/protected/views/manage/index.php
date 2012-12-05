<?php
$this->pageTitle=Yii::app()->name . ' - '.'管理员后台';
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/css.css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/menu.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/sub-lunhuan.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/side.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/add.js" type="text/javascript"></script>


<div class="subpageContainer">
    <div class="left">
        <!--标题-->
        <div class="k-title sub-title">
            <div class="l"><?php echo '管理员后台'; ?></div>
            <div class="r"></div>
        </div>
        <!--列表内容-->
        <div class="subpage-left-content">
            <ul class="leftmenu black">
                <?php echo get_admin_sidebar(); ?>
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
                    '管理员后台'=>$this->createUrl('manage/index'),
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
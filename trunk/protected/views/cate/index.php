<?php
$this->breadcrumbs=array(
    $sub_menu->menu_name,
);
$this->pageTitle=Yii::app()->name .' - '. $sub_menu->menu_name;
?>

<!-- container -->
<div class="container">
    <?php echo get_left_menu($pid);?>
    <div class="right">
        <p class="path">当前位置: <a href="<?php echo Yii::app()->createUrl('cate/index', array('pid'=>$pid, 'cid'=>$sub_menu->menu_id));?>"><?php echo $sub_menu->menu_name;?></a></p>
        <div class="article">
            <div class="top"></div>

            <?php
            echo $this->renderPartial('items/'.$cid, array(
                'cid'=>$cid,
            ));
            ?>

            <div class="bottom" id="bottom"></div>
        </div>
    </div>
</div>
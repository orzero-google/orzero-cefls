<?php
$this->breadcrumbs=array(
    $sub_menu->menu_name,
);
$this->pageTitle=Yii::app()->name .' - '. $sub_menu->menu_name;
?>

<!-- container -->
<div class="container">
    <div class="right" style="background:#fff; margin:0 auto;">
        <p class="path">当前位置: <a href="<?php echo Yii::app()->createUrl('cate/index', array('cid'=>$sub_menu->menu_id));?>"><?php echo $sub_menu->menu_name;?></a></p>
        <div class="article">
            <?php
            if($cid==61){
                echo $this->renderPartial('//cefls/mail', array(
                ));
            }
            ?>

        </div>
    </div>
</div>
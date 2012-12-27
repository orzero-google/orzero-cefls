<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`=:cid AND `type`=-2 AND `enabled`=1';
$criteria->params=array(':cid'=>$cid);
$criteria->order='`sort` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Article',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>15,
    ),
));

?>

<div class="top"></div>
<div class="middle">
    <div class="imglist" style="height: 747px;">
        <?php
        $this->widget('application.vendors.OListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//cefls/article/teacher_view',
            'ajaxUpdate'=>true,
            'template'=>"{items}" ,
            'itemsTagName'=>'ul',
        ));
        ?>
    </div>
    <?php
    $this->widget('application.vendors.OListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cefls/article/teacher_view',
        'ajaxUpdate'=>true,
        'template'=>"{pager}"
    ));
    ?>
</div>
<div class="bottom"></div>
<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`=:cid AND `type`=-10 AND `enabled`=1';
$criteria->params=array(':cid'=>$cid);
$criteria->order='`order` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Ads',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>4,
    ),
));

?>

<div class="top"></div>
<div class="middle">
    <div class="imglist" style="height: 747px;">
        <?php
        $this->widget('application.vendors.OListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//cefls/article/student_view',
            'ajaxUpdate'=>true,
            'template'=>"{items}" ,
            'itemsTagName'=>'ul',
        ));
        ?>
    </div>
    <?php
    $this->widget('application.vendors.OListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cefls/article/student_view',
        'ajaxUpdate'=>true,
        'template'=>"{pager}"
    ));
    ?>
</div>
<div class="bottom"></div>
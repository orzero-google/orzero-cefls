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

$criteria=new CDbCriteria;
$criteria->condition='`cid`=0 AND enabled=1';
$criteria->condition='`cid`=0 AND enabled=1 AND type='.$cid;
$criteria->order='`order` ASC, `aid` DESC';
$imgs = Ads::model()->findAll($criteria);
?>



<div class="middle" style="min-height: 800px;">
    <div style="text-align: center;">
<?php
    foreach($imgs as $img){
        echo '<div><a href="'.$img->url.'"><img src="'.$img->img.'" /></a></div>';
        echo '<div><a href="'.$img->url.'">'.nl2br_blank_ext($img->title).'</a></div><br />';
    }
?>
    </div>

    <div class="imglist">
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

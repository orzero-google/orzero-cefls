<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`='.$cid.' AND enabled=1';
$criteria->order='`sort` ASC';
$dataProvider=new CActiveDataProvider('Article',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>8,
    ),
));
$page=intval(Yii::app()->request->getParam('Article_page', 1));
?>

<div class="top" style="height:72px;">
    <div class="thingsTitle"></div>
</div>
<div class="middle">
    <div class="thingsList">
        <?php
        if(!empty($dataProvider->data))
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'//cate/items/'.$cid.'/_view',
                'ajaxUpdate'=>false,
                'template'=>"{items}\n{pager}" ,
            ));
        ?>
    </div>
</div>
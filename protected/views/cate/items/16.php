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
        <?php
        $GLOBALS['i']=1;
        if(!empty($dataProvider->data))
            $this->widget('application.vendors.OListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'//cate/items/'.$cid.'/_view',
                'ajaxUpdate'=>false,
                'template'=>"{items}" ,
                'htmlOptions'=>array('class'=>'thingsList'),
                'jump'=>false,
            ));
        ?>
</div>
<?php
//pd($dataProvider->getPagination());

echo '<div class="bottom" style="text-align: center;">';

$this->widget('application.vendors.OListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//cate/items/'.$cid.'/_view',
    'ajaxUpdate'=>false,
    'template'=>"{pager}" ,
    'htmlOptions'=>array('class'=>'thingsList'),
    'jump'=>false,
));

echo '</div>';
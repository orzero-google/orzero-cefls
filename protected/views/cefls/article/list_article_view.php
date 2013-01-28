<?php
$criteria=new CDbCriteria;
if(in_array($cid, array(62,63,64))){
    $criteria->condition='`cid`='.$cid.' AND `enabled`=1 AND type=-13';
}else{
    $criteria->condition='`cid`='.$cid.' AND `enabled`=1 AND type=-11';
}

$criteria->order='`sort` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Article',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>13,
    ),
));

?>

<div class="top">
    <p class="th_blue">
        <span class="field1">标  题</span>
        <span class="field2"><?php echo $info;?></span>
        <span class="field3">发布人</span>
        <span class="field4">发布时间</span>
        <span class="field5">点击量</span>
    </p>
</div>

<?php
if(!empty($dataProvider->data))
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cefls/article/list_article_content',
        'ajaxUpdate'=>false,
        'template'=>"{items}" ,
        'itemsTagName'=>'div',
        'htmlOptions'=>array('class'=>'middle'),
    ));
?>

<?php
$this->widget('application.vendors.OListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'//cefls/article/list_article_content',
    'ajaxUpdate'=>false,
    'template'=>"{pager}" ,
    'htmlOptions'=>array('style'=>'padding:0;margin-top: -5px;'),
));
?>
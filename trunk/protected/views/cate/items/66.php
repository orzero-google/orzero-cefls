<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`='.$cid.' AND `enabled`=1';
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
        <span class="field2">信息来源</span>
        <span class="field3">发布人</span>
        <span class="field4">发布时间</span>
        <span class="field5">点击量</span>
    </p>
</div>

<?php
if(!empty($dataProvider->data))
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cate/items/66/_view',
        'ajaxUpdate'=>false,
        'template'=>"{items}" ,
        'itemsTagName'=>'div',
        'htmlOptions'=>array('class'=>'middle'),
    ));
?>

    <?php
    $this->widget('application.vendors.OListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cefls/items/66/_view',
        'ajaxUpdate'=>false,
        'template'=>"{pager}" ,
        'htmlOptions'=>array('style'=>'padding:0;margin-top: -5px;'),
    ));
    ?>

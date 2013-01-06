<?php
$pid=Yii::app()->request->getParam('pid', 0);
$cid=Yii::app()->request->getParam('cid', 0);
?>

<p class="items" style="border-bottom:1px solid #F7D2CC;">
    <span class="field1"><a href="<?php echo Yii::app()->createUrl('cate/index',array('pid'=>$pid,'cid'=>$cid,'id'=>$data->aid)); ?>"><?php echo CHtml::encode($data->title);?></a></span>
    <span class="field2"><?php echo CHtml::encode($data->from);?></span>
    <span class="field3"><?php echo CHtml::encode($data->author);?></span>
    <span class="field4"><?php echo substr($data->createtime, 0, 10);?></span>
    <span class="field5"><?php echo $data->clicknumber;?></span>
</p>
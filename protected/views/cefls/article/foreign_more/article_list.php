<li>
    <span>(<?php echo substr($data->createtime, 0, 10);?>)</span>
    <a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>$GLOBALS['cid'],'aid'=>(isset($data->aid) ? $data->aid : 0))); ?>">
        <?php echo CHtml::encode($data->{"title_".$GLOBALS['key']});?>
    </a>
</li>
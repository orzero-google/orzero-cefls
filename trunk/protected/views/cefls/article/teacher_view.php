<?php
$pid=Yii::app()->request->getParam('pid', 0);
$cid=Yii::app()->request->getParam('cid', 0);
$tid=Yii::app()->request->getParam('tid', 0);
?>
<div class="imgitem">
    <a href="<?php echo $this->createUrl('cate/index', array('pid'=>$pid, 'cid'=>$cid, 'tid'=>$data->aid)); ?>" width="150" height="210"><img src="<?php echo $data->file; ?>" width="150" height="210" alt=""></a>
    <p><a href="<?php echo $this->createUrl('cate/index', array('pid'=>$pid, 'cid'=>$cid, 'tid'=>$data->aid)); ?>"><?php echo $data->title; ?>：<?php echo $data->author; ?></a></p>
</div>
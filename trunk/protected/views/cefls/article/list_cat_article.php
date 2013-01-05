<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>4, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_article', 'pid'=>4, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
    <?php echo CHtml::encode($data->createtime); ?>
    <br />

</div>
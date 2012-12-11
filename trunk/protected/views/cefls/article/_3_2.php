<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>3, 'cid'=>1, 'id'=>$data->aid)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
    <?php echo CHtml::encode($data->createtime); ?>
    <br />

</div>
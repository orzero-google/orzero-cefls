<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('aid')); ?>:<?php echo $data->aid; ?></b>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>2, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_ads', 'pid'=>2, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode(get_ads_type($data->type)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />
    <img src="<?php echo $data->img; ?>" />
    <br />

</div>
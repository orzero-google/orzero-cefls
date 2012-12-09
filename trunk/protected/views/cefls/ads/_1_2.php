<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('aid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->aid.'(修改)'), array('manage/index', 'pid'=>1, 'cid'=>1, 'id'=>$data->aid)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode(get_ads_type($data->type)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />
    <img src="<?php echo $data->img; ?>" />
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->url), $data->url); ?>
    <br />
</div>
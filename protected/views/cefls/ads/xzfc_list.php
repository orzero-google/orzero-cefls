<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('aid')); ?>:<?php echo $data->aid; ?></b>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>9, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_ads', 'pid'=>9, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <img src="<?php echo $data->img; ?>" /><br />

    <b>所属分类:</b>
    <?php echo CHtml::encode(get_xzfc_type($data->cid)); ?>
    <br />

    <b>名字:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />

    <b>获奖说明:</b>
    <?php echo CHtml::encode($data->url); ?>
    <br />
</div>
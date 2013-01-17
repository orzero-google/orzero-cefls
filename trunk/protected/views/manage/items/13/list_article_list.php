<div class="view">
    <b>分类:</b>
    <?php
    $list_array = array(
        62=>'英语佳作',
        63=>'法语佳作',
        64=>'德语佳作',
    );
    echo CHtml::encode($list_array[$data->cid]); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>13, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_article', 'pid'=>13, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
    <?php echo CHtml::encode($data->createtime); ?>
    <br />

</div>
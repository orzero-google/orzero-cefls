<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('title_fr')); ?>:</b>
    <?php echo CHtml::encode($data->title_fr); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('title_de')); ?>:</b>
    <?php echo CHtml::encode($data->title_de); ?>
    <br />

    <b>操作:</b>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>5, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_article_foreign', 'pid'=>5, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
    <?php echo CHtml::encode($data->createtime); ?>
    <br />

</div>
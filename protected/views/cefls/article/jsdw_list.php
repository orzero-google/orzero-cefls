<div class="view">
    <b>ID:<?php echo $data->aid; ?></b>
    <?php echo CHtml::link(CHtml::encode('[修改]'), array('manage/index', 'pid'=>10, 'cid'=>1, 'id'=>$data->aid)); ?>
    <?php echo CHtml::link(CHtml::encode('[删除]'), array('manage/del_article', 'pid'=>10, 'cid'=>2, 'id'=>$data->aid),
    array('onclick'=>'return confirm("确定删除？");')); ?>
    <br />

    <img src="<?php echo $data->file; ?>" /><br />

    <b>所属分类:</b>
    <?php
    if($data->cid == -1){
        echo '领导班子';
    }else{
        echo CHtml::encode(get_jsdw_type($data->cid));
    }
    ?>
    <br />

    <b>名字:</b>
    <?php echo CHtml::encode($data->author); ?>
    <br />

    <b>职位:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />
</div>
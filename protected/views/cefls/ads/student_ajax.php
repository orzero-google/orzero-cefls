<div class="numberOne">
    <a href="#"><img src="<?php echo $data->img; ?>" width="280" height="209" alt=""></a>
    <div class="info">
        <p>
            <?php
            if($cid != 50){
                echo CHtml::link(CHtml::encode($data->title), array('cate/index', 'pid'=>7, 'cid'=>$cid, 'id'=>$data->aid));
            }else{
                echo CHtml::link(CHtml::encode($data->title), '#');
            }
            ?>
        </p>
        <p><?php echo CHtml::encode($data->url); ?></p>
    </div>
</div>
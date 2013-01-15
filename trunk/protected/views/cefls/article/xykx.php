<?php
$ads = Ads::model()->find('cid=0 AND type=-8 AND enabled=1');
?>
<div class="middle">
    <div class="middleTop"><span><a href="/index.php/cate/index?cid=66"><img src="/cefls/images/index_r11_c19.jpg" alt="更多"></a></span></div>
    <div class="middleMiddle">
        <div class="content">
            <div class="cLeft">
                <h3 class="title">
                    <?php if(isset($articles[0]->aid)):?>
                    <a style="display: block;width: 250px;overflow: hidden;white-space: nowrap;-o-text-overflow: ellipsis;text-overflow: ellipsis;" href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>66, 'aid'=>$articles[0]->aid)); ?>">
                        <?php //echo isset($articles[0]->title) ? CHtml::encode(mb_substr($articles[0]->title,0 ,16, 'utf-8')) : '';
                            echo isset($articles[0]->title) ? CHtml::encode($articles[0]->title) : '';
                        ?>
                    </a>
                    <?php endif;?>
                </h3>
                <p class="describe"><?php echo isset($articles[0]->excerpt) ? CHtml::encode($articles[0]->excerpt) : '';?></p>
            </div>

            <div class="cRight">
                <a href="<?php echo isset($ads->url) ? $ads->url : ''; ?>">
                    <img src="<?php echo isset($ads->img) ? $ads->img : ''; ?>" width="177" height="128" alt="<?php echo isset($ads->title) ? $ads->title : ''; ?>" />
                </a>
            </div>
        </div>
    </div>
    <div class="middleBottom">
        <?php for($i=1;$i<6;$i++): ?>
        <p>
            <span><?php echo isset($articles[$i]->createtime) ? substr($articles[$i]->createtime, 0, 10):'';?></span>
            <?php if(!empty($articles[$i])): ?>
            <a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>66, 'aid'=>$articles[$i]->aid)); ?>"><?php echo isset($articles[$i]->title) ? CHtml::encode($articles[$i]->title) : '';?></a>
            <?php endif;?>
        </p>
        <?php endfor;?>
    </div>
</div>
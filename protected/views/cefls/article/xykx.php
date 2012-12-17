<div class="middle">
    <div class="middleTop"><span><a href="/index.php/cate/index?cid=66"><img src="/cefls/images/index_r11_c19.jpg" alt="更多"></a></span></div>
    <div class="middleMiddle">
        <div class="content">
            <div class="cLeft">
                <h3 class="title"><a href="#"><?php echo isset($articles[0]->title) ? CHtml::encode($articles[0]->title) : '';?></a></h3>
                <p class="describe"><?php echo isset($articles[0]->excerpt) ? CHtml::encode($articles[0]->excerpt) : '';?></p>
            </div>
            <div class="cRight"><a href="#"><img src="/cefls/images/5.jpg" width="177px" height="128px" alt="我校第九届活动周顺利开幕" /></a></div>
        </div>
    </div>
    <div class="middleBottom">
        <?php for($i=1;$i<6;$i++): ?>
        <p>
            <span><?php echo isset($articles[$i]->createtime) ? substr($articles[$i]->createtime, 0, 10):'';?></span>
            <a href="#"><?php echo isset($articles[$i]->title) ? CHtml::encode($articles[$i]->title) : '';?></a>
        </p>
        <?php endfor;?>
    </div>
</div>
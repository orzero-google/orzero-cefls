<div class="top" style="width:970px; height:100px; overflow:hidden;">
    <div class="foreginTopBorder">
        <h1 class="title"><?php echo isset($article->{"title_".$key})? $article->{"title_".$key} : '';?></h1>
        <p class="authorinfo">
            <span>信息来源：<?php echo isset($article->{"from_".$key})? $article->{"from_".$key} : '';?></span>
            <span>发布时间：<?php echo isset($article->createtime)? $article->createtime : '';?></span>
            <span>点击量：<?php echo isset($article->{"clicknumber_".$key}) ? $article->{"clicknumber_".$key} : '';?></span>
        </p>
    </div>
</div>
<div class="middle" style="width:970px;">
    <div class="foreginBottomBorder">
        <?php echo isset($article->{"content_".$key})? $article->{"content_".$key} : '';?>
        <div class="previous"><a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>$cid)); ?>"><img src="/cefls/images/container_r5_c9.jpg" alt=""></a></div>
    </div>
</div>
<div class="bottom" style="width:970px;"></div>


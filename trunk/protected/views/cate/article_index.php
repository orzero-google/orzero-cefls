<div class="top" style="width:970px; height:100px; ">
    <div class="foreginTopBorder">
        <p class="authorinfo">
            <span>信息来源：<?php echo isset($article->from)? $article->from : '';?></span>
            <span>发布时间：<?php echo isset($article->createtime)? $article->createtime : '';?></span>
            <span>点击量：<?php echo isset($article->clicknumber) ? $article->clicknumber : '';?></span>
        </p>
    </div>
</div>
<div class="middle" style="width:970px;">
    <div class="foreginBottomBorder">
        <?php echo isset($article->content)? $article->content : '';?>
    </div>
</div>
<div class="top" style="width:970px; height:100px; ">
    <div class="foreginTopBorder">
        <h1 class="title"><?php echo isset($article->title)? $article->title : '';?></h1>
        <p class="authorinfo">
            <span>信息来源：<?php echo isset($article->from)? $article->from : '';?></span>
            <span>发布人：<?php echo isset($article->author)? $article->author : '';?></span>
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


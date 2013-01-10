<div class="top" style="width:970px; ">
    <div class="foreginTopBorder">
        <p class="authorinfo">
            <span>信息来源：<?php echo isset($article->from)? $article->from : '';?></span>
            <span>发布人：<?php echo isset($article->author)? $article->author : '';?></span>
            <span>发布时间：<?php echo isset($article->createtime)? $article->createtime : '';?></span>
            <span>点击量：<?php echo isset($article->clicknumber) ? $article->clicknumber : '';?></span>
        </p>
    </div>
</div>
<div class="middle" style="width: 825px;">
    <div class="foreginBottomBorder">
<!--        --><?php //echo isset($article->content)? $article->content : '';?>
        <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/article_one?id=<?php echo $article->aid;?>" allowtransparency="true" style="width: 830px; min-height: 700px;"></iframe>
    </div>
</div>

<div class="top" style="height:100px; ">
    <div class="foreginTopBorder">
        <h1 class="title"><?php echo isset($article->title)? $article->title : '';?></h1>
        <p class="authorinfo" style="width: 950px;">
            <?php if($cid != 69){ ?>
            <span>信息来源：<?php echo isset($article->from)? $article->from : '';?></span>
            <span>发布人：<?php echo isset($article->author)? $article->author : '';?></span>
            <span>发布时间：<?php echo isset($article->createtime)? $article->createtime : '';?></span>
            <span>点击量：<?php echo isset($article->clicknumber) ? $article->clicknumber : '';?></span>
            <?php }?>
        </p>
    </div>
</div>
<div class="middle" style="width: auto;">
    <div class="foreginBottomBorder" style="width: auto;">
<!--        --><?php //echo isset($article->content)? $article->content : '';?>
        <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/article_one?id=<?php echo $article->aid;?>" allowtransparency="true" style=" width:994px;min-height: 700px;"></iframe>
    </div>
</div>


<div class="top" style="height:100px; overflow:hidden;">
    <h1 class="title"><?php echo $data->title;?></h1>
    <p class="authorinfo">
        <span>出处：<?php echo $data->from;?></span>
        <span>发布人：<?php echo $data->author;?></span>
        <span>发布时间：<?php echo substr($data->createtime, 0, 10);?></span>
        <span>点击量：<?php echo $data->clicknumber;?></span>
    </p>
</div>
<div class="middle">
    <?php echo $data->content;?>
<!--    <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/article_one?id=--><?php //echo $data->aid;?><!--" allowtransparency="true" style="width: 100%; height: auto;"></iframe>-->
</div>
<div class="bottom"></div>
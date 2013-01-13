<div class="left">
    <div class="leftImg"><img src="<?php echo isset($img->img) ? $img->img : '';?>" alt="校长照片" width="151px" height="146"></div>
    <div class="leftTitle"><?php echo isset($article->from) ? CHtml::encode($article->from) : '';?>
        <br/>校长：<?php echo isset($article->author) ? CHtml::encode($article->author) : '';?></div>
    <div class="leftDescribe">
        &nbsp;&nbsp;<?php echo isset($article->excerpt) ? CHtml::encode($article->excerpt) : '';?>
        <p><a href="/index.php/cate/index?cid=67">『详细内容』</a></p>
    </div>
</div>
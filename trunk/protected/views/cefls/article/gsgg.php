<div class="right">
    <div class="content">
        <marquee scrollamount="3" direction="up" onMouseOver="this.stop()" onMouseOut="this.start()" style="height: 245px;">
            <?php if(!empty($articles)) foreach($articles as $article){?>
        <h3 class="title"><a href="/index.php/cate/index?cid=66&aid=<?php echo isset($article->aid) ? CHtml::encode($article->aid) : '';?>"><?php echo isset($article->title) ? CHtml::encode($article->title) : '';?></a></h3>
        <p class="describe">
            <?php echo isset($article->excerpt) ? CHtml::encode($article->excerpt) : '';?>
        </p>
            <?php }?>
        </marquee>
        <p class="link"><a href="/index.php/cate/index?cid=68">『查看更多』</a></p>
        <script type="text/javascript">

        </script>
    </div>
</div>
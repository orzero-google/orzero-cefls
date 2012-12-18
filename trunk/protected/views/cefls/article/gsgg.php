<div class="right">
    <div class="content">
        <h3 class="title"><a href="#"><?php echo isset($article->title) ? CHtml::encode($article->title) : '';?></a></h3>
        <p class="describe">
            <?php echo isset($article->excerpt) ? CHtml::encode($article->excerpt) : '';?>
        </p>
        <p class="link"><a href="/index.php/cate/index?cid=68">『查看更多』</a></p>
        <script type="text/javascript">

        </script>
    </div>
</div>
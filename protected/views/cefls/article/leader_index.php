<div class="top"></div>
<?php

//echo $article->content;

$criteria=new CDbCriteria;
$criteria->condition='`type`=-2 AND enabled=1 AND cid = 11';
$criteria->order='`sort` ASC, `aid` DESC';
$criteria->limit=5;
$articles = Article::model()->findAll($criteria);


$criteria=new CDbCriteria;
$criteria->condition='`cid`=0 AND enabled=1';
$criteria->condition='`cid`=0 AND enabled=1 AND type=-11';
$articles_all = Ads::model()->find($criteria);
?>

<div class="middle">
    <div class="imginfo">
        <?php
        if(!empty($articles_all)){
            echo '<img alt="'.$articles_all->title.'" src="'.$articles_all->img.'">
        <p>'.$articles_all->title.'</p>';
        }

        ?>
    </div>

    <div class="imglist">
        <?php
        if(!empty($articles)){
            foreach($articles as $article){
                echo '<div class="imgitem">
                    <a href="#"><img alt="" src="'.$article->file.'"></a>
                    <p><a href="#">'.$article->title.'：'.$article->author.'</a></p>
                </div>';
            }
        }
        ?>

    </div>
</div>
<div class="bottom" style="width: 840px;"></div>
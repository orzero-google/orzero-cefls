<div class="top" style="width:970px; height:100px; overflow:hidden;">
    <div class="foreginTopBorder">
        <h1 class="title"><?php echo isset($article->{"title_".$key})? $article->{"title_".$key} : '';?></h1>
        <p class="authorinfo">
            <span>信息来源：<?php echo isset($article->{"from_".$key})? $article->{"from_".$key} : '';?></span>
            <span>发布人：<?php echo isset($article->author)? $article->author : '';?></span>
            <span>发布时间：<?php echo isset($article->createtime)? $article->createtime : '';?></span>
            <span>点击量：<?php echo isset($article->{"clicknumber_".$key}) ? $article->{"clicknumber_".$key} : '';?></span>
        </p>
    </div>
</div>
<div class="middle" style="width:970px;">
    <div class="foreginBottomBorder">
        <?php echo isset($article->{"content_".$key})? $article->{"content_".$key} : '';?>
        <div class="previous">
            <?php if(!empty($article_prev)): ?>
            <a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>$cid,'aid'=>$article_prev->aid)); ?>" class="pv">
                <?php
                if($cid == 62){
                echo 'Previous';
                }elseif($cid == 63){
                echo 'Précédent';
                }elseif($cid == 64){
                echo 'Früher';
                }
                ?>
            </a>
            <?php endif;?>
            <?php if(!empty($article_next)): ?>
            <a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>$cid,'aid'=>$article_next->aid)); ?>" class="pv">
                <?php
                if($cid == 62){
                    echo 'Next';
                }elseif($cid == 63){
                    echo 'Suivant';
                }elseif($cid == 64){
                    echo 'Nächste';
                }
                ?>
            </a>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="bottom" style="width:970px;"></div>


<?php
$keys = array('en'=>'英语', 'fr'=>'法语', 'de'=>'德语');
foreach($keys as $key=>$val):
    if($key=='en'){
        $cid = 62;
    }elseif($key=='fr'){
        $cid =  63;
    }elseif($key=='de'){
        $cid =  64;
    }
?>
<!-- <?php echo $val?>版开始 -->
<div class="bottom"<?php if($key != 'en') echo ' style="dispaly:none;"';?>>
    <div class="bLeft">
        <div class="brief">
            <div class="blbTop"><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></div>
            <div class="blbBottom"><a href="<?php echo Yii::app()->createUrl('cate/index', array('cid'=>$cid, 'type'=>'p'));?>"><?php echo isset($profile->{"excerpt_".$key}) ? $profile->{"excerpt_".$key}:'';?></a></div>
        </div>
        <div class="brief">
            <div class="blbTop"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></div>
            <div class="blbBottom"><a href="<?php echo Yii::app()->createUrl('cate/index', array('cid'=>$cid, 'type'=>'c'));?>"><?php echo isset($culture->{"excerpt_".$key}) ? $culture->{"excerpt_".$key} : '';?></a></div>
        </div>
    </div>
    <div class="bMiddle">
        <div class="bothSide">
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[0]->img) ? ${"images_"."$key"}[0]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[0]->title) ?${"images_"."$key"}[0]->title : '';?>">
                <p><a href="<?php echo isset($images_{$key}[0]->src) ? $images_{$key}[0]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[0]->title) ? nl2br(${"images_"."$key"}[0]->title) : '';?>
                </a></p>
            </div>
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[1]->img) ? ${"images_"."$key"}[1]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[1]->title) ? ${"images_"."$key"}[1]->title : '';?>">
                <p><a href="<?php echo isset(${"images_"."$key"}[1]->src) ? ${"images_"."$key"}[1]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[1]->title) ? nl2br(${"images_"."$key"}[1]->title) : '';?>
                </a></p>
            </div>
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[2]->img) ? ${"images_"."$key"}[2]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[2]->title) ? ${"images_"."$key"}[2]->title : '';?>">
                <p><a href="<?php echo isset(${"images_"."$key"}[2]->src) ? ${"images_"."$key"}[2]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[2]->title) ? nl2br(${"images_"."$key"}[2]->title) : '';?>
                </a></p>
            </div>
        </div>
        <div class="middle">
            <div class="recommend">
                <h3><a href="<?php echo Yii::app()->createUrl('cate/index',array('cid'=>$cid,'aid'=>(isset($articles[0]->aid) ? $articles[0]->aid : 0))); ?>"><?php echo isset($articles[0]->{"title_".$key}) ? $articles[0]->{"title_".$key} : ''; ?></a></h3>
                <p><?php echo isset($articles[0]->{"excerpt_".$key}) ? $articles[0]->{"excerpt_".$key} :  ''; ?></p>
            </div>
            <div class="list">
                <?php
                for($i=1;$i<11;$i++){
                    if(empty($articles[$i])){
                        echo '<p>&nbsp;</p>';
                    }else{
                        echo '<p><span>('.(isset($articles[$i]->createtime) ? substr($articles[$i]->createtime, 0, 10) : '').')</span>
                        <a style="display: block;width: 250px;overflow: hidden;white-space: nowrap;-o-text-overflow: ellipsis;text-overflow: ellipsis;" href="'.Yii::app()->createUrl('cate/index',array('cid'=>$cid,'aid'=>(isset($articles[$i]->aid) ? $articles[$i]->aid : 0))).'">'.
                            (isset($articles[$i]->{"title_".$key}) ? CHtml::encode($articles[$i]->{"title_".$key}) : '').'</a></p>';
                    }
                }
                ?>
            </div>
            <p class="foreginMore"><a href="/index.php/cate/index?cid=<?php echo $cid;?>"><?php
                if($cid == 62){
                    echo 'more';
                }elseif($cid == 63){
                    echo 'plus';
                }elseif($cid == 64){
                    echo 'mehr';
                }
                ?>&gt;&gt;</a></p>

        </div>
        <div class="bothSide">
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[3]->img) ? ${"images_"."$key"}[3]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[3]->title) ? ${"images_"."$key"}[3]->title : '';?>">
                <p><a href="<?php echo isset(${"images_"."$key"}[3]->src) ? ${"images_"."$key"}[3]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[3]->title) ? nl2br(${"images_"."$key"}[3]->title) : '';?>
                </a></p>
            </div>
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[4]->img) ? ${"images_"."$key"}[4]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[4]->title) ? ${"images_"."$key"}[4]->title : '';?>">
                <p><a href="<?php echo isset(${"images_"."$key"}[4]->src) ? ${"images_"."$key"}[4]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[4]->title) ? nl2br(${"images_"."$key"}[4]->title) : '';?>
                </a></p>
            </div>
            <div class="newsPic">
                <img src="<?php echo isset(${"images_"."$key"}[5]->img) ? ${"images_"."$key"}[5]->img : '';?>" width="150" height="106" alt="<?php
                echo isset(${"images_"."$key"}[5]->title) ? ${"images_"."$key"}[5]->title : '';?>">
                <p><a href="<?php echo isset(${"images_"."$key"}[5]->src) ? ${"images_"."$key"}[5]->src : '';?>">
                    <?php echo isset(${"images_"."$key"}[5]->title) ? nl2br(${"images_"."$key"}[5]->title) : '';?>
                </a></p>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

<script type="text/javascript">
    $(function(){
        var $title = $(".foreignPlan .top li");
        var $content = $(".foreignPlan .bottom");
        $title.mousemove(function(){
            var index = $title.index($(this));
            $title.removeClass("hover");
            $(this).addClass("hover");
            $content.hide();
            $($content.get(index)).show();
            return false;
        });
    });
</script>
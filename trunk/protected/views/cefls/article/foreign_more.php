<?php
if($cid == 62){
    $expand = 'Expansion';
    $hide = 'Hision';
}elseif($cid == 63){
    $expand = 'Expansion';
    $hide = 'Cacher';
}elseif($cid == 64){
    $expand = 'Expansion';
    $hide = 'Verbergen';
}
?>

<style>
    div.describe{
        text-indent: 2em;
        word-spacing: -3px;
    }
</style>

<div class="top" style="width:900px;"></div>
<div class="middle" style="width:900px;">
    <div class="preview">
        <div class="title">
            <ul>
                <?php if($type=='p'):?>
                <li class="hover"<?php if($cid==63){echo ' style="font-size:14px;"';}?>><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></li>
                <li style="margin-left:10px;<?php if($cid==63){echo " font-size:14px;";}?>"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></li>
                <?php else:?>
                <li<?php if($cid==63){echo ' style="font-size:14px;"';}?>><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></li>
                <li style="margin-left:10px;<?php if($cid==63){echo " font-size:14px;";}?>" class="hover"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></li>
                <?php endif;?>

            </ul>
        </div>
        <?php if($type=='p'):?>
        <div class="describe">
            <div id="p_excerpt">
                <?php echo isset($profile->{"excerpt_".$key}) ? nl2br_blank_ext(strip_tags($profile->{"excerpt_".$key})):'';?>
<!--                <iframe frameborder="0" name="Article_content_ifr1" id="Article_content_ifr1" src="/index.php/cate/foreign_one?id=--><?php //echo $profile->aid;?><!--&key=--><?php //echo 'excerpt_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="expansion" id="ex_p_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p>
            </div>
            <div id="p_content" style="display: none;">
                <?php echo isset($profile->{"content_".$key}) ? nl2br_blank_ext(strip_tags($profile->{"content_".$key})):'';?>
<!--                <iframe frameborder="0" name="Article_content_ifr2" id="Article_content_ifr2" src="/index.php/cate/foreign_one?id=--><?php //echo $profile->aid;?><!--&key=--><?php //echo 'content_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="hision" id="hi_p_<?php echo $key;?>"><?php echo $hide;?></p>
            </div>
        </div>
        <div class="describe" style="display:none;">
            <div id="c_excerpt">
                <?php echo isset($culture->{"excerpt_".$key}) ? nl2br_blank_ext(strip_tags($culture->{"excerpt_".$key})) : '';?>
<!--                <iframe frameborder="0" name="Article_content_ifr3" id="Article_content_ifr3" src="/index.php/cate/foreign_one?id=--><?php //echo $culture->aid;?><!--&key=--><?php //echo 'excerpt_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="expansion" id="ex_c_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p>
            </div>
            <div id="c_content" style="display: none;">
                <?php echo isset($culture->{"content_".$key}) ? nl2br_blank_ext(strip_tags($culture->{"content_".$key})) : '';?>
<!--                <iframe frameborder="0" name="Article_content_ifr4" id="Article_content_ifr4" src="/index.php/cate/foreign_one?id=--><?php //echo $culture->aid;?><!--&key=--><?php //echo 'content_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="hision" id="hi_c_<?php echo $key;?>"><?php echo $hide;?></p>
            </div>
        </div>
        <?php else:?>
        <div class="describe" style="display:none;">
            <div id="p_excerpt">
                <?php echo isset($profile->{"excerpt_".$key}) ? nl2br_blank_ext(strip_tags($profile->{"excerpt_".$key})):'';?>
<!--                <iframe frameborder="0" name="Article_content_ifr1" id="Article_content_ifr1" src="/index.php/cate/foreign_one?id=--><?php //echo $profile->aid;?><!--&key=--><?php //echo 'excerpt_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="expansion" id="ex_p_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p>
            </div>
            <div id="p_content" style="display: none;">
                <?php echo isset($profile->{"content_".$key}) ? nl2br_blank_ext(strip_tags($profile->{"content_".$key})):'';?>
<!--                <iframe frameborder="0" name="Article_content_ifr2" id="Article_content_ifr2" src="/index.php/cate/foreign_one?id=--><?php //echo $profile->aid;?><!--&key=--><?php //echo 'content_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="hision" id="hi_p_<?php echo $key;?>"><?php echo $hide;?></p>
            </div>
        </div>
        <div class="describe">
            <div id="c_excerpt">
                <?php echo isset($culture->{"excerpt_".$key}) ? nl2br_blank_ext(strip_tags($culture->{"excerpt_".$key})) : '';?>
<!--                <iframe frameborder="0" name="Article_content_ifr3" id="Article_content_ifr3" src="/index.php/cate/foreign_one?id=--><?php //echo $culture->aid;?><!--&key=--><?php //echo 'excerpt_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="expansion" id="ex_c_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p>
            </div>
            <div id="c_content" style="display: none;">
                <?php echo isset($culture->{"content_".$key}) ? nl2br_blank_ext(strip_tags($culture->{"content_".$key})) : '';?>
<!--                <iframe frameborder="0" name="Article_content_ifr4" id="Article_content_ifr4" src="/index.php/cate/foreign_one?id=--><?php //echo $culture->aid;?><!--&key=--><?php //echo 'content_'.$key;?><!--" allowtransparency="true" style="width: 835px;height: 90%;" ></iframe>-->
                <p class="hision" id="hi_c_<?php echo $key;?>"><?php echo $hide;?></p>
            </div>
        </div>
        <?php endif;?>

    <script type="text/javascript">
            $(function(){
                function auto_height(){
                    var h=0;
                    if(Article_content_ifr1.document.body.scrollHeight>0){
                        h = Article_content_ifr1.document.body.scrollHeight;
                    }
                    if(Article_content_ifr2.document.body.scrollHeight>0){
                        h = Article_content_ifr1.document.body.scrollHeight;
                    }
                    if(Article_content_ifr3.document.body.scrollHeight>0){
                        h = Article_content_ifr1.document.body.scrollHeight;
                    }
                    if(Article_content_ifr4.document.body.scrollHeight>0){
                        h = Article_content_ifr1.document.body.scrollHeight;
                    }
                    if(h>0)
                        $("#Article_content_ifr1, #Article_content_ifr2, #Article_content_ifr3, #Article_content_ifr4").css('height',h);
                }


                var $title = $(".preview .title li");
                var $content = $(".preview .describe");
                $title.click(function(){
                    var index = $title.index($(this));
                    $title.removeClass("hover");
                    $(this).addClass("hover");
                    $content.hide();
                    $($content.get(index)).show();

//                    auto_height();
                    return false;
                });


                $("#ex_p_en").click(function(){
                    $("#p_excerpt").hide();
                    $("#p_content").show();
                    auto_height();
                });
                $("#hi_p_en").click(function(){
                    $("#p_content").hide();
                    $("#p_excerpt").show();
                    auto_height();
                });
                $("#ex_c_en").click(function(){
                    $("#c_excerpt").hide();
                    $("#c_content").show();
                    auto_height();
                });
                $("#hi_c_en").click(function(){
                    $("#c_content").hide();
                    $("#c_excerpt").show();
                    auto_height();
                });


                $("#ex_p_de").click(function(){
                    $("#p_excerpt").hide();
                    $("#p_content").show();
                    auto_height();
                });
                $("#hi_p_de").click(function(){
                    $("#p_content").hide();
                    $("#p_excerpt").show();
                    auto_height();
                });
                $("#ex_c_de").click(function(){
                    $("#c_excerpt").hide();
                    $("#c_content").show();
                    auto_height();
                });
                $("#hi_c_de").click(function(){
                    $("#c_content").hide();
                    $("#c_excerpt").show();
                    auto_height();
                });


                $("#ex_p_fr").click(function(){
                    $("#p_excerpt").hide();
                    $("#p_content").show();
                    auto_height();
                });
                $("#hi_p_fr").click(function(){
                    $("#p_content").hide();
                    $("#p_excerpt").show();
                    auto_height();
                });
                $("#ex_c_fr").click(function(){
                    $("#c_excerpt").hide();
                    $("#c_content").show();
                    auto_height();
                });
                $("#hi_c_fr").click(function(){
                    $("#c_content").hide();
                    $("#c_excerpt").show();
                    auto_height();
                });

            });
        </script>
    </div>
    <div class="foreginlist">
        <div class="ad4">
            <a href="" title="<?php echo isset($ads_more->title) ? CHtml::encode($ads_more->title) : '';?>">
                <img src="<?php echo isset($ads_more->img) ? $ads_more->img : '';?>" alt="<?php echo isset($ads_more->title) ? CHtml::encode($ads_more->title) : '';?>">
            </a>
        </div>
<!--        <ul>-->
            <?php
            $GLOBALS['key']=$key;
            $GLOBALS['cid']=$cid;
            if(!empty($dataProvider->data))
                $this->widget('application.vendors.OListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'//cefls/article/foreign_more/article_list',
                    'ajaxUpdate'=>false,
                    'template'=>"{items}" ,
                    'itemsTagName'=>'ul',
//                    'htmlOptions'=>array('class'=>'thingsList'),
                ));
            ?>
<!--        </ul>-->
        <div class="page">
        <?php
            $this->widget('application.vendors.OListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'//cefls/article/foreign_more/article_list',
                'ajaxUpdate'=>false,
                'template'=>"{pager}" ,
//                'htmlOptions'=>array('class'=>'thingsList'),
            ));
        ?>
        </div>
    </div>
</div>
<div class="bottom" style="width:900px;"></div>

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

<div class="top" style="width:900px;"></div>
<div class="middle" style="width:900px;">
    <div class="preview">
        <div class="title">
            <ul>
                <?php if($type=='p'):?>
                <li class="hover"><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></li>
                <li style="margin-left:10px;"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></li>
                <?php else:?>
                <li><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></li>
                <li style="margin-left:10px;" class="hover"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></li>
                <?php endif;?>

            </ul>
        </div>
        <?php if($type=='p'):?>
        <div class="describe"><?php echo isset($profile->{"excerpt_".$key}) ? $profile->{"excerpt_".$key}:'';?><p class="expansion" id="ex_p_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p></div>
        <div class="describe" style="display:none;"><?php echo isset($culture->{"excerpt_".$key}) ? $culture->{"excerpt_".$key} : '';?><p class="expansion" id="ex_c_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p></div>
        <?php else:?>
        <div class="describe" style="display:none;"><?php echo isset($profile->{"excerpt_".$key}) ? $profile->{"excerpt_".$key}:'';?><p class="expansion" id="ex_p_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p></div>
        <div class="describe"><?php echo isset($culture->{"excerpt_".$key}) ? $culture->{"excerpt_".$key} : '';?><p class="expansion" id="ex_c_<?php echo $key;?>"><?php echo isset($expand) ? $expand : '';?></p></div>
        <?php endif;?>
    <script type="text/javascript">
            $(function(){
                var $title = $(".preview .title li");
                var $content = $(".preview .describe");
                $title.click(function(){
                    var index = $title.index($(this));
                    $title.removeClass("hover");
                    $(this).addClass("hover");
                    $content.hide();
                    $($content.get(index)).show();

                    return false;
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
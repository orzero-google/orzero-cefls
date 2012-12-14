<div class="top" style="width:900px;"></div>
<div class="middle" style="width:900px;">
    <div class="preview">
        <div class="title">
            <ul>
                <li class="hover"><?php echo isset($profile->{"title_".$key})? $profile->{"title_".$key} : '';?></li>
                <li style="margin-left:10px;"><?php echo isset($culture->{"title_".$key}) ? $culture->{"title_".$key} : '';?></li>
            </ul>
        </div>
        <div class="describe"><?php echo isset($profile->{"excerpt_".$key}) ? $profile->{"excerpt_".$key}:'';?></div>
        <div class="describe" style="display:none;"><?php echo isset($culture->{"excerpt_".$key}) ? $culture->{"excerpt_".$key} : '';?></div>
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
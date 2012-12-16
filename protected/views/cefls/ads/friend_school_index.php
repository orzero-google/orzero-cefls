<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`=6 AND enabled=1';
$criteria->order='`order` ASC';
$dataProvider=new CActiveDataProvider('Ads',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>4,
    ),
));

?>
<link rel="stylesheet" type="text/css" href="/cefls/css/coin-slider-styles.css" />
    <div class="top"></div>
    <div class="middle">
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//cefls/ads/_view_school',
            'ajaxUpdate'=>false,
            'template'=>"{items}"
        ));
        ?>
        <div class="hackbox"></div>
    </div>
    <div class="bottom">
        <?php
        $this->widget('application.vendors.OListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//cefls/ads/_view_school',
            'ajaxUpdate'=>false,
            'template'=>"{pager}"
        ));
        ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("span.spoiler").hide();
            $('<a class="reveal">更多</a> ').insertBefore('.spoiler');
            $('<p class="previous"><img src="/cefls/images/container_r2_c3.jpg"></p>').insertAfter('.spoiler');
            $(".previous").hide();
            $("a.reveal").click(function(){
                $(this).parents("p").children("span.spoiler").slideDown(1500);
                $(this).parents("p").children("a.reveal").fadeOut(600);
                $(this).parents("p").children("p.previous").show();
            });
            $(".previous img").click(function(){
                $(this).parent(".previous").parent("p.describeDetail").children("span.spoiler").slideUp(600);
                $(this).parent(".previous").parent("p.describeDetail").children("a.reveal").fadeIn(600);
                $(this).parent(".previous").fadeOut(600);
            });
        });
    </script>
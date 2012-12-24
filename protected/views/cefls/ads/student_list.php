<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`=:cid AND `type`=-10 AND `enabled`=1';
$criteria->params=array(':cid'=>$cid);
$criteria->order='`order` ASC, `aid` DESC';
$dataProvider=new CActiveDataProvider('Ads',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>4,
    ),
));

?>

<div class="top"></div>
<div class="middle">
    <?php
    $this->widget('application.vendors.OListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//cefls/ads/student_one',
        'ajaxUpdate'=>true,
        'template'=>"{items}" ,
        'itemsTagName'=>'ul',
//                    'htmlOptions'=>array('class'=>'thingsList'),
    ));
    ?>
    <div class="hackbox"></div>
</div>
<div class="bottom" id="bottom">
    <?php
//    $this->widget('application.vendors.OListView', array(
//        'dataProvider'=>$dataProvider,
//        'itemView'=>'//cefls/ads/student_one',
//        'ajaxUpdate'=>true,
//        'template'=>"{pager}"
//    ));
    ?>
    <div class="numberOneShow">
        <a href="#bottom"><img src="/cefls/images/container_r8_c9.jpg" alt=""></a>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".container .right .article .bottom .numberOneShow a").toggle(function(){
                $(".container .right .article .middle .autohidden").slideDown("slow");
            },function(){
                $(".container .right .article .middle .autohidden").slideUp("slow");
            });
        });
    </script>
</div>
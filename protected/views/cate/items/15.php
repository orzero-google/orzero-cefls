<?php
$criteria=new CDbCriteria;
$criteria->condition='`cid`=-1 AND type=-3';
$criteria->order='`order` ASC';
$dataProvider=new CActiveDataProvider('Ads',array(
    'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$page=intval(Yii::app()->request->getParam('Ads_page', 1));
?>


<link rel="stylesheet" type="text/css" href="/cefls/css/jquery.fancybox.css" media="screen"/>

<div class="middle">
    <div class="prev"><a href="<?php
    if($page>1){
        echo $this->createUrl('cate/index', array('pid'=>1,'cid'=>15, 'Ads_page'=>$page-1));
    }else{
        echo '#';
    }
    ?>"><img src="/images/container_prev.jpg" alt=""></a></div>
    <div class="clist">
        <?php
        if(!empty($dataProvider->data))
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'//cate/items/15/_img',
                'ajaxUpdate'=>true,
                'template'=>"{items}" ,
            ));
        ?>
    </div>
    <div class="next"><a href="<?php
        echo $this->createUrl('cate/index', array('pid'=>1,'cid'=>15, 'Ads_page'=>$page+1));
    ?>"><img src="/images/container_next.jpg" alt=""></a></div>
    <div class="hackbox"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("a.certImg").fancybox();
});
</script>
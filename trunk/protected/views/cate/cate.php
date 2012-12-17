<?php
$this->breadcrumbs=array(
    $sub_menu->menu_name,
);
$this->pageTitle=Yii::app()->name .' - '. $sub_menu->menu_name;
$cate_p = Menu::model()->with('p')->findByPk($cid);
if($cate_p->menu_type == 3){
    $cate_p=$cate_p->p;
}
if($cate_p->menu_type == 2){
    $cate_p=$cate_p->p;
}
$ads_top = Ads::model()->img_ads($cate_p->menu_id)->find();

$aid = Yii::app()->request->getParam('aid', 0);
?>
<div class="adtop"><a href="" title="<?php echo isset($ads_top->title) ? CHtml::encode($ads_top->title) : '';?>">
    <img src="<?php echo isset($ads_top->img) ? $ads_top->img : '';?>" alt="<?php echo isset($ads_top->title) ? CHtml::encode($ads_top->title) : '';?>">
</a></div>
<!-- container -->
<div class="container">
    <div class="right" style="background:#fff; margin:0 auto;width: auto;">
        <?php if(!in_array($cid, get_cate_foreig())): ?>
            <?php if(in_array($cid, get_menu_article())): ?>
                <p class="path">当前位置: <a href="<?php echo Yii::app()->createUrl('cate/index', array('cid'=>$sub_menu->menu_id));?>"><?php echo $sub_menu->menu_name;?></a></p>
            <?php endif; ?>
        <?php endif; ?>
        <div class="article" style="width: auto;">
            <?php
            if($cid==61){
                echo $this->renderPartial('//cefls/mail', array());
            }else if(in_array($cid, get_menu_article())){
                //无菜单列表
                echo $this->renderPartial('items/'.$cid, array(
                    'cid'=>$cid,
                ));
            }else if(in_array($cid, get_cate_foreig())){
                if($cid == 62){
                    $key = 'en';
                }else if($cid == 63){
                    $key = 'fr';
                }else if($cid == 64){
                    $key = 'de';
                }

                if($aid > 0){
                    $article = ArticleForeign::model()->findByPk($aid);
                    $this->renderPartial('//cefls/article/foreign_view', array(
                        'cid'=>$cid,
                        'article'=>$article,
                        'key'=>$key,
                    ));
                    if(!empty($article)){
                        $article->{"clicknumber_".$key} ++;
                        $article->save();
                    }
                }else{
                    $profile=ArticleForeign::model()->article_list(3)->find();
                    $culture=ArticleForeign::model()->article_list(4)->find();

                    $articles = ArticleForeign::model()->article_all_limit(0, 11)->findAll();

                    $criteria=new CDbCriteria;
                    $criteria->condition='`cid`=0 AND enabled=1';
                    $criteria->order='`sort` ASC, `aid` DESC';
                    $dataProvider=new CActiveDataProvider('ArticleForeign',array(
                        'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>20,
                        ),
                    ));

                    $ads_more = Ads::model()->img_ads($cid)->find();

                    echo $this->renderPartial('//cefls/article/foreign_more', array(
                        'cid'=>$cid,
                        'key'=>$key,
                        'profile'=>$profile,
                        'culture'=>$culture,
                        'ads_more'=>$ads_more,
                        'dataProvider'=>$dataProvider,
                    ));
                }
            }
            ?>

        </div>
    </div>
</div>
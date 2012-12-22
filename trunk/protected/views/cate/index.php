<?php
$this->breadcrumbs=array(
    $sub_menu->menu_name,
);
$this->pageTitle=Yii::app()->name .' - '. $sub_menu->menu_name;
?>

<!-- container -->
<div class="container">
    <?php echo get_left_menu($pid);?>
    <div class="right">
        <p class="path">当前位置: <a href="<?php echo Yii::app()->createUrl('cate/index', array('pid'=>$pid, 'cid'=>$sub_menu->menu_id));?>"><?php echo $sub_menu->menu_name;?></a></p>
        <div class="article">


            <?php
            if(in_array($cid, get_cate_article())){
                $cate = Menu::model()->findByPk($cid);

                $criteria=new CDbCriteria;
                $criteria->condition='`cid`=-1 AND `enabled`=1 AND title=:title';
                $criteria->params=array(':title'=>$cate['menu_name']);
                $article = Article::model()->find($criteria);
                $this->renderPartial('//cefls/article/article_view', array('data'=>$article));
                $article->clicknumber++;
                $article->save();
            }else if(in_array($cid, get_cate_page())){
                //友情学校
                if($cid = 65){
                    $this->renderPartial('//cefls/ads/friend_school_index', array());
                }
            }else{
                if(in_array($cid, array(50,51,52))){
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

                    $this->widget('application.vendors.OListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'//cefls/ads/student_list',
                        'ajaxUpdate'=>false,
                        'template'=>"{items}" ,
                        'itemsTagName'=>'ul',
//                    'htmlOptions'=>array('class'=>'thingsList'),
                    ));
                    return ;
                }

                echo $this->renderPartial('items/'.$cid, array(
                    'cid'=>$cid,
                ));
            }
            ?>


        </div>
    </div>
</div>
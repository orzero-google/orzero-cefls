<?php
$this->breadcrumbs=array(
    $sub_menu->menu_name,
);
$this->pageTitle=Yii::app()->name .' - '. $sub_menu->menu_name;
$tid=Yii::app()->request->getParam('tid', 0);
$img = Ads::model()->find('cid=0 AND type='.$pid.' AND enabled=1');

$is_swf = false;
if(isset($img->img) && !empty($img->img)){
    $cut_img = explode('.', $img->img);
    if($cut_img[1]=='swf'){
        $is_swf = true;
    }
}
?>

<div class="adtop"><?php
if($is_swf){
    echo '<EMBED pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" width="100%" src="'.(isset($img->img) ? $img->img : '').'" type=application/x-shockwave-flash />';
}else{
    echo isset($img->img) ? '<img src="'.$img->img.'" alt="">' : '';
}
?></div>
<div class="hackbox"></div>
<!-- container -->
<div class="container">
    <?php echo get_left_menu($pid);?>
    <div class="right">
        <p class="path">当前位置:
            <a href="<?php echo Yii::app()->createUrl('cate/index', array('pid'=>$pid));?>"><?php echo $top_menu->menu_name;?></a>&nbsp;&gt;&gt;
            <a href="<?php echo Yii::app()->createUrl('cate/index', array('pid'=>$pid, 'cid'=>$sub_menu->menu_id));?>"><?php echo $sub_menu->menu_name;?></a>
        </p>
        <div class="article">


        <?php
        if($tid > 0){
            $teacher = Article::model()->find('type=-2 AND enabled=1 AND aid=:aid', array(':aid'=>$tid));
            if(!empty($teacher)){
                $teacher->clicknumber++;
                $teacher->save();
            }
            echo $this->renderPartial('//cefls/article/teacher_one', array(
                'cid'=>$cid,
                'teacher'=>$teacher
            ));
        }else{
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


            }else if(in_array($cid, get_list_article())){
                $id = Yii::app()->request->getParam('id', 0);
                if(!empty($id)){
                    $article = Article::model()->article_list($cid)->findByPk($id);
                    //文章详情
                    echo $this->renderPartial('//cefls/article/list_article_post', array(
                        'pid'=>$pid,
                        'cid'=>$cid,
                        'id'=>$id,
                        'article'=>$article,
                    ));
                }else{
                    //列表文章
                    echo $this->renderPartial('//cefls/article/list_article_view', array(
                        'pid'=>$pid,
                        'cid'=>$cid,
                    ));
                }
            }else{
                $jsdw = array_keys(get_jsdw_type());

                if(in_array($cid, array(50,51,52))){
                    echo $this->renderPartial('//cefls/ads/student_list', array(
                        'cid'=>$cid,
                    ));
                }elseif(in_array($cid, $jsdw)){
                    echo $this->renderPartial('//cefls/article/teacher_list', array(
                        'cid'=>$cid,
                    ));
                }elseif($cid==12){
                    $article = Article::model()->find('title=:title and cid=-1', array(':title'=>$sub_menu->menu_name));
                    echo $this->renderPartial('//cefls/article/leader_index', array(
                        'article'=>$article,
                        'cid'=>$cid,
                    ));
                }elseif(in_array($cid, array(15,16,66))){
                    echo $this->renderPartial('items/'.$cid, array(
                        'cid'=>$cid,
                    ));
                }else{
                    $article = Article::model()->find('title=:title and cid=-1', array(':title'=>$sub_menu->menu_name));
                    if(!empty($article)){
                        $article->clicknumber++;
                        $article->save();
                    }

                    echo $this->renderPartial('article_index', array(
                        'pid'=>$pid,
                        'cid'=>$cid,
                        'article'=>$article
                    ));
                }
            }
        }
        ?>


        </div>
    </div>
</div>
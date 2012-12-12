<?php
/**
 * User: jia.li@ckt-telcom.com
 * Date: 12-12-3
 * Time: 下午5:13
 *
 */
function pr($data=array(), $end='', $stop=false)
{
    print_r($data);
    echo $end;
    if($stop) die;
}
function pd($data=array(), $end='', $stop=true)
{
    print_r($data);
    echo $end;
    if($stop) die;
}

/*
<div class="left">
    <h3>关于实外</h3>
    <ul id="nav">
        <li class="p1 down">实外概况
            <ul>
                <li><a href="#url">2011</a></li>
                <li><a href="#url">2011</a></li>
            </ul>
        </li>
        <li class="p1 down">Services
            <ul>
                <li><a href="#url">Printing</a></li>
                <li><a href="#url">Photo Framing</a></li>
                <li><a href="#url">Retouching</a></li>
                <li><a href="#url">Archiving</a></li>
            </ul>
        </li>
        <li class="p1 down">Shop
            <ul>
                <li><a href="#url">Online</a></li>
                <li><a href="#url">Catalogue</a></li>
                <li><a href="#url">Mail Order</a></li>
            </ul>
        </li>
        <li><a href="#url">Privacy Policy</a></li>
    </ul>
</div>
*/

function get_left_menu($pid){
    $cid = Yii::app()->request->getParam('cid', 0);

    if(!YII_DEBUG)
        $left_menu_html = Yii::app()->cache->get('left_menu_html::'.$cid);
    if(!empty($left_menu_html)){
        return $left_menu_html;
    }

    $cate_p = Menu::model()->with('sub_menu')->findByPk($pid);

    $left_menu_html = '<div class="left"><h3>'.$cate_p->menu_name.'</h3>';
    foreach($cate_p->sub_menu as $menu_one){
        $left_menu_html .= '<ul id="nav">';
        $left_menu_html .= '<li'.(($cid==$menu_one->menu_id) ? ' class="selected"' : '').'><a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>$menu_one->menu_id)).'">'.$menu_one->menu_name.'</a></li>';
        $left_menu_html .= '</ul>';
    }
    $left_menu_html .= '</div>';

    Yii::app()->cache->set('left_menu_html::'.$cid, $left_menu_html);
    return $left_menu_html;
}

function get_menu(){
    if(!YII_DEBUG)
        $menu_html = Yii::app()->cache->get('menu');
    if(!empty($menu_html)){
        return $menu_html;
    }

    $menus = Menu::model()->with('sub_menu')->findAll('t.menu_type=:menu_type',array(':menu_type'=>1));
    $menu_html = '<ul class="header_nav_link">';
    foreach($menus as $menu_one){
        $menu_html .= '<li><a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$menu_one->menu_id)).'">'.$menu_one->menu_name.'</a><ul>';

        foreach($menu_one->sub_menu as $sub_menu){
            $menu_html .= '<li><a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$menu_one->menu_id, 'cid'=>$sub_menu->menu_id)).'">'.$sub_menu->menu_name.'</a></li>';
        }
        $menu_html .= '</ul>';
    }
    $menu_html .= '</ul>';

    Yii::app()->cache->set('menu', $menu_html);
    return $menu_html;
}


function get_header(){
    return '
<div class="header">
    <div class="header_top">
        <div class="header_left"><a href="#"><img src="/images/logo.jpg" width="101" height="101" alt="logo"/></a></div>
        <div class="header_right">
            <div class="header_title"><img src="/images/index_r2_c11.jpg" width="404" height="101" alt="成都市实验外国语学校"/></div>
            <div class="header_link">
                <p class="header_link1"><a href="index.html">首页</a>　|　<a href="#">加入收藏</a>　|　<a href="#">联系我们</a>　|　<a href="#">实外信箱</a></p>
                <p class="header_link2"><a href="#">ENGLISH</a>　|　<a href="#">Française</a>　|　<a href="#">Deutsch</a></p>
                <p class="header_link3"><input type="text" class="search_text"/><input type="submit" name="submit" class="submit"/></p>
            </div>
        </div>
    </div>
    <div class="hackbox"></div>
    <div class="header_bottom">
        <div class="header_nav">
            '.get_menu().'
        </div>
    </div>
</div>
    ';
}

function get_links(){
    if(!YII_DEBUG)
        $links_html = Yii::app()->cache->get('links_html');
    if(!empty($links_html)){
        return $links_html;
    }
    //cid = -1 为link类型
    $links = Ads::model()->findAll('cid=-1');

    $links_html = '
    <div class="frindLinks"><div class="linkList">';
//        <a href="#">成都外国语学校</a>
//        <a href="#">成都市实验外国语学校（西区）</a>
//        <a href="#">四川外语学院成都学院</a>
//        <a href="#">成外附属小学</a>
//        <a href="#">四川省计算机学会</a>
//        <a href="#">成都市实验外国语学校（西区）</a>
//        <a href="#">成都外国语学校               </a>
//        <a href="#">四川省计算机学会</a>
//        <a href="#">四川外语学院成都学院</a>
//        <a href="#">成外附属小学</a>
    if(!empty($links)) foreach($links as $link){
        $links_html .= '<a href="'.$link->url.'">'.CHtml::encode($link->title).'</a>';
    }
    $links_html .= '</div></div>';

    Yii::app()->cache->set('links_html', $links_html);
    return $links_html;
}


function get_footer(){
    return <<<EOF
<!-- index's footer -->
<div class="footer">
    <p><a href="#">关于我们</a>  ‖  <a href="#">网站声明</a>  ‖ <a href="#">实外信箱</a>  ‖ <a href="#">联系我们</a></p>
    <p>网站版权所有者：成都市实验外国语学校    协同建设支持单位：成都互正超媒网络科技有限公司<br/>Copyright©2011-2016  (www.cefls.cn )    All Right Reserved <br/>川教GZ-20120014号       蜀ICP备12003383-1号</p>
</div>
EOF;
}

function get_admin_sidebar(){
    $pid=Yii::app()->request->getParam('pid', 0);
    $cid=Yii::app()->request->getParam('cid', 0);

    $sidebar_html = '';
    if(!YII_DEBUG)
        $sidebar_html = Yii::app()->cache->get('sidebar::'.$pid.'::'.$cid);
    if(!empty($sidebar_html)){
        return $sidebar_html;
    }

    $items=array(
        array(
            'name'=>'站内图片广告',
            'pid'=>'1',
            'items'=>array(
                array('name'=>'新增图片广告', 'cid'=>'1'),
                array('name'=>'查看图片广告', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'资证荣誉',
            'pid'=>'2',
            'items'=>array(
                array('name'=>'新增资证荣誉', 'cid'=>'1'),
                array('name'=>'查看资证荣誉', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'大事纪要',
            'pid'=>'3',
            'items'=>array(
                array('name'=>'新增大事纪要', 'cid'=>'1'),
                array('name'=>'查看大事纪要', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'站内文章',
            'pid'=>'4',
            'items'=>array(
                array('name'=>'新增站内文章', 'cid'=>'1'),
                array('name'=>'查看站内文章', 'cid'=>'2'),
            )
        ),

        array('name'=>'[退出登陆]', 'pid'=>'13', 'src'=>'/index.php/user/logout'),
    );

    $c=1;
    $cs=Yii::app()->clientScript;
    foreach($items as $one){
        if(!empty($one['items'])){
            $c++;
            $cs->registerScript('items'.$c,'$("#cid-sub-'.$c.'").click(function(){$("#id-sub-'.$c.'").toggle();});');
            $_one_url='javascript:viod();';
        }else{
            if(!empty($one['src'])){
                $_one_url=$one['src'];
            }else{
                $_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid']));
            }

        }

        if((isset($one['cid']) && $one['cid']==$cid) || (isset($one['pid']) && $one['pid']==$pid)){
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').' class="m"><span class="first"></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }else{
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').'><span></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }

        $items_html='';
        if(!empty($one['items'])){
            foreach($one['items'] as $i_one){
                if(isset($i_one['cid'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid'], 'cid'=>$i_one['cid']));
                }elseif(isset($one['cid'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid']));
                }

                $sx = '';
                if((isset($i_one['cid']) && $i_one['cid']==$cid) && (isset($one['pid']) && $one['pid']==$pid)){
                    $sx = ' class="x"';
                }

                $items_html.='<li'.$sx.'><span></span><a href="'.$i_one_url.'">'.$i_one['name'].'</a></li>';
            }
            $sidebar_html .= '<li style="display: block;" id="id-sub-'.$c.'" class="sub"><ul class="sub-leftmenu">'.$items_html.'</ul></li>';
        }
    }

    Yii::app()->cache->set('sidebar::'.$pid.'::'.$cid, $sidebar_html);
    return $sidebar_html;
}


function get_ads_type($key=''){
    $list = array(
        '-1'=>'首页轮播',
        '1'=>'主题图1',
        '2'=>'主题图2',
        '3'=>'主题图3',
        '4'=>'主题图4',
        '5'=>'主题图5',
        '6'=>'主题图6',
        '7'=>'主题图7',
        '8'=>'主题图8',
        '9'=>'主题图9',
        '-2'=>'首页中部',
//        '-3'=>'荣誉证书',
    );
    if(!empty($key)){
        if(array_key_exists($key,$list)){
            return $list[$key];
        }else{
            return false;
        }
    }

    return $list;
}

function get_ads_list($type, $limit=1){
    if(empty($type))
        return false;

//    $criteria=new CDbCriteria;
//    $criteria->condition='`cid`=0 AND type='.intval($type);
//    $criteria->order='`order` ASC';
//    $criteria->limit = $limit;

    return Ads::model()->img_ads($type, $limit)->findAll();
}
/*
<div class="adList">
    <div class="ad1"><a href="#"><img src="/cefls/images/ad1.jpg" alt="ad1"></a></div>
    <div class="ad2"><a href="#"><img src="/cefls/images/ad2.jpg" alt="ad2"></a></div>
    <div class="ad3"><a href="#"><img src="/cefls/images/ad3.jpg" alt="ad3"></a></div>
</div>
*/
function get_index_adlist(){
    $list_html = '';
    if(!YII_DEBUG)
        $list_html = Yii::app()->cache->get('list_html::index');
    if(!empty($list_html)){
        return $list_html;
    }

    $list = get_ads_list('-2', 3);
    $list_html = '<div class="adList">';

    $i=1;
    foreach($list as $list_one){
        $list_html .= '<div class="ad'.$i.'"><a href="'.CHtml::encode($list_one->url).'" title="'.CHtml::encode($list_one->title).'"><img src="'.CHtml::encode($list_one->img).'" alt="ad'.$i.'"></a></div>';
        $i++;
    }
    $list_html .= '</div>';

    Yii::app()->cache->set('list_html::index', $list_html);
    return $list_html;
}

/*
<div id="slide-index">
    <div class="slides">
        <div class="slide autoMaxWidth" links=[{left:'30px',top:'81px'},{left:'30px',top:'244px'},{direction:'tb'}]>
            <div class="image" id='bi_0'><a target="_blank" href="#"><img name="" src="/cefls/images/hw_149403.jpg" /></a></div>
            <div class="text" id='bt_0'></div>
            <div class="button" id='bb_0'></div>
        </div>
        <div class="slide autoMaxWidth" links=[{left:'30px',top:'81px'},{left:'30px',top:'244px'},{direction:'tb'}]>
            <div class="image" id='bi_1'><a href="#" target="_blank"><img name="" src="/cefls/images/hw_149025.jpg" /></a></div>
            <div class="text" id='bt_1'></div>
            <div class="button" id='bb_1'></div>
        </div>
        <div class="slide autoMaxWidth" links=[{left:'30px',top:'81px'},{left:'30px',top:'244px'},{direction:'tb'}]>
            <div class="image" id='bi_2'><a target="" href="#"><img name="" src="/cefls/images/hw_194667.jpg" /></a></div>
            <div class="text" id='bt_2'></div>
            <div class="button" id='bb_2'></div>
        </div>
    </div>
    <div class="control">
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
    </div>
</div>
*/
function get_img_slides(){
    $slides_html = '';
    if(!YII_DEBUG)
        $slides_html = Yii::app()->cache->get('slides_html::index');
    if(!empty($slides_html)){
        return $slides_html;
    }

    $imgs = get_ads_list('-1', 10);

    $body='';
    $footer='';
    foreach($imgs as $img){
        $body .= '<div class="slide autoMaxWidth" links=[{left:"30px",top:"81px"},{left:"30px",top:"244px"},{direction:"tb"}]>';
        $body .= '<div class="image" id="bi_1"><a href="#" target="_blank"><img name="" src="'.$img->img.'" /></a></div>';
        $body .= '<div class="text" id="bt_2"></div>';
        $body .= '<div class="button" id="bb_2"></div>';
        $body .= '</div>';

        $footer .= '<a href=""></a>';
    }

    $slides_html = '<div id="slide-index">';
    $slides_html .= '<div class="slides">'.$body.'</div>';
    $slides_html .= '<div class="control">'.$footer.'</div>';
    $slides_html .= '</div>';

    Yii::app()->cache->set('slides_html::index', $slides_html);
    return $slides_html;
}


function get_fancybox_img(){

}
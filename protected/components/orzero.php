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

function get_menu(){
    $menu_html = Yii::app()->cache->get('menu');
    if(!empty($menu_html)){
        return $menu_html;
    }

    $menus = Menu::model()->with('sub_menu')->findAll('t.menu_type=:menu_type',array(':menu_type'=>1));
    $menu_html = '<ul class="header_nav_link">';
    foreach($menus as $menu_one){
        $menu_html .= '<li><a href="#">'.$menu_one->menu_name.'</a><ul>';

        foreach($menu_one->sub_menu as $sub_menu){
            $menu_html .= '<li><a href="#">'.$sub_menu->menu_name.'</a></li>';
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
                <p class="header_link2"><a href="#">ENGLISH</a>　|　<a href="#">Francais</a>　|　<a href="#">Deutsc</a></p>
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
    //type = 1 为link类型
    $links = Ads::model()->findAll('type=-1');

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

    $sidebar_html = Yii::app()->cache->get('sidebar::'.$pid.'::'.$cid);
    if(!empty($sidebar_html)){
        return $sidebar_html;
    }

    $items=array(
        array(
            'name'=>'个人信息管理',
            'pid'=>'1',
            'items'=>array(
                array('name'=>'修改注册信息', 'cid'=>'1'),
                array('name'=>'密码修改', 'cid'=>'2'),
                array('name'=>'交纳会费', 'cid'=>'3'),
                array('name'=>'站内消息', 'cid'=>'4'),
                array('name'=>'会员升级', 'cid'=>'10'),
            )
        ),

        array('name'=>'[退出登陆]', 'pid'=>'13'),
    );

    $c=1;
    $cs=Yii::app()->clientScript;
    foreach($items as $one){
        if(!empty($one['items'])){
            $c++;
            $cs->registerScript('items'.$c,'$("#cid-sub-'.$c.'").click(function(){$("#id-sub-'.$c.'").toggle();});');
            $_one_url='javascript:viod();';
        }else{
            $_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid']));
        }

        if((isset($one['cid']) && $one['cid']==$cid) || (isset($one['pid']) && $one['pid']==$pid)){
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').' class="m"><span class="first"></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }else{
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').'><span></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }

        $items_html='';
        if(!empty($one['items'])){
            foreach($one['items'] as $i_one){
                if(isset($one['pid'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid'], 'cid'=>$i_one['cid']));
                }elseif(isset($one['cid'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('cid'=>$one['cid']));
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

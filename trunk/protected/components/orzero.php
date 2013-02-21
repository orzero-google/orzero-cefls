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
    $aid = Yii::app()->request->getParam('aid', 0);
    $id = Yii::app()->request->getParam('id', 0);

    if(!YII_DEBUG_CACHE)
        $left_menu_html = Yii::app()->cache->get('left_menu_html::'.$cid);
    if(!empty($left_menu_html)){
        return $left_menu_html;
    }

    $cate_p = Menu::model()->with('sub_menu')->findByPk($pid);

    $left_menu_html = '<div class="left"><h3>'.$cate_p->menu_name.'</h3>';
    $left_menu_html .= '<ul id="nav">';
    foreach($cate_p->sub_menu as $menu_one){
        $sub_sub_menu_html = '';
        $selected = false;
        if((isset($menu_one->sub_menu) && !empty($menu_one->sub_menu)) || $menu_one->menu_id==40 || $menu_one->menu_id==53){
            $sub_sub_menu_html .= '<ul style="display: none;">';
            foreach($menu_one->sub_menu as $sub_sub_menu){
                $sub_sub_menu_html .= '<li'.(($cid==$sub_sub_menu->menu_id) ? ' class="selected"' : '').'>
            <a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>$sub_sub_menu->menu_id)).'">'.$sub_sub_menu->menu_name.'</a>
            </li>';
            }

            //外教风采
            if($menu_one->menu_id == 40){
                $criteria=new CDbCriteria;
                $criteria->condition='`type`=-12 AND `cid`=40 AND enabled=1';
                $criteria->order='`sort` ASC';
                $jsfc = Article::model()->findAll($criteria);
                foreach($jsfc as $jsfc_one){
                    $sub_sub_menu_html .= '<li'.(($aid==$jsfc_one->aid) ? ' class="selected"' : '').'>
                <a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>40, 'tid'=>$jsfc_one->aid)).'">'.$jsfc_one->author.'</a>
                </li>';
                }
            }

            //外教风采
            if($menu_one->menu_id == 53){
                $criteria=new CDbCriteria;
                $criteria->condition='`type`=-14 AND `cid`=53 AND `enabled`=1';
                $criteria->order='`sort` ASC';
                $jsfc = Article::model()->findAll($criteria);
                foreach($jsfc as $jsfc_one){
                    $sub_sub_menu_html .= '<li'.(($id==$jsfc_one->aid) ? ' class="selected"' : '').'>
                <a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>53, 'id'=>$jsfc_one->aid)).'">'.$jsfc_one->title.'</a>
                </li>';
                }
            }

            $sub_sub_menu_html .= '</ul>';

            $selected = true;
        }

        if($selected == false){
            $top_menu = '<a style="color:#000000;" href="'.(Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>$menu_one->menu_id))).'">'.
                $menu_one->menu_name.
                '</a>';
        }else{
            $top_menu = '<span>'.$menu_one->menu_name.'</span>';
        }



        $left_menu_html .= '<li'.(($cid==$menu_one->menu_id && $selected==false) ? ' class="p1 down selected"' : ' class="p1 down"').'>'.$top_menu.
//            '<a href="'.(Yii::app()->createUrl('cate/index', array('pid'=>$cate_p->menu_id, 'cid'=>$menu_one->menu_id))).'">'.
//            $menu_one->menu_name.
//            '</a>'.
        $sub_sub_menu_html.'</li>';

    }
    $left_menu_html .= '</ul>';
    $left_menu_html .= '</div>';

    Yii::app()->cache->set('left_menu_html::'.$cid, $left_menu_html, 1000);
    return $left_menu_html;
}

function get_menu(){
    if(!YII_DEBUG_CACHE)
        $menu_html = Yii::app()->cache->get('menu');
    if(!empty($menu_html)){
        return $menu_html;
    }

    $menus = Menu::model()->with('sub_menu')->findAll('t.menu_type=:menu_type',array(':menu_type'=>1));
    $menu_html = '<ul class="header_nav_link">';
    foreach($menus as $menu_one){
        $menu_html .= '<li><a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$menu_one->menu_id)).'">'.$menu_one->menu_name.'</a><ul>';
//        $menu_html .= '<li><a href="#">'.$menu_one->menu_name.'</a><ul>';

        foreach($menu_one->sub_menu as $sub_menu){
            if($sub_menu->menu_id ==43){
                $sub_menu->menu_id =62;
            }

            $menu_html .= '<li><a href="'.Yii::app()->createUrl('cate/index', array('pid'=>$menu_one->menu_id, 'cid'=>$sub_menu->menu_id)).'">'.$sub_menu->menu_name.'</a></li>';
        }
        $menu_html .= '</ul>';
    }
    $menu_html .= '</ul>';

    Yii::app()->cache->set('menu', $menu_html, 1000);
    return $menu_html;
}


function get_header(){
    return '
<div class="header">
    <div class="header_top">
        <div class="header_left"><a href="/"><img src="/images/logo.jpg" width="101" height="101" alt="logo"/></a></div>
        <div class="header_right">
            <div class="header_title"><img src="/images/index_r2_c11.jpg" width="404" height="101" alt="成都市实验外国语学校"/></div>
            <div class="header_link">
                <p class="header_link1"><a href="/">首页</a>　|　<a href=\'javascript:addBookmark("成都市实验外国语学校", "http://www.cefls.cn");\'>加入收藏</a>　|　<a href="/index.php/cate/index?cid=72">联系我们</a>　|　<a href="/index.php/cate/index?cid=61">实外信箱</a></p>
                <p class="header_link2"><a href="/index.php/cate/index?cid=62">ENGLISH</a>　|　<a href="/index.php/cate/index?cid=63">Française</a>　|　<a href="/index.php/cate/index?cid=64">Deutsch</a></p>
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
<script type="text/javascript">
function addBookmark(title,url) {
if (window.sidebar) {
window.sidebar.addPanel(title, url,"");
} else if( document.all ) {
window.external.AddFavorite( url, title);
} else if( window.opera && window.print ) {
return true;
}
}
</script>
    ';
}

function get_links(){
    if(!YII_DEBUG_CACHE)
        $links_html = Yii::app()->cache->get('links_html');
    if(!empty($links_html)){
        return $links_html;
    }
    //cid = -1 为link类型
    $links = Ads::model()->findAll('cid=0 AND type=-6 AND enabled=1');

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

    Yii::app()->cache->set('links_html', $links_html, 1000);
    return $links_html;
}


function get_footer(){
    return <<<EOF
<!-- index's footer -->
<div class="footer">
    <p><a href="/index.php/cate/index?cid=70">关于我们</a>  ‖  <a href="/index.php/cate/index?cid=71">网站声明</a>  ‖ <a href="/index.php/cate/index?cid=61">实外信箱</a>  ‖ <a href="/index.php/cate/index?cid=72">联系我们</a></p>
    <p>网站版权所有者：成都市实验外国语学校　　协同建设支持单位：成都互正超媒网络科技有限公司<br/>Copyright©2011-2016　(www.cefls.cn )　　All Right Reserved <br/>川教GZ-20120014号　　　　蜀ICP备12003383-1号</p>
</div>
EOF;
}

function get_admin_sidebar(){
    $pid=Yii::app()->request->getParam('pid', 0);
    $cid=Yii::app()->request->getParam('cid', 0);
    $cc=Yii::app()->request->getParam('cc', 0);

    $sidebar_html = '';
    if(!YII_DEBUG_CACHE)
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
                array('name'=>'[查看所有图片广告]', 'cid'=>'2'),
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
        array(
            'name'=>'外语板块',
            'pid'=>'5',
            'items'=>array(
                array('name'=>'新增文章', 'cid'=>'1'),
                array('name'=>'查看文章', 'cid'=>'2'),
                array('name'=>'Profile', 'cid'=>'3'),
                array('name'=>'Culture', 'cid'=>'4'),
            )
        ),
        array(
            'name'=>'友情学校',
            'pid'=>'6',
            'items'=>array(
                array('name'=>'新增友情学校', 'cid'=>'1'),
                array('name'=>'查看友情学校', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'校园快讯',
            'pid'=>'7',
            'items'=>array(
                array('name'=>'新增校园快讯', 'cid'=>'1'),
                array('name'=>'查看校园快讯', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'公示公告',
            'pid'=>'8',
            'items'=>array(
                array('name'=>'新增公示公告', 'cid'=>'1'),
                array('name'=>'查看公示公告', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'学子风采',
            'pid'=>'9',
            'items'=>array(
                //50,51,52,53
                array('name'=>'新增学子风采', 'cid'=>'1'),
                array('name'=>'[查看所有学子风采]', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'师资队伍,领导班子',
            'pid'=>'10',
            'items'=>array(
                array('name'=>'新增师资队伍', 'cid'=>'1'),
                array('name'=>'查看师资队伍', 'cid'=>'2'),
                array('name'=>'查看领导班子', 'cid'=>'3'),
            )
        ),

        array(
            'name'=>'站内板块文章',
            'pid'=>'11',
            'items'=>array(
                array('name'=>'新增站内板块文章', 'cid'=>'1'),
                array('name'=>'[查看所有站内板块文章]', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'外教风采',
            'pid'=>'12',
            'items'=>array(
                array('name'=>'新增外教风采', 'cid'=>'1'),
                array('name'=>'查看外教风采', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'外语佳作',
            'pid'=>'13',
            'items'=>array(
                array('name'=>'新增外语佳作', 'cid'=>'1'),
                array('name'=>'[查看所有外语佳作]', 'cid'=>'2'),
            )
        ),
        array(
            'name'=>'高考年报',
            'pid'=>'14',
            'items'=>array(
                array('name'=>'新增高考年报', 'cid'=>'1'),
                array('name'=>'查看高考年报', 'cid'=>'2'),
            )
        ),

        array('name'=>'[退出登陆]', 'pid'=>'13', 'src'=>'/index.php/user/logout'),
    );

    $c=1;
    $cs=Yii::app()->clientScript;
    foreach($items as $one){
        if(!empty($one['items'])){
            $c++;
            $cs->registerScript('items'.$c,'$("#cid-sub-'.$c.'").click(function(){$("#id-sub-'.$c.'").toggle();});$("#id-sub-'.$c.'").hide();');
            $_one_url='javascript:viod();';
        }else{
            if(!empty($one['src'])){
                $_one_url=$one['src'];
            }else{
                $_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid']));
            }
        }


        if((isset($one['cid']) && $one['cid']==$cid) || (isset($one['pid']) && $one['pid']==$pid)){
            $cs->registerScript('items_open'.$c,'$("#id-sub-'.$c.'").show();');
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').' class="m"><span class="first"></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }else{
            $sidebar_html.='<li'.((!empty($one['items']))?' id="cid-sub-'.$c.'"':'').'><span></span><a href="'.$_one_url.'">'.$one['name'].'</a></li>';
        }

        $items_html='';
        if(!empty($one['items'])){
            if($one['pid']==11){
                $cat_tmp = get_list_article_manage('',false);
                $cat_tmp_new = array();
                $i=3;
                foreach($cat_tmp as $key => $val){
                    $cat_tmp_new[]=array('name'=>'查看'.$val, 'cc'=>$key, 'cid'=>$i);
                    $i++;
                }
                $one['items']=array_merge($one['items'], $cat_tmp_new);
            }
            if($one['pid']==13){
                $cat_tmp = array(
                    62=>'英语佳作',
                    63=>'法语佳作',
                    64=>'德语佳作',
                );
                $cat_tmp_new = array();
                $i=3;
                foreach($cat_tmp as $key => $val){
                    $cat_tmp_new[]=array('name'=>'查看'.$val, 'cc'=>$key, 'cid'=>$i);
                    $i++;
                }
                $one['items']=array_merge($one['items'], $cat_tmp_new);
            }
            if($one['pid']==1){
                $cat_tmp = get_ads_type();
                $cat_tmp_new = array();
                $i=3;
                foreach($cat_tmp as $key => $val){
                    $cat_tmp_new[]=array('name'=>'查看'.$val, 'cc'=>$key, 'cid'=>$i);
                    $i++;
                }
                $one['items']=array_merge($one['items'], $cat_tmp_new);
            }
            if($one['pid']==9){
                $cat_tmp = get_xzfc_type();
                $cat_tmp_new = array();
                $i=3;
                foreach($cat_tmp as $key => $val){
                    $cat_tmp_new[]=array('name'=>'查看'.$val, 'cc'=>$key, 'cid'=>$i);
                    $i++;
                }
                $one['items']=array_merge($one['items'], $cat_tmp_new);
            }

            foreach($one['items'] as $i_one){
                if(isset($i_one['cid']) && empty($i_one['cc'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid'], 'cid'=>$i_one['cid']));
                }elseif(isset($i_one['cc'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid'], 'cid'=>$i_one['cid'], 'cc'=>$i_one['cc']));
                }elseif(isset($one['pid'])){
                    $i_one_url=Yii::app()->createUrl('manage/index',array('pid'=>$one['pid']));
                }

                $sx = '';
                if((isset($i_one['cid']) && $i_one['cid']==$cid) && (isset($one['pid']) && $one['pid']==$pid)){
                    $sx = ' class="x"';
                }
                if((isset($i_one['cc']) && $i_one['cc']==$cc) && (isset($one['pid']) && $one['pid']==$pid)){
                    $sx = ' class="x"';
                }

                $items_html.='<li'.$sx.'><span></span><a href="'.$i_one_url.'">'.$i_one['name'].'</a></li>';
            }
            $sidebar_html .= '<li style="display: block;" id="id-sub-'.$c.'" class="sub"><ul class="sub-leftmenu">'.$items_html.'</ul></li>';

        }
    }

    Yii::app()->cache->set('sidebar::'.$pid.'::'.$cid, $sidebar_html, 1000);
    return $sidebar_html;
}


function get_ads_type($key=''){
    $list = array(
//        '0'=>'请选择',
//      '-10'=>'学子风采',  //保留字段

        '-1'=>'首页轮播图片',
        '-7'=>'首页校长头像',
        '-8'=>'首页校园快讯',
        '-2'=>'首页中部三个图片',

        '-3'=>'首页英语版图片',
        '-4'=>'首页法语版图片',
        '-5'=>'首页德语版图片',

        '-6'=>'友情链接',

        '1'=>'主题图1',
        '2'=>'主题图2',
        '3'=>'主题图3',
        '4'=>'主题图4',
        '5'=>'主题图5',
        '6'=>'主题图6',
        '7'=>'主题图7',
        '8'=>'主题图8',
        '9'=>'主题图9',

        '62'=>'英语版文章列表图片',
        '63'=>'法语版文章列表图片',
        '64'=>'德语版文章列表图片',

        '-11'=>'领导班子合照',

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

function get_list_article_manage($key='', $get_cid=true){
    $list = array(
        '14'=>'媒体关注',
        '29'=>'德育管理',
        '30'=>'德育动态',
        '31'=>'团队活动',

        '32'=>'心理教育',
        '33'=>'德育成果',

        '34'=>'学研管理',
        '35'=>'教学动态',
        '36'=>'教研活动',
        '37'=>'课堂延伸',
        '38'=>'教学成果',
        '39'=>'英语课堂',
        '41'=>'活动集锦',
        '42'=>'法德苑地',

        '44'=>'赛事风云',
        '45'=>'学习资源',
        '47'=>'国内互动',
        '48'=>'国际往来',
        '49'=>'合作项目',

        '54'=>'运动时空',
        '55'=>'音乐之声',
        '56'=>'美术佳苑',
        '57'=>'学子寄情',
        '58'=>'家长抒怀',
        '59'=>'教师达意',
        '60'=>'媒评舆论',

    );
    if(!empty($key)){
        if(array_key_exists($key,$list)){
            return $list[$key];
        }else{
            return false;
        }
    }

    if($get_cid){
        return array_keys($list);
    }else{
        return $list;
    }
}

function get_list_article($key='', $get_cid=true){
    $list = array(
        '14'=>'媒体关注',
        '66'=>'校园快讯',
        '68'=>'公示公告',
        '3'=>'德育视窗',
        '29'=>'德育管理',
        '30'=>'德育动态',
        '31'=>'团队活动',

        '32'=>'心理教育',
        '33'=>'德育成果',
        '34'=>'学研管理',
        '35'=>'教学动态',
        '36'=>'教研活动',
        '37'=>'课堂延伸',
        '38'=>'教学成果',
        '39'=>'英语课堂',
        '41'=>'活动集锦',
        '42'=>'法德苑地',

        '44'=>'赛事风云',
        '45'=>'学习资源',
        '47'=>'国内互动',
        '48'=>'国际往来',
        '49'=>'合作项目',
        '54'=>'运动时空',
        '55'=>'音乐之声',
        '56'=>'美术佳苑',
        '57'=>'学子寄情',
        '58'=>'家长抒怀',
        '59'=>'教师达意',
        '60'=>'媒评舆论',

        '4'=>'教学科研',
        '9'=>'感悟实外',
        '43'=>'外语佳作',
        '5'=>'外语特色',
        '6'=>'交流合作',
        '8'=>'艺体天地',
        '62'=>'英语佳作',
        '63'=>'法语佳作',
        '64'=>'德语佳作',

        '53'=>'高考年报',
    );
    if(!empty($key)){
        if(array_key_exists($key,$list)){
            return $list[$key];
        }else{
            return false;
        }
    }

    if($get_cid){
        return array_keys($list);
    }else{
        return $list;
    }
}

function get_xzfc_type($key=''){
    $list = array(
        '50'=>'状元金榜',
        '51'=>'理科精英',
        '52'=>'文科翘楚',
//        '53'=>'高考年报',
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

function get_jsdw_type($key=''){
    $menu_jsdw = Menu::model()->findAll('parent_id=2');
    $list = array();
    foreach($menu_jsdw as $menu_jsdw_one){
        $list[$menu_jsdw_one->menu_id]=$menu_jsdw_one->menu_name;
    }

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
    if(!YII_DEBUG_CACHE)
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

    Yii::app()->cache->set('list_html::index', $list_html, 1000);
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
    if(!YII_DEBUG_CACHE)
        $slides_html = Yii::app()->cache->get('slides_html::index');
    if(!empty($slides_html)){
        return $slides_html;
    }

    $imgs = get_ads_list('-1', 10);
    $is_swf = false;
    foreach($imgs as $img){
        if(isset($img->img) && !empty($img->img)){
            $cut_img = explode('.', $img->img);
            if($cut_img[1]=='swf'){
                $swf_src = $img->img;
                $is_swf = true;
            }
        }
    }

    if($is_swf == true){
        $slides_html =  '<div>
        <EMBED pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" width="100%" height="365" src="'.(isset($swf_src) ? $swf_src : '').'" type=application/x-shockwave-flash />
        </div>';
        $slides_html .= '<script type="text/javascript" src="/cefls/js/global_cn.index.swf.js"></script>';
    }else{
        $body='';
        $footer='';
        foreach($imgs as $img){
            $body .= '<div class="slide autoMaxWidth" links=[{left:"30px",top:"81px"},{left:"30px",top:"244px"},{direction:"tb"}]>';
            $body .= '<div class="image" id="bi_1"><a href="#" target="_blank"><img name="" src="'.$img->img.'" height="400" style="height:400px;" /></a></div>';
            $body .= '<div class="text" id="bt_2"></div>';
            $body .= '<div class="button" id="bb_2"></div>';
            $body .= '</div>';

            $footer .= '<a href=""></a>';
        }

        $slides_html = '<div id="slide-index">';
        $slides_html .= '<div class="slides">'.$body.'</div>';
        $slides_html .= '<div class="control">'.$footer.'</div>';
        $slides_html .= '</div>';
        $slides_html .= '<script type="text/javascript" src="/cefls/js/global_cn.index.js"></script>';
    }
    Yii::app()->cache->set('slides_html::index', $slides_html, 1000);
    return $slides_html;
}


function get_fancybox_img(){

}

//取得单篇文章的页面
function get_cate_article(){
    return array(66,67,68,69,70,71,72,73);
}

function get_cate_page(){
    return array(61, 65, 46);
}

function get_cate_foreig(){
    return array(62,63,64);
}

function get_menu_article(){
    return array(66,68);
}


function nl2br_ext($in){
    $out=nl2br($in);
    $out=str_replace('　  ', '&nbsp;', $out);
    $out=str_replace(' ', ' &nbsp;', $out);
    $out=str_replace('　', '&nbsp;', $out);
//    $out=preg_replace('/(.*?\r\n)/', '&nbsp;&nbsp;\\1&nbsp;&nbsp;', $out);
//    $out='&nbsp;'.$out;
    return $out;
}

function blank_ext($out){
    $out=str_replace('　　', ' ', $out);
    $out=str_replace('　  ', ' ', $out);
    $out=str_replace(' ', ' ', $out);
    $out=str_replace('　', ' ', $out);
    $out=str_replace('  ', ' ', $out);
    $out=str_replace(' ', '&nbsp; ', $out);
    return $out;
}

function nl2br_blank_ext($in){
//    $in = blank_ext($in);
    $in = nl2br_ext($in);
//    $in = blank_ext($in);
    return $in;
}

/*
<div class="bottom">
    <div class="bLeft">
        <div class="brief">
            <div class="blbTop">CEFLS  Profile</div>
            <div class="blbBottom"><a href="#">Chengdu Experimental Foreign Languages SchoolS) is a nationwide famous foreign languages scne directly under the Chengdu unicipal Educat mittee. Located at No.134 Section 1 N. Yihuan Chengdu City. The school covers an area of 60 unded in 1963, the original Chengdu No.48 Middol was renamed Chengdu Experimental Foreign La School in 1993 with the approva......</a></div>
        </div>
        <div class="brief">
            <div class="blbTop">CEFLS  Culture</div>
            <div class="blbBottom"><a href="#">Chengdu Experimental Foreign Languages SchoolS) is a nationwide famous foreign languages scne directly under the Chengdu unicipal Educat mittee. Located at No.134 Section 1 N. Yihuan Chengdu City. The school covers an area of 60 unded in 1963, the original Chengdu No.48 Middol was renamed Chengdu Experimental Foreign La School in 1993 with the approva......</a></div>
        </div>
    </div>
    <div class="bMiddle">
        <div class="bothSide">
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
        </div>
        <div class="middle">
            <div class="recommend">
                <h3><a href="#">Foreign Languages School</a></h3>
                <p>CDEFLS has made great academic achievements.s the junior middle school students have rakby exam results in Chengdu. 100% of the CDEL graduates have passed .</p>
            </div>
            <div class="list">
                <p><span>(11-20)</span><a href="#">CEFLS Qualified for Beijing University’s</a></p>
                <p><span>(11-30)</span><a href="#">Remarkable Achievements in 27th Nationa...</a></p>
                <p><span>(11-21)</span><a href="#">Friendly Visit from Switzerland</a></p>
                <p><span>(11-24)</span><a href="#">2010 Autumn-term Opening Ceremony held</a></p>
                <p><span>(11-25)</span><a href="#">Students Awarded in Financial Knowledge...</a></p>
                <p><span>(11-25)</span><a href="#">Remarkable Achievements in NEPCSS</a></p>
                <p><span>(11-25)</span><a href="#">CEFLS Accepted as Research Base by NAFLE</a></p>
                <p><span>(11-30)</span><a href="#">Remarkable Achievements in 27th Nationa...</a></p>
                <p><span>(11-21)</span><a href="#">Friendly Visit from Switzerland</a></p>
                <p><span>(11-24)</span><a href="#">2010 Autumn-term Opening Ceremony held</a></p>
            </div>
            <p class="foreginMore"><a href="#">more&gt;&gt;</a></p>
        </div>
        <div class="bothSide">
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
            <div class="newsPic">
                <img src="/cefls/images/6.jpg" width="150px" height="106px" alt="">
                <p><a href="#">This is picture's title information</a></p>
            </div>
        </div>
    </div>
</div>
*/
function get_index_foreign(){
    $index_foreign_html = '';
    if(!YII_DEBUG_CACHE)
        $index_foreign_html = Yii::app()->cache->get('index_foreign_html');
    if(!empty($index_foreign_html)){
        return $index_foreign_html;
    }

    $profile=ArticleForeign::model()->article_list(3)->find();
    $culture=ArticleForeign::model()->article_list(4)->find();
    $images_en=Ads::model()->img_ads(-3, 6)->findAll();
    $images_fr=Ads::model()->img_ads(-4, 6)->findAll();
    $images_de=Ads::model()->img_ads(-5, 6)->findAll();
//    foreach($images_en as $images_en_one){
//        echo $images_en_one->aid.'|'.$images_en_one->title."<br />";
//    }die;

    $articles = ArticleForeign::model()->article_all_limit(0, 11)->findAll();

    $index_foreign_html = Yii::app()->getController()->renderPartial('//cefls/article/foreign_index', array(
        'profile'=>$profile,
        'culture'=>$culture,
        'images_en'=>$images_en,
        'images_fr'=>$images_fr,
        'images_de'=>$images_de,
        'articles'=>$articles,
    ),false);

    Yii::app()->cache->set('index_foreign_html', $index_foreign_html, 1000);
    return $index_foreign_html;
}

/*
<div class="middle">
        <div class="middleTop"><span><img src="/cefls/images/index_r11_c19.jpg" alt="更多"></span></div>
        <div class="middleMiddle">
            <div class="content">
                <div class="cLeft">
                    <h3 class="title"><a href="#">我校第九届活动周顺利开幕</a></h3>
                    <p class="describe">中国新闻网是知名的中文新闻门户网站，也是全球互联网中文新闻资讯最重要的原创内容供应商之一。年轻向上的力量。是全方位的新闻资讯平台，24小时为您滚动报道国内、依托中新社遍布全球的采编网络,每天24小时面向广大网民 ...</p>
                </div>
                <div class="cRight"><a href="#"><img src="/cefls/images/5.jpg" width="177px" height="128px" alt="我校第九届活动周顺利开幕" /></a></div>
            </div>
        </div>
        <div class="middleBottom">
            <p><span>2012-11-20</span><a href="#">Apache与IIS的优劣对比点点评</a></p>
            <p><span>2012-11-30</span><a href="#">[配置]MRTG＋IIS 6＝接近完美的信息监控！</a></p>
            <p><span>2012-11-21</span><a href="#">IIS6应用程序池中间的 Web 园</a></p>
            <p><span>2012-11-24</span><a href="#">中国商务部今日发表的统计报告</a></p>
            <p><span>2012-11-25</span><a href="#">《世界新闻报·鉴赏中国专刊》介绍. 创新. • 环保华服</a></p>
        </div>
    </div>
*/

function get_xykx(){
    $index_xykx_html = '';
    if(!YII_DEBUG_CACHE)
        $index_xykx_html = Yii::app()->cache->get('index_xykx_html');
    if(!empty($index_xykx_html)){
        return $index_xykx_html;
    }

    $articles = Article::model()->article_list(66, 6)->findAll();

    $index_xykx_html = Yii::app()->getController()->renderPartial('//cefls/article/xykx', array(
        'articles'=>$articles,
    ),false);

    Yii::app()->cache->set('index_xykx_html', $index_xykx_html, 1000);
    return $index_xykx_html;
}

function get_xzjy(){
    $index_xzjy_html = '';
    if(!YII_DEBUG_CACHE)
        $index_xzjy_html = Yii::app()->cache->get('index_xzjy_html');
    if(!empty($index_xzjy_html)){
        return $index_xzjy_html;
    }

    $cate = Menu::model()->findByPk(67);
    $article = Article::model()->findByAttributes(array('title'=>$cate->menu_name));

    $img = Ads::model()->find('cid=0 AND type=-7 AND enabled=1');

    $index_xzjy_html = Yii::app()->getController()->renderPartial('//cefls/article/xzjy', array(
        'article'=>$article,
        'img'=>$img,
    ),false);

    Yii::app()->cache->set('index_xzjy_html', $index_xzjy_html, 1000);
    return $index_xzjy_html;
}

function get_gsgg(){
    $index_gsgg_html = '';
    if(!YII_DEBUG_CACHE)
        $index_gsgg_html = Yii::app()->cache->get('index_gsgg_html');
    if(!empty($index_gsgg_html)){
        return $index_gsgg_html;
    }

    $articles = Article::model()->article_list(68, 10)->findAll();
    $article = Article::model()->article_list(68, 10)->find();

    $index_gsgg_html = Yii::app()->getController()->renderPartial('//cefls/article/gsgg', array(
        'articles'=>$articles,
        'article'=>$article,
    ),false);

    Yii::app()->cache->set('index_gsgg_html', $index_gsgg_html, 1000);
    return $index_gsgg_html;
}
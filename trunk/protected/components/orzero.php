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


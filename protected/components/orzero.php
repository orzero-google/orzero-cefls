<?php
/**
 * User: jia.li@ckt-telcom.com
 * Date: 12-12-3
 * Time: 下午5:13
 *
 */


function get_menu(){
    $menus = Menu::model()->with('sub_menu')->find('t.menu_type=:menu_type',array(':menu_type'=>1));
    print_r($menus);
    foreach($menus as $menu_one){

        foreach($menu_one->sub_menu as $sub_menu){

        }
    }

}

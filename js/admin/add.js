/*
 <li id="index-menu1" class="w90"><a onclick="onc('1');" href="#">关于学会</a></li>
 <li id="index-menu2" class="w90"><a onclick="onc('2')" href="#">学会动态</a></li>
 <li class="w100"><a href="#">学会大家庭</a></li>
 <li class="w100"><a href="#">学会专家团</a></li>
 <li class="w116"><a href="#">会员学术成就</a></li>
 <li class="w116"><a href="#">会员产权成果</a></li>
 <li class="w116"><a href="#">行业学术动态</a></li>
 <li class="w116"><a href="#">学术刊物集萃</a></li>
 <li class="w116 default"><a href="#">团体会员招聘</a></li>
 */

var item_list=new Array(
    ['学会概况', '章法条则', '组织结构', '大事纪要', '管理团队', '智策顾问'],
    ['公示公告', '学会活动', '关注学会'],
    ['理事会成员', '团体单位会员', '个人会员'],
    ['学会专家团'],
    ['会员学术成就'],
    ['会员产权成果'],
    ['学术论道撷英'],
    ['学术刊物荟萃'],
    ['团体会员招聘']
);
var item_list_id=new Array(
    [10,11,12,13,14,15],
    [16,17,18],
    [19,20,21],
    [22],
    [23],
    [24],
    [25],
    [26],
    [27]
);


function cmenu(num){
//    alert(item_list[num]) ;
//    var item_html=item_list[num].join('</span>|<span>');
//    var item_html = '<p><span>'+item_list[num].join('</span>|<span>')+'</span></p>';
    var item_html='<p><span>';
    if(item_list[num].length > 1)
    for(var $i=0;$i<item_list[num].length;$i++){
        item_html += '<a href="/index.php?r=cate/list&pid='+(num+1)+'&cid='+item_list_id[num][$i]+'">'+item_list[num][$i];
        if($i<(item_list[num].length-1)){
            item_html += '</a></span>|<span>';
        }
    }
    item_html+='</span></p>';

    var item_top = document.getElementById('index-menu-1');
    item_top.innerHTML= item_html;
}
var chinazTopBarMenu = {
    create: function (target, menucontents) {
        if (!document.getElementById(menucontents)) {
            return;
        }
        var contents_wrap = document.getElementById(menucontents);
        var contents = contents_wrap.innerHTML;
        target.className += " hover";
        var dropdownmenu_wrap = document.createElement("div");
        dropdownmenu_wrap.className = "dropdownmenu-wrap";
        var dropdownmenu = document.createElement("div");
        dropdownmenu.className = "dropdownmenu";
        dropdownmenu.style.width = "auto";
        var dropdownmenu_inner = document.createElement("div");
        dropdownmenu_inner.className = "dropdownmenu-inner";
        dropdownmenu_wrap.appendChild(dropdownmenu);
        dropdownmenu.appendChild(dropdownmenu_inner);
        dropdownmenu_inner.innerHTML = contents;
        if (target.getElementsByTagName("div").length == 0) {
            target.appendChild(dropdownmenu_wrap);
        }
    },
    clear: function (target) {
        target.className = target.className.replace(" hover", "");
    }
}

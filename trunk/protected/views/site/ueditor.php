(function(){
window.UEDITOR_HOME_URL="<?php echo $_base;?>";
var URL;
var tmp=window.location.pathname;
URL=window.UEDITOR_HOME_URL||tmp.substr(0,tmp.lastIndexOf("\/")+1).replace("_examples/","").replace("website/","");
window.UEDITOR_CONFIG={
    UEDITOR_HOME_URL:URL,
    imageUrl:URL+"php/imageUp.php",
    imagePath:URL+"<?php echo $_path;?>",
    fileUrl:URL+"php/fileUp.php",
    filePath:URL+"<?php echo $_path;?>",
    catcherUrl:URL+"php/getRemoteImage.php",
    catcherPath:URL+"<?php echo $_path;?>",
    imageManagerUrl:URL+"php/imageManager.php",
    imageManagerPath:URL+"<?php echo $_path;?>",
    snapscreenHost:'127.0.0.1',
    snapscreenServerUrl:URL+"php/imageUp.php",
    snapscreenPath:URL+"<?php echo $_path;?>",
    wordImageUrl:URL+"php/imageUp.php",
    wordImagePath:URL+"<?php echo $_path;?>",
    getMovieUrl:URL+"php/getMovie.php",
    toolbars:[['fullscreen','source','|','undo','redo','|','bold','italic','underline','strikethrough','superscript','subscript','removeformat','formatmatch','autotypeset','|','blockquote','|','pasteplain','|','forecolor','backcolor','insertorderedlist','insertunorderedlist','selectall','cleardoc','|','customstyle','paragraph','|','rowspacingtop','rowspacingbottom','lineheight','|','fontfamily','fontsize','|','directionalityltr','directionalityrtl','|','','indent','|','justifyleft','justifycenter','justifyright','justifyjustify','|','link','unlink','anchor','|','imagenone','imageleft','imageright','imagecenter','|','insertimage','emotion','insertvideo','attachment','map','gmap','insertframe','highlightcode','webapp','pagebreak','|','horizontal','date','time','spechars','snapscreen','wordimage','|','inserttable','deletetable','insertparagraphbeforetable','insertrow','deleterow','insertcol','deletecol','mergecells','mergeright','mergedown','splittocells','splittorows','splittocols','|','print','preview','searchreplace','help']],
    labelMap:{
    'anchor':'锚点','undo':'撤销','redo':'重做','bold':'加粗','indent':'首行缩进','snapscreen':'截图','italic':'斜体','underline':'下划线','strikethrough':'删除线','subscript':'下标','superscript':'上标','formatmatch':'格式刷','source':'源代码','blockquote':'引用','pasteplain':'纯文本粘贴模式','selectall':'全选','print':'打印','preview':'预览','horizontal':'分隔线','removeformat':'清除格式','time':'时间','date':'日期','unlink':'取消链接','insertrow':'前插入行','insertcol':'前插入列','mergeright':'右合并单元格','mergedown':'下合并单元格','deleterow':'删除行','deletecol':'删除列','splittorows':'拆分成行','splittocols':'拆分成列','splittocells':'完全拆分单元格','mergecells':'合并多个单元格','deletetable':'删除表格','insertparagraphbeforetable':'表格前插行','cleardoc':'清空文档','fontfamily':'字体','fontsize':'字号','paragraph':'段落格式','insertimage':'图片','inserttable':'表格','link':'超链接','emotion':'表情','spechars':'特殊字符','searchreplace':'查询替换','map':'Baidu地图','gmap':'Google地图','insertvideo':'视频','help':'帮助','justifyleft':'居左对齐','justifyright':'居右对齐','justifycenter':'居中对齐','justifyjustify':'两端对齐','forecolor':'字体颜色','backcolor':'背景色','insertorderedlist':'有序列表','insertunorderedlist':'无序列表','fullscreen':'全屏','directionalityltr':'从左向右输入','directionalityrtl':'从右向左输入','RowSpacingTop':'段前距','RowSpacingBottom':'段后距','highlightcode':'插入代码','pagebreak':'分页','insertframe':'插入Iframe','imagenone':'默认','imageleft':'左浮动','imageright':'右浮动','attachment':'附件','imagecenter':'居中','wordimage':'图片转存','lineheight':'行间距','customstyle':'自定义标题','autotypeset':'自动排版','webapp':'百度应用'
    }
    ,webAppKey:""
}
})();
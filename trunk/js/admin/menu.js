var menu=2;//定义要切换菜单长度
function onc(id){
for(var i=1;i<=menu;i++){
	if(i!=id){
			$("#index-menu-"+i).hide();
			}else{
				$("#index-menu-"+i).show();
				}	
	}
}


$(document).ready(function() {
     $('#selectDate1').datepicker({
		 dateFormat: 'yy-mm-dd',//日期格式 
		 monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
		 dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六']
     });
	 $('#selectDate2').datepicker({
		 dateFormat: 'yy-mm-dd',//日期格式 
		 monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
		 dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六']
     });
    $('#graduation_date').datepicker({
        dateFormat: 'yymmdd',//日期格式
        monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六']
    });
    $('#birthday').datepicker({
        dateFormat: 'yymmdd',//日期格式
        monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六']
    });

});

$(document).ready(function(){
	$("select[name='city_id']").bind("change",function(){
		set_area();
	});
	set_area();
	$("input[name='supplier_key_btn']").bind("click",function(){
		search_supplier();
	});
});

function set_area()
{
	var city_id =$("select[name='city_id']").val();
	var id = $("input[name='id']").val();
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=area_list&city_id="+city_id+"&id="+id, 
		data: "ajax=1",
		success: function(obj){
			$("#area_list").html(obj);
		}
	});	
}
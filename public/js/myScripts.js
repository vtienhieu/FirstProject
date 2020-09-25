$(document).ready(function () {
	$("#addImages").click( function(){
		$("#insert").append('<br><input type="file" name="fProductDetail[]"><br>')
	});
} );


$(document).ready(function (){
	$("a#del_img_demo").on('click',function (){
		var url = "http://localhost:8080/webbanhang/public/admin/delimg/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr("idHinh"); // lấy ra id của hình trong database
		var img = $(this).parent().find("img").attr("src"); //lấy đường dẫn ảnh bên views -- parent là dòng bên trên
		var rid = $(this).parent().find("img").attr("id"); // tương tự trên
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success: function(data){
				if(data == "Done") {
					$("#"+rid).remove();
				} else {
					alert("Error")
				}
			}
		});
	});
});
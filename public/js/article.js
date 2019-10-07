
$(function(){
	$("#button").click(function(){
		$("#img").click();
	});
	$('#img').on('change',function(){
		$file=$(this)[0].files[0];
		var reader=new FileReader();
		reader.readAsDataURL($file);
		reader.onload=function(){
			$('.img-thumbnail').attr('src',reader.result);
		};
	})
})
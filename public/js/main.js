// // alert('Hello');
// $("#click_modal").click(function(e){
// 	e.preventDefault();

// 	var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
// 	console.log(postBody);
// 	if (postBody) {
// 		console.log('done');
// 		console.log(postBody)
// 	}else{
// 		console.log('not done');
// 	}
// })





var request_title = $("#request_title");
var request_type = $("#request_type");
var request_body = $("#request_body");

$("#edit_icon").css('display', 'none');

request_title.focus(function(){
  $("#edit_icon").show();
  $(".md_title").hide(); 
});

request_title.blur(function(){
  $("#edit_icon").hide();  
});


request_type.focus(function(){
  $("#edit_icon").show();  
});


request_type.blur(function(){
  $("#edit_icon").hide();  
});

request_body.focus(function(){
  $("#edit_icon").show();  
});


request_body.blur(function(){
  $("#edit_icon").hide();  
});


  

function readURL(){
  	if (input.files && input.files[0]) {
  		var reader = new FileReader();
  		reader.onload = function(e){
  			$("#show_display").attr(e.target.result);
  		}
  		reader.ReadAsDataURL(input.files[0]);
  	}
  }
  $("#input_image").change(function(){
  	readURL(this); //display the url of the image to be uploaded in the input file field
  });

$("#notification").click(function(){
  $(this).css('color', 'white');
});

$("#minus_circle").click(function(){
	$(".tbl_wrap").slideUp();
	$(this).css('display','none');
	$("#plus_circle").show();
	// $(this).removeClass("glyphicon-chevron-down");
	// $(this).addClass("glyphicon-chevron-up");
	// var chevron_up = $(this).addClass("glyphicon-chevron-up");

});

$("#plus_circle").click(function(){
	// alert('sdcd')
	$(".tbl_wrap").slideDown();
	$(this).css('display','none');
	$(".#minus_circle").show();

});
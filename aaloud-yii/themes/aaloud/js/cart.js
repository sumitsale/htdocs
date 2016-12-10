//Add to Cart Function for Tool Tip
$(document).ready(function(){
	$(".addToCart").live('click', function(){
		var url = baseUrl + '/site/addToCart';
		var content_id = $(this).attr('content_id');
		var content_type_id = $(this).attr('content_type_id');
		var content_title = $(this).attr('content_title');
		$.post(url, {'content_id':content_id, "content_type_id":content_type_id, "content_title":content_title}, function(data){
			 var myString = data;
			 var mySplitResult = myString.split("::");
			   if(mySplitResult[2]!=0){
				   alert("Item already exists in your Cart.");
           $(".CartCounter").html(mySplitResult[1]);
				   return false;
			   }
         $(".CartCounter").html(mySplitResult[1]);
				 alert("Item has been added to your Cart.");
		});
	});
	$('.my-cart-link').live('click', function(){
		if($('.my-cart-link .CartCounter').text() == 0){
	  		alert("You have no Items in Cart!");
			return false;
		}
	});
});
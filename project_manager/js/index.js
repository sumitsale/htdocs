$(document).ready(function(){
    $("#register_form").validationEngine('attach');
	$("#update_issue_form").validationEngine('attach');
	$("#user_login_form").validationEngine('attach');
	
	
	
	// $('#select_all').click (function(){
		// alert(1);
		// });
		
		 $('#select_all').toggle(function(){
		
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all');
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    });
});
function saveRegistrationForm() {
	var boolean = $("#register_form").validationEngine('validate');
    if(boolean){
        var postStr =$('#register_form').serialize();
		//alert(postStr);
        postStr += '&action=insert';
        $.ajax({
            url: "register.php",
            dataType: "json",
            type: "post",
            data: postStr,
			success: function (resp) {
			// alert(resp);
			
			// alert(resp.flag);
			// alert(resp.refresh_url);
			
				if(resp.flag == 'success')
				{
					window.location.href = resp.refresh_url;
				}
			}
		});
	}
}
function saveUpdateIssueForm() { 
	var boolean = $("#update_issue_form").validationEngine('validate');
}
function isAutheticUser() {
	var boolean = $("#user_login_form").validationEngine('validate');
	
	 if(boolean){
        var postStr =$('#user_login_form').serialize();
		//alert(postStr);
        postStr += '&action=login';
        $.ajax({
            url: "login.php",
            dataType: "json",
            type: "post",
            data: postStr,
			success: function (resp) {
			console.log(resp);
			
			if(resp.flag == 'success')
				{
					window.location.href = resp.refresh_url;
				}
				else
				{
					alert("Authntication failed");
				}
			
			}
		});
	}
}	


function delete_issue()
{
  var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });

		
                
            $.ajax({
                url: 'delete_issue.php',
                type: 'post',
                data: { ids: myCheckboxes.join(",") },
                success:function(data){
						window.location.href= window.location.href;
                }
            });


}
 
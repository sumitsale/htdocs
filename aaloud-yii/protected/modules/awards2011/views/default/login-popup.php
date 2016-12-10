  
   <?php
  //Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.stepy.css');

  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bbq.js');
  Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.form.wizard.js');
  ?>
  
  <script type="text/javascript">
  $(document).ready(function(){
  

  
     $('#forgot-popup').live('click', function (e) {
        jQuery.modal.close();
        window.setTimeout(function() {jQuery('#basic-modal-content-forgotpass').modal()}, 250);																
        jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
        
		$('#basic-modal-content-forgotpass').modal({
          minHeight:300,
          minWidth: 300
        });
        return false;
      });
			
		 $('#log-content').validate({
        submitHandler: function(form) {
          jQuery(form).ajaxSubmit({
            success: function(data){
              if(data != '200'){
			  	$('#log-content div.login-form-error').html('Invalid details. Please try again.');
               // alert("Email and Password you have entered are not correct. Please try again.");
                return false;
              }
              else{
                window.location.href=window.location.href;
              }
            }
          });
        },
        errorPlacement: function(error, element) {
          $('#log-content div.login-form-error').append(error);
        }, 
        rules: {
          email:{ required: true, email:true },
          password:{required: true}
                  											  
        }, 
        messages: {
          'email': { required: 'Email is required. ', email: 'Invalid e-mail! ' },
          'password': {required: 'please Enter the password. '}
        }
      });
	  
	  
	  
	  
	  $('#forgotpass-content').validate({
        submitHandler: function(form) {
          jQuery(form).ajaxSubmit({
            success: function(data){
              if(data != '200'){
                //alert("Email address is not present in our system.");
               $('#forgotpass-content div.forgot-form-error').html('Email address is not present');
			   return false;
              }
              else{
                alert('The email has been sent to Your Email ID');
                //$('#forgotpass-content div.forgot-form-error').html('The email has been sent to Your Email ID.');
				jQuery.modal.close();
              }
            }
          });
        },
        errorPlacement: function(error, element) {
          $('#forgotpass-content div.forgot-form-error').html(error);
        }, 
        rules: {
          email:{ required: true, email:true }
        }, 
        messages: {
          'email': { required: 'Email is required. ', email: 'Invalid e-mail! ' }
        }
      });
              
  
  
    });
                  				
  </script>




<div class="login-pop">
	<div class="login-header">
		<div class="log_header"><h2 class="pop-title">Log In</h2></div>
    </div>
 <div class="log-content">
          <form action="<?php echo CController::createUrl("default/userlogin"); ?>" id="log-content" method="post">
          <div class="login-form-error"></div>
          <table width="100%" border="0" cellspacing="15" cellpadding="0">
            <tr>
              <td>Email Id</td>
              <td>
                <input type="text" id="email" name="email" class="log_input fnt11" /></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password" id="password" name="password" class="log_input fnt11"/></td>
            </tr>
            <tr>
              <td colspan="2">
                <div>
                  <input class="next-img" id="next" value="Next" type="submit" />
                <?php /*?>  <span class="password"><a href="javascript:;" id="forgot-popup">Forgot Password?</a></span></div><?php */?>
              </td>            
            </tr>
             <tr>
              <td colspan="2">
                <div style="margin-left:18px;">
                 New User? : <span class="password"><a href="site/index" class="red" target="_blank">Register Here</a></span>
                  </div>
              </td>            
            </tr>
						
						<?php //echo CHtml::link('Register', $this->createUrl('site/index'), array('class' => 'readmore mt5')); ?>
						
          </table>
        </form>
      </div>
</div>


<div id="basic-modal-content-forgotpass">
    <div class="forgotpass-pop">
      <div class="forgotpass-header">
        <div class="login-header">
        <div class="log_header">
          <h2 class="pop-title">Forgot Password</h2>
        </div>
      </div>
      </div>
      <div class="log-content">
        <form action="<?php echo CController::createUrl("site/userForgotPass"); ?>" id="forgotpass-content" method="post">
          <div class="forgot-form-error"></div>
          <table width="100%" border="0" cellspacing="15" cellpadding="0">
            <tr>
              <td>Email Id</td>
              <td>
                <input type="text" id="email" name="email" class="log_input fnt11" /></td>
            </tr>
            <tr>
              <td colspan="2">
                <div>
                  <input class="next-img" id="submit" value="Next" type="submit" />
              </td>            
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
    
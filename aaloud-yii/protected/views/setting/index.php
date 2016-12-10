<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/organictabs.jquery.js');
?>



<script type="text/javascript">
function PasswordValidation(){
			current_pwd = document.getElementById('txtCurrentPassword').value;
			new_pwd = document.getElementById('mypassword').value;
			confirm_pwd = document.getElementById('txtConfirmPassword').value;
			if(current_pwd==''){
				alert("Please enter your current password.");
				document.getElementById('txtCurrentPassword').focus();
				return false;
			}
			if(new_pwd==''){
				alert("Please enter the new password.");
				document.getElementById('mypassword').focus();
				return false;
			}
			if(new_pwd!=''){
				if(new_pwd.length < 6){
					alert("Please enter minimum 6 characters.");
					document.getElementById('mypassword').focus();
					return false;
				}
			}
			if(confirm_pwd==''){
				alert("Please confirm the new password.");
				document.getElementById('txtConfirmPassword').focus();
				return false;
			}else{
				if(new_pwd!=confirm_pwd){
					alert("Password confirmation failed.");
					document.getElementById('txtConfirmPassword').focus();
					document.getElementById('txtConfirmPassword').value='';
					return false;
				}
			}
			return true;
		}
		
		</script>


<div class="content-left fl">
			<?php 

				  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
				  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.min.js');
				  
			?>
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Setting
								</div>
								
								<script type="text/javascript">
								  $(document).ready(function() {
											var nickname;
											 $("#sub1").click(function() {
											
												
												

											     });

								 });
								</script>
								
								<script language="javascript" TYPE="text/javascript">
									$(document).ready(function(){
										$("#editProfileSubmit").click(function(){
										var nickname = $('#nickname').val();
										if(nickname=='')
										{
										alert('Please Enter Nick name');
										return false;
										}
										
										var ext = $('#profileimage').val().split('.').pop().toLowerCase();
										if(ext=='')
										{
										alert('Please Select Profile Image');
										return false;
										}
										
										if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
												alert('Invalid Extension !');
												return false;
										}
										
										
									
											$("#editprofile").submit();
											return false;
										});
										
										var editprofile = '<?php echo $this->createUrl('/setting/editprofile'); ?>';
										jQuery("#editprofile").ajaxForm({
										  success: function(data) {
										if(data==200)
											{
											alert('Profile has been updated successfully');
											}
										
										  },
										  url: editprofile
										});
									});
								</script>
								
								
								
								
								
								<script language="javascript" TYPE="text/javascript">
									$(document).ready(function(){
										$("#editaccountsubmit").click(function(){
										
											var firstname = $('#firstname').val();
											if(firstname=='')
												{
													alert('Please Enter First Name.');
													return false;
												}
												
											var city = $('#city').val();
											if(city=='')
												{
													alert('Please Enter Your City.');
													return false;
												}

											var setting_email = $('#emailid').val();
												if(setting_email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
													
												} else {
													alert('Invalid Email Id.');
													return false;
												}
											
											var setting_phone = $('#mobile').val();
											if(setting_phone.match(/^\d{10,12}$/)) {
												
											} else {
												alert('Invalid Mobile Number.');
												return false;
											}
											
											$("#editaccount").submit();
											return false;
										});

										var editprofile = '<?php echo $this->createUrl('/setting/editaccount'); ?>';
										jQuery("#editaccount").ajaxForm({
										  success: function(data) {
											if(data==200)
											{
											alert('Your Account has been Updated Successfully.')
											}
										  },
										  url: editprofile
										});
									});
								</script>
								
								  <script type="text/javascript">
									 $(document).ready(function(){
											 $('#password-content').validate({
												submitHandler: function(form) {
												  jQuery(form).ajaxSubmit({
													success: function(data){
													  if(data != '200'){
														$('#password-content div.password-form-error').html('Password you entered is wrong.');
													   // alert("Email and Password you have entered are not correct. Please try again.");
														return false;
													  }
													  else{
														$('#password-content div.password-form-error').html('Password has been changed successfully.');
													  }
													}
												  });
												  
												},
												errorPlacement: function(error, element) {
												  $('#password-content div.password-form-error').append(error);
												}, 
												rules: {
												  password:{ required: true},
												  newpassword:{required: true, minlength: 5},
												  confirmpassword:{required: true, minlength: 5,equalTo: "#newpassword"}
																									  
												}, 
												messages: {
												  'password': { required: 'Please Enter Your Old Password. ' },
												  'newpassword': {required: 'Please Enter Your New Password.',minlength:'minimum 6 digit'},
												  'confirmpassword': {required: 'Please Confirm Your New Password. ',minlength:'minimum 6 digit',equalTo:'Password and Confirm Password must be same.'}
												}
											  });

									    });

									</script>
								
								
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Settings</h2>
      
                <div class="clr"></div>
                </div>
				
                <div class="upload-form">
                
                	<div class="tabs">
          
          
          <div id="playlist">
            <ul class="nav">
              <li class="nav-one"><a href="#featured2" class="current"><span class="font-mole">edit profile</span></a></li>
              <li class="nav-two"><a href="#core2"><span class="font-mole">edit account</span></a></li>
               <li class="nav-three"><a href="#core3"><span class="font-mole">edit password</span></a></li>
            </ul>
            <div class="list-wrap scroll-pane-after">
            
             <!--Edit Profile tab-->
              <div id="featured2">
                <div class="top-text bdrbtm">
                <div class=" pad20 grey99 font-mole fnt14 ">Please edit your profile details.</div></div>
                 <div class="top-text"><div class=" pl20 pt20 pb10 font-mole fnt14">All fields are compulsary.</div>
                 
                 <div class="pl20">
				 
				 
				 
				 
                 	
					
					  <?php
								echo CHtml::beginForm('', 'post', array(
									'id' => 'editprofile',
									'name' => 'editprofile',
									'enctype' => 'multipart/form-data'
								));
						?>
					
                     <div class="mt15 ml25"><div class="fl w115 font-mole fnt14 grey99">Nick Name</div> 
					 <div class="fl">
					
					
					
					
					  <?php echo CHtml::textField('nickname',$model->NICK_NAME,array('class'=>'log_input wd170')); ?> 
					 </div><div class="clr"></div></div>
					 
					 
                     <div class="mt15 ml25"><div class="fl w115 font-mole fnt14 grey99">Profile image</div> 
					 <div class="fl">
			     	
					 <?php echo CHtml::fileField('profileimage',$model->PROFILE_IMAGE,array('class'=>'filetype log_input fnt11')); ?>
					 </div><div class="clr"></div></div>
					 
                     <div class="mt15 ml25"><div class="fl w115 font-mole fnt14 grey99">About you</div>
					 <div class="fl">
					
					 <?php echo CHtml::textArea('Aboutyou',$model->ABOUT_YOU,array('class'=>'log_input w300')); ?>
					 </div><div class="clr"></div></div>
					 
                      <div class="mt15 ml25"><div class="fl w115 font-mole fnt14 grey99">Music you like</div>
					  <div class="fl">
					 
					   <?php echo CHtml::textArea('musicyoulike',$model->MUSIC_YOU_LIKE,array('class'=>'log_input w300')); ?>
					  </div><div class="clr"></div></div>
					  
					  
                      <div class="mt15 ml25"><div class="fl w115 font-mole fnt14 grey99">Favorite artists</div> 
					  <div class="fl">
					 
					  <?php echo CHtml::textArea('favoriteartist',$model->FAV_ARTIST,array('class'=>'log_input w300')); ?>
					  </div><div class="clr"></div></div>
					  
                       <div class="mt15 ml25 pb10"><div class="fl w115 grey99 h10"> 
					   &nbsp; </div> <div class="fl">
					   <a class="next-img font-mole fnt14" id="editProfileSubmit" href="#">Save</a>
					   </div><div class="clr"></div></div>
                  
					 <?php echo CHtml::endForm(); ?>
					 
					 
					 
					 
                 </div>
                 
                 
                 </div>
                
              </div>
              <!--Edit Profile tab-->
              
               <!--Edit Account tab-->
              <div id="core2" class="hide">
               
              	 <div class="top-text bdrbtm">
                <div class=" pad20 grey99 font-mole fnt14 ">Please edit your account details.</div></div>
                 <div class="top-text"><div class=" pl20 pt20 pb10 font-mole fnt14">All fields are compulsary.</div>
                 
                 <div class="pl20">
                 <!--<form>-->
				 
				  <?php
								echo CHtml::beginForm('', 'post', array(
									'id' => 'editaccount',
									'name' => 'editaccount',
									'enctype' => 'multipart/form-data'
								));
						?>
                    
                    	<div class="fl w300">
                        	<div class="mt15"><div class="fl w80 font-mole fnt14 grey99">First Name</div> <div class="fl">
							<!--<input type="text" class="log_input wd170" />-->
							 <?php echo CHtml::textField('firstname',$model1->A_FIRST_NAME,array('class'=>'log_input wd170')); ?> 
							</div><div class="clr"></div></div>
							
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Age</div> <div class="fl">
                          <!--  <select class="log_input wd170">
                            	<option>1</option>
                                <option>2</option>
                            </select>-->
                            <!--<input type="text" class="log_input wd170" />-->
							
							
							<?php 
							$artistage[0]=array('id'=>'1','age'=>'18-25yrs');
							$artistage[1]=array('id'=>'2','age'=>'25-45yrs');
							$artistage[2]=array('id'=>'3','age'=>'45-60yrs');
							$artistage[3]=array('id'=>'4','age'=>'Above 60');
							?>
								<?php echo CHtml::dropDownList('age',$model2->USER_AGE, CHtml::listData($artistage,'id','age'),array('class'=>'log_input wd170')); ?>
							
							</div><div class="clr"></div></div>
							
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">City</div> <div class="fl">
							<!--<input type="text" class="log_input wd170" />-->
							 <?php echo CHtml::textField('city',$model2->USER_CITY,array('class'=>'log_input wd170')); ?>
							</div><div class="clr"></div></div>
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Email ID</div> <div class="fl">
							<!--<input type="text" class="log_input wd170" />-->
							 <?php echo CHtml::textField('emailid',$model1->A_EMAIL_ID ,array('class'=>'log_input wd170')); ?>
							</div><div class="clr"></div></div>
                        
                        </div>
                        
                        <div class="fl w300">
                        	<div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Last Name</div> <div class="fl">
							<!--<input type="text" class="log_input wd170" />-->
							 <?php echo CHtml::textField('lastname',$model1->A_LAST_NAME,array('class'=>'log_input wd170')); ?>
							</div><div class="clr"></div></div>
							
							
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Gender</div> 
							<div class="fl">
                            
                           <div>
                            
							<!--<input type="radio" id="single" name="artist" checked value="artist">-->
							<?php //echo CHtml::radioButton('gender','M',array('value'=>'M')); ?>

							
                            </div>
                          <!--  <label for="single" class="radios font-mole">Male</label>-->
                           
                            <div>
                            <!--<input type="radio" id="married" name="artist" value="genre">-->
						    <?php //echo CHtml::radioButton('gender','F',array('value'=>'F')); ?>
							<?php echo CHtml::radioButtonList('gender',$model2->USER_GENDER,array('M'=>'Male','F'=>'Female'),array('separator'=>'')); ?>
                            </div>
                           <!-- <label for="married" class="radios font-mole">Female</label>-->
							
							 <?php  /*
										$gender = array('male'=>'Male', 'female'=>'Female');
										echo CHtml::radioButtonList('','gendername',$gender,array('separator'=>' '));
									*/

							?>
							
							
                            
                            </div><div class="clr"></div></div>
							
							
							
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Country</div> <div class="fl">  
                            <!--<select class="log_input wd170">
                            	<option>India</option>
                                <option>USA</option>
                              </select>-->
							<?php $countryarray = Yii::app()->db->createCommand()
												->select('*')
												->from('tbl_country_master')
												->order('COUNTRY_NAME asc')
												->queryAll();
												
												//echo "<pre>";
												//print_r($countryarray);exit;
												
												?>
							
							
							
							
							<?php echo CHtml::dropDownList('country',$model2->USER_COUNTRY,CHtml::listData($countryarray,'COUNTRY_ID','COUNTRY_NAME'),array('class'=>'log_input wd170')); ?>
							
							</div><div class="clr"></div></div>
							
							
                            <div class="mt15"><div class="fl w80 font-mole fnt14 grey99">Mobile</div> <div class="fl">
							<!--<input type="text" class="log_input wd170" />-->
							 <?php echo CHtml::textField('mobile',$model1->A_MOBILE_NO ,array('class'=>'log_input wd170')); ?>
							</div><div class="clr"></div></div>
                        
                        </div>
                    
                   
                     <div class="clr"></div>
                       <div class="mt15 pb10"><div class="fl w80 grey99 h10"> &nbsp; </div> <div class="fl">
					   <a class="next-img font-mole fnt14" id="editaccountsubmit" href="#">Save</a>
					   </div><div class="clr"></div></div>
                   <!--  </form>-->
				    <?php echo CHtml::endForm(); ?>
				   
                 </div>
                 
                 
                 </div>

              </div>
               <!--Edit Account tab-->
              
              <!--Edit Profile tab-->
              <div id="core3" class="hide">
               
              	 <div class="top-text bdrbtm">
                <div class=" pad20 grey99 font-mole fnt14 ">Password you are having was Auto generated. Please change your password here.</div></div>
                 <div class="top-text"><div class=" pl20 pt20 pb10 font-mole fnt14">All fields are compulsary.</div>
                 
                 <div class="pl20">
                 	<form action="<?php echo CController::createUrl("site/chagepassword"); ?>" id="password-content" method="post">
                     <div class="password-form-error"></div>
                     <div class="mt15 ml25"><div class="fl w145 font-mole fnt14 grey99">Old Password</div> 
					 
					 <div class="fl"><input type="password" class="log_input wd170" name="password" id="password"/></div>
					 
					 <div class="clr"></div></div>
                      <div class="mt15 ml25"><div class="fl w145 font-mole fnt14 grey99">New Password</div> 
					  
					  <div class="fl"><input type="password" class="log_input wd170" name="newpassword" id="newpassword" /></div>
					  
					  <div class="clr"></div></div>
                       <div class="mt15 ml25"><div class="fl w145 font-mole fnt14 grey99">Re-type New Password</div>
					   <div class="fl"><input type="password" class="log_input wd170" name="confirmpassword" id="confirmpassword" /></div>
					   
					   <div class="clr"></div></div>
                     
                       <div class="mt15 ml25 pb10"><div class="fl w145 grey99 h10"> &nbsp; </div> 
					   <div class="fl">
					  <!-- <a class="next-img font-mole fnt14" href="#">Save</a>-->
					    <input class="next-img" id="next" value="Save" type="submit" />
					   </div>
					   <div class="clr"></div></div>
                     </form>
                 </div>
                 
                 
                 </div>

              </div>
               <!--Edit Profile tab-->
              
              
            </div>
            <!-- END List Wrap -->
          </div>
          
          
        </div>
                
               </div>
                
               
</div>
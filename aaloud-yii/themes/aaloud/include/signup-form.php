<?php
if (Yii::app()->session["H_FULL_NAME"] != '') {
  
} else {
  ?>

  <?php
  //Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.stepy.css');

  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bbq.js');
  Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.form.wizard.js');
  ?>
	
	<?php
    $genrearray = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
						->order('GENRE_NAME asc')
            ->queryAll();
    $totalgenre = count($genrearray);
		
		//echo "<pre>";
		 //print_r($genrearray);exit;


    $languagearray = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
    $totallanguage = count($languagearray);
    //echo "<pre>";
		 //print_r($languagearray);exit;

    $countryarray = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_country_master')
            ->order('COUNTRY_NAME asc')
            ->queryAll();
    //print_r($countryarray);exit
    $totalcountry = count($countryarray);
    ?>

  <script type="text/javascript">
    $(document).ready(function(){
            
      // Load dialog on click
      $('#basic-modal-signup .basic-signup').click(function (e) {
        $('#basic-modal-content-signup').modal({
          onShow: function(dialog){
            makeFormWizard();
          },
          autoResize: true,
          maxHeight: 400
        });
        return false;
      });
         
      var makeFormWizard = function(){
        $("#sign-up-form").formwizard({ 
          formPluginEnabled: true,
          validationEnabled: true,
          validationOptions:{
            errorPlacement: function(error, element) {
              $('#sign-up-form div.sign-up-form-error').append(error);
            }, 
            rules: {
              firstname: { required: true, minlength:3, maxlength:30 },
              lastname: { required: true, minlength:3, maxlength:30 },
              age: { required: true },
              gender: {required: true },
              city: { required: true },
              country: { required: true },
              mobile: { required: true, minlength:10, maxlength:10, number:true },
              email:{ required: true, email:true },
              band:{required: true},
              genre:{required: true},
              bio:{required: true},
              insp:{required: true},
              /*track:{required: true},
              language:{required: true},
              song:{required: true, accept: 'mp3'},*/
              profilename:{required: true, minlength: 3},
              profileimage:{required: true, accept: 'jpg|jpeg|gif|png'},
              aboutme:{required: true, minlength: 3},
              likemusic:{required: true, minlength: 3},
              favartist:{required: true, minlength: 3}
            }, 
            messages: {
              'firstname': { required: 'Firstname is required. ', minlength: 'First name minimum 3 chars. ', maxlength: 'First name maximum 30 chars. ' },
              'lastname': { required: 'Lastname is required. ', minlength: 'Last name minimum 3 chars. ', maxlength: 'Last name maximum 30 chars. ' },
              'age': { required: 'Please select Your age. ' },
              'gender': { required: 'Gender is required. ' },
              'city': { required: 'City is required. ' },
              'country': { required: 'Country is required. ' },
              'mobile': { required: 'Mobile is required. ', minlength: 'Mobile min 10 numbers. ', maxlength: 'Mobile max 10 numbers. ', 'number': 'Mobile only number. ' },
              'email': { required: 'Email is required. ', email: 'Invalid e-mail! ' },
              'band': {required: 'Band Name is required. '},
              'genre': {required: 'Genre Name is required. '},
              'bio': {required: 'Bio Brief is required. '},
              'insp': {required: 'Inspiration is required. '},
              /*'track': {required: 'Track Name is required. '},
              'language': {required: 'Language is required. '},
              'song': {required: 'Track File is required. ', accept: 'File to be mp3 only. '},*/
              'profilename': {required: 'Profile name is required. '},
              'profileimage': {required: 'Profile image is required. ', accept: 'Accept Only (JPG, GIF, PNG)'},
              'aboutme': {required: 'Tell something about You. '},
              'likemusic': {required: 'Music You like?. '},
              'favartist': {required: 'Favorite Artist?. '}
            }
          },
          focusFirstInput : true,
          formOptions :{
            success: function(data){
			  $(".loader-sign").html("");
              if(data == '200'){
                jQuery.modal.close();
                window.setTimeout(function() {jQuery('#basic-modal-content-thank').modal()}, 250);																
                jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
              }else{
                alert(data);
              }
            },
            beforeSubmit: function(data){
              //$("#data").html("data sent to the server: " + $.param(data));
			$(".loader-sign").html('<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loader-signup.gif" />');			 
            },
            dataType: 'html',
            resetForm: false
          }	
        });
      }
      
    });
  </script>

  <div style="display:none">
    <div id="basic-modal-content-signup">
      <div class="sign-up">
        <div class="sign-up-header">
          <div class="log_header">
            <h2 class="pop-title">Sign Up</h2>
          </div>
        </div>
        <div class="sign-up-content" id="signupdiv">
          <div class="sign-up-text">
            <p><strong style="color:#CCC">All fields are compulsory.</strong></p>
          </div>
          <div class="sign-up-form">
            <form action="<?php echo $this->createUrl('/site/signup'); ?>" id="sign-up-form" method="post" enctype="multipart/form-data">
              <div class="sign-up-form-error"></div>
              <div id="fieldWrapper">
                <div class="step" id="first">
                  <table width="100%" border="0" cellspacing="12" cellpadding="0">
                    <tr>
                      <td><label>Are you</label></td>
                      <td>
                        <div class="fl"> 
                        <div id="box-single">
                          <input type="radio" id="usertype-actor" class="usertype link" name="usertype" value="A" />
                          </div>
                          <div class="fl pl5">An Artist</div>
                        </div> 
                        <div class="fl ml10">
                        <div id="box-single">
                          <input type="radio" id="usertype-listner" class="usertype link" name="usertype" value="L" checked="checked" />
                        </div>
                          <div class="fl pl5">A Listener</div>
                        </div>
                      </td>
                      <td></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>First Name</td>
                      <td><input type="text" name="firstname" id="fname" class="log_input fnt11"/>
                      </td>
                      <td>Last Name</td>
                      <td><input type="text" name="lastname" id="lname" class="log_input fnt11"/></td>
                    </tr>
                    <tr>
                      <td>Age</td>
                      <td><select name="age"  id="age" class="wd180 log_input fnt11" >
                          <option></option>
                          <option value="age1">18-25yr</option>
                          <option value="age2">25-45yr</option>
                          <option value="age3">45-60yr</option>
                          <option value="age4">Above 60</option>
                        </select></td>
                      <td>Gender</td>
                      <td>
                        <div class="fl"> 
                        <div id="box-single">
                          <input type="radio" name="gender" value="M" checked="checked"/>
                          </div>
                          <div class="fl pl5">Male</div>
                        </div> 
                        <div class="fl ml10">
                        <div id="box-single">
                          <input type="radio" name="gender" value="F" />
                          </div>
                          <div class="fl pl5">Female</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><input type="text" name="city" id="city" class="log_input fnt11" /></td>
                      <td>Country</td>
                      <td><select name="country" id="country" class="log_input wd180 fnt11">
                          <option  value="">Select Country</option>
                          <?php
                          for ($i = 0; $i < $totalcountry; $i++) {
                            ?>
                            <option value="<?php echo $countryarray[$i]['COUNTRY_NAME']; ?>"><?php echo $countryarray[$i]['COUNTRY_NAME']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><input type="text" name="email" id="email" class="log_input fnt11"/></td>
                      <td>Mobile</td>
                      <td><input maxlength="10" type="text" name="mobile" id="mobile" class="log_input fnt11"/></td>
                    </tr>
                  </table>
                </div>
                <div id="A" class="step">
                  <table width="100%" border="0" cellspacing="12" cellpadding="0">
                    <tr>
                      <td>Band/Artist Name</td>
                      <td><input type="text" name="band" class="log_input fnt11" id="brand"/></td>
                      <td>Genre</td>
                      <td><select name="genre" id="genre" class="log_input wd180 fnt11">
                          <option value="">Select Genre</option>
                          <?php for ($i = 0; $i < $totalgenre; $i++) { ?>
                            <option value="<?php echo $genrearray[$i]['GENRE_NAME']; ?>"><?php echo $genrearray[$i]['GENRE_NAME']; ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Brief Bio</td>
                      <td><textarea name="bio" id="briefbio" class="log_input  fnt11"></textarea></td>
                      <td>Inspiration</td>
                      <td><textarea name="insp" id="insp" class="log_input  fnt11"></textarea></td>
                    </tr>
                    <tr>
                      <td>Track name</td>
                      <td><textarea name="track" id="track" class="log_input  fnt11"></textarea></td>
                      <td>Language</td>
                      <td>
                        <select name="language" id="language" class="log_input wd180 fnt11">
                          <option value="">Select Language</option>
                          <?php for ($i = 0; $i < $totallanguage; $i++) { ?>
                            <option value="<?php echo $languagearray[$i]['LANGUAGE_TITLE']; ?>"><?php echo $languagearray[$i]['LANGUAGE_TITLE']; ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr id="artistmusic" style="">
                      <td></td>
                      <td colspan="3"><input type="file" id="musictrack" name="song" class="log_input"></td>
                    </tr>
                  </table>
                </div>
                <div id="L" class="step submit_step">
                  <table width="100%" border="0" cellspacing="12" cellpadding="0">
                    <tr>
                      <td>Nick Name</td>
                      <td><input type="text" name="profilename" id="nickname" class="log_input fnt11"/></td>
                      <td>Profile Image</td>
                      <td><input type="file" id="profileimage" name="profileimage" class="regInput2 log_input" /></td>
                    </tr>
                    <tr>
                      <td>About You</td>
                      <td><textarea name="aboutme" rows="3" class="regInput2 log_input" id="about"></textarea></td>
                      <td>Music<br />
                        You Like</td>
                      <td><textarea name="likemusic" rows="3" class="regInput2 log_input" id="musiclike"></textarea></td>
                    </tr>
                    <tr>
                      <td>Favourite Artists</td>
                      <td colspan="3"><textarea name="favartist" id="artistlike" rows="3" class="regInput2 log_input"></textarea></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div id="demoNavigation" class="mt20" style="text-align:center;"> 							
                <input class="navigation_button" id="back" value="Back" type="reset" />
                <input class="navigation_button next-img" id="next" value="Next" type="submit" />
               <span class="loader-sign"></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<!-- modal content -->
<div style='display:none'>
  <div id="basic-modal-content-thank">
    <div class="sign-up">
      <div class="sign-up-header">
        <div class="log_header">
          <h2 class="pop-title">Successfully Registered</h2>
        </div>
      </div>
      <div class="sign-up-content" id="signupdiv">
        <div class="sign-up-text">
          <p class="font-mole fnt22"><strong style="color:#CCC">Welcome to ArtistAloud.com</strong></p>
         <p> An auto-generated password has been sent to the email address you just provided. <br />Kindly use the same to login as a registered user. </p>
         <p>
Go ahead and experience the universe of music that is original and exclusive. <br />Be a part of the movement that is called "Independent". This is a site that commits to bridge<br /> the gap between the Artist and his fan. Take the opportunity to connect with<br /> your artist and fight against piracy by buying the music. </p>
 <p class="font-mole fnt22"><strong style="color:#CCC">MUSIC FIRST!</strong></p>
        </div>
        <div class="sign-up-form"> </div>
      </div>
    </div>
  </div>
</div>
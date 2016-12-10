<?php
if (Yii::app()->session["H_FULL_NAME"] != '') {
  
} else {
  ?>

  <?php
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.stepy.css');

  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.stepy.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
  ?>

  <script type="text/javascript">
    $(document).ready(function(){
      var goingBack = false;
      $('#sign-up-form').stepy({
        back: function(index) {
          //alert('Going to step ' + index + '...');
          goingBack = true;
        }, 
        next: function(index) {
          //alert('Current step ' + index + '.');
        }, 
        select: function(index) {
          //alert('Going to step ' + index + '...');
          //alert($('input[name=usertype]:checked', '#sign-up-form').val());
          if(index == 2 && $('input[name=usertype]:checked', '#sign-up-form').val() == "L" && goingBack == false){
            $('#sign-up-form').stepy('step', 3);
          }
          if(index == 2 && $('input[name=usertype]:checked', '#sign-up-form').val() == "L" && goingBack == true){
            $('#sign-up-form').stepy('step', 1);
            goingBack = false;
          }
          if(index == 1) $("#simplemodal-container").css('height', '320px');
          if(index == 2) $("#simplemodal-container").css('height', '370px');
          if(index == 3) $("#simplemodal-container").css('height', '370px');
        }, 
        finish: function(index) {
          var signUpUrl = '<?php echo $this->createUrl('/site/signup'); ?>';
          $('#sign-up-form').ajaxSubmit({
            success: function(data) {      	 
              alert('Form Ajax Submitted');//alert(data);
              if(data==1){
                jQuery.modal.close();
                window.setTimeout(function() {jQuery('#basic-modal-content-thank').modal()}, 250);																
                jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
              }
            },
            url: signUpUrl
          });
          return false;
        },
        backLabel:	'Back',
        block:		true,
        errorImage:	false,
        nextLabel:	'Next',
        titleClick:	true,
        validate:	true
      });
                        
      // Optionaly
      $('#sign-up-form').validate({
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
          track:{required: true},
          language:{required: true},
          song:{required: true, accept: 'mp3'},
          profilename:{required: true, minlength: 3},
          profileimage:{required: true, accept: 'jpg|jpeg|gif|png'},
          aboutme:{required: true, minlength: 3},
          likemusic:{required: true, minlength: 3},
          favartist:{required: true, minlength: 3}
        }, 
        messages: {
          'firstname': { required: 'Firstname is required. ', minlength: 'Firstname minimum 3 chars. ', maxlength: 'Firstname maximum 30 chars. ' },
          'lastname': { required: 'Lastname is required. ', minlength: 'Lastname minimum 3 chars. ', maxlength: 'Lastname maximum 30 chars. ' },
          'age': { required: 'Please select Your age. ' },
          'gender': { required: 'Gender is required. ' },
          'city': { required: 'City is required. ' },
          'country': { required: 'Country is required. ' },
          'mobile': { required: 'Mobile is required. ', minlength: 'Mobile min 10 numbers. ', maxlength: 'Mobile max 10 numbers. ', number: 'Mobile only number. ' },
          'email': { required: 'Email is required. ', email: 'Invalid e-mail! ' },
          'band': {required: 'Band Name is required. '},
          'genre': {required: 'Genre Name is required. '},
          'bio': {required: 'Bio Brief is required. '},
          'insp': {required: 'Inspiration is required. '},
          'track': {required: 'Track Name is required. '},
          'language': {required: 'Language is required. '},
          'song': {required: 'Track File is required. ', accept: 'File to be mp3 only. '},
          'profilename': {required: 'Profilename is required. '},
          'profileimage': {required: 'Profileimage is required. '},
          'aboutme': {required: 'Tell something about You. '},
          'likemusic': {required: 'Music You like?. '},
          'favartist': {required: 'Favorite Artist?. '}
        }
      });
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
            <form action="" id="sign-up-form" method="post" enctype="multipart/form-data">
              <div class="sign-up-form-error"></div>
              <fieldset title="Step 1" id="signup-step-1">
                <legend>Basic Information</legend>
                <table width="100%" border="0" cellspacing="12" cellpadding="0">
                  <tr>
                    <td><label>Are you</label></td>
                    <td>
                      <div class="fl"> 
                        <input type="radio" id="usertype-actor" class="usertype" name="usertype" value="A" checked="checked" />
                        <div class="fl pl5">An Artist</div>
                      </div> 
                      <div class="fl ml10">
                        <input type="radio" id="usertype-listner" class="usertype" name="usertype" value="L" />
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
                    <td><select name="age"  id="age" class="wd65 log_input fnt11" >
                        <option></option>
                        <option value="age1">18-25yr</option>
                        <option value="age2">25-45yr</option>
                        <option value="age3">45-60yr</option>
                        <option value="age4">Above 60</option>
                      </select></td>
                    <td>Gender</td>
                    <td>
                      <div class="fl"> 
                        <input type="radio" name="gender" value="M" checked="checked"/>
                        <div class="fl pl5">Male</div>
                      </div> 
                      <div class="fl ml10">
                        <input type="radio" name="gender" value="F" />
                        <div class="fl pl5">Female</div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city" class="log_input fnt11" /></td>
                    <td>Country</td>
                    <td><select name="country" id="country" class="log_input wd122 fnt11">
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
                    <td><input type="text" name="mobile" id="mobile" class="log_input fnt11"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><a href="#">
                        <div id="next-img" class="next-img">Next</div>
                      </a></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </fieldset>
              <fieldset title="Step 2" id="signup-step-2">
                <legend>description two</legend>

                <table width="100%" border="0" cellspacing="12" cellpadding="0">
                  <tr>
                    <td>Band/Artist Name</td>
                    <td><input type="text" name="band" class="log_input fnt11" id="brand"/></td>
                    <td>Genre</td>
                    <td><select name="genre" id="genre" class="log_input wd122 fnt11">
                        <option value="">Select Genre</option>
                        <?php for ($i = 0; $i < $totalgenre; $i++) { ?>
                          <option value="<?php echo $genrearray[$i]['GENRE_NAME']; ?>"><?php echo $genrearray[$i]['GENRE_NAME']; ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Brief Bio</td>
                    <td><textarea name="bio" id="briefbio" class="log_input wd122 fnt11"></textarea></td>
                    <td>Inspiration</td>
                    <td><textarea name="insp" id="insp" class="log_input wd122 fnt11"></textarea></td>
                  </tr>
                  <tr>
                    <td>Track name</td>
                    <td><textarea name="track" id="track" class="log_input wd122 fnt11"></textarea></td>
                    <td>Language</td>
                    <td>
                      <select name="language" id="language" class="log_input wd122 fnt11">
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
                  <tr>
                    <td>&nbsp;</td>
                    <td> <a href="#"> <div class="next-img" id="next2">Next</div> </a> </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </fieldset>
              <fieldset title="Thread 3" id="signup-step-3">
                <legend>description three</legend>

                <table width="100%" border="0" cellspacing="12" cellpadding="0">
                  <tr>
                    <td>Nick Name</td>
                    <td><input type="text" name="profilename" id="nickname" class="log_input fnt11"/></td>
                    <td>Profile Image</td>
                    <td><input type="file" id="profileimage" name="profileimage" class="regInput2 log_input" /></td>
                  </tr>
                  <tr>
                    <td>About You</td>
                    <td><textarea name="aboutme" rows="4" class="regInput2 log_input" id="about"></textarea></td>
                    <td>Music<br />
                      You Like</td>
                    <td><textarea name="likemusic" rows="4" class="regInput2 log_input" id="musiclike"></textarea></td>
                  </tr>
                  <tr>
                    <td>Favourite Artists</td>
                    <td colspan="3"><textarea name="favartist" id="artistlike" rows="4" class="regInput2 log_input"></textarea></td>
                  </tr>
                </table>
              </fieldset>
              <input type="submit" class="finish" value="Finish!" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
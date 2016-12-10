<footer class="margin_top">
				
				<div class="fotter">
					<ul class="fotter-nav  col-1">
						<h4>Company</h4>
						<li><a href="javascript:void(0);">About Us</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Contact_us/index'); ?>">Contact Us</a></li>
						<li><a href="javascript:void(0);">Site Map</a></li>
					</ul>
					<ul class="fotter-nav col-2">
						<h4>Services</h4>
						<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'Holiday-packages')); ?>">Andaman Holidays Package</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'Honeymoon-packages')); ?>">Andaman Honeymoon Package</a></li>
						<li><a href="javascript:void(0);">Andaman Car Services</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>">Andaman Hotel &amp; Resorts</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'Confernesep-lanner')); ?>">Conference Planner</a></li>
					</ul>
					<ul class="fotter-nav col-2">
						<h4>Leisure Activities</h4>
						<li><a href="<?php echo Yii::app()->createUrl('Water_spot/index'); ?>">Scuba diving in Andaman</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Water_spot/index'); ?>">Snorkelling in Andaman</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('Water_spot/index'); ?>">Game Fishing at Andaman</a></li>
						<li><a href="javascript:void(0);">Plan your Trip</a></li>
					</ul>
					<ul class="fotter-nav col-2">
						<h4>About Andaman</h4>
						<li><a href="javascript:void(0);">About Andaman Island</a></li>
						<li><a href="javascript:void(0);">Location &amp; Area</a></li>
						<li><a href="javascript:void(0);">Beaches at Andaman</a></li>
						<li><a href="javascript:void(0);">Monuments at museums</a></li>
						<li><a href="javascript:void(0);">Island to Visit</a></li>
					</ul>
					<ul class="fotter-nav col-2">
						<h4>General Information</h4>
						<li><a href="javascript:void(0);">How to reach</a></li>
						<li><a href="javascript:void(0);">Entry formalities</a></li>
						<li><a href="javascript:void(0);">Tips for Tourists</a></li>
						<li><a href="javascript:void(0);">Bank and ATMs</a></li>
						<li><a href="javascript:void(0);">Inter-Island ferry and seaplanes</a></li>
					</ul>
					<ul class="fotter-nav col-1">
						<h4>Policy</h4>
						<li><a href="javascript:void(0);">Privacy Policy</a></li>
						<li><a href="javascript:void(0);">Terms of Use</a></li>
						<li><a href="javascript:void(0);">Copyright Policy</a></li>
					</ul>
					
					
				</div>
				<div class="foter-line">
					<div class="footer_line_wrap">
						
						<div class="follow col-4"> 
							<span>Follow Us on</span>
							<a href="https://www.facebook.com/pages/MET-Holidays-India-Private-Limited/328067674037857
" title="Facebook"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook-icon.jpg"></a> 
							<a href="https://twitter.com/MetHolidays" title="Twitter"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter-icon.jpg"></a> 
							<a href="javascript::void(0);" title="Linkdin"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/linkdin-icon.jpg"></a> 
							<a href="https://plus.google.com/u/0/102184318042261862961/posts" title="Facebook"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/google.png"></a> 
							<a href="http://www.pinterest.com/metholidays/kala-pathar-beach-havelock-island/
" title="Twitter"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pinterest.png"></a> 
							<a href="http://youtu.be/TYcDn_SeYCA" title="Linkdin"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/youtube.png"></a> 
						</div>
						<div class="pay col-4" style="margin-left:66px;width:323px;"> 
							<span><span>Pay Using</span> </span>
							<a href="javascript::void(0);" title="Visa"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/visa-ico.jpg"></a> 
							<a href="javascript::void(0);" title="Master card"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/mastercard-ico.jpg"></a>
							<a href="javascript::void(0);" title="Paypal"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/paypal-ico.jpg"> </a>
						</div>
					<?php $commonmodel =new Common_model; 
						
							$admin_detail = $commonmodel->fetch_admin_detail(); 
							?>
							
						<ul class="email col-4">
							<li class="mobile_no"><?php echo $admin_detail[0]['contact_no']; ?></li>&nbsp;
							<li> / </li>
							<li>
							<a href="mailto:<?php echo $admin_detail[0]['email']; ?>"><span class="at_the_rate">@</span><?php echo $admin_detail[0]['email']; ?></a></li>
							<!--a href="mailto:<?php echo $admin_detail[0]['email']; ?>"><?php echo $admin_detail[0]['email']; ?></a></li-->
						</ul>
					</div>
				</div>
				<div class="footer-line dark_grey">
					<div class="footer_line_wrap">
						<p>The Andaman and Nicobar Islands were shrouded in mystery for centuries because of their inaccessibility.
						These are the paragon of beauty and present a landscape full with scenic and picturesque extravaganza.
						These islands shimmer like emeralds in the Bay of Bengal. The dense forest which cover these islands and
						the innumerable exotic flowers and birds create a highly poetic and romantic atmosphere.
						"Here the white beaches on the edge of a meandering coastline have palm trees that sway to the rhythm of the 
						</p>
					</div>	
				</div>
				<div class="foter-line">
					<div class="footer_line_wrap ">
						<div class="copy-site">Copy right &copy; 2012 MET Holidays | All right reserved</div>
					</div>	
				</div>
			</footer>
			

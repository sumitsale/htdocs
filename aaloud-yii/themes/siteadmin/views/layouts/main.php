<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen, projection" /> 
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <?php $userId = Yii::app()->user->id; ?>
        <h1 id="logo-text">Artist<span class="gray">Aloud</span></h1>
<?php /*
        <div id="header-tabs">
          <?php
          $this->widget('zii.widgets.CMenu', array(
              'items' => array(
                  array('label' => 'Dashboard', 'url' => array('default/index')),
                  array('label' => 'Artists', 'url' => array('tblaaartist/artistlist')),
                  array('label' => 'News', 'url' => array('news/newslist')),
                  array('label' => 'Miscellaneous', 'url' => array('feature/feature')),
                  array('label' => 'XML GENERATE', 'url' => array('Generatexmlfile/generate')),
                  array('label' => 'Banners', 'url' => array('banner/list')),
                  array('label' => 'Radio Player', 'url' => array('radio/create')),
                  array('label' => 'Itunes', 'url' => array('itunes/create')),
                  //array('label'=>'Reports', 'url'=>array('')),
                  array('label' => 'Home', 'url' => array('')),
                  array('label' => 'Paisa Vasool', 'url' => array('paisa_vasool/manage')),
                  array('label' => 'First1s', 'url' => array('firstone/first1')),
              ),
              'linkLabelWrapper' => 'span'
          ));
          ?>
        </div>
		
		*/ ?>
      </div>
      <div id="content-wrap">
        <div id="main"> 
          <?php echo $content; ?>
          <!-- MORE EXAMPLE BELOW
          <a name="TemplateInfo"></a>
            <h1>Template Info</h1>
            <p><strong>Techmania 1.1</strong> is a free, W3C-compliant, CSS-based website template by <strong>styleshout.com</strong>. This work is distributed under the <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by/2.5/"> Creative Commons Attribution 2.5 License</a>, which means that you are free to use and modify it for any purpose. All I ask is that you include a link back to my website in your credits.</p>
            <p>For more free designs, you can visit my website to see my other works.</p>
            <p>Good luck and I hope you find my free templates useful!</p>
            <p class="comments align-right"> <a href="http://www.free-css.com/">Read more</a> : <a href="http://www.free-css.com/">Comments(7)</a> : Oct 08, 2006 </p>
            <a name="SampleTags"></a>
            <h1>Sample Tags</h1>
            <h3>Code</h3>
            <p><code> code-sample { <br />
              font-weight: bold;<br />
              font-style: italic;<br />
              } </code></p>
            <h3>Example Lists</h3>
            <ol>
              <li><span>example of ordered list</span></li>
              <li><span>uses span to color the numbers</span></li>
            </ol>
            <ul>
              <li><span>example of unordered list</span></li>
              <li><span>uses span to color the bullets</span></li>
            </ul>
            <h3>Blockquote</h3>
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p>
            </blockquote>
            <h3>Image and text</h3>
            <p><a href="http://www.free-css.com/"><img src="images/firefox-gray.jpg" width="100" height="120" alt="firefox" class="float-left" /></a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est. </p>
            <h3>Example Form</h3>
            <form action="http://www.free-css.com/">
              <p>
                <label>Name</label>
                <input name="dname" value="Your Name" type="text" size="30" />
                <label>Email</label>
                <input name="demail" value="Your Email" type="text" size="30" />
                <label>Your Comments</label>
                <textarea rows="5" cols="5"></textarea>
                <br />
                <input class="button" type="submit" />
              </p>
            </form>
            <br />
          -->
        </div>





        <div id="sidebar">



          <ul class="sidemenu">
            <li><?php echo CHtml::link('Dashboard', CController::createUrl('site/index'), array('class' => 'report')); ?>
              <ul>
                <?php
                if (!Yii::app()->user->isGuest) {
                  ?>
                  <li><?php echo CHtml::link('Change Password', CController::createUrl('user/changepassword'), array('class' => 'report')); ?></li>
                <?php } ?>
                <?php
                if (!Yii::app()->user->isGuest) {
                  ?>
                  <li><?php echo CHtml::link('Logout', CController::createUrl('default/logout'), array('class' => 'report')); ?></li>
                <?php } ?>
                <?php
                if (Yii::app()->user->isGuest) {
                  ?>
                  <li><a href="login" class="report_seo">Login</a></li>
                <?php } ?>


              </ul>
            </li>
			
			<li><h3><?php echo CHtml::link('Focus Area', CController::createUrl('Homeblocks/index'), array('class' => 'report')); ?></h3></li>		
            <li><h3><?php echo CHtml::link('XML Generate', CController::createUrl('Generatexmlfile/generate'), array('class' => 'report')); ?></h3></li>
            <li><h3><?php echo CHtml::link('TOP 10 SONGS', CController::createUrl('topsongs/index'), array('class' => 'report')); ?></h3></li>
            <li><h3><?php echo CHtml::link('POPULAR ARTISTS', CController::createUrl('topartists/index'), array('class' => 'report')); ?></h3></li>
            <li><h3><?php echo CHtml::link('POPULAR VIDEOS', CController::createUrl('topvideos/index'), array('class' => 'report')); ?></h3></li>
            <li><h3><?php echo CHtml::link('New Release', CController::createUrl('Newrelease/index'), array('class' => 'report')); ?></h3></li>
            <li><h3><?php echo CHtml::link('New This Week', CController::createUrl('newthisweek/index'), array('class' => 'report')); ?></h3></li>		
            <li><h3><?php echo CHtml::link('Default Video Selection', CController::createUrl('video/defaultvideo'), array('class' => 'report')); ?></h3></li>		
            <li><h3><?php echo CHtml::link('Home page popup', CController::createUrl('Homepagepopup/index'), array('class' => 'report')); ?></h3></li>		
			
			
			<li><h3><a>Hide artist</a></h3>
			<ul>
			<li><h3><?php echo CHtml::link('Hide artist', CController::createUrl('Hideartist/create'), array('class' => 'report')); ?></h3></li>	
			<li><h3><?php echo CHtml::link('manage Hide artist', CController::createUrl('Hideartist/admin'), array('class' => 'report')); ?></h3></li>	

			</ul>
			</li>
		
		 <li><h3><a>Comments</a></h3>
              <ul>
              
                <li><?php echo CHtml::link('Artist Comments', CController::createUrl('Comments/artist'), array('class' => 'report')); ?></li>
				  <li><?php echo CHtml::link('News Comments', CController::createUrl('Comments/news'), array('class' => 'report')); ?></li>

              </ul>
            </li>
			
			
		
		<!--
			 <li><h3><a>DB</a></h3>
              <ul>
                <li><?php //echo CHtml::link('Adminer', CController::createUrl('Dbuser/index'), array('class' => 'report')); ?></li>
             </ul>
            </li>
		-->
		
		
		
            <li><h3><a>Artists</a></h3>
              <ul><?php $userId = Yii::app()->user->id; ?>
                <li><?php echo CHtml::link('Add Artist', CController::createUrl('tblaaartist/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Artist list', CController::createUrl('tblaaartist/artistlist'), array('class' => 'report')); ?></li>

              </ul>
            </li>
            <li><h3><a>News</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add News', CController::createUrl('news/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('List News', CController::createUrl('news/newslist'), array('class' => 'report')); ?></li>
                <!--
                  <li><?php //echo CHtml::link('Add Press Kit', CController::createUrl('Presskit/create'), array('class'=>'report'));    ?></li>
                <li><?php //echo CHtml::link('List Press Kit', CController::createUrl('Presskit/presslist'), array('class'=>'report'));    ?></li>
                -->

              </ul>
            </li>

            <li><h3><a>Events</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Events', CController::createUrl('UpcEvents/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('List Events', CController::createUrl('UpcEvents/eventslist'), array('class' => 'report')); ?></li>

              </ul>
            </li>

            <li><h3><a> Artist Blogs</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Blogs', CController::createUrl('blogs/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('List Blogs', CController::createUrl('blogs/bloglist'), array('class' => 'report')); ?></li>

              </ul>
            </li>

            <li><h3><a>Banner</a></h3>
              <ul>
                <li><?php echo CHtml::link('Manage Banner', CController::createUrl('banner/list'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Manage wap Banner', CController::createUrl('banner/Managewapbanner'), array('class' => 'report')); ?></li>

              </ul>
            </li>

            <!--<li><h3><a href="search_artist.php" class="house">Artist</a></h3>
                          <ul>
                            <li><a href="search_artist.php" class="report">Manage</a></li>
                          </ul>
                      </li>-->

            <!--<li><h3><a href="store_vouchers.php" class="house">Vouchers</a></h3>
                          <ul>
                            <li><a href="store_vouchers.php" class="report">Add</a></li>
                
                <li><a href="store_voucher_list.php" class="report">Download</a></li>
                          </ul>
                      </li>-->

            <li><h3><a>Specials</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Specials', CController::createUrl('specials/create'), array('class' => 'report')); ?></li>	
                <li><?php echo CHtml::link('List Specials', CController::createUrl('specials/specialslist'), array('class' => 'report')); ?></li>
              </ul>
            </li>

			<?php /*
            <li><h3><a>MISCELLANEOUS</a></h3>
              <ul>
                <li><?php echo CHtml::link('Featured/Exclusive', CController::createUrl('misc/misc'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Add Quotes', CController::createUrl('quotes/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Manage Quotes', CController::createUrl('quotes/quoteslist'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Featured Content', CController::createUrl('feature/feature'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('New This Week', CController::createUrl('pow/updatepick'), array('class' => 'report')); ?></li>

              </ul>
            </li>
			*/ ?>




            <li><h3><a>Awards</a></h3>
              <ul>

                <li><?php echo CHtml::link('Nomination', CController::createUrl('nomination/addnomination'), array('class' => 'report')); ?></li>
                <!-- <li><a href="answer_list.php" class="addorder">Answers</a></li> -->
                <li><?php echo CHtml::link('Nomination Report ', CController::createUrl('Artist_nomination_vote/index'), array('class' => 'report')); ?></li>

              </ul>
            </li>








            <li><h3><a>M-Zone</a></h3>
              <ul>

                <li><?php echo CHtml::link('Top 10 Popular', CController::createUrl('TblFilterIp/filteredip'), array('class' => 'report')); ?></li>
                <!-- <li><a href="answer_list.php" class="addorder">Answers</a></li> -->
                <li><?php echo CHtml::link('Top 10 Latest', CController::createUrl('TBLANSWERS/questionlist'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Top 8 Genre', CController::createUrl('TBLANSWERS/questionlist'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Top 5 language', CController::createUrl('TBLANSWERS/questionlist'), array('class' => 'report')); ?></li>

              </ul>
            </li>



			<?php /*
            <li><h3><a>Home</a></h3>
              <ul>
                <li><?php echo CHtml::link('Quick Play', CController::createUrl('player/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Video Player', CController::createUrl('videos/videolist'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Center Section', CController::createUrl('homecenter/editcenter'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Footer Section', CController::createUrl('footer/editfooter'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('WAP Language & Genre', CController::createUrl('pow/updatepick'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('WAP New Releases', CController::createUrl('Wapnew/manage'), array('class' => 'report')); ?></li>
                <!-- <li><a href="answer_list.php" class="addorder">Answers</a></li> -->
                <li><?php echo CHtml::link('WAP All This Month', CController::createUrl('wapatm/create'), array('class' => 'report')); ?></li>

              </ul>
            </li>
		*/ ?>

            <?php /*<li><h3><?php echo CHtml::link('ITunes', CController::createUrl('itunes/create'), array('class' => 'report')); ?></h3>
            </li>

            <li><h3><a>Genres</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Genre', CController::createUrl('genres/create'), array('class' => 'report')); ?></li>	
                <li><?php echo CHtml::link('List Genre', CController::createUrl('genres/genrelist'), array('class' => 'report')); ?></li>
              </ul>
            </li>

            <li><h3><a>Languages</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Language', CController::createUrl('language/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('List Language', CController::createUrl('language/langlist'), array('class' => 'report')); ?></li>
              </ul>
            </li>

            <li><h3><a>Countries</a></h3>
              <ul>
                <li><?php echo CHtml::link('Add Country', CController::createUrl('country/create'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('List Country', CController::createUrl('country/countrylist'), array('class' => 'report')); ?></li>
              </ul>
            </li>


            <li><h3><?php echo CHtml::link('Radio Player', CController::createUrl('radio/create'), array('class' => 'report')); ?></h3>
            </li>
*/ ?>    
            <li><h3><?php echo CHtml::link('New Uploads', '', array('class' => 'report')); ?></h3>                    
              <ul>
                <li><?php echo CHtml::link('Music upload'); ?></li>
                <ul>
                  <li><?php echo CHtml::link('uploaded music Reviewed', CController::createUrl('userartist/musicreview'), array('class' => 'report')); ?></li>
                  <li><?php echo CHtml::link('uploaded music to be reviewed', CController::createUrl('userartist/musictobereview'), array('class' => 'report')); ?></li>
                </ul>

                <li><?php echo CHtml::link('Artists without music', CController::createUrl('userartist/artistnomusic'), array('class' => 'report')); ?></li>
                <li><?php echo CHtml::link('Listner', CController::createUrl('userartist/lister'), array('class' => 'report')); ?></li>

              </ul>


            </li>
			
			
			
			<li><h3><a>Findmusic</a></h3>
				<ul>
					<li><?php echo CHtml::link('Add Findmusic', CController::createUrl('TblFindMusic/create'), array('class' => 'report')); ?></li>
					<li><?php echo CHtml::link('Manage Findmusic', CController::createUrl('TblFindMusic/admin'), array('class' => 'report')); ?></li>

				</ul>
			
			</li>
          </ul>


        </div>
      </div>
      <div id="footer"> <span id="footer-left"> &copy; <?php echo date('Y', time()); ?> <strong><?php echo CHtml::encode(Yii::app()->name); ?></strong> | Design by: <strong><a href="http://www.styleshout.com/">styleshout</a></strong> | Valid: <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> </span> <span id="footer-right"> <a href="http://www.free-css.com/">Home</a> | <a href="http://www.free-css.com/">Sitemap</a> | <a href="http://www.free-css.com/">Home</a> </span> </div>
    </div>
  </body>
</html>

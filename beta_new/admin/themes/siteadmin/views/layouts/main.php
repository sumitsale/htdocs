<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen1.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<style>
.thumbnail1
{
float:center;
padding-left:317px;
margin:5px;
}
.thumbnail2
{
float:right;
margin:14px;
}
.thumbnail3
{
float:right;
margin:18px;
}
</style>	
<body>

<!-- header -->
    <div id="page-top-outer">
      <!-- Start: page-top -->
      <div id="page-top">
        <!-- start logo -->
          <a href="http://www.adlabsimagica.com" target='_blank'><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/imagica.jpg" alt="" /></a>
          <a href=""><img class="thumbnail1" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/open_tickets_logo.jpg" width="300" height="90" alt="" /></a>
		  <a href=""><img class="thumbnail2" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/gift_20card_1.jpg" width="100" height="80" alt="" /></a>
		  <a href=""><img class="thumbnail3" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/open_pass_right.jpg" width="100" height="75" alt="" /></a>
          
		  <?php // echo CHtml::link(CHtml::encode(Yii::app()->name), array('/site/index.php')); ?> </div>
        <!-- end logo -->
        <?php //include ('search.php'); ?>
          <!--  end top-search -->
          <div class="clear"></div>
        </div>
        <!-- End: page-top -->
      </div>
      <!-- End: page-top-outer -->
      <div class="clear">&nbsp;</div>
      <div class="nav-outer-repeat">
        <!--  start nav-outer -->
        <div class="nav-outer">
          <!-- start nav-right -->
          <div id="nav-right">
            <div class="nav-divider">&nbsp;</div>
            
			
			<div class="showhide-account">
				
				<?php if(Yii::app()->session['login_user']!='') { ?> 
				
					<?php echo "User ".Yii::app()->session['login_user'];?>
				
				<?php } ?>
				
				<!--<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/siteadmin"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_myaccount.gif" width="116" height="26" alt="" /></a>-->
			</div>
          
			<div class="nav-divider">&nbsp;</div>
			
			<?php if(Yii::app()->session['login_user']!='') { ?> 
				
				<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/site/logout" id="logout" >
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_logout.gif" width="84" height="26" alt="" />
				</a>
		   <?php } ?>
		   
		   <div class="clear">&nbsp;</div>
            <!--  start account-content -->
            <div class="account-content">
              <div class="account-drop-inner"> <?php echo CHtml::link("Settings", array('user/update/' . Yii::app()->user->id), array('id' => 'acc-settings')); ?>
                <div class="clear">&nbsp;</div>
                <div class="acc-line">&nbsp;</div>
              <?php echo CHtml::link("Personal details", array('user/view/' . Yii::app()->user->id), array('id' => 'acc-details')); ?>
            </div>
          </div>
          <!--  end account-content -->
        </div>
        <!-- end nav-right -->
        <!--  start nav -->
        <div class="nav">



        <div id="menu">

         

					
	<?php if(!isset(Yii::app()->session['login']) && (Yii::app()->session['login'] == '')){  ?>
	
              <ul class="menu">
					<li><?php echo CHtml::link("<span>Dashboard</span>", array('/site/index')); ?></li>
					<li><?php echo CHtml::link("<span>Login</span>", array('/site/admin')); ?>
						 <div class="columns two">
							<ul class="one">
							<li><?php echo CHtml::link("<span>Admin Login</span>", array('/site/admin')); ?></li>
							  <li><?php echo CHtml::link("<span>Marketing Login</span>", array('/site/marketing')); ?></li>
							  <li><?php echo CHtml::link("<span>Accounts Login</span>", array('/site/account')); ?></li>
							</ul>
						  </div>
					</li>
			  </ul>
			  
	<?php } ?>	

	<?php if(Yii::app()->session['login_user'] == "Admin") { ?>	
			
			 <ul class="menu">
					<li><?php echo CHtml::link("<span>Dashboard</span>", array('/site/index')); ?></li>
					<li><?php echo CHtml::link("<span>Create New Pass</span>", array('/passDetail/create')); ?></li>
					<li><?php echo CHtml::link("<span>Generate Pass</span>", array('/passCoupon/Generatecoupon')); ?></li>
					<li><?php echo CHtml::link("<span>Manage Pass</span>", array('/passDetail/admin')); ?></li>
					<li><?php echo CHtml::link("<span>Pass Summary</span>", array('/passCoupon/couponlogs')); ?></li>
					
			  </ul>
	
	<?php } ?>	


	<?php if(Yii::app()->session['login_user'] == "Marketing") { ?>
		
			 <ul class="menu">
					<li><?php echo CHtml::link("<span>Dashboard</span>", array('/site/index')); ?></li>
					<li><?php echo CHtml::link("<span>Add Company</span>", array('/companyDetail/create')); ?></li>
					<li><?php echo CHtml::link("<span>Manage Company</span>", array('/companyDetail/admin')); ?></li>
					<li><?php echo CHtml::link("<span>Assign Pass</span>", array('/companyDetail/assigncoupon')); ?></li>
					<li><?php echo CHtml::link("<span>Pass Summary</span>", array('/companyDetail/couponlogs')); ?></li>
					
			  </ul>

	<?php } ?>	
	
	
	<?php if(Yii::app()->session['login_user'] == "Account") { ?>
		
		
		 <ul class="menu">
					<li><?php echo CHtml::link("<span>Dashboard</span>", array('/site/index')); ?></li>
					<li><?php echo CHtml::link("<span>Close Pass</span>", array('/account/advancedsearch')); ?>
					<li><?php echo CHtml::link("<span>Close Pass using coupon</span>", array('/account/advancedsearch_basedon_coupon')); ?>
					 <!--<div class="columns two">
							<ul class="one">
							<li><?php echo CHtml::link("<span>Normal search</span>", array('/account/index')); ?></li>
							<li><?php echo CHtml::link("<span>Advanced search</span>", array('/account/advancedsearch')); ?></li>
							</ul>
					</div>--></li>
		  </ul>
			  
	<?php } ?>		
            </div>


            <div class="clear"></div>
          </div>


            <div class="clear"></div>
          </div>
          <!--  start nav -->
        </div>
        <div class="clear"></div>
        <!--  start nav-outer -->
      </div><!-- mainmenu -->
 <!--  start nav-outer-repeat................................................... END -->
      <div class="clear"></div>
      <!-- start content-outer -->
      <div id="content-outer">
        <!-- start content -->
        <div id="content">
          <!--  start page-heading -->

          <!-- end page-heading -->
          <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
              <th rowspan="3" class="sized">
			  
			  <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" />-->
			  
			  </th>
             
			 <th class="topleft"></th>
              <td id="tbl-border-top">&nbsp;</td>
              <th class="topright"></th>
              <th rowspan="3" class="sized">
			  
			 <!-- <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowright.jpg" width="20" height="300" alt="" />-->
			  
			  </th>
            </tr>
            <tr>
              <td id="tbl-border-left"></td>
              <td><!--  start content-table-inner ...................................................................... START -->
                <div id="content-table-inner">
                  <!--  start table-content  -->
                  <div id="table-content"> <?php echo $content; ?> </div>
                <!--  end table-content  -->
                <div class="clear"></div>
              </div>
              <!--  end content-table-inner ............................................END  -->
            </td>
            <td id="tbl-border-right"></td>
          </tr>
          <tr>
            <th class="sized bottomleft"></th>
            <td id="tbl-border-bottom">&nbsp;</td>
            <th class="sized bottomright"></th>
          </tr>
        </table>
        <div class="clear">&nbsp;</div>
      </div>
      <!--  end content -->
      <div class="clear">&nbsp;</div>
    </div>
    <!--  end content-outer -->
    <div class="clear">&nbsp;</div>
    <!-- start footer -->
    <div id="footer">
      <!--  start footer-left -->
     <!-- <div id="footer-left"> &copy; Copyright <b>Adlabs</b> Entertainment Ltd .All rights reserved.</div>-->
	  <div id="footer-left"> &copy; Copyright <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/AdlabsName.jpg" alt="" /> .All rights reserved.</div>
      <div id="copyright">&copy; Developed By <b>Information Technology</b></div>
      <!--  end footer-left -->
      <div class="clear">&nbsp;</div>
    </div>
    <!-- end footer -->
  </body>
</html>

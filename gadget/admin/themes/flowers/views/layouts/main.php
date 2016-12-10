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

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js" type="text/javascript"></script>

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
            <div class="showhide-account"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/siteadmin"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_myaccount.gif" width="116" height="26" alt="" /></a></div>
            <div class="nav-divider">&nbsp;</div>
            <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/site/logout" id="logout"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_logout.gif" width="84" height="26" alt="" /></a>
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

            <?php /* ?> <?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
                "htmlOptions"=>array("class"=>"menu")
                )); ?><?php */ ?>

              <ul class="menu">
                <li><?php echo CHtml::link("<span>Dashboard</span>", array('/site/index')); ?></li>
                <li><?php echo CHtml::link("<span>Menu A</span>", array('invoice/create')); ?>
				 <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>Content 1</span>", array('invoice/index')); ?></li>
                      <li><?php echo CHtml::link("<span>Content 2</span>", array('invoice/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Content 3</span>", array('invoice/admin')); ?></li>
                    </ul>
                  </div>
				
				
				
				</li>
				<?php /*if(isset(Yii::app()->session['adminUser'])){?>
                <li><?php echo CHtml::link("<span>Salary</span>", array('salary/admin')); ?>
                  <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>List</span>", array('salary/index')); ?></li>
                      <li><?php echo CHtml::link("<span>Create Salary</span>", array('salary/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Manage Salary</span>", array('salary/admin')); ?></li>
                    </ul>
                  </div>
                </li>
				<?php } */?>
			
              
				
				<li><?php echo CHtml::link("<span>Master Category/Brand</span>", array('')); ?>
				 <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>Add new category</span>", array('categoryMaster/create')); ?></li>
					 <li><?php echo CHtml::link("<span>Manage category</span>", array('categoryMaster/admin')); ?></li>
                     <li><?php echo CHtml::link("<span>Add new brand</span>", array('brandMaster/create')); ?></li>
                     <li><?php echo CHtml::link("<span>Manage brand</span>", array('brandMaster/admin')); ?></li>
                    </ul>
                  </div>
				</li>
				
				  <li><?php echo CHtml::link("<span>Product Brands</span>", array('')); ?>
                  <div class="columns two">
                    <ul class="one">
						<li><?php echo CHtml::link("<span>Add new product brand</span>", array('productBrand/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Manage product brand</span>", array('productBrand/admin')); ?></li>
                    </ul>
                  </div>
                </li> 
                
                <li><?php echo CHtml::link("<span>Reviews</span>", array('')); ?>
				 <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>Add new reviews</span>", array('review/create')); ?></li>
					 <li><?php echo CHtml::link("<span>Reviews list</span>", array('review/index')); ?></li>
                     <li><?php echo CHtml::link("<span>Manage reviews</span>", array('review/admin')); ?></li>
                    </ul>
                  </div>
				</li>
                
                
               <li><?php echo CHtml::link("<span>Latest-News/Banner</span>", array()); ?> 				 
               <div class="columns two">                     
               	<ul class="one">                                          
                	<li><?php echo CHtml::link("<span>Add new news</span>", array('news/create')); ?></li>
                    <li><?php echo CHtml::link("<span>News list</span>", array('news/index')); ?></li>
                    <li><?php echo CHtml::link("<span>Manage news</span>", array('news/admin')); ?></li>
                    <li><?php echo CHtml::link("<span>Add new banner</span>", array('banner/create')); ?></li>
                    <li><?php echo CHtml::link("<span>Banner list</span>", array('banner/index')); ?></li>
                    <li><?php echo CHtml::link("<span>Manage banner</span>", array('banner/admin')); ?></li>
                </ul>
               </div>
				
			</li>
                
				
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
              <th rowspan="3" class="sized"></th>
              <th class="topleft"></th>
              <td id="tbl-border-top">&nbsp;</td>
              <th class="topright"></th>
              <th rowspan="3" class="sized"></th>
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
	  <div id="footer-left"> &copy; Copyright .All rights reserved.</div>
      <!--<div id="copyright">&copy; Developed By <b>Information Technology</b></div>-->
      <!--  end footer-left -->
      <div class="clear">&nbsp;</div>
    </div>
    <!-- end footer -->
  </body>
</html>

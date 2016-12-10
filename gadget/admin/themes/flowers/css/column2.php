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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fancybox.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-- header -->
    <div id="page-top-outer">
      <!-- Start: page-top -->
      <div id="page-top">
        <!-- start logo -->
        <div id="logo">
          <!--          <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/logo.png" width="156" height="40" alt="" /></a>-->
          <?php echo CHtml::link(CHtml::encode(Yii::app()->name), array('/site/index.php')); ?> </div>
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
            <div class="showhide-account"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_myaccount.gif" width="116" height="26" alt="" /></div>
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
                <li><?php echo CHtml::link("<span>Dashboard</span>", array('/college/index')); ?></li>
                <li><?php echo CHtml::link("<span>Create Invoice</span>", array('invoice/admin')); ?>
				 <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>List</span>", array('invoice/index')); ?></li>
                      <li><?php echo CHtml::link("<span>Create Invoice</span>", array('invoice/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Manage Invoice</span>", array('invoice/admin')); ?></li>
                    </ul>
                  </div>
				
				
				
				</li>
				<?php if(isset(Yii::app()->session['adminUser'])){?>
                <li><?php echo CHtml::link("<span>Salary</span>", array('salary/admin')); ?>
                  <div class="columns two">
                    <ul class="one">
                    <li><?php echo CHtml::link("<span>List</span>", array('salary/index')); ?></li>
                      <li><?php echo CHtml::link("<span>Create Salary</span>", array('salary/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Manage Salary</span>", array('salary/admin')); ?></li>
                    </ul>
                  </div>
                </li>
				<?php } ?>
                <li><?php echo CHtml::link("<span>Vendor</span>", array('vendor/admin')); ?>
                  <div class="columns two">
                    <ul class="one">
						<li><?php echo CHtml::link("<span>List</span>", array('vendor/index')); ?></li>
                      <li><?php echo CHtml::link("<span>Add new Vendor</span>", array('vendor/create')); ?></li>
                      <li><?php echo CHtml::link("<span>Manage Vendor</span>", array('vendor/admin')); ?></li>
                    </ul>
                  </div>
                </li>
				<?php if(isset(Yii::app()->session['adminUser']) || isset(Yii::app()->session['accountUser'])){?>
				               <li><?php echo CHtml::link("<span>Invoice</span>", array('invoice/invoicestatus')); ?>
                  <div class="columns two">
                    <ul class="one">
														<?php if(isset(Yii::app()->session['adminUser'])){?>
										<li><?php echo CHtml::link("<span>Invoice Pending</span>", array('invoice/invoicestatus')); ?></li>
										<?php } ?>
                   <li><?php echo CHtml::link("<span>Approved Invoice</span>", array('invoice/approvedinvoice')); ?></li>
				<li><?php echo CHtml::link("<span>Ready Invoice</span>", array('invoice/readyinvoice')); ?></li>
                <li><?php echo CHtml::link("<span>Cleared Invoice</span>", array('invoice/clearedinvoice')); ?></li>
                    </ul>
                  </div>
                </li>
				
				
               
                <?php } ?>
				
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
              <th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
              <th class="topleft"></th>
              <td id="tbl-border-top">&nbsp;</td>
              <th class="topright"></th>
              <th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
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
      <div id="footer-left"> &copy; Copyright Hungama.com .All rights reserved.</div>
      <div id="copyright">Copyright &copy; 2011 <a href="http://apycom.com/">Apycom jQuery Menus</a></div>
      <!--  end footer-left -->
      <div class="clear">&nbsp;</div>
    </div>
    <!-- end footer -->
  </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->pageTitle; ?></title>
		<?php /*		 * ******************    CSS    ***************************** */ ?>
		<?php echo $this->module->registerCss('transdmin.css', 'screen'); ?>
    <!--[if IE 6]>
		<?php echo $this->module->registerCss('ie6.css', 'screen'); ?>
    <![endif]-->
    <!--[if IE 7]>
		<?php echo $this->module->registerCss('ie7.css', 'screen'); ?>
    <![endif]-->

		<?php /*		 * ********************    javascripts    ********************** */ ?>
		<?php //echo $this->module->registerJs('jNice.js', 'screen');?>
		<?php
		//echo CGoogleApi::init();
		//echo CHtml::script(CGoogleApi::load('jquery', '1.6.1'));
		//echo CHtml::script(CGoogleApi::load("jqueryui", "1.8.2"));
		?>
  </head>

  <body>
    <div id="wrapper">
      <h1>
        <a href="<?php echo Yii::app()->homeUrl; ?>">
          <span><?php echo Yii::app()->name; ?></span>
        </a>
      </h1>

      <!-- mainNav -->
			<?php
			$this->widget('zii.widgets.CMenu', array(
					'items' => array(
							//array('url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::app()->getModule('user')->t("Profile"), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'FBUsers', 'url' => array('/admin/users/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Cocktails', 'url' => array('/admin/cocktails/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Ingredients', 'url' => array('/admin/ingredients/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'CocktailTags', 'url' => array('/admin/cocktailTag/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Points Config', 'url' => array('/admin/config/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Feeds', 'url' => array('/admin/feeds/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Images', 'url' => array('/admin/gallery/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Videos', 'url' => array('/admin/video/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Comments', 'url' => array('/admin/comment/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('label' => 'Rotator', 'url' => array('/admin/redemption/admin'), 'visible' => !Yii::app()->user->isGuest),
							array('url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout"), 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'logout')),
							//array('url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'logout')),
					),
					'id' => 'mainNav',
					'activeCssClass' => 'active'
			));
			?>
      <!-- // #end mainNav -->

      <div id="containerHolder">
        <div id="container">
          <div id="sidebar">
						<?php
						$this->widget('zii.widgets.CMenu', array(
								'items' => $this->menu,
								'htmlOptions' => array('class' => 'sideNav'),
								'id' => 'sideNav'
						));
						?>
            <!-- // .sideNav -->
          </div>    
          <!-- // #sidebar -->


          <div id="main">
						<?php /*
						  <div class="breadcrumbs">
						  <?php
						  $this->widget('zii.widgets.CBreadcrumbs', array(
						  'links' => $this->breadcrumbs,
						  ));
						  ?><!-- breadcrumbs -->
						  </div>
						 * 
						 */ ?>
						<?php echo $content; ?>
          </div>
          <!-- // #main -->

          <div class="clear"></div>
        </div>
        <!-- // #container -->
      </div>	
      <!-- // #containerHolder -->
    </div>
    <!-- // #wrapper -->
  </body>
</html>

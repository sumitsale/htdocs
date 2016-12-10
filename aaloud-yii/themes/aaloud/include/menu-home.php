<script type="text/javascript">
function show_alert()
{
alert(" You have no Items in Cart! ");
}
</script>


<div class="menuwrap">
  
  
  <div id="megaMenu" class="megaMenuContainer megaMenu-nojs wpmega-preset-grey-white megaMenuHorizontal megaMenuOnHover wpmega-withjs wpmega-noconflict">
    <ul id="menu-ubermenu-demo" class="megaMenu">
      <li id="menu-item-183" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-1 ss-nav-menu-item-depth-0 ss-nav-menu-reg">
        <?php if (Yii::app()->session["H_FULL_NAME"] != '') { ?>
          <?php
          $cookie = session_id();
          $rsCart = Yii::app()->db->createCommand()
                  ->select('count(*) as ItemCount ')
                  ->from('tbl_cart')
                  ->where('STATUS=:status and COOKIE_ID=:cookieid', array(':status' => 1, ':cookieid' => $cookie))
                  ->queryAll();
          $cartItem = $rsCart[0]['ItemCount'];
          ?>
          <?php echo CHtml::link('<span class="wpmega-link-title">Hi ' . $_SESSION["H_FULL_NAME"] . ', My cart (<span class="CartCounter">' . $cartItem . '</span>)</span>', "javascript: void(0)") ?>

          <ul class="sub-menu sub-menu-1">
            <li id="menu-item-186" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
              
              <?php echo CHtml::link('<span class="wpmega-link-title">Profile</span>', CController::createUrl("profile/index")); ?>
            </li>

            <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
            
              <?php echo CHtml::link('<span class="wpmega-link-title">Purchased</span>', CController::createUrl("purchase/index")); ?></li>
            <li id="menu-item-189" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
              
              <?php echo CHtml::link('<span class="wpmega-link-title">Settings</span>', CController::createUrl("setting/index")); ?></li>
							
							
            <li id="menu-item-189" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
              <?php echo CHtml::link('<span class="wpmega-link-title">My cart (<span class="CartCounter">' . $cartItem . '</span>)</span>', CController::createUrl("site/submitsecure"),array('class'=>'my-cart-link')) ?></li>
							

            <li class="detailsa mycart pl5"><?php echo CHtml::link('Logout', CController::createUrl("site/logout")); ?></li>
          </ul>
        <?php } else { ?> 

          <div id="" class="fl"> <a href="javascript: void(0)" class="basic menu-link">Welcome Guest</a> </div>

        <?php } ?>
      </li>


      <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega">
        <?php echo CHtml::link('<span class="wpmega-link-title">Artists</span>', CController::createUrl("artist/index")); ?>

        <ul class="sub-menu sub-menu-1">
          <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right: 1px solid #DDDDDD;">
            <span class="wpmega-link-title font-mole">New Artists</span>
            <ul class="sub-menu sub-menu-2">
              <?php
              $resultArr = Yii::app()->db2->createCommand() 
                      ->selectdistinct('ta.ARTIST_NAME,ta.ARTIST_ID')
                      ->from('TBL_ARTISTS ta')
                      ->join('TBL_ARTIST_ROLE_MAP tarm', 'ta.ARTIST_ID=tarm.ARTIST_ID')
                      ->join('TBL_CNT_ART_ROLE_MAP tcarm', 'tarm.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
                      ->join('TBL_CONTENT_RELEASE_DATES tcr', 'tcarm.CONTENT_ID=tcr.CONTENT_ID')
                      ->where('tarm.ARTIST_ROLE_ID=:role_id', array(':role_id' => 31))
                      ->order('tcr.RELEASE_DATE desc')
                      //->limit('15')
                      ->queryAll();
					
					// echo "<pre>";
					// print_r($newartist);exit;
					
					$obj=new hideartist;
	
					$hiddenartistid=$obj->hideartist();
					
					 $j = 0;
    $newartist = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

          $newartist[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
		  $newartist[$j]['ARTIST_NAME'] = $resultArr[$i]['ARTIST_NAME'];
          $j+=1;
		  if($j==5){break;}
        }
      }
    }
			
					// echo "<pre>";
					// print_r($newartist);exit;
					  
              ?>
              <?php for ($i = 0; $i < 5; $i++) { ?>
                <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><span> <?php
              $str = $newartist[$i]['ARTIST_NAME'];
              if (strlen($str) > 20) {
                $str = substr($newartist[$i]['ARTIST_NAME'], 0, 18);
                $str.="..";
              } else {
                $str = $newartist[$i]['ARTIST_NAME'];
              }

			  echo CHtml::link('' . $str,  $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$newartist[$i]['ARTIST_NAME']),
			  'id' => $newartist[$i]['ARTIST_ID'])), array('class' => 'wpmega-link-title ml10'));
			  /*
echo CHtml::link('' . $str,  array('artist/artistdetail', 'id' => $newartist[$i]['ARTIST_ID'], 'name' => $newartist[$i]['ARTIST_NAME']
                         ), array('class' => 'wpmega-link-title ml10'));
            *//*  echo CHtml::link('' . $str,  array('artist/artistdetail', 'id' => $newartist[$i]['ARTIST_ID']
                          ), array('class' => 'wpmega-link-title ml10'));
              */  ?> 
                  </span></li>
              <?php } ?>
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Artist', CController::createUrl("artist/index")); ?></li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>
          <?php
		  
          $resultArr = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "popular-artists.xml");
		  
		  					 $j = 0;
				$popularartist = array();
				if (count($resultArr) > 0) {

				  for ($i = 0; $i < count($resultArr); $i++) {

					if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr->artist[$i]->artistId . ".xml") && (!in_array($resultArr->artist[$i]->artistId, $hiddenartistid))) {

					  $popularartist[$j]['ARTIST_ID'] =  $resultArr->artist[$i]->artistId ;
					  $popularartist[$j]['ARTIST_NAME'] =  $resultArr->artist[$i]->artistName ;
					  $j+=1;
					  if($j==12){break;}
					}
				  }
				}
		  
		  
		  
		  
		  
		  
          ?>
          <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
            <span class="wpmega-link-title font-mole">Popular Artists</span>
            <ul class="sub-menu sub-menu-2">
              <?php for ($i = 0; $i < 5; $i++) { ?>
                <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"> 
                  <?php
                  $str2 = $popularartist[$i]['ARTIST_NAME'];
                  if (strlen($str2) > 20) {
                    $str2 = substr($popularartist[$i]['ARTIST_NAME'], 0, 18);
                    $str2.="..";
                  } else {
                    $str2 = $popularartist[$i]['ARTIST_NAME'];
                  }
				

                  echo CHtml::link('' . $str2,  $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$popularartist[$i]['ARTIST_NAME']),
				  'id' => $popularartist[$i]['ARTIST_ID'])), array('class' => 'wpmega-link-title'));
                  ?>
                <?php } ?>
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('More', CController::createUrl("artist/popularartist")); ?> </li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>
          <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">Languages</span>
            <ul class="sub-menu sub-menu-2">
              <?php
              $toplang = Yii::app()->db2->createCommand()
                      ->select('*')
                      ->from('TBL_LANGUAGES')
                      ->limit('5')
                      ->queryAll();
              ?>
              <?php for ($i = 0; $i < count($toplang); $i++) { ?>
                <li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"> 
			
                  <?php echo CHtml::link('' . $toplang[$i]['LANGUAGE_TITLE'],$this->createUrl('artist/languagedir',array('name'=>str_replace(' ','-',$toplang[$i]['LANGUAGE_TITLE']),
				  'id' =>  $toplang[$i]['LANGUAGE_ID'])) , array('class' => 'wpmega-link-title')); ?></li>
              <?php } ?>
              <!--
              <li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">English</span></a></li>
              <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Marathi</span></a></li>
              <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Tamil</span></a></li>
              <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">bengali</span></a></li>
              -->
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Languages', CController::createUrl("artist/language")); ?></li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>

          <li id="menu-item-73" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right:none;">
            <span class="wpmega-link-title font-mole">Alphabetical</span>
            <div class="clr"></div>
            <div style="width:280px; padding:5px 0 0 0;">
              <?php echo CHtml::link('A', array('artist/directory', 'char' => 'A')); ?> 
              <?php echo CHtml::link('B', array('artist/directory', 'char' => 'B')); ?> 
              <?php echo CHtml::link('C', array('artist/directory', 'char' => 'C')); ?> 
              <?php echo CHtml::link('D', array('artist/directory', 'char' => 'D')); ?> 
              <?php echo CHtml::link('E', array('artist/directory', 'char' => 'E')); ?>
              <?php echo CHtml::link('F', array('artist/directory', 'char' => 'F')); ?> 
              <?php echo CHtml::link('G', array('artist/directory', 'char' => 'G')); ?> 
              <?php echo CHtml::link('H', array('artist/directory', 'char' => 'H')); ?> 
              <?php echo CHtml::link('I', array('artist/directory', 'char' => 'I')); ?> 
              <?php echo CHtml::link('J', array('artist/directory', 'char' => 'J')); ?> 
              <?php echo CHtml::link('K', array('artist/directory', 'char' => 'K')); ?> 
              <?php echo CHtml::link('L', array('artist/directory', 'char' => 'L')); ?> 
              <?php echo CHtml::link('M', array('artist/directory', 'char' => 'M')); ?><br /> 
              <?php echo CHtml::link('N', array('artist/directory', 'char' => 'N')); ?> 
              <?php echo CHtml::link('O', array('artist/directory', 'char' => 'O')); ?> 
              <?php echo CHtml::link('P', array('artist/directory', 'char' => 'P')); ?> 
              <?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q')); ?> 
              <?php echo CHtml::link('R', array('artist/directory', 'char' => 'R')); ?> 
              <?php echo CHtml::link('S', array('artist/directory', 'char' => 'S')); ?> 
              <?php echo CHtml::link('T', array('artist/directory', 'char' => 'T')); ?> 
              <?php echo CHtml::link('U', array('artist/directory', 'char' => 'U')); ?> 
              <?php echo CHtml::link('V', array('artist/directory', 'char' => 'V')); ?> 
              <?php echo CHtml::link('W', array('artist/directory', 'char' => 'W')); ?> 
              <?php echo CHtml::link('X', array('artist/directory', 'char' => 'X')); ?> 
              <?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y')); ?>
              <?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z')); ?> 
            </div>
            <div class="clr ht15"></div>
            <span class="wpmega-link-title font-mole">Genres</span>
            <div class="clr"></div>

            <!-- 
            Please follow these HTMLS
            
            <div style="width:280px; padding:0 0 14px 0;"> 
             <a href="#"><span class="wpmega-link-title">Classic</span></a> /
              <a href="#"><span class="wpmega-link-title">Indi Pop</span></a> /
             <a href="#"><span class="wpmega-link-title">English Rock</span></a> / 
             <a href="#"><span class="wpmega-link-title">Metal</span></a><br />
           <a href="#"><span class="wpmega-link-title">Light Music</span></a> /
           <a href="#"><span class="wpmega-link-title">Electronics</span> </a> /
           <a href="#"><span class="wpmega-link-title">Alternative Rock</span></a> </div>-->
<style>.pad-adjust{ padding:0px 5px 0 0 !important;}</style>
            <div style="width:280px; padding:3px 0 3px 5px;">
              <?php
              $topgenre = Yii::app()->db2->createCommand()
                      ->select('*')
                      ->from('TBL_GENRES')
                      ->limit(5)
                      ->queryAll();

              for ($i = 0; $i < count($topgenre); $i++) {
			  
		
                echo CHtml::link('' . $topgenre[$i]['GENRE_NAME'],  $this->createUrl('artist/genresdir',array(
				  'id' =>  $topgenre[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$topgenre[$i]['GENRE_NAME']))), array('class' => 'wpmega-link-title pad-adjust len-text'));
              }
              ?>
            </div>
            <ul class="sub-menu sub-menu-2">
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Genres', CController::createUrl("artist/genres")); ?></li>
            </ul>
          </li>
        </ul>



      <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega"><?php echo CHtml::link('<span class="wpmega-link-title">Videos</span>', CController::createUrl("videos/index")); ?>
        <ul class="sub-menu sub-menu-1">
<li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">New Videos</span>
            <ul class="sub-menu sub-menu-2">
              <?php
              $video = Yii::app()->db2->createCommand()
                      ->select('crd.CONTENT_ID,cd.CONTENT_TITLE')
                      ->from('TBL_CONTENTS c')
                      ->join('TBL_CONTENT_RELEASE_DATES crd', 'c.CONTENT_ID=crd.CONTENT_ID')
                      ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
                      ->where(array('in', 'c.CONTENT_TYPE_ID', array(22, 53)))
                      ->order('crd.RELEASE_DATE desc')
                      ->limit('5')
                      ->queryAll();
              ?>
              <?php for ($i = 0; $i < count($video); $i++) { ?>
                <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><span><?php
              $str = $video[$i]['CONTENT_TITLE'];
              if (strlen($str) > 20) {
                $str = substr($video[$i]['CONTENT_TITLE'], 0, 18);
                $str.="..";
              } else {
                $str = $video[$i]['CONTENT_TITLE'];
              }
              $id = $video[$i]['CONTENT_ID'];
			  
			 
              echo CHtml::link('' . $str, $this->createUrl('videos/index',array(
				  'id' => $id,'name'=> str_replace(' ','-',$video[$i]['CONTENT_TITLE']))), array('class' => 'wpmega-link-title ml10',));
                ?></span></li>

              <?php } ?>
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Video', $this->createUrl('videos/index')); ?></li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>
          <?php $popularvideo = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "popular-videos.xml"); ?>
          <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
            <span class="wpmega-link-title font-mole">Popular Videos</span>
            <ul class="sub-menu sub-menu-2">

              <?php for ($i = 0; $i < 5; $i++) { ?>

                <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2">
                  <span> 
                    <?php
                    $str2 = $popularvideo->video[$i]->videoName;
                    if (strlen($str2) > 20) {
                      $str2 = substr($popularvideo->video[$i]->videoName, 0, 18);
                      $str2.="..";
                    } else {
                      $str2 = $popularvideo->video[$i]->videoName;
                    }
                    $id = $popularvideo->video[$i]->videoId;

				
				  
                    echo CHtml::link('' . $str2, 	$this->createUrl('videos/popularvideos',array(
				  'id' =>$id,'name'=> str_replace(' ','-',$popularvideo->video[$i]->videoName))), array('class' => 'wpmega-link-title'));
                    ?></span></li>

              <?php } ?>
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('More', CController::createUrl("videos/popularvideos")); ?> </li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>
          <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">Languages</span>
            <ul class="sub-menu sub-menu-2">
              <?php
            
/*
			$toplang = Yii::app()->db2->createCommand()
                      ->select('*')
                      ->from('TBL_LANGUAGES')
                      ->limit('5')
                      ->queryAll();
	*/				  
					  
					  
					  $sql="    SELECT LANGUAGE_ID,LANGUAGE_TITLE
        FROM TBL_LANGUAGES
        WHERE LANGUAGE_ID IN (
        SELECT DISTINCT  LANGUAGE_ID
        FROM TBL_CONTENT_LANGUAGE_MAP
        WHERE CONTENT_ID IN (
        
        SELECT c.CONTENT_ID
        FROM TBL_CONTENTS c
        JOIN TBL_CONTENT_LANGUAGE_MAP clm ON c.CONTENT_ID=clm.CONTENT_ID
        WHERE  c.CONTENT_TYPE_ID IN (22,53) AND LANGUAGE_ID IN (
        SELECT LANGUAGE_ID
        FROM TBL_LANGUAGES
        )))
        ";
		
					$connection = Yii::app()->db2;
					$command = $connection->createCommand($sql);
					$toplang = $command->queryAll();
              ?>
			  
			  
			  
              <?php for ($i = 0; $i < count($toplang); $i++) { ?>
                <li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2">
				
				
				
				<?php echo CHtml::link('' . $toplang[$i]['LANGUAGE_TITLE'], $this->createUrl('videos/langdirectory',array(
				  'id' =>  $toplang[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$toplang[$i]['LANGUAGE_TITLE']))), array('class' => 'wpmega-link-title')); ?>
				
				</li>
              <?php if($i==4){break;}} ?>
			  
			  
			  
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Languages', CController::createUrl("videos/langlist")); ?></li>
            </ul>
          </li>
          <div style="border:1px solid #cccccc; height:184px; float:left;"></div>
          <li id="menu-item-73" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">Alphabetical</span>
            <div class="clr"></div>
            <div style="width:280px; padding:5px 0 0 0;"> <?php echo CHtml::link('A', array('videos/directory', 'char' => 'A')); ?> <?php echo CHtml::link('B', array('videos/directory', 'char' => 'B')); ?> <?php echo CHtml::link('C', array('videos/directory', 'char' => 'C')); ?> <?php echo CHtml::link('D', array('videos/directory', 'char' => 'D')); ?> <?php echo CHtml::link('E', array('videos/directory', 'char' => 'E')); ?> <?php echo CHtml::link('F', array('videos/directory', 'char' => 'F')); ?> <?php echo CHtml::link('G', array('videos/directory', 'char' => 'G')); ?> <?php echo CHtml::link('H', array('videos/directory', 'char' => 'H')); ?> <?php echo CHtml::link('I', array('videos/directory', 'char' => 'I')); ?> <?php echo CHtml::link('J', array('videos/directory', 'char' => 'J')); ?> <?php echo CHtml::link('K', array('videos/directory', 'char' => 'K')); ?> <?php echo CHtml::link('L', array('videos/directory', 'char' => 'L')); ?> <?php echo CHtml::link('M', array('videos/directory', 'char' => 'M')); ?> <br /> <?php echo CHtml::link('N', array('videos/directory', 'char' => 'N')); ?> <?php echo CHtml::link('O', array('videos/directory', 'char' => 'O')); ?> <?php echo CHtml::link('P', array('videos/directory', 'char' => 'P')); ?> <?php echo CHtml::link('Q', array('videos/directory', 'char' => 'Q')); ?> <?php echo CHtml::link('R', array('videos/directory', 'char' => 'R')); ?> <?php echo CHtml::link('S', array('videos/directory', 'char' => 'S')); ?> <?php echo CHtml::link('T', array('videos/directory', 'char' => 'T')); ?> <?php echo CHtml::link('U', array('videos/directory', 'char' => 'U')); ?> <?php echo CHtml::link('V', array('videos/directory', 'char' => 'V')); ?> <?php echo CHtml::link('W', array('videos/directory', 'char' => 'W')); ?> <?php echo CHtml::link('X', array('videos/directory', 'char' => 'X')); ?> <?php echo CHtml::link('Y', array('videos/directory', 'char' => 'Y')); ?> <?php echo CHtml::link('Z', array('videos/directory', 'char' => 'Z')); ?> </div>
            <div class="clr ht15"></div>
            <?php
            /*$genre = Yii::app()->db2->createCommand()
                    ->select('*')
                    ->from('TBL_GENRES')
                    ->limit('5')
                    ->queryAll();*/
										
						$genre = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
			->limit('5')
            ->queryAll();
            ?>
            <span class="wpmega-link-title  font-mole">Genres</span>
            <div class="clr"></div>

            <!-- 
         Please follow these HTMLS
         
         <div style="width:280px; padding:0 0 14px 0;"> 
          <a href="#"><span class="wpmega-link-title">Classic</span></a> /
           <a href="#"><span class="wpmega-link-title">Indi Pop</span></a> /
          <a href="#"><span class="wpmega-link-title">English Rock</span></a> / 
          <a href="#"><span class="wpmega-link-title">Metal</span></a><br />
        <a href="#"><span class="wpmega-link-title">Light Music</span></a> /
        <a href="#"><span class="wpmega-link-title">Electronics</span> </a> /
        <a href="#"><span class="wpmega-link-title">Alternative Rock</span></a> </div>-->

            <div style="width:270px;padding:3px 0 3px 5px;">
              <?php
              for ($i = 0; $i < count($genre); $i++) {
                ?>
				
			
                <?php echo CHtml::link('' . $genre[$i]['GENRE_NAME'],$this->createUrl('videos/genredirectory',array(
				  'id' => $genre[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$genre[$i]['GENRE_NAME']))), array('class' => 'wpmega-link-title  pad-adjust len-text'));
                ?>
              <?php } ?>
            </div>
            <ul class="sub-menu sub-menu-2">
              <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Genres', CController::createUrl("videos/genrelist")); ?></li>
            </ul>
          </li>
        </ul>
        <?php
        $topspecials = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_specials')
                ->limit('5')
                ->order('indate desc')
                ->queryAll();
        //echo "<pre>";
        //print_r($topspecials);exit;
        ?>
      <li id="menu-item-108" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img"><a href="javascript:void(0)"><span class="wpmega-link-title">Specials</span></a>
        <ul class="sub-menu sub-menu-1">
          <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span style="padding-left:20px;" class="wpmega-link-title font-mole ml10	"><?php 
					
							$str = $topspecials[0]['special_name'];
												if (strlen($str) > 15) {
													$str = substr($topspecials[0]['special_name'], 0, 13);
													$str.="...";
												} else {
													$str = $topspecials[0]['special_name'];
												}

												echo $str;

					//echo $topspecials[0]['special_name']; ?></span>
            <?php for ($i = 0; $i < 1; $i++) { ?>

              <div class="" style="margin-left:20px; margin-top:10px;">
                <a href="<?php echo $topspecials[$i]['special_link']; ?>" target="_blank"">
                   <img src="<?php echo Yii::app()->baseUrl; ?>/images/specials/<?php echo $topspecials[$i]['special_image']; ?>" alt="" />
                </a>
                 <div class="clr"></div>
              </div>
              <div class="clr"></div>
              <ul class="sub-menu sub-menu-2">
                <li class="detailsa_sp mycart" style="padding:0px;">
               
                <a href="<?php echo $topspecials[$i]['special_link']; ?>" target="_blank">
                    <?php
                    $str = $topspecials[$i]['special_name'];
                    if (strlen($str) > 18) {
                      $str = substr($topspecials[$i]['special_name'], 0, 14);
                      $str.="...";
                    } else {
                      $str = $topspecials[$i]['special_name'];
                    }

                    echo $str;
                    ?></a>
                
                    </li>
              </ul>
            <?php } ?>
          </li>
          <div style="border:1px solid #cccccc; height:197px; margin-left:3px; float:left;"></div>
          <li id="menu-item-131" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span style="padding-left:20px;" class="wpmega-link-title font-mole">More Specials</span>
            <ul class="sub-menu sub-menu-2">
              <?php
              for ($i = 0; $i < count($topspecials); $i++) {
                ?>
                <li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 ">
                
                  <div style="width:150px; margin-left:15px;">
                
                <a href="<?php echo $topspecials[$i]['special_link']; ?>" target="_blank"><span class="wpmega-link-title">
                      <?php
                      $str = $topspecials[$i]['special_name'];
                      if (strlen($str) > 18) {
                        $str = substr($topspecials[$i]['special_name'], 0, 14);
                        $str.="...";
                      } else {
                        $str = $topspecials[$i]['special_name'];
                      }

                      echo $str;
                      ?></span></a>
                      </div>
                      </li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </li>

      <!-- M-Zone Removed temporarily-->
      <?php /* ?> <li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img">

        <?php echo CHtml::link('<span class="wpmega-link-title">M-zone</span>', CController::createUrl("/mzone")); ?>

        </li><?php */ ?>

      <div id="basic-modal-mzone" class="fl"> <a href="javascript: void(0)" class="basic-mzone menu-link">M-Zone</a> </div>         

      <?php
      if (Yii::app()->session["H_FULL_NAME"] == '') {
        ?>
        <div id="basic-modal-signup" class="fl"> <a href="javascript: void(0)" class="basic-signup menu-link">Sign up</a>
          <?php //echo CHtml::link("Sign up","#signupform", array('id'=>'inline','class'=>'basic-signup menu-link'));    ?>
        </div>
        <div id="basic-modal-login" class="fl"> <a href="javascript: void(0)" class="basic menu-link">Login</a> </div>
        <?php
      }
      if (Yii::app()->session["H_FULL_NAME"] != '') {
        ?>
        <div id="" class="fl"> <?php echo CHtml::link('Upload', CController::createUrl("upload/index"), array('class' => 'basic menu-link upload-act'));
        ?> </div>

      <?php } else { ?>
        <div id="basic-modal-login" class="fl"> <a href="javascript: void(0)" class="basic menu-link upload-act">Upload</a> </div>
      <?php } ?>
    </ul>
  </div>
  
  
  
  
  
  <div class="connect fr mr20"> 
    <a href="http://www.facebook.com/artistaloud" class="ml5" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb.gif" alt="fb" /></a> 
    <a href="http://www.twitter.com/artistaloud" class="ml5" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tw.gif" alt="tw" /></a> 
    <a href="http://www.youtube.com/artistaloud" class="ml5" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yt.gif" alt="yt" /></a>
    <a href="http://www.dailymotion.com/artistaloud" class="ml5" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dm.gif" alt="yt" /></a></div>
    <div class="fr search">
    <form method="get" action="<?php echo CController::createUrl("search/index"); ?>">
		<input type="text" class="search_text" name="searchtext" value="Search..." onclick="if(this.value=='Search...'){this.value=''}" onblur="if(this.value==''){this.value='Search...'}">
	</form>
  </div>
</div>
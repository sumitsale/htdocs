<?php  $this->pageTitle = " News Listing " ." | " . " ArtistAloud.com";?>
	
	<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								News Listing
								</div>
                
                <div class="page-title mt10 bdrbtm">
                	<h2 class="page-title-block fl">All News</h2>
                    <div class="share-elements fr">
                     <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                    </div>
                <div class="clr"></div>
                </div>
                
               
                <div class="clr"></div>
            	<div class="news-list mt10">
							
							
<!--						
<div class="featured">
	
    <div><h2><?php //echo CHtml::link('Best social media campaign award', CController::createUrl("news/details"),array('class'=>'font-mole')); ?></h2></div>
	<div class="info pl10 font-mole fnt16">31 August 11 <span class="grey99">|</span> The Hindu</div>
    <div class="feat-post pl10 pt10 grey99">
    Hungama Digital Entertainment's innovative portal www.artistaloud.com, has been named the winner of the "IndiaSocial CaseChallenge2" an online competition for the best use of social media by a business house. The Artist Aloud website, which... <a href="#" class="orange">Read More</a>
    </div>
</div>
-->

<?php 
	
	$j=($sample[0]-1)+10;
if($j>$item_count){
		 $j=$item_count;
}

for($i=$sample[0]-1;$i<$j;$i++){   
			
			
			$time=strtotime($news[$i]['Press_News_Date']);
			?>

<div class="news-item" id="">
		<div class="news"><?php echo CHtml::link(''.$news[$i]['Press_News_Title'], CController::createUrl("news/details/id/".$news[$i]['Press_id']), array('class'=>'orange')); ?></div>
		
		
       <div class="info pl10 grey99"><?php echo date('dS',$time)." ".date('F',$time)." ".date('y',$time); ?> | <?php echo $news[$i]['Press_News_Source']; ?></div>
</div>

		<?php } ?>

											
                    <?php //include 'news-list.php'; ?>
                    </div>
                     <div class="clr"></div>
                </div>
				
			&nbsp;&nbsp;&nbsp;		
			
		<?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>2,
            'nextPageLabel'=>'Next &gt;',
            'header'=>'',
            'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
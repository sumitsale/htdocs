<script>

setTimeout(function(){
			
			
			var stab = <?php echo $activetab; ?>
			
			
			lis = $("ul.resp-tabs-list > li");
			lis.removeClass("resp-tab-active");
			$("ul.resp-tabs-list li[aria-controls='tab_item-"+stab+"']").addClass("resp-tab-active");
			divs = $("#horizontalTab .resp-tabs-container > div");
			divs.removeClass("resp-tab-content-active").removeAttr("style");
			$("#horizontalTab .resp-tabs-container div[aria-labelledby='tab_item-"+stab+"']").addClass("resp-tab-content-active").attr("style","display: block;");


			}, 1000);


</script>
<div class="col_two">
						<h2><span>Places</span> To Visit</h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index'); ?>" class="active">Place to visit</a></li>
								
								
							</ul>
						</div>
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Islands</li>
								<li>Beaches</li>
								<li>Monument & Museums</li>
								<li>Parks & Shopping Points</li>
								
							</ul>
							<div class="resp-tabs-container">
								<div>
									<?php for($i=0;$i<count($result['place_to_visit_Islands']);$i++) 
									{ ?>
								
									<div class="place_visit <?php if(($i+1) == count($result['place_to_visit_Islands'])) { echo 'last';}  ?> left">
										<div class="col-one">
											<img src="<?php echo Yii::app()->baseUrl; ?>/images/placestovisit/<?php echo $result['place_to_visit_Islands'][$i]['small_thumbnail']; ?>" alt="<?php echo $result['place_to_visit_Islands'][$i]['small_thumbnail']; ?>" width="219" height="247">
										</div>
										<div class="col-two">
										
											<h4><?php echo $result['place_to_visit_Islands'][$i]['place_name']; ?></h4>
											<?php 


$result['place_to_visit_Islands'][$i]['description']= str_replace("div", "p", $result['place_to_visit_Islands'][$i]['description']);

echo substr($result['place_to_visit_Islands'][$i]['description'],0,650); ?></p>
											
											<a href="<?php echo Yii::app()->createUrl('Places_to_visit/detail',array('category'=>strtolower(str_replace('&','and',str_replace(' ','-',$result['place_to_visit_Islands'][$i]['category_name']))),'name'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Islands'][$i]['place_name']))))); ?>" title="View More">VIEW MORE</a>
										</div>
									</div>
								
								<?php }  ?>
									
								</div>
								<div>
									
									
									<?php for($i=0;$i<count($result['place_to_visit_Beaches']);$i++) { ?>
								
									<div class="place_visit <?php if(($i+1) == count($result['place_to_visit_Beaches'])) { echo 'last';}  ?> left">
										<div class="col-one">
											<img src="<?php echo Yii::app()->baseUrl; ?>/images/placestovisit/<?php echo $result['place_to_visit_Beaches'][$i]['small_thumbnail']; ?>" alt="<?php echo $result['place_to_visit_Beaches'][$i]['small_thumbnail']; ?>" width="219" height="247">
										</div>
										<div class="col-two">
										<h4><?php echo $result['place_to_visit_Beaches'][$i]['place_name']; ?></h4>
											<?php 

$result['place_to_visit_Beaches'][$i]['description']= str_replace("div", "p", $result['place_to_visit_Beaches'][$i]['description']);


echo substr($result['place_to_visit_Beaches'][$i]['description'],0,650); ?></p>
											<a href="<?php echo Yii::app()->createUrl('Places_to_visit/detail',array('category'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Beaches'][$i]['category_name']))),'name'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Beaches'][$i]['place_name']))))); ?>" title="View More">VIEW MORE</a>
										</div>
									</div>
								
								<?php }  ?>
								
								</div>
								<div>
									<?php for($i=0;$i<count($result['place_to_visit_Monument_Museums']);$i++) { ?>
								
									<div class="place_visit  <?php if(($i+1) == count($result['place_to_visit_Monument_Museums'])) { echo 'last';}  ?> left">
										<div class="col-one">
											<img src="<?php echo Yii::app()->baseUrl; ?>/images/placestovisit/<?php echo $result['place_to_visit_Monument_Museums'][$i]['small_thumbnail']; ?>" alt="<?php echo $result['place_to_visit_Monument_Museums'][$i]['small_thumbnail']; ?>" width="219" height="247">
										</div>
										<div class="col-two">
											<h4><?php echo $result['place_to_visit_Monument_Museums'][$i]['place_name']; ?></h4>
											<?php 

$result['place_to_visit_Monument_Museums'][$i]['description']= str_replace("div", "p", $result['place_to_visit_Monument_Museums'][$i]['description']);

echo substr($result['place_to_visit_Monument_Museums'][$i]['description'],0,650); ?></p>
											<a href="<?php echo Yii::app()->createUrl('Places_to_visit/detail',array('category'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Monument_Museums'][$i]['category_name']))),'name'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Monument_Museums'][$i]['place_name']))))); ?>" title="View More">VIEW MORE</a>
										</div>
									</div>
								
								<?php }  ?>
								
								</div>
								<div>
									<?php for($i=0;$i<count($result['place_to_visit_Parks_Shopping_Points']);$i++) { ?>
								
									<div class="place_visit <?php if(($i+1) == count($result['place_to_visit_Parks_Shopping_Points'])) { echo 'last';}  ?> left">
										<div class="col-one">
											<img src="<?php echo Yii::app()->baseUrl; ?>/images/placestovisit/<?php echo $result['place_to_visit_Parks_Shopping_Points'][$i]['small_thumbnail']; ?>" alt="<?php echo $result['place_to_visit_Parks_Shopping_Points'][$i]['small_thumbnail']; ?>" width="219" height="247">
										</div>
										<div class="col-two">
											<h4><?php echo $result['place_to_visit_Parks_Shopping_Points'][$i]['place_name']; ?></h4>
											<?php 
$result['place_to_visit_Parks_Shopping_Points'][$i]['description']= str_replace("div", "p", $result['place_to_visit_Parks_Shopping_Points'][$i]['description']);

echo substr($result['place_to_visit_Parks_Shopping_Points'][$i]['description'],0,650); ?></p>
											<a href="<?php echo Yii::app()->createUrl('Places_to_visit/detail',array('category'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Parks_Shopping_Points'][$i]['category_name']))),'name'=>str_replace('&','and',strtolower(str_replace(' ','-',$result['place_to_visit_Parks_Shopping_Points'][$i]['place_name']))))); ?>" title="View More">VIEW MORE</a>
										</div>
									</div>
								
								<?php }  ?>
									
									
								
								</div>
							</div>
						</div>
					</div>
					
					
						<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true,   // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function(event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);

						$name.text($tab.text());

						$info.show();
					}
				});

			});
		</script>

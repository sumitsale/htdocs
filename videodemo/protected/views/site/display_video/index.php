<?php
if(Count($data)>0)
	{
		$result['flag'] = 'success';  
		$result['httpurl'] = $data[0]['httpurl'];  
		
		// echo $data[0]['httpurl']; 
		echo "<script type ='text/javascript'>
		
		
		var current_url ='".$data[0]['httpurl']."'
		
		function check_vide()
		{
		
			
				
				setTimeout(function(){ 



			
				var dataString = 1;
				$.ajax
				({
					type: 'POST',
					url: '".Yii::app()->baseUrl."/index.php/Display_video/check_video',
					data: dataString,
					success: function(data) 
					{
					
						
						if(current_url == data)
						{
							check_vide();
						}
						else
						{
						
						dataString='';
	
						$.ajax
								({
									type: 'POST',
									url: '".Yii::app()->baseUrl."/index.php/Display_video/index',
									data: dataString,
									success: function(data) 
									{
									
										if(data !='error')
										{
										$('#main-content').html('');
										$('#main-content').html(data);
										}
										else
										{
											alert('Video not uploaded for current time');
										}
									}
								});
						
						
							
						}
						
						
					}
				});



				}, 30000);
		
		}
		
		check_vide();
			
		
		</script>";
		
		echo "<br>";
		
		
		echo '
		<video title="'.$data[0]['title'].'" autoplay id="myvideo" style="position: fixed; right: 0; bottom: 0;
    min-width: 100%; min-height: 100%;
    width: 100% !important; height: auto !important; z-index: -100;
     no-repeat;
    background-size: cover;">
  <source id ="videosrc" src="'.$data[0]['httpurl'].'" type="video/mp4">
  Your browser does not support the video tag.
</video> <div id="video_overlays" style="position: absolute;
  top: 432px;
  left: 0;
  width: 100% !important;
  height: 25px;
  z-index: 100; 
  color: #00ff00"><div style="float-left">'.$data[0]['title'].'</div><div style="float-right">'.date("Y-m-d H:i:s",time()).'</div></div>';
	}
	else
	{
		
		echo 'error';
	}
	
	?>
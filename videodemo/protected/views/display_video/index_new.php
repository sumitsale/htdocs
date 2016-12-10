<?php
if(Count($data)>0)
	{ ?>
	
	
	<script type ='text/javascript'>
		
		
		var current_url ='<?php echo $data[0]['httpurl'] ?>';
		
		
		function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date()
var x1=x.getMonth() + '/' + x.getDate() + '/' + x.getYear(); 
x1 = x.getHours( )+ ':' +  x.getMinutes() + ':' +  x.getSeconds();
document.getElementById('ct').innerHTML = x1;

tt=display_c();
 }
		display_ct();
		
		function check_vide()
		{
		
			
				
				setTimeout(function(){ 



			
				var dataString = 1;
				$.ajax
				({
					type: 'POST',
					url: '<?php echo Yii::app()->baseUrl; ?>/index.php/Display_video/check_video',
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
									url: '<?php echo Yii::app()->baseUrl; ?>/index.php/Display_video/index',
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
			
		
		</script>
	
	<div class="overlay" style=" position:absolute;
            top:70px;
            left:0;
            padding:20px 50px 20px 50px;
            background-color:#000;
            opacity:0.35;
            filter:alpha(opacity=35); 
            z-index:2;">
        <h1 style=" font-family: arial, sans-serif;
            font-size:16px;
            color:#fff;">
			<div style="float-left"><?php echo $data[0]['title'] ?></div>
			<span id="ct" ></span></h1>
    </div>

	<?php 
	
		$video_start_time = date("Y-m-d",time())." ".$data[0]['start_hour'].":".$data[0]['start_minute'].":00";
		$current_time     = date("Y-m-d H:i:s",time());
		
		$start_time = strtotime($current_time) - strtotime($video_start_time);
		
		// echo $video_start_time."<br>";
		// echo $current_time."<br>";
		// echo $start_time;exit;
	
	?>
	
	
		 <div class="videoContainer">
        <video autoplay style="position: fixed; right: 0; bottom: 0;
    min-width: 100%; min-height: 100%;
    width: 100% !important; height: auto !important; z-index: -100;
     no-repeat;">
            <source src="<?php echo $data[0]['httpurl']."#t=".$start_time.",30000000"; ?>" type='video/mp4;'>

            Video not supported.
        </video>
    </div>

	
<?php 	}  else
	{
		
		
		
		
		echo 'Video is not uploaded for current time!';
	?> 
	
	
	<script type ='text/javascript'>
		
		
		var current_url ='';
		
		
		function check_vide()
		{
		
			
				
				setTimeout(function(){ 



			
				var dataString = 1;
				$.ajax
				({
					type: 'POST',
					url: '<?php echo Yii::app()->baseUrl; ?>/index.php/Display_video/check_video',
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
									url: '<?php echo Yii::app()->baseUrl; ?>/index.php/Display_video/index',
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
			
		
		</script>
	
	
	
	<?php } ?>
	
	
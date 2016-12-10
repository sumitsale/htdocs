$(document).ready(function() {
				/*Code for assigning dynamic width to the Playlist on the top.*/
				var a = 991;
				var b= a-300;
				$('.frame-slider').css('width',b+'px');
				$('.top_img').css('width',b+'px');
			});
			
			$(window).resize(function() {
				/*Code for assigning dynamic width to the Playlist on the top.*/
				var a = 991;
				var b= a-300;
				$('.frame-slider').css('width',b+'px');
				$('.top_img').css('width',b+'px');
			});
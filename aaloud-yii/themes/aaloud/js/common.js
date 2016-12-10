function getObjects(obj, key, val) {
  var objects = [];
  for (var i in obj) {
    if (!obj.hasOwnProperty(i)) continue;
    if (typeof obj[i] == 'object') {
      objects = objects.concat(getObjects(obj[i], key, val));
    } else if (i == key && obj[key] == val) {
      objects.push(obj);
    }
  }
  return objects;
}
  
function addToSongHistory(fileId, artist_id, content_id){
  var songListHistory = $.cookie('songListHistory');
  if(songListHistory == null){
    eval('obj = {file_id:"'+fileId+'", artist_id:"'+artist_id+'", content_id:"'+content_id+'"}', window);
    $.cookie("songListHistory", JSON.stringify(obj), {
      expires: 7, 
      //path: baseUrl,
      path: '/'
    });
    songListHistory = $.cookie('songListHistory');
  }else{
    var historyJson = jQuery.parseJSON(songListHistory);
    if(getObjects(historyJson, 'file_id', fileId).length > 0)
      return;
    eval('obj = ' + songListHistory + '', window);
    var realArray = $.makeArray( obj )
    songListHistory = $.merge(realArray, [{
      'file_id':fileId, 
      'artist_id':artist_id, 
      'content_id':content_id
    }]);
    $.cookie("songListHistory", JSON.stringify(songListHistory), {
      expires: 7, 
      //path: baseUrl,
      path: '/'
    });
  }
}

function populateSongInfo(fileId, artist_id, content_id, songTitle){
  $.post(baseUrl + "/site/getSongInfo", {
    'file_id': fileId, 
    'artist_id': artist_id, 
    'content_id':content_id
  }, function(data){
    var songInfo = [];
	artistImage = (data.artistImage!="")?data.artistImage : baseUrl + '/../themes/aaloud/images/Thumbnails/80x80.jpg';
    songInfo.push('<div class="track-info pad5">');
    songInfo.push('<div class="track-info-thumb bg-purple pt5 pl5 fl"><img src="'+ artistImage +'" alt="" /></div>');
    songInfo.push('<div class="track-info-album fr">');
    songInfo.push('<div class="art-name font-mole">'+ data.artistName +'</div>');
    songInfo.push('<div class="song-name font-mole">"'+ (data.songName).substr(0,15) +'"</div>');
    songInfo.push('<div class="fb-share mt5 mb5"><div data-font="tahoma" data-show-faces="false" data-width="110" data-layout="button_count" data-send="false" data-href="http://www.facebook.com/artistaloud" class="fb-like fb_edge_widget_with_comment fb_iframe_widget"><span><iframe scrolling="no" id="f1d121da2719334" name="f171578d70d007c" style="border: medium none; overflow: hidden; height: 20px; width: 110px;" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=128037837274893&amp;channel_url=https%3A%2F%2Fs-static.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%3Fversion%3D3%23cb%3Df3fb6e54818b5e%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff23b13a6e459ed6%26relation%3Dparent.parent%26transport%3Dpostmessage&amp;extended_social_context=false&amp;font=tahoma&amp;href=http%3A%2F%2Fwww.facebook.com%2Fartistaloud&amp;layout=button_count&amp;locale=en_US&amp;node_type=link&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=110"></iframe></span></div></div>');
    if(sessionState == true){
      songInfo.push('<div class="song-links artistt-foncol2 font-mole">');
      songInfo.push('<a href="javascript: void(0)" class="fnt9 w_fff basic addToCart" content_title="'+ songTitle +'" content_id="'+ content_id +'" content_type_id="'+ 1 +'">Buy</a> . ');
      //songInfo.push('<a href="#">share</a> . ');
      songInfo.push('<a href=" '+baseUrl + '/artist/songinfo?contentid=' + data.contentId + '&fileid='+fileId +'?ajax='+true+'&width='+250 +'&height='+100 +'" class="" rel="info[ajax]">  <img alt="Info" src=" '+themeUrl + '/images/prettyPhoto/dark_square/bg_black.gif" title="" />Info</a>');
      songInfo.push('</div>');
    }
    else{
      songInfo.push('<div class="song-links artistt-foncol2 font-mole">');
      songInfo.push('<a id="basic-modal-login" href="javascript: void(0)" class="fnt9 w_fff basic">Buy</a> . ');
      //songInfo.push('<a href="#">share</a> . ');
      songInfo.push('<a href=" '+baseUrl + '/artist/songinfo?contentid=' + data.contentId + '&fileid='+fileId +'?ajax='+true+'&width='+250 +'&height='+100 +'" class="" rel="info[ajax]"> <img alt="Info" src=" '+themeUrl + '/images/prettyPhoto/dark_square/bg_black.gif" title="" />Info </a>');
      songInfo.push('</div>');
    }
    songInfo.push('</div>');
    songInfo.push('<div class="clr"></div>');
    songInfo.push('</div>');
    songInfo.push('<div class="rev-exp"><strong>To know More About The Artist</strong>  <div class="CL"></div>  '+ data.songReview +' <a href="'+baseUrl + '/artists/' + data.artistName +'/'+ data.artistId +'" class="orange"><strong>Click here</strong></a></div>');
    $(".track-info-wrap").html(songInfo.join(''));
    Cufon.replace('.font-mole');
    $("a[rel^='info']").prettyPhoto({
      theme:'pp_default', 
      social_tools:false, 
      deeplinking: false, 
      slideshow: false, 
      autoplay_slideshow: false, 
      default_width: 200, 
      default_height: 100, 
      allow_resize: true
    });
  }, 'json');
}
    
$(document).ready(function(){
  /**
   * The code to play the song on click on the play button
   */
  $(".play_box a.play, .artistDetailsPlayList a.play, .historyPlay").live('click', function(){
    //console.log('playing' + $(this).attr('url'));
    var songUrl = $(this).attr('url');
    if(songUrl.length > 0){
      var songTitle = "";
      if($(this).attr('class') == 'historyPlay'){
        songTitle = $(this).find('.a-title').text();
      }
      else{
        songTitle =  $(this).parent().find('span').text();
      }
      if(typeof(isHome) == 'undefined')
        window.myPlayList.remove();
      window.myPlayList.add({
        title: songTitle,
        mp3:songUrl
      });
      $("#jquery_jplayer_2").jPlayer("play");
      
      if(typeof(isHome) != 'undefined')
        window.myPlayList.play(-1);
      
      //$(".play_box a.pause, .artistDetailsPlayList a.pause").removeClass('pause').addClass('play');
      //$(this).removeClass('play').addClass('pause');
      //console.log(window.myPlayList);
        
      addToSongHistory($(this).attr('file_id'), $(this).attr('artist_id'), $(this).attr('content_id'));
      populateSongInfo($(this).attr('file_id'), $(this).attr('artist_id'), $(this).attr('content_id'), songTitle);
    }
    return false;
  });
    
  $(".play_box a.pause, .artistDetailsPlayList a.pause").live('click', function(){
    return false;
  });
  
  $(".clear-hist a").live('click', function(){
    $.cookie("songListHistory", null, {
      expires: -1, 
      //path: baseUrl,
      path: '/'
    });
    $("#list").html('');
    return false;
  })
  
  var $paneTarget = $('html');
	
	$("div.vid, #pagination_bottom li a").live("click", function(){
		$paneTarget.stop().scrollTo( 'h2.page-title-block', 500 );
	});
	
});


<script type="text/javascript">
  //<![CDATA[
  $(document).ready(function(){

    myPlayList = $("#jquery_jplayer_1").jPlayer({
      ready: function () {},
      swfPath: "js",
      supplied: "mp3",
      wmode: "window"
    });
  });
  //]]>
</script>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jplayer_main">
  <a name="songs_player" ></a>
  <div id="jp_container_1" class="jp-audio fl">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <div class="fl jp_img">
        
        </div>

        <div class="jp-title">
          <ul>
            <li></li>
          </ul>
        </div>
        <div class="jp-container">
          <ul class="jp-controls">
            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
            <!--<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>-->
            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
            <!--<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>-->
          </ul>
        </div>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar">
            </div>
          </div>
        </div>

      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
  <div class="player_right fr"></div>
</div>
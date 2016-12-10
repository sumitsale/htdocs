
<script language="javascript">
  var path;
  if(path=='')
  {
    var fileURL="<?php echo $path; ?>";
  }
  else
  {
    var fileURL="<?php echo $path; ?>";
  }
  //var fileURL="rtmp://cp142833.edgefcs.net/ondemand/mp4:cmt/tmp/60902062.mp4";
  // Convert file URL to Connection and Video URL 
  var type="vod";
  if(fileURL.indexOf("rtmp")==0)
  {
    if(fileURL.indexOf("/live/")>0)
    {
      var connectURL=fileURL.substring(0,fileURL.lastIndexOf("/live/")+6);
      var videoFile=fileURL.substring((fileURL.lastIndexOf("/live/")+6),fileURL.length);
      type="live";
    }else
    {
      var connectURL=fileURL.substring(0,fileURL.lastIndexOf(":"));
      var videoFile=connectURL.substring((connectURL.lastIndexOf("/")+1),connectURL.length);
      connectURL=connectURL.substring(0,connectURL.lastIndexOf("/"));
      videoFile=videoFile+fileURL.substring(fileURL.lastIndexOf(":"),fileURL.length);
      type="vod";
    }
  }else
  {
    connectURL=null;videoFile=fileURL;
    if(fileURL.indexOf("/live/")>0){type="live";}
  }
  VDOPIAPlayer("player",
  {
		
    <!--Player for WEB-->
    web:{width:625,height:350,connectURL:connectURL, videoFileURL:"vdopia"+type+"://0|"+videoFile ,apikey:"6507ff7d020d71a340321ccb6df9bf2b",adFormat:"preroll",runtime:100,title:"Orphan",apitest:false,videoPoster:"http://www.pep.ph/images/guide/904fc97c5.jpg", category:"EN",autoplay:true},
		
    <!--Player for Ipad-->
    mobile:{width:640,height:360,videoFileURL:"<?php echo $ipadpath; ?>",title:"Orphan",videoPoster:"http://i2.vdopia.com/dev/satyam/HTML5/video.png",runtime:100, apikey:"9120d7ef826c62e89e6b554bcfb07f35",title:"Orphan",logo:"http://fs02.androidpit.info/aico/x14/23714.png",Skin:"ArtistAloud"}
		
  });
               
  // window.addEventListener("load",playStream,false);
</script>

<div id="player"></div>


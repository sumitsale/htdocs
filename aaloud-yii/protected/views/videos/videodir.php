<div class="content-left fl">

    <div class="breadcrumb grey99 fnt11"> Breadcrumbs here.</div>

    <div class="page-title mt10">
        <h2 class="page-title-block fl">Videos</h2>
        <div class="share-elements fr"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/share.gif" alt="" /></div>
        <div class="clr"></div>
    </div>


    <div class="top-buttons">

        <div class="buttons">

            <ul class="blue">
                <li><a href="#" title="New artists"><span>New videos</span></a></li>
								<li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/videos/popularvideos" title="popular videos"><span>popular videos</span></a></li>
                <li><a class="trigger-l" title="languages"><span>Languages</span></a></li>
								<li><a class="trigger" title="categories" ><span>Categories</span></a></li>
            </ul>

        </div><div class="clr"></div>


        <div class="panel mt10">
            <div class="panal-header">
                <h3 class="sub-page-title-block fl">Categories</h3>
            </div>
            <div class="clr"></div>
            <div class="panal-content">
                <div class="panal-list">
								<?php for($i=0;$i<count($genrelist);$i++) { ?>
                    <ul class="each-list">
												<li><?php echo CHtml::link(''.$genrelist[$i]['GENRE_NAME'], CController::createUrl("videos/genredirectory?id=".$genrelist[$i]['GENRE_ID']), array('class'=>'each-list')); ?></li>
                    </ul>
								<?php if($i==31)
									{
									break;
									} 
								} ?>
                </div>
            </div>
        </div>
			
				 <div class="panel-l mt10">
            <div class="panal-header">
                <h3 class="sub-page-title-block fl">Languages</h3>
            </div>
            <div class="clr"></div>
            <div class="panal-content">
                <div class="panal-list">
                <?php for($i=0;$i<count($langlist);$i++) { ?>
                    <ul class="each-list">
                          <li><?php echo CHtml::link(''.$langlist[$i]['LANGUAGE_TITLE'], CController::createUrl("videos/langdirectory?id=".$langlist[$i]['LANGUAGE_ID']), array('class'=>'each-list')); ?></li> 
                    </ul>
							  <?php if($i==31)
							  {
							  break;
							  }
				  
							} ?>
                </div>
            </div>
        </div>



        <?php //include 'button-nav.php'; ?>
    </div>
    <div class="clr"></div>

    <div class="video-list ">

        <div class="main-video">
<!--<iframe width="625" height="348" src="http://www.youtube.com/embed/_V-3RJ1_enM" frameborder="0" allowfullscreen></iframe>-->
            <script language="javascript" src="http://cdn.vdopia.com/advertisements/js/ivdopia/ivdopia.js"></script>
            <script language="javascript">
                function playStream()
                {
                    var fileURL="rtmp://cp142833.edgefcs.net/ondemand/mp4:cmt/tmp/60902062.mp4";
                    // Convert file URL to Connection and Video URL 
                    var connectURL=fileURL.substring(0,fileURL.lastIndexOf(":"));
                    var videoFile=connectURL.substring((connectURL.lastIndexOf("/")+1),connectURL.length);
                    connectURL=connectURL.substring(0,connectURL.lastIndexOf("/"));
                    videoFile=videoFile+fileURL.substring(fileURL.lastIndexOf(":"),fileURL.length);
                    VDOPIAPlayer("player",
                    {
                        web:{width:625,height:360,connectURL:connectURL, videoFileURL:"vdopiavod://0|"+videoFile ,apikey:"6507ff7d020d71a340321ccb6df9bf2b",adFormat:"preroll",runtime:100,title:"Orphan",apitest:false,videoPoster:"http://www.pep.ph/images/guide/904fc97c5.jpg", category:"EN",autoplay:true},
                        mobile:{width:625,height:360,videoFileURL:"http://46.137.251.95/vods3/_definst_/mp4:amazons3/content.hungama.com/events%20and%20broadcasts%20video/video%20content/full%20m4v%20640x480/60902062.m4v/playlist.m3u8",title:"Orphan",videoPoster:"http://i2.vdopia.com/dev/satyam/HTML5/video.png",runtime:100, apikey:"AX123",title:"Orphan",logo:"http://fs02.androidpit.info/aico/x14/23714.png"}
                    });
                }
                window.addEventListener("load",playStream,false);
            </script>

            <div id="player"></div>



        </div>
        <div class="desc">
            <div>
                <h3 class="singer-name"><?php echo $defaultvideo->artistName; ?> - <?php echo $defaultvideo->videoAlbum; ?></h3>
            </div>

            <div>
                <h4 class="genre-name"><?php echo $defaultvideo->genre; ?></h4>
            </div>



            <div class="grey99 para">
                <p><?php echo $defaultvideo->videodescription; ?></p>
            </div> 

            <div class="clr"></div>

        </div>
        <div class="page-title mt10">
            <h3 class="sub-page-title-block fl"><?php echo $char; ?></h3>
            <div class="clr"></div>
        </div>
        <div class="vid-wrapper">

            <?php
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) 
								{
                    if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $result[$i]['CONTENT_ID'] . ".xml"))
										{
                        $j;

												$videolisting =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/'."video-" . $result[$i]['CONTENT_ID'] . ".xml");
												//echo "<pre>";
												//print_r($videolisting);exit;
                        ?>

                        <div class="vid">
                            <div class="new-button">
                            </div>
                            <div class="video">
                                <a class="block" href=""><img src="<?php echo $videolisting->videoThumbnail130X75;?>"  /></a>
                            </div>
                            <div class="vid-bottom">
                                <div class="play-button" style="cursor:pointer;" href="">
                                    <a class="block" href=""></a>
                                </div>
                                <div class="name-list">
                                    <div class="name fnt11">
                                        <b><?php 
																				echo substr($videolisting->names->artistName->name,0,18);
																				?></b>
                                    </div>
																		
                                    <div class="song fnt11 grey99" style="cursor:pointer;">
                                        <?php echo substr($videolisting->videoName,0,18);?>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php $k = $j + 1;


            if ($k % 4 == 0) { ?>
                            <div class="clr"></div>
                        <?php } ?>

                        <?php $j++;
                    }
                }
            } else
                echo "<h2 class=" . orange . ">No Result Found</h2>"; ?>



        </div>                      

        <?php //include 'video-list.php';  ?>
        <div class="clr"></div>
    </div>

    <div class="bottom-pagination mt10">

        <ul id="pagination_bottom">
            <li><<</li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="" style="background-color:#06C">&nbsp;&nbsp;&nbsp;</a></li>
            <li>of</li>
            <li><a href="">23</a></li>
            <li>>></li>
        </ul>


        <?php //include 'bottom-paginate.php';  ?>
    </div>


</div>
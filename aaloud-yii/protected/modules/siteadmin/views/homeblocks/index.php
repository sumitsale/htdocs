<?php
$this->breadcrumbs = array(
    'Homeblocks',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
?>
<h1>Focus Block Selection</h1>

<script type="text/javascript">
  $(document).ready(function(){
    
  });
  
  function getVideo(id){
    var url = '<?php echo $this->createUrl('/siteadmin/video/displaysubtag'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#videoList").html(data);
    });
    var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/getArtistDesc'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#videoArtistDetails").html(data);
    });
	 var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/getArtistbigimage'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#videobigimage").html(data);
    });
	var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/getartistthumbnail'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#videothumbnail").html(data);
    });
	
  }
  
  function getArtistArt(id){
    /*var url = '<?php echo $this->createUrl('/siteadmin/video/displaysubtag'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#videoList").html(data);
    });*/
    var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/getArtistDesc'); ?>';
    $.post(url, {'artist_id':id}, function(data){
      $("#artistArtDetails").html(data);
    });
  }
  
  $(function() {
    $( "#tabs" ).tabs({ disabled: [2] });
    
    $('#videoDemandForm').submit(function(){
      var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/addFocus'); ?>';
      $.post(url, $(this).serialize(), function(data){
        alert('Added the Slide to FocusBlock');//alert(data);
        var list = [];
        list.push('<li class=\"ui-state-default\">');
        list.push('<span>'+ $("#videoArtistName").val() +' (video on demand)</span>')
        list.push('<a class=\"del\" href=\"#\" title="'+ data +'">Delete</a>')
        list.push('</li>');
        $("#sortable").append(list.join(''));
      });
      return false;
    });
    
    var eventurl = '<?php echo $this->createUrl('/siteadmin/homeblocks/addFocus'); ?>';
    $('#liveEventForm').ajaxForm({
      success: function(data) {
	 
        alert('Added the Slide to FocusBlock');//alert(data);
        var list = [];
        list.push('<li class=\"ui-state-default\">');
        list.push('<span>'+ $("#eventName").val() +' (live event)</span>')
        list.push('<a class=\"del\" href=\"#\" title="'+ data +'">Delete</a>')
        list.push('</li>');
        $("#sortable").append(list.join(''));
      },
      url: eventurl
    });
    
    $("a.del").live('click', function(){
      var currentA = $(this);
      var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/deleteFocus'); ?>';
      $.post(url, {'id':currentA.attr('title')}, function(data){
      
        currentA.parent().remove();
      });
      return false;
    });
    
    $( "#sortable" ).sortable({ placeholder: "ui-state-highlight" });
    $( "#sortable" ).disableSelection();
    
    $("#updateOrder").click(function(){
      var url = '<?php echo $this->createUrl('/siteadmin/homeblocks/updateFocusOrder'); ?>';
      var result = $('#sortable').sortable('toArray');
      $.post(url, {'order-list':result}, function(data){
        alert(data);
      });
    });
  });
</script>

<?php
if (Yii::app()->user->hasFlash('success')):
  ?>
  <div class="flash-success">
    <?php echo Yii::app()->user->getFlash('success'); ?>
  </div>
<?php endif; ?>

<div id="tabs">
  <ul>
    <li><a href="#focustab-1">Video on Demand</a></li>
    <li><a href="#focustab-2">Live Event</a></li>
    <li><a href="#focustab-3">Artist or Artwork</a></li>
  </ul>
  <div id="focustab-1">
    <?php echo CHtml::beginForm('', 'post', array('id' => 'videoDemandForm', 'name' => 'videoDemandForm')); ?>
    <table id="vidioDemandTbl">
      <caption>Video on Demand</caption>
      <tr>
        <td><?php echo CHtml::label('Artist Name', 'videoArtistName'); ?></td>
        <td>
          <?php
          echo CHtml::hiddenField('videoArtistId');
          echo CHtml::hiddenField('focustype', 'video on demand');
          $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
              'name' => 'videoArtistName',
              'attribute' => 'ARTIST_NAME',
              //'model' => $model1,
              //'value' => $model1->isNewRecord ? '': $model1->CONTENT_TITLE,
              'source' => $this->createUrl('Topartists/autocompleteTest'),
              'options' => array(
                  'showAnim' => 'fold',
                  'select' => "js:function( event, ui ) {
                  //$('#label').val(ui.item.label);
                  //$('#code').val(ui.item.code);
                  //$('#call_code').val(ui.item.call_code);
                  $('#videoArtistId').val(ui.item.id);
                  getVideo(ui.item.id);
                }"
              ),
          ));
          ?>
        </td>
      </tr>

      <tr>
        <td> <?php echo CHtml::label('Artist Description', 'videoArtistDetails'); ?> </td>
        <td> <?php echo CHtml::textArea('videoArtistDetails'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Video List', 'videoList'); ?> </td>
        <td> <?php echo CHtml::dropDownList('videoList', NULL, array('Select a Video')); ?> </td>
      </tr>
	   <tr>
        <td> <?php echo CHtml::label('Video Big Image', 'videobigimage'); ?> </td>
        <td> <?php echo CHtml::dropDownList('videobigimage', NULL, array('Select Big image')); ?> </td>
      </tr>
	   <tr>
        <td> <?php echo CHtml::label('Video Thumbnail', 'videothumbnail'); ?> </td>
        <td> <?php echo CHtml::dropDownList('videothumbnail', NULL, array('Select Thumbnail')); ?> </td>
      </tr>
      <tr>
        <td colspan="2"> <?php echo CHtml::submitButton('Add'); ?> </td>
      </tr>
    </table>
    <?php echo CHtml::endForm(); ?>
  </div>
  <div id="focustab-2">
    <?php
    echo CHtml::beginForm('', 'post', array(
        'id' => 'liveEventForm',
        'name' => 'liveEventForm',
        'enctype' => 'multipart/form-data'
    ));
    ?>
    <table id="vidioDemandTbl">
      <caption>Live Event</caption>
      <tr>
        <td> 
          <?php
          echo CHtml::label('Name of Event', 'eventName');
          echo CHtml::hiddenField('focustype', 'live event');
          ?> 
        </td>
        <td> <?php echo CHtml::textField('eventName'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Video Description', 'eventVideoDetails'); ?> </td>
        <td> <?php echo CHtml::textArea('eventVideoDetails'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Video URL', 'videoUrl'); ?> </td>
        <td> <?php echo CHtml::textField('videoUrl'); ?> </td>
      </tr>
	   <tr>
        <td> <?php echo CHtml::label('IPad URL', 'videoUrl'); ?> </td>
        <td> <?php echo CHtml::textField('ipadUrl'); ?> </td>
      </tr>
	  <tr>
        <td> <?php echo CHtml::label('Event URL', 'eventUrl'); ?> </td>
        <td> <?php echo CHtml::textField('eventUrl'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Event Big Image', 'eventImage'); ?> </td>
        <td> <?php echo CHtml::fileField('eventImage'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Event Thumbnail', 'eventThumb'); ?> </td>
        <td> <?php echo CHtml::fileField('eventThumb'); ?> </td>
      </tr>
      <tr>
        <td colspan="2"> <?php echo CHtml::submitButton('Add'); ?> </td>
      </tr>
    </table>
    <?php echo CHtml::endForm(); ?>
  </div>
  <div id="focustab-3">
    <?php echo CHtml::beginForm('', 'post', array('id' => 'artistArtForm', 'name' => 'artistArtForm')); ?>
    <table id="vidioDemandTbl">
      <caption>Artist or Artwork</caption>
      <tr>
        <td><?php echo CHtml::label('Artist Name', 'artistName_art'); ?></td>
        <td>
          <?php
          echo CHtml::hiddenField('artistName_art');
          $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
              'name' => 'artistName_artAuto',
              'attribute' => 'ARTIST_NAME',
              //'value' => $model1->isNewRecord ? '': $model1->CONTENT_TITLE,
              'source' => $this->createUrl('Topartists/autocompleteTest'),
              'options' => array(
                  'showAnim' => 'fold',
                  'select' => "js:function( event, ui ) {
                  //$('#label').val(ui.item.label);
                  //$('#code').val(ui.item.code);
                  //$('#call_code').val(ui.item.call_code);
                  $('#artistName_art').val(ui.item.id);
                  getArtistArt(ui.item.id);
                }"
              ),
          ));
          ?>
        </td>
      </tr>

      <tr>
        <td>Artist Description</td>
        <td> <?php echo CHtml::textArea('artistArtDetails'); ?> </td>
      </tr>
      <tr>
        <td> <?php echo CHtml::label('Video List', 'videoList'); ?> </td>
        <td> <?php echo CHtml::dropDownList('videoList', NULL, array('Select a Video')); ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">  <?php echo CHtml::submitButton('Add'); ?> </td>
      </tr>
    </table>
    <?php echo CHtml::endForm(); ?>
  </div>
</div>

<div id="focusList">
  <h2>Added Focus List</h2>
  <ul id="sortable">
    <?php foreach ($model as $key => $value) { ?>
      <?php
      $artistname = Yii::app()->db2->createCommand()
              ->select('ARTIST_TITLE')
              ->from('TBL_ARTIST_DETAILS')
              ->where('ARTIST_ID = :id', array(':id' => $value->ARTIST_ID))
              ->queryScalar();
      ?>
      <li class="ui-state-default" id="<?php echo $value->ID ?>"><span><?php echo $value->ARTIST_NAME . '(' . $value->TYPE . ')'; ?></span><a title="<?php echo $value->ID ?>" href="#" class="del">Delete</a></li>
    <?php } ?>
  </ul>

  <input type="button" value="Update Order" id="updateOrder" />
</div>

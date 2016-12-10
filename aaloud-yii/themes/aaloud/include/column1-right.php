

<?php 
$result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_banner_storefront bs')
				 ->join('tbl_aa_banner_location_master blm','bs.LOCATION_ID=blm.LOCATION_ID')
				 ->where('bs.BANNER_STATUS=:status and blm.LOCATION_ID=:id',array(':status'=>1,':id'=>$this->locationright))
				 ->queryAll();
				 
				
?>

<?php if(isset($result[0]['BANNER_TEXT'])) { ?>
<div class="side-in mt10">
<a href ="<?php echo $result[0]['BANNER_REDIRECT_URL']; ?>"><?php echo $result[0]['BANNER_TEXT']; ?></a>
</div>

<?php } else { ?>
<div class="side-in mt10">
<img alt="banner" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/300-banner.gif">
</div>

<?php } ?>
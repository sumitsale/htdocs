<?php 
$result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_banner_storefront bs')
				 ->join('tbl_aa_banner_location_master blm','bs.LOCATION_ID=blm.LOCATION_ID')
				 ->where('bs.BANNER_STATUS=:status and blm.LOCATION_ID=:id',array(':status'=>1,':id'=>$this->location))
				 ->queryAll();
				
?>

<?php if(isset($result[0]['BANNER_TEXT'])) { ?>
<div class="down-image mt5"> 
<a href ="<?php echo $result[0]['BANNER_REDIRECT_URL']; ?>"><?php echo $result[0]['BANNER_TEXT']; ?></a>
</div>

<?php } else { ?>
<div class="down-image mt5"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/01_01_ArtistAloud_Homepage_FocusArea1.gif" alt=""> </div>

<?php } ?>
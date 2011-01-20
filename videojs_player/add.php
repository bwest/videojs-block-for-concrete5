<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));

$bObj=$controller;
$includeAssetLibrary = true;
$al = Loader::helper('concrete/asset_library');
?>


<div class="ccm-block-field-group">
	<div style="clear:both;">
		<div style="float:left;margin:10px">
			<h2><?php echo t("H.264 Video File")?></h2>
			<?php echo $al->file('ccm-b-mp4-file', 'mID', t('Choose .mp4 Video File') );?>
		</div>		
		<div style="float:right;width:40%;padding-top:15px">
			<?php  $this->inc('form_setup_html.php'); ?>
		</div>
	</div>
	
	<div width="400px" style="clear:both;">&nbsp;</div>
	<div>
		<div>
			<div style="float:left;width:175px;margin:5px;">
				<h2><?php echo t("Webm Video File")?></h2>
				<?php echo $al->file('ccm-b-webm-file', 'wID', t('Choose .webm Video File') );?>
			</div>
			<div style="float:right;width:175px;margin:5px;">
				<h2><?php echo t("OGG Video File")?></h2>
				<?php echo $al->file('ccm-b-ogg-file', 'oID', t('Choose .ogv Video File') );?>
			</div>
			<div width="400px" style="clear:both">&nbsp;</div>
		</div>
	</div>
</div>
<div class="ccm-block-field-group">
	<div style="float:left;width:175px;margin:5px;">
		<h2><?php echo t("Video Subtitle File")?></h2>
		<?php echo $al->file('ccm-b-subtitle-file', 'sID', t('Choose .srt Subtitle File (if any)') );?>
	</div>
	<div style="float:right;width:175px;margin:5px;">
		<h2><?php echo t("Video Poster File")?></h2>
		<?php echo $al->file('ccm-b-poster-file', 'pID', t('Choose .png Poster File') );?>
	</div>
	<div width="400px" style="clear:both;">&nbsp;</div>
</div>
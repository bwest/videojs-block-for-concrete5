<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

// now that we're in the specialized content file for this block type, 
// we'll include this block type's class, and pass the block to it, and get
// the content	

$mp4 = $controller->getMp4Object();
$webm = $controller->getWebmObject();
$ogg = $controller->getOggObject();
$poster = $controller->getPosterObject();
$subtitle = $controller->getSubtitleObject();

$rel_mp4_path = $mp4->getRelativePath();
$rel_webm_path = $webm->getRelativePath();
$rel_ogg_path = $ogg->getRelativePath();
$full_mp4_path = $mp4->getUrl();
$rel_poster_path = $poster->getRelativePath();
$rel_subtitle_path = $subtitle->getRelativePath();

?>
<div style="text-align:center;">

<?php 
$c = Page::getCurrentPage();
$vWidth=intval($controller->width);
$vHeight=intval($controller->height);
if ($c->isEditMode()) { ?>
	<div class="ccm-edit-mode-disabled-item">
		<div style="padding:8px 0px; padding-top: <?php echo round($vHeight/2)-10?>px;"><?php echo t('Content disabled in edit mode.')?></div>
	</div>
<?php  }else{ ?>
<!-- Begin VideoJS -->
  <div class="video-js-box">
    <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
    <video id="example_video_<?php echo $bID ?>" class="video-js" width="<?php echo $vWidth ?>" height="<?php echo $vHeight ?>" controls="controls" preload="auto" poster="<?php echo $rel_poster_path ?>">
	<?php if ($mID >0) { ?>
      <source src="<?php echo $rel_mp4_path ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
	<?php } if ($wID > 0) { ?>
      <source src="<?php echo $rel_webm_path ?>" type='video/webm; codecs="vp8, vorbis"' />
	<?php } if ($oID > 0) { ?>
      <source src="<?php echo $rel_ogg_path ?>" type='video/ogg; codecs="theora, vorbis"' />
	<?php } if ($sID > 0) { ?>
		<track kind="subtitles" src="<?php echo $rel_subtitle_path ?>" srclang="en-US" label="English"></track>
	<?php } ?>
	
      <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
      <object id="flash_fallback_<?php echo $bID ?>" class="vjs-flash-fallback" width="<?php echo $vWidth ?>" height="<?php echo $vHeight ?>" type="application/x-shockwave-flash"
        data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
        <param name="allowfullscreen" value="true" />
        <param name="flashvars" value='config={"playlist":["<?php echo $rel_poster_path ?>", {"url": "<?php echo $full_mp4_path ?>","autoPlay":false,"autoBuffering":true}]}' />
        <!-- Image Fallback. Typically the same as the poster image. -->
        <img src="<?php echo $rel_poster_path ?>" width="<?php echo $vWidth ?>" height="<?php echo $vHeight ?>" alt="Poster Image"
          title="No video playback capabilities." />
      </object>
    </video>
    <!-- Download links provided for devices that can't play video in the browser. -->
    <p class="vjs-no-video"><strong>Download Video:</strong>
	<?php if ($mID >0) { ?>	
      <a href="<?php echo $rel_mp4_path ?>">MP4</a>,
	<?php } if ($wID > 0) { ?>
      <a href="<?php echo $rel_webm_path ?>">WebM</a>,
	<?php } if ($oID > 0) { ?>
      <a href="<?php echo $rel_ogg_path ?>">Ogg</a>
	<?php } ?>
	<br>
      <!-- Support VideoJS by keeping this link. -->
      <a href="http://videojs.com">HTML5 Video Player</a> by VideoJS
    </p>
  </div>
  <!-- End VideoJS -->
	
<?php  } ?>
</div>
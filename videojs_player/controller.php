<?php 
	/*
	 * Functions for embedding video in your page with the VideoJS open source HTML5 video player.
	 * @author Brandon West	<markedmonkey@gmail.com>
	 *
	 * Adapted from the 'video' block originally developed by:
	 * @author Tony Trupp <tony@concrete5.org>
	 * @author Remo Laubacher <remo.laubacher@gmail.com>
	 * @author Andrew Embler <andrew@concrete5.org>
	 */
	 
	Loader::block('library_file');	
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class VideojsPlayerBlockController extends BlockController {
 
		protected $btInterfaceWidth = 400;
		protected $btInterfaceHeight = 400;
		protected $btTable = 'btVideoJS';
		
		public $width  = '';
		public $height = '';
		public $mID = 0;
		public $wID = 0;
		public $oID = 0;
		public $pID = 0;
		public $sID = 0;
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Embeds uploaded video into a web page using the VideoJS HTML5 player with forced fallback to Flash (even when there is an unsupported source). Supports H.264, WebM and OGG formats.");
		}
		
		public function getBlockTypeName() {
			return t("VideoJS Player");
		}

		public function getJavaScriptStrings() {
			return array('flv-required' => t('You must select a valid FLV file.'));
		}

		function getMp4ID() {return $this->mID;}
		function getMp4Object() {
			return File::getByID($this->mID);
		}
		
		function getWebmID() {return $this->wID;}
		function getWebmObject() {
			return File::getByID($this->wID);
		}
		
		function getOggID() {return $this->oID;}
		function getOggObject() {
			return File::getByID($this->oID);
		}
		
		function getPosterID() {return $this->pID;}
		function getPosterObject() {
			return File::getByID($this->pID);
		}
		
		function getSubtitleID() {return $this->sID;}
		function getSubtitleObject() {
			return File::getByID($this->sID);
		}

		function save($data) {
			$args['application_ID']	= isset($data['application_ID']);
			$args['mID']    = intval($data['mID']);
			$args['wID']	= intval($data['wID']);
			$args['oID']	= intval($data['oID']);
			$args['pID']	= intval($data['pID']);
			$args['sID']	= intval($data['sID']);
			$args['width']  = (intval($data['width'])>0)  ? intval($data['width'])  : 425;
			$args['height'] = (intval($data['height'])>0) ? intval($data['height']) : 334;		
			
			parent::save($args);
		}				

		public function on_page_view() {
			$html = Loader::helper('html');
            $b = $this->getBlockObject();
            $bv = new BlockView();
            $bv->setBlockObject($b);
            $jsPath =  $bv->getBlockPath().'/videojs.js';
			$cssPath = $bv->getBlockPath().'/video-js.css';
            if(file_exists($jsPath)) {
               $jsTag = $html->javascript($bv->getBlockURL().'/videojs.js');
               $this->addHeaderItem($jsTag);           
            } 
			if(file_exists($cssPath)) {
				$cssTag = $html->css($bv->getBlockURL().'/video-js.css');
				$this->addHeaderItem($cssTag);
			}
			$this->addHeaderItem('	<script type="text/javascript" charset="utf-8">
    // Add VideoJS to all video tags on the page when the DOM is ready
    VideoJS.setupAllWhenReady();
	function clearText(thefield){
		if (thefield.defaultValue==thefield.value)
		thefield.value = ""
	} 
	function defaultText(thefield){
		if (thefield.value=="")
		thefield.value = thefield.defaultValue
	}
  </script>');
		}
			
	}

?>

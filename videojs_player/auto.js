ccm_chooseAsset = function(obj) {
	poster = getByID(obj.pID);
	ccm_triggerSelectFile(poster);
	if (obj.width) {
		$("#ccm-block-video-width").val(obj.width);
	}
	if (obj.height) {
		$("#ccm-block-video-height").val(obj.width);
	}
}
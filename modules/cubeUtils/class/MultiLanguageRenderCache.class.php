<?php
require_once XOOPS_ROOT_PATH . "/modules/stdCache/kernel/StdRenderCache.class.php";
class MultiLanguageRenderCache extends StdRenderCache
{
	function MultiLanguageRenderCache()
	{
		parent::StdRenderCache();
	}

    function getCacheId()
    {
		$root =& XCube_Root::getSingleton();
		$language = $root->mLanguageManager->getLanguage();

    	return md5($this->mResourceName . $language . implode("_", $this->mGroupIds));
    }
}
?>

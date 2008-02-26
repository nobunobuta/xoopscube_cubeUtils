<?php
if (!defined('XOOPS_ROOT_PATH')) exit();
include_once XOOPS_ROOT_PATH . '/modules/cubeUtils/class/MultiLanguage.class.php';
class MultiLanguagePreLoad extends XCube_ActionFilter
{
    function preFilter()
    {
        if (file_exists(XOOPS_ROOT_PATH.'/modules/cubeUtils/class/MultiLanguage.class.php')) {
            $mlang =& new MultiLanguage();
            $this->mController->mGetLanguageName->add(array(&$mlang, 'getLanguageName'),XCUBE_DELEGATE_PRIORITY_FINAL);
        }

        if (file_exists(XOOPS_ROOT_PATH.'/modules/cubeUtils/class/MultiLanguageRenderCache.class.php')) {
            $siteConfig['Cube']['CacheSystem.path'] =  '/modules/cubeUtils/class/';
            $siteConfig['Cube']['CacheSystem.class'] = 'MultiLanguageRenderCache';
            $this->mController->mRoot->overrideSiteConfig($siteConfig);
        }
    }
}
?>

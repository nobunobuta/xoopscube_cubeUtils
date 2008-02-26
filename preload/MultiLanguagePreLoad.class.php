<?php
if (!defined('XOOPS_ROOT_PATH')) exit();
@include_once XOOPS_ROOT_PATH . '/modules/cubeUtils/class/MultiLanguage.class.php';
class MultiLanguagePreLoad extends XCube_ActionFilter
{
    function preFilter()
    {
        if (file_exists(XOOPS_ROOT_PATH.'/modules/cubeUtils/class/MultiLanguage.class.php')) {
            $cubeUtilMlang =& new MultiLanguage();
            $this->mController->mGetLanguageName->add(array(&$cubeUtilMlang, 'getLanguageName'),XCUBE_DELEGATE_PRIORITY_FINAL);
            $GLOBALS['cubeUtilMlang'] =& $cubeUtilMlang;
        }
        // Change Cache handling for XoopsCube 2.1 Alpha4
        $currentConfig = $this->mController->mRoot->getSiteConfig('Cube','CacheSystem.path');
        if (!empty($currentConfig) && file_exists(XOOPS_ROOT_PATH.'/modules/cubeUtils/class/MultiLanguageRenderCache.class.php')) {
            $siteConfig['Cube']['CacheSystem.path'] =  '/modules/cubeUtils/class/';
            $siteConfig['Cube']['CacheSystem.class'] = 'MultiLanguageRenderCache';
            $this->mController->mRoot->overrideSiteConfig($siteConfig);
        }
    }
    function preBlockFilter()
    {
        // Change Cache handling for XoopsCube 2.1 Alpha5
        if (method_exists($this->mController, 'getModuleCacheFilePath')) {
            $this->mController->mCheckEnableBlockCache->add(array(&$this, 'addLanguageAsIdentity'), XCUBE_DELEGATE_PRIORITY_FIRST + 20);
            $this->mController->mCheckEnableModuleCache->add(array(&$this, 'addLanguageAsIdentity'), XCUBE_DELEGATE_PRIORITY_FIRST + 20);
        }
    }

    function addLanguageAsIdentity(&$cacheInfo)
    {   
        $language = $this->mController->mRoot->mLanguageManager->getLanguage();
        $cacheInfo->mIdentityArr[] = "Module_cubeUtils_Language:".$language;
    }
}
?>

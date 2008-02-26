<?php
require_once '../../mainfile.php';
$xoopsOption['template_main'] = 'cubeUtils_userform.html';
require_once XOOPS_ROOT_PATH.'/header.php';

// If user is registered user, kick him to own page.
if($xoopsUser) {
	header('Location: '.XOOPS_MODULE_URL.'/user/index.php?action=UserInfo&uid='.$xoopsUser->getVar('uid'));
	exit();
}


if (isset($_COOKIE[$xoopsConfig['usercookie']])) {
    $xoopsTpl->assign('usercookie', $_COOKIE[$xoopsConfig['usercookie']]);
}
if (isset($_GET['xoops_redirect'])) {
    $xoopsTpl->assign('xoops_redirect', htmlspecialchars(trim($_GET['xoops_redirect']), ENT_QUOTES));
}
$config_handler =& xoops_gethandler('config');
$xoopsConfigUser =& $config_handler->getConfigsByDirname('user');
$xoopsTpl->assign('allow_register', $xoopsConfigUser['allow_register']);

require_once XOOPS_ROOT_PATH.'/footer.php';
?>

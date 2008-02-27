<?php
/**
 *
 * @package CubeUtils
 * @version $Id: xoops_version.php 1294 2008-01-31 05:32:20Z nobunobu $
 * @copyright Copyright 2006-2008 NobuNobuXOOPS Project <http://sourceforge.net/projects/nobunobuxoops/>
 * @author NobuNobu <nobunobu@nobunobu.com>
 * @license http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

require_once '../../mainfile.php';
$xoopsOption['template_main'] = 'cubeUtils_userform.html';
require_once XOOPS_ROOT_PATH.'/header.php';

// If user is registered user, kick him to own page.
if($xoopsUser) {
	header('Location: '.XOOPS_MODULE_URL.'/user/index.php?action=UserInfo&uid='.$xoopsUser->getVar('uid'));
	exit();
}

$config_handler =& xoops_gethandler('config');
$xoopsConfigUser =& $config_handler->getConfigsByDirname('user');

if (@isset($_COOKIE[$xoopsConfigUser['usercookie']])) {
    $xoopsTpl->assign('usercookie', $_COOKIE[$xoopsConfigUser['usercookie']]);
}
if (isset($_GET['xoops_redirect'])) {
    $xoopsTpl->assign('xoops_redirect', htmlspecialchars(trim($_GET['xoops_redirect']), ENT_QUOTES));
}

$xoopsTpl->assign('allow_register', $xoopsConfigUser['allow_register']);

require_once XOOPS_ROOT_PATH.'/footer.php';
?>

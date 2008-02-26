<?php
if(!defined('XOOPS_ROOT_PATH')) exit ;
$mydirname = basename(dirname( __FILE__ )) ;

$modversion['name'] = $mydirname;
$modversion['version'] = '0.4';
$modversion['description'] = 'XOOPS Cube 2.1 Utilities';
$modversion['credits'] = 'NobuNobu';
$modversion['author'] = 'http://www.nobunobu.com/';
$modversion['help'] = '';
$modversion['license'] = 'GPL';
$modversion['official'] = 0;
$modversion['image'] = 'images/cubeUtils.png';
$modversion['dirname'] = $mydirname;

$modversion['cube_style'] = true;

// Installer
$modversion['installer']['image'] = "images/normal_ob_wrench1.jpg";
$modversion['installer']['description'][] = _MI_CUBE_UTILS_DESC_INSTALLER1;
$modversion['installer']['description'][] = _MI_CUBE_UTILS_DESC_INSTALLER2;
$modversion['installer']['description'][] = _MI_CUBE_UTILS_DESC_INSTALLER3;
$modversion['installer']['description'][] = _MI_CUBE_UTILS_DESC_INSTALLER4;
$modversion['installer']['licence']['title'] = _MI_CUBE_UTILS_LANG_GPL;
$modversion['installer']['licence']['file'] = "licence.txt";

//$modversion['onInstall'] = 'include/on_install.php';

$modversion['hasMain'] = 1;
$modversion['read_any'] = true;

// Templates
$modversion['templates'][1]['file'] = 'cubeUtils_userform.html';
$modversion['templates'][1]['description'] = 'Auto Logon Form';

//Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
$modversion['hasconfig'] = 1;
$modversion['config'][1] = array(
	'name'			=> 'cubeUtils_use_autologin' ,
	'title'			=> '_MI_CUBE_UTILS_CFG1_MSG' ,
	'description'	=> '_MI_CUBE_UTILS_CFG1_DESC' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 1 ,
);
$modversion['config'][2] = array(
	'name'			=> 'cubeUtils_login_lifetime' ,
	'title'			=> '_MI_CUBE_UTILS_CFG2_MSG' ,
	'description'	=> '_MI_CUBE_UTILS_CFG2_DESC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'int' ,
	'default'		=> 240 ,
);

// Blocks
$modversion['blocks'][1]['file'] = 'cubeUtils_login.php';
$modversion['blocks'][1]['name'] = _MI_CUBE_UTILS_BNAME1;
$modversion['blocks'][1]['description'] = 'Shows login block';
$modversion['blocks'][1]['show_func'] = 'b_cubeUtils_login_show';
$modversion['blocks'][1]['template'] = 'cubeUtils_block_login.html';
$modversion['blocks'][1]['visible_any'] = true;
$modversion['blocks'][1]['show_all_module'] = true;
// Blocks
$modversion['blocks'][2]['file'] = 'cubeUtils_langsel.php';
$modversion['blocks'][2]['name'] = _MI_CUBE_UTILS_BNAME2;
$modversion['blocks'][2]['description'] = 'Shows Select Language';
$modversion['blocks'][2]['show_func'] = 'b_cubeUtils_langsel_show';
$modversion['blocks'][2]['show_all_module'] = true;
?>

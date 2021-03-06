<?php

/**
 * 该页仅用于检测用户登录的情况，如要手工更改系统配置，请更改common.inc.php
 *
 * @version        $Id: config.php 1 9:43 2010年7月8日Z tianya $
 * @package        DedeBIZ.Dialog
 * @copyright      Copyright (c) 2021, DedeBIZ.COM
 * @license        https://www.dedebiz.com/license
 * @link           https://www.dedebiz.com
 */
require_once(dirname(__FILE__) . "/../../include/common.inc.php");
require_once(DEDEINC . "/userlogin.class.php");

//获得当前脚本名称，如果你的系统被禁用了$_SERVER变量，请自行更改这个选项
$dedeNowurl   =  '';
$s_scriptName = '';
$isUrlOpen = @ini_get('allow_url_fopen');

$dedeNowurl = GetCurUrl();
$dedeNowurls = explode("?", $dedeNowurl);
$s_scriptName = $dedeNowurls[0];


//检验用户登录状态
$cuserLogin = new userLogin();

if ($cuserLogin->getUserID() <= 0) {
    if (empty($adminDirHand)) {
        ShowMsg("<b>提示：需输入后台管理目录才能登录</b><br /><form>请输入后台管理目录名：<input type='hidden' name='gotopage' value='" . urlencode($dedeNowurl) . "' /><input type='text' name='adminDirHand' value='dede' style='width:120px;' /><input style='width:80px;' type='submit' name='sbt' value='转入登录' /></form>", "javascript:;");
        exit();
    }
    $adminDirHand = HtmlReplace($adminDirHand, 1);
    $gurl = "../../{$adminDirHand}/login.php?gotopage=" . urlencode($dedeNowurl);
    echo "<script language='javascript'>location='$gurl';</script>";
    exit();
}

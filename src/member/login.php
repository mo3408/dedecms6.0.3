<?php

/**
 * @version        $Id: login.php 1 8:38 2010年7月9日Z tianya $
 * @package        DedeBIZ.Member
 * @copyright      Copyright (c) 2021, DedeBIZ.COM
 * @license        https://www.dedebiz.com/license
 * @link           https://www.dedebiz.com
 */
require_once(dirname(__FILE__) . "/config.php");
$gourl = RemoveXSS($gourl);
if ($cfg_ml->IsLogin()) {
    ShowMsg('你已经登录系统，无需重新注册！', 'index.php');
    exit();
}
require_once(dirname(__FILE__) . "/templets/login.htm");

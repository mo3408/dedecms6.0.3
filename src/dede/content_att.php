<?php

/**
 * 内容属性
 *
 * @version        $Id: content_att.php 1 14:31 2010年7月12日Z tianya $
 * @package        DedeBIZ.Administrator
 * @copyright      Copyright (c) 2021, DedeBIZ.COM
 * @license        https://www.dedebiz.com/license
 * @link           https://www.dedebiz.com
 */
require_once(dirname(__FILE__) . "/config.php");
CheckPurview('sys_Att');
if (empty($dopost)) $dopost = '';

//保存更改
if ($dopost == "save") {
    $startID = 1;
    $endID = $idend;
    for (; $startID <= $endID; $startID++) {
        $att = ${'att_' . $startID};
        $attname = ${'attname_' . $startID};
        $sortid = ${'sortid_' . $startID};
        $query = "UPDATE `#@__arcatt` SET `attname`='$attname',`sortid`='$sortid' WHERE att='$att' ";
        $dsql->ExecuteNoneQuery($query);
    }
    echo "<script> alert('成功更新自定文档义属性表！'); </script>";
}

include DedeInclude('templets/content_att.htm');

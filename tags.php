<?php
/**
 * @version        $Id: tags.php 1 2010-06-30 11:43:09Z yndxw$
 * @package        yndxw.Site
 * @copyright      Copyright (c) 2018 - 2028, yndxw, Inc.
 * @license        http://help.yndxw.com/usersguide/license.html
 * @link           http://www.yndxw.com
 */
require_once (dirname(__FILE__) . "/include/common.inc.php");
require_once (DEDEINC . "/arc.taglist.class.php");
$PageNo = 1;

if(isset($_SERVER['QUERY_STRING']))
{
    $tag = trim($_SERVER['QUERY_STRING']);
    $tags = explode('/', $tag);
    if(isset($tags[1])) $tag = $tags[1];
    if(isset($tags[2])) $PageNo = intval($tags[2]);
}
else
{
    $tag = '';
}

$tag = FilterSearch(urldecode($tag));
if($tag != addslashes($tag)) $tag = '';
if($tag == '') $dlist = new TagList($tag, 'tag.htm');
else $dlist = new TagList($tag, 'taglist.htm');
$dlist->Display();
exit();
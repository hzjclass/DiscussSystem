<?php
# Discuss System Core Functions Files
# 2013.3.16

if(!defined('SAFE_INCLUDE'))
die('Hacking attempt!');

function strip_magic_quotes($arr)
{
	foreach ($arr as $k => $v)
	{
		if (is_array($v))
		{
			$arr[$k] = strip_magic_quotes($v);
		} else {
			$arr[$k] = stripslashes($v);
		}
	}
	return $arr;
}

?>
<?php
//////////////////////////////////////////////////////
// include incfunctions, sqlfunctions, config
//
/////////////////////////////////////////////////////


if(file_exists(ABSPATH."include/incfunctions.php")){
	//include the filter
	require_once(ABSPATH."include/incfunctions.php");
}
else die("file incfunctions.php not found");
if(file_exists(ABSPATH."include/sqlfunctions.php")){
	//include the db helper
	require_once(ABSPATH."include/sqlfunctions.php");
}else die("file sqlfunctions.php not found");
if(file_exists(ABSPATH."include/config.php")){
	//include the config
	require_once(ABSPATH."include/config.php");
}else die("file config.php not found");
?>
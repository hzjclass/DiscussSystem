<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
// Display all the courses
// There are three kinds of authority
// 1. Common users(ucommon) can comment on courses and leave comments, they can only read the courses 
// information
//
// 2. Group leader(uleader) can release a course,modify courses released by himself
// 
// 3. Administrator(uadmin) has the authority to delete, modify and release courses.
//////////////////////////////////////////////////////////////////////////////////////////////////////


define( 'ABSPATH', dirname(__FILE__) . '/' );

require_once(ABSPATH."load.php");

//
function show_course_list($auth, $each_num, $course_info){
	for($i = 0; $i < $each_num; $i++){
		
	}
	switch($auth){
		case "ucommon":
			
		case "uleader":
		case "uadmin":
	}
		
	
}
	//connect db
	dbconn();
	$query = "select * from course";
	$result = mysql_query($query);
	$num = mysql_num_fields($result);

?>
<?php
// DiscussSystem
// display all the courses in this page
// There are three kinds of authority
// 1. Common users(ucommon) can comment on courses and leave comments, they can only read the courses 
// information
//
// 2. Group leader(uleader) can release a course,modify courses released by himself
// 
// 3. Administrator(uadmin) has the authority to delete, modify and release courses.
//
// by nearu 2013.3.28


define( 'ABSPATH', dirname(__FILE__) . '/' );


require_once(ABSPATH."load.php");

// show course list
// $auth    :the authority of user
// $each_num:how many items listed in one page
// $result  :db query result of table course
function show_course_list($auth = 'ucommon', $each_num, $result){
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" charset="utf-8">
	<header>
		<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery-1.9.0.min.js" ></script>
		<script type="text/javascript" src="js/jquery-ui.custom.js" ></script>
		<style>
		table{
			width:100%;
			border-collapse: collapse;
			font-size:20	px;
		}
		.th{
			background:#6622ff;
		}
		a:hover{
			color:#ff0000;
		}
		a{
			text-decoration: none;
		}
		.curIndex{
			text-decoration: underline;
		}
		li{
		   float:left;
		}
		</style>
	</header>
	<table frame="void" border="1">
		<tr class="ui-state-highlight">
			<th class = "th">序号</th>
			<th class = "th">标题</th>
			<th class = "th">课程简介</th>
			<th class = "th">选项</th>
		</tr>
	
	<?php
	
	$course_info = mysql_fetch_array($result,MYSQL_BOTH);
	for($i = 1; $i <= $each_num && is_array($course_info); $i++,$course_info=mysql_fetch_array($result,MYSQL_BOTH)){
	if($i % 2 == 1){
	?><tr class="ui-state-highlight"  style="background:#ccffee" align= center><?php
	}
	else{
	?><tr class="ui-state-highlight"  style="background:#ffffff" align= center><?php
	}
	?>
	
	 
	 <td><?php echo $i?></td>
	 <td><?php echo $course_info["c_name"]?></td>
	 <td><div align = "left"> 
	<?php echo $course_info["c_intro"];?>
	</div> 
	 </td>
	 <td>
	 <div>
	<?php
		switch($auth){
			case "ucommon":
				?><a href="">详细</a><?php
				break;
			case "uleader":
				?><a href="">详细</a>&nbsp<a href="">编辑</a><?php
				break;
			case "uadmin":
				?><a href="">详细</a>&nbsp<a href="">编辑</a>&nbsp<a href="">删除</a><?php
				break;
				?></div></td> </tr><?php
			}
		}
		?>
		</table>
		<?php
}

// show the index of this page
// default current index = 1
?>
<div class="show_index" align="center">
<ul>
<?php
function show_index($total_num = 10, $each_num,$curIndex){
	$max_index = ceil($total_num / $each_num); 
	for($i = 1; $i <= $max_index; $i++){
		if($i == $curIndex){
			echo "<li><a class = 'curIndex' href='#?nid=".$i."'><span><strong>".$i."</strong></span></a>&nbsp</li>"; 
		}	
		else echo "<li><a href='?nid=".$i."'><span>".$i."</span></a>&nbsp</li>"; 
	}
}
?>
</ul>
</div>
<?php
// main

// connect db
dbconn();
$nid = 1;
//for test
$auth = 'uadmin';
if(isset($_GET['nid'])){
	$nid = $_GET['nid'];
}
$each_num = 5;
$page_num_begin = $each_num*($nid-1);
$page_num_end = $page_num_begin+$each_num;
$query = "select * from course limit ".$page_num_begin.",".$page_num_end;
$result = mysql_query($query) or die($query);
$num = mysql_num_fields($result);
$num = 20;
show_course_list($auth, $each_num, $result);
show_index($num,$each_num,$nid);
?>
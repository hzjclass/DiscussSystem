<?php
//
// Display all the courses	
// There are three kinds of authority
// 1. Common users(ucommon) can comment on courses and leave comments, they can only read the courses 
// information
//
// 2. Group leader(uleader) can release a course,modify courses released by himself
// 
// 3. Administrator(uadmin) has the authority to delete, modify and release courses.
//


define( 'ABSPATH', dirname(__FILE__) . '/' );

require_once(ABSPATH."load.php");

//show course list
function show_course_list($auth, $each_num, $course_info){
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" charset="utf-8">
	<header>
		<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery-1.9.0.min.js" ></script>
		<script type="text/javascript" src="js/jquery-ui.custom.js" ></script>
		<style>
		table{
			width:70%;
			border-collapse: collapse;
			font-size:15px;
		}
		.th{
			background:#6622ee;
		}
		a:hover{
			color:#ff0000;
		}
		a{
			text-decoration: none;
		}
		</style>
	</header>
	<table class="ui-state-highlight" border="1">
		<tr>
			<th class = "th">序号</th>
			<th class = "th">标题</th>
			<th class = "th">课程简介</th>
			<th class = "th">选项</th>
		</tr>
	
	<?php
	$table='<tr align = "center">
					 <td><?php echo $i?></td>
					 <td><?php echo $course_info["c_title"]?></td>
					 <td> 
					 <div align = "left"><?php echo $course_info["c_intro"] ?></div> 
					 </td>';
		
		switch($auth){
			case "ucommon":
				for($i = 0; $i < $each_num; $i++){
					echo $table;
					?>
					 <td>
					  <div>
						<a href="">详细</a>
					  </div>
					 </td>
				 </tr>
				<?php
				}
				break;
			case "uleader":
				for($i = 0; $i < $each_num; $i++){
					echo $table;
					?>
					 <td>
					  <div>	<a href="">详细</a> <a href="">编辑</a>  </div>
					 </td>
				</tr>
					<?php
				}
				break;
			case "uadmin":
				for($i = 0; $i < $each_num; $i++){
					echo $table;?>
					 <td> 
					 <div>	<a href="">详细</a>  <a href="">编辑</a> <a href="">删除</a></div> 
					 </td>
				</tr>
					<?php
				}
		}
		?>
		</table>
		<?php
}
function show_index($total_num, $each_num){
	$index_num = ceil($total_num / $each_num);
	for($i = 1; $i <= $index_num; $i++){
		echo "<a href="">".$i"</a>&nbsp"; 
	}
	
}
	//connect db
	dbconn();
	$query = "select * from course";
	$result = mysql_query($query);
	$num = mysql_num_fields($result);

?>
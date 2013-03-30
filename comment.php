<?php
// comment on certain course
// by nearu 2013.3.29
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" charset="utf-8">
	<header>
		<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery-1.9.0.min.js" ></script>
		<script type="text/javascript" src="js/jquery-ui.custom.js" ></script>
	</header>
	<body>
<?php
function comment_course($course_name){
	

?>
	<div>
     <form action="comment.php?action='submit'" method="post">
	 <textarea  style="height:120px;width:50%" class="finput" id = "commentEntry" ></textarea>
	 验证码<input tyep = "text" id = "checkcode" >
	 <input type = "image" id = "checkimg" src = "checkcode.php"/>
	 <input type = "submit" vaule="发表评论" />
	</form>
	
	</div>
	</body>
<?php
}	
comment_course(null);
?>
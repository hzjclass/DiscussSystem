<?php
//生成验证码
 session_start();

	function random($number){
		$srcstr = "0123456789";
		$strs = "";
		for($i=0; $i<$number; $i++){
			$strs.= $srcstr[mt_rand(0,9)];
		}
		return $strs;
	}

	$check_str=random(4); //调用函数random()，随机生成4个字符串
	header("Content-Type:image/png");
	$_SESSION["code"] = $check_str;
				
	$width = 76; //验证码图片的宽度
	$height = 20; //验证码图片的高度
	$img = imagecreate($width, $height);
	
	$backcolor = imagecolorallocate($img, 255, 255, 255);
	$fontcolor = imagecolorallocate($img, 100, 150, 230);	//字体的颜色
	$pixcolor  = imagecolorallocate($img, 100, 230, 230);	//噪点的颜色
	  
	for($i=0; $i<500; $i++){
		imagesetpixel($img, mt_rand(0,$width), mt_rand(0,$height), $pixcolor);
	}
	
	imagerectangle($img, 0, 0, $width-1,$height-1, $fontcolor);
	imagestring($img, rand(1,5), rand(10,20), rand(5,10), $check_str, $fontcolor);
	imagepng($img);	
	imagedestroy($img);
	$_SESSION["code"] = $check_str;
?>

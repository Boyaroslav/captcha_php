
<DOCTYPE html>
<html>

<body>
<?
	if(array_key_exists('submit', $_POST)){
		submit();
	}
	function submit(){
		$value =  $_POST['answer'];
		
		if ($value == file_get_contents("buff.txt")){
			echo '100 баллов';
		}
		else {
			echo 'бот';
		}
	}
	putenv('GDFONTPATH=' . realpath('.'));
	$im = imagecreatetruecolor(150, 25);
	$font = imageloadfont('./teletext.gdf');
	$bg = imagecolorallocate($im,200,255,200);
	imagefilledrectangle($im, 0, 0, 200, 50, $bg);

	$ans = "";
	for ($i = 0; $i < 6; $i++){
		$buf = chr(rand(65, 90));
		$ans .= $buf;
		$r = rand(0, 100);
		$g = rand(0, 100);
		$b = rand(0, 100);
		$bg1 = imagecolorallocate($im, $r, $g, $b);
		imagestring($im, $font, $i * 10 + 20, rand(0, 10),  $buf, $bg1);
	}

	file_put_contents("buff.txt", $ans);



	imagepng($im, "buff.png");
	imagedestroy($im);


	echo "<img src=buff.png width='400px' height='100px'>";





?>
<form method="post">
<input type="text" id="check" name="answer"  value="введите итоговое изложение">
<input type="submit" name="submit" class="button" value="написал"></a>
</form>
</	body>
</html>

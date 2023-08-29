<?
	session_start();

	putenv('GDFONTPATH=' . realpath('.'));
	$im = imagecreatetruecolor(90, 30);
	$font = imageloadfont('./teletext.gdf');
	$font2 = imageloadfont('./latin.gdf');
	$font3 = imageloadfont('./nsw.gdf');
	$font4 = imageloadfont('./fbold.gdf');
	$farr = array($font, $font2, $font3, $font4);
	$bg = imagecolorallocate($im,200,255,200);
	imagefilledrectangle($im, 0, 0, 200, 50, $bg);

	$ans = $_SESSION['answer'];

	for ($i = 0; $i < 6; $i++){
		$r = rand(0, 100);
		$g = rand(0, 100);
		$b = rand(0, 100);
		$bg1 = imagecolorallocate($im, $r, $g, $b);
		imagestring($im, $farr[rand(0, 3)], $i * 10 + 20, rand(0, 10), $ans[$i],  $bg1);
	}


header('Content-Type: image/jpeg');

// Выводим изображение
imagejpeg($im);




?>

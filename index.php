<?
	session_start();
?>
<DOCTYPE html>
<html>
<body>
<?
	$show_captcha = 1;
	if(array_key_exists('submit', $_POST)){
		submit();
	}
	function submit(){
		$value =  $_POST['answer'];

		if ($value == $_SESSION["answer"]){
			$show_captcha = 0;
			echo '100 баллов';
			echo "<a href='next.html'><p>далее</p></a>";
		}
		else {
			echo 'А не бот ли ты?';
		}
	}
	if ($show_captcha){
		$ans = "";
		for ($i = 0; $i < 6; $i++){
			$buf = chr(rand(65, 90));
			$ans .= $buf;
		}


		$_SESSION['answer'] = $ans;

	}

?>
<form method="post">
<img src='getim.php' width='400px' height='100px'>
<br>
<input type="text" id="check" name="answer"  value="введите итоговое изложение">
<input type="submit" name="submit" class="button" value="написал"></a>
</form>
</body>
</html>

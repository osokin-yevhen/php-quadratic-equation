<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Решение онлайн</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body class="body">
<h1>Онлайн решение квадратных уравнений</h1>
<form method="POST"> <!-- контейнер формы с методом отправки на сервер POST -->
	<p class="p">Введите коэфициенты уравнения <span>ax<sup>2 </sup> + bx + c = 0</span></p>
	<input type="number" name="a" placeholder="Введите коэфициент a:" required> <!-- текстовое поле для ввода цифр, placeholder воспомагательный текст, required запрет на отправку пустых полей -->
	<input type="number" name="b" placeholder="Введите коэфициент b:" required>
	<input type="number" name="c" placeholder="Введите коэфициент c:" required> 
	<input type="submit" name="send" value="Рассчитать"> <!-- кнопка для отправки значений текстовых полей-->
	<?php
	if(isset($_POST["send"])) // условие которое проверяет была ли нажата кнопка с именем send. $_POST - глобальный массив хранящий значения формы
	{
		$a = $_POST["a"]; // инициализация переменых 
		$b = $_POST["b"];
		$c = $_POST["c"]; 
		$D = pow($b, 2) - 4 * $a * $c; // расчёт дискриминанта, где pow($b, 2) означает возведение в квадрат переменной $b
		if ($D !== NAN && is_null($D)) { // проверка на нечисловое значение и наличие результата null
			echo "<p><span>Ошибка ввода</span></p>"; // вывод результата в документе
		}
		elseif ($D < 0) 
		{
			echo "<p><span>Уравнение не имеет решения!</span></p>";
		}
		elseif ($D === 0) 
		{
			$x = -$_POST["b"] / (2 * $_POST["a"]); // расчёт корня уравнения
			echo "<p><span>Уравнение имеет один корень</span></p>";
			echo "<p><span>".round($x,3)."</span></p>"; // Округление результата round($x,3) с последующей контатенацией строк через оператор "."
		}
		elseif ($D > 0) 
		{
			$x1 = (-$_POST["b"] + sqrt($GLOBALS["D"])) / (2 * $_POST["a"]);
			$x2 = (-$_POST["b"] - sqrt($GLOBALS["D"])) / (2 * $_POST["a"]);
			echo "<p><span>Уравнение имеет два кореня</span></p>";
			echo "<p><span>".round($x1,3)."</span></p>";
			echo "<p><span>".round($x2,3)."</span></p>";
		}
		else { echo "<p><span>Ошибка ввода</span></p>";}	
	}
	?>
</form>
</body>
</html>
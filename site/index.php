<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Experiment</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<header>
		<div class="container">
			<div class="logo"></div>
			<div class="interface">
				<ul>
					<li><a href="Регистрация"></a></li>
				</ul>
			</div>
		</div>
	</header>


	<div class="wrapper">
		<div class="container">
			
			<div class="page" id="login">

				<div class="form">

					<!--  -->
					<label for="username">Введите логин:</label>
					<input type="text" name="username" value="">
					<label for="password">Введите пароль:</label>
					<input type="password" name="password">
					<div class="but">
						<span id="no_autorize" style="display: none;">Неверные данные</span>
						<button type="submit" name="log" onclick="



						{:
							autorize(
								(
									$("#login input[name=username]").val(),
									$("#login input[name=password]").val()
								),
								(
									false=#no_autorize.show;
									?=#index.show
								)
							)
						:}
						
						

						">Войти</button>

						<!-- <label for="register"><a href="dontno.php">Не помню данные для входа</a></label> -->
						<a href="register">Регистрация</a>
					</div>


				</div>


			</div>



			<div class="page" id="index" style="display: none;">
				INDEEEEX!!!!!!!
			</div>


		</div>
	</div>



	<footer>
		<div class="container">
			wdakdopwakopdkwapokd
		</div>
	</footer>

</body>
</html>
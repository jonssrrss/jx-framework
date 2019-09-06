<!-- <pre> -->
<?
		// СКАНИРУЕМ ДИРЕКТОРИЮ С САЙТОМ
		$dir = 'site/';
		$files = scandir($dir);
		\array_splice($files, 0, 2);
		// ФОРМИРУЕМ МАССИВ ИЗ html и php ФАЙЛОВ
		$i = 0;
		$html_files = array();
		foreach ($files as $key => $value) {
			if (
				(stristr($files[$key], '.html')) ||
				(stristr($files[$key], '.php'))
			) {
				$html_files[$i] = $files[$key];
				$i++;
			}
		}
		$page = array();
		foreach ($html_files as $key => $value) {
			$page[$value] = file_get_contents($dir.$value);
		}

		// ТЕПЕРЬ В $PAGE ИМЕЕТСЯ ВЕСЬ html - КОД В МАССИВЕ

		// СОЗДАЕМ ПЕРЕМЕННУЮ, КОТОРАЯ БУДЕТ ИМЕТЬ ВИД:
		/*

			$api = {
				"index.php" = {
					0 = "
						{: ... :}
					",
					1 = "
						{: ... :}
					",
					2 = "
						{: ... :}
					",
					3 = "
						{: ... :}
					"
				}
			}

		*/

		$api = array();

		foreach ($page as $key => $value) {
			$api[$key] = explode('{:', $value);
			\array_splice($api[$key], 0, 1);
			foreach ($api[$key] as $key_api => $value_api) {
				$api[$key][$key_api] = explode(":}", $value_api);
				\array_splice($api[$key][$key_api], 1, 1);
				// $api[$key][$key_api] = preg_replace('/\s+/', '', $api[$key][$key_api][0]);
				$api[$key][$key_api] = preg_replace('/[\t\r\n]+/', '', $api[$key][$key_api][0]);
				$api[$key][$key_api] = preg_replace('/ {2,}/',' ', $api[$key][$key_api]);
			}
		}


		$functionsArray = array();

		foreach ($api as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$functionsArray[$key][$key2]["name"] = explode('(', $value2)[0];
				$functionsArray[$key][$key2]["params"]["values"] = explode(',', explode(')', explode('(', $value2)[2])[0]);
				$accept = array();
				$accept_f = explode(';', explode(')', explode('(', $value2)[3])[0]);
				foreach ($accept_f as $keyAc => $valueAc) {
					$if = explode('=', $valueAc)[0];
					$accept[$if] = explode('=', $valueAc)[1];
				}
				$functionsArray[$key][$key2]["params"]["accept"] = $accept;
			}
		}

		// Теперь мы разбили строку с кодом на составляющие

		foreach ($functionsArray as $file => $funcs_num) {
			foreach ($funcs_num as $key => $function) {
				require('jx/classes/'.ucfirst($function["name"]).'.php');
				$class = new $function["name"];
				$class::init($function);
			}
		}



		echo "<pre style=\"border: 1px solid #ccc\">";
		var_dump($api);
		echo "</pre>";



	?>	
<!-- </pre> -->
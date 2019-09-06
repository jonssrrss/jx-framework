<?
	class Autorize {
		/*
			Перед тем, как пармаетр попадает в функцию - его формирует JX. попадает он в виде массива:
			
			$function = {
				"name" => "autorize",
				"params" => {
					"values" => {
						0 => "#login input[name=username]",
						1 => "#login input[name=password]"
					},
					"accept" => {
						"false" => "#no_autorize.show",
						"?" => "#index.show"
					}
				}
			}

		*/
		public static function init($function) {
			echo "<pre style=\"border: 1px solid #ccc; background-color: #eee; padding: 20px; border-radius: 15px;\">";
			echo "<h1 style=\"font-family: sans-serif;\">Авторизация</h1>\n";
			echo "<div style=\" padding: 20px; background-color: #c8c8c8; border-radius: 10px; font-size: 10px; width: fit-content;\">";
			var_dump($function);
			echo "</div>";
			echo "</pre>";
		}
	}
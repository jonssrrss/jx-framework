<?
	class register {
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
			echo "Регистрация";
			echo "<pre>";
			var_dump($function);
			echo "</pre>";
		}
	}
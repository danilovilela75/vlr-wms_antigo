<?php 

	class Manager extends Conexao {

		public function validaLogin($table, $usuario) {

			$pdo = parent::get_instance();

			$sql = "SELECT * FROM $table WHERE usuario = :usuario";

			$statement = $pdo->prepare($sql);
			$statement->bindValue(":usuario", $usuario);
			$statement->execute();

			return $statement->fetchAll();

		}

		public function listDados($table, $campo) {

			$pdo = parent::get_instance();

			$sql = "SELECT * FROM $table WHERE status != '0' ORDER BY $campo ASC";

			$statement = $pdo->prepare($sql);
			$statement->execute();

			return $statement->fetchAll();

		}

		public function AltDados($table, $data, $campo, $pegaid) {

			$pdo = parent::get_instance();

			$valores = "";
			foreach ($data as $key => $value) {
				$valores .= "$key=:$key, ";
			}
			$valores = substr($valores, 0, -2);

			$sql = "UPDATE $table SET $valores WHERE $campo = $pegaid";
			$statement = $pdo->prepare($sql);

			foreach ($data as $key => $value) {
				$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			}

			$statement->execute();

		}

	}

 ?>
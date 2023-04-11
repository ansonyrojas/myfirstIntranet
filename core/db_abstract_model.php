<?php





	abstract class DBAbstractModel{

				private static $db_host = 'localhost';
				private static $db_user = 'root';
				private static $db_pass = '20644880';
				protected $db_name = 'matricula_escolar';
				private $conn;
				protected $query;
				protected $rows = array();
				public $mensaje = 'Hecho';


				// abstract protected function get();
				// abstract protected function set();
				// abstract protected function edit();
				// abstract protected function delete();

				public function open_connection(){

					$this->conn = new mysqli(self::$db_host, self::$db_user,self::$db_pass, $this->db_name);

				}

				private function close_connection(){

						$this->conn->close();
				}

				protected function execute_single_query(){

						if($_POST){


						$this->open_connection();
						$this->conn->query($this->query);
						$this->close_connection();

					}else{

						$this->mensaje = 'Metodo no permitido';
					}
				}


				protected function get_results_from_query(){

					$this->open_connection();

					$result = $this->conn->query($this->query);

					while($this->rows[] = $result->fetch_assoc());

					$result->close();

					$this->close_connection();

					array_pop($this->rows);
				}






	}








?>

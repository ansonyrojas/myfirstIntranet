
<?php 

require_once('../core/db_abstract_model.php');

class Usuario extends DBAbstractModel{

	public $id;
	private $cedula;
	public $nombres;
	public $apellidos;
	public $contrasena;
	public $rol;
	public $email;



public function get($usuario_email=''){

				if ($usuario_email != ''){

				$this->query = " 

								SELECT id, cedula, email, nombres, apellidos, contrasena, rol, email
								FROM usuarios
								WHERE email = '$usuario_email'


				";

						$this->get_results_from_query();

				}


			if(count($this->rows) == 1){

					foreach($this->rows[0] as $propiedad => $valor){

									$this->$propiedad = $valor;


					}


					$this->mensaje = "usuario encontrado";
			}


			

}







}








?>	
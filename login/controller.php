<?php 
require_once('model.php');
require_once('view.php');




function handler(){

	
	$menssage = '';

		$uri = $_SERVER['REQUEST_URI'];
	
	

		$event = 'login';
		// Colocar verificacion de contraseña y correo para poder entrar al sistema
			if(strpos($uri, 'logueo') && !empty($_POST['email']) && !empty($_POST['contrasena'])){

				$obj = obj();
				$obj->get($_POST['email']);

			
				if($_POST['email'] == $obj->email && $_POST['contrasena'] == $obj->contrasena){
			    $event = 'home'; 

				}	

			}	

					

	
			
		 if(strpos($uri, 'alumnos')){

				$event = 'alumnos';					 	
					 	}

			if(strpos($uri, 'home')){

			$event = 'home';
		}
		

			switch($event){

					case 'login':

					render_dinamic_data('login');

					break;

					case 'home':

					session_start();
					

					$data = array();
					$obj = obj();
					$obj->get('ansonyrojas2015@gmail.com');

					// $_SESSION['usuario'];

					define( 'MAX_SESSION_TIEMPO', 5 * 60 );			
					 	

					if (isset($_SESSION['usuario']) && (time() - $_SESSION['usuario'] > MAX_SESSION_TIEMPO)) {
 					 		
							   session_unset();
							   session_destroy();
 							   header('Location: /matricula-escolar/salida/');

							}


						$_SESSION['usuario'] = time();


						    // update last activity time stamp
					

					$data = array('nombres' => $obj->nombres,
									'apellidos' => $obj->apellidos,
									'email' => $obj->email,
									'rol' => $obj->rol
									);
				
					render_dinamic_data('home', $data);

					

							

					 

					 
					


					break;

						case 'alumnos':

						session_start();


									define( 'MAX_SESSION_TIEMPO', 5 * 60 );			
					 	

					if (isset($_SESSION['usuario']) && (time() - $_SESSION['usuario'] > MAX_SESSION_TIEMPO)) {
 					 
  								session_unset();
  								session_destroy();  
								
 							   header('Location: /matricula-escolar/salida/');

							}



							$_SESSION['usuario'] = time();

					
							render_dinamic_data('alumnos');


					


						break;

					default:

					render_dinamic_data('home');


			}


			# Rol Como Administrador 

 
  if(!empty($_POST['email']) && !empty($_POST['contrasena']) && $event == 'login'){

					$obj = obj();

					$obj->get($_POST['email']);
				

					
						if($_POST['contrasena'] == $obj->contrasena && $obj->rol == 'administrador'){

							
								
							header('Location:  /matricula-escolar/sesion/');	
							


						}else{

							print "<p style='text-align:center;color:red;'>Contraseña incorrecta</p>";
						}

						

						


					

		}

			
		

}


function obj(){

	$obj = new Usuario();
	return $obj;
}







handler();




?>

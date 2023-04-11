<?php 



				$diccionario = array(

									 'header' => 'Nombre de la unidad educativa',

									 'login' => 'logueo',
									 'rol' => 'administrador'







				);


				function render_dinamic_data($vista,$data=array()){

							global $diccionario;
						
							$html = file_get_contents('../site_media/html/'.$vista.'.html');
							foreach($diccionario as $clave => $valor){
							$html = str_replace('{'.$clave.'}',$valor,$html);
							}
							foreach($data as $clave => $valor){	
										
							$html = str_replace('{'.$clave.'}', $valor, $html);

							}
							print $html;


				}



			



?>
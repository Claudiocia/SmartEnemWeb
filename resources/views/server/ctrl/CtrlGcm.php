<?php
	require_once('../apl/AplGcm.php');
	$apl = new AplGcm();
	
	
	if(preg_match('/^(save-gcm-registration-id){1}$/', $_POST['method'])){
		$gcm = new Gcm($_POST['reg-id']);
		$return = $apl->save($gcm);
		
		echo json_encode(array('feedback'=>$return));
	}
	
	
	else if(preg_match('/^(send-gcm-message){1}$/', $_POST['method']) || preg_match('/^(send-gcm-message){1}$/', $_GET['method'])){
		// CONSTANTS SYSTEM
			define('__GOOGLE_GCM_HTTP_URL__', 'https://android.googleapis.com/gcm/send'); // HTTP CHOOSE
			define('__GOOGLE_API_KEY__', 'AIzaSyBiVIs_jV3EDWdl5tEmxD_c532U5DoRIwU');
		
		// GET GCMs CODE
			$arrayGcm = $apl->getAll();
			$registrationIDs = array();
			for($i = 0, $tam = count($arrayGcm); $i < $tam; $i++){
				$registrationIDs[] = $arrayGcm[$i]->getRegistrationId();
			}
		
		$tam = ceil(count($registrationIDs) / 1000); // GCM PERMITE APENAS 1000 REGISTROS POR ENVIO
		for($i = $c = 0; $i < $tam; $i++){
			
			$gcmIds = array();
			for($j = 0; $j < 1000 && isset($registrationIDs[$j + $c]); $j++){
				$gcmIds[] = $registrationIDs[$j + $c];
			}
			$c += 1000;
			
			$time = date('d-m-Y - H:i:s');
		
			
			// PAYLOAD DATA
				$data = array('title'=>'Novo Post',
								'author'=>'UnebNoticias',
								'time'=>date('Y-m-d H:i:s'),
								'message'=>'Publicamos nova materia ('.$time.') ');
			
			// SET POST VARIABLES
				$fields = array('registration_ids'=>$gcmIds,
								//'notification_key'=>'',
								'collapse_key'=>'my_type',
								'delay_while_idle'=>false,
								'time_to_live'=>(60*60*48),
								'restricted_package_name'=>'com.claudiosouza.unebnoticias',
								'dry_run'=>false,
								'data'=>$data);
								
			// HEADER
				$headers = array('Authorization: key='.__GOOGLE_API_KEY__, 'Content-Type: application/json');

			// OPEN CONNECTION
				$ch = curl_init();

			// SET CURL
				curl_setopt( $ch, CURLOPT_URL, __GOOGLE_GCM_HTTP_URL__ );
				curl_setopt( $ch, CURLOPT_POST, true );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);


			// SEND POST
				$result = curl_exec($ch);
				var_dump($result); // RAW RESULT
				echo '<br /><br />';
				
			// RESULT JSON
				$html = '';
				$resultJson = json_decode($result);
				foreach($resultJson as $key=>$value){
					if(is_array($value)){
						$html .= $key.'=>{<br />';
						$i = 0;
						
						foreach($value as $k=>$v){
							$html .= '&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;';
							foreach($v as $kObj=>$vObj){
								$html .= $kObj.'=>'.$vObj;
								
								// UPDATE REG ID
									if(strcasecmp($kObj, 'registration_id') == 0 && strlen( trim($vObj) ) > 0){
										$arrayGcm[$i]->setNewRegistrationId($vObj);
										$return = $apl->update($arrayGcm[$i]);
										$html .= $return == 1 ? ' (atualizado)' : utf8_decode(' (bug na atualização)');
									}
								// DELETE REG ID
									else if(strcasecmp($kObj, 'error') == 0 && strcasecmp($vObj, 'NotRegistered') == 0){
										$return = $apl->delete($arrayGcm[$i]);
										$html .= $return == 1 ? ' (removido)' : utf8_decode(' (bug na remoção)');
									}
									else if(strcasecmp($kObj, 'error') == 0 && strcasecmp($vObj, 'MismatchSenderId') == 0){
										$return = $apl->delete($arrayGcm[$i]);
										$html .= $return == 1 ? ' (removido)' : utf8_decode(' (bug na remoção)');
									}
									
								$html .= '<br />';
							}
							$html = rtrim($html, '<br />');
							$html .= '&nbsp;}<br />';
							$i++;
						}
						$html .= '}<br />';
					}
					else{
						$html .= $key.'=>'.$value.'<br />';
					}
				}
				echo $html; // PRINT RESULT
				
			// CLOSE CONNECTION
				curl_close($ch);
		}
	}
?>
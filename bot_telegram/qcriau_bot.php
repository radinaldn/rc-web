<?php
 
define('BOT_TOKEN', '512796365:AAG2WDa08ibFHDeTeE4pahWrxEU6LA98S7A');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
 
function apiRequestWebhook($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
 
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
 
  $parameters["method"] = $method;
 
  header("Content-Type: application/json");
  echo json_encode($parameters);
  return true;
}
 
function exec_curl_request($handle) {
  $response = curl_exec($handle);
 
  if ($response === false) {
    $errno = curl_errno($handle);
    $error = curl_error($handle);
    error_log("Curl returned error $errno: $error\n");
    curl_close($handle);
    return false;
  }
 
  $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
  curl_close($handle);
 
  if ($http_code >= 500) {
    // do not want to DDOS server if something goes wrong
    sleep(10);
    return false;
  } else if ($http_code != 200) {
    $response = json_decode($response, true);
    error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
    if ($http_code == 401) {
      throw new Exception('Invalid access token provided');
    }
    return false;
  } else {
    $response = json_decode($response, true);
    if (isset($response['description'])) {
      error_log("Request was successfull: {$response['description']}\n");
    }
    $response = $response['result'];
  }
 
  return $response;
}
 
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
 
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
 
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = API_URL.$method.'?'.http_build_query($parameters);
 
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
 
  return exec_curl_request($handle);
}
 
function apiRequestJson($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
 
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
 
  $parameters["method"] = $method;
 
  $handle = curl_init(API_URL);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
  curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
 
  return exec_curl_request($handle);
}
 
function processMessage($message) {
    include 'koneksi.php';
    
  // process incoming message
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  if (isset($message['text'])) {
    // incoming text message
    $text = $message['text'];


    $data = explode("-", $text);

    $password = $data[0];
    $id_keldesa = $data[1];
    $suara1 = $data[2];
    $suara2 = $data[3];
    $suara3 = $data[4];
    $suara4 = $data[5];
    
    // insert data to server
    
    // if the password == true
    if ($data[0] == "123456" ){
        
        // check apakah id_keldesa tersedia?
        $query_check_keldesa = "SELECT tb_keldesa.id_keldesa FROM tb_keldesa WHERE tb_keldesa.id_keldesa = '$id_keldesa'";
        
        $result_check_keldesa = mysqli_query($con, $query_check_keldesa);
        
        // jika tidak id_keldesa tersedia
        if (mysqli_num_rows($result_check_keldesa) == 0){
            apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "ID Kelurahan/Desa yang anda masukkan tidak tersedia, harap cek lagi."));
            
        //jika id_keldesa tersedia
        } else {
            
            // check apakah data sudah di entri?
            $query_check_suara = "SELECT tb_suara.id_keldesa FROM tb_suara WHERE tb_suara.id_keldesa = '$id_keldesa'";
            
            $result_check_suara = mysqli_query($con, $query_check_suara);
            
            // check apakah data suara sudah pernah di entri?
            if (mysqli_num_rows($result_check_suara) > 0){
                // data dah masuk woy
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Data dengan ID Kelurahan/Desa yang anda gunakan sudah di entry."));
                
            // data belum pernah di entri, takis
            } else {
                $query = "INSERT INTO tb_suara(id_keldesa, suara1, suara2, suara3, suara4, waktu, foto) values ('$id_keldesa', '$suara1', '$suara2', '$suara3', '$suara4', NOW(), null)";
                
                $result = mysqli_query($con, $query);
                
                apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'Data suara berhasil dikirim =>id keldesa : '.$id_keldesa.'; suara1 : '.$suara1. '; suara2 : '.$suara2. '; suara3 : '.$suara3. '; suara4 : '.$suara4));
            }
        }
    // end of command entry suara
    
    } else if ($data[0] == "/cekhasil") {
        
        $query = "SELECT (SUM(suara1)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total1, (SUM(suara2)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total2, (SUM(suara3)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total3, (SUM(suara4)/ SUM(suara1 + suara2 + suara3 + suara4) *100) AS total4 FROM tb_suara;";
        
        $result = mysqli_query($con, $query);
        
        $data = mysqli_fetch_assoc($result);
        
        $paslon1 = $data['total1'];
        $paslon2 = $data['total2'];
        $paslon3 = $data['total3'];
        $paslon4 = $data['total4'];
        
        
        apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Syamsuar - Edi Nasution : ".$paslon1."%".PHP_EOL.
        "Lukman Edi - Herdianto : ".$paslon2."%".PHP_EOL.
        "Firdaus - Rusli Efendi : ".$paslon3."%".PHP_EOL.
        "Arsyad Juliandi R - Suyatno : ".$paslon4."%"));
    // if the password == false
    
    } else {
        apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => "Pasword anda salah!".PHP_EOL.
        "Hubungi admin jika anda belum mendapatkan password."));
    }

  } else {
    apiRequest("sendMessage", array('chat_id' => $chat_id, "text" => 'I understand only text messages'));
  }
}
 
 
define('WEBHOOK_URL', 'https://www.dwinoviyati.com/labs/haloro_bot.php');
 
if (php_sapi_name() == 'cli') {
  // if run from console, set or delete webhook
  apiRequest('setWebhook', array('url' => isset($argv[1]) && $argv[1] == 'delete' ? '' : WEBHOOK_URL));
  exit;
}
 
 
$content = file_get_contents("php://input");
$update = json_decode($content, true);
 
if (!$update) {
  // receive wrong update, must not happen
  exit;
}
 
if (isset($update["message"])) {
  processMessage($update["message"]);
}
?>
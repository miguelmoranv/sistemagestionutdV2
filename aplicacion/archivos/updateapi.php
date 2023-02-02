<?php
include_once('sesiones.php');
include_once('encabezado.php');
$entrar="";


if ($_SERVER["REQUEST_METHOD"]=="POST")
	 {
    $id_doc=$_POST['id_doc'];
    $nombre_tipo_doc=$_POST['nombre_tipo_doc'];

    $in = json_encode(array("id_doc"=>"$id_doc","nombre_tipo_doc"=>"$nombre_tipo_doc"));


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/sistemagestionutdV2/aplicacion/archivos/api_base/controllers/tipo_doc.php?op=update',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $in,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    if ($response) {
        $entrar = "act_api";
      }else{
        $entrar="error_act_api";
      }
      include_once('alertas.php');
    }
    ?>
</body>
</html>
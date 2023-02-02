<?php
  //Crear el controlador que se comunique con el modelo
  //para acceder a los metodos del modelo a traves de los 
  //endpoint 

  //Agregar la siguiente linea para que la app sepa que se se utilzaran JSON
  header('Content-Type:application/json');

  require_once("../config/conexion.php");
  require_once("../models/Tipo_doc.php");

  //crear un objeto de tipo categoria para instancias los 
  //metodos del modelo
  $qs=new tipo_doc;

  //Recibir la informacion en un JSON que hay que preparar en objeto body
  $body=json_decode(file_get_contents("php://input"),true);

  //crear un switch para navegar entre los diferentes 
  //servicios que ofrece el API a traves del los endpoint
  switch($_GET["op"])
  {
    //case es para regresar todos los registros de categoria
    case "selectall": $datos=$qs->gettipo_doc();
                      echo json_encode($datos);
                      break;

    //case es para regresar un registro en particular de categoria
    case "selectid": $datos=$qs->gettipo_doc_id($body["id_doc"]);
                      echo json_encode($datos);
                      break;       
                      
    //case es para regresar un registro en particular de categoria
    case "insert": $datos=$qs->posttipo_doc($body["nombre_tipo_doc"]);
                      echo json_encode("Se agrego el tipo de documento");
                      break;       

    //case es para regresar un registro en particular de categoria
    case "delete": $datos=$qs->deletetipo_doc($body["id_doc"]);
                      echo json_encode("Se elimino correctamente");
                      break;    
    case "update": $datos=$qs->puttipo_doc($body["id_doc"],$body["nombre_tipo_doc"]);
                      echo json_encode("Se actualizo correctamente");
                      break; 
  }

?>
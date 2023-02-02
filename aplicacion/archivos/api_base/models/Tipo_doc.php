<?php
  //Clase que utilizara para crear el modelo que interactua
  //con la BD api_restful

  class tipo_doc extends Conectar
  {
    //funcion para traer todos los registros de la tabla categoria
    public function gettipo_doc()
    {
        //llamar la cadena de conexion a la BD
        $conectar=parent::Conexion();

        //String para la consulta 
        $sql="select * from tipo_doc";

        //Preparar la conexion con la String
        $sql=$conectar->prepare($sql);

        //Ejecutar la consulta
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para traer un resgistro en particular 
    public function gettipo_doc_id($id_doc)
    {
      
      $conectar=parent::Conexion();
      $sql="select * from tipo_doc where id_doc=?";
      $sql=$conectar->prepare($sql);
      // utilizar los parametros en la consulta
      $sql->bindValue(1,$id_doc);
      $sql->execute();

      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function posttipo_doc($nombre_tipo_doc)
    {

      
        $conectar=parent::Conexion();
        $sql="insert into tipo_doc VALUES (null,?)";
        $sql=$conectar->prepare($sql);
        //UTILIZAR LOS PRAMETROS EN LA CONSULTA
        $sql->bindValue(1,$nombre_tipo_doc);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deletetipo_doc($id_doc)
    {

      
        $conectar=parent::Conexion();
        $sql="delete from tipo_doc where id_doc=?";
        $sql=$conectar->prepare($sql);
        //UTILIZAR LOS PRAMETROS EN LA CONSULTA
        $sql->bindValue(1,$id_doc);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function puttipo_doc($nombre_tipo_doc,$id_doc)
    {

      
        $conectar=parent::Conexion();
        $sql="update tipo_doc set nombre_tipo_doc=? where id_doc=?";
        $sql=$conectar->prepare($sql);
        //UTILIZAR LOS PRAMETROS EN LA CONSULTA
        $sql->bindValue(1,$id_doc);
        $sql->bindValue(2,$nombre_tipo_doc);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

  }


?>
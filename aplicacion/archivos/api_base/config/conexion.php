<?php
//Clase para establecer conexion para api_restful
class Conectar
{
    protected $dbh;

    protected function Conexion()
    {
        try
        {
            $conectar=$this->dbh=new PDO("mysql:local=localhost;dbname=sgdd","root","");
            return $conectar;
        }
        catch(Exception $e)
        {
            print"¡Error en la base de datos!".$e->getMessage()."</br>";
            die("Verifica por favor ...");
        }
    }
}
?>
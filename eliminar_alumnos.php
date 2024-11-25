<?php

$conexion = new mysqli ("localhost","root","123456789","umerida");

if($conexion == TRUE){

 $matricula = $_POST['matricula'];
 
 //VERIFICAR SI MATRICULA EXISTE
 
 $sql = "SELECT matricula FROM alumnos WHERE matricula = '$matricula' ";

 $resultado = $conexion->query($sql);

 if($resultado->num_rows > 0){

  //BORRAR ALUMNO
  $sql_borrar = "DELETE FROM alumnos WHERE matricula = '$matricula' ";

  if($conexion->query($sql_borrar)){

   echo "ALUMNO BORRADO";

  }else{
 
   echo $conexion->error;
  }

}else{
 
    echo "EL ALUMNO NO EXISTE";

  }



}else{

 echo "ERROR";

}



?>
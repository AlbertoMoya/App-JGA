<?php

   header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-Type: application/json; charset=utf-8");

  include "library/config.php";

  $postjson = json_decode(file_get_contents('php://input'), true);
  $today    = date('Y-m-d');



   if($postjson['aksi']=='add'){

    $query = mysqli_query($mysqli, "INSERT INTO master_customer SET
      name_customer = '$postjson[name_customer]',
      desc_customer = '$postjson[desc_customer]',
      requisitos = '$postjson[requisitos]',
      oferta = '$postjson[oferta]',
      puesto = '$postjson[puesto]',
      horario = '$postjson[horario]',
      direccion = '$postjson[direccion]',
      created_at    = '$today' 
    ");

    $idcust = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success'=>true, 'customerid'=>$idcust));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

   elseif($postjson['aksi']=='getdata'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM master_customer ORDER BY customer_id DESC LIMIT $postjson[start],$postjson[limit]");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'customer_id' => $row['customer_id'],
        'name_customer' => $row['name_customer'],
        'desc_customer' => $row['desc_customer'],
        'created_at' => $row['created_at'],
        'requisitos' => $row['requisitos'],
        'oferta' => $row['oferta'],
        'puesto' => $row['puesto'],
        'horario' => $row['horario'],
       // 'direccion' => $row['direccion'],

      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }



   elseif($postjson['aksi']=='getpost'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM master_customer WHERE customer_id='$postjson[customer_id]'");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'customer_id' => $row['customer_id'],
        'name_customer' => $row['name_customer'],
        'desc_customer' => $row['desc_customer'],
        'created_at' => $row['created_at'],
        'requisitos' => $row['requisitos'],
        'oferta' => $row['oferta'],
        'puesto' => $row['puesto'],
        'horario' => $row['horario'],
       // 'direccion' => $row['direccion'],

      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }



   elseif($postjson['aksi']=='update'){
    $query = mysqli_query($mysqli, "UPDATE master_customer SET 
      name_customer='$postjson[name_customer]',
      desc_customer='$postjson[desc_customer]', 
      requisitos='$postjson[requisitos]',
      oferta='$postjson[oferta]',
      puesto='$postjson[puesto]',
      horario='$postjson[horario]',
      direccion='$postjson[direccion]'
       WHERE customer_id='$postjson[customer_id]'");

    if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
    else $result = json_encode(array('success'=>false, 'result'=>'error'));

    echo $result;

  }



  elseif($postjson['aksi']=='addpost'){

    $query = mysqli_query($mysqli, "INSERT INTO postulados SET
      usuario = '$postjson[usuario]',
      edad = '$postjson[edad]',
      carrera = '$postjson[carrera]',
      direccionp = '$postjson[direccionp]',
      telefono = '$postjson[telefono]',
      correo = '$postjson[correo]',
      id_vacante = '$postjson[id_vacante]',
      activo = '$postjson[activo]',
      genero = '$postjson[genero]',
      name_vacante = '$postjson[name_vacante]',
      fecha = '$today' 
    ");

    $idcust = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success'=>true, 'id_postulado'=>$idcust));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }



   elseif($postjson['aksi']=='delete'){
    $query = mysqli_query($mysqli, "DELETE FROM master_customer WHERE customer_id='$postjson[customer_id]'");

    if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
    else $result = json_encode(array('success'=>false, 'result'=>'error'));

    echo $result;

  }


   elseif($postjson['aksi']=='addperfil'){

    $query = mysqli_query($mysqli, "INSERT INTO perfil SET
      nombre = '$postjson[nombre]',
      edad = '$postjson[edad]',
      genero = '$postjson[genero]',
      fn = '$postjson[fn]',
      telefono = '$postjson[telefono]',
      correo = '$postjson[correo]',
      licencia = '$postjson[licencia]',
      ingles = '$postjson[ingles]',
      frances = '$postjson[frances]',
      italiano = '$postjson[italiano]',
      aleman = '$postjson[aleman]',
      portugues = '$postjson[portugues]',
      estado = '$postjson[estado]',
      municipio = '$postjson[municipio]',
      direccion = '$postjson[direccion]',
      cp = '$postjson[cp]',
      carrera = '$postjson[carrera]',
      universidad = '$postjson[universidad]',
      status_c = '$postjson[status_c]',
      interes = '$postjson[interes]',
      experiencia = '$postjson[experiencia]',
      tiempo = '$postjson[tiempo]',
      activo = '$postjson[activo]',
      fechac = '$today' 
    ");

    $idcust = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success'=>true, 'id_perfil'=>$idcust));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }




  elseif($postjson['aksi']=='getuser'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_user=1");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'id_user' => $row['id_user'],
        'usuario' => $row['usuario'],
        'correo' => $row['correo'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }





  elseif($postjson['aksi']=='getuserid'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_user='$postjson[id_user]'");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'id_user' => $row['id_user'],
        'usuario' => $row['usuario'],
        'correo' => $row['correo'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }



?>
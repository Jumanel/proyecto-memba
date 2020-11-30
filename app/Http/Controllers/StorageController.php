<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
 public function save(Request $request)
{

       //obtenemos el campo file definido en el formulario
       $file = $request->file('file');

       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
       try {
		    $nombre = "F:\\laragon\\www\\memba\\storage\\storage\\".$nombre;

		    $conexionBD = new \SQLite3($nombre,SQLITE3_OPEN_READWRITE );
   		    $conexionBD->enableExceptions(true);
		    $resultado = $conexionBD->query ("select * from sqlite_master");
		    $status = "Es SQLite";
  		}catch (\Exception  $e){
  			$status = 'No es SQLite';
  		}


       //return "archivo guardado";
       return view('inicio')->with('status', $status);


	}

}
/*  $salida = "Tablas: <br>";
		    while($row = $resultado->fetchArray(SQLITE3_NUM)){
			   	for($i=0;$i<count($row);$i++){
			   		$salida .= $i . ": ". $row[$i]." | ";
			   	}
			   	$salida .= "<br>";
		    } */
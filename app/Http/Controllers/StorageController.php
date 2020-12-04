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
		    //Comprobar que es SQLite
		    $nombre = "c:\\laragon\\www\\proyecto-memba\\storage\\storage\\".$nombre;

		    $conexionBD = new \SQLite3($nombre,SQLITE3_OPEN_READWRITE );
   		    $conexionBD->enableExceptions(true);

		    $errores = "";
           

		    //Obtener tablas de bd subida
           
           
           
		    $resultado = $conexionBD->query ("select name from sqlite_master WHERE type='table' ORDER BY name");
		    $nombresTablas = array();
		    while($row = $resultado->fetchArray()){
		    	$nombresTablas[] = $row["name"];
		    }
        

		    //Obtener tablas de master
		    $conexionBDMaestro = new \SQLite3("c:\\laragon\\www\\proyecto-memba\\database\\bd-sqlite-maestro.db",SQLITE3_OPEN_READWRITE );
		    $resultado = $conexionBDMaestro->query ("select name from sqlite_master WHERE type='table' ORDER BY name");
		    $nombresTablasMaster = array();
		    while($row = $resultado->fetchArray()){
		    	$nombresTablasMaster[] = $row["name"];
		    }

           
		    //compara nombre tablas
		    $nombresTablasAmbos = array();
		    for($i=0;$i<count($nombresTablasMaster);$i++){
		    	if(!in_array($nombresTablasMaster[$i], $nombresTablas)){
		    		$errores .= " TABLAS FALTANTES: La BD no tiene la tabla '".$nombresTablasMaster[$i]."'<br>";
				}else{
					$nombresTablasAmbos[] = $nombresTablasMaster[$i];
				}
		    }

		    //Compara cada tabla
		    for($i=0;$i<count($nombresTablasAmbos);$i++){
		    	$resultado = $conexionBDMaestro->query ("PRAGMA table_info('".$nombresTablasAmbos[$i]."')");
		    	$nombresCamposMaster = array();
		    	$tiposCamposMaster = array();
				while($row = $resultado->fetchArray()){
		    		$nombresCamposMaster[] = $row["name"];
		    		$tiposCamposMaster[$row["name"]] = $row["type"];
		  		}

				$resultado = $conexionBD->query ("PRAGMA table_info('".$nombresTablasAmbos[$i]."')");
		    	$nombresCampos = array();
		    	$tiposCampos = array();
				while($row = $resultado->fetchArray()){
		    		$nombresCampos[] = $row["name"];
		    		$tiposCampos[$row["name"]] = $row["type"];
		  		}

		  		$nombresCamposAmbos = array();

		  		for($j=0;$j<count($nombresCamposMaster);$j++){
		  			if(!in_array($nombresCamposMaster[$j], $nombresCampos)){
		  				$errores .= " CAMPOS FALTANTES: La tabla '".$nombresTablasAmbos[$i]."'' le falta el campo '".$nombresCamposMaster[$j]."'<br>";
		  			}else{
		  				$nombresCamposAmbos[] = $nombresCamposMaster[$j];
		  			}
		  		}
		  		for($j=0;$j<count($nombresCamposAmbos);$j++){
		  			$n = $nombresCamposAmbos[$j];
		  			if($tiposCamposMaster[$n] != $tiposCampos[$n]){
		  				$errores .= "CAMPOS DIFERENTES: En la tabla '".$nombresTablasAmbos[$i]."', el campo '".$n."' tiene un tipo diferente. Esperado: '".$tiposCamposMaster[$n]."', actual: '".$tiposCampos[$n]."' <br>";
		  			}
		  		}

		    }

		    //Comparar indices

		    //Obtener inidices de bd subida
		    $resultado = $conexionBD->query ("select name from sqlite_master WHERE type='index' ORDER BY name");
		    $nombresIndices = array();
		    while($row = $resultado->fetchArray()){
		    	$nombresIndices[] = $row["name"];
		    }

		    //Obtener inidices de master
		    $resultado = $conexionBDMaestro->query ("select name from sqlite_master WHERE type='index' ORDER BY name");
		    $nombresIndicesMaster = array();
		    while($row = $resultado->fetchArray()){
		    	$nombresIndicesMaster[] = $row["name"];
		    }

		    //compara nombre indices
		    $nombresIndicesAmbos = array();
		    for($i=0;$i<count($nombresIndicesMaster);$i++){
		    	if(!in_array($nombresIndicesMaster[$i], $nombresIndices)){
		    		$errores .= "INDICES : La BD no tiene el indice '".$nombresIndicesMaster[$i]."'<br>";
				}else{
					$nombresIndicesAmbos[] = $nombresIndicesMaster[$i];
				}
		    }
           
           
           $resultadomaestro = $conexionBDMaestro->query("select clave,valor from preferencias WHERE clave like 'beeorder%'");
           $resultado = $conexionBD->query ("select clave,valor from preferencias WHERE clave like 'beeorder%'");
           $beeordermaestro = array();
           $beeorder = array();
           $beeordermaestrovalor = array();
           $beeordervalor = array();
           
           
           while($row = $resultadomaestro->fetchArray()){
               $beeordermaestro[] = $row["clave"];
               $beeordermaestrovalor[$row["clave"]] = $row["valor"];
               
           }
           
           while($row = $resultado->fetchArray()){
               $beeorder[] = $row["clave"];
               $beeordervalor[$row["clave"]] = $row["valor"];
           }
           
           $beeOrderAmbos = array();
           for($i=0;$i<count($beeordermaestro);$i++){
               if(!in_array($beeordermaestro[$i], $beeorder)){
                   $errores .= "La tabla preferencias no tiene el registro '".$beeordermaestro[$i]."'<br>";
                   
               }else{
                   $beeOrderAmbos[] = $beeordermaestro[$i];
               }
           }
           
           
           for($j=0;$j<count($beeOrderAmbos);$j++){
               $n = $beeOrderAmbos[$j];
               if($beeordermaestrovalor[$n] != $beeordervalor[$n]){
                   $errores .= "En la tabla 'preferencias', el registro beeorder '".$n."'tiene un valor diferente. Esperando: '".$beeordermaestrovalor[$n]."', actual: '".$beeordervalor[$n]."' <br>";
               }
           }
            
           
         $status = $errores;
             return view('inicio')->with('status', $status);
           
        
        $errores = "";
         
  		} catch (\Exception  $e) {
            $mensajeno = "";
            $mensajeno = " El archivo no es SQLite";
  			return view('inicio')->with('mensajeno', $mensajeno);
  		} 
     

	}

}

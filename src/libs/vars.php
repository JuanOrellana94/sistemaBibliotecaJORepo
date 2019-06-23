<?php
	


	$servidor="localhost";
	$usuario="root";
	$clave="password";
	$base="sistemaBiblioteca";

	
    $tabla2="...";
	$carta="612x792";
	$a4="595x842";
	$oficio="612x1008";


	//Nombre de tablas
	$tablaUsuarios="usuario";
  $tablaBitacora="bitacora";

  $tablaDewey="deweyclasificacion";
 
  $tablaGenAut="detallegeneroautor";
 
  $tablaGenero="generoliterario";


    //Nombre de tabla USUARIOS
   $varUsuCodigo="usucod";
   $varAccNombre="usuaccnom";
   $varContrasena="usuclave";
   $varPriNombre="usuprinom";
   $varSegNombre="ususegnom";
   $varPriApellido="usupriape";
   $varSegApellido="ususegape";
   $varCarnet="usucarnet";
   $varCorreo="usucorre";
   $varCueEstatus="usuestcue";
   $varAnoBachi="usuanobac";
   $varSecAula="ususecaul";
   $varTipBachi="usutipbac";
   $varNivel="usunivel";

  //1Nombre de tabla LIBROS

    $tablaLibros="libros";
     //tabl aname
   $varlibcod="libcod";
   $varlibtit="libtit";
   $varlibdes="libdes";
   $varlibpor="libpor";
   $varlibfecreg="libfecreg";
   $varlibfecedi="libfecedi";
   $varlibnumpag="libnumpag";
   $varlibisbn="libisbn";
   $varlibgenaut="autcod";
   $varlibDew="dewcod";
   $varlibedit="editcod";

   // 2 Nombres tabla DEWEY: dewcod, dewcodcla, dewtipcla;
   $vardewcod="dewcod";
   $vardewcodcla="dewcodcla";
   $vardewtipcla="dewtipcla";

   // 3 Nombres tabla AUTORLIBRO autcod, autnom, autape, autseud, autdes;
   //tabla
    $tablAutor="autorlibro";

    $varautcod="autcod";
    $varautnom="autnom";
    $varautape="autape";   
    $varautseud="autseud";
    $varautdes="autdes";

    // 4 Nombres tabla GENEROLITERARIO gencod, gennom, gensub, gendes;
    $vargencod="gencod";
    $vargennom="gennom";   
    $vargensub="gensub";
    $vargendes="gendes";

    // 5 NOMBRE TABLA DETALLEGENEROAUTOR genautcod, gencod, autcod;
    $vargenautcod="genautcod";   
    $vargencod="gencod";
    $varautcod="autcod";

   // TABLA EDITORIAL
     $tablaEditoral="editorialeslibros";
 // 6 NOMBRE TABLA EDITORIAL editcod, editnom, editpai

    $vareditcod="editcod";   
    $vareditnom="editnom";
    $vareditpai="editpai";


  





   //Variables de BITACORA
	$varFecha="bitfec";
	$varDesc="bitdes";
	$varBitUsuCodigo="bitusucod";
	$varNomLibreria="bitnomlib";
	$varNomPersona="bitnombre";

?>

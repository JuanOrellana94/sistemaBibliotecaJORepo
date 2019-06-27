
<body>
  <?php

    include("top.php");
    include("pages/catalogs/catbar.php");






 $pageLocation=$_GET["pageLocation"];

 if ($pageLocation=="libros") {
    include("pages/catalogs/libros.php");
 } else if ($pageLocation=="autores") {
 	include("pages/autores/verAutores.php");
 }else if ($pageLocation=="editoriales") {
 	include("pages/editoriales/verEditoriales.php");
 }




 include("down.php");


?>

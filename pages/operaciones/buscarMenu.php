<!--ASPECTO VISUAL DE LA PAGINA DE AUTORES-->
    <!--CONTENEDOR PARA TABLA DE AUTORES/MODALES PARA AGREGAR Y ELIMINAR AUTORES--> 
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <TITLE>SISTEMA DE BIBLIOTECA, VERSION PROTOTIPO 1.0, 2019</TITLE>
    <!-- Bootstrap -->
    <script src="src/js/jquery-3.4.0.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/jsSession.js"></script>
    <script src="src/js/jsRedirects.js"></script>
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="src/css/bootstrap.css">  
    <!--<link rel="stylesheet" href="src/css/imgbutton.css"> -->
     <!-- credit here -->
    <link rel="stylesheet" href="src/css/datePickerPureCSS.css">
    <script src="src/js/insertProcess/jsLibros.js"></script>

    <link href="src/css/background.css" rel="stylesheet"/>

    <link href="src/css/select2.min.css" rel="stylesheet"/>
    <link href="src/css/select2-bootstrap4.css" rel="stylesheet"/>
    <script src="src/js/select2.min.js"></script>
    

  </head>

  <?php 
  include("src/libs/vars.php");
  include("src/libs/sessionControl/conection.php");

  session_start();

   ?>  
<body style="background-color:#003764;">
  
    <div class="row" style="margin-left: 1%; margin-right: 1%;">
      <div class="col-lg-10">
        <nav class="navbar navbar-expand-md" style="background-color:#003764;">
          <div >
            <img src="img/icons/LogoSys.png" width="100" height="100" alt="">
          </div>
          <div style="vertical-align: middle; margin: 5px; color:white">
               <p class="font-weight-light"> <h3> Consultas</h3></p>       
          </div>                       
        </nav>
      </div>
      <div class="col-lg-2">
        <?php
          if (!isset($_SESSION[ "autorizado" ])){
              ?>
              <div class="navbar flex-row-reverse text-white"  style="margin: 5px">
                <table>        
                  <tr>                  
                    <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
                  </tr>
                  <tr>       
                    <td width="100px" align="center"><button  type="button" class="btn btn-outline-light my-2 my-sm-0" id="cerrarSec"  onclick="rediLogin()">Acceder</button></td>
                  </tr>       
                </table>        
              </div>
             
              <?php
            } else  {
              ?>
              <div class="navbar flex-row-reverse  text-white"  style="margin: 5px">
                <table>        
                  <tr>
                    <td align="right" width="130px"> <font color="white"> <?php echo $_SESSION["nombreComp"]?></font></td>
                    <td></td>
                    <td align="center" width="100px" ><img class="pequeña" src="img/icons/User.png" alt=""></td>
                  </tr>
                  <tr>
                    <td align="right" width="130px">  <font color="white"><?php echo $_SESSION["usuNivelNombre"]?> </font></td>
                    <td></td>
                    <td width="100px" align="center"><button  type="button" class="btn btn-outline-light my-2 my-sm-0" id="cerrarSec"  onclick="cerrar()">Cerrar</button></td>
                  </tr>       
                </table>        
              </div>
              <?php
              
          }
        ?>
        
      </div>
    </div>
  

    <?php
     
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
      

<!--INICIO CONTENEDOR DE CATALOGO DE AUTORES-->    
<div class="container-fluid" > 
    <div class="col-sm-12">  
      <div class="card">   
        <div class="card-header">

          <div class="row" style="margin-top: 10px">
         
            <div class="col-sm-5">
              <div class="row">
                <img src="img/icons/menuQueryLight.png" width="65" height="65" alt="" style="margin-right: 1%">
         


                <form name="formBusqueda" id="formBusqueda">          
                  <div class="input-group ">               
                    <input type="text" class="form-control form-control-lg" placeholder="Buscar libro" id="textBusqueda" name="textBusqueda"> 
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                    </div> 
                  </div>
                  <small id="dateHelp" class="form-text text-muted">Titulo del libro, autor, categoria, tematicas</small>
                </form>
              </div>                       
            </div>
            <div class="col-sm-3">
              <div name="cargandoFeedback" id="cargandoFeedback" align="left"> </div>
            </div>  
            <div class="col-sm-2">
              <div name="accionFeedback" id="accionFeedback"> </div>
            </div>
            <div class="col-sm-2">
              <div class="btn-group float-right" role="group" aria-label="Opciones"> 
                <button class="btn btn-light float-right" type="button" onclick="recargarTablaLimpiar();" data-toggle="tooltip" data-placement="top" title="Recargar Tabla">
                  <img src="img/icons/BookauthorReload.png" width="60" height="60">
                </button>
                <button class="btn btn-light float-right" type="button" onclick="rediMenuOPT();" data-toggle="tooltip" data-placement="top" title="Volver al menu principal">
                  <img src="img/icons/menuRegresar.png" width="60" height="60">
                </button>

               
                
              </div>
            </div>
          </div>
             
        </div>
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
                    <div align="center" name="cargarTabla" id="cargarTabla"> </div>            
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>




<!--MODAL PARA AGREGAR LIBROS A UN PEDIDO-->
<div class="modal fade" id="prestamosModal" tabindex="-1" role="dialog" aria-labelledby="prestamosModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="prestamosModal"><img src="img/icons/Bookauthor.png" width="30" height="30"> Prestar Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form id="formNuevoAutor" name="formNuevoAutor">
        




            
        </form>
      </div>
      <div class="modal-footer" >
         <div id="respuestaNuevoAutor" style="color: red; font-weight: bold; text-align: center;"></div>

        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> <--></-->
        <!-- <button type="button" class="btn btn-primary" onclick="insertarAutor()">Enviar Prestamo</button> -->
      </div>
     
    </div>
  </div>
</div>













<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {     
        
      recargarTabla();

      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          recargarTabla();
          event.preventDefault();
          return false;
        
        }
      });
  };
//Funcion para recargar tabla
function recargarTabla(){
   //Mostrar gif de cargando a la par de la barra de busqueda
  $("#cargandoFeedback").show();
  $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

  var busqueda=$("#textBusqueda").val();  
  $("#cargarTabla").load("pages/operaciones/tablaConsultas.php?pagina=1&busqueda="+ busqueda);

  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();

  
    $("#cargarTabla").load("pages/operaciones/tablaConsultas.php?pagina=1&busqueda="+busqueda);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}







//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   EDITAR 

 $('#modalEditarAutor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varautcod = button.data('varautcod')
      var varautnom = button.data('varautnom')
      var varautape = button.data('varautape')
      var varautseud = button.data('varautseud') 
      var modal = $(this)
      modal.find('.modal-title').text('Editar autor: ' + varautnom +' '+varautape);
     
      document.getElementById('editautcod').value = varautcod;
      document.getElementById('editautnom').value = varautnom;
      document.getElementById('editautape').value = varautape;
      document.getElementById('editautseud').value = varautseud;
 
    })
//TRIGGER SE ACTIVA AL MOSTRAR UN MODAL   ELIMINAR 
//Eliminar autor
  
     $('#modalBorrarAutor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varautcod = button.data('varautcod')
      var varautnom = button.data('varautnom')
      var varautape = button.data('varautape') 

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varautnom+' '+varautape+'<h5> ');
      document.getElementById('delautcod').value = varautcod;
      document.getElementById('delautnom').value = varautnom;
      document.getElementById('delautape').value = varautape;
      
      
    })

</script>

<!--ASPECTO VISUAL DE LA PAGINA DE Ejemplares-->
    <!--CONTENEDOR PARA TABLA DE Ejemplares/MODALES PARA AGREGAR Y ELIMINAR Ejemplares--> 

    <?php
     
     ?>
<!--DIRECCION DE LA UBICACION ACTUAL-->     
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="escritorio.php">Escritorio</a></li>
      <li class="breadcrumb-item">Catalogos</li>   
      <!--CAMBIAR SIGUIENTE POR NOMBRE DE CADA CATEGORIA-->     
      <li class="breadcrumb-item" active  >Ejemplares</li>
    </ol>
  </nav>        

<!--INICIO CONTENEDOR DE CATALOGO DE Ejemplares-->    
<div class="container-fluid" > 
 <!--     -->
        <!--Cuerpo del panel--> 
        <div class="card-body">              
          <div class="row">            
            <div class="col-md-12">
              <div class="card">
                <div class="card-body"> 
                 <!--   -->

                   <table class="table" >
                     <tr >
                      <td rowspan="4" width=200 height=400><h3>Perfil del libro</h3>  <hr style="color: #0056b2;" /><div><table class="table table-bordered table-hover"  style="background-color: #FFFFFF"; cellspacing="2"; cellpadding="2";  border-spacing: 5px; style="background-color: #FFFFFF;">
          

          <tbody>
                       <?php

              $tablaperfil=mysqli_query($conexion,"SELECT  t1.$varlibtit as Titulo, t1.$varlibdes as Descripcion , t1.$varlibpor as Portada , t2.$varautnom as Autor , t2.$varautape as Autorape, t5.$vareditnom as Editorial from $tablaLibros as t1 JOIN $tablAutor as t2 ON t2.$varautcod = t1.$varautcod JOIN $tablaEditoral as t5 on t5.$vareditcod = t1.$vareditcod where t1.$varlibcod = '$_GET[codigoLib]' ; ");
               
          if (mysqli_num_rows($tablaperfil)==0){
             echo "<div id='respuesta' style='color: red; font-weight: bold; text-align: center;'>  
               La busqueda no devolvió ningún resultado  </div>";
            } else{

              $dataLibros=mysqli_fetch_assoc($tablaperfil) 
                          ?>
                 
                        

            <tr >             
              <td  align="center"><?php echo "<img src= '$dataLibros[Portada]' 'width=200 height=400' >";  ?> </td>
                          
                                        
            </tr>
            <tr>  

                        

              <td  align="center"><button type="button" class="btn btn-primary btn-lg btn-block"><p class="font-weight-light"><h4><?php echo $dataLibros['Titulo'];?></h4> <hr style="color: #0056b2;" /> </p>
                            <div align="left"><br>Autor: </b> <?php echo $dataLibros['Autor'];?> <?php echo $dataLibros['Autorape'];?> <br> Editorial: <?php echo $dataLibros['Editorial'];?><br>Descripcion:<br><?php echo $dataLibros['Descripcion'];?> </div> 
              </button> </td>                       
                    

              
            </tr>
            
                          
                        
              
                    
            
            <?php 
            } ?>
          </tbody>
        </table></div></td>                       
                     </tr>
                     <tr>
                        <td height="50"><div class="col-sm-0">  
                          <div class="card">   
                          <div class="card-header">
                          <div class="row mx-auto">
                             <div style="vertical-align: middle; margin: 5px">
                          <p class="font-weight-light"> <h3>  Catalogo de Ejemplares</h3>  Administrar informacion de Ejemplares.</p>       
                             </div>           
                            </div>     
                         </div> </td>
                       </tr>
                       <tr>
                         <td height="50"><div class="row">
                    <div class="col-sm-5">
                      <form name="formBusqueda" id="formBusqueda">          
                        <div class="input-group">               
                          <input type="text" class="form-control" placeholder="Realizar busqueda" id="textBusqueda" name="textBusqueda">
                          <input type="text" class="form-control" value="<?php echo $_GET['codigoLib']; ?>" id="codigoLib" name="codigoLib" hidden> 
 
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" onclick="recargarTabla()"> Buscar </button>
                          </div> 
                        </div>
                        <small id="dateHelp" class="form-text text-muted">Herramienta de busqueda automatica.</small>
                      </form>                       
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
                          <img src="img/icons/BookediorialReload.png" width="45" height="45">
                        </button>

                        <button type="button" class="btn btn-light float-right"  data-toggle="modal" data-target="#newEjemplarModal"  >
                          <img data-toggle="tooltip" data-placement="top"  title="Nuevo Ejemplar" src="img/icons/Bookadd.png" width="45" height="45">
                        </button>
                        
                      </div>
                    </div>
                    </div></td>
                       </tr> 
                       <tr>
                        <td > <div align="center" name="cargarTabla" id="cargarTabla"> </div></td>  
                       </tr>                        
                                             
                                                             
                   </table>
                               
                </div>
              </div>
            </div>
          </div>  
        </div>
         <!--Fin delcuerpo del panel-->
      </div>
       <!--Fin Panel/card para el catalogo de libros-->
    </div>
</div>

<!--INICIAN MODALS PARA INSERTAR, MODIFICAR, ELIMINAR Ejemplares-->


<!--MODAL PARA INSERTAR NUEVO Ejemplar-->
<div class="modal fade" id="newEjemplarModal" tabindex="-1" role="dialog" aria-labelledby="newEjemplarModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
     <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newAuthorModal"><img src="img/icons/Bookadd.png" width="30" height="30"> Nuevo Ejemplar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" style="background: #D5D9DF;">
        <form id="formNuevoEjemplar" name="formNuevoEjemplar">                
           <table class="table" >
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                    <div>
                       <input type="hidden" name="formejemplarcodigolib" id="formejemplarcodigolib" value="<?php echo $_GET['codigoLib']; ?>" />
                      <input type="hidden" name="formejemplarcodigo" id="formejemplarcodigo" />
                      
                         <select  class="form-control" name='formejemplaringreso' id='formejemplaringreso'>
                             <option value="">Seleccione un tipo de ingreso</option>
                             <option value="0">Donacion</option>
                             <option value="1">Compra</option>                            
                         </select>    
                         <p>Ingrese el detalle de ingreso:</p>
                           <input class="form-control" type="" name="formdetalle" id="formdetalle"  />                        
                     <p>Ingrese el precio unitario:</p>
                           <input class="form-control" type="" name="formprecio" id="formprecio" disabled="" /> 
                                                   
                 </div>
                  </td>
                <tr>                                  
                  <td>
               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select class="form-control" name='formejemplarestado' id='formejemplarestado'>
                             <option value="">Seleccione una estado fisico</option>
                             <option value="0">Optimo</option>
                             <option value="1">Muy Bueno</option>
                             <option value="2">Regular</option>
                             <option value="3">Mala</option> 
                             <option value="4">Muy Mala</option>                           
                         </select>                      
                    </div>
                  </td>
                  </tr>   
            <tr>
                  <td>
                  <label for="formestantcod">Estantes</label>
                      <select class="form-control" style="width:100%"  type="text" name="formestantcod" id="formestantcod">
                        <option value="">Seleccione una Estante</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEstante e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$varestcod"]?>" ><?php echo $listEdit["$varestdes"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                      </select>
                  </td> 
            </tr>                  
            </tr>                     
           <tr>
             <td>
                <label for="PublishDate">Fecha de Adquisicion</label>
                <input type="date" name="formejemplarfecha" id="formejemplarfecha" value="">
             </td>
           </tr>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="59" class="form-control rounded-0" name="formejemplarcomentario" id="formejemplarcomentario" aria-describedby="formejemplarcomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>
      </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaNuevoEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="insertarEjemplar()">Insertar</button>
      </div>
          
    </div>
  </div>
</div>

<!--MODAL PARA MODIFICAR  Ejemplar-->

<div class="modal fade" id="modalEditarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalEditarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="newEjemplarModal"><img src="img/icons/BookaEjemplar.png" width="30" height="30">Editar Ejemplar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="formEditEjemplar" name="formEditEjemplar">
          
           
        <div align="center">        
          <table class="table" s>   
       

           
             
                                        
            </tr>
            <tr>
              <th>Detalles de adquisición</td>
            </tr>
            <tr>             
                 
                  <td>
                    <label>Tipo de ingreso:</label>
                  
                      <input type="hidden" name="editejemplarcodigo" id="editejemplarcodigo" />                     
                      <select class="form-control js-Dropdown-Busqueda" name='editejemplartipoingreso' id='editejemplartipoingreso'>
                             <option value="0">Donacion</option>
                             <option value="1">Compra</option>                            
                         </select>
                      <p>Ingrese el detalle de ingreso:</p>
                           <input class="form-control" type="" name="inputdetalle" id="inputdetalle"  /> 
                     <p>Ingrese el precio unitario:</p>
                           <input class="form-control" type="" name="inputprecio" id="inputprecio"  />
                                               
                 
                  </td> 
                <tr>
                  <td>

               <!--  Condicion fisica: 0=Optimo 1=Muy bueno 2=Regular 3=Mala 4=Muy mala -->
                    <label>Estado fisico:</label>               
                    <div>
                         <select class="form-control js-Dropdown-Busqueda" name='editejemplarestado' id='editejemplarestado'>                   
                          
                             <option value="0">Optimo</option>
                             <option value="1">Muy Bueno</option>
                             <option value="2">Regular</option>
                             <option value="3">Mala</option> 
                             <option value="4">Muy Mala</option>                           
                         </select>                      
                    </div>
                  </td>  
              </tr>
               <tr>
                  <td>
                  <label for="labelestantcod">Estantes</label>
                      <select class="form-control js-Dropdown-Busqueda" style="width:100%"  type="text" name="editestantcod" id="editestantcod">
                        <option value="">Seleccione una Estante</option>
                          <?php
                            $selEdit=mysqli_query($conexion,"SELECT * FROM $tablaEstante e");
                            while ($listEdit=mysqli_fetch_assoc($selEdit)) { ?> 
                              
                              <option value="<?php echo $listEdit["$varestcod"]?>" ><?php echo $listEdit["$varestdes"]?>         
                        </option>
                        <?php 
                          }
                          
                        ?>
                      </select>
                  </td> 
            </tr> 
            </tr> 
            <td>                    
                  <div class="form-group">    
                <label>Fecha de Adquisicion</label>
                <input type="date" name="editejemplarfecha" id="editejemplarfecha" value="">                
              </div>
              </td>
            <tr>              
              <td>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea2">Detalle del estado fisico:</label>
                             <textarea maxlength="59" class="form-control rounded-0" name="editejemplarcomentario" id="editejemplarcomentario" aria-describedby="editejemplarcomentario" placeholder="" rows="3"></textarea>
                           </div>
               </td>           
                   
          
              
            </tr>
        
           
          </tbody> 
        </table>         
       </div>                
            
        </form>

      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
         <div id="respuestaEditarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarEjemplar()">Editar</button>
      </div>
     
    </div>
  </div>
</div>




<!--MODAL PARA ELIMINAR Ejemplar-->

<div class="modal fade" id="modalBorrarEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #D5D9DF;">
        <h5 class="modal-title" id="deleteEjemplarTitle"><img src="img/icons/BookEditWideDel.png" width="35" height="30"> Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #D5D9DF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">
                <div id=notificationLabel style="color: black; font-weight: bold; text-align: center;"><label for="TituloLabel">Eliminar Ejemplar es una accion <b> Permanente </b> desea eliminar Ejemplar:</label></div>                
                <input type="text" class="form-control" name="delEjemplarcod" id="delEjemplarcod" aria-describedby="delEjemplarcod" placeholder="Ejemplar" hidden="true">
                <input type="text" class="form-control" name="delEjemplarnom" id="delEjemplarnom" aria-describedby="delEjemplarnom" placeholder="Ejemplar" hidden="true">
                           
                  <div id="labelBorrar" style="color: black; font-weight: bold; text-align: center;"></div>
                  <div align="center" name="cargarTablaRequisito" id="cargarTablaRequisito"></div>
    
              </div>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer" style="background: #D5D9DF;">
        <div id="respuestaBorrarEjemplar" style="color: red; font-weight: bold; text-align: center;"></div>         
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button"  id="borrarButton" name="borrarButton" class="btn btn-danger" onclick="deleteEjemplar()">Eliminar</button>
      </div>
     
    </div>
  </div>
</div>


<!-- Modal Ver ejemplar -->

<div class="modal fade" id="modalVerEjemplar" tabindex="-1" role="dialog" aria-labelledby="modalVerEjemplar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
       <div class="modal-body" style="background: #7D8BFF;">
        <form id="deleteForm" name="deleteForm">
          <div class="row">         
            <div class="col-sm-12">
              <div class="form-group">            
                   <label id="verEjemplartit"></label>                             
                   <div id="contenedordiv"></div>
                    <div class="row">
                     <div class="col">
                      <table class="table" cellspacing="2" cellpadding="1">                       
                       <tr align="left">
                         <td><h6>CODIGO EJEMPLAR:</h6></td>
                         <td> <label id="verEjemplarcodreg"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>TIPO DE ADQUISICION:</h6></td>
                         <td > <label id="verEjemplartipadqui"></label></td>                        
                       </tr>
                       <tr align="left">
                         <td><h6>DESCRIP. DE ADQUISICION:</h6></td>
                         <td colspan="3"> <label id="verEjemplardetadqui"></label></td>                        
                       </tr>                                      
                       <tr align="left">
                         <td><h6>DESCRIP.  FISICA:</h6></td>
                         <td colspan="3"><div><label id="verEjemplardesfisica"></label></div></td>             
                       </tr>
                     </table>
                   </div>                    
                   </div>   
                         
               </div>              
              </div>
            </div>
             <div class="modal-footer" style="background: #7D8BFF;">              
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>             
             </div>
          </div>    
        </form>
      </div>      
    </div>
  </div>
</div>
      
                                        
                   





<!--Script para recargar tabla al abrir esta pagina el scrip esta incluido en <top.php> dir src/js/tables/loader.js-->
<script>
    window.onload = function () {     
        
      recargarTabla();
      setSelect2();
      
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
  var variablecod=$("#codigoLib").val();  
  $("#cargarTabla").load("pages/Ejemplares/tablaEjemplares.php?pagina=1&busqueda="+busqueda+"&codigoLib="+variablecod);
  
  setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);
}


function recargarTablaLimpiar(){
    document.getElementById("formBusqueda").reset();
    $("#cargandoFeedback").show();
      $("#cargandoFeedback").html(' <img src="img/structures/replace.gif" style="max-width: 60%; margin-top:-10%; margin-left:-30%">').show(200);

    var busqueda=$("#textBusqueda").val();
    var variablecod=$("#codigoLib").val();

  
    $("#cargarTabla").load("pages/Ejemplares/tablaEjemplares.php?pagina=1&busqueda="+busqueda+"&codigoLib="+variablecod);

    setTimeout( function() {
      $("#cargandoFeedback").hide(500);
                           
    }, 1000);



    

  
}




//INSERTAR NUEVO Ejemplar
function insertarEjemplar(){       
        
  if ($("#formEjemplarnom").val()==""){
    $("#respuestaNuevoEjemplar").show();
    $("#respuestaNuevoEjemplar").html("Campo de Nombre del Ejemplar esta Vacio");  
  }else {
    $("#respuestaNuevoEjemplar").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);

    var url = "pages/Ejemplares/insertarEjemplar.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formNuevoEjemplar").serialize(),
              success: function (data){
                if (data==1) {
                    //success
                    $("#accionFeedback").show();
                    $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Nuevo Ejemplar agregado </div>");
                     recargarTabla();
                     limpiarFormularioEjemplar();
                    setTimeout(
                        function() {
                          
                          $("#accionFeedback").hide(500);          
                    }, 6000);
                    $("#respuestaNuevoEjemplar").hide(500);
                    $('#newEjemplarModal').modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaNuevoEjemplar").show();
                  $("#respuestaNuevoEjemplar").html("<div class='alert alert-warning' role='alert'>Esta Ejemplar ya ha sido agregado </div>");
                     recargarTabla();
                    setTimeout(
                        function() {
                          $("#respuestaNuevoEjemplar").hide(500);                                
                    }, 6000);
                    

                } else{
                  $("#respuestaNuevoEjemplar").show();
                  $("#respuestaNuevoEjemplar").html(data);
                     recargarTabla();

                    setTimeout(
                        function() {
                          $("#respuestaNuevoEjemplar").hide(500);                                
                    }, 6000);
                }

              }
            });

  }
}
//EDITAR Ejemplar
function editarEjemplar(){

  if ($("#editejemplarestado").val()==""){
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("Campo de Estado fisico del Ejemplar esta Vacio");
  }else if ($("#editejemplaringreso").val()==""){
    $("#respuestaEditarEjemplar").show();
    $("#respuestaEditarEjemplar").html("Campo de Tipo de ingreso del Ejemplare esta Vacio");
  }
  else {
    $("#respuestaEditarEjemplar").html('<img src="img/structures/replace.gif" style="max-width: 50%">').show(500);
    var url = "pages/ejemplares/editarEjemplar.php";
            $.ajax({
              type: "POST",
              url: url,
              data: $("#formEditEjemplar").serialize(),
              success: function (data){               
                if (data==1) {
                  //success
                  $("#accionFeedback").show();
                  $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar ha sido editado </div>");
                  recargarTabla();
                  setTimeout(
                      function() {
                        $("#accionFeedback").hide(500);
                        
                  }, 6000);
                  $("#respuestaEditarEjemplar").hide(500);    
                  $("#modalEditarEjemplar").modal('hide');

                } else if (data==0) {
                  //error
                  $("#respuestaEditarEjemplar").show();
                  $("#respuestaEditarEjemplar").html("<div class='alert alert-warning' role='alert'>Otro Ejemplar ya esta registrado con estos datos </div>");    
                  setTimeout(
                      function() {
                        $("#respuestaEditarEjemplar").hide(500);
                        
                       
                  }, 6000);
                  
                } else {
                  //any other error
                  $("#respuestaEditarEjemplar").show();
                  $("#respuestaEditarEjemplar").html(data);                  
                  setTimeout(
                      function() {
                        $("#respuestaEditarEjemplar").hide(500);
                        
                       
                  }, 6000);
                }
                  


              }
            });

  }
}
//BORRAR FORMULARIO DE NUEVO Ejemplar
function limpiarFormularioEjemplar(){
   document.getElementById("formNuevoEjemplar").reset();

}

//BORRAR Ejemplar
function deleteEjemplar(){
  $("#borrarButton").attr("disabled", true);

  if ($("#delEjemplarcod").val()==""){
    $("#respuestaBorrarEjemplar").show();
    $("#respuestaBorrarEjemplar").html("Codigo de Ejemplar necesario");
  }else {
    $("#labelBorrar").html('<img src="img/structures/replace.gif" style="max-width: 80%">').show(500);

    var url = "pages/Ejemplares/borrarEjemplar.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#deleteForm").serialize(),
      success: function (data){
        recargarTabla()
        if (data=="0"){
          // ERROR, Ejemplar TIENE LIBROS INSCRITOS
          var url = "pages/Ejemplares/requisitosBorrarEdit.php";
           $.ajax({
              type: "POST",
              url: url,
              data: $("#deleteForm").serialize(),
              success: function (data){
                  $("#labelBorrar").show();
                  $("#notificationLabel").html("");
                  $("#labelBorrar").html("No se puede borrar a este Ejemplar. pues esta siendo usado por los libros:");
                  $("#cargarTablaRequisito").show();
                  $("#cargarTablaRequisito").html(data);                           
              }
            });
        }else if (data=="1"){  

          $("#labelBorrar").show();
          $("#notificationLabel").html("<label for='TituloLabel'>Operacion finalizada</label>");
          $("#labelBorrar").html("<h5>Ejemplar ha sido eliminado</h5>");

          $("#modalBorrarEjemplar").modal('hide');
           //success
          $("#accionFeedback").show();
          $("#accionFeedback").html("<div class='alert alert-success' role='alert'>Ejemplar Eliminado </div>");
           setTimeout(
              function() {
                 $("#accionFeedback").hide(500);                         
           }, 6000);
         
        }            
      }
    });
  }
}

 $('#modalEditarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var varejemplarcod = button.data('varejemplarcod')
      var varejemplartitulo = button.data('varejemplartitulo')
      var varejemplarestante  = button.data('varejemplarestante')      
      var varejemplarcomentario  = button.data('varejemplarcomentario') 
      var inputprecio         = button.data('varejemplarprecio') 
      var varejemplarcondicion         = button.data('varejemplarcondicion')
      var varejemplartipoingreso         = button.data('varejemplartipoingreso')
      var varejemplardetaingreso         = button.data('varejemplardetaingreso')
      var varejemplarfecha         = button.data('varejemplarfecha') 

       
      var modal = $(this)
      modal.find('.modal-title').text('Editar Ejemplar: ' + varejemplartitulo );
     
        
       document.getElementById('editejemplarcomentario').value = varejemplarcomentario;      
       document.getElementById('editejemplarcodigo').value = varejemplarcod; 
       document.getElementById('inputprecio').value = inputprecio;
       //Se debe asignar el codigo que se buscara al 'select' no el nombre del campo.
       document.getElementById('editestantcod').value = varejemplarestante;
       document.getElementById('editejemplarestado').value = varejemplarcondicion;
       document.getElementById('editejemplartipoingreso').value = varejemplartipoingreso;
       document.getElementById('editejemplarfecha').value = varejemplarfecha; 
       document.getElementById('inputdetalle').value = varejemplardetaingreso;
       
       
        
    $('.js-Dropdown-Busqueda').select2({
        "selected": true
     });
   
      
    })


//Eliminar Ejemplar
  
     $('#modalBorrarEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 
      var varEjemplarcod = button.data('varEjemplarcod')
      var varejemplartitulo = button.data('varejemplartitulo')     

      $('#borrarButton').attr("disabled", false);  


      var modal = $(this)

       $("#notificationLabel").html('Esta es una accion <h5> Permanente. </h5> Desea Eliminar registro?:');
       $("#cargarTablaRequisito").html('');


      $("#labelBorrar").html('<h5> '+varejemplartitulo+' '+'<h5> ');
      document.getElementById('delEjemplarcod').value = varEjemplarcod;
      document.getElementById('delEjemplarnom').value = varejemplartitulo;
      
      
      
    })
//Ver ejemplar

$('#modalVerEjemplar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // 

       var varejemplarportada  = button.data('varejemplarportada')
       $("#contenedordiv").html('<img align=left src="'+varejemplarportada+'" width=200 height=350>')      
       var varejemplartitulo = button.data('varejemplartitulo') 
       var varejemplarcodreg = button.data('varejemplarcodreg')
       var varejemplartipadqui = button.data('varejemplartipadqui')
       var varejemplardetadqui = button.data('varejemplardetadqui')
       var varejemplardesfisica = button.data('varejemplardesfisica')       


      var modal = $(this)   
        
       $("#verEjemplartit").html('<h4 align=center>Perfil del libro: '+varejemplartitulo+' '+'<h4> ');
       $("#verEjemplarcodreg").html('<h6 align=center>'+varejemplarcodreg+' '+'<h6> ');
       $("#verEjemplartipadqui").html('<h6 align=center>'+varejemplartipadqui+' '+'<h6> '); 
       $("#verEjemplardetadqui").html('<h6 align=center>'+varejemplardetadqui+' '+'<h6> '); 
       $("#verEjemplardesfisica").html('<h6 align=center>'+varejemplardesfisica+' '+'<h6> ');  
       
      
    })

     //habilitar input dependiendo del tipo de ignreso
 
$( function() {
    $("#formejemplaringreso").change( function() {
        if ($(this).val() === "0") {
            $("#formprecio").prop("disabled", true);
            $("#formdetalle").prop("disabled", false);
            // si selecciona donado, borra lo que contiene el input de precio:
            document.getElementById('inputprecio').value="";
        } else {
            $("#formprecio").prop("disabled", false);
            $("#formdetalle").prop("disabled", true);
            document.getElementById('formdetalle').value="";
        }
    });
});
  


</script>
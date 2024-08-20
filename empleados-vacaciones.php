<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Control de vacaciones</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- DataTables Bootstrap 4 JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
</head>

<?php require 'layout/libreriasdatatable.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate/4.0.0/animate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php require 'nav.php'; ?>
<?php require_once('layout/sidebar.php'); ?>

<?php //parametro 2 de la siguiente funcion es el id del usuario actual 
$userId=$_SESSION['identity']->userId;
?>


<body>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>ADMINISTRACIÓN DE VACACIONES</h1>
    <hr>
  </div><!-- End Page Title -->
  <div class="container mt-4">
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="pestanas" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pestaña1" data-toggle="tab" href="#contenido1" role="tab" aria-controls="contenido1" aria-selected="true">Pendientes</a>
      </li>      
    </ul>
    <div class="row mt-3">
      <div class="col-3">
      <select id="numEmpFilter" name="numEmpFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
      <div class="col-3">
      <select id="nombreFilter" name="nombreFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
      <div class="col-3">
      <select id="departamentoFilter" name="departamentoFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
      <div class="col-3">
      <select id="areaFilter" name="areaFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
                              
    </div>
    <div class="row mt-3">
    <div class="col-4">
      <select id="fechaIngresoFilter" name="fechaIngresoFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
      <div class="col-4">
      <select id="diasPendientesFilter" name="diasPendientesFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>
      <div class="col-4">
      <select id="diasTomadosFilter" name="diasTomadosFilter[]" multiple="multiple" class="form-control">
      </select>
      </div>      
    </div>
    <br>
    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="contenidoPestanas">
      <!-- Contenido de la Pestaña 1 -->
      <div class="tab-pane fade show active" id="contenido1" role="tabpanel" aria-labelledby="pestaña1">
        <div class="table-responsive">
          
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th>Número de empleado</th>
                  <th>Nombre</th>
                  <th>Departamento</th>
                  <th>Area</th>
                  <th>Fecha de ingreso</th>
                  <th>Días pendientes</th> 
                  <th>Días tomados</th>
                </tr>                              
              </thead>
              <tbody>
                <tr>
                  <td>2566</td>
                  <td>Jean Kirstein</td>
                  <td>Contabilidad</td>
                  <td>Administración</td>
                  <td>11/07/2019</td>
                  <td>10</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td>8755</td>
                  <td>Roberto Reyes</td>
                  <td>Sistemas</td>
                  <td>Administración</td>
                  <td>01/09/2022</td>
                  <td>9</td>
                  <td>4</td>
                </tr>
                <tr>
                  <td>4345</td>
                  <td>Gonzalo Guerrero</td>
                  <td>Distribución</td>
                  <td>Operaciones</td>
                  <td>09/02/2021</td>
                  <td>2</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>6321</td>
                  <td>Ana Gómez</td>
                  <td>Contabilidad</td>
                  <td>Administración</td>
                  <td>15/03/2019</td>
                  <td>10</td>
                  <td>15</td>
                </tr>
                <tr>
                  <td>9876</td>
                  <td>Juan Pérez</td>
                  <td>Recursos Humanos</td>
                  <td>Administración</td>
                  <td>10/07/2021</td>
                  <td>12</td>
                  <td>8</td>
                </tr>
                <tr>
                  <td>1346</td>
                  <td>María Rodriguez</td>
                  <td>Desarrollo</td>
                  <td>Operaciones</td>
                  <td>05/02/2020</td>
                  <td>7</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>8522</td>
                  <td>Carlos Sánchez</td>
                  <td>Calidad</td>
                  <td>Operaciones</td>
                  <td>22/11/2018</td>
                  <td>5</td>
                  <td>9</td>
                </tr>
                <tr>
                  <td>7453</td>
                  <td>Laura Hernández</td>
                  <td>Marketing</td>
                  <td>Comercial</td>
                  <td>01/05/2022</td>
                  <td>15</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>4587</td>
                  <td>Erika Hernández</td>
                  <td>Ventas</td>
                  <td>Comercial</td>
                  <td>01/08/2009</td>
                  <td>6</td>
                  <td>9</td>
                </tr>
                </tbody>
              </table>

            
              <!--pintar a 3 meses como en la ventana de solicitud-->
                   
        </div>
      </div>

      

    </div>
  </div>




  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/i18n/es.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $(document).ready(function () {
        //let objOptions=;

        var table1 = $('#myTable').DataTable({
          lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
          "order": [[ 0, "desc" ]],
          layout: {
            topStart: {
              buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
            }
          },
          language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
          }        
        });         

        $.fn.select2.defaults.set('language', 'es');

        let numEmp = jQuery.unique(table1.columns(0).data().toArray()[0].sort());
        let nombre = jQuery.unique(table1.columns(1).data().toArray()[0].sort());
        let departamento = jQuery.unique(table1.columns(2).data().toArray()[0].sort());
        let area = jQuery.unique(table1.columns(3).data().toArray()[0].sort());
        let fechaIngreso = jQuery.unique(table1.columns(4).data().toArray()[0].sort());
        let diasPendientes = jQuery.unique(table1.columns(5).data().toArray()[0].sort());
        let diasTomados = jQuery.unique(table1.columns(6).data().toArray()[0].sort());
        
        numEmp.forEach(function(a){
          append_select('numEmpFilter', a);
        });

        nombre.forEach(function(a){
          append_select('nombreFilter', a);
        });
        
        departamento.forEach(function(a){
          append_select('departamentoFilter', a);
        });

        area.forEach(function(a){
          append_select('areaFilter', a);
        });

        fechaIngreso.forEach(function(a){
          append_select('fechaIngresoFilter', a);
        });

        diasPendientes.forEach(function(a){
          append_select('diasPendientesFilter', a);
        });

        diasTomados.forEach(function(a){
          append_select('diasTomadosFilter', a);
        });                                                
        

        $('#numEmpFilter').select2({
          placeholder: 'Número de empleado',
          maximumSelectionLength: 15
        });
      
       
        $('#nombreFilter').select2({
          placeholder: 'Nombre',
          maximumSelectionLength: 15
        });
           
        $('#departamentoFilter').select2({
          placeholder: 'Departamento',
          maximumSelectionLength: 15
        });
        
        $('#areaFilter').select2({
          placeholder: 'Área',
          maximumSelectionLength: 15
        });
        
        $('#fechaIngresoFilter').select2({
          placeholder: 'Fecha de ingreso',
          maximumSelectionLength: 15
        });
        
        $('#diasPendientesFilter').select2({
          placeholder: 'Días pendientes',
          maximumSelectionLength: 15
        });

        $('#diasTomadosFilter').select2({
          placeholder: 'Días tomados',
          maximumSelectionLength: 15
        });    
        
        
        
        $('#numEmpFilter').on('change', function(){
          recargar_tabla($(this), table1, 0);
        })
        
        $('#nombreFilter').on('change', function(){
          recargar_tabla($(this), table1, 1); 
        })
          
        $('#departamentoFilter').on('change', function(){
          recargar_tabla($(this), table1, 2);
        })
        
        $('#areaFilter').on('change', function(){
          recargar_tabla($(this), table1, 3);
        })

        $('#fechaIngresoFilter').on('change', function(){
          recargar_tabla($(this), table1, 4);
        })
        
        $('#diasPendientesFilter').on('change', function(){
          recargar_tabla($(this), table1, 5);
        })
        
        $('#diasTomadosFilter').on('change', function(){
          recargar_tabla($(this), table1, 6);
        })
        

      });
      

      const append_select = (filtro, element) => {
        $('#'+filtro).append( '<option value="'+element+'">'+element+'</option>' );
      }

      const recargar_tabla = (objFiltro, table, numColumna) => {
        var data = $.map( objFiltro.select2('data'), function( value, key ) {
          return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
        });

        //if no data selected use ""
        if (data.length === 0) {
          data = [""];
        }
                      
        //join array into string with regex or (|)
        var val = data.join('|');
                      
        //search for the option(s) selected
        table.column(numColumna)
        .search( val ? val : '', true, false )
        .draw(); 
        console.log(val);
      }
    </script>

    </main>
    <?php require 'layout/footer.php';?>
  </body>

</html>


    <!--
$(document).ready( function () {
  
  var table2 = $('#example').DataTable({
            initComplete: function () {
            count = 0;
            this.api().columns().every( function () {
                var title = this.header();
                //replace spaces with dashes
                title = $(title).html().replace(/[\W]/g, '-');
                var column = this;
                var select = $('<select id="' + title + '" class="select2" ></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                      //Get the "text" property from each selected data 
                      //regex escape the value and store in array
                      var data = $.map( $(this).select2('data'), function( value, key ) {
                        return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
                                 });
                      
                      //if no data selected use ""
                      if (data.length === 0) {
                        data = [""];
                      }
                      
                      //join array into string with regex or (|)
                      var val = data.join('|');
                      
                      //search for the option(s) selected
                      column
                            .search( val ? val : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
              
              //use column title as selector and placeholder
              $('#' + title).select2({
                multiple: true,
                closeOnSelect: false,
                placeholder: "Select a " + title
              });
              
              //initially clear select otherwise first option is selected
              $('.select2').val(null).trigger('change');
            } );
        }
  });
  
} );


    -->
<?php require 'nav.php'; ?>
<?php require 'layout/sidebar.php';?>

    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Bootstrap CSS -->
 <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="./imagenes/iconos/Capturalog.ico">
  <link rel="apple-touch-icon" href="./imagenes/iconos/Capturalog.ico">

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

  <!-- Font Awesome JS -->
  <script src="https://kit.fontawesome.com/d252494076.js" crossorigin="anonymous"></script>

  <!-- Custom JS -->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="assets/js/main.js"></script>
  <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

</body>


  <style type="text/css">

  button.active {

      background-color: green; /* Cambia el color de fondo cuando el botón está activo */
      color: white; /* Cambia el color del texto cuando el botón está activo */
  }

   .btn-info {
      color: #fff!important;
      background-color: #17a2b8!important;
      border-color: #17a2b8!important;
  }

.btn-danger {
    color: #fff!important;
    background-color: #dc3545!important;
    border-color: #dc3545!important;
}

.btn-success {
    color: #fff!important;
    background-color: #218838!important;
    border-color: #1e7e34!important;
}

div.dt-button-collection {
    top: -195px!important;
     left: -193.146px!important;
}

.button.dt-button, div.dt-button, a.dt-button, input.dt-button {
  position: relative;
  background-color: #4CAF50!important;
  border: none!important;
  font-size: 28px!important;
  color: #FFFFFF!important;
  padding: 20px!important;
  width: 200px;
  text-align: center;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

.searchPanesButton {
    float: right!important; // Hace que el botón flote hacia la derecha
    margin-right: 20px!important; // Añade un margen a la derecha para separar el botón de la tabla
}

button.dt-button:first-child, div.dt-button:first-child, a.dt-button:first-child, input.dt-button:first-child {
   margin-left: 70px!important; ;

}
body {
        font-family: "Open Sans", sans-serif;
        background: #052668;
        color: 'black;';
    }
</style>


  <main id="main" class="main">



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Empleados</h5>
                       <!-- Table with stripped rows -->
                 <div>
                    Mostrar/Ocultar columna:
                    <a class="toggle-vis" data-column="0"><button>Nombre</button></a> 
                    <a class="toggle-vis" data-column="1"><button>Cargo</button></a> 
                    <a class="toggle-vis" data-column="2"><button>Oficina</button></a> 
                    <a class="toggle-vis" data-column="3"><button>Edad</button></a> 
                    <a class="toggle-vis" data-column="4"><button>Fecha de inicio</button></a> 
                    <a class="toggle-vis" data-column="5"><button>Salario</button></a>
                </div>
                     <br>
    <table class="mdl-data-table" id="myTable" style="font-size:74%;">
       <thead>
          <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Oficina</th>
            <th>Edad</th>
            <th>Fecha de inicio</th>
            <th>Salario</th>
        </tr>
        </thead>
         <tbody>
            <tr>

                <td><a href="prueba1.php"><img src="assets/img/idempleado.png" width="35" height="35" alt="mas"></a>Kimberly Blanco</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                 <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012-12-02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012-08-06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010-10-14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009-09-15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008-12-13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Kimberly Blanco</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008-12-19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013-03-03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008-10-16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012-12-18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                  <td><img src="assets/img/idempleado.png"  style="max-height: 30px;">Roberto Reyes</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010-03-17</td>
                <td>$385,750</td>
            </tr>
          
        </tbody>
      
    </table>
          
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>


  

<script type="text/javascript">
 

    $(document).ready(function() {

        var table = $('#myTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 5,
           lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
           scrollY: '200px',
            columnDefs: [
                { width: '30%', targets: 2 }
            ],
   columnDefs: [
        {
            targets: ['_all'],
            className: 'mdc-data-table__cell',
        },
    ],

            "bDestroy": true, 

            language: {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_   ",
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
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %ds fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "renameState": "Cambiar nombre",
                "updateState": "Actualizar",
                "createState": "Crear Estado",
                "removeAllStates": "Remover Estados",
                "removeState": "Remover",
                "savedStates": "Estados Guardados",
                "stateRestore": "Estado %d"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de",
                "notContains": "No Contiene",
                "notStartsWith": "No empieza con",
                "notEndsWith": "No termina con"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)",
                "search": "Buscar:"

        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo",
            "search": "Buscar:"

    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "stateRestore": {
        "creationModal": {
            "button": "Crear",
            "name": "Nombre:",
            "order": "Clasificación",
            "paging": "Paginación",
            "search": "Busqueda",
            "select": "Seleccionar",
            "columns": {
                "search": "Búsqueda de Columna",
                "visible": "Visibilidad de Columna"
            },
            "title": "Crear Nuevo Estado",
            "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
    }
    },


    dom: 'lBfrtip',

    buttons: [
      {
        extend: 'searchPanes',
        config: {
            viewTotal: true ,
             initCollapsed: true,
              threshold: 1,
            columns: [0,5] ,
                        deferRender: true,


        }
      },

{

                extend:    'excelHtml5',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                     text:      '<i class="fas fa-file-excel"></i> ',
                     className: 'btn btn-success',
                    exportOptions: {
                        search: 'applied',
                        order: 'applied',
                        stripNewlines: false
                    },


                  
                download: 'open',
                messageBottom: 'La informacion solo corresponde a Grupo Empacados SA CV',
                filename: function() {
                return "Lista de Empleados"     
              },   
                   excelStyles: [                      
                {                 
                    id: 'dateISO',
                    template: "gray_medium",   
                     dataType: 'DateTime'

                },
                {
                    cells: ['sh', 'sf'],                // Use Smart References (s) to target the header row (h)
                    style: {                    // The style definition
                        font: {                 // Style the font
                            size: 12,           // Size 14
                            b: false,           // Turn off the default bolding of the header row
                        },
                        fill: {                 // Style the cell fill
                            pattern: {
                            fgColor: "c31919",
                            bgColor: "C3D898",
                        }
                        }


                    }

                }
            ]

            },

            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
           
            {
                extend:    'copy',
                text:      '<i class="fa-solid fa-paste"></i>',
                titleAttr: 'Copiar',
                copyTitle: 'Copiar',

                className: 'btn btn-info',
                              copySuccess: {
                    1: "Los Datos han sido copiados",
                    _: "Grupo %Empacados"
                },
                    copyTitle: 'Datos Copiados'

            },

             {
               
                    titleAttr: 'Exportar a PDF',
                    download: 'open',
                    extend: 'pdfHtml5',
                    orientation: 'landscape', //portrait
                    pageSize: 'A4', 
                    text:      '<i class="fas fa-file-pdf"></i> ',
                    className: 'btn btn-danger',
                         
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied',
                        multiline: true,
                        columns: ':visible',
                        stripHtml: true
                    },
                      tableHeader: {
                    bold: true,
                    fontSize: 10.5,
                    color: 'black'
                 },
                  header: {
                    fontSize: 28,
                    color: "#7E4F29",
                    bold: true
                    
                      
                      },
                      subheader: {
                     fontSize: 15,
                     bold: true
                      },


                    customize: function (doc) {
                    doc.content[1].table.body[0].forEach(function(h) {
                    h.fillColor = '#c31919';
                    });


                        //Remove the title created by datatTables
                        doc.content.splice(0,1);
                        //Create a date string that we use in the footer. Format is dd-mm-yyyy
                        var now = new Date();
                        var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                       
                        var logo = 'data:image/png;base64,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';
                        
                        doc.pageMargins = [15,70,20,30];
                        
                        doc.defaultStyle.fontSize = 12;
                        
                        doc.styles.tableHeader.fontSize = 12;
                        
                        doc['header']=(function() {
                            return {
                                columns: [


                                    {
                                        image: logo,
                                        width: 90,
                                    },
                                    {

                                        alignment: 'center',
                                        text: 'Lista de Empleados',
                                        fontSize: 25,
                                    },
                                    {
                                        alignment: 'right',
                                        fontSize: 14,
                                         text: 'Empacados',

                                    }
                                ],
                                margin: 20
                            }
                        });

                       doc['footer'] = (function(page, pages) {
                        return {
                            columns: [
                                {
                                    alignment: 'left',
                                    text: ['Creacion : ', { text: jsDate.toString() }]
                                },
                                {
                                    alignment: 'right',
                                    text: [
                                        'Paginas ', { text: page.toString() }, ' of ', { text: pages.toString() }
                                    ]
                                }
                            ],
                    margin: 20
                    }
                });
                             


          
             
                }
                
             

                    
            }    
    ]



    });
 
     $('.toggle-vis').on('click', function() {
        var column = table.column($(this).data('column'));
        column.visible(!column.visible());

     // Alternar la clase activa del botón
        $(this).find('button').toggleClass('active');
    });
});


</script>

<script type="text/javascript">
  
const table = new DataTable('#myTable', {
    paging: false,
    scrollY: '200px'
});
 
document.querySelectorAll('a.toggle-vis').forEach((el) => {
    el.addEventListener('click', function (e) {
        e.preventDefault();
 
        let columnIdx = e.target.getAttribute('data-column');
        let column = table.column(columnIdx);
 
        // Toggle the visibility
        column.visible(!column.visible());
    });


    
});

</script>

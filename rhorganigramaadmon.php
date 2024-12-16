
<?php 
  require_once('layout/session.php');
  require_once('helpers/utils.php');
  require_once('helpers/Consultas.php');
?>
<?php require 'layout/libreriasdatatable.php';?>
<?php require_once('layout/sidebar.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organigrama Empacados</title>
  <!-- Include OrgChart JS library -->
  <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
  <!-- Font Awesome -->
<script src="https://balkan.app/js/OrgChart.js"></script>
<?php require 'nav.php'; ?>
<!-- <div id="tree"></div> -->
  <style>

   html, body {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        overflow: auto;
    }

    .boc-edit-form-instruments {
    margin: 42px 10px 0 10px;
    text-align: center;
    min-height: 50px;
    }

    .boc-search{
        margin-top:1rem;
    }

    #tree {
        /* margin-top:50px; */
        width: 100%;
        height: 100%;  
        /* background-image: url("assets/img/IMGlogin.png");
        background-size: cover;
        background-repeat: no-repeat; */
    }

    #tree.boc-light{
        margin-top:4rem;
    }
/* 
    #tree.boc-light label{
        display:none;
    } */

    /* .loader{
        display:none;
    } */

    .boc-filter{
        display:none;
    }
    
    /* .boc-img-button{
        background-color: #880015 !important;;
    } */
    
    .boc-img-button{
        display:none !important;
    }

    .boc-edit-form-instruments{
        margin: 0 !important;
    }

    text{
        fill:#720e15;
    }

    .boc-edit-form-title {
        color: #928384;
        margin: 0;
        padding: 14px 17px 7px 17px;
    }

    .boc-edit-form-header{
        /* background-color: #E8E8E8 !important; */
        background-image: url("assets/img/pragna-organiks-fondo-sombra.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }

    rect{
        fill:#E8E8E8;
        stroke: #606060;
        stroke-width: 3;
    }

    .boc-input>label{
        Display:none;
    }

    path{
        stroke:gray;
    }

    circle{
        stroke:gray;
    }

    .filter-item:hover {
        background-color: #CF043C;
    }

    .filter-item-hovered rect {
        fill: #CF043C;
    }

    ol, ul {
    padding-left: .5rem;
    }

    g.node g rect{
        display:none;
    }
    
    g.node g circle{
        display:none;
    }

    .orgchart .node {
        background-color: #B06161 !important; /* Cambia este color según tus preferencias */
    }

    .contenedor_puestos{
        margin:0rem auto 0 1rem;
        /* height:17rem; */
        max-width:75%;
        overflow:auto;
        /* background-color:blue;
        border:3rem solid red; */
    }

    .chico{
        max-width:80%;
    }

    body{
        margin-top:6rem
    }

  </style>
  
</head>
<?php $ListYearsUsers = Consultas::listYearsUsers($conn); ?>
<body class="toggle-sidebar">

<!-- <div class="contenedor_puestos">

<table class="table table-dark table-striped chico">
    <thead>
        <h2>Personal Cubierto</h2>
    </thead>
    <tbody>
      <th scope="column">area</th>
      <td colspan="2" class="">Enero</td>
      <td>febrero</td>
      <td>marzo</td>
      <td>abril</td>
      <td>mayo</td>
      <td>junio</td>
      <td>julio</td>
      <td>agosto</td>
      <td>septiembre</td>
      <td>octubre</td>
      <td>noviembre</td>
      <td>diciembre</td>
    </tr>
    <tr>
      <th scope="row">Administracion</th>
      <td colspan="2" class="">28/28</td>
      <td>29/29</td>
      <td>27/28</td>
      <td>25/28</td>
      <td>28/28</td>
      <td>27/28</td>
      <td>28/29</td>
      <td>28/29</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
    </tr>
    <tr>
      <th scope="row">comercial</th>
      <td colspan="2" class="">28/28</td>
      <td>28/29</td>
      <td>27/28</td>
      <td>25/28</td>
      <td>28/28</td>
      <td>27/28</td>
      <td>28/29</td>
      <td>28/29</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
    </tr>
    <tr>
      <th scope="row">operaciones</th>
      <td colspan="2" class="">28/28</td>
      <td>28/29</td>
      <td>27/28</td>
      <td>25/28</td>
      <td>28/28</td>
      <td>27/28</td>
      <td>28/29</td>
      <td>28/29</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
    </tr>
    <tr>
      <th scope="row">industrial</th>
      <td colspan="2" class="">28/28</td>
      <td>28/29</td>
      <td>27/28</td>
      <td>25/28</td>
      <td>28/28</td>
      <td>27/28</td>
      <td>28/29</td>
      <td>28/29</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
    </tr>
    <tr>
      <th scope="row">totales</th>
      <td colspan="2" class="">28/28</td>
      <td>28/29</td>
      <td>27/28</td>
      <td>25/28</td>
      <td>28/28</td>
      <td>27/28</td>
      <td>28/29</td>
      <td>28/29</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
      <td>28/28</td>
    </tr>
  </tbody>
</table>
<br> -->
<!-- <table class="table table-dark table-striped chico">
    <thead>
        <h2>Puestos por area</h2>
        <div class="col-3 form-group">
          <select class="form-select" id="anios">
                  <option value="">- Seleccione -</option>
                  <?php for( $i = 0; $i < count($ListYearsUsers); $i++){?>
                        <option value="<?= $ListYearsUsers[$i]['aniosUser']?>">
                        <?= $ListYearsUsers[$i]['aniosUser']?>
                        </option>
                    <?php } ?>
                </select>
          </div>
    </thead>
    <tbody>
      <th scope="column">area</th>
      <td colspan="2" class="">Enero</td>
      <td>febrero</td>
      <td>marzo</td>
      <td>abril</td>
      <td>mayo</td>
      <td>junio</td>
      <td>julio</td>
      <td>agosto</td>
      <td>septiembre</td>
      <td>octubre</td>
      <td>noviembre</td>
      <td>diciembre</td>
    </tr>
    <tr>
      <th scope="row">Administracion</th>
      <td colspan="2" class="">18</td>
      <td>19</td>
      <td>22</td>
      <td>18</td>
      <td>18</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
    </tr>
    <tr>
      <th scope="row">comercial</th>
      <td colspan="2" class="">18</td>
      <td>19</td>
      <td>22</td>
      <td>18</td>
      <td>18</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
    </tr>
    <tr>
      <th scope="row">operaciones</th>
      <td colspan="2" class="">18</td>
      <td>19</td>
      <td>22</td>
      <td>18</td>
      <td>18</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
    </tr>
    <tr>
      <th scope="row">industrial</th>
      <td colspan="2" class="">18</td>
      <td>19</td>
      <td>22</td>
      <td>18</td>
      <td>18</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
    </tr>
    <tr>
      <th scope="row">totales</th>
      <td colspan="2" class="">18</td>
      <td>19</td>
      <td>22</td>
      <td>18</td>
      <td>18</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
      <td>19</td>
    </tr>
  </tbody>
</table> -->

<!-- <div class="tab-content" id="contenidoPestanas">
            <div class="tab-pane fade show active" id="contenido1" role="tabpanel"
              aria-labelledby="pestaña1-tab">
              <table class="table table-striped table-bordered display nowrap" id="myTable1" style="font-size:74%;width:100%;">
                <thead>
                <h2>Puestos por area</h2>
                  <tr>
                    <th>Area</th>
                    <th>Enero</th>
                    <th>Febrero</th>
                    <th>Marzo</th>
                    <th>Abril</th>
                    <th>Mayo</th>
                    <th>Junio</th>
                    <th>Julio</th>
                    <th>Agosto</th>
                    <th>Septiembre</th>
                    <th>Octubre</th>
                    <th>Noviembre</th>
                    <th>Diciembre</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Administracion</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                      <td>Comercial</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                      <td>Operaciones</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                      <td>Industrial</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                      <td>Totales</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                </tbody>
              </table>
            </div>

        </div>


</div> -->

  <!-- Container for the OrgChart -->
<div id="tree"></div>

<script>
    $("anios").on("change", function(){

       let aniosParam = $("anios").val();

    })
</script> 

<script>

window.onload = function(){
    
    OrgChart.elements.myTextFunction = function (data, editElement, minWidth, readOnly) {
        var id = OrgChart.elements.generateId();
        var value = data[editElement.binding];
        if (value == undefined) value = '';
        if (readOnly && !value) { 
            
            return {
                html: ''
            };
        }
        var rOnlyAttr = readOnly ? 'readonly' : '';
        var rDisabledAttr = readOnly ? 'disabled' : '';
        return {
            html: `<div class="boc-form-field" style="min-width: 280px;">
                        <div class="boc-input">
                            <label for="${id}" class="hasval">${editElement.label}</label>
                            <div style="height: 50px; padding: 18px 10px 2px 9px; width: 100%; box-sizing: border-box; border-style: solid #ffffff;  border-width: 1px; margin-left: 16px;"><ol style="list-style: auto;">${value}</ol></div>
                        </div>
                    </div>`,
            id: id,
            value: value
        };
    
    };
    

    OrgChart.elements.myImg = function (data, editElement, minWidth, readOnly) {
        var id = OrgChart.elements.generateId();
        var value = data[editElement.binding];
        if (value == undefined) value = '';
        if (readOnly && !value) {
            return {
                html: ''
            };
        }
        var rOnlyAttr = readOnly ? 'readonly' : '';
        var rDisabledAttr = readOnly ? 'disabled' : '';
        return {
            html: ''
        };
    
    };

    var chart = new OrgChart(document.getElementById("tree"), {
        template: "ana",
        layout: OrgChart.mixed,
        filterBy: ['title'],
        mouseScrool: OrgChart.action.ctrlZoom,
        enableSearch: true,
        scaleInitial: OrgChart.match.height,
        mouseScrool: OrgChart.none,
        nodeBinding: {
            field_0: "name",
            field_1: "job",
            img_0: "img",
            function:"function"
        },
        nodeMenu: {
            add: {text: 'add'}
        },
        menu: {
            pdf: { text: "Exportar PDF" },
            png: { text: "Exportar PNG" },
        },
        tags: {
            filter: {
                template: 'dot',
                template: 'filtered'
            }
        },
        editForm: {
            elements: [
                { type: 'textbox', label: 'Nombre Completo', binding: 'name' },
                { type: 'textbox', label: 'Puesto', binding: 'job' },
                { type: 'textbox', label: 'Correo Electrónico', binding: 'email' },
                { type: 'textbox', label: 'Teléfono', binding: 'contact' },
                { type: 'textbox', label: 'Extension', binding: 'ext' },
                { type: 'textbox', label: 'Teléfono Movil', binding: 'contact2' },
                { type: 'myTextFunction', label: 'Funciones', binding: 'function' },
                { type: 'myImg', label: 'Imagen', binding: 'img' }
            ],
            buttons:  {
                edit : null,
                pdf : null,
                share : null
            }
        },
    
    });
    
    OrgChart.SEARCH_PLACEHOLDER = "Buscar...";
    
    
    chart.filterUI.on('add-filter', function(sender, args){
        var names = Object.keys(sender.filterBy);
        var index = names.indexOf(args.name);
        if (index == names.length - 1) {
            args.html += `<div data-btn-reset style="color: #039BE5;">reset</div>`;
        }
    });
    
    chart.filterUI.on('add-item', function(sender, args){
        var count = 0;
        var totalCount = 0;
        for (var i = 0; i < sender.instance.config.nodes.length; i++){
            var data = sender.instance.config.nodes[i];      
            if (data[args.name] != undefined){
                totalCount++;
    
                if (data[args.name] == args.value){     
                    count++;
                }
            }
        }
    
        var dataAllAttr = '';
        if (args.text == '[All]'){
            count = totalCount;
            dataAllAttr = 'data-all';
        }
        args.html = `<div class="filter-item">
                        <input ${dataAllAttr} type="checkbox" id="${args.value}" name="${args.value}" ${args.checked ? 'checked' : ''}>
                        <label for="${args.value}">${args.text} (${count})</label>
                    </div>`;
    });
    chart.filterUI.on('update', function(sender, args){
        var btnResetElement = sender.element.querySelector('[data-btn-reset]');
        btnResetElement.addEventListener('click', function(e){
            sender.filterBy = null;
            sender.update();
            sender.instance.draw();
        });
    });
    
    chart.filterUI.on('show-items', function(sender, args){
        var filterItemElements = sender.element.querySelectorAll('.filter-item');
        for(var i = 0; i < filterItemElements.length; i++){        
            filterItemElements[i].addEventListener('mouseenter', function(e){
                var val = e.target.querySelector('input').id;        
                if (val != args.name){//[All]
                    for(var j = 0; j < sender.instance.config.nodes.length; j++){
                        var data = sender.instance.config.nodes[j];
                        if (data[args.name] == val){
                            var nodeElement = sender.instance.getNodeElement(data.id);
                            nodeElement.classList.add('filter-item-hovered');
                        }
                    }
                }
            });
            
            filterItemElements[i].addEventListener('mouseleave', function(e){
                var val = e.target.querySelector('input').id;           
                if (val != args.name){//[All]
                    for(var j = 0; j < sender.instance.config.nodes.length; j++){
                        var data = sender.instance.config.nodes[j];
                        if (data[args.name] == val){
                            var nodeElement = sender.instance.getNodeElement(data.id);
                            nodeElement.classList.remove('filter-item-hovered');
                        }
                    }
                }
            });
        }
    });
    
    chart.onInit(function(args){
        this.filterUI.show('title');
    });
    
    <?php $user = Consultas::listUsersImage($conn); ?>
    
    chart.load([
    
        <?php
        for($i = 0; $i < count($user); $i++){ ?>
        { 
            id: "<?=$user[$i]['usuarioId'] ?>", 
            pid: "<?=$user[$i]['superuserId'] ?>", 
            name: "<?=$user[$i]['nombre']," ", $user[$i]['apellido1'], " ", $user[$i]['apellido2']?> ", 
            job: "<?= $user[$i]['puesto']?>", 
            img:"<?= $user[$i]['ruta']?>",
            function:"<?= $user[$i]['funciones']?>"
        },
        <?php  } ?>
    
    ]);
};


</script> 

<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<!-- <script src="assets/vendor/quill/quill.min.js"></script> -->
<!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
<!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
<!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php require 'layout/footer.php';?>
</body>

</html>

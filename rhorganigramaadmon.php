
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
    

  </style>
  
</head>

<body class="toggle-sidebar">

  <!-- Container for the OrgChart -->
<div id="tree"></div>

<script>

window.onload = function(){

    OrgChart.templates.cool = Object.assign({}, OrgChart.templates.ana);
    OrgChart.templates.cool.defs = '<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="cool-shadow"><feOffset dx="0" dy="4" in="SourceAlpha" result="shadowOffsetOuter1" /><feGaussianBlur stdDeviation="10" in="shadowOffsetOuter1" result="shadowBlurOuter1" /><feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.1 0" in="shadowBlurOuter1" type="matrix" result="shadowMatrixOuter1" /><feMerge><feMergeNode in="shadowMatrixOuter1" /><feMergeNode in="SourceGraphic" /></feMerge></filter>';
  
    OrgChart.templates.cool.size = [310, 180];
    OrgChart.templates.cool.node = '<rect filter="url(#cool-shadow)"  x="0" y="0" height="170" width="310" fill="red" stroke-width="2" stroke="#eeeeee" rx="10" ry="10"></rect><rect fill="#ffffff" x="100" y="10" width="200" height="100" rx="10" ry="10" filter="url(#cool-shadow)"></rect><rect stroke="#eeeeee" stroke-width="1" x="10" y="120" width="290" fill="#ed1c24" rx="10" ry="10" height="40"></rect><text  style="font-size: 10px;" fill="#afafaf" x="110" y="75">EXTENSIÓN</text>'
        + '<image  xlink:href="images/icons/telefono.svg" x="110" y="80" width="11" height="11"></image>';
  
    OrgChart.templates.cool.img = '<clipPath id="{randId}"><rect  fill="#ffffff" stroke="#039BE5" stroke-width="5" x="10" y="10" rx="10" ry="10" width="80" height="100"></rect></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="10" y="10"  width="80" height="100"></image><rect fill="none" stroke="#ed1c24" stroke-width="2" x="10" y="10" rx="10" ry="10" width="80" height="100"></rect>';
  
    OrgChart.templates.cool.name = '<text data-width="150" data-text-overflow="multiline" style="font-size: 12px; font-weight: 900;" fill="#ed1c24" x="110" y="30">{val}</text>';
    OrgChart.templates.cool.job = '<text  data-width="290" text-anchor="middle" style="font-size: 11px; font-weight: 900;" fill="#ffffff" x="155" y="145">{val}</text>';

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
        <?php } ?>
    
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

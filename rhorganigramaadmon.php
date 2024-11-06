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

    .boc-search{
        margin-top:1rem;
    }

    #tree {
        /* margin-top:50px; */
        width: 100%;
        height: 100%;  
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

    .boc-edit-form-header{
        background-color: #880015 !important;
    }

    /* .boc-img-button{
        background-color: #880015 !important;;
    } */
    
    .boc-img-button{
        display:none !important;
    }

    .boc-input>label{
        Display:none;
    }

    .filter-item:hover {
        background-color: #CF043C;
    }

    .filter-item-hovered rect {
        fill: #CF043C;
    }

    .orgchart .node {
        background-color: #B06161 !important; /* Cambia este color según tus preferencias */
    }

    .custom-node {
    padding: 10px;
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 5px;
}
.boc-toolbar-container{
    display:none;
}

.custom-node strong {
    color: #333;
    font-size: 16px;
}

.custom-node p {
    margin: 0;
    color: #666;
}


  </style>
  
</head>

<body class="toggle-sidebar">

  <!-- Container for the OrgChart -->
<div id="tree"></div>

<script>

window.onload = function () {

OrgChart.templates.cool = Object.assign({}, OrgChart.templates.ana);
OrgChart.templates.cool.defs = '<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="cool-shadow"><feOffset dx="0" dy="4" in="SourceAlpha" result="shadowOffsetOuter1" /><feGaussianBlur stdDeviation="10" in="shadowOffsetOuter1" result="shadowBlurOuter1" /><feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.1 0" in="shadowBlurOuter1" type="matrix" result="shadowMatrixOuter1" /><feMerge><feMergeNode in="shadowMatrixOuter1" /><feMergeNode in="SourceGraphic" /></feMerge></filter>';

OrgChart.templates.cool.size = [310, 180];
OrgChart.templates.cool.node = '<rect filter="url(#cool-shadow)"  x="0" y="0" height="170" width="310" fill="#ffffff" stroke-width="2" stroke="#eeeeee" rx="10" ry="10"></rect><rect fill="#ffffff" x="100" y="10" width="200" height="100" rx="10" ry="10" filter="url(#cool-shadow)"></rect><rect stroke="#eeeeee" stroke-width="1" x="10" y="120" width="290" fill="#ed1c24" rx="10" ry="10" height="40"></rect><text  style="font-size: 10px;" fill="#afafaf" x="110" y="75"></text>';
OrgChart.templates.cool.img = '<clipPath id="{randId}"><rect  fill="#ffffff" stroke="#039BE5" stroke-width="5" x="10" y="10" rx="10" ry="10" width="80" height="100"></rect></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="10" y="10"  width="80" height="100"></image><rect fill="none" stroke="#ed1c24" stroke-width="2" x="10" y="10" rx="10" ry="10" width="80" height="100"></rect>';

OrgChart.templates.cool.name = '<text data-width="150" data-text-overflow="multiline" style="font-size: 12px; font-weight: 900;" fill="#ed1c24" x="110" y="30">{val}</text>';
OrgChart.templates.cool.job = '<text  data-width="290" text-anchor="middle" style="font-size: 11px; font-weight: 900;" fill="#ffffff" x="155" y="145">{val}</text>';
OrgChart.templates.cool.job2 = '<text  data-width="290" text-anchor="middle" style="font-size: 12px; font-weight: 900;" fill="#ffffff" x="146" y="25">{val}</text>';
OrgChart.templates.cool.ext = '<text style="font-size: 12px;" fill="#afafaf" x="125" y="90" >{val}</text>';
OrgChart.templates.cool.svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:block;" width="{w}" height="{h}" viewBox="{viewBox}">{content}</svg>';

OrgChart.templates.cool.minus = '<circle cx="15" cy="15" r="15" fill="#fafafa" stroke="#ed1c24" stroke-width="1"></circle>'
+ '<line x1="5" y1="15" x2="25" y2="15" stroke-width="1" stroke="#ed1c24"></line>';

OrgChart.templates.cool.plus = '<rect x="-11" y="5" height="22" width="50" rx="10" ry="10" stroke-width="1" fill="#ffffff" stroke="#ed1c24"></rect>'
    + '<circle stroke="#ed1c24" stroke-width="2" fill="#ed1c24" cx="6" cy="13" r="1.4"></circle> '
    + '<rect x="2.5" y="17" rx="1.5" ry="1.5" height="2.5" width="7" stroke-width="1" fill="#ed1c24" stroke="#ed1c24"></rect>'
    + '<line x1="2" y1="19" x2="10" y2="19" stroke-width="2" stroke="#ed1c24"></line>'
    + '<text text-anchor="middle" style="font-size: 10px;cursor:pointer;" font-weight="bold" fill="#ed1c24" x="21" y="19">{collapsed-children-count}</text>';

OrgChart.templates.cool.editFormHeaderColor = '#ed1c24';
//Departamentos nombre
OrgChart.templates.red = Object.assign({}, OrgChart.templates.cool);
OrgChart.templates.red.size = [290, 40];
OrgChart.templates.red.node = 
    '<rect stroke="#eeeeee" stroke-width="1" x="0" y="0" width="290" fill="#ed1c24" rx="10" ry="10" height="40"></rect>';

OrgChart.slinkTemplates.myTemplate2 = Object.assign({}, OrgChart.slinkTemplates.yellow);
OrgChart.slinkTemplates.myTemplate2.link = '<path  marker-start="url(#arrowSlinkYellow)" marker-end="url(#dotSlinkYellow)" stroke-linejoin="round" stroke="#FFCA28" stroke-width="2" fill="none" d="{d}" />';

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

var chart;
chart = new OrgChart(document.getElementById('tree'), {
    template: 'cool',
    scaleInitial: OrgChart.match.boundary,
    layout: OrgChart.treeLeftOffset,
    enableSearch: false,
    levelSeparation: 50,
    siblingSeparation: 50,
    toolbar: {
    layout: true,
    zoom: true,
    fit: true,
    expandAll: true
    },
    nodeBinding: {
        name: 'name',
        job: 'job',
        job2: 'job2',
        email: 'email',
        contact: 'contact',
        ext: 'ext',
        contact2: 'contact2',
        function: 'function',
        img: 'img'
    },
    tags: {
        red: {
        template: "red"
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
    /*slinks: [ 
        {from: 160, to: 153, template: 'myTemplate2' },
        {from: 163, to: 153, template: 'myTemplate2' }
    ]*/
});

<?php 
$user = Consultas::listUsersImage($conn);
?>

    // var funciones = '<li style="list-style: auto;">Atención de clientes de ventas industria en sucursal.</li><li style="list-style: auto;">Gestión de cotizaciones y ventas por WhatsApp, llamadas telefónicas, y correo para clientes de industria.</li><li style="list-style: auto;">Visitas y accesorias técnicas de diversos proveedores con los clientes en sitio. </li><li style="list-style: auto;">Reporte de actividades diarias.</li>';

    chart.load([

        <?php
        for($i = 0; $i < count($user); $i++){ ?>
            { 
                id: "<?=$user[$i]['usuarioId'] ?>", 
                pid: "<?=$user[$i]['superuserId'] ?>", 
                name: "<?=$user[$i]['nombre']," ", $user[$i]['apellido1'], " ", $user[$i]['apellido2']?> ", 
                job: "<?= $user[$i]['puesto']?>", 
                function: "<?= $user[$i]['funciones']?>", 
                img:"<?= $user[$i]['ruta']?>"
            },
        <?php } ?>

    ]);

}
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
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
        background-image: url("assets/img/IMGlogin.png");
        background-size: cover;
        background-repeat: no-repeat;
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

    rect{
        fill:#880015;
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

  </style>
  
</head>

<body class="toggle-sidebar">

  <!-- Container for the OrgChart -->
<div id="tree"></div>

<script>

// Document.querySelectorAll('.boc-input').innerHTML = "si"

//JavaScript

var chart = new OrgChart(document.getElementById("tree"), {
    layout: OrgChart.mixed,
    filterBy: ['title'],
    mouseScrool: OrgChart.action.ctrlZoom,
    enableSearch: true,
    scaleInitial: OrgChart.match.height,
        mouseScrool: OrgChart.none,

    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img",
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
        { id: "<?=$user[$i]['usuarioId'] ?>", pid: "<?=$user[$i]['superuserId'] ?>", name: "<?=$user[$i]['nombre']," ", $user[$i]['apellido1'], " ", $user[$i]['apellido2']?> ", title: "<?= $user[$i]['puesto']?>", img:"<?= $user[$i]['ruta']?>"},
    <?php } ?>

    // { id: "1", name: "Pedro Chapa Chavez", title: "Director General", email: "amber@domain.com", img: "https://cdn.balkan.app/shared/1.jpg" },
    // { id: "2", pid: "1", name: "Kimberly Michel", title: "Consultor SAP", email: "sistemas@empacados.com", img: "https://cdn.balkan.app/shared/2.jpg" },
    // { id: "3", pid: "2", tags: ['partner'], name: "Janae Barrett", title: "Technical Director", img: "https://cdn.balkan.app/shared/3.jpg" },
    // { id: "4", pid: "1", name: "Aaliyah Webb", title: "Manager", email: "jay@domain.com", img: "https://cdn.balkan.app/shared/4.jpg" },
    // { id: "5", pid: "1", name: "Aaliyah Webb", title: "Manager", email: "jay@domain.com", img: "https://cdn.balkan.app/shared/4.jpg" },
    // { id: "6", pid: "2", name: "Elliot Ross", title: "QA", img: "https://cdn.balkan.app/shared/5.jpg" },
    // { id: "7", pid: "2", name: "Anahi Gordon", title: "QA", img: "https://cdn.balkan.app/shared/6.jpg" },
    // { id: "8", pid: "2", name: "Knox Macias", title: "QA", img: "https://cdn.balkan.app/shared/7.jpg" },
    // { id: "9", pid: "3", name: "Nash", title: ".NET Team Lead", email: "kohen@domain.com", img: "https://cdn.balkan.app/shared/8.jpg" },
    // { id: "10", pid: "8", name: "Alice Gray", title: "Programmer", img: "https://cdn.balkan.app/shared/10.jpg" },
    // { id: "11", pid: "8", name: "Anne Ewing", title: "Programmer", img: "https://cdn.balkan.app/shared/11.jpg" },
    // { id: "12", pid: "9", name: "Reuben Mcleod", title: "Programmer", img: "https://cdn.balkan.app/shared/12.jpg" },
    // { id: "13", pid: "9", name: "Ariel Wiley", title: "Programmer", img: "https://cdn.balkan.app/shared/4.jpg" },
    // { id: "14", pid: "4", name: "Lucas West", title: "Marketer", img: "https://cdn.balkan.app/shared/14.jpg" },
    // { id: "15", pid: "4", name: "Adan Travis", title: "Designer", img: "https://cdn.balkan.app/shared/15.jpg" },
    // { id: "16", pid: "4", name: "Alex Snider", title: "Sales Manager", img: "https://cdn.balkan.app/shared/4.jpg" },
    // { id: "17", pid: "4", name: "Ella Pratt", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/17.jpg" },
    // { id: "18", pid: "4", name: "Aliyah Soto", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/18.jpg" },
    // { id: "19", pid: "4", name: "Laylah Benson", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/19.jpg" },
    // { id: "20", pid: "4", name: "Paxton Doyle", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/4.jpg" },
    // { id: "21", pid: "4", name: "Lyric Odonnell", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/21.jpg" },
    // { id: "22", pid: "6", name: "Rylan Johnson", title: "QA Analyst", img: "https://cdn.balkan.app/shared/5.jpg" },
    // { id: "23", pid: "6", name: "Tyrell Wood", title: "QA Analyst", img: "https://cdn.balkan.app/shared/6.jpg" },
    // { id: "24", pid: "7", name: "Alfonso Barry", title: "QA Analyst", img: "https://cdn.balkan.app/shared/7.jpg" },
    // { id: "25", pid: "7", name: "Trevin Mcconnell", title: "QA Analyst", img: "https://cdn.balkan.app/shared/8.jpg" },
    // { id: "26", pid: "8", name: "Jude Rowland", title: "Senior QA", img: "https://cdn.balkan.app/shared/9.jpg" },
    // { id: "27", pid: "8", name: "Colt Velez", title: "Senior QA", img: "https://cdn.balkan.app/shared/10.jpg" },
    // { id: "28", pid: "9", name: "Elaine Briggs", title: "Senior .NET Developer", img: "https://cdn.balkan.app/shared/3.jpg" },
    // { id: "29", pid: "9", name: "Yadiel Green", title: "Senior .NET Developer", img: "https://cdn.balkan.app/shared/8.jpg" },
    // { id: "30", pid: "10", name: "Kiera Mcdaniel", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/7.jpg" },
    // { id: "31", pid: "10", name: "Jadon Pugh", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/5.jpg" },
    // { id: "32", pid: "11", name: "Kai Leblanc", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/8.jpg" },
    // { id: "33", pid: "11", name: "Emmett Bender", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/9.jpg" },
    // { id: "34", pid: "12", name: "Jesse Pacheco", title: "Senior Programmer", img: "https://cdn.balkan.app/shared/10.jpg" },
    // { id: "35", pid: "12", name: "Jazmin Velasquez", title: "Senior Programmer", img: "https://cdn.balkan.app/shared/16.jpg" },
    // { id: "36", pid: "13", name: "Chase Miranda", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/17.jpg" },
    // { id: "37", pid: "13", name: "Gracelyn Delacruz", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/18.jpg" },
    // { id: "46", pid: "13", name: "Gracelyn Delacruz", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/18.jpg" },
    // { id: "47", pid: "13", name: "Gracelyn Delacruz", title: "Junior Programmer", img: "https://cdn.balkan.app/shared/18.jpg" },
    // { id: "38", pid: "14", name: "Phoenix Rivers", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/19.jpg" },
    // { id: "39", pid: "14", name: "Rayan Patel", title: "Marketing Assistant", img: "https://cdn.balkan.app/shared/16.jpg" },
    // { id: "40", pid: "15", name: "Ariella Donovan", title: "Graphic Designer", img: "https://cdn.balkan.app/shared/5.jpg" },
    // { id: "41", pid: "15", name: "Makenna Mcfarland", title: "Graphic Designer", img: "https://cdn.balkan.app/shared/6.jpg" },
    // { id: "42", pid: "16", name: "Rory Rivas", title: "Sales Representative", img: "https://cdn.balkan.app/shared/7.jpg" },
    // { id: "43", pid: "16", name: "Sloane Mcbride", title: "Sales Representative", img: "https://cdn.balkan.app/shared/8.jpg" },
    // { id: "44", pid: "1", name: "Roberto Reyes", title: "Sales Representative", img: "https://cdn.balkan.app/shared/11.jpg" },
    // { id: "45", pid: "44", name: "Roberto Reyes", title: "Sales Representative", img: "https://cdn.balkan.app/shared/12.jpg" },

]);

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
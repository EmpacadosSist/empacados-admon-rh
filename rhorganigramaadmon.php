<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OrgChart JS Example</title>
  <!-- Include OrgChart JS library -->
  <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
  <!-- Font Awesome -->
<script src="https://balkan.app/js/OrgChart.js"></script>

  <style>
<div id="tree"></div>

   html, body {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    #tree {
        width: 100%;
        height: 100%;        
        background-color: #141E46;

    }

    .filter-item:hover {
        background-color: #B06161;
    }

    .filter-item-hovered rect {
        fill: #B06161;
    }

    .orgchart .node {
        background-color: #B06161 !important; /* Cambia este color según tus preferencias */
    }


  </style>
</head>
<body>

  <!-- Container for the OrgChart -->
<div id="tree"></div>
             
   <script>
  
//JavaScript
var chart = new OrgChart(document.getElementById("tree"), {
    layout: OrgChart.mixed,
    filterBy: ['title', 'city'],
    mouseScrool: OrgChart.action.ctrlZoom,
    enableSearch: true,
    scaleInitial: OrgChart.match.height,
        mouseScrool: OrgChart.none,

    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    },
    nodeMenu: {
        add: {text: 'add'}
    },
      menu: {
        pdf: { text: "Exportar PDF" },
        png: { text: "Exportar PNG" }
       
    },
    tags: {
        filter: {
            template: 'dot',
                        template: 'filtered'

        }
    }
});

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


chart.load([

    { id: "1", name: "Jack Hill", title: "Director General", email: "amber@domain.com", img: "https://cdn.balkan.app/shared/1.jpg" },
    { id: "2", pid: "1", name: "Kimberly Michel", title: "Consultor SAP", email: "sistemas@empacados.com", img: "https://cdn.balkan.app/shared/2.jpg" },
    { id: "3", pid: "2", tags: ['partner'], name: "Janae Barrett", title: "Technical Director", img: "https://cdn.balkan.app/shared/3.jpg" },
    { id: "4", pid: "1", name: "Aaliyah Webb", title: "Manager", email: "jay@domain.com", img: "https://cdn.balkan.app/shared/4.jpg" },
    { id: "5", pid: "1", name: "Aaliyah Webb", title: "Manager", email: "jay@domain.com", img: "https://cdn.balkan.app/shared/4.jpg" },
    { id: "6", pid: "2", name: "Elliot Ross", title: "QA", img: "https://cdn.balkan.app/shared/5.jpg" },
    { id: "7", pid: "2", name: "Anahi Gordon", title: "QA", img: "https://cdn.balkan.app/shared/6.jpg" },
    { id: "8", pid: "2", name: "Knox Macias", title: "QA", img: "https://cdn.balkan.app/shared/7.jpg" },
    { id: "9", pid: "3", name: "Nash", title: ".NET Team Lead", email: "kohen@domain.com", img: "https://cdn.balkan.app/shared/8.jpg" },
    { id: "10", pid: "8", name: "Alice Gray", title: "Programmer", img: "https://cdn.balkan.app/shared/10.jpg" },
    { id: "11", pid: "8", name: "Anne Ewing", title: "Programmer", img: "https://cdn.balkan.app/shared/11.jpg" },
    { id: "12", pid: "9", name: "Reuben Mcleod", title: "Programmer", img: "https://cdn.balkan.app/shared/12.jpg" },
    { id: "13", pid: "9", name: "Ariel Wiley", title: "Programmer", img: "https://cdn.balkan.app/shared/13.jpg" },
    { id: "14", pid: "4", name: "Lucas West", title: "Marketer", img: "https://cdn.balkan.app/shared/14.jpg" },
    { id: "15", pid: "4", name: "Adan Travis", title: "Designer", img: "https://cdn.balkan.app/shared/15.jpg" },
    { id: "16", pid: "4", name: "Alex Snider", title: "Sales Manager", img: "https://cdn.balkan.app/shared/16.jpg" }
]);


</script> 
 
</body>
</html>

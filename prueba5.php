<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Abrir Modal
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Selecciona tu área de trabajo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <form id="areaForm">
          <div class="form-group">
            <label for="area">Área:</label>
            <select class="form-control" id="area" onchange="showFields()">
              <option value="">Selecciona una opción</option>
              <option value="oficina">Oficina</option>
              <option value="planta">Planta</option>
            </select>
          </div>
          <div id="officeFields" style="display: none;">
            <!-- Aquí se cargarán las opciones adicionales para Oficina o Planta -->
          </div>
        </form>
      </div>
      
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Enviar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function showFields() {
  var area = document.getElementById("area").value;
  if (area === "oficina" || area === "planta") {
    document.getElementById("officeFields").style.display = "block";
    var officeFields = document.getElementById("officeFields");
    officeFields.innerHTML = ""; // Limpiar opciones anteriores
    // Agregar opciones adicionales según la selección
    if (area === "oficina") {
      officeFields.appendChild(createSelect("Departamento", ["Ventas", "Recursos Humanos", "Finanzas", "Contabilidad"]));
    } else if (area === "planta") {
      officeFields.appendChild(createSelect("Sector", ["Producción", "Almacén", "Mantenimiento", "Logística"]));
    }
  } else {
    document.getElementById("officeFields").style.display = "none";
  }
}

function createSelect(labelText, options) {
  var selectDiv = document.createElement("div");
  selectDiv.className = "form-group";
  
  var label = document.createElement("label");
  label.textContent = labelText + ":";
  
  var select = document.createElement("select");
  select.className = "form-control";
  
  var defaultOption = document.createElement("option");
  defaultOption.value = "";
  defaultOption.textContent = "Selecciona una opción";
  select.appendChild(defaultOption);
  
  options.forEach(function(option) {
    var optionElement = document.createElement("option");
    optionElement.value = option;
    optionElement.textContent = option;
    select.appendChild(optionElement);
  });
  
  selectDiv.appendChild(label);
  selectDiv.appendChild(select);
  
  return selectDiv;
}

function submitForm() {
  var area = document.getElementById("area").value;
  var selectedOptions = [];
  var selectElements = document.querySelectorAll("#officeFields select");
  selectElements.forEach(function(select) {
    if (select.value !== "") {
      selectedOptions.push(select.value);
    }
  });
  console.log("Área:", area);
  console.log("Opciones seleccionadas:", selectedOptions);
  // Aquí puedes realizar acciones con los datos recolectados
  // Por ejemplo, puedes enviar los datos a través de una solicitud AJAX
  // $.post("tu_url_de_destino", { area: area, selectedOptions: selectedOptions }, function(data, status) {
  //   alert("Data: " + data + "\nStatus: " + status);
  // });
  // Cerrar el modal después de enviar el formulario
  $('#myModal').modal('hide');
}
</script>

</body>
</html>

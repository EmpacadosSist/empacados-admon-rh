  <?php require 'layout/libreriasdatatable.php';?>





   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Area selection -->
            <div class="form-group">
              <label for="areaSelect">Select Area:</label>
              <select class="form-control" id="areaSelect">
                <option value="office">Office</option>
                <option value="plant">Plant</option>
              </select>
            </div>
            <!-- DataTable to display area-specific information -->
        <!-- DataTable to display area-specific information -->
        <div class="table-responsive" id="officeTable" style="display: none;">
          <table class="table table-bordered table-hover" id="officeDataTable" style="width:100%">
            <thead>
              <tr>
                <th >Office Column 1</th>
                <th >Office Column 2</th>
                <th>Ir</th> <!-- New column for navigation -->
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="office">Office Data 1</td>
                <td id="ofice1">Office Data 2</td>
                <td><a href="prueba7.php">Go to Office</a></td> <!-- Link for navigation -->
              </tr>
              <!-- Additional rows can be added here -->
            </tbody>
          </table>
        </div>
        <div class="table-responsive" id="plantTable" style="display: none;">
          <table class="table table-bordered table-hover" id="plantDataTable" style="width:100%">
            <thead>
              <tr>
                <th>Plant Column 1</th>
                <th>Plant Column 2</th>
                <th>Ir</th> <!-- New column for navigation -->
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="ofice3">Plant Data 1</td>
                <td id="ofice4">Plant Data 2</td>
                <td><a href="prueba7.php">Go to Plant</a></td> <!-- Link for navigation -->
              </tr>
              <!-- Additional rows can be added here -->
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for Click Warning -->
<div class="modal fade" id="clickWarningModal" tabindex="-1" role="dialog" aria-labelledby="clickWarningModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clickWarningModalLabel">Warning!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please select an option from the area selection first!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Function to handle click event on any link with class 'navigate-link'
    $('.navigate-link').on('click', function(event) {
      // Check if an area is selected
      if ($('#areaSelect').val() === null) {
        $('#clickWarningModal').modal('show'); // Show warning modal
        event.preventDefault(); // Prevent navigation
      }
    });
  });
</script>

 <div class="form-group col-md-6">
      <label for="motivo_separacion"><i class="fas fa-sign-out-alt"></i> Motivo de Separación</label>
      <input type="text" class="form-control" id="motivo_separacion" name="motivo_separacion">
    </div>

  <div class="form-group col-md-5">
      <label for="rfc"><i class="fas fa-id-badge"></i> RFC</label>
      <input type="text" class="form-control" id="rfc" name="rfc">
    </div>

<!-- Modal -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Function to handle click event on "Go to Office" link
    $('#officeDataTable').on('click', 'a', function(event) {
      // Prevent default behavior of anchor tag
      event.preventDefault();

      // Get the data from the corresponding row
      var rowData = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
      }).get();

      // Populate the input fields with the retrieved data
      $('#motivo_separacion').val(rowData[0]); // Assuming Office Data 1 corresponds to motivo_separacion
      $('#rfc').val(rowData[1]); // Assuming Office Data 2 corresponds to rfc
    });

    // Function to handle click event on "Go to Plant" link
    $('#plantDataTable').on('click', 'a', function(event) {
      // Prevent default behavior of anchor tag
      event.preventDefault();

      // Get the data from the corresponding row
      var rowData = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
      }).get();

      // Populate the input fields with the retrieved data
      $('#motivo_separacion').val(rowData[0]); // Assuming Plant Data 1 corresponds to motivo_separacion
      $('#rfc').val(rowData[1]); // Assuming Plant Data 2 corresponds to rfc
    });
  });
</script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Script para mostrar u ocultar tablas y manejar DataTables -->
<script>
  $(document).ready(function() {
    // Trigger modal display
    $('#exampleModal').modal('show');

    // Initialize DataTables for both tables
    $('#officeDataTable').DataTable();
    $('#plantDataTable').DataTable();

    // Show/hide tables based on area selection
    $('#areaSelect').change(function() {
      var selectedArea = $(this).val();
      if (selectedArea === 'office') {
        $('#officeTable').show();
        $('#plantTable').hide();
      } else if (selectedArea === 'plant') {
        $('#plantTable').show();
        $('#officeTable').hide();
      }
    });

    // Trigger table show/hide on modal open
    $('#exampleModal').on('shown.bs.modal', function() {
      $('#areaSelect').trigger('change');
    });
  });
</script>

<?php

include('connection.php');
$query="SELECT * FROM `students`";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" href="style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container-fluid">
        <div class="container-fluid btnex d-flex">
            <button id="exportPNG" class="btn btn-secondary">Export to PNG</button>
            <div id="datatableButtons" class="btn-group ml-auto"></div>
        </div>
        <br>
        <div class="align-items-right">
            <table id="example" class="display table table-bordered table-new" style="width:100%">
                <thead class="th-color">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Fees</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['st_id'];?></td>
                            <td><?php echo $row['st_name'];?></td>
                            <td><?php echo $row['st_course'];?></td>
                            <td><?php echo $row['st_fees'];?></td>
                            <td><?php echo $row['st_email'];?></td>
                            <td><?php echo $row['st_date'];?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- DataTables Buttons JavaScript -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script>
    <script>
        var table;
        $(document).ready(function() {
            table = $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy', 
                        text: 'Copy details', 
                        className: 'btn ml-2 db-new glyphicon glyphicon-duplicate' 
                    },
                    {
                        extend: 'excel', 
                        text: 'Excel', 
                        className: 'btn ml-2 glyphicon glyphicon-list-alt' 
                    },
                    {
                        extend: 'print', 
                        text: 'Print', 
                        orientation: 'landscape', 
                        className: 'btn ml-2 glyphicon glyphicon-print' 
                    },
                    {
                        extend: 'pdf', 
                        text: 'PDF', 
                        orientation: 'landscape', 
                        className: 'btn ml-2 glyphicon glyphicon-pdf' 
                    }
                ]
            });

            // Attach click event to export button
            $('#exportPNG').click(function() {
                var table = document.getElementById('example');

                html2canvas(table).then(function(canvas) {
                    var dataURL = canvas.toDataURL();
                    saveAs(dataURL, 'table.png');
                });
            });

            // Append DataTable buttons to the specified container
            $('#datatableButtons').append($('.dt-buttons'));

            // Add search inputs after thead
            $('#example thead').after('<tr id="search-row"></tr>');
            $('#example thead th').each(function() {
                $('#search-row').append('<th><input type="text" placeholder="Search ' + $(this).text() + '" /></th>');
            });

            // Add search functionality
            $('#search-row input').on('keyup change', function() {
                var index = $(this).parent().index();
                table.column(index).search(this.value).draw();
            });
        });
    </script>
</body>
</html>

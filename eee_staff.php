<?php
session_start();

// Redirect to login page if user is not logged in
if (empty($_SESSION['pass'])) {
    header("location:login.php");
}

// Include database connection
include "connect.php";

// Fetch the total number of news items from the database
$dept = 'EEE';
// Fetch news items for the current page
$run = mysqli_query($conn, "SELECT * FROM profiles WHERE dept = '$dept'");
$result = array();
if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $row['editMode'] = false;
        $result[] = $row;
    }
}
?>

<!doctype html>
<html class="fixed sidebar-light">
<head>
    <!-- Meta information -->
    <meta charset="UTF-8">
    <title>SRKREC ADMINISTRATION</title>
    <meta name="keywords" content="srkr" />
    <meta name="description" content="srkrec-administration">
    <meta name="author" content="#">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/theme.css" />
    <link rel="stylesheet" href="css/skins/default.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>

</head>
<body>
    <section class="body">
        <?php include 'navbar.php'?>
            <!-- Content section -->
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>SRKREC ADMINISTRATION</h2>
                </header>
                <!-- News table section -->
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <header class="card-header" style="display:flex; flex-direction:row;gap:100px;justify-content:space-between;">
                                <table>
                                    <tr>
                                        <td>
                                            <h2 class="card-title mt-2" style="text-transform:uppercase;">SRKREC EEE ADMINISTRATION</h2>
                                        </td>

                                        <div class="col-lg-6">
                                            <div id="datatable-default_filter" class="dataTables_filter">
                                                <label><input type="search" id="myInput" onkeyup="searchFun()" class="form-control pull-right" placeholder="Search by reg id or name..." aria-controls="datatable-default"></label>
                                            </div>
                                        </div>
                                    </tr>
                                </table>
                            </header>
                            <div class="input-group">
                                <div class="card-body">
                                    <table id="myTable" class="table table-no-more table-bordered table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-Start">Photo</th>
                                                <th class="text-Start">Name</th>
                                                <th class="text-Start">Designation</th>                              
                                                <th class="text-Start">Department</th>
                                                <th class="text-Start">Degree</th>
                                                <th class="text-Start">Specialization</th>
                                                <th class="text-Start">Mobile Number</th>
                                                <th class="text-Start">Mail Id</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
// ...
for ($i = 0; $i < count($result); $i++) {
    $id = $result[$i]['eid']; // Get the faculty's eid
    $photoPath = '../profiles/images/EEE/' . $id . '.jpg'; // Construct the photo path using eid

    echo '<tr>
        <td data-title="Photo" class="text-Start"><img src="' . $photoPath . '" alt="Faculty Photo" width="100" height="100"></td>     
        <td data-title="Name" class="text-Start">' . $result[$i]['name'] . '</td>
        <td data-title="Designation" class="text-Start">' . $result[$i]['designation'] . '</td>
        <td data-title="Department" class="text-Start">' . $result[$i]['dept'] . '</td>
        <td data-title="Designation" class="text-Start">' . $result[$i]['degree'] . '</td>
        <td data-title="Department" class="text-Start">' . $result[$i]['specialization'] . '</td>
        <td data-title="Mobile_number" class="text-Start">' . $result[$i]['mobile'] . '</td>
        <td data-title="E-Mail" class="text-Start">' . $result[$i]['email'] . '</td>
        <td data-title="Action" class="text-Start">
            <button class="btn btn-primary btn-sm edit-button" data-eid="' . $id . '">Edit</button>
        </td>
    </tr>';
}
// ...
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
				<!-- Pagination links -->

                <!-- Modal for Editing News -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Staff Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" method="post">
                                    <input type="hidden" id="editId" name="id">
                                    <div class="form-group">
                                        <label for="editName">Name</label>
                                        <input type="text" class="form-control" id="editName" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="editDesignation">Designation:</label>
                                        <input type="text" class="form-control" id="editDesignation" name="designation">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="editDepartment">Department:</label>
                                        <input class="form-control" id="editDepartment" name="dept"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="editDegree">Degree:</label>
                                        <input class="form-control" id="editDegree" name="degree"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="editSpecialization">Specialization:</label>
                                        <input class="form-control" id="editSpecialization" name="specialization"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="editMobile_number">Mobile Number:</label>
                                        <input class="form-control" id="editMobile_number" name="mobile"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="editMail_id">Mail Id:</label>
                                        <input class="form-control" id="editMail_id" name="email"></input>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <script>
        // Function for filtering the table
        const searchFun = () => {
            let filter = document.getElementById('myInput').value.toUpperCase();
            let myTable = document.getElementById('myTable');
            let tr = myTable.getElementsByTagName('tr');

            for (var i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td')[1];
                let t1 = tr[i].getElementsByTagName('td')[0];

                if (td || t1) {
                    let textvalue = td.textContent || td.innerHTML;
                    let pid = t1.textContent || t1.innerHTML;

                    if (textvalue.toUpperCase().indexOf(filter) > -1 || pid.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
		}
        </script>


    <!-- Modal script -->
        <script>
            $(document).on('click', '.edit-button', function () {
                var id = $(this).data('eid');
                var name = $(this).closest('tr').find('td:eq(1)').text();
                var designation = $(this).closest('tr').find('td:eq(2)').text();
                var dept = $(this).closest('tr').find('td:eq(3)').text();
                var degree = $(this).closest('tr').find('td:eq(4)').text();
                var spec = $(this).closest('tr').find('td:eq(5)').text();
                var mobile = $(this).closest('tr').find('td:eq(6)').text();
                var mail = $(this).closest('tr').find('td:eq(7)').text();

                $('#editId').val(id);
                $('#editName').val(name);
                $('#editDesignation').val(designation);
                $('#editDepartment').val(dept);
                $('#editDegree').val(degree);
                $('#editSpecialization').val(spec);
                $('#editMobile_number').val(mobile);
                $('#editMail_id').val(mail);

                $('#editModal').modal('show'); // Show the modal
            });

            // Handle saving changes in the modal
            $('#saveChanges').on('click', function () {
                // Perform AJAX request to update the news item
                var formData = $('#editForm').serialize();
                $.ajax({
                    url: 'update_staff.php', // Replace with the actual URL to update the news item
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success, e.g., refresh the table
                        // Close the modal
                        $('#editModal').modal('hide');

                        // Reload the page
                        location.reload();
                    },
                    error: function (error) {
                        // Handle error
                    }
                });
                console.log(formData);
            });
        </script>

        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>
    </body>
</html>
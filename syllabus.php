<?php
session_start();

// Redirect to login page if user is not logged in
if (empty($_SESSION['pass'])) {
    header("location:login.php");
}

// Include database connection
include "connect.php";

// Define the number of news items to display per page
$itemsPerPage = 10;
    
// Fetch the total number of news items from the database
$totalItemsQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM events");
$totalItems = mysqli_fetch_assoc($totalItemsQuery)['total'];

// Calculate the total number of pages
$totalPages = ceil($totalItems / $itemsPerPage);

// Get the current page number from the query parameter
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
$currentpage = max(1, $currentpage); // Ensure the page number is not less than 1
$currentpage = min($currentpage, $totalPages); // Ensure the page number is not greater than the total number of pages

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $itemsPerPage;

// Fetch news items for the current page
$run = mysqli_query($conn, "SELECT * FROM events ORDER BY timestamp DESC LIMIT $offset, $itemsPerPage");

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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td {
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
    <style>
    /* Add some margin to the right of the edit button */
    .edit-button {
        margin-right: 2px;
        margin-top: 5px;
    }
    .delete-button {
        margin-right: 2px;
        margin-top: 20px;
    }
</style>


</head>
<body>
    <section class="body">
        <!-- Header section -->
        <?php include 'navbar.php'?>

            <!-- Content section -->
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>SRKREC ADMINISTRATION</h2>
                </header>
                <!-- News table section -->
             
				<!-- Pagination links -->

                <!-- Modal for Editing News -->
                

                
                <!-- News table section -->
                <div class="row">
                    <div class="col">
                        <section class="card">
                          
                           
                                      
                                        <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "srkrecdatabase");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $qu = "SELECT * FROM `teacher`";
    $res = mysqli_query($conn, $qu);

    if (!$res) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<table>";
    echo "<tr><th>ID</th><th>DEPARTMENT</th><th>SECTION</th><th>REGULATION</th><th>YEAR</th><th>SYLLABUS</th><th>MODELPAPER</th></tr>";

    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $dept = $row['department'];
        $sec = $row['section'];
        $reg = $row['regulation']; // Added phone field
        $year = $row['year']; // Added email field
        $sylla = $row['syllabus']; // Added address field
        $model = $row['modelpaper'];

        // Ensure $pic is not empty before attempting to display
        if (!empty($model)) {
            $base64Image = base64_encode($model);
            echo "<tr>
                    <td>$id</td>
                    <td>$dept</td>
                    <td>$sec</td>
                    <td>$reg</td>
                    <td>$year</td>
                    <td>$sylla</td>
                    <td>$model</td>
                </tr>";
        } else {
            echo "<tr>
                    <td>$id</td>
                    <td>$dept</td>
                    <td>$sec</td>
                    <td>$reg</td>
                    <td>$year</td>
                    <td>$sylla</td>
                    <td>$model</td>
                </tr>";
        }
    }
    
    echo "</table>";

    mysqli_close($conn);
    ?>   </tbody>

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
                let td = tr[i].getElementsByTagName('td')[2];
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

        <script>
            $(document).on('click', '.edit-button', function () {
                var id = $(this).data('id');
                var title = $(this).closest('tr').find('td:eq(1)').text();
                var start = $(this).closest('tr').find('td:eq(2)').text();
                var end   = $(this).closest('tr').find('td:eq(3)').text();  
                var description = $(this).closest('tr').find('td:eq(4)').text();

                $('#editId').val(id);
                $('#editTitle').val(title);
                $('#editStart_date').val(start);
                $('#editEnd_date').val(end);
                $('#editDescription').val(description);

                $('#editModal').modal('show'); // Show the modal
            });



$('#saveChanges').on('click', function () {
    // Perform AJAX request to update the news item
    var formData = $('#editForm').serialize();
    formData += '&action=update'; // Add the action parameter
    $.ajax({
        url: 'update_events.php',
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
});


        </script>

        <!-- Delete Event script -->
<script>
    $(document).on('click', '.delete-button', function () {
        var id = $(this).data('id');

        // Confirm with the user before deleting
        if (confirm("Are you sure you want to delete this event?")) {
            // Perform AJAX request to delete the news item
            $.ajax({
                url: 'update_events.php', // Replace with the actual URL
                type: 'POST',
                data: {
                    action: 'delete',
                    id: id
                },
                success: function (response) {
                    // Handle success, e.g., refresh the table
                    // Reload the page
                    location.reload();
                },
                error: function (error) {
                    // Handle error
                    console.log(error);
                }
            });
        }
    });
</script>

</section> <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="vendor/popper/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>
        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>
    </body>
</html>
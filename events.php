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
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <header class="card-header" style="display:flex; flex-direction:row;gap:100px;justify-content:space-between;">
                                <table>
                                    <tr>
                                        <td>
                                            <h2 class="card-title mt-2" style="text-transform:uppercase;">SRKREC EVENT ADMINISTRATION</h2>
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
                                                <th class="text-Start">Id</th>
                                                <th class="text-Start">Title</th>
                                                <th class="text-Start">Start Date</th>
                                                <th class="text-Start">End Date</th>
                                                <th class="text-Start">Description</th>
                                                <th class="text-Start">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($result); $i++) {
                                                echo '<tr>
                                                    <td data-title="Id" class="text-Start">' . $result[$i]['id'] . '</td>
                                                    <td data-title="Title" class="text-Start">' . $result[$i]['title'] . '</td>
                                                    <td data-title="Start_Date" class="text-Start">' . $result[$i]['start'] . '</td>
                                                    <td data-title="End_Date" class="text-Start">' . $result[$i]['end'] . '</td>
                                                    <td data-title="Description" class="text-Start">' . $result[$i]['description'] . '</td>
                                                    <td data-title="Action" class="text-Start">
                                                        <button class="btn btn-primary btn-sm edit-button fas fa-pen" data-id="' . $result[$i]['id'] . '"></button>
                                                        <button class="btn btn-danger btn-sm delete-button fas fa-trash" data-id="' . $result[$i]['id'] . '"></button>
                                                    </td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
				<!-- Pagination links -->
<div class="row">
    <div class="col">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Previous button -->
                <li class="page-item <?php echo ($currentpage == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $currentpage - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $visiblePages = 5; // Number of visible page numbers

                $startPage = max(1, $currentpage - floor($visiblePages / 2));
                $endPage = min($totalPages, $startPage + $visiblePages - 1);

                if ($endPage - $startPage < $visiblePages - 1) {
                    $startPage = max(1, $endPage - $visiblePages + 1);
                }

                if ($startPage > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=1">1</a></li>';
                    echo '<li class="page-item disabled"><span class="page-link">&hellip;</span></li>';
                }

                for ($page = $startPage; $page <= $endPage; $page++) :
                ?>
                    <li class="page-item <?php echo ($page == $currentpage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>

                <?php
                if ($endPage < $totalPages) {
                    echo '<li class="page-item disabled"><span class="page-link">&hellip;</span></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '">' . $totalPages . '</a></li>';
                }
                ?>

                <!-- Next button -->
                <li class="page-item <?php echo ($currentpage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $currentpage + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
                <!-- Modal for Editing News -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Event Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" method="post">
                                    <input type="hidden" id="editId" name="id">

                                    <div class="form-group">
                                        <label for="editTitle">Title:</label>
                                        <input type="text" class="form-control" id="editTitle" name="title">
                                    </div>

                                    <div class="form-group">
                                        <label for="editDate">Start Date:</label>
                                        <input type="date" class="form-control" id="editDate" name="start">
                                    </div>

                                    <div class="form-group">
                                        <label for="editEnd_date">End Date:</label>
                                        <input type="date" class="form-control" id="editEnd_date" name="end">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="editDescription">Description:</label>
                                        <textarea class="form-control" id="editDescription" name="description"></textarea>
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


        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>
    </body>
</html>
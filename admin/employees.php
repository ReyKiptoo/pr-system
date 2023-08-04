<?php include('includes/connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>JKUAT Payroll System</title>
    <!-- Load Favicon-->
    <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Data Tables links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />





    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Load Simple DataTables Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
    <!-- Load main stylesheet-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="nav-fixed bg-light">
    <!-- Top app bar navigation menu-->
    <?php include('includes/nav.php') ?>
    <!-- Layout wrapper-->
    <div id="layoutDrawer">
        <!-- Layout navigation-->
        <div id="layoutDrawer_nav">
            <!-- Drawer navigation-->
            <?php include('includes/drawer_nav.php') ?>
        </div>
        <!-- Layout content-->
        <div id="layoutDrawer_content">
            <!-- Main page content-->
            <main>
                <!-- Main dashboard content-->
                <div class="container-xl p-5">
                    <!-- <div class="row justify-content-between align-items-center mb-5">
                        <div class="col flex-shrink-0 mb-5 mb-md-0">
                            <h1 class="display-4 mb-0">Employees</h1>
                            <div class="text-muted">Employee overview &amp; summary</div>
                        </div>
                    </div> -->
                    <!-- Colored status cards-->

                    <div class="card card-raised">
                        <div class="card-header bg-transparent px-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-4">
                                    <h2 class="card-title mb-0">Employees</h2>
                                    <div class="card-subtitle">Details and history</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">download</i></button>
                                    <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">print</i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <!-- Simple DataTables example-->
                            <table id="employee_data" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM `employee_details`";
                                    $result = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $empId = $row['employee_id'];
                                        $firstName = $row['first_name'];
                                        $lastName = $row['last_name'];
                                        $phone = $row['phone'];
                                        $email = $row['email'];
                                        $nat_id = $row['nat_id'];
                                        $salary = $row['salary'];

                                        echo "<tr data-bs-toggle='tooltip' data-bs-placement='top' title='Click To Edit' class = 'clickable-row' data-href='edit_emp.php?editId=$empId'>";
                                        echo "<td>$firstName</td>";
                                        echo "<td>$lastName</td>";
                                        echo "<td>$phone</td>";
                                        echo "<td>$email</td>";
                                        echo "<td>$nat_id</td>";

                                        if (empty($salary)) {
                                            echo "<td><span class='badge bg-warning'>Unverified</span></td>";
                                        } else {
                                            echo "<td><span class='badge bg-success'>Verified</span></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer-->
            <!-- Min-height is set inline to match the height of the drawer footer-->
            <footer class="py-4 mt-auto border-top" style="min-height: 74px">
                <div class="container-xl px-5">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
                        <div class="me-sm-2">Copyright &copy; Your Website 2023</div>
                        <div class="d-flex ms-sm-2">
                            <a class="text-decoration-none" href="#!">Privacy Policy</a>
                            <div class="mx-1">&middot;</div>
                            <a class="text-decoration-none" href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Load Bootstrap JS bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Load global scripts-->
    <script type="module" src="js/material.js"></script>
    <script src="js/scripts.js"></script>
    <!--  Load Chart.js via CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" crossorigin="anonymous"></script>
    <!--  Load Chart.js customized defaults-->
    <script src="js/charts/chart-defaults.js"></script>
    <!--  Load chart demos for this page-->
    <script src="js/charts/demos/chart-pie-demo.js"></script>
    <script src="js/charts/demos/dashboard-chart-bar-grouped-demo.js"></script>
    <!-- Load Simple DataTables Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#employee_data').DataTable();
        });
    </script>
    <script>
        // Get all the clickable rows
        const rows = document.querySelectorAll(".clickable-row");

        // Add click event listeners to each row
        rows.forEach(row => {
            row.addEventListener("click", () => {
                // Get the URL from the data-href attribute of the clicked row
                const url = row.getAttribute("data-href");

                // Redirect the user to the specified URL
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>
</body>

</html>
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
                <div class="row justify-content-between align-items-center m-3">
                    <div class="col flex-shrink-0 mb-5 mb-md-0">
                        <h1 class="display-4 mb-0">Departments</h1>
                    </div>
                    <div class="col-12 col-md-auto ">
                        <button class="btn btn-primary" type="button" name="payBtn">Add Department</button>
                    </div>
                </div>
                <div class="row gx-5 m-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Head</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT * FROM `department_details`";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {

                                $deptId = $row['department_id'];
                                $deptName = $row['department_name'];
                                $deptHead = $row['department_head'];
                                echo "<tr data-bs-toggle='tooltip' data-bs-placement='top' title='Click To Edit' class = 'clickable-row' data-href='edit_dept.php?editId=$deptId'>";
                                echo "<td>$deptId</td>";
                                echo "<td>$deptName</td>";
                                echo "<td>$deptHead</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- Modal that will be popped on each click -->
            <div class="modal fade" id="exampleModalStatic" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalStaticLabel">Get this party started?</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Turn up the jams and have a good time.</div>
                        <div class="modal-footer">
                            <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-text-primary" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

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
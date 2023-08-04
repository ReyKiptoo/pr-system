<?php include('includes/connection.php') ?>



<?php
if (isset($_POST['queryBtn'])) {

    $dept = $_POST['department'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $bank = $_POST['bankName'] ?? "";
    $month = $_POST['month'] ?? "";
    $year = $_POST['year'] ?? "";

    if (!empty($dept)) {
        header("Location: view_report.php?dept={$dept}");
    }
    if (!empty($dept) && !empty($gender)) {
        header("Location: view_report.php?dept={$dept}&gender={$gender}");
    }
    if (!empty($dept) && !empty($gender) && !empty($bank)) {
        header("Location: view_report.php?dept={$dept}&gender={$gender}&bank={$bank}");
    }
    if (!empty($dept) && !empty($gender) && !empty($bank) && !empty($month)) {
        header("Location: view_report.php?dept={$dept}&gender={$gender}&bank={$bank}&month={$month}");
    }
    if (!empty($dept) && !empty($gender) && !empty($bank) && !empty($month) && !empty($year)) {
        header("Location: view_report.php?dept={$dept}&gender={$gender}&bank={$bank}&month={$month}&year={$year}");
    }
}

?>

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
    <link href="./assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card card-raised mb-5">
                        <div class="card-body p-5">
                            <div class="card-title">Generate report</div>
                            <form method="post" action="report.php">

                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <mwc-select class="w-100" outlined label="Department" name="department" required="true">
                                            <?php
                                            $query = "SELECT * FROM `department_details`";
                                            $result = mysqli_query($connection, $query);


                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $deptName = $row['department_name'];
                                                $deptId = $row['department_id'];
                                                echo "<mwc-list-item value='{$deptId}'>{$deptName}</mwc-list-item>";
                                            }
                                            ?>
                                        </mwc-select>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <mwc-select class="w-100" outlined label="Gender" name="gender" required="true">
                                            <mwc-list-item value="M">Male</mwc-list-item>
                                            <mwc-list-item value="F">Female</mwc-list-item>
                                        </mwc-select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <mwc-select class="w-100" outlined label="Bank" name="bankName" required="true">
                                            <mwc-list-item value="Equity Bank">Equity Bank</mwc-list-item>
                                            <mwc-list-item value="KCB">KCB</mwc-list-item>
                                            <mwc-list-item value="Cooperative Bank">Cooperative Bank</mwc-list-item>
                                            <mwc-list-item value="Standard Chartered">Standard Chartered</mwc-list-item>
                                            <mwc-list-item value="Family Bank">Family Bank</mwc-list-item>
                                            <mwc-list-item value="Absa">Absa</mwc-list-item>
                                        </mwc-select>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <mwc-select class="mw-50 mb-2 mb-md-0" name="month" outlined label="Month">
                                            <mwc-list-item value="January">January</mwc-list-item>
                                            <mwc-list-item value="February">February</mwc-list-item>
                                            <mwc-list-item value="March">March</mwc-list-item>
                                            <mwc-list-item value="April">April</mwc-list-item>
                                            <mwc-list-item value="May">May</mwc-list-item>
                                            <mwc-list-item value="June">June</mwc-list-item>
                                            <mwc-list-item value="July">July</mwc-list-item>
                                            <mwc-list-item value="August">August</mwc-list-item>
                                            <mwc-list-item value="September">September</mwc-list-item>
                                            <mwc-list-item value="October">October</mwc-list-item>
                                            <mwc-list-item value="November">November</mwc-list-item>
                                            <mwc-list-item value="December">December</mwc-list-item>
                                    </div>
                                    <mwc-select class="mw-50 col-sm-2" name="year" outlined label="Year">
                                        <mwc-list-item value="2022">2023</mwc-list-item>
                                        <mwc-list-item value="2022">2022</mwc-list-item>
                                        <mwc-list-item value="2021">2021</mwc-list-item>
                                        <mwc-list-item value="2021">2020</mwc-list-item>
                                        <mwc-list-item value="2021">2019</mwc-list-item>
                                    </mwc-select>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                                    <button class="btn btn-primary" name="queryBtn" type="submit">Query</a>
                                </div>
                            </form>
                        </div>
                    </div>
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
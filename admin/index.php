<?php include('includes/connection.php') ?>
<?php
if (isset($_POST['btnpay'])) {


    $month =  $_POST['month'];
    $year = $_POST['year'];

    $checkPayrollQuery = "SELECT month, year FROM `payroll` WHERE month = '$month' AND year = '$year'";
    $checkPayrollQueryResult = mysqli_query($connection, $checkPayrollQuery);
    $rowCount = mysqli_num_rows($checkPayrollQueryResult);

    if ($rowCount > 0) {
        echo "document.querySelector('#snackbarDemo').show()";
    } else {

        $query = "SELECT e.employee_id, e.salary, a.medical, a.house, a.transport, a.mileage, a.sitting FROM employee_details AS e INNER JOIN employee_allowances AS a ON e.employee_id = a.emp_id";
        $result = mysqli_query($connection, $query);

        $usersArray = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $usersArray[] = $row;
        }


        foreach ($usersArray as $user) {
            $emp_id = $user['employee_id'];
            $salary = $user['salary'];
            $housing = $user['house'];
            $medical = $user['medical'];
            $transport = $user['transport'];
            $mileage = $user['mileage'];
            $sitting = $user['sitting'];

            if (empty($salary)) {
                // User is unverified.
            } else {

                $totalAllowances = $housing + $medical + $transport + $mileage + $sitting;
                $gross = $salary + $totalAllowances;

                $nhif = (int)$salary * 0.027;
                $nssf = (int)$salary * 0.06;

                $totalDeductions = $nhif + $nssf;

                $taxableIncome = $gross - $totalDeductions;

                $PAYE;

                if ($taxableIncome <= 24000) {
                    $PAYE = 0.1 * $taxableIncome;
                } else if ($taxableIncome > 24000 && $taxableIncome <= 32333) {
                    $PAYE = (0.1 * 24000) + (0.25 * ($taxableIncome - 24000));
                } else if ($taxableIncome > 32333) {
                    $PAYE = (0.1 * 24000) + (0.25 * 8333) + (0.3 * ($taxableIncome - 32333));
                }

                // Total tax
                $PAYE = (int) $PAYE - 2400; // Monthly relief

                $netIncome = $taxableIncome - $PAYE;

                $insert_query = "INSERT INTO payroll(month, year, employee_id, salary, housing, medical, transport, mileage, sitting, total_allowances, nhif, nssf, paye, total_deductions, gross_pay, net_pay) VALUES ('$month', '$year', '$emp_id', '$salary', '$housing', '$medical', '$transport', '$mileage', '$sitting', '$totalAllowances', '$nhif', '$nssf', '$PAYE', '$totalDeductions', '$gross', '$netIncome')";

                $insert_result = mysqli_query($connection, $insert_query);

                if (!$insert_query) {
                    die();
                }
            }
        }
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

    <!-- Code for snackbar demo -->
    <mwc-snackbar id="snackbarDemo" labeltext="Can't send photo. Retry in 5 seconds.">
        <mwc-button slot="action">RETRY</mwc-button>
        <mwc-icon-button icon="close" slot="dismiss"></mwc-icon-button>
    </mwc-snackbar>
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
                    <div class="row justify-content-between align-items-center mb-5">
                        <div class="col flex-shrink-0 mb-5 mb-md-0">
                            <h1 class="display-4 mb-0">Dashboard</h1>
                            <div class="text-muted">System overview &amp; summary</div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <h6 class="display-6 mb-2">Pay Salaries</h6>
                            <form class="d-flex flex-column flex-sm-row gap-3" method="post" action="index.php">
                                <mwc-select class="mw-50 mb-2 mb-md-0" name="month" outlined label="Month">
                                    <mwc-list-item selected value="January">January</mwc-list-item>
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
                                </mwc-select>
                                <mwc-select class="mw-50" name="year" outlined label="Year">
                                    <mwc-list-item selected value="2023">2023</mwc-list-item>
                                    <mwc-list-item value="2022">2022</mwc-list-item>
                                    <mwc-list-item value="2021">2021</mwc-list-item>
                                    <mwc-list-item value="2021">2020</mwc-list-item>
                                    <mwc-list-item value="2021">2019</mwc-list-item>
                                </mwc-select>
                                <button class="btn btn-primary" type="submit" name="btnpay">Pay</button>
                            </form>
                        </div>
                    </div>
                    <!-- Colored status cards-->
                    <div class="row gx-5">
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="card card-raised border-start border-primary border-4">
                                <div class="card-body px-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="me-2">
                                            <?php
                                            $query = "SELECT * FROM `employee_details`";
                                            $result = mysqli_query($connection, $query);
                                            $totalEmployees = mysqli_num_rows($result);
                                            ?>

                                            <div class="display-5"><?php echo $totalEmployees ?></div>
                                            <div class="card-text">Employees</div>
                                        </div>
                                        <div class="icon-circle bg-primary text-white"><i class="material-icons">people</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="card card-raised border-start border-warning border-4">
                                <div class="card-body px-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="me-2">
                                            <?php
                                            $query = "SELECT * FROM `department_details`";
                                            $result = mysqli_query($connection, $query);
                                            $totalDepts = mysqli_num_rows($result);
                                            ?>
                                            <div class="display-5"><?php echo $totalDepts ?></div>
                                            <div class="card-text">Departments</div>
                                        </div>
                                        <div class="icon-circle bg-warning text-white"><i class="material-icons">storefront</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="card card-raised border-start border-secondary border-4">
                                <div class="card-body px-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="me-2">
                                            <div class="display-5">5.3K</div>
                                            <div class="card-text">Transactions</div>
                                        </div>
                                        <div class="icon-circle bg-secondary text-white"><i class="material-icons">download</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6 mb-5">
                            <div class="card card-raised border-start border-info border-4">
                                <div class="card-body px-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="me-2">
                                            <?php
                                            $query = "SELECT * FROM `employee_details` WHERE salary IS NULL";
                                            $result = mysqli_query($connection, $query);
                                            $unverifiedEmployees = mysqli_num_rows($result);
                                            ?>

                                            <div class="display-5"><?php echo $unverifiedEmployees ?></div>
                                            <div class="card-text">Unverified Employees</div>
                                        </div>
                                        <div class="icon-circle bg-info text-white"><i class="material-icons">devices</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <!-- Revenue breakdown chart example-->
                        <div class="col-lg-8 mb-5">
                            <div class="card card-raised h-100">
                                <div class="card-header bg-transparent px-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-4">
                                            <h2 class="card-title mb-0">Monthly Pay Out</h2>
                                            <div class="card-subtitle">Total amount disbursed every month</div>
                                        </div>
                                        <div class="d-flex gap-2 me-n2">
                                            <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">download</i></button>
                                            <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">print</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row gx-4">
                                        <div class="col-12 col-xxl-2">
                                            <div class="d-flex flex-column flex-md-row flex-xxl-column align-items-center align-items-xl-start justify-content-between">
                                                <div class="mb-4 text-center text-md-start">
                                                    <div class="text-xs font-monospace text-muted mb-1">Actual Revenue</div>
                                                    <div class="display-5 fw-500">$59,482</div>
                                                </div>
                                                <div class="mb-4 text-center text-md-start">
                                                    <div class="text-xs font-monospace text-muted mb-1">Revenue Target</div>
                                                    <div class="display-5 fw-500">$50,000</div>
                                                </div>
                                                <div class="mb-4 text-center text-md-start">
                                                    <div class="text-xs font-monospace text-muted mb-1">Goal</div>
                                                    <div class="display-5 fw-500 text-success">119%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xxl-10"><canvas id="dashboardBarChart"></canvas></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent position-relative ripple-gray">
                                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                                        <div class="fst-button">Open Report</div>
                                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Segments pie chart example-->
                        <div class="col-lg-4 mb-5">
                            <div class="card card-raised h-100">
                                <div class="card-header bg-transparent px-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-4">
                                            <h2 class="card-title mb-0">Departments</h2>
                                            <div class="card-subtitle">Department Data Summary</div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-lg btn-text-gray btn-icon me-n2 dropdown-toggle" id="segmentsDropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></button>
                                            <ul class="dropdown-menu" aria-labelledby="segmentsDropdownButton">
                                                <li><a class="dropdown-item" href="#!">Action</a></li>
                                                <li><a class="dropdown-item" href="#!">Another action</a></li>
                                                <li><a class="dropdown-item" href="#!">Something else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li><a class="dropdown-item" href="#!">Separated link</a></li>
                                                <li><a class="dropdown-item" href="#!">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex h-100 w-100 align-items-center justify-content-center">
                                        <div class="w-100" style="max-width: 20rem"><canvas id="myPieChart"></canvas></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent position-relative ripple-gray">
                                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                                        <div class="fst-button">Open Report</div>
                                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                                    </a>
                                </div>
                            </div>
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
</body>

</html>
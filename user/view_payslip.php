<?php include('includes/connection.php') ?>

<?php
$pay_id = $_GET['editId'];

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
                <?php
                $query = "SELECT e.employee_id,e.first_name, e.last_name, e.phone, e.email, e.nat_id, e.bank_name, e.bank_account, e.kra_pin, e.address, e.town, p.id, p.month, p.year, p.salary, p.housing, p.medical, p.transport, p.mileage, p.sitting, p.total_allowances, p.nhif, p.nssf, p.paye, p.total_deductions, p.gross_pay, p.net_pay FROM payroll AS p INNER JOIN employee_details AS e ON e.employee_id = p.employee_id WHERE p.id = $pay_id";

                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                $payrollId = $row['id'];
                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $phone = $row['phone'];
                $email = $row['email'];
                $bankName = $row['bank_name'];
                $bankAccount = $row['bank_account'];
                $kra = $row['kra_pin'];
                $address = $row['address'];
                $town = $row['town'];
                $month = $row['month'];
                $year = $row['year'];
                $salary = $row['salary'];
                $housing = $row['housing'];
                $medical = $row['medical'];
                $transport = $row['transport'];
                $mileage = $row['mileage'];
                $sitting = $row['sitting'];
                $totalAllowances = $row['total_allowances'];
                $nhif = $row['nhif'];
                $nssf = $row['nssf'];
                $paye = $row['paye'];
                $totalDeductions = $row['total_deductions'];
                $gross = $row['gross_pay'];
                $net_pay = $row['net_pay'];

                ?>


                <div class="container-xl p-5">
                    <div class="card card-raised" id="payslip">
                        <div class="card-header bg-primary p-4">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <!-- Invoice branding-->
                                    <h1 class="display-6 text-white">Payslip</h1>
                                    <div class="text-white mb-0">Jomo Kenyatta University Of Agriculture and Technology</div>
                                    <div class="text-white-50"><?php echo  " $month $year" ?></div>
                                </div>
                                <div class="col-auto text-end d-none d-lg-block">
                                    <!-- Invoice actions-->
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">download</i></button>
                                        <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">print</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- Invoice table-->
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead class="border-bottom">
                                        <tr class="text-xs font-monospace text-muted fw-500">
                                            <th scope="col">Description</th>
                                            <th class="text-end" scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Invoice item 1-->
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-500">Basic Salary</div>
                                            </td>
                                            <td class="text-end fw-500">KSH <?php echo $salary ?></td>
                                        </tr>
                                        <!-- Invoice item 2-->
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">Housing</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $housing ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">Medical</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $medical ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">Mileage</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $mileage ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">Sitting</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $sitting ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">Transport</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $transport ?></td>
                                        </tr>

                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-500">Total Allowances</div>
                                            </td>
                                            <td class="text-end fw-500">KSH <?php echo $totalAllowances ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">PAYE</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $paye ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">NHIF</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $nhif ?></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="small text-muted d-none d-md-block">NSSF</div>
                                            </td>
                                            <td class="text-end fw-300">KSH <?php echo $nssf ?></td>
                                        </tr>

                                        <tr class="border-bottom">
                                            <td>
                                                <div class="fw-500">Total Deductions</div>
                                            </td>
                                            <td class="text-end fw-500">KSH <?php echo $totalDeductions ?></td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-end pb-0" colspan="3">
                                                <div class="overline text-muted">Gross Pay</div>
                                            </td>
                                            <td class="align-middle text-end pb-0">
                                                <div class="fw-bold">KSH <?php echo $gross ?></div>
                                            </td>
                                        </tr>
                                        <!-- Invoice tax column-->

                                        <!-- Invoice total-->
                                        <tr>
                                            <td class="align-middle text-end" colspan="3">
                                                <div class="overline text-muted">Net Pay</div>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="display-6 text-primary">KSH <?php echo $net_pay ?></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer p-4">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <!-- Invoice - sent to info-->
                                    <div class="text-xs font-monospace text-muted mb-1">Payslip Generated For</div>
                                    <div class="mb-1"><?php echo "$firstName $lastName" ?></div>
                                    <div class="text-muted"><?php echo $email ?></div>
                                    <?php echo $phone ?>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <!-- Invoice - sent from info-->
                                    <div class="text-xs font-monospace text-muted mb-1">Address</div>
                                    <div class="mb-1"><?php echo $address ?></div>
                                    <div class="text-muted"><?php echo $town ?></div>

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
    <script>
        $(document).ready(function() {
            $('#employee_data').DataTable();
        });
    </script>
    <script>
        function printDiv() {

            var divToPrint = document.getElementById('DivIdToPrint');

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

            newWin.document.close();

            setTimeout(function() {
                newWin.close();
            }, 10);

        }
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
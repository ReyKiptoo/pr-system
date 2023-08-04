<?php include('includes/connection.php') ?>

<?php
$user_id = $_SESSION['id'];

$getUserData = "SELECT * FROM payroll WHERE employee_id = $user_id";
$userDataResult = mysqli_query($connection, $getUserData);

$row = mysqli_fetch_assoc($userDataResult);

$totalAllowances = $row['total_allowances'] ?? 0;
$totalDeductions = $row['total_deductions'] ?? 0;
$netPay = $row['net_pay'] ?? 0;


$query = "SELECT * FROM `employee_details` WHERE employee_id = $user_id";
$select_user_query = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($select_user_query);

$bankName = $row['bank_name'];
$bankAccount = $row['bank_account'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Billing - Material Admin Pro</title>
    <!-- Load Favicon-->
    <link href="./assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
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
                <!-- Page header-->
                <header class="bg-dark">
                    <div class="container-xl px-5">
                        <h1 class="text-white py-3 mb-0 display-6">Account Settings - Money</h1>
                    </div>
                </header>
                <!-- Account billing page content-->
                <div class="container-xl p-5">
                    <!-- Tab bar navigation-->
                    <mwc-tab-bar style="margin-bottom: -1px" activeIndex="0">
                        <mwc-tab label="Billing" icon="account_balance" stacked onClick='location.href="billing.php"'></mwc-tab>
                        <mwc-tab label="Profile" icon="person" stacked onClick='location.href="profile.php"'></mwc-tab>
                        <mwc-tab label="Security" icon="security" stacked onClick='location.href="security.php"'></mwc-tab>
                    </mwc-tab-bar>
                    <!-- Divider-->
                    <hr class="mt-0 mb-5" />
                    <!-- Billing cards row-->
                    <div class="row gx-5">
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <!-- Billing card 2-->
                            <div class="card card-raised h-100">
                                <div class="card-body">
                                    <div class="overline text-muted">Total Allowances</div>
                                    <?php ?>
                                    <div class="fs-4 mb-2">KSH <?php echo $totalAllowances ?? 0 ?></div>
                                </div>
                                <div class="card-footer position-relative d-flex align-items-center justify-content-between ripple-primary bg-transparent">
                                    <a class="card-link text-decoration-none stretched-link" href="#!">More</a>
                                    <i class="material-icons text-primary">arrow_forward</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <!-- Billing card 2-->
                            <div class="card card-raised h-100">
                                <div class="card-body">
                                    <div class="overline text-muted">Total Deductions</div>
                                    <div class="fs-4 mb-2">KSH <?php echo $totalDeductions ?? 0 ?></div>
                                </div>
                                <div class="card-footer position-relative d-flex align-items-center justify-content-between ripple-primary bg-transparent">
                                    <a class="card-link text-decoration-none stretched-link" href="#!">More</a>
                                    <i class="material-icons text-primary">arrow_forward</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <!-- Billing card 2-->
                            <div class="card card-raised h-100">
                                <div class="card-body">
                                    <div class="overline text-muted">Net Pay</div>
                                    <div class="fs-4 mb-2">KSH <?php echo $netPay ?? 0 ?></div>
                                </div>
                                <div class="card-footer position-relative d-flex align-items-center justify-content-between ripple-primary bg-transparent">
                                    <a class="card-link text-decoration-none stretched-link" href="#!">More</a>
                                    <i class="material-icons text-primary">arrow_forward</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Payment methods-->
                    <h2 class="font-monospace text-expanded text-uppercase fs-6 my-4">Payment</h2>
                    <div class="row gx-5">
                        <div class="col-md-6 mb-5">
                            <!-- Payment method card 2-->
                            <div class="card h-100">
                                <div class="card-body p-4 d-flex align-items-center">
                                    <img src="assets/img/brands/cc-visa.svg" alt="Visa Icon" style="height: 48px" />
                                    <div class="ms-3">
                                        <div class="display-6"><?php echo $bankName ?? 0 ?></div>
                                        <div class="small text-muted"><?php echo $bankAccount ?? 0 ?></div>
                                    </div>
                                </div>
                                <div class="card-actions p-3 justify-content-end">
                                    <div class="card-action-buttons">
                                        <button class="btn btn-text-primary" type="button"><a href="profile.php">Edit</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <!-- Add payment method card-->
                            <div class="card h-100 border-2 border-dashed ripple-primary">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <a class="stretched-link fst-button text-decoration-none d-inline-flex align-items-center" href="#!">
                                        <i class="material-icons icon-sm me-2">add</i>
                                        Add payment method
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Payment history-->
                    <!-- <h2 class="font-monospace text-expanded text-uppercase fs-6 my-4">Payment history</h2> -->

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
</body>

</html>
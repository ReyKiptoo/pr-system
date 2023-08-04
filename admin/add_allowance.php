<?php include('includes/connection.php') ?>
<?php

if (isset($_GET)) {
    $emp_id = $_GET['empId'];

    $query = "SELECT * FROM employee_allowances WHERE emp_id = $emp_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    $db_medical = $row['medical'] ?? 0;
    $db_house = $row['house'] ?? 0;
    $db_transport = $row['transport'] ?? 0;
    $db_mileage = $row['mileage'] ?? 0;
    $db_sitting = $row['sitting'] ?? 0;
}
if (isset($_POST['btnUpdate'])) {
    $medical = $_POST['medical'];
    $house = $_POST['house'];
    $transport = $_POST['transport'];
    $mileage = $_POST['mileage'];
    $sitting = $_POST['sitting'];

    // $sql = "INSERT INTO employee_data (employee_id, employee_name)
    //     VALUES ('$employee_id', '$employee_name')
    //     ON DUPLICATE KEY UPDATE employee_name='$employee_name'"

    $new_query = "INSERT INTO `employee_allowances`(`emp_id`, `medical`, `house`, `transport`, `mileage`, `sitting`) VALUES ('$emp_id','$medical','$house','$transport','$mileage','$sitting') ON DUPLICATE KEY UPDATE medical = '$medical', house = '$house', transport = '$transport', mileage = '$mileage', sitting = '$sitting'";

    $result = mysqli_query($connection, $new_query);
    if (!$result) {
        die();
    } else {
        header("Location: add_allowance.php?empId=$emp_id");
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

                    <!-- Colored status cards-->

                    <div class="card card-raised">
                        <div class="card-header bg-transparent px-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-4">
                                    <h2 class="card-title mb-0">Allowances</h2>
                                    <!-- <div class="card-subtitle">Details and history</div> -->
                                </div>

                            </div>
                        </div>

                        <form action="add_allowance.php?empId=<?php echo $emp_id ?>" method="post">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Allowance</th>
                                        <th scope="col">Amount (KSH)</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Medical Allowance</td>
                                        <td><mwc-textfield label="Medical" name="medical" value="<?php echo $db_medical ?? 0 ?>" outlined></mwc-textfield></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>House Allowance</td>
                                        <td><mwc-textfield label="House" value="<?php echo $db_house ?? 0 ?>" name="house" outlined></mwc-textfield></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Transport Allowance</td>
                                        <td><mwc-textfield label="Transport" value="<?php echo $db_transport ?? 0 ?>" name="transport" outlined></mwc-textfield></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mileage Allowance</td>
                                        <td><mwc-textfield label="Mileage" value="<?php echo $db_mileage ?? 0 ?>" name="mileage" outlined></mwc-textfield></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Sitting Allowance</td>
                                        <td><mwc-textfield label="Sitting" value="<?php echo $db_sitting ?? 0 ?>" name="sitting" outlined></mwc-textfield></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

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
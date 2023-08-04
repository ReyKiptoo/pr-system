<?php include('includes/connection.php') ?>

<!-- Warning: Undefined variable $emp_id in C:\xampp\htdocs\pr-system\admin\edit_emp.php on line 44
You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 -->

<?php
if (isset($_GET['editId'])) {

    $emp_id = $_GET['editId'];
    $query = "SELECT * FROM `employee_details` WHERE employee_id = $emp_id";
    $select_user_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $queryFname = $row['first_name'];
        $queryLname = $row['last_name'];
        $email = $row['email'];
        $phone = (int)$row['phone'];
        $gender = $row['gender'] ?? '';
        $natId = $row['nat_id'];
        $department = $row['department'] ?? '';
        $bankName = $row['bank_name'] ?? '';
        $bankAccountNo = $row['bank_account'];
        $kraPin = $row['kra_pin'];
        $address = $row['address'];
        $town = $row['town'];

        $salary = $row['salary'];
        $account_type = $row['account_type'];
    }
}
if (isset($_POST['updateBtn'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = (int)$_POST['phone'];
    $gender = $_POST['gender'] ?? '';
    $natId = $_POST['nationalId'];
    $department = $_POST['department'] ?? '';
    $bankName = $_POST['bankName'] ?? '';
    $bankAccountNo = $_POST['bankAccountNo'];
    $kraPin = $_POST['kraPin'];
    $address = $_POST['address'];
    $town = $_POST['town'];
    $salary = $_POST['salary'];
    $account_type = $_POST['account_type'];

    $new_query = "UPDATE `employee_details` SET first_name = '$firstName', last_name = '$lastName', email = '$email', gender = '$gender', bank_account ='$bankAccountNo', bank_name = '$bankName', address = '$address', phone = '$phone', nat_id = '$natId', department = '$department', kra_pin = '$kraPin', town = '$town', salary = '$salary', account_type = '$account_type' WHERE employee_id = $emp_id";

    $new_result = mysqli_query($connection, $new_query);

    if (!$new_result) {
        echo mysqli_error($connection);
        echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>Could not Update account
          <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    } else {

        echo "<div class='z-index-toast position-fixed bottom-0 start-0 translate-middle-x p-3'>
          <div class='toast align-items-center text-white bg-primary fade hide' role='alert' aria-live='assertive' aria-atomic='true' data-toast-name='bottomCenterDemo'>
              <div class='d-flex'>
                  <div class='toast-body'>Hello, world! This is a toast message.</div>
                  <button class='btn-close btn-close-white me-2 m-auto' type='button' data-bs-dismiss='toast' aria-label='Close'></button>
              </div>
          </div>
      </div>";
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
                            <div class="card-title">Account Details</div>
                            <div class="card-subtitle mb-4">
                                Review and update employee account information below.
                            </div>
                            <form action="edit_emp.php?editId=<?php echo $emp_id ?>" method="post">
                                <!-- Form Group (username)-->
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" name="email" type="email" label="Email" value="<?php echo $email ?>" outlined required="true"></mwc-textfield>
                                </div>
                                <!-- Form Row-->
                                <div class="row mb-4">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="salary" label="Salary" value="<?php echo $salary ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <mwc-select class="w-100" outlined label="Account Type" name="account_type" value="<?php echo $account_type ?>" required="true">
                                            <mwc-list-item value="ordinary">Ordinary</mwc-list-item>
                                            <mwc-list-item value="admin">Admin</mwc-list-item>
                                        </mwc-select>
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <!-- Form Row-->
                                <div class="row mb-4">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="firstName" label="First Name" value="<?php echo $queryFname ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="lastName" label="Last Name" value="<?php echo $queryLname ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row mb-4">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="phone" label="Phone" type="number" value="<?php echo $phone ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <mwc-select class="w-100" outlined label="Gender" name="gender" value="<?php echo $gender ?>" required="true">
                                            <mwc-list-item value="M">Male</mwc-list-item>
                                            <mwc-list-item value="F">Female</mwc-list-item>
                                        </mwc-select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="nationalId" type="number" label="National ID" outlined value="<?php echo $natId ?>" required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <mwc-select class="w-100" outlined label="Department" value="<?php echo $department ?>" name="department" required="true">
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
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-4">
                                    <mwc-select class="w-100" outlined label="Bank" name="bankName" value="<?php echo $bankName ?>" required="true">
                                        <mwc-list-item value="Equity Bank">Equity Bank</mwc-list-item>
                                        <mwc-list-item value="KCB">KCB</mwc-list-item>
                                        <mwc-list-item value="Cooperative Bank">Cooperative Bank</mwc-list-item>
                                        <mwc-list-item value="Standard Chartered">Standard Chartered</mwc-list-item>
                                        <mwc-list-item value="Family Bank">Family Bank</mwc-list-item>
                                        <mwc-list-item value="Absa">Absa</mwc-list-item>
                                    </mwc-select>
                                </div>
                                <!-- Form Row-->
                                <div class="row mb-4">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="bankAccountNo" label="Bank Account No" value="<?php echo $bankAccountNo ?>" type="number" outlined required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (birth month)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="kraPin" label="KRA Pin" value="<?php echo $kraPin ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="address" label="Address" value="<?php echo $address ?>" outlined required="true"></mwc-textfield>
                                    </div>
                                    <!-- Form Group (birth month)-->
                                    <div class="col-md-6">
                                        <mwc-textfield class="w-100" name="town" value="<?php echo $town ?>" label="City/Town" outlined required="true"></mwc-textfield>
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <div class="text-end">
                                    <button class="btn btn-primary" type="submit" name="updateBtn">
                                        Save changes
                                    </button>
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
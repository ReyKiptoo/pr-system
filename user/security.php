<?php include('includes/connection.php'); ?>
<?php
if (isset($_POST['resetPass'])) {
    $id = $_SESSION['id'];

    $currPass = $_POST['curr_pass'];
    $newPass = $_POST['pass'];
    $verifyPass = $_POST['pass_verify'];
    $query = "SELECT * FROM `employee_details` WHERE employee_id = $id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $db_password = $row['password'];

    if (password_verify($currPass, $db_password)) {
        if ($verifyPass == $newPass) {
            // proceed to update password
            $hashedNewPassword = password_hash($newPass, PASSWORD_DEFAULT);
            $update_query = "UPDATE `employee_details` SET password = '$hashedNewPassword' WHERE employee_id = $id";

            $update_result = mysqli_query($connection, $update_query);

            header("Location: ../index.php?pass");
        } else {
            // Print passwords do not match

            // echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Hey There! </strong>Your passwords do not match.
            // <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
            // </div>";
        }
    } else {
        // print password do not match with password in db
    }
} else if (isset($_POST['deleteAcc'])) {
    $id = $_SESSION['id'];
    $query = "DELETE FROM `employee_details` WHERE employee_id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: ../index.php");
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
                        <h1 class="text-white py-3 mb-0 display-6">Account Settings - Security</h1>
                    </div>
                </header>
                <!-- Account security page content-->
                <div class="container-xl p-5">
                    <!-- Tab bar navigation-->
                    <mwc-tab-bar style="margin-bottom: -1px" activeIndex="2">
                        <mwc-tab label="Billing" icon="account_balance" stacked onClick='location.href="billing.php"'></mwc-tab>
                        <mwc-tab label="Profile" icon="person" stacked onClick='location.href="profile.php"'></mwc-tab>
                        <mwc-tab label="Security" icon="security" stacked onClick='location.href="security.php"'></mwc-tab>
                    </mwc-tab-bar>
                    <!-- Divider-->
                    <hr class="mt-0 mb-5" />
                    <!-- Security content row-->
                    <div class="row gx-5">
                        <div class="col-lg-7">
                            <!-- Change password card-->
                            <div class="card card-raised mb-5">
                                <div class="card-body p-5">
                                    <div class="card-title">Change Password</div>
                                    <div class="card-subtitle mb-4">Create a strong password for your account.</div>
                                    <form method="post" action="security.php">
                                        <div class="mb-4"><mwc-textfield class="w-100" label="Current Password" name="curr_pass" outlined icontrailing="visibility_off" type="password" required="true"></mwc-textfield>
                                        </div>
                                        <div class="mb-4">
                                            <mwc-textfield class="w-100" label="New Password" name="pass" outlined icontrailing="visibility_off" type="password" required="true"></mwc-textfield>
                                        </div>
                                        <div class="mb-4">
                                            <mwc-textfield class="w-100" label="Repeat Password" name="pass_verify" outlined icontrailing="visibility_off" type="password" required="true"></mwc-textfield>
                                        </div>
                                        <div class="text-end"><button class="btn btn-primary" type="submit" name="resetPass">Reset Password</button></div>
                                    </form>
                                </div>
                            </div>
                            <!-- Security preferences card-->
                        </div>

                        <div class="col-lg-5">
                            <!-- Delete account card-->
                            <div class="card card-raised mb-5">
                                <form action="security.php" method="post">
                                    <div class="card-body p-5">
                                        <div class="card-title">Delete Account</div>
                                        <div class="card-subtitle mb-4">Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</div>
                                        <button class="btn btn-text-danger" type="submit" name="deleteAcc">I understand, delete my account</button>
                                    </div>
                                </form>
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
</body>

</html>
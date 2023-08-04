<?php include('includes/connection.php') ?>
<?php
$noDuplicates = true;
if (isset($_POST['signupBtn'])) {




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
  $password = $_POST['pass'];
  $pass_verify =  $_POST['pass_verify'];

  // $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

  if ($pass_verify !== $password) {
    echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Hey There! </strong>Your passwords do not match.
  <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  } else if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($natId) || empty($bankAccountNo) || empty($kraPin) || empty($address) || empty($town) || empty($password) || empty($pass_verify) || empty($gender) || empty($department) || empty($bankName)) {
    echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>One or more fields are empty.
  <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  } else {

    //Check for duplicates
    $query_phone = "SELECT * FROM `employee_details` WHERE phone = '$phone'";
    $result_phone = mysqli_query($connection, $query_phone);
    $phone_num = mysqli_num_rows($result_phone);

    $query_id = "SELECT * FROM `employee_details` WHERE nat_id = '$natId'";
    $result_id = mysqli_query($connection, $query_id);

    $query_email = "SELECT * FROM `employee_details` WHERE email = '$email'";
    $result_email = mysqli_query($connection, $query_email);

    $query_kra = "SELECT * FROM `employee_details` WHERE kra_pin = '$kraPin'";
    $result_kra = mysqli_query($connection, $query_kra);

    if (mysqli_num_rows($result_email) > 0 || mysqli_num_rows($result_phone) > 0 || mysqli_num_rows($result_id) > 0 || mysqli_num_rows($result_kra) > 0) {
      echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>One  or more fields (Email, National ID, KRA Pin or Phone Number) already exists.
    <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    } else {
      $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $new_query = " INSERT INTO `employee_details` (`first_name`, `last_name`, `email`, `password`, `gender`, `bank_account`, `bank_name`, `address`, `phone`, `nat_id`, `department`, `kra_pin`,`town`) VALUES ('$firstName', '$lastName', '$email', '$password', '$gender', $bankAccountNo, '$bankName', '$address', $phone, $natId, '$department', '$kraPin', '$town')";

      $new_result = mysqli_query($connection, $new_query);

      //Add allowance details to employees table


      if (!$new_result) {
        echo mysqli_error($connection);
        echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>Could not create account
                <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
      } else {
        header("Location: index.php?success");
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
  <title>Create Account - JKUAT Payroll System</title>
  <!-- Load Favicon-->
  <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <!-- Load Material Icons from Google Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
  <!-- Roboto and Roboto Mono fonts from Google Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
  <!-- Load main stylesheet-->
  <link href="css/styles.css" rel="stylesheet" />
  <style>
    .bg-pattern-waihou {
      background-repeat: repeat-y;
    }
  </style>
</head>

<body class="bg-pattern-waihou">
  <!-- Layout wrapper-->
  <div id="layoutAuthentication">
    <!-- Layout content-->
    <div id="layoutAuthentication_content">
      <!-- Main page content-->
      <main>
        <!-- Main content container-->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-7 col-xl-10">
              <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-5">
                <div class="card-body p-5">
                  <!-- Auth header with logo image-->
                  <div class="text-center">
                    <img class="mb-3" src="assets/img/icons/background.svg" alt="..." style="height: 48px" />
                    <h1 class="display-5 mb-0">Create New Account</h1>
                    <div class="subheading-1 mb-5">to continue to app</div>
                  </div>
                  <!-- Register new account form-->
                  <form method="post" action="register.php">
                    <div class="row">
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="firstName" label="First Name" outlined required="true"></mwc-textfield>
                      </div>
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="lastName" label="Last Name" outlined required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="phone" label="Phone" type="number" outlined required="true"></mwc-textfield>
                      </div>
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="email" type="email" label="Email" outlined required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mb-4">
                        <mwc-select class="w-100" outlined label="Gender" name="gender" required="true">
                          <mwc-list-item value="M">Male</mwc-list-item>
                          <mwc-list-item value="F">Female</mwc-list-item>
                        </mwc-select>
                      </div>
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="nationalId" type="number" label="National ID" outlined required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="mb-4">
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
                        <mwc-textfield class="w-100" name="bankAccountNo" label="Bank Account No" type="number" outlined required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="kraPin" label="KRA Pin" outlined required="true"></mwc-textfield>
                      </div>
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="address" label="Address" outlined required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="mb-4">
                      <mwc-textfield class="w-100" name="town" label="City/Town" outlined required="true"></mwc-textfield>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" label="Password" name="pass" outlined icontrailing="visibility_off" type="password" required="true"></mwc-textfield>
                      </div>
                      <div class="col-sm-6 mb-4">
                        <mwc-textfield class="w-100" name="pass_verify" label="Verify Password" outlined icontrailing="visibility_off" type="password" required="true"></mwc-textfield>
                      </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                      <a class="small fw-500 text-decoration-none" href="index.php">Sign In Instead</a>
                      <button class="btn btn-primary" name="signupBtn" type="submit">Create Account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- Layout footer-->
    <div id="layoutAuthentication_footer">
      <!-- Auth footer-->
      <footer class="p-4">
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between small">
          <div class="me-sm-3 mb-2 mb-sm-0">
            <div class="fw-500 text-white">
              Copyright &copy; Your Website 2023
            </div>
          </div>
          <div class="ms-sm-3">
            <a class="fw-500 text-decoration-none link-white" href="#!">Privacy</a>
            <a class="fw-500 text-decoration-none link-white mx-4" href="#!">Terms</a>
            <a class="fw-500 text-decoration-none link-white" href="#!">Help</a>
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
<?php include('includes/connection.php'); ?>
<?php
// session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM `employee_details` WHERE employee_id = $id";
$select_user_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_user_query)) {
  $firstName = $row['first_name'];
  $lastName = $row['last_name'];
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

  $new_query = "UPDATE `employee_details` SET first_name = '$firstName', last_name = '$lastName', email = '$email', gender = '$gender', bank_account ='$bankAccountNo', bank_name = '$bankName', address = '$address', phone = '$phone', nat_id = '$natId', department = '$department', kra_pin = '$kraPin', town = '$town' WHERE employee_id = $id";

  $new_result = mysqli_query($connection, $new_query);

  if (!$new_result) {
    echo mysqli_error($connection);
    echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>Could not Update account
          <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  } else {
    header('Location profile.php');
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
  <title>Profile - JKUAT Payroll System</title>
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
            <h1 class="text-white py-3 mb-0 display-6">
              Account Settings - Profile
            </h1>
          </div>
        </header>
        <!-- Account profile page content-->
        <div class="container-xl p-5">
          <!-- Tab bar navigation-->
          <mwc-tab-bar style="margin-bottom: -1px" activeIndex="1">
            <mwc-tab label="Billing" icon="account_balance" stacked onClick='location.href="billing.php"'></mwc-tab>
            <mwc-tab label="Profile" icon="person" stacked onClick='location.href="profile.php"'></mwc-tab>
            <mwc-tab label="Security" icon="security" stacked onClick='location.href="security.php"'></mwc-tab>
          </mwc-tab-bar>
          <!-- Divider-->
          <hr class="mt-0 mb-5" />
          <!-- Profile content row-->
          <div class="row gx-5">

            <div class="col-xl-12">
              <!-- Account details card-->
              <div class="card card-raised mb-5">
                <div class="card-body p-5">
                  <div class="card-title">Account Details</div>
                  <div class="card-subtitle mb-4">
                    Review and update your account information below.
                  </div>
                  <form action="profile.php" method="post">
                    <!-- Form Group (username)-->
                    <div class="mb-4">
                      <mwc-textfield class="w-100" name="email" type="email" label="Email" value="<?php echo $email ?>" outlined required="true"></mwc-textfield>
                    </div>
                    <!-- Form Row-->
                    <div class="row mb-4">
                      <!-- Form Group (first name)-->
                      <div class="col-md-6">
                        <mwc-textfield class="w-100" name="firstName" label="First Name" value="<?php echo $firstName ?>" outlined required="true"></mwc-textfield>
                      </div>
                      <!-- Form Group (last name)-->
                      <div class="col-md-6">
                        <mwc-textfield class="w-100" name="lastName" label="Last Name" value="<?php echo $lastName ?>" outlined required="true"></mwc-textfield>
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
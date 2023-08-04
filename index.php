<?php include('includes/connection.php') ?>

<?php
session_destroy();

if(isset($_GET['success'])) {
  echo "<div class='alert alert-success text-center alert-dismissible fade show' role='alert'><strong>Success! </strong>Sign Up successful. Proceed to Log In below.
  <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
} else if(isset($_GET['pass'])) {
  echo "<div class='alert alert-primary text-center alert-dismissible fade show' role='alert'><strong>Password changed! </strong>Log in again to proceed.
  <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
if(isset($_POST['loginBtn'])) {
  session_start();
  $email = $_POST['email'];
  $user_password = $_POST['password'];

  $query = "SELECT * FROM `employee_details` WHERE email = '$email'";
  $result = mysqli_query($connection, $query);

  if($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $password = $row['password'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $accountType = $row['account_type'];
    $id = $row['employee_id'];
   if(password_verify($user_password,  $password)) {
    $_SESSION['id'] = $id;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['accountType'] = $accountType;
    if($accountType == 'admin') {
      header("Location:  admin/index.php");
    } else {
      header("Location:  user/index.php");
    }
   } else {
    echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>Invalid Email or Password.
    <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
   }
  } else {
    echo "<div class='alert alert-danger text-center alert-dismissible fade show' role='alert'><strong>Error! </strong>Invalid Email or Password.
    <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Material Admin Pro</title>
    <!-- Load Favicon-->
    <link
      href="assets/img/favicon.ico"
      rel="shortcut icon"
      type="image/x-icon"
    />
    <!-- Load Material Icons from Google Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet"
    />
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500"
      rel="stylesheet"
    />
    <!-- Load main stylesheet-->
    <link href="css/styles.css" rel="stylesheet" />
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
              <div class="col-xxl-10 col-xl-10 col-lg-12">
                <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                  <div class="row g-0">
                    <div class="col-lg-5 col-md-6">
                      <div class="card-body p-5">
                        <!-- Auth header with logo image-->
                        <div class="text-center">
                          <img
                            class="mb-3"
                            src="assets/img/icons/background.svg"
                            alt="..."
                            style="height: 48px"
                          />
                          <h1 class="display-5 mb-0">Login</h1>
                          <div class="subheading-1 mb-5">
                            to continue to app
                          </div>
                        </div>
                        <!-- Login submission form-->
                        <form class="mb-5" method="post" action="index.php">
                          <div class="mb-4">
                            <mwc-textfield
                              class="w-100"
                              label="Email"
                              name="email"
                              outlined
                            ></mwc-textfield>
                          </div>
                          <div class="mb-4">
                            <mwc-textfield
                              class="w-100"
                              label="Password"
                              name="password"
                              outlined
                              icontrailing="visibility_off"
                              type="password"
                            ></mwc-textfield>
                          </div>
                          <div
                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
                          >
                            <a
                              class="small fw-500 text-decoration-none"
                              href="app-auth-password-basic.html"
                              >Forgot Password?</a
                            >
                            <button class="btn btn-primary" type="submit" name="loginBtn"
                              >Login</button>
                          </div>
                        </form>
                        <!-- Auth card message-->
                        <div class="text-center">
                          <a
                            class="small fw-500 text-decoration-none"
                            href="register.php"
                            >New User? Create an account!</a
                          >
                        </div>
                      </div>
                    </div>
                    <!-- Background image column using inline CSS-->
                    <div
                      class="col-lg-7 col-md-6 d-none d-md-block"
                      style="
                        /* background-image: url('https://source.unsplash.com/-uHVRvDr7pg/1600x900'); */
                        background-image: url('https://source.unsplash.com/-KJE--xk4AWE/1600x900');
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                      "
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- Layout footer-->
      <div id="layoutAuthentication_footer"></div>
    </div>
    <!-- Load Bootstrap JS bundle-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- Load global scripts-->
    <script type="module" src="js/material.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

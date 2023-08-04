<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['accountType'])) {
    if ($_SESSION['accountType'] !== 'admin') {
        header("Location: ../index.php");
    } else {
        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $id = $_SESSION['id'];
    }
} else {
    header("Location: ../index.php");
}

?>
<nav class="top-app-bar navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto" href="index.php">
            <div class="text-uppercase font-monospace">JKUAT Payroll System | Admin</div>
        </a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-lg-flex">
                <!-- <li class="nav-item"><a class="nav-link" href="#">Overview</a></li> -->
                <li class="nav-item"><a class="nav-link" href="#"><?php echo $firstName ?></a></li>
            </ul>
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- User profile dropdown-->
                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">person</i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <li>
                            <a class="dropdown-item" href="#!">
                                <i class="material-icons leading-icon">person</i>
                                <div class="me-3">Profile</div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="includes/log_out.php">
                                <i class="material-icons leading-icon">logout</i>
                                <div class="me-3">Logout</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
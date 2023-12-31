<nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
    <div class="drawer-menu">
        <div class="nav">
            <!-- Drawer section heading (Account)-->
            <div class="drawer-menu-heading d-sm-none">Account</div>
            <!-- Drawer link (Notifications)-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                Notifications
            </a>
            <!-- Drawer link (Messages)-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                Messages
            </a>
            <!-- Divider-->
            <div class="drawer-menu-divider d-sm-none"></div>
            <!-- Drawer section heading (Interface)-->
            <div class="drawer-menu-heading">Interface</div>
            <!-- Drawer link (Overview)-->
            <a class="nav-link" href="index.php">
                <div class="nav-link-icon"><i class="material-icons">language</i></div>
                Overview
            </a>
            <!-- Drawer link (Dashboards)-->
            <a class="nav-link collapsed" href="billing.php">
                <div class="nav-link-icon"><i class="material-icons leading-icon">person</i></div>
                Profile
            </a>
            <!-- Drawer link (Layouts)-->
            <a class="nav-link collapsed" href="payslip.php">
                <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                Payslips
            </a>
            <!-- Drawer link (Pages)-->

        </div>
    </div>
    <!-- Drawer footer        -->
    <div class="drawer-footer border-top">
        <div class="d-flex align-items-center">
            <i class="material-icons text-muted">account_circle</i>
            <div class="ms-3">
                <div class="caption">Logged in as:</div>
                <div class="small fw-500"><?php echo "$firstName $lastName" ?></div>
            </div>
        </div>
    </div>
</nav>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Dashboard</title>
    <!-- Load Favicon-->
    <link href="./assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Load Simple DataTables Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- Load Litepicker stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/style.css" rel="stylesheet" />
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
                <header class="bg-primary">
                    <div class="container-xl p-5">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-md mb-4 mb-md-0">
                                <h1 class="mb-1 display-4 fw-500 text-white">Hello, <?php echo $firstName ?></h1>
                                <p class="lead mb-0 text-white">Your dashboard is ready to go!</p>
                            </div>

                        </div>
                    </div>
                </header>
                <div class="container-xl p-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="card card-raised border-start border-4 border-primary">
                                <div class="card-body px-4">
                                    <div class="overline text-muted mb-1">Basic Salary</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="display-6 me-3">Ksh 24000</div>
                                        <div class="d-flex align-items-center text-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="card card-raised border-start border-4 border-secondary">
                                <div class="card-body px-4">
                                    <div class="overline text-muted mb-1">Gross Pay</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="display-6 me-3">Ksh 2300</div>
                                        <div class="d-flex align-items-center text-muted">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="card card-raised border-start border-4 border-info">
                                <div class="card-body px-4">
                                    <div class="overline text-muted mb-1">Net Pay</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="display-6 me-3">Ksh 2000</div>
                                        <div class="d-flex align-items-center text-danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-raised mb-5">
                        <div class="card-header bg-transparent px-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-4">
                                    <h2 class="display-6 mb-0">Orders</h2>
                                    <div class="card-text">Details and history</div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">download</i></button>
                                    <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">print</i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <!-- Simple DataTables example-->
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th data-type="date" data-format="YYYY/MM/DD">Start Date</th>
                                        <th>Order No.</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2005/02/11</td>
                                        <td>9958</td>
                                        <td>Unity Pugh</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-primary">Processing</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/04/07</td>
                                        <td>8971</td>
                                        <td>Theodore Duran</td>
                                        <td>$25.00</td>
                                        <td><span class="badge bg-primary">Processing</span></td>
                                    </tr>
                                    <tr>
                                        <td>2005/09/08</td>
                                        <td>3147</td>
                                        <td>Kylie Bishop</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-info">Pending Payment</span></td>
                                    </tr>
                                    <tr>
                                        <td>2009/29/11</td>
                                        <td>3497</td>
                                        <td>Willow Gilliam</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/11/09</td>
                                        <td>5018</td>
                                        <td>Blossom Dickerson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/03/08</td>
                                        <td>3925</td>
                                        <td>Elliott Snyder</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/23/12</td>
                                        <td>9488</td>
                                        <td>Castor Pugh</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/31/08</td>
                                        <td>6231</td>
                                        <td>Pearl Carlson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-gray">Refunded</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/26/08</td>
                                        <td>1579</td>
                                        <td>Deirdre Bridges</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/11/01</td>
                                        <td>6095</td>
                                        <td>Daniel Baldwin</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/16/04</td>
                                        <td>9519</td>
                                        <td>Phelan Kane</td>
                                        <td>$25.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2011/26/01</td>
                                        <td>1339</td>
                                        <td>Quentin Salas</td>
                                        <td>$89.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/06/11</td>
                                        <td>6583</td>
                                        <td>Armand Suarez</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1998/26/10</td>
                                        <td>5393</td>
                                        <td>Gretchen Rogers</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2008/06/08</td>
                                        <td>2824</td>
                                        <td>Harding Thompson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/04/10</td>
                                        <td>4393</td>
                                        <td>Mira Rocha</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2011/18/10</td>
                                        <td>2931</td>
                                        <td>Drew Phillips</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/08/04</td>
                                        <td>6205</td>
                                        <td>Emerald Warner</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2004/02/01</td>
                                        <td>7457</td>
                                        <td>Colin Burch</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/28/04</td>
                                        <td>8916</td>
                                        <td>Russell Haynes</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/18/04</td>
                                        <td>9011</td>
                                        <td>Brennan Brooks</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/21/05</td>
                                        <td>8075</td>
                                        <td>Kane Anthony</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/07/01</td>
                                        <td>1019</td>
                                        <td>Scarlett Hurst</td>
                                        <td>$25.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2007/30/05</td>
                                        <td>3008</td>
                                        <td>James Scott</td>
                                        <td>$25.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2009/15/02</td>
                                        <td>9054</td>
                                        <td>Desiree Ferguson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2008/23/12</td>
                                        <td>9160</td>
                                        <td>Elaine Bishop</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2004/23/05</td>
                                        <td>6307</td>
                                        <td>Hilda Nelson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2009/12/03</td>
                                        <td>3820</td>
                                        <td>Evangeline Beasley</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/19/02</td>
                                        <td>5694</td>
                                        <td>Wyatt Riley</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/23/06</td>
                                        <td>3547</td>
                                        <td>Wyatt Mccarthy</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2016/27/02</td>
                                        <td>6273</td>
                                        <td>Cairo Rice</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/03/02</td>
                                        <td>6829</td>
                                        <td>Sylvia Peters</td>
                                        <td>$54.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/26/04</td>
                                        <td>5515</td>
                                        <td>Kasper Craig</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2001/09/02</td>
                                        <td>5112</td>
                                        <td>Leigh Ruiz</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2010/24/03</td>
                                        <td>5741</td>
                                        <td>Athena Aguirre</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2003/26/02</td>
                                        <td>5533</td>
                                        <td>Riley Nunez</td>
                                        <td>$89.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/05/01</td>
                                        <td>9393</td>
                                        <td>Lois Talley</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/25/09</td>
                                        <td>1024</td>
                                        <td>Hop Bass</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2013/26/06</td>
                                        <td>9184</td>
                                        <td>Kalia Diaz</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2011/23/04</td>
                                        <td>6682</td>
                                        <td>Maia Pate</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/03/08</td>
                                        <td>4457</td>
                                        <td>Macaulay Pruitt</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2001/05/10</td>
                                        <td>9464</td>
                                        <td>Danielle Oconnor</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/11/05</td>
                                        <td>4842</td>
                                        <td>Kato Carr</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2007/25/04</td>
                                        <td>7133</td>
                                        <td>Malachi Mejia</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/14/03</td>
                                        <td>3476</td>
                                        <td>Dominic Carver</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2001/18/11</td>
                                        <td>4424</td>
                                        <td>Paki Santos</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2010/19/09</td>
                                        <td>1862</td>
                                        <td>Ross Hodges</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2011/05/07</td>
                                        <td>3514</td>
                                        <td>Hilda Whitley</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2008/02/09</td>
                                        <td>4006</td>
                                        <td>Roth Cherry</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2009/07/08</td>
                                        <td>8642</td>
                                        <td>Lareina Jones</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2010/15/01</td>
                                        <td>2289</td>
                                        <td>Joshua Weiss</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/17/12</td>
                                        <td>5952</td>
                                        <td>Kiona Lowery</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2008/27/01</td>
                                        <td>7567</td>
                                        <td>Nina Rush</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/24/07</td>
                                        <td>2000</td>
                                        <td>Palmer Parker</td>
                                        <td>$18.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2016/08/01</td>
                                        <td>3745</td>
                                        <td>Vielka Olsen</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2007/16/02</td>
                                        <td>8604</td>
                                        <td>Meghan Cunningham</td>
                                        <td>$22.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/05/03</td>
                                        <td>6447</td>
                                        <td>Iola Shaw</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2007/16/11</td>
                                        <td>4564</td>
                                        <td>Imelda Cole</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/07/07</td>
                                        <td>6801</td>
                                        <td>Jerry Beach</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/06/08</td>
                                        <td>3938</td>
                                        <td>Garrett Rocha</td>
                                        <td>$128.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/21/01</td>
                                        <td>1724</td>
                                        <td>Derek Kerr</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/10/12</td>
                                        <td>5944</td>
                                        <td>Shad Hudson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/12/11</td>
                                        <td>8276</td>
                                        <td>Daryl Ayers</td>
                                        <td>$48.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/13/02</td>
                                        <td>3094</td>
                                        <td>Caleb Livingston</td>
                                        <td>$24.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/06/02</td>
                                        <td>4576</td>
                                        <td>Sydney Meyer</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-gray">Refunded</span></td>
                                    </tr>
                                    <tr>
                                        <td>2008/07/05</td>
                                        <td>8501</td>
                                        <td>Lani Lawrence</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2004/19/04</td>
                                        <td>2576</td>
                                        <td>Allegra Shepherd</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2005/15/02</td>
                                        <td>3178</td>
                                        <td>Fallon Reyes</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2003/02/05</td>
                                        <td>4357</td>
                                        <td>Karen Whitley</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2003/05/07</td>
                                        <td>5350</td>
                                        <td>Stewart Stephenson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/16/12</td>
                                        <td>7544</td>
                                        <td>Ursula Reynolds</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2014/15/09</td>
                                        <td>4425</td>
                                        <td>Adrienne Winters</td>
                                        <td>$56.00</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/12/06</td>
                                        <td>1337</td>
                                        <td>Francesca Brock</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2013/27/06</td>
                                        <td>7629</td>
                                        <td>Ursa Davenport</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/08/09</td>
                                        <td>3310</td>
                                        <td>Mark Brock</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/27/03</td>
                                        <td>5050</td>
                                        <td>Dale Rush</td>
                                        <td>$18.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2013/13/11</td>
                                        <td>3845</td>
                                        <td>Shellie Murphy</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/22/10</td>
                                        <td>4539</td>
                                        <td>Porter Nicholson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/11/01</td>
                                        <td>1265</td>
                                        <td>Oliver Huber</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/23/03</td>
                                        <td>3315</td>
                                        <td>Calista Maynard</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-gray">Refunded</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/25/04</td>
                                        <td>6825</td>
                                        <td>Lois Vargas</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2001/22/03</td>
                                        <td>2785</td>
                                        <td>Hermione Dickson</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/09/02</td>
                                        <td>5416</td>
                                        <td>Dalton Jennings</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/27/07</td>
                                        <td>3380</td>
                                        <td>Cathleen Kramer</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2006/04/09</td>
                                        <td>6730</td>
                                        <td>Zachery Morgan</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/27/12</td>
                                        <td>4077</td>
                                        <td>Yoko Freeman</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2010/25/07</td>
                                        <td>4240</td>
                                        <td>Chaim Waller</td>
                                        <td>$80.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2016/23/02</td>
                                        <td>4532</td>
                                        <td>Berk Johnston</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2010/09/05</td>
                                        <td>2902</td>
                                        <td>Tad Munoz</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2001/09/01</td>
                                        <td>5653</td>
                                        <td>Vivien Dominguez</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2015/07/12</td>
                                        <td>3241</td>
                                        <td>Carissa Lara</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1998/06/09</td>
                                        <td>8101</td>
                                        <td>Hammett Gordon</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2011/12/11</td>
                                        <td>6901</td>
                                        <td>Walker Nixon</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2002/25/01</td>
                                        <td>5956</td>
                                        <td>Nathan Espinoza</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1999/02/07</td>
                                        <td>4836</td>
                                        <td>Kelly Cameron</td>
                                        <td>$18.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>1998/07/07</td>
                                        <td>3796</td>
                                        <td>Kyra Moses</td>
                                        <td>$12.00</td>
                                        <td><span class="badge bg-gray">Refunded</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/02/10</td>
                                        <td>8340</td>
                                        <td>Grace Bishop</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2000/30/01</td>
                                        <td>8136</td>
                                        <td>Haviva Hernandez</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2007/01/11</td>
                                        <td>9853</td>
                                        <td>Alisa Horn</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>2012/03/03</td>
                                        <td>7516</td>
                                        <td>Zelenia Roman</td>
                                        <td>$16.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                </tbody>
                            </table>
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
    <!-- Load Simple DataTables Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <!-- Load Litepicker plugin scripts-->
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/js/main.nocss.js" crossorigin="anonymous"></script>
    <script src="js/litepicker.js"></script>
</body>

</html>
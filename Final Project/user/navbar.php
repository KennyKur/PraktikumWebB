<?php 
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $data = queryFetch("SELECT * FROM detail_users WHERE user_id='$id'");
}
?>
<body>
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
            <div class="container-fluid" style="max-width: 90%">
                <a class="navbar-brand" href="index.php">
                <h3 class="display-3 text-white">Perpus-GO</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a class="navbar-brand" href="index.php">
                                <h3 class="display-3 text-white">Perpus-GO</h3>
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php if (stripos($_SERVER['REQUEST_URI'],'list.php')){?>
                        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                            <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                                <i class="ni ni-collection d-lg-none"></i>
                                <button class="btn btn-neutral">Filter Kategori</button>
                            </a>
                            <div class="dropdown-menu">
                            <?php 
                            $sql = "SELECT nama FROM kategori";
                            $datas = queryMultiple($sql);
                            foreach($datas as $row)
                            {?>
                                <a href="list.php?<?php echo "kategori=".$row['nama']?> " class="dropdown-item"><?=$row['nama']?></a>
                            <?php } ?>
                            </div>
                            </li>
                        </ul>   
                        <form method="GET" action="list.php" class="form-inline my-3 my-lg-0 mr-auto">
                            <input name="cari" id="navbar-search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-danger my-2 my-sm-0" type="submit">Search..</button>
                        </form>
                    <?php } ?>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <?php if (isset($_SESSION['email'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="#">
                                    <i class="ni ni-spaceship"></i>
                                    <span class="nav-link-inner--text d-lg-none">Discover</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-circle-08 mr-2"></i>
                                    <?= $data['nama']?>
                                    <span class="nav-link-inner--text d-lg-none">Settings</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                                    <a class="dropdown-item" href="/travelkuy/customer/profile.php"><?= $data['nama'] ?></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i>Histori</a>
                                    <a class="dropdown-item" href="#><i class="ni ni-ui-04"></i>Edit Email</a>
                                    <a class="dropdown-item" href="#><i class="ni ni-key-25"></i>Edit Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../php/login.php?act=logout"><i class="ni ni-button-power"></i>Logout</a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">
                                    REGISTER
                                </a>
                            </li>
                            <li class="nav-item d-lg-block ml-lg-4">
                                <a href="login.php" class="btn btn-neutral btn-icon">
                                    <span class="nav-link-inner--text">LOGIN</span>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
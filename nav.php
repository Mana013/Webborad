<nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                    <form class="d-flex"><?php if(!isset($_SESSION['id'])) { ?>                     
                        <a href="login.php" class="navbar-brand"><i class="bi bi-box-arrow-in-left"></i> เข้าสู่ระบบ</a>
                            <?php  }else { ?>
                                <nav class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "<i class='bi bi-people-fill'></i> $_SESSION[username]" ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                                </ul>
                            </nav>
                                <?php }?>
                    </form>
                </div>
            </nav>
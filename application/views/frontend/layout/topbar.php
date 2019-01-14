<div id="wrapper-navbar">
    <nav id="top" class="navbar py-3 fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-sm-5" href="<?= base_url();?>" style="color:#965adf;font-family: 'Monotype Corsiva'"><b>NIKAH YUKK!!!</b></a>
        <button class="navbar-toggler collapsed navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
            <span class="sr-only">Toggle navigation</span>
        </button> 
        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link   mr-3 open my-lg-0 my-2 ml-lg-0 ml-3" href="https://goo.gl/vvKF2z" target="blank" id="navbarDropdown1" aria-haspopup="true" aria-expanded="false">
                        Kuisioner
                    </a>
                </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link   mr-3 open my-lg-0 my-2 ml-lg-0 ml-3" href="<?= base_url();?>myaccount/tambah-gedung"  id="navbarDropdown1"  aria-haspopup="true" aria-expanded="false">
                            Tambah Gedung
                        </a>
                    </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-menu-right  ml-lg-0 ml-3 mr-4 my-lg-0 my-2 lastitem" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Account
                    </a>
                    <div class="dropdown-divider d-lg-none"></div>

                    <?php if(isset($_SESSION['logged_in_user'])) { ?>
                        <div class="dropdown-menu dropdownId dropdown-menu-right" aria-labelledby="navbarDropdown6">
                            <a class="dropdown-item mt-1" href="<?= base_url()?>myaccount">Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url()?>Logout">Logout</a>
                        </div>
                    <?php } else {?>
                        <div class="dropdown-menu dropdownId dropdown-menu-right" aria-labelledby="navbarDropdown6">
                            <a class="dropdown-item mt-1" href="<?= base_url()?>login">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url()?>register">Register</a>
                        </div>
                    <?php } ?>
                </li>
            </ul>               
        </div>        
    </nav>
</div>

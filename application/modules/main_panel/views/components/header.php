<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex w-100">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?=base_url('dashboard')?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <i class="fas fa-home" style="font-size: 23px;color: #ffff;"></i>
                    </span>
                    <span class="logo-lg">
                        <img src="<?=base_url()?>assets/back/images/logo-dark.png" alt="logo-dark" height="23">
                    </span>
                </a>
                <a href="<?=base_url('dashboard')?>" class="logo logo-light">
                    <span class="logo-sm">
                        <i class="fas fa-home" style="font-size: 23px;color: #ffff;"></i>
                    </span>
                    <span class="logo-lg">
                        <h3 class="text-white text-capitalize  text-center" style="margin-top: 15px;"><?=loggedin_role_name()?></h3>
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
            </button>
            <button type="button" class="btn btn-sm px-3 font-size-16 horinav-toggle header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
            </button>
            <div class="app-search d-block d-lg-none m-auto">
                <div class="position-relative text-center">
                    <h3 class="text-dark text-capitalize" style="margin-top: 4px;"><?=loggedin_role_name()?></h3>
                </div>
            </div>
        </div>
        <div class="d-flex" style="width: 11%;">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if($this->session->image){ ?>
                <img class="rounded-circle header-profile-user" src="<?=base_url('assets/uploads/profile_img/'.$this->session->image)?>"
                alt="Header Avatar">
                <?php }else{ ?>
                <img class="rounded-circle header-profile-user" src="<?=base_url()?>assets/back/images/users/avatar-1.png"
                alt="Header Avatar">
                <?php } ?>
                <span class="d-none d-xl-inline-block ms-1"><?=$this->session->role_name?></span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <!-- < ?=$this->session->email?> -->
                    <h6 class="dropdown-header">Welcome <?=$this->session->role_name?>!</h6>
                    <a class="dropdown-item" href="<?=base_url('profile')?>"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-profile">Profile</span></a>
                    
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="<?=base_url('logout')?>"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-logout">Logout</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
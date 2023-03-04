        <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?=base_url()?>assets/back/images/logo-sm.png" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?=base_url()?>assets/back/images/logo-dark.png" alt="logo-dark" height="23">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?=base_url()?>assets/back/images/logo-sm-light.png" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?=base_url()?>assets/back/images/logo-light.png" alt="logo-light" height="23">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <button type="button" class="btn btn-sm px-3 font-size-16 horinav-toggle header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                       
                    </div>

                    <div class="d-flex">
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
                                <span class="d-none d-xl-inline-block ms-1"><?=$this->session->name?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <!-- < ?=$this->session->email?> -->
                                <h6 class="dropdown-header">Welcome <?=$this->session->name?>!</h6>
                                <a class="dropdown-item" href="<?=base_url('admin/profile')?>"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-profile">Profile</span></a>
                                
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?=base_url('admin_login/logout')?>"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle" key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
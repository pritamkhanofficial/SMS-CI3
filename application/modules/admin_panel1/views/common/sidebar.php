<!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="<?=base_url('admin/dashboard')?>" class="waves-effect">
                                    <i class='bx bxs-dashboard'></i>
                                    <span key="t-ui-elements">Dashboard</span>
                                </a>
                            </li>

                            <?php //if($this->session->usertype == 1){ ?>
                            <li class="menu-title mt-3" key="t-more">Master Area</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class='bx bxs-grid'></i>
                                    <span key="t-apps">Master</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?=base_url('admin/client_communicate_data')?>"><span key="t-calendar">Client communicate data</span></a></li>

                                </ul>
                            </li>
                            <?php //} ?>


                            <li class="menu-title mt-3" key="t-more">Go Back</li>
                            <li>
                                <a href="<?=base_url('admin_login/logout')?>" class="waves-effect">
                                    <i class='mdi mdi-logout text-muted font-size-16 align-middle me-1'></i>
                                    <span key="t-ui-elements">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
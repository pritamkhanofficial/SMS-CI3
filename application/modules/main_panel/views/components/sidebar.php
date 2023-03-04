<!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="<?=base_url('dashboard')?>" class="waves-effect">
                                    <i class='bx bxs-dashboard'></i>
                                    <span key="t-ui-elements">Dashboard</span>
                                </a>
                            </li>

                            <?php if($this->session->role_id == 1){ ?>
                            <li class="menu-title mt-3" key="t-more">Master Area</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class='fas fa-wrench '></i>
                                    <span key="t-apps">Master</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <!-- <li><a href="< ?=base_url('school_class')?>"><span key="t-calendar">Class</span></a></li> -->
                                    <!-- <li><a href="< ?=base_url('section')?>"><span key="t-calendar">Section</span></a></li> -->
                                    <li><a href="<?=base_url('classes')?>"><span key="t-calendar">Class & Section</span></a></li>



                                    <!-- <li><a href="< ?=base_url('subject_type')?>"><span key="t-calendar">Subject Type</span></a></li>
                                    <li><a href="< ?=base_url('subjects')?>"><span key="t-calendar">Subjects</span></a></li> -->
                                    <li><a href="<?=base_url('class_subject')?>"><span key="t-calendar">Class Subjects</span></a></li>
                                    <li><a href="<?=base_url('fees_assign')?>"><span key="t-calendar">Fees Assign</span></a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow"><span>Employee</span></a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="<?=base_url('add_employee')?>">Employee List</a></li>
                                            <li><a href="<?=base_url('designation')?>">Designation List</a></li>
                                            <li><a href="<?=base_url('department')?>">Department List</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-title mt-3" key="t-more">Accounting Area</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-calculator"></i>
                                    <span key="t-apps">Accounting</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?=base_url('account_hdr')?>"><span key="t-calendar">Account Header</span></a></li>
                                    <li><a href="<?=base_url('account_dtl')?>"><span key="t-calendar">Account Detail</span></a></li>

                                </ul>
                            </li>

                            <li class="menu-title mt-3" key="t-more">Setting Area</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class='fas fa-cogs'></i>
                                    <span key="t-apps">Setting</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?=base_url('global_setting/edit/1')?>"><span key="t-calendar">Global Setting</span></a></li>
                                    <li><a href="<?=base_url('session')?>"><span key="t-calendar">Academic Year</span></a></li>
                                    <li><a href="<?=base_url('user_role')?>"><span key="t-calendar">Role</span></a></li>

                                </ul>
                            </li>
                            <?php } ?>


                            <li class="menu-title mt-3" key="t-more">Go Back</li>
                            <li>
                                <a href="<?=base_url('logout')?>" class="waves-effect">
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
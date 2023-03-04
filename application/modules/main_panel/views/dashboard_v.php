<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('components/head'); ?>
</head>
<body data-sidebar="dark" data-sidebar-size="lg">
    <div id="layout-wrapper">
        <?php $this->load->view('components/header'); ?>
        <?php $this->load->view('components/sidebar'); ?>
            <?php if(1==2){ ?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="fas fa-graduation-cap text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">Administrative1 Heads</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="5">0</span></h4>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="fas fa-users text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">College Committees</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="2">0</span></h4>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="fas fa-hospital-alt text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">Departments</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="2">0</span></h4>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
    <?php $this->load->view('components/script'); ?>

</body>
</html>
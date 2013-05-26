<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("public/css/global.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("public/datetimepicker/css/bootstrap-datetimepicker.min.css") ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery1_9.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery_migrate_plugin.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/datetimepicker/js/bootstrap-datetimepicker.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery.tablesorter.min.js") ?>"></script>
</head>
<body>
<div class="container">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a href="<?php echo base_url("sales") ?>" class="brand pull-right">PCS</a>
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li><a href="<?php echo base_url("sales") ?>"><i class="icon-th-list"></i> Clients</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-folder-open"></i> Transactions <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url("sales_transaction") ?>">Modern Award</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("client_agreement") ?>">Client Agreement</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book"></i> Reports <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="">Mondern Award</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url("reports/rate_confirmation/modern_award") ?>">Rate Confirmation</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/allowance/modern_award") ?>">Allowance</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/paycharge_rate/modern_award") ?>">Pay and Charge Rate Schedule</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/upcoming_rate_increase/modern_award") ?>">Upcoming Rate Increase</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="">Client Agreement</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url("reports/rate_confirmation/client") ?>">Rate Confirmation</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/allowance/client") ?>">Allowance</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/paycharge_rate/client") ?>">Pay and Charge Rate Schedule</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("reports/upcoming_rate_increase/client") ?>">Upcoming Rate Increase</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="">Others</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Terms and Conditions Labour Power</a>
                                    </li>
                                    <li>
                                        <a href="">Terms and LP Consulting Service</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-folder-open"></i> Libraries <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("libraries/position") ?>">Position</a></li>
                            <li><a href="<?php echo base_url("libraries/contacts") ?>">Contacts</a></li>
                            <li><a href="<?php echo base_url("libraries/clients") ?>">Clients/Company</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="pull-right" style="margin-top: 10px; margin-left: 5px;">
                    <a href="<?php echo base_url("logout") ?>">Logout</a>
                </div>
                <div class="pull-right" style="margin-top: 10px">
                    Welcome <?php echo $username ?>!
                </div>
            </div>
        </div>
    </div>
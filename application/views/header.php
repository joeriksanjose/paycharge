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
                <a href="<?php echo base_url("Transactions") ?>" class="brand pull-right">PCS</a>
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li><a href="<?php echo base_url("transactions") ?>"><i class="icon-retweet"></i> Transaction</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book"></i> Reports <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="">Mondern Award</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Rate Confirmation</a>
                                    </li>
                                    <li>
                                        <a href="">Allowance</a>
                                    </li>
                                    <li>
                                        <a href="">Pay and Charge Rate Schedule</a>
                                    </li>
                                    <li>
                                        <a href="">Upcoming Rate Increase</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="">Client Agreement</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Rate Confirmation</a>
                                    </li>
                                    <li>
                                        <a href="">Allowance</a>
                                    </li>
                                    <li>
                                        <a href="">Pay and Charge Rate Schedule</a>
                                    </li>
                                    <li>
                                        <a href="">Upcoming Rate Increase</a>
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
                            <li>
                                <a href="<?php echo base_url("libraries/state") ?>">State</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/super") ?>">Super</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/workcover") ?>">Workcover</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/public_liability") ?>">Public Liability</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/insurance") ?>">Insurance</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/admin") ?>">Admin</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/long_services") ?>">Long Service</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/contacts") ?>">Contacts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/clients") ?>">Clients/Company</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("libraries/position") ?>">Position</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-wrench"></i> Utilities <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url("utilities/user_access") ?>">User Access</a></li>
                          <li class="dropdown-submenu">
                              <a href="#">Business Info</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url("utilities/business-company/company-1") ?>">Company 1</a></li>
                                <li><a href="<?php echo base_url("utilities/business-company/company-2") ?>">Company 2</a></li>
                              </ul>
                          </li>
                          
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
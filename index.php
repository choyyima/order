<?php
session_start();
include "config.php";
include './function.php';
$get = $_SESSION;
if (empty($get['uName'])) {
    header('Location: index.html');
}
?>
<!doctype html>
<html lang="en"><head>
        <meta charset="utf-8">
        <title>Procurement Information Center</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="stylesheet" href="css/dataTables.bootstrap.css">
        <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
        <style>
            #data_wrapper{
                overflow-x: auto;
            }
            .dataTables_filter{
                // visibility: hidden;
            }
        </style>
    </head>
    <body class=" theme-blue">

        <!-- Demo page code -->

        <style type="text/css">
            #line-chart {
                height:300px;
                width:800px;
                margin: 0px auto;
                margin-top: 1em;
            }
            .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
                color: #fff;
            }
        </style>

        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Procurement  Information Center</span></a></div>

            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $get['uName']; ?>
                            <i class="fa fa-caret-down"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="sidebar-nav">
            <ul>
                <li>
                    <a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse">
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i>
                    </a>
                </li>
                <li>
                    <ul class="dashboard-menu nav nav-list collapse in">
                        <li ><a href="index.php?pic=checkdata&page=view"><span class="fa fa-caret-right"></span> Check Data </a></li> 
                        <li ><a href="index.php?pic=complain&page=view"><span class="fa fa-caret-right"></span> Complain</a></li> 
                        <?php if ($get['uName'] == 'admin') { ?> 
                            <li ><a href="index.php?pic=pm&page=view"><span class="fa fa-caret-right"></span> Employee</a></li>
                            <li ><a href="index.php?pic=user&page=view"><span class="fa fa-caret-right"></span> Users</a></li>
                            <li ><a href="index.php?pic=report&page=view"><span class="fa fa-caret-right"></span> Report</a></li>
                        <?php } ?>                   
                    </ul>
                </li>
                <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase "></i> Account <i class="fa fa-collapse"></i></a></li>
                <li>
                    <ul class="accounts-menu nav nav-list collapse in">
                        <li ><a href="reset-password.php"><span class="fa fa-caret-right"></span> Reset Password</a></li>
                        <li ><a href="sign-out.php"><span class="fa fa-caret-right"></span> Logout</a></li> 
                    </ul>
                </li>

            </ul>
        </div>
        <div class="content">

            <?php
            $g = $_GET['pic'];
            if (isset($g)) {
                if ($g == 'checkdata') {
                    include 'checkdata.php';
                } elseif ($g == 'complain') {
                    include 'complain.php';
                } elseif ($g == 'project') {
                    include 'project.php';
                } elseif ($g == 'flag') {
                    include 'flag.php';
                } elseif ($g == 'item') {
                    include 'item.php';
                } elseif ($g == 'pm') {
                    include 'employee.php';
                } elseif ($g == 'user') {
                    include 'users.php';
                } elseif ($g == 'report') {
                    include 'report.php';
                }
            } else {
                echo "<script>javascript:window.location.replace('index.php?pic=checkdata&page=view');</script>";
            }
            include './footer.php';
            ?>
        </div>

        <!--<script src="lib/bootstrap/js/bootstrap.js"></script>-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <script src="js/jquery.numberformatter-1.2.3.js"></script>        
        <script type="text/javascript">
            $(function () {
                var match = document.cookie.match(new RegExp('color=([^;]+)'));
                if (match)
                    var color = match[1];
                if (color) {
                    $('body').removeClass(function (index, css) {
                        return (css.match(/\btheme-\S+/g) || []).join(' ')
                    })
                    $('body').addClass('theme-' + color);
                }

                $('[data-popover="true"]').popover({html: true});

                var uls = $('.sidebar-nav > ul > *').clone();
                uls.addClass('visible-xs');
                $('#main-menu').append(uls.clone());
            });
            $(document).ready(function () {
                $('#data').dataTable({
                    "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
                });
            });

//            $("[rel=tooltip]").tooltip();
//            $(function () {
//                $('.demo-cancel-click').click(function () {
//                    return false;
//                });
//            });


        </script>
    </body>
</html>
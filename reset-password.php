<?php
session_start();
include "config.php";
$get = $_SESSION;
if (empty($get['uName'])) {
    header('Location: index.html');
}
?>
<!doctype html>
<html lang="en">
    <head>
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

        <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

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
                <a class="" href="checkdata.php"><span class="navbar-brand"><span class="fa fa-archive"></span> Procurement  Information Center</span></a></div>

            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $get['uName']; ?>
                            <!--<i class="fa fa-caret-down"></i>-->
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
                        <li><a href="checkdata.php"><span class="fa fa-caret-right"></span> Check Data</a></li>
                        <li><a href="complain.php"><span class="fa fa-caret-right"></span> Complain</a></li>
                        <?php if ($get['uName'] == 'admin') { ?> 
                            <li ><a href="users.php"><span class="fa fa-caret-right"></span> Users</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase "></i> Account <i class="fa fa-collapse"></i></a></li>
                <li>
                    <ul class="accounts-menu nav nav-list collapse">
                        <li class="active"><a href="reset-password.php"><span class="fa fa-caret-right"></span> Reset Password</a></li>
                        <li ><a href="sign-out.php"><span class="fa fa-caret-right"></span> Logout</a></li> 
                    </ul>
                </li>
            </ul>
        </div>

        <div class="content">
            <div class="header">
                <h1 class="page-title">Reset Password</h1>
                <ul class="breadcrumb">
                    <li>Account </li>
                    <li class="active">Form Reset Password</li>
                </ul>
            </div>

            <div class="dialog">
                <div class="panel panel-default">
                    <p class="panel-heading no-collapse">Reset your password</p>
                    <div class="panel-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="newpassword" class="form-controlspan12 form-control">
                            </div>
                            <!--<a href="index.html" class="btn btn-primary pull-right">Reset Password</a>-->
                            <button class="btn btn-primary pull-right" name="save" type="submit"> Reset Password</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include './footer.php';
            ?>
        </div>



        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $("[rel=tooltip]").tooltip();
            $(function () {
                $('.demo-cancel-click').click(function () {
                    return false;
                });
            });

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

            });

            $(function () {
                var uls = $('.sidebar-nav > ul > *').clone();
                uls.addClass('visible-xs');
                $('#main-menu').append(uls.clone());
            });
        </script>


    </body>
</html>
<?php
//$generate_no = date('dmy') . ;
if (isset($_POST['save'])) {
    $newpassword = $_POST['newpassword'];
    $id = $get['oId'];

    $sql = "UPDATE `user` SET `password`='$newpassword' WHERE (`usrid`='$id')";

    $result = mysql_query($sql);

    if ($result) {
        echo "<script>alert('Password telah dirubah.')</script>";
        session_destroy();
        echo "<script type='text/javascript'>document.location='./index.html'; </script>";
    } else {
        echo "<script>alert('Password tidak dapat dirubah.')</script>";
    }
}
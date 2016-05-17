
<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        var maxField = 10;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML = '<div class="box-body table-responsive">\n\
                            <a href="javascript:void(0);" class="col-xs-1 remove_button btn btn-danger" title="Remove field"><span class="fa fa-minus"> Delete</span></a>\n\
                            <div class="col-lg-7">\n\
                                <div class="form-group">\n\
                                    <input type="text" name="item[]"class="form-control">\n\
                                </div>\n\
                            </div>\n\
                            <div class="col-lg-2">\n\
                                <div class="form-group">\n\
                                    <input type="text" name="item[]"class="form-control">\n\
                                </div>\n\
                            </div>\n\
                            <div class="col-lg-2">\n\
                                <div class="form-group">\n\
                                    <input type="text" name="item[]"class="form-control">\n\
                                </div>\n\
                            </div>\n\
                         </div>'; //New input field html 

        var x = 1;
        $(addButton).click(function () {
            x++;
            $(wrapper).append(fieldHTML);
        });
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
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
        </style>
    </head>
    <body class=" theme-blue">
        <div class="header">
            <h1 class="page-title">Create Data</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Create Data</li>
            </ul>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#procces1" data-toggle="tab">Process 1</a></li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <br/>
                    <div class="panel panel-default">
                        <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data SMS Center</a>
                        <div id="widget1container" class="panel-body collapse in">
                            <div class="box-body table-responsive">
                                <div class="tab-pane active in" id="procces1">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Date Order / Tanggal Order</label>
                                                <input type="date" name="tanggal_order" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Time / Jam SMS</label>
                                                <input type="text" name="jam_sms" class="form-control">
                                            </div>
                                        </div>    
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>No. SMS</label>
                                                <input type="text" name="no_sms" class="form-control">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Buyer / Pemesan</label>
                                                <input type="text" name="pemesan" class="form-control">
                                            </div>
                                        </div>                                    
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <input type="text" name="nama_proyek" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">                                        
                                            <div class="form-group">
                                                <label>Date Process / Tanggal Proses</label>
                                                <?php $date = new DateTime('+1 day'); ?>
                                                <input type="date" name="proses" value="<?php echo $date->format('Y-m-d') ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">                                        
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status_pic" class="form-control">
                                                    <option value="Waiting For Quotation">Waiting For Quotation</option>
                                                    <option value="Waiting Approval Director">Waiting Approval Director</option>
                                                    <option value="PO">PO</option>
                                                </select>
                                            </div>
                                        </div>
<!--                                        <div class="col-sm-12 col-md-12">
                                            <div class="panel" style="border-color: #337ab7;">
                                                <div class="panel-heading" style="background: #337ab7; border-color: #337ab7; color: white;">Order</div>-->
                                                <div id="widget1container" class="panel-body collapse in field_wrapper">
                                                    <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field"><span class="fa fa-plus"> Tambah</span></a>
                                                        <div class="box-body table-responsive">
                                                            <div class="col-xs-1">
                                                                <div class="form-group">
                                                                    <label style="text-align: center">#</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <label>Item</label>
                                                                    <input text="type" name="item[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Qty</label>
                                                                    <input type="text" name="qty[]" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Unit / Satuan</label>
                                                                    <input type="text" name="unit[]" value="" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

<!--                                                </div>
                                            </div>-->
                                        </div>  
                                        <div class="col-lg-12">    
                                            <div class="form-group">
                                                <button class="btn btn-primary" name="saveadd" type="submit"> Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>
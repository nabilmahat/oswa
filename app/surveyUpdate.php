<?php
include 'include/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Survey
            <small>Add New Question</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Survey</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Question</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question Type</label>
                                <select class="form-control">
                                    <option selected disabled=''>Please select</option>
                                    <option>Single Answer</option>
                                    <option>Multiple Answer</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Option</label>
                                </div>
                                <div id="p_scents">
                                    <div id="1">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger"
                                                onclick="remove(1)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="button" class="btn btn-primary" id="addScnt">Add Answer</button>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>
<script src="dist/js/addInput.js"></script>
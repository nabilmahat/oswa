<?php
include 'include/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Survey
            <small>Survey List</small>
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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created Survey</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="user-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Admin 1 OSWA</td>
                                    <td>0148976444</td>
                                    <td>Admin</td>
                                    <td>admin@oswa.com</td>
                                    <td>
                                        <a href="surveyView.php?id=" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="surveyUpdate.php?id=" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Admin 2 OSWA</td>
                                    <td>0148976444</td>
                                    <td>Admin</td>
                                    <td>admin@oswa.com</td>
                                    <td>
                                        <a href="surveyView.php?id=" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="surveyUpdate.php?id=" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User 1 OSWA</td>
                                    <td>0148976444</td>
                                    <td>Admin</td>
                                    <td>admin@oswa.com</td>
                                    <td>
                                        <a href="surveyView.php?id=" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="surveyUpdate.php?id=" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User 2 OSWA</td>
                                    <td>0148976444</td>
                                    <td>Admin</td>
                                    <td>admin@oswa.com</td>
                                    <td>
                                        <a href="surveyView.php?id=" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="surveyUpdate.php?id=" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User 3 OSWA</td>
                                    <td>0148976444</td>
                                    <td>Admin</td>
                                    <td>admin@oswa.com</td>
                                    <td>
                                        <a href="surveyView.php?id=" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="surveyUpdate.php?id=" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
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
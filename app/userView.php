<?php
include 'include/header.php';

if (isset($_GET['id'])){
    $userID = $_GET['id'];
} else {
    echo "<script>";
	echo "location.href = 'userList.php';";
	echo "</script>";
}

$userData = "SELECT * FROM users WHERE id = '".$userID."'";
$execUserData = mysqli_query($conn, $userData);
$data = mysqli_fetch_array($execUserData);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>View User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
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
                        <h3 class="box-title">View User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <p>
                                    <?php echo $data['name']; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <p>
                                    <?php echo $data['contact_number']; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <p>
                                    <?php echo $data['address']; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <p>
                                    <?php if ($data['role'] == 1) echo 'Admin'; else echo 'User';?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <p>
                                    <?php echo $data['email']; ?>
                                </p>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
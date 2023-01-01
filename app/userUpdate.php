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
            <small>Update User</small>
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
                        <h3 class="box-title">Update User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="module/userUpdate.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter email"
                                    value="<?php echo $data['name']?>" name="name">
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" placeholder="Enter email"
                                    value="<?php echo $data['contact_number']?>" name="contact_number">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter email"
                                    value="<?php echo $data['address']?>" name="address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <select class="form-control" disabled=''>
                                    <?php
                                        if ($data['role'] ==1)
                                            echo '<option>Admin</option>';
                                        else
                                            echo '<option>User</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    value="<?php echo $data['email']?>" name="email">
                                <input type="hidden" class="form-control" id="old_email" 
                                    value="<?php echo $data['email']?>" name="old_email">
                                <input type="hidden" class="form-control" id="id" 
                                    value="<?php echo $data['id']?>" name="id">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="userList.php" class="btn btn-danger">Cancel</a>
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
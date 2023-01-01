<?php
include 'include/header.php';

$userData = "SELECT * FROM users";
$execUserData = mysqli_query($conn, $userData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>User List</small>
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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Registered User</h3>
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
                                <?php
                                foreach($execUserData as $row) {
                                    echo '<tr>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.$row['contact_number'].'</td>';
                                    if ($row['role']==1)
                                        echo '<td>Admin</td>';
                                    else
                                        echo '<td>User</td>';
                                    echo '<td>'.$row['email'].'</td>';
                                    echo '<td>';
                                    echo '<a href="userView.php?id='.$row['id'].'" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>';
                                    echo '<a href="userUpdate.php?id='.$row['id'].'" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                                    if($row['id']!=$_SESSION['user_id'])
                                        echo '<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="deleteUser('.$row['id'].')"><i class="fa fa-trash-o "></i></button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
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

<script>
function deleteUser(user_id) {
  let text;
  if (confirm("Delete user?") == true) {
    text = "You pressed OK!";
    location.href = 'module/userDelete.php?id='+user_id;
  } else {
    text = "You canceled!";
  }
}
</script>
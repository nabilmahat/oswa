<?php
include 'include/header.php';

$userData = "SELECT * FROM users";
$execUserData = mysqli_query($conn, $userData);
$userNum = mysqli_num_rows($execUserData);

if ($_SESSION["role"] == 2) {
$surveyData = "SELECT * FROM surveys WHERE user_email = '".$_SESSION['email']."' OR user_email = 'admin@oswa.com'";
} else {
  $surveyData = "SELECT * FROM surveys";
  }
$execSurveyData = mysqli_query($conn, $surveyData);
$surveyNum = mysqli_num_rows($execSurveyData);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php if ($_SESSION["role"] == 1) { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php echo mysqli_num_rows($execUserData) ?>
              </h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="userList.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php } ?>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php echo mysqli_num_rows($execSurveyData) ?>
              </h3>

              <p>Total Survey</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="surveyList.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>
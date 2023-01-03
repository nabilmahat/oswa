<?php
include 'include/header.php';
$user_email = $_SESSION["email"];

$surveyData = "SELECT * FROM surveys WHERE user_email = '".$user_email."'; ";
$execSurveyData = mysqli_query($conn, $surveyData);
$surveyNum = mysqli_num_rows($execSurveyData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Survey
            <small>Survey Report</small>
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Respond(s)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($execSurveyData as $data) {
                                        echo '<tr>';
                                        echo '<td>'.$data["title"].'</td>';
                                        echo '<td>'.$data["description"].'</td>';
                                        echo '<td>'.date_format(date_create($data['start_date']),"M d, Y").'</td>';
                                        echo '<td>'.date_format(date_create($data['end_date']),"M d, Y").'</td>';
                                        echo '<td>'.$data["respond"].'</td>';
                                        echo '<td>';
                                        echo '<a href="surveyDetail.php?id='.$data['id'].'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>  Report</a>';
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
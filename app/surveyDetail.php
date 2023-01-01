<?php
include 'include/header.php';

if (isset($_GET['id'])){
    $surveyID = $_GET['id'];
} else {
    echo "<script>";
	echo "location.href = 'surveyList.php';";
	echo "</script>";
}

$surveyData = "SELECT * FROM surveys WHERE id = '".$surveyID."'";
$execSurveyData = mysqli_query($conn, $surveyData);
$data = mysqli_fetch_array($execSurveyData);

$questionData = "SELECT * FROM questions WHERE survey_id = '".$surveyID."' ORDER BY id ASC";
$execQuestionData = mysqli_query($conn, $questionData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Survey
            <small>Survey Result</small>
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
                        <h3 class="box-title">Survey Detail</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <p>
                                    <?php
                                        echo $data['title'];
                                    ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <p>
                                    <?php
                                        echo $data['description'];
                                    ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Date Start:</label>
                                <p>
                                    <?php
                                        echo date_format(date_create($data['start_date']),"M d, Y");
                                    ?>
                                </p>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Date End:</label>
                                <p>
                                    <?php
                                        echo date_format(date_create($data['end_date']),"M d, Y");
                                    ?>
                                </p>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <?php
                $countQ = 1;
                foreach($execQuestionData as $qRow) {
                    
                    $optionData = "SELECT * FROM options WHERE question_id = '".$qRow['id']."' ORDER BY id ASC";
                    $execOptionData = mysqli_query($conn, $optionData);
                    ?>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Question <?php echo $countQ ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <p>
                                <?php
                                        echo $qRow['title'];
                                    ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <p>
                                <?php
                                        echo $qRow['description'];
                                    ?>
                            </p>
                        </div>
                        <?php
                            $totalRespond = 0;
                            foreach($execOptionData as $oRow) {
                                $queryAnswer = "SELECT * 
                                                FROM answers
                                                WHERE survey_id = '".$surveyID."'
                                                AND question_id = '".$qRow['id']."'
                                                AND option_id = '".$oRow['id']."'; ";
                                $execQueryAnswer = mysqli_query($conn, $queryAnswer);
                                $countOption = mysqli_num_rows($execQueryAnswer);
                                $totalRespond = $totalRespond + $countOption;
                            }
                            foreach($execOptionData as $oRow) {
                                    
                            ?>
                        <div class="form-group">
                            <div class="box-body">
                                <label>
                                    <?php
                                        echo $oRow['title']; 

                                        $queryAnswer = "SELECT * 
                                                        FROM answers
                                                        WHERE survey_id = '".$surveyID."'
                                                        AND question_id = '".$qRow['id']."'
                                                        AND option_id = '".$oRow['id']."'; ";
                                        $execQueryAnswer = mysqli_query($conn, $queryAnswer);
                                        $countOption = mysqli_num_rows($execQueryAnswer);
                                        $percentAnswer = ($countOption/$totalRespond)*100;
                                    ?>
                                </label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentAnswer; ?>%">
                                        <?php echo number_format($percentAnswer).'%'; ?>
                                    </div>
                                </div>
                                Count: <?php echo $countOption; ?>
                            </div>
                        </div>
                        <?php
                        }
                            ?>
                    </div>
                </div>
                <?php
                $countQ++;
                }
                ?>
            </div>
            <div class="col-md-6">
                <!-- Select gender and chart type -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report Filtering</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">All</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chart Type</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Pie Chart</option>
                                <option>Bar Chart</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-success">Generate Chart</button>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Donut Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="pieChart" style="height:250px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
<script src="dist/js/pieChart.js"></script>
<script src="dist/js/barChart.js"></script>
<?php
include 'app/connection/connection.php';

if (isset($_GET['id'])){
    $surveyID = $_GET['id'];
} else {
    echo "<script>";
	echo "location.href = 'index.php';";
	echo "</script>";
}

$surveyData = "SELECT * FROM surveys WHERE id = '".$surveyID."'";
$execSurveyData = mysqli_query($conn, $surveyData);
$data = mysqli_fetch_array($execSurveyData);

$questionData = "SELECT * FROM questions WHERE survey_id = '".$surveyID."' ORDER BY id ASC";
$execQuestionData = mysqli_query($conn, $questionData);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OSWA | Sign in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="app/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="app/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="app/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="app/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .login-box,
    .register-box {
        width: 650px;
        margin: 7% auto;
    }

    .content-wrapper,
    .main-footer {
        margin-left: 0px
    }

    .login-box,
    .register-box {
        width: 650px;
        margin: 3% auto;
    }

    .chart-legend ul {
        list-style: none;
    }

    .chart-legend ul li {
        display: block;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
    }

    .chart-legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
    }

    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }

        .progress {
            position: relative;
        }

        .progress:before {
            display: block;
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0;
            border-bottom: 2rem solid #eeeeee;
        }

        .progress-bar {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            border-bottom: 2rem solid #337ab7;
        }

        .bg-bar-green {
            border-bottom-color: #00a65a;
        }

        .bg-info {
            border-bottom-color: #00a65a;
        }

        .bg-warning {
            border-bottom-color: #00a65a;
        }

        .bg-danger {
            border-bottom-color: #00a65a;
        }
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="">
            <section class="content-header text-center">
                <h1>
                    Answer Survey
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <form role="form" action="app/module/surveyAnswer.php" method="post">
                            <div class="box box-primary">
                                <div class="box-header with-border text-center">
                                    <h3 class="box-title">Survey Detail</h3>
                                    <input type="hidden" class="form-control" id="survey_id" name="survey_id" required
                                        value="<?php echo $surveyID; ?>">
                                    <input type="hidden" class="form-control" id="name" name="name" required
                                        value="<?php echo $name; ?>">
                                    <input type="hidden" class="form-control" id="email" name="email" required
                                        value="<?php echo $email; ?>">
                                    <input type="hidden" class="form-control" id="gender" name="gender" required
                                        value="<?php echo $gender; ?>">
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
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
                            </div>
                            <?php
                $countQ = 1;
                foreach($execQuestionData as $qRow) {
                    
                    $optionData = "SELECT * FROM options WHERE question_id = '".$qRow['question_id']."' ORDER BY id ASC";
                    $execOptionData = mysqli_query($conn, $optionData);
                    ?>
                            <div class="box box-default">
                                <div class="box-header with-border text-center">
                                    <h3 class="box-title">Question <?php echo $countQ ?></h3>
                                    <input type="hidden" class="form-control" id="question_id" name="question_id"
                                        required value="<?php echo $qRow['question_id']; ?>">
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
                                                        AND question_id = '".$qRow['question_id']."'
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
                                                $percentAnswer = 0;
                                                echo $oRow['title']; 

                                                $queryAnswer = "SELECT * 
                                                                FROM answers
                                                                WHERE survey_id = '".$surveyID."'
                                                                AND question_id = '".$qRow['question_id']."'
                                                                AND option_id = '".$oRow['id']."'; ";
                                                $execQueryAnswer = mysqli_query($conn, $queryAnswer);
                                                $countOption = mysqli_num_rows($execQueryAnswer);
                                                if ($countOption>0) {
                                                    $percentAnswer = ($countOption/$totalRespond)*100;
                                                }
                                            ?>
                                            </label>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-green" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: <?php echo $percentAnswer; ?>%">
                                                    <?php echo number_format($percentAnswer).'%'; ?>
                                                </div>
                                            </div>
                                            Count: <?php echo $countOption; ?>
                                        </div>
                                    </div>
                                    <?php
                                    
                        }
                            ?>
                                    <canvas id="<?php echo $qRow["question_id"] ?>" style="height:250px"></canvas>
                                    <div id="<?php echo $qRow["question_id"] ?>-legend" class="chart-legend"></div>
                                </div>
                            </div>
                            <?php
                $countQ++;
                }
                ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- DONUT CHART -->
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Gender Count</h3>
                                        </div>
                                        <div class="box-body" id="res">
                                            <canvas id="respondentPie" style="height:250px"></canvas>
                                            <div id="respondent-legend" class="chart-legend"></div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- END DONUT CHART -->
                                </div>
                                <div class="col-md-6">

                                    <!-- BAR CHART -->
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Gender Percentage (%)</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="chart">
                                                <canvas id="barChart" style="height:250px"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- END BAR CHART -->
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary no-print" id="printReport">Print
                                    Result</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 2022 <a href="index.php">OSWA</a>.</strong> All rights
        reserved.
    </footer>

    <!-- jQuery 3 -->
    <script src="app/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="app/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="app/plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
    <!-- ChartJS -->
    <script src="app/bower_components/chart.js/Chart.js"></script>

    <script src="app/dist/js/user/color.js"></script>
    <!-- <script src="app/dist/js/user/pieChart.js"></script> -->
    <script src="app/dist/js/user/pieChart-ori.js"></script>
    <script src="app/dist/js/user/respondent.js"></script>
    <script src="app/dist/js/user/barChart.js"></script>

    <script src="app/dist/js/user/printToPDF.js"></script>
</body>

</html>
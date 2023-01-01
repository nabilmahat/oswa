<?php
include 'app/connection/connection.php';

if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['gender'])){
    $surveyID = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];
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
        width: 594px;
        margin: 7% auto;
    }

    .content-wrapper,
    .main-footer {
        margin-left: 0px
    }

    .login-box,
    .register-box {
        width: 594px;
        margin: 3% auto;
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
                    
                    $optionData = "SELECT * FROM options WHERE question_id = '".$qRow['id']."' ORDER BY id ASC";
                    $execOptionData = mysqli_query($conn, $optionData);
                    ?>
                            <div class="box box-default">
                                <div class="box-header with-border text-center">
                                    <h3 class="box-title">Question <?php echo $countQ ?></h3>
                                    <input type="hidden" class="form-control" id="question_id" name="question_id"
                                        required value="<?php echo $qRow['id']; ?>">
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
                            foreach($execOptionData as $oRow) {
                                    if($qRow['type']==1) {
                            ?>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="<?php echo $qRow['id']; ?>"
                                                    id="optionsRadios1" value="<?php echo $oRow['id']; ?>"> &nbsp;&nbsp;
                                                <?php echo $oRow['title']; ?>
                                                <!-- <br> -->
                                                <?php // echo $oRow['description']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                            } else {
                            ?>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="<?php echo $qRow['id']; ?>[]"
                                                    id="optionsRadios1" value="<?php echo $oRow['id']; ?>"> &nbsp;&nbsp;
                                                <?php echo $oRow['title']; ?>
                                                <!-- <br> -->
                                                <?php // echo $oRow['description']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php    
                            }
                        }
                            ?>
                                </div>
                            </div>
                            <?php
                $countQ++;
                }
                ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
</body>

</html>
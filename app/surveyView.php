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
            <small>View Survey</small>
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
                            foreach($execOptionData as $oRow) {
                                    if($qRow['type']==1) {
                            ?>
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
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
                                    <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1">
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
            </div>
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
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$to = "mnabilmahat@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: mnabilmahat@gmail.com" . "\r\n" .
// "CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
include 'include/footer.php';
?>
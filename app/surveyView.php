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

$rawStart=date_create($data["start_date"]);
$start_date = date_format($rawStart,"m/d/Y");
$rawEnd=date_create($data["end_date"]);
$end_date = date_format($rawEnd,"m/d/Y");

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
                <!-- Update Survey -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Survey</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="module/surveyUpdate.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" class="form-control" id="survey_id"
                                    placeholder="Enter title" name="survey_id" required value="<?php echo $surveyID; ?>">
                                <input type="text" class="form-control" id="title"
                                    placeholder="Enter title" name="title" required value="<?php echo $data['title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" cols="30" rows="10" id="description" name="description" required><?php echo $data['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date Start:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepickerStart" name="start_date" required value="<?php echo $start_date; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Date End:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepickerEnd" name="end_date" required value="<?php echo $end_date; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                $countQ = 1;
                foreach($execQuestionData as $qRow) {
                    
                    $optionData = "SELECT * FROM options WHERE question_id = '".$qRow['question_id']."' ORDER BY id ASC";
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
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>
<?php
include 'include/header.php';

if (isset($_GET['question_id'])){
    $questionID = $_GET['question_id'];
    $optionID = $_GET['option_id'];
    $chart = $_GET['chart'];
} else {
    echo "<script>";
	echo "location.href = 'surveyList.php';";
	echo "</script>";
}

$questionData = "SELECT * FROM questions WHERE question_id = '".$questionID."' ORDER BY id ASC";
$execQuestionData = mysqli_query($conn, $questionData);
?>

<style type="text/css">
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
            <div class="col-md-12">

                <div class="form-group text-right no-print">
                    <button class="btn btn-primary btn-sm" id="printReport">Print Result</button>
                </div>

                <div id="question-detail">
                    <!-- Question Detail -->
                    <?php
                $countQ = 1;
                foreach($execQuestionData as $qRow) {
                    
                    $optionData = "SELECT * FROM options WHERE question_id = '".$qRow['question_id']."' ORDER BY id ASC";
                    $execOptionData = mysqli_query($conn, $optionData);
                    ?>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Question Detail Analysis</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="select_option">Filter Option</label>
                                        <select class="form-control" name="option_id" id="option_id">
                                            <option value="all" <?=$optionID == 'all' ? ' selected="selected"' : '';?>>All</option>
                                            <?php
                                            foreach($execOptionData as $oRow) {
                                                if($optionID == $oRow["id"]) {
                                                    echo '<option value="'.$oRow["id"].'" selected="selected">'.$oRow["title"].'</option>';
                                                } else {
                                                    echo '<option value="'.$oRow["id"].'">'.$oRow["title"].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select_option">Chart Type</label>
                                        <select class="form-control" name="chart_type" id="chart_type">
                                            <option value="pie" <?=$chart == 'pie' ? ' selected="selected"' : '';?>>Pie Chart</option>
                                            <option value="bar" <?=$chart == 'bar' ? ' selected="selected"' : '';?>>Bar Chart</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-sm btn-success" id="analyse">Generate Result</button>
                                    </div>
                                </div>
                            </div>
                            <!-- start option div -->
                            <div class="row">
                                <!-- progress bar -->
                                <div class="col-md-6">
                                    <?php
                                    $totalRespond = 0;
                                    foreach($execOptionData as $oRow) {
                                        $queryAnswer = "SELECT * 
                                                        FROM answers
                                                        WHERE question_id = '".$qRow['question_id']."'
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
                                                $gender = 'all';

                                                if(isset($_GET["gender"])) {
                                                    $gender = $_GET["gender"];
                                                }

                                                if($gender != 'all') {
                                                    $gender = $_GET["gender"];
                                                    ($gender == 'male') ? $gValue = 1 : $gValue = 2;

                                                    $queryAnswer = "SELECT * 
                                                                    FROM answers
                                                                    WHERE question_id = '".$qRow['question_id']."'
                                                                    AND option_id = '".$oRow['id']."'
                                                                    AND gender = '".$gValue."'; ";
                                                } else {

                                                    $queryAnswer = "SELECT * 
                                                                    FROM answers
                                                                    WHERE question_id = '".$qRow['question_id']."'
                                                                    AND option_id = '".$oRow['id']."'; ";

                                                }
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
                                </div>
                                <!-- graph -->
                                <?php if ($chart == "pie") {?>
                                <div class="col-md-6">
                                    <canvas id="<?php echo $qRow["question_id"] ?>" style="height:250px"></canvas>
                                    <div id="<?php echo $qRow["question_id"] ?>-legend" class="chart-legend"></div>
                                    <!-- </div> -->
                                </div>
                                <?php } else if ($chart == "bar") {?>
                                <div class="col-md-6">
                                    <canvas id="barChartData" style="height:250px"></canvas>
                                    <!-- </div> -->
                                </div>
                                <?php } ?>
                            </div>
                            <!-- end option div -->
                        </div>
                    </div>
                    <?php
                $countQ++;
                }
                ?>
                    <!-- End Question Detail -->
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
<script src="dist/js/color.js"></script>
<!-- <script src="dist/js/pieChart.js"></script> -->
<script src="dist/js/pieChart-analysis.js"></script>
<script src="dist/js/barChart-analysis.js"></script>

<script src="dist/js/printToPDF.js"></script>

<script>
$(document).ready(function(){
  $("#generate-report").click(function(){
    var e = document.getElementById("gender");
    var value = e.value;    
    
    var href = new URL( window.location.href);
    href.searchParams.set('gender', value);
    // console.log(href.toString());
    window.location.href = href;
  });


$("#analyse").click(function(){
    var e = document.getElementById("chart_type");
    var opt = document.getElementById("option_id");
    var value = e.value;    
    var valueOption = opt.value;    
    
    var href = new URL( window.location.href);
    href.searchParams.set('chart', value);
    href.searchParams.set('option_id', valueOption);
    // console.log(href.toString());
    window.location.href = href;
  });
});

function detailAnalysis(qID) {
    alert(qID);
}
</script>
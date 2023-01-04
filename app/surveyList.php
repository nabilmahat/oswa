<?php
include 'include/header.php';

$user_email = $_SESSION["email"];

$surveyData = "SELECT * FROM surveys WHERE user_email = '".$user_email."' ";
$execSurveyData = mysqli_query($conn, $surveyData);
$surveyNum = mysqli_num_rows($execSurveyData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Survey
            <small>Survey List</small>
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
                                        echo '<td>';
                                        echo '<a href="surveyView.php?id='.$data["id"].'" class="btn btn-success btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>';
                                        echo '<a href="surveyUpdate.php?id='.$data["id"].'" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                                        echo '<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="deleteSurvey('.$data['id'].')"><i class="fa fa-trash-o "></i></button>';
                                        echo '<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Share" onclick="shareSurvey('.$data['id'].','.'`'.$data['title'].'`'.')"><i class="fa fa-share-square-o "></i></button>';
                                        echo '<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Share" onclick="shareResult('.$data['id'].','.'`'.$data['title'].'`'.')"><i class="fa fa-share-square-o "></i></button>';
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
function deleteSurvey(survey_id) {
  let text;
  if (confirm("Delete survey?") == true) {
    text = "You pressed OK!";
    location.href = 'module/surveyDelete.php?id='+survey_id;
  } else {
    text = "You canceled!";
  }
}

function shareSurvey(survey_id, title) {
    var url = new URL(window.location.href)
    var subject = 'Survey Invitation ('+title+')';
    var body = "You are invited to answer this survey: " + url.hostname + "/owas/register-survey.php?survey_id="+survey_id;
    window.open('mailto:?subject='+subject+'&body='+body+'');
}

function shareResult(survey_id, title) {
    var url = new URL(window.location.href)
    var subject = 'Survey Result ('+title+')';
    var body = "You can view survey result here: " + url.hostname + "/owas/register-survey.php?survey_id="+survey_id;
    window.open('mailto:?subject='+subject+'&body='+body+'');
}
</script>
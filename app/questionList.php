<?php
include 'include/header.php';

$questionData = "SELECT * FROM questionpools";
$execQuestionData = mysqli_query($conn, $questionData);
$questionNum = mysqli_num_rows($execQuestionData);
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
                        <div class="box-tools pull-right">
                            <a href="questionAdd.php" class="btn btn-sm btn-success">
                                Add Question
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="user-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($execQuestionData as $data) {
                                        echo '<tr>';
                                        echo '<td>'.$data["title"].'</td>';
                                        echo '<td>'.$data["description"].'</td>';
                                        echo '<td>';
                                        echo '<a href="questionView.php?id='.$data["qID"].'" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                                        echo '<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onclick="deleteQuestion('.$data['qID'].')"><i class="fa fa-trash-o "></i></button>';
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
function deleteQuestion(survey_id) {
    let text;
    if (confirm("Delete question?") == true) {
        text = "You pressed OK!";
        location.href = 'module/questionDelete.php?id=' + survey_id;
    } else {
        text = "You canceled!";
    }
}
</script>
<?php
include 'include/header.php';

if (isset($_GET['id'])){
    $questionID = $_GET['id'];
} else {
    echo "<script>";
	echo "location.href = 'questionList.php';";
	echo "</script>";
}

$questionData = "SELECT * FROM questionpools WHERE qID = '".$questionID."'";
$execQuestionData = mysqli_query($conn, $questionData);
$data = mysqli_fetch_array($execQuestionData);

$optionData = "SELECT * FROM optionpools WHERE qID = '".$data['qID']."'";
$execOptionData = mysqli_query($conn, $optionData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question
            <small>Edit Question</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Question</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- Survey Creation -->
            <div class="col-md-6">
                <!-- New Question -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Question</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="module/questionUpdate.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" class="form-control" id="question_id" placeholder="Enter question_id"
                                    name="question_id" required value="<?php echo $questionID; ?>">
                                <input type="text" class="form-control" id="title" placeholder="Enter title"
                                    name="title" required value="<?php echo $data['title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Enter description"
                                    name="description" required value="<?php echo $data['description']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question Type</label>
                                <select class="form-control" name="type" required>
                                    <option selected disabled='' value="">Please select</option>
                                    <option value="1" <?= $data['type'] == '1' ? 'selected':'' ?> >Single Answer</option>
                                    <option value="2" <?= $data['type'] == '2' ? 'selected':'' ?> >Multiple Answer</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Option</label>
                                </div>
                                <div id="p_scents" class="form-group">
                                    <?php
                                        $countOption = 1; 
                                        foreach ($execOptionData as $oRow) { 
                                    ?>
                                    <div id="<?php echo $countOption; ?>">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Enter option" name="option[]" required value="<?php echo $oRow['title']; ?>">
                                        </div>
                                        <!-- <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter option description" name="optionD[]" required>
                                        </div> -->
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger"
                                                onclick="remove('<?php echo $countOption; ?>')">Delete</button>
                                        </div>
                                    </div>
                                    <?php 
                                        $countOption++;
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="button" class="btn btn-primary" id="addScnt">Add Answer</button>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="questionList.php" class="btn btn-danger">Cancel</a>
                        </div>
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
include 'include/footer.php';
?>
<script src="dist/js/addInput2.js"></script>
<script>
function deleteQuestion(qID, sID) {
  let text;
  if (confirm("Delete question?") == true) {
    text = "You pressed OK!";
    location.href = 'module/questionDelete.php?id='+qID+'&&sid='+sID;
  } else {
    text = "You canceled!";
  }
}
</script>
<?php
include 'include/header.php';
// $dataQ = mysqli_fetch_array($execQuestionData);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question
            <small>Add New Question</small>
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
                        <h3 class="box-title">New Question</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="module/questionAdd.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter title"
                                    name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Enter description"
                                    name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question Type</label>
                                <select class="form-control" name="type" required>
                                    <option selected disabled='' value="">Please select</option>
                                    <option value="1">Single Answer</option>
                                    <option value="2">Multiple Answer</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Option</label>
                                </div>
                                <div id="p_scents" class="form-group">
                                    <div id="1">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Enter option" name="option[]" required>
                                        </div>
                                        <!-- <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Enter option description" name="optionD[]" required>
                                        </div> -->
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger"
                                                onclick="remove(1)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="button" class="btn btn-primary" id="addScnt">Add Answer</button>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
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
<script src="dist/js/addInput.js"></script>
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
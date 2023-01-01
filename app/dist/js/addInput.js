var count = 0;
var id = 0;
$(function () {
    var scntDiv = $('#p_scents');
    count = scntDiv.length + 1;
    id = scntDiv.length + 1;

    $('#addScnt').click(function () {
        $('<div id="' + id + '" > '+
            '<div class="col-md-10" >' +
            '<input type="text" class="form-control" ' +
            'placeholder="Enter option" name="option[]" required></div> ' +
            // '<div class="col-md-5" >' +
            // '<input type="text" class="form-control" ' +
            // 'placeholder="Enter option description" name="optionD[]" required></div> ' +
            '<div class="col-md-2"> <button type="submit" ' +
            'class="btn btn-danger" onclick="remove(' + id + ')">Delete</button> </div></div>').appendTo(scntDiv);
        count++;
        id++;
        return false;
    });
});

function remove(param) {
    if (count > 2) {
        document.getElementById(param).remove();
        count--;
    }
}

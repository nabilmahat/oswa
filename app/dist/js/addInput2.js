var count = 0;
var id = 0;
$(function () {
    const box = document.getElementById('p_scents');
    const direct = box.children.length;
    
    count = direct;
    id = direct;

    $('#addScnt').click(function () {
        $('<div id="' + id + '" > '+
            '<div class="col-md-10" >' +
            '<input type="text" class="form-control" ' +
            'placeholder="Enter option" name="option[]" required></div> ' +
            // '<div class="col-md-5" >' +
            // '<input type="text" class="form-control" ' +
            // 'placeholder="Enter option description" name="optionD[]" required></div> ' +
            '<div class="col-md-2"> <button type="submit" ' +
            'class="btn btn-danger" onclick="remove(' + id + ')">Delete</button> </div></div>').appendTo(box);
        count++;
        id++;
        return false;
    });
});

function remove(param) {
    if (count > 1) {
        document.getElementById(param).remove();
        count--;
    }
}

$(function () {
    var scntDiv = $('#p_scents');
    var i = scntDiv.length + 1;

    $('#addScnt').click(function () {
        $('<div id="'+i+'" ><div class="col-md-10" >'+
          '<input type="text" class="form-control" '+
          'placeholder="Enter email">'+
          '</div> <div class="col-md-2"> <button type="submit" '+
          'class="btn btn-danger" onclick="remove('+i+')">Delete</button> </div></div>').appendTo(scntDiv);
        i++;
        return false;
    });    
});

function remove(param) {
    document.getElementById(param).remove();
}

function result() {

    const css = '<style type="text/css">' +
        '.chart-legend ul {' +
        'list-style: none;' +
        '}' +

        '.chart-legend ul li {' +
        'display: block;' +
        'padding-left: 30px;' +
        'position: relative;' +
        'margin-bottom: 4px;' +
        'border-radius: 5px;' +
        'padding: 2px 8px 2px 28px;' +
        'font-size: 14px;' +
        'cursor: default;' +
        '-webkit-transition: background-color 200ms ease-in-out;' +
        '-moz-transition: background-color 200ms ease-in-out;' +
        '-o-transition: background-color 200ms ease-in-out;' +
        'transition: background-color 200ms ease-in-out;' +
        '    }' +

        '.chart-legend li span {' +
        'display: block;' +
        'position: absolute;' +
        'left: 0;' +
        'top: 0;' +
        'width: 20px;' +
        'height: 100%;' +
        'border-radius: 5px;' +
        '}' +
        '@media print {' +
        '.no-print, .no-print *' +
        '{' +
            'display: none !important;' +
        '}' +
        '.progress {' +
        'position: relative;' +
        '}' +
        '.progress:before {' +
        'display: block;' +
        'content: "";' +
        'position: absolute;' +
        'top: 0;' +
        'right: 0;' +
        'bottom: 0;' +
        'left: 0;' +
        '                z-index: 0;' +
        'border-bottom: 2rem solid #eeeeee;' +
        '}' +
        '.progress-bar {' +
        'position: absolute;' +
        'top: 0;' +
        'bottom: 0;' +
        'left: 0;' +
        'z-index: 1;' +
        'border-bottom: 2rem solid #337ab7;' +
        '}' +
        '.progress-bar-green {' +
        'border-bottom-color: #00a65a;' +
        '}' +
        '.bg-info {' +
        'border-bottom-color: #5bc0de;' +
        '}' +
        '.bg-warning {' +
        'border-bottom-color: #f0a839;' +
        '}' +
        '.bg-danger {' +
        '    border-bottom-color: #ee2f31;' +
        '}' +
        '}' +
        '</style>';

    var genderCount = document.getElementById("respondentPie");
    var genderPercentage = document.getElementById("barChart");
    var genderLegend = document.getElementById("respondent-legend");
    var res = document.getElementById("res").innerHTML;
    var surveyDetail = document.getElementById("survey-detail").innerHTML;
    var questionDetail = document.getElementById("question-detail").innerHTML;

    // print report
    var Pagelink = "about:blank";
    var pwa = window.open(Pagelink, "_new");
    pwa.document.open();
    pwa.document.write('<html><head><title>Survey Result</title>');
    pwa.document.write('<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">');
    pwa.document.write('<link rel="stylesheet" href="dist/css/AdminLTE.min.css">');
    pwa.document.write('<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/morris.js/morris.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">');
    pwa.document.write('<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">');
    pwa.document.write('<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></link>');
    pwa.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">');
    pwa.document.write(css);
    // load css/script here
    pwa.document.write('</head>');

    // start div tag
    pwa.document.write("<div class='center'>");
    pwa.document.write("<h1>Survey Result</h1><br>");
    pwa.document.write("<br>" + surveyDetail + "<br>");
    pwa.document.write("<br>" + questionDetail + "<br>");
    pwa.document.write("<div class='row'>");
    pwa.document.write("    <div class='col-md-6'>");
    pwa.document.write("        <h4>Gender Count</h4><br>");
    pwa.document.write("        <br><img src='" + genderCount.toDataURL('image/png') + "'><br>");
    pwa.document.write("    </div>");
    pwa.document.write("    <div class='col-md-6'>");
    pwa.document.write("        <h4>Gender Percentage</h4><br>");
    pwa.document.write("        <br><img src='" + genderPercentage.toDataURL('image/png') + "'><br>");
    pwa.document.write("    </div>");
    pwa.document.write("</div>");
    pwa.document.write("<br><br>");
    pwa.document.write("<br><br><br>");

    // end div tag
    pwa.document.write("</div>");

    pwa.document.write('</html>');
    pwa.document.close();
    // pwa.print();
}

$('#printReport').on('click', function () {
    // result();
    window.print();
})
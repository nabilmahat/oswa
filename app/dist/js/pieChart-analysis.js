$(async function () {

    const currentUrl = new URL(window.location.href);
    const questionID = currentUrl.searchParams.get('question_id');
    const optionID = currentUrl.searchParams.get('option_id');

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
        '}' +
        '.chart-legend li span {' +
        'display: block;' +
        'position: absolute;' +
        'left: 0;' +
        'top: 0;' +
        'width: 20px;' +
        'height: 100%;' +
        'border-radius: 5px;' +
        '}' +
        '</style>';

    // Pie Chart Properties
    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //String - A legend template
        legendTemplate: css + '<ul>' + '<% for (var i=0; i<segments.length; i++) { %>' + '<li>' + '<span style=\"background-color:<%=segments[i].fillColor%>\"></span>' + '<% if (segments[i].label) { %><%= segments[i].label +" - "+ segments[i].value +"%" %><% } %>' + '</li>' + '<% } %>' + '</ul>',

        legend: {
            display: true
        }

    }

    $.post("../app/module/chart/questionData.php", {
        question_id: questionID,
    }, async function (data1) {

        let resData1 = JSON.parse(data1);

        var paramOption = 'all';
        (optionID) ? paramOption = optionID : paramOption = 'all';

        var PieData = [];

        var totalAnswer = 0;

        const map1 = new Map();

        for (var data in resData1[0].option_data) {

            await $.post("../app/module/chart/resultAnalysis.php", {
                question_id: questionID,
                option_id: resData1[0].option_data[data].id,
            }, async function (data2) {

                if (data2 != 0) {
                    totalAnswer = totalAnswer + parseInt(data2);
                }

            });

            map1.set(resData1[0].option_data[data].id, resData1[0].option_data[data]);
        }

        console.log(resData1);

        if (paramOption === 'all') {

            for (var data in resData1[0].option_data) {

                var optionCount = 0;

                await $.post("../app/module/chart/resultAnalysis.php", {
                    question_id: resData1[0].question_id,
                    option_id: resData1[0].option_data[data].id,
                }, async function (data2) {

                    if (data2 != 0) {
                        optionCount = data2;
                    }

                    PieData.push({
                        value: (optionCount / totalAnswer * 100).toFixed(2),
                        color: chartColor[data],
                        highlight: '#000000',
                        label: resData1[0].option_data[data].title,
                        labelColor: 'white',
                        labelFontSize: '16'
                    });

                });
            }
        } else {

            var optionCount = 0;

            await $.post("../app/module/chart/resultAnalysis.php", {
                question_id: resData1[0].question_id,
                option_id: paramOption,
            }, async function (data2) {

                if (data2 != 0) {
                    optionCount = data2;
                }

                PieData.push({
                    value: (optionCount / totalAnswer * 100).toFixed(2),
                    color: chartColor[data],
                    highlight: '#000000',
                    label: map1.get(paramOption).title,
                    labelColor: 'white',
                    labelFontSize: '16'
                });

            });

        }

        var pieChartCanvas = $('#' + resData1[0].question_id).get(0).getContext('2d')
        var pieChart = await new Chart(pieChartCanvas)
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pie = await pieChart.Doughnut(PieData, pieOptions)
        document.getElementById(resData1[0].question_id + "-legend").innerHTML = pie.generateLegend();
        console.log(PieData);


    });

})
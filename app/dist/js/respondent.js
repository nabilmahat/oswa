$(async function () {

    const currentUrl = new URL(window.location.href);
    const surveyID = currentUrl.searchParams.get('id');

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
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }


    $.post("../app/module/chart/respondentData.php", {
        survey_id: surveyID,
    }, async function (data2) {

        let resData2 = JSON.parse(data2);

        var male = 0;
        var female = 0;

        for (var data in resData2) {
            (resData2[data].gender == 1) ? male++ : female++
        }

        var PieData = [{
            value: male,
            color: chartColor[0],
            highlight: '#000000',
            label: 'Male'
        }, {
            value: female,
            color: chartColor[1],
            highlight: '#000000',
            label: 'Female'
        }];

        var pieChartCanvas = $('#respondentPie').get(0).getContext('2d')
        var pieChart = await new Chart(pieChartCanvas)
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        await pieChart.Doughnut(PieData, pieOptions)

    });


})
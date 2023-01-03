$(async function () {

    const currentUrl = new URL(window.location.href);
    const surveyID = currentUrl.searchParams.get('id');

    // pie chart color
    var chartColor = [];
    for (var color = 0; color < 100; color++) {
        var rgb = [];

        for (var i = 0; i < 3; i++) {
            rgb.push(Math.floor(Math.random() * 255));
        }
        chartColor.push('rgb(' + rgb.join(',') + ')');
    }

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

    var ct = 0;
    // ajax query post
    let ajaxPost1 = new Promise(async function (resolve, reject) {
        $.post("../app/module/chart/questionList.php",
            {
                survey_id: surveyID,
            }, async function (res1, status1) {

                let resData1 = JSON.parse(res1);

                console.log(resData1);

                for (var q in resData1) {

                    let ajaxPost2 = new Promise(async function (resolve, reject) {
                        $.post("../app/module/chart/allResult.php",
                            {
                                survey_id: surveyID,
                                question_id: resData1[q].question_id
                            }, async function (res2, status2) {

                                let resData2 = JSON.parse(res2);

                                var PieData = [];

                                for (var data in resData2) {
                                    PieData.push({
                                        value: resData2[data].count_option,
                                        color: chartColor[data],
                                        highlight: '#000000',
                                        label: resData2[data].title
                                    });
                                }
                                console.log(resData2.length);
                                console.log(resData1[q].question_id);
                                console.log(PieData);

                                //-------------
                                //- PIE CHART -
                                //-------------
                                var pieChartCanvas = $('#' + resData1[q].question_id).get(0).getContext('2d')
                                var pieChart = await new Chart(pieChartCanvas)
                                //Create pie or douhnut chart
                                // You can switch between pie and douhnut using the method below.
                                await pieChart.Doughnut(PieData, pieOptions)
                                console.log(pieChart);
                                ct++;
                            });
                        resolve();
                    });

                    await ajaxPost2;                    
                    console.log(ct);

                }
            });
        resolve();
    });

    await ajaxPost1;

})
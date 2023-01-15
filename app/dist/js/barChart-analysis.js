$(function () {

    const currentUrl = new URL(window.location.href);
    const questionID = currentUrl.searchParams.get('question_id');
    const optionID = currentUrl.searchParams.get('option_id');
  
    $.post("../app/module/chart/questionData.php", {
        question_id: questionID,
    }, async function (data2) {
  
      let resData1 = JSON.parse(data2);
  
      var paramOption = 'all';
        (optionID) ? paramOption = optionID : paramOption = 'all';

        var BarDataLabel = [];
        var BarDataValue = [];

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

                    BarDataLabel.push(resData1[0].option_data[data].title);

                    BarDataValue.push( (optionCount / totalAnswer * 100).toFixed(2));

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

                BarDataLabel.push(map1.get(paramOption).title);

                BarDataValue.push((optionCount / totalAnswer * 100).toFixed(2));

            });

        }
  
      var areaChartData = {
        labels: BarDataLabel,
        datasets: [
          {
            label: 'Electronics',
            fillColor: chartColor[0],
            strokeColor: 'rgba(210, 214, 222, 1)',
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: BarDataValue
          }
        ]
      }
  
      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChartData').get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = areaChartData
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      }
  
      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)
    });
  
  
  })
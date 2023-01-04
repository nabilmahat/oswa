// chart color
var chartColor = [];
for (var color = 0; color < 100; color++) {
    var rgb = [];

    for (var i = 0; i < 3; i++) {
        rgb.push(Math.floor(Math.random() * 255));
    }
    chartColor.push('rgb(' + rgb.join(',') + ')');
}
var tickValue = 5;


var chart = new CanvasJS.Chart( 'speedometer__background', {
  backgroundColor: null,
  interactivityEnabled: false,
  data: [
    {
      type: 'doughnut',
      dataPoints: [
        {
          y: 1,
          color: 'green'
        },
        {
          y: 1,
          color: 'yellow'
        },
        {
          y: 1,
          color: 'red'
        }
      ]
    }
  ]
});

function makeSpeedometer( chart ) {
  var sum = 0, 
  dataPoints = chart.options.data[0].dataPoints;

  for ( var i = 0; i < dataPoints.length; i++ ) {
    sum += dataPoints[i].y;
  }

  dataPoints.splice( 0, 0, { // Hides bottom half of the chart.  This needs CSS to set the overflow to hidden
    y: sum,
    color: "transparent",
    toolTipContent: null,
    highlightEnabled: false
  });
}

if(!chart.options.subtitles)
    chart.options.subtitles = [];
  chart.options.subtitles.push({text: tickValue + "%", verticalAlign :"center", fontColor: "white"});

$( '.js-needle' ).css({
  'transform' : 'translate(-50%, -50%) rotate('+  (tickValue * 18.0) + 'deg)'
});

makeSpeedometer( chart );
chart.render();
$(document).ready(function($) {
  Site.run();

  // Widget Linearea One
  // ---------------------
  (function() {
    //chart-linearea-one
    new Chartist.Line('#widgetLineareaOne .ct-chart', {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
      series: [
        [0, 1, 3, 2, 3.5, 1.2, 1.5, 0]
      ]
    }, {
      low: 0,
      showArea: true,
      showPoint: false,
      showLine: false,
      fullWidth: true,
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: false,
        offset: 0
      }
    });
  })();

  // Widget Linearea Two
  // ---------------------
  (function() {
    //chart-linearea-two
    new Chartist.Line('#widgetLineareaTwo .ct-chart', {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
      series: [
        [0, 0.5, 2.2, 2, 2.8, 2.3, 3.3, 2.5, 0]
      ]
    }, {
      low: 0,
      showArea: true,
      showPoint: false,
      showLine: false,
      fullWidth: true,
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: false,
        offset: 0
      }
    });
  })();

  // Widget Linearea Three
  // ---------------------
  (function() {
    //chart-linearea-three
    new Chartist.Line('#widgetLineareaThree .ct-chart', {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
      series: [
        [0, 2, 1.5, 3.5, 2.2, 3, 0.8, 0]
      ]
    }, {
      low: 0,
      showArea: true,
      showPoint: false,
      showLine: false,
      fullWidth: true,
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: false,
        offset: 0
      }
    });
  })();

  // Widget Linearea Four
  // ---------------------
  (function() {
    //chart-linearea-four
    new Chartist.Line('#widgetLineareaFour .ct-chart', {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
      series: [
        [0, 1.2, 2.4, 2.5, 3.5, 2, 2.5, 1.2, 0]
      ]
    }, {
      low: 0,
      showArea: true,
      showPoint: false,
      showLine: false,
      fullWidth: true,
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false,
        offset: 0
      },
      axisY: {
        showLabel: false,
        showGrid: false,
        offset: 0
      }
    });
  })();

  Waves.attach('.page-content .btn-floating', ['waves-light']);
  
// jstree use checkbox Plugin
  // ------------------------------------
  (function() {
    $('#jstreeExample_5').jstree({
      'core': {
        'data': [
        {
          'text': 'Home',
          "icon": "md-folder"
        }, 
        {
          'text': 'Dashboard',
          "icon": "md-folder"
        }, 
        {
          'text': 'Manajemen User',
          "icon": "md-folder",
          'state': {
            'opened': true,
            'selected': true
          },
          'children': [{
            'text': 'Users',
            "icon": "md-folder"
          }, {
            'text': 'Set Users',
            "icon": "md-folder"
          }, {
            'text': 'Users Online',
            "icon": "md-folder"
          }, {
            'text': 'Log Users',
            "icon": "md-folder"
          }]
        }]
      },
      'plugins': ['checkbox']
    });
  })();

});
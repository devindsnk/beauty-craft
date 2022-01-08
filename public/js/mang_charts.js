// var ctx = document.getElementById('myChart1').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//     labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
//     datasets: [{
//         data: [35000, 11400, 50600, 30600, 40700, 11100, 13300, 45000, 42000.23500, 17500, 12400],
//         label: "Total Income",
//         borderColor: "rgb(62,149,205)",
//         backgroundColor: "rgb(62,149,205,0.1)",
//     }]
//     },
// });

// var ctx = document.getElementById('myChart2').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//     labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
//     datasets: [{
//         data: [70, 90, 44, 60, 83, 90, 100, 30, 80.35, 45, 39],
//         label: "No of Reservations",
//         borderColor: "#3cba9f",
//         backgroundColor: "#71d1bd",
//         borderWidth: 2
//     }]
//     },
//     options: {
//     scales: {
//         xAxes: [{
//             stacked: true
//         }],
//         yAxes: [{
//             stacked: true
//         }],
//     }
//     },
// });


// $(document).ready(function () {
//     A();
//     function A()
//     {
//         console.log('hi');

//             fetch(`http://localhost:80/beauty-craft/MangDashboard/chartData`)
//                 .then(response => response.json())
//                 .then(totalIncomeForChart => {
//                     console.log(totalIncomeForChart);
//                 });
//             // });
//     }
// });
var mangChart1 = document.getElementById('mangChart1').getContext('2d');
var mangChart2 = document.getElementById('mangChart2').getContext('2d');

$(document).ready(function () {
  chart1();
  chart2();
  function chart1() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/MangDashboard/overviewChart1",
      method: "GET",
      success: function (data) {
        // console.log(data);
        var month = [];
        var income = [];
        var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        for (var i in data) {
          month.push(data[i].Month);
          income.push(data[i].TotalIncome);
        }

        for (let i = 0; i < 12; i++) {
          if (mL[i] != month[i]) {
            month.splice(i, 0, mL[i]);
            income.splice(i, 0, 0);
          }
        }
        // console.log(month);
        // console.log(income);

        var chartdata = {
          labels: month,
          datasets: [
            {
              label: 'Total Income',
              borderColor: "rgb(62,149,205)",
              backgroundColor: "rgb(62,149,205,0.1)",
              data: income
            }
          ]
        };

        var barGraph = new Chart(mangChart1, {
          type: 'line',
          data: chartdata
        });
      },
      error: function (data) {
        // console.log(data);
      }
    });
  }
  function chart2() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/MangDashboard/overviewChart2",
      method: "GET",
      success: function (data) {
        // console.log(data);
        var month = [];
        var totalReservations = [];
        var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        for (var i in data) {
          month.push(data[i].Month);
          totalReservations.push(data[i].TotalReservations);
        }

        for (let i = 0; i < 12; i++) {
          if (mL[i] != month[i]) {
            month.splice(i, 0, mL[i]);
            totalReservations.splice(i, 0, 0);
          }
        }
        // console.log(month);
        // console.log(totalReservations);

        var chartdata = {
          labels: month,
          datasets: [
            {
              label: 'No of Reservations',
              borderColor: "#3cba9f",
              backgroundColor: "#71d1bd",
              borderWidth: 2,
              data: totalReservations
            }
          ]

        };

        var barGraph = new Chart(mangChart2, {
          type: 'bar',
          data: chartdata,
          options: {
            scales: {
              xAxes: [{
                stacked: true
              }],
              yAxes: [{
                ticks: {
                  stepSize: 1
                },
                stacked: true
              }],
            }
          },
        });
      },
      error: function (data) {
        // console.log(data);
      }
    });
  }

});



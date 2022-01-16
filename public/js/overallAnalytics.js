
$(document).ready(function () {

  if (document.getElementById('myChart1')) {
    var resOverview = document.getElementById('myChart1').getContext('2d');
    chart1();
  }
  if (document.getElementById('myChart2')) {
    var cusPopulationChart = document.getElementById('myChart2').getContext('2d');
    chart2();
  }
  if (document.getElementById('myChart3')) {
    var totalIncomeChart = document.getElementById('myChart3').getContext('2d');
    chart3();
  }
  if (document.getElementById('myChart4')) {
    var noOfResChart = document.getElementById('myChart4').getContext('2d');
    chart4();
  }

  function chart1() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/Services/overallAnalyticsChart1/",
      method: "GET",
      success: function (data) {

        var lables = [];
        var count = [];

        count[0] = data['results1'][0]['walkInCustCount']
        count[1] = data['results2'][0]['onlineCustCount']

        var chartdata = {
          labels: ["Walk-in", "Online"],
          datasets: [
            {
              label: 'No of customers',
              borderColor: [
                "#9163cb",
                "#6247aa",
              ],
              backgroundColor: [
                "#b185db",
                "#815ac0 ",
              ],
              data: count
            }
          ]
        };

        var barGraph2 = new Chart(resOverview, {
          type: 'doughnut',
          data: chartdata,
          options: {
            scales: {
              xAxes: [{
                stacked: false
              }],
              yAxes: [{
                ticks: {
                  stepSize: 1,
                  beginAtZero: false,
                  display: true
                }
              }],
            }
          },
        });
      },
      error: function (data) {

      }
    });
  }
  function chart2() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/Services/overallAnalyticsChart2/",
      method: "GET",
      success: function (data) {

        var custCount = [];
        var weekNo = [];
        var wNames = ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'];

        for (var i in data) {
          custCount.push(data[i].custCount);

          let cLable = "Week " + data[i].weekNo;
          weekNo.push(cLable);
        }
        for (let i = 0; i < 5; i++) {
          if (wNames[i] != weekNo[i]) {
            weekNo.splice(i, 0, wNames[i]);
            custCount.splice(i, 0, 0);
          }
        }

        var chartdata = {
          labels: weekNo,
          datasets: [
            {
              label: 'No of customers',
              borderColor: "rgb(196,88,80)",
              backgroundColor: "rgb(196,88,80,0.1)",
              data: custCount
            }
          ]
        };

        var barGraph2 = new Chart(cusPopulationChart, {
          type: 'line',
          data: chartdata,
          options: {
            bezierCurve: false,
          },
        });
      },
      error: function (data) {

      }
    });
  }
  function chart3() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/Services/overallAnalyticsChart3",
      method: "GET",
      success: function (data) {

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

        var barGraph = new Chart(totalIncomeChart, {
          type: 'line',
          data: chartdata
        });
      },
      error: function (data) {

      }
    });
  }
  function chart4() {
    $.ajax({
      url: "http://localhost:80/beauty-craft/Services/overallAnalyticsChart4",
      method: "GET",
      success: function (data) {

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

        var barGraph = new Chart(noOfResChart, {
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

      }
    });
  }

});



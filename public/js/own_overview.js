$(document).ready(function(){
  
    if (document.getElementById('ownOverviewChartIncome')) {
        var ownChart1 = document.getElementById('ownOverviewChartIncome').getContext('2d');
        chart1();
      }

      if (document.getElementById('ownOverviewChartAvailableEmployees')) {
        var ownChart2 = document.getElementById('ownOverviewChartAvailableEmployees').getContext('2d');
        chart2();
      }

      function chart1() {
        $.ajax({
          url: "http://localhost:80/beauty-craft/OwnDashboard/overviewChart1",
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
    
            var Graph = new Chart(ownChart1, {
              type: 'line',
              data: chartdata
            });
          },
          error: function (data) {
    
          }
        });
      }




      function chart2() {
        $.ajax({
          url: "http://localhost:80/beauty-craft/OwnDashboard/overviewChart2",
          method: "GET",
          success: function (data) {
    
            var staffType = [];
            var count = [];
            var staffL = ['Managers', 'Receptionists','Service providers'];
    
            for (var i in data) {
                if(data[i].sType!=1 && data[i].sType!=2){
                staffType.push(data[i].sType);
                count.push(data[i].TotalCount);
                }
            }
       
            var chartdata = {
              labels: staffL,
              datasets: [
                {
                  label: 'Total Staff Members',
                  borderColor: [
                    // "#3cba9f",
                    // "#ffa500",
                    // "#c45850",
                ],
                backgroundColor: [
                  "#1BC657",
                      "#ffa500",
                      "#DA2346",
                ],
                borderWidth: 5,
                  data: count 
                }
              ]
            };
    
            var Graph = new Chart(ownChart2, {
              type: 'doughnut',
              data: chartdata
            });
          },
          error: function (data) {
    
          }
        });
      }

});


// ...........................START SERVICE PROVIDER REPORT...........................//

const selectedMonth2 = document.querySelector(".serviceProvSelectedMonth");

if (selectedMonth2 != null) {
  putServiceProvReportTableData(selectedMonth2.value);

  selectedMonth2.addEventListener('change',
    function () {
      putServiceProvReportTableData(selectedMonth2.value)
    }
  )
}

var myTable2 = document.getElementById('serviceProvTable');

function putServiceProvReportTableData(month) {

  fetch(`http://localhost:80/beauty-craft/Services/serviceProviderReportJS/${month}`)
    .then(response => response.json())
    .then(reportDetails => {

      for (var i = 1; i < reportDetails.length + 1; i++) {
        myTable2.rows[i].cells[0].innerHTML = reportDetails[i - 1][0]['staffID'];
        myTable2.rows[i].cells[1].innerHTML = reportDetails[i - 1][0]['fName'] + " " + reportDetails[i - 1][0]['lName'];
        myTable2.rows[i].cells[2].innerHTML = reportDetails[i - 1][0]['NoOFService'];
        myTable2.rows[i].cells[3].innerHTML = reportDetails[i - 1][0]['NoOfRes'];
        myTable2.rows[i].cells[4].innerHTML = reportDetails[i - 1][0]['TotalServicePrice'] + ' LKR';

      }
      var totalRes = 0;
      var totalIncome = 0;
      for (var i = 0; i < reportDetails.length; i++) {
        totalRes = totalRes + parseInt(reportDetails[i][0]['NoOfRes']);
        totalIncome = totalIncome + parseInt(reportDetails[i][0]['TotalServicePrice']);
      }
      myTable2.rows[reportDetails.length + 1].cells[3].innerHTML = totalRes;
      myTable2.rows[reportDetails.length + 1].cells[4].innerHTML = totalIncome + ' LKR';
    })
}

// ...........................END SERVICE PROVIDER REPORT...........................//

// ...........................START SERVICE PROVIDER ANALYTICS...........................//

const selectedServiceProv = document.querySelector(".serviceProvSelectDropDown");
// const serviceProviderFromDate = document.querySelector(".serviceProviderFromDate");
// const serviceProviderToDate = document.querySelector(".serviceProviderToDate");

const serviceProviderFromDate = document.querySelector('input[type="month"][name="serviceProviderFromDate"]');
const serviceProviderToDate = document.querySelector('input[type="month"][name="serviceProviderToDate"]');

const serviceProvSearchBtn = document.querySelector(".serviceProvSearchBtn");
const serviceProvSelectError = document.querySelector(".serviceProvSelectError");
const serviceProvFromError = document.querySelector(".serviceProvFromError");
const serviceProvToError = document.querySelector(".serviceProvToError");

if (selectedServiceProv != null) {
  const today = new Date()

  serviceProviderFromDate.value = convertToYYMM(today);
  serviceProviderToDate.value = convertToYYMM(today);

  sProvAnalyticsSelector();
  sProvResCardTableData();
  serviceProvSearchBtn.addEventListener('click',
    function () {
      var diff = monthDifference(serviceProviderFromDate.value, serviceProviderToDate.value);
      var errorVal = 0;

      if (diff > 12) {
        console.log('sss');
        serviceProvToError.innerHTML = "Select a month range within 12 months";
        serviceProvFromError.innerHTML = "Select a month range within 12 months";
        errorVal = 1;
      } else if (serviceProviderFromDate.value == 0) {
        serviceProvFromError.innerHTML = "please select a month";
        errorVal = 1;
      } else if (serviceProviderToDate.value == 0) {
        serviceProvToError.innerHTML = "please select a month";
        errorVal = 1;
      } else if (serviceProviderFromDate.value > serviceProviderToDate.value || serviceProviderFromDate.value > serviceProviderToDate.value) {
        serviceProvFromError.innerHTML = "please select a valid range";
        serviceProvToError.innerHTML = "please select a valid range";
        errorVal = 1;
      } else {
        serviceProvFromError.innerHTML = "";
        serviceProvToError.innerHTML = "";
      }

      if (serviceProviderFromDate.value != 0 && serviceProviderToDate.value != 0 && errorVal == 0) {
        sProvAnalyticsSelector();
        sProvResCardTableData();
      }
    }
  )
}
var barGraph2;
var lineGraph2;

function sProvAnalyticsSelector() {

  var ctx7 = document.getElementById('myChart7').getContext('2d');
  var ctx8 = document.getElementById('myChart8').getContext('2d');

  $(document).ready(function () {

    chart7();
    chart8();
    function chart7() {
      if (barGraph2) {
        barGraph2.destroy();
      }

      $.ajax({
        url: "http://localhost:80/beauty-craft/Services/analyticsServiceProvChartJS/" + selectedServiceProv.value + "/" + serviceProviderFromDate.value + "/" + serviceProviderToDate.value,
        method: "GET",
        success: function (data) {

          var YearAndMonth = [];
          var MonthNo = [];
          var TotalReservations = [];
          var TotalIncome = [];

          for (var i in data) {
            YearAndMonth.push(data[i].YearAndMonth);
            MonthNo.push(data[i].monthNo);
            TotalReservations.push(data[i].TotalReservations);
            TotalIncome.push(data[i].TotalIncome);

          }

          var chartdata = {
            labels: YearAndMonth,
            datasets: [
              {
                label: 'No of Reservations',
                borderColor: "#a69cac",
                backgroundColor: "#a69cac",
                data: TotalReservations
              }
            ]
          };

          barGraph2 = new Chart(ctx7, {
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
    function chart8() {
      if (lineGraph2) {
        lineGraph2.destroy();
      }
      $.ajax({
        url: "http://localhost:80/beauty-craft/Services/analyticsServiceProvChartJS/" + selectedServiceProv.value + "/" + serviceProviderFromDate.value + "/" + serviceProviderToDate.value,
        method: "GET",
        success: function (data) {

          var YearAndMonth = [];
          var TotalIncome = [];

          for (var i in data) {
            YearAndMonth.push(data[i].YearAndMonth);
            TotalIncome.push(data[i].TotalIncome);
          }

          var chartdata = {
            labels: YearAndMonth,
            datasets: [
              {
                label: 'Total Income',
                borderColor: "#474973",
                backgroundColor: "#474973",
                data: TotalIncome
              }
            ]
          };

          lineGraph2 = new Chart(ctx8, {
            type: 'line',
            data: chartdata,
          });
        },
        error: function (data) {

        }
      });

    }
  });
}

function sProvResCardTableData() {

  document.getElementById("rows2").innerHTML = '';

  fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceProvResTable/${selectedServiceProv.value}/${serviceProviderFromDate.value}/${serviceProviderToDate.value}`)
    .then(response => response.json())
    .then(serviceProvAnalyticResDetails => {

      let totIncome = 0;
      for (let i = 0; i < serviceProvAnalyticResDetails.length; i++) {
        var newRow = document.createElement("tr");
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
        var cell3 = document.createElement("td");
        var cell4 = document.createElement("td");

        cell1.innerHTML = serviceProvAnalyticResDetails[i]['reservationID'];
        cell2.innerHTML = serviceProvAnalyticResDetails[i]['sName'];
        cell3.innerHTML = serviceProvAnalyticResDetails[i]['cFName'] + " " + serviceProvAnalyticResDetails[i]['cLName'];
        cell4.innerHTML = serviceProvAnalyticResDetails[i]['price'] + ' LKR';

        totIncome = totIncome + parseInt(serviceProvAnalyticResDetails[i]['price']);
        newRow.append(cell1);
        newRow.append(cell2);
        newRow.append(cell3);
        newRow.append(cell4);
        document.getElementById("rows2").appendChild(newRow);

      }
      let totalIncome = (Math.round(totIncome * 100) / 100).toFixed(2);
      document.getElementById("totResCount2").innerHTML = serviceProvAnalyticResDetails.length;
      document.getElementById("totIncome2").innerHTML = totalIncome + ' LKR';

    });
}

// ...........................END SERVICE PROVIDER ANALYTICS...........................//
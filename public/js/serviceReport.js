// ...........................START SERVICE REPORT...........................//

const selectedMonth1 = document.querySelector(".serviceSelectedMonth");

if (selectedMonth1 != null) {
  putServiceReportTableData(selectedMonth1.value);

  selectedMonth1.addEventListener('change',
    function () {
      putServiceReportTableData(selectedMonth1.value)
    }
  )
}

var myTable1 = document.getElementById('serviceTable');

function putServiceReportTableData(month) {

  fetch(`http://localhost:80/beauty-craft/Services/serviceReportJS/${month}`)
    .then(response => response.json())
    .then(reportDetails => {

      for (var i = 1; i < reportDetails.length + 1; i++) {

        myTable1.rows[i].cells[0].innerHTML = 'S' + reportDetails[i - 1][0]['serviceID'];

        if (reportDetails[i - 1][0]['status'] == '0') {
          myTable1.rows[i].cells[1].innerHTML = reportDetails[i - 1][0]['name'] + ' (REMOVED)';
        } else if (reportDetails[i - 1][0]['status'] == '2') {
          myTable1.rows[i].cells[1].innerHTML = reportDetails[i - 1][0]['name'] + ' (HOLD)';
        } else {
          myTable1.rows[i].cells[1].innerHTML = reportDetails[i - 1][0]['name'];
        }
        ;
        myTable1.rows[i].cells[2].innerHTML = reportDetails[i - 1][0]['NoOFStaff'];
        myTable1.rows[i].cells[3].innerHTML = reportDetails[i - 1][0]['NoOfRes'];
        myTable1.rows[i].cells[4].innerHTML = reportDetails[i - 1][0]['TotalServicePrice'] + ' LKR';

      }
      var totalRes = 0;
      var totalIncome = 0;
      for (var i = 0; i < reportDetails.length; i++) {
        totalRes = totalRes + parseInt(reportDetails[i][0]['NoOfRes']);
        totalIncome = totalIncome + parseInt(reportDetails[i][0]['TotalServicePrice']);
      }
      myTable1.rows[reportDetails.length + 1].cells[3].innerHTML = totalRes;
      myTable1.rows[reportDetails.length + 1].cells[4].innerHTML = totalIncome + ' LKR';

    })
}

// ...........................END SERVICE REPORT...........................//



// ...........................START SERVICE ANALYTICS...........................//

const selectedService = document.querySelector(".serviceSelectDropDown");
// const selectedServiceFromDate = document.querySelector(".serviceFromDate");
// const selectedServiceToDate = document.querySelector(".serviceToDate");

const selectedServiceFromDate = document.querySelector('input[type="month"][name="serviceFromDate"]');
const selectedServiceToDate = document.querySelector('input[type="month"][name="serviceToDate"]');

const serviceSearchBtn = document.querySelector(".serviceSearchBtn");
const serviceSelectError = document.querySelector(".serviceSelectError");
const serviceFromError = document.querySelector(".serviceFromError");
const serviceToError = document.querySelector(".serviceToError");

function convertToYYMM(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2);
  return [date.getFullYear(), mnth].join("-");
}
function monthDifference(date1, date2) {
  startDate = new Date(date1);
  endDate = new Date(date2);
  var months;
  months = (endDate.getFullYear() - startDate.getFullYear()) * 12;
  months -= startDate.getMonth();
  months += endDate.getMonth();
  return months <= 0 ? 0 : months;
}

if (selectedService != null) {
  const today = new Date()
  console.log(today);
  selectedServiceFromDate.value = convertToYYMM(today);
  selectedServiceToDate.value = convertToYYMM(today);

  serviceAnalyticsSelector();
  serviceResCardTableData();
  serviceSearchBtn.addEventListener('click',
    function () {

      var diff = monthDifference(selectedServiceFromDate.value, selectedServiceToDate.value);
      console.log(diff);
      var errorVal = 0;

      if (diff > 12) {
        console.log('sss');
        serviceToError.innerHTML = "Select a month range within 12 months";
        serviceFromError.innerHTML = "Select a month range within 12 months";
        errorVal = 1;
      } else if (selectedServiceFromDate.value == 0) {
        serviceFromError.innerHTML = "please select a month";
        errorVal = 1;
      } else if (selectedServiceToDate.value == 0) {
        serviceToError.innerHTML = "please select a month";
        errorVal = 1;
      } else if (selectedServiceFromDate.value > selectedServiceToDate.value || selectedServiceFromDate.value > selectedServiceToDate.value) {
        serviceFromError.innerHTML = "please select a valid range";
        serviceToError.innerHTML = "please select a valid range";
        errorVal = 1;
      } else {
        serviceFromError.innerHTML = "";
        serviceToError.innerHTML = "";
      }

      if (selectedServiceFromDate.value != 0 && selectedServiceToDate.value != 0 && errorVal == 0) {
        serviceAnalyticsSelector();
        serviceResCardTableData();
      }
    }
  )
}
var barGraph1;
var lineGraph1;

function serviceAnalyticsSelector() {

  var ctx5 = document.getElementById('myChart5').getContext('2d');
  var ctx6 = document.getElementById('myChart6').getContext('2d');

  $(document).ready(function () {

    chart3();
    chart4();
    function chart3() {

      if (barGraph1) {
        barGraph1.destroy();
      }

      $.ajax({
        url: "http://localhost:80/beauty-craft/Services/analyticsServiceChartJS/" + selectedService.value + "/" + selectedServiceFromDate.value + "/" + selectedServiceToDate.value,
        method: "GET",
        success: function (data) {
          console.log(data);

          const monthsAll = {
            1: 'January', 2: 'February', 3: 'March', 4: 'April', 5: 'May', 6: 'June', 7: 'July', 8: 'August', 9: 'September', 10: 'October', 11: 'November', 12: 'December'
          };

          var YearAndMonth = [];
          var MonthNo = [];
          var TotalReservations = [];
          var TotalIncome = [];

          for (var i in data) {
            YearAndMonth.push(data[i].YearAndMonth);
            MonthNo.push(data[i].month);
            TotalReservations.push(data[i].TotalReservations);
            TotalIncome.push(data[i].TotalIncome);
          }

          // var FirstNo = MonthNo[0];

          // console.log(data.length);
          // var j = 0;
          // var iCount = Number(FirstNo) + Number(data.length);
          // console.log(iCount);
          // for (let i = FirstNo; i < iCount; i++) {

          //   if (i != MonthNo[j]) {
          //     MonthNo.splice(j, 0, i);
          //     YearAndMonth.splice(j, 0, monthsAll[i]);
          //     TotalReservations.splice(j, 0, 0);
          //     TotalIncome.splice(j, 0, 0);
          //   }
          //   j++;
          // }

          var chartdata = {
            labels: YearAndMonth,
            datasets: [
              {
                label: 'No of Reservations',
                borderColor: "#76c893",
                backgroundColor: "#76c893",
                data: TotalReservations
              }
            ]
          };

          barGraph1 = new Chart(ctx5, {
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
    function chart4() {

      if (lineGraph1) {
        lineGraph1.destroy();
      }

      $.ajax({
        url: "http://localhost:80/beauty-craft/Services/analyticsServiceChartJS/" + selectedService.value + "/" + selectedServiceFromDate.value + "/" + selectedServiceToDate.value,
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
                borderColor: "#34a0a4",
                backgroundColor: "#34a0a4",
                data: TotalIncome
              }
            ]
          };

          lineGraph1 = new Chart(ctx6, {
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

function serviceResCardTableData() {

  var serviceRes = document.getElementById('serviceAnalyResTable');
  document.getElementById("rows1").innerHTML = '';

  fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceResTable/${selectedService.value}/${selectedServiceFromDate.value}/${selectedServiceToDate.value}`)
    .then(response => response.json())
    .then(serviceAnalyticResDetails => {
      console.log(serviceAnalyticResDetails);
      let totIncome = 0;
      for (let i = 0; i < serviceAnalyticResDetails.length; i++) {
        var newRow = document.createElement("tr");
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
        var cell3 = document.createElement("td");
        var cell4 = document.createElement("td");

        cell1.innerHTML = serviceAnalyticResDetails[i]['reservationID'];
        cell2.innerHTML = serviceAnalyticResDetails[i]['sFName'] + " " + serviceAnalyticResDetails[i]['sLName'];
        cell3.innerHTML = serviceAnalyticResDetails[i]['cFName'] + " " + serviceAnalyticResDetails[i]['cLName'];
        cell4.innerHTML = serviceAnalyticResDetails[i]['price'] + ' LKR';

        totIncome = totIncome + parseInt(serviceAnalyticResDetails[i]['price']);
        newRow.append(cell1);
        newRow.append(cell2);
        newRow.append(cell3);
        newRow.append(cell4);
        document.getElementById("rows1").appendChild(newRow);

      }
      let totalIncome = (Math.round(totIncome * 100) / 100).toFixed(2);
      document.getElementById("totResCount").innerHTML = serviceAnalyticResDetails.length;
      document.getElementById("totIncome").innerHTML = totalIncome + ' LKR';

    });
}

// ...........................END SERVICE ANALYTICS...........................//
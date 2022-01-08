// ...........................START SERVICE REPORT...........................//

const selectedMonth1 = document.querySelector(".serviceSelectedMonth");

if(selectedMonth1 != null){
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
        
        for (var i = 1; i < reportDetails.length+1; i++){
            myTable1.rows[i].cells[0].innerHTML = reportDetails[i-1][0]['serviceID'];
            myTable1.rows[i].cells[1].innerHTML = reportDetails[i-1][0]['name'];
            myTable1.rows[i].cells[2].innerHTML = reportDetails[i-1][0]['NoOFStaff'];
            myTable1.rows[i].cells[3].innerHTML = reportDetails[i-1][0]['NoOfRes'];
            myTable1.rows[i].cells[4].innerHTML = reportDetails[i-1][0]['TotalServicePrice'];
            
        }
        var totalRes = 0;
        var totalIncome = 0;
        for (var i = 0; i < reportDetails.length; i++){
            totalRes = totalRes + parseInt(reportDetails[i][0]['NoOfRes']);
            totalIncome = totalIncome + parseInt(reportDetails[i][0]['TotalServicePrice']);
        }
        myTable1.rows[reportDetails.length+1].cells[3].innerHTML = totalRes;
        myTable1.rows[reportDetails.length+1].cells[4].innerHTML = totalIncome;

    })
}

// ...........................END SERVICE REPORT...........................//



// ...........................START SERVICE ANALYTICS...........................//

const selectedService = document.querySelector(".serviceSelectDropDown");
const selectedServiceFromDate = document.querySelector(".serviceFromDate");
const selectedServiceToDate = document.querySelector(".serviceToDate");
const serviceSearchBtn = document.querySelector(".serviceSearchBtn");
const serviceSelectError = document.querySelector(".serviceSelectError");
const serviceFromError = document.querySelector(".serviceFromError");
const serviceToError = document.querySelector(".serviceToError");

if(selectedService != null){
    
    serviceAnalyticsSelector();
    serviceResCardTableData();
    serviceSearchBtn.addEventListener('click',
        function () {
            
            // const today = new Date()
            // const tomorrow = new Date(today)
            // tomorrow.setDate(tomorrow.getDate() + 1)

            serviceAnalyticsSelector();
            serviceResCardTableData();
        }
    )
}

function serviceAnalyticsSelector(){
    
        var ctx5 = document.getElementById('myChart5').getContext('2d');
        var ctx6 = document.getElementById('myChart6').getContext('2d');

         $(document).ready(function(){

            chart3();
            chart4();
            function chart3(){
              // var resetCanvas = function(){
              //   $('#myChart5N').remove(); // this is my <canvas> element
              //   $('#chart-container').append('<canvas id="myChart5N"><canvas>');
              //   canvas = document.querySelector('#myChart5N');
              //   ctx = canvas.getContext('2d');
              //   ctx.canvas.width = $('#myChart5').width(); // resize to parent width
              //   ctx.canvas.height = $('#myChart5').height(); // resize to parent height
              //   var x = canvas.width/2;
              //   var y = canvas.height/2;
              //   ctx.font = '10pt Verdana';
              //   ctx.textAlign = 'center';
              //   ctx.fillText('This text is centered on the canvas', x, y);
              // };
              // if(barGraph!=null){
              //   myPieChart.destroy();
              // }
                $.ajax({
                    url: "http://localhost:80/beauty-craft/Services/analyticsServiceChartJS/"+selectedService.value+"/"+selectedServiceFromDate.value+"/"+selectedServiceToDate.value,
                    method: "GET",
                    success: function(data) {
                      
                      var YearAndMonth = [];
                      var weekNo = [];
                      var TotalReservations = [];
                      var TotalIncome = [];
                      var resultLableF = [];
                
                      for(var i in data) {
                        YearAndMonth.push(data[i].YearAndMonth);
                        weekNo.push(data[i].weekNo);
                        TotalReservations.push(data[i].TotalReservations);
                        TotalIncome.push(data[i].TotalIncome);

                        let resultLable = data[i].YearAndMonth+" | week "+data[i].weekNo;
                        resultLableF.push(resultLable);
                      }
                    
                      var chartdata = {
                        labels: resultLableF,
                        datasets : [
                          {
                            label: 'No of Reservations',
                            borderColor: "#76c893",
                            backgroundColor: "#76c893",
                            data: TotalReservations
                          }
                        ]
                      };
                
                      var barGraph1 = new Chart(ctx5, {
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
                    error: function(data) {
                      
                    }
                  });
                  
            }
            function chart4(){
              
              $.ajax({
                  url: "http://localhost:80/beauty-craft/Services/analyticsServiceChartJS/"+selectedService.value+"/"+selectedServiceFromDate.value+"/"+selectedServiceToDate.value,
                  method: "GET",
                  success: function(data) {
                    
                    var YearAndMonth = [];
                    var weekNo = [];
                    var TotalIncome = [];
                    var resultLableF = [];
              
                    for(var i in data) {
                      YearAndMonth.push(data[i].YearAndMonth);
                      weekNo.push(data[i].weekNo);
                      TotalIncome.push(data[i].TotalIncome);

                      let resultLable = data[i].YearAndMonth+" | week "+data[i].weekNo;
                      resultLableF.push(resultLable);
                    }
                  
                    var chartdata = {
                      labels: resultLableF,
                      datasets : [
                        {
                          label: 'Total Income',
                          borderColor: "#34a0a4",
                          backgroundColor: "#34a0a4",
                          data: TotalIncome
                        }
                      ]
                    };
              
                    var barGraph2 = new Chart(ctx6, {
                      type: 'line',
                      data: chartdata,
                    });
                  },
                  error: function(data) {
                    
                  }
                });
                
          }
        });
}

function serviceResCardTableData(){
  
  var serviceRes = document.getElementById('serviceAnalyResTable');
  document.getElementById("rows1").innerHTML='';

  fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceResTable/${selectedService.value}/${selectedServiceFromDate.value}/${selectedServiceToDate.value}`)
        .then(response => response.json())
        .then(serviceAnalyticResDetails => {
          
          let totIncome=0;
          for (let i = 0; i < serviceAnalyticResDetails.length; i++) {
            var newRow = document.createElement("tr");
            var cell1 = document.createElement("td");
            var cell2 = document.createElement("td");
            var cell3 = document.createElement("td");
            var cell4 = document.createElement("td");

            cell1.innerHTML = serviceAnalyticResDetails[i]['reservationID'];
            cell2.innerHTML = serviceAnalyticResDetails[i]['sFName']+" "+serviceAnalyticResDetails[i]['sLName'];
            cell3.innerHTML = serviceAnalyticResDetails[i]['cFName']+" "+serviceAnalyticResDetails[i]['cLName'];
            cell4.innerHTML = serviceAnalyticResDetails[i]['price'];

            totIncome = totIncome + parseInt(serviceAnalyticResDetails[i]['price']);
            newRow.append(cell1);
            newRow.append(cell2);
            newRow.append(cell3);
            newRow.append(cell4);
            document.getElementById("rows1").appendChild(newRow);

          }
          let totalIncome =  (Math.round(totIncome * 100) / 100).toFixed(2);
          document.getElementById("totResCount").innerHTML=serviceAnalyticResDetails.length;
          document.getElementById("totIncome").innerHTML=totalIncome+' LKR';

  });
}

// function chartData(){
//   console.log('resTableData');

  // fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceCard1/${selectedService.value}/${selectedServiceFromDate.value}/${selectedServiceToDate.value}`)
  // .then(response => response.json())
  // .then(serviceAnalyticCard1Details => {
  //   console.log(serviceAnalyticCard1Details);
  //   document.getElementById("totResCount").innerHTML=serviceAnalyticCard1Details[0]['totalReservations'];

  // });
  // fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceCard2/${selectedService.value}/${selectedServiceFromDate.value}/${selectedServiceToDate.value}`)
  //       .then(response => response.json())
  //       .then(serviceAnalyticCard2Details => {
  //         totalIncome =  (Math.round(serviceAnalyticCard2Details[0]['totalIncome'] * 100) / 100).toFixed(2); 
  //         // console.log(totalIncome);

  //         document.getElementById("totIncome").innerHTML=totalIncome+' LKR';
  // });
// }
// ...........................END SERVICE ANALYTICS...........................//
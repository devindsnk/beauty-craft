// ...........................START SERVICE PROVIDER REPORT...........................//

const selectedMonth2 = document.querySelector(".serviceProvSelectedMonth");

if(selectedMonth2 != null){
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
        //    console.log(reportDetails);
           for (var i = 1; i < reportDetails.length+1; i++){
            myTable2.rows[i].cells[0].innerHTML = reportDetails[i-1][0]['staffID'];
            myTable2.rows[i].cells[1].innerHTML = reportDetails[i-1][0]['fName'] +" "+ reportDetails[i-1][0]['lName'];
            myTable2.rows[i].cells[2].innerHTML = reportDetails[i-1][0]['NoOFService'];
            myTable2.rows[i].cells[3].innerHTML = reportDetails[i-1][0]['NoOfRes'];
            myTable2.rows[i].cells[4].innerHTML = reportDetails[i-1][0]['TotalServicePrice'];
            
        }
        var totalRes = 0;
        var totalIncome = 0;
        for (var i = 0; i < reportDetails.length; i++){
            totalRes = totalRes + parseInt(reportDetails[i][0]['NoOfRes']);
            totalIncome = totalIncome + parseInt(reportDetails[i][0]['TotalServicePrice']);
        }
        myTable2.rows[reportDetails.length+1].cells[3].innerHTML = totalRes;
        myTable2.rows[reportDetails.length+1].cells[4].innerHTML = totalIncome;
})
}

// ...........................END SERVICE PROVIDER REPORT...........................//

// ...........................START SERVICE PROVIDER ANALYTICS...........................//

const selectedServiceProv = document.querySelector(".serviceProvSelectDropDown");
const serviceProviderFromDate = document.querySelector(".serviceProviderFromDate");
const serviceProviderToDate = document.querySelector(".serviceProviderToDate");
const serviceProvSearchBtn = document.querySelector(".serviceProvSearchBtn");
const serviceProvSelectError = document.querySelector(".serviceProvSelectError");
const serviceProvFromError = document.querySelector(".serviceProvFromError");
const serviceProvToError = document.querySelector(".serviceToError");

if(selectedServiceProv != null){
    // console.log(selectedServiceProv.value);
    sProvAnalyticsSelector();
    sProvResCardTableData();
    serviceProvSearchBtn.addEventListener('click',
        function () {
            sProvAnalyticsSelector();
            sProvResCardTableData();
        }
    )
}

function sProvAnalyticsSelector(){
    
        var ctx7 = document.getElementById('myChart7').getContext('2d');
        var ctx8 = document.getElementById('myChart8').getContext('2d');

         $(document).ready(function(){

            chart7();
            chart8();
            function chart7(){
              
                $.ajax({
                    url: "http://localhost:80/beauty-craft/Services/analyticsServiceProvChartJS/"+selectedServiceProv.value+"/"+serviceProviderFromDate.value+"/"+serviceProviderToDate.value,
                    method: "GET",
                    success: function(data) {
                    //   console.log(data);
                      
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
                            borderColor: "#a69cac",
                            backgroundColor: "#a69cac",
                            data: TotalReservations
                          }
                        ]
                      };
                
                      var barGraph1 = new Chart(ctx7, {
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
                      // console.log(data);
                    }
                  });
                  
            }
            function chart8(){
              
              $.ajax({
                  url: "http://localhost:80/beauty-craft/Services/analyticsServiceProvChartJS/"+selectedServiceProv.value+"/"+serviceProviderFromDate.value+"/"+serviceProviderToDate.value,
                  method: "GET",
                  success: function(data) {
                    // console.log(data);
                    
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
                          borderColor: "#474973",
                          backgroundColor: "#474973",
                          data: TotalIncome
                        }
                      ]
                    };
              
                    var barGraph2 = new Chart(ctx8, {
                      type: 'line',
                      data: chartdata,
                    });
                  },
                  error: function(data) {
                    // console.log(data);
                  }
                });
                
          }
        });
}

function sProvResCardTableData(){
    // console.log('resTableData');
    document.getElementById("rows2").innerHTML='';
  
    fetch(`http://localhost:80/beauty-craft/Services/analyticsServiceProvResTable/${selectedServiceProv.value}/${serviceProviderFromDate.value}/${serviceProviderToDate.value}`)
          .then(response => response.json())
          .then(serviceProvAnalyticResDetails => {
            // console.log(serviceProvAnalyticResDetails);
            let totIncome=0;
            for (let i = 0; i < serviceProvAnalyticResDetails.length; i++) {
              var newRow = document.createElement("tr");
              var cell1 = document.createElement("td");
              var cell2 = document.createElement("td");
              var cell3 = document.createElement("td");
              var cell4 = document.createElement("td");
  
              cell1.innerHTML = serviceProvAnalyticResDetails[i]['reservationID'];
              cell2.innerHTML = serviceProvAnalyticResDetails[i]['sName'];
              cell3.innerHTML = serviceProvAnalyticResDetails[i]['cFName']+" "+serviceProvAnalyticResDetails[i]['cLName'];
              cell4.innerHTML = serviceProvAnalyticResDetails[i]['price'];
  
              totIncome = totIncome + parseInt(serviceProvAnalyticResDetails[i]['price']);
              newRow.append(cell1);
              newRow.append(cell2);
              newRow.append(cell3);
              newRow.append(cell4);
              document.getElementById("rows2").appendChild(newRow);
  
            }
            let totalIncome =  (Math.round(totIncome * 100) / 100).toFixed(2);
            document.getElementById("totResCount2").innerHTML=serviceProvAnalyticResDetails.length;
            document.getElementById("totIncome2").innerHTML=totalIncome+' LKR';
  
    });
}

// ...........................END SERVICE PROVIDER ANALYTICS...........................//
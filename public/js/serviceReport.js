// ...........................START SERVICE REPORT...........................//

const selectedMonth1 = document.querySelector(".serviceSelectedMonth");

putServiceReportTableData(selectedMonth1.value);

selectedMonth1.addEventListener('change',
    function () {
        putServiceReportTableData(selectedMonth1.value)     
    }
)

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
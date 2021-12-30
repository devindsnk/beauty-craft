// ...........................START SERVICE PROVIDER REPORT...........................//

const selectedMonth2 = document.querySelector(".serviceProvSelectedMonth");

putServiceProvReportTableData(selectedMonth2.value);

selectedMonth2.addEventListener('change',
    function () {
        putServiceProvReportTableData(selectedMonth2.value)     
    }
)

var myTable2 = document.getElementById('serviceProvTable');

function putServiceProvReportTableData(month) {

    fetch(`http://localhost:80/beauty-craft/Services/serviceProviderReportJS/${month}`)
       .then(response => response.json())
       .then(reportDetails => {
           console.log(reportDetails);
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
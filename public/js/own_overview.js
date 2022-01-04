// $(document).ready(function(){
//   $.ajax({
//     url: "http://localhost/beauty-craft/OwnOverviewModel",
//     method: "GET",
//     success:function(data){
//         console.log(data);
//     },
//     error:function(data){
//         console.log(data);
//     }
//   });
// });




var ctx = document.getElementById('ownOverviewChartAvailableEmployees').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Service Providers", "Receptionists", "Managers"],
        datasets: [{
            data: [70, 10, 6],
            // borderColor: [
            //     "#3cba9f",
            //     "#ffa500",
            //     "#c45850",
            // ],
            backgroundColor: [
                "#1BC657",
                "#ffa500",
                "#DA2346",
                // "rgb(60,186,159,0.1)",
                // "rgb(255,165,0,0.1)",
                // "rgb(196,88,80,0.1)",
            ],
            borderWidth: 5,
        }]
    },
    options: {
        scales: {
            xAxes: [{
                display: false,
            }],
            yAxes: [{
                display: false,
            }],
        }
    },

});


// $.ajax({
//     type: 'POST',
//     url: 'api.php',
//     success: function (data) {
//     lineChartData = data;//alert(JSON.stringify(data));
//     var myChart = new Chart(document.getElementById("ownOverviewChartAvailableEmployees").getContext("2d")).Line(lineChartData);
    
//     var ctx = document.getElementById("canvas").getContext("2d");
//     window.myLine = new Chart(ctx).Line(lineChartData, {responsive: true});
//     } 
//     });







var ctx = document.getElementById('ownOverviewChartIncome').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [
            {
            data: [86, 114, 106, 106, 107, 111, 133],
            label: "Income",
            borderColor: "rgb(3, 122, 255)",
        }, 
        // {
        //     data: [70, 90, 44, 60, 83, 90, 100],
        //     label: "Expences",
        //     borderColor: "rgb(218, 35, 70)",
        // }, 
        // {
        //     data: [10, 21, 60, 44, 17, 21, 17],
        //     label: "Profit",
        //     borderColor: "rgb(27, 198, 87)",
        // }
    ]
    },
});





var ctx = document.getElementById('ownOverviewChartSalaryStatus').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Paid", "Unpaid"],
        datasets: [{
            data: [70, 10],
            // borderColor: [
            //     "#3cba9f",
            //     "#ffa500",
            //     "#c45850",
            // ],
            backgroundColor: [
                "#1BC657",
                "#DA2346",
                // "#c45850",
                // "rgb(60,186,159,0.1)",
                // "rgb(255,165,0,0.1)",
                // "rgb(196,88,80,0.1)",
            ],
            borderWidth: 5,
        }]
    },
    options: {
        scales: {
            xAxes: [{
                display: false,
            }],
            yAxes: [{
                display: false,
            }],
        }
    },
});


// function tableFilter() {
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("salaryInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("salaryTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//       td = tr[i].getElementsByTagName("td")[0];
//       if (td) {
//         txtValue = td.textContent || td.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         } else {
//           tr[i].style.display = "none";
//         }
//       }       
//     }
//   }
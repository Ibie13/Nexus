$('document').ready(function () {


    $.ajax({
        type: "POST",
        url: "chart.php",
       
        dataType: "json",
        success: function (data) {
            
            
            var vagasarray =[];
           
            
            
           for (var i=0;i< data.length;i++){
                vagasarray.push(data[i].vagasP,data[i].vagasR);
               
           }
           
           grafico(vagasarray);
        }
    });
})
function grafico(vagas){

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Vagas Preenchidas', 'Vagas Restantes'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['rgb(85, 193, 233)', 'rgb(220, 69, 136)'],
            borderColor: ['rgb(85, 193, 233)', 'rgb(220, 69, 136)'],
            data: vagas
        }],

    },

    // Configuration options go here
    options: {}
});
    }

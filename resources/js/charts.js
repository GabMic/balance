require('chart.js/dist/Chart.bundle')

let ctx = document.getElementById('myChart');
window.myChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: balance.paidThisYear,
            data: balance.amounts,
            fill: false,
            backgroundColor: [
                'rgb(255,164,0)',
                'rgb(10,182,255)',
                'rgb(255,0,17)',
                'rgb(221,0,255)',
                'rgb(144,132,255)',
                'rgb(25,255,164)',
                'rgb(229,255,0)',
                'rgb(153,255,138)',
                'rgb(208,155,105)',
                'rgb(78,146,73)',
                'rgb(255,82,0)',
                'rgb(77,113,154)',
            ],
            borderColor: 'rgb(0,0,0)',
            borderWidth: 3
        }],
        labels: balance.monthsArray
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: `${balance.nameOfChart}`,
            fontSize: 15
        }
    }
});

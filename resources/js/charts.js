require('chart.js/dist/Chart.bundle')

let ctx = document.getElementById('myChart');
window.myChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: balance.paidThisYear,
            data: balance.amounts,
            fill: false,
            backgroundColor: 'rgb(255,106,0)',
            borderColor: 'rgb(0,113,255)',
            borderWidth: 1
        }],
        labels: balance.monthsArray
    },
    options: {
        title: {
            display: true,
            text: `${balance.nameOfChart}`,
            fontSize: 20
        },
        tooltips: {
            mode: 'nearest'
        }
    }
});

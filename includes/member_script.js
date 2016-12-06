// Reference: http://www.chartjs.org/docs/

var data = {
    datasets: [
        {
            label: 'First Dataset',
            data: [
                {
                    x: 20,
                    y: 30,
                    r: 15
                },
                {
                    x: 40,
                    y: 10,
                    r: 10
                }
            ],
            backgroundColor:"#FF6384",
            hoverBackgroundColor: "#FF6384",
        }]
};
var ctx = document.getElementById("myChart");
var myBubbleChart = new Chart(ctx,{
    type: 'bubble',
    data: data,
    options: options
});

function updateBarChartSection(data) {
    var ctx = document.getElementById('barChart').getContext('2d');
    var labels = ['Soil Moisture', 'Humidity', 'Temperature'];
    var values = [
        (data.soil_moisture / 1000) * 100,
        data.humidity,
        data.temperature 
    ];

    // Check if the chart is already created
    if (!window.barChartSection) {
        // Create a new chart
        window.barChartSection = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Value',
                        backgroundColor: ['#4d4bf9', '#00bcd4', '#ff5722'],
                        data: values,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black', // Set y-axis ticks font color to white
                            font: {
                                weight: 'bold' // Make y-axis ticks font bold
                            }
                        },
                        title: {
                            display: true,
                            text: 'Values',
                            color: 'black', // Set y-axis title font color to white
                            font: {
                                weight: 'bold' // Make y-axis title font bold
                            }
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black', // Set x-axis ticks font color to white
                            font: {
                                weight: 'bold' // Make x-axis ticks font bold
                            }
                        },
                        title: {
                            display: true,
                            text: 'Categories',
                            color: 'black', // Set x-axis title font color to white
                            font: {
                                weight: 'bold' // Make x-axis title font bold
                            }
                        }
                    },
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        color: 'black', // Set data label font color to black
                        anchor: 'end',
                        align: 'end',
                        offset: 4, // Adjust the distance from the bar
                        font: {
                            weight: 'bold' // Make data label font bold
                        },
                        formatter: function(value, context) {
                            return value + '%'; // Format the data label as needed
                        }
                    }
                },
                tooltips: {
                    titleColor: 'black', // Set tooltip title font color to white
                    bodyColor: 'black', // Set tooltip body font color to white
                }
            },
        });
    } else {
        // Update the existing chart
        window.barChartSection.data.labels = labels;
        window.barChartSection.data.datasets[0].data = values;
        window.barChartSection.update();
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Farming - Analysis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <main>
            <h3 class="text-center mb-4">Soil Moisture Analysis</h3>

            <div class="row">
                <div class="col-md-6">
                    <canvas id="soilMoistureChart"></canvas>
                </div>
                <div class="col-md-6" id="rawDataContainer"></div> <!-- Added container for raw data -->
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-x5eEaOELqN6VO5gPqsOKbN5eP+5tLlQUL5lV8OY7gvmecN/pqD2FNb2+c2J2J9/D" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "fetch.php", // Assuming you have a PHP script to fetch data similar to the previous example
                method: "GET",
                dataType: "json",
                success: function (response) {
                    var data = response.data;

                    if (data && data.length > 0) {
                        var labels = [];
                        var soilMoistureValues = [];

                        data.forEach(function (entry) {
                            labels.push(entry.created_at);
                            soilMoistureValues.push((entry.soil_moisture / 1000) * 100);
                        });

                        var ctx = document.getElementById('soilMoistureChart').getContext('2d');
                        var soilMoistureChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Soil Moisture Percentage',
                                    data: soilMoistureValues,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        type: 'time',
                                        time: {
                                            unit: 'day',
                                            displayFormats: {
                                                day: 'YYYY-MM-DD'
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Date'
                                        }
                                    },
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Soil Moisture Percentage (%)'
                                        }
                                    }
                                }
                            }
                        });

                        // Display the raw data
                        var rawDataHtml = '<h4>Raw Data:</h4><ul>';
                        data.forEach(function (entry) {
                            rawDataHtml += '<li>ID: ' + entry.id + ', Soil Moisture: ' + entry.soil_moisture + ', Humidity: ' + entry.humidity + ', Temperature: ' + entry.temperature + ', Created At: ' + entry.created_at + '</li>';
                        });
                        rawDataHtml += '</ul>';
                        $('#rawDataContainer').html(rawDataHtml);
                    } else {
                        console.error("No data available for analysis.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        });
    </script>
</body>
</html>

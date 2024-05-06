<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "indoorfarming"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Table</title>
    <script src="https://kit.fontawesome.com/5e3242cc7f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="table.css">
    
    
</head>
<body>
<div class="page">
        
<div id="sidebar" >Indoor Farming <i class="fa-brands fa-pagelines"></i><span class="title-brand"></span>
            <ul>
                <li><a href="./index.html" style="white-space: nowrap;"><i class="fa-solid fa-gauge"></i> Dashboard</a> <span></span></li>
                <li><a href="./table.php"><i class="fa-solid fa-table"></i> Table</a> <span> </span></li>
                <li><a href="./about.php"><i class="fa-solid fa-person-circle-question"></i> About</a> <span> </span></li>
                
                
            </ul>
            <img class="plant-sidebar" src="img/plant-sidebar.png" alt="" width="200px">
        </div>
        <div class="container mt-5" >
        <main>
            <h3 class="text-center mb-4 fw-bold">Hourly Data Averages</h3>

            <form method="get" class="mb-4">
                <div class="row g-4">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-warning">Get Data</button>
                    </div>
                </div>
            </form>
            <?php
    // Display selected start and end dates in a more readable format
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;    
    
    if ($start_date !== null && $end_date !== null) {
        $start_date_formatted = DateTime::createFromFormat('Y-m-d', $start_date)->format('M d, Y');
        $end_date_formatted = DateTime::createFromFormat('Y-m-d', $end_date)->format('M d, Y');
    
        echo "<h4>Displaying data from {$start_date_formatted} to {$end_date_formatted}</h4>";
    } else {
        echo "<h4>No date range selected</h4>";
    }
    
    ?>
           <div style="max-height: 360px; overflow-y: auto;">
           <table class="table table-success table-striped table-responsive{-sm} table table-bordered">
                <thead class="thead bg-warning" id='sticky-header' >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Soil Moisture</th>
                        <th scope="col">Humidity</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Created</th>
                    </tr>
                </thead>
                <tbody id="dataContainer" style="max-height: 400px; overflow-y: auto;">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "indoorfarming";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : "2023-01-01";
                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : "2023-12-31";
                        
                        $sql = "SELECT 
                                    ROW_NUMBER() OVER (ORDER BY created_at ASC) as id,
                                    DATE_FORMAT(created_at, '%Y-%M-%d %H:00:00') as formatted_date,
                                    ROUND(AVG(soil_moisture)) as avg_soil_moisture,
                                    ROUND(AVG(humidity)) as avg_humidity,
                                    ROUND(AVG(temperature)) as avg_temperature
                                FROM onlinemonitoring
                                WHERE created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'
                                GROUP BY formatted_date
                                ORDER BY created_at ASC";
                        
                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $formattedDateTime = $row['formatted_date'];
                                    $soilMoisturePercentage = ($row['avg_soil_moisture'] / 1000) * 100;
                        
                                    echo "<tr>
                                            <td>{$id}</td>
                                            
                                            <td>{$soilMoisturePercentage}%</td>
                                            <td>{$row['avg_humidity']}%</td>
                                            <td>{$row['avg_temperature']}°C</td>
                                            <td>{$formattedDateTime}</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records found</td></tr>";
                            }
                            $result->close();
                        } else {
                            echo "<tr><td colspan='5'>Error fetching data</td></tr>";
                        }
                        
                        $conn->close();
                        ?>
                    
                </tbody>
            </table>
        </div>
            
        </main>
        <footer></footer>

        <!-- The rest of your HTML content... -->

    </div>

    <!-- Your existing JavaScript and other scripts here... -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-x5eEaOELqN6VO5gPqsOKbN5eP+5tLlQUL5lV8OY7gvmecN/pqD2FNb2+c2J2J9/D" crossorigin="anonymous"></script>
</body>
</body>
</html>

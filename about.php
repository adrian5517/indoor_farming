<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5e3242cc7f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="about.css">
    
    
    
    
    <title>FAQ </title>
</head>
<body>


        <div class="page">
        
        <div id="sidebar" style="color: #333; font-size:30px;">Indoor Farming <i class="fa-brands fa-pagelines"></i><span class="title-brand"></span>
            <ul>
                <li><a href="./index.html" style="white-space: nowrap;"><i class="fa-solid fa-gauge"></i> Dashboard</a> <span></span></li>
                <li><a href="./table.php"><i class="fa-solid fa-table"></i> Table</a> <span> </span></li>
                <li><a href="./about.php"><i class="fa-solid fa-person-circle-question"></i> About</a> <span> </span></li>
                
                
            </ul>
            <img class="plant-sidebar" src="img/plant-sidebar.png" alt="" width="200px">
        </div>

        <main>
        <div class="container" id='container'>
    <div class="title-faq" id="faq" ><h2>Frequently Asked Question <i class="fa-regular fa-circle-question"></i></h2></div>
    
</div>
<div class="qna-container" id='qna-container'>

<div class="faq-question" onclick="toggleAnswer('answer1')"><i class="fa-solid fa-plus"></i> What is the purpose of real-time data detection?</div>
    <div id="answer1" class="faq-answer">The purpose is to provide users with instant access to crucial environmental data related to soil conditions.</div>

    <div class="faq-question" onclick="toggleAnswer('answer2')"><i class="fa-solid fa-plus"></i> How does the real-time data detection system work?</div>
    <div id="answer2" class="faq-answer">Arduino-based sensors collect data on soil moisture, humidity, and temperature. This data is then transmitted to a database in real-time.</div>

    <div class="faq-question" onclick="toggleAnswer('answer3')"><i class="fa-solid fa-plus"></i> What Arduino components are required for real-time data detection?</div>
    <div id="answer3" class="faq-answer">You will need Arduino boards, sensors for soil moisture, humidity, and temperature, and a Wi-Fi module or GSM module for data transmission to the database.</div>

    <div class="faq-question" onclick="toggleAnswer('answer4')"><i class="fa-solid fa-plus"></i> How often is the data updated on the website?</div>
    <div id="answer4" class="faq-answer">The data is updated in real-time, ensuring that users see the most recent information on soil moisture, humidity, and temperature when they visit the website.</div>

    <div class="faq-question" onclick="toggleAnswer('answer5')"><i class="fa-solid fa-plus"></i> Can I customize the appearance of the real-time data on my website?</div>
    <div id="answer5" class="faq-answer"><i class="fa-solid fa-plus"></i>Yes, you can customize the appearance. The website includes a circular progress bar and a chart graph for visual representation. You can modify the design and layout to suit your preferences.</div>

    <div class="faq-question" onclick="toggleAnswer('answer6')"><i class="fa-solid fa-plus"></i> What database is used for storing the sensor data?</div>
    <div id="answer6" class="faq-answer">The choice of the database depends on your preferences and requirements. Common options include MySQL, MongoDB, or other suitable database systems that support real-time data storage and retrieval.</div>

    <div class="faq-question" onclick="toggleAnswer('answer7')"><i class="fa-solid fa-plus"></i> How do I interpret the circular progress bar and chart graph on the website?</div>
    <div id="answer7" class="faq-answer">The circular progress bar visually represents the current status of soil moisture, while the chart graph displays historical trends. You can interpret these visuals to understand the changing conditions of soil moisture, humidity, and temperature over time.</div>

    <div class="faq-question" onclick="toggleAnswer('answer8')"><i class="fa-solid fa-plus"></i> Can I access historical data on the website?</div>
    <div id="answer8" class="faq-answer">Yes, the chart graph displays historical data, allowing users to analyze trends and patterns in soil moisture, humidity, and temperature over a specified period.</div>

    <div class="faq-question" onclick="toggleAnswer('answer9')"><i class="fa-solid fa-plus"></i> Is it possible to receive alerts or notifications based on specific data thresholds?</div>
    <div id="answer9" class="faq-answer">Depending on the implementation, you can set up alert systems to notify you when certain thresholds for soil moisture, humidity, or temperature are reached. This can be achieved through email notifications or other communication channels.</div>

    <div class="faq-question" onclick="toggleAnswer('answer10')"><i class="fa-solid fa-plus"></i> How do I ensure the security of the data transmitted and stored?</div>
    <div id="answer10" class="faq-answer">Implement secure data transmission protocols such as HTTPS, and ensure that your database is protected with appropriate security measures. Regularly update passwords and credentials to maintain the integrity of your system.</div>

</div>
        </main>

        </div>
        <footer></footer>
       

    <script>
        function toggleAnswer(answerId) {
            var answer = document.getElementById(answerId);
            answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
        }
        
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Događaji</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .banner img {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #343a40;
        }

        h3 {
            color: #6c757d;
        }

        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #dee2e6;
        }

        .text-center {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
     
        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: bottom;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 767.98px) {
            .text-center {
                width: 100%;
            }
        }

        @media (min-width: 768px) {
            .text-center {
                width: 45%;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Početna</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="prijava.php">Prijava</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2>Dobro došli </h2>
        <h3>Jeste li spremni za uzbudljivu avanturu punu znanja, smijeha i druženja? Naša web stranica omogućuje vam jednostavno i brzo rezerviranje mjesta za nadolazeće pub kvizove u gradu.</h3>
    </div>

    <div class="banner"> 
        <img style="height:450px; width:100%" src="slike/banner.jpg" alt="">
    </div>

    <div class="text-center">
        <h3>U tablici ispod nalaze se nadolazeća događanja. Skupi ekipu i okušajte se u jednom od naših mnogobrojnih kvizova!</h3>
    </div>

    <h2>Događaji</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naziv događaja</th>
                <th>Lokacija</th>
                <th>Datum</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $xml = simplexml_load_file('dogadaji.xml');
            foreach ($xml->dogadaj as $dogadjaj) {
                echo '<tr>';
                echo '<td>' . $dogadjaj->naslov . '</td>';
                echo '<td>' . $dogadjaj->lokacija . '</td>';
                echo '<td>' . $dogadjaj->datum . '</td>';
                echo '</tr>';
            }
            ?>  
        </tbody>
    </table>

</div>
<footer>
    <p>&copy; 2024 Andrej Žalac. Sva prava pridržana.</p>
    <p>
        <a href="index.php">Početna</a> | 
        <a href="prijava.php">Prijava</a> 
      
    </p>
</footer>

</body>
</html>

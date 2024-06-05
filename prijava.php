<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Molimo unesite korisničko ime i lozinku.";
    } else {
        provjera($username, $password);
    }
}

function provjera($username, $password)
{
    $xml = simplexml_load_file("korisnici.xml");

    $userFound = false;
    foreach ($xml->korisnik as $usr) {
        $usrn = $usr->username;
        $usrp = $usr->password;
        $usrime = $usr->ime;
        $usrprezime = $usr->prezime;
        if ($usrn == $username && $usrp == $password) {
            echo "Uspješna prijava!<br>";
            echo "Dobrodošli, $usrime $usrprezime!<br>";
            echo "Vaša rezervacija: {$usr->rezervacija}";
            $userFound = true;
            break;
        } elseif ($usrn == $username) {
            echo "Netočna lozinka.";
            $userFound = true;
            break;
        }
    }

    if (!$userFound) {
        echo "Korisnik ne postoji.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
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

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .forma {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            color: #343a40;
        }

        .btn-primary {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-primary:hover {
            background-color: #495057;
            border-color: #495057;
        }

        .form-label {
            color: #495057;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 767.98px) {
            .container {
                padding: 10px;
            }

            .forma {
                padding: 15px;
            }
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
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
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Početna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="prijava.php">Prijava</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="forma">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5 mb-3 text-center">Prijava</h2>
                <form action="prijava.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Korisničko ime:</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Lozinka:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Prijavi se</button>
                </form>
                <!-- Ispis poruke nakon prijave -->
                <div class="mt-3 text-center">
                    <?php
                    if(isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Failure</title>
    <link rel="stylesheet" href="../../public/css/cursor.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff0000;
            /*Rouge pour indiquer une erreur */
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin-bottom: 15px;
        }

        a {
            display: inline-block;
            background-color: #ff0000;
            /* Rouge assorti à l'en-tête */
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #cc0000;
            /* A darker shade of red on hover */
        }
    </style>
</head>

<body>
    <header>
        <h1>Order Failure</h1>
    </header>

    <main>
        <p>Oops! Quelque chose s'est mal passé avec votre commande. Veuillez réessayer plus tard.</p>
        <p>Si le problème persiste, contactez notre service client pour obtenir de l'aide.</p>
        <a href="../../index.php">Return to Home</a>
    </main>
</body>

</html>
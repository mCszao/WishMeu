<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="shortcut icon" href="https://icons.iconarchive.com/icons/ionic/ionicons/128/list-circle-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            display: flex;
            align-items: center;
            flex-direction: column;
            background-color: #D6D6D6;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        a {
            text-decoration: none;
            font-weight: bold;
            transition: all 1s ease-out;
            
        }

        a:hover {
            color: #57737A;
            transform: scale(1.05);
        }
        header{
            
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        h1 {
            margin-left: 1rem;
            font-size: 42px;
        }
    </style>
</head>
<body>

<?php $render('menu'); ?>
    

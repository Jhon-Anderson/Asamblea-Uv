<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/banner.css">
    <title>Panel de Usuario</title>  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;   
            margin-right: 100px;
            margin-left: 100px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {    
            border: ridge;
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            margin-bottom: 30px;
            width: 94%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }

        .form-group select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
            background-color: #fff;
            font-size: 16px;
            cursor: pointer;
            appearance: none; 
            -webkit-appearance: none; 
            -moz-appearance: none; 
            position: relative;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container ul {
            list-style-type: none;
            padding: 0;
            text-align: justify;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .container ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .container ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            background-color: #f2f2f2;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .container ul li a:hover {
            background-color: #ccc;
        }

        .form-group select::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid #333; 
            pointer-events: none; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Panel de Usuario</h1>
        <form action="buscar.php" method="post" class="form-group">
            <div class="form-group">
                <label for="search">Buscar:</label>
                <input type="text" id="search" name="search">
            </div>
            <div class="form-group">
                <label for="filter">Filtrar por:</label>
                <select id="filter" name="filter">
                    <option value="propuesta">Por Propuesta</option>
                    <option value="asamblea">Por Asamblea</option>
                    <option value="tema">Por Tema</option>
                    <option value="usuario">Por Usuario</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>
</body>
</html>
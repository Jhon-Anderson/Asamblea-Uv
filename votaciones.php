<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/banner.css">
    <title>Panel de Votaciones</title>

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

        #separador{
            font-size: 50px;
            font-weight: bolder;
            border-bottom: solid;
            color: royalblue;
        }  

    </style>    
</head>
<body>

    <div class="container">
        <?php include 'encabezado.php'; ?>
        <h2>Menú</h2>
        <ul>
            <li><a href="actualizar_datos.php?id=<?php echo $id; ?>">Actualizar datos</a></li>
            <li><a href="votaciones.php?id=<?php echo $id; ?>">Votaciones</a></li>
            <li><a href="buscar_propuestas.php?id=<?php echo $id; ?>">Buscar Propuestas</a></li>

        </ul>
    </div>

    <div class="container">        
        <?php include 'asamblea_actual.php'; ?>
    </div>    

    <div class="container">
        <h2>Propuestas con mas votos de la asamblea actual</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Descripción</th>
                <th>Votos</th>
            </tr>
                <?php include 'propuestas_mas_votos.php'; ?>
        </table>
        </form>
    </div>

    <div class="container">
        <h2>Propuestas de la asamblea actual</h2>
        <form action="votar.php?id=<?php echo $id; ?>" method="post" class="form-group">
                <?php include 'propuestas_asamblea_actual.php'; ?>
        </form>
    </div>  

    <div class="container">
        <h2>Mis Votaciones</h2>
        <form action="eliminar_voto.php?id=<?php echo $id; ?>" method="post"class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>IdPropuesta</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
                <?php include 'mis_votaciones.php'; ?>
        </table>
        </form>
    </div>

    <br><br><br><br>
    <div id="separador" class="encabezado">RESULTADOS DE PROPUESTAS DE ASAMBLEAS FINALIZADAS</div>

<div class="container">
    <h2>Asambleas Pasadas</h2>
    <form class="form-group">
        <table>
            <tr>
                <th>Nombre Asamblea</th>
                <th>Tema</th>
                <th>Propuesta con más votos</th>
                <th>Votos</th>
            </tr>
            <?php include 'visualizacion_asambleas_pasadas.php'; ?>
        </table>
    </form>
</div>  
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styles/banner.css">    
    <title>Panel de Administrador</title>    

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

        form {
            height: 100%;            
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            margin: 0 auto;
        }

        label {
            margin-top: 10px;    
            margin-bottom: 8px;
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        #table-asamblea {
            height: 100%;
        }   

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            margin-bottom: 20px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 30px;
            width: calc(100% - 25px);
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
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

        .container {
            border: ridge;
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }


        #sesion {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 0px;  
        }

        .form-container {
            margin-bottom: 30px;    
            width: 100%;    
            display: flex;
            margin-top: 30px;
        }

        .form-container form {
            margin-bottom: 30px;  
            width: 100%; 
        }   

        .form-vert {
            height: 100%;    
            width: 100%;    
            display: flex;
            flex-direction: column;
        }               

        #form-reg{
            height: initial;
            margin-right: 50px;
        }

        #button-update{
            margin-top: 30px;
            display: flex;
        }

        #btn-1{
            margin-right: 10px;
        }

        #btn-2{
            margin-left: 10px;
        }        



    </style>        
</head>

<body>

    <div class="container">
        <h2 id='sesion'>PANEL DE ADMINISTRADOR</h2>
        <?php include 'encabezado.php'; ?>
    </div>

    <div class="form-container">
        <div class="form-vert">
            <form action="registrar_asambleas.php" method="post" class="form-group">
                <h1>Registro de Asambleas</h1>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>

                <input type="submit" value="Registrar Asamblea">
            </form>

            <form action="actualizar_asambleas_admin.php" method="post" class="form-group">
                <h1>Actualizar estado de asamblea</h1>

                <label for="idasamblea">ID Asamblea:</label>
                <input type="text" id="idasamblea" name="idasamblea" required>

                <div id="button-update">
                    <input id="btn-1" type="submit" name="accion" value="Activar">
                    <input id="btn-2" type="submit" name="accion" value="Cerrar">
                </div>
            </form>

            <form action="eliminar_asambleas.php" method="post" class="form-group">
                <h1>Eliminacion de Asambleas</h1>

                <label for="idasamblea">ID Asamblea:</label>
                <input type="text" id="idasamblea" name="idasamblea" required>

                <input type="submit" value="Borrar Asamblea">
            </form>

        </div>     
    </div>        


    <div class="form-container" id="table-asamblea">
        <form class="form-group">
        <h2>Asambleas Registradas</h2>
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
                <?php include 'visualizacion_asambleas_admin.php'; ?>
        </form>
    </div>    

</body>
</html>
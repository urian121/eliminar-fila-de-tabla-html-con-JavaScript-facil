<!doctype html>
<html lang="eS">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Eliminar fila de tabla HTML - PHP  con JavaScript Facil</title>
    <style>
      body{
        background-color: #f4f4f4;
      }
      table{
        background-color: #fff;
        padding: 5px;
      }
      img{
        max-width: 50px;
      }
    </style>
  </head>
  <body> 
    
<div class="container mb-5">
    <h1 class="text-center mt-5 mb-5">
        Eliminar fila de tabla HTML con JavaScript
    </h1>
    <?php
        /**Conexion a la BD */
        $usuario  = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "ejemplo_youtube";
        $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
        mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
        $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Lenguaje</th>
            <th scope="col">Logo</th>
          </tr>
        </thead>
        <tbody>
        <?php
        /**SQL para consultar todos los registros. */
        $sqlLenguajes = ("SELECT * FROM lenguajes ORDER BY id DESC");
        $queryResultb = mysqli_query($con, $sqlLenguajes);
        $total   = mysqli_num_rows($queryResultb);
        $i = 1;
        while ($dataRow = mysqli_fetch_array($queryResultb)) {
            $idRegistro = $dataRow['id']; ?>
                <tr id="Reg<?php echo $dataRow['id']; ?>" onclick="eliminarLista('<?php echo $idRegistro; ?>','<?php echo $dataRow['name_lenguaje']; ?>');">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $dataRow['name_lenguaje']; ?></td>
                    <td><img src="<?php echo $dataRow['logo']; ?>" alt="logo"></td>
                </tr>
        <?php } ?>
        </tbody>
      </table>

    <script>
    function eliminarLista(idLista,name){
        console.log('Id Registro: ' + idLista + ' Lenguaje: ' + name);
        let tr = document.querySelector('#Reg'+idLista);
        tr.remove();
        console.log(`Registro id:${idLista} eliminado 😲`);
    }
    </script>
  </body>
</html>

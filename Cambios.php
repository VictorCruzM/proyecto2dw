
    <?php
    include ("conexion.php");

    //Obtiene los datos del formulario
    $ID = $_GET['id']; 
    
    if (!$enlace = mysqli_connect($host,$user,$pw)) {
     echo 'No pudo conectarse a mysql';
     exit;
    }

    if (!mysqli_select_db($enlace,$db)) {
        echo 'No pudo seleccionar la base de datos';
        exit;
    }

    $sql       = 'SELECT ID,Nombre, Carnet, Email FROM p2_integrantes where ID =' . $ID;
    $resultado = mysqli_query($enlace,$sql);

    if (!$resultado) {
        echo "Error de BD, no se pudo consultar la base de datos\n";
        //echo "Error MySQL: " . mysql_error();
        exit;
    }
    
//mysqli_free_result($resultado);
$fila = mysqli_fetch_assoc($resultado)
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <center>
        <form action="Actualizar.php?id=<?php echo  $fila['ID'] ?>" method="post" name="FrmIngreso" >
            <br><br>
            Actualización de Datos
            <br><br><br>
            Nombre   <input type="Text" id="Nombre" name="Nombre" value ="<?php echo $fila['Nombre']; ?>" /> 
            <br><br><br>
            Carnet   <input type="Text" id="Carnet" name="Carnet" value ="<?php echo $fila['Carnet']; ?>" /> 
            <br><br><br>
            Correo   <input type="Text" id="Email" name="Email" value ="<?php echo $fila['Email']; ?>" /> 
            <br><br><br>
            <input type="image" id="Grabar" name="Grabar" text="Grabar" value="Grabar" src="images/Editar.png" onclick="javascript:document.form.submit();" />
        </form>
        </center>
    </body>
</html>

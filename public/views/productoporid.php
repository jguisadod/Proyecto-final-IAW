<div class="container">
    <h1> Informacion del producto </h1>

    <table class="table">
        <tr><th>Nombre</th><th>Descripcion</th><th>Precio</th></tr>
        <?php
            $enlaceid='<a href="index.php?controller=ProductController&action=addCarrito&id_product='.$data['Id_prod'].'" style="color:blue;">Añadir al carrito</a>';
            echo "<tr>
            <td hidden>".$data['Id_prod']."</td>
            <td>".$data['Nombre_prod']."</td>
            <td>".$data['Descripcion']." </td>
            <td>".$data['Precio']." RP </td>
            <td>".$enlaceid."</td>
            </tr>"; 
        ?>
    </table>
</div>

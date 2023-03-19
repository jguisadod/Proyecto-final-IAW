<?php
if(!isset($_SESSION['carrito'])){
  $_SESSION['carrito']=array();
}
/** 
 *  Controlador de Productos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a productos de la tienda.
 */
include ("views/View.php");
class ProductController {

    /**
     * Método que obtiene todos los productos de la BBDD y los muestra a través de la vista showProducts.
     */
    public function getAllProducts (){
        require_once ("models/productos.php");
        $pDAO=new ProductoDAO();
        $products=$pDAO->getAllProducts();
        $pDAO=null;
        View::show("showProducts", $products);
    }

    /**
     * Método que añade un producto a la BBDD recogiendo los datos que llegan a través de $_POST. Previo
     * a la inserción realiza la validación de los datos.
     */
    public function aniadirProduct (){
        $errores=array();
        
        /* Si se ha pulsado en el botón insertar se validan los datos y en caso de error, éstos se almacenan
        en el array $errores*/
        if (isset($_POST['insertar'])){
            if (!isset($_POST['nombre']) || strlen($_POST['nombre'])==0) 
                $errores['nombre']="El nombre no puede estar vacío";
            if (!isset($_POST['descripcion']) || strlen($_POST['descripcion'])<10) 
                $errores['descripcion']="La descripción debe tener al menos 10 caracteres";    
            if (!isset($_POST['precio']) || strlen($_POST['precio'])==0) 
                $errores['precio']="El precio no puede estar vacío";
            /**
             * Si el array está vacío es que no hay errores. Si instancia un ProductoDAO y se trata de insertar
             * el nuevo producto en la BBDD. 
             * Si se produce la inserción, se llama al método que muestra todos los productos de la tienda.
             * Si hay error, se muestra la vista de inserción pasándole el array de errores.
             */
                if (empty($errores)){
                include ("models/productos.php");
                $pDAO=new ProductoDAO();
                if ($pDAO->insertProduct($_POST['nombre'], $_POST['descripcion'], $_POST['precio']))
                    $this->getAllProducts(); 
                     
                else {
                    $errores['general']="Hubo algún problema insertando el nuevo producto";
                    View::show("addProduct", $errores);  
                }     
            }
            else  View::show("addProduct", $errores);               
        }
        // Si no se pulsó el botón insertar, se muestra la vista con el formulario.
        else {
            View::show("addProduct", null);
        }
    }

    /*
    Metodo mediante el cual se obtiene un producto de la base de datos buscandolo por su Identificador que obtendremos mediante
    el metodo GET.
    */
    public function getProductById(){
        include_once 'models/productos.php';
        if (isset($_GET['id_product'])){
            $pDAO=new ProductoDAO();
            $producto=$pDAO-> getProductById($_GET['id_product']);
            View::show("productoporid",$producto);
        }
    }

    /*
    Metodo con el que tomando el valor del Identificador, lo agregaremos al array $_SESSION['carrito'].
    */
    public function addCarrito(){
        if (isset($_GET['id_product'])){
            array_push($_SESSION['carrito'],$_GET['id_product']);  
            include_once 'models/productos.php';    
            $pDAO=new ProductoDAO();
            $products=$pDAO->getAllProducts();
            $pDAO=null;
            View::show("showProducts", $products);
        }
    }

    /*
    Metodo que recorre nuestro array $_SESSION['carrito'] y va guardando las IDs de los productos del carrito en un nuevo array.
    */
    public function verCarrito(){
        include_once 'models/productos.php';
        $pDAO=new ProductoDAO();
        $arrayCarrito= array();
        foreach($_SESSION['carrito'] as $posicion => $id){
            $producto=$pDAO-> getProductById($id);
            array_push($arrayCarrito,$producto);
        }
        View::show("mostrarcarrito", $arrayCarrito);
    }

    /*
    Metodo con el que se borra un producto de la base de datos tomando el valor del Identificador.
    */
    public function borrarproducto(){
        include_once 'models/productos.php';
        if (isset($_GET['id_product'])){
            $pDAO=new ProductoDAO();
            $products=$pDAO->borrarprod($_GET['id_product']);
            $products=$pDAO->getAllProducts();
            $pDAO=null;
            View::show("showProducts", $products);
        }
    }
}
?>
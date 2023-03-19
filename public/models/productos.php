<?php
include_once ('db/db.php');
/**
 * Clase de acceso a datos para la tabla productos. Implementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class ProductoDAO {

    //Atributo con la conexión a la BBDD.
    public $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con=Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllProducts(){
        $stmt= $this->db_con->prepare("Select * from Productos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $productos= array ();

        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getProductById ($id){
        $stmt= $this->db_con->prepare("Select * from Productos where Id_prod=$id");
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();        
    }



    //Instar un productos en la base de datos.
    /**
     * Parámetros: 
     *  $nombre, nombre del producto.
     *  $descrip, descripción del producto.
     *  $precio, precio del producto.
     *  $proc, procedencia del producto.
     * 
     *  Retorna true si la inserción fue exitosa y false en caso contrario.
     */
    public function insertProduct($nombre, $descrip, $precio){
        $stmt= $this->db_con->prepare ("Insert into Productos (Nombre_prod, Descripcion, Precio) values (:nombre, :descripcion, :precio)");      
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descrip);
        $stmt->bindParam(':precio', $precio);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    //Método que borra un producto dado su id.
    public function borrarprod($id){
        $stmt= $this->db_con->prepare ("Delete from Productos where Id_prod=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
?>
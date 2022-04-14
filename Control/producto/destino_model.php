<?php
class ProductoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            //$this->pdo = new PDO('mysql:host=localhost;dbname=u205223607_ttt', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#');
            $this->pdo = new PDO('mysql:host=localhost;dbname=u205223607_ttt', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM productos order by nombre_pro");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Producto();

                $des->__SET('id_pro', $r->id_pro);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('categoria_pro', $r->categoria_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img_pro', $r->img_pro);
                $des->__SET('precio_pro', $r->precio_pro);
                $des->__SET('garantia_pro', $r->garantia_pro);
                $des->__SET('descripcion_pro', $r->descripcion_pro);
                $des->__SET('estatus_pro', $r->estatus_pro);
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM productos WHERE id_pro = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Producto();

                $des->__SET('id_pro', $r->id_pro);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('categoria_pro', $r->categoria_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img_pro', $r->img_pro);
                $des->__SET('precio_pro', $r->precio_pro);
                $des->__SET('garantia_pro', $r->garantia_pro);
                $des->__SET('descripcion_pro', $r->descripcion_pro);
                $des->__SET('estatus_pro', $r->estatus_pro);

            return $des;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
   

   
    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM productos WHERE id_pro = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Producto $data)
    {
        try 
        {
            $sql = "UPDATE productos SET 
                        nombre_pro          = ?,
                        marca_pro = ?,
                        modelo_pro = ?,
                        categoria_pro        = ?,
                        img_pro        = ?,
                        precio_pro        = ?,
                        garantia_pro        = ?,
                        descripcion_pro        = ?,
                        estatus_pro      = ?
                    WHERE id_pro = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_marca_modelo'), 
                    $data->__GET('marca_pro'),
                    $data->__GET('modelo_pro'),
                    $data->__GET('categoria_pro'), 
                    $data->__GET('img_pro'),
                    $data->__GET('precio_pro'),
                    $data->__GET('garantia_pro'),
                    $data->__GET('descripcion_pro'),
                    $data->__GET('estatus_pro'),
                    $data->__GET('id_pro')

                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Producto $data)
    {
        try 
        {
        $sql = "INSERT INTO productos (nombre_pro,marca_pro,modelo_pro,categoria_pro,condicion_pro,img_pro,precio_pro,garantia_pro,descripcion_pro,estatus_pro) 
                VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
               $data->__GET('nombre_pro'),
                $data->__GET('marca_pro'),
                $data->__GET('modelo_pro'),
                $data->__GET('categoria_pro'), 
                $data->__GET('condicion_pro'), 
                $data->__GET('img_pro'),
                $data->__GET('precio_pro'),
                $data->__GET('garantia_pro'),
                $data->__GET('descripcion_pro'),
                $data->__GET('estatus_pro'),
               
            )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
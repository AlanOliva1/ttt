<?php
class TiendaModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            // $this->pdo = new PDO('mysql:host=localhost;dbname=u205223607_ttt', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#');
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

            $stm = $this->pdo->prepare("SELECT * FROM tiendas order by nombre_tien");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Tienda();

                $des->__SET('id_tien', $r->id_tien);
                $des->__SET('nombre_tien', $r->nombre_tien);
                $des->__SET('direccion_tien', $r->direccion_tien);
                $des->__SET('telefono_tien', $r->telefono_tien);
                $des->__SET('ubicacion_tien', $r->ubicacion_tien);
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
                      ->prepare("SELECT * FROM teindas WHERE id_tien = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Tienda();

                $des->__SET('id_tien', $r->id_tien);
                $des->__SET('nombre_tien', $r->nombre_tien);
                $des->__SET('direccion_tien', $r->direccion_tien);
                $des->__SET('telefono_tien', $r->telefono_tien);
                $des->__SET('ubicacion_tien', $r->ubicacion_tien);
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
                      ->prepare("DELETE FROM tiendas WHERE id_tien = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Tienda $data)
    {
        try 
        {
            $sql = "UPDATE teindas SET 
                        nombre_tien         = ?, 
                        direccion_tien       = ?,
                        telefono_tien       = ?,
                        ubicacion_tien        = ?,
                    WHERE id_tien = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_tien'), 
                    $data->__GET('direccion_tien'), 
                    $data->__GET('telefono_tien'),
                    $data->__GET('ubicacion_tien'),
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Tienda $data)
    {
        try 
        {
        $sql = "INSERT INTO tiendas (nombre_tien,direccion_tien,telefono_tien,ubicacion_tien) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
               $data->__GET('nombre_tien'), 
                $data->__GET('direccion_tien'), 
                $data->__GET('telefono_tien'), 
                $data->__GET('ubicacion_tien'),               
            )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
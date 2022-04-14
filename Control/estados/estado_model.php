<?php
class estadoModel
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

            $stm = $this->pdo->prepare("SELECT * FROM estados order by nombre_edo");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Estado();

                $des->__SET('id_estado', $r->id_estado);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('img_edo', $r->img_edo);
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
                      ->prepare("SELECT * FROM estados WHERE id_estado = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Estado();

                $des->__SET('id_estado', $r->id_estado);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('img_edo', $r->img_edo);

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
                      ->prepare("DELETE FROM estados WHERE id_estado = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Estado $data)
    {
        try 
        {
            $sql = "UPDATE estados SET 
                        nombre_edo          = ?, 
                        img_edo        = ?
                    WHERE id_estado = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_edo'), 
                    $data->__GET('img_edo'),
                    $data->__GET('id_estado')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Estado $data)
    {
        try 
        {
        $sql = "INSERT INTO estados (nombre_edo,img_edo) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('nombre_edo'), 
                    $data->__GET('img_edo')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
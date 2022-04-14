<?php
class TurismoModel
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

            $stm = $this->pdo->prepare("SELECT * FROM tipos_turismos order by nombre_turismo");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();

                $des->__SET('id_turismo', $r->id_turismo);
                $des->__SET('nombre_turismo', $r->nombre_turismo);
                $des->__SET('descripcion_turismo', $r->descripcion_turismo);
                $des->__SET('img_turismo', $r->img_turismo);
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function Listartipo()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tipos_turismos order by nombre_turismo");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();

                $des->__SET('id_turismo', $r->id_turismo);
                $des->__SET('nombre_turismo', $r->nombre_turismo);
                $des->__SET('descripcion_turismo', $r->descripcion_turismo);
                $des->__SET('img_turismo', $r->img_turismo);
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
                      ->prepare("SELECT * FROM tipos_turismos WHERE id_turismo = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Turismo();

               $des->__SET('id_turismo', $r->id_turismo);
                $des->__SET('nombre_turismo', $r->nombre_turismo);
                $des->__SET('descripcion_turismo', $r->descripcion_turismo);
                $des->__SET('img_turismo', $r->img_turismo);

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
                      ->prepare("DELETE FROM tipos_turismos WHERE id_turismo = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Turismo $data)
    {
        try 
        {
            $sql = "UPDATE tipos_turismos SET 
                        nombre_turismo          = ?, 
                        descripcion_turismo = ?, 
                        img_turismo        = ?
                    WHERE id_turismo = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_turismo'), 
                    $data->__GET('descripcion_turismo'),
                    $data->__GET('img_turismo'),
                    $data->__GET('id_turismo')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Turismo $data)
    {
        try 
        {
        $sql = "INSERT INTO tipos_turismos (nombre_turismo,descripcion_turismo,img_turismo) 
                VALUES (?, ?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                 $data->__GET('nombre_turismo'), 
                    $data->__GET('descripcion_turismo'),
                    $data->__GET('img_turismo')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
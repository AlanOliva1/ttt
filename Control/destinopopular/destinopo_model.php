<?php
class DestinoPoModel
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
 public function Listardestinopo()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("
            SELECT *

FROM destinospopulares AS dp

JOIN destinos AS d 
ON d.id_destino = dp.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado 
            
            ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new DestinoPo();

                $des->__SET('id_popular', $r->id_popular);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('img_destinos', $r->img_destinos);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $result[] = $des;
            }

            return $result;
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

            $stm = $this->pdo->prepare("
            SELECT *

FROM destinospopulares AS dp

JOIN destinos AS d 
ON d.id_destino = dp.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado 
            
            ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new DestinoPo();

                $des->__SET('id_popular', $r->id_popular);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('img_destinos', $r->img_destinos);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
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
                      ->prepare("SELECT * FROM destinospopulares WHERE id_popular = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new DestinoPo();

                $des->__SET('id_popular', $r->id_popular);

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
                      ->prepare("DELETE FROM destinospopulares WHERE id_popular = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(DestinoPo $data)
    {
        try 
        {
            $sql = "UPDATE destinospopulares SET 
                        id_destino          = ?
                    WHERE id_popular = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id_destino'),
                    $data->__GET('id_popular')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(DestinoPo $data)
    {
        try 
        {
        $sql = "INSERT INTO destinospopulares (id_destino) 
                VALUES (?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_destino')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
<?php
class DestinoReModel
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

            $stm = $this->pdo->prepare("SELECT *

FROM destinosrecomendados AS dr

JOIN destinos AS d 
ON d.id_destino = dr.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new DestinoRe();

                $des->__SET('id_destinore', $r->id_destinore);
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
                      ->prepare("SELECT * FROM destinosrecomendados WHERE id_destinore = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new DestinoRe();

                $des->__SET('id_destinore', $r->id_destinore);

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
                      ->prepare("DELETE FROM destinosrecomendados WHERE id_destinore = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(DestinoRe $data)
    {
        try 
        {
            $sql = "UPDATE destinosrecomendados SET 
                        id_destino         = ?
                    WHERE id_destinore = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id_destino'),
                    $data->__GET('id_destinore')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(DestinoRe $data)
    {
        try 
        {
        $sql = "INSERT INTO destinosrecomendados (id_destino) 
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
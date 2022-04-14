<?php
class DestacadoModel
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

FROM productosdestacados AS pd

JOIN productos AS p
ON p.id_pro = pd.id_pro ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Destacado();

                $des->__SET('id_destacados', $r->id_destacados);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img1_pro', $r->img1_pro);
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
                      ->prepare("SELECT * FROM productosdestacados WHERE id_destacados = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Destacado();

                $des->__SET('id_destacados', $r->id_destacados);

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
                      ->prepare("DELETE FROM productosdestacados WHERE id_destacados = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Destacado $data)
    {
        try 
        {
            $sql = "UPDATE productosdestacados SET 
                        id_pro        = ?
                    WHERE id_destacados = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id_pro'),
                    $data->__GET('id_destacados')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Destacado $data)
    {
        try 
        {
        $sql = "INSERT INTO productosdestacados (id_pro) 
                VALUES (?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_pro')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
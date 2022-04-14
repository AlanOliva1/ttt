<?php
class TransportetModel
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

            $stm = $this->pdo->prepare("SELECT * FROM tipotransporte order by nombre_t");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Tipot();

                $des->__SET('id_tipot', $r->id_tipot);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_t', $r->img_t);
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
                      ->prepare("SELECT * FROM tipotrasporte WHERE id_tipot = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Tipot();

                $des->__SET('id_tipot', $r->id_tipot);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_t', $r->img_t);

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
                      ->prepare("DELETE FROM tipotransporte WHERE id_tipot = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Tipot $data)
    {
        try 
        {
            $sql = "UPDATE tipotransporte SET 
                        nombre_t         = ?, 
                        img_t      = ?
                    WHERE id_tipot = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_t'), 
                    $data->__GET('img_t'),
                    $data->__GET('id_tipot')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Tipot $data)
    {
        try 
        {
        $sql = "INSERT INTO tipotransporte (nombre_t,img_t) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('nombre_t'), 
                    $data->__GET('img_t')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
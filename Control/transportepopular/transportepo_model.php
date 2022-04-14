<?php
class TransportePoModel
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

FROM trasnportespopulares tp 
JOIN transportes AS t 
ON t.id_transporte = tp.id_transporte
JOIN estados AS e 
ON e.id_estado = t.id_estado 
JOIN tipotransporte AS tt
ON t.id_tipot = tt.id_tipot  
            
            ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new TransportePo();

                $des->__SET('id_tpopular', $r->id_tpopular);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
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
                      ->prepare("SELECT * FROM trasnportespopulares WHERE id_tpopular = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new TransportePo();

                $des->__SET('id_tpopular', $r->id_tpopular);

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
                      ->prepare("DELETE FROM trasnportespopulares WHERE id_tpopular = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(TransportePo $data)
    {
        try 
        {
            $sql = "UPDATE trasnportespopulares SET 
                        id_transporte          = ?
                    WHERE id_tpopular = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id_transporte'),
                    $data->__GET('id_tpopular')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(TransportePo $data)
    {
        try 
        {
        $sql = "INSERT INTO trasnportespopulares (id_tpopular,id_transporte) 
                VALUES (?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_tpopular'),
                $data->__GET('id_transporte')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
<?php
class StockModel
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

FROM stock AS st

JOIN productos AS p 
ON p.id_pro = st.id_pro
JOIN tiendas AS t 
ON t.id_tien = st.id_tien");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Stock();

                $des->__SET('id_pro', $r->id_pro);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('categoria_pro', $r->categoria_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img1_pro', $r->img1_pro);
                $des->__SET('img2_pro', $r->img2_pro);
                $des->__SET('img3_pro', $r->img3_pro);
                $des->__SET('precio_pro', $r->precio_pro);
                $des->__SET('garantia_pro', $r->garantia_pro);
                $des->__SET('descripcion_pro', $r->descripcion_pro);
                $des->__SET('estatus_pro', $r->estatus_pro);
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
                      ->prepare("SELECT * FROM stock WHERE id_tien = $id");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new stock();

                $des->__SET('id_pro', $r->id_pro);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('categoria_pro', $r->categoria_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img1_pro', $r->img1_pro);
                $des->__SET('img2_pro', $r->img2_pro);
                $des->__SET('img3_pro', $r->img3_pro);
                $des->__SET('precio_pro', $r->precio_pro);
                $des->__SET('garantia_pro', $r->garantia_pro);
                $des->__SET('descripcion_pro', $r->descripcion_pro);
                $des->__SET('estatus_pro', $r->estatus_pro);
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
   
    public function AprobadosStock()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM stock where status = 1  order by nombre_pro");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Stock();

                $des->__SET('id_pro', $r->id_pro);
                $des->__SET('nombre_pro', $r->nombre_pro);
                $des->__SET('marca_pro', $r->marca_pro);
                $des->__SET('modelo_pro', $r->modelo_pro);
                $des->__SET('categoria_pro', $r->categoria_pro);
                $des->__SET('condicion_pro', $r->condicion_pro);
                $des->__SET('img1_pro', $r->img1_pro);
                $des->__SET('img2_pro', $r->img2_pro);
                $des->__SET('img3_pro', $r->img3_pro);
                $des->__SET('precio_pro', $r->precio_pro);
                $des->__SET('garantia_pro', $r->garantia_pro);
                $des->__SET('descripcion_pro', $r->descripcion_pro);
                $des->__SET('estatus_pro', $r->estatus_pro);
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

    Public function Aprobar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM destinos where status = 0  order by nom_destinos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Destino();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $des->__SET('referencias', $r->referencias);
                $des->__SET('img_destinos', $r->img_destinos);
                $des->__SET('status', $r->status);
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarStok($nombre)
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_destino, nom_destinos, img_destinos FROM destinos where id_estado = $nombre and status=1 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Stock();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('img_destinos', $r->img_destinos);
               
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Detalle($id)
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM destinos where id_destino = $id");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Destino();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('id_estado', $r->id_estado);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $des->__SET('referencias', $r->referencias);
                $des->__SET('img_destinos', $r->img_destinos);
                $des->__SET('status', $r->status);
               
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

   
    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM destinos WHERE id_destino = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Destino $data)
    {
        try 
        {
            $sql = "UPDATE stock SET 
                        id_tien         = ?,
                        id_pro         = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id_tien'), 
                     $data->__GET('id_pro')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Destino $data)
    {
        try 
        {
        $sql = "INSERT INTO destinos (id_tien,id_pro) 
                VALUES (?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_tien'), 
                     $data->__GET('id_pro')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Estatus(Destino $data)
    {
        try 
        {
            $sql = "UPDATE destinos SET 
                        status = ?
                    WHERE id_destino = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('status'),
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
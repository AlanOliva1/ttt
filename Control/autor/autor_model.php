<?php
class AutorModel
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
            FROM destinos d 
            INNER JOIN estados e ON d.id_estado = e.id_estado");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
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
    
     
    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM destinos WHERE id_destino = $id");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Autor();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
            $des->__SET('id_estado', $r->id_estado);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $des->__SET('referencias', $r->referencias);
                $des->__SET('img_destinos', $r->img_destinos);
                $des->__SET('status', $r->status);

            return $des;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
   
    public function AprobadosDes()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM destinos where status = 1 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

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
    public function listadestino()
    {
        try
        {
            $result = array();           

            $stm = $this->pdo->prepare("SELECT * FROM destinos d JOIN estados AS e ON e.id_estado = d.id_estado AND d.status = 1 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

                
                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $des->__SET('referencias', $r->referencias);
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

    Public function Aprobar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM destinos d JOIN estados AS e ON e.id_estado = d.id_estado AND d.status = 0 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
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
    public function userDestino( $userid)
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT *
            FROM destinos d
            JOIN estados AS e 
            ON e.id_estado = d.id_estado 
            WHERE d.usuario_id = $userid");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

                
                $des->__SET('id_destino', $r->id_destino);
                $des->__SET('nom_destinos', $r->nom_destinos);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('ubicacion_geografica', $r->ubicacion_geografica);
                $des->__SET('referencias', $r->referencias);
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

    public function ListarDes($nombre)
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_destino, nom_destinos, img_destinos FROM destinos where id_estado = $nombre and status=1 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Autor();

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
                $des = new Autor();

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

    public function Actualizar(Autor $data)
    {
        try 
        {
            $sql = "UPDATE destinos SET 
            usuario_id = ?,
                        nom_destinos          = ?,
                        id_estado          = ?, 
                        ubicacion_geografica        = ?,
                        referencias       = ?, 
                        img_destinos        = ?,
                        status        = ?
                    WHERE id_destino = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('usuario_id'), 
                    $data->__GET('nom_destinos'), 
                     $data->__GET('id_estado'), 
                    $data->__GET('ubicacion_geografica'), 
                    $data->__GET('referencias'), 
                    $data->__GET('img_destinos'),
                    $data->__GET('status'),
                    $data->__GET('id_destino')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Autor $data)
    {
        try 
        {
        $sql = "INSERT INTO destinos (usuario_id,nom_destinos,id_estado,ubicacion_geografica,referencias,img_destinos,img1_des,img2_des,img3_des,status) 
                VALUES (?,?,?, ?, ?, ?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('usuario_id'), 
                $data->__GET('nom_destinos'), 
                $data->__GET('id_estado'), 
                    $data->__GET('ubicacion_geografica'), 
                    $data->__GET('referencias'), 
                    $data->__GET('img_destinos'),
                    $data->__GET('img1_des'),
                    $data->__GET('img2_des'),
                    $data->__GET('img3_des'),
                    $data->__GET('status')
                    
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Estatus(Autor $data)
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
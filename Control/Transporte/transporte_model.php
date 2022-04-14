<?php
class transporteModel
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

FROM transportes t 

JOIN estados AS e 
ON e.id_estado = t.id_estado 
JOIN tipotransporte AS tt
ON t.id_tipot = tt.id_tipot  where t.statust !=0");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }



    public function userTrasporte( $userid)
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT *
            FROM transportes t
            JOIN estados AS e 
            ON e.id_estado = t.id_estado 
            JOIN tipotransporte AS tt
            ON t.id_tipot = tt.id_tipot  WHERE t.usuario_id = $userid");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
                $des->__SET('comentario_transporte', $r->comentario_transporte);
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Aprobar( )
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT *
            FROM transportes t
            JOIN estados AS e 
            ON e.id_estado = t.id_estado 
            JOIN tipotransporte AS tt
            ON t.id_tipot = tt.id_tipot  and t.statust = 0 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
                $des->__SET('comentario_transporte', $r->comentario_transporte  );
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListaT( )
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT *
            FROM transportes t
            JOIN estados AS e 
            ON e.id_estado = t.id_estado 
            JOIN tipotransporte AS tt
            ON t.id_tipot = tt.id_tipot  and t.statust = 1 ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('nombre_edo', $r->nombre_edo);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
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
                      ->prepare("SELECT * FROM transportes WHERE id_transporte = ?");
                      
 
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('nom_transporte',$r->nom_transporte);
                //$des->__SET('nombre_t', $r->nombre_t);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('id_estado', $r->id_estado);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
                

            return $des;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Detalle($id)
    {
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM transportes WHERE id_transporte = $id"); 
            $stm->execute();
           
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transporte();

                $des->__SET('id_transporte', $r->id_transporte);
                $des->__SET('id_tipot', $r->id_tipot);
                $des->__SET('img_transporte', $r->img_transporte);
                $des->__SET('link_youtube', $r->link_youtube);
                $des->__SET('descripcion', $r->descripcion);
                $des->__SET('incluye', $r->incluye);
                $des->__SET('no_incluye', $r->no_incluye);
                $des->__SET('id_estado', $r->id_estado);
                $des->__SET('zona_cobertura', $r->zona_cobertura);
                $des->__SET('nom_transporte', $r->nom_transporte);
                $des->__SET('ubicacion_transporte', $r->ubicacion_transporte);
                $des->__SET('contacto_transporte', $r->contacto_transporte);
                $result[] = $des;
            }
            
            return $result;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
   
    public function Estatus(Transporte $data)
    {
        try 
        {
            $sql = "UPDATE transportes SET 
                        statust      = ?
                    WHERE id_transporte = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('statust'),
                    $data->__GET('id_transporte')

                    )
                );
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
                      ->prepare("DELETE FROM transportes WHERE id_transporte = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Transporte $data)
    {
        try 
        {
            $sql = "UPDATE transportes SET 
                       usuario_id = ?,
                        nom_transporte=?,
                        id_tipot=?,
                        img_transporte          = ?, 
                        link_youtube        = ?,
                        descripcion         = ?,
                        incluye        = ?,
                        no_incluye   = ?,
                        id_estado=?,
                        zona_cobertura =?,
                        ubicacion_transporte =?,
                        contacto_transporte =?,
                        statust = ?
                        
                    WHERE id_transporte = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('usuario_id'), 
                    $data->__GET('nom_transporte'),  
                    $data->__GET('id_tipot'),
                    $data->__GET('img_transporte'),
                    $data->__GET('link_youtube'),
                    $data->__GET('descripcion'),
                    $data->__GET('incluye'),
                    $data->__GET('no_incluye'),
                    $data->__GET('id_estado'),
                    $data->__GET('zona_cobertura'),
                    $data->__GET('ubicacion_transporte'),
                    $data->__GET('contacto_transporte'),
                    $data->__GET('statust'),                    
                    $data->__GET('id_transporte')
                   
                    
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Transporte $data)
    {
        try 
        {
        $sql = "INSERT INTO transportes (usuario_id,nom_transporte,id_tipot,img_transporte,link_youtube,descripcion,incluye,no_incluye,id_estado,zona_cobertura,ubicacion_transporte,contacto_transporte,statust) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('usuario_id'),
                $data->__GET('nom_transporte'),
                $data->__GET('id_tipot'),
                    $data->__GET('img_transporte'),
                    $data->__GET('link_youtube'),
                    $data->__GET('descripcion'),
                    $data->__GET('incluye'),
                    $data->__GET('no_incluye'),
                    $data->__GET('id_estado'),
                    $data->__GET('zona_cobertura'),
                    $data->__GET('ubicacion_transporte'),
                    $data->__GET('contacto_transporte'),
                    $data->__GET('statust')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

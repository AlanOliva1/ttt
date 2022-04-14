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

    public function ListarProveedor()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM usuario u JOIN rol_usuario AS r ON r.id_usario = u.id_usario AND r.id_rol = '5 ' ");
            $stm->execute();
           
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();
                 
                $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
                $des->__SET('edad_usuario', $r->edad_usuario);
               
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function ListarTransportista()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM usuario u JOIN rol_usuario AS r ON r.id_usario = u.id_usario AND r.id_rol = '3 ' ");
            $stm->execute();
           
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();
                 
                $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
                $des->__SET('edad_usuario', $r->edad_usuario);
               
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function ListarAutor()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM usuario u JOIN rol_usuario AS r ON r.id_usario = u.id_usario AND r.id_rol = '4 ' ");
            $stm->execute();
           
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();
                 
                $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
                $des->__SET('edad_usuario', $r->edad_usuario);
               
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

            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE id_rol = '2' order by usuario");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Turismo();

                $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
                $des->__SET('contrasena', $r->contrasena);
                $des->__SET('id_rol', $r->id_rol);
                $des->__SET('id_permiso', $r->id_permiso);
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
                      ->prepare("SELECT * FROM usuario WHERE id_usario = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Turismo();

                $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
                $des->__SET('contrasena', $r->contrasena);
                $des->__SET('id_rol', $r->id_rol);
                $des->__SET('id_permiso', $r->id_permiso);

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
                      ->prepare("DELETE FROM usuario WHERE id_usario = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuario $data)
    {
        try 
        {
        $sql = "INSERT INTO usuario (usuario,nombre_usuario,appat_usuario,apmat_usuario,edad_usuario,correo_usuario,contrasena, id_permiso)
                VALUES (?,?,?,?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
               $data->__GET('usuario'),
               $data->__GET('nombre_usuario'), 
                    $data->__GET('appat_usuario'), 
                    $data->__GET('apmat_usuario'),
                    $data->__GET('edad_usuario'), 
                    $data->__GET('correo_usuario'),
                    $data->__GET('contrasena'),
                    0
                )
            );

        $userId = $this->pdo->lastInsertId();
        //OBTENER PERMISOS Y ELIMINAR ULTIMA COMA DEL STRING
        $roles = substr($data->__GET('id_rol'),0,-1);
        $roles_array = explode(",", $roles);
        //REGISTRO DE PERMISOS
        foreach ($roles_array as $rol) {
            $roles_sql = "INSERT INTO rol_usuario(id_usario, id_rol) VALUES (?,?)";
            $this->pdo->prepare($roles_sql)
                         ->execute(
                        array(
                            $userId,
                            $rol
                        )
            );
        }
        } catch (Exception $e) 
        {
            error_log($e);
            die($e->getMessage());
        }
    }

    public function RegistrarAdm(Usuario $data)
    {
        try 
        {
        $sql = "INSERT INTO usuario (usuario,nombre_usuario,appat_usuario,apmat_usuario,edad_usuario,correo_usuario,contrasena)
                VALUES (?,?,?,?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
               $data->__GET('usuario'),
               $data->__GET('nombre_usuario'), 
                    $data->__GET('appat_usuario'), 
                    $data->__GET('apmat_usuario'),
                    $data->__GET('edad_usuario'), 
                    $data->__GET('correo_usuario'),
                    $data->__GET('contrasena')
                )
            );

        $userId = $this->pdo->lastInsertId();
        
        //OBTENER PERMISOS Y ELIMINAR ULTIMA COMA DEL STRING
        $permisos = substr($data->__GET('id_permiso'),0,-1);
        $permisos_array = explode(",", $permisos);
        //REGISTRO DE PERMISOS
        foreach ($permisos_array as $permiso) {
            $permisos_sql = "INSERT INTO rol_usuario (id_usario , id_rol, id_permiso) VALUES (?,?,?)";
            $this->pdo->prepare($permisos_sql)
                         ->execute(
                        array(
                            $userId,
                            2,
                            $permiso
                        )
            );
        }
        } catch (Exception $e) 
        {
            error_log($e);
            die($e->getMessage());
        }
    }
}
?>
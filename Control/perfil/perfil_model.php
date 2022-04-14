<?php
class PerfilModel
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

    

    public function Obtener($userid)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM perfil WHERE perfil_id LIKE  $userid");
                      

            $stm->execute(array($userid));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Perfil();

                
           
                $des->__SET('perfil_id', $r->perfil_id);
                $des->__SET('edad', $r->edad );
                $des->__SET('direccion', $r->direccion);
                $des->__SET('usuario_estado', $r->usuario_estado);
                $des->__SET('codigo_postal', $r->codigo_postal);
                $des->__SET('usuario_ciudad', $r->ciudad);
                $des->__SET('RFC', $r->RFC);
                $des->__SET('INE', $r->INE);
                $des->__SET('domicilio', $r->domicilio);
                $des->__SET('perfil_img',$r->perfil_img);
            return $des;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
   
    public function Datos($userid)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM usuario WHERE id_usario = $userid");
            
            
            
           $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
           // var_dump ($r);
           // $r = $stm->fetch(PDO::FETCH_OBJ);
            
          
            $des = new Perfil();
            
            $des->__SET('id_usario', $r->id_usario);
                $des->__SET('usuario', $r->usuario);
                $des->__SET('nombre_usuario', $r->nombre_usuario);
                $des->__SET('appat_usuario', $r->appat_usuario);
                $des->__SET('apmat_usuario', $r->apmat_usuario);
                $des->__SET('edad_usuario', $r->edad_usuario);
                $des->__SET('correo_usuario', $r->correo_usuario);
               // $result[] = $des;

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
                      ->prepare("DELETE FROM perfil WHERE perfil_id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Perfil $data)
    {
        try 
        {
            $sql = "UPDATE perfil SET 
                   perfil_id = ?,
                    
                   direccion = ?, 
                   usuario_estado = ?, 
                   codigo_postal = ?, 
                   usuario_ciudad = ?,
                    RFC = ?, 
                    INE = ?, 
                    domicilio = ?,
                    perfil_img = ?, 
                    WHERE id_perfil = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('perfil_id'),
                    
                    $data->__GET('direccion'),
                    $data->__GET('usuario_estado'),
                    $data->__GET('codigo_postal'),
                    $data->__GET('usuario_ciudad'),
                    $data->__GET('RFC'),
                    $data->__GET('INE'),
                    $data->__GET('domicilio'),
                    $data->__GET('perfil_img'),
                    $data->__GET('id_perfil')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function Registrar(Perfil $data)
    {
        try 
        {
               
                $sql = "INSERT INTO perfil (perfil_id,direccion,usuario_estado,codigo_postal,usuario_ciudad,RFC,INE,domicilio,perfil_img) 
                VALUES (?,?,?,?,?,?,?,?,?)";
        $this->pdo->prepare($sql)
             ->execute(
           array(
                    $data->__GET('perfil_id'),                    
                    $data->__GET('direccion'),
                    $data->__GET('usuario_estado'),
                    $data->__GET('codigo_postal'),
                    $data->__GET('usuario_ciudad'),
                    $data->__GET('RFC'),
                    $data->__GET('INE'),
                    $data->__GET('domicilio'),
                    $data->__GET('perfil_img')
                 )      
            );
                

       
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    
   
 }
?>
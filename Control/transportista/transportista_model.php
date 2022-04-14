    <?php
class transportistaModel
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

            $stm = $this->pdo->prepare("SELECT * FROM transportista order by nombre_empresa");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $des = new Transportista();

               $des->__SET('id_transportista', $r->id_transportista); 
                $des->__SET('nombre_empresa', $r->nombre_empresa);
                $des->__SET('domicilio_fiscal', $r->domicilio_fiscal);
                $des->__SET('ine', $r->ine);
                $des->__SET('RFC', $r->RFC);
                $des->__SET('foto_edo_cuenta', $r->foto_edo_cuenta);
                $des->__SET('logotipo_personal', $r->logotipo_personal);
                $des->__SET('foto_ext', $r->foto_ext);
                $des->__SET('foto_int', $r->foto_int);
                $des->__SET('curp', $r->curp);
                
                
                
                
                
                
                $result[] = $des;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Usertransportista($userid)
                    {
                    try
                    {
                    $result = array();

                    $stm = $this->pdo->prepare("SELECT * FROM transportista WHERE usuario_id = $userid");
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                    $des = new Transportista();

                    $des->__SET('id_transportista', $r->id_transportista);
                    $des->__SET('nombre_empresa', $r->nombre_empresa);
                    $des->__SET('domicilio_fiscal', $r->domicilio_fiscal);
                    $des->__SET('ine', $r->ine);
                    $des->__SET('RFC', $r->RFC);
                    $des->__SET('foto_edo_cuenta', $r->foto_edo_cuenta);
                    $des->__SET('logotipo_personal', $r->logotipo_personal);
                    $des->__SET('foto_ext', $r->foto_ext);
                    $des->__SET('foto_int', $r->foto_int);
                    $des->__SET('curp', $r->curp);



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
                      ->prepare("SELECT * FROM transportista WHERE id_transportista = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $des = new Transportista();

                $des->__SET('id_transportista', $r->id_transportista);
                $des->__SET('nombre_empresa', $r->nombre_empresa);
                $des->__SET('domicilio_fiscal', $r->domicilio_fiscal);
                $des->__SET('ine', $r->ine);
                $des->__SET('RFC', $r->RFC);
                $des->__SET('foto_edo_cuenta', $r->foto_edo_cuenta);
                $des->__SET('logotipo_personal', $r->logotipo_personal);
                $des->__SET('foto_ext', $r->foto_ext);
                $des->__SET('foto_int', $r->foto_int);
                $des->__SET('curp', $r->curp);
                

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
                      ->prepare("DELETE FROM transportista WHERE id_transportista = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Transportista $data)
    {
        try 
        {
            $sql = "UPDATE transportista SET 
                        usuario_id = ?,
                        nombre_empresa          = ?,
                        domicilio_fiscal      =?,
                        ine        = ?,
                        RFC           =?,
                        foto_edo_cuenta     =?,
                        logotipo_personal  =?,
                        foto_ext  =?,
                        foto_int   =?,
                        curp  =?
                        
                    WHERE id_transportista = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('usuario_id'), 
                    $data->__GET('nombre_empresa'),
                    $data->__GET('domicilio_fiscal'),
                    $data->__GET('ine'),
                    $data->__GET('RFC'),
                    $data->__GET('foto_edo_cuenta'),
                    $data->__GET('logotipo_personal'),
                    $data->__GET('foto_ext'),
                    $data->__GET('foto_int'),
                    $data->__GET('curp'),
                    $data->__GET('id_transportista')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar( $data)
    {
        try 
        {
        $sql = "INSERT INTO  transportista (usuario_id,nombre_empresa, domicilio_fiscal, ine, RFC, foto_edo_cuenta, logotipo_personal, foto_ext, foto_int, curp ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('usuario_id'),
                $data->__GET('nombre_empresa'), 
                $data->__GET('domicilio_fiscal'),
                $data->__GET('ine'),
                $data->__GET('RFC'),
                $data->__GET('foto_edo_cuenta'),
                $data->__GET('logotipo_personal'),
                $data->__GET('foto_ext'),
                $data->__GET('foto_int'),
                $data->__GET('curp')
                )
                    
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
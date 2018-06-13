<?php

class Usuario {
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    


    /**
     * Get the value of idUsuario
     */ 
    public function getIdusuario(){
        return $this->idusuario;
    }
    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
        return $this;
    }

    /**
     * Get the value of deslogin
     */ 
    public function getDeslogin(){
        return $this->deslogin;
    }
    /**
     * Set the value of deslogin
     *
     * @return  self
     */ 
    public function setDeslogin($deslogin){
        $this->deslogin = $deslogin;
        return $this;
    }

    /**
     * Get the value of dessenha
     */ 
    public function getDessenha(){
        return $this->dessenha;
    }
    /**
     * Set the value of dessenha
     *
     * @return  self
     */ 
    public function setDessenha($dessenha){
        $this->dessenha = $dessenha;
        return $this;
    }

    /**
     * Get the value of dtcadastro
     */ 
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    /**
     * Set the value of dtcadastro
     *
     * @return  self
     */ 
    public function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;
        return $this;
    }

    /**
     * loadById - find register by id
     */
    public function loadById($id){
        $dao = new Dao(); 
        $results = $dao->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(":id"=>$id));

        //if (isset($results[0])) - verifica se tem algum valor no array 0 OU pelo count
        if (count($results) > 0 ) {
            $row = $results[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        };

        return $results;
        
    }

    public function __toString(){
        return json_encode(array(
            "idusuario"=>$this->getIdUsuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }
}


?>
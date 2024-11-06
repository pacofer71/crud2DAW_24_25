<?php
namespace App\Db;
use \PDO;
use \PDOException;

class User extends Conexion{
    private int $id;
    private string $username;
    private string $email;
    private string $perfil;
    private string $imagen;

    public function create(){
        $q="insert into users(username, email, perfil, imagen) values(:u, :e, :p, :i)";
        $stmt=parent::getConexion()->prepare($q);
        try{
            $stmt->execute([
                ':u'=>$this->username,
                ':e'=>$this->email,
                ':p'=>$this->perfil,
                ':i'=>$this->imagen,
            ]);
        }catch(PDOException $ex){
            throw new PDOException("Error en crear: ".$ex->getMessage(), -1);
        }finally{
            parent::cerrarConexion();
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil(): string
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     */
    public function setPerfil(string $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(?string $imagen): self
    {
        $this->imagen = ($imagen===null) ? 'img/rana.jpg' : $imagen;

        return $this;
    }
}
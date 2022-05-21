<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{

    /**
     * Nome da Tabela
     * @var string
     */
    protected $table = 'clientes';
    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Definição de autoincremento no campo ID
     * @var bool
     */
    public $incrementing = true;
    /**
     * Tipo e dados da chave-primária da tabela
     * @var string
     */
    protected $keyType = 'int';
    /**
     * Constante com o nome da coluna para registro das datas das ações relacionadas à criação dos registros
     * @var string
     */
    const CREATED_AT = 'creationDate';
    /**
     * Constante com o nome da coluna para registro das datas das ações relacionadas à edição dos registros
     * @var string
     */
    const UPDATED_AT = 'updatedDate';
    /**
     * Permite salvar em todos os campos
     * @var array
     */
    protected $fillable = ['*'];

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of cpfCnpj
     */ 
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * Set the value of cpfCnpj
     *
     * @return  self
     */ 
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    /**
     * Get the value of telefoneCelular
     */ 
    public function getTelefoneCelular()
    {
        return $this->telefoneCelular;
    }

    /**
     * Set the value of telefoneCelular
     *
     * @return  self
     */ 
    public function setTelefoneCelular($telefoneCelular)
    {
        $this->telefoneCelular = $telefoneCelular;

        return $this;
    }

    /**
     * Get the value of telefoneFixo
     */ 
    public function getTelefoneFixo()
    {
        return $this->telefoneFixo;
    }

    /**
     * Set the value of telefoneFixo
     *
     * @return  self
     */ 
    public function setTelefoneFixo($telefoneFixo)
    {
        $this->telefoneFixo = $telefoneFixo;

        return $this;
    }

    /**
     * Get the value of creationDate
     */ 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of updatedDate
     */ 
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Set the value of updatedDate
     *
     * @return  self
     */ 
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }
}

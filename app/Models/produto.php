<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    /**
     * Nome da Tabela
     * @var string
     */
    protected $table = 'produtos';
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
     * Get the value of codReferencia
     */ 
    public function getCodReferencia()
    {
        return $this->codReferencia;
    }

    /**
     * Set the value of codReferencia
     *
     * @return  self
     */ 
    public function setCodReferencia($codReferencia)
    {
        $this->codReferencia = $codReferencia;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

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

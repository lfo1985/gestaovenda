<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    /**
     * Nome da Tabela
     * @var string
     */
    protected $table = 'vendas';
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
     * Relacionamento com a entidade cliente
     * Cardinalidade: 1 venda possui 1 cliente
     */
    public function cliente()
    {
        return $this->hasOne(\App\Models\cliente::class, 'id', 'idCliente');
    }

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
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of dataPedido
     */ 
    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    /**
     * Set the value of dataPedido
     *
     * @return  self
     */ 
    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;

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

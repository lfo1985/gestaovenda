<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class itemvenda extends Model
{
    /**
     * Nome da Tabela
     * @var string
     */
    protected $table = 'itemvendas';
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
     * Relacionamento com a entidade de produto
     * Cardinalidade: itemvenda possui 1 produto
     */
    public function produto()
    {
        return $this->hasOne(\App\Models\produto::class, 'id', 'idProduto');
    }
    /**
     * Relacionamento com a entidade venda
     * Cardinalidade: itemvenda possui 1 venda
     */
    public function venda()
    {
        return $this->hasOne(\App\Models\venda::class, 'id', 'idVenda');
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
     * Get the value of idVenda
     */ 
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set the value of idVenda
     *
     * @return  self
     */ 
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

    /**
     * Get the value of idProduto
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set the value of idProduto
     *
     * @return  self
     */ 
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get the value of quantidadeItens
     */ 
    public function getQuantidadeItens()
    {
        return $this->quantidadeItens;
    }

    /**
     * Set the value of quantidadeItens
     *
     * @return  self
     */ 
    public function setQuantidadeItens($quantidadeItens)
    {
        $this->quantidadeItens = $quantidadeItens;

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

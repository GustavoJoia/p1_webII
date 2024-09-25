<?php
namespace App\Server\Model;

class Produto {

    private int $id;
    private string $nome;
    private string $desc;
    private float $preco;
    private int $estoque;
    private int $userInsert;
    private string $dataHora;


    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id) {
        $this->id = $id;
    }

    /**
     * Get the value of nome
     *
     * @return string
     */
    public function getNome(): string {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param string $nome
     *
     * @return self
     */
    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    /**
     * Get the value of desc
     *
     * @return string
     */
    public function getDesc(): string {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @param string $desc
     *
     * @return self
     */
    public function setDesc(string $desc) {
        $this->desc = $desc;
    }

    /**
     * Get the value of preco
     *
     * @return float
     */
    public function getPreco(): float {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @param float $preco
     *
     * @return self
     */
    public function setPreco(float $preco) {
        $this->preco = $preco;
    }

    /**
     * Get the value of estoque
     *
     * @return int
     */
    public function getEstoque(): int {
        return $this->estoque;
    }

    /**
     * Set the value of estoque
     *
     * @param int $estoque
     *
     * @return self
     */
    public function setEstoque(int $estoque) {
        $this->estoque = $estoque;
    }

    /**
     * Get the value of userInsert
     *
     * @return int
     */
    public function getUserInsert(): int {
        return $this->userInsert;
    }

    /**
     * Set the value of userInsert
     *
     * @param int $userInsert
     *
     * @return self
     */
    public function setUserInsert(int $userInsert) {
        $this->userInsert = $userInsert;
    }

    /**
     * Get the value of dataHora
     *
     * @return string
     */
    public function getDataHora(): string {
        return $this->dataHora;
    }

    /**
     * Set the value of dataHora
     *
     * @param string $dataHora
     *
     * @return self
     */
    public function setDataHora(string $dataHora) {
        $this->dataHora = $dataHora;
    }
}
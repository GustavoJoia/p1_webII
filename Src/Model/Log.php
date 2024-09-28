<?php
namespace App\Server\Model;
use App\Server\Model\Produto;

class Log {

    private int $id;
    private string $acao;
    private Produto $produto;
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
     * Get the value of acao
     *
     * @return string
     */
    public function getAcao(): string {
        return $this->acao;
    }

    /**
     * Set the value of acao
     *
     * @param string $acao
     *
     * @return self
     */
    public function setAcao(string $acao) {
        $this->acao = $acao;
    }

    /**
     * Get the value of produto
     *
     * @return Produto
     */
    public function getProduto(): Produto {
        return $this->produto;
    }

    /**
     * Set the value of produto
     *
     * @param Produto $produto
     *
     * @return self
     */
    public function setProduto(Produto $produto) {
        $this->produto = $produto;
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
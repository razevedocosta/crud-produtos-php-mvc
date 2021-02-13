<?php

namespace Alura\Cursos\Entity;

/**
 * @Entity
 * @Table(name="cursos")
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string", nullable=false)
     */
    private $descricao;
    /**
     * @Column(type="string", nullable=false)
     */
    private $codigoBarras;
    /**
     * @Column(type="string", nullable=false)
     */
    private $precoCompra;
    /**
     * @Column(type="string", nullable=false)
     */
    private $precoVenda;
    /**
     * @Column(type="string", nullable=false)
     */
    private $categoria;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function getCodigoBarras(): string {
        return $this->codigoBarras;
    }
    public function setCodigoBarras(string $codigoBarras): void {
        $this->codigoBarras = $codigoBarras;
    }

    public function getPrecoCompra(): string {
        return $this->precoCompra;
    }
    public function setPrecoCompra(string $precoCompra): void {
        $this->precoCompra = $precoCompra;
    }

    public function getPrecoVenda(): string {
        return $this->precoVenda;
    }
    public function setPrecoVenda(string $precoVenda): void {
        $this->precoVenda = $precoVenda;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }
    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }

    public function selecionaCategoria(string $categoria): string {
        switch ($categoria) {
            case 1:
                return 'Alimentos e bebidas';
            break;
            case 2:
                return 'Automotivo';
            break;
            case 3:
                return 'Beleza e Cuidados';
            break;
            case 4:
                return 'Brinquedos e jogos';
            break;
            case 5:
                return 'Informática';
            break;
        }
    }

    public function listaCategoria(): array {
        return $array = [
            "1" => "Alimentos e bebidas",
            "2" => "Automotivo",
            "3" => "Beleza e Cuidados",
            "4" => "Brinquedos e Jogos",
            "5" => "Informática",
        ];
    }
}

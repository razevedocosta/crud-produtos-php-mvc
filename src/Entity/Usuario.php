<?php
namespace Alura\Cursos\Entity;
/**
 * @Entity
 * @Table(name="usuarios")
 */
class Usuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @Column(type="string")
     */
    private $senha;

    public function getSenha(): int {
        return $this->senha;
    }

    // função para verificar senha criptografada
    // public function senhaEstaCorreta(string $senhaPura): bool {
    //     return password_verify($senhaPura, $this->senha);
    // }
}

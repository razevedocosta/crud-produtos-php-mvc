<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao {

    use FlashMessageTrait; 

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioUsuarios;

    public function __construct() {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void {
        $email = filter_input(
            INPUT_POST, 'email', FILTER_VALIDATE_EMAIL
        );

        if (is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'E-mail ou senha inválidos');
            
            header('Location: /login');
            exit();
        }

        $senha = filter_input(
            INPUT_POST, 'senha', FILTER_SANITIZE_STRING
        );

        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);

        // if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
        if (is_null($usuario) || $senha != $usuario->getSenha()) {
            $this->defineMensagem('danger', 'E-mail ou senha inválidos');

            header('Location: /login');
            return;
        }

        $_SESSION['logado'] = true;
    
        header('Location: /listar-cursos');
    }

}

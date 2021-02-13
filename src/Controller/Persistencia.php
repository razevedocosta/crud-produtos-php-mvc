<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao {

    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct() {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
        $precoCompra = filter_input(INPUT_POST, 'precoCompra', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

        $precoVenda = number_format($precoCompra, 2, '.', '');

        $curso = new Curso();
        $curso->setDescricao($nome);
        $curso->setCodigoBarras($codigo);
        $curso->setPrecoCompra($precoCompra);
        $curso->setPrecoVenda($precoVenda * 2);
        $curso->setCategoria($categoria);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);    // atualizar
        } else {
            $this->entityManager->persist($curso);  // inserir um curso novo
        }
        
        $this->entityManager->flush();



        header('Location: /listar-cursos', false, 302);
    }
}
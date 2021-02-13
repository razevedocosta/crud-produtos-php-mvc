<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos implements InterfaceControladorRequisicao {
    use FlashMessageTrait; 
    use RenderizadorDeHtmlTrait; 

    private $repositorioDeCursos;

    // inicializa o que é preciso
    public function __construct() {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    // função para buscar todos os cursos
    public function processaRequisicao(): void {
        $cursos = $this->repositorioDeCursos->findAll();

        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $cursos,
            'listaCategoria' => [
                ["1", "Alimentos e bebidas"],
                ["2", "Automotivo"],
                ["3", "Beleza e Cuidados"],
                ["4", "Brinquedos e Jogos"],
                ["5", "Informática"],
            ],
            'titulo' => 'Lista de Cursos',
        ]);
    }
}
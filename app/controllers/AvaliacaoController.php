<?php
require_once __DIR__ . '/../models/Avaliacao.php';

class AvaliacaoController {
     public function index() {
        // Valores padrão para evitar warnings
        $busca  = $_GET['busca'] ?? '';
        $coluna = $_GET['coluna'] ?? 'data_inicio';
        $ordem  = $_GET['ordem'] ?? 'ASC';

        $avaliacao = new Avaliacao();
        $dados = $avaliacao->listar($busca, $coluna, $ordem);

        include $_SERVER['DOCUMENT_ROOT'] . '/views/avaliacoes.php';
    }
    public function editar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $dados = [
                'curso' => $_POST['curso'],
                'avaliacao' => $_POST['avaliacao'],
                'data_inicio' => $_POST['data_inicio'],
                'data_fim' => $_POST['data_fim'],
                'pontos' => $_POST['pontos'],
                'status' => $_POST['status'],
                'nota' => $_POST['nota']
            ];

            $this->AvaliacaoModel->atualizar($id, $dados);

            header('Location: /avaliacoes');
            exit;
        }
    }
}
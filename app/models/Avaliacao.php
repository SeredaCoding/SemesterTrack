<?php
class Avaliacao {
    public function listar($busca = '', $coluna = 'data_inicio', $ordem = 'ASC') {
        global $pdo;

        // Sanitiza a coluna e a ordem para evitar SQL Injection
        $colunas_validas = ['curso','avaliacao','data_inicio','data_fim','pontos','status','nota'];
        if(!in_array($coluna, $colunas_validas)) $coluna = 'data_inicio';
        $ordem = strtoupper($ordem) === 'DESC' ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM avaliacoes WHERE curso LIKE :busca OR avaliacao LIKE :busca ORDER BY $coluna $ordem";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['busca' => "%$busca%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorCurso($curso) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM avaliacoes WHERE curso = :curso ORDER BY data_inicio ASC");
        $stmt->execute(['curso' => $curso]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

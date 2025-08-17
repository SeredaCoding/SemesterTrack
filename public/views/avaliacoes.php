<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; 

// Valores padrão para filtros e ordenação
$busca = $_GET['busca'] ?? '';
$coluna_atual = $_GET['coluna'] ?? 'data_inicio';
$ordem_atual  = $_GET['ordem'] ?? 'ASC';

// Colunas da tabela
$colunas = [
    'curso' => 'Curso',
    'avaliacao' => 'Avaliação',
    'data_inicio' => 'Início',
    'data_fim' => 'Fim',
    'pontos' => 'Pontos',
    'status' => 'Status',
    'nota' => 'Nota'
];
?>

<h1 class="mb-4">Lista de Avaliações</h1>

<!-- Formulário de busca -->
<form method="GET" class="mb-3 d-flex">
    <input type="text" name="busca" class="form-control me-2" placeholder="Buscar..." value="<?= htmlspecialchars($busca) ?>">
    <button class="btn btn-primary">Buscar</button>
</form>

<table id="tabela-avaliacoes" class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Curso</th>
            <th>Avaliação</th>
            <th>Período</th>
            <th>Pontos</th>
            <th>Status</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $d): ?>
        <tr class="linha-editavel" data-id="<?= $d['id'] ?>" 
            data-curso="<?= htmlspecialchars($d['curso']) ?>"
            data-avaliacao="<?= htmlspecialchars($d['avaliacao']) ?>"
            data-data_inicio="<?= $d['data_inicio'] ?>"
            data-data_fim="<?= $d['data_fim'] ?>"
            data-pontos="<?= $d['pontos'] ?>"
            data-status="<?= $d['status'] ?? '' ?>"
            data-nota="<?= $d['nota'] ?? '' ?>">
            <td><?= htmlspecialchars($d['curso']) ?></td>
            <td><?= htmlspecialchars($d['avaliacao']) ?></td>
            <td><?= $d['data_inicio'] ?> a <?= $d['data_fim'] ?></td>
            <td><?= $d['pontos'] ?></td>
            <td><?= $d['status'] ?? '-' ?></td>
            <td><?= $d['nota'] ?? '-' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Bootstrap -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/avaliacoes/editar" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Avaliação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-3">
          <label>Curso</label>
          <input type="text" name="curso" id="edit-curso" class="form-control">
        </div>
        <div class="mb-3">
          <label>Avaliação</label>
          <input type="text" name="avaliacao" id="edit-avaliacao" class="form-control">
        </div>
        <div class="mb-3">
          <label>Data Início</label>
          <input type="date" name="data_inicio" id="edit-data_inicio" class="form-control">
        </div>
        <div class="mb-3">
          <label>Data Fim</label>
          <input type="date" name="data_fim" id="edit-data_fim" class="form-control">
        </div>
        <div class="mb-3">
          <label>Pontos</label>
          <input type="number" name="pontos" id="edit-pontos" class="form-control">
        </div>
        <div class="mb-3">
          <label>Status</label>
          <input type="text" name="status" id="edit-status" class="form-control">
        </div>
        <div class="mb-3">
          <label>Nota</label>
          <input type="number" name="nota" id="edit-nota" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

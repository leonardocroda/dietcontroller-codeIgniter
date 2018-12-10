<table class="table">
    <tr>
        <th>Nome do alimento</th>
        <th>Proteína</th>
        <th>Gordura</th>
        <th>Carboidrato</th>
        <th>Quantidade</th>
    </tr>   
    <tr>
        <td><?= $alimento['nome_alimento'] ?>  </td>
        <td><?= $alimento['qtd_proteina'] ?> </td>
        <td><?= $alimento['qtd_gordura'] ?></td>
        <td><?= $alimento['qtd_carboidrato'] ?> </td>
        <td><input type="number" id="quantidade" name="quantidade"></td>
    </tr>
</table>
<?= anchor("alimentos/index", "Voltar", array('class' => 'btn btn-primary')) ?>
<a href="<?= base_url("alimentos/adicionar?id_alimento={$alimento['id_alimento']}" . $alimento['id_alimento']) ?>" class="btn btn-primary">Adicionar Alimento</a>
<!-- <?= anchor("alimentos/detalhes?id_alimento={$alimento['id_alimento']}", "Adicionar") ?> -->
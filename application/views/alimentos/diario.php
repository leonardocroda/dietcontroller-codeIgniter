<div class="container">

<h1>Diário</h1>
<?php 
    echo form_open("alimentos/diario");
        echo form_label("Data", "data");
        echo form_input(array(
            "name" => "data",
            "id" => "data",
            "class" => "form-control",
            "type" => "date",
            "value" => date("Y-m-d")
        ));
        echo "<br>";
        echo "<center>";
        echo form_button(array(
            "class" => "btn btn-primary",
            "type" => "submit",
            "content" => "Buscar"
        ));
        echo "</center> <br>";
        echo form_close();
?>

<?php $proteina = 0; ?>
<?php $gordura = 0; ?>
<?php $carboidrato = 0; ?>
<?php $calorias_totais = 0; ?>
<?php $calorias_restantes = 0; ?>
<table class="table">
    <tr>
        <th>Nome do alimento</th>
        <th>Quantidade</th>
        <th>Proteína</th>
        <th>Gordura</th>
        <th>Carboidrato</th>
        <th> </th>
    </tr>

<?php foreach ($alimentos as $alimento) : ?>
    <tr>
        <td><?= $alimento['nome_alimento'] ?></td>
        <td><?= $alimento['qtd_alimento'] ?></td>
        <td><?= $alimento['qtd_proteina'] * $alimento['qtd_alimento'];
            $proteina = $proteina + $alimento['qtd_proteina'] * $alimento['qtd_alimento'] ?></td>
        <td><?= $alimento['qtd_gordura'] * $alimento['qtd_alimento'];
            $gordura = $gordura + $alimento['qtd_gordura'] * $alimento['qtd_alimento'] ?></td>
        <td><?= $alimento['qtd_carboidrato'] * $alimento['qtd_alimento'];
            $carboidrato = $carboidrato + $alimento['qtd_carboidrato'] * $alimento['qtd_alimento'] ?></td>
            <td><?= anchor("alimentos/deleteDiario?id_usuario_alimento={$alimento['id_usuario_alimento']}","Apagar",array("class" => "btn btn-danger")) ?></td>
    </tr>
    <?php $calorias_totais = $alimento['meta_carboidrato'] * 4 + $alimento['meta_proteina'] * 4 + $alimento['meta_gordura'] * 9 ?>
    <?php endforeach ?>
</table>

<?php $calorias_consumidas = $proteina * 4 + $carboidrato * 4 + $gordura * 9;
$calorias_restantes = $calorias_totais - $calorias_consumidas; ?>
<!-- <center><h3 class="">Calorias consumidas/Meta <?= $calorias_consumidas; ?>/<?= $calorias_totais; ?></h3></center> -->
<h3>Consumo Atual:</h3>
<table class="table">
    <tr>
        <th>Calorias</th>
        <th>Proteína</th>
        <th>Gordura</th>
        <th>Carboidrato</th>
    </tr>
    <tr>
        <td><?= $calorias_consumidas?></td>
        <td><?= $proteina?></td>
        <td><?= $gordura?></td>
        <td><?= $carboidrato?></td>
    </tr>
</table>




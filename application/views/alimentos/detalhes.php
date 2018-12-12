<div class="container">

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
        <td><?php
            echo form_open("alimentos/adicionar?id_alimento={$alimento['id_alimento']}");
                echo form_input(array(
                "name" => "quantidade",
                "id" => "quantidade",
                "type"=> "number",
                "class"=>"form-control"
            ));
        ?></td>
</table>
    <center>
        <?php 
            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Adicionar"

            ));
            echo form_close();
        ?>
<?= anchor("/alimentos/add", "Voltar", array("class" => "btn btn-danger")) ?> 


    </center>

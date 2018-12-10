<h1>Alimentos</h1>
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Proteína</th>
                    <th>Gordura</th>
                    <th>Carboidrato</th>
                    <!-- <th>Quantidade</th> -->
                </tr>
                <?php foreach ($alimentos as $alimento) : ?>
                <tr>
                    <td><?= anchor("alimentos/detalhes?id_alimento={$alimento['id_alimento']}", $alimento['nome_alimento']) ?></td>
                    <td><?= $alimento['qtd_proteina'] ?></td>
                    <td><?= $alimento['qtd_gordura'] ?></td>
                    <td><?= $alimento['qtd_carboidrato'] ?></td>    
                    <!-- <td><input type="number"> </td>                 -->
                </tr>
                <?php endforeach ?>
            </table>
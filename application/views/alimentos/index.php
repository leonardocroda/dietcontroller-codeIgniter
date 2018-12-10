
        <div class="container">
            <?php if ($this->session->flashdata("success")) : ?>
            <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
            <?php endif ?>
            <?php if ($this->session->flashdata("danger")) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>          
            <?php endif ?>
            <?php if ($this->session->userdata("usuario_logado")) : ?>
            <h1>Diário</h1>
        
            <input type="date" class="form-control" value=<?= date('Y-m-d') ?> >
            <table class="table">
            <tr>
                <th>Nome do alimento</th>
                <th>Quantidade</th>
            </tr>
            <?php foreach ($alimentos as $alimento) : ?>
            <tr>
            <td><?= $alimento['nome_alimento'] ?></td>
            <td><?= $alimento['qtd_alimento'] ?></td>
</tr>
            <?php endforeach ?>
            </table>
            <input type="submit" class="btn btn-primary" value="Buscar">

            <h1>Alimentos</h1>
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Proteína</th>
                    <th>Gordura</th>
                    <th>Carboidrato</th>
                </tr>
                <?php foreach ($alimentos as $alimento) : ?>
                <tr>
                    <td><?= anchor("alimentos/detalhes?id_alimento={$alimento['id_alimento']}", $alimento['nome_alimento']) ?></td>
                    <td><?= $alimento['qtd_proteina'] ?></td>
                    <td><?= $alimento['qtd_gordura'] ?></td>
                    <td><?= $alimento['qtd_carboidrato'] ?></td>                    
                </tr>
                <?php endforeach ?>
            </table>
            <?= anchor("alimentos/formulario", "Novo Alimento", array("class" => "btn btn-primary")) ?>
            <?= anchor("login/logout", "Sair", array("class" => "btn btn-primary")) ?>
<?php else : ?>
            <h1>Login</h1>
            <?php
            echo form_open("login/autenticar");
            echo form_label("Email", "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlength" => "255"
            ));
            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlength" => "45"
            ));
            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "login"

            ));
            echo form_close();
            ?>
            <h1>Cadastro</h1>
            <?php
            echo form_open("usuarios/novo");
            echo form_label("Nome", "nome");
            echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlength" => "45"
            ));
            echo form_error("nome", "");

            echo form_label("Email", "email");
            echo form_input(array(
                "name" => "email",
                "id" => "email",
                "class" => "form-control",
                "maxlength" => "255"
            ));
            echo form_error("email", "");

            echo form_label("Senha", "senha");
            echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "class" => "form-control",
                "maxlength" => "45"
            ));
            echo form_error("senha", "");

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "cadastrar"

            ));
            echo form_close();
            ?>
            <?php endif ?>

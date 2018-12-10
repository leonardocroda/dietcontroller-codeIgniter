<div class="container">
    <?php if ($this->session->flashdata("success")) : ?>
        <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
    <?php endif ?>
    <?php if ($this->session->flashdata("danger")) : ?>
        <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>          
    <?php endif ?>
    <?php if ($this->session->userdata("usuario_logado")) : ?>
        <h1>Diário</h1>
        <!-- <input id="data" name="data" type="date" class="form-control" value=<?= date('Y-m-d') ?> > -->
        <!-- <input type="submit" class="btn btn-primary" value="Buscar"> -->
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
        echo form_button(array(
            "class" => "btn btn-primary",
            "type" => "submit",
            "content" => "Buscar"

        ));
        echo form_close();

        ?>
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
       
    <?php endif ?>
        <div class="container">
            <?php if($this->session->flashdata("success")):?>
            <p class="alert alert-success"><?= $this->session->flashdata("success")?></p>
            <?php endif ?>
            <?php if($this->session->flashdata("danger")):?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger")?></p>          
            <?php endif ?>
      

            <h1>Formulário</h1>
            <?php
                echo form_open("alimentos/novo");
                echo form_label("Nome","nome");
                echo form_input(array(
                    "name"=> "nome",
                    "id"=>"nome",
                    "class"=> "form-control",
                    "maxlength" => "255"
                ));
                echo form_error("nome","");

                echo form_label("Quantidade de Proteína","proteina");
                echo form_input(array(
                    "name"=> "proteina",
                    "id"=>"proteina",
                    "class"=> "form-control",
                    "maxlength" => "45"
                )); 
                echo form_error("proteina","");

                echo form_label("Quantidade de Gordura","gordura");
                echo form_input(array(
                    "name"=> "gordura",
                    "id"=>"gordura",
                    "class"=> "form-control",
                    "maxlength" => "45"
                ));
                echo form_error("gordura","");

                echo form_label("Quantidade de Carboidrato","carboidrato");
                echo form_input(array(
                    "name"=> "carboidrato",
                    "id"=>"carboidrato",
                    "class"=> "form-control",
                    "maxlength" => "45"
                ));
                echo form_error("carboidrato","");

                echo "<br><center>";
                echo form_button(array( 
                    "class"=>"btn btn-primary",
                    "type"=>"submit",
                    "content"=>"Cadastrar"

                ));
                echo anchor("alimentos/add", "Voltar", array('class'=> 'btn btn-danger'));
                echo form_close();
                echo "</center>";
            ?>
          
<div class="container">

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
            echo "<br> <center>";
            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Login"
                
            ));
            echo form_close();
            
            echo"<br>";
            echo"<br>";
            echo anchor("usuarios/editarSenha", "Esqueci minha senha") ;
            echo "</center>";

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
            echo "<br><center>";

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Cadastrar"

            ));
            echo "</center>";
        echo form_close();
    ?>


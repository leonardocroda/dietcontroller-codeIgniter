<div class="container">

<h1>Insira seus Dados</h1>
<?php
        echo form_open("usuarios/medidas");
         echo form_label("Peso", "peso");
            echo form_input(array(
            "name" => "peso",
            "id" => "peso",
            "class" => "form-control",
            "type"=> "number"
            ));
        echo form_error("peso", "");
      
        echo form_label("Altura", "altura");
            echo form_input(array(
            "name" => "altura",
            "id" => "altura",
            "class" => "form-control",
            "type" => "number",
            ));
        echo form_error("altura", "");
        
        echo form_label("Idade", "idade");
        echo form_input(array(
        "name" => "idade",
        "id" => "idade",
        "class" => "form-control",
        "type" => "number",
        ));
    echo form_error("idade", "");
        
        echo form_label("Sexo", "sexo");
        echo form_dropdown(array(
        "name" => "sexo",
        "id" => "sexo",
        "class" => "form-control",
        "type" => "text",
        ),array(
            'm'=> 'Masculino',
            'f'=> 'Feminino'
        ));
    echo form_error("sexo", "");
  
    echo form_label("Índice de Atividade", "indice");
        echo form_dropdown(array(
        "name" => "indice",
        "id" => "indice",
        "class" => "form-control",
        "type" => "text",
        ),array(
            's'=> 'Sedentário',
            'l'=> 'Leve',
            'm'=> 'Moderado',
            'i'=> 'Intenso',
            'mi'=> 'Muito Intenso'

        ));
        echo "<br><center>";

       echo form_button(array(
        "class" => "btn btn-primary",
        "type" => "submit",
        "content" => "Cadastrar"

    ));
    echo "</center>";
    echo form_close();
?>
<div>
   Prezado Administrador,<br/>

    Você recebeu a seguinte mensagem;
    <br/><br/>

    <?php if (is_array($name)){

        $messagem = $name;

        echo "<span style='font-weight: bold'>Nome:</span> ".$messagem['nome']."<br/>";
        echo "<span style='font-weight: bold'>Email:</span> ".$messagem['emailcli']."<br/>";
        echo "<span style='font-weight: bold'>Assunto:</span> ".$messagem['ass']."<br/><br/>";
        echo "<span style='font-weight: bold'>Mensagem:</span>";
        echo "<hr/>";
        echo "<p>".$messagem['msg']."</p>";
        echo "<hr/>";
        echo "<h4>Não responda diretamente este email. Responda para o email do cliente</h4>";
        echo "<h4>Atenciosamente,</h4>";
        echo "<h3>Sistema de Educação SmartEnem</h3>";

    }
    ?>

</div>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $nome = $_POST ['nome'];
            $idade = $_POST ['idade'];
            $senha = $_POST ['senha'];
            $saldo = $_POST ['saldo'];
            
            //Função para não deixa campo em branco:
            if ((empty($nome)) || (empty($senha)) || (empty($idade)) || (empty($saldo))) {
                    echo "<script>
                              window.alert('Cadastro não finalizado (ha campos vazios)');
                      </script>";
                    Exit;
            }
            
            //Transformando a data na forma Br:
            $DateBr = DateTime::createFromFormat('Y-m-d', $idade);
            $DateString = $DateBr->format('d/m/Y');
            
            //------------------------------------------------------------------------------------------------------------------
            
            // Separa em dia, mês e ano
            list($dia, $mes, $ano) = explode('/', $DateString);

            // Descobre que dia é hoje e retorna a unix timestamp
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do fulano
            $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

            // Depois apenas fazemos o cálculo já citado :)
            $idadeAnos = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);

             
                 
            
            
            //Nessa função ele faz a contação de quantos arquvios tem na pasta
            $pasta = 'usuario/';
            $arquivos = glob("$pasta{*.txt}", GLOB_BRACE);
            
            $qtdUsuarios = 0;
        
            foreach($arquivos as $txt){
            $qtdUsuarios++;
            }
            
            
            
            //Aqui eu verifico se a logins iguais:
            for($i=1; $i <= $qtdUsuarios;$i++){
                   
               // Com o file_get_contents transforma o arquivo em uma string so:
               $arqLido = file_get_contents("usuario/$i .txt");
              
               //Aqui consigo dividi strigs com explode e transforma em vetor:
               $arr = explode("\n",$arqLido); 
               foreach($arr as $chave => $line){
                    $arqLido2 = explode(",",$line); //Aqui eu transformo eles em vetor:
                    if($arqLido2[0] == $nome){ // indice 0 para "nome" porque ele é o primeiro do vetor
                        echo "<script>
                                        window.alert('Usuario ja existente, volte a página do cadastro novamente')
                              </script>";
                        $i--;
                        break;
                    }
                }
            }
            echo "<script>
                          window.alert('Cadastro realizado com sucesso');
                  </script>";
            
            
            
//---------------------------------------------------------------------------------------------------------------------------------------
            
            
            //Aqui eu ja começo abrir os arquivos para cada usuario:
            $qtdUsuarios++;
            
            $arquivo = fopen("usuario/$qtdUsuarios .txt", 'w'); 
            if ($arquivo == false) {
            die('Não é foi criar o arquivo');
            }
            
            $textoNome = "$nome,";
            $textoSenha = "$senha,";
            $textoIdade = "$idadeAnos,";
            $textoSaldo = "$saldo,";
            
            
            $arquivo = fopen("usuario/$qtdUsuarios .txt", 'a');
            fwrite($arquivo, $textoNome);
            fwrite($arquivo, $textoSenha);
            fwrite($arquivo, $textoIdade);
            fwrite($arquivo, $textoSaldo);
            fwrite($arquivo, $DateString);
            
 
            
            fclose($arquivo);
            
            
 
            
           
            
           
                   
            
            
        ?>
    </body>
</html>


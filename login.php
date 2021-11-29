<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" href="style.css">
        
        
    </head>
    <body >
        
        
        <?php
            $nome = $_POST ['nome'];
            $senha = $_POST ['senha'];
            
            
            
            //Função para converte string para int:
            function converterStringInt($anos){
                $numero = intval($anos);
                
                return $numero;
            }
            
            

            //A variavel que passa pelo arquivo enumerando eles:
            $cont1 = 1;
            
            //Função para não deixa campo em branco:
            if ((empty($nome)) || (empty($senha))) {
                echo "<script>
                              window.alert('A campos vazios, volte ao login novamente')
                      </script>";
                 Exit;
            }
            //--------------------------------------------------------------------------------------------------------------------

            
            //Nessa função ele faz a contação de quantos arquvios tem na pasta
            $pasta = 'usuario/';
            $arquivos = glob("$pasta{*.txt}", GLOB_BRACE);
            
            $qtdUsuarios = 0;
        
            foreach($arquivos as $txt){
                $qtdUsuarios++;
            }
            
            
            //Nessa parte ele confere o login para poder entra:
            for($i=1; $i <= $qtdUsuarios;$i++){
                
 
                
               // Com o file_get_contents transforma o arquivo em uma string so:
               $arqLido = file_get_contents("usuario/$i .txt");
              
               //Aqui consigo dividi strigs com explode e transforma em vetor:
               $arr = explode("\n",$arqLido); 
               foreach($arr as $chave => $line){
                    $arqLido2 = explode(",",$line); //Aqui eu transformo eles em vetor o nome e senha;
                    if($arqLido2[0] == $nome){ // indice 0 para "nome" porque ele é o primeiro do vetor
                        $ch = $chave;
                        break;
                    }
                }
                
                
                $dados = explode(",",$arr[$ch]);
                
  
                if($dados[1] == $senha ){ //Aqui ele verifica se senha bate e com isso indice 1 para "senha":
                    $idade = converterStringInt($dados[2]);//Usando a função para transforma em int 
                    $saldo = converterStringInt($dados[3]);
                    

                    if($idade >= 18){
                        if($saldo >= 0){
                            
                            print_r( '<body style="background-color:#72D65E ;">  Olá '.$nome.' seu saldo é de R$ '.$saldo.'. Uau!!! </body>');
                            break;
                        }else if ($saldo < 0){
                           
                            print_r( '<body style="background-color:#fe2a2a;">  Olá '.$nome.' seu saldo é de R$ '.$saldo.' negativo. Não se desepere, os sonhos antecedem o fracasso </body>');
                            break;
                        }
                        
                    }else {
                        header ("Location:https://promo.toddynho.com.br/");
                        break;
                        
                    }
                    //Caso a senha for invalida
                }else if ($dados[1] != $senha){
                    if($qtdUsuarios == $i){ //So irá para o erro caso todos os arquivos for converidos e de erro:
                        echo "<script>
                                      window.alert('Senha incorreta, volte ao login novamente');
                            </script>";
                    }
                }
                
            }
         
        ?>
        <br>
        
        <form action="index.php">
            Se precisar alterar o saldo mude aqui <br>
            <input  type="text" name="valorN" placeholder="Novo Valor" >
            <input type="submit" name="submit" class="btn btn-second" > </input>  
        </form> 
        
        
    </body>
</html>


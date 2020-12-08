<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <title> NEXUS </title>
    <script src="JS/jquery-3.5.1.min.js"></script>
   
    <script type="text/javascript" src="JS/jquery.mask.min.js"></script>
     <script type="text/javascript" src="JS/jquery.validate.min.js"></script>
     <script type="text/javascript" src="JS/additional-methods.min.js"></script>
    <script type="text/javascript" src="JS/localization/messages_pt_BR.js"></script>
    <script type="text/javascript">
        $(document).ready(function($){
            
        $("#cpf").mask("000.000.000-00")
             $("#cep").mask("00000-000")
            $("#rg").mask("999.999.999-w",{
                translation:{
                    'w':{
                        pattern: /[X0-9]/
                    }
                },
                reverse: true
            })
            $("#formAluno").validate({
          rules:{
              nome:{
                  required:true,
                  minlength:9,
                  minWords:2
              },
              email:{
                  required:true,
                 
              },
              cpf:{
                  required:true,
                 cpfBR:true
              },
              rg:{
                  required:true,
                 
              },
              endereco:{
                  required:true,
                 
              },
              cidade:{
                  required:true,
                 
              },
              estado:{
                  required:true,
                 
              },
              cep:{
                  required:true,
                 
              }
              
              
              
              
          }
      
      })
            
})

    </script>
    
   
  



    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <link rel="icon" type="image/png" href="img/n.png" />
</head>

<body>

    
        
         <div style="width: 50%;height:100%; " class="imgcadastro">
        <img src="img/icons.png">

    </div>

    <div style="padding:2%" class="Cadastro">

        <form name="formAluno" id="formAluno" method="post" action="CadastroAluno.php" enctype="multipart/form-data">
            <div class="form-row">
              <br>
              <br>
                <div class="form-group col-md-5">
                    <label for="inputAddress">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" 
                    id="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                    <small id="passwordHelpInline" class="text-muted">
                        Deve ter entre 8 e 20 caracteres.
                    </small>
                    
                </div>
                <div class="form-group col-md-2">
                    <label style="font-size:14px" for="inputPassword4">Repetir Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCity">Genero:</label>
                      
                                <select class="form-control" id="etnia" name="sexo">
                                   <option value="o">--</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="feminino">feminino</option>
                                    <option value="Gênero-fluido">Gênero-fluido</option>
                                    <option value="Andrógeno">Andrógeno</option>
                                    <option value="Não-Binário">Não-Binário</option>
                                    <option value="Prefiro não dizer">Prefiro não dizer</option>
                                </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputCity">CPF</label>
                    <input name="cpf" type="text" class="form-control" id="cpf">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">RG</label>
                    <input name="rg" type="text" class="form-control" id="rg">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Nascimento</label>
                    <input name="nascimento" type="date" class="form-control" id="nascimento">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Endereço</label>
                <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Apartamento, hotel, casa, etc.">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input name="cidade" type="text" class="form-control" id="cidade">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input name="cep" type="text" class="form-control" id="cep">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">

                    <label class="form-check-label" for="gridCheck">

                    </label>
                </div>
            </div>
             <div class="form-group">
                                <label for="inputCity">Renda própria</label>
                                <select class="form-control" id="trabalho" name="rendaPropia">
                                   <option value="o">--</option>
                                    <option value="com renda p´ropia">Sim</option>
                                    <option value="sem renda p´ropia">Não</option>
        
                                </select>
                            </div>
                        <div class="form-group">
                                <label for="inputCity">Renda</label>
                                <select class="form-control" id="renda" name="renda">
                                    <option value="Faixa">--</option>
                                    <option value="R$0.00 a R$1.045">R$0.00 a R$1.045</option>
                                    <option value="R$1.045 a R$2.500">R$1.045 a R$2.500</option>
                                    <option value="R$2.500 a R$ 4.000">R$2.500 a R$ 4.000</option>
                                    <option value="R$4.000 até mais">R$4.000 até mais</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Cor</label>
                                <select class="form-control" id="etnia" name="Cor">
                                   <option value="o">--</option>
                                    <option value="Branco">Branco</option>
                                    <option value="Preto">Preto</option>
                                    <option value="Pardo">Pardo</option>
                                    <option value="Vermelho">vermelho</option>
                                    <option value="Amerelo">Amerelo</option>
                                </select>
                            </div>

             <div class="form-group">
                <label for="exampleFormControlFile1">Insira uma foto</label>
                <input type="file" required name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button style="width:120px;background-image: linear-gradient(to right, #55c1e9, #440099);border:none" type="submit" class="btn btn-primary">Cadastrar</button>
            <br>
            <br>
        </form>

    </div>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

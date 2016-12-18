<?php include("config.php");?>     
  <!DOCTYPE HTML>
  <html lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta name=description content="Layout Home"/>
    <meta name="viewport" content="width=device-width, initial-scale1"/>                                      
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script')</script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Plataforma de Mercadorias: </title>
 </head>
 <body>
  <section id="all" class="content">
    <!--HEADER-->
	<header class="jumbotron subhead" id="overview">
		<div class="container-fluid">
			<h1 align ="center">Plataforma de Mercadorias</h1>
			<p class="lead" align ="center">Realize a operação de cadastro ou visualize operações anteriores</p>
            </br>
		</div>
	</header>
                    
    <!--BODY-->
    <div class="container-fluid">
       <div class="row-fluid">      
			<div class="span12">
            <section id="modal">
             <section id="modal_alert" class="modal hide fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_loginLabel" aria-hidden="true">
               <header class="modal-header">
                  <h3 id="meuModalLabel">Mensagem: </h3>
                  </br>
                </header>				
                <section class="modal-body">
				  <?php 
                    if(isset($_REQUEST["cad_merc"])){
                    $tabela = 'mercadoria';
                    $tipo_mercadoria = $_POST["tipo_mercadoria"];
                    $nome_mercadoria = strtoupper($_POST["nome_mercadoria"]);
                    $quantidade = $_POST["quantidade"];
                    $preco = $_POST["preco"];				
                    $tipo_negocio = $_POST["tipo_negocio"];
                    
                    $queryRead = 	"insert into {$tabela} (tipo_mercadoria,nome_mercadoria,quantidade,preco,tipo_negocio) values ('$tipo_mercadoria','$nome_mercadoria','$quantidade','$preco','$tipo_negocio')";
                    
                    try{
                    
                      $create = $link->prepare($queryRead);
                      $create->bindParam(':tipo_mercadoria',$tipo_mercadoria,PDO::PARAM_STR);
                      $create->bindParam(':nome_mercadoria',$nome_mercadoria,PDO::PARAM_STR);
                      $create->bindParam(':quantidade',$quantidade,PDO::PARAM_STR);
                      $create->bindParam(':preco',$preco,PDO::PARAM_STR);
                      $create->bindParam(':tipo_negocio',$tipo_negocio,PDO::PARAM_STR);				  				  				
                      $create->execute();
                      echo "<script>$('#modal_alert').modal('show')</script>";
                      echo '<div class="alert alert-success">
                            <p>Cadastro Efetuado com Sucesso! </p>
                            </div>		
                            ';
                      header('Refresh: 3, index.php');
                
                    }
                    catch(PDOException $e){
                      echo "<script>$('#modal_alert').modal('show')</script>";
                      echo '<div class="alert alert-error">
                              <p>Desculpe houve um erro. Cadastro Não Efetuado! </p>
                              </div>		
                              ';
                      echo $e;
                      header('Refresh: 3, index.php');
                    }
                    echo '<hr />';
                                    
                  }
                 ?>                  
                  </section>
                <section class="modal-footer">
                  <footer class="modal-footer">
                  </footer>
                </section>
               </section>
              </section> 
                
                
             <div><a href="#modal_cadastro" class="pull-left" role="button" data-toggle="modal"><img class="columnA" src="img/add.png" width="300" height="300"></img></a></div>
             <div><a href="#modal_view" class="pull-right" role="button" data-toggle="modal"><img class="columnB" src="img/verificar.png" width="300" height="300"></img></a></div> 
              			 
             <section id="modal">
				<section id="modal_cadastro" class="modal hide fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_loginLabel" aria-hidden="true">
					<header class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<h3 id="meuModalLabel">Cadastrar Mercadoria: </h3>
						</br>
					</header>
					<section class="modal-body">
					   <form action="" class="form-horizontal" method="post" enctype="multipart/form-data" id="cad_merc" name="cad_merc"/>
							<div class="control-group">
								<label class="col-md-4 control-label" for="tipo_mercadoria">Tipo de Mercadoria: </label>  
								<div class="controls">
									<select id="tipo_mercadoria" name="tipo_mercadoria" size="1" mutiple required>
										<option value="Novo">Novo
										<option value="Usado">Usado
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="col-md-4 control-label" for="nome_mercadoria">Digite o Nome do Produto: </label>  
								<div class="controls">
									<input name="nome_mercadoria" type="text" id="nome_mercadoria" placeholder="Apenas Letras" required pattern="^[a-zA-Z ]*$"/>
								</div>
							</div>
							<div class="control-group">
								<label class="col-md-4 control-label" for="quantidade">Quantidade: </label>  
								<div class="controls">
									<input name="quantidade" type="text" id="quantidade" placeholder="Valor Inteiro" maxlength="15" pattern="\d*"/>
								</div>
							</div>
							<div class="control-group">
								<label class="col-md-4 control-label" for="preco" >Valor: </label>  
								<div class="controls">
									<input name="preco" type="text" id="preco"maxlength="15" placeholder="Valor Inteiro" pattern="\d*"/>
								</div>
							</div>
							<div class="control-group">
								<label class="col-md-4 control-label" for="tipo_negocio">Tipo de Negócio: </label>  
								<div class="controls">
									<select id="tipo_negocio" name="tipo_negocio" size="1" mutiple required>
										<option value="Compra">Compra
										<option value="Venda">Venda
									</select>
								</div>
							</div>                                                        
					</section>
					<section class="modal-footer">
						<footer class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
						    <button class="btn btn-success" type="submit" name="cad_merc" id="cad_merc" value="Enviar Dados">Enviar</button>	
						</form>
						</footer>
					</section>
				</section>
            </section> 
           </div>           
<section id="modal">
             <section id="modal_view" class="modal hide fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_loginLabel" aria-hidden="true">
               <header class="modal-header">
                  <button class="close" data-dismiss="modal" aria-hidden="true">X</button>
                  <h3 id="meuModalLabel">Mensagem: </h3>
                  </br>
                </header>				
                <section class="modal-body">
				  <?php 
                    $sql = 'SELECT tipo_mercadoria, nome_mercadoria, quantidade, preco, tipo_negocio FROM mercadoria';
                          echo '<table class="table table-bordered table-striped">';
						  echo '<tr>';
						  echo '<td>Tipo de Mercadoria</td>';
						  echo '<td>Nome da Mercadoria</td>';
						  echo '<td>Quantidade</td>';
						  echo '<td>Preco</td>';
						  echo '<td>Tipo de Negocio</td>';						  
						  echo '</tr>';              
        				  foreach ($link->query($sql) as $row) {
						  echo '<tr>';
                          print '<td>'.$row['tipo_mercadoria'] . '</td>';
                          print '<td>'.$row['nome_mercadoria'] . '</td>';
						  print '<td>'.$row['quantidade'] . '</td>';
						  print '<td>'.$row['preco'] . '</td>';
						  print '<td>'.$row['tipo_negocio'] . '</td>';
						  echo '</tr>';
						  
                      }
					  echo '</table>';
                  ?>

                              
                </section>
                <section class="modal-footer">
                  <footer class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                  </footer>
                </section>
               </section>
              </section> 
            

			<div class="span3 span3_login">
				</div>       
				</div>
			</div> 

  </section>
 <!--RODAPÉ-->
		<footer class="footer">
			<div class="container">
				<p align="center">Desenhado e construído com todo amor do mundo por <a href="#" target="_blank">Raphael Veloso Weber.</a>
				<p align="center">Este projeto é uma versão Beta do VALEMOBI.</p>
			</div>
		</footer>
	</body>
</html>   
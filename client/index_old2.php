	



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CEUB</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-circle">
				</div>
			</div>

			
			    <!--ARQUIVO QUE O FORM IRÁ EXECUTAR-->


			<form class="form-horizontal" action="login.php" method="post">


				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Email
					</label>
					<div class="col-sm-10">
						<input class="form-control" id="email" type="email" name="email_user" required>
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-2 control-label">
						Senha
					</label>
					<div class="col-sm-10">
						<input class="form-control" id="inputPassword3" type="password" name="senha_user" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							 
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
						<a href="http://localhost/client_aula8/user_cadastro.php">Cadastrar novo usuário</a> <br>

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button type="submit" class="btn btn-default">
							Sign in
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

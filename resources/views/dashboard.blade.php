<html>
	<head>
    <meta charset="utf-8" />
		<title>Relatório de Pedidos</title>

		<!-- Bootstrap início -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap fim -->

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <script src="app.js"></script>

	</head>

  <body onload="carregaListaPedidos()">


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
      <div class="container">
        <a class="navbar-brand">
           <img src="logo.png" width="150" height="50" alt="Logo Brudam">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="container">
      <div class="row mb-5">
        <div class="col">
          <h1 class="display-4">Relatório de Pedidos</h1>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-2">
          <select class="form-control" id="ano">
            <option value="">Ano</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
          </select>
        </div>

        <div class="col-md-2">
          <select class="form-control" id="mes">
            <option value="">Mês</option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
        </div>
        
        <div class="col-md-2">
          <input type="text" class="form-control" placeholder="Dia" id="dia" />
        </div>

        <div class="col-md-6">
          <select class="form-control" id="tipo">
            <option value="">Cliente</option>
            @foreach($clientes as $cliente)
              <option value="{{$cliente['nome']}}">{{$cliente['nome']}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row  mb-5">
        <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Descrição" id="descricao" />
        </div>

        <div class="col-md-2">
          <input type="text" class="form-control" placeholder="Valor" id="valor" />
        </div>

        <div class="col-md-2 d-flex justify-content-end">
          <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <table class="table" >
            <thead>
              <tr>
                <th>Descrição</th>
                <th>Código de Barras</th>
                <th>Valor</th>
                <th>Valor Frete</th>
                <th>Data do Pedido</th>
                <th>Data de Entrega</th>
                <th>Nome Cliente</th>
              </tr>
            </thead>

            <tbody id="listaPedidos">
            @foreach($dados as $dado)
                <tr>
                    <td>{{$dado['descricao']}}</td>
                    <td>{{$dado['codigo']}}</td>
                    <td>R$ {{number_format($dado['valor'], 2, ',', '.')}}</td>
                    <td>R$ {{number_format($dado['valor_frete'], 2, ',', '.')}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($dado['data_criacao']))}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($dado['data_entrega']))}}</td>
                    <td>{{$dado['nome']}}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>	

</html>

<script>
    
</script>
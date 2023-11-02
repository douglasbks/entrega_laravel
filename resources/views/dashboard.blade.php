<html>
	<head>
    <meta charset="utf-8" />
		<title>Relatório de Pedidos</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

	</head>

  <body>


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
          <select class="form-control" id="cliente">
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
          <input type="number" class="form-control" placeholder="Valor" id="valor" />
        </div>

        <div class="col-md-2 d-flex justify-content-end">
          <button type="button" class="btn btn-primary" id="btnFiltrar">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <table id="listaPedidos">
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
            <tbody>
              @foreach($dados as $dado)
                  <tr>
                      <td>{{$dado['descricao']}}</td>
                      <td>{{$dado['codigo']}}</td>
                      <td>{{$dado['valor']}}</td>
                      <td>{{$dado['valor_frete']}}</td>
                      <td>{{$dado['data_criacao']}}</td>
                      <td>{{$dado['data_entrega']}}</td>
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
$(document).ready(function () {
    var table = $('#listaPedidos').DataTable({
        searching: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('pedidos.ajax') !!}',
            data: function (d) {
                d.ano = $('#ano').val();
                d.mes = $('#mes').val();
                d.dia = $('#dia').val();
                d.cliente = $('#cliente').val();
                d.descricao = $('#descricao').val();
                d.valor = $('#valor').val();
            }
        },
        columns: [
            { data: 'descricao', name: 'tbl_pedido.descricao' },
            { data: 'codigo', name: 'tbl_pedido.codigo' },
            { data: 'valor', name: 'tbl_pedido.valor', render: function (data, type, row) {
                    return 'R$ ' + parseFloat(data).toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                    });
                }},
            { data: 'valor_frete', name: 'valor_frete',  render: function (data, type, row) {
                    return 'R$ ' + parseFloat(data).toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                    });
                }},
            { data: 'data_criacao', name: 'tbl_pedido.data_criacao', render: function (data, type, row) {
                    return moment(data).format('DD/MM/YYYY HH:mm');
                } },
            { data: 'data_entrega', name: 'tbl_pedido.data_entrega', render: function (data, type, row) {
                    return moment(data).format('DD/MM/YYYY HH:mm');
                } },
            { data: 'nome', name: 'tbl_cliente.nome' },
        ],
        columnDefs: [
            {
                targets: [2, 3, 4, 5], 
                render: function (data) {
                    return data;
                },
            },
        ]
    });

    $('#btnFiltrar').on('click', function () {
        table.ajax.reload();
    });
});
</script>

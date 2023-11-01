passo a passo
1-executar o comando composer install no terminal
2-executar o comando php artisan key:generate
3-executar o arquivo teste_brudam.sql no mysql
4-executar o comando php artisan serve para iniciar o servidor web local
5-enviar um json conforme exemplo para a rota localhost/api/pedidos
exemplo:
{
    "descricao": "Pedido Exemplo",
    "data_entrega": "2023-11-04 09:30",
    "valor": 11.45,
    "valor_frete": 9.99,
    "id_cliente": 2
}
6-acessar a url localhost para ver os relatórios
7-clientes podem ser criados na rota localhost/api/clientes utilizando o padrão:
{
    "nome": "Cliente Exemplo",
    "email": "email@exemplo.com",
    "telefone": "51 999999999"
}

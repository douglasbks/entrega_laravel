# Passo a passo:

1-Executar o comando 'composer install' no terminal

2-Executar o comando 'php artisan key:generate' no terminal

3-Executar o arquivo 'teste_brudam.sql' no mysql

4-Executar o comando 'php artisan serve' no terminal para iniciar o servidor web local

5-Enviar um json conforme exemplo para a rota 'localhost/api/pedidos'

exemplo:

{
    "descricao": "Pedido Exemplo",
    "data_entrega": "2023-11-04 09:30",
    "valor": 11.45,
    "valor_frete": 9.99,
    "id_cliente": 2
}

6-Acessar a url 'localhost' para ver os relatórios

7-Clientes podem ser criados na rota 'localhost/api/clientes' utilizando o padrão:

{
    "nome": "Cliente Exemplo",
    "email": "email@exemplo.com",
    "telefone": "51 999999999"
}

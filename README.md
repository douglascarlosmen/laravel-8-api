# Laravel 8 API
## Como instalar

### **Passo 1 - Instalação dos Pacotes**
Após clonar o repositório é necessário instalar as dependencias. Para isso, execute o seguinte comando na raiz do projeto:

~~~php
composer install
~~~

### **Passo 2 - Configuração**
Na raiz do projeto encontre o arquivo *.env* e preencha os parâmetros da seguinte forma:
~~~php
APP_URL=http://localhost:56000
...
DB_HOST=localhost
DB_PORT=56001
DB_DATABASE=laravel_8_api
DB_USERNAME=laravel
DB_PASSWORD=root
~~~
**Obs.: basta copiar o arquivo *.env.example* e renomeá-lo para *.env***

### **Passo 3 - Executar containers docker**
Com a aplicação e suas dependências devidamente instaladas e configuradas, chegou a hora de subir os servidor necessários. Para isso execute, na raiz do projeto, o comando abaixo:
~~~php
docker-compose up -d
~~~

### **Passo 4 - Banco de dados**
Agora que nossos servidores estão funcionando, precisamos criar a tabela no banco de dados. Para isso execute, na raiz do projeto, o comando abaixo:
~~~php
php artisan migrate
~~~

### **Passo 5 - Testando**
Para conferir se a sua aplicação está rodando corretamente, na raiz do projeto execute o seguinte comando:
~~~php
php artisan test
~~~

## Como usar
### **Produtos**
<br />

Listar todos os produtos cadastrados
<br />
**GET** */api/product*
<br />
<br />

Listar um produto específico
<br />
**GET** */api/product/{id}*
<br />
<br />

Cadastrar um produto
<br />
**POST** */api/product/*
<br />
<br />
Exemplo de Payload:
```json
{
    "name": "Produto Exemplo",
    "price": 10.90
}
```

<br />
<br />

Atualizar um produto
<br />
**PUT** */api/product/{id}*
<br />
<br />
Exemplo de Payload:
```json
{
    "name": "Produto Exemplo Editado",
    "price": 90.10
}
```

<br />
<br />

Deletar um produto
<br />
**DELETE** */api/product/{id}*
<br />
<br />

### **Clientes**
<br />

Listar todos os clientes cadastrados
<br />
**GET** */api/clientes*
<br />
<br />

Listar um cliente específico
<br />
**GET** */api/client/{id}*
<br />
<br />

Cadastrar um cliente
<br />
**POST** */api/client/*
<br />
<br />
Exemplo de Payload:
```json
{
    "name": "Cliente Exemplo",
    "email": "cliente@exemplo.com.br"
}
```

<br />
<br />

Atualizar um cliente
<br />
**PUT** */api/client/{id}*
<br />
<br />
Exemplo de Payload:
```json
{
    "name": "Cliente Exemplo Editado",
    "email": "cliente_editado@exemplo.com.br"
}
```

<br />
<br />

Deletar um cliente
<br />
**DELETE** */api/client/{id}*
<br />
<br />

### **Pedidos**
<br />

Listar todos os pedidos cadastrados
<br />
**GET** */api/order*
<br />
<br />

Listar um pedido específico
<br />
**GET** */api/order/{id}*
<br />
<br />

Cadastrar um pedido
<br />
**POST** */api/order/*
<br />
<br />
Exemplo de Payload:
```json
{
    "client_id": 1,
    "products": [
        ["id" => 1],
        ["id" => 2],
        ["id" => 3],
    ]
}
```

<br />
<br />

Atualizar um pedido
<br />
**PUT** */api/order/{id}*
<br />
<br />
Exemplo de Payload:
```json
{
    "client_id": 1,
    "products": [
        ["id" => 4],
        ["id" => 5],
        ["id" => 6],
    ]
}
```
```

<br />
<br />

Deletar um pedido
<br />
**DELETE** */api/order/{id}*
<br />
<br />


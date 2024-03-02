
<h1 align="center">
  <img alt="Foxtrot Toy Store" width="300px" src="https://github.com/felipesilva15/FoxtrotToyStore/blob/main/public/images/logo.png" />
  <br>
  Foxtrot Toy Store
</h1>

<div align="center">
   <img src="http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=RED&style=for-the-badge" alt="badge-desenvolvimento"/>
</div>

<div align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/felipesilva15/FoxtrotToyStore.svg">
  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/felipesilva15/FoxtrotToyStore.svg">
  <img alt="Repository size" src="https://img.shields.io/github/repo-size/felipesilva15/FoxtrotToyStore.svg">
  <a href="https://github.com/felipesilva15/FoxtrotToyStore/commits/main">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/felipesilva15/FoxtrotToyStore.svg">
  </a>
  <a href="https://github.com/felipesilva15/FoxtrotToyStore/issues">
    <img alt="Repository issues" src="https://img.shields.io/github/issues/felipesilva15/FoxtrotToyStore.svg">
  </a>
  <img alt="GitHub" src="https://img.shields.io/github/license/felipesilva15/FoxtrotToyStore.svg">
</div>

## 📝 Descrição do projeto

Este é um e-commerce fictício de venda de brinquedos, chamado Foxtrot Toy Store.

Este projeto foi implantado em uma VPS na [Hostinger](https://www.hostinger.com.br/), e está disponível através do link <https://foxtrot-toystore.felipesilva15.com.br>

## 🚀 Rodando localmente

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

* PHP v8.2.0+
* Composer

### 🔧 Instalação

1. Clone o projeto utilizando o comando abaixo

``` bash
  git clone https://github.com/felipesilva15/FoxtrotToyStore.git
```

2. Acesse a pasta dos fonts deste projeto

```bash
  cd FoxtrotToyStore
```

3. Instale as dependências do projeto

```bash
  composer install
```

4. Copie o arquivo de exemplo de variáveis de ambiente  

```bash
  cp .env.example .env
```

5. Atualize as credenciais de acesso ao seu banco de dados preenchendo os campos abaixo

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
```

6. Gere a chave da aplicação  

```bash
  php artisan key:generate
```

6. Inicie a aplicação

```bash
  php artisan serve
```

7. Acesse a aplicação (Geralmente é inicializada no endereço <http://localhost:8000>).

## 🛠️ Construído com

* [Laravel (PHP)](https://laravel.com/) - Framework de PHP para Front-end e Back-end
* [JavaScript](https://www.javascript.com/) - Linguagem de programação auxiliar para o Front-end

## ✒️ Autores

* **Felipe Silva** - *Desenvolvedor e mentor* - [felipesilva15](https://github.com/felipesilva15)
* **Ewerton Sobral** - *Desenvolvedor* - [EwertonSobral](https://github.com/EwertonSobral)
* **Renan Papalino** - *Desenvolvedor* - [RenanPapalino](https://github.com/RenanPapalino)

## 📄 Licença

Este projeto está sob a licença (MIT) - veja o arquivo [LICENSE](https://github.com/felipesilva15/FoxtrotToyStore/blob/main/LICENCE) para detalhes.

---
Documentado por [Felipe Silva](https://github.com/felipesilva15) 😊

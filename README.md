# Website Nutricionista

Este projeto consiste em um website para um nutricionista, com funcionalidades que incluem formulário de contato, autenticação de usuários, área exclusiva para usuários e uma interface administrativa para gerenciar dados, avaliações físicas, planos alimentares, receitas, configurações do site e usuários.

## Conteúdo

1. **Introdução**
    - Sobre o Projeto
    - Tecnologias Utilizadas
    - Estrutura de Pastas

2. **Funcionalidades Principais**
    - Página Inicial
    - Autenticação de Usuários
    - Área do Usuário
        - Dashboard
        - Gráficos de Biometria e Antropometria
        - Perfil do Usuário
        - Plano Alimentar
        - Receitas
        - Questionários de Anamnese
    - Área Administrativa
        - Gerenciamento de Usuários
        - Avaliações Físicas
        - Configuração de Planos Alimentares
        - Configuração de Receitas
        - Configurações de Email (SMTP)
        - Configurações Gerais do Site
        - Cadastro de Novos Usuários

3. **Estrutura de Pastas e Arquivos**
    - Descrição dos Principais Arquivos
    - Organização do Código
    - Arquivos de Estilo (CSS)
    - Arquivos de Script (JavaScript)
    - Módulos PHP
    - Páginas HTML
    - Banco de Dados

4. **Instruções de Instalação**
    - Requisitos
    - Configuração do Banco de Dados
    - Configuração do SMTP
    - Inicialização do Projeto

5. **Licença e Contribuição**
    - Licença
    - Como Contribuir
      
6. **Galeria de imagens**
   
## 1. Introdução

### Sobre o Projeto

Este projeto é um website desenvolvido para um nutricionista, proporcionando uma plataforma interativa para seus pacientes gerenciarem dados de saúde, planos alimentares, receitas e mais. A aplicação é construída utilizando HTML, CSS, JavaScript e PHP, com dados armazenados em um banco de dados MySQL.

### Tecnologias Utilizadas

- HTML, CSS, JavaScript
- PHP
- MySQL (Banco de Dados)
- PHPMailer (para envio de emails)
- Composer (para gerenciamento de dependências)

### Estrutura de Pastas

O projeto está organizado em pastas que incluem `assets` para recursos como estilos e scripts, `data` para dados específicos, `modules` para funcionalidades modularizadas, `pages` para diferentes seções do site, e outros arquivos essenciais.

## 2. Funcionalidades Principais

### Página Inicial

A página inicial (`index.html`) apresenta informações sobre o nutricionista, incluindo uma seção "Sobre Mim" e links para redes sociais.

### Autenticação de Usuários

- Login: Os usuários podem fazer login para acessar suas áreas específicas.
- Recuperação de Senha: Funcionalidade para recuperar a senha por meio de email.

### Área do Usuário

#### Dashboard

A página `dashboard.php` exibe gráficos de biometria e antropometria, oferecendo uma visão geral dos dados de saúde.

#### Perfil do Usuário

Permite aos usuários visualizar e editar suas informações pessoais.

#### Plano Alimentar

- Visualização e edição dos planos alimentares criados pelo nutricionista.

#### Receitas

- Visualização de receitas recomendadas pelo nutricionista.

#### Questionários de Anamnese

- Preenchimento de questionários para fornecer informações relevantes ao nutricionista.

### Área Administrativa

#### Gerenciamento de Usuários

- Visualização, edição e exclusão de usuários registrados.

#### Avaliações Físicas

- Adição, edição e visualização de dados de avaliações físicas.

#### Configuração de Planos Alimentares

- Adição, edição e exclusão de planos alimentares, com a capacidade de incluir várias opções de alimentos e refeições.

#### Configuração de Receitas

- Adição e exclusão de receitas, com detalhes como ingredientes e instruções.

#### Configurações de Email (SMTP)

- Configuração de parâmetros SMTP para envio de emails.

#### Configurações Gerais do Site

- Personalização da página inicial, incluindo a seção "Sobre Mim" e links para redes sociais.

#### Cadastro de Novos Usuários

- Formulário para o administrador cadastrar novos usuários.

## 3. Estrutura de Pastas e Arquivos

### Descrição dos Principais Arquivos

- `.gitignore`: Lista de arquivos e diretórios a serem ignorados pelo Git.
- `composer.json` e `composer.lock`: Arquivos de configuração do Composer para gerenciamento de dependências.
- `config.php`: Arquivo de configuração geral do sistema.
- `index.html`: Página inicial do site.
- `README.md`: Documentação detalhada do projeto.
- `database.sql`: Script SQL para criação das tabelas no banco de dados.

### Organização do Código

O código está dividido em pastas lógicas:
- `assets`: Contém arquivos CSS, imagens e scripts JavaScript.
- `data`: Armazena dados específicos, como informações da landing page.
- `modules`: Módulos PHP para funções específicas, como autenticação, banco de dados, etc.
- `pages`: Páginas HTML para diferentes seções do site.

### Arquivos de Estilo (CSS)

Diversos arquivos CSS estão organizados em `assets/css`, incluindo estilos específicos para admin, autenticação, landing page, impressão e usuários.

### Arquivos de Script (JavaScript)

Scripts JavaScript estão localizados em `assets/js`, abrangendo funcionalidades como gráficos, administração de dashboard, login, etc.

### Módulos PHP

A pasta `modules` contém módulos PHP para funcionalidades específicas, como autenticação, banco de dados, funções administrativas, entre outros.

### Páginas HTML

As páginas HTML estão agrupadas em `pages`, divididas em admin, autenticação e usuário, conforme a estrutura do site.

### Banco de Dados

O banco de dados é gerenciado por um script SQL (`database.sql`), contendo as tabelas necessárias para armazenar informações dos usuários, avaliações físicas, planos alimentares, receitas, etc.

## 4. Instruções de Instalação

### Requisitos

- Servidor web (por exemplo, Apache)
- PHP 7.

0 ou superior
- MySQL
- Composer instalado

### Configuração do Banco de Dados

1. Importe o script SQL (`database.sql`) no MySQL para criar as tabelas necessárias.
2. Configure as credenciais do banco de dados no arquivo `config.php`.

### Configuração do SMTP

1. Configure os parâmetros SMTP no arquivo `smtp_script.js` para permitir o envio de emails.

### Inicialização do Projeto

1. Clone o repositório para o diretório desejado.
2. Execute `composer install` para instalar as dependências.
3. Configure seu servidor web para apontar para o diretório do projeto.

## 5. Licença e Contribuição

### Licença

Este projeto é distribuído sob a licença [MIT](LICENSE).

### Como Contribuir

- Faça um fork do repositório.
- Crie uma branch para sua contribuição.
- Faça as alterações desejadas.
- Envie um pull request para revisão.

## 6. Galeria de imagens

### Página inicial
  
![index](https://github.com/christianduhp/daniel-landingpage/assets/85292359/7879dc0f-5ae9-4214-a918-07efb73bc2cd)

### Página do usuário

![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/fd4bb96d-84f9-4e02-b6c7-089507a6a35f)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/a165abed-912e-4e59-abfe-198c5953b9ea)
![meals](https://github.com/christianduhp/daniel-landingpage/assets/85292359/4951778f-4b38-4ba9-acd7-090458070fbc)
![questionnaires](https://github.com/christianduhp/daniel-landingpage/assets/85292359/6181c689-7217-4dab-9e04-9d3a8c7f22cf)
![recipes](https://github.com/christianduhp/daniel-landingpage/assets/85292359/17e5238a-5244-40d7-93e9-956691c0740f)

### Páginas do admnistrador
![admin dash](https://github.com/christianduhp/daniel-landingpage/assets/85292359/9051651e-d8aa-433f-8ad3-9910ab1680e8)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/b8cd02b1-8a5d-43e2-b130-e7e8288c6f13)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/88c5aeab-5154-44c5-af72-d3625cffe25e)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/5c68cb7d-4667-408f-85a9-69b8e5c5feae)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/aedbc15e-8652-4f70-b26f-ce99202b071b)
![landingpage](https://github.com/christianduhp/daniel-landingpage/assets/85292359/66c7f71e-40c7-42bd-81dd-907f89692517)

### Páginas de Autenticação

![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/70becf6a-fc0d-44bf-9c48-28b449c7ff64)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/7ce2c3cf-5467-4653-840e-ccaa4953e9bf)
![image](https://github.com/christianduhp/daniel-landingpage/assets/85292359/a1b008ef-f610-4677-9485-5e52cfee1f53)
![signup](https://github.com/christianduhp/daniel-landingpage/assets/85292359/e76ed98b-80e6-4eb6-b0e2-675d55e3f531)



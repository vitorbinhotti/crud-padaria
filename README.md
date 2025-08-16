# 🥖 Sistema CRUD Padaria

Sistema de gerenciamento de padaria desenvolvido em PHP com funcionalidades CRUD para gerenciar clientes, produtos, usuários e pedidos.

## 📋 Pré-requisitos

- **XAMPP** 
- **Navegador web**

## 🚀 Instalação

### 1. Configuração do XAMPP
- Baixe e instale o XAMPP
- Inicie os serviços Apache e MySQL
- Verifique se ambos estão rodando

### 2. Banco de Dados
- Abra o phpMyAdmin
- Execute o script SQL do arquivo `banco-de-dados/database.sql`

### 3. Deploy
- Copie os arquivos para `C:\xampp\htdocs\crud-padaria\`

## 🌐 Execução

1. Acesse: `http://localhost/crud-padaria/`
2. Use as funcionalidades disponíveis:
   - **create.php** - Cadastrar clientes
   - **read.php** - Visualizar clientes
   - **update.php** - Editar clientes
   - **delete.php** - Excluir clientes
   - **login.php** - Sistema de login

## 🗄️ Banco de Dados

**Tabelas:**
- usuarios - Usuários do sistema
- clientes - Clientes da padaria
- produtos - Produtos disponíveis
- pedidos - Registro de pedidos

## 🔧 Solução de Problemas

- **Erro de conexão:** Verifique se MySQL está rodando
- **Página não encontrada:** Confirme se Apache está ativo
- **Permissões:** Use credenciais padrão do XAMPP

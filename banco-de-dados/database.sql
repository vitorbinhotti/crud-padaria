create database crud_padaria;

use crud_padaria;


create table usuarios (
    id_usuarios int not null auto_increment primary key,
    nome varchar(80) not null,
    email varchar(45) not null,
    telefone varchar(45) not null
);

create table produtos (
    id_produtos int not null auto_increment primary key,
    nome varchar(85) not null,
    descricao varchar(85) not null,
    quantidade int not null,
    data_validade date not null,
    disponibilidade boolean not null default (true)
);

create table clientes (
    id_cliente int not null auto_increment primary key,
    nome varchar(85) not null,
    email varchar(85) not null,
    telefone varchar(85) not null
);

create table pedidos (
    id_pedidos int not null auto_increment primary key,
    descricao varchar(85) not null,
    quantidade int not null,
    data_pedido datetime not null default (current_timestamp),
    fk_clientes int not null,
    FOREIGN KEY (fk_clientes) REFERENCES clientes(id_cliente),
    fk_produtos int not null,
    FOREIGN KEY (fk_produtos) REFERENCES produtos(id_produtos)
);


INSERT INTO clientes (nome, email, telefone)
VALUES ('João Silva', 'joao.silva@gmail.com', '11987654321');

INSERT INTO usuarios (nome, email, telefone)
VALUES ('Maria Oliveira', 'maria.oliveira@padaria.com', '11912345678');

INSERT INTO produtos (nome, descricao, quantidade, data_validade)
VALUES ('Pão Francês', 'Pão francês fresquinho', 100, '2025-12-31'),
	   ('Rosquinha', 'Rosquinha doce', 50, '2025-11-30');
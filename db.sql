# Victor Hugo da Silva RA: 10735
# Lucas Fernando Silva RA: 12243
# Leonardo Antônio de Melo RA: 12373


CREATE SCHEMA loja_moto;
USE loja_moto;

# Comandos DDL
CREATE TABLE funcionario (
	id int primary key auto_increment,
	nome varchar(45),
	email varchar(50) not null,
	senha varchar(30) not null
);

CREATE TABLE produto (
	id int primary key auto_increment,
	nome_produto varchar(45),
	quantidade int,
    status_estoque varchar(40)
);

CREATE TABLE transacoes (
	id int primary key auto_increment,
	id_funcionario int not null,
	id_produto int not null,
	quantidade_saida int,
	data_saida date,
	foreign key(id_funcionario) references funcionario(id),
	foreign key(id_produto) references produto(id) 
);

CREATE TABLE fornecedor (
	id char(14) primary key,
	nome varchar(45) not null,
	endereco varchar(50),
	telefone varchar(12)
);
CREATE TABLE fornecedor_produto (
	id int primary key auto_increment,
	cnpj_fornecedor char(14) not null,
	id_produto int not null,
	quantidade_entrada int,
	data_entrada date,
	foreign key(cnpj_fornecedor) references fornecedor(id),
	foreign key(id_produto) references produto(id) 
);

# Comandos DML

INSERT INTO funcionario (nome, email, senha) VALUES
("Victor Hugo", "victor_osk8@hotmail.com", "123456"),
("Lucas Silva", "lucas_silva@hotmail.com", "606060"),
("Leonardo Melo", "leonardo_melo@hotmail.com", "321654");

INSERT INTO fornecedor (id, nome, endereco, telefone) VALUES
("67705993000178", "Sport Moto Peças", "Rua Beijamim, 89, Sao Paulo", "11999445465"),
("90311765000135", "Race Moto Peças", "Rua Salvador, 154, Belo Horizonte", "31988456575");

INSERT INTO fornecedor_produto (cnpj_fornecedor, id_produto, quantidade_entrada, data_entrada) VALUES
("90311765000135", "3", "20", "2021/04/03"),
("90311765000135", "2", "15", "2021/04/03"),
("67705993000178", "1", "10", "2021/03/25");

INSERT INTO produto (nome, quantidade) VALUES
("Bengala", "10"),
("Pneu", "15"),
("Oleo", "20");

#Criando Usuario Administrador e Concedendo Privilegios
CREATE USER 'adm_loja_moto'@'localhost' identified BY 'adm123@';
grant all on loja_moto.* to 'adm_loja_moto'@'localhost';


#Criando Usuario Desenvolvedor e Concedendo Privilegios
CREATE USER 'dev_loja_moto'@'localhost' identified BY 'dev123@';
grant SELECT, UPDATE, INSERT, DELETE, ALTER, CREATE, DROP on loja_moto.* to 'dev_lojamoto'@'localhost';

#Criando Usuario para Aplicação Web e Concedendo Privilegios
CREATE USER 'web_loja_moto'@'localhost' identified BY 'web123@'; 
grant SELECT, UPDATE, INSERT, DELETE on loja_moto.produto to 'web_loja_moto'@'localhost';
grant SELECT, INSERT, UPDATE on loja_moto.fornecedor to 'web_loja_moto'@'localhost';
grant SELECT, INSERT on loja_moto.funcionario to 'web_loja_moto'@'localhost';
grant SELECT, INSERT, UPDATE, DELETE on loja_moto.transacoes to 'web_loja_moto'@'localhost';
grant SELECT, INSERT, UPDATE, DELETE on loja_moto.fornecedor_produto to 'web_loja_moto'@'localhost';
grant SELECT on loja_moto.vw_saida to 'web_loja_moto'@'localhost';
grant SELECT on loja_moto.vw_entrada to 'web_loja_moto'@'localhost';

#Criando Tabelas Virtuais

# Uma tabela virtual para exibir o nome do funcionário, o nome e quantidade de todos os produtos que ele fez saída e a data das saída

CREATE OR REPLACE VIEW vw_saida AS
select funcionario.nome, produto.nome_produto, transacoes.quantidade_saida, transacoes.data_saida from funcionario 
INNER JOIN transacoes on transacoes.id_funcionario = funcionario.id 
INNER JOIN produto on transacoes.id_produto = produto.id;

# Uma tabela virtual para exibir o nome do fornecedor,  quantidade de todos os produtos que ele fez entrada e a data das entradas

CREATE OR REPLACE VIEW vw_entrada AS
select fornecedor.nome as nome_fornecedor, produto.nome_produto, fornecedor_produto.quantidade_entrada, fornecedor_produto.data_entrada from
fornecedor
INNER JOIN fornecedor_produto on fornecedor_produto.cnpj_fornecedor = fornecedor.id
INNER JOIN produto on fornecedor_produto.id_produto = produto.id;

#Functions - Uma função para contar a quantidade de saída de um determinado produto no dia atual.
DELIMITER $
CREATE FUNCTION fnc_cont_saida(par_id int)
    RETURNS int deterministic
BEGIN
	DECLARE var_valor_saida int;
	set var_valor_saida = (
        select count(id_produto) from transacoes
		where data_saida = curdate() and id_produto = par_id
    );
    return var_valor_saida;
END$
DELIMITER ;

# Um Procedure para alertar sobre a quantidade de produtos
DELIMITER $
CREATE PROCEDURE prc_controle_status ()
BEGIN
 	update produto set status_estoque = "critico"
    where quantidade <= 10;
    update produto set status_estoque = "em alerta"
    where quantidade > 10 and quantidade <=25;
    update produto set status_estoque = "estoque alto"
    where quantidade > 25;   
END$
DELIMITER ;

# Trigger para acrescentar automaticamente na quantidade de produto
DELIMITER $
CREATE TRIGGER tr_entrada_produto
AFTER insert on fornecedor_produto
for each ROW
BEGIN
    UPDATE produto
    set produto.quantidade = produto.quantidade + new.quantidade_entrada
    where produto.id = new.id_produto;
END$
DELIMITER ;

# Trigger para descontar automaticamente na quantidade de produto
DELIMITER $
CREATE TRIGGER tr_saida_produto
AFTER INSERT ON transacoes
FOR EACH ROW
BEGIN
	UPDATE produto
    set produto.quantidade = produto.quantidade - new.quantidade_saida
    where produto.id = new.id_produto;
END$
DELIMITER ;

























 




    

    
    
    
    
    
    
    
    
    
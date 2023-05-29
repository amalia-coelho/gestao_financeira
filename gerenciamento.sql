create database bd_gestao_financeira;
use bd_gestao_financeira;

create table tb_nivel(
	cd_nivel int primary key auto_increment,
	nm_nivel varchar(200)
);

create table tb_responsavel(
	cd_responsavel int primary key auto_increment,
	nm_responsavel varchar(250),
	id_usuario_busca int
);

create table tb_forma_pagto(
	cd_forma_pagto int primary key auto_increment,
	nm_forma_pagto varchar(250),
	id_usuario_busca int
);

create table tb_categoria(
	cd_categoria int primary key auto_increment,
	nm_categoria varchar(250),
	id_usuario_busca int
);

create table tb_tipo_registro(
	cd_tipo_registro int primary key auto_increment,
	nm_tipo_registro varchar(250)
);

create table tb_usuario(
	cd_usuario int primary key auto_increment,
	nm_usuario varchar(100),
	sn_usuario varchar(100),
	ds_login varchar(300),
	ds_senha varchar(300),
	nr_idade int,
	id_responsavel int,
	id_nivel int
);

create table tb_lancamento(
	cd_lancamento int primary key auto_increment,
	ds_lancamento varchar(200) not null,
	dt_lancamento date not null,
	vl_lancamentos decimal(8,2) not null,
	nr_parcela_atual int,
	nr_parcela_total int,
	dt_vencimento date,
	id_tipo_registro int,
	id_usuario int,
	id_categoria int,
	id_forma_pagto int not null,
	id_responsavel int
);

-- alter table tabela foreign key fk_tabela_tabela(id_exemplo) references tabela(cd_exemplo);

alter table tb_usuario add foreign key fk_usuario_responsavel(id_responsavel) references tb_usuario(cd_usuario);
alter table tb_usuario add foreign key fk_usuario_nivel(id_nivel) references tb_nivel(cd_nivel);
alter table tb_lancamento add foreign key fk_lancamento_usuario(id_usuario) references tb_usuario(cd_usuario);
alter table tb_lancamento add foreign key fk_lancamento_categoria(id_categoria) references tb_categoria(cd_categoria);
alter table tb_lancamento add foreign key fk_lancamento_pagto(id_forma_pagto) references tb_forma_pagto(cd_forma_pagto);
alter table tb_lancamento add foreign key fk_lancamento_responsavel(id_responsavel) references tb_responsavel(cd_responsavel);
alter table tb_responsavel add foreign key fk_responsavel_usuario(id_usuario_busca) references tb_usuario(cd_usuario);
alter table tb_forma_pagto add foreign key fk_formaPagto_usuario(id_usuario_busca) references tb_usuario(cd_usuario);
alter table tb_categoria add foreign key fk_categoria_usuario(id_usuario_busca) references tb_usuario(cd_usuario);
alter table tb_lancamento add foreign key fk_lancamento_registro(id_tipo_registro) references tb_tipo_registro(cd_tipo_registro);

-- CADASTROS PADRÃO

-- Tipos de registros
INSERT INTO tb_tipo_registro (nm_tipo_registro) VALUES('Renda');
INSERT INTO tb_tipo_registro (nm_tipo_registro) VALUES('Gasto');

-- Niveis
INSERT INTO tb_nivel (nm_nivel) VALUES ('Responsavel');
INSERT INTO tb_nivel (nm_nivel) VALUES ('Dependente');

-- Usuários
INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade, id_nivel) VALUES ('Amália', 'Coelho', 'amaliacoelho@gmail.com', 'oioioioi', 17, 1);
INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade, id_nivel) VALUES ('Eric', 'Junokas', 'ericjunokas@gmail.com', 'oioioioi', 17, 1);
INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade) VALUES ('Larissa', 'Pergentino', 'lalalinda@gmail.com', 'lalalinda', 17);

-- Categorias
INSERT INTO tb_categoria (nm_categoria) VALUES ('Mercado');
INSERT INTO tb_categoria (nm_categoria) VALUES ('Eletrônicos');
INSERT INTO tb_categoria (nm_categoria) VALUES ('Suplementos');
INSERT INTO tb_categoria (nm_categoria) VALUES ('Investimentos');
INSERT INTO tb_categoria (nm_categoria) VALUES ('Roupas');

-- Formas de pagamentos
INSERT INTO tb_forma_pagto (nm_forma_pagto) VALUES ('Pix');
INSERT INTO tb_forma_pagto (nm_forma_pagto) VALUES ('Cartão de crédito');
INSERT INTO tb_forma_pagto (nm_forma_pagto) VALUES ('Cartão de debito');
INSERT INTO tb_forma_pagto (nm_forma_pagto) VALUES ('Boleto');

-- Responsavel
INSERT INTO tb_responsavel (nm_responsavel, id_usuario_busca) VALUES ('Etec de itanhaém', 1) ;
INSERT INTO tb_responsavel (nm_responsavel, id_usuario_busca) VALUES ('Bradesco', 1);
INSERT INTO tb_responsavel (nm_responsavel, id_usuario_busca) VALUES ('Motion Fit', 1);
CREATE SCHEMA `np_proconpb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `np_proconpb`;

CREATE TABLE `np_proconpb`.`endereco` (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    endereco VARCHAR(255),
    numero VARCHAR(6),
    complemento VARCHAR(46),
    cidade VARCHAR(150),
    uf VARCHAR(2),
    cep VARCHAR(11),
    id_fisica INT,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_atualiza DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)  ENGINE=INNODB;

CREATE TABLE `np_proconpb`.`usuario` (
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(10),
    senha VARCHAR (6),
    ativo BOOLEAN
) ENGINE=INNODB;

    
CREATE TABLE `np_proconpb`.`pessoa_fisica` (
	id_fisica INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
	nome VARCHAR(45),
	email VARCHAR(255),
    id_telefone SMALLINT,
	id_endereco INT,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_atualiza DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	INDEX end_ind (id_endereco),
	FOREIGN KEY (id_endereco)
		REFERENCES endereco(id_endereco)
        ON DELETE CASCADE,
	INDEX user_ind (id_usuario),
	FOREIGN KEY (id_usuario)
		REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
        
) ENGINE=INNODB;
    
CREATE TABLE `np_proconpb`.`pessoa_juridica` (
	id_juridica INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
	razao VARCHAR(45),
	email VARCHAR(255),
	id_telefone SMALLINT,
	id_endereco INT,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_atualiza DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	INDEX end_ind (id_endereco),
	FOREIGN KEY (id_endereco)
		REFERENCES endereco(id_endereco)
        ON DELETE CASCADE,
	INDEX user_ind (id_usuario),
	FOREIGN KEY (id_usuario)
		REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE `np_proconpb`.`telemarketing` (
	id_telemarketing INT AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT,
    nome_razao VARCHAR(45),
	email VARCHAR(255),
	id_endereco INT,
    ativa BOOLEAN,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_atualiza DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	INDEX end_ind (id_endereco),
	FOREIGN KEY (id_endereco)
		REFERENCES endereco(id_endereco)
        ON DELETE CASCADE,
	INDEX user_ind (id_usuario),
	FOREIGN KEY (id_usuario)
		REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
        
) ENGINE=INNODB;

CREATE TABLE `np_proconpb`.`telefones` (
	id_telefone INT PRIMARY KEY,
    id_usuario INT,
	numero VARCHAR(16),
	email VARCHAR(255),
	id_endereco INT,
    ativa BOOLEAN,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_atualiza DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	INDEX user_ind (id_usuario),
	FOREIGN KEY (id_usuario)
		REFERENCES usuario(id_usuario)
        ON DELETE CASCADE
) ENGINE=INNODB;

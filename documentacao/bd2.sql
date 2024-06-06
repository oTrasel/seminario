CREATE TABLE professor 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(300) NOT NULL,  
 login VARCHAR(300) NOT NULL,  
 senha VARCHAR(300) NOT NULL,  
 dt_cadastro DATETIME NOT NULL,  
); 

CREATE TABLE turma 
( 
 id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,  
 descr_turma VARCHAR(300) NOT NULL,  
 dt_abertura DATETIME NOT NULL,  
 dt_fechamento DATETIME,  
 id_professor INT NOT NULL,  
); 

CREATE TABLE aluno 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(300) NOT NULL,  
 dt_nascimento DATE NOT NULL,  
 dt_cadastro DATETIME NOT NULL,  
); 

CREATE TABLE vinculo_turma_aluno 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 id_turma INT NOT NULL,  
 id_aluno INT NOT NULL,  
 dt_vinculo DATETIME,  
 ativo INT NOT NULL,  
); 

CREATE TABLE nota 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 id_vinculo INT NOT NULL,  
 mat VARCHAR(300) NOT NULL,  
 port VARCHAR(300) NOT NULL,  
 hist VARCHAR(300) NOT NULL,  
 geo VARCHAR(300) NOT NULL,  
); 

ALTER TABLE turma ADD FOREIGN KEY(id_professor) REFERENCES professor (id);
ALTER TABLE vinculo_turma_aluno ADD FOREIGN KEY(id_turma) REFERENCES turma (id);
ALTER TABLE vinculo_turma_aluno ADD FOREIGN KEY(id_aluno) REFERENCES aluno (id);
ALTER TABLE nota ADD FOREIGN KEY(id_vinculo) REFERENCES vinculo_turma_aluno (id);

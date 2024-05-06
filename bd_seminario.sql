CREATE TABLE professor 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(500) NOT NULL,  
 login VARCHAR(500) NOT NULL,  
 senha VARCHAR(500) NOT NULL,  
 UNIQUE (login)
); 

CREATE TABLE aluno 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(500) NOT NULL,  
 id_turma INT NOT NULL,  
); 

CREATE TABLE turma 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 descr_turma VARCHAR(500) NOT NULL,  
 id_professor INT NOT NULL,  
); 

CREATE TABLE materia 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 descr_materia VARCHAR(500) NOT NULL,  
); 

CREATE TABLE notas 
( 
 id_aluno INT NOT NULL,  
 id_turma INT NOT NULL,  
 id_materia INT NOT NULL,  
 nota FLOAT NOT NULL,  
 data_nota DATETIME NOT NULL,  
); 

ALTER TABLE aluno ADD FOREIGN KEY(id_turma) REFERENCES turma (id)
ALTER TABLE turma ADD FOREIGN KEY(id_professor) REFERENCES professor (id)
ALTER TABLE notas ADD FOREIGN KEY(id_aluno) REFERENCES aluno (id)
ALTER TABLE notas ADD FOREIGN KEY(id_turma) REFERENCES turma (id)
ALTER TABLE notas ADD FOREIGN KEY(id_materia) REFERENCES materia (id)

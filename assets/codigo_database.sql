create table usuario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    perfil VARCHAR(255),
    created TIMESTAMP DEFAULT NOW()
)
insert into usuario (nome, email, senha, perfil) values ('Ricrado Avancini', 'avancini.rf@gmail.com', '654321', 'admin');

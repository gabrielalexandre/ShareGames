CREATE TABLE usuario(
    nome VARCHAR(60) NOT NULL,
    sobrenome VARCHAR(30) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    dataNascimento VARCHAR(10) NOT NULL,
    email VARCHAR(40) NOT NULL,
    senha VARCHAR(10000) NOT NULL,
    cep VARCHAR(9),
    pais VARCHAR(40),
    estado VARCHAR(40),
    cidade VARCHAR(40),
    bairro VARCHAR(60),
    rua VARCHAR(60),
    numero VARCHAR(10),
    complemento VARCHAR(90),
    imagemPerfil VARCHAR(100),
    idUsuario INTEGER AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE jogo(
    nome VARCHAR(40) NOT NULL,
    capa VARCHAR(100) NOT NULL,
    anosUso INTEGER,
    categoria VARCHAR(20) NOT NULL,
    idUsuario INTEGER NOT NULL,
    FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario)
     ON DELETE cascade ON UPDATE cascade,
    idJogo INTEGER AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE deseja(
    idJogo INTEGER NOT NULL,
    idUsuario INTEGER NOT NULL,
    FOREIGN KEY(idJogo) REFERENCES jogo(idJogo),
    FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE troca(
    idJogoA INTEGER NOT NULL,
    idUsuarioA INTEGER NOT NULL,
    idJogoB INTEGER NOT NULL,
    idUsuarioB INTEGER NOT NULL,
    idTroca INTEGER AUTO_INCREMENT PRIMARY KEY,
    estado INTEGER NOT NULL,
    dataTroca TIMESTAMP NOT NULL,
    FOREIGN KEY(idJogoA) REFERENCES jogo(idJogo),
    FOREIGN KEY(idJogoB) REFERENCES jogo(idJogo),
    FOREIGN KEY(idUsuarioA) REFERENCES usuario(idUsuario),
    FOREIGN KEY(idUsuarioB) REFERENCES usuario(idUsuario)
);
CREATE TABLE IF NOT EXISTS produtos (
    idProduto INTEGER PRIMARY KEY AUTOINCREMENT,
    nomeProduto VARCHAR(50) NOT NULL,
    descProduto VARCHAR(500) NOT NULL,
    precoProduto FLOAT NOT NULL,
    estoqueProduto INTEGER NOT NULL,
    userInsert INTEGER NOT NULL,
    data_hora DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS logs (
    idLog INTEGER PRIMARY KEY AUTOINCREMENT,
    acaoLog VARCHAR(20) NOT NULL,
    data_hora DATETIME NOT NULL,
    userInsert INTEGER NOT NULL,
    idProduto INTEGER NOT NULL
);
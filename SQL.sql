CREATE DATABASE fruitshop CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fruitshop;

CREATE TABLE IF NOT EXISTS products (
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  productCode INT UNIQUE,
  name VARCHAR(200) NOT NULL,
  description VARCHAR(200) NOT NULL,
  dateExpiration DATETIME,
  price DECIMAL(10, 2),
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;

# DESC products;

# INSERT INTO products VALUES(0, 35687458, 'Laranja', 'Fruta Cítrica', DATE('2020-09-05 d-M-Y'), 2.98);
# -- ERRO AO INSERIR-> INSERT INTO products VALUES(0, 35687458, 'Abacate', 'Fruta fonte de boa gordura', DATE('2020-09-05 d-M-Y'), 2.98); -- #
# INSERT INTO products VALUES(0, NULL, 'Pêra', 'Fruta Macia', DATE('2020-09-05 d-M-Y'), 3.15);
# INSERT INTO products VALUES(0, NULL, 'Maça', 'Fruta', DATE('2020-09-05 d-M-Y'), 8.50);

SELECT * FROM products;

CREATE TABLE IF NOT EXISTS sales (
  saleId INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  productId INT(10) UNSIGNED NOT NULL,
  custormerId INT(10) UNSIGNED NOT NULL,
  quantity INT(10) UNSIGNED DEFAULT 1,
  productPrice DECIMAL(10, 2),
  dateSale DATETIME,
  total DECIMAL(10, 2),
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS customers (
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  name VARCHAR(200) NOT NULL,
  cpf INT(11) UNSIGNED UNIQUE NOT NULL,
  address VARCHAR(200),
  complement VARCHAR(200),
  cellphone VARCHAR(16) NOT NULL,
  contact VARCHAR(16),
  gender CHAR(1),
  dateBirth DATETIME
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARACTER SET utf8;

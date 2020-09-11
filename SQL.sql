CREATE DATABASE fruitshop CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fruitshop;

# DROP TABLE products;
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
# SELECT * FROM products;

# INSERT INTO products VALUES(0, 35687458, 'Laranja', 'Fruta Cítrica', DATE('2020-09-05 d-M-Y'), 2.98);
# -- ERRO AO INSERIR-> INSERT INTO products VALUES(0, 35687458, 'Abacate', 'Fruta fonte de boa gordura', DATE('2020-09-05 d-M-Y'), 2.98); -- #
# INSERT INTO products VALUES(0, NULL, 'Pêra', 'Fruta Macia', DATE('2020-09-05 d-M-Y'), 3.15);
# INSERT INTO products VALUES(0, NULL, 'Maça', 'Fruta', DATE('2020-09-05 d-M-Y'), 8.50);


# DROP TABLE sales;
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
# SELECT * FROM sales;

# DROP TABLE customers;
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
# SELECT * FROM customers;

# DROP table access_level;
CREATE TABLE IF NOT EXISTS access_level (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	description VARCHAR(255) UNIQUE NOT NULL,
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARACTER SET utf8;

INSERT INTO access_level (description) VALUES ('ADMIN'), ('USER');

# SELECT * FROM access_level;

# DROP TABLE user_access;
CREATE TABLE IF NOT EXISTS user_access
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	login VARCHAR(80) UNIQUE NOT NULL,
	password VARCHAR(72) NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at DATETIME,
	access_level_id INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT user_access_level_id
	FOREIGN KEY fk_user_acess_level_id(access_level_id)
	REFERENCES access_level(id)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;
# TRUNCATE TABLE user_access;
# SELECT * FROM user_access;

# INSERT INTO user_access (login, password, access_level_id) VALUES('gomes', '12345', 1);
# SHOW TABLES;



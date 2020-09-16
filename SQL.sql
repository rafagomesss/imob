CREATE DATABASE fruitshop CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fruitshop;

#####################################################################
############################# PRODUTOS #############################
#####################################################################

# DROP TABLE products;
CREATE TABLE IF NOT EXISTS products
(
    id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
    productCode VARCHAR(8) UNIQUE DEFAULT NULL,
    name VARCHAR(200) NOT NULL,
    description VARCHAR(200) DEFAULT NULL,
    dateExpiration DATETIME DEFAULT NULL,
    dateRegister DATETIME DEFAULT CURRENT_TIMESTAMP,
    price DECIMAL(10, 2),
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;
# DESC products;
# SELECT * FROM products;
# TRUNCATE products;

# INSERT INTO products VALUES(0, 35687458, 'Laranja', 'Fruta Cítrica', DATE('2020-09-05 d-M-Y'), null, 2.98);
# -- ERRO AO INSERIR-> INSERT INTO products VALUES(0, 35687458, 'Abacate', 'Fruta fonte de boa gordura', DATE('2020-09-05 d-M-Y'), null, 2.98); -- #
# INSERT INTO products VALUES(0, NULL, 'Pêra', 'Fruta Macia', DATE('2020-09-05 d-M-Y'), null, 3.15);
# INSERT INTO products VALUES(0, NULL, 'Maça', 'Fruta', DATE('2020-09-05 d-M-Y'), null, 8.50);
# INSERT INTO products VALUES(0, NULL, 'Uva', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare sem arcu, non eleifend arcu hendrerit vel. Suspendisse in eros feugiat, aliquam purus nec, semper nibh. Sed fermentum elit lectus, in sodales nulla dignissim vitae. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc gravida nisi non nisi interdum pulvinar. Nullam porttitor mi sem, a laoreet lectus rutrum vitae. Aliquam erat volutpat. Vestibulum tincidunt sed risus vitae fermentum. Nunc ut velit dui. Nunc lorem nibh, malesuada id risus aliquam, accumsan porttitor nisl. Aenean ex neque, ullamcorper non facilisis at, laoreet quis massa. In in vehicula erat. Donec molestie eros ac faucibus varius.', DATE('2020-09-05 d-M-Y'), null, 8.50);


USE fruitshop;
# DROP PROCEDURE getAllProductsNotExpired;
DELIMITER //

CREATE PROCEDURE getAllProductsNotExpired(
  IN code VARCHAR(8),
  IN product VARCHAR(200)
)
BEGIN
  SET @code := IF(code IS NULL, '', code);
  SET @product := IF(product IS NULL, '', product);
    SELECT
        *
    FROM products
    WHERE 
      productCode LIKE CONCAT(@code , '%') AND
      name LIKE CONCAT( '%', @product , '%')
      AND (DATE_FORMAT(dateExpiration, "%Y-%m-%d") >= DATE_FORMAT(NOW(), "%Y-%m-%d")
        OR dateExpiration IS NULL)
    ORDER BY CAST(productCode AS INT), dateRegister;
END //     

DELIMITER ;

  CALL getAllProductsNotExpired(null, 'A');

DELIMITER $$

CREATE PROCEDURE debug_msg(enabled INTEGER, msg VARCHAR(255))
BEGIN
  IF enabled THEN
    select concat('** ', msg) AS '** DEBUG:';
  END IF;
END $$

DELIMITER ;

/*
USE fruitshop;
# DROP PROCEDURE getAllProductsNotExpired;
DELIMITER //

CREATE PROCEDURE IF NOT EXISTS getAllProductsNotExpired(
    IN code INT(8),
    IN product VARCHAR(200)
)
BEGIN
    SELECT
        *
    FROM products
    WHERE CAST(productCode as VARCHAR(8)) LIKE '%' + code + '%'
        AND  name LIKE '%' + product+ '%'
        AND (DATE_FORMAT(dateExpiration, "%Y-%m-%d") >= DATE_FORMAT(NOW(), "%Y-%m-%d")
        OR dateExpiration IS NULL)
    ORDER BY dateRegister;
END //

DELIMITER ;

# CALL getAllProductsNotExpired('9548754',	'Limão');

USE fruitshop;
# DROP PROCEDURE getAllProducts;
DELIMITER //
*/
CREATE PROCEDURE IF NOT EXISTS getAllProducts()
BEGIN
    SELECT
        *
    FROM products
    ORDER BY dateRegister;
END //

DELIMITER ;

# CALL getAllProducts();


#####################################################################
############################## VENDAS ###############################
#####################################################################

# DROP TABLE sales;
CREATE TABLE IF NOT EXISTS sales
(
    saleId INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
    productId INT(10) UNSIGNED NOT NULL,
    custormerId INT(10) UNSIGNED NOT NULL,
    quantity INT(10) UNSIGNED DEFAULT 1,
    productPrice DECIMAL(10, 2),
    dateSale DATETIME,
    total DECIMAL(10, 2),
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;
# SELECT * FROM sales;


#####################################################################
############################# CLIENTES ##############################
#####################################################################
# DROP TABLE customers;
CREATE TABLE IF NOT EXISTS customers
(
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
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;
# SELECT * FROM customers;

#####################################################################
############################## ACESSO ###############################
#####################################################################
# DROP table access_level;
CREATE TABLE IF NOT EXISTS access_level
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) UNIQUE NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARACTER SET utf8;

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

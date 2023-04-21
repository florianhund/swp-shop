DROP DATABASE IF EXISTS OnlineShop;
CREATE DATABASE OnlineShop;
USE OnlineShop;

CREATE TABLE Category(
  ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(15)
);

CREATE TABLE Article(
  ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(15),
  Description VARCHAR(30),
  CategoryId INT,
  Price INT,
  FOREIGN KEY(CategoryId) REFERENCES Category(ID)
);

CREATE TABLE User(
  ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(30),
  Email VARCHAR(40),
  Password VARCHAR(30)
);

CREATE TABLE ProductsInCart(
  UserId INT NOT NULL,
  ArticleId INT NOT NULL,
  PriceAtInsert INT,
  Amount INT,
  FOREIGN KEY(UserId) REFERENCES User(ID),
  FOREIGN KEY(ArticleId) REFERENCES Article(ID),
  PRIMARY KEY(UserId, ArticleId)
);

CREATE TABLE BuyedProducts(
  UserId INT NOT NULL,
  ArticleId INT NOT NULL,
  PriceAtBuying INT,
  Time DATETIME,
  Amount INT,
  PRIMARY KEY(UserId, ArticleId, Time),
  FOREIGN KEY(UserId) REFERENCES User(ID),
  FOREIGN KEY(ArticleId) REFERENCES Article(ID)
);

INSERT INTO User VALUES (2000, 'Alvin Cicek', 'alvin.cicek@gmail.com', 'Secret');
INSERT INTO User VALUES (2001, 'Florian Hundegger', 'flo.hundegger@gmail.com', 'password');
INSERT INTO User VALUES (2002, 'Pascal Brandauer', 'pascal.brandauer@gmail.com', '6969');

INSERT INTO Category VALUES (100, 'Outdoor');
INSERT INTO Category VALUES (500, 'Television');
INSERT INTO Category VALUES (300, 'Clothing');
INSERT INTO Category VALUES (400, 'Drinks');

INSERT INTO Article VALUES (1000, 'Bycicle 3000', 'very fast', 100, 300);
INSERT INTO Article VALUES (1001, 'Football 01', 'WC 2014 Brazuca Adidas', 100, 100);
INSERT INTO Article VALUES (5000, 'Blu-Ray 01', 'die hard', 500, 15);
INSERT INTO Article VALUES (5001, 'Blu-Ray 02', 'fight club', 500, 15);
INSERT INTO Article VALUES (5002, 'Blu-Ray 03', 'apocalypse now', 500, 15);
INSERT INTO Article VALUES (3000, 'Jeans 01', 'baggy fit, dark blue', 300, 50);
INSERT INTO Article VALUES (3001, 'Jeans 02', 'cargo, beige', 300, 50);
INSERT INTO Article VALUES (4000, 'Vodka 01', 'Eristoff White', 400, 14);
INSERT INTO Article VALUES (4001, 'Beer 01', 'Zillertaler Märzen', 400, 2);
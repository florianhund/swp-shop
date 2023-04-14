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
  Time DATE,
  Amount INT,
  FOREIGN KEY(UserId) REFERENCES User(ID),
  FOREIGN KEY(ArticleId) REFERENCES Article(ID)
);

INSERT INTO User VALUES (2000, 'Alvin Cicek', 'alvin.cicek@gmail.com', 'Secret');

INSERT INTO Category VALUES (100, 'Outdoor');
INSERT INTO Article VALUES (1000, 'Bycicle 3000', 'very fast', 100, 300);
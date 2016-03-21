
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` VARCHAR(150) NOT NULL,    -- `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basket_id` varchar(60) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `quantity` double ,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) ,
  `order_id` varchar(50) ,
  `user_name` varchar(50) ,
  `user_address` varchar(50) ,
  `message` varchar(255) ,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` double ,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) UNIQUE,
  `passcode` varchar(50) ,
  `name` varchar(50) ,
  `address` varchar(50) ,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 ;



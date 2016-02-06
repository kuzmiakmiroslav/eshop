
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` VARCHAR(60) NOT NULL,     -- `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--



CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `quantity` varchar (60) NOT NULL,
  PRIMARY KEY (`id`),
 UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;



INSERT INTO `basket` (`id`, `product_code`,`quantity`) VALUES (`id`, `product_code`,`quantity`);
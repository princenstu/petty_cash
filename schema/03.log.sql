ALTER TABLE  `product_category` ADD  `image` VARCHAR( 120 ) NOT NULL AFTER  `name`;

--Notes--
ALTER TABLE  `orders` ADD  `notes` VARCHAR( 500 ) NOT NULL AFTER  `status`;

--different price of products in product table--

ALTER TABLE `products` ADD `price_1` FLOAT NOT NULL AFTER `price` ,
ADD `price_2` FLOAT NOT NULL AFTER `price_1` ,
ADD `price_3` FLOAT NOT NULL AFTER `price_2` ,
ADD `price_4` FLOAT NOT NULL AFTER `price_3` ,
ADD `price_5` FLOAT NOT NULL AFTER `price_4` ,
ADD `price_6` FLOAT NOT NULL AFTER `price_5` ,
ADD `price_7` FLOAT NOT NULL AFTER `price_6` ;

ADD `price_increment` FLOAT NOT NULL AFTER `price_14` ;



-- Table structure for table `discounts`

CREATE TABLE IF NOT EXISTS `discounts` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `expire_date` date NOT NULL,
  `is_enabled` tinyint(4) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `discounts` ADD `title` VARCHAR( 120 ) NOT NULL AFTER `discount_id`;


ALTER TABLE  `meta` ADD  `location_id` INT NOT NULL AFTER  `user_id`;

ALTER TABLE  `users` DROP  `location_id`;

--
-- Table structure for table `location_lang`
--

CREATE TABLE IF NOT EXISTS `location_lang` (
  `location_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `products_lang`
--

CREATE TABLE IF NOT EXISTS `products_lang` (
  `product_info_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `product_category_lang`
--

CREATE TABLE IF NOT EXISTS `product_category_lang` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--------------------------------------------------------------------

ALTER TABLE `orders` ADD `affiliate_id` INT NULL AFTER `order_date`;

CREATE TABLE `affiliates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `details` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `link` varchar(5) NOT NULL DEFAULT '',
  `create_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


----------meta data for user registration

ALTER TABLE `meta` ADD `title` VARCHAR( 50 ) NOT NULL AFTER `phone` ,
ADD `skill` VARCHAR( 50 ) NOT NULL AFTER `title` ,
ADD `birthdate` DATE NOT NULL AFTER `skill` ,
ADD `note` VARCHAR( 250 ) NOT NULL AFTER `birthdate` ,
ADD `height` FLOAT NOT NULL AFTER `note` ,
ADD `weight` FLOAT NOT NULL AFTER `height` ,
ADD `show_size` INT NOT NULL AFTER `weight` ;

--01/02/2013--
ALTER TABLE `meta` CHANGE `note` `notes` VARCHAR( 250 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE `show_size` `shoe_size` INT( 11 ) NOT NULL ;

ALTER TABLE `meta` CHANGE `birthdate` `birth_date` DATE NOT NULL ;

--06/02/2013--

--
-- Table structure for table `affiliate_details`
--

CREATE TABLE IF NOT EXISTS `affiliate_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliate_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


ALTER TABLE  `orders` CHANGE  `user_id`  `user_id` INT( 11 ) NULL;
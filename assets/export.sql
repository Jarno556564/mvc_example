CREATE DATABASE IF NOT EXISTS `user_db`;

USE `user_db`;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Leanne Graham', '1-770-736-8031 x56442', 'Sincere@april.biz', 'Gwenborough'),
(2, 'Ervin Howell', '010-692-6593 x09125', 'Shanna@melissa.tv', 'Wisokyburgh'),
(3, 'Clementine Bauch', '1-463-123-4447', 'Nathan@yesenia.net', 'McKenziehaven'),
(4, 'Patricia Lebsack', '493-170-9623 x156', 'Julianne.OConner@kory.org', 'South Elvis'),
(5, 'Jennifer Smith', '555-555-5555', 'jennifer.smith@example.com', 'Smithtown'),
(6, 'Erin Smith', '555-123-4567', 'erin.smith@example.com', 'Smithville'),
(7, 'John Doe', '123-456-7890', 'john.doe@example.com', 'Doeville'),
(8, 'Alice Johnson', '987-654-3210', 'alice.johnson@example.com', 'Johnsonville'),
(9, 'Bob Anderson', '333-555-7777', 'bob.anderson@example.com', 'Andersonville'),
(10, 'Emily Doe', '(555)777-8888', 'emily.doe@example.com', 'Whiteville');

CREATE TABLE `products` (
  `product_id` int(6) NOT NULL,
  `product_type_code` int(6) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `other_product_details` varchar(255) NOT NULL,
  `exp_date` date DEFAULT NULL,
  PRIMARY KEY (`product_id`)
);

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
(1, 1, 5, 'Soda', '1.99', '500ml bottle'),
(2, 2, 6, 'Latte', '3.49', 'Medium'),
(3, 5, 7, 'Chicken Tenders', '5.99', '6 pieces'),
(4, 3, 8, 'Fish and Chips', '7.99', 'Large'),
(5, 6, 9, 'Salad Bowl', '4.49', 'Greek Salad'),
(6, 4, 10, 'Orange Juice', '2.49', 'Freshly squeezed, 16 oz'),
(7, 1, 11, 'Cola', '1.99', 'Can, 12 oz'),
(8, 2, 12, 'Cappuccino', '3.99', 'Large'),
(9, 5, 13, 'Cheeseburger', '6.49', 'With fries'),
(10, 3, 14, 'BBQ Ribs', '9.99', 'Full rack'),
(11, 6, 15, 'Vegetarian Pizza', '8.99', 'Large, assorted veggies'),
(12, 1, 16, 'Root Beer', '2.29', '16 oz bottle'),
(13, 2, 17, 'Espresso', '2.99', 'Single shot'),
(14, 5, 18, 'Caesar Salad', '5.49', 'Classic, with dressing'),
(15, 4, 19, 'Apple Cider', '3.49', 'Freshly pressed, 12 oz');


ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `products`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

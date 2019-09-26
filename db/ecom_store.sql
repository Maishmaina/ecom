-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 10:43 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us', 'Test Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut doloremque, unde voluptatum est minus nobis a, odio omnis harum mollitia maiores magnam ea, repellat optio quas, saepe nemo dolorem repudiandae atque totam ipsam dicta. Dolor nisi beatae incidunt atque rerum.		', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut doloremque, unde voluptatum est minus nobis a, odio omnis harum mollitia maiores magnam ea, repellat optio quas, saepe nemo dolorem repudiandae atque totam ipsam dicta. Dolor nisi beatae incidunt atque rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut doloremque, unde voluptatum est minus nobis a, odio omnis harum mollitia maiores magnam ea, repellat optio quas, saepe nemo dolorem repudiandae atque totam ipsam dicta. Dolor nisi beatae incidunt atque rerum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_county` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_county`, `admin_job`, `admin_about`) VALUES
(1, 'DM', 'Daniel@gmail.com', '123admin', 'njuguna1.JPG', '0728579156', 'Nyandarua', 'B.E.C', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolorem facilis aliquam veritatis quam sint, beatae quaerat id totam dolor.'),
(2, 'AD', 'ad@gmail.com', 'admin123', 'experts5.jpg', '0791525858', 'Nairobi', 'F.E.D', 'This is the working frnt end developer within the company and He has designed a number of the template from the most familiar system like wordPress and Important Themes that can be used for the work of online-store and purchase process');

-- --------------------------------------------------------

--
-- Table structure for table `box_section`
--

CREATE TABLE `box_section` (
  `box_id` int(11) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box_section`
--

INSERT INTO `box_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'GET HELPED', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel repellat est atque?'),
(2, 'PRODUCTS ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel repellat est atque?'),
(3, 'OVER 1 ROOF', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel repellat est atque?');

-- --------------------------------------------------------

--
-- Table structure for table `bundle_product_relation`
--

CREATE TABLE `bundle_product_relation` (
  `rel_id` int(11) NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bundle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bundle_product_relation`
--

INSERT INTO `bundle_product_relation` (`rel_id`, `rel_title`, `product_id`, `bundle_id`) VALUES
(9, 'kitchen bundle one', 3, 13),
(10, 'kitchen bundle two', 7, 13),
(11, 'kitchen bundle three', 2, 13),
(12, 'kitchen bundle four', 6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `p_add` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `p_add`, `qty`, `p_price`, `size`) VALUES
(5, '127.0.0.1', 1, '110', 'Small'),
(11, '127.0.0.1', 1, '200', 'Small');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Agriculture', 'yes', 'product_jembe1.jpg'),
(2, 'Kitchens', 'yes', 'product_kitch12.jpg'),
(3, 'Building', 'no', 'njuguna1.jpg'),
(4, 'Domestic', 'no', 'njuguna1.jpg'),
(5, 'Furniture', 'no', 'njuguna1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'simpledaniel.1818@gmail.com', 'Contact us', 'Some one need help? Very serious bug experienced during the cart control							');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(11) NOT NULL,
  `coupon_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(3, 8, 'Purchased twice', '240', '5678', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_county` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` varchar(255) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_county`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(5, 'juma', 'juma@gmail.com', 'juma', 'Kilifi', 'Kilifi', '0728579166', '234', 'experts5.jpg', '127.0.0.1', ''),
(6, 'edwin', 'edotemba1@gmail.com', '1234567890', 'Nairobi', 'Nairobi', '0728579166', '234', 'inter_errorz.png', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_amount` int(255) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(16, 5, 400, 626666118, 2, 'Medium', '2019-05-17 08:30:12', 'Complete'),
(17, 5, 550, 567176555, 1, 'Small', '2019-05-17 09:36:34', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `icon_id` int(11) NOT NULL,
  `icon_product` int(11) NOT NULL,
  `icon_title` varchar(255) NOT NULL,
  `icon_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`icon_id`, `icon_product`, `icon_title`, `icon_image`) VALUES
(1, 1, 'icon_test-found', 'edit.png'),
(2, 2, 'icon-two', 'edit.png'),
(3, 3, 'icon-three', 'exit.png'),
(4, 4, 'inco-four', 'addemployee.png'),
(8, 9, 'SecondTest', 'job.png');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_types`
--

CREATE TABLE `inquiry_types` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry_types`
--

INSERT INTO `inquiry_types` (`inquiry_id`, `inquiry_title`) VALUES
(1, 'order delay'),
(2, 'steps complexity'),
(3, 'late delivery'),
(4, 'Price Hike');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Daniel soft', 'no', 'admin.jpg'),
(2, 'John main', 'no', 'njuguna1.jpg'),
(3, 'joseph seaker', 'yes', 'njuguna1.jpg'),
(4, 'zukabhag', 'no', 'njuguna1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 47706214, 0, 'M-Express', 0, 1234, '3/28/2019'),
(3, 2085149269, 0, 'M-Express', 0, 98765, '3/28/2019'),
(4, 80395482, 0, 'Airtel Money', 0, 123, '05/04/2019'),
(5, 1200938089, 0, 'Airtel Money', 0, 123, '05/05/2019'),
(6, 1200938089, 0, 'Bank Code', 0, 123, '05/05/2019'),
(7, 626666118, 400, 'Airtel Money', 0, 12345, '05/17/2019'),
(8, 626666118, 400, 'Western Union', 9876, 4567, '05/17/2019'),
(9, 626666118, 400, 'M-Express', 0, 12345, '29/08/2019');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(8, 5, 626666118, '11', 2, 'Medium', 'Complete'),
(9, 5, 567176555, '8', 1, 'Small', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keyword` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `data`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keyword`, `product_label`, `status`) VALUES
(1, 4, 4, 2, '2019-05-11 12:52:10', 'Fork Farm', 'farm-fork-jembe', 'product_jembe1.jpg', 'produc_jembe.jpg', 'product_buil1.jpg', 260, 240, '<p>Many Kenyan farmers understand how handy a good&nbsp;fork jembe&nbsp;comes in. It easily breaks through hard ground, allowing you to cultivate</p>', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '    	  		    	  		    	  		 <iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/4qoyZCQO0V8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    ', 'Farm Tool', 'Sale', 'product'),
(2, 7, 2, 3, '2019-04-29 12:21:28', 'Sufuria', 'product-url-2', 'product_kitch5.jpg', 'product_kitch4.jpg', 'product_kitch9.jpg', 150, 149, 'This is for the most special metal in the world with the all sort of antrust and then.thus is the test message which will mean thatÂ 							', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Sufuria', 'Gift', 'product'),
(3, 6, 2, 4, '2019-04-29 12:22:45', 'Kettle', 'product-url-3', 'product_kitch9.jpg', 'product_kich2.jpg', 'product_kitch5.jpg', 200, 150, 'Kettle mean more than just tea. science has it that if the kettle is oky there is a great chance that your spouse will remain with you most of the timeÂ 							', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Kettle', 'Sale', 'product'),
(4, 5, 5, 1, '2019-04-29 12:24:07', 'sofa set', 'product-url-4', 'funiture.jpg', 'funiture1.jpg', 'funiture2.jpg', 2000, 0, 'The products are just awesome worth all sort of design and layout that worth a purchase. this product are designed and implemented by the you guys with motive to get return from their hustle							', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Four piece sofa set', 'New', 'product'),
(5, 3, 2, 2, '2019-04-29 12:25:58', 'Mopping bucket', 'product-url-5', 'product_stor.jpg', 'product_stor4.jpg', 'product_stor3.jpg', 120, 110, 'The real meaningÂ  of great re-using can only be found in the jua kali sector with great expert interested in making the end meet by working very hand in their day to day activities						', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'mopping bucket', 'Sale', 'product'),
(6, 7, 2, 3, '2019-04-29 12:27:42', 'Cooking pot', 'product-url-6', 'product_stor2.jpg', 'product_kitch3.jpg', 'product_kitch4.jpg', 199, 188, 'This are the best product, that can facilitate all form of cookingÂ  fire. it is the jua kali at its best. the guys have designed it with passion andÂ  effort to the level of its optimal level			', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'cooking pot', 'Sale', 'product'),
(7, 6, 2, 2, '2019-04-29 12:29:18', 'Frying pan', 'product-url-7', 'kitchen.jpg', 'product_kitch6.jpg', 'product_kitch12.jpg', 149, 120, 'This product is designed to facilitate and ensure thatÂ  just small amount of the cooking power and then you are good to go with the speed of the lighteningÂ 						', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Frying pan', 'Offer', 'product'),
(8, 4, 1, 1, '2019-04-29 12:31:14', 'Cake Steamer', 'product-url-8', 'wheelbarrow.jpg', 'product_agri4.jpg', 'product_agri3.jpg', 599, 550, 'It is designed not just for the baking industry but also for theÂ  individual who are interested in home baked products							', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'farmware', 'Sale', 'product'),
(9, 6, 2, 1, '2019-04-29 11:30:21', 'Rail', 'product-url-9', 'product_kich2.jpg', 'product_kitch2.jpg', 'product_kitch10.jpg', 399, 300, 'This are the best product, that can facilitate all form of cooking  fire. it is the jua kali at its best. the guys have designed it with passion and  effort to the level of its optimal level', 'ua Kali Products is the most convenient destination for buying customized stainless steel products and kitchen equipment. Our mission is to deliver to quality, Kenyan-made appliances - custom built according to each customer\'s unique preferences', '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/fHjOai3rYYo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'rails', 'Offer', 'product'),
(11, 6, 2, 1, '2019-05-15 08:01:01', 'Jiko fast', 'jiko-fast-cook', 'jiko.jpg', 'product_kitch2.jpg', 'kitchen.jpg', 200, 160, '  		<p>This is the only jiko that can facilitate fast cooking with minimum amount of power required. When you have just few amout of fuel please consider using this type of jiko and thank us later.</p>  	', '    	  		<p>It is a fast and fuel saving jiko. the only jiko that can facilitate fast cooking with minimum amount of power required. When you have just few amout of fuel please consider using this type of jiko and thank us later</p>\r\n    ', '    	  		    	  		<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/4qoyZCQO0V8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n    \r\n    ', 'jiko-fast', 'New', 'product'),
(13, 9, 2, 3, '2019-05-17 08:19:11', 'kitchen Utensil Bundle', 'kitchen-utensil-jua-kali', 'product_kitch3.jpg', 'product_stor2.jpg', 'product_kitch4.jpg', 200, 199, 'This are the best product, that can facilitate all form of cooking  fire. it is the jua kali at its best. the guys have designed it with passion and  effort to the level of its optimal level', 'This are the best product, that can facilitate all form of cooking  fire. it is the jua kali at its best. the guys have designed it with passion and  effort to the level of its optimal level', '  	  		    	  		    	  		<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/4qoyZCQO0V8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'kitchen staff', 'Sale', 'bundle');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, ' designer Tank', 'no', 'product_kitch12.jpg'),
(2, 'Fork Jembe', 'no', 'njuguna1.jpg'),
(3, 'farm power', 'no', 'njuguna1.jpg'),
(4, 'farm metals', 'no', 'njuguna1.jpg'),
(5, 'comfort furniture', 'no', 'njuguna1.jpg'),
(6, 'Hard Cooking', 'yes', 'njuguna1.jpg'),
(9, 'Kettle', 'yes', 'product_kitch4.jpg'),
(10, 'Power Machine', 'yes', 'product_agri4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `service_button` varchar(255) NOT NULL,
  `service_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_title`, `service_image`, `service_desc`, `service_button`, `service_url`) VALUES
(1, 'Gift Package', 'service-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.', 'Contact for rating and more', 'http://127.0.0.1:8090/ecom/shop.php'),
(3, 'Wedding staff', 'service-3.jpg', '		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio tenetur totam, magnam corrupti suscipit consequatur non quam ipsum, voluptas vitae, maiores veritatis hic, illum et voluptates tempore corporis atque molestiae nobis fuga est ullam distinctio sunt similique libero. Tempore, recusandae.	', 'More detail and rate', 'http://127.0.0.1:8090/ecom/shop.php'),
(5, 'Surprise', 'service-2.jpg', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit sit officiis, perferendis deserunt quam debitis alias eligendi ut magnam sed.		', 'Contact us ', 'http://127.0.0.1:8090/ecom/shop.php');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(1, 'Slider Number One ', 'download.jpg', 'http://127.0.0.1:8090/ecom/shop.php'),
(2, 'Slider Number Two', 'experts3.jpg', 'http://127.0.0.1/ecom/shop.php'),
(3, 'Slider Number Three', 'slider4.jpeg', 'http://127.0.0.1:8090/ecom/shop.php'),
(9, 'Slider Number Four', 'shoes.jpg', 'http://127.0.0.1/ecom/shop.php'),
(10, 'Slider Number Five', 'beauty.png', 'http://127.0.0.1/ecom/shop.php');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL,
  `term_title` varchar(255) NOT NULL,
  `term_link` varchar(255) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Term and Condition', 'link1', '<p>The legal issues affecting online business are significant, and can include federal, state, and local taxation, corporate and securities law, liability insurance, copyrights, and trademarks. Keeping your legal affairs in order can help save the high costs of future litigation. By implementing policies and procedures designed to protect your property rights and information, you will be one step ahead of those that do not. Good practice would include implementing the followingentries, responses, or other correspondence, whether by e-mail or otherwise. The Promoter reserves the right in it sole and absolute discretion to cancel, modify or suspend the Official Rules or the Promotion in whole or in part, without liability to the participant. The amended and restated Official Rules shall be effective immediately upon posting on the Alibaba.com website. After posting of the amended and restated Official Rules, the participants continued participation in the Promotion shall be deemed to be its acceptance of the amended and restated Official Rules. The Promoter reserves the right to disqualify any participant in its sole discretion.</p>'),
(2, 'Refund Policy', 'link2', 'To the maximum extent permitted by law, in no event shall the Promoter be liable to any participant for any direct, indirect, special, incidental, exemplary, punitive or consequential damages (including loss of use, data, business or profits) arising out of or in connection with the participant’s participation in the Promotion, whether such liability arises from any claim based upon contract, warranty, tort (including negligence), strict liability or otherwise, and whether or not Promoter has been advised of the possibility of such loss or damage.'),
(3, 'Pricing and Promotion Policy', 'link3', '<p>Registered members of the Alibaba.com. Employees, officers and directors of the Promoter and their respective immediate family members, affiliated and subsidiary companies, any company involved in the Contest, together with their agents are not eligible to enter. Registered members of the Alibaba.com. Employees, officers and directors of the Promoter and their respective immediate family members, affiliated and subsidiary companies, any company involved in the Contest, together with their agents are not eligible to enter.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(2, 5, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `box_section`
--
ALTER TABLE `box_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`icon_id`);

--
-- Indexes for table `inquiry_types`
--
ALTER TABLE `inquiry_types`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `box_section`
--
ALTER TABLE `box_section`
  MODIFY `box_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  MODIFY `rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `icon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiry_types`
--
ALTER TABLE `inquiry_types`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

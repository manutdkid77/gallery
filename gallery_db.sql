-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 02:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` char(255) NOT NULL,
  `body` char(255) NOT NULL,
  `date` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`, `date`) VALUES
(6, 14, 'Ken Horton', 'Wow, what an awesome beast of a machine!', '09.11.16');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `description` char(255) NOT NULL,
  `filename` char(255) NOT NULL,
  `type` char(255) NOT NULL,
  `size` int(11) NOT NULL,
  `date` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `filename`, `type`, `size`, `date`) VALUES
(14, 'Lamborghini Gallardo', 'A sports car built by Lamborghini from 2003 to 2013. It is Lamborghini''s best-selling model with 14,022 being built throughout its lifetime', 'Lamborghini Gallardo LP 570-4 Superleggera (1).jpg', 'image/jpeg', 35165, 'Saturday 10th of September 2016 05:51:39 PM'),
(17, 'Aston Martin Db9', 'Available both as a coupe and a convertible known as the Volante, the DB9 was the successor of the DB7. It was the first model built at Aston Martin''s Gaydon facility. The DB9, designed by Henrik Fisker, is made largely of aluminium. The chassis is the VH', 'Aston On The Run.png', 'image/png', 102501, 'Sunday 11th of September 2016 04:48:38 PM'),
(18, 'Ferrari F430', 'The F430 hails the arrival of a whole new generation of Ferrari V8-engined berlinettas. Every inch of the car was inspired by the engineering research carried out at Ferrariâ€™s Gestione Sportiva F1 Racing Division. The result is a highly innovative desig', 'Odd One Out.png', 'image/png', 151103, 'Sunday 11th of September 2016 04:52:54 PM'),
(19, 'Porsche Cayman S', 'The Cayman is a stand-alone car, one distanced from the roadster that shares its engines, transmissions, and architecture by virtue of being stiffer, more powerful, and sportier.', 'Porsche Cayman S.jpg', 'image/jpeg', 31140, 'Sunday 11th of September 2016 04:54:47 PM'),
(20, 'Audi R8', 'The R8 canâ€™t help but steal the spotlight. With its sharp, angular lines and exotic, glass-covered engine, the R8 has a wide and commanding presence that makes it impossible to look anywhere else.', 'Audi R8 Alps2.jpg', 'image/jpeg', 26727, 'Sunday 11th of September 2016 04:56:05 PM'),
(21, 'Lamborghini Aventador', 'Brutally powerful and obscenely flamboyant, the Aventador is unburdened by reality. Crazy expensive and crazy fast, itâ€™s capable of amazing performance without feeling like itâ€™s going to snap-spin into a ditch, which is refreshing in a supercar.', 'Lambo Aventador (2).jpg', 'image/jpeg', 34092, 'Sunday 11th of September 2016 04:57:17 PM'),
(22, 'Dodge Viper SRT 10', 'The Viper is both all-American and a true exotic, with lots of curves and bulges in all the right places to let you know it means business. The long nose, bodacious body, and predatory stare give the Viper a menacing look, while its 645-hp, 8.4-liter V-10', 'Dodge Viper SRT10 ACR (2).jpg', 'image/jpeg', 30624, 'Sunday 11th of September 2016 04:58:32 PM'),
(23, 'Pagani Huayra', 'Ludicrous in every way and utterly fascinating in every gorgeous detail, this is a 720-hp, mid-engined, million-dollar supercar for those who have grown bored with mere Ferraris and Lamborghinis and already have two Bugattis. Somewhat obscure, and very lo', 'Pagani Huayra (1).jpg', 'image/jpeg', 19396, 'Sunday 11th of September 2016 05:00:13 PM'),
(24, 'BMW M3 Wheels', 'Chrome Plated BMW Wheels', 'Bimmer Wheels.png', 'image/png', 105630, 'Sunday 11th of September 2016 05:02:36 PM'),
(25, 'Ford GT', 'Home / Ford / Ford GT\r\nFord GT\r\n \r\n VIEW PHOTOS\r\n\r\n2017 Ford GT shown\r\nMSRP\r\n$400,000 \r\nNo MSRP available. This is an estimated base MSRP for a 2017 Ford GT.\r\nLeaseFinance\r\nN/A\r\nFord has approved 500 lucky people to purchase a GT this year; the rest of us', 'Ford GT Vintage.png', 'image/png', 99850, 'Sunday 11th of September 2016 05:03:36 PM'),
(26, 'Bently Continental SuperSports', 'As a favorite of rappers, superstar athletes, and million- and billionaires, the Continental has something for everyone with Louis Vuitton valises full of cash.', 'Bentley Continental Supersports Coupe (2).jpg', 'image/jpeg', 75674, 'Sunday 11th of September 2016 05:04:43 PM'),
(27, 'Mercedes SLS AMG', 'These AMG twins are the high-performance roadsters for those who refuse to settle for anything less than awesome. The SL63 has a 577-hp 5.5-liter twin-turbo V-8 mated to a seven-speed automatic.', 'Mercedes SLS AMG Desert Gold.jpg', 'image/jpeg', 37055, 'Sunday 11th of September 2016 05:06:58 PM'),
(61, 'Nissan GTR', 'The Nissan GT-R can accelerate from 0-60 in just 2.8sec, placing it alongside hypercar royalty such as the McLaren P1 and Ferrari LaFerrari. It even matches the ultra-lightweight Caterham 620R despite weighing three times as much. And on an open stretch o', 'Nissan GTR.jpg', 'image/jpeg', 34892, 'Monday 12th of September 2016 10:22:57 AM'),
(62, 'Mazda RX 7', 'Mazda''s 1.3L sequentially turbocharged rotary engine''s gotten a bad rep, mostly because of overzealous and ham-fisted loons and their hardware store boost controllers and their failure to grasp air-to-fuel ratios. As it turns out, though, the world''s firs', 'Mazda.jpg', 'image/jpeg', 22210, 'Monday 12th of September 2016 10:26:38 AM'),
(63, 'Bugatti Veyron', 'The Bugatti Veyron 16.4 with over 1000 hp and a top speed of more than 400 km/h is considered to be the ultimate super sports car.', 'Bugatti Veyron Chrome.png', 'image/png', 140479, 'Monday 12th of September 2016 10:27:42 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `first_name` char(255) NOT NULL,
  `last_name` char(255) NOT NULL,
  `avatar_name` char(255) NOT NULL,
  `random_avatar` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `avatar_name`, `random_avatar`) VALUES
(1, 'metallica', 'metallica', 'james', 'hetfield', '29.jpg', 'no'),
(2, 'megadeth', 'megadeth', 'dave', 'mustaine', '66.jpg', 'no'),
(3, 'slipknot', 'slipknot', 'corey', 'taylor', '80.jpg', 'no'),
(21, 'paul', 'paul', 'Paul #4', 'Gray', 'https://s3.amazonaws.com/uifaces/faces/twitter/big_theory_/128.jpg', 'yes'),
(22, 'brian_head', 'guitar', 'Brian Head', 'Welch', '50.jpg', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2025 at 09:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `content`, `image`, `category`, `created_at`) VALUES
(6, 4, 'Burger', 'Bread, Cheese, Onion, Sauce', '1755313841_689ff6b1a18e9.png', 'Main Dish', '2025-08-16 03:10:41'),
(7, 4, 'Fried Chicken', 'Chicken, Oil, Flour', '1755314063_689ff78fe041d.jpg', 'Main Dish', '2025-08-16 03:14:23'),
(8, 4, 'Ramen', 'Noodle, Seaweed, Shrimp', '1755314158_689ff7ee482b3.jpg', 'Main Dish', '2025-08-16 03:15:58'),
(9, 4, 'Kimchi', 'Cucumber, Fish Sauce, Salt', '1755314263_689ff85722fdb.webp', 'Side Dish', '2025-08-16 03:17:43'),
(10, 4, 'Fried Rice', 'Rice, Oil, Egg', '1755314353_689ff8b16ebe4.webp', 'Main Dish', '2025-08-16 03:19:13'),
(11, 4, 'Sushi', 'Fish, Rice, Fish Eggs', '1755314411_689ff8ebd8c8e.jpg', 'Main Dish', '2025-08-16 03:20:11'),
(12, 4, 'Chocolate Cake', 'Chocolate, Flour, Oil', '1755314503_689ff947c7490.jpg', 'Dessert', '2025-08-16 03:21:43'),
(13, 4, 'Chow Mein', 'Noodle, Oil, Meat, Tofu', '1755314581_689ff995b2fbb.jpg', 'Main Dish', '2025-08-16 03:23:01'),
(14, 4, 'Mapo Tofu', 'Tofu, Spicy Sauce, Meat, Oil', '1755314642_689ff9d29bbdb.webp', 'Main Dish', '2025-08-16 03:24:02'),
(15, 4, 'Kung Pao Chicken', 'Chicken, Oil, Peanuts, Chili', '1755314711_689ffa17832f4.jpg', 'Main Dish', '2025-08-16 03:25:11'),
(16, 4, 'Spring Rolls', 'Vegetable, Oil, Onion', '1755314763_689ffa4bd398a.jpg', 'Main Dish', '2025-08-16 03:26:03'),
(17, 4, 'Pancake', 'Flour, Oil, Honey', '1755314859_689ffaab0d395.jpg', 'Main Dish', '2025-08-16 03:27:39'),
(18, 4, 'Fish Curry', 'Fish, Sauce, Vegetable', '1755315003_689ffb3bdccd2.jpg', 'Main Dish', '2025-08-16 03:30:03'),
(19, 4, 'Samosa', 'Potato, Vegetable, Peas, Onion', '1755315114_689ffbaa2cebe.jpg', 'Main Dish', '2025-08-16 03:31:54'),
(20, 4, 'Pad Thai', 'Noodle, Egg, Sugar, Peanuts', '1755315188_689ffbf421482.jpg', 'Main Dish', '2025-08-16 03:33:08'),
(21, 4, 'Pho', 'Noodle, Herbs, Meat', '1755315228_689ffc1cf05b1.jpg', 'Main Dish', '2025-08-16 03:33:48'),
(22, 4, 'Bibimbap', 'Rice, Meat, Egg, Vegetable', '1755315368_689ffca88ef5c.jpg', 'Main Dish', '2025-08-16 03:36:08'),
(23, 4, 'Bánh Mì', 'Meat, Savoury Vegetable', '1755315435_689ffceb0c0ac.png', 'Side Dish', '2025-08-16 03:37:15'),
(24, 4, 'Nasi Goreng', 'Rice, Vegetable, Oil', '1755315499_689ffd2bbac2b.jpg', 'Main Dish', '2025-08-16 03:38:19'),
(25, 4, 'Nasi Goreng', 'Rice, Egg, Oil', '1755315537_689ffd518c302.jpg', 'Main Dish', '2025-08-16 03:38:57'),
(26, 4, 'Adobo', 'Meat, Vegetable, Oil', '1755315626_689ffdaac6b7b.jpg', 'Main Dish', '2025-08-16 03:40:26'),
(27, 4, 'Bulgogi', 'Beef, Oil, Salt', '1755315677_689ffdddea0cb.jpg', 'Main Dish', '2025-08-16 03:41:17'),
(28, 4, 'Hummus', 'Mashed chickpeas, Lemon juice, Garlic', '1755315770_689ffe3a44b50.jpeg', 'Main Dish', '2025-08-16 03:42:50'),
(29, 4, 'Hainanese Chicken Rice', 'Rice, Chicken, Chili Sauce', '1755315828_689ffe74ce742.jpg', 'Main Dish', '2025-08-16 03:43:48'),
(30, 4, 'Laksa', 'Noodle, Chicken, Salts, Prawns', '1755315892_689ffeb405c3f.webp', 'Main Dish', '2025-08-16 03:44:52'),
(31, 4, 'Jiaozi', 'Meat, Vegetable', '1755315958_689ffef607223.jpg', 'Side Dish', '2025-08-16 03:45:58'),
(32, 4, 'Pasta', 'Spaghetti, lasagna, carbonara, macaroni, cheese', '1755316026_689fff3a7a028.webp', 'Main Dish', '2025-08-16 03:47:06'),
(33, 4, 'Poultry', 'Chicken, Oil, Vegetable', '1755316087_689fff77d5bf3.webp', 'Main Dish', '2025-08-16 03:48:07'),
(34, 4, 'Caesar salad', 'Romaine lettuce, parmesan cheese, croutons, and dressing', '1755316172_689fffcc7ec28.jpg', 'Main Dish', '2025-08-16 03:49:32'),
(35, 4, 'Pizza', 'Dough, tomato sauce, cheese, and various toppings', '1755316222_689ffffe08b04.jpg', 'Main Dish', '2025-08-16 03:50:22'),
(36, 4, 'Shepherd\'s Pi', 'Ground meat (lamb or beef), vegetables (peas, carrots, etc.), mashed potatoes', '1755316310_68a0005635d8c.jpg', 'Main Dish', '2025-08-16 03:51:50'),
(37, 4, 'Mashed Potatoes', 'Potatoes, milk, butter, salt, and pepper', '1755316422_68a000c631f73.jpg', 'Side Disb', '2025-08-16 03:53:42'),
(38, 4, 'Casseroles', 'Meat, vegetables, and a sauce or topping', '1755316513_68a00121d0f76.jpg', 'Main Dish', '2025-08-16 03:55:13'),
(39, 4, 'Paella', 'rice, saffron, chicken, rabbit, green beans, and sometimes snails', '1755316585_68a0016941ceb.jpeg', 'Main Dish', '2025-08-16 03:56:25'),
(40, 4, 'Gazpacho', 'tomatoes, bread, cucumber, onion, garlic, green pepper, and olive oil', '1755316644_68a001a43f51f.jpg', 'Main Dish', '2025-08-16 03:57:24'),
(41, 4, 'Fabada Asturiana', 'white beans, chorizo, morcilla, and pork belly', '1755316685_68a001cd202c8.jpg', 'Main Dish', '2025-08-16 03:58:05'),
(42, 4, 'Tortilla Española', 'eggs, potatoes, and sometimes onions.', '1755316747_68a0020b84b30.webp', 'Dessert', '2025-08-16 03:59:07'),
(43, 4, 'Patatas Bravas', 'spicy bravas sauce, often made with pimentón (smoked paprika), olive oil, and flour.', '1755316794_68a0023ae3a9c.jpg', 'Side Dish', '2025-08-16 03:59:54'),
(44, 4, 'Gambas al Ajillo', 'Garlic shrimp, cooked in olive oil with garlic and chili peppers.', '1755316836_68a00264d15d0.jpeg', 'Main Dish', '2025-08-16 04:00:36'),
(45, 4, 'Jamón Ibérico', 'Cured ham made from Iberian pigs, known for its rich flavor.', '1755316893_68a0029d4725d.jpeg', 'Main Dish', '2025-08-16 04:01:33'),
(46, 4, 'Cocido Madrileño', 'vegetables, potatoes, and various meats.', '1755316976_68a002f0c5f5f.jpg', 'Main Dish', '2025-08-16 04:02:56'),
(47, 4, 'Churros', 'Fried-dough pastry, often eaten for breakfast or as a snack, sometimes dipped in chocolate.', '1755317023_68a0031f6ff36.webp', 'Dessert', '2025-08-16 04:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(4, 'John', 'Smith', 'john@gmail.com', '$2y$10$3THE0VKekW5kCmPhMczfGey/.gKmoQhjzFSzYeV6kvQ/b844rGfI2'),
(5, 'test', 'test', 'testone@gmail.com', '$2y$10$uevy4Peza/vW914XOW8gdu6S19yn1d4Abxymv1wXzdRKnL9YP017u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

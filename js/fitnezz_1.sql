-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2021 at 03:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnezz`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`cat_id`, `cat_name`) VALUES
(1, 'fruits'),
(2, 'vegetables'),
(3, 'dairy'),
(4, 'grains'),
(5, 'proteins');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `his_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_his` date NOT NULL,
  `time_his` time NOT NULL,
  `total_calories` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_details`
--

CREATE TABLE `history_details` (
  `detail_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `in_id` int(11) NOT NULL COMMENT 'ingredients id',
  `amount` decimal(10,0) NOT NULL COMMENT 'how many kg of this ingredient',
  `total` int(11) NOT NULL COMMENT 'total calories of this ingredient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ibm`
--

CREATE TABLE `ibm` (
  `idBMI` int(11) NOT NULL,
  `idUsers` int(11) DEFAULT NULL,
  `infoBMI` float DEFAULT NULL,
  `statusBMI` int(11) DEFAULT NULL,
  `dateBMI` date DEFAULT NULL,
  `timeBMI` time DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ibm`
--

INSERT INTO `ibm` (`idBMI`, `idUsers`, `infoBMI`, `statusBMI`, `dateBMI`, `timeBMI`, `height`, `weight`) VALUES
(15, 8, 13, 1, '2020-11-23', '21:41:24', 130, 23),
(16, 8, 22, 2, '2020-11-23', '21:43:14', 170, 64),
(17, 8, 22, 2, '2020-11-23', '21:43:14', 170, 64),
(18, 8, 22, 2, '2020-11-23', '21:43:42', 170, 64),
(19, 14, 21, 2, '2021-01-23', '22:16:57', 175, 67),
(20, 14, 41, 5, '2021-01-23', '22:34:08', 156, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `in_id` int(11) NOT NULL,
  `in_name` text NOT NULL,
  `in_img` text NOT NULL,
  `in_calo_1g` decimal(10,2) NOT NULL,
  `in_detail` text,
  `in_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`in_id`, `in_name`, `in_img`, `in_calo_1g`, `in_detail`, `in_cat`) VALUES
(1, 'ACEROLA – WEST INDIAN CHERRY', 'cherry01.png', '5.00', '134% Recommended Daily Intake per serving) <br>\r\nSodium-free (1 mg per serving).\r\n<br>\r\nFat-free (0.01 g per serving).\r\n<br>', 1),
(2, 'APPLE', 'apple01.png', '140.00', 'Source of Vitamin C (6% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in fibre (3 g per serving)\r\n<br>\r\nSodium-free (1 mg per serving)\r\n', 1),
(3, 'APRICOTS', 'apricots01.png', '105.00', 'Source of Vitamin C (18% Recommended Daily Intake per serving)\r\n<br>\r\nSource of potassium (272 mg per serving)\r\n<br>\r\nSource of fibre (2 g per serving)\r\n<br>\r\nSodium-free (1 mg per serving)\r\n<br>\r\nFat-free (0.4 g per serving)', 1),
(4, 'AVOCADO', 'avocado01.png', '130.00', 'Ripe, soft fruit. Avoid fruit with dark sunken spots or bruises. Colour and texture depend on variety. Rinse, remove pit by cutting lengthwise around seed. Gently twist to separate halves. Peel skin. To prevent browning, coat with lemon juice.\r\n', 1),
(5, 'BANANA', 'banana01.png', '140.00', 'High in potassium (500 mg per serving)\r\n<br>\r\nSource of Vitamin C (15% Recommended Daily Intake per serving)\r\n<br>\r\nSource of fibre (3 g per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(6, 'CANTALOUPE', 'cantaloupe01.png', '150.00', 'Very high in Vitamin C (90% Recommended Daily Intake per serving)\r\n<br>\r\nSource of potassium (270 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(7, 'CLEMENTINE', 'clementine01.png', '74.00', 'Very high in Vitamin C (60% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (1 mg per serving)\r\n<br>\r\nFat-free (0.1 g per serving)', 1),
(8, 'COCONUT MEAT', 'coconutmeat01.png', '100.00', 'Very high in manganese (75% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in copper (22% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in selenium (20% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in iron (17% Recommended Daily Intake per serving)\r\n<br>\r\nSource of zinc (12% Recommended Daily Intake per serving)\r\n<br>\r\nSource of phosphorus (10% Recommended Daily Intake per serving)\r\n<br>\r\nSource of  Vitamin C (6% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in potassium (356 mg per serving)', 1),
(9, 'DURIAN', 'durian01.png', '128.00', 'High in Vitamin C (42% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in Vitamin B6 (23% Recommended Daily Intake per serving)\r\n<br>\r\nHigh in manganese (21% Recommended Daily Intake per serving)\r\n<br>\r\nSource of copper (13% Recommended Daily Intake per serving)\r\n<br>\r\nVery high in potassium (560 mg per serving)\r\n<br>\r\nSodium-free (3 mg per serving)', 1),
(10, 'GRAPEFRUIT', 'grapefruit01.png', '140.00', 'Very high in Vitamin C (90% Recommended Daily Intake per serving)\r\n<br>\r\nSource of fibre (2 g per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(11, 'GRAPES', 'grapes01.png', '140.00', 'Low in sodium (15 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(12, 'GUAVA', 'guava01.png', '90.00', 'Very high in Vitamin C (343% Recommended Daily Intake per serving)\r\n<br>\r\n Very high in Vitamin C (343% Recommended Daily Intake per serving)\r\n<br>\r\n High in folacin (20% Recommended Daily Intake per serving)\r\n<br>\r\nSource of potassium (256 mg per serving)\r\n<br>\r\nSodium-free (2 mg per serving)', 1),
(13, 'JACKFRUIT', 'jackfruit01.png', '87.00', 'Source of magnesium (13% Recommended Daily Intake per serving)\r\n<br>\r\nSource of manganese (9% Recommended Daily Intake per serving)\r\n<br>\r\nSource of copper (8% Recommended Daily Intake per serving)\r\n<br>\r\nSource of potassium (264 mg per serving)\r\n<br>\r\nSodium-free (3 mg per serving)\r\n<br>\r\nFat-free (0.3 g per serving)', 1),
(14, 'KIWIFRUIT', 'kiwifruit01.png', '140.00', 'Very high in Vitamin C (220% Recommended Daily Intake per serving)\r\n<br>\r\nGood source of potassium (430 mg per serving)\r\n<br>\r\nHigh source of fibre (4 g per serving)\r\n<br>\r\nLow in fat (1 mg per serving)', 1),
(15, 'LEMON', 'lemon01.png', '55.00', 'High in Vitamin C (40% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(16, 'MANGO', 'mango01.png', '140.00', 'High in Vitamin C (45% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0.5 g per serving)', 1),
(17, 'ORANGE', 'orange01.png', '140.00', 'Very high in Vitamin C (120% Recommended Daily Intake per serving)\r\n<br>\r\nSource of fibre (3 g per serving)\r\n<br>\r\nSource of potassium (230 mg per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(18, 'PEAR', 'pear01.png', '140.00', 'High in fibre (5 g per serving)\r\n<br>\r\nSource of Vitamin C (10% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(19, 'STRAWBERRIES', 'strawberries01.png', '120.00', 'Very high in Vitamin C (150% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(20, 'WATERMELON', 'watermelon01.png', '88.00', 'Source of Vitamin C (15% Recommended Daily Intake per serving)\r\n<br>\r\nSodium-free (0 mg per serving)\r\n<br>\r\nFat-free (0 g per serving)', 1),
(21, 'BROCCOLI', 'broccoli01.png', '81.00', 'Very high in Vitamin C (130% Recommended Daily Intake per serving)\r\nFat-free (0 g per serving)', 2),
(22, 'BEANS, GREEN', 'beans_green01.png', '85.00', 'Source of Vitamin C (10% Recommended Daily Intake per serving)\r\nSource of folacin (9% Recommended Daily Intake per serving)\r\nSodium-free (3 mg per serving)\r\nFat-free (0.1 g per serving)', 2),
(23, 'CABBAGE, RED', 'cabbage_red01.png', '37.00', 'High in Vitamin C (35% Recommended Daily Intake per serving)\r\nHigh in Vitamin K (18% Recommended Daily Intake per serving)\r\nFat-free (0.3 g per serving)', 2),
(24, 'CARROT', 'carrot01.png', '85.00', 'Source of Vitamin C (10% Recommended Daily Intake per serving)\r\nSource of potassium (270 mg per serving)\r\nFat-free (0 g per serving)', 2),
(25, 'CAULIFLOWER', 'cauliflower01.png', '85.00', 'Very high in Vitamin C (90% Recommended Daily Intake per serving)\r\nFat-free (0 g per serving)', 2),
(26, 'CORN', 'corn01.png', '85.00', 'Source of Vitamin C (10% Recommended Daily Intake per serving)\r\nSource of potassium (240 mg per serving)', 2),
(27, 'CUCUMBER', 'cucumber01.png', '84.00', 'Sodium-free (0 mg per serving)\r\nFat-free (0 g per serving)\r\n', 2),
(28, 'DAIKON', 'daikon01.png', '338.00', 'Very high in Vitamin C (124% Recommended Daily Intake per serving)\r\nHigh in magnesium (22% Recommended Daily Intake per serving)\r\nHigh in copper (19% Recommended Daily Intake per serving)\r\nSource of iron (10% Recommended Daily Intake per serving)\r\nSource of calcium (8% Recommended Daily Intake per serving)\r\nSource of Vitamin B6 (6% Recommended Daily Intake per serving)\r\nVery high in potassium (767 mg per serving)\r\nFat-free (0.3 g per serving)', 2),
(29, 'EGGPLANT', 'eggplant01.png', '43.00', 'Source of manganese (5% Recommended Daily Intake per serving)\r\nSodium-free (1 mg per serving)\r\nFat-free (0.1 g per serving)', 2),
(30, 'GINGER ROOT', 'ginger_root01.png', '41.00', 'Source of magnesium (7% Recommended Daily Intake per serving)\r\nFat-free (0.3 g per serving)', 2),
(31, 'LETTUCE, ICEBERG', 'lettuce_iceberg01.png', '85.00', 'Fat-free (0 g per serving)', 2),
(32, 'MUSHROOMS', 'mushrooms01.png', '85.00', 'Source of potassium (300 mg per serving)\r\n', 2),
(33, 'ONION (RED)', 'red_onion01.png', '85.00', 'Small amount of fibre\r\nSmall source of Vitamin C\r\n', 2),
(34, 'PEPPER, GREEN', 'pepper_green01.png', '85.00', 'Very high in Vitamin C (110% Recommended Daily Intake per serving)\r\nLow in sodium (25 mg per serving)\r\nFat-free (0 g per serving)', 2),
(35, 'PUMPKIN', 'pumpkin01.png', '61.00', 'Source of Vitamin C (9% Recommended Daily Intake per serving)\r\nSource of potassium (208 mg per serving)\r\nSodium-free (1 mg per serving)\r\nFat-free (0.1 g per serving)', 2),
(36, 'POTATO, YELLOW\r\n', 'potatoes01.png', '167.00', 'High in Vitamin B6 (25% Recommended Daily Intake per serving)\r\nSource of Vitamin C (21% Recommended Daily Intake per serving)\r\nSource of magnesium (13% Recommended Daily Intake per serving)\r\nSource of zinc (5% Recommended Daily Intake per serving)\r\nSource of fibre (2.3 g per serving)\r\nFat-free (0.2 g per serving)\r\n', 2),
(37, 'SPINACH', 'spinach01.png', '85.00', 'High in Vitamin C (35% Recommended Daily Intake per serving)\r\nSource of iron (15% Recommended Daily Intake per serving)\r\nFat-free (0 g per serving)', 2),
(38, 'TOMATO', 'tomato01.png', '85.00', 'Source of Vitamin C (25% Recommended Daily Intake per serving)\r\nLow in sodium (10 mg per serving)\r\nFat-free (0 g per serving)\r\n', 2),
(39, 'ZUCCHINI', 'zucchini01.png', '85.00', 'Source of Vitamin C (25% Recommended Daily Intake per serving)\r\nFat-free (0 g per serving)\r\n', 2),
(40, 'TURNIP', 'turnip01.png', '120.00', 'Source of Vitamin C (24% Recommended Daily Intake per serving)\r\nFat-free (0.07 g per serving)\r\n', 2),
(41, 'Alaskan salmon', 'alaskan_salmon01.png', '2.08', 'There’s a debate about whether wild salmon or farmed salmon is the better option.\r\n\r\nFarmed salmon is significantly cheaper, but it may contain less omega-3s and fewer vitamins and minerals, depending on whether it’s fortified or not.\r\n\r\nSalmon is a great option for your diet overall, but if your budget allows, opt for the wild variety. Try this grilled salmon recipe with a sweet-tangy glaze for an entrée that’s easy to prepare.', 5),
(42, 'Cod', 'cod01.png', '0.82', 'This flaky white fish is a great source of phosphorus, niacin, and vitamin B-12. A 3-ounce cooked portion contains 15 to 20 grams of protein.\r\n\r\nTry a piccata sauce on top of cod for a nice complement, like in this recipe.', 5),
(43, 'Herring', 'herring01.png', '2.03', 'A fatty fish similar to sardines, herring is especially good smoked. Smoked fish is packed with sodium though, so consume it in moderation.\r\n\r\nJamie Oliver’s Mediterranean-style herring linguine uses the fresh version in this recipe.', 5),
(44, 'Mahi-mahi', 'mahi_mahi.png', '0.85', 'A tropical firm fish, mahi-mahi can hold up to almost any preparation. Because it’s also called dolphinfish, it’s sometimes confused with the mammal dolphin. But don’t worry, they’re completely different.', 5),
(45, 'Mackerel', 'mackerel01.png', '3.05', 'As opposed to leaner white fish, mackerel is an oily fish, rich in healthy fats. King mackerel is a high-mercury fish, so opt for the lower mercury Atlantic or smaller mackerel choices.\r\n\r\nTry these recipes for meal ideas.', 5),
(46, 'Perch', 'perch01.png', '1.17', 'Another white fish, perch has a medium texture and can come from the ocean or fresh water. Because of its mild taste, a flavorful panko breading goes well with it, like in this recipe.', 5),
(47, 'Rainbow trout', 'rainbow_trout01.png', '1.41', 'Farmed rainbow trout is actually a safer option than wild, as it’s raised protected from contaminants. And, according to the Monterey Bay Aquarium Seafood Watch, it’s one of the best types of fish you can eat in terms of environmental impact.\r\n', 5),
(48, 'Sardines', 'sardines01.png', '2.08', 'Also an oily fish, sardines are rich in many vitamins. The canned version is easy to find, and it’s actually more nutritious because you’re consuming the entire fish, including bones and skin —don’t worry, they’re pretty much dissolved.', 5),
(49, 'Striped bass', 'striped_bass01.png', '0.97', 'Either farmed or wild, striped bass is another sustainable fish. It has a firm yet flaky texture and is full of flavor.', 5),
(50, 'Tuna', 'tuna01.png', '1.30', 'Whether fresh or canned, tuna is a favorite of many. When picking fresh tuna, choose a piece that’s glossy and smells ocean-fresh. It’s easy to prepare, too — all it needs is a quick sear over high heat.\r\n\r\nIt’s recommended that people limit yellowfin, albacore, and ahi tuna due to their high mercury content. Instead of white, which is albacore, choose “chunk light” when buying canned tuna. Light tuna is almost always the lower-mercury species called skipjack', 5),
(51, 'Wild Alaskan pollock', 'wild_alaskan_pollock01.png', '1.08', 'Alaskan pollock is always wild-caught in the northern Pacific Ocean. Because of its mild flavor and light texture, it’s the fish most often used for fish sticks and other battered fish products.\r\n', 5),
(52, 'Arctic char', 'arctic_char01.png', '1.67', 'Arctic char is in the salmon family. It looks like salmon and its flavor is somewhere between salmon and trout, slightly more like trout. The meat is firm, with fine flake and high-fat content. Its flesh ranges from dark red to pale pink.\r\n\r\nFarmed Arctic char is raised mostly in onshore tanks that create less pollution than those in coastal waters. Try this easy recipe for a maple-glazed char.', 5),
(53, 'Chicken', 'chicken01.png', '2.39', 'Chicken is one of the easiest meats to raise yourself. They require very little and if you choose the right bird you could have a dual-purpose breed that is great for both meat and eggs.', 5),
(54, 'Turkey', 'turkey01.png', '1.88', 'Turkey is another poultry that offers a lot of healthy choices. It obviously has white and dark meat, but it is all pretty good for you if you exclude the skin.', 5),
(55, 'Beef', 'beef01.png', '2.51', 'There was a time when beef was considered to be unhealthy. Now, it is being reported that as long as the beef is lean then you are good to go.\r\n\r\nThat made me a little sad because my favorite part of a juicy steak is the fat. (I know. I’m weird.) However, beef is not an easy meat source to raise. They require a lot of land and resources to sustain them. Keep that in mind if you are considering raising your own healthy meats.', 5),
(56, 'Veal', 'veal01.png', '1.72', 'Veal is a tough meat option for some to consider. Since veal is meat from a calf it can be difficult to raise this option for yourself. I have a hard time culling baby animals.', 5),
(57, 'Lamb', 'lamb01.png', '2.94', 'Lamb is another tough meat source for some to consider. Again, you must cull a baby animal. Yet, they are pretty easy to raise as long as you have more than one since they are social animals.\r\n\r\nIt is considered a red meat source. If you’d like to have a variety of options for your red meat then you might want to consider adding this to your list.', 5),
(58, 'Buffalo', 'buffalo01.png', '1.43', 'I was actually rather surprised by the latest studies on this meat. There was a time when buffalo was considered less healthy.\r\n\r\nI’m so glad that it is back to being considered healthy because some of the best burgers I have ever eaten were buffalo burgers. Just remember to keep this meat lean as well.', 5),
(59, 'Ostrich', 'ostric01.png', '1.44', 'This might make you make a double-take. You may have never considered eating ostrich, and I’ll have to agree that this is not a typical meat option for many people.\r\n\r\nHowever, if you have access to ostrich meat, the good news is that it is a healthy meat option as long as the meat is lean. Even so, I don’t think it would be a viable meat source for most people to raise as they are rather large birds.', 5),
(60, 'Emu', 'emu01.png', '1.43', 'This is another healthy meat option that might throw you through a loop. For those unfamiliar with an Emu, it is the second-largest bird breed if measuring by height. It is related to the ostrich. Only this bird is a darker brown color.\r\n\r\nAgain, it is a solid healthy meat choice as long as the meat is lean. It is another meat source that would most likely be difficult to raise because of its size.\r\n', 5),
(61, 'Venison', 'venison01.png', '1.58', 'We eat a lot of venison around my house. For those unfamiliar, venison is just another word for deer meat. It is a great red meat source, it is very lean, and if you hunt it yourself it’s free.\r\n\r\nIf you are an avid hunter, I highly recommend this meat. If you allow the meat to rest and the blood to drain off of the meat for the right length of time, it tastes like very lean and rich beef. I personally love it!\r\n', 5),
(62, 'Pork', 'pork01.png', '2.42', 'You might be thinking, “No way! I’d always heard pork was bad for you!” Some pork still is, but some parts of pork are not.\r\n\r\nYou don’t want to start eating anything but bacon. However, pork tenderloin is very good for you. It is white meat and packs a lot of nutrients.', 5),
(63, 'Eggs', 'egg01.png', '1.55', 'Eggs are a wonderful protein source that is also very healthy for you. The great thing about eggs is that if you raise chickens for meat, then you’ll get eggs as a free byproduct.\r\n\r\nIf you are a fan of chicken, you can enjoy them (and their health benefits) two ways.', 5),
(64, 'Duck eggs', 'duck_egg01.png', '1.85', 'Duck eggs are a wonderful protein source that is also very healthy for you. The great thing about duck eggs is that if you raise duck for meat, then you’ll get eggs as a free byproduct.\r\n\r\nIf you are a fan of duck, you can enjoy them (and their health benefits) two ways.\r\n', 5),
(65, 'Butter', 'butter01.png', '7.00', 'Butter is a high-fat dairy food made purely from churned milk or cream. Although butter had some negative PR in the past due to its saturated fat content, it has become increasingly popular over recent years.\r\n\r\n', 3),
(66, 'Buttermilk', 'buttermilk01.png', '0.42', 'Buttermilk is not quite as famous as its two namesakes, and butter and milk are both more prevalent. However, it is an interesting, sour-tasting dairy product.\r\n\r\n\r\n', 3),
(67, 'Cheese - Mozzarella', 'cheese_mozzarella01.png', '3.50', 'Fresh mozzarella is generally white but may vary seasonally to slightly yellow depending on the animal\'s diet.[1] Due to its high moisture content, it is traditionally served the day after it is made[2] but can be kept in brine for up to a week[3] or longer when sold in vacuum-sealed packages. Low-moisture mozzarella can be kept refrigerated for up to a month,[4] though some shredded low-moisture mozzarella is sold with a shelf life of up to six months.[5] Mozzarella of several kinds is used for most types of pizza and several pasta dishes or served with sliced tomatoes and basil in Caprese salad.', 3),
(68, 'Cheese - Cheddar', 'cheese_cheddar01.png', '2.01', 'popular cheese in the US behind mozzarella, with an average annual consumption of 10 lb (4.5 kg) per capita. The US produced approximately 3,000,000,000 lb (1,300,000 long tons; 1,400,000 tonnes) of cheddar cheese in 2014, and the UK produced 258,000 long tons (262,000 tonnes) in 2008.', 3),
(69, 'Clotted Cream', 'clotted-cream01.png', '5.19', 'Originating in England, clotted cream is a traditional accompaniment for afternoon tea and scones.\r\n\r\nClotted cream is a delicious, extra-thick spreadable cream, and it is made by gently baking fresh heavy cream.\r\n\r\nAs the cream heats, it loses moisture and thickens, and because of this it also has a higher fat content than regular cream.\r\n', 3),
(70, 'Whipping Cream', 'whipping_cream01.png', '1.52', 'Cream is a high-fat dairy product, and it consists of the butterfat layer at the top of milk before the milk’s homogenization process.\r\n\r\nThere are several different varieties of cream, and the fat percentage can vary between 18% and 55%, depending on the specific type.\r\n\r\nSimilar to butter, cream provides a reasonable source of the fat-soluble vitamins A and D.\r\n', 3),
(71, 'Goat Milk', 'goat_milk01.png', '1.54', 'Although similar to regular cow’s milk, goat milk contains a slightly different amount of calories and macronutrients.\r\n\r\nWhile goat’s milk is not very common in Western countries, it enjoys enormous popularity in Asian countries such as India, Bangladesh, and Pakistan.\r\n', 3),
(72, 'Yogurt', 'yogurt01.png', '0.88', 'Yogurt is one of the most popular foods in the world.\r\n\r\nTo make it, milk is heated to denature the proteins.\r\n\r\nFollowing this, producers add bacterial cultures known as “yogurt cultures” (Lactobacillus and Streptococcus) to milk.\r\n', 3),
(73, 'Amaranth', 'amaranth01.png', '3.65', 'Amaranthus is a cosmopolitan genus of annual or short-lived perennial plants collectively known as amaranths. Some amaranth species are cultivated as leaf vegetables, pseudocereals, and ornamental plants. Most of the Amaranthus species are summer annual weeds and are commonly referred to as pigweeds. Catkin-like cymes of densely packed flowers grow in summer or autumn. Amaranth varies in flower, leaf, and stem color with a range of striking pigments from the spectrum of maroon to crimson and can grow longitudinally from 1 to 2.5 metres (3 to 8 feet) tall with a cylindrical, succulent, fibrous stem that is hollow with grooves and bracteoles when mature.\r\n', 4),
(74, 'Barley', 'barley01.png', '1.23', 'Barley (Hordeum vulgare), a member of the grass family, is a major cereal grain grown in temperate climates globally. It was one of the first cultivated grains, particularly in Eurasia as early as 10,000 years ago. Barley has been used as animal fodder, as a source of fermentable material for beer and certain distilled beverages, and as a component of various health foods. It is used in soups and stews, and in barley bread of various cultures. Barley grains are commonly made into malt in a traditional and ancient method of preparation.', 4),
(75, 'Buckwheat', 'buck_wheat01.png', '3.02', 'Buckwheat (Fagopyrum esculentum), or common buckwheat, is a plant cultivated for its grain-like seeds and as a cover crop. The name \"buckwheat\" is used for several other species, such as Fagopyrum tataricum, a domesticated food plant raised in Asia. Despite the name, buckwheat is not related to wheat, as it is not a grass. Instead, buckwheat is related to sorrel, knotweed, and rhubarb. Buckwheat is referred to as a pseudocereal because its seeds\' culinary use is the same as cereals\', owing to their composition of complex carbohydrates.', 4),
(76, 'Bulgur Wheat', 'bulgur_wheat01.png', '3.61', 'Bulgur is a cereal food made from the cracked parboiled groats of several different wheat species, most often from durum wheat. It originates in Middle Eastern cuisine.\r\n', 4),
(77, 'Farro', 'farro01.png', '3.38', 'Farro is a food composed of the grains of certain wheat species, sold dried, and prepared by cooking in water until soft. It is eaten plain or is often used as an ingredient in salads, soups, and other dishes.\r\n', 4),
(78, 'Millet', 'millet01.png', '2.07', 'Millets are a group of highly variable small-seeded grasses, widely grown around the world as cereal crops or grains for fodder and human food. Millets are important crops in the semiarid tropics of Asia and Africa (especially in India, Mali, Nigeria, and Niger), with 97% of millet production in developing countries. The crop is favored due to its productivity and short growing season under dry, high-temperature conditions.', 4),
(79, 'Oats, Groats', 'oat_groat01.png', '3.51', 'Oat_Groats are the hulled kernels of various cereal grains, such as oat, wheat, rye, and barley. Groats are whole grains that include the cereal germ and fiber-rich bran portion of the grain, as well as the endosperm (which is the usual product of milling).\r\n', 4),
(80, 'Oats, Rolled', 'oat_rolled01.png', '2.60', 'Rolled oats are a type of lightly processed whole-grain food. Traditionally, they are made from oat groats that have been dehusked and steamed, before being rolled into flat flakes under heavy rollers and then stabilized by being lightly toasted.', 4),
(81, 'Oats, Steel Cut', 'oat_steel_cut01.png', '3.03', 'Steel-cut oats (US), also called pinhead oats, coarse oatmeal (UK),or Irish oatmeal are groats (the inner kernel with the inedible hull removed) of whole oats which have been chopped into two or three pinhead-sized pieces (hence the names; \"steel-cut\" comes from the steel blades). The pieces can then be sold, or processed further to make rolled oat flakes, of smaller size than flakes of whole groats. Steel-cutting produces oatmeal with a chewier and coarser texture than other processes.\r\n', 4),
(82, 'Popcorn Kernels\r\n', 'popcorn_kernel01.png', '3.13', 'Popcorn Kernels (popped corn, popcorns or pop-corn) is a variety of corn kernel which expands and puffs up when heated; the same names are also used to refer to the foodstuff produced by the expansion. A popcorn kernel\'s strong hull contains the seed\'s hard, starchy shell endosperm with 14–20% moisture, which turns to steam as the kernel is heated. Pressure from the steam continues to build until the hull ruptures, allowing the kernel to forcefully expand, from 20 to 50 times its original size, and then cool.\r\n', 4),
(83, 'Quinoa', 'quinoa01.png', '4.01', 'Quinoa is a flowering plant in the amaranth family. It is a herbaceous annual plant grown as a crop primarily for its edible seeds; the seeds are rich in protein, dietary fiber, B vitamins, and dietary minerals in amounts greater than in many grains. Quinoa is not a grass, but rather a pseudocereal botanically related to spinach and amaranth (Amaranthus spp.), and originated in the Andean region of northwestern South America. It was first used to feed livestock 5.2–7.0 thousand years ago, and for human consumption 3–4 thousand years ago in the Lake Titicaca basin of Peru and Bolivia.\r\n', 4),
(84, 'Rice, Arborio', 'rice_arborio01.png', '3.08', 'Arborio rice is an Italian short-grain rice. It is named after the town of Arborio, in the Po Valley, which is situated in the main region of Piedmont in Italy. Arborio is also grown in Arkansas, California, and Missouri in the United States. When cooked, the rounded grains are firm, and creamy and chewy compared to other varieties of rice, due to their higher amylopectin starch content. It has a starchy taste and blends well with other flavours. Arborio rice is often used to make risotto; other suitable varieties include Carnaroli, Maratelli, Baldo, and Vialone Nano. Arborio rice is also usually used for rice pudding.\r\n', 4),
(85, 'Rice, Brown Basmati	', 'rice_brown_basmati01.png', '1.21', 'Basmati is a variety of long, slender-grained aromatic rice which is traditionally grown in India and Pakistan. As of 2018-19, India accounted for 65% of the international trade in basmati rice, while Pakistan accounted for the remaining 35%.] Many countries use domestically grown basmati rice crops; however, basmati is geographically exclusive to certain districts of India and Pakistan.', 4),
(86, 'Rice, Brown Jasmine', 'rice_brown_jasmine01.png', '1.70', 'Jasmine rice is a long-grain variety of fragrant rice (also known as aromatic rice). Its fragrance, reminiscent of pandan (Pandanus amaryllifolius) and popcorn,results from the rice plant\'s natural production of aroma compounds, of which 2-acetyl-1-pyrroline is the most salient. In typical packaging and storage, these aroma compounds dissipate within a few months.This rapid loss of aromatic intensity leads many Southeast Asians and connoisseurs to prefer each year\'s freshly harvested \"new crop\" of jasmine rice.', 4),
(87, 'Rice, Long Grain Brown', 'rice_long_grain_brown01.png', '1.11', 'Brown rice is a whole grain rice with the inedible outer hull removed. White rice is the same grain without the hull, the bran layer, and the cereal germ. Red rice, gold rice, and black rice (also called purple rice) are all whole rices with differently pigmented outer layers.\r\n', 4),
(88, 'Rice, Wild', 'rice_wild01.png', '3.57', 'Wild rice is four species of grasses forming the genus Zizania, and the grain that can be harvested from them. The grain was historically gathered and eaten in North America and China. While now a delicacy in North America, the grain is eaten less in China, where the plant\'s stem is used as a vegetable.', 4),
(89, 'Rye Berries', 'rye_berries01.png', '0.57', 'Rye (Secale cereale) is a grass grown extensively as a grain, a cover crop and a forage crop. It is a member of the wheat tribe (Triticeae) and is closely related to both wheat (Triticum) and barley (genus Hordeum). Rye grain is used for flour, bread, beer, crispbread, some whiskeys, some vodkas, and animal fodder. It can also be eaten whole, either as boiled rye berries or by being rolled, similar to rolled oats.\r\n', 4),
(90, 'Spelt Berries', 'spelt_berries01.png', '3.38', 'Spelt berries aren\'t berries at all, and there is nothing berry-like about them. They are kernels of grain. They are the whole kernels of spelt; they look very similar to wheat kernels. When cooked, spelt berries have a flavour vaguely reminiscent of nuts, in the same way that bulgur wheat does.', 4),
(91, 'Teff', 'teff01.png', '3.66', 'Teff is an annual grass, a species of lovegrass native to the Horn of Africa, notably what is today modern-day Ethiopia and Eritrea.  It is cultivated for its edible seeds, also known as teff.', 4),
(92, 'Wheat Berries', 'wheat_berries01.png', '3.40', 'A wheat berry, or wheatberry, is a whole wheat kernel, composed of the bran, germ, and endosperm, without the husk. Botanically, it is a type of fruit called a caryopsis.Wheat berries have a tan to reddish-brown color and are available as either a hard or soft processed grain. They are often added to salads or baked into bread to add a crunchy texture. If wheat berries are milled, whole-wheat flour is produced.\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `time_order` time NOT NULL,
  `address` text NOT NULL,
  `phone_number` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: pending, 1:shipping, 2:finished',
  `total` decimal(10,0) NOT NULL COMMENT 'total_cost of this order',
  `name_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL COMMENT 'product_combo id',
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL COMMENT 'total cost of this product combo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_combo`
--

CREATE TABLE `product_combo` (
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_img` text NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_cost` double NOT NULL,
  `pro_sub_detail` text NOT NULL,
  `pro_cat` int(11) NOT NULL COMMENT '1. breakfast, 2.luch,  3.dinner',
  `pro_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_combo`
--

INSERT INTO `product_combo` (`pro_id`, `pro_name`, `pro_img`, `pro_detail`, `pro_cost`, `pro_sub_detail`, `pro_cat`, `pro_status`) VALUES
(1, 'Breakfast 1', 'Breakfast1.jpg', '1 slice of whole grain bread\r\n50g sausage (powderless)\r\n1 chicken egg (PAM 0 kcal frying)\r\n10g Mozzarella cheese\r\n100g of cucumber\r\n1 small tomato (50g)\r\n', 45000, '262 kcal', 1, 3),
(2, 'Breakfast 2', 'Breakfast2.jpg', '1 slice of whole grain bread\r\n10g peanut butter\r\n20g frozen bananas\r\n1 chicken egg (seaweed conifer roll)\r\n100g low-fat Greek yogurt (homemade)\r\n1/2 teaspoon of honey\r\n', 45000, '307 kcal', 1, 3),
(3, 'Breakfast 3', 'Breakfast.jpg', '1 melted chocolate dumpling (homemade)\r\n1 green kiwifruit\r\n120g low-fat Greek yogurt\r\nTopping: Granola + honey\r\nMelted Chocolate Dumpling recipe: (239 kcal x 8 pcs)\r\n', 60000, '417 kcal', 1, 2),
(4, 'Breakfast 4', 'Breakfast4.jpg', '1 slice frozen whole wheat bread with peanut butter + banana\r\n100g of low-fat Greek yogurt\r\nTopping: Granola + honey\r\n1 grapefruit pack (50g)\r\n', 60000, '294 kcal', 1, 2),
(5, 'Breakfast 5', 'Breakfast5.jpg', 'Banana Wholewheat Pancake: 335 kcal\r\nBreakfast with Whole Banana Pancake\r\n40g banana (puree)\r\n1 egg white\r\n30ml low-fat fresh milk\r\n1 tsp of honey\r\n25g whole wheat flour\r\nAdd baking soda + vanilla (if available)\r\n=> mix well and fry on a pan\r\n\r\nTopping with:\r\n100g of low-fat Greek yogurt\r\n5g peanut butter\r\n1 tsp of honey\r\nKiwi + banana + granola\r\n', 50000, '335 kcal', 1, 1),
(6, 'Breakfast 6', 'Breakfast6.jpg', '1 slice of brown bread\r\n1 leaf of lettuce\r\n2 hard boiled eggs, finely chopped with salt and pepper\r\nLittle chili sauce + ketchup\r\n50g steamed honey sweet potato (topping with peanut butter + honey + chia seeds)\r\n', 45000, '309 kcal', 1, 1),
(7, 'Breakfast 7', 'Breakfast7.jpg', '2 chicken eggs\r\n100g steamed sweet potatoes with peanut butter sauce (10g peanut butter + 1 teaspoon honey)\r\n', 40000, '281 kcal', 1, 4),
(8, 'Breakfast 8', 'Breakfast8.jpg', '1/2 Whole Wheat Pita (24g)\r\n1 egg (boiled, minced)\r\n1/2 tomato (boiled, minced)\r\n1 leaf of lettuce\r\n100g of low-fat Greek yogurt\r\n10g seed mixture\r\n1/2 teaspoon of honey\r\n1/2 green kiwifruit\r\n', 60000, '350 kcal', 1, 4),
(9, 'Breakfast 9', 'Breakfast9.jpg', 'Huge breakfast with oats cooked with banana \r\n• 30g flat rolled oats\r\n• 30g banana (minced)\r\n• 100ml of water\r\n• 1 teaspoon of honey hong\r\nEaten with:\r\n1 peach (100g)\r\n150g low-fat Greek yogurt\r\nTopping: peanut butter, granola, honey\r\n', 60000, '405 kcal', 1, 5),
(10, 'Breakfast 10', 'Breakfast10.jpg', '2 eggs (fried with PAM 0 kcal oil)\r\n50g vegetable mixture\r\n100g sweet potato fiber (oil-free fryer)\r\n', 50000, '309 kcal', 1, 5),
(11, 'Lunch 1', 'Lunch1.jpg', '100g cobia (cook kimchi)\r\n100g pumpkin (cook soup with ground pork)\r\n100g cabbage\r\n', 55000, '311 kcal', 2, 1),
(12, 'Lunch 2', 'Lunch2.jpg', '200g broccoli (cook soup)\r\n200g chicken breast\r\n50g ivory brown rice (cooked with vegetable mixture)\r\n', 55000, '325 kcal', 2, 2),
(13, 'Lunch 3', 'Lunch3.jpg', '120g pork ribs (including bones)\r\n100g pumpkin (cook soup with 30g ground pork)\r\n100g broccoli\r\n', 45000, '359 kcal', 2, 3),
(14, 'Lunch 4', 'Lunch4.jpg', '120g pork cutlet ribs\r\n150g sauteed cabbage with shrimp (PAM 0 kcal oil)\r\n50g taro soup with pork ribs\r\n', 65000, '382 kcal', 2, 4),
(15, 'Lunch 5', 'Lunch5.jpg', '150g cabbage\r\n150g pumpkin (cook soup)\r\n120g pork cutlet ribs\r\n', 50000, '329 kcal', 2, 5),
(16, 'Lunch 6', 'Lunch6.jpg', '150g chicken breast cooked with mushrooms and tomatoes\r\n150g sauteed morning glory with garlic (PAM 0 kcal oil)\r\n100g of apple\r\n', 50000, '247 kcal', 2, 1),
(17, 'Lunch 7', 'Lunch7.jpg', '150g broccoli\r\n100g pumpkin (grilled in an oil-free fryer)\r\n150g plaice (oil-free fryer)\r\n', 50000, '322 kcal', 2, 2),
(18, 'Lunch 8', 'Lunch8.jpg', '150g broccoli\r\n100g pumpkin (grilled in an oil-free fryer)\r\n150g plaice (oil-free fryer)\r\n', 55000, '322 kcal', 2, 3),
(19, 'Lunch 9', 'Lunch9.jpg', '150g cabbage\r\n100g shrimp (honey ram)\r\n170g tofu (stuffed 50g chicken breast) with tomato\r\n(Warehouse and stir-fry both use PAM oil 0 kcal)\r\n', 55000, '324 kcal', 2, 4),
(20, 'Lunch 10', 'Lunch10.jpg', '110g lean pork (oil-free fryer)\r\n100g broccoli\r\n100g fried melon with 40g shrimp\r\n', 50000, '242 kcal', 2, 5),
(21, 'Dinner 1', 'Dinner1.jpg', '100g pork ribs\r\n100g cabbage\r\n100g pumpkin (cook soup)\r\n', 50000, '290 kcal', 3, 5),
(22, 'Dinner 2', 'Dinner2.jpg', '100g of chicken\r\n120g tofu (cooked tomato with mushroom)\r\n100g gourd (cook soup with shrimp)\r\n', 55000, '305 kcal', 3, 4),
(23, 'Dinner3', 'Dinner3.jpg', '150g chicken breast\r\n80g tofu (oil-free fryer)\r\n100g boiled chayote\r\n', 55000, '237 kcal', 3, 3),
(24, 'Dinner 4', 'Dinner4.jpg', '50g white brown rice\r\n40g vegetable mixture\r\n2 eggs (1 fried with rice, 1 omelette above)\r\n', 45000, '261 kcal', 3, 2),
(25, 'Dinner 5', 'Dinner5.jpg', '80g chicken breast (fried in an oil-free fryer)\r\n1 chicken egg (fried in 0 kcal PAM oil)\r\n150g cabbage\r\n', 50000, '193 kcal', 3, 1),
(26, 'Dinner 6', 'Dinner6.jpg', '110g chicken breast (live weight)\r\n1 egg (fried in 0 kcal PAM oil)\r\n50g of green beans\r\n', 55000, '193 kcal', 3, 5),
(27, 'Dinner 7', 'Dinner7.jpg', '140g breast\r\n60g straw mushroom\r\n100g cabbage\r\n40g brown rice\r\n1 egg\r\n40g mixed vegetables\r\n', 60000, '365 kcal', 3, 4),
(28, 'Dinner 8', 'Dinner8.jpg', '50g sweet potato (microwave steamed)\r\n150g broccoli\r\n110g chicken breast\r\n', 55000, '229 kcal', 3, 3),
(29, 'Dinner 9', 'Dinner9.jpg', '120g chopped cauliflower\r\n2 large eggs\r\n40g mixed vegetables\r\n1 serving of grilled chopped chicken breast (chicken breast + oninon + Wood-ear mushroom + egg)\r\nLow-carb dinner with broccoli fried rice \r\nTotal: 275kcal\r\n120g chopped cauliflower\r\n2 industrial chicken eggs\r\n40g vegetable mixture\r\n1 chicken breast cake (chicken breast + mushroom + onion + egg)\r\n', 60000, '275 kcal', 3, 2),
(30, 'Dinner 10', 'Dinner10.jpg', '100g shrimp\r\n240g tofu (fried with airfryer)\r\n100g horseradish (soup)\r\nDinner: 317kcal\r\n100g of shrimp\r\n240g tofu (fried in an oil-free fryer)\r\n100g bunch of moringa (cook soup)\r\n', 55000, '317 kcal', 3, 1),
(31, 'BreakfastM1', 'BreakfastM1.jpg', '1 ripe banana (95g)\r\n2 chicken eggs\r\n1 tbsp honey (adjust according to sweetness preference)\r\n20g peanut butter\r\n50g low-fat Greek yogurt\r\n1 scoop of Protein (30g) by @ protele.food\r\n50g oatmeal\r\nCinnamon powder + floating powder (if any)\r\n=> bring together => fry on a non-stick pan\r\n', 30000, '716 kcal (120 kcal x 6 pieces)', 1, 5),
(32, 'BreakfastM2', 'BreakfastM2.jpg', '1 slice chopped brown bread (sauteed first and then chopped)\r\n2 eggs beaten with 100ml soy milk\r\n=> microwave for 2 minutes\r\nAdd favorite topping:\r\n40g frozen bananas\r\n10g peanut butter\r\n2 teaspoons of honey\r\n1 beautiful baby strawberry\r\n', 60000, '362 kcal', 1, 4),
(34, 'BreakfastM3\r\n', 'BreakfastM3.jpg', 'This morning, when I got home from practice, I drank 1/2 teaspoon of whey before I ate this breakfast. Also quick and easy to make with black bread + peanut butter + banana + granola. And half an avocado is guts out, beat an egg and put in an oil-free fryer', 80000, '331 kcal', 1, 5),
(35, 'BreakfastM4', 'BreakfastM4.jpg', '1 slice of dark rye bread (30g)\r\n20g liver pate\r\n100g of skim Greek yogurt\r\n1 tbsp Chia pudding (1 tbsp of chia seed + 3 tbsp soy milk)\r\n10g granola\r\nFruits: Bananas, red apples\r\n', 60000, '334 kcal', 1, 4),
(36, 'BreakfastM5\r\n', 'BreakfastM5.jpg', 'When I got home from practice, I had a dish of grilled banana oats for breakfast. To make your meal full of protein, add whey to your original recipe and add your favorite topping', 50000, '377 kcal', 1, 2),
(37, 'BreakfastM6', 'BreakfastM6.jpg', 'A full-carb and protein post-workout breakfast with whey whey with whey topping Greek yogurt and some fruit. Have a sweet taste from honey', 55000, '320 kcal', 1, 3),
(38, 'BreakfastM7', 'BreakfastM7.jpg', 'Still the perfect combination of Greek yogurt + fruit and peanut butter bread + banana. No shortage of whey for fast post-workout protein ', 60000, '380kcal', 1, 1),
(39, 'BreakfastM8', 'BreakfastM8.jpg', 'This morning I cooked flat rolled oats mixed with 1/3 puree banana + unsweetened soy milk + 1/2 teaspoon whey. Add frozen banana topping + peanut butter + Granola + chia seeds = 1 healthy breakfast.', 55000, '442', 1, 2),
(40, 'BreakfastM9', 'BreakfastM9.jpg', 'After my workout breakfast, these banana muffins were very soft, sweet. Combined with the fatty taste of Greek yogurt even more delicious.\r\nDrag the picture left if you want the recipe.\r\n', 50000, '355kcal', 1, 3),
(41, 'BreakfastM10', 'BreakfastM10.jpg', '1 serving of chocolate mousse (homemade)\r\n6g honey granola (homemade)\r\n1/4 scoop of whey protein\r\n100ml soymilk (no sugar)\r\nRecipe of chocolate mousse (4 servings):\r\n350g silken tofu\r\n3 packets of stevia\r\n3 tbsps of cocoa powder\r\n3 tbsps of soymilk (no sugar)\r\nBlend together\r\nToday there is a super healthy chocolate mousse dish.\r\n\r\nAfter training: 160kcal\r\n1 part chocolate mousse (homemade)\r\n6g honey granola (homemade)\r\n1/4 teaspoon whey protein\r\n100ml soy milk (unsweetened)\r\n\r\nChocolate mousse recipe (4 servings): 350g of young tofu\r\n3 tbsp cocoa powder\r\n3 packs of stevia sugar\r\n3 tablespoons soy milk (unsweetened)\r\n', 60000, '350 kcal', 1, 1),
(42, 'LunchInMuscle2', 'LunchInMuscle2.jpg', '150g chicken leg quarters (fried with air fryer)\r\n150g broccoli\r\n1 small egg\r\n', 40000, '400 kcal', 2, 1),
(43, 'LunchinMuscle3', 'LunchinMuscle3.jpg', '100g grilled chicken breast (with air fryer)\r\n90g tofu (with 20g ground pork inside)\r\n150g broccoli\r\n', 55000, '280 kcal', 2, 5),
(44, 'LunchinMuscle4', 'LunchinMuscle4.jpg', '100g water spinach\r\n170g grilled chicken thigh (including bone)\r\n', 40000, '220 kcal', 2, 1),
(45, 'LunchinMuscle5', 'LunchinMuscle5.jpg', '70g mackerel (soup)\r\n100g chicken thigh (fried with airfryer)\r\n50g sweet potato\r\n50g cabbage\r\n', 45000, '300 kcal', 2, 5),
(46, 'LunchinMuscle6', 'LunchinMuscle6.jpg', '200g silver pomfret (fried with airfryer)\r\n100g cauliflower\r\n30g tofu (soup)\r\n', 45000, '340 kcal', 2, 2),
(47, 'LunchinMuscle7', 'LunchinMuscle7.jpg', '2 chicken eggs (fried with PAM oil 0kcal)\r\n40g mixed vegetable (corn, carrot, peas, string beans)\r\n120g yellowtail catfish\r\n50g brown rice\r\n100g cabbage\r\n', 55000, '364 kcal', 2, 4),
(48, 'LunchinMuscle8', 'LunchinMuscle8.jpg', '2,5 eggs (Fried with PAM oil 0kcal)\r\n70g leather jacket fish\r\n20g pork ears\r\n100g cabbage\r\n', 50000, '307 kcal', 2, 3),
(49, 'LunchinMuscle9', 'LunchinMuscle9.jpg', '130g chicken breast\r\n150g water spinach\r\n100g radish (cook soup)\r\n', 50000, '188 kcal', 2, 2),
(50, 'LunchinMuscle10', 'LunchinMuscle10.jpg', '150g steamed chicken wings with young tofu\r\n150g greens (cook soup with 50g ground pork)\r\n1/2 sweet corn\r\n', 50000, '310 kcal', 2, 4),
(51, 'DinnerinMuscle1', 'DinnerinMuscle1.jpg', '50g grilled makerel (with airfryer)\r\n2 eggs + mixed vegetable (fried PAM oil 0 kcal)\r\n50g pumpkin (soup)\r\n100g boiled malabar spinach\r\n', 50000, '260 kcal', 3, 3),
(52, 'DinnerinMuscle2', 'DinnerinMuscle2.jpg', '120g chicken thigh (fried with airfryer)\r\n150g tofu (fried with airfryer)\r\n100g cabbage\r\n', 45000, '265 kcal', 3, 2),
(53, 'DinnerinMuscle3', 'DinnerinMuscle3.jpg', '20g oatmeal\r\n1 chicken egg\r\n20ml cow milk (no sugar)\r\n40g banana\r\n12g protein powder\r\n', 45000, '230 kcal', 3, 5),
(54, 'DinnerinMuscle4', 'DinnerinMuscle4.jpg', 'Shrimp salad.\r\nIngredients: lettuce, tomato, boiled sweet potato, boiled shrimp, cilantro, cucumber, kewpie sesame sauce.\r\n', 55000, '250 kcal', 3, 1),
(55, 'DinnerinMuscle5', 'DinnerinMuscle5.jpg', '150g chicken breast (sautéed)\r\n100g pumpkin (grilled)\r\n150 cabbage vegetables\r\n', 45000, '246 kcal', 3, 2),
(56, 'DinnerinMuscle6', 'DinnerinMuscle6.jpg', 'Spinach, sweet potato, chicken breast, tomato.', 55000, '255 kcal', 3, 2),
(57, 'DinnerinMuscle7', 'DinnerinMuscle7.jpg', 'Boiled beef - boiled spinach\r\nSteamed cassava\r\n', 50000, '257 kcal', 3, 5),
(58, 'DinnerinMuscle8', 'DinnerinMuscle8.jpg', 'Carb: 9.5g\r\nPro: 28.4g\r\nFat: 7.3g\r\n120g cauliflower rice\r\n1 egg\r\n50g of lettuce\r\n50g cucumber\r\n1 chicken breast ball (Chicken breast + mushroom + egg + purple onion)\r\n', 55000, '227 kcal', 3, 1),
(59, 'DinnerinMuscle9', 'DinnerinMuscle9.jpg', '2 medium eggs (fried with PAM oil 0kcal)\r\n30g mixed vegetables\r\n100g amaranth\r\n', 45000, '200 kcal', 3, 4),
(60, 'DinnerinMuscle10', 'DinnerinMuscle10.jpg', '150g chicken drumstick: 179kcal\r\n120g sweet potato: 103kcal\r\nWater spinach 100g: 30kcal\r\n', 45000, '312 kcal', 3, 3),
(63, 'DinnerinMuscle11', 'LunchInMuscle1.jpg', '100g steamed chicken breast 30g mushrooms\r\n30g small shrimp (including the shells)\r\n1 fried egg (using PAM 0kcal fried oil)\r\n150g bean sprouts\r\n', 45000, '312 kcal', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `status_id` int(11) NOT NULL,
  `status_name` text NOT NULL,
  `calo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`status_id`, `status_name`, `calo`) VALUES
(1, 'underweight', 2000),
(2, 'healthy', 1800),
(3, 'overweight', 1200),
(4, 'obese', 1000),
(5, 'extremely obese', 800);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` text NOT NULL,
  `emailUsers` text NOT NULL,
  `pwdUsers` text NOT NULL,
  `gender` text,
  `admin` int(11) DEFAULT NULL COMMENT '1. yes 0. no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `admin`) VALUES
(3, 'user1', 'user1@gmail.com', '$2y$10$aC6sbYt83ODh6koNEmBezuuctAMM56jUs6HV0zRr6vd6Cth/Kc5Sa', 'female', 1),
(4, 'user2', 'user2@gmail.com', '$2y$10$r2Yo1CLHCUX1e9bRlJUMfuQHtbNsQeEKSO8QpaJpSBPKqWoiVCvee', 'female', 0),
(5, 'user3', 'user3@gmail.com', '$2y$10$o9fk9ueMX4W0DgY3Nu0/nu25B71Z0QvfViwvuHo7CgEdoUKkXc3aC', 'male', 0),
(6, 'user4', 'user4@gmail.com', '$2y$10$QdttpwOgaip.1oFM4xULPenZwylNJUNA6Lck9IUXOPOyQYMSTvy3u', 'female', 0),
(7, 'user5', 'user5@gmail.com', '$2y$10$2Qzk75sjLfBx4n7Km5zDjeHbeU1unIZ9KdODrkOsGhnqR7MASCida', 'male', NULL),
(8, 'QH', 'QH@fsdfsd.com', '$2y$10$4c8pK4CZ0caxjwA6ajjaqOUg8mtoW/vIRp8/g9zO4AOP2Pct0qHSK', 'male', 1),
(9, 'tuong', 'tuong@gmail.com', '$2y$10$4SewoILwmqc5w7wwVikiyuCjQ9vEGm8ODUW9iinNn33FbQGNyc7U6', 'male', 0),
(10, 'tuong01', 'user1@gmail.com', '$2y$10$R0oNuJuv.6yjnoO9vOZ7e.kSFjMJFtWFwRITiNn7bZMDoi7UOm4DS', 'male', 2),
(13, 'aaa', 'tuong04011998@gmail.com', '$2y$10$2roAxMcQeRp9lW4EiPoS6OSpccUj5QyNByGNqy63Tlr3g2/DNfA/C', 'male', NULL),
(14, 'huykieng10a9', 'huh@defalskd', '$2y$10$1ta30Y.y5fTCeLubEcZUnO/SBIMA0CT0xeUw8kL6Hmi3hjaERsUUa', 'male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid_id` int(11) NOT NULL,
  `vid_url` text NOT NULL,
  `vid_name` text NOT NULL,
  `vid_detail` text,
  `vid_gender` int(11) DEFAULT NULL COMMENT '1. male, 2. female',
  `vid_status` int(11) DEFAULT NULL,
  `vid_sub_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid_id`, `vid_url`, `vid_name`, `vid_detail`, `vid_gender`, `vid_status`, `vid_sub_detail`) VALUES
(1, 'https://www.youtube.com/embed/bleOTMDa3_4', 'Fat Burning for beginner workout in 15 minutes', 'Videos for busy women who do not have much time for going to gym. 15 minutes to work efficiently at home.', 2, 3, NULL),
(2, 'https://www.youtube.com/embed/2MoGxae-zyo', 'Fat Burning everyday in 2 weeks', 'People tend to do exercises just 1 or 2 week. This video helps people to efficiently lose weight with this 2 week program', 3, 3, NULL),
(3, 'https://www.youtube.com/embed/2J2g7XOr2i4', 'Jumping Jack Weight loss Workout', 'Fat Burning with jumping jack series exercises.', 3, 3, NULL),
(4, 'https://www.youtube.com/embed/WmSIMpIDa_A', 'Fat Burning with Yoga for beginner workout at home', '25 minutes yoga workout to melt out belly fat', 2, 3, NULL),
(5, 'https://www.youtube.com/embed/t7RhG0CEbVw', 'Challenging Yoga weight losing for people at home', '20 minutes fat burning Yoga workout beginner and intermediate', 2, 3, NULL),
(6, 'https://www.youtube.com/embed/95846CBGU0M', 'Building full body muscle at home', 'This video is a science-based full body home workout routine. ', 1, 2, NULL),
(7, 'https://www.youtube.com/embed/xRRS5eJLET4', 'Building muscle whole body without equipment', 'This video is a full body workout at home. Specially, these exercises help viewers to workout without equipment. ', 1, 2, NULL),
(8, 'https://www.youtube.com/embed/-kJAFNN8t2Y', 'Building chest muscle at home', 'This video supports viewers to build perfectly their chest at home. Save more time and release a massive result', 1, 2, NULL),
(9, 'https://www.youtube.com/embed/EHR3Rl26-4A', 'Grow your chest at home', 'Most people are under pressure that their chest can not grow much their chest size', 1, 2, NULL),
(10, 'https://www.youtube.com/embed/ccLoSTz0a_I', 'Grow bigger shoulders at home', 'If people want to build shoulders at home, people need to focus on hitting all of the three heads of the shoulders. Because adequately targeting and growing the front, middle, AND the often neglected rear delts really is key when it comes to creating that 3-dimensional, rounded look.', 1, 2, NULL),
(11, 'https://www.youtube.com/embed/g5oQZmk7xMc', 'Perfect home shoulder workout', 'Series workout exercises for people with pair of dumbbells', 1, 2, NULL),
(12, 'https://www.youtube.com/embed/XNTj8RZVcrE', 'Bigger arms workout', 'Exercises in this videos which just requires for a pair of dumbbells ', 1, 2, NULL),
(13, 'https://www.youtube.com/embed/rYrM6D8ChM4', 'Build Big Arms Without Any Equipment', 'specially, this video is made for those who can\'t go to the gym or do not have any gym equipment at home.', 1, 2, NULL),
(14, 'https://www.youtube.com/embed/_z_k8p36Fek', 'Build A Big Back At Home (NO WEIGHTS & NO PULL-UP BAR)', 'If you’re familiar with home workouts, you already know that the back is probably the most difficult muscle to adequately train at home without equipment and especially when there’s no pullup bar available', 1, 2, NULL),
(15, 'https://www.youtube.com/embed/2tnATDflg4o', 'How To Get A Strong Lower Back The RIGHT Way', 'Although lower back pain can stem from MANY different issues and there are MANY different solutions, research has indicated that a lot of people with lower back pain often tend to have issues with lower back strength and neuromuscular control.', 1, 2, NULL),
(16, 'https://www.youtube.com/embed/TUO2C3ztrj0', 'Leg Workout to Build Muscle From Home', '10 minutes workout to build leg muscle', 1, 2, NULL),
(17, 'https://www.youtube.com/embed/gE1OG72J7Ls', '5 EXERCISES THAT BUILT MY QUADS', 'Build your legs with 5 exercises quads', 1, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `history_details`
--
ALTER TABLE `history_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `history_id` (`history_id`),
  ADD KEY `in_id` (`in_id`);

--
-- Indexes for table `ibm`
--
ALTER TABLE `ibm`
  ADD PRIMARY KEY (`idBMI`),
  ADD KEY `FK_IBM_users` (`idUsers`),
  ADD KEY `statusBMI` (`statusBMI`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `in_cat` (`in_cat`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product_combo`
--
ALTER TABLE `product_combo`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `status` (`pro_status`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_details`
--
ALTER TABLE `history_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ibm`
--
ALTER TABLE `ibm`
  MODIFY `idBMI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_combo`
--
ALTER TABLE `product_combo`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `history_details`
--
ALTER TABLE `history_details`
  ADD CONSTRAINT `history_details_ibfk_1` FOREIGN KEY (`history_id`) REFERENCES `history` (`his_id`),
  ADD CONSTRAINT `history_details_ibfk_2` FOREIGN KEY (`in_id`) REFERENCES `ingredients` (`in_id`);

--
-- Constraints for table `ibm`
--
ALTER TABLE `ibm`
  ADD CONSTRAINT `FK_IBM_users` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`),
  ADD CONSTRAINT `ibm_ibfk_1` FOREIGN KEY (`statusBMI`) REFERENCES `product_status` (`status_id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`in_cat`) REFERENCES `food_categories` (`cat_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product_combo` (`pro_id`);

--
-- Constraints for table `product_combo`
--
ALTER TABLE `product_combo`
  ADD CONSTRAINT `status` FOREIGN KEY (`pro_status`) REFERENCES `product_status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 12:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `date`) VALUES
(177, 114, 2, 1, '2021-02-26 16:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_img`) VALUES
(12, 'INDOOR PALM PLANT', 'INDOOR PALM PLANTS.png'),
(18, 'OFFICE PLANT', 'OFFICE PLANT.png'),
(19, 'LARGE HOUSE PLANT', 'LARGE HOUSE PLANT.png'),
(20, 'SUCCULENT HOUSE PLANT', 'SUCCULENT HOUSE PLANT.png'),
(21, 'UNUSUAL PLANT', 'UNUSUAL PLANT.png'),
(22, 'LIVING STONE PLANT', 'LIVING STONE PLANT.png'),
(23, 'FERNS FOR INDOOR', 'FERNS FOR INDOOR.png'),
(24, 'FOLIAGE HOUSE PLANT', 'FOLIAGE HOUSE PLANT.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'New Order',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `shipping_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `quantity`, `status`, `date`, `shipping_address_id`) VALUES
(140, 114, 2, 3, 'Shipped', '2021-02-26 09:04:47', 19),
(141, 114, 2, 1, 'Delivered', '2021-02-26 09:07:05', 20),
(142, 114, 2, 1, 'Place Order', '2021-02-26 09:07:13', 21),
(143, 114, 2, 1, 'New Order', '2021-02-26 16:23:36', 22),
(144, 113, 2, 5, 'New Order', '2021-02-26 16:24:42', 23),
(145, 119, 2, 88, 'New Order', '2021-02-26 16:24:42', 23),
(146, 136, 2, 2, 'New Order', '2021-02-26 19:22:54', 19),
(147, 120, 2, 1, 'New Order', '2021-02-26 19:23:23', 20),
(148, 146, 2, 1, 'New Order', '2021-02-26 19:24:01', 21),
(149, 183, 2, 5, 'New Order', '2021-02-26 19:25:05', 22),
(150, 149, 2, 4, 'New Order', '2021-02-26 19:25:41', 23),
(151, 161, 2, 10, 'New Order', '2021-02-26 19:26:00', 24),
(152, 125, 2, 6, 'New Order', '2021-02-26 19:26:21', 25);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img`, `category_id`, `name`, `description`, `price`, `date`) VALUES
(112, 'Parlor Palm - Chamaedorea Elegans.png', 12, 'Parlor Palm - Chamaedorea Elegans', 'This palm is the most popular and well known, grown indoors. These are patient growers but after a few years of growth they can reach a height of about 3ft or more. Once they have developed in age and given the correct amount of light, they can produce small flowers.', 250, '2021-02-25 03:58:56'),
(113, 'Kentia Palm - Howea Forsteriana.png', 12, 'Kentia Palm - Howea Forsteriana', 'The Kentia is another popular choice of plant for indoor growers and is similar to the belmoreana (sentry palm) with the main difference (in looks) being the leaves do not arch as much with the Kentia. Similar to other palms, it is tolerant of lower temperatures and does not need a great amount of light for growth', 230, '2021-02-25 04:30:06'),
(114, 'Sentry Palm - Howea Belmoreana.png', 12, 'Sentry Palm - Howea Belmoreana', ' It can be quite hard to see the difference between this plant and the kentia, at first glance. The leaves on the sentry are also quite wide like the kentia forsteriana, although they arch over more. This type is also known as the curly palm, and grows slowly. This plant like other palms looks great placed in hallways or large rooms.', 200, '2021-02-25 04:30:45'),
(115, 'Pygmy Date - Phoenix Roebelenii.png', 12, 'Pygmy Date - Phoenix Roebelenii', 'The Pygmy date palm is also known as the miniature date or dwarf palm. This tree can grow to approximately 3ft, which is a good height that\'s manageable for a home or office. The leaves are much slimmer in width than the three above.', 300, '2021-02-25 04:31:14'),
(116, 'European Fan - Chamaerops Humilis.png', 12, 'European Fan - Chamaerops Humilis', 'The fan palm is said to grow well indoors compared to other fan type of palms. Fan types are generally not as popular as other palms. These grow several stems from the base and produce fronds that look similar to a fan. Once they grow and mature they are an attractive plant', 370, '2021-02-25 04:32:15'),
(117, 'Lady Palm - Rhapis Excelsa.png', 12, 'Lady Palm - Rhapis Excelsa', 'This plant is another fan type of palm that can be grown indoors. These can grow up to 2-7 ft high and grow much slower than many other palms. If you find the fan type palms look appealing and this one is a good option to consider. Indoors the Lady palm can grow up to 14ft tall.', 350, '2021-02-25 04:33:07'),
(118, 'Areca Palm - Dypsis Lutescens.png', 12, 'Areca Palm - Dypsis Lutescens', 'The areca is a cane type palm with several common names including butterfly palm. This species displays similar fronds as the kentia and grows up to 8ft tall, which makes it a great focal point of large rooms or within office reception areas. Growing is easy and very similar to many of the other palms. This species is the most popular grown indoors from it\'s genus (dypsis) and sold at many garden stores.', 350, '2021-02-25 04:33:33'),
(119, 'Sago Palm - Cycas Revoluta.png', 12, 'Sago Palm - Cycas Revoluta', 'The sago palm is named palm, although it\'s not a true palm (just has similar looks). It will not grow well like some many other palms in low light conditions and prefers above average humidity levels. Growing up to about 2ft tall indoors this species is a slow grower - so plenty of patience is needed for a young plant. If you have pets think twice about growing a sago palm because it\'s highly toxic and can cause death if ingested.', 350, '2021-02-25 04:34:17'),
(120, 'Canary Island Date Palm - Phoenix Canariensis.png', 12, 'Canary Island Date Palm - Phoenix Canariensis ', 'The Canary date palm shares many similarities with the Pygmy date (Phoenix roebelenii) within the same genus. The leaflets on this species are straight, fairly stiff and narrow in width. Indoors your able to grow these up to approximately 6 ft tall, while outdoors anything up to 20 meters. Best suited to be planted in containers within a conservatory or a warm green house and also enjoy being placed outside in warm conditions.', 390, '2021-02-25 04:34:47'),
(123, 'Lucky Bamboo - Dracaena Braunii.png', 18, 'Lucky Bamboo - Dracaena Braunii', 'The lucky bamboo is a popular desk office plant which may bring you some good fortune (if not it will improve the look of your desk area). These plants can grow in soil or water and are sold braided for their attractiveness. Caring for them is very easy - when they are grown in a vase of water, although you must change this water once a week. Provide the luck bamboo with a nice bright spot without direct sun, if possible.', 450, '2021-02-26 10:13:08'),
(124, 'Dragon Tree - Dracaena Marginata.png', 18, 'Dragon Tree - Dracaena Marginata', 'Madagascar dragon trees are extremely popular indoor plants and they\'re as tough as plants get when faced with neglect. They make a great tall tree like office plant, although they take quite a few years to mature in height. For an office they’re best bought when they have already grown up to 4ft or more, ready for the place they will be displayed. This is a very easy species to manage suitable for offices.', 1000, '2021-02-26 10:14:07'),
(125, 'Peace Lily - Spathiphyllum Wallisii.png', 18, 'Peace Lily - Spathiphyllum Wallisii', 'Peace lilies are the ideal plants to grow within an office because they\'re attractive, remove pollutants well, and survive well on basic care instructions. Up to 3 or more white spathes (flower) with a spadix in the center bloom and sit above the glossy oval shaped elongated leaves. Peace lilies can be placed in many locations within an office including windowsills, on tables or desks. Provide these with bright light then they will flourish.', 395, '2021-02-26 10:15:27'),
(126, 'Kentia Palm - Howea Forsteriana.png', 18, 'Kentia Palm - Howea Forsteriana', 'Kentia palms make a suitable reception area plant and stand tall, growing up to 10ft tall. These can be purchased from garden centers when they’ve already matured and grown up to 6ft, but they\'re not cheap. The wide fronds (leaves) on the kentia arch over slightly and grow to over a foot long. Like all palms they need good drainage to prevent the roots from rotting.', 350, '2021-02-26 10:16:01'),
(127, 'Bunny Ear Cactus - Opuntia Microdasys.png', 18, 'Bunny Ear Cactus - Opuntia Microdasys', 'The bunny ear cactus is a desert type cacti plant which grows well with very little water and plenty of light, like most other desert cacti. It\'s named bunny ears because of the rabbit shaped formation of the pads. It\'s also known as the polka dot cactus because of the dots that protrude and cover the pads. The only issue a grower may have is they need some time during the winter to rest. ', 100, '2021-02-26 10:16:45'),
(128, 'Jade or Money Plant - Crassula Ovata.png', 18, 'Jade or Money Plant - Crassula Ovata', 'The jade plant is a popular house plant also know as the money, lucky and friendship plant. This is a succulent species which stores water in it\'s fleshy leaves. For the jade to grow well it prefers a nice sunny spot and watering when the soil begins to dry, but do not over-water. The thick trunk and branches give this plant a tree like look similar to a bonsai tree. Moderate care is required.', 150, '2021-02-26 10:17:27'),
(129, 'Howea forsteriana.png', 19, 'Howea forsteriana', 'Palms are a good choice because of their height. The kentia is very popular and is available to purchase from many garden stores. The arching fronds can grow up to 1ft in length and it\'s possible for the plant to grow over 10ft tall. They are an easy plant to care for and maintain.', 2000, '2021-02-26 10:18:23'),
(130, 'Philodendron scandens.png', 19, 'Philodendron scandens', 'The heartleaf philodendron is a popular climber type plant grown indoors. To enable these to become large house plants you\'ll need to grow them on a \'moss stick\' which will encourage it to climb over 5ft tall. Glossy heart shaped leaves make them very attractive.', 750, '2021-02-26 10:19:05'),
(131, 'Calathea zebrina.png', 19, 'Calathea zebrina', 'The Calathea zebrina is a plant I can suggest because of its large leaves rather that its height, although it will grow up to a meter tall. Other Calatheas also display large patterned leaves including the C. oranata and  C. rosepicta from the Marantaceae plant family.', 550, '2021-02-26 10:19:41'),
(132, 'Pachira aquatica.png', 19, 'Pachira aquatica', 'The braided trunk and attractive whorled leaves of the Pachira aquatica has made this species a popular house plant. Depending on how the plant was initially grown and trained determines the size, and you\'ll find small bonsai types and much taller plants growing up to 10ft in height.', 450, '2021-02-26 10:20:14'),
(133, 'Dieffenbachia amoena.png', 19, 'Dieffenbachia amoena', 'Plants from the Dieffenbachia genus have spectacular patterned large leaves. They can be grown up to 6ft tall or more. These are very sturdy and strong plants that are fairly easy to grow if enough light and humidity is given. The major downside for the dumb canes is they\'re highly toxic.', 400, '2021-02-26 10:21:04'),
(134, 'Aspidistra elatior.png', 19, 'Aspidistra elatior', 'Named cast iron plant because of its ability to withstand neglect, making it very easy to care for and maintain. They can grow as tall as a meter in height and display long shiny lance olate leaves. Their popularity and ease of care has made them easy to find and purchase in garden stores and nurseries.', 400, '2021-02-26 10:21:55'),
(135, 'Monstera deliciosa.png', 19, 'Monstera deliciosa', 'A climbing epiphyte species with aerial roots that meets the large house plants criteria is the Swiss cheese plant. These will grow over 10ft tall if grown correctly and trained. In their natural habitat they climb the trunk and branches of trees and within homes we mimic this with moss sticks. ', 5000, '2021-02-26 10:23:06'),
(136, 'Asplenium nidus.png', 19, 'Asplenium nidus', 'The Bird\'s nest fern displays large fronds that grow 2ft in length when given the correct conditions that can enable them to thrive. They\'re ideal for displaying in conservatories and need enough light and humidity to grow well. Displayed close to other plants can improve the important humidity factor. ', 350, '2021-02-26 10:24:06'),
(137, 'Ficus elastica.png', 19, 'Ficus elastica', 'Rubber plants are very popular house plants that can grow over 5 - 10ft tall with the correct conditions, although indoors more than likely about 5 - 6ft. Large glossy ovate leaves grow from the semi woody stems. A number of F. elastica varieties are available that vary in appearance.', 3500, '2021-02-26 10:24:44'),
(138, 'Aloe Vera - Aloe.png', 20, 'Aloe Vera - Aloe', 'The Aloe plant is well known for its health and beauty benefits. These are very easy to care for and require little maintenance. Bright light without direct sunlight, a good soil mix that can keep the roots of the plant well aerated are part of keeping this species thriving. ', 50, '2021-02-26 10:27:12'),
(139, 'Coral Cactus - Eurphorbia Lactea Crest.png', 20, 'Coral Cactus - Eurphorbia Lactea Crest', 'This unusual species the Coral cactus at first glance looks like thick lettuce leaves on a stem. It also looks very similar to types of coral reef, where it got its name. This plant is not a cactus, it\'s actually a Eurphorbia that has been transfigured. An easy to care for species.', 2500, '2021-02-26 10:27:57'),
(140, 'Kaffir Lily - Clivia Miniata.png', 20, 'Kaffir Lily - Clivia Miniata', 'The Kaffir lily is a flowering house plant that blooms beautiful orange (my favorite), red yellow and cream flowers, in clusters of more than 10. These are fairly easy to care for, however, they may not bloom if not cared for correctly. It\'s a must to understand the Kaffir\'s needs. ', 450, '2021-02-26 10:28:37'),
(141, 'Jade or Money Plant - Crassula Ovata.png', 20, 'Jade or Money Plant - Crassula Ovata', 'The jade plant is a popular house plant also know as the money, lucky and friendship plant. This is a succulent species which stores water in it\'s fleshy leaves. For the jade to grow well it prefers a nice sunny spot and watering when the soil begins to dry, but do not over-water. The thick trunk and branches give this plant a tree like look similar to a bonsai tree. Moderate care is required.', 150, '2021-02-26 10:29:08'),
(142, 'Mother In Laws Tongue - Sansevieria T.png', 20, 'Mother In Laws Tongue - Sansevieria T', 'The mother in laws tongue (also known as snake plant) is a flowering species which is primarily grown for it\'s slick looking long leaves. This is a slow growing plant that anyone can grow because of it\'s low or high sun light tolerance and ease of watering.', 250, '2021-02-26 10:29:47'),
(143, 'Mother Of Thousands - B. Daigremontianum.png', 20, 'Mother Of Thousands - B. Daigremontianum', 'Mother of Thousands is a succulent plant that produces many small plantlets at the edge of the leaves. This is where it gets its common name from. This species has numerous names including Devils Backbone, Mexican Hat and others.', 900, '2021-02-26 10:30:17'),
(144, 'Panda Plant - Kalanchoe Tomentosa.png', 20, 'Panda Plant - Kalanchoe Tomentosa', 'The panda plant (botanical name: kalanchoe tomentosa) is a fairly easy succulent plant species to care for and maintain – which is grown for it\'s interesting furry leaves. The panda plant being a succulent type species grows thick leaves for water storage purposes, which means watering less often for the grower. These velvety leaves are greenish gray in color. ', 150, '2021-02-26 10:30:50'),
(145, 'Donkeys Tail Plant - Sedum Morganianum.png', 20, 'Donkeys Tail Plant - Sedum Morganianum', 'The Donkeys tail succulent plant is also known as the Burros tail. This is grown primarily in a hanging basket because of its trailing growing nature, although it is still suited to windowsills or shelves. Flowering is difficult indoors although plenty of sun and correct temperatures may encourage them. The leaves are green and grayish in color. ', 65, '2021-02-26 10:31:23'),
(146, 'Zebra - Haworthia Fasciata - Attenuata.png', 20, 'Zebra - Haworthia Fasciata - Attenuata', 'This species is from the same sub-family of the Aloe plant and has many similar characteristics. Named Zebra because of its distinct Zebra like stripes that are tubercles (like warts). They flower rarely indoors and produce small tubular shaped blooms on a inflorescence . It\'s very easy to care for and like most succulents just avoid overwatering during winter.', 195, '2021-02-26 10:31:53'),
(147, 'Tiger Jaws - Faucaria Tigrina.png', 20, 'Tiger Jaws - Faucaria Tigrina', 'This is a great looking succulent. The flowers that bloom during fall and the beginning of winter are bright yellow in color and open then close during the day and approaching night. The foliage is also very attractive that resembles jaws with teeth. These teeth are spines that collect moisture.', 250, '2021-02-26 10:32:23'),
(148, 'Housetree Leek - Aeonium Arboreum.png', 20, 'Housetree Leek - Aeonium Arboreum', 'The Housetree leek is a fascinating species for a succulent - in how it looks, its color and tree like stems. A difficulty for many growers to overcome is being able to provide enough sunlight and this is why those with conservatories are able to grow them well. ', 900, '2021-02-26 10:32:56'),
(149, 'Jelly Beans - Sedum Pachphyllum.png', 20, 'Jelly Beans - Sedum Pachphyllum', 'This succulent plant from the Sedum genus and is named Jelly beans because of it\'s leaves that look similar to the sweets, Jelly beans. This species grows up to about 30 cm tall with a thick stem. When in flower it produces small yellow petals. Easy plant to grow and maintain. ', 85, '2021-02-26 10:33:23'),
(150, 'Lucky Bamboo - Dracaena Braunii.png', 20, 'Lucky Bamboo - Dracaena Braunii', 'The Christmas cheer plant is a hybrid of the Sedum pachyphyllum (Jelly beans). The main difference between these species is the Christmas cheer leaves will turn red when provided enough sunlight and the leaves usually grow a bit smaller. ', 85, '2021-02-26 10:34:20'),
(151, 'Truncate - Lithops Pseudotruncatella.png', 20, 'Truncate - Lithops Pseudotruncatella', 'The Lithops pseudotruncatella has the common name of Truncate living stone plant. It has the obvious and unique living stones look, similar to large pebbles. The foliage only grows up to a couple of inches high and is olive green and brown in color.', 100, '2021-02-26 10:34:52'),
(152, 'Century Plant - Agave Americana.png', 20, 'Century Plant - Agave Americana', 'The Century plant is also known as the Agave cactus, American aloe and maguey. In its natural sub-tropical habitat it can grow over 1.5m tall and has a wide spread. Variegated varieties are an attractive plant.', 1000, '2021-02-26 10:35:24'),
(153, 'Argyroderma testiculare.png', 20, 'Argyroderma testiculare', 'The Argyroderma testiculare displays greenish gray leaves which are split in the center. This center is where the attractive daisy like flower blooms. Another living stones succulent plant type to add to the collection.', 350, '2021-02-26 10:35:53'),
(154, 'Coral Cactus - Eurphorbia Lactea Crest.png', 21, 'Coral Cactus - Eurphorbia Lactea Crest', 'At first glance the Coral cactus looks like lettuce leaves on a stem. It also looks very similar to types of coral reef, where it got its name. This plant is not a cactus, it\'s actually a Eurphorbia that has been transfigured. The coral is easy to take care of, but a grower needs to be careful not to over water it.', 2500, '2021-02-26 10:37:05'),
(155, 'Urn Plant - Aechmea Fasciata.png', 21, 'Urn Plant - Aechmea Fasciata', 'While the Urn plant does look odd at first, after closer viewing it looks quite beautiful. The pink flower can last a few months and the wide leaves have a kind of marble effect, making it quite unique. These grow in height from about 1ft - 3ft and spread in width up to 2ft. The Aechmea has a lovely exotic look about it.', 950, '2021-02-26 10:38:21'),
(156, 'Medusas Head - Tillandsia Caput Medusae.png', 21, 'Medusa\'s Head - Tillandsia Caput Medusae', 'This Tillandsia is a very unusual looking house plant and has the common name of Medusa\'s head because the foliage is so similar looking to Medusa\'s hair, well snakes. This is an air plant which means it takes water from the surrounding air and vital nutrients.', 150, '2021-02-26 10:38:58'),
(157, 'Goats Horn Cactus - Astrophytum Capricorne.png', 21, 'Goats Horn Cactus - Astrophytum Capricorne', 'The Astrophytum capricorne cactus, with the common name of Goat\'s horn has prominent spines and blooms a glorious yellow flower. The goat\'s horn is one of the most popular cacti from the Astrophytum genus, although quite rare. This species adapts well to various temperatures, although they prefer temperatures above 50°F (10°C).', 700, '2021-02-26 10:39:24'),
(158, 'The One Colored Paphiopedilum.png', 21, 'The One Colored Paphiopedilum', 'This Paphiopedilum is part of the orchid family that blooms fabulous yellowish spotted flowers. The Concolor is native to a few Asian countries including Thailand which is my second home 6 months of the year and makes it one of my favorites added to this collection. This plant is more unique in looks (the flowers) than unusual.', 450, '2021-02-26 10:39:53'),
(159, 'Flaming Sword - Vriesea Splendens.png', 21, 'Flaming Sword - Vriesea Splendens', 'Vriesea splendens have the common name flaming sword from the large bright red flower that blooms within the center of the foliage. These are grown for flowering and the attractive zebra looking foliage which quite outstanding. A grower needs to provide the right setting and care for this plant to enable it to mature at it\'s best.', 1400, '2021-02-26 10:40:21'),
(160, 'Argyroderma testiculare.png', 22, 'Argyroderma testiculare', 'Popular within the Argyroderma genus is the A. testiculare that can display a bright pink or purple flower with a yellow center. The paired light green leaves look slightly egg shaped with a split in the middle, which is where the colorful flower blooms.', 350, '2021-02-26 10:41:41'),
(161, 'Lithops Fulleri.png', 22, 'Lithops Fulleri', 'From the living stones group Lithops are the most popular. Lithops fulleri leaves are conjunct lobes that are gray-green in color and divided, slightly. A daisy like flower blooms during summer from the middle section that\'s split.', 100, '2021-02-26 10:42:32'),
(162, 'Lithops optica Rubra.png', 22, 'Lithops optica \'Rubra\'', 'Another species from the Lithops genera is the Lithops optica \'Rubra. The club shaped paired leaves are pink in color with a purple hue and similar to the L. fulleri it blooms a daisy like flower from the center of the leaves.', 100, '2021-02-26 10:44:04'),
(163, 'Lithops Pseudotruncatella.png', 22, 'Lithops Pseudotruncatella', 'I found the Lithops pseudotruncatella has a kind of common name of truncate living stone. They are all basically named living stones or pebble plants. This species has a great stone like camouflage appearance.', 100, '2021-02-26 10:45:07'),
(164, 'Conophytum ficiforme.png', 22, 'Conophytum ficiforme', 'Conophytum ficiforme from the popular cone plants genus of living stones received the Latin name of ficiforme, meaning fig shaped and cone plants is Latin for Conophytum. Another summer dormancy species.', 100, '2021-02-26 10:45:44'),
(165, 'Birds Nest - Asplenium Nidus.png', 23, 'Birds Nest - Asplenium Nidus', 'The birds nest fern has to be one of my favorites and looks very different than most other ferns. The attractive fronds on this species are spear like in shape and look shiny when the plant is in good health. Like other ferns moisture is very important for them to grow well.', 350, '2021-02-26 10:46:35'),
(166, 'Boston Fern - Nephrolepis Exaltata.png', 23, 'Boston Fern - Nephrolepis Exaltata', 'The Boston fern is one the easiest of ferns to grow indoors, although it still is a needy species and does not like the initial move from one place to another or from outdoors to indoors. The arching fronds grow in a manner that makes them an ideal hanging basket plant.', 300, '2021-02-26 10:47:05'),
(167, 'Cretan Brake - Pteris Cretica.png', 23, 'Cretan Brake - Pteris Cretica', 'The Cretan brake is another interesting looking fern that has fronds that are available in different color varieties and vary how they form. Not a hard species to grow indoors and it\'s propagated by spores on the outer edge of it\'s leaflets. Not easy to propagate though. ', 1000, '2021-02-26 10:47:31'),
(168, 'Maidenhair Fern - Adiantum Raddianum.png', 23, 'Maidenhair Fern - Adiantum Raddianum', 'The Maidenhair can be a tricky species to grow because of it\'s constant need of moisture. It\'s a popular plant for adding to a collection of plants within a terrarium and grows well within conservatories. The Adiantum raddianum is the easiest to grow from the Adiantum genus.', 550, '2021-02-26 10:48:03'),
(169, 'Rabbits Foot - Davallia Fejeensis.png', 23, 'Rabbit\'s Foot - Davallia Fejeensis', 'An interesting fern is the Rabbit\'s foot fern that grows creeping rhizomes over the pot edges. These creeping rhizomes gives this plant it\'s common name. Small leaflets are displayed on the fronds with wiry stems. Makes a great hanging basket companion for a conservatory. ', 350, '2021-02-26 10:49:07'),
(170, 'Aluminum Plant - Pilea Cadierei.png', 24, 'Aluminum Plant - Pilea Cadierei', 'The aluminum plant is an easy to grow species native to China and Vietnam. It\'s a bush type plant which grows up to 12 inches tall and displays glossy green and silver oval shaped leaves. Place the pilea cadierei in a brightly lit spot with some sunlight to encourage it to thrive and grow well. Pruning each spring encourages new growth and spread.', 175, '2021-02-26 10:50:14'),
(171, 'Cast Iron Plant - Aspidistra Elatior.png', 24, 'Cast Iron Plant - Aspidistra Elatior', 'Cast iron is its name for one reason only; it\'s cast iron in strength when adapting to low light and neglect. The only ways to really upset this plant is over-watering or re-potting too often. There are two varieties with plain green and variegated (has cream colored stripes) linear shaped leaves. The elatior can grow up to nearly 1 metre tall, once it\'s fully matured.', 1750, '2021-02-26 10:50:45'),
(172, 'Chinese Evergreen – Aglaonema.png', 24, 'Chinese Evergreen – Aglaonema', 'An array of hybrid plants from the aglaonema genus cultivated over the years because of their increase in popularity. The evergreen grows up to 3ft tall and displays oval shaped leaves that grow 30cm in length. A good supply of varieties offers growers different leaf color variations. Variegated do not tolerate low light as good as the plain green variety.', 500, '2021-02-26 10:51:20'),
(173, 'Croton Variegated - Codiaeum Variegatum.png', 24, 'Croton Variegated - Codiaeum Variegatum', 'Croton plants can be quite demanding for the average grower, so a beginner plant they\'re not. This species enjoys it\'s bright light, high humidity levels and moist soil which drains well. The leaves on the most popular variety are leathery types which are green with yellow prominent veins that turn a reddish purple color. Because these plants need bright light and space they\'re grown quite often in conservatories or greenhouses.', 450, '2021-02-26 10:51:52'),
(174, 'Dumb Cane - Dieffenbachia Amoena.png', 24, 'Dumb Cane - Dieffenbachia Amoena', 'The dumb cane is an easy to grow plant that survives well on basic care conditions that should be provided. Due to it\'s easy going nature it\'s become a very popular ornamental foliage house plant. Once the plant matures it can reach up to 6ft in height, although 3 - 4ft is more common. Like many other foliage house plants they do produce flowers in their natural habitat, but rarely indoors. ', 1100, '2021-02-26 10:52:19'),
(175, 'European Fan Palm - Chamaerops Humilis.png', 24, 'European Fan Palm - Chamaerops Humilis', 'The European fan palm is an easy to please palm tree which grows up to a manageable size of 4ft tall, indoors. This is the only palm native to Europe which is why it grows very well in temperate regions. The fronds stretch out and display similar to how a Spanish hand fan, and the trunk becomes thick and kind of furry. This is one of the easiest of palm type trees to grow indoors although it does not grow very tall.', 450, '2021-02-26 10:52:48'),
(176, 'Golden Pothos - Epipremnum Aureum.png', 24, 'Golden Pothos - Epipremnum Aureum', 'The pothos is a climbing type vine that has aerial roots. Because these grow up to six feet tall and only have thin stems they need support if a grower wants it to grow upwards in height rather than hanging. A common method growers use to support the golden pothos is using a moss stick. In Britain the Epipremnum Aureum is known as the devils ivy.', 650, '2021-02-26 10:53:24'),
(177, 'Kentia Palm - Howea Forsteriana.png', 24, 'Kentia Palm - Howea Forsteriana', 'The kentia is said to be a vulnerable species native to Lord Howe Island in Australia. The is a feather type palm which grows up to 10ft tall indoors and displays elegant wide fronds. This palm is very popular in Britain and is easy to grow; when applying the basic care conditions correctly. The kentia is faster growing than some of the other palm plants.', 350, '2021-02-26 10:54:08'),
(178, 'Lucky Bamboo - Dracaena Braunii.png', 24, 'Lucky Bamboo - Dracaena Braunii', 'The lucky bamboo is from the popular ornamental indoor plant genus “dracaena”, and can be grown in water or soil. Indoors these grow up to approximatively 2 -3 ft tall and display small oval leaves and cane like stalks. These are grown mostly in homes and offices for decorative purposes and trained in different braided styles. They’re easy to grow and care for.', 450, '2021-02-26 10:54:51'),
(179, 'Madagascar Dragon Tree - Dracaena Marginata.png', 24, 'Madagascar Dragon Tree - Dracaena Marginata', 'Plants don’t get much easier to grow than the dracaena marginata - and they fight back to full health so easily after periods of neglect. They will grow up to 6ft, although this takes a number of years; they\'re slow growers. Maintain the correct conditions for the dragon tree will enable the leaves to stay attractive. ', 1000, '2021-02-26 10:55:34'),
(180, 'Panda Plant - Kalanchoe Tomentosa.png', 24, 'Panda Plant - Kalanchoe Tomentosa', 'The panda plant (botanical name: kalanchoe tomentosa) is a fairly easy succulent plant species to care for and maintain – which is grown for it\'s interesting furry leaves. The panda plant being a succulent type species grows thick leaves for water storage purposes, which means watering less often for the grower. These velvety leaves are greenish gray in color. ', 150, '2021-02-26 10:56:23'),
(181, 'Swiss Cheese Plant - Monstera Deliciosa.png', 24, 'Swiss Cheese Plant - Monstera Deliciosa', 'The Swiss cheese plant is an exciting foliage plant to grow and reaches well over 6 ft tall when grown indoors. Although it does flower (and produces edible fruit) the main attraction is the glossy green leaves that grow fairly tall. Do be warned this is a tropical plant that likes fairly warm conditions with humidity levels higher than many other house plants.', 1000, '2021-02-26 10:57:03'),
(182, 'Braided Money Tree - Pachira Aquatica.png', 24, 'Braided Money Tree - Pachira Aquatica', 'Most commonly known as the braided money tree when grown indoors. This species is s tree type plant which supposedly offers feng shui enthusiasts good fortune. The trunks are braided and the tree can grow up to 10ft tall or can be grown as a bonsai. Plenty of bright light and the right amount of watering (not too much) are the two main components to keep this tree healthy.', 3000, '2021-02-26 10:57:41'),
(183, 'Zebra Plant - Calathea Zebrina.png', 24, 'Zebra Plant - Calathea Zebrina', 'The zebra plant displays large patterned ovate leaves on tall stalks. These leaves are light green with dark green stripes which is why it\'s been given the common name of zebra. It\'s not really a beginner plant or in need of an expert grower, however, it does need a grower to pay attention to it\'s temperature and high humidity needs. The striking foliage makes it well worth the growers effort.', 1200, '2021-02-26 10:58:11'),
(184, 'Wandering Jew - Tradescantia Fluminensis.png', 24, 'Wandering Jew - Tradescantia Fluminensis', 'The common wandering jew is given to various plant varieties from the tradescantia genus. These are trailing types suitable for growing indoors in containers and hanging baskets. They do bloom small flowers which are non-showy, but they\'re primarily grown indoors for their foliage. An interesting feature of the F. zebrina is the purplish leaf undersides and the purple young leaves which turn green.', 650, '2021-02-26 10:59:07'),
(185, 'Watermelon Peperomia - Peperomia Argyela.png', 24, 'Watermelon Peperomia - Peperomia Argyela', 'A low growing plant that grows up to a maximum of 12 inches tall. Although the Watermelon peperomia is small it\'s leaves are large displaying striking green and silver stripes. Even those new to growing indoors will find this plant easy to grow, although attention must be paid to watering. Peperomia\'s are popular plants.', 650, '2021-02-26 10:59:38'),
(186, 'Rose Painted Calathea - Calathea Roseopicta.png', 24, 'Rose Painted Calathea - Calathea Roseopicta', 'Another Calatheae species that displays striking foliage. The ovate leaves display pinkish colored stripes on a green background. This Calathea does not grow as tall as the Zebra, however, it does share the same undemanding care needs. Although this plant flowers during the summer the main attraction is the leaves.', 1000, '2021-02-26 11:00:12'),
(187, 'Birds Nest Fern - Asplenium Nidus.png', 24, 'Bird\'s Nest Fern - Asplenium Nidus', 'A relatively easy fern plant to grow and maintain indoors that displays two foot long fronds when the plant has matured. The is an epiphytic plant growing in tropical countries that has adapted well to our cooler climates and planted within soil. Out of all ferns this is often the favorite for many people growing indoors.', 980, '2021-02-26 11:00:45'),
(188, 'Mother Of Thousands - B. Daigremontianum.png', 24, 'Mother Of Thousands - B. Daigremontianum', 'Mother of Thousands is a succulent plant that produces many small plantlets at the edge of the leaves. This is where it gets its common name from. This species has numerous names including Devils Backbone, Mexican Hat and others.', 900, '2021-02-26 11:01:21'),
(189, 'Heartleaf - Philodendron Scandens.png', 24, 'Heartleaf - Philodendron Scandens', 'This Philodendron is a climbing plant that displays glossy heart shaped leaves and that is where it gets its common names of Heartleaf philodendron and Sweetheart plant from. Looks superb grown on a moss stick.', 850, '2021-02-26 11:02:06'),
(190, 'Arrowhead Plant - Syngonium Podophyllum.png', 24, 'Arrowhead Plant - Syngonium Podophyllum', 'The Arrowhead head is a very similar species to the Philodendron and is part of the same family of plants. These have to be well pruned to avoid too much growth. The leaves have various growth patterns depending on their maturity.', 900, '2021-02-26 11:02:41'),
(191, 'Green Velvet - Alocasia Micholitziana.png', 24, 'Green Velvet - Alocasia Micholitziana', 'The Green Velvet Alocasia displays striking arrow shaped leaves with deep white colored veins. Quite difficult to grow indoors well, so your green thumb may be required for this plant. Another member of the genus named Alocasia Amazonica is more popular than this species.', 1200, '2021-02-26 11:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT 0,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `text`, `date`) VALUES
(13, 112, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 09:57:28'),
(14, 112, 2, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 09:57:28'),
(15, 114, 2, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 09:57:28'),
(17, 114, 16, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 14:50:47'),
(18, 114, 16, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 14:52:31'),
(19, 114, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 16:26:02'),
(20, 134, 2, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:19:59'),
(21, 138, 16, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:20:20'),
(22, 170, 16, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:20:37'),
(23, 118, 2, 3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:20:53'),
(24, 136, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:21:25'),
(25, 114, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:27:21'),
(26, 114, 16, 0, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:27:34'),
(27, 138, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:27:59'),
(28, 170, 2, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam cupiditate error cumque neque sunt minima culpa facere. Maxime aut omnis tempora, iusto natus ipsam qui. Provident explicabo rerum dolore.', '2021-02-26 19:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `house_number`, `street`, `brgy`, `city`, `province`) VALUES
(19, '0534', 'purok 8', 'San Bartolome', 'Santo Tomas City', 'Batangas'),
(20, '0683', 'purok 2', 'San Bartolome', 'Santo Tomas City', 'Batangas'),
(21, '0988', 'purok 3', 'Ulango', 'Tanauan City', 'Batangas'),
(22, '0243', 'purok 9', 'San Miguel', 'Santo Tomas City', 'Batangas'),
(23, '0111', 'purok6', 'San Pedro', 'Santo Tomas City', 'Batangas'),
(24, '0283', 'purk 4', 'San Vicente', 'Santo Tomas City', 'Batangas'),
(25, '0552', 'Purok 10', 'San Miguel', 'Santo Tomas City', 'Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `contactnumber` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `contactnumber`, `email`, `password`, `firstname`, `middlename`, `lastname`, `house_number`, `street`, `brgy`, `city`, `province`, `role`) VALUES
(1, '0', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', '', '', '', 'admin'),
(2, '0', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Carol', 'Denvers', 'Denvers', '0534', 'purok 8', 'San Bartolome', 'Santo Tomas City', 'Batangas', 'user'),
(16, '213', 'asd@asd.asd', '7815696ecbf1c96e6894b779456d330e', 'Monica', 'Rembeau', 'Rembeau', '0988', 'purok 3', 'Ulango', 'Tanauan City', 'Batangas', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_ibfk_2` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orders_ibfk_2` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reviews_ibfk_3` (`user_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

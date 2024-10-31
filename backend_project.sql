-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 30-Out-2024 às 23:44
-- Versão do servidor: 5.7.39
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `backend_project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `about_text` text NOT NULL,
  `image_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_image`, `about_text`, `image_alt`) VALUES
(1, 'Who is ADVENTURE/PARTS', 'HP-rotace1-min.jpg', 'We, at RADE/GARAGE are a lot like you. We work, we dream and we ride. It just happens that we dream of parts that will make our and your rides easier and more enjoyable. We work hard to produce the highest quality parts and accessories for KTM and Husqvarna motorcycles. And we ride all around the world to test them, so you get the best looking and most functional products.;\r\n\r\nThe look is as important to us as function. We pay attention to contours, edges and quality of the finish color as well as to weight, simple install and maintenance and of course reliability. We too ride in remote places where failure is not an option.;\r\n\r\nWe thrive for continuous improvement and want your feedback. When we update our products, we offer upgrades for our existing customers where possible. This ensures everyone has the best experience with our products.;\r\n\r\nWe would like for you to enjoy not just the parts but the whole buying and installation process. We want everything to be perfect, but we are humans. And humans can make a mistake from time to time. Our promise is that if that happens we will work to quickly resolve it to your satisfaction. After all, all of our products are backed with 100% money back guarantee.;\r\n\r\nWe are based in Caneças, near Lisbon (EU). If you ever happen to ride nearby, just let us know and you are always welcome in our garage.;\r\n\r\nR/G team', 'our garage');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `employee_number` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `employee_number`, `email`, `password`) VALUES
(12, 'admin', '123456789', 'admin@admin.com', '$2y$10$nuPE5Lc.TOoAd4HkgUgOZeGxcu0RU1/HRA0hQ4IgUo42cQ1SK1KLG'),
(17, 'Allavez', '000000001', 'allavez@allavez.com', '$2y$10$OgdhshbboJcQ85OjHld8Leb48VUc71O5mMN6Y4F2z5FphX35H2x6K');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(20) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Categories`
--

INSERT INTO `Categories` (`category_id`, `category_name`, `category_slug`, `category_image`) VALUES
(1, 'KTM 990', 'ktm-990', 'KTM-990-min.jpg'),
(2, 'Husqvarna 701', 'husqvarna-701', 'Husqvarna-701-min.jpg'),
(3, 'GasGas 700', 'gasgas-700', 'GasGas700-min.jpg'),
(4, 'KTM 690', 'ktm-690', 'KTM-690-2019-min.jpg'),
(5, 'KTM 890', 'ktm-890', 'KTM-790-min.jpg'),
(6, 'All products', 'all', 'All-R_G-products-min.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`contact_id`, `topic`, `description`, `category`, `year`, `order_id`, `email`, `country`, `created_at`) VALUES
(1, 'shipping', 'Exercitationem sunt porro officia totam iusto est ex est ut facere maxime corporis quibusdam natus vero corrupti elit', 'All products', '2018', '534', 'jegu@mailinator.com', 'Spain', '2024-10-29 22:21:14'),
(2, 'mounting', 'Sit mollitia odit nisi sunt', NULL, NULL, NULL, 'gyryxy@mailinator.com', NULL, '2024-10-29 22:21:42'),
(3, 'pre-sale_query', 'Voluptatem possimus rerum velit nihil dolor incididunt ut culpa aut minim qui quam velit dolor in ut laboris', 'KTM EXC 500', '1980', '111', 'qaduwuj@mailinator.com', 'Spain', '2024-10-29 23:21:23'),
(4, 'missing', 'Sint proident laboris odio natus reiciendis sequi ea amet', 'KTM 890', '1985', '444', 'pyfam@mailinator.com', 'Portugal', '2024-10-30 22:16:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `code` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`code`, `name`) VALUES
('DE', 'Germany'),
('ES', 'Spain'),
('FR', 'France'),
('IT', 'Italy'),
('JP', 'Japan'),
('PT', 'Portugal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descriptions_content`
--

CREATE TABLE `descriptions_content` (
  `content_id` int(11) NOT NULL,
  `product_descriptions_id` int(11) DEFAULT NULL,
  `content_type` enum('paragraph','list') DEFAULT 'paragraph',
  `content` text,
  `sort_order` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `descriptions_content`
--

INSERT INTO `descriptions_content` (`content_id`, `product_descriptions_id`, `content_type`, `content`, `sort_order`) VALUES
(1, 1, 'paragraph', 'Because of its more steep shape, the RADE/GARAGE Rally screen has improved wind buffering and protection in comparison with the KTM 990 Adventure OEM windscreen.', 1),
(2, 2, 'paragraph', 'The angle of our RADE/GARAGE Rally carbon windshield creates more space behind it, which allows you to better place and protect navigation equipment. You also get more flexibility for selecting the best viewpoint for GPS or road book.', 1),
(3, 3, 'paragraph', 'The road legal LED headlights (ECE certified) are assembled from high end components such as true Cree chip. With 70W output these LEDs are significantly stronger than the OEM headlights.', 1),
(4, 4, 'paragraph', 'The KTM 890 Adventure is a great bike out of the box. Long-travel suspension, ready to race engine, rider-friendly controls and so on. But it’s missing the design heritage from Dakar winning motorcycles.;To give the KTM 890 Adventure a more aggressive look, we designed our new R/G rally style fairing kit based on our experiences and work with the actual Dakar racing KTM EXC rally bike.;This fairing kit fits the following model years: KTM 890 Adventure (2023-24), KTM 890 Adventure R (2023-24).', 1),
(5, 5, 'paragraph', 'The core of the KTM 890 Adventure fairing kit is a carbon fiber tower. It consists of a combination of 3-9 layers of carbon and kevlar, providing the tower with high stiffness while reducing the weight of the kit. The carbon tower is only 430g! And in total, you save almost 1 kg compared with the OEM parts.;But it is not only about the weight. The kit was designed for practical daily use and to carry strong, EU road-legal LED headlights, a USB outlet, and a variety of navigation equipment.', 1),
(6, 6, 'paragraph', 'The KTM 890 Adventure fairing kit comes with a 12mm-diameter GPS bar mounted on silent blocks in order to reduce micro-vibrations and extend the life of your electronic devices.;There is also enough space to fit your smartphone, Garmin GPS, 8-inch tablet or a Roadbook. All devices are right in your optimal viewpoint, and for the first time, we added a smart rack for your first aid kit or any other equipment.', 1),
(7, 7, 'paragraph', 'The original cockpit attachments are a weak point of the KTM 890 Adventure. When the cockpit gets overloaded, it tends to crack in off-road use.;The R/G KTM 890 Adventure fairing kit includes reinforcements to avoid such situations. Our reinforcements not only eliminate the need to buy another aftermarket parts, but they are the only ones on the market that do not hide the VIN code. This makes crossing borders or road inspections easy as a breeze.', 1),
(8, 8, 'paragraph', 'Rally replica inspired fairing gives you:', 1),
(9, 8, 'list', 'Good wind protection.;Extra space for navigation gear such as GPS or Roadbook with tripmaster.; All that can be easily mounted on the supplied bar.;Road legal, super strong low and high beam LED lights with angel eyes to better enjoy your adventure rides or hobby rallies.', 2),
(10, 8, 'paragraph', 'The kit is fully bolted on and ready to plug and play. No drilling or permanent modifications. Whenever needed, you can simply reverse your bike back to the original setup.', 3),
(11, 9, 'paragraph', 'The R/G fairing match the size and design of the KTM 690 enduro & SMCR, to keep its narrow line and easy handling when riding off-road and also to give you good wind protection when riding on the highway.;The windshield is injected, with improved finishing, integrate the shader reducing glare and integrate round edges to increase your safety. The side panels from flexible polycarbonate and are ready to survive some of your crashes.', 1),
(12, 10, 'paragraph', 'The main evolution is full carbon tower. The main befit is improved handling of the bike because of significant weight reduction up in front. It is 800g lighter in comparison to the aluminium one.;The R/G carbon tower is made of variable carbon layers. E.g. the attaching area is from eight layers and holes are reinforced by stainless steel plates. We trust the technology and production process, that we give a lifetime guarantee on our carbon tower!', 1),
(13, 11, 'paragraph', 'We pay also attention to the space for your navigation. The GPS bar is now wider so you can mount two handset holders next to each other or you can fit tablet like Samsung galaxy tab. GPS bar is of 12mm diameter. The adapter to mount the Garmin cradle or any other holder is included in our kit. Moreover the GPS bar is mounted on silent blocks. It means the devices on the GPS bar are more protected against vibrations.;For KTM 690 model years 2019-24 our K5 fairing kit also includes the mount for the Scotts steering damper. So if you have any, you only bolt it on and you ride.;K5 kit it’s not compatible with (PHDS) Progressive handlebar damping system in combination with Scotts steering damper.', 1),
(14, 12, 'paragraph', 'The F5 kit includes strong LED headlights with double output against the OEM headlights. The road legal LED headlights (ECE certified) are assembled from high end components such as true Cree chip with 70W input so the difference is clearly remarkable when you ride at night.', 1),
(15, 13, 'paragraph', 'Rally replica inspired fairing gives you:', 1),
(16, 13, 'list', 'Good wind protection.;Extra space for navigation gear such as GPS or Roadbook with tripmaster. All that can be easily mounted on the supplied bar.;Road legal, super strong low and high beam LED lights with angel eyes to better enjoy your adventure rides or hobby rallies.', 2),
(17, 13, 'paragraph', 'The kit is fully bolt on and plug and play. No drilling or permanent modifications. Whenever needed, you can simply reverse your bike back to the original setup.', 3),
(18, 14, 'paragraph', 'The R/G fairing match the size and design of the Husqvarna 701, to keep its narrow line and easy handling when riding off-road and also to give you good wind protection when riding on the highway.;The windshield is injected, with improved finishing, integrate the shader reducing glare and integrate round edges to increase your safety. The side panels from flexible polycarbonate and are ready to survive some of your crashes.', 1),
(19, 15, 'paragraph', 'The main evolution is full carbon tower. The main benefit is improved handling of the bike because of significant weight reduction up in front. It is 800g lighter in comparison to the aluminium one.;The R/G carbon tower is made of variable carbon layers. E.g. the attaching area is from eight layers and holes are reinforced by stainless steel plates. We trust the technology and production process, that we give life time guarantee on our carbon tower!', 1),
(20, 16, 'paragraph', 'We pay also attention to the space for your navigation. The GPS bar is now wider so you can mount two handset holders next to each other or you can fit tablet like Samsung galaxy tab. The adapter to mount the Garmin cradle or any other holder is included in our kit. Moreover the GPS bar is mounted on silent blocks. It means the devices on the GPS bar are more protected against vibrations.;For 701 model years 2020-24 our F5 fairing kit also includes the mount for the Scotts steering damper. So if you have any, you only bolt it on and you ride.;F5 kit it’s not compatible with (PHDS) Progressive handlebar damping system in combination with Scotts steering damper.', 1),
(21, 17, 'paragraph', 'The F5 kit include strong LED headlights with double output against the OEM headlights. The road legal LED headlights (ECE certified) are assembled from high end components such as true Cree chip with 70W input so the difference is clearly remarkable when you ride at night.', 1),
(22, 18, 'paragraph', 'Rally replica inspired fairing gives you:', 1),
(23, 18, 'list', 'Good wind protection.;Extra space for navigation gear such as GPS or Roadbook with tripmaster. All that can be easily mounted on the supplied bar.;Road legal, super strong low and high beam LED lights with angel eyes to better enjoy your adventure rides or hobby rallies.', 2),
(24, 18, 'paragraph', 'The kit is fully bolt on and plug and play. No drilling or permanent modifications. Whenever needed, you can simply reverse your bike back to the original setup.', 3),
(25, 19, 'paragraph', '\r\nThe R/G fairing match the size and design of the GASGAS 700 enduro & supermotard, to keep its narrow line and easy handling when riding off-road and also to give you good wind protection when riding on the highway.;The windshield is injected, with improved finishing, integrate the shader reducing glare and integrate round edges to increase your safety. The side panels from flexible polycarbonate and are ready to survive some of your crashes.', 1),
(26, 20, 'paragraph', 'The main evolution is full carbon tower. The main befit is improved handling of the bike because of significant weight reduction up in front. It is 800g lighter in comparison to the aluminium one.;The R/G carbon tower is made of variable carbon layers. E.g. the attaching area is from eight layers and holes are reinforced by stainless steel plates. We trust the technology and production process, that we give a lifetime guarantee on our carbon tower!', 1),
(27, 21, 'paragraph', 'We pay also attention to the space for your navigation. The GPS bar is now wider so you can mount two handset holders next to each other or you can fit tablet like Samsung galaxy tab. The adapter to mount the Garmin cradle or any other holder is included in our kit. Moreover the GPS bar is mounted on silent blocks. It means the devices on the GPS bar are more protected against vibrations.;GASGAS 700 G5 fairing kit also includes the mount for the Scotts steering damper. So if you have any, you only bolt it on and you ride.;G5 kit it’s not compatible with (PHDS) Progressive handlebar damping system in combination with Scotts steering damper.', 1),
(28, 22, 'paragraph', 'The F5 kit include strong LED headlights with double output against the OEM headlights. The road legal LED headlights (ECE certified) are assembled from high end components such as true Cree chip with 70W input so the difference is clearly remarkable when you ride at night.', 1),
(29, 23, 'paragraph', 'The redesigned 3mm aluminum skidplate protects not only the front and bottom parts of the engine, but also the water pump and both the brake lever and shift lever! The perfect handcrafted welding adds very high stiffness to the KTM 690, GASGAS 700 and Husqvarna 701 skidplates. The new generation of the skidplate weighs only 2,6 kg. The updated version brings a waterproof feature and an easier opening system. Four split pins were substituted for two bolts, which can be easily opened by fingers.', 1),
(30, 24, 'paragraph', 'It is always a handful to have some available space for stuff that you do not need literally every day, like tools or spare parts, but to ride without them would be a risk. In the R/G skidplate toolbox, you can fit 3 sets of KTM OEM tool bags, so it is really spacious! It is wide enough to fit the tire levers or ratchets. The updated version of the skidplate brings enlarged volume from 2,7 to 4,6 liters.', 1),
(31, 25, 'paragraph', '\r\nTogether with the R/G skidplate you will also get a protection plate for the rear brake cylinder, which is an uncovered part that is unfortunately exposed from the factory. Our designs protect not only the engine but the brake cylinder as well. In the rear part of the skid plate, there are four pre-drilled holes, ready for your addition of any rubber or metallic protector of the rear shock absorber.', 1),
(32, 26, 'paragraph', 'The stand alone Auxiliary tank is an alternative for owners of the Storage Box Kit. For longer trips the storage box can be switched for the practical auxiliary tank.;It is compatible with: KTM 690 Storage Box Kit, GASGAS 700 Storage Box Kit & Husqvarna 701 Storage Box Kit', 1),
(33, 27, 'paragraph', 'You get an extra 5,5 litres of gas (1,5 gallons) for your adventure trips. It means great freedom with total fuel range over 330km (205+ miles)!', 1),
(34, 28, 'paragraph', 'Great benefit of our auxiliary tank solution is keeping the same dimensions and weight of your KTM 690 enduro. Simply the auxiliary tank is “hidden” in the bike and it does not add any extra dimensions to the bike so the handling of the bike is exactly the same as the factory 690.', 1),
(35, 29, 'paragraph', 'You get an extra 5,5 litres of gas (1,5 gallons) for your adventure trips. It means great freedom with total fuel range over 330km (205+ miles)!', 1),
(36, 30, 'paragraph', 'Great benefit of our auxiliary tank solution is keeping the same dimensions and weight of your KTM 690 enduro. Simply the auxiliary tank is “hidden” in the bike and it does not add any extra dimensions to the bike so the handling of the bike is exactly the same as the factory 690.', 1),
(37, 31, 'paragraph', 'The small airbox uses the OEM intake flange yet provides better air in-flow. In combination with the foam filter from MultiAir designed specifically for the RADE/GARAGE, it gives you extra power (about 3-5HP) and torque (about 5-8NM) in 3000-6500RPM. Moreover it is easily accessible so replacement takes only few minutes. The filters are pre-oiled, but when they get dirty they are fully washable and reusable, making them environmentally friendly. The GP dust cover is supplied with each kit.', 1),
(38, 32, 'paragraph', 'You get extra 5,9  liter of gas (1,5 gallons) for your adventures :-) what gives you almost 50% more fuel range while keeping easy handling of the bike. Great benefit of 701 tank is the filler in front of the seat what makes the refueling easy.', 1),
(39, 33, 'paragraph', '\r\nGreat benefit of our auxiliary tank solution is keeping the same dimensions and weight of your 701 enduro. Simply it is “hidden” in the tank and it does not add any extra dimensions to the bike so the handling of the bike keeps easy as original 701 enduro.', 1),
(40, 34, 'paragraph', 'New small airbox that use the OEM intake and flange, what ensure better fit to the engine. The foam filter from MultiAir designed specifically for our 701 auxiliary tank kit to improve the dust prevention. It is easily accessible so replacement takes only few minutes. The filters are pre-oiled and after they get dirty, they are fully washable and reusable. The GP dust cover by Twin Air is supplied with each kit.', 1),
(41, 35, 'paragraph', 'You get an extra 5,5 litres of gas (1,5 gallons) for your adventure trips :-) It means great freedom with total fuel range over 330km (205+ miles)!!!', 1),
(42, 36, 'paragraph', '\r\nGreat benefit of our auxiliary tank solution is keeping the same dimensions and weight of your GASGAS 700 enduro. Simply the auxiliary tank is “hidden” in the bike and it does not add any extra dimensions to the bike so the handling of the bike is exactly the same as the factory 700.', 1),
(43, 37, 'paragraph', 'The small airbox uses the OEM intake flange yet provides better air in-flow. In combination with the foam filter from MultiAir designed specifically for the RADE/GARAGE, it gives you extra power (about 3-5HP) and torque (about 5-8NM) in 3000-6500RPM. Moreover it is easily accessible so replacement takes only few minutes. The filters are pre-oiled, but when they get dirty they are fully washable and reusable, making them environmentally friendly. The GP dust cover is supplied with each kit.', 1),
(44, 38, 'paragraph', 'Based on our Auxiliary Tank Kit development, the storage kit is designed for riders that don’t need the extra fuel for extended range, but rather appreciate extra storage space. It consists of the storage box and airbox upgrade. The under the seat storage box has volume of 6 liters.', 1),
(45, 39, 'paragraph', 'Small airbox uses the OEM flange for air intake and provides great fit to the engine. The foam filter made by MultiAir was designed specifically for our kit to ensure amazing dust prevention. The filter is easily accessible so replacement takes only few minutes. Foam filters are reusable, making them environmentally friendly.  This solution also slightly improves the engine performance. The GP dust cover by Twin Air is supplied with each kit.', 1),
(46, 40, 'paragraph', 'Based on our Auxiliary Tank Kit development, the storage kit is designed for riders that don’t need the extra fuel for extended range, but rather appreciate extra storage space. It consists of the storage box and airbox upgrade. The under the seat storage box has volume of 6 liters.', 1),
(47, 41, 'paragraph', 'Small airbox uses the OEM flange for air intake and provides great fit to the engine. The foam filter made by MultiAir was designed specifically for our kit to ensure amazing dust prevention. The filter is easily accessible so replacement takes only few minutes. Foam filters are reusable, making them environmentally friendly.  This solution also slightly improves the engine performance. The GP dust cover by Twin air is supplied with each kit.', 1),
(48, 42, 'paragraph', '\r\nBased on our Auxiliary Tank Kit development, the storage kit is designed for riders that don’t need the extra fuel for extended range, but rather appreciate extra storage space. It consists of the storage box and airbox upgrade. The under the seat storage box has volume of 6 liters. Our storage kit fits also into 701 LR model.', 1),
(49, 43, 'paragraph', 'Small airbox uses the OEM flange for air intake and provides great fit to the engine. The foam filter made by MultiAir was designed specifically for our kit to ensure amazing dust prevention. The filter is easily accessible so replacement takes only few minutes. Foam filters are reusable, making them environmentally friendly.  This solution also slightly improves the engine performance. The GP dust cover by Twin air is supplied with each kit.', 1),
(50, 44, 'paragraph', 'The R/G pegs are positioned fifteen millimetre lower (15mm) than originals. It does not seem much, but it has significant impact on your comfort when riding long distances, because the knees are in more comfortable angle.;R/G footpegs are CNC milled from aluminum alloy 6082. This material provides durability, lightness, and flexibility.', 1),
(51, 45, 'paragraph', 'The R/G pegs are 105mm long and 57mm wide. It means 20% larger surface than original, helps handling the bike when riding in stand. And the pins hold your boots even in muddy terrain.', 1),
(52, 46, 'paragraph', 'Based on your feedback, that after installation of the Rade/Garage 701 or 690 fairing kit the front brake hose is not “tidy” and a kind in a way, we have developed the new hose guide.;\r\nThe guide is attached to the left fork with zip tie and holds the brake hose out of the way while still providing flexibility required for steering. It’s wide enough to accommodate also the wheel sensor cable in case you use ICO.', 1),
(53, 47, 'paragraph', 'It is our philosophy to always improve our products. We strive to make changes available as “an upgrade”, protecting your investments. This is one of those cases. Those that purchased the fairings in the past can order it on this page.  Going forward, the brake hose guide is now included in our KTM 690 & Husqvarna 701 fairing kits.', 1),
(54, 48, 'paragraph', 'Carpe Iter Android-powered navigation tablet excels in durability, housed within a heavy-duty aluminum case, ensuring resilience even in challenging conditions. Included is a robust aluminum mount featuring silent blocks to minimize vibrations. The reliable eight-pin screw-in power connector underscores its suitability for even the hardest off-road adventures. The seven-inch display, boasting 1000 NITS of brightness, guarantees excellent visibility even in direct sunlight. With an internal storage capacity of 128GB and a microSD card slot, this device provides ample space for your navigation needs.', 1),
(55, 49, 'paragraph', 'Thanks to the Android OS, you can download and use multiple map applications based on your journey. Google Maps and Waze provide real-time traffic updates and rich points of interest (POI). For off-road enthusiasts, topographic maps like Locus Maps, OsmAnd, and others offer excellent coverage of remote areas. Embrace the spirit of rally raid with roadbook navigation, channeling your inner Marc Coma. And when the day’s adventures conclude, share your experiences with friends through emails composed right from your tent.;For an enhanced user experience, we recommend complementing your Carpe Iter tablet with remote controllers to maximize the navigation’s potential.', 1),
(56, 50, 'paragraph', 'Introducing the DMD T865, a cutting-edge tablet navigation system running on the Android OS. Encased in a sleek duralumin housing, it underlines a modern aesthetic. The included holder may not be the optimal choice for frequent off-road riding. The convenience of charging via pogo pins makes it well-suited for road use. Sporting an eight-inch display with 1000+ NITS of brightness, the screen remains visible even under sunlight. With 256GB of internal storage and a microSD card slot, the DMD T865 has ample space for maps and data.', 1),
(57, 51, 'paragraph', 'The android OS allows for the download of multiple map applications tailored to your travel needs. Notably, the tablet comes with the DMD2 app (including a free premium license) and seamlessly integrating all essential features for motorcycle navigation. The integrated maps are designed for both road and off-road use. The user-friendly dashboard offers the ride information, and a customizable home page  provides personalized access to favorite applications. Composing evening emails from your tent to share experiences with friends is easy.', 1),
(58, 52, 'paragraph', 'Do you want to upgrade your adventures with the DMD T865 tablet to another level? Especially for you is here the DMD Remote controller. The body of the controller is made of durable aluminum. The controller itself is suitable for both Roadbook and Map/GPX use. It contains two buttons, one 4-way joystick and one 2-way switch and is compatible with most navigation apps like DMD2, OSMAnd, LOCUS, Google Maps, Waze, GURU Maps, GAIA, Kurviger etc. The controller can be connected to the tablet by Bluetooth or wires and is sold separately.', 1),
(59, 53, 'paragraph', 'The tablet navigation powered by the Android OS. Boasting an impressive eight-inch display with excellent visibility even in bright sunlight thanks to its 1000 NITS backlighting. The meticulously crafted, dust and water-resistant casing not only adds a touch of elegance but also secures seamlessly onto a robust magnetic mount which also facilitates charging on the go. With 64GB of internal storage and a microSD card slot, you’ll have ample space for maps and data. Additionally, the integrated satellite communicator, branded as InReach, keeps you connected and safe in remote locations.', 1),
(60, 54, 'paragraph', 'Garmin Tread offers maps with optimal contrast and legible font sizes, ensuring readability on the go. With customizable profiles ranging from road and adventure to off-road, complemented by the road planner feature, guaranteeing diverse and exciting rides. The flexibility extends further with the option to sideload Android apps (excluding Google services).;For an enhanced user experience, we recommend complementing your Garmin Tread with remote controllers to maximize the navigation’s potential.', 1),
(61, 55, 'paragraph', 'We have long and great experience with Czech manufacturer SHARON exhausts. They are well and fully handcrafted with care and attention to attractive design and long durability, thanks to stainless materials. These are some of the reasons we believe it is great value for money in a highly competitive but also overpriced exhaust aftermarket.', 1),
(62, 56, 'paragraph', 'Two practical benefits of SHARON exhaust:', 1),
(63, 56, 'list', 'It reduces the weight by 1 kg, far from the center of gravity.;It reduces significantly the heat, so you mitigate the risk of burning your roll bag or anything else you carry behind your seat', 2),
(64, 57, 'paragraph', 'Simple but sharp design to match the 701 style. Also, great diagonal placing on the bike underlines the 701 racing look and character.', 1),
(65, 58, 'paragraph', 'The DB killer is included so the “noise” is more acceptable than any other aftermarket exhausts, but it is not certified for road use in European Union.;It includes the spark arrestor so you can ride it in California, Australia where you pay high attention to the fire prevention.', 1),
(66, 59, 'paragraph', 'A CNC-milled brake pedal made of heavy-duty material is more durable than OEM one that is quite easy to be bent or broken. With our brake pedal, you limit such risk on your journeys.;We will also give you a free large tip for better control while standing!', 1),
(67, 60, 'paragraph', 'The milled pedal has the same holes and threads as the OEM one. The sealed bearings are pressed in place. So the replacement is easy. You can use the OEM tip or any aftermarket one for Husqvarna 701, GASGAS 700 and KTM 690.', 1),
(68, 61, 'paragraph', 'As always we have paid extra attention to looks, functionality and easy installation. You can see the aggressive design lines, combines with additional materials in critical places in order to avoid cracking or breaking. Ride with pride and safe with RADE/GARAGE accessories!', 1),
(69, 62, 'paragraph', 'We have long and great experience with Czech manufacturer SHARON exhausts. They are well and fully handcrafted with care and attention to attractive design and long durability, thanks to stainless materials. These are some of the reasons we believe that SHARON exhaust for KTM 690 Enduro and SMC is great value for money in a highly competitive but also overpriced exhaust aftermarket.', 1),
(70, 63, 'paragraph', 'Two practical benefits of SHARON exhaust:', 1),
(71, 63, 'list', 'It reduces the weight by 1 kg, far from the center of gravity.;It reduces significantly the heat, so you mitigate the risk of burning your roll bag or anything else you carry behind your seat', 2),
(72, 64, 'paragraph', 'Simple but sharp design to match the 690 style. Also, great diagonal placing on the bike underlines the 690 racing look and character.;Installation is simple. Remove the left rear side plastic cover. Remove the OEM exhaust and mount the SHARON exhaust. We recommend first to bolt on the pipe, than bolt on the big exhaust sleeve to the OEM holder on the tank. And as the last tight the sleeve on the exhaust.', 1),
(73, 65, 'paragraph', 'The DB killer is included so the “noise” is more acceptable than any other aftermarket exhausts, but it is not certified for road use in European Union.;It includes the spark arrestor so you can ride it in California, Australia where you pay high attention to the fire prevention.', 1),
(74, 66, 'paragraph', 'We did a replacement silencer for the KTM 790/890 Adventure. It is made of stainless steel. With SHARON standard exhaust, you save 1,4 kg of weight.;Fits KTM 790/890 Adventure MY 2019-24 and Husqvarna Norden 901.', 1),
(75, 67, 'paragraph', 'We have long and great experience with Czech-made SHARON exhausts. They are well and fully handcrafted with care and attention to attractive design and long durability, thanks to the use of stainless materials. These are some of the reasons we believe the SHARON exhaust for the KTM 790/890 Adventure is great value for your money in the highly competitive but sometimes also overpriced exhausts aftermarket space. Until now, they have only been provided to Czech racers. We are bringing them to the generally public.', 1),
(76, 68, 'paragraph', 'The DB killer is included, so the “noise” is more acceptable than any other aftermarket exhausts, but it is NOT CERTIFIED for road use in the European Union.;It includes the spark arrestor, so you can ride it in California, Australia, where they pay high attention to fire prevention.', 1),
(77, 69, 'paragraph', 'It is a compact, fully adjustable, hydraulic shock absorbing damper, that mounts to your steering head area right above your handlebar mount. It helps control the natural tendency of the “left to right” front end movements known as “head shake” on a motorcycle. It is very helpful especially when riding in sand, stones or mud.', 1),
(78, 70, 'paragraph', 'The pack includes 20+ pieces of the stainless steel M4x10 pins with the Allen head and two split pins for R/G footpegs. Don’t forget to use thread glue to secure the pins in your footpegs.', 1),
(79, 71, 'paragraph', 'The stand alone storage box is an alternative for owners of the tank kit. For shorter trips the tank can be switched for the practical storage space.;It is compatible with: KTM 690 tank, GASGAS 700 tank & Husqvarna 701 tank', 1),
(80, 72, 'paragraph', 'The bar adapter is a platform to directly mount your Garmin navigation or RAM mount, as the holes in the top plate are directly compatible. The dimensions of the holes are according to the AMPS Standard (30 x 38mm). You can choose from two positions. Horizontal one and vertical one to get your device in the best view point.;In the package is included a set of silent blocks, which can be used to reduce the vibrations going into your device.', 1),
(81, 73, 'paragraph', 'The top handlebar clamps are CNC billeted from high-end aluminum, as is the top plate. All components come in a black anodization finish.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price_each` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `product_id`, `quantity`, `price_each`) VALUES
(12, 1, 2, '539.00'),
(12, 4, 1, '1499.00'),
(13, 1, 1, '539.00'),
(13, 3, 1, '1499.00'),
(14, 1, 1, '539.00'),
(14, 3, 1, '1499.00'),
(15, 1, 3, '539.00'),
(15, 2, 2, '1479.00'),
(16, 1, 2, '539.00'),
(17, 1, 1, '539.00'),
(18, 2, 1, '1479.00'),
(18, 3, 1, '1499.00'),
(19, 1, 2, '539.20'),
(19, 6, 1, '269.00'),
(22, 1, 2, '539.20'),
(23, 5, 1, '1499.00'),
(24, 2, 1, '1479.00'),
(25, 6, 1, '269.00'),
(26, 9, 1, '439.00'),
(38, 1, 1, '539.20'),
(39, 1, 1, '539.20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_date` timestamp NULL DEFAULT NULL,
  `shipping_date` timestamp NULL DEFAULT NULL,
  `delivered_date` timestamp NULL DEFAULT NULL,
  `payment_reference` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `payment_date`, `shipping_date`, `delivered_date`, `payment_reference`) VALUES
(12, 1, '2024-10-15 14:46:26', NULL, NULL, NULL, '91560729130555'),
(13, 1, '2024-10-15 14:50:07', NULL, NULL, NULL, '63048333318125'),
(14, 1, '2024-10-15 14:50:21', NULL, NULL, NULL, '89214326472960'),
(15, 1, '2024-10-16 18:39:22', NULL, NULL, NULL, '48595432534216'),
(16, 1, '2024-10-17 12:36:29', NULL, NULL, NULL, '81711812326802'),
(17, 1, '2024-10-17 12:37:01', NULL, NULL, NULL, '35222008159130'),
(18, 1, '2024-10-25 23:11:21', '2024-10-28 17:15:23', NULL, NULL, '30380136020721'),
(19, 1, '2024-10-27 21:03:12', '2024-10-28 14:32:26', NULL, NULL, '36549009212887'),
(22, 1, '2024-10-28 01:06:36', '2024-10-28 14:30:54', NULL, NULL, '13735820455779'),
(23, 1, '2024-10-28 16:05:19', '2024-10-28 16:59:44', NULL, NULL, '81234295340838'),
(24, 1, '2024-10-28 16:08:18', '2024-10-28 16:59:43', '2024-10-28 17:15:29', NULL, '78480041175134'),
(25, 1, '2024-10-28 16:08:41', '2024-10-28 16:16:46', '2024-10-28 16:59:49', NULL, '45140752590887'),
(26, 1, '2024-10-28 16:10:54', '2024-10-28 16:16:45', '2024-10-28 16:59:38', '2024-10-28 17:15:35', '94214073632859'),
(38, 1, '2024-10-29 15:08:31', '2024-10-29 23:45:43', NULL, NULL, '57456954299223'),
(39, 1, '2024-10-29 15:09:13', '2024-10-29 23:29:40', NULL, NULL, '89974580769574');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` mediumint(4) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_slug`, `product_image`, `price`, `stock`, `is_featured`) VALUES
(1, 'KTM 990 RR LED Kit', 'ktm-990-rr-kit', 'rade-garage-ktm-990-fairing-kit1-300x220.jpg', '539.20', 20, 1),
(2, 'KTM 890 MY23+ Fairing Kit', 'ktm-890-fairing', 'rade-garage-790-890-my23-fairing1-300x220.jpg', '1479.00', 43, 1),
(3, 'KTM 690 K5 Fairing Kit', 'ktm-690-k5-fairing', 'rade-garage-ktm-690-2019-fairing-kit6-300x220 (1).jpg', '1499.00', 46, 0),
(4, 'Husqvarna 701 F5 Fairing Kit', 'husqvarna-701-fairing', 'rade-garage-husqvarna-701-fairing-kit6-300x220.jpg', '1499.00', 49, 1),
(5, 'GASGAS 700 G5 Fairing Kit', 'gg700-fairing', 'rade-garage-gasgas-fairing-kit6-300x220.jpg', '1499.00', 49, 0),
(6, 'Skidplate with Toolbox', 'skidplate-with-toolbox', 'rade-garage-skidplate4-300x220.jpg', '269.00', 47, 0),
(7, 'Auxiliary tank', 'auxiliary-tank', 'rade-garage-auxiliary-tank-300x220.jpg', '269.00', 50, 0),
(8, 'KTM 690 Auxiliary Tank Kit', 'ktm-690-tank', 'rade-garage-ktm-690-2019-auxiliary-tank3-300x220.jpg', '439.00', 50, 0),
(9, 'Husqvarna 701 Auxiliary Tank Kit', 'husqvarna-701-tank', 'rade-garage-husqvarna-701-auxiliary-tank3-300x220.jpg', '439.00', 49, 0),
(10, 'GASGAS 700 Auxiliary Tank Kit', 'gg700-tank', 'rade-garage-gasgas-auxiliary-tank3-300x220.jpg', '439.00', 50, 1),
(11, 'KTM 690 Storage Kit', 'ktm-690-storage-kit', 'rade-garage-ktm-690-2019-storage-kit2-300x220.jpg', '229.00', 50, 0),
(12, 'GASGAS 700 Storage Kit', 'gasgas-700-storage-kit', 'rade-garage-gasgas-storage-kit2-300x220.jpg', '229.00', 50, 0),
(13, 'Husqvarna 701 Storage Kit', 'husqvarna-701-storage-kit', 'rade-garage-husqvarna-701-storage-kit2-300x220.jpg', '229.00', 50, 0),
(14, 'Larger & Lower Footpegs', 'larger-lower-footpegs', 'rade-garage-footpegs2-300x220.jpg', '136.00', 50, 0),
(15, '3D Printed Brake Hose Guide', '3d-brake-hose-guide', 'rade-garage-3d-printed-guide4-300x220.jpg', '18.00', 46, 0),
(16, 'Carpe Iter Tablet', 'carpe-iter-tablet', 'carpe-iter-tablet-navigation1-300x220 (1).jpg', '779.00', 52, 0),
(17, 'DMD-T865 Tablet', 'dmd-tablet', 'dmd-tablet-navigation1-300x220.jpg', '768.00', 49, 0),
(18, 'Garmin Tread Overland', 'garmin-tread', 'garmin-tablet1-300x220.jpg', '1299.00', 48, 0),
(19, 'Husqvarna 701 SHARON Exhaust', 'husqvarna-701-sharon-exhaust', 'rade-garage-husqvarna-701-sharon-exhaust1-300x220.jpg', '339.00', 50, 0),
(20, 'Heavy-duty Brake pedal', 'heavy-duty-brake-pedal', 'rade-garage-brake-pedal-ktm4-300x220.jpg', '139.00', 49, 0),
(21, 'KTM 690 SHARON Exhaust', 'ktm-690-sharon-exhaust', 'rade-garage-ktm-690-sharon-exhaust1-300x220.jpg', '339.00', 50, 0),
(22, 'KTM 890 SHARON Exhaust', 'ktm-890-sharon-exhaust', 'rade-garage-790-890-sharon-standard1-300x220.jpg', '339.00', 50, 0),
(23, 'Scotts Steering Damper', 'scotts', 'rade-garage-scotts-steering-damper1-300x220.jpg', '589.00', 50, 0),
(24, 'Spare Footpeg Pins', 'spare-pins', 'rade-garage-spare-footpeg-pins2-300x220.jpg', '2.00', 50, 0),
(25, 'Storage Box', 'storage-box', 'rade-garage-storage-only1-300x220.jpg', '74.00', 50, 0),
(26, 'Bar Mount Adapter', 'bar-adapter', 'rade-garage-bar-mount1-300x220.jpg', '99.00', 49, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_hero`
--

CREATE TABLE `products_hero` (
  `product_hero_id` int(11) NOT NULL,
  `hero_image_url` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products_hero`
--

INSERT INTO `products_hero` (`product_hero_id`, `hero_image_url`, `product_id`) VALUES
(1, 'rade-garage-ktm-990-fairing-kit-banner-2000x600.jpg', 1),
(2, 'rade-garage-790-890-my23-fairing-banner.jpg', 2),
(3, 'rade-garage-ktm-690-2019-fairing-kit-banner.jpg', 3),
(4, 'rade-garage-husqvarna-701-fairing-kit-banner.jpg', 4),
(5, 'rade-garage-gasgas-fairing-kit-banner.jpg', 5),
(6, 'rade-garage-skidplate-banner-2000x600.jpg', 6),
(7, 'rade-garage-auxiliary-tank-banner.jpg', 7),
(8, 'rade-garage-ktm-690-2019-auxiliary-tank-banner.jpg', 8),
(9, 'rade-garage-husqvarna-701-auxiliary-tank-banner.jpg', 9),
(10, 'rade-garage-gasgas-auxiliary-tank-banner.jpg', 10),
(11, 'rade-garage-ktm-690-2019-storage-kit-banner.jpg', 11),
(12, 'rade-garage-gasgas-storage-kit-banner.jpg', 12),
(13, 'rade-garage-husqvarna-701-storage-kit-banner.jpg', 13),
(14, 'rade-garage-footpegs-banner.jpg', 14),
(15, 'rade-garage-3d-printed-guide-banner.jpg', 15),
(16, 'carpe-iter-banner.jpg', 16),
(17, 'dmd-tablet-banner-1.jpg', 17),
(18, 'garmin-tablet-banner.jpg', 18),
(19, 'rade-garage-husqvarna-701-sharon-exhaust-banner.jpg', 19),
(20, 'rade-garage-lc4-brake-pedal-banner.jpg', 20),
(21, 'rade-garage-ktm-690-sharon-exhaust-banner.jpg', 21),
(22, 'rade-garage-790-890-sharon-standard-banner.jpg', 22),
(23, 'rade-garage-scotts-steering-damper-banner-2000x600.jpg', 23),
(24, 'rade-garage-spare-footpeg-pins-banner.jpg', 24),
(25, 'rade-garage-storage-only-banner.jpg', 25),
(27, 'rade-garage-bar-mount-banner.jpg', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(4, 2, 5),
(5, 2, 6),
(8, 3, 4),
(9, 3, 6),
(11, 4, 2),
(12, 4, 6),
(14, 5, 3),
(15, 5, 6),
(17, 6, 2),
(18, 6, 3),
(19, 6, 4),
(20, 6, 6),
(24, 7, 2),
(25, 7, 3),
(26, 7, 4),
(27, 7, 6),
(31, 8, 4),
(32, 8, 6),
(34, 9, 2),
(35, 9, 6),
(37, 10, 3),
(38, 10, 6),
(40, 11, 4),
(41, 11, 6),
(43, 13, 2),
(44, 13, 6),
(46, 14, 1),
(47, 14, 2),
(48, 14, 3),
(49, 14, 4),
(50, 14, 5),
(51, 14, 6),
(53, 15, 1),
(54, 15, 2),
(55, 15, 3),
(56, 15, 4),
(57, 15, 5),
(58, 15, 6),
(60, 16, 1),
(61, 16, 2),
(62, 16, 3),
(63, 16, 4),
(64, 16, 5),
(65, 16, 6),
(67, 17, 1),
(68, 17, 2),
(69, 17, 3),
(70, 17, 4),
(71, 17, 5),
(72, 17, 6),
(74, 18, 1),
(75, 18, 2),
(76, 18, 3),
(77, 18, 4),
(78, 18, 5),
(79, 18, 6),
(81, 19, 2),
(82, 19, 6),
(84, 20, 1),
(85, 20, 2),
(86, 20, 3),
(87, 20, 4),
(88, 20, 5),
(89, 20, 6),
(91, 21, 4),
(92, 21, 6),
(94, 22, 5),
(95, 22, 6),
(97, 23, 1),
(98, 23, 2),
(99, 23, 3),
(100, 23, 4),
(101, 23, 5),
(102, 23, 6),
(104, 24, 1),
(105, 24, 2),
(106, 24, 3),
(107, 24, 4),
(108, 24, 5),
(109, 24, 6),
(111, 25, 2),
(112, 25, 3),
(113, 25, 4),
(114, 25, 6),
(118, 26, 1),
(119, 26, 2),
(120, 26, 3),
(121, 26, 4),
(122, 26, 5),
(123, 26, 6),
(125, 12, 3),
(126, 12, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `product_descriptions_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `sort_order` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_descriptions`
--

INSERT INTO `product_descriptions` (`product_descriptions_id`, `product_id`, `title`, `image_url`, `image_alt`, `sort_order`) VALUES
(1, 1, 'Better wind protection', 'rade-garage-ktm-990-fairing-kit1.jpg', 'fairing kit 1', 1),
(2, 1, 'More space for navigation', 'rade-garage-ktm-990-fairing-kit2.jpg', 'fairing kit 2', 2),
(3, 1, 'Road legal LED headlight with angel eyes', 'rade-garage-ktm-990-fairing-kit3.jpg', 'fairing kit 3', 3),
(4, 2, 'Rally style designed fairing', 'rade-garage-790-890-my23-fairing1.jpg', 'fairing kit 1', 1),
(5, 2, 'Full carbon tower reducing the weight', 'rade-garage-790-890-my23-fairing2.jpg', 'fairing kit 2', 2),
(6, 2, 'Space for navigation', 'rade-garage-790-890-my23-fairing3.jpg', 'fairing kit 3', 3),
(7, 2, 'Reinforcement included', 'rade-garage-790-890-my23-fairing4.jpg', 'fairing kit 4', 4),
(8, 3, 'The conversion for adventure riding', 'rade-garage-ktm-690-2019-fairing-kit1.jpg', 'fairing kit 1', 1),
(9, 3, 'Evolution of the fairing designed for KTM 690', 'rade-garage-ktm-690-2019-fairing-kit2.jpg', 'fairing kit 2', 2),
(10, 3, 'Carbon tower with life-time warranty!', 'rade-garage-ktm-690-2019-fairing-kit3.jpg', 'fairing kit 3', 3),
(11, 3, 'Space for navigation & Scotts', 'rade-garage-ktm-690-2019-fairing-kit4.jpg', 'fairing kit 4', 4),
(12, 3, 'Strong & road legal LED headlights', 'rade-garage-ktm-690-2019-fairing-kit5.jpg', 'fairing kit 5', 5),
(13, 4, 'The conversion for adventure riding', 'rade-garage-husqvarna-701-fairing-kit1.jpg', 'fairing kit 1', 1),
(14, 4, 'Evolution of the fairing designed for Husqvarna 701', 'rade-garage-husqvarna-701-fairing-kit2.jpg', 'fairing kit 2', 2),
(15, 4, 'Carbon tower with life-time guarantee!', 'rade-garage-husqvarna-701-fairing-kit3.jpg', 'fairing kit 3', 3),
(16, 4, 'Space for navigation & Scotts', 'rade-garage-husqvarna-701-fairing-kit4.jpg', 'fairing kit 4', 4),
(17, 4, 'Strong & road legal LED headlights', 'rade-garage-husqvarna-701-fairing-kit5.jpg', 'fairing kit 5', 5),
(18, 5, 'The conversion for adventure riding', 'rade-garage-gasgas-fairing-kit1.jpg', 'fairing kit 1', 1),
(19, 5, 'Evolution of the fairing designed for GASGAS 700', 'rade-garage-gasgas-fairing-kit2.jpg', 'fairing kit 2', 2),
(20, 5, 'Carbon tower with life-time warranty!', 'rade-garage-gasgas-fairing-kit3.jpg', 'fairing kit 3', 3),
(21, 5, 'Space for navigation & Scotts', 'rade-garage-gasgas-fairing-kit4.jpg', 'fairing kit 4', 4),
(22, 5, 'Strong & road legal LED headlights', 'rade-garage-gasgas-fairing-kit5.jpg', 'fairing kit 5', 5),
(23, 6, 'Engine and pedals protection', 'rade-garage-skidplate1.jpg', 'skidplate 1', 1),
(24, 6, 'Spacious tool box', 'rade-garage-skidplate2.jpg', 'skidplate 2', 2),
(25, 6, 'Brake cylinder protection included', 'rade-garage-skidplate3.jpg', 'skidplate 3', 3),
(26, 7, 'An alternative for the Storage Kit owners', 'rade-garage-auxiliary-tank1.jpg', 'auxiliary tank 1', 1),
(27, 7, 'Extra 100 km/60 miles fuel range', 'rade-garage-auxiliary-tank2.jpg', 'auxiliary tank 2', 2),
(28, 7, 'Keeps original handling', 'rade-garage-auxiliary-tank3.jpg', 'auxiliary tank 3', 3),
(29, 8, 'Extra 100 km/60 miles fuel range', 'rade-garage-ktm-690-2019-auxiliary-tank1.jpg', 'auxiliary tank kit 1', 1),
(30, 8, 'Keeps original handling', 'rade-garage-ktm-690-2019-auxiliary-tank2.jpg', 'auxiliary tank kit 2', 2),
(31, 8, 'Improved MultiAir filters', 'rade-garage-ktm-690-2019-auxiliary-tank3.jpg', 'auxiliary tank kit 3', 3),
(32, 9, '100km extra fuel range', 'rade-garage-husq701-auxiliary-tank1.jpg', 'auxiliary tank kit 1', 1),
(33, 9, 'Keeps original handling', 'rade-garage-husq701-auxiliary-tank2.jpg', 'auxiliary tank kit 2', 2),
(34, 9, 'Improved MultiAir foam filter', 'rade-garage-husq701-auxiliary-tank3.jpg', 'auxiliary tank kit 3', 3),
(35, 10, 'Extra 100 km/60 miles fuel range', 'rade-garage-gasgas-auxiliary-tank1.jpg', 'auxiliary tank kit 1', 1),
(36, 10, 'Keeps original handling', 'rade-garage-gasgas-auxiliary-tank2.jpg', 'auxiliary tank kit 2', 2),
(37, 10, 'Improved Air filters', 'rade-garage-gasgas-auxiliary-tank3.jpg', 'auxiliary tank kit 3', 3),
(38, 11, 'Convenient storage space', 'rade-garage-ktm-690-2019-storage-kit1.jpg', 'storage kit', 1),
(39, 11, 'Small airbox with foam filter', 'rade-garage-ktm-690-2019-storage-kit2.jpg', 'storage kit 2', 2),
(40, 12, 'Convenient storage space', 'rade-garage-gasgas-storage-kit1.jpg', 'storage kit 1', 1),
(41, 12, 'Small airbox with foam filter', 'rade-garage-gasgas-storage-kit2.jpg', 'storage kit 2', 2),
(42, 13, 'Convenient storage space', 'rade-garage-husqvarna-701-storage-kit1.jpg', 'storage kit 1', 1),
(43, 13, 'Small airbox with foam filter', 'rade-garage-husqvarna-701-storage-kit2.jpg', 'storage kit 2', 2),
(44, 14, 'Lower than originals', 'rade-garage-footpegs1.jpg', 'footpegs 1', 1),
(45, 14, 'Larger surface', 'rade-garage-footpegs2.jpg', 'footpegs 2', 2),
(46, 15, 'Brake hose guide', 'rade-garage-3d-printed-guide1.jpg', 'hose guide 1', 1),
(47, 15, 'Now included in the K5 690, G5 700 and F5 701 fairing kits', 'rade-garage-3d-printed-guide2.jpg', 'hose guide 2', 2),
(48, 16, 'No. 1 choice for off-road riding', 'carpe-iter-tablet-navigation1.jpg', 'carpe iter tablet 1', 1),
(49, 16, 'Almost endless maps choices', 'carpe-iter-tablet-navigation2.jpg', 'carpe iter tablet 2', 2),
(50, 17, 'Big screen and modern aesthetic', 'dmd-tablet-navigation1.jpg', 'dmd tablet 1', 1),
(51, 17, 'DMD2 app with premium license included', 'dmd-tablet-navigation2.jpg', 'dmd tablet 2', 2),
(52, 17, 'DMD Remote Controller', 'dmd-tablet-navigation3.jpg', 'dmd tablet 3', 3),
(53, 18, 'Latest innovation from Garmin', 'garmin-tablet-gallery1.jpg', 'garmin tablet 1', 1),
(54, 18, 'No. 1 choice for scenery & adventure riding', 'garmin-tablet-gallery2.jpg', 'garmin tablet 2', 2),
(55, 19, 'Value for money racing exhaust', 'rade-garage-husqvarna-701-sharon-exhaust1.jpg', 'sharon exhaust 1', 1),
(56, 19, 'Weight and heat reduction', 'rade-garage-husqvarna-701-sharon-exhaust2.jpg', 'sharon exhaust 2', 2),
(57, 19, 'Racing design and nice sound', 'rade-garage-husqvarna-701-sharon-exhaust3.jpg', 'sharon exhaust 3', 3),
(58, 19, 'DB killer included but NOT certified', 'rade-garage-husqvarna-701-sharon-exhaust4.jpg', 'sharon exhaust 4', 4),
(59, 20, 'Heavy-duty Brake pedal', 'rade-garage-brake-pedal1.jpg', 'brake pedal 1', 1),
(60, 20, 'Precision made and simple fit', 'rade-garage-brake-pedal2.jpg', 'brake pedal 2', 2),
(61, 20, 'Best look with durability', 'rade-garage-brake-pedal3.jpg', 'brake pedal 3', 3),
(62, 21, 'Value for money racing exhaust', 'rade-garage-ktm-690-sharon-exhaust1.jpg', 'sharon exhaust 1', 1),
(63, 21, 'Weight and heat reduction', 'rade-garage-ktm-690-sharon-exhaust2.jpg', 'sharon exhaust 2', 2),
(64, 21, 'Racing design and nice sound', 'rade-garage-ktm-690-sharon-exhaust3.jpg', 'sharon exhaust 3', 3),
(65, 21, 'DB killer included but NOT certified', 'rade-garage-ktm-690-sharon-exhaust4.jpg', 'sharon exhaust 4', 4),
(66, 22, 'Standard design with a strong and nice sound', 'rade-garage-790-890-sharon-standard1.jpg', 'sharon exhaust 1', 1),
(67, 22, 'Value for money racing exhaust', 'rade-garage-790-890-sharon-standard2.jpg', 'sharon exhaust 2', 2),
(68, 22, 'DB killer included but not certified', 'rade-garage-790-890-sharon-standard3.jpg', 'sharon exhaust 3', 3),
(69, 23, 'Easier ride in demanding terrain', 'rade-garage-scotts-steering-damper1.jpg', 'scotts steering damper', 1),
(70, 24, 'Spare pins', 'rade-garage-spare-footpeg-pins1.jpg', 'spare pins', 1),
(71, 25, 'An alternative for the tank kit owners', 'rade-garage-storage-only1.jpg', 'storage box 1', 1),
(72, 26, 'Mount your devices easily', 'rade-garage-bar-mount1.jpg', 'bar mount adapter 1', 1),
(73, 26, 'Precise CNC finishing', 'rade-garage-bar-mount2.jpg', 'bar mount adapter 2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `street_address` varchar(120) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `street_address`, `city`, `postal_code`, `country`, `phone`) VALUES
(1, 'user', 'user@user.com', '$2y$10$wKTgAUXDcGjaaQ/yNsAeA.l4Gp2FPwNI5YyMVIIhnz0SZg.yxV7U6', 'rua do user', 'cidade do user', '1685-447', 'PT', '912 345 678'),
(3, 'Hoyt Hays', 'user2@user.com', '$2y$10$At15nssOTr97jf/aqg5V8uFRkRWtbFsem3ocnlyGUdUGS9ucjiIIi', 'Illum aspernatur voluptas eligendi nisi non quaerat consequatur Magna', 'Deleniti a officia dolorem et voluptatum est ad e', 'Non dolore fugiat q', 'PT', '+1 (459) 451-8748'),
(7, 'Brendan Drake', 'user10@user.com', '$2y$10$J5MS1TTIAzb0I2jX1j2MY.fFEhTcvXAUPcUzwHjBQN6KaqCG7MryK', 'Magni dignissimos est reiciendis vel veniam accusamus et ipsum et impedit magna nobis debitis culpa quasi id ipsa', 'Quibusdam doloribus cupiditate dolore elit in et', 'Qui aliquip dolores', 'FR', '+1 (792) 777-8056'),
(8, 'Heather Henderson', 'zukuqyqej@mailinator.com', '$2y$10$sm1Lv7HrvzJPt/Uridgw1OjQurxHPHr8cjSK9gdB9t1ihVcKoHqZe', 'Sint et eveniet velit sit voluptatem dolor doloremque enim Nam', 'Iusto ipsum veniam exercitationem aute quis perf', 'Sit provident odio', 'FR', '+1 (314) 609-4529'),
(9, 'Catherine Gutierrez', 'cydovajez@mailinator.com', '$2y$10$a50CivlExYpo845th241HO6cEz8eny63.ddxGGAslDadwgKQ77Rv.', 'Vel dolore reiciendis voluptatum et illo dolores voluptas recusandae Laboris ab non ipsum voluptatem similique aliquid', 'Libero numquam pariatur Pariatur Velit totam ips', 'Autem ut ut suscipit', 'IT', '+1 (448) 907-1572');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unique_email_employee_number` (`email`,`employee_number`);

--
-- Índices para tabela `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Índices para tabela `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`code`);

--
-- Índices para tabela `descriptions_content`
--
ALTER TABLE `descriptions_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `descriptions_content_ibfk_1` (`product_descriptions_id`);

--
-- Índices para tabela `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD UNIQUE KEY `order_id_2` (`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Índices para tabela `products_hero`
--
ALTER TABLE `products_hero`
  ADD PRIMARY KEY (`product_hero_id`),
  ADD KEY `foreign key` (`product_id`);

--
-- Índices para tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices para tabela `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD PRIMARY KEY (`product_descriptions_id`),
  ADD KEY `product_descriptions_ibfk_1` (`product_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `descriptions_content`
--
ALTER TABLE `descriptions_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `products_hero`
--
ALTER TABLE `products_hero`
  MODIFY `product_hero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT de tabela `product_descriptions`
--
ALTER TABLE `product_descriptions`
  MODIFY `product_descriptions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `descriptions_content`
--
ALTER TABLE `descriptions_content`
  ADD CONSTRAINT `descriptions_content_ibfk_1` FOREIGN KEY (`product_descriptions_id`) REFERENCES `product_descriptions` (`product_descriptions_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `products_hero`
--
ALTER TABLE `products_hero`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD CONSTRAINT `product_descriptions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

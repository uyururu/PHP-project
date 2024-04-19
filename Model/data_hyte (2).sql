-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2024 at 10:24 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_hyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `IdHoaDon` int NOT NULL,
  `IdSanPham` int NOT NULL,
  `So_Luong` int NOT NULL,
  `Thanh_Tien` float NOT NULL,
  `Mau_sac` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tinh_trang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`IdHoaDon`, `IdSanPham`, `So_Luong`, `Thanh_Tien`, `Mau_sac`, `tinh_trang`) VALUES
(28, 1, 1, 359.99, 'Trắng Tuyết', 0),
(28, 4, 1, 299.99, 'No Color', 0),
(29, 1, 1, 359.99, 'Trắng Tuyết', 0),
(29, 4, 1, 299.99, 'No Color', 0),
(30, 1, 1, 359.99, 'Trắng Tuyết', 0),
(30, 4, 1, 299.99, 'No Color', 0),
(31, 1, 1, 359.99, 'Trắng Tuyết', 0),
(31, 4, 1, 299.99, 'No Color', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `IdSanPham` int NOT NULL,
  `IdMau` int NOT NULL,
  `Gia` float NOT NULL,
  `Giam_gia` float NOT NULL,
  `So_Luong` int NOT NULL,
  `Chi_tiet` varchar(10000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Hinh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`IdSanPham`, `IdMau`, `Gia`, `Giam_gia`, `So_Luong`, `Chi_tiet`, `Hinh`) VALUES
(1, 1, 359.99, 0, 10, 'Enhanced In Every Dimension\r\n\r\nY70 Touch enables meaningful digital interaction with an integrated 4K 10-point multi-touch capacitive LCD panel, delivers next-generation gaming experiences with massive 4-slot vertical graphics, and unlocks maximum performance with ginormous cooling capacity. All while celebrating your favorite hardware by showing off your PC the way it was meant to be seen.', '23.webp'),
(1, 2, 359.99, 0, 10, 'Enhanced In Every Dimension\r\n\r\nY70 Touch enables meaningful digital interaction with an integrated 4K 10-point multi-touch capacitive LCD panel, delivers next-generation gaming experiences with massive 4-slot vertical graphics, and unlocks maximum performance with ginormous cooling capacity. All while celebrating your favorite hardware by showing off your PC the way it was meant to be seen.', '24.webp'),
(1, 3, 359.99, 0, 10, 'Enhanced In Every Dimension\r\n\r\nY70 Touch enables meaningful digital interaction with an integrated 4K 10-point multi-touch capacitive LCD panel, delivers next-generation gaming experiences with massive 4-slot vertical graphics, and unlocks maximum performance with ginormous cooling capacity. All while celebrating your favorite hardware by showing off your PC the way it was meant to be seen.', '25.webp'),
(1, 4, 359.99, 0, 10, 'Enhanced In Every Dimension\r\n\r\nY70 Touch enables meaningful digital interaction with an integrated 4K 10-point multi-touch capacitive LCD panel, delivers next-generation gaming experiences with massive 4-slot vertical graphics, and unlocks maximum performance with ginormous cooling capacity. All while celebrating your favorite hardware by showing off your PC the way it was meant to be seen.', '1.webp'),
(2, 1, 199.99, 179.99, 10, 'Why We Made This\r\n\r\n+ A new build should feel new\r\n+ 3-Piece panoramic glass with 3-times more satisfying plastic wrap removal.\r\n+ We know how much you just spent on that GPU, so we threw in the riser cable.\r\n+ Cold floor cooling keeps thermals lower than a partly cloudy day with a light breeze and you without your jacket.\r\n+ Check out this crown molding right there.', '2.webp'),
(2, 2, 199.99, 179.99, 10, 'Why We Made This\r\n\r\n+ A new build should feel new\r\n+ 3-Piece panoramic glass with 3-times more satisfying plastic wrap removal.\r\n+ We know how much you just spent on that GPU, so we threw in the riser cable.\r\n+ Cold floor cooling keeps thermals lower than a partly cloudy day with a light breeze and you without your jacket.\r\n+ Check out this crown molding right there.', '2.webp'),
(2, 4, 199.99, 179.99, 10, 'Why We Made This\r\n\r\n+ A new build should feel new\r\n+ 3-Piece panoramic glass with 3-times more satisfying plastic wrap removal.\r\n+ We know how much you just spent on that GPU, so we threw in the riser cable.\r\n+ Cold floor cooling keeps thermals lower than a partly cloudy day with a light breeze and you without your jacket.\r\n+ Check out this crown molding right there.', '2.webp'),
(3, 1, 149.99, 0, 10, 'Designed From Every Dimension\r\n\r\nThe all-new Y40 is designed to wow and priced to thrill while defining new industry standards for ATX cases everywhere. Elevate your expectations of multi-dimensional case design, next-gen GPU compatibility, and overall system harmony today.', '3.webp'),
(3, 2, 149.99, 0, 10, 'Designed From Every Dimension\r\n\r\nThe all-new Y40 is designed to wow and priced to thrill while defining new industry standards for ATX cases everywhere. Elevate your expectations of multi-dimensional case design, next-gen GPU compatibility, and overall system harmony today.', '3.webp'),
(3, 4, 149.99, 0, 10, 'Designed From Every Dimension\r\n\r\nThe all-new Y40 is designed to wow and priced to thrill while defining new industry standards for ATX cases everywhere. Elevate your expectations of multi-dimensional case design, next-gen GPU compatibility, and overall system harmony today.', '3.webp'),
(4, 0, 299.99, 0, 10, 'Join the S.E.E.S. and prepare for the Dark Hour that approaches by upgrading your setup with a visually stunning HYTE Y60 in a limited edition design featuring your favorite heroes from Persona 3 Reload.\r\n\r\nEvery Persona 3 Reload Y60 comes with a collectible, limited-edition metal Fool Arcana card and carrying tin.', '4.webp'),
(5, 1, 129.99, 97.99, 10, 'We designed the REVOLT 3 to be the ITX case you\'ll take anywhere, and upgrade for years. With an integrated handle and tool-free side panels, you\'ll love how easy it is to build in, modify, and travel with.', '5.webp'),
(5, 3, 129.99, 97.99, 10, 'We designed the REVOLT 3 to be the ITX case you\'ll take anywhere, and upgrade for years. With an integrated handle and tool-free side panels, you\'ll love how easy it is to build in, modify, and travel with.', '5.webp'),
(6, 1, 149.99, 129.99, 10, 'Each refurbished product undergoes rigorous factory testing and quality inspections to ensure optimal functionality. While some cases may exhibit signs of prior use, the exterior is typically in excellent condition, and it\'s worth noting that not all units will have minor blemishes. Rest assured, every item comes with the standard HYTE warranty.', '6.webp'),
(6, 2, 149.99, 129.99, 10, 'Each refurbished product undergoes rigorous factory testing and quality inspections to ensure optimal functionality. While some cases may exhibit signs of prior use, the exterior is typically in excellent condition, and it\'s worth noting that not all units will have minor blemishes. Rest assured, every item comes with the standard HYTE warranty.', '6.webp'),
(6, 4, 149.99, 129.99, 10, 'Each refurbished product undergoes rigorous factory testing and quality inspections to ensure optimal functionality. While some cases may exhibit signs of prior use, the exterior is typically in excellent condition, and it\'s worth noting that not all units will have minor blemishes. Rest assured, every item comes with the standard HYTE warranty.', '6.webp'),
(7, 0, 99, 59.99, 10, '+ Finally a headset with a sleek, new, half-moon earcup design in matte Lunar Grey\r\n+ All performance, competition-grade gaming headset - no \'extra\' frills to pay for\r\n30-hr estimated battery life with extended 2.4ghz transmission\r\n+ Enough wireless range to grab something from the garage\r\n+ Plush vegan leather lining and foam headband\r\nPlay and charge capability that never misses a beat', '7.webp'),
(8, 0, 19.99, 14.99, 10, '+ Hydrate or die-drate! Stay refreshed through even the longest of gaming sessions.\r\n+ Vacuum insulated to keep your drinks cold for up to 24 hours and hot up to 8 hours\r\n+ Durable 18/8 Premium-Grade Stainless Steel\r\n+ BPA-Free and Phthalate-Free\r\n+ Dishwasher Safe', '8.webp'),
(9, 0, 74.99, 0, 10, 'The Dark Hour is upon us. Venture through the floors of Tartarus and prepare to slay your opponents in style with a themed keycap set featuring an immersive design by HYTE brought to life by the folks over at Infinikey.', '9.webp'),
(10, 0, 29.99, 22.99, 10, 'The DP900 is HYTE\'s very first deskpad made from our signature colors: midnight blue and sweet, honey yellow. We carefully sourced the most luxurious fabric for a deep, rich color and silky smooth glide. With 28 SPI (Stitch Per Inch), we can confidently say you\'ll love this on your desk.', '10.webp'),
(11, 0, 29.99, 22.99, 10, 'iBUYPOWER and HYTE team up to support and spotlight emerging artists from around the world in an exclusive Anime Expo 2022 limited-run desk pad series. Give your desktop peripherals a proper anime-inspired landing spot with your choice of six different anime art themes to choose from—all inked on the silky smooth HYTE DP900 performance desk pad. Shop now and get your Season One CNVS Analog desk pad before it’s too late!\r\n\r\nThe size of the desk pad is 900 x 400 mm and the 28 SPI (Stitches Per Square Inch) creates a silky smooth surface for your mouse to glide like a world-class ice skater.', '11.webp'),
(12, 0, 29.99, 0, 10, 'Connect with the Persona 3 Reload universe through this desk pad, designed to evoke the heroic spirit of the Protagonist’s adventures in the game.\r\n\r\nThe size of the desk pad is 900 x 400 mm and the 28 SPI (Stitches Per Square Inch) creates a silky smooth surface for your mouse to glide like a world-class ice skater.\r\nThe size of the desk pad is 900 x 400 mm and the 28 SPI (Stitches Per Square Inch) creates a silky smooth surface for your mouse to glide like a world-class ice skater.', '12.webp'),
(13, 1, 69.99, 55.99, 10, '+ \"Experience Play\" in the most comfortable way possible\r\n+ Special blend of cotton (79%), polyester (14%), Spandex (7%) for that ultimate comfort with just the right amount of stretchiness.\r\n+ Dual pockets to keep your hands warm and zippers to keep your valuables safe\r\n+ Reflective material to keep you looking fresh even in the dark', '13.webp'),
(14, 0, 29.99, 23.99, 10, 'The HYTE drop-cut shirt was made for both comfort and style. With 100% combed cotton soft enough to sleep in and an anti-sag neckline, this shirt will be a versatile addition to your daily rotation. Unisex fit. All love from us to you.', '14.webp'),
(15, 1, 75.99, 59.99, 10, '+ Vertical graphics card\r\n+ EMI shielded, rigorously tested and built with high quality copper wires for ultimate PCIE 4.0 x16 bandwidth performance.\r\n+ Half-height bracket, full-height bracket? Both options are included to allow for more case compatibility.\r\n+ Only aesthetic luxury PCIE 4.0 riser cable on the market that considers your new vertical GPU set up–now in all three canopy colors–just like the Y60!', '15.webp'),
(16, 0, 99.99, 75.99, 10, 'Since launch, the Y60 has served as an incredible canvas for creativity among the PC DIY community. We are now expanding the possibilities with the introduction of the new HYTE designed Y60 Distro that joins our collection of corner glass replacement accessories.', '16.webp'),
(17, 0, 29.99, 22.99, 10, '+ Custom loops look incredible\r\n+ Compression collars and tightening can be daunting\r\n+ Let’s make it easier for everyone to build\r\nUse the same cutting edge parts as the professionals do', '17.webp'),
(18, 0, 24.99, 18.99, 10, '+ Finally a sleek, functional, and over-designed triple PC fan pack for maximum value - no extra frills to pay for!\r\n+ Move air while keeping mechanical noise to a minimum!\r\n+ High performance fluid dynamic bearing construction and vibration isolators make for quieter and more reliable, long-term, cooling.\r\n+ Get precision PWM control and 120mm sizing to fit a variety of use cases.', '18.webp'),
(19, 0, 279.99, 18.99, 10, 'Introducing the latest HYTE x hololive_EN collab with hololive production\'s #1 detective, Watson Amelia! Enjoy a first-of-its-kind custom colorway Y40 case and accessory bundle filled with an entire collection of limited edition collectibles, including a miniature \"Bubba\" keychain plush! HIC! Are you ready to activate gremlin mode in style? Collect now! #amehyte\r\n\r\n\"Cute overload! This PC case turned out so awesome, huge thanks to the amazing artists and team! The Bubba plushy is just amazing...I NEED 10!\" -- Watson Amelia', '19.webp'),
(20, 0, 349.99, 309.99, 10, 'RIP Gaming PC! Dead Beats are you ready to rock? Enjoy an entire collection of limited edition accessories to complement your insanely decked out, 360-degree artwork filled, Mori Calliope Y40 case! GUH. All souls be with Death-Sensei as extremely limited pre-orders are now available on HYTE.com for orders within US and CAN with select distributors worldwide coming soon! Don’t let Calli down, collect yours today! #calliohyte\r\n\r\n“My PC-savvy Dead Beats are gonna go crazy for this one!! I’m so in my element with the art here…reaper pink is in style, right?! Plus, that art is too good to not have had a tapestry for your wall…I might have to buy 10.” - Mori Calliope”', '20.webp'),
(21, 0, 119.99, 0, 10, 'Brock Hofer is a full time illustrator based out of east coast Canada. From an early age he was always interested in art, drawing with whatever materials he could get his hands on. That creative drive grew over the years, jumping from pen and paper into Photoshop and turned an after work hobby into a full fledged career. For the past 6 years he has worked professionally illustrating neon infused monsters for clients all over the world.', '21.webp'),
(22, 0, 29.99, 0, 10, 'Connect with the Persona 3 Reload universe through this desk pad, designed to evoke the heroic spirit of the Protagonist’s adventures in the game.\r\n\r\nThe size of the desk pad is 900 x 400 mm and the 28 SPI (Stitches Per Square Inch) creates a silky smooth surface for your mouse to glide like a world-class ice skater.', '22.webp');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_quang_cao`
--

CREATE TABLE `hinh_quang_cao` (
  `IdQuangCao` int NOT NULL,
  `TenHinh` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `IdHoaDon` int NOT NULL,
  `Ngay_Lap` date NOT NULL,
  `Tong_Tien` float NOT NULL,
  `IdKhachHang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`IdHoaDon`, `Ngay_Lap`, `Tong_Tien`, `IdKhachHang`) VALUES
(28, '2024-01-13', 659.98, 14),
(29, '2024-01-13', 659.98, 14),
(30, '2024-01-13', 659.98, 14),
(31, '2024-01-13', 659.98, 14);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `IdKhachHang` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sodienthoai` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`IdKhachHang`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES
(12, 'Vinh', 'dcf06a4b39bcb926d9505e20c3972a4a', 'hakik43344@vasteron.com', '116 An Duong vuong,', '5452312'),
(13, '', '293d27d27c0cd9639f5a3c055ffb1c11', '', '', ''),
(14, 'dan ngu', 'dcf06a4b39bcb926d9505e20c3972a4a', 'sadasd', 'dasd', 'adasasdas');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `Id_loai` int NOT NULL,
  `Ten_loai` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`Id_loai`, `Ten_loai`) VALUES
(1, 'ATX Case'),
(2, 'ITX Case'),
(3, 'Gaming Accessories'),
(4, 'Desk Pads'),
(5, 'Gaming Apparel'),
(6, 'Case Components'),
(7, 'Case Fans'),
(8, 'Refurbished');

-- --------------------------------------------------------

--
-- Table structure for table `mau_sp`
--

CREATE TABLE `mau_sp` (
  `IdMau` int NOT NULL,
  `TenMau` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mau_sp`
--

INSERT INTO `mau_sp` (`IdMau`, `TenMau`) VALUES
(0, 'No Color'),
(1, 'Trắng '),
(2, 'Đỏ'),
(3, 'Đen'),
(4, 'Trắng Tuyết');

-- --------------------------------------------------------

--
-- Table structure for table `menu_cha`
--

CREATE TABLE `menu_cha` (
  `IdMenuCha` int NOT NULL,
  `TenMenu` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `menu_cha`
--

INSERT INTO `menu_cha` (`IdMenuCha`, `TenMenu`) VALUES
(1, 'Store'),
(2, 'PC Case '),
(3, 'PC Accessories'),
(4, 'PC Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `menu_con`
--

CREATE TABLE `menu_con` (
  `IdMenuCon` int NOT NULL,
  `TenMenu` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `idMenucha` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `menu_con`
--

INSERT INTO `menu_con` (`IdMenuCon`, `TenMenu`, `idMenucha`) VALUES
(1, 'Store', 0),
(2, 'PC Case ', 0),
(3, 'PC Accessorie', 0),
(4, 'PC Hardware', 0),
(5, 'Case Fans', 4),
(6, 'Case Components', 4),
(7, 'Gaming Apparel', 3),
(8, 'Desk Pads', 3),
(9, 'Gaming Accessories', 3),
(10, 'Refurbished', 2),
(11, 'ITX Case', 2),
(12, 'ATX Case', 2);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `IdSanPham` int NOT NULL,
  `Ten_Sp` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Hinh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Id_loai` int NOT NULL,
  `mo_ta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_lap` date NOT NULL,
  `special` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`IdSanPham`, `Ten_Sp`, `Hinh`, `Id_loai`, `mo_ta`, `ngay_lap`, `special`) VALUES
(1, 'Y70 Touch', '23.webp', 1, 'Modern Aesthetic Case\r\n\r\n', '2023-12-10', 1),
(2, 'Y60', '2.webp', 1, 'Modern Aesthetic Case', '2023-12-10', 0),
(3, 'Y40', '3.webp', 1, 'Modern Aesthetic Case', '2023-12-10', 0),
(4, 'Persona 3 Reload Y60 Bundle', '4.webp', 1, 'Modern Aesthetic Case\r\n\r\n', '2023-12-10', 1),
(5, 'Revolt 3', '5.webp', 2, 'Premium ITX Small Form Factor Case', '2023-12-10', 1),
(6, 'Y60 Refurbished\r\n', '6.webp', 8, 'Modern Aesthetic Case\r\n\r\n', '2023-12-10', 1),
(7, 'eclipse HG10\r\n', '7.webp', 3, '2.4GHz Wireless Gaming Headset\r\n\r\n', '2023-12-10', 1),
(8, 'HYTE-Dro Flask\r\n', '8.webp', 3, '32oz Premium-Grade Water Bottle\r\n\r\n', '2023-12-10', 0),
(9, 'Persona 3 Reload Keycap Set\r\n', '9.webp', 3, 'Premium Keycap Set\r\n\r\n', '2023-12-10', 0),
(10, 'HYTE DESK PAD DP900\r\n', '10.webp', 4, '900 x 400mm Premium Desk Pad\r\n\r\n', '2023-12-10', 1),
(11, '\"Bunny Splash\" Desk Pad\r\n', '11.webp', 4, 'CNVS Analog Desk Pad Series\r\n\r\n', '2023-12-10', 0),
(12, 'P3 Reload Protagonist 2 Desk Pad\r\n', '12.webp', 4, 'Persona 3 Reload Desk Pad Series\r\n\r\n', '2023-12-10', 0),
(13, 'HYTE Branded Hoodie - White\r\n', '13.webp', 5, 'Reflective Dual Pocket Hoodie\r\n\r\n', '2023-12-10', 1),
(14, 'HYTE Branded T-Shirt\r\n', '14.webp', 5, 'Made with 100% premium cotton\r\n\r\n', '2023-12-10', 0),
(15, 'PCIE40 4.0 Luxury Riser Cable\r\n', '15.webp', 6, 'A Luxury Aesthetic, High-Performance Riser Cable\r\n\r\n', '2023-12-10', 1),
(16, 'Y60 Distro\r\n', '16.webp', 6, 'Distribution Plate for Y60\r\n\r\n', '2023-12-10', 0),
(17, 'Push Connects\r\n', '17.webp', 6, 'DIY Push-To-Connect Fittings (6 pack)\r\n\r\n', '2023-12-10', 0),
(18, 'flow FA12 Triple Fan Pack\r\n', '18.webp', 7, '3x High-Quality Fans (120mm)\r\n\r\n', '2023-12-10', 1),
(19, 'Watson Amelia Bundle', '19.webp', 1, 'S-Tier Aesthetic Case', '2023-12-14', 1),
(20, 'Mori Calliope Bundle', '20.webp', 1, 'Limited Edition Y40 Case', '2023-12-14', 1),
(21, 'Hyper Beast 2 Limited Edition CNVS', '21.webp', 4, 'Intense Play Mat', '2023-12-14', 1),
(22, 'P3 Reload Protagonist 3 Desk Pad', '22.webp', 4, 'Persona 3 Reload Desk Pad Series\r\n\r\n', '2023-12-14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`IdHoaDon`,`IdSanPham`,`Mau_sac`) USING BTREE,
  ADD KEY `Fk_Chi_Tiet_HoaDon_3` (`IdSanPham`);

--
-- Indexes for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`IdSanPham`,`IdMau`),
  ADD KEY `Fk_Chi_Tiet_Sp_2` (`IdMau`) USING BTREE;

--
-- Indexes for table `hinh_quang_cao`
--
ALTER TABLE `hinh_quang_cao`
  ADD PRIMARY KEY (`IdQuangCao`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`IdHoaDon`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`IdKhachHang`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`Id_loai`);

--
-- Indexes for table `mau_sp`
--
ALTER TABLE `mau_sp`
  ADD PRIMARY KEY (`IdMau`);

--
-- Indexes for table `menu_cha`
--
ALTER TABLE `menu_cha`
  ADD PRIMARY KEY (`IdMenuCha`);

--
-- Indexes for table `menu_con`
--
ALTER TABLE `menu_con`
  ADD PRIMARY KEY (`IdMenuCon`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`IdSanPham`),
  ADD KEY `Fk_SanPham` (`Id_loai`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  MODIFY `IdHoaDon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `IdHoaDon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `IdKhachHang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `Fk_Chi_Tiet_HoaDon_2` FOREIGN KEY (`IdHoaDon`) REFERENCES `hoa_don` (`IdHoaDon`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Fk_Chi_Tiet_HoaDon_3` FOREIGN KEY (`IdSanPham`) REFERENCES `san_pham` (`IdSanPham`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `Fk_Chi_Tiet_Sp_2` FOREIGN KEY (`IdMau`) REFERENCES `mau_sp` (`IdMau`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `Fk_SanPham` FOREIGN KEY (`Id_loai`) REFERENCES `loai_sp` (`Id_loai`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

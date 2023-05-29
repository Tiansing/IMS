-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 05:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) DEFAULT NULL,
  `cat_desc` longtext DEFAULT NULL,
  `cat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_desc`, `cat_date`) VALUES
(1, 'ELECTRICAL SUPPLIES', 'Electricity-related items available for purchase.', '2023-05-02'),
(2, 'PAINT CHEMICALS', 'Chemicals for painting and coating surfaces.', '2023-05-02'),
(3, 'PLUMBING SUPPLIES', 'Tools and equipment for installing and maintaining plumbing systems.', '2023-05-02'),
(4, 'WOOD', 'Natural material used for construction and decorative purposes.', '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `reorder` int(10) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  `prod_cat_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `reorder`, `date_arrival`, `prod_cat_id`) VALUES
(1, 'Coaxial Cable RG-6 x 300m Philflex', 'ELECTRICAL SUPPLIES', 'Coaxial Cable RG-6 x 300m Philflex', '5000', '3300', '4000', '350', 'Philflex', 10, 10, 10, '2023-05-07', '1'),
(2, 'Coaxial Cable Wire RG-6 300meters', 'ELECTRICAL SUPPLIES', 'Coaxial Cable Wire RG-6 300meters', '5000', '4000', '4500', '500', 'Philflex', 10, 10, 10, '2023-05-07', '1'),
(3, 'Ecolum Solar Streetloght 50 watts', 'ELECTRICAL SUPPLIES', 'Ecolum Solar Streetloght 50 watts', '5000', '735', '835', '335', 'Ecolum', 10, 10, 10, '2023-05-07', '1'),
(4, 'Ever safety switch 30amp', 'ELECTRICAL SUPPLIES', 'Ever safety switch 30amp', '5000', '600', '700', '100', 'Ever', 10, 10, 10, '2023-05-07', '1'),
(5, 'GI Plug 1/2', 'ELECTRICAL SUPPLIES', 'GI Plug 1/2', '5000', '200', '250', '50', 'GI', 10, 10, 10, '2023-05-07', '1'),
(6, 'Hypertech Flat Cord #16', 'ELECTRICAL SUPPLIES', 'Hypertech Flat Cord #16', '5000', '1484', '1534', '50', 'Hypertech', 10, 10, 10, '2023-05-07', '1'),
(7, 'Nema 3R Panel Box 2P Plug in', 'ELECTRICAL SUPPLIES', 'Nema 3R Panel Box 2P Plug in', '5000', '400', '450', '50', 'Nema', 10, 10, 10, '2023-05-07', '1'),
(8, 'Omni E12-015 Candelabra Socket 1 1/4', 'ELECTRICAL SUPPLIES', 'Omni E12-015 Candelabra Socket 1 1/4', '5000', '26', '28', '2', 'Omni', 10, 10, 10, '2023-05-07', '1'),
(9, 'Omni E27-613 Push Through Socket', 'Omni E27-613 Push Through Socket', 'Omni E27-613 Push Through Socket', '50', '130', '130', '80', 'Supplier 1', 10, 10, 10, '2023-05-07', '1'),
(10, 'Omni WDP-303 Dual Portable Extension 3M', 'Omni WDP-303 Dual Portable Extension 3M', 'Omni WDP-303 Dual Portable Extension 3M', '50', '149', '149', '99', 'Supplier 2', 10, 10, 10, '2023-05-07', '1'),
(11, 'Omni WEE-003 Eco Extension Cord', 'Omni WEE-003 Eco Extension Cord', 'Omni WEE-003 Eco Extension Cord', '50', '229.75', '229.75', '179.75', 'Supplier 3', 10, 10, 10, '2023-05-07', '1'),
(12, 'Omni WSO-002 Surface Duplex', 'Omni WSO-002 Surface Duplex', 'Omni WSO-002 Surface Duplex', '50', '50', '50', '0', 'Supplier 4', 10, 10, 10, '2023-05-07', '1'),
(13, 'Omni WTS-001 Electrical Cord Switch ', 'Omni WTS-001 Electrical Cord Switch ', 'Omni WTS-001 Electrical Cord Switch ', '50', '45', '45', '10', 'Supplier 5', 10, 6, 10, '2023-05-07', '1'),
(14, 'Omni WWU-200 Universal Outlet', 'Omni WWU-200 Universal Outlet', 'Omni WWU-200 Universal Outlet', '50', '48', '48', '4', 'Supplier 6', 10, 10, 10, '2023-05-07', '1'),
(15, 'Panel Box 6 branches 4x4', 'ELECTRICAL SUPPLIES', 'Panel Box 6 branches 4x4', '50', '900', '900', '850', 'Supplier 7', 10, 10, 10, '2023-05-07', '1'),
(16, 'PVC Orange Locknut 3/4', 'PVC Orange Locknut 3/4', 'PVC Orange Locknut 3/4', '50', '7', '7', '2', 'Supplier 8', 10, 10, 10, '2023-05-07', '1'),
(17, 'Boysen 1205 Lacquer Flo Gal', 'PAINT CHEMICALS', 'Boysen 1205 Lacquer Flo Gal', '50', '810', '810', '800', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(18, 'Boysen 311 Glazing Putty Gal', 'PAINT CHEMICALS', 'Boysen 311 Glazing Putty Gal', '50', '620', '620', '570', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(19, 'Boysen 600 QDE White Litro', 'PAINT CHEMICALS', 'Boysen 600 QDE White Litro', '50', '200', '200', '50', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(20, 'Boysen 690 QDE Black Liter', 'PAINT CHEMICALS', 'Boysen 690 QDE Black Liter', '50', '189', '189', '100', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(21, 'Boysen 700 Acrylic Emulsion Gal', 'PAINT CHEMICALS', 'Boysen 700 Acrylic Emulsion Gal', '50', '620', '620', '570', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(22, 'Boysen 701 Flat latex Litro', 'PAINT CHEMICALS', 'Boysen 701 Flat latex Litro', '50', '200', '200', '50', 'Boysen', 10, 0, 8, '2023-05-07', '2'),
(23, 'Boysen 7760 Plexibond Gal', 'PAINT CHEMICALS', 'Boysen 7760 Plexibond Gal', '50', '620', '620', '570', 'Boysen', 10, 10, 8, '2023-05-07', '2'),
(24, 'Champ Spray Paint Black/Silver High Heat', 'PAINT CHEMICALS', 'Champ Spray Paint Black/Silver High Heat', '50', '120', '120', '100', 'Champ', 10, 10, 8, '2023-05-07', '2'),
(25, 'Hudson Polu Urethane Reducer Litro', 'PAINT CHEMICALS', 'Hudson Polu Urethane Reducer Litro', '50', '249', '249', '0', 'Hudson', 10, 10, 8, '2023-05-07', '2'),
(26, 'Hudson Poly Urethane Top Coat Gallon', 'PAINT CHEMICALS', 'Hudson Poly Urethane Top Coat Gallon', '50', '1180', '1180', '0', 'Hudson', 10, 10, 8, '2023-05-07', '2'),
(27, 'Lacquer Thinner 4L gallon', 'PAINT CHEMICALS', 'Lacquer Thinner 4L gallon', '50', '585', '585', '0', 'Hudson', 10, 10, 8, '2023-05-07', '2'),
(28, 'Lacquer Thinner Bottle', 'PAINT CHEMICALS', 'Lacquer Thinner Bottle', '50', '50', '50', '0', 'Hudson', 10, 10, 8, '2023-05-07', '2'),
(29, 'Neltex Solvent Cement 100cc', 'PAINT CHEMICALS', 'Neltex Solvent Cement 100cc', '50', '115', '115', '0', 'Hudson', 10, 10, 8, '2023-05-07', '2'),
(30, 'Paint Brush 1\"', 'PAINT CHEMICALS', 'Paint Brush 1', '50', '19', '19', '0', 'Hudson', 10, 50, 50, '2023-05-07', '2'),
(31, 'Paint Brush 2\"', 'PAINT CHEMICALS', 'Paint Brush 2', '50', '45', '45', '0', 'Hudson', 10, 50, 50, '2023-05-07', '2'),
(32, 'paint Brush 3\"', 'PAINT CHEMICALS', 'paint Brush 3', '50', '65', '65', '0', 'Hudson', 10, 49, 50, '2023-05-07', '2'),
(33, 'Paint Thinner 350cc', 'PAINT CHEMICALS', 'Paint Thinner 350cc', '50', '57', '57', '0', 'Hudson', 10, 6, 8, '2023-05-07', '2'),
(34, 'Paint Thinner 4L Gallon', 'PAINT CHEMICALS', 'Paint Thinner 4L Gallon', '50', '300', '250', '200', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(35, 'Polituff Gallon', 'PAINT CHEMICALS', 'Polituff Gallon', '50', '900', '850', '150', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(36, 'Polituff Litro', 'PAINT CHEMICALS', 'Polituff Litro', '50', '230', '200', '30', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(37, 'Rain or Shine Milk RORS-809 Tin', 'PAINT CHEMICALS', 'Rain or Shine Milk RORS-809 Tin', '50', '750', '700', '50', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(38, 'Rain or Shine RORS-939 Asian Green Pail', 'PAINT CHEMICALS', 'Rain or Shine RORS-939 Asian Green Pail', '50', '1200', '1150', '50', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(39, 'Rain or Shine Tile Red Liter', 'PAINT CHEMICALS', 'Rain or Shine Tile Red Liter', '50', '230', '200', '30', 'Philflex', 10, 8, 8, '2023-05-07', '2'),
(40, 'Roller Brush 5\"', 'PAINT CHEMICALS', 'Roller Brush 5', '50', '118', '118', '0', 'Philflex', 10, 50, 50, '2023-05-07', '2'),
(41, 'Roller Brush 7\" w/handle', 'PAINT CHEMICALS', 'Roller Brush 7 w/handle', '50', '199', '199', '0', 'Philflex', 10, 45, 50, '2023-05-07', '2'),
(42, 'Sahara Cement 32/box', 'PAINT CHEMICALS', 'Sahara Cement 32/box', '50', '1200', '1150', '50', 'Philflex', 10, 15, 15, '2023-05-07', '2'),
(43, 'Sandpaper Hippo #120', 'PAINT CHEMICALS', 'Sandpaper Hippo #120', '50', '17', '17', '0', 'Supplier 1', 10, 15, 15, '2023-05-07', '2'),
(44, 'Silicon Sealant', 'PAINT CHEMICALS', 'Silicon Sealant', '50', '275', '275', '0', 'Supplier 2', 10, 15, 15, '2023-05-07', '2'),
(45, 'Solignum Brown Gal', 'PAINT CHEMICALS', 'Solignum Brown Gal', '50', '2200', '2200', '0', 'Supplier 3', 10, 8, 8, '2023-05-07', '2'),
(46, 'Solignum Clear Lit', 'PAINT CHEMICALS', 'Solignum Clear Lit', '50', '500', '500', '0', 'Supplier 4', 10, 8, 8, '2023-05-07', '2'),
(47, 'Sphero Epoxy Primer Gray 850 w/ Catalyst Gallon', 'PAINT CHEMICALS', 'Sphero Epoxy Primer Gray 850 w/ Catalyst Gallon', '50', '720', '720', '0', 'Supplier 5', 10, 8, 8, '2023-05-07', '2'),
(48, 'Sphero Epoxy Primer Gray 850 w/ Catalyst Litro', 'PAINT CHEMICALS', 'Sphero Epoxy Primer Gray 850 w/ Catalyst Litro', '50', '340', '340', '0', 'Supplier 6', 10, 8, 8, '2023-05-07', '2'),
(49, 'Sphertite 1/4', 'PAINT CHEMICALS', 'Sphertite 1/4', '50', '90', '90', '0', 'Supplier 7', 10, 8, 8, '2023-05-07', '2'),
(50, 'Turco Rust Converter 500ml', 'PAINT CHEMICALS', 'Turco Rust Converter 500ml', '50', '200', '200', '0', 'Supplier 8', 10, 8, 8, '2023-05-07', '2'),
(51, 'Vulcaseal 1/2', 'PAINT CHEMICALS', 'Vulcaseal 1/2', '50', '245', '245', '0', 'Supplier 9', 10, 8, 8, '2023-05-07', '2'),
(52, 'Welcoat Flat Latex White Liter', 'PAINT CHEMICALS', 'Welcoat Flat Latex White Liter', '50', '160', '160', '110', 'Supplier 1', 8, 8, 8, '2023-05-07', '2'),
(53, 'Welcoat QDE White 1 liter', 'PAINT CHEMICALS', 'Welcoat QDE White 1 liter', '50', '250', '250', '200', 'Supplier 2', 8, 8, 8, '2023-05-07', '2'),
(54, 'Welcoat WPRE-4010 Metal Primer Red Oxide Litro', 'PAINT CHEMICALS', 'Welcoat WPRE-4010 Metal Primer Red Oxide Litro', '50', '380', '380', '330', 'Supplier 3', 8, 8, 8, '2023-05-07', '2'),
(55, 'Orange Pipe 6\"', 'PLUMBING SUPPLIES', 'Orange Pipe 6\"', '50', '180', '180', '130', 'Supplier 1', 15, 15, 15, '2023-05-07', '3'),
(56, 'Pressure Gauge 100psi', 'PLUMBING SUPPLIES', 'Pressure Gauge 100psi', '50', '140', '140', '90', 'Supplier 2', 10, 10, 10, '2023-05-07', '3'),
(57, 'Sink Faucet Tail Piece 1/2x2', 'PLUMBING SUPPLIES', 'Sink Faucet Tail Piece 1/2x2', '50', '550', '550', '500', 'Supplier 3', 4, 4, 4, '2023-05-07', '3'),
(58, 'Ordinary Plywood 1/2', 'WOOD', 'ORD-PLY12', '50', '750', '750', '0', 'Supplier 1', 30, 30, 30, '2023-05-07', '4'),
(59, 'Quarter C x10', 'WOOD', 'QTR-C10', '50', '75', '75', '0', 'Supplier 2', 30, 30, 30, '2023-05-07', '4'),
(60, 'Quarter C x8', 'WOOD', 'QTR-C8', '50', '20', '75', '55', 'Supplier 3', 30, 54, 20, '2023-05-07', '4'),
(85, 'S4S 1/2X1X10', 'WOOD', '', '', '20', '70', '50', 'Manila Wood Supply', 0, 24, 20, '2023-05-01', '4'),
(86, 'Corniza A 1 x 2 x 10', 'WOOD', '', '', '20', '180', '160', 'Cebu Wood Supply', 0, 46, 20, '2023-05-01', '4'),
(87, 'HALF ROUND X10', 'WOOD', '', '', '20', '91', '71', 'Manila Wood Supply', 0, 40, 20, '2023-05-01', '4'),
(88, 'Blue Pipe 1/2 ', 'PLUMBING', '', '', '50', '75', '25', 'ABC Plumbing Supply', 0, 48, 20, '2023-05-01', '3'),
(89, 'Black Pipe 3\"', 'PLUMBING', '', '', '100', '195', '95', 'XYZ Plumbing Supply', 0, 48, 20, '2023-05-01', '3'),
(90, 'Black Elbow 2\" 90', 'PLUMBING', '', '', '10', '15', '5', 'ABC Plumbing Supply', 0, 49, 20, '2023-05-01', '3'),
(91, 'Blue Threaded Elbow 1/2', 'PLUMBING', '', '', '10', '17', '7', 'XYZ Plumbing Supply', 0, 48, 20, '2023-05-01', '3'),
(92, 'PE Female Adaptor 1/2', 'PLUMBING', '', '', '10', '13', '3', 'The Plumbing Shop', 0, 50, 20, '2023-05-01', '3'),
(93, 'Ordinary Plywood 3/4', 'WOOD', '', '', '1000', '1200', '200', 'Cebu Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(94, 'Blue Femaie adaptor 1/2', 'PLUMBING', '', '', '10', '13', '3', 'Plumbing Supply Co.', 0, 48, 20, '2023-05-01', '3'),
(95, 'Marine 3/4', 'WOOD', '', '', '1000', '1200', '200', 'Manila Wood Supply', 0, 45, 20, '2023-05-01', '4'),
(96, 'Ordinary Plywood 1/4', 'WOOD', '', '', '1000', '1200', '200', 'Cebu Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(97, 'Nebraska Marine 1/4', 'WOOD', '', '', '1000', '1100', '100', 'Manila Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(98, 'Marine 1/2', 'WOOD', '', '', '1000', '1200', '200', 'Cebu Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(99, 'Corniza A 1 x 3 x 8', 'WOOD', '', '', '200', '236', '36', 'Cebu Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(100, 'Corniza A 1 x 2 x 8', 'WOOD', '', '', '150', '158', '8', 'Davao Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(101, 'Center Moulding #10', 'WOOD', '', '', '150', '158', '8', 'Manila Wood Supply', 0, 50, 20, '2023-05-01', '4'),
(102, 'Paint Brush 1/2\"', 'brush', '', '', '10', '15', '5', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(103, 'Paint Brush 3/4\"', 'brush', '', '', '10', '19', '9', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(104, 'Paint Brush 1 1/2\"', 'brush', '', '', '25', '29', '4', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(105, 'Paint Brush 4\"', 'brush', '', '', '95', '105', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(106, 'Steel Brush w/ handle wood', 'brush', '', '', '15', '20', '5', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(107, 'Baby Roller 4\" w/ handle Cotton', 'brush', '', '', '25', '29', '4', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(108, 'Baby Roller 4\" Filler Cotton', 'brush', '', '', '15', '23', '8', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(109, 'Paint Tray', 'paint', '', '', '45', '59', '14', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(110, 'Vulcaseal Jr.', 'paint', '', '', '95', '100', '5', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(111, 'Vulcaseal 1/4', 'paint', '', '', '120', '135', '15', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(112, 'Vulcaseal 1 liter', 'paint', '', '', '460', '480', '20', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(113, 'Boysen 690 QDE Black Gallon', 'paint', '', '', '480', '509', '29', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(114, 'Boysen 680 QDE Choco Brown Gal', 'paint', '', '', '600', '620', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(115, 'Boysen 680 Liter Chocolate Brown', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(116, 'Boysen 1205 Lacquer Flo Liter', 'paint', '', '', '200', '240', '40', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(117, 'Boysen 2707 Wood Stain Mahogany', 'paint', '', '', '500', '520', '20', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(118, 'Boysen 691', 'paint', '', '', '650', '680', '30', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(119, 'Boysen 600 QDE White Gal', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(120, 'Boysen 600 QDE White Pail', 'paint', '', '', '3150', '3200', '50', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(121, 'Boysen 661', 'paint', '', '', '200', '240', '40', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(122, 'Boysen 701 Flat latex Pail', 'paint', '', '', '3100', '3200', '100', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(123, 'Boysen 701 Flat latex Gal', 'paint', '', '', '600', '620', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(124, 'Boysen 715 Semi Gloss Latex White Liter', 'paint', '', '', '190', '200', '10', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(125, 'Boysen 715 Semi Gloss Latex White Gal', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(126, 'Boysen 715 Semi-Gloss Latex White Tin', 'paint', '', '', '600', '620', '20', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(127, 'Boysen 710 Gloss latex Tin', 'paint', '', '', '600', '620', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(128, 'Boysen 710 Gloss Latex Gal', 'paint', '', '', '600', '620', '20', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(129, 'Boysen 710 Gloss Latex Litro', 'paint', '', '', '190', '200', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(130, 'Boysen 7311 Masonry putty Gal', 'paint', '', '', '600', '620', '20', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(131, 'Boysen 7311 Masonry putty Litro', 'paint', '', '', '190', '200', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(132, 'Boysen 2550 Roof Guard Baguio Green Gal', 'paint', '', '', '600', '620', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(133, 'Boysen 2550 Roof Guard Baguio Green Tin', 'paint', '', '', '600', '620', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(134, 'Boysen 1254 Sanding Sealer Litro', 'paint', '', '', '190', '200', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(135, 'Boysen 1254 Sanding Sealer Gal', 'paint', '', '', '600', '620', '20', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(136, 'Boysen 700 Acrylic Emulsion Gal', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(137, 'Boysen 700 Acrylic Emulsion Liter', 'paint', '', '', '190', '200', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(138, 'Boysen 800 Flat Wall Enamel Lit', 'paint', '', '', '190', '200', '10', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(139, 'Boysen 800 Flat Wall Enamel Gal', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(140, 'Boysen 7760 Plexibond Pail', 'paint', '', '', '3150', '3200', '50', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(141, 'Boysen 7760 Plexibond Gal', 'paint', '', '', '600', '620', '20', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(142, 'Boysen 311 Glazing Putty Lit', 'paint', '', '', '190', '200', '10', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(143, 'Boysen 1250 Clear Gloss Lacquer Litro', 'paint', '', '', '190', '200', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(144, 'Boysen 1250 Clear Gloss Lacquer Gal', 'paint', '', '', '600', '620', '20', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(145, 'Concrete Neutralizer 1 Lit', 'paint', '', '', '140', '150', '10', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(146, 'Denatured Alcohol 350cc', 'paint', '', '', '40', '49', '9', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(147, 'Lacquer Flo Bottle 350cc', 'paint', '', '', '250', '265', '15', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(148, 'Lacquer Flo Gallon', 'paint', '', '', '795', '808', '13', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(149, 'Paint Thinner 350cc', 'paint', '', '', '50', '57', '7', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(150, 'Plastic Varnish Bottle', 'paint', '', '', '65', '70', '5', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(151, 'Plastic Varnish 4L Gallon', 'paint', '', '', '450', '470', '20', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(152, 'Liquid Sosa bottle 350cc', 'paint', '', '', '50', '58', '8', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(153, 'Duralac/Almasiga 16 Liters (Balde)', 'paint', '', '', '390', '400', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(154, 'Isopropyl Alcohol 70%', 'paint', '', '', '110', '115', '5', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(155, 'Skimcoat', 'paint', '', '', '40', '45', '5', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(156, 'ABC Tile Grout', 'paint', '', '', '70', '75', '5', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(157, 'ABC Tile Grout Beige F1', 'paint', '', '', '230', '240', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(158, 'ABC Tile Grout White F15', 'paint', '', '', '80', '85', '5', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(159, 'ABC Tile Grout Gray F14', 'paint', '', '', '80', '85', '5', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(160, 'ABC Tile Grout Cream F16', 'paint', '', '', '80', '85', '5', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(161, 'ABC Tile Adhesive Sorento Blue F8', 'paint', '', '', '150', '155', '5', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(162, 'ABC Tile Adhesive', 'paint', '', '', '150', '155', '5', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(163, 'Red Cement 2kg', 'paint', '', '', '240', '250', '10', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(164, 'Neltex Solvent Cement 200cc', 'paint', '', '', '145', '160', '15', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(165, 'Neltex Solvent Cement 400cc', 'paint', '', '', '250', '275', '25', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(166, 'Stikwell Pouch', 'paint', '', '', '40', '49', '9', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(167, 'Stikwell 1/4', 'paint', '', '', '150', '160', '10', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(168, 'Stikwell 1/2', 'paint', '', '', '240', '250', '10', 'Solvay Chemicals', 0, 50, 50, '2023-05-01', '2'),
(169, 'Stikwell Liter', 'paint', '', '', '140', '150', '10', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(170, 'Stikwell Gallon', 'paint', '', '', '560', '580', '20', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(171, 'Cord Epoxy Steel (Fast Setting) 40g', 'paint', '', '', '65', '72', '7', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(172, 'Cord Epoxy Steel (Fast Setting) 15g', 'paint', '', '', '80', '89', '9', 'Univar Philippines', 0, 50, 20, '2023-05-01', '2'),
(173, 'WEF 2060 Welcoat Flat Wall Enamel White Litro', 'paint', '', '', '190', '200', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2'),
(174, 'WEF 2060 Welcoat Flat Wall Enamel White Gallon', 'paint', '', '', '680', '695', '15', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(175, 'Welcoat Metal Primer Gray Litro', 'paint', '', '', '375', '381', '6', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(176, 'Welcoat WPRE-4010 Metal Primer Red Oxide Gal', 'paint', '', '', '875', '885', '10', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(177, 'Welcoat WPRE-4010 Metal Primer Red Oxide 1/4', 'paint', '', '', '70', '80', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(178, 'Welcoat QDE White 1/4', 'paint', '', '', '190', '200', '10', 'Oktakem Trading', 0, 50, 20, '2023-05-01', '2'),
(179, 'Welcoat QDE White Gal', 'paint', '', '', '675', '690', '15', 'Solvay Chemicals', 0, 50, 20, '2023-05-01', '2'),
(180, 'Welcoat QDE Black 1/4', 'paint', '', '', '190', '200', '10', 'BASF Philippines', 0, 50, 20, '2023-05-01', '2'),
(181, 'Welcoat QDE Black 1 Liter', 'paint', '', '', '240', '250', '10', 'Chemson Philippines', 0, 50, 20, '2023-05-01', '2');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(1, 'RS-5044838', 'Admin', '2023-05-18', 'cash', '4600', '500', '4600', 'John', ''),
(2, 'RS-0320022', 'Admin', '2023-05-18', 'cash', '2200', '2000', '2500', 'Reyes, Louise France Emmanuelle T.', ''),
(3, 'RS-739205', 'Admin', '2023-05-18', 'cash', '1615', '1140', '1700', '-', ''),
(4, 'RS-232960', 'Admin', '2023-05-18', 'cash', '910', '710', '1000', 'NONE', ''),
(5, 'RS-003276', 'Admin', '2023-05-18', 'cash', '6000', '1000', '6000', 'arvy vistan', ''),
(6, 'RS-892229', 'Admin', '2023-05-19', 'cash', '1175', '40', '1200', 'Jennie', ''),
(7, 'RS-0222380', 'Admin', '2023-05-19', 'cash', '1600', '400', '1600', 'louise', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `o_price` varchar(255) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `category` varchar(255) NOT NULL,
  `reorder` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `o_price`, `discount`, `date`, `category`, `reorder`, `supplier`) VALUES
(74, 'RS-832232', '85', '26', '1820', '1300', 'S4S 1/2X1X10', 'WOOD', '', '70', '20', '', '2023-05-18', '4', '20', 'Manila Wood Supply'),
(76, 'RS-70739332', '86', '4', '720', '640', 'Corniza A 1 x 2 x 10', 'WOOD', '', '180', '20', '', '2023-05-18', '4', '20', 'Cebu Wood Supply'),
(78, 'RS-232960', '87', '10', '910', '710', 'HALF ROUND X10', 'WOOD', 'NONE', '91', '20', '', '2023-05-18', '4', '20', 'Manila Wood Supply'),
(79, 'RS-32303', '88', '2', '100', '60', 'Blue Pipe 1/2 ', 'PLUMBING', '', '50', '20', '', '2023-05-18', '3', '20', 'ABC Plumbing Supply'),
(80, 'RS-32303', '89', '2', '390', '190', 'Black Pipe 3\"', 'PLUMBING', '', '195', '100', '', '2023-05-18', '3', '20', 'XYZ Plumbing Supply'),
(81, 'RS-32303', '90', '1', '15', '5', 'Black Elbow 2\" 90', 'PLUMBING', '', '15', '10', '', '2023-05-18', '3', '20', 'ABC Plumbing Supply'),
(82, 'RS-32303', '91', '2', '34', '14', 'Blue Threaded Elbow 1/2', 'PLUMBING', '', '17', '10', '', '2023-05-18', '3', '20', 'XYZ Plumbing Supply'),
(83, 'RS-3200233', '94', '2', '26', '6', 'Blue Femaie adaptor 1/2', 'PLUMBING', '', '13', '10', '', '2023-05-18', '3', '20', 'Plumbing Supply Co.'),
(84, 'RS-3200233', '22', '2', '400', '100', 'Boysen 701 Flat latex Litro', 'PAINT CHEMICALS', 'Boysen 701 Flat latex Litro', '200', '200', '', '2023-05-18', '2', '8', 'Boysen'),
(85, 'RS-3200233', '32', '1', '65', '0', 'paint Brush 3inch', 'PAINT CHEMICALS', 'paint Brush 3', '65', '65', '', '2023-05-18', '2', '50', 'Hudson'),
(86, 'RS-3200233', '33', '2', '114', '0', 'Paint Thinner 350cc', 'PAINT CHEMICALS', 'Paint Thinner 350cc', '57', '57', '', '2023-05-18', '2', '8', 'Hudson'),
(87, 'RS-003276', '95', '5', '6000', '1000', 'Marine 3/4', 'WOOD', 'arvy vistan', '1200', '1000', '', '2023-05-18', '4', '20', 'Manila Wood Supply'),
(88, 'RS-892229', '41', '5', '995', '0', 'Roller Brush 7\" w/handle', 'PAINT CHEMICALS', 'Jennie', '199', '199', '', '2023-05-19', '2', '50', 'Philflex'),
(89, 'RS-892229', '13', '4', '180', '40', 'Omni WTS-001 Electrical Cord Switch ', 'Omni WTS-001 Electrical Cord Switch ', 'Jennie', '45', '45', '', '2023-05-19', '1', '10', 'Supplier 5'),
(90, 'RS-0222380', '22', '8', '1600', '400', 'Boysen 701 Flat latex Litro', 'PAINT CHEMICALS', 'louise', '200', '200', '', '2023-05-19', '2', '8', 'Boysen');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(1, 'AB Electrical Supply', '123 Main Street, Makati City, Philippines', '(632) 891-2345', 'John Smith', 'Supplier of electrical supplies and equipment.'),
(2, 'AC Electrical Supply', '456 Elm Street, Quezon City, Philippines', '(632) 987-6543', 'Jane Doe', 'Supplier of electrical supplies and equipment.'),
(3, 'AD Electrical Supply', '789 Oak Street, Pasay City, Philippines', '(632) 543-2109', 'Peter Jones', 'Supplier of electrical supplies and equipment.'),
(4, 'AE Electrical Supply', '1011 Pine Street, Manila City, Philippines', '(632) 123-4567', 'Mary Green', 'Supplier of electrical supplies and equipment.'),
(5, 'Oktakem Trading', 'Km. 21 Interior East Service Road, Sucat, Muntinlupa City', '02-76189550', 'Mr. John Doe', 'Chemicals and supplies for pools, spas, and other water features.'),
(6, 'Chemson Philippines', '2030 Don Chino Roces Avenue Extension, Makati City', '02-88775555', 'Ms. Jane Doe', 'Chemicals for industrial, commercial, and agricultural use.'),
(7, 'Univar Philippines', '12345 EDSA, Mandaluyong City', '02-63312345', 'Mr. Peter Doe', 'Chemicals for food, beverage, and personal care industries.'),
(8, 'Solvay Chemicals', '45678 Ortigas Avenue, Pasig City', '02-63654321', 'Ms. Mary Doe', 'Chemicals for the automotive, electronics, and construction industries.'),
(9, 'BASF Philippines', '98765 Shaw Boulevard, Mandaluyong City', '02-63987654', 'Mr. David Doe', 'Chemicals for a variety of industries, including agriculture, automotive, and construction.'),
(10, 'ABC Plumbing Supply', '123 Main Street, Manila, Philippines', '(02) 123-4567', 'John Smith', 'We offer a wide variety of plumbing supplies, including pipes, fixtures, and tools.'),
(11, 'XYZ Plumbing Supply', '456 Elm Street, Cebu City, Philippines', '(032) 789-0123', 'Jane Doe', 'We are a family-owned and operated business that has been serving the Philippines for over 20 years.'),
(12, 'Plumbing Supply Co.', '789 Oak Street, Davao City, Philippines', '(082) 123-4567', 'Peter Jones', 'We offer competitive prices and excellent customer service.'),
(13, 'The Plumbing Shop', '101 Acacia Street, Makati City, Philippines', '(02) 987-6543', 'Mary Green', 'We are open 24 hours a day, 7 days a week.'),
(14, 'Manila Wood Supply', '123 Main Street, Manila, Philippines', '(02) 555-1212', 'John Doe', 'We sell a variety of wood products, including lumber, plywood, and flooring.'),
(15, 'Cebu Wood Supply', '456 Elm Street, Cebu City, Philippines', '(032) 777-2323', 'Jane Doe', 'We specialize in hardwoods, such as mahogany and teak.'),
(16, 'Davao Wood Supply', '789 Oak Street, Davao City, Philippines', '(082) 999-3434', 'Peter Smith', 'We offer a wide range of wood products at competitive prices.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'superadmin', 'superadmin', 'Admin', 'superadmin'),
(3, 'admin', 'admin123', 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 04:13 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_procurement`
--

-- --------------------------------------------------------

--
-- Table structure for table `aoq_header`
--

CREATE TABLE IF NOT EXISTS `aoq_header` (
`aoq_id` int(11) NOT NULL,
  `aoq_date` varchar(20) DEFAULT NULL,
  `pr_no` varchar(50) DEFAULT NULL,
  `department_id` int(11) NOT NULL DEFAULT '0',
  `enduse_id` int(11) NOT NULL DEFAULT '0',
  `purpose_id` int(11) NOT NULL DEFAULT '0',
  `date_needed` varchar(20) DEFAULT NULL,
  `requested_by` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `prepared_by` int(11) NOT NULL DEFAULT '0',
  `recommending_approval` int(11) NOT NULL DEFAULT '0',
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aoq_header`
--

INSERT INTO `aoq_header` (`aoq_id`, `aoq_date`, `pr_no`, `department_id`, `enduse_id`, `purpose_id`, `date_needed`, `requested_by`, `remarks`, `prepared_by`, `recommending_approval`, `approved_by`, `create_date`) VALUES
(1, '2019-05-03', '1111', 3, 2, 2, '2019-05-10', 24, 'test', 1, 0, 0, '2019-05-03 10:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `aoq_items`
--

CREATE TABLE IF NOT EXISTS `aoq_items` (
`aoq_items_id` int(11) NOT NULL,
  `aoq_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aoq_items`
--

INSERT INTO `aoq_items` (`aoq_items_id`, `aoq_id`, `item_id`, `quantity`) VALUES
(1, 1, 337, 5),
(2, 1, 334, 10),
(3, 1, 14, 10),
(4, 1, 380, 12);

-- --------------------------------------------------------

--
-- Table structure for table `aoq_rfq`
--

CREATE TABLE IF NOT EXISTS `aoq_rfq` (
`aoq_rfq_id` int(11) NOT NULL,
  `aoq_id` int(11) NOT NULL DEFAULT '0',
  `rfq_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aoq_rfq`
--

INSERT INTO `aoq_rfq` (`aoq_rfq_id`, `aoq_id`, `rfq_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(3, 'IT Department');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT '0',
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `department_id`, `position`) VALUES
(1, 'Ma. Milagros Arana', 0, 'General Manager'),
(2, 'Rhea Arsenio', 0, 'Trader'),
(3, 'Jonah Faye Benares', 0, 'Software Development Supervisor'),
(4, 'Kervic Biñas', 0, 'Procurement Assistant'),
(5, 'Joemarie Calibjo', 0, 'Service Vehicle Driver'),
(6, 'Maylen Cabaylo', 0, 'Purchasing Officer'),
(7, 'Rey  Carbaquil', 0, 'Service Vehicle Driver'),
(8, 'Cristy Cesar', 0, 'Accounting Associate'),
(9, 'Gretchen Danoy', 0, 'Accounting Supervisor'),
(10, 'Merry Michelle Dato', 0, 'Projects and Asset Management Assistant'),
(11, 'Joemar De Los Santos', 0, 'Lead Trader'),
(12, 'Imelda Espera', 0, 'A/P & Credit Supervisor'),
(13, 'Elaisa Jane Febrio', 0, 'HR Assistant'),
(14, 'Jason Flor', 0, 'Software Development Assistant'),
(15, 'Zara Joy Gabales', 0, 'Billing Assistant'),
(16, 'Relsie Gallo', 0, '0'),
(17, 'Celina Marie Grabillo', 0, 'Billing & Settlement Officer'),
(18, 'Nazario Shyde Jr. Ibañez', 0, 'Trader'),
(19, 'Gebby Jalandoni', 0, 'Accounting Assistant'),
(20, 'Caesariane Jo', 0, 'Trader'),
(21, 'Lloyd Jamero', 0, 'IT Specialist'),
(22, 'Annavi Lacambra', 0, 'Corporate Accountant'),
(23, 'Ma. Erika Oquiana', 0, 'Trader'),
(24, 'Charmaine Rei Plaza', 0, 'Energy Market Analyst'),
(25, 'Cresilda Mae Ramirez', 0, 'Internal Auditor'),
(26, 'Melanie Rocha', 0, 'Utility'),
(27, 'Zyndyryn Rosales', 0, 'Finance Supervisor'),
(28, 'Genie Saludo', 0, 'HR Assistant'),
(29, 'Daisy Jane Sanchez', 0, 'EMG Manager / WESM Compliance Officer'),
(30, 'Rosemarie Sarroza', 0, 'Trader'),
(31, 'Stephine David Severino', 0, 'Software Development Assistant'),
(32, 'Henry Sia', 0, 'Grid Integration Manager'),
(33, 'Syndey Sinoro', 0, 'HR Supervisor'),
(34, 'Marianita Tabilla', 0, 'Finance Assistant'),
(35, 'Krystal Gayle Tagalog', 0, 'Payroll Assistant'),
(36, 'Hennelen Tanan', 0, 'IT Encoder '),
(37, 'Teresa Tan', 0, 'Contracts & Compliance Asst.'),
(38, 'Dary Mae Villas', 0, 'Trader'),
(39, 'Marlon Adorio', 0, 'E & IC Technician'),
(40, 'John Ezequiel Alejandro', 0, 'Auxiliary Operator '),
(41, 'Carlito Alevio', 0, 'Plant Mechanic'),
(42, 'Regina Alova', 0, 'Operations Analyst'),
(43, 'Rebecca Alunan ', 0, 'Performance Monitoring Supervisor'),
(44, 'Fleur de Liz Ambong', 0, 'Fuel Management Asst.'),
(45, 'Beverly  Ampog', 0, 'Operations Analyst'),
(46, 'Genaro Angulo', 0, 'Electrical Supervisor'),
(47, 'Rey Argawanon', 0, 'Power Delivery & Technical Manager'),
(48, 'Alona Arroyo', 0, 'Operations Planner'),
(49, 'Joemillan Baculio', 0, 'Auxiliary Operator'),
(50, 'Rashelle Joy Bating', 0, 'Projects Coordinator Assistant'),
(51, 'Gener Bawar', 0, 'Machine Shop & Reconditioning Supervisor'),
(52, 'Ruel Beato', 0, 'Plant Mechanic'),
(53, 'Mary Grace Bugna', 0, 'Asset Management Asst.'),
(54, 'Vency Cababat', 0, ' E&IC Technician'),
(55, 'Rusty Canama', 0, 'Plant Mechanic'),
(56, 'Exequil Corino', 0, 'Engine Room Operator'),
(57, 'Juanito Dagupan', 0, 'Operation Shift Supervisor'),
(58, 'Julyn May Divinagracia', 0, 'Admin Assistant'),
(59, 'Melfa Duis', 0, 'Purchasing Assistant'),
(60, 'Jerson Factolerin', 0, 'Utility'),
(61, 'Julius Fernandez', 0, 'Auxiliary Operator'),
(62, 'Luisito Fortuno', 0, 'Auxiliary Operator'),
(63, 'Donna Gellada', 0, 'Parts Inventory  Assistant'),
(64, 'Felipe, III Globert', 0, 'Warehouse Assistant'),
(65, 'Mikko Golvio', 0, 'E&IC Technician'),
(66, 'Eric Jabiniar', 0, 'Plant Director'),
(67, 'Jushkyle Jambongana', 0, 'IT Assistant'),
(68, 'Bobby  Jardiniano', 0, 'Service Vehicle Driver'),
(69, 'Stephen Jardinico', 0, 'Warehouse Assistant'),
(70, 'Joey Labanon', 0, 'Auxiliary Operator Trainee'),
(71, 'Roan Renz Liao', 0, 'Parts Engineer'),
(72, 'Gino Lovico', 0, 'Foreman (Machine Shop & Recon)'),
(73, 'Ricky Madeja', 0, 'Safety Officer'),
(74, 'Danilo Maglinte', 0, 'Engine Room Operator'),
(75, 'Alex Manilla Jr.', 0, 'Fuel Tender'),
(76, 'Concordio Matuod', 0, 'Project Consultant'),
(77, 'Genielyne Mondejar', 0, 'Pollution Control Officer  '),
(78, 'Francis Montero', 0, 'Plant Mechanic'),
(79, 'Andro Ortega', 0, 'Shift Supervisor Trainee'),
(80, 'Joselito Panes', 0, 'Plant Mechanic'),
(81, 'Nonito Pocong', 0, 'Control Room Operator'),
(82, 'Mario Dante Purisima', 0, 'Shift Supervisor Trainee'),
(83, 'Romeo Quiocson Jr.', 0, 'Technical Assistant'),
(84, 'Lawrence Vincent Roiles', 0, 'E&IC Technician'),
(85, 'Roy Sabit', 0, 'Control Room Operator'),
(86, 'Robert Sabando', 0, 'Project Consultant'),
(87, 'Godfrey Stephen Samano', 0, 'O&M Superintendent'),
(88, 'Kennah Sasamoto', 0, 'Test  Engineer'),
(89, 'Iris Sixto', 0, 'Site Facilities Supervisor'),
(90, 'Kelwin Sarcauga', 0, 'Engine Room Operator Trainee'),
(91, 'Ranie Tabanao', 0, '0'),
(92, 'Alexander Tagarda', 0, 'Control Room Operator'),
(93, 'Ariel Tandoy', 0, 'Driver'),
(94, 'Ryan Tignero', 0, 'Shift Supervisor Trainee'),
(95, 'Elmer Torrijos', 0, 'Mechanical Maintenance Supervisor / Equipment & Parts Engr.'),
(96, 'Democrito Urnopia', 0, 'Plant Mechanic'),
(97, 'Jobelle Villarias', 0, 'Company Nurse'),
(98, 'Melinda Aquino', 0, 'Accounting Assistant/ Bookkeeper'),
(99, 'Irish Dawn Torres', 0, 'Site Admin Officer'),
(100, 'Vincent Jed Depasupil', 0, 'Auxiliary Operator'),
(101, 'William Soltes', 0, ''),
(105, 'TESTING', 3, 'sss'),
(107, 'trial', 0, 'test'),
(112, 'Accounting Department', NULL, NULL),
(113, 'Admin Department', NULL, NULL),
(114, 'IT Department', NULL, NULL),
(115, 'Silena Jomiller', 0, 'Admin Assistant'),
(117, 'Board Room', NULL, NULL),
(118, 'Carlos Antonio Leonardia', 0, 'Senior Project Engineer'),
(119, 'Liza Marie Tasic', 0, ''),
(120, 'Adrian Nemes', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `enduse`
--

CREATE TABLE IF NOT EXISTS `enduse` (
`enduse_id` int(11) NOT NULL,
  `enduse_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enduse`
--

INSERT INTO `enduse` (`enduse_id`, `enduse_name`) VALUES
(2, 'Test Enduse');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_specs` text,
  `brand_name` varchar(255) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `part_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=533 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_specs`, `brand_name`, `uom`, `part_no`) VALUES
(1, 'Paint', 'Aluminum, 1 gallon = 4 liters', 'Triton', NULL, '-'),
(2, 'Grinding Disc', '7 inches, (1 box = 10 pcs.)', 'Tyrolit', NULL, '-'),
(3, 'Welding Rod', '1/8 inch, 7018, (1 box = 20 kgs.)', 'Wipweld', NULL, ''),
(4, 'Welding Rod', '1/8 inch, 6011, (1 box = 20 kgs.)', 'Wipweld', NULL, ''),
(5, 'Welding Rod', '1/8 inch, 6013, (1 box = 20 kgs.)', 'Wipcord', NULL, ''),
(6, 'Tungsten', ' 2.4 Ø x 175 mm', 'Arco', NULL, '-'),
(7, 'Collet Body ', 'For 2.4 Ø', 'Arco', NULL, '-'),
(8, 'Collet Tube ', '(For 2.4 Ø)', 'Arco', NULL, '-'),
(9, 'Ceramic Cup', '#7', 'Arco', NULL, '-'),
(10, 'Ceramic Cup', '#8', 'Arco', NULL, '-'),
(11, 'Long Back Cap', '(Standard for 2.4 Ø)', 'Arco', NULL, '-'),
(12, 'Short Back -Cap', '(Standard for 2.4 Ø)', 'Arco', NULL, '-'),
(13, 'Hard Disc Drive (HDD)', 'Internal 3.5", 500 GB ', 'Seagate ', NULL, '-'),
(14, 'Plywood', 'Ordinary, 4 feet x 8 feet x 1/4 inch thick', '-', NULL, '-'),
(15, 'Argon', 'Refill', '-', NULL, '-'),
(16, 'Oxygen', 'Refill', '-', NULL, '-'),
(17, 'Acetylene', 'Refill', '-', NULL, '-'),
(18, 'Cup Brush ', '4", M14 Thread Size', '-', NULL, '-'),
(19, 'Paint, Off-White, Brand: Weber', 'Epoxy Enamel, Off-White', 'Weber', NULL, '-'),
(20, 'Epoxy Primer', 'Color: Gray ', 'Paralux', NULL, '-'),
(21, 'Tape', 'Rubber', 'Nitto ', NULL, '-'),
(22, 'Lacquer Thinner', '1 gal. = 4 liters', 'Lucky', NULL, '-'),
(23, 'Rust Converter', '1 gal. = 4 liters', 'Turco', NULL, '-'),
(24, 'Lamp', 'Spiral, 60 W, 230 V', 'GE', NULL, '-'),
(25, 'Utility Box', 'Depth Type, Heavy Metal ', '-', NULL, '-'),
(26, 'Butterfly Valve', '150 lbs Rating, Lever Operated, 6"', '-', NULL, '-'),
(27, 'Y-Strainer', '150 lbs Rating, Flange Type, Cast Iron, 8"', 'Ever', NULL, '-'),
(28, 'Gate Valve', '150 lbs, Flange Type, Rising Stem, Cast Iron 8"', 'Akita', NULL, '-'),
(29, 'Check Valve', '150 lbs, Flange Type, Cast Steel,  8"', 'Ever', NULL, '-'),
(30, 'Concentric Reducer', 'B.I., 4" Ø x 3" Ø', '-', NULL, '-'),
(31, 'Valve', 'Ball, 150 lbs rating, Lever Operated, Threaded Type, Brass, 1/2"', '-', NULL, '-'),
(32, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 8"', '-', NULL, '-'),
(33, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 6"', '-', NULL, '-'),
(34, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 2"', '-', NULL, '-'),
(35, 'Concentric Reducer', 'B. I., Seamless, Sched. 40, Buttweld End, 8 " X 5 "', '-', NULL, '-'),
(36, 'Concentric Reducer', 'B.I., Seamless, Sched. 40, Buttweld End, 6 " X 5 "', '-', NULL, '-'),
(37, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 5"', '-', NULL, '-'),
(38, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 3"', '-', NULL, '-'),
(39, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 2"', '-', NULL, '-'),
(40, 'Check Valve', '150 lbs rating, Flange Type, Cast Steel, 6"', '-', NULL, '-'),
(41, 'Gate Valve', '150 lbs, Flange Type, Rising Stem, Cast Iron, 4"', '-', NULL, '-'),
(42, 'Valve', 'Ball, 150 lbs rating, Lever Operated, Threaded Type, Brass, 1"', '-', NULL, '-'),
(43, 'Valve', 'Ball, SS304, 1/2" ', '-', NULL, '-'),
(44, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 4"', '-', NULL, '-'),
(45, 'Flange', 'Slip-on, Class 150 lbs, ANSI B16.5 1/16" Raised Faced, 1"', '-', NULL, '-'),
(46, 'Concentric Reducer', 'B. I., Seamless, Sched 40, Buttweld End, 8 " x 10 "', '-', NULL, '-'),
(47, 'Concentric Reducer', 'B. I., Seamless, Sched 40, Buttweld End, 8 " x 6 "', '-', NULL, '-'),
(48, 'Tape', 'Electrical; PVC; Black', 'Armak', NULL, '-'),
(49, 'Tie ', 'Cable; 8 mm x 450', '-', NULL, '-'),
(50, 'Tie', 'Cable, 4.6 mm x 350				', '-', NULL, '-'),
(51, 'Duplex Wire', '# 12', 'Philplex		', NULL, '-'),
(52, 'Duplex Female Outlet', '2 gang			', 'Eagle', NULL, '-'),
(53, 'Elbow', 'B.I., Long Radius, Seamless, Sched. 40, Buttweld end, 3 " Ø X 90°', '-', NULL, '-'),
(54, 'Gate Valve', '150 lbs, Socket Type, Rising Stem,  Forged Steel, 2"', '-', NULL, '-'),
(55, 'Gate Valve', '150 lbs., Socket Type, Rising Stem, Forged Steel, 1"', '-', NULL, '-'),
(56, 'Elbow', 'B. I., Long Radius, Seamless, Sched. 40, Buttweld end, 2" Ø x 90°', '-', NULL, '-'),
(57, 'Elbow', 'B. I., Long Radius, Seamless, Sched. 40, Buttweld End, 8" Ø x 90°', '-', NULL, '-'),
(58, 'Elbow ', 'B. I., Long Radius, Seamless, Sched. 40, Buttweld End, 6" Ø x 90°', '-', NULL, '-'),
(59, 'H Beam', '20 lbs, 6" x 6"', '-', NULL, '-'),
(60, 'H Beam', '15 lbs, 6" x 6"', '-', NULL, '-'),
(61, 'H Beam ', '25 lbs., 8" x 8"', '-', NULL, '-'),
(62, 'Expansion Bolt', '1/2 inch', '-', NULL, '-'),
(63, 'Paint Brush', '2 inches', 'Globe', NULL, '-'),
(64, 'Diamond Cutting Disc', '4 inches', 'Rosco', NULL, '-'),
(65, 'Pipe', 'B. I., 1 1/2 inches, Sch 20, Welded', '-', NULL, '-'),
(66, 'Pipe', 'B. I., Sched. 40, 8" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(67, 'Deformed Steel Bars', '12mm diameter x 20 feet', '-', NULL, '-'),
(68, 'Tie', 'Wire, #16', '-', NULL, '-'),
(71, 'Bolt', 'Hex Head, UNC, High Tensile with Nut ', '-', NULL, '-'),
(72, 'Bolt', 'Hex Head, UNC, High Tensile with Nut ', '-', NULL, '-'),
(73, 'Tarpaulin', 'Heavy Duty, Yellow and Green, Water Proof, Size: 8 meters x 4 meters', '-', NULL, '-'),
(74, 'Tarpaulin ', 'Heavy Duty, Yellow and Green, Water Proof, Size: 5 meters x 8 meters', '-', NULL, '-'),
(75, 'Pipe', 'B.I., Sched. 40, 5" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(76, 'Pipe', 'B.I., Sched. 40, 3" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(77, 'Deformed Steel Bars', '5/8 inch x 20 feet', '-', NULL, '-'),
(79, 'Deformed Steel Bars', '10 mm x 20 feet', '-', NULL, '-'),
(80, 'Deformed Steel Bars', '16 mm x 20 feet', '-', NULL, '-'),
(81, 'Bar', 'Angle, Mild Steel (MS), 2" x 2" x 1/4" (6 mm) thick x 20 feet long, A36', '-', NULL, '-'),
(82, 'Pipe', 'B.I., Sched. 40, 6" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(83, 'Pipe', 'B. I., Sched. 40, 10" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(84, 'Plain Plate', 'Mild Steel (MS), A36, 4'' W x 8'' L x 1/2" (6 mm) thick', '-', NULL, '-'),
(85, 'Sheet', 'Plain, Mild Steel (MS), A36, 4'' W x 8'' L x 3/4" (19 mm) thick', '-', NULL, '-'),
(86, 'Sheet', 'Plain, Mild Steel (MS), A36, 4'' W x 8'' L x 5/8" thick', '-', NULL, '-'),
(87, 'Adjustable Wrench', '10 inches, Heavy Duty, Drop Forged Steel', 'Erwin', NULL, '-'),
(88, 'Adjustable Wrench', '12 inches, Heavy Duty, Drop Forged Steel', 'Erwin', NULL, '-'),
(89, 'Paint', 'Aerosol, Color: Green, (400 cc)', '-', NULL, '-'),
(90, 'Paint', 'Aerosol, Color: Red, (400 cc)', '-', NULL, '-'),
(91, 'Paint', 'Aerosol, Color: Yellow, (400 cc)', '-', NULL, '-'),
(92, 'Bulb', 'LED, Daylight, 5 watts', 'Akari', NULL, '-'),
(93, 'Liquid Soap', 'All Purpose', 'Chemtrust', NULL, '-'),
(94, 'Blind Rivets', 'Aluminum, 1/8" diameter x 1/2" length, (1000 pcs. / box)', '-', NULL, '-'),
(95, 'Blind Rivets', 'Aluminum, 1/8" diameter x 3/4" length, (1000 pcs. / box)', '-', NULL, '-'),
(96, 'Bar', 'Angle, Mild Steel (MS), 1 1/2" x 1 1/2" x (5 mm) thick x 20 feet long, A36', '-', NULL, '-'),
(97, 'Bar', 'Angle, Mild Steel (MS), 1" x 1" x 1/8" (3 mm) thick x 20 feet long, A36', '-', NULL, '-'),
(98, 'Bar', 'Angle, Mild Steel (MS), 3" x 3" x 1/4" (6 mm) thick x 20 feet long, A36', '-', NULL, '-'),
(99, 'Angle Grinder', '4 inches, Model No. 9556 NB', 'Makita', NULL, '-'),
(100, 'Angle Grinder', '7 inches', 'Makita', NULL, '-'),
(101, 'Angle Grinder', '4 inches', 'Bosch', NULL, '-'),
(102, 'Angle Valve', '1/2" x 1/2" MPT, S/S', 'Creston', NULL, '-'),
(103, 'Aviation Snip', '-', 'Erwin', NULL, '-'),
(104, 'Elbow', 'B. I., Long Radius, Seamless, Sched. 40, Buttweld end, 1 1/2" Ø x 90°', '-', NULL, '-'),
(105, 'Elbow', 'B.I., Long Radius, Seamless, Sched. 40, Buttweld end, 4" Ø X 90°', '-', NULL, '-'),
(106, 'Pipe', 'B.I., Sched. 40, 1 1/2" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(107, 'Pipe', 'B.I., Sched. 40, 4" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(108, 'Pipe', 'B. I., Sched. 40, 2" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(109, 'Pipe', 'B.I., Sched. 40, 2 1/2" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(110, 'Baby Roller Refill', '4 inches', '-', NULL, '-'),
(111, 'Baby Roller Refill', '7 inches', '-', NULL, '-'),
(112, 'Baby Roller Refill', '9 inches', '-', NULL, '-'),
(113, 'Bearing', 'Ball ', '-', NULL, '6210'),
(114, 'Bearing', 'Ball ', '-', NULL, '6308'),
(115, 'Wire', 'Barbed; 1 roll = 130 meters', '-', NULL, '-'),
(116, 'Battery', '3SMF', 'Panasonic', NULL, '-'),
(117, 'Battery', '12 V, 15 Plates', 'Dyna Power', NULL, '-'),
(118, 'Battery', 'N50, MXS209338479', 'Motolite Excel', NULL, '-'),
(119, 'Brake Pad Kit', '-', 'Bendix', NULL, '-'),
(120, 'Padlock', 'Brass Body, 40 mm', '-', NULL, '-'),
(121, 'Break Master ', 'Assembly', '-', NULL, '-'),
(122, 'Purlins', 'C; 2 inches x 6 inches x 6 M, 1.4 mm thick', '-', NULL, '-'),
(123, 'Purlins', 'C; 2 inches x 3 inches x 6 M, 1.0 mm thick', '-', NULL, '-'),
(124, 'Common Wire Nails', '1 1/2 "', '-', NULL, '-'),
(125, 'Common Wire Nails', '2 1/2"', '-', NULL, '-'),
(126, 'Common Wire Nails', '4"', '-', NULL, '-'),
(127, 'Common Wire Nails', '1"', '-', NULL, '-'),
(128, 'Common Wire Nails', '2"', '-', NULL, '-'),
(129, 'Caustic Soda', 'Flakes, 98% concentration, 1 sack = 25 kgs.', '-', NULL, '-'),
(130, 'Tape', 'Caution; 1 roll = 300 meters', '-', NULL, '-'),
(131, 'Ceiling Board / Acoustic Board', '16 x 610 x 1120 mm', 'Armstrong ', NULL, '-'),
(132, 'Ceiling Lamp', 'Daylight, 20W, LED Bulb, Round, CL-032L / RND', 'Ikea', NULL, '-'),
(133, 'Receptacle', 'Ceiling Type, 3 inches', 'Sakura', NULL, '-'),
(134, 'Receptacle', 'Ceiling Type, 3 inches, Porcelain', 'Omni', NULL, '-'),
(135, 'Cement', 'Type 1', 'Portland', NULL, '-'),
(136, 'Ceramic Fiber Insulation Blanket', 'size: 25 mm thick x .6 m x 7.2 m, 96 kg./m³ ', '-', NULL, '-'),
(137, 'Chain Block', '1 ton', 'Vital', NULL, '-'),
(138, 'Chain Block', '3 tons', 'Vital', NULL, '-'),
(139, 'Chalkstone', '-', '-', NULL, '-'),
(140, 'Checkered Plate', 'Mild Steel (MS), 4 feet x 8 feet x 1/4" (6mm) thick', '-', NULL, '-'),
(141, 'Checkered Plate', 'Mild Steel (MS), 4 feet x 8 feet x 1/2" (12mm) thick', '-', NULL, '-'),
(142, 'Checkered Plate', 'Mild Steel (MS), 4 feet x 8 feet x 3/4" (19mm) thick', '-', NULL, '-'),
(143, 'Checkered Plate', 'Mild Steel (MS), 4 feet x 8 feet x 1" (25mm) inch thick', '-', NULL, '-'),
(144, 'Checkered Plate', 'Mild Steel (MS), 4 feet x 8 feet x 3mm thick', '-', NULL, '-'),
(145, 'Gloves', 'Chemical Resistant, Color: Black', '-', NULL, '-'),
(146, 'Chlorine', 'Granules, Concentration: 70%, (1 drum = 45 kgs.)', '-', NULL, '-'),
(147, 'Circuit Breaker', '100 Amps, Type: Plug-in', 'Koten', NULL, '-'),
(148, 'Circuit Breaker', '60 Amps, Type: Plug-in', 'Koten', NULL, '-'),
(149, 'Googles', 'Clear ', '-', NULL, '-'),
(150, 'Hose', 'Clear, 1/4" diameter', '-', NULL, '-'),
(151, 'Clutch Disc', 'Assembly', '-', NULL, '-'),
(152, 'Clutch Pressure Plate', '-', '-', NULL, '-'),
(153, 'Coco Lumber', '2 inches x 2 inches x 10 feet', '-', NULL, '-'),
(154, 'Coco Lumber', '2 inches x 2 inches x 8 feet', '-', NULL, '-'),
(155, 'Coco Lumber', '2 inches x 3 inches x 10 feet', '-', NULL, '-'),
(156, 'Coco Lumber', '2 inches x 4 inches x 10 feet', '-', NULL, '-'),
(157, 'Coco Lumber', '2 inches x 3 inches x 12 feet', '-', NULL, '-'),
(158, 'Good Lumber', 'S4S, 2 inches x 8 inches x 36 inches (Net Dimension)', '-', NULL, '-'),
(159, 'Mahogany Lumber', 'S4S, 1 inch x 2 inches x 8 feet,', '-', NULL, '-'),
(160, 'Breaker', 'TQD, 200 Amps, 3P, 240 V', 'GE', NULL, '-'),
(161, 'Main Breaker', '60 Amps, 6 Branches, Type: Plug-in', 'Koten', NULL, '-'),
(162, 'Combination Wrench', '8 mm-32 mm, Heavy Duty, Drop Forged Steel', '-', NULL, '-'),
(163, 'Pipe Wrench', '18 inches, Heavy Duty, Drop Forged Steel', '-', NULL, '-'),
(164, 'Pipe Wrench', '8 inches, Heavy Duty, Drop Forged Steel', '-', NULL, '-'),
(165, 'Tire Wrench', 'size; 38 inches', '-', NULL, '-'),
(166, 'Elbow', 'Unplasticized Polyvinyl Chloride (UPVC), 4 inches x 45° ', '-', NULL, '-'),
(167, 'Elbow', 'G. I., 1 1/2 inch x 90 degree', '-', NULL, '-'),
(168, 'Elbow', 'G. I.,  2 inches x 90 degree, Threaded', '-', NULL, '-'),
(169, 'Elbow', 'Unplasticized Polyvinyl Chloride (UPVC), 4 inches x 90° ', '-', NULL, '-'),
(170, 'Elbow', 'Unplasticized Polyvinyl Chloride (UPVC), 3 inches x 90° ', '-', NULL, '-'),
(171, 'Elbow', 'Unplasticized Polyvinyl Chloride (UPVC), 6 inches x 90° ', '-', NULL, '-'),
(172, 'Elbow', 'Unplasticized Polyvinyl Chloride (UPVC), 1/2 inch x 90° ', '-', NULL, '-'),
(206, 'Dust Masks', '-', '-', NULL, '-'),
(208, 'Safety Googles', '-', '-', NULL, '-'),
(209, 'Welding Googles', '-', '-', NULL, '-'),
(210, 'Welding Helmets', '-', '-', NULL, '-'),
(211, 'Gloves', 'For Safety ', '-', NULL, '-'),
(212, 'Safety Glass', '-', '-', NULL, '-'),
(213, 'Safety Boots', '-', '-', NULL, '-'),
(216, 'Emergency Light', '-', '-', NULL, '-'),
(217, 'Exit Lights', '-', '-', NULL, '-'),
(218, 'Chemical Hood', '-', '-', NULL, '-'),
(219, 'Safety Shoes', '-', '-', NULL, '-'),
(220, 'Air Supplied Sandblast Hood', '-', '-', NULL, '-'),
(221, 'Air Supplied Painting Hood', '-', '-', NULL, '-'),
(222, 'Disposable Coverall', '-', '-', NULL, '-'),
(223, 'Raincoat', '-', '-', NULL, '-'),
(224, 'Welding Apron', '-', '-', NULL, '-'),
(225, 'Welding Jacket', '-', '-', NULL, '-'),
(244, 'Compression Packings', '-', 'James Walker', NULL, '-'),
(245, 'Fabric Expansion Joint', '-', 'James Walker', NULL, '-'),
(246, 'Rotabolts', '-', 'James Walker', NULL, '-'),
(247, 'Nebar Cork Gaskets', '-', 'James Walker', NULL, '-'),
(248, 'O-rings & O-ring Kits', '-', 'James Walker', NULL, '-'),
(249, 'Flange Insulating Kit', '-', 'James Walker', NULL, '-'),
(251, 'Fire Pump', '-', 'Ebara', NULL, '-'),
(252, 'Jockey Pump', '-', 'Ebara', NULL, '-'),
(253, 'Sewage Pump', '-', 'Ebara', NULL, '-'),
(254, 'Submersible Pump & Motor', '-', 'Ebara', NULL, '-'),
(255, 'Centrifugal Pump', '-', 'Ebara', NULL, '-'),
(256, 'Vertical Multistage Pump', '-', 'Ebara', NULL, '-'),
(257, 'Horizontal Split Case', '-', 'Ebara', NULL, '-'),
(258, 'Volute Pump', '-', 'Ebara', NULL, '-'),
(259, 'Constant Pressure System', '-', 'Ebara', NULL, '-'),
(260, 'Custom Pump Commercial and Industrial', '-', 'Ebara', NULL, '-'),
(261, 'Programmable Logic Controllers (PLC)', '-', 'Omron', NULL, '-'),
(262, 'Total Solution for Automation & Industrial Control', '-', 'Omron', NULL, '-'),
(263, 'Smart Sensors', '-', 'Omron', NULL, '-'),
(264, 'Vision Sensor', '-', 'Omron', NULL, '-'),
(265, 'Photoelectric Sensors', '-', 'Omron', NULL, '-'),
(266, 'Proximity Sensors', '-', 'Omron', NULL, '-'),
(267, 'Photo Micro Sensors', '-', 'Omron', NULL, '-'),
(268, 'Rotary Encoders', '-', 'Omron', NULL, '-'),
(269, 'Liquid Leakage Detection Sensors', '-', 'Omron', NULL, '-'),
(270, 'Intelligent Signal Processors', '-', 'Omron', NULL, '-'),
(271, 'Digital Panel Meters', '-', 'Omron', NULL, '-'),
(272, 'Temperature Controllers', '-', 'Omron', NULL, '-'),
(273, 'Counters', '-', 'Omron', NULL, '-'),
(274, 'Timers', '-', 'Omron', NULL, '-'),
(275, 'Relays', '-', 'Omron', NULL, '-'),
(276, 'Solid State Relays', '-', 'Omron', NULL, '-'),
(277, 'Switches', '-', 'Omron', NULL, '-'),
(278, 'Safety Solutions', '-', 'Omron', NULL, '-'),
(279, 'Frequency Inverters', '-', 'Omron', NULL, '-'),
(280, 'Programmable Controllers', '-', 'Omron', NULL, '-'),
(281, 'Switching Power Supply', '-', 'Omron', NULL, '-'),
(282, 'Motors, Drives, Circuit Breakers, Contactors, Thermal Overload Relays, VFD and other Industrial Controls', '-', 'ABB, Baldor Aldor Automation Products', NULL, '-'),
(283, 'Resilient Seated Gate Valves, Check Valves, Air Valves, Butterfly Valves', '-', 'Duvalco, Dutch Valve Company', NULL, '-'),
(284, 'Valve Gate & Butterfly Valves, Strainer, Flexible Rubber Joint, Vibration Isolators, Actuators, Gauges, EUROMAGS Electromagnetic Flow Meters, Air Release Valves', '-', 'Tozen Valve / Gate / Strainer', NULL, '-'),
(285, 'Tape, Splicing & Terminating Tapes, Lugs & Connectors, Spring Connectors Scotchlok, Termination Kits, Cold Shrinkm5841, Sheath Seal Kits, breakout Boots, 3/C Phase, Rejacketing System, Push on & Cold Shrink, Dry & Wet Termination, Strain & Suspension, Cla', '-', '3M', NULL, '-'),
(286, 'Circulating Pumps, In line Pumps, Closed Coupled Pumps, Hot Water Pumps, Thermal Oil Pumps, Chemical Pumps, Process Pumps, Swimming Pool Pumps, Drainage & Waste Water Pumps, Submersible Pumps, Mixers/Agitators, Pumps, Solid Lden Pumps, Stainless Steel Pum', '-', 'KSB', NULL, '-'),
(287, 'Round, Square, Rectangular Tubes, Angle & Flat Bar, Flat Sheets-Plain, Mirror, Hairline & Checkered Finish, Pipes & Fittings, Valves, Flanges, Sphere & Stainless Welding Rods', 'Stainless Steel and Aluminum', '-', NULL, '-'),
(288, 'PVC Pipes & Fittings, uPVC Pressure Main Pipes, HDPE Pipe ISO Series or Commercial Grade, CI Gate Valves, Saddle Clamps, Water Meter, Flow Meter, Brass Ball Valve with Locking Wing. AVK Valves, CI Adaptor, Gibault, Tappe Tee, Split Tee, Saddle clamp, Ball', '-', '-', NULL, '-'),
(289, 'VICTUAULIC Fire Protection System-sprinkler, OS & Y Gate Valves, Alarm Check Valves, Flexible Couplings, Fittings, Valves, Fire Lock Automation Devices, FLOWCON Automatic Balancing Valve, Convoy Technology Fire Alarm System, VIKING Sprinkler Heads, SYSTEM', '-', '-', NULL, '-'),
(290, 'Adhesives, Threadlockers/Threadsealants, Wear Prevention, Belt Repair, Metal Rebuilding, Floor Repair/Grouting', '-', 'Henkel Loctite MRO', NULL, '-'),
(291, 'Spiral Wound Gaskets, Corrukamm, Metal Jacketed Gaskets, Kammprofile Gaskets, Ring Joint Gaskets, Stud Bolts and Nuts', '-', 'Lamons', NULL, '-'),
(292, 'CNAF Gasket Sheets, Comppression Packings, PTFE Based Produts, Pipe Espansion Joints, PTFE Lined Exp. Joints, Belt Type Expansion Joints', '-', 'Teadit', NULL, '-'),
(293, 'Klinger Sil CNAF, Klinger Top Chem, Klinger PSM/SLS, Kliner Top Graph, Klinger Sight Glass, Safetry Spary Shields', '-', 'Klinger', NULL, '-'),
(294, 'Compression Tube Fittings, Ball Valves, Stainless Steel Tubing', '-', 'Panam Engineers Ltd.', NULL, '-'),
(295, 'Alvex-PF, Maxsil, Insulation, Treo, Insulation', '-', 'Mcallister Mills', NULL, '-'),
(296, 'Plastics-Polyflou, Valqua, Kelburn Cyclone Separator, Kelburn SFC Key Interlocks, Copalite/Temptite, Permatex Gasket Maker, Rapp IT PIPE Repair Kit, Insulating Blankets, Fire/Welding Blankets, Felt-Ahuja, IGS Shim Industries, All pax Gasket Cutter', '-', '-', NULL, '-'),
(297, 'Water Treatment Chemicals, Waste Treatment Products, Preventive Maintenance Chemicals, Vapour Corrosion Inhibitor, Reverse Osmosis Maintenance Chemicals, Cleaners and Metal Treatment, Aerosol Products, Specialty Greases, Specialty Oils, Electrical Safety ', '-', '-', NULL, '-'),
(298, 'Reverse Osmosis Membranes, Cartridge Filters, Under Pressure Repair Kit, Live Natural Gas Leak Repair Kit', '-', 'CSM, ANOW, Filteck, Syntho-Glass Up, Trident-Seal', NULL, '-'),
(299, 'Concrete Hollow Block', '6 inches x 8 inches x 16 inches', '-', NULL, '-'),
(300, 'Crushed Stone / Gravel', '3/4"', '-', NULL, '-'),
(301, 'Crushed Stone / Gravel', '1"', '-', NULL, '-'),
(302, 'Mixing Sand', '-', '-', NULL, '-'),
(303, 'Nasal Cannula ', 'For Adult', 'Partners', NULL, '-'),
(304, 'Oxygen Mask', 'For Adult', 'Partners', NULL, '-'),
(305, 'Double Lighting Fixture with reflector', '240 watts, 220 V', 'Ecolum', NULL, '-'),
(306, 'Crimped Hose', '-', 'Sunflex', NULL, '-'),
(307, 'Clutch Disc', 'Assembly', '', NULL, ''),
(308, 'Gasket Cement', '-', 'US', NULL, '-'),
(309, 'Silicon Gasket Maker', '-', 'US', NULL, '-'),
(310, 'Treatment Oil', '-', 'Top', NULL, '-'),
(311, 'Downlight', 'light house only, ALPN 67', 'AKARI ', NULL, '-'),
(312, 'Durabox', '120 liters capacity, Transparent', 'Home Gallery', NULL, '-'),
(313, 'Durabox', '54 liters capacity, Transparent', 'Home Gallery', NULL, '-'),
(314, 'Fabric Shear', 'Heavy Duty', '-', NULL, '-'),
(315, 'Monitor Wall Mount Bracket', 'For 32 inches to 55 inches Monitor, NBC2-F, 0" Fixed, 100 x 100 - 600 x 400 mm,125 lbs (568kg), 29 mm from wall', '-', NULL, '-'),
(316, 'Rust inhibitor', '3.78 liters per gallon', 'LPS 3 (USA)', NULL, '-'),
(317, 'Smart Watch DVR ', '16 channel, 720P-1080P, Live Monitoring and Playback, P2P Connection with Mouse, Adapter and Remote', '-', NULL, '-'),
(318, 'Desktop Personal Computer', 'Core i3, 4GB RAM, 1TB Hard disk, 15.6 inches Monitor, with out OS, with Keyboard and with Mouse', '-', NULL, '-'),
(319, 'Generator Capacitor Discharge Ignition', '', '', NULL, ''),
(320, 'Tape', 'Teflon; 1/2"', '-', NULL, '-'),
(321, 'Tape', 'Teflon; 3/4"', '-', NULL, '-'),
(322, 'Sunbronze Glass ', '(8 x 15), 5mm thick, for wood panel door with installation', '-', NULL, '-'),
(323, 'Sliding Windows  ', 'Using Analok Frame on Sunbronze Glass with Complete Accessories with Installation, H: 48 inches x W: 48 inches SS', '-', NULL, '-'),
(324, 'Sand Paper ', 'Grit # 1000', '-', NULL, '-'),
(325, 'Sand Paper', 'Grit # 120', '-', NULL, '-'),
(326, 'Sand Paper', 'Grit # 250', '-', NULL, '-'),
(327, 'Sand Paper', 'Grit # 350', '-', NULL, '-'),
(328, 'Sand Paper', 'Grit # 600', '-', NULL, '-'),
(329, 'Cup Brush ', 'Twisted, 3 inches, M10 x 1.25', 'Powerhouse', NULL, '-'),
(330, 'Sodium Chloride (Industrial Salt)', 'Industrial Grade, Purity 99.5%, 1 bag = 50 kgs', '-', NULL, '-'),
(331, 'Elbow ', 'B. I., 90 degree x 3" Diameter', '-', NULL, '-'),
(332, 'Concrete Diamond Cutter', '4"', 'Makita', NULL, '-'),
(333, 'Concrete Neutralizer', '-', '-', NULL, '-'),
(334, 'Cutting Disc', '4"', 'Omega', NULL, '-'),
(335, 'Cutting Nozzle', '#1', '-', NULL, '-'),
(336, 'Electrode Holder ', '300 Amps', 'Jackson', NULL, '-'),
(337, 'Grinding Disc', '4"', 'Gold Elephant', NULL, '-'),
(338, 'Hammer Drill', '1/2 Capacity, Model No.: HP1640', 'Makita', NULL, '-'),
(339, 'Clamp', 'PVC; 3/4"', '-', NULL, '-'),
(340, 'Tip Cleaner', '-', '-', NULL, '-'),
(341, 'Tox with Screw', '1/4 inch x 1 1/2 inches', '-', NULL, '-'),
(342, 'Multi Use Product', 'Net Content 277 ML / 226 grams / 9.3 FL.OZ', 'WD - 40', NULL, '-'),
(343, 'Welding Cable', 'AWG 1/0', '-', NULL, '-'),
(344, 'Tire', 'Tubeless (205 x 65 x R15)', 'Good Year', NULL, '-'),
(345, 'Sakolin', '12 feet x 20 meters long ', '-', NULL, '-'),
(346, 'Tie', 'Cable; 4 x 150 mm', '', NULL, '-'),
(347, 'Cartridge Fuse', '5 amps', '-', NULL, '-'),
(348, 'Insulating Varnish', 'Spray Type, Color Red', 'Spanjaard', NULL, '-'),
(349, 'Terminal Lugs', 'AWG # 20, Pin Type', '-', NULL, '-'),
(350, 'Cutting Outfit', 'with 15 meters Hose, 2 x 750 Arrester', 'Victor', NULL, '-'),
(351, 'Paint', 'Enamel, Color: Black', 'Boysen', NULL, '-'),
(352, 'Paint', 'Enamel, Color: Green', 'Triton', NULL, '-'),
(353, 'Paint', 'Enamel, Color: Red', 'Triton', NULL, '-'),
(354, 'Paint', 'Enamel, Color: Royal Blue', 'Boysen', NULL, '-'),
(355, 'Paint', 'Epoxy Enamel, Color: Caterpillar Yellow', 'Island', NULL, '-'),
(356, 'Paint', 'Epoxy Enamel, Color: International Red', 'Island', NULL, '-'),
(357, 'Paint', 'Epoxy Enamel, Color:Jade Green', 'Island', NULL, '-'),
(358, 'Paint', 'Epoxy Enamel, Marine Blue', 'Island', NULL, '-'),
(359, 'Paint Thinner', '-', '-', NULL, '-'),
(360, 'Rust Converter', '1 gal = 4 liters', 'Island', NULL, '-'),
(361, 'Paint', 'Semi-Gloss Latex, Color:Smoke Gray', 'Titan', NULL, '-'),
(362, 'Wheel Barrow', '', 'Sunshine', NULL, ''),
(364, 'Bar', 'Angle, Mild Steel (MS), 1" x 1" x 1/4" (3 mm) thick x 20 feet long, A36', '-', NULL, '-'),
(365, 'Sheet', 'Corrugated, G.I., 0.9 m x 9 feet x 0.4 mm thick', '', NULL, ''),
(366, 'Purlins', 'C; 2 inches x 6 inches x 6 M, Gauge 16', '', NULL, ''),
(367, 'Cutting Tip', '# 1', 'Koike', NULL, '-'),
(368, 'Drill Bit', 'Metal, 1/8" diameter', '-', NULL, '-'),
(369, 'Flat Bar', 'Mild Steel, 3/16 inch x 1 inch x 20 feet length', '', NULL, ''),
(370, 'Flat Bar', 'Mild Steel, 1 inch x 1/4 inch x 20 feet length', '', NULL, ''),
(371, 'Flat Bar', 'Mild Steel, 1 1/2 inch x 5 mm x 20 feet length', '', NULL, ''),
(372, 'Flat Bar', 'Mild Steel, 3/16 inch x 25 mm x 20 feet length', '', NULL, ''),
(373, 'Flat Bar', 'Mild Steel, 1/4 inch x 2 inches x 20 feet length', '', NULL, ''),
(374, 'Flat Bar', 'Mild Steel, 1 inch x 4 mm x 20 feet length', '', NULL, ''),
(375, 'Pipe', 'B.I., Sched. 40, 2 1/2" diameter, Seamless, ASTM A53', '', NULL, ''),
(376, 'Pipe', 'G.I., Sched. 40, 1 1/2" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(377, 'Pipe', 'G.I., Sched. 40, 6" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(378, 'Sheet', 'Plain, G. I., Gauge # 18', '-', NULL, '-'),
(379, 'Pipe', 'G.I., Sched. 40, 2" diameter, Seamless, ASTM A53', '-', NULL, '-'),
(380, 'Grinding Disc', '4 inches', 'VY King', NULL, '-'),
(381, 'MANULI HYDRAULICS', 'Full range of Hydraulic hoses, fittings and adaptors. Hoses production machines such as crimping machines cutting and skiving machines', '', NULL, ''),
(382, 'REXROTH, BOSCH GROUP', 'Hydrostatic Units, Open Loop Pumps, Hydraulic Cylinder, Hydraulic Filters, Proportional Valves,Compact Hydraulics, Spare Parts', '', NULL, ''),
(383, 'EATON VICKERS', 'Hydraulic Piston Pumps, Hydraulic Vane Pumps, Pressure Control Valve, Flow Control Valves, Hydraulic Vane Motors, Direstional Valves, Rotating Group Kits, Cylinders, Accumulators,Torque Motors', '', NULL, ''),
(384, 'DANFOSS', 'Proportional Directional Valves, Hydrostatic Piston Pumps, Hydrostatic Piston Motors, Torque Motors, Steering Controls', '', NULL, ''),
(385, 'HYDRO CONTROL', 'Sectional Directional Valve, Monoblock Directional Valve, Remote Joystick Control', '', NULL, ''),
(386, 'STAUFF', 'Oil Tank Accessories, High Pressure Ball Valves, Pressure Test Kits, Pressure Gauges, Desiccant, Breathers, Hydraulic Filters, Pressure Gauges, Needle Valves, Suction Strainer, Pipe Clamps', '', NULL, ''),
(387, 'KPM, KAWASAKI PRECISION MACHINERY', 'Radial Piston Motor, Hydraulic Piston Pumps, Spare Parts', '', NULL, ''),
(388, 'SEAL MAKER', 'Standard & Custom Profile/Sizes, Large Diameter Seals, Hydraulic Seals, Pneumatic Seals, PTFE Seals, Rotary Seals', '', NULL, ''),
(389, 'GRACO', 'Automatic Lubrication Unit, Pneumatic Oil & Grease Pumps, Industrial Process Pumps, Oil Meter Injectors, Divider Valves, Hose Reels, Hydraclean Pressure Washers, Air Operated Double Diaphragm Pumps', '', NULL, ''),
(390, 'JSG INDUSTRIAL SYSTEM/MUSTER II FIRE SUPPRESSION SYSTEMS', 'Muster Fire II Suppression System, Flowmec Diesel Fuel Meters, GPI Turbine Meters, Trico Oil, Monitoring System, Flomax Nozzle & Receivers', '', NULL, ''),
(391, 'HY-LOK', 'Stainless Steel Pipes & Tubes, Ball Valves, Stainless Fittings & Tube Accessories', '', NULL, ''),
(392, 'ALFAGOMMA INDUSTRIAL HOSES', 'Industrial Hoses, Fuel, Water, Gas, General Fluids', '', NULL, ''),
(393, 'NACOL ACCUMULATOR', 'Accumulator Assembly, Accumulator Bladder Kits, Nitrogen Charging Kits', '', NULL, ''),
(394, 'POCLAIN HYDRAULICS', 'Low Speed High Torque Motors, Wheel Motors', '', NULL, ''),
(395, 'BREVINI GROUP', 'Helical Gearbox, Planetary Gearbox, Hydraulic Pumps, Hydraulic Motors', '', NULL, ''),
(396, 'REXPOWER', 'Directional Valves, Relief Valves, Check Valves, Gear Pumps, Cylinder, Manifold Blocks', '', NULL, ''),
(397, 'WHITE DRIVE PRODUCTS', 'Torque Motors, Flow Dividers, Seal Kits', '', NULL, ''),
(398, 'ASHUN', 'Hydraulic Seamless Tubes, Chrome-Plated Piston Rods, Hydraulic Cylinders', '', NULL, ''),
(399, 'BVA HYDRAULICS', 'High Pressure Jack Cyinders, High Pressure Hand Pumps, High Pressure Motorized Pumps, Shop Presses, Hydraulic Tools', '', NULL, ''),
(400, 'PACCAR WINCH DIVISION, BRADEN CARCO, GEARMATIC', 'Planetary Hydraulic Winch & Hoist', '', NULL, ''),
(401, 'ENGINEERING SOLUTIONS', 'Hydraulic System Design, Custom Power Unit Manufacture, Auto Lubrication System Design, Troubleshooting and Repairs, Scheduled Preventive Maintenance, Customized Cylinder Fabrication, on Site Installation, Specialized Training & Seminars, Rehab of Hydraulic Equipment, Turn Key Projects, Commisioning & Back-up Service, CNC Machined Seals & Packings Fabrication, Hydraulic Bench Testing, Lube Trucks and Lube Bays', '', NULL, ''),
(402, 'Plywood', 'Marine, 3/4" x 4 feet x 8 feet', '', NULL, ''),
(403, 'Molded Circuit Breaker', '250 amps, 3 pole, 18 kaic @ 480 VAC without Lugs, Model: EXC250F3250', 'Schneider', NULL, ''),
(404, 'Molded Circuit Breaker', '250 amps, 3 pole, 36 kaic @ 480 VAC without Lugs, Model: EXC250H3250', 'Schneider', NULL, ''),
(405, 'CirCuit Breaker', 'Easy Pact, EZCH 250A, 3 poles, 250 amps', 'Schneider', NULL, ''),
(406, 'MCCB Breaker', 'SE-EZC250H3250, 250 AT 250AF, 3 Pole', 'Schneider ', NULL, ''),
(407, 'MCCB Breaker', 'East Pack, EZC 250H, 3 poles, 250 amps', 'Brand: Schneider', NULL, ''),
(408, 'MCCB Breaker', '3VT2, 250A, 36 kaic, 3P', 'Brand: Siemens  ', NULL, ''),
(409, 'MCCB Breaker', '250A, 36 kaic, 3P, LS ABS403c ', '', NULL, ''),
(410, 'MCCB Molded Case Circuit Breaker', '3P 250 A, NSX Range LV4, Model: LV431621', 'Brand: Schneider', NULL, ''),
(411, 'MCCB Breaker', 'Easy pact, Model EZC250N, 3 pole, 250A, 220 VAC', 'Brand: Schneider', NULL, ''),
(412, 'Grinding Compound', 'Grade 6A; Grit:1000; Description; Micro-fine', 'Brand: Shamrock', NULL, ''),
(413, 'Radio', 'Model: SMP 468, VHF, Complete with the ff: Li-ion Rechargeable Battery, Belt Clip, Antenna, Desktop Charger, Handstrap & User''s Manual. NTC License. This includes: Permit to Purchase, Permit to Posses.', 'Brand: Motorola', NULL, ''),
(414, 'Garbage Bag', 'size: XXXL; (10pcs/pack)', 'Brand: Ebony', NULL, ''),
(415, 'Garbage Bag', 'size: Medium; (10pcs/pack)', 'Brand: Ebony', NULL, ''),
(416, 'Garbage Bag', 'size: XXXL; (15pcs/pack)', 'Brand: Ebony', NULL, ''),
(417, 'Garbage Bag', 'size: Medium; (30pcs/pack)', 'Brand: Ebony', NULL, ''),
(418, 'Garbage Bag', 'size: XXXL; (10pcs/pack)', 'Brand: CTX', NULL, ''),
(419, 'Garbage Bag', 'size: Medium; (100pcs/pack)', 'Brand: UNO', NULL, ''),
(420, 'Plastic Mulch', 'Width: 1.2 meters, Length: 400 meters', 'Brand: Macplas ', NULL, ''),
(421, 'Pipe', 'PVC; electrical; 1/2"; Color: Orange', 'Brand: Atlanta', NULL, ''),
(422, 'Pipe', 'Pvc; electrical; 1/2; Color: Orange', 'Brand: Neltex', NULL, ''),
(423, 'Pipe', 'PVC; electrical; 1/2; Color: Orange', 'Brand: Poly', NULL, ''),
(424, 'Junction Box ', 'PVC; Color: Orange with cover', 'Brand:Royu', NULL, ''),
(425, 'Junction Box', 'PVC; Color: Orange with cover', 'Brand: Poly ', NULL, ''),
(426, 'Junction Box', 'PVC; Color: Orange with cover', 'Brand: Atlanta', NULL, ''),
(427, 'Adapter', 'PVC;  1/2";  with Lock Nut', 'Brand:Neltex', NULL, ''),
(428, 'Adapter', 'PVC;  1/2";  with Lock Nut', 'Brand: Poly', NULL, ''),
(429, 'Adapter', 'PVC;  1/2";  with Lock Nut', 'Brand: Atlanta', NULL, ''),
(430, 'C-Clamp', 'PVC; 1/2"; with Concrete Nails', '', NULL, ''),
(431, 'C-Clamp', 'PVC; with Nails', 'Brand: Arrow,', NULL, ''),
(432, 'Screw', 'Metal; #6', '', NULL, ''),
(433, 'Tape', ' Electrical', 'Brand: 3M', NULL, ''),
(434, 'Cable', 'For Fire alarm and Smoke detector; #16/2c ', '', NULL, ''),
(435, 'Cable', 'For Fire alarm and Smoke detector; #16/2c ', 'Brand: Phelplex', NULL, ''),
(436, 'Cable', 'For Fire alarm and Smoke detector; #16/2c, 150 meters', 'Brand: Duraflex', NULL, ''),
(437, 'Call Point', 'Manual; 24V; conventional', 'Brand: Horing lih ', NULL, ''),
(438, 'Call Point', 'Manual; 24V; Conventional', 'Brand: Arrow', NULL, ''),
(439, 'Bell', 'Fire alarm;  24V; Conventional', 'Brand: Horing lih ', NULL, ''),
(440, 'Bell', 'Fire alarm;  24V; Conventional', 'Brand: Optimum', NULL, ''),
(441, 'Detector', 'For Smoke; Photo Electric; 24V; Conventional', 'Brand: Horing lih ', NULL, ''),
(442, 'Detector', 'For Smoke; Photo Electric; 24V; Conventional', 'Brand: Optimum', NULL, ''),
(443, 'Wire', 'Barbed, Size: XL, 100 meters per roll', '', NULL, ''),
(444, 'Wire', 'Barbed, Size: L, 75 meters per roll', '', NULL, ''),
(445, 'Wire', 'Barbed, Standard, 150 meters per roll, Approx. 21 kgs. ', '', NULL, ''),
(446, 'Tie', 'Nylon, 20 lbs.', '', NULL, ''),
(447, 'Tie', 'Nylon, 80 lbs.', '', NULL, ''),
(448, 'Tie', 'Nylon, 15 lbs.', '', NULL, ''),
(449, 'Purlins', 'C; 2 inches x 3 inches x 6 meters (20 feet), 1 mm thick', '', NULL, ''),
(450, 'Sheet', 'GI, Corrugated, 8 feet x 80 cm x Gauge 0.4', '', NULL, ''),
(451, 'Bar', 'Angle, Mild Steel (MS), 1 1/2" x 1 1/2" x 6 mm thick x 20 feet long, A36', '', NULL, ''),
(452, 'Gloves', 'Ma-ong', '', NULL, ''),
(453, 'Tape', 'Rubber', 'Brand: 3M', NULL, ''),
(454, 'Tie', 'Cable, 3.6 mm x 300 mm, 1 pack = 100 pcs.', 'Brand: Nylon Cable Tie', NULL, ''),
(455, 'Tie', 'Cable, 5 mm x 300 mm', 'Brand: Ereco', NULL, ''),
(456, 'Tie', 'Cable, 7.6 mm x 300 mm, 1 pack = 100 pcs.', 'Brand: Arrow', NULL, ''),
(457, 'Tie', 'Cable, 5 mm x 350 mm, 1 pack = 50 pcs.', 'Brand: Eagle', NULL, ''),
(458, 'Tie', 'Cable, 7.6mm x 370 mm, 1 pack = 100 pcs.', 'Brand: Arrow', NULL, ''),
(459, 'Tie', 'Cable, 9 mm x 430 mm, 1 pack = 100 pcs.', 'Brand: Arrow', NULL, ''),
(460, 'Soldering lead ', '60/40', 'Brand: Rubicon', NULL, ''),
(461, 'Circuit Breaker', 'Model: BW100EAG, 100A, 10 kaic, 440V', 'Brand: Fuji', NULL, ''),
(462, 'Circuit Breaker', 'Model: EZC100H, 100A, 20 kaic, 440V', 'Brand: Schneider', NULL, ''),
(463, 'Molded case Circuit Breaker', '100 amps, 3P, 20 kaic, 440V, industrial type complete with one side lugs, Model: EZC100H3100', 'Brand: Schneider ', NULL, ''),
(464, 'Circuit Breaker', 'Cat. # ABS-103C 100A, 3P, 37 kaic @ 415 / 460 VAC, Made in Korea', 'Brand: LSIS', NULL, ''),
(465, 'Motor Tester and Winding analyser', 'Model: ITIG II D 6KV. Advanced reports, 4-wire micro Ohm with High Voltage Lead-set, automatic IR and Step Voltage time series, all individual tests can be automatic and in one automatic sequence of tests, Partial Discharge. Includes: Certificate of Calibration, Certificate of Origin, One (1) day training on site', 'Brand: Electrom Instruments', NULL, ''),
(466, 'Winding Analyzer', 'ITIG II D6. New 6kV Model D . Fully automatic with microOhm low resistance, megohm (IR/PI), hipot/step voltage & surge tests. TRPro TRPro report software for windows PCs included. Electrom PDF Writer for reports included. Includes 1 power cord, 1 memory stick, and 2 case keys. Calibration Certificate Included', 'Brand: Electrom Instruments ', NULL, ''),
(467, 'Winding Analyzer', 'ITIG II D12, Calibration Certificate Included', 'Brand: Electrom Instruments ', NULL, ''),
(468, 'Tarpaulin', '12 feet x 15 feet', 'Brand: Maryuma', NULL, ''),
(469, 'Plastic (Zip bag)', 'Resealable, #8, 1 pack = 100 pcs.', '', NULL, ''),
(470, 'Air-driven hoist with chain ', '(125 kgs), Airmotor Oil, bottle 0.5L, PN: 17895-00-00, with Certificate of Origin and Legalization of documents', 'Brand: Chris - Marine', NULL, 'PN: 20246-00-00'),
(471, 'Injector Pop Tester', 'Model: S-60H, Diesel Fuel Injector Pop tester this nozzle testers are used to adjust the injector nozzle opening pressure, nozzle seat tightness and to carry out leakage tests & spray pattern atomization. Quality tester complete with lines pressure range 0-600 bar, 0-8000 psi.', 'Brand: Tasada Japan, Made in Taiwan', NULL, ''),
(472, 'Nozzle Injector Tester', 'For Diesel, 400 bar, This injector tester is a bench-mounted hand-operated pump. Cracking pressureL working of the nozzles by examining if holes are obstructed and if there is back leakage, and by checking the spray pattern. It can be used to check the tightness of the delivery pipe of the injection pump. It can also be used as a general purpose pressure tester on pipes, tanks, pump casting, etc. where high pressure is required.', 'Brand: Zeca, Italy', NULL, ''),
(473, 'Bearing', 'Ball, 16004-A', 'Brand: Koyo / Japan', NULL, ''),
(474, 'Bearing', 'Ball, 16004-A', 'Brand: FAG ', NULL, ''),
(475, 'O-ring', 'Nitrile rubber, Outside Diameter: 51 mm Inside Diameter: 47 mm Thickness: 2 mm (circular cross section)', 'Brand: Gapi-Italy', NULL, ''),
(476, 'O-ring', 'Nitrile rubber, Outside Diameter: 69 mm, Inside, Diameter: 65 mm, Thickness: 2 mm (circular cross section)', 'Brand: Gapi-Italy', NULL, ''),
(477, 'Gloves', 'For Medical, Latex, Disposable, 1 box = 100 pcs.', '', NULL, ''),
(478, 'Gloves', 'For Medical, Latex, size: 7 / 7.5 / 8, 1 box = 50 pairs', 'Brand: Mcbride', NULL, ''),
(479, 'Mask', 'Disposable, 1 box = 50 pcs.', '', NULL, ''),
(480, 'Mask', 'Disposable, 1 box = 50 pcs.', 'Brand: Mcbride', NULL, ''),
(481, 'Bandage', 'Triangular, White', '', NULL, ''),
(482, 'Bandage', 'Triangular', 'Brand: Mcbride', NULL, ''),
(483, 'Kit', 'For First Aid', '', NULL, ''),
(484, 'Kit', 'For First Aid', 'Brand: Handybag', NULL, ''),
(485, 'Thermal Overload Relay', '(12-18 A), LRE 21', 'Brand: Schneider', NULL, ''),
(486, 'Thermal Overload Relay', 'Easy pack, LRD 21, 12-18 amps', 'Brand: Schneider', NULL, ''),
(487, 'Thermal Overload Relay', 'Easy Pack TVS LRE 21, 12-18 amps', 'Brand: Schneider Electric', NULL, ''),
(488, 'Sealant', 'Silicone, RTV, Packaging: 85 grams/tube', 'Brand: Pitstop Red', NULL, ''),
(489, 'Sealant', 'Silicone, 6011030 Plumba Flue Red, Putty 310ml cartridge', 'Brand: Geocel', NULL, ''),
(490, 'Sealant', '736 Heat Resistant Sealant . 300ml per tube', 'Brand: Dow Corning', NULL, ''),
(491, 'Garbage Bag', 'Large, 1 pack = 10 pcs.', '', NULL, ''),
(492, 'Garbage Bag', 'XL, 30 inches x 37 inches, 1 pack = 10 pcs.', 'Brand: Bagman', NULL, ''),
(493, 'Garbage Bag', 'XL, 1 pack = 10 pcs.', '', NULL, ''),
(494, 'Relay ', 'For Auxiliary, with socket, MKS3P, 11 pins, 3PDT, Coil: 24 Vdc , Contacts rating: 10 A, 250 Vac, 10A, 30Vdc', 'Brand: Omron', NULL, ''),
(495, 'Relay', 'For Industrial, RCP1100324 VDC w/ ZPD11A socket, 24 VDC coil voltage, 10 amps switching current', 'Brand: Carlo Gavazzi', NULL, ''),
(496, 'Relay', 'For Industrial, RCP1100348 VDC w/ ZPD11A socket, 48 VDC coil voltage, 10 amps switching current', 'Brand: Carlo Gavazzi', NULL, ''),
(497, 'Relay', 'For Industrial, RCP11003115 VAC w/ ZPD11A socket, 24 VDC coil voltage, 10 amps switching current', 'Brand: Carlo Gavazzi', NULL, ''),
(498, 'Relay', 'For Auxiliary, with socket (MKS3P), 110 VDC, Contacts: 230 VAC, 10 amps', '', NULL, ''),
(499, 'Relay', '3PDT Non-Latching, Plug In, 120V AC Coil, 10A', 'Brand: Omron', NULL, 'Part no.: MKS3PI-5 AC120'),
(500, 'Relay Socket', '11 pin , 250V ac for use with various series, Part no.: PF113A-E', 'Brand: Omron', NULL, ''),
(501, 'O-ring ', 'Part No. K 11072', '', NULL, ''),
(502, 'O-ring', 'Part No. K 11073', '', NULL, ''),
(503, 'O-ring', 'Part No. K 11039', '', NULL, ''),
(504, 'O-ring', 'Part No. K 11040', '', NULL, ''),
(505, 'O-ring', 'Part NO. K 27051', '', NULL, ''),
(506, 'Fuel pressure line, complete', 'Part No. K 27250', '', NULL, ''),
(507, 'Valve guide', 'Part No. K 27112', '', NULL, ''),
(508, 'O-ring', 'Part No. K 27113', '', NULL, ''),
(509, 'O-ring', 'Part No. K 27122', '', NULL, ''),
(510, 'Relief valve, complete', 'Part No. K 27700', '', NULL, ''),
(511, 'Valve seating for Relief valve', 'Part No. K 27702', '', NULL, ''),
(512, 'Valve body for Relief valve', 'Part No. K 27703', '', NULL, ''),
(513, 'Nipple for 27016', 'Part No. K 27019', '', NULL, ''),
(514, 'Indicator valve complete ', 'Part No. K 27750', '', NULL, ''),
(515, 'Nozzle with needle', 'Part No. K 27240', '', NULL, ''),
(516, 'Pin', 'Part No. K 27202', '', NULL, ''),
(517, 'O-ring', 'Part No. K 27211', '', NULL, ''),
(518, 'O-ring', 'Part No. K 27212', '', NULL, ''),
(519, 'Fuel branch for fuel pressure line', 'Part No. K 27253', '', NULL, ''),
(520, 'Special bolt for K 28005', 'Part No. K 28034', '', NULL, ''),
(521, 'Special bolt for K 28005', 'Part No. K 28035', '', NULL, ''),
(522, 'Lock nut for K 28034', 'Part No. K 28037', '', NULL, ''),
(523, 'Lock nut for K 28035', 'Part No. K 28038', '', NULL, ''),
(524, 'Block ball cock for Fuel pipe', 'Part No. K 87165', '', NULL, ''),
(525, 'Fuel supply pipe DN20', 'Part No. K 87160', '', NULL, ''),
(526, 'Fuel discharge pipe DN20', 'Part No. K 87161', '', NULL, ''),
(527, 'SERTO screwed union, DN20, M36x33', 'Part No. K 87162', '', NULL, ''),
(528, 'SERTO connecting nut DN20', 'Part No. K 87163 ', '', NULL, ''),
(529, 'Bolt DN20', 'Part No. K 87166', '', NULL, ''),
(530, 'Thermal Overload Relay', 'Type: LRD35, Range: 30-38 amps', 'Brand: Schneider', NULL, ''),
(531, 'Thermal Overload Relay', 'Protection range: 30…40 amps, Model: LRD 3355', 'Brand: Schneider', NULL, ''),
(532, 'Thermal Overload Relay', 'LRD-340 (30-40 Amps)', 'Brand: Schneider', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'Structural Steel Products'),
(2, 'Pumps'),
(3, 'Electrical Supplies'),
(4, 'Tools'),
(5, 'Hardwares'),
(6, 'Generators'),
(7, 'Bolts and Nuts'),
(8, 'Safety Supplies'),
(9, 'Technical and Repair Services'),
(10, 'Bearings'),
(11, 'Computers'),
(12, 'Auto Parts'),
(13, 'Forwarder');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
`purpose_id` int(11) NOT NULL,
  `purpose_name` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`purpose_id`, `purpose_name`) VALUES
(2, 'Test Purpose');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_detail`
--

CREATE TABLE IF NOT EXISTS `rfq_detail` (
`rfq_detail_id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `offer` text,
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `recommended` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfq_detail`
--

INSERT INTO `rfq_detail` (`rfq_detail_id`, `rfq_id`, `item_id`, `offer`, `unit_price`, `recommended`) VALUES
(1, 1, 14, 'offer1', '10.00', 1),
(2, 1, 2, 'offer2', '20.00', 0),
(3, 1, 337, 'offer3', '30.00', 0),
(4, 1, 334, 'offer4', '40.00', 0),
(5, 2, 14, 'brand1', '20.00', 0),
(6, 2, 334, 'brand2', '30.00', 1),
(7, 2, 2, 'brand3', '40.00', 0),
(8, 2, 337, 'brand4', '50.00', 0),
(9, 3, 14, 'bo1', '30.00', 0),
(10, 3, 334, 'bo2', '40.00', 0),
(11, 3, 2, 'bo3', '50.00', 1),
(12, 4, 334, 'b1', '40.00', 0),
(13, 4, 337, 'b2', '50.00', 0),
(14, 5, 17, NULL, '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_head`
--

CREATE TABLE IF NOT EXISTS `rfq_head` (
`rfq_id` int(11) NOT NULL,
  `rfq_no` varchar(25) DEFAULT NULL,
  `rfq_date` varchar(20) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `due_date` varchar(20) DEFAULT NULL,
  `price_validity` varchar(20) DEFAULT NULL,
  `payment_terms` varchar(100) DEFAULT NULL,
  `delivery_date` varchar(20) DEFAULT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `supplier_tin` varchar(50) DEFAULT NULL,
  `vat` int(11) NOT NULL DEFAULT '0',
  `prepared_by` int(11) NOT NULL DEFAULT '0',
  `noted_by` int(11) NOT NULL DEFAULT '0',
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `saved` int(11) NOT NULL DEFAULT '0',
  `completed` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfq_head`
--

INSERT INTO `rfq_head` (`rfq_id`, `rfq_no`, `rfq_date`, `supplier_id`, `due_date`, `price_validity`, `payment_terms`, `delivery_date`, `warranty`, `supplier_tin`, `vat`, `prepared_by`, `noted_by`, `approved_by`, `saved`, `completed`, `create_date`) VALUES
(1, NULL, '2019-05-02 05:19:16', 21, '2019-05-15', '60days', 'COD', '2019-05-09', '1 year', '111-222-333', 0, 1, 79, 66, 1, 1, '2019-05-02 05:19:16'),
(2, NULL, '2019-05-02 05:20:52', 140, '2019-05-15', '10days', '60 days', '2019-05-14', '1 year', '22-33', 1, 1, 79, 66, 1, 1, '2019-05-02 05:20:52'),
(3, NULL, '2019-05-02 05:21:37', 270, '2019-05-15', '20 days', 'COD', '2019-05-15', '7 days', '1111111', 0, 1, 79, 66, 1, 1, '2019-05-02 05:21:37'),
(4, NULL, '2019-05-02 05:24:14', 40, '2019-05-15', '10days', '2 months', '2019-05-17', '1 year', '22222', 1, 1, 79, 66, 1, 1, '2019-05-02 05:24:14'),
(5, NULL, '2019-05-02 08:14:18', 365, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 0, '2019-05-02 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_series`
--

CREATE TABLE IF NOT EXISTS `rfq_series` (
`rfq_series_id` int(11) NOT NULL,
  `year_month` varchar(20) DEFAULT NULL,
  `series` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(3, 'pc/s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `usertype_id` int(11) unsigned NOT NULL DEFAULT '0',
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usertype_id`, `fullname`, `username`, `password`) VALUES
(1, 1, 'Jonah Benares', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
`usertype_id` int(11) NOT NULL,
  `usertype_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE IF NOT EXISTS `vendor_details` (
`vendordet_id` int(11) NOT NULL,
  `vendor_id` int(11) unsigned NOT NULL DEFAULT '0',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=447 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`vendordet_id`, `vendor_id`, `item_id`) VALUES
(1, 282, 244),
(2, 282, 245),
(3, 282, 246),
(4, 282, 247),
(5, 282, 248),
(6, 282, 249),
(7, 281, 251),
(8, 281, 252),
(9, 281, 253),
(10, 281, 256),
(11, 281, 257),
(12, 281, 258),
(13, 281, 255),
(14, 281, 259),
(15, 281, 260),
(16, 281, 254),
(17, 281, 262),
(18, 281, 261),
(19, 281, 263),
(20, 281, 264),
(21, 281, 265),
(22, 281, 266),
(23, 281, 267),
(24, 281, 268),
(25, 281, 269),
(26, 281, 270),
(27, 281, 271),
(28, 281, 272),
(29, 281, 273),
(30, 281, 274),
(31, 281, 275),
(32, 281, 276),
(33, 281, 277),
(34, 281, 278),
(35, 281, 279),
(36, 281, 280),
(37, 281, 281),
(38, 281, 282),
(39, 281, 283),
(40, 281, 284),
(41, 281, 285),
(42, 281, 286),
(43, 281, 287),
(44, 281, 288),
(45, 281, 289),
(46, 282, 290),
(47, 282, 291),
(48, 282, 292),
(49, 282, 293),
(50, 282, 294),
(51, 282, 295),
(52, 282, 296),
(53, 280, 297),
(54, 280, 298),
(55, 2, 302),
(56, 2, 300),
(57, 2, 301),
(58, 2, 299),
(59, 6, 302),
(60, 6, 300),
(61, 6, 301),
(62, 6, 299),
(63, 17, 302),
(64, 17, 300),
(65, 17, 301),
(66, 17, 299),
(67, 84, 302),
(68, 84, 300),
(69, 84, 301),
(70, 84, 299),
(71, 95, 302),
(72, 95, 300),
(73, 95, 301),
(74, 95, 299),
(75, 283, 303),
(76, 283, 304),
(77, 5, 305),
(78, 3, 117),
(79, 3, 306),
(80, 3, 307),
(81, 3, 308),
(82, 3, 309),
(83, 3, 310),
(84, 9, 132),
(85, 9, 311),
(86, 9, 312),
(87, 9, 313),
(88, 9, 314),
(89, 9, 315),
(90, 13, 316),
(91, 15, 129),
(92, 252, 87),
(93, 252, 88),
(94, 16, 318),
(95, 21, 319),
(96, 21, 320),
(97, 21, 321),
(98, 284, 322),
(99, 284, 323),
(100, 28, 324),
(101, 28, 325),
(102, 28, 326),
(103, 28, 327),
(104, 28, 328),
(105, 28, 329),
(106, 30, 330),
(107, 33, 119),
(108, 40, 53),
(109, 40, 110),
(110, 40, 95),
(111, 40, 131),
(112, 40, 332),
(113, 40, 333),
(114, 40, 334),
(115, 40, 335),
(116, 40, 336),
(117, 40, 337),
(118, 40, 338),
(119, 40, 63),
(120, 40, 339),
(121, 40, 342),
(122, 40, 343),
(123, 42, 344),
(124, 43, 345),
(125, 43, 73),
(126, 43, 74),
(127, 44, 146),
(128, 285, 346),
(129, 285, 347),
(130, 285, 348),
(131, 285, 24),
(132, 285, 349),
(133, 285, 25),
(134, 50, 130),
(135, 53, 343),
(136, 53, 336),
(137, 66, 350),
(138, 66, 100),
(139, 66, 99),
(140, 70, 351),
(141, 70, 352),
(142, 70, 354),
(143, 70, 353),
(144, 70, 355),
(145, 70, 356),
(146, 70, 357),
(147, 70, 358),
(148, 70, 359),
(149, 70, 360),
(150, 70, 361),
(151, 71, 124),
(152, 71, 125),
(153, 71, 126),
(154, 71, 362),
(155, 72, 106),
(156, 72, 107),
(157, 72, 76),
(158, 72, 108),
(159, 72, 96),
(160, 72, 81),
(161, 72, 364),
(162, 72, 67),
(163, 72, 77),
(164, 72, 79),
(165, 72, 80),
(166, 72, 366),
(167, 72, 122),
(168, 72, 123),
(169, 72, 365),
(170, 72, 140),
(171, 72, 141),
(172, 72, 142),
(173, 72, 143),
(174, 72, 144),
(175, 72, 367),
(176, 72, 368),
(177, 72, 369),
(178, 72, 370),
(179, 72, 373),
(180, 72, 372),
(181, 72, 374),
(182, 72, 371),
(183, 74, 369),
(184, 74, 370),
(185, 74, 371),
(186, 74, 372),
(187, 74, 373),
(188, 74, 374),
(189, 72, 378),
(190, 74, 378),
(191, 72, 68),
(192, 74, 68),
(193, 270, 68),
(194, 74, 65),
(195, 74, 66),
(196, 74, 75),
(197, 74, 76),
(198, 74, 82),
(199, 74, 83),
(200, 74, 106),
(201, 74, 107),
(202, 74, 108),
(203, 74, 375),
(204, 74, 376),
(205, 74, 377),
(206, 74, 379),
(207, 72, 66),
(208, 72, 75),
(209, 72, 82),
(210, 72, 83),
(211, 72, 376),
(212, 72, 377),
(213, 72, 379),
(214, 72, 380),
(215, 21, 14),
(216, 21, 402),
(217, 21, 2),
(218, 21, 337),
(219, 21, 334),
(220, 21, 335),
(221, 270, 14),
(222, 270, 402),
(223, 270, 334),
(224, 270, 2),
(225, 270, 380),
(226, 140, 14),
(227, 140, 402),
(228, 140, 334),
(229, 140, 2),
(230, 140, 337),
(231, 140, 124),
(232, 140, 125),
(233, 140, 126),
(234, 140, 128),
(235, 140, 206),
(236, 381, 403),
(237, 381, 404),
(238, 382, 405),
(239, 383, 406),
(240, 384, 407),
(241, 149, 408),
(242, 149, 409),
(243, 385, 410),
(244, 386, 411),
(245, 387, 412),
(246, 388, 412),
(247, 393, 413),
(248, 395, 414),
(249, 395, 415),
(250, 9, 416),
(251, 9, 417),
(252, 396, 418),
(253, 396, 419),
(254, 397, 420),
(255, 276, 422),
(256, 276, 424),
(257, 276, 427),
(258, 276, 430),
(259, 276, 433),
(260, 157, 423),
(261, 157, 425),
(262, 157, 428),
(263, 157, 431),
(264, 157, 432),
(265, 157, 433),
(266, 270, 421),
(267, 270, 426),
(268, 270, 429),
(269, 270, 430),
(270, 270, 433),
(271, 91, 434),
(272, 91, 437),
(273, 91, 439),
(274, 91, 441),
(275, 398, 435),
(276, 398, 437),
(277, 398, 439),
(278, 398, 441),
(279, 399, 436),
(280, 399, 438),
(281, 399, 440),
(282, 399, 442),
(283, 189, 434),
(284, 189, 437),
(285, 189, 439),
(286, 189, 441),
(287, 270, 443),
(288, 270, 444),
(289, 111, 445),
(290, 21, 115),
(291, 223, 446),
(292, 223, 447),
(293, 400, 448),
(294, 400, 446),
(295, 72, 450),
(296, 74, 123),
(297, 74, 450),
(298, 74, 451),
(299, 72, 451),
(300, 140, 452),
(301, 21, 452),
(302, 270, 452),
(303, 140, 21),
(304, 276, 453),
(305, 157, 453),
(306, 401, 454),
(307, 401, 457),
(308, 9, 455),
(309, 40, 456),
(310, 40, 458),
(311, 40, 459),
(312, 21, 460),
(313, 140, 460),
(314, 270, 460),
(315, 386, 461),
(316, 386, 462),
(317, 388, 461),
(318, 402, 463),
(319, 403, 464),
(320, 347, 465),
(321, 406, 466),
(322, 406, 467),
(323, 43, 468),
(324, 407, 468),
(325, 395, 469),
(326, 408, 469),
(327, 409, 470),
(328, 410, 471),
(329, 411, 472),
(330, 264, 473),
(331, 80, 474),
(332, 238, 475),
(333, 238, 476),
(334, 412, 477),
(335, 412, 479),
(336, 412, 481),
(337, 413, 478),
(338, 413, 480),
(339, 413, 482),
(340, 413, 484),
(341, 402, 485),
(342, 386, 486),
(343, 381, 486),
(344, 381, 485),
(345, 385, 486),
(346, 414, 488),
(347, 385, 489),
(348, 415, 490),
(349, 408, 491),
(350, 413, 492),
(351, 395, 491),
(352, 395, 493),
(353, 386, 494),
(354, 149, 495),
(355, 149, 496),
(356, 149, 497),
(357, 384, 498),
(358, 385, 500),
(359, 385, 499),
(360, 416, 517),
(361, 416, 518),
(362, 416, 501),
(363, 416, 502),
(364, 416, 503),
(365, 416, 504),
(366, 416, 505),
(367, 416, 508),
(368, 416, 509),
(369, 416, 506),
(370, 416, 507),
(371, 416, 510),
(372, 416, 511),
(373, 416, 512),
(374, 416, 513),
(375, 416, 514),
(376, 416, 515),
(377, 416, 516),
(378, 416, 519),
(379, 416, 520),
(380, 416, 521),
(381, 416, 522),
(382, 416, 523),
(383, 416, 524),
(384, 417, 517),
(385, 417, 518),
(386, 417, 501),
(387, 417, 502),
(388, 417, 503),
(389, 417, 504),
(390, 417, 505),
(391, 417, 508),
(392, 417, 509),
(393, 417, 506),
(394, 417, 507),
(395, 417, 510),
(396, 417, 513),
(397, 417, 514),
(398, 417, 515),
(399, 417, 516),
(400, 417, 519),
(401, 417, 520),
(402, 417, 521),
(403, 417, 522),
(404, 417, 523),
(405, 417, 524),
(406, 418, 517),
(407, 418, 518),
(408, 418, 501),
(409, 418, 502),
(410, 418, 503),
(411, 418, 504),
(412, 418, 505),
(413, 418, 508),
(414, 418, 509),
(415, 418, 506),
(416, 418, 507),
(417, 418, 510),
(418, 418, 511),
(419, 418, 512),
(420, 418, 513),
(421, 418, 514),
(422, 418, 515),
(423, 418, 516),
(424, 418, 519),
(425, 418, 520),
(426, 418, 521),
(427, 418, 522),
(428, 418, 523),
(429, 418, 524),
(430, 416, 525),
(431, 416, 526),
(432, 416, 528),
(433, 416, 527),
(434, 416, 529),
(435, 419, 525),
(436, 419, 526),
(437, 419, 528),
(438, 419, 527),
(439, 419, 529),
(440, 417, 525),
(441, 417, 526),
(442, 417, 528),
(443, 417, 527),
(444, 417, 529),
(445, 383, 530),
(446, 365, 17);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_head`
--

CREATE TABLE IF NOT EXISTS `vendor_head` (
`vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `product_services` text,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `notes` text,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_head`
--

INSERT INTO `vendor_head` (`vendor_id`, `vendor_name`, `product_services`, `category_id`, `address`, `phone_number`, `mobile_number`, `fax_number`, `email`, `terms`, `type`, `contact_person`, `notes`, `status`) VALUES
(1, '2GO Express', 'Forwarder', 0, 'BREDCO, Port 2, Reclamation Area, Brgy. 10, Bacolod City', '(034) 704-1339', '', '', '', '', '', '', '', 'Active'),
(2, '7RJ Brothers Sand & Gravel & Gen. Mdse.', 'Aggregates', 0, 'Circumferential Road, Brgy. Villamonte, Bacolod City', '(034)458-0190/213-2249', '', '', '', 'COD-Actual Quantity (delivered to site)', 'Manufacturer/Supplier', 'Ms. Tata', '', 'Active'),
(3, 'A.C. Parts Merchandising', '', 12, 'Gonzaga Street - Tifanny Bldg, Brgy. 24, Bacolod City', '(034) 433-2512', '', '', '', '', '', '', '', 'Active'),
(4, 'A-1 Gas Corporation', 'Industrial Gas', 0, 'Alijis, Bacolod City', '434-0708; 433-3637; 433-3638; 432-2079', '', '434-4670', 'negrosa_1gascorp@yahoo.com', 'COD', 'Manufacturer', 'Ms. Mary', '', 'Active'),
(5, 'AA Electrical Supply', 'Electrical Supplies', 3, 'C & L Bldg., Lacson-Luzuriaga St., BC', '435-3811; 432-3712; 708-1212', '', '434-7736', '', 'COD', 'COD', 'Rene ', '', 'Active'),
(6, 'Ablao Enterprises', 'Aggregates', 0, 'Bago City', '461-0376', '', '', '', 'COD ', '', '', '', 'Active'),
(7, 'Abomar Equipment Sales Corporation', '', 9, 'Lacson Ext., Cor. Goldenfield Sts. Liroville Subd, Singcang, Bacolod City', '433-1687; 432-3673', '0917-720-2153', '432-3673', 'sales@abomar.net', '', '', 'Danilo Palomar', '', 'Active'),
(9, 'Ace Hardware Philippines, Inc. - Bacolod Branch', 'Hardware, Bulbs, Tools', 0, 'SM Megamall Bldg., Cor. Edsa, Wakwak Greenhills NCR, 2nd District, Mandaluyong City, 1550', '(034) 468 0135', '', '', '', 'Cash, Check Payment subject for clearing', '', '', 'TIN Number: 200-035-311-000', 'Active'),
(10, 'Ace Rubber Manufacturing and Marketing Corp.', 'Rubber Fabricator', 0, 'Galo Street, Bacolod City', '(034)433-2145', '', '', '', 'COD', 'Manufacturer / Fabricator (Rubber)', 'Sir Ike/Ms. Carla', '', 'Active'),
(11, 'Agro Star Industrial Trading Corp', 'Welding Machine, Water Pumps', 2, 'Lacson-Luzuriaga, Bacolod City', '441-3624', '', '441-3624', '', '', '', 'Allan Lapastora/Jenny Mayuno', '', 'Active'),
(13, 'AIC Marketing', 'PRODUCTS 1. Kings Safety Products-Kings Safety Shoes 2. Testo Electronic Measurement 3. OMNI Lightning & Wiring Devices 4. Aircon, Auto Aircon & Refrigeration Spare parts, motor compressor  5. Installer, Dealer & Service Center of Koppel & Everest Brand Aircon 6. Installer of all type of Air Conditioing Unit 7. Danfoss Products 8. Pressure Gauges, Vacuum & Thermometers 9. Industrial, Repair and Maintenance Chemicals (LPS & Alchem Brand) 10. Safety Products: Hard Hat, Gloves, Welding Jackets and Apron, Masks & Respirators, Goggles, Visitors, Spectacles, Earplugs & Earmuff 11. Hydraulic and Industrial hoses and fittings 12. Roller chain, V-Belts, Sprockets and Conveyors, Table Yop Chain, Packings and Gaskets 13. Industrial and Laboratory Chemicals & Equipments 14. Complete Line of Fire Equipment', 4, 'Lopez Jaena St., Shopping, Bacolod City', '433-8921', '', '432-3416', '', 'COD', 'Distributor/Contractor', 'Ms. Irene', '', 'Active'),
(15, 'Almark Chemical Corporation', 'Chemicals', 0, 'Alijis Road, Bacolod City', '433-2864/432-3778', '', '', '', 'COD', '', 'Ms. April', '', 'Active'),
(16, 'AMT Computer Solutions', 'Computers, Printers', 11, 'Door #5, Prudentialife Building, Luzuriaga St, Bacolod City', '435-1207; 213-3607', '', '', 'Mark', '7 days', '7 days', 'Sir Mark Labanon', '', 'Active'),
(17, 'Andreas Hollow Blocks Enterprises', 'Aggregates', 0, 'Brgy. Bata, Bacolod City', '(034) 476-1207', '', '', '', '30 days', '', 'Ms. Jona', '', 'Active'),
(18, 'Ang Bata Hardware', '', 12, 'Carlos Hilado Highway, Bata, Bacolod City', '(034) 441-3141', '', '', '', '', '', '', '', 'Active'),
(19, 'Ang Design Studios , Inc.', 'Office Supplies', 0, 'Hilado Street, Barangay 17, Bacolod City', '(034) 435 0463', '', '435-0463', '', 'COD', '', '', '', 'Active'),
(20, 'Anilthone Motor Parts & General Merchandise', '', 12, 'Lacson Street - Bacolod North Terminal, Banago, Bacolod City', '(034) 434-7539', '', '', '', '', '', '', '', 'Active'),
(21, 'A-one Industrial Sales', 'Tools, Hardware, Generator Set, Welding Machine', 2, 'Lopez Jaena St., Libertad, Bacolod', '435-7383; 432-0652; 476-1127', '', '435-7383', '', '', 'Re-seller, Distributor', 'Ms. Miles', '', 'Active'),
(26, 'Ap Cargo Logistics Network Corporation', 'Forwarder', 0, 'Door 2, SYC Building, Lacson Street, Bacolod City', '(034) 432 3981', '', '', '', 'COD', '', '', '', 'Active'),
(27, 'Apollo Machine Shop', 'Metal Fabrications', 9, 'Lacson, Bacolod', '434-9512', '', '', '', '', 'Manufacturer', '', '', 'Active'),
(28, 'Arising Builders Hardware and Construction Supply', 'Hardware', 4, 'Door #5 Dona Angela Bldg., Gonzaga St., Bacolod City', '435-4302', '', '708-7070', '', 'COD', 'Distributor', 'Ms. Jovelyn Macahipay', '', 'Active'),
(30, 'Arvin International Marketing Inc.', 'Industrial Salt', 0, 'Bredco Port 4, Bacolod City', '434-7941', '', '', '', 'COD-Cash', 'Manufacturer', '', '', 'Active'),
(31, 'Asco Auto Supply', 'Auto Parts', 12, 'Gonzaga Street - Tiffany Building, Barangay 24, Bacolod City', '(034) 433-8963', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(32, 'Assistco Energy & Industrial Corp', '', 2, 'First Ave., Bagumbayan, Taguig, Metro Manila/ Park Lane Bldg, Tindalo-Hilado Sts., Shopping, Bacolod City', '435-1605', '', '', '', '', '', 'Rey Britanico', '', 'Active'),
(33, 'Atlantic Auto Parts', 'Auto Parts', 12, 'Gonzaga Street, Barangay 24, Bacolod City', '(034) 435-0136', '', '', '', 'COD', '', '', '', 'Active'),
(34, 'Atlas Industrial Hardware Inc', 'Hardware', 2, '56 Lacson St, Bacolod City', '433-8170; 476-4708; 476-8161', '', '435-0715', '', 'COD', '', '', '', 'Active'),
(38, 'Atom Chemical Company, Inc.', 'Chemicals', 0, 'Mansilingan, Bacolod City', '(034)707-0826', '', '446-1571', '', 'COD', '', '', '', 'Active'),
(39, 'Automation and Security Inc.', 'CCTV', 0, 'G/F Cineplex Building, Araneta St., Bacolod City', '(034) 704-1842 / 0977-732-5013', '', '', 'bacolod@asi.com.ph/ranelyn@asi.com.ph ', 'COD', '', 'Mr. Jazpe', '', 'Active'),
(40, 'Ava Construction Supply', 'Hardware', 5, 'Cor. Yakal-Lopez Jaena Sts., Capitol Shopping Center, Bacolod City', '434-1822; 433-0263; 435-1901; 708-3757', '', '434-6633', '', 'COD', 'COD', 'Sir Lito', '', 'Active'),
(41, 'B. Benedicto and Sons., Inc.', '', 0, '99-101 Plaridel St., Cebu City', '(032) 254-4624\n(032) 255-0941/256-2218', '', '255-2022', '', 'COD', 'Distributor', 'Fre Dagundon', '', 'Active'),
(42, 'B. A. Oriental Tire Supply', 'Tires', 0, 'Liroville Subdivision - D Cruz Drive, Taculing, Bacolod City', '(34)433 0780', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(43, 'Bacolod Canvas And Upholstery Supply', '', 0, 'Gonzaga St, Bacolod City', '(034) 434-3188', '', '', '', 'COD', '', '', '', 'Active'),
(44, 'Bacolod Chemical Supply', 'Chemicals', 0, 'Lopez Jaena, Bacolod City, Negros Occidental', '(34)433-3141', '', '', '', 'COD', '', '', '', 'Active'),
(45, 'Bacolod China Mart', 'Office Supplies', 0, '70 Lacson St., Bacolod City', '434-7293/434-7670', '', '435-0361', '', '', 'Distributor', 'Ms. Donna/Ms, Angela', '', 'Active'),
(46, 'Bacolod Erd Enterprises', '', 12, 'Rizal Street - Corner Lacson Street, Barangay 22, Bacolod City', '(034) 434-2272', '', '', '', '', '', '', '', 'Active'),
(47, 'Bacolod General Parts Marketing', '', 12, 'Lacson - Gonzaga Street, Barangay 24, Bacolod City', '(034) 433-1174', '', '', '', '', '', '', '', 'Active'),
(48, 'Bacolod Global Parts Sales', '', 12, 'Gonzaga Street - Jacman Building, Barangay 24, Bacolod City', '(034) 433-2091', '', '', '', '', '', '', '', 'Active'),
(49, 'KLS Electrical Supply', 'Electrical Supplies', 3, 'Locsin-Gonzaga Sts. , Bacolod City', '433-3807', '', '435-0243', '', '', 'Distributor', '', '', 'Active'),
(50, 'Bacolod Integral Trading', 'Hardware', 2, 'Luzuriaga St., Bacolod City', '433-8170', '', '435-0715', 'bacolodintegral@yahoo.com', 'COD', 'Distributor', 'Ms. Riza', '', 'Active'),
(53, 'Bacolod Kingston Hardware', '', 1, 'Gonzaga, Bacolod City', '435-4734-36', '', '433-7912', '', '', '', 'May Diamante', '', 'Active'),
(56, 'Bacolod Marjessie Trading', '', 12, 'Cuadra Street, Barangay 21, Bacolod City', '(034) 456-2519', '', '', '', '', '', '', '', 'Active'),
(57, 'Bacolod Marton Industrial Hardware Corp', '', 2, 'Bonifacio St., Bacolod City', '434-2236-37; 435-0637', '', '', '', '', '', '', '', 'Active'),
(61, 'Bacolod Mindanao Lumber and Plywood', '', 1, 'BLMPC Bldg., Lopez Jaena-Malaspina Sts., Bacolod', '433-3610-12', '', '433-3611;433-7485', '', '', '', '', '', 'Active'),
(66, 'Bacolod National Trading', 'Hardware', 2, 'Luzuriaga St., Bacolod City', '433-2959', '0920-969-4688', '', 'bacolodnationaltrading@yahoo.com', 'COD', 'Distributor', 'Ms. Rosemary', '', 'Active'),
(68, 'Bacolod Office Solutions Unlimited, Inc.', 'Office Supplies', 0, 'Lacson Street, Bacolod City', '433-9636', '', '433-7710', '', 'COD', 'Distributor', '', '', 'Active'),
(69, 'Bacolod Oxygen Acetylene Gas Corp.', 'Industrial Gas', 0, 'Brgy. Alijis, Bacolod City', '434-1780', '', '', '', 'COD', '', '', '', 'Active'),
(70, 'Bacolod Paint Marketing', 'Paints', 0, 'Luzuriaga St., Bacolod City', '(034) 433-2063', '', '703-2226/707-5075', '', 'COD', '', 'Ms. Angie', '', 'Active'),
(71, 'Republic Hardware', 'Hardware', 0, 'Bonifacio St., Bacolod City', '434-8317; 434-5125; 433-9941', '', '434-5125', 'republic_hardware@yahoo.com', 'COD', 'Distributor', 'Mr. Romie G. Li / Ms. Susan', '', 'Active'),
(72, 'Bacolod Steel Center Corporation', 'Structural Steels', 1, '#22 LM Bldg., Gonzaga St., Bacolod City', '435-2721-25', '', '434-5385', 'bscc.ph@gmail.com', 'COD', 'Distributor', 'Ms. Pinky', '', 'Active'),
(73, 'Bacolod Sure Computer, Inc.', 'Computers, Printers', 11, 'Capitol Shopping Center, Hilado St, Villamonte, Bacolod City', '(034) 435-1949', '(34) 435-1948', '435-1948', 'Ms. Vivian', 'COD', 'Distributor / Supplier', '', '', 'Active'),
(74, 'Bacolod Triumph Hardware', 'Structural Steels', 1, 'Narra Extension, Hervias Subd., Brgy. Villamonte, Bacolod City', '433-5551/55; 709-7777', '', '433-5550', '', '30 days PDC ', 'Distributor', 'Ms. Jingle', 'Credit Limit (Php 300,000.00)', 'Active'),
(75, 'Bacolod Truckers Parts Corporation', '', 12, 'Gonzaga Street - Ralph Building, Barangay 24, Bacolod City', '(034) 433-3335', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(76, 'Bacolod Visayan Lumber', '', 4, 'No. 2725 Lopez Jaena Bacolod', '433-8888', '', '433-1572', '', '', '', '', '', 'Active'),
(78, 'Bangkal Movers Merchandising', 'Lumber', 0, 'Bangga Cory, Taculing, Bacolod City', '09164080028 / 0943-200-3145 / 0922-210-3206', '', '', '', 'COD', '', 'Ms. Vanessa Calugdog', '', 'Active'),
(79, 'BCG Computers', 'Computers, Printers', 11, 'Lopez-Jaena St., Bacolod City', '(034) 434-2532/709-1888', '', '434-6603', '', 'COD', 'Distributor / Retailer', '', '', 'Active'),
(80, 'Bearing Center & Machinery Inc.', 'Bearings, PRODUCT LINES & SERVICES 1. Industrial Bearings - FAG, INA, TIMKEN, JIB, REXNORD, SEAL MASTER 2. Industrial Vee-Belts - Optibelt 3. Timing Belts - Optibelt 4. Pulleys with Taper Bushing 5. Pulleys with Plain Boring 6. Maintenance Tools for Bearings & Vee-Belts', 10, 'Door #8 G/F GGG Bldg., Hilado Ext. Capitol Shopping Center, Bacolod City', '433-8370', '', '433-8370', 'bcmi.mla@bearing.ph', 'COD', 'Distributor', '', '', 'Active'),
(82, 'Bens Machine Shop', '', 9, 'Lopez Jaena St., Bacolod City', '433-8990', '', '', '', '', '', '', '', 'Active'),
(83, 'Bright Summit Distribution Corporation', 'Electrical Supplies', 3, '2nd Flr. VCY Cntr. Bldg., Hilado Ext., Bacolod City', '(034) 433-7111', '', '', '', 'COD', 'Distributor', 'Mr. Carlos', '', 'Active'),
(84, 'B-Seg Sand And Gravel', 'Aggregates', 0, 'Prk. San Jose Circumferential Rd., Brgy. Alijis, Bacolod City', '(034) 457-1173 / 0929-6762-702', '', '', '', 'COD-Actual Quantity (delivered at site)', '', 'Mr. Benjie Garcia', '', 'Active'),
(85, 'C.Y. Ong Multi-Distributor', 'Tools', 4, 'Door #4 Asian Realty Bldg., Lacson St., Bacolod City', '434-4360; 709-1159', '', '434-4360', '', 'COD', 'Distributor', 'Ma''am Ping Doctora', '', 'Active'),
(87, 'Capitol Subdivision Inc.', '', 0, 'Homesite Subd., Bacolod City', '433-9190', '', '433-3877', '', 'COD', '', '', '', 'Active'),
(88, 'CAR-V Industrial Sales', 'SS304 CHECKERED PLATE SS304 Plates sizes 2mm to 24mm x 4 feet x 8 feet SS316/316L Plates sizes up to 24mm x 4 feet x 8 feet SS304 Sheets SS304 Angle Bars SS304/304L & SS316/316L Butt Weld Fittings SS Thread Fittings Seamless Boiler Tubes 20 feet x 24 feet Lengths (Germany) EVER CAST Iron Valves SS304 Valves Screw End & Flange End SS316 Valves Screw End & Flange End SS304/304L , 316/316L Flanges (Slip-on & Welding Neck) Sarco Thermodynamic Steam Traps Ichigo Butterfly Valves SS304 Disc, Cast Iron Body B. I. Seamless Pipes Sch 40 & Sch 80 Forged Cast Steel Welding Flanges ASTM-A105 (Italy) SLG Cast Steel Valves  ALL STATE MAINTENANCE WELDING ALLOYS & FLUXES Alloys rods hard facing electrodes Kadomax carbon electrodes Uni-air carbon electrode torch All-star welding rod redrying Portable Oven Purox welding & cutting equipment Nkk tin base & lead base Babbitt Weld-Tech Satellite #6 U. S. Welding Rods, Bare & Flux Coated  MISCELLANEOUS PRODUCTS 1. BEARINGS all kinds 2. Motolite Batteries  OIL & LUBRICANTS 1. OIL Seals, O-rings, & V-rings  FILTERS-INDUSTRIAL & AUTOMOTIVES 1. mechanical Seals 2. Circlips 3. Industrial Hoses-Plastic & Rubber  FITTINGS - Hydraulic, brass & pneumatic valves Automotive Wires & Cables Couplings Black Rubber Conveyors Chains & Sprockets Tubings: Stainless & Copper Industrial Belts-Light & Heavy Duty Bolts & Nuts Pulleys Welding Products Tiger bronze bushings Canvass Belts Beltings Fasteners & Lacings Roller Chains Cam Clutches Speed Reducers Car Accessories Non-Asbestos Compressed Gasket Asbestos, Packings & Gaskets Teflon, Packings, Sheets, tapes Solid Rods & bushing Calcium silicate industrial heat insulation  PNEUMATIC ELECTRIC TOOLS 1. SHINANO SP AIR Pneumatic Tools-Japan 2. DEWALT Power Tools-USA/Italy 3. HILTI Power Tools-Switzerland 4. CHAMPION ROTOBRUTE Magnetic Drill-USA  MISCELLANEOUS 1. DALO Metal Markers-USA 2. TEMPILSTIK Temperature Indicator-USA 3. DISC-LOCK Vibration-Proof Locknuts & Washers-USA 4. RINGFEDER Shaft/Hub Locking Devices 5. GREENLEE Electrical Insulation Tools-USA 6. 3M Scotch Electrical Products 7. DURAFLEX Wires and Cables 8. EAGLE Wiring Devices  9. NATIONAL Wiring Devices 10. APPLETON Explosion-proof Conduit Fittings 11. CROUSE HINDS Explosion-proof Conduit Fittings 12. WHEATLAND Conduit Pipes and Fittings 13. PHILIPS Industrial Lightning Fixtures 14. WESTINGHOUSE Circuit Breakers  OTHERS 1. STANLEY Work Tools 2. CRESCENT Tools 3. RIDGID Industrial Tools 4. PROTO Industrial Tools 5. UNIOR Tools 6. FACOM Fitting, production & Professional Maintenance Tools 7. HYDROTECH Hydraulic Pumps, Equipment, Tools, Accessories 8. KWIK METAL Steel Rein Forced Putty 9. ENERPACK industrial Tools and Hydraulic Systems  ALLIED PRODUCTS WELDING CONSUMABLES 1. ALL STATE WELDING PRODUCTS - Dealer 2. KOBE ELECTRODE - Japan 3. CHOSUN ELECTRODES - Korea 4. METRODE Welding Consumables - UK 5. LOCTITE - Adhesives & Sealant  WELDING ACCESSORIES 1. BURTON Flexible Welding Cable-Australia 2. Magnaflux Dye Penetrant - UK 3. DYNAFLUX Welding Chemicals-USA 4. PHOENIX Electrode and Flux Oven-USA 5. ARCAIR Goughing Torch and Rods-USA 6. WELDCRAFT Tig Torches and Accessories-USA 7. G. A. L. Welding Gauges-USA 8. JACKSON Arc Welding Accessories-USA 9. MAKO Arc Welding Accessories-USA  WELDING MACHINES 1. MILLER Diesel Driven Welding Machine-USA 2. THERMAL ARC Diesel Driven Welding Machine-USA 3. CIGWELD Tig/Mig Welding Machine-Australia 4. OTC Mig Welding Machine-Japan  GAS WELDING AND CUTTING EQUIPMENT 1. TANAKA Thermal Cutting Machine-Japan 2. WESCOL Flowmeter/Regulator & Flashback Arrestor-UK 3. THERMOID Gas Welding Twin Hoses-USA 4. CIGWELD Cutting Outfit-Australia  SAFETY PRODUCTS 1. RED WING Industrial Safety Shoes & Coveralls-USA 2. FIBER-METAL Safety Spectacles, Faceshield, Welding 3. Mask-USA 4. JACKSON safety Spectacles, Faceshiled, Welding Mask 5. Safety Helmet-USA 6. CIGWELD Safety Helmet, Welding Mask-Australia 7. WELDAS Welding Gloves & Garments-USA 8. ACES Safety Spectacles and Faceshield  SKF PRODUCTS 1. SPECIAL LUBRICANT      A. LUBCON OIL      B. LUBCON GREASE      C. SOLUTION GREASE such as Conductive Grease, Extreme Temp. 2. OTHER SOLUTION or CUSTOMIZED PRODUCTS      A. BEVER GEAR      B. SKF BEARING UNIT for IDLER ROLLER CONVEYORS used in      mining & cement      C. CUSTOMIZATION 3. TRAININGS BEARING MAINTENANCE & TECHNOLOGY AND APPLICATION SKF BM I - Basics of Bearing Technology SKF BM II - Bearing Lubrication and Maintenance Applications SKF III - Beyond Troubleshooting: A Study of Advanced Procedural Methodologies  CENTRALIZED LUBRICATION SYSTEMS (Lubrication Solutions) 1. Grease Lubrication Systems 2. Oil Lubrication Systems (Oil Air, Oil Circulation,..) 3. Chain Lubrication (Spray, Brush, Grease Injection,…) 4. Lubrication Systems for On and Off Road Vehicles, Heavy Equipments 5. Minimum Quantity Lubrication (MQL) 6. Wheel Flange Lubrication for Rail Vehicles 7. Dry Lubrication Systems (Initially for Plastic Table Top Chain)  POWER TRANSMISSION PRODUCTS 1. BELT DRIVES: V-BELTS, SYNCHRONOUS BELTS & PULLEYS (STATICALLY BALANCE @ 6.3G OR DNAMICALLY BALANCE @ 1G) 2. CHAIN DRIVES: ROLLER CHAIN & SPROCKETS COUPLINGS 3. PULLEYS 4. SPROCKETS 5. TAPER LOCK BUSHING TECHNOLOGY AND HUBS  CONDITION MONITORING 1. Machine Condition Advisor (MCA) 2. Machine Reliability Inspection System (MARLIN) Microlog Systems (Portable Instruments) 3. OLS (On Line Systems) Condition Monitoring & Protection Systems 4. Ultrasonic Gauge (Detect Pressure & Vacuum leaks including Compressed Air, Steam Trap Inspection, Electrical inspection & General  Mechanical Inspection) 5. Motor Analysis, Test for all types of electrical rotating machinery,  on-line monitoring of power circuit issues, overall motor health, load  & performance. 6. Electrical Condition Based Maintenance with dynamic and static  technoogy for electric rotating machinery diagnostics and performance  monitoring.  MAINTENANCE PRODUCTS 1. Bearing Mounting Tools 2. Bearing Dismounting Tools 3. Bearing Heaters 4. Lubricants 5. Lubricators 6. Laser Alignment Precision Tools for Shaft & Belts (Pulleys) 7. Other Maintenance Tools, Instruments 8. Bearing Analysis Kit 9. Basic Condition Monitoring Kit  LINEAR MOTION & PRECISION TECHNOLOGIES 1. Guiding Systems: Profile, Precision Rail Guides 2. Actuating Systems: Actuators 3. Driving Systems: Ball & Roller Screws, Linear Ball Bearings, Ground Ball Screw 4. Positioning Systems: Standard and Precision Slides, Telescopic pillars 5. Precision Systems: Bolt Tensioner  Coupling Systems 1. OK Coupling for long shafts 2. Super Grip Bolts  SEALS Oil Seals, Grease Seals, Speedi Sleeve, Large Diameter Seals, Split seals, Machined Seals  BEARINGS & UNITS 1. Ball & Roller Bearings, Plain Bearings, CARB Torroidal Bearing, Slewing Bearings 2. Bearing Housings & Accessories, Plummer & Pillow blocks, Y-Units Concentra 3. Engineering Products: Stainless Steel, Insocoat, Hybrid, NoWear, Sensorized, High Temperature, Seize Resistant, ICOS, Vibratory Applications  Sealed, Composite(Corrosion & Chemical Resistant), Solid Oil, Precision  Bearings (SNFA), Sealed Spherical Roller Bearings. 4. Large Size Bearings (Greater than 420mm Outside Diameter) 5. Energy Efficient Bearings', 7, 'No. 25 Valtram Bldg., Lacson-Gonzaga Sts., BC', '434-4661; 433-3835; 708-0210', '', '434-4660', 'sales@car-v.ph / niko@car-v.ph / tramcar@car-v.ph', 'COD', 'Distributor', '', '', 'Active'),
(91, 'Catcom Marketing', 'Fire Suppression System', 0, 'CATCOM Building, Door 1 L2-A3 Taculing Road, Bacolod City 6100', '(034) 434 8732', '', '704-2062', 'catcommktg_rico@yahoo.com', 'COD', '', 'Mr. Rico Catalogo', '', 'Active'),
(92, 'Cebu Bolt And Screw Sales', 'Bolts', 0, 'Door # 30-32 Gochan Bldg., Leon Kilat St., Cebu City', '(032) 412-3561', '', '254-0062', 'sales@cebubolt.com', 'Advance Payment', 'Distributor', 'Ma"am Evelyn', '', 'Active'),
(93, 'Central Gas Corporation (CEGASCO)', 'Industrial Gas, Oxygen Gas, Acetylene Gas, Argon Gas', 0, 'Km7 Natl South Rd., Brgy. Pahanocoy, Bacolod City', '444-0048 / 444-1113 / 444-1109 / 444-1996 / 444-1348 / 444-1344 / 444-1348', '', '', '', 'COD', 'Manufacturer', 'Ms. Mary', '', 'Active'),
(94, 'Cezar Machine Shop', '', 9, '92 Rizal Estanzuela St., Iloilo City', '(033) 337-1068', '', '', 'cmsiloilo@yahoo.com', '', '', '', '', 'Active'),
(95, 'Char Pete General Merchandise', 'Aggregates', 0, 'Bago City', '473-0300', '', '', '', 'COD', '', '', '', 'Active'),
(96, 'Cibba Paint Center, Inc.', 'Paints', 0, 'CEJ Building, Lopez-Jaena StreetBacolod City', '(034) 433 9291', '', '(034) 433 9291', '', 'COD', '', 'Mr. Philip', '', 'Active'),
(97, 'CLG Commercial Corporation', 'Hardware, Concrete Louvers', 0, 'Narra Ext., Bacolod City', '433-5329/707-0474 / 0909-260-4184 / 0925-828-1156', '', '', '', 'COD', 'Manufacturer / Distributor', 'Ms. Joan', '', 'Active'),
(98, 'ColorSteel System Corp.', '', 1, 'EAC Building - Pacific Home Depot,Lacson - Mandalagan St.,Brgy. Banago, Sta. Clara Subd.,Bacolod City, Bacolod', '(034) 421 2267', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(99, 'CORDS Industrial Sales and Services', '', 8, 'Dr. 1 SC Bldg. Libertad Ext., Mansilingan, Bacolod City', '446-2339', '', '707-8059', 'cords_indl@yahoo.com', '', '', '', '', 'Active'),
(100, 'Crismar Enterprises', 'Bolts, Hardware', 0, 'Cuadra St.,  Brgy. 21, Bacolod City', '434-1210', '', '707-0288', '', 'COD', 'Distributor', 'Mr. Noel', '', 'Active'),
(101, 'Cro-Magnon Corporation', 'HIGH DIELECTRIC INSULATING VARNISH  1. Electrical & Electronic Cleaners 2. Corrosion Inhibitors 3. Lubricants 4. Lubricating & Penetrating Oil 5. Penetratings Oils 6. Solvent Cleaners & Degreasers 7. Varnishes 8. Greases 9. Cutting Fluid', 0, '45 Gochuico Bldg., Mabini Cor. Rosario St., Bacolod City', '433-3221; 434-1416', '', '', 'cromag@eastern.com.ph', 'COD', 'Distributor', '', '', 'Active'),
(102, 'Crossworlds Trading and Engg Services', '', 9, 'Door 3 Zerrudo Commercial Complex (former Lopez Arcade) E. Lopez St. Jaro, Iloilo', '', '0932-883-5832; 0939-848-3037; 0917-779-1544', '', 'trading.crossworlds@yahoo.com', '', '', '', '', 'Active'),
(103, 'CS Sales', '', 12, 'LACSON STREET - CORNER LUZURIAGA STREET, BARANGAY 37, BACOLOD CITY', '(034) 434-5390', '', '', '', 'COD', '', '', '', 'Active'),
(104, 'Daks Auto Supply', '', 12, 'Lopues Mandalagan - Annex Building , Mandalagan, Bacolod City', '(0922)856 1591', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(105, 'DBO Auto Parts', 'Auto Parts', 12, 'Rizal Street - Door 5 Lizlop Building, Barangay 21, Bacolod City', '(034) 435-6304', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(106, 'Warlen Industrial Sales Corp. (Deka Sales)', 'Air Conditioning Units', 0, ' Lot 20 Block 2, Lacson Extension, Alijis Road, Bacolod City', '(034) 435-1573', '', '', 'deka.bcd.service@yahoo.com', 'COD', '', 'Ms. Theres/Ms. Manilyn', '', 'Active'),
(107, 'Philippine DFC Cargo Forwarding Corp.', 'Forwarder', 13, 'LGV Building, Molave Street, Capitol Shopping Center, Bacolod City', '(034) 709-1128', '', '', '', 'COD', 'Forwarder', 'Ms. Jonah', '', 'Active'),
(108, 'Direct Electrix Equipment Corporation', 'Electrical Supplies, Electrical Contractor, PRODUCT & SERVICES OFFERED: 1. Servicing of Motors.Transformer 2. Complete Test Instrument 3. Rewinding AC and DC Motors 4. Rewinding of Generator 5. Servicing of Substation 6. Electrical Design & Installation 7. Transmission Line  PRODUCT LINE 1. Load Break Switch 2. CT/PT 3. Switchgear 4. Transformer 5. Capacitor 6. Motor / Generator 7. Civil Works', 3, '#28 Ramylu Drive, Tangub, Bacolod City', '(034) 444-2023 / (032) 948-0221 / (032) 942-2871 / 0916-600-3244 / 0922-853-5384', '', '(034) 444-2023 / (032) 942-0017', 'directeletrixbacolod@gmail.com / jfrotea.sales@gmail.com / deec.salesinfo@directelectrix.com', 'COD', 'Distributor/Contractor', '', 'website: www.directelectrix.com', 'Active'),
(111, 'DMC Industrial Supplies', '', 0, 'Mabini St., Bacolod City', '(034) 441-3621 / 0943-283-1688', '', '', '', 'COD', 'Distributor', 'Mr. Marlon Chiu', '', 'Active'),
(112, 'DY Home Builders, Inc.', '', 3, 'No. 2725 Lopez Jaena Bacolod', '433-2222', '', '433-6696', '', '', '', '', '', 'Active'),
(113, 'Dynasty Management & Devt Corporation', '', 4, 'Araneta St., Brgy. Singcang, Bacolod City', '', '', '', '', '', '', '', '', 'Active'),
(115, 'Dynasty Paint Center', 'Paints', 0, 'Lopez-Jaena Taal Sts., Bacolod city', '(034) 435-4777', '', '435-4777', '', 'COD', 'Distributor', '', '', 'Active'),
(116, 'Dypo Auto Parts', 'Auto Parts', 12, 'Lacson Street - Door 2 Jr Building, Barangay 21, Bacolod City', '(034) 707-7055', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(117, 'Ebara Benguet, Inc', 'Pumps', 2, 'Door 3 Eusebio Arcade, Lacson St., Brgy 40, Bacolod City', '435-8162', '', '', 'pumpsales@ebaraphilippines.com', 'COD', '', '', '', 'Active'),
(118, 'Eduard Metal Industries', '', 9, '23rd St, Bacolod City', '432-0490', '', '', '', '', '', '', '', 'Active'),
(119, 'Enigma Technologies Inc.', 'Computers, Printers', 11, '2F Terra Dolce Center, Hilado Ext., Bacolod City', '(034) 435 8144', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(120, 'Far Eastern Hardware & Furniture Enterprises, Inc.', '', 2, '38 Quezon St. Iloilo City', '(033) 335-0891 ; 337-2654 ; 337-2222 ; 337-5321 ; 508-4196', '', '(033) 3382996', 'feh_qzn@yahoo.com', '', '', '', '', 'Active'),
(124, 'Federal Johnson Engineering Works', 'Fabrication', 9, 'Circumferential Rd, Bacolod City', '441-2110; 441-0306', '', '441-0356', '', 'COD', '', '', '', 'Active'),
(125, 'FGV Enterprises', '', 12, 'Luzuriaga Street - Door 1 Lucias Building, Barangay 25, Bacolod City', '(034) 433-2672', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(126, 'Fil-Power Group and Marketing Corp', 'Generators', 9, 'St Anthony Bldg Lopez Jaena St, Bacolod City', '434-7957; 707-8035', '', '', '', 'COD', '', '', '', 'Active'),
(127, 'Firbon Multi Sales', '', 12, 'Cuadra Street - Door 3 Rgr Building, Barangay 21, Bacolod City', '(0920)479 5919', '', '', '', 'COD', '', '', '', 'Active'),
(128, 'Francis New Tractor Parts', '', 12, 'Lacson - Cuadra Street, Barangay 24, Bacolod City', '(034) 433-1456', '', '', '', '', '', '', '', 'Active'),
(129, 'Fuman Industries Inc.', '', 8, 'Brgy. Banago, Bacolod City', '435-0973', '0916-943-1989', '', '', '', '', 'Mr. Greggy', '', 'Active'),
(130, 'Gini GTB Industrial Network Inc./AsiaPhil', 'SERVICES 1. Turn Key Electrical Works. 2. Supply and Installation of Substation and Distribution Equipment 3. Supply and Installation Of Transmission Lines 4. Supply and installation of Service Entrances 5. Supply and installation of Perimeter Lightnings 6. Supply and installation of Cable Trays and Feeder Lines 7. Installation of Power Generation Equipment 8. Other Electrical Contracting Services  PRODUCTS 1. Panel Board (for AC/DC Applications), Load Center, Enclosed Circuit Breaker,  2. Compact Distribution Lightning Panel 3. Compact Distribution Panel 4. Enclosed Circuit Breakers 5. 69kv Primary Metering 6. Primary Protection 7. Medium Voltage Solution (4 feeders and 2 feeders) 8. Power Transformer 9. Substation Solution 10. 69KV  Transmission Line 11. Consignment of Utility Products 12. Systems Loss Reduction Equipment (MV Capacitors, Preventive Maintenance)  POWER QUALITY SOLUTIONS SERVICES 1. Periodic & Preventive Maintenance Services 2. Measurement & Analysis 3. Energy Savings & System Efficiency 4. Retrofitting Works 5. Testing and Commissioning 6. Emergency Services  ASIAPHIL ELECTRIC PRODUCTS 1. BEA LVSG 2. CDLP Lightning Panel (100A-Below) 3. CDP-32 (Above 250A) 4. Series-4 (250A-125A) 5. Eazybox (ECB) 6. GINI LC (Load Center) 7. VRC Capacitor Units 8. ALDO (Capacitor Bank) 9. BEA MFT (MCC Fixed Type) 10. BEA MFW (MCC Fully Withdrawable) 11. ROBIE (MVSG 7 V Indoor/Outdoor) up to 36KV 12. UNA MVA (Unitized Assembly, 15KV) 13. UNIPAL (Unitized Panel) 14. Victory Seriers (Loose Controllers) 15. EazyTrans (Transfer Switches) -E-Trans-M (MTS) -E-Trans-A (ATS), A. TRANSMISSION EQUIPMENT    a.1. Deadend Transline    a.2. Suspension Tension Transline    a.3. Post Insulator Transline    a.4. Suspension Insulator Transline    a.5. Arrester w/ Corona Ring Transline B. DISTRIBUTION EQUIPMENT     b.1. Fuse Links     b.2. Fuse Cut-outs     b.3. Arresters     b.4. Pin-post Insulator     b.5. Distribution Insulator PDI     b.6. Sectionalizers     b.7.Single Phase Recloser     b.8. Three Phase Recloser     b.9. Overhead Disconnector     b.10. Load Break Switch C. SUBSTATION EQUIPMENT     c.1. Surge Arresters with counter     c.2. Dead Tank Breakers     c.3. Power Transformer     c.4. Protective Relays     c.5. Pad Connectors     c.6. HV Instrument Transformer     c.7. Live Tank Breakers     c.8. Battery and battery charger     c.9. XLPES Cables     c.10. Tee Connectors     c.11. HV Disconnector     c.12. SF6 Gas and filling services     c.13. Grounding Rods     c.14. MV Cable Termination Kit     c.15. Bus Supports D. CIRCUIT BREAKERS AND CONTROLS     d.1. 15-34kV Vacuum circuit breakers     d.2. 630A-6300A Air Circuit Breakers     d.3. 1A-1600A,10kA Minature Circuit Breakers     d.4. Overload Relays     d.5.Capacitor cells     d.6. 24kV-36kV Load Break Switch Indoor     d.7. 160A-1600A molded case circuit breakers     d.8. Contactors     d.9. Motor Protector     d.10. PF Controllers E. PANEL BUILDERS COMPONENTS     e.1. Digital Power Meters     e.2. Circuitbreaker control switch     e.3. Indoor Instrument Transformer     e.4. Shrinkable insulator tube     e.5. Post Insulators     e.6. Analog Meters     e.7. lock-out relay     e.8. copper busbars     e.9. insulating sheets     e.10. Terminal Blocks F.CONTRACTORS PRODUCTS     f.1. Exothemic Groundings     f.2. Hand-held Tools     f.3. Wildlife covers     f.4. HV Gloves and sleeves     f.5. Lineman''s wrenches     f.6. Hotline tools     f.7. Grounding Clusters     f.8. Hoists     f.9.Ropes     f.10. Load Lookers', 0, 'Room 209, 2nd Floor Boston Finance and Investment Corp Bldg., Bacolod City', '(034) 435-6269 / 0998-844-3078', '', '435-6269', 'raymundo.manalang@asiaphil.com', 'COD', 'Distributor/Contractor', 'Mr. Raymund Manalang', '', 'Active'),
(131, 'GLE Sand and Gravel Enterprises', '', 0, 'GSIS Corner Medel Road Tangub Highway, Bacolod City', '444-1644', '', '444-2591', '', 'COD', '', 'Maam Grace/Ms. Bolyn', '', 'Active'),
(132, 'Golden Gate Hardware', '', 4, 'Gonzaga-Lacson Sts., Bacolod City', '433-0995/434-6848', '', '', '', '7 days', '7 days', '', '', 'Active'),
(134, 'Golden Jal Marketing', '', 4, 'Cokins Bldg, Bacolod City', '433-0698; 435-0061', '', '', '', '', '', '', '', 'Active'),
(136, 'Golden Tower Commercial', '', 4, 'Dr. 3, Emerald Bldg., Lacson St., Bacolod City', '476-8043 fax', '', '435-12068', '', '', '', '', '', 'Active'),
(138, 'Good Hope Enterprises', '', 4, 'Bonifacio St., Bacolod City', '434-8588-89', '', '', '', 'COD', 'COD', '', '', 'Active'),
(140, 'Greenlane Hardware and Construction Supply Inc', '', 4, 'Lacson St., Bacolod City', '432-1119', '', '434-5948', '', '', '', 'Ronaldo Lao', '', 'Active'),
(142, 'Highway Tire Supply', '', 0, 'Lacson Street, Barangay 38, Bacolod City', '(034) 433-1257', '', '433-1257', '', 'COD', '', '', '', 'Active'),
(143, 'HRA Paint Center', '', 0, 'Dr # JQ Center Bldg., Lopez Jaena St., Bacolod City', '(034) 435-6684', '', '', '', 'COD', 'Distributor', 'Sir Allan', '', 'Active'),
(144, 'Ideal System Komponents', 'TOMOE 1. Ultimate Process Butterfly Valves 2. High Performance Butterfly Valves 3. Rotary Control Valves 4. Chemically Resistant Butterly Valves 5. Rubber Seated Valves 6. Ball Valves 7. Check Valves 8. Pneumatic Rotary Actuators 9. Electric Actuators 10. Manually Operated Actuators 11. Electro-Paneumatic Positioner  LUMEL 1. Analog Panel Meters 2. Digital Meters 3. Large Displays 4. Digital Controllers 5. Recorders 6. Power Controllers 7. Synchronizing Units 8. Measuring Transducers and Separators 9. Meters & analyzers of Power  10. Network Parameters 11. Distributed Control Systems (DCS) 12. PLC, I/O Modules & Converters 13. HMI 14. Transducers 15. Current Transformers 16. Shunts  SUMA 1. In-line Brix Monitoring (Radio Frequency) 2. Panscope 3. Nutsch Filter 4. Slurry Mil  ATAGO 1. In-line Brix Monitoring (Process Refractometer)  APISTE 1. Panel Cooling Units 2. Precision Airconditioning Units 3. Air Cooled Chillers  SAMSON 1. Control & On-Off Valves 2. Globe, Three-way and angle valves 3.  Steam Converters (Steam Conditioning Valve) 4. Diaphragm Actuators 5. Self-operated Regulator 6. Temperature Regulator 7. Pressure Regulator 8. Differential Pressure & Flow Regulator 9. Boiler Regulator, Steam Trap, Air Vent & Strainer 10. Control Valve / On-Off Valve Accessories 11. Positioner 12. Limit Switch 13. Solenoid Valve and Accessories  DANFOSS  1. Variable Frequency Drives Soft Starters  SENSETECH (HEAT-EDGE) 1. Thermocouples 2. Resistance Temperature Detector (RTD) 3. Heaters  PG POWER-GENEX 1. Electro-Pneumatic Positioner 2. Pneumatic to Pneumatic Positioner 3. Rotary Actuators 4. Limit Switch 5. Air Volume Booster 6. Lock-up Valve   NORGREN 1. Pressure Sensing 2. Actuators 3. Solenoid Valves 4. Air Filter/Regulator/Lubricator 5. Pneumatic Fitting/Tubing/Silencers  MASTER GAUGES 1. Pressure Gauges 2. Digital Pressure Gauges 3. Temperature Gauges  KROHNE 1. Flow Measurements 2. Magnetic Flowmeter 3. Variable Area Flowmeter 4. Ultrasonic Flowmeter 5. Vortex Flowmeter 6. Mass (Coriolis) Flowmeter 7. Differential Pressure Flowmeter 8. Pitot Tube Flowmeter 9. Level Measurements 10. Radar (FMCW & TDR) 11. Ultrasonic 12. Float 13. Displacer 14. Potentiometric 15. Level Switch 16. PH/ORP Measurements  HOFAMAT 1. Light Oil Burners 2. Heavy Oil Burners 3. Gas Burners  HUBA CONTROL 1. Pressure Transmitter 2. Diff. Pressure Transmitter 3. Electronic Pressure Switch 4. Mechanical Pressure Switch 5. Pressure Level Transmitter 6. Pressure Measuring Cell 7. Digital Indicator  CMO 1. Knife Gate Valve  PR ELECTRONICS 1. Thermocouple Converter 2. PT100 Converter 3. TC Converter Isolated 4. Isolated Repeater 5. Isolated Converter 6. Hart Transparent Repeater 7. Hart Transparent Driver 8. Temperature/mA Converter', 3, 'Room 4B/4F Villa Angela Metro Plaza Bldg., Araneta St. Bacolod City', '433-4224', '0917-300-6939', '708-6183', 'iskbacolod@yahoo.com; iskbacolod@gmail.com', '', '', 'Ms. Jessica A. Deang (Sales / App. Engineer) - 0998-9730-360 / 0915-952-1615', '', 'Active'),
(145, 'IEC Computers', '', 11, '(034) 433 9472/708-4322', '', '', '', 'Mr. Raymund', 'COD', 'COD', '', '', 'Active'),
(146, 'Iloilo City Hardware, Inc.', '', 3, '105-107 Iznart St., Iloilo City', '(033) 337-2952; 337-2969 ; 338-1455; 337-5553', '', '(033) 337-4621', '', '', '', '', '', 'Active'),
(148, 'Iloilo National Hardware', '', 1, '', '(033) 337-0449; 509-8985 ; 337-2841 ; 509-7785', '', '(033) 337-2841/335-8377', 'nationwide888@yahoo.com', '', '', 'Jimmy', '', 'Active'),
(149, 'Innovative Controls Incorporated (Bacolod Branch)', 'Service & product Provider of Motor Controls and Factory & Building Automation.  PARTNERS SIEMENS, YAVUZ PANO, CARLO GAVAZZI, PHOENIX CONTACT, STEGO, LOGSTRUP, ELECTRA, PICOBOX, SOLCON POWERED, NDC TECHNOLOGIES, BETA LASERMIKE, iO2 WATER  PRODUCTS  1. SIEMENS Programmable Logic Controllers (PLC), Human Machine Interface (HMI), Variable Frequency Drives (VFD), Soft Starters, Control Gears, Circuit Breakers  2. CARLO GAVAZZI Energy Management Meters Software & Systems, Safety Devices, Dupline Field Installation Bus, Monitoring Relays, Timers, Panel Meters, PID Controllers & Counters, Solid State & Electromechanical Relays, Inductive, Capacitive, Conductive, Ultrasonic Sensors  3. YAVUZ PANO Free  Standing System Panels (FSS), Wall Mounted Enclosures (WMS), Outdoor Type Enclosures (HFSS), Console Panels, Polycarbonate Boxes & Enclosures, 19 inches Rack Cabinets  4. STEGO Filter Fans Available From 21m3/h to 550m3/h, IP54 Outdoor Filter Fans, IP55 Roof Filter Fans, Enclosure Lamps, Thermostat & Hygrostats, Airflow Monitor, Heaters  5. PHOENIX CONTACT Relay & Optocoupler Interfaces, Varioface System Cabling for Siemens, Allen-Bradley, Mitsubishi, MODICON, & Mitsubishi PLCs, Power Supplies (for Universal Use & Ex-proof for Zone 2), Signal Conditioners, Transducers, Signal Converters, Serial Interfaces (Wireless Signal Transmission), Industrial Modem, RS-232 & RS-485-Bluetooth Converter  6. SOLCON Low Voltage Soft Starters, Medium Voltage Soft Starters up to 48MW  7. LOGSTRUP Modular Type-Tested Motor Control Centers, Type-Tested Switchgears, Type-Tested Panels, Customized Enclosures  8. PICOBOX Environmental Monitoring System, Facility Monitoring Server  9. ELEKTRA Control Transformers, Medium Voltage Transformers, Isolation Transformers, Medical Transformers, High Frequency Transformers, Reactors, Filters  10. BETA LASERMIKE Precision Measurement & Control Solutions  11. i20 WATER Smart Pressure Management  SERVICES AND SOLUTIONS 1. AUTOMATION SOLUTIONS 2. SCADA SYSTEMS 3. WIRELESS TELEMETRY 4. POWER MANAGEMENT SOLUTIONS 5. DESIGN & ASSEMBLY OF TYPE-TESTED MCC''s & SWITCHGEARS 6. ENERGY SAVING SYSTEMS', 0, 'Rm. 1-10 JDI Bldg., Galo St., Bacolod City', '(034) 708-1727 / 0908-8162189', '', '(034) 708-1727', 'dianne.villareal@innovativecontrols.com.ph', 'COD', 'Distributor', 'Ms. Dianne Villareal - 0908-816-2189', 'website: www.innovativecontrols.com.ph', 'Active'),
(150, 'Inovadis, Inc.', '', 4, 'Rizal St, Brgy 22, Bacolod City', '435-4634-35', '', '', '', '', '', '', '', 'Active'),
(152, 'Integrated Power and Control Provider, Inc.', 'PRODUCTS 1. WOODWARD; Governors, Actuators, Engine Controllers and Power Management                                Gas and steam turbine products (retrofit) 2. L & S Hydroelectric Products & Services (Retrofit) 3. GENERATOR: Exciters, AVR''s, Meterings, Protective Relays, Synchronizers, ATs 4. ABB Unitrol 1000 5. Engine parts, filters, accessories, preventive maintenance  SERVICES 1. Service, repair & overhaul of woodward governors and diesel engines. 2. Retrofit/Upgrade of governors, exciters and switchboard for diesel engines, steam, gas & hydro turbines 3. Preventive Maintenance Program for Diesel Gensets 4. On-site Installation and Field Services for Generator-Prime Mover Controls. 5. Integration of Controls to Synchronizing Switchgear', 9, 'Unit #5 East Plaza Commercial Bldg, Suntal Phase II, Circumferential Rd., Brgy Taculing, BC', '446-7612', '', '', 'ipowerbacolod@hotmail.com', '15 days PDC', 'Distributor', 'Mr. Voltaire Piccio', '', 'Active'),
(153, 'Intrax Industrial Sales/ U2 Machine Shop', '', 8, 'Lot 1 Blk 4 Along Murcia Rd, Hermelinda Homes, Mansilingan, BC', '446-3268', '0917-5475996; 0922-885-8483', '708-1195', 'intraxindustrial@yahoo.com; u2machineshop@yahoo.com', '', '', 'Ronces "Bong" Ababao', '', 'Active'),
(155, 'ISO Industrial Sales', '', 7, 'Luzuriaga St., Bacolod City', '432-3007', '0917-301-3007', '432-3440', 'iso_boltsnuts@yahoo.com.ph', '', '', '', '', 'Active'),
(156, 'J. T. Oil Philippines', '', 0, 'Bacolod City', '(034) 435-2666', '', '', '', 'COD', '', '', '', 'Active'),
(157, 'Jas''t Marketing Co.', '', 3, '#6 GGG Bldg., Capitol Shopping, Bacolod City', '434-0043', '', '434-6789', '', '30 days', '30 days', 'Samuel Takahara/ Regina Lopez', '', 'Active'),
(158, 'Johnson Parts Center & General Merchandise', '', 12, '6th Street Lacson - Gensoli Building, Barangay 24, Bacolod City', '(034) 433-5708', '', '', '', '', '', '', '', 'Active'),
(159, 'Jojo 4 Wheel Parts Supply', '', 12, 'Gonzaga Street - Door 1 Suntal Invst Building, Barangay 24, Bacolod City', '(034) 435-0626', '', '', '', '', '', '', '', 'Active'),
(160, 'KARL-GELSON INDUSTRIAL SALES', 'Structural Steels, Gate Valves, Check Valves, Y-Strainer, Elbows', 0, 'Araneta St., Bacolod City', '432-6318', '', '432-6318', 'kgsbacolod.rizza@yahoo.com', 'COD', '', '', '', 'Active'),
(161, 'Kemras Industrial Supply', '', 0, 'Blk. 5, Lot 11 NHA ACCO Housing, Circumferential Road, Brgy. Alijis, Bacolod City', '(034) 446-3162 / 0906-1464-064 / 0936-927-9953', '', '446-3162', 'wilfredo.fardon@kemrasindustrialsupply.com', '30 days', '', 'Mr. Alden Erasmo/Ms. Maria Fatima Pillado', '', 'Active'),
(162, 'KLP Easy Electrical', '', 3, 'Libertad extension, 6100 Bacolod City, Negros Occidental, Philippines', '', '', '', '', '', '', '', '', 'Active'),
(164, 'Kuntel Construction', '', 0, 'Rooms 3-6, 2nd Floor, Villa Angela Arcade, Burgos Extension, Bacolod City', '434-7866', '', '434-7866', '', 'COD', '', 'Mr. Joseph Yanson', '', 'Active'),
(165, 'Leeleng Commercial, Inc.', '', 3, 'Bacolod City', '446-1084', '', '', 'leeleng_bacolod@yahoo.com', '', '', '', '', 'Active'),
(166, 'Liberty First Enterprises', '', 4, 'T. Gensoli Bldg., Lacson St., Bacolod City', '435-1530; 435-0533', '', '433-1492', '', '', '', 'Ging-ging', '', 'Active'),
(168, 'Linde Corporation', '', 0, 'Bago City', '213-4596/213-4594', '', '', '', 'COD', '', '', '', 'Active'),
(169, 'Linton Incorporated', '', 1, 'For Additional Lightning in Powerhouse DG Area', '(02) 733-8800 ; 733-8810 ; 734-1059 ; 733-8817', '', '(02) 733-0493 / 733-0615', 'linton_incorporated@yahoo.com', '', '', '', '', 'Active'),
(170, 'LMS Electrical Supply', '', 0, 'Gonzaga Street, Bacolod City', '435-0424/434 8423', '', '435-0863', '', 'COD', '', '', '', 'Active'),
(171, 'Loc-Seal Industrial Corporation', 'AEG POWERTOOLS 1. Rotary and Percussion Drills 2. Screwdriver 3. Magnetic Drill & Stand 4. Rotary/Combination Hammers 5. Chipping/Demolition Hammer 6. Angle Grinders 7. Die/Straight Grinders 8. Polishers 9. Cut-off Machine 10. Mini Reciprocating Saw 11. Jig Saws 12. Circular Saws 13. Router 14. Laminate Trimmer 15. Blower/Hot Airgun 16. Random/Orbit Sander 17. Planer 18. Belt Sander 19. Cordless Jigsaw 20. Cordless Drills & Drivers 21. Cordless Rotary Hammer 22. Screwdriver 23. Cordless Circular Saw 24. Cordless Reprocating Saw 25. Cordless Reprocating Saw Kit 26. Flourescent Light 27. Flashlight 28. Batteries & Charger 29. Wet & Dry Dust Extractor 30. Arc Welding Machines 31. Welding Cutting Outfit 32. Mig Transformer Welding Machines 33. Tig Inverter Welding 34. Plasma Cutters 35. Mig Welding Machines 36. DC Submerge Arc Welding 37. AC/DC Tig Inverter 38. DC Tig Arc Inverter 39. DC Tig Inverter with Pulse 40. DC Arc Weldig Machine 41. Multi Purpose Machine 42. Spot Welding 43. Battery Chargers 44. Drill Press 45. Cut-off Machine 46. Drill Bits; Wood Boring Bit, Cobalt Drill Bit, Reduced Shank Drill Bit, SDS Plus, Chisel 47. Router Bits; Router Bit Set 48. Disc, Blades & Wire Wheel Brush; Circular Saw Blade, Diamond Blade, Circular Brush, Cutting Disc, Flap Disc, Grinding Disc. 49. Air Tools; Air Hopper, Sand Blasting Gun, Spray Guns, Air Duster Guns 50. Safety Accessories; Danger & Caution Tape, Safety Spectacles, Safety Helmets, Vest, Safety Harness, Safety Shoes  CONTENDER AIR COMPRESSOR, BENCH GRINDER, DRILL PRESS  MEASURING INSTRUMENTS Digital Caliper, Digital Caliper with Round Depth Bar, Digital Caliper with Ceramic Tipped Jaws, Coolant Proof Digital Caliper, Mini Digital Caliper, Vernier Caliper, Dial Caliper, Long Jaw Vernier Caliper, Digital Inside Groove Caliper, Digital Inside Point Caliper, Digital Gear Tooth Caliper, Digital Height Gage, Dial Height Gage, Vernier Height Gage, Digital Depth Gage, Digital Double Hook Depth Gage, Vernier Depth Gage, Dial Depth Gage, Depth Micrometer, Metric Digital Outside Micrometer, Digital Outside Micrometer, Outside Micrometer, Graduation Outside Micrometer, Outside Micrometer with Interchangeable Anvils, Indicating Micrometer, Blade Micrometer, Point Micrometer, Spherical Anvil Tube Micrometer, Disk Micrometer, Screw Thread Micrometer, Measuring Tips for Screw Thread Micrometer, Can Seam Micrometer, Micrometer Stand, Inside Micrometer, Digital Inside Micrometer, Tubular Inside Micrometer, Three Points Internal Micrometer, Bore Gage for Small Holes, Long Handle, Anvil for Bore Gages, Small Hole Gage Set, Telescoping Gage Set, Digital Indicator, Setting Ring, Dial Indicator, Waterproof Dial Indicator, Precision Dial Indicator, One Revolutio Dial Indicator, Contact Point, Lug Back, Flat Back, Extension Rod, Dial Test Indicator, Styli For Dial Test Indicator, Dial Test Indicator Holder, Magnetic Stand, Dial Test Indicator Centering Holder, Magnetic Stand, Universal Magnetic Stand, Flex Arm Magnetic Stand, Internal  Dial Caliper Gage, Granite Comparator Stand, External Dial Caliper Gage, Thickness Gage, Digital Thickness Gage, Thread Ring Gage, Steel Gage Block Set, Thread Plug Gage, Block Level, Digital Level and Protractor, Digital Level and Protractor, Digital Protractor,  Combination Square Set, 90° Flat Edge Square, Machinist Square with Wide Base, 90° Beveled Edge Square, Straight Edge, Feeler Gage, Long Feeler Gage, Feeler Gage, Feeler Gage Tape, Pitch Gage, Center Gage, Angle Gage, Radius Gage, Radius Gage Set, Taper Gage, Welding Gage, Inside Spring Caliper, Outside Spring Caliper, Spring Divider, Steel Rule,  Straight Edge, Circumference Tape, Scriber, Granite Surface Plate, V-Block Set, Magnetic  V-Block, Electronic Edge Finder, Electronic Edge Finder, Centering Indicator, 2-piece Measuring Tool Set, Data Output System, Profile Projector, Video Measuring Microscope Code ISD-A100*, Portable Measuring Microscope Code ISM-PM100, Digital Microscope Code ISM-PM200, Software for Digital Microscope Code ISM-PRO, Digital Force Gage, Surface Roughness Specimen Set Code ISR-CS130-W, Roughness Tester, Coating Thickness Gage Code ISO-3500FN-W, Ultrasonic Thickness Gage Code ISU-200D*, Endoscope Code ISV-E55*, Manual Rockwell Hardness Tester Code ISH-R150, Portable Hardness Tester Code ISH-PHA*, Shore Durometer, Digital Torque Wrench, Safety Seals, PPE, Industrial Adhesives Saws & Blades, Cutting & Grinding Disc, Welding Machine & Rods, Skim Coat & Tile Adhesives, Installer of Fire Alarm System, CCTV', 4, 'Ma. Kho Apartment, Door # 2 1034, Sierra Madre St., Brgy. Villamonte, Bacolod City', '(034) 458-8592', '0932-892-4909', '(034) 458-8592', 'locsealcorp.aljeroabellana@gmail.com', 'COD', 'COD', 'Mr. Aljero ', '', 'Active'),
(174, 'Bacolod Luis Paint Center', 'Paints', 0, 'Gonzaga, Bacolod City', '435-0301', '', '435-3108', '', 'COD', 'Distributor / Supplier', '', '', 'Active'),
(175, 'Luvimar Enterprises', '', 0, 'Rizal Street corner Gatuslao Street (beside LLC), Bacolod City', '(034) 476-3612', '', '', 'luvimarfirecontrol@luvimar.com', 'COD', 'Distributor', 'Mr. Angelo Abdul', '', 'Active'),
(176, 'Lyfline Marketing', '', 0, 'Galo Hilado, Bacolod City', '(034) 434 6543/(34)434-2582', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(177, 'Macjils Refrigeration And Airconditioning Repair Shop', '', 0, 'Prk. Sto. Rosario, lacson St., Bacolod City', '(034) 707-0639 / 0919-637-0637', '', '', 'mamertoyalong@gmail.com', 'COD', 'Distributor', 'Mr. Mamerto Yalong', '', 'Active'),
(178, 'MB United Commercial', '', 1, 'Yakal St., Villamonte, Bacolod City', '435-3131; 434-7283; 709-1053', '', '435-2901', '', 'COD', 'COD', 'Ms. Melanie Alvarado', '', 'Active'),
(181, 'Metro Pacific Construction Supply, Inc.', '', 3, 'No. 47 Mabini Street, Iloilo City', '(033) 338-1316 ; 337-1210 ; 337-3762; 337-0815', '', '(034) 336-3279', '', '', '', '', '', 'Active'),
(182, 'MF Computer Solutions, Inc.', 'Computer equipment and supplies', 11, 'JTL Bldg. BS Aquino Drive Shopping, Bacolod City', '434-6544', '', '434-6544', 'info@mfcomputersolution.com', 'COD', 'Distributor / Retailer', 'Sir Che / Ms. Nova Oricio', '', 'Active'),
(184, 'MGNR Hardware & Construction Supply', '', 4, '2780 Hilado Ext., Brgy Villamonte, Bacolod City', '435-3790', '', '', '', '', '', 'Ian Paglumotan', '', 'Active'),
(187, 'Micro Valley', '', 0, 'Reclamation Area, Bacolod City', '(034) 704-4317', '', '', 'MVbacolod5@yahoo.com.ph', 'COD-Cash', 'Distributor', '', '', 'Active'),
(189, 'Milco Malcolm Mktg', '', 3, 'M & M Aceron Bldg II, Mabini-San Sebastian Sts., BC', '433-3429; 434-2918; 434-3986', '', '433-3429', '', 'COD', 'COD', 'Romeo "Bob" Aceron', '', 'Active'),
(193, 'Mirola Hardware', '', 3, 'Poblacion Sur, Ivisan, Capiz', '(036) 632-0104; 632-0028 ; 632-0108', '', '(036) 632-0104', 'info@mirolahardware.com', '', '', '', '', 'Active'),
(195, 'Negros Bolts & General Mdse', '', 4, '2879 Burgos Ext., BS Aquino Drive, Bacolod City', '435-2260; 708-1183', '', '', '', '', '', '', '', 'Active'),
(200, 'Negros International Auto Parts', '', 12, 'Rizal Street - Corner Lacson Street - Sgo Building, Barangay 21, Bacolod City', '(034) 435-1416', '', '', '', '', '', '', '', 'Active'),
(201, 'Negros Marketing', '', 0, 'Cuadra St., Bacolod City', '(034) 435-4708', '', '', '', 'COD', '', 'Mr. Terence Sy', '', 'Active'),
(202, 'Negros Metal Corporation', '', 0, 'Brgy. Alijis, Bacolod City', '(034) 433-7398', '', '', '', 'COD', '', '', '', 'Active'),
(203, 'Negros Pioneer Enterprises', '', 12, 'Gonzaga - Lacson Street, Barangay 24, Bacolod City', '(034) 433-2088', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(204, 'Netmax Solutions', '', 0, 'Silay City', '(034) 213-6120 / 0949-883-2535/0923-141-2611', '', '', '', 'COD', '', '', '', 'Active'),
(205, 'New Colomatic Motor Parts', '', 12, 'Gonzaga Street - Lm Building, Barangay 25, Bacolod City', '(034) 434-5955', '', '', '', '', '', '', '', 'Active'),
(206, 'New Yutek Hardware and Industrial Supply Corporation', 'Structural Steels, Gate Valves, Check Valves, Y-Strainer, Elbows', 7, 'Zulueta St., Cebu City, Cebu', '(032) 255-5406', '', '(032) 254-1365', '', 'COD', 'COD', 'Sir Berto', '', 'Active'),
(207, 'Newbridge Electrical Enterprises', '', 3, 'Lacson Ext., Cor LT Vista St. Singcang, Bacolod City', '433-9298; 433-2365; 434- 2185', '', '', 'newbridge@pldtdsl.net', 'COD', 'COD', 'Ms. Joy/Mr. Clause', '', 'Active');
INSERT INTO `vendor_head` (`vendor_id`, `vendor_name`, `product_services`, `category_id`, `address`, `phone_number`, `mobile_number`, `fax_number`, `email`, `terms`, `type`, `contact_person`, `notes`, `status`) VALUES
(208, 'Nikko Industrial Parts Center', '', 12, 'Lacson Street - Door 3 Tmg Building , Barangay 25, Bacolod City', '(034) 708-0210/(034) 433-7908/(034) 433-3835', '', '', '', 'COD', 'Distributor', '', '', 'Active'),
(209, 'Nippon Engineering Works', '', 2, 'Corner-Mabini Ledesma Sts., Iloilo City', '(033) 338-1122', '', '', '', '', '', '', '', 'Active'),
(211, 'Northern Iloilo Lumber & Hardware', '', 5, '24 Ledesma, Iloilo City', '(033) 337-4749', '', '', '', '', '', '', '', 'Active'),
(212, 'NS Java Industrial Supply', '', 3, 'Room 1-11 JDI Bldg, Galo St., Bacolod City', '433-0668', '0917-300-3182', '', '', '', '', '', '', 'Active'),
(213, 'Octagon Computer Superstore', '', 11, 'SM City Bacolod, Rizal St., Reclamation Area, Bacolod City', '(034) 468-0205', '(034) 468-0204', '', '', 'COD', '', '', '', 'Active'),
(214, 'Panay Negros Steel Corporation', '', 1, 'Door 2, Torres Bldg, No. 61 Burgos, Bacolod City', '434-8272', '0917-303-1680', '709-1141', 'pnscbacolod@gmail.com', '', '', '', '', 'Active'),
(215, 'Philippine DFC Cargo Forwarding Corp.', 'Forwarder', 0, 'Siment Warehouse, Zuellig Ave., Reclemation Area, Mandaue City', '0917-629-3024', '', '', '', 'Freight Collect', '', 'Ms. Joy', '', 'Active'),
(216, 'Pins Auto Supply', '', 12, 'Gonzaga Street - Purok Masinadyahon, Barangay 24, Bacolod City', '(034) 434-9349', '', '', '', '', '', '', '', 'Active'),
(217, 'Platinum Construction Supply', '', 12, 'Bugnay Road, Villamonte, Bacolod City', '(034) 433-1886', '', '', '', '', '', '', '', 'Active'),
(218, 'Power Steel Specialist', '', 1, '1714 Ma. Clara St., Sampaloc, Manila', '(02) 731-0000', '', '', 'sales@powersteel.com.ph', '', '', '', '', 'Active'),
(219, 'Power Systems, Inc', '', 9, 'AU & Sons Bldg., Sto. Nino, Bacolod City', '433-4293', '', '433-7363', '', '', '', '', '', 'Active'),
(220, 'Prism Import-Export, Inc.', '', 0, 'C.L. Montelibano Avenue, Bacolod City', '(034) 433-6045/708-4443/433-5327', '', '434-6433', '', '15 days', '', 'Ms. Veron/KarenJun', '', 'Active'),
(221, 'Procolors T-Shirts Printing', '', 0, 'Lacson St., Bacolod City', '(034) 434 3403', '', '', '', 'COD', '', '', '', 'Active'),
(222, 'Ravson Enterprises', '', 0, 'Atrium Bldg., Gonzaga St., Bacolod City', '434-8929', '', '', '', 'COD', '', '', '', 'Active'),
(223, 'Rc Fishing Supply', '', 0, 'Gonzaga St, Bacolod City', '(034) 434 8299', '', '', '', 'COD', '', '', '', 'Active'),
(226, 'Richard and Zachary Woodcraft', '', 0, 'Victorina Heights, Libertad Ext., Brgy. Mansilingan', '431-5866/213-3858/0928-337-7568, 0927-325-4497, 0922-562-1005', '', '', 'rzwoodcraft_05@yahoo.com', 'COD', '', 'Mr. Richard Dulos', '', 'Active'),
(227, 'RTH Marketing', '', 2, 'Door 1, St. Francis Bldg., Lizares Ave.,Bacolod City', '433-1199; 433-8152', '0928-5015595', '433-1199; 433-8152', 'rthmarketing@yahoo.com', '', '', 'Ranilo "Toto" Hulleza', '', 'Active'),
(230, 'Sam Parts Marketing', '', 12, 'Cuadra Street, Barangay 24, Bacolod City', '(034) 434-6119', '', '', '', '', '', '', '', 'Active'),
(231, 'SGS Hardware Corporation', '', 1, 'Gatuslao Bacolod City', '435-3023-25', '', '434-6061', '', 'COD', 'COD', '', '', 'Active'),
(234, 'Sian Marketing', '', 5, 'Luzuriaga-Lacson Sts., Bacolod City', '431-1375', '', '', '', '', '', 'Ken Shi', '', 'Active'),
(235, 'Silicon Valley', '', 11, 'SM Bacolod City', '(034) 431-3251', '', '', 'Ms. Ping', 'COD', 'Distributor', '', '', 'Active'),
(236, 'Silver Horizon Trading Co. Inc.', '', 0, 'Julio Las Piñas St., Brgy. Villamonte, Bacolod City', '476-2590/09284495903/09296291246', '', '', '', 'COD', '', 'Ms Gelyn/Sir Carlito', '', 'Active'),
(238, 'Simplex Industrial Corp.', '', 0, 'Tiffany bldg., Door 8, Gonzaga St., Bacolod City', '(0932)878-8882, (0925)868-8882', '', '', 'salesbacolod@simplex.com.ph', 'COD', 'Distributor', 'Ms. Anne Golez', '', 'Active'),
(239, 'SKT Saturn Network, Inc.', '', 0, 'SKT Compound, Rizal St., Bacolod City', '433-2494', '', '', '', '', '', '', '', 'Active'),
(240, 'Sol Glass And Grills', '', 0, 'Rosario Heights, Libertad Ext., Brgy. Taculing, Bacolod City', '(034) 213-3935 / 0917-5039-183', '', '', '', 'COD', '', 'Mr. Karl Bryan Solinap', '', 'Active'),
(241, 'Specialized Bolt Center and Industrial Supply Inc.', 'BOLTS 1. Hub Bolt, Stud Bolt, Propeller Bolt, Center Bolt, Track Shoe Bolt, Plow Bolt w/ Nut, G. I. Battery Bolt w/ Wing Nut, Battery Terminal & Lug  ALLEN SOCKET SCREWS - High Tensile 1. Allen Socket Head Cap Screw, Allen Socket Head Set Screw, Allen Square Head, Alen Button Head, Allen Flat Head Socket Screw, Allen Wrench Key  U-bolt for Cars & Trucks, U-bolt for Pipe (g. I./Stainless), Copper Washer,  Plainwasher (B. I./G. I./Stainless/Brass), Lockwasher (B. I./Tetanized/Stainless) Conewasher, Plastic Tox, Drill Bit,  HARDWARE ITEMS & INDUSTRIAL TOOLS Grinding Stones, Cut-off Wheels, Depressed Center Wheels, Diamond Cutting Wheels, Carbonatum Grindings Wheels, Sanding Disks, Sand Papers, Steel Wheel Wire Brushes, Steel Wire Brushes, Cup Brush, WD-40 Penetrating Oil, Pillow Blocks,  Post Straps, Safety Helmet, Safety Googles-TW, Cotton Gloves, Cable Ties, Steel Tapes, Drill Chucks, Spark Plug Wrench, Cross Wrench, Oil Filter Wrench, Box Wrench, Open Wrench, Combination Wrench, Pipe Wrench, Adjustable Wrench, Socket Wrench, Impact Socket Wrench, Quick Ratchet Handles, Flexible Handles, Vise Grips, Combination Pliers, Diagonal Side Cutter Pliers, Putty Knife (with & without handle) Welding Machine (AC & DC), Welding Rods, Welding Lens, Welding Masks, Welding Gloves, Welding Electrode Holder, Welding Cables, Bronze Rode, Copper Tubes, Tool Bits, Twist Drill Bits, Masonry Drill Bits, End Mills, Hand Taps, Hacksaw Frames, Hacksaw Blades, Handsaw (PVC Handle)  GENERAL & INDUSTRIAL HARDWARE Tri-Squares, Aluminum Levels, Cement Trowels, Ball-Plen Hammers, Arm Pullers/ Bearing Pullers, Vital-Chain Blocks, Vital-Lever Blocks, Bench Grinders, Hole Saw Set, Tin Snips, Gate Valves, Ship Chains, Stainless Hinges, Heavy Duty Padlocks, Ordinary Padlocks, Electrical Tapes, Teflon Tapes, Masking Tapes, Packaging Tapes, Glue Guns, Water Gun Nozzles, Spray Guns, SKS-Sliding T-Handles, SKS-Drill Press Vise, SKS-Tap & Die Set, SKS- Feeler Gauge, SKS-Screw Extractor Set, SKS-Heavy Duty  Cross Vise, SKS-Hydraulic Jacks, Pioneer-Epoxy Tubes, Pioneer-Mighty Gaskets, Pioneer- Contact Bonds, Pioneer-Elastoseals, Pioneer- Marine Epoxy, Pioneer- Non Sag Epoxy, Aluminum ladders, Foldable Flatform Carts, Slotted Angle Bar Corner  Plates, Steel Footers, Plastic Footers, Caster Wheels.  PRODUCT LINES VALVES Ball Valve, Gate Valve, Check Valve, Wye Strainer, Butterfly Valve, Globe Valve,  PIPES Stainless Pipes, B. I. Seamless Pipes, Superior Pipes, G. I. Pipes, B. I. Pipes  FLANGES Stainless Slip on Flange, Stainless Blind Flange, B. I. Slip on Flange # 150 & #300 B. I. Blind Flange # 15 & #300  STEEL PLATES, SHEETS & BARS Mild Steel Plates 4''x8'' Mild Steel Plates 6''x20'' Mild Steel Plates 8''x20'' B. I. & G. I Sheets Angle Bars Flat Bars  FITTINGS Butt-Weld Elbow, Butt-Weld Concentric Reducer, Butt-Weld Tee, Welded Cap, Stub End, Elbow Threaded, Coupling Threaded, Coupling Reducer Threaded, Bushing Reducer Threaded, Bushing Reducer Threaded, Tee Threaded, Cross Tee Threaded, Hex Nipple, Nipple Threaded, Cap Threaded, Union Trhreaded, plug Threaded, "MECH" US Elbow 90 degree Threaded, Elbow 45 degree Threaded, Straight Elbow 90 degree Threaded, Tee Threaded, Caps Threaded, Elbow Reducing  Threaded, Coupling Threaded, Plugs Threaded, Plugs Threaded, Reducing Socket/ Coupling Reducer Threaded, Union Threaded, Tee Reducing Threaded, Hexagonal Bushing, B. I. Butt-Weld Sch 40 & 80, Elbow 902 degree and 40 degree Concentric Reducer Tee.  THREADED ROD Hi-Tensile Threaded Rod, Stainless Threaded Rod, Galvanized Threaded Rod  EXPANSION BOLT Bolt Anchor, Dyna Bolt, Drop in Anchor, Cut Anchor, Hit Anchor, Wedge Anchor,  FISCHER PRODUCTS Fiscer Threaded Rod, Fischer Expansion Bolt, Fischer Resin Capsules, Fischer  Sleeve Anchor, Fischer Foams & Sealants  SCAFFOLDING CLAMPS Swivel Clamp, Fixed Clamp  ALL TYPES OF SCREWS Job Screw, Hardiflex Screw, Self Tapping Screw, Gypsum (Drywall) Screw for Wood  & Steel, Teckscrew for wood & Steel, Tekscrew for stainlee steel, Metal Screw (G. I./Stainless), Wood Screw (G. I./B.I. Stainless), Confirmat Screw, Wafer Screw Tekscrew Adaptor, Hand Riveter, Screw Bit, Screw Extractor, Blind Rivets (Aluminum/ Stainless), E Clip, Internal Circlip, External C. Clip, Spring/Dowel Pin, Cutter Pin (G.I./Stainless), Hose Clamp, Shackle, Cable Clip, Turn Buckle, Eye Bolt', 7, '11 V. Sotto, Cebu City, Cebu', '(032) 2531345 / 253-1535', '', ' (032) 239-7705 / 255-7681', 'specialized_bolt@yahoo.com', 'COD', 'Distributor', 'Ms. Janeth/Mr. Ramon', '', 'Active'),
(242, 'State Motor Parts Company', '', 12, 'Gonzaga Street, Barangay 24, Bacolod City', '(034) 433-1683', '', '', '', '', '', '', '', 'Active'),
(243, 'Sugarland Hardware Corp.', '', 4, 'Lacson St., Bacolod City', '434-5390; 434-4549; 708-8850', '', '433-9748', '', 'COD', 'COD', '', '', 'Active'),
(245, 'Sunrise Marketing', '', 0, 'Bldg./Street: Hilado Extension\nMunicipality: Bacolod City ', '434-5746', '', '435-1067', '', 'COD', '', '', '', 'Active'),
(246, 'Svtec Industrial Enterprises', '', 0, 'Gonzaga-Lacson St., Bacolod City', '(034) 707-7496', '', '', '', 'COD', '', 'Mr. Benjie ', '', 'Active'),
(247, 'Technomart', '', 11, '(034) 431-5994', '9322065585', '', 'technomart.smbacolod@yahoo.com', '', 'COD', 'COD', '', '', 'Active'),
(248, 'Teranova Computers', '', 11, 'G/F Cineplex Building, Araneta St., Bacolod City', '(034) 435 - 7227 / 709 - 7737/ 0999-817-4815 / 0942-009-1433', '(034) 435 - 7227', '435 - 7227', 'teranova_computers@yahoo.com', 'COD', '', '', '', 'Active'),
(250, 'Tingson Builders Mart', '', 4, '3 Gonzaga, Bacolod City', '434-1046; 707-5507', '', '', '', '', '', '', '', 'Active'),
(252, 'Alpha Titan Hardware', 'Hardware, Tools, Welding Machine', 2, '888 Chinatown Square, Gatuslao St.', '435-7496; 476-4106', '', '', '', '', '', '', '', 'Active'),
(255, 'TMVG Multi-Sales, Inc.', 'INSTITUTIONAL COMMERCIAL/INDUSTRIAL CHEMICALS Air Freshener/Deodorizer, All Purpose Liquid Cleaner, Biocide & Algaecide,  Carpet Shampoo, Deodorant Spray/Cake Liquid, Diswashing paste/Gel, Drain & Clog Openers Liquid, Food Services Degreaser, Fabric Softener, Glass Cleaner, Heavy Duty Matisurface cleaner, Hospital-Strength Disinfectant cleaner, floor wax, liquid hand soap, Marble Cleaner (Non-acid), QuatDisinfectant (Lysol), Non-acid disinfectant bathroom cleaner, Oven Grill Cleaner, Powdered Detergent Soap, Sanitizer, Spot & Stain Remover, Tile & Bowl Remover, Toilet Bowl Disinfectant cleaner, wax stripper.  JANITORIAL TOOLS/PARTS & SAFETY SHOES PRODUCTS/FIRE FIGHTING EQUIPMENTS Safety Shoes (Hi-cut, Low-cut), Face Shields, Goggles, Helmet, Aprons (Maong, Leather), Glove (Laong, Leather), Masks (Half mask/Full face), Waste Cotton/Remnants, Deck Brush, Floor mops/Rugs, Floor Brush (Wilson Universal)  LAUNDRY WASH/CLEANING CHEMICALS (WHITE WASH BRAND) Bleach Powder (Salinox), Brighter (Sourex), Chlorine, Fabric Softener (Sanisoft), Machine Wash (Laundry), Oxalic, Oxygen Bleach, Dishwashing Paste, Powder Degreaser (Breaker), Rust & Stain Remover (Vista), White Wash All Purpose (Powdered Detergent)  SWIMMING POOL CHEMICALS/EQUIPMENTS/PARTS Algaecide, PH adjuster, Filter Aid (Impt/Local), Perlite, Chlorine Table/Powder, Dry Acid, Bio-Blue (Pool Clarifier), Copper Sulfate, Telescope Handle, industrial Motor Pump (Hayward/ Purex/Challenger and parts), Filter Assembly (Titan/Hayward/Challenger & Parts), Vacuum  Head & Parts, Brush, Leaf Scope, Stainex (Anti-Scale), Aluminum, Sulfate.  AUTO/AIRCON REPAIR/PARTS/ACCESSORIES Fedders, Carrier, Koppel, Daikin, Allen Aire / Amana, Expansion Valve, Refrigerant 12/ 134A/22/410/406/141B, Auto Evaporator (Original/Local), Condenser, All Types of Filter Drier, Compressor (Window, Ceiling Mounted, Packaged type, auto aircon & other industrial type.  3M PRODUCTS/COMMERCIAL CARE CHEMICALS 3M Floor Cleaning Chemicals for Vinyl/Marble, 3M Matting/Carpet Products, 3M Electrical Products, 3M Abrasives/Grinding/Cutting Disc, 3M Safety Products, 3M Floor Pads, 3M Industrial Cleaning Pads, 3M Home Care Products  INDUSTRIAL/PROCESS CHEMICALS Acetone, Acid Descaler & Chemicals Cleaner, Ammonia Water Strong, Ammonium Bilfluoride, Ammonium Sulfate, Anti-Sealant Chemicals for Distellery, Acid Dihibitor, Benzalkonium Chloride, Biocide, Borax Powder, Blackburn Products (Antifoam), Bleaching Earth, Calcium Hypochloride 70%/65%, Carbon Tetra Chloride, Carbon & Varnish Remover, Carboxyl Methyl Cellulose, Caustic Soda Flakes/Pearl, Cetyl Alcohol, Citric Acid, Citronela oil, Cocodietthanolamine (CDEA), Cooling Tower Treatment, Copper Sulfate, Defoamer (Silicone -blackburn-UK, Ethyl Alcohol, Ethylene Glycol, Glycerine, Garratt Callahan, Glacial Acetic Acid, Hydrogen Peroxide, Hydrochloric Acid, Isopropyl Alcohol, Isophropyl Myristate,Methylene Chloride, Methanol, Naphthalene, nitric  Acidtoluence, Oxalic Acid, Paradichlorobenzene, Perchloroethylene, Phosporic Acid (Food Grade), Polyammonium Chloride, Potash Alum, Propylene Glycol, Propyl Paraben, Rhodamine, Silicon Oil,  SLES, Stearic Acid, Soda Ash, Sodium Nitrate, Sodium Phospate Dibasic, Sodium Silicate, Sodium  Tripolyphosphate, Tergitol, Titanium Dioxide, Trichloroethylene, Triethanolamine, Zinc Oxide (Tech Grade), Soluble Oil  PREVENTIVE MAINTENANCE CHEMICALS Aircraft Runaway Cleaner, Algaecide (Algae Control), Aluminum/Coil Cleaner (aircon cleaner), Anti-Seize Compound (LPS), Belt Dressing, Brand Boiler Feed Water Treatment, Bunker Fuel Oil Additive (Conditioner), Carbon Descaler, Cold Galvanizing Compound, Cold Tank Degreaser, Contact Cleaner, Cooling Tower Water Treatment, Corrosion Preventive Compound, Cutting Oil & Coolant, Demoisturizer, Descaler & Cement Remover, Emulsified Degreaser, CIP Cleaning (Acechlor), Food Grease (USA), High Temperature Grease, High Pressure Lubricant, Industial Solvent-rated first, Insulating Varnish-(Red/clear)-3m USA, Kleenkote (Phophating Conditioner), Liquid Epoxy Coating,  Ozphose, Oven/Grill Detergent Cleaner, Paint Stripper, Paint & Varnish Remover, Penetrating Oil, Poo Powder Degreaser, Battery Terminal Cleaner, Radiator Coolant/Flush, Rubber Burns Remover, Rust Converter, Rust Remover, Safety Solvent Degreaser, Silicon Mold Release, Sludge Disperant, Stainless Steel Cleaner, Steam Cleaner Additive, Stoddart Solvent, Tile Cleaner, Dynaflux Crack Check Detector, Transformer Oil, Waterless Hand Cleaner, Water Soluble Degreaser, Wire rope chain Lubricant, Stainex (Swimming Pool), Bio-Blue (Swimming), PH Adjuster (Swimming Pool).  HARDWARE TOOLS/EQUIPMENTS & OTHER SPECIALIZED TOOLS Air Tools (Uryu-Japan), Rigid-USA, Stanley USA (Original), Proto-USA, Metabo Tools (Adaptable to 3M Combi-Brush), Black  Decker.  TOOLBIT ASSAB 17 SWEDEN Round Bit, Square Bit, Cut-off Bit  PRESSURE GAUGES/THERMOMETER Weis/Weksler/Kunkle/Watts/Marsh/Ametek/Insa/Ashcroft Made in USA, Wika-Germany, NH-England  VALVES Fairbanks USA, Henry-USA, Schmidth, Fairfortune-USA, MC Rayann-USA, Armstrong   LABORATORY CHEMICALS/EQUIPMENTS Ajax-USA, Pyrex/Duran-USA, Kimax  XIV Ertalon Round Rod, Sheet, Tubular, Polycarbonate Plastics', 9, 'Dr. 2, Genito Bldg., Lopez Jaena St., Bacolod City', '(034) 708-1819 / 434-7471 / 435-6003 / 476-4355 / 435-0905', '', '(034) 434-7471;', 'chemtrustunlimiteds@yahoo.com.ph', 'COD', 'Distributor', 'Engr. Norlene A. Amagan', '', 'Active'),
(256, 'Tokoname Enterprises', '', 0, 'Hernaez St., Bacolod City', '433-3610/707-1844', '', '', '', 'COD/7 days', '', '', '', 'Active'),
(257, 'Tri-con Marketing Center Inc.', '', 4, 'Capitol Shopping Ctr, Bacolod City', '435-0889', '', '', '', '', '', '', '', 'Active'),
(259, 'Triumph Machinery Corporation', '', 2, 'Bacolod City', '441-0298', '', '', 'trimcorsales@trimcorph.com', '', '', '', '', 'Active'),
(260, 'U.S. Commercial', '', 12, 'Gatuslao Street - Purok Bagong Silang, Barangay 13, Bacolod City', '(034) 433-1174', '', '', '', '', '', '', '', 'Active'),
(261, 'Unikel Industrial Supplies and Safety Equipments', '', 8, 'Door 2 G/F Malayan Bldg, 3rd St Lacson, Bacolod City', '476-3191; 435-8677', '0917-703-9797; 0932-864-5350', '', 'unikelenterprises@yahoo.com', '', '', 'Kristel Curbilla', '', 'Active'),
(263, 'Union Galvasteel Corp', 'Roofing Materials', 1, 'Soliman Bldg, Bacolod', '435-7175', '', '435-7175', '', '', '', 'Jessica', '', 'Active'),
(264, 'United Bearing Industrial Corp', 'PRODUCTS LINE/S OR SERVICES OFFERED 1. Exclusive Distributor of: NSK Bearings Japan - All types of Bearings 2. FHY Bearings - Exclusive Distributor of Bearing Units All Types 3. Emerson Power Transmission Products (authorized distributor) 4. BEGA Maintenance Tools and Induction Heaters - Made in Holland 5. Federal Mogul Products - National Oil Seal, BCA-Bower, Champion Spark Plugs 6. UBC Bearings - Exclusive Distributor', 4, 'AP Bldg Lacson St, Bacolod City', '435-4541 / 435-4497', '', '434-1218', 'sales@unitedbearing.com', 'COD', 'Distributor', '', '', 'Active'),
(266, 'United Steel Technology International Corp.', '', 1, 'Door 2, Goldbest Warehouse, Guzman St., Hibao-an, Mandurriao, Iloilo City', '(033) 333-7663', '0917-811-7663', '', 'info@steeltech.com.ph', '', '', '', '', 'Active'),
(267, 'US Commercial Inc (Uy Sian Commercial)', '', 1, 'Gov V M Gatuslao, Bacolod City', '434-8989; 433-8017', '', '433-8015', '', '', '', '', '', 'Active'),
(268, 'VCY Sales Corporation', '', 0, 'Kamagong St., Brgy. Villamonte, Bacolod City', '433-7112/709-7778', '', '', 'fay.carvajal@vcygroup.com', 'COD', '', 'Ms. Fay Carvajal', '', 'Active'),
(269, 'Vendor 1', '', 0, 'Vendor 1 address', '1111', '', '2222', 'vendor@email.com', '', '', 'test', '', 'Active'),
(270, 'Visayan Construction Supply', '', 0, 'Lacson St., Bacolod City', '434-7277 / 434-7278', '', '434-5537', '', 'COD', '', '', '', 'Active'),
(271, 'Vosco Trading ', '', 0, 'Cuadra St., Bacolod City', '(034) 435-8515', '', '', '', 'COD', '', 'Mr. Silver/Sir Jam', '', 'Active'),
(272, 'Wellmix Aggregates Inc', '', 0, 'Ralph Townhouse, Bacolod City', '(034) 434-4704', '', '', '', '', '', '', '', 'Active'),
(273, 'Western Hardware', '', 4, 'EH Bldg., Lacson-San Sebastian Sts., Bacolod City', '434-5305-06', '', '435-0808', '', '', '', 'Gee Belita', '', 'Active'),
(275, 'Westlake Furnishings Inc.', '', 0, 'Araneta St.,  Bacolod City', '(034) 433-9489/433-9498', '', '', '', 'COD', '', '', '', 'Active'),
(276, 'Yousave Electrical Supply', '', 3, 'Door #s 1-2 Sunstar Bldg., Hilado Ext., Bacolod City', '709-0594', '', '431-3050', 'yousave.electrical@yahoo.com.ph', '30 days PDC/COD', '30 days PDC/COD', 'Salex Yap', '', 'Active'),
(277, 'Alta-Weld, Inc. / Alta (Far East) Welding Materials, Inc.', 'Welding Rod', 0, 'Sun Valley Drive KM. 15 West Service Road, South Superhighway, Parañaque City', '(02) 823-4032 / 824-2966 / 824-2988 / 0917-636-1187 / 0922-625-6397', '', '(02) 821-1782', 'altaweld@compass.com.ph / leointes@yahoo.com.ph', 'COD', 'Distributor', 'Mr. Leo C. Intes', 'Home Based Office / Some Products are Manila Stocks', 'Active'),
(278, 'Chokie Heavy Equipment Parts Center', 'Heavy Equipment Parts', 0, 'AGPA Bldg. Lacson St., Bacolod City', '(034) 431-5303 / 0925-866-2081 / 0942-072-6467', '', '', '', 'COD', 'Distributor', 'Arnel B. Altiche - 0995-612-1929', '', 'Active'),
(279, 'Hydrauking Industrial Corp.', 'PRODUCT LINES: 1. ENERPAC - Hydraulic Torque Wrenches, Jacks, Pumps, Bolt Tensioner. 2. TK SIMPLEX USA - Hydraulic Tools & Equipment (Jacks. Pumps) 3. POSI-LOCK PULLER - Hydraulic & Mechanical Puller 4. TORC LLC - Torque Wrenches (Made in USA)  SERVICES OFFERED: Bolting,/Torquing & LiftingSpecialist (on-site) Service/Repairs of Hydraulic Tools & Equipment Rentals of Jacks, Pumps, Torque Wrenches, Bolt Tensioners', 0, '4659 & 4661 Arellano St., Palanan Makati 1235', '0928-828-2878 / 0905-228-4345', '', '', 'rose@hydrauking.com / cebu@hydrauking.com', 'COD', 'Distributor', 'Ms. Mary Rose Remes', '', 'Active'),
(280, 'Ionic Impact One Nation Industrial Corporation', '', 0, '6-D Pearl St., Golden Acres Subd. Las Piñas City', '(02) 800-9104 / 806-2048 / 805-2959 / 0977-824-5812', '', '', 'impactonenation@gmail.com', 'COD', 'Distibutor', 'Mr. Rossano Del Castillo - 0906-758-4638', '', 'Active'),
(281, 'Cebu Champion Hardware and Electric Depot, Inc.', 'Industrial Control & Automation, Water System, Fire Protection System, Pnuematic, Ebara Pump & Motor, Omron, Inverter Ready, Abb, Baldor Automation Products, E. F.G. Willem Piping System, Duvalco, Dutch Valve Company, Tozen Valve/Gate/Strainer, 3M, KSB, Stainless Steel And Aluminum Products, Water Work System, Fire Protection System', 0, 'Pres. Quirino St, Cebu City, Cebu', '(032) 234 4342 / 231-7139 / 0917-632-6505', '', '(032) 234-4342', 'info@cebuchampionhardware.com / felixgzn@yahoo.com', 'Advance Payment(Bank to Bank)', 'Distributor', '', '', 'Active'),
(282, 'FH Commercial Inc.', 'James Walker, Henkel Loctite MRO Products, Lamons, Teadit, Klinger, Panam Engineers ltd. , Mcallister Mills', 0, 'FH Building, #22 Anonas Rd., Potrero, Malabon City, 1475', '(02) 362-2265 / 330-2019 / 330-2021 / 366-8598 / 361-4235 / 364-3352 / 0918-922-0974', '', '(02) 361-3759 / 366-7724', 'indayaeriejoy@yahoo.com', 'COD', 'Distributor', 'Ms. Suzette A. Espera', '', 'Active'),
(283, 'A & M Medcare Products Distributors', 'Medical Supplies', 0, ' Door 4 & 5, Estban Building, 5 Lacson St, Barangay 17, Bacolod City', '(034) 433 5728', '', '', '', 'COD', 'Distributor', '-', '', 'Active'),
(284, 'Archi Glass & Aluminum Supply', 'Aluminum and Glass Supplies', 0, 'P Hernaez St Ext, Bacolod City', '(034) 433 7116', '', '', '', '50% Downpayment, 50% upon completion', 'Installer', 'Ms. Evelyn', '', 'Active'),
(285, 'Bacolod Electrical Supply', 'Electrical Supplies', 0, 'Gonzaga Corner Lacson St., Bacolod City', '(034) 434-0526', '', '(034) 433-7238', '', 'COD', 'Distributor', '', '', 'Active'),
(286, 'Morse Hydraulics System Corp.', 'Manuli Hydraulics, Rexroth, Bosch Group, Eaton Vickers, Danfoss, Hydro Control, Stauff, Kpm, Kawasaki Precision Machinery, Seal Maker, Graco, Jsg Industrial System/Muster II Fire Suppression Systems, Hy-Lok, Alfagomma Industrial Hoses, Nacol Accumulator, Poclain Hydraulics, Brevini Group, Rexpower, Whitedriveproducts, Ashun, Bva Hydraulics, Paccar Winch Division, Braden Carco, Gearmatic, Engineering Solutions, Hydraulic Trainer/Simulator, Power Unit Submerged Type, Power Unit w/ Enclosure, Power Unit With Spare Unit, Stackable-Type Power Unit, Accumulator Type Power Unit', 0, 'DMC Bldg., Narra Ext. Bacolod City', '(034) 433-1538 / 0917-633-9634', '', '(034) 435-2588', 'morsehsc@salgroupco.com', 'COD', 'Distributor', 'Ms. Jean', '', 'Active'),
(287, 'JHM Industrial Supplies', 'Products: Generating Sets: Brand New And Slightly Used, Generator Parts & Accessories, Synchronizing and switch gear, Automatic Transfer Switch (ATS), Automatic Voltage Regulator (AVR), Meter Water, Automatic Trickle Charger, Transformers, Hydraulic Pumps, Hydraulic & Pneumatic Tools, Heavy Equipments, Mill Supplies, Marine Parts, Chemicals. Services: Electrical Design & Installation, Preventive Maintenance & Repair, Engine Overhauling, Rewinding Generator & Electric Motor, Repair & Rewiring of Motor Control, Troubleshooting of any kind of Generator Set, Calibration of Woodward Governor, Generation Protection Relay. Others: Globe Valves, Flange, Installation of CCTV Systems', 0, 'Gov. Rafael Lacson St., Zone 12 Talisay City, Negros Occidental', '0949-846-7820 / 0923-568-3661', '', '', 'jhm_industrial@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(288, 'Negros GT Group', 'Drill, Impact Drill, Cordless Screwdriver, Corded Screwdriver, Cordless Drill Driver, Cordless Impact Driver, Cordless Impact Drill, Battery with Charger, Cordless Freedom Tool (Batteries/Charger Not Included), Rotary Hammer, Demolition Hammer, Demolition Hammer Breaker, Straight Grinder, Small Angle Grinder, Large Angle Grinder, Polisher, Bench Grinder, Cutt-off Saw, Compound Mitre Saw, Sliding Mitre Saw, Jigsaw, Circular Saw, Sander, Planer, Trimmer, Plunge Router, . Table Saw/stand, Heat Gun, Blower, Wet & Dry Vaccuum Cleaner, High Pressure Cleaner, Laser Rangefinder, Line Laser, Point & Line Laser, Surface Laser, Detector, Optical Slope, Angle Measurer, Digital Inclinometer, Tripods, Levelling staff, Metal Drill Bits, Masonry Drill Bits, Chisels, Bonded Abrasives, Diamond Cutting Disc, Coated Abrasives, Jigsaw Blades, Planer Blades, Sabre Saw Blades, Screwdriver Bits, Chuck Keys, Bi-mtel Hole Saws, Router Bits-1/4', 0, '159-161 Lacson St., Bacolod City', '(034) 434-6154', '', '(034) 433-4983', '', 'COD', 'Distributor', 'Mr. Benjamin G. Sy Jr.', '', 'Active'),
(289, 'Powersteel Hardware', 'Structural Steels', 0, 'Coastal Road, Brgy. Banuyao, Lapaz, Iloilo City', '(033) 330-3792 | (033) 329-4484', '', '(033) 330-3867', 'sales_iloilo@powersteel.com.ph', 'Advance Payment (Bank to Bank)', 'Distributor', '', '', 'Active'),
(290, 'Propmech Corporation', 'CAT MARINE POWER ENGINEERING SERVICES-Parts Supply, engine, transmission, generator & waterjet servicing, marine products-transmissions, waterjets, electric generators, marine products engineering services-install, repair, troubleshoot, automation products-control systems (dcs), programmables controllers (pcls), supervisory control, data acquisition system (scada), industrial networking solutions, motor control, field instrumentation, automation engineering services-design consultation, instrumentation detailed design, control panel design and building, plc/scada,dcs programming, industrial networking design, motor control center design & installation, upgrade/migration of control system, project management. COASTAL REFRACTORIES-Dense and Insulating Castables, Low & Ultra-low Cement Castables, No Cement Castables, Super-Duty Plastic Mouldables, Refractory and Ramming Mixes, Super Bond Mortar (Wet Type). EXLUSIVE DISTRIBUTOR OF: ACUMEN SEALS-Cartridge Single Mechanical Seals, Cartridge Double Mechanical Seals, Single Spring Mechanical Seals, Multi-Spring Mechanical Seals, Metal Bellows Mechanical Seals, Customized Mechanical Seal Design. DISTRIBUTOR OF: PSP-Zero leak Pump Technology for Sugar and Chemical Plant, Positive Displacement Pumps, Chemical Pumps, Gear Pumps. THERMAX: MULTI-FUEL CAPABLE BOILERS-Coal-Fired Boilers, Biomass Fired Boilers, Spent-Wash Fired Boilers, Gas-Fired Boilers, AFBC/CFBC Design, Travelling Grate Design. POWER DIVISION: EPC CAPABILITIES IN-Biomass Based Power Plants, Pulverized Coal-based power plants, AFBC/CFBC boiler based power plants, Waste Heat recovery boiler based power plants. AIR POLLUTION CONTROL EQUIPMENT-Electro-static Precipitators, Bag Filters, Flu De-sulphurisers, Scrubbers, Dust and Fume Extraction System, Spare Parts. CHEMICAL DIVISION-ion-Exchange Resins, Waste Water Treatment Chemicals, Boiler Water Treatment Chemicals, Cooling Tower Treatment Chemicals, Fireside Treatment Chemicals, Fuel Treatment Chemicals. OTHER SERVICES OF ASSISTCO:-Furnace lining design & installation, building and erection, Boiler & heater repair, hot & Cold Insulation for Vessels & pipelines, ceramic fiber & firemaster installation, Refractory Castables & Firebricks Installation, Civil Construction. Mechanical Seal & Pump Repair. PRODUCTS-Mechanical Seals, Insulation-Kaowool Ceramic Fiber Blanket, Mineral Wool Blankets, Calcium Silicate Blocks, ACUMEN Seals, LTD: PSP Pumps, THERMAX-Ion Exchange Resin, LARS Enviro. SERVICES-Furnace Lining Designs & Installation, Building & Erection Boiler & Heater Repair, Hot & Cold Insulation for Vessels & Pipelines, Ceramic Fiber & Firemaster Installation, Refractory Castable & Firebricks Installation, Civil Construction, Mechanical Seal & Pump Repair', 0, 'J. king Warehouse, M. Sanchez St., Alang-alang, Mandaue City, Cebu', '(032) 344-0738', '', '(032) 344-0624', '', 'COD', 'Distributor', '', 'The leading local supplier of CAT Marine Production Propulsion Systems as well as primary & auxiliary electrical power installations. We''ve supplied & supervised the installation of propulsion systems in naval, coast guard, ferry service, yachts, fishing boats and many types of work vessels Philwide. The owners/operators of these vessels have recognized the numerous advantages indealing with us as a  single-source supplier of engines, parts & services.', 'Active'),
(291, 'Assistco Energy & Industrial Corporation', 'Conventional Castables, Light Weight Insulating Castables, Low & Ultra Low Cement/Self Flow Castables, Silicon Carbide (sic) Low Cement Castables, Plastic Mouldables, Ramming Mixes, Bonding Mortar', 0, 'Door # 2 Parklane Building, Cor. Rizal-Tindalo Sts., Shopping Center, Bacolod City', '(034) 435-1605', '', '(034) 435-1605', '', 'COD', 'Distributor', 'Mr. Castaneda, Emmanuel Rondain', '', 'Active'),
(292, 'Joules Enterprise & Engineering Services', 'MAIN PRODUCT LINES: Steam boilers and accessories, DISTRIBUTORSHIP: Grundfos pumps and donaldson ih filters, HONEYWELL CONTROL INSTRUMENTATION; indicators, controller, recorders. DANFOSS PRESSURE AND TEMPERATURE SWITCHES; pressure and temperature switches. MCDONNELL & MILLER; for steam boilers, MAGNETIC ROLLER DISPLAY; kuebler/finetec, SAFETY RELIEF BULB; kunkle, STEAMTRAP FOR STEAM BOILER; tlv, spirax sarco, adca, dsc, CONTOIL; fuel oil meter, SUNTEC PUMPS; fuel oil pump, fuel solenoid valves, burner fuel pumps. JEES STEAM BOILERS, HORIZONTAL STEAM BOILER, PLATE HEAT EXCHANGER, JEES VERTICAL. STEAM BOILER, BIOMASS STEAM BOILER. PRESSURE AND TEMPERATURE GAUGES; wika, ascroft, weksler. ASCO; for steam, air and fuel. ALIA; flowmeter transmitter indicator. ADCA, TLV, SPIRAX SARCO; control valves, prv, regulators. NICE; pressure, transducers, transmitters. WARREN; electric heater. BIOMASS STEAM BOILER; olympia, dunphy. Webster, etc. DIESEL ENGINE PARTS: Pistons, piston rings, valves, bearings, fuel injection pumps, o-rings. BRANDS: Sulzer, mak, wartzila, daihatsu, caterpillar, man b & w, mitsubishi, yanmar. PLATE HEAT EXCHANGER PARTS: PLATES AND RUBBER GASKETS: Alfa-laval, apv-invensys, tranter, hisaka, fisher and others. OIL-SEALS AND O-RINGS: Oil seal and o-rings in various sizes and materials such as viton, silicon, nbr, etc. Imported Or locally fabricated. OTHERS: Chiller and air compressors, pneumatics and instrumentations, sensors, electronic flowmeters And other equipment accessories. ENGINEERING SERVICES: Insulation and aluminum cladding of engine exhaust manifold, Insulation of pipeline from fuel line to engine. MAJOR ENGINEERING SERVICES: Installation, supervision, technical expertise and commisioning of major product line, Supplied by joules enterprise. This includes comprehensive training to plant personnel, Regarding the technical aspects of the supplied equipment, products and/or spare Parts, Steam boiler fabrication, rehabilitation and installation, Pumps and piping installation and pipe insulation, Refrigeration and air-condition services. Diesel Engine Parts (Sulzer, Daihatzu, SEMT Pielstick, Mitsubishi, Yanmar, Deutz), Fabrication and Machining Services, Printing Rollers, Crankshaft and Roller Grinding, Laser Alignment, Dynamic Balancing and Gear Fabrication', 0, 'G/F Unit 4, GA Esteban Bldg., Lacson St., Bacolod City, Negros Occidental', 'Bacolod-(034) 213-8574, 0923-171-3197, Head Office-(045) 458-0848: 0918-940-7243: 0917-919-5258, Vertec Marine - +6567468575/+6567467166', '', '(045) 322-4144', 'info@joulesengineering.com / jovenruby888@yahoo.com / jjm@joulesengineering.com / eddie@vertec.com.sg', 'COD', 'Distributor', 'Ms. Ruby P. Joven (Sales & Marketing Executive-Bacolod), Mr. Joel J. Manalang (President/CEO), Vertec Marine (Mr. Eddie Lim-Director)', 'Main Office Address: Jees bldg., Blk. 6 Lot 10 Doña Juana Cor. R. A. Canlas St., Springside, Pandan, Angeles City', 'Active'),
(293, 'Nexus Industrial Prime Solutions Corp.', 'SMC- air preparation equipment, flow control equipment, actuators/air cylinders, electric actuators/cylinders, fittings & tubings, directional control valves/solenoid valves. KOBELCO- oil flooded compressor, oil free compressor, group controller ecomild II, OMRON- covering the complete spectrum of control components and automation controls, relays, power supply, timers, digital panel meter, sensors, temperature, controller, push buttons, counters, variable frequency drives/inverter, encoders, hmi-human machine interface. lESER- api, high performance, compact performance, clean service, critical service, modulate action. WEIGHING SCALE- pioneer series, valor series, explorer series, defender series, single load cell flatform, ckw series. WIKA- pressure gauges, pressure gauges transmitter/switch, sf6 gas, air2guide, mechanical temperature, electrical temperature, electrical temperature, thermowells, diaphragm seals, high purity/ultra, high purity (uhp), pressure transmitters, high precision & calibration test. PROCESS VALVES- angle seat valves stainless/standard, butterfly valves, mounting type, 3-piece ball valves direct  mounting type, butterfly valves w/ actuators, ball valves with actuator, 3 way ball valves, ball valves flange type, general purpose valves, gate, knife, check valves.', 0, 'Unit B, Roselindees Building, Galo-Hilado St., Bacolod City', '(034) 435-0560 / 0928-5079-9741', '', '(034) 435-0560', 'sales-ceb@nexusindustrial.com.ph', 'COD', 'Distributor', 'Ms. Maricel Gumban - Sales Engineer', 'www.nexusindustrial.com.ph', 'Active'),
(294, 'AGEC Engineering Supplies', '1. Supply of API std. valves up to 12 inches 2. Supply of seamless brass tubes 1/2 inch to 3/4 inch diameter 3. Supply of SS perforated screen. 4. Supply of Flexitallic gaskets. 5. Supply of packings and gaskets. 6. Supply of engineering for up grading/retrofitting of boilers. 7. Supply of engineering in the fabrication of the following:       a. Juice Screening       b. Air and Gas dampers.       c. Oil Cooler (Tubular)       d. Tubular Heaters       e. AgriculturalFarm Implements       f. Rice and Cassava Mechanical Drier 8. Mechanical equipment installation & Mechanical Fabrication. 9. Piping and Duct Works. 10. REPAIR OF OIL COOLER 11. INDUSTRIAL SCREW CONVEYOR  PRODUCTS CONTROL VALVE, GATE VALE, STEEL SWING VALVE, BUTT WELD GATE VALVE, SEAMLESS BRASS TUBES, SS PERFORATED SHEET', 0, 'American Packing Ind., Mandalagan, Bacolod City', '0947-776-8124 / 0916-300-8019', '', '', 'cepe.andres@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(295, 'Sealand Industrial Supply', 'INSULATION, ENGINEERING PLASTICS, INDUSTRIAL PLASTIC CURTAINS, INJECTABLE PACKING. PRODUCT LINES 1. Packings & Gaskets 1.a Non-asbestos & Asbestos 1.b Manhole/Handhole/Tadpole, Tools 2. Engineering Plastic 2.a Nylon, UHMW, Acetal 2.b Fibra, Polycarbonate (Rod, Sheets & Fabrication) 3. PVC Curtain-Clear, Ribbed & Anti-Insect 4. Preventive Maintenance Chemicals 4.a Lubricants, Grease, Cleaners & Oils 4.b Hi Heat Paint, Epoxy Pant, Floor Ceiling & Wall Coating 5. Metal Repair System 6. Insulation-Ceramic / Rockwool Blanket 6.a Fiberglass/Asbestos Cloth, Tape, Rope 7. Neoprene Rubber - Plain, Cloth & Nylon Insertion 8. Hydraulics- O ring Kit/Rubber Fabrication 9. Air Slide Canvass/Filter Bag/ Cloth 10. Stuffing Box Sealant 11. Teflon Products (Sheet, Rod, w/ Filler) 12. Labor & Materials of Expansion Joint', 0, 'Plazamart, Araneta St., Bacolod City', '0932-9034-564', '', '', 'bacolod@sealandindustrial.com / clarisseleria15@gmail.com', 'COD', 'Distributor', '', '', 'Active'),
(296, 'EFRC Industrial Services & Trading Corp.', 'SERVICES OFFERED: 1. IN-Situ Machining, Crankshaft Grinding, Honing and Polishing 2. On-Situ Inspection of Ovality, Run-out, Deflection, Bend & (MPI=UV, DRY and WET  PROCESS) Magnetic Particle Inspection for Crank testing. 3. On site Straightening of Bend Crankshaft 4. In-situ Machining of Liner Seat (Landing Surface) 5. In-place Reboring & Resleeving of Bottom Liner Seat. 6. In-Place Machining of Slip Ring on Turbine for Hydro Electric Power Plant. 7. In-Place Vertical Reboring of tube sheet holes of vacuum pan for refinery & raw sugar 8. In-Place line boring of bearing saddle, rubber stalk etc. (using brand new sir mechanica-italia portable machine) 9. In Place Reboring of bearing housing for tyre roller of vertical raw mill, coal mill and shoe-slide guide of corliss engine 10. In-place Machining of Large Fillet Radius on grinding rollers for sugar mills & other similar machinery parts. 11. In-place Resizing of Dowel Bolt Hole on Coupling Falnge of Hydro Turbine & Other Machinery with Similar Job. 12. "Rotalign Ultra" Laser alignment check CRACK REPAIR BY METAL STITCHING (COLD WELD Process) 13. Cracked & Busted Engine Frame & Blco 14. Turbo Charger Casing 15. Ball Mill Trunnion Head & Large Gear 16. Cylinder Heads & Gear Boxes 17. Mill Cheek, Column, Mill Bed 18. Other Materials That are unsafe to weld OTHER SERVICES/TRADING & PARTS SUPPLY 19. Cladding 20. Casting (local) Fabrication of new cyl. Head & casing w/ warranty and fusion  welding repair  21. Stellitting of Valve Spindle and valve cage 22. Supply of Expansion Joint (Bellow) in any sizes 23. Bi-Metal & Tri-Metal Crankshaft Journal Bearing From Korea 24. Supply of new OEM/Surplus Marine Engine & Generator Engine Parts. 25. Repair & Fabrication of New Cooler, Heat Exchanger from singapore 26. Supply of ex-stock or made to order stainless & non-stainless ''ampo'' valves 27. Supply of imported vertical mill roller, table liner made by jung-won of korea that are locally distributed by union-lock ind''l & trading corp. for cement and power generation.', 0, '252 Dr. Jose Fabella St., Plainview, Mandaluyong City', '(02) 533-6673 / 0917-324-9530 / 0917-599-3366 / 0918-939-7962', '', '(02) 533-6673', 'efrcindustrial@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(297, 'New Interlock Sales & Services', 'GRUNDFOS 1. SP-4 inches to 10 inches diameter Stainless-Steel Sub. Pumps 2. CR-Vertical Multi-stage centrifugal pump 3. MMS-Rewindable Submersible Motors 4. NB/NK-Horizontal Single Stage Pumps 5. SQ3 inches diameter Submersible Pumps 6. Hydro 2000-Booster Unit 7. DME/DMS-Digital Dosing 8. HS-Horizontal Split-Case Pump 9. Pressure Reducing and Control Valves 10. Soft-Starters and Variable Speed Drives 11. Electromagnetic and ultrasonic flowmeters 12. Resilient type gate valves and fittings', 0, 'Door # 3 NGS Bldg., M. J. Cuenco Avenue, Mabolo Cebu 6000', '(032) 2315-906 to 907; 412-8431; 412-8278 to 79', '', '(032) 2315-907', 'limsamben168@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(298, 'Fil Generators And Services Company', 'PRODUCT LINES 1. Electric Diesel Generator Sets 2. Automatic Transfer Switch (ATS) 3. Synchronizing Panels 4. Automatic Voltage Regulator (AVR) 5. Generator Controls & Protection Devices/Gauges 6. Woodward Governors 7. Engine Lube oil, Fuel, Air & Water Separator/Filters 8. Autmatic Battery Float Charger 9. Generator Mechanical & Electrical Parts  SERVICES 1. Repair/Troubleshooting of Generator Sets 2. Electrical & Civil Works 3. Calibration/Repair of Woodward Governors 4. Generator and Motor Rewinding 5. Engine Overhauling 6. Engine Tune Up 7. Gen Set Installation & Commissioning 8. Gen Set Hauling 9. Preventive Maintenance 10. Radiator Repair/Overhauling 11. Installation & Commisioning of power generating equipments', 0, 'Door # 7, East Plaza Bldg., Circumferential Road, Brgy. Taculing, Bacolod City', '(034) 446-2674 / 0917-140-4763', '', '(034) 446-2674', '', 'COD', '', '', '', 'Active'),
(299, 'Acster Marketing', 'SPECIALIST: Waterproofing & Retrofitting Services 1. Structural Epoxy Injection 2. Structural Re-enhancement Carbon Fiber Installation 3. Non-Shrink Structural Grout 4. Parex Davco/Lanko Putty & Waterproofing Products 5. Ultracote Industrial Epoxy, Paints & Coatings', 0, '128 Araneta St., Singcang, Bacolod City', '(034) 458-4077 / 0927-291-2209', '', '', '', 'COD', 'Contractor', 'Mr. Domingo Rodrigo Jr. (0918-784-5691; 0915-420-0971)', '', 'Active'),
(300, 'Mandaue Atlas Steel Fabrication Corp.', 'SERVICES 1. Steel Fabrications, Bending, Rolling, Shearing, Power Press, Machining Stainless, Aluminum, Galvanize, MS Plates, Brass 2. Tig Welding, Planer, Pipe Bending, Rolling, Dishing  1. Bending 1/2 inch capacity of steel plate (stainless or Mild Steel) 2. Cutting 1/2 inch capacity of steel plate (stainless or Mild Steel) 3. Rolling up to 2 inch capacity of steel plate (stainless or mild steel) 4. Welding using mig weld or tig weld on stainless or aluminum metals 5. Pipe Bending and Rolling up to 4 inch dia of B. I. Pipe or stainless pipe   6. Angle Bar of Flar Bar cutting and rolling 1/2 inch thickness 4', 0, 'Plaridel St, Paknaan, Mandaue City, Cebu', '(032) 505-1806 / 316-2364', '', '(032) 420-4646', 'matlas_steel@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(301, 'YKG Industrial Sales Corp.', 'PRODUCTS 1. Aluminum, Brass, Copper & Stainless (Angle & Flat Bars, Shaftings, Rods, Tubes, Sheets, Pipes & Fittings) 2. Black Iron & Galvanized Iron Pipes 3. Cold Rolled and Tool Steel Shaftings (1045, 4140, 4340) 4. Channels Bars, I-Beams & H-Beams 5. Mild Steel Angle & Flat Bars 6. Mild Steel & Checkered Plates 7. Galvanized & Perforated Sheets 8. Purlins & Tubings 9. Tube & Pipe Fittings of all kinds 10. Ordinary and stainless Spring Wires 11. Bolts & nuts of all kinds 12. Welding Rods of all kinds 13. Industrial Valves', 0, '7-9 M. C. Briones St., Cebu City, 6000', '(032) 255-0870 to 73', '', '(032) 255-0873; 412-1908', 'ykgindustrial@gmail.com', 'COD', '', '', '', 'Active'),
(302, 'Worldwide Steel Group, Inc.', 'PRODUCTS 1. Deformed Steel Bars, Plywood, Smartboard, Phenolic Boards, Holcim Cement, Angle Bar, Deformed Wire Rods, Steel Matting/Wire Mesh, C-Purlins, Metal Framings, Nails, Finishing Nail Wires, Corrugated Sheets, Umbrella Nails, G. I. Wire', 0, 'Sacris Road Ext., Mandaue Cebu 6014', '(032) 346-0959; 345-0458: 344-0660', '', '(032) 345-3748 to 49', '', 'COD', 'Distributor', '', '', 'Active'),
(303, 'Tokyu Hardware & Industrial Supply', 'STEEL ITEMS 1. BARS - deformed, angle, channel, flat, plain, square and c-purlins 2. STEEL PLATES - various sizes of mild steel, checkered, boiler, A. R. and A. B. S. plates 3. BEAMS - various sizes of wide flange, beams & I-beams 4. PIPES - B. I. & G. I., Aluminum, brass and copper 5. SHEETS - stainless, G. I., Alumuminum, Brass and Copper 6. SHAFTING - CR, tool steel and stainless 7. TUBE - B. I., stainless, square, rectangular and copper 8. FITTINGS - Sch 40 - 80, G. I.. B. I. & Stainless Fittings  INDUSTRIAL ITEMS 1. POWER TOOLS (AEG, MAKITA, POWER CRAFT) - percussion drill, rotary hammers, angle grinders, jigsaw, belt sanders, demolition hammer 2. PRECISION TOOLS - air compressors, hand chisel, REIN STAG, hot air gun, crimping tools, automotive tools, plumbing tools, CIGWELD, gas cutting outfit, LENOX 3. MACHINE TOOLS 4. TOOLING 5. CUTTING TOOLS 6. INDUSTRIAL EQUIPMENT  HARDWARE ITEMS 1. Drill Bit, Hand Tap, Tool Bit 2. Abrasive - Sand Paper, Cutting and Grinding Wheels 3. AIR COMPRESSOR - various CFM and model 4. CHAIN BLOCK - hydraulic jack, overhead hoist motor 5. HOSE - hydraulic, fire nylon, rubber and high pressure hoses 6. MOTOR - electric motors various type and model 7. WELDING ROD - Nihon Weld, Fuji, Wipweld & ferrocord 8. GASKETS - asbestos, rubber gasket, asbestos cloth, asbestos packing 9. WELDING MACHINE 10. CASTERS - various model and sizes 11. VALVES - various types and sizes  CONSTRUCTION ITEMS 1.PVC PIPES AND FITTINGS - various sizes type ATLANTA, MOLDEX, EMERALD, ESLON and NELTEX 2. V arious wires - galvanized, barb wires, cyclone wire, CW Nails and finishing nails 3. EXPANDED METAL and STEEL MATTING 4. BOLTS & NUTS - various sizes of ordinary bolt/nuts, stainless and high tensile 5. Various Paints - Dutchboy, Boysen and Island 6. Adhesives - Apollo, pioneer, rugby and vulcaseal 7. Cement, Plywood  SAFETY PRODUCTS 1. Hard Hat, Welding Mask, Dust Mask, Safety Shoes, Rubber Boots and Welders Coat 2. Safety Gloves - maong cotton, working gloves, leather, welding gloves, industrial and rubber gloves for chemicals  BRANDS CARRIED: 1. WELDING ELECTRODE - NIHONWELD, WIPWELD, FUJI and FERROCORD. 2. CUTTING OUTFIT - COMET and HARRIS brand including SMITH and WIPARC 3. Distributor of - MAKITA, DE WALT, TYROLIT, TAILIN, ULTRA, KEMMAFLEX & STARRETT 4. RIGID, STANLEY, YAMATO, KITZ, UNIOR, SKC, TONE, TAJIMA, and NICHOLSON', 0, '1175-9 Highway 77, Talamban 6000 Cebu City', '(032) 345-1500 / 345-0498 / 416-0088', '', '(032) 344-1344', 'info@tokyuhardware.com', 'COD', 'Importer, Wholesaler, Retailer', '', 'website: www.tokyuhardware.com', 'Active'),
(304, 'CJ KARR Industrial Sales And Services', 'LIST OF PRODUCT LINES, ERIKS, RANGE OF PRODUCTS EXCLUSIVE LINES (HOLLAND), Sheets Gasketing Materials, Compressed Asbestos & Non-asbestos gasket sheet, Fluid Sealing Rubber Gasket Sheet, Granulated & Rubberized cork gasket at continuous length of 45 meters, ERIK’S PRECISION O-RINGS: Nitrile Compound Heat and Oil resistant 105 deg. Cent., Maximum working temperature at continuous service, Viton Compound heat and oil resistant 230 deg. Cent., Maximum working temperature at continuous service, Silicone Compound Heat and oil resistant 230 deg. Cent., For High Temp. Fire, Oxygen, & heated water. Excellent for static application, ERIK''S, OIL SEALS AND V-RING SEAL, ENGINEERING PLASTICS, MECHANICAL SEALS, BALL VALVES, One (1) piece design, stainless steel reduced bore teflon seated, Three (3) piece design, full bore type 316 stainless steel teflon seated, 1000 PSI, SKF BALL & ROLLER BEARINGS/GREASES AND INSTRUMENTS, CROWN Chemicals (USA), Fault Finder Cleaner, Penetrant & Developer; Insulation Tester, Mold Cleaner, Gen., Purpose Silicone Mold ready release, Heavy Duty Silicone Mold Ready Release, Paintable Mold Ready Release, Zinc Stearate, Mold Release, Waterbase Cleaner/ Degreaser, Toolmaker''s Ink-blue, Kleer Kote, Battery Terminal coating, Rus Inhibitor, Penetrating Oil, Corrosion Suppressant/Formula 101, Food Safe Lubricant, Moly, Lift Truck grease, TFE Dry Film Lubricant, TFE Lubricant Permanent Film, Dry Moly Lube, Red Insulating Varnish, Prussian Blue Spot Indicator, Freon TF Degreaser, Cold Galvanizing Compound, Cutting Oil, Lithium Grease, Moly Oil, Open chain lube, HD open gear/wire rope, box-saver-tan & white, High Temp. Paint-Black & Aluminum, All 4 Moisture Displacing Lube, Welder''s Anti-Spatter Liquid, General Purpose Silicone Lube, Drive Belt Dressing, General Purpose adhesive, Heavy duty cleaner/ degreaser, electronic component cleaner, Freeze it, Anti-seize compound, tap tool Heavy Duty Cleaner, Off-line Contact Cleaner Devcon, Epoxies, Urethanes, Adhesives and Sealant Maintenance chemicals, Tig welding machines – gensiang, Expansion joints and bellows, Rnw pacific pipes (erw gi/bi pipes & fittings), Hyundai welding electrode', 0, 'Dr # 2, E & R Bldg, Hernaez Ext., Prk. Kabukiran, Taculing, Bacolod City', '(034) 709-0130 / 446-3843', '', '(034) 446-3843', 'cjkarr_bac@yahoo.com', 'COD', 'Distributor', 'Mr. Ramil Arquilola-Technical Sales Representative', '', 'Active'),
(305, 'Goldensteel Construction Supply', 'Wide Flange, Tubulars, Square Bar, Deformed Bars, GI/BI Pipes, Flat Bars, Light Metal Frames, C-Purlins, Round Bar, Angle Bars, Channel Bars, Pre-Painted Roofing, PVC Pipes, Cements, Pipe Fittings, Gate Valves, Check Valves', 0, 'G/Floor, Casals Building, Pagsabungan Mandaue City', '(032) 405-3262 / 0998-5394-560 / 0942-356-6747 / 0910-613-2888', '', '(032) 414-4584', '', 'Advance Payment-Bank to Bank Transaction', 'Distributor', 'Ms. Menia', '', 'Active'),
(306, 'RJ Spring Rubber & Metal Parts Manufacturing Corp.', 'Manufacturer of all kinds of spring, rubber, metal stamping and metal fabrication,  bended wire. SPECIALIZE in:  Compression, Torsion, Tension Springs etch, metal fabrications and engineering plastic fabrication, vulcanizing & molded rubber products.', 0, '#171National Road, Ortigas Ext., Brgy. Delapaz, Antipolo City, Rizal', '(02) 658-1951; 384-9315; 473-0433; 215-3069', '', '(02) 658-1987', 'sales@rjspringrubber.com', 'COD', 'Distributor', '', 'website: www.rjspringrubber.com', 'Active'),
(307, 'Moldex Products Inc.', 'O-ring Type PVC-U DWV Sanitary Piping System  PIPES  FITTINGS Bend 45 degree, Bend 87.5 degree, Single Branch Tee 87.5 degree, Double Branch Tee 87.5 degree, U-trap with plug, Single Branch Wye 45 degree, Double Branch Wye 45 degree, Double Socket, Eccentric Reducer, Clean out with plug, flat bottom o-ring, round bottom o-ring  Water Pipes and Fittings PE Fusion Pipe & Fittings All Purpose, Heavy-Duty, High Density Polyethylene Pipes PVC-U Heavy Duty Rigid Electrical Conduit PVC-U Flexible Electrical Conduit Fire Sprinkler Press System PVC Films PVC Pipe Cement Zero-toluene PVC-U Drain, Waste and Vent Sanitary Piping System', 0, 'Moldex Building., Ligaya St., Cor. West Ave., Quezon City', '(032) 373-8888 / 373-4009 / 0917-863-9237', '', '', 'sales@moldex.com.ph', 'COD', 'Distributor', 'Mr. Dennis Blanc-0917-863-9237', 'website: www.mpi.moldex.com.ph', 'Active'),
(308, 'Gibrosen Fire Safety Products', 'SERVICES 1. Installation Services-Contractor 2. Installation of Automatic Sprinkler System 3. Fire Alarm System 4. Fire Protection System 5. Kitchen Fire Suppression System 6. Fire Hydrant System 7. CCTV Alarm System 8. Fire Safety Products & Equipment 9. Industrial Products Equipments & Services 10. Manufacturer/Wholesaler/Retailer-GIBROSEN Fire Extinguisher', 0, 'Door # 2 Triple E''s Siasat Bldg., Burgos Ext., 4th Road, Villamonte, B. C.', '(034) 434-2881', '', '(034) 708-7299', '', 'COD', 'Contractor', '', '', 'Active');
INSERT INTO `vendor_head` (`vendor_id`, `vendor_name`, `product_services`, `category_id`, `address`, `phone_number`, `mobile_number`, `fax_number`, `email`, `terms`, `type`, `contact_person`, `notes`, `status`) VALUES
(309, 'Phil-Nippon Kyoei Corp.', 'EXCLUSIVE PRODUCT LINE 1. Boilers, Water Treatment and Chemicals 2. Fresh Water Generators 3. Pumps 4. Marine Diesel Engine 5. Industrial Valves 6. Anti-Sway Motor 7. Anchor Windlass                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        9. Heavy Equipments  GENERAL PRODUCT LINES 1. Marine Vessel and Auxiliaries 2. Diesel Generating Power Plants 3. Refrigeration Compressors, Insulating Panel and Racking System 4. Switches/Sensors 5. Pumps 6. Compressors 7. Purifiers 8. Boilers 9. Pipes & Fittings 10. Separators 11. Electrical Control 12. Turbo Chargers 13. Marathon Hose 14. Nautical Equipment  ENGINEERING SOLUTIONS & SERVICES Boiler Inspection, Analysis, Troubleshooting and repair, tube replacement, burner troubleshooting and repair, combustion control upgrade, feed water line, feed pumps, water softener, valves, steam line, safety valves repair and installation, refractory repair and replacement, chimney/flue and duct cleaning, boiler preventive maintenance.  Fresh water generator inspection, troubleshooting, repair & insstallation.  Hydraulic and Pneumatic System Design, Repair, Servicing and Installation of Hydraulic and Pneumatic Cylinders, Pumps, Motors, Power Units & Valves.  Repair and Maintenance of all equipment parts, spares and auxiliaries pertaining to power, petrochemical and marine industries.  Provide on-board performance testing using state of the art combustion analyzer to assess practical maintenance activities and replacement parts that reached service life.  Conduct a comprehensive energy audit of industrial plants and commercial building to align design and actual electrical load consumption. Corresponding practical  reccomendations will be advised the correct electrical recommendations thru workable maintenance and operations.  Repair and turn key, installation Refrigeration and Air-Conditioning Equipment.  Repair and Installation and Commisioning of Lube Oil/Fuel Oil Purifiers/Turbo Chargers/ Air Coolers  Supply, Turn Key, Installation and Commissioning of Power Plant.  OTHER PRODUCTS MECHANICAL Valves, Air Motors, Electric Chain Hoists, Hydraulic Power Units, Pressure Gauges, Flowmeters, Tachometers, Valves, Positioners, Valve Mounted, Process Controls, Control Systems, Air Filters Regulators, Lock-up Valves, Transfer Valve Regulator, Reducing, Back, Liquid Pressure and Differential Pressure Controls for Steam, Gas Services Signal Conditioning, I/P for Field Installation Switches.  INSTRUMENTATION & ELECTRICAL Level Switches, Sensors, Cables and Accessories, Temperature Transmitter Circuit Breakers, Servo Motors, Thermometers and Well Temperatures, Thermocouples, Thermo Elements, Temperature Gauges, Switches, Pressure Switches, Volumetric Flow Meters, Oxygen Analyzers, Ultrasonic Transmitters, Mill Roll Lift Detectors, Dial Thermometers, Torque Anti-Sway Motors, Level Transmitters, Reconditioning of Nozzle Tips, Plungers and Barrels, Delivery Valves', 0, 'S705 Royal Plaza Twin Towers 648 Remedios St., Malate, Manila', '(02) 400-5778 / 328-3270', '', '(02) 400-9130; 310-0649', 'allan.velarde@philnippon.com.ph', 'COD', 'Distributor', 'Mr. Allan B. Velarde', 'website: www.philnippon.com.ph', 'Active'),
(310, 'Able Machine Industries', '1. FABRICATION OF FUEL STORAGE TANKS 2,000 - 6,000 U.S. gal. & up capacity using MIG Welding  2. REPAIR OF ALUMINUM TANKERS & IRRIGATION PIPES Using TIG (High Frequency) (Welding & MIG Welding)  3. FABRICATION OF STAINLESS Stair Railings, Table Sink, Electrical Enclosure, Bending of Plates', 0, '618 Ylac Ave., Villamonte, Bacolod City', '(034) 435-5960', '', '(034) 433-0009', 'ablemachineind@yahoo.com', '30 days PDC', 'Contractor / Machine Shop', 'Mr. Oscar B. Rojas Jr. - 0917-301-6321', '', 'Active'),
(311, 'First Pilipinas Power and Automation, Inc.', 'PRODUCTS: Generators, Automatic Voltage Regulator, Automatic Voltage Regulator, Manual Transfer Switch, Automatic Transfer Switch, Transformers, AC/DC Motors, Motor Starters, Soft  Starters, Variable Speed Drives, Gear Motors, Lightning Protection, Surge Protection, Ground Resistors, LV & MV Switchgear, Motor Control Centers, Power Distribution Panels, Capacitor Banks, Genset Synchronizing Panel. AUTOMATION: Programmable Logic Controller (PLC), Human-Machine Inteface (HMI), Distributed Control System (DCS), Supervisory Control and Data Acquisition (SCADA), Instrumentation for  Level, Pressure Flow, Temperature, Weighing Gas & Fluid Analyzers, Loop Controllers, Fieldbus, Profibus.  SERVICES Project Engineering & Management, Installation, Testing & Commissioning, Preventive Maintenance and Maintenance Contracts, Transformer Repair, Rewinding, Reconditioning, Generator Set Repair/Electric motor Repair or Reconditioning.', 0, 'Unit 1609 Cityland Tower 2 H. V. Dela Costa St., Salcedo Village, Makati City 1227 Philippines', '(02) 666-1843 / 892-1914 / 0922-881-4382/0927-311-5672', '', '(02) 753-1501', 'anne.teves@firstpilipinas.com', 'COD', 'Distributor', 'MS. Anne Teves/Jed Balaod - 0922-881-4382/0927-311-5672', 'website: www.firstpilipinas.com', 'Active'),
(312, 'LP Solutions', '1. Filtration 2. Lubrication 3. Conveyor 4. Tools & Instruments 5. Condition Monitoring', 0, '3/F Leeleng Bldg., 718 Shaw Blvd., Mandaluyong City, Phil, 1552 ', '(02) 723-7767 to 70 / 0999-855-3875', '', '(02)-726-5461', 'sales@le-price.com', 'COD', 'Distributor', '', '', 'Active'),
(313, 'Starlube Corporation', 'PRODUCT LINES: RIMULA R3+40 CF, DELO GOLD SAE 40, RIMULA TX 15W/40, RIMULA RX 15W40 CI-4/, DELO GOLD /500 15W40 CI-4 , TELLUS S2 V68, RANDO AW 68, GADUS S3 V220 C 2, GADUS S3 V220 C 2, high impact grease, GADUS S3 Wire Roap A, TURBO T-68, OMALA S2 G 150, OMALA S2 G 220, OMALA S2 G 320, ARC TRANSFORMER OIL, Degreaser (Water Base)', 0, 'Camia Street, Espinos Village 1, Circumferential Road, Bacolod City', '(034) 446-2420 / 446-2174', '', '', 'starlubecorp@gmail.com', 'COD', 'Distributor', 'Ms. Malou A. Derrama', 'COR TIN No.: 004-249-850-000 (VAT)', 'Active'),
(314, 'Berpa-Flex Technologies', 'PRODUCTS: A. FLEXIBLE PIPES / EXPANSION  JOINT (SS MATERIALS / FABRIC) - FABRICATION 1. Single and Multi Bellows 2. Single and Multi-Ply Bellows 3. Flange and Flangeless Flexible Pipe 4. Standard or made to order B. RUBBER PRODUCTS 1. Rubber pads and Gaskets 2. Rubber Impellers, Bushings. 3. O-rings, Rollers, Gaskets, Diaphragms 4. Rubber Expansion Joints. 5. Mechanical Seal.  SERVICES: 1. Machining 2. Design and Fabrication (Mechanical) 3. Repair of Industrial and Marine Boilers Super Heaters, Air Heaters D. Marine Hot Works. E. Repair and Reconditioning of all kinds of Industrial Pump. F. Fabrication & Assembly of Agricultural Machineries & Farm Implements.', 0, 'St. Michael Subdivision, Alicante, E. B.Magalona, Negros Occidental', '0908-1092-386 / 0917-4631-769', '', '', 'berpaflextech@yahoo.com / berpa_bacolod@yahoo.com.ph', 'COD', 'Contractor / Machine Shop', '', '', 'Active'),
(315, 'Filtertech General Trading', 'PRODUCTS Stainless Steel Filter Housings Melt Blown Filter Cartridges Membrane Filter Cartridges Pleated Filter Cartridges Carbon Filter Cartridges Wound Filter Cartridges  > Water Treatment Equipments & Parts Supply > Filtertech Filtration-Bags, Sterile Filter, Vent Filter, Dust Collectors, Ultrafilters, Mist Filters, Particulate Filters, Filter Cloth, Filter Press, Sintered SS Filters, Chillers, > Pumps-Oil Seals, Gaskets, Orings, Rewinding, Wires > Aircon AHU-Primary Filters, Bag Filters, Varicell, Mini Pleats, Hepa Filters, Ulpa Filters > Aluminum Glass Windows, Doors, Curtain Wall > Fuels and Lubricants > Water Refilling Station, Building & Installation > Power Transformers & Gen Sets > Automotive Filters, Oil Filters, Hydraulic Filters, Fuel Filters >Chemical Pumps, Air Operated Diaphragm Pumps >Valves, Meters, Gauges', 0, 'N & N Bldg., Cortes Ave. Maguikay, Mandaue City', '(032) 505-8490 / 0922-2266-86 / 0920-2593-077', '', '', 'filtertech_cvsale@yahoo.com', 'COD', 'Distributor', 'Mr. Jeovani C. Pigarido(Area Sales Manager)', 'COR TIN No.: 161-817-584-000 (vat)', 'Active'),
(316, 'Compresstech Resources, Inc.', 'riprocating compressors pet riprocating compressors rotary screw compressors oil free/variable speed rotary screw compressors centrifugal air compressor oil free & dental lab compressor oxygen & nitrogen generator portable compressors and generators desiccant dryers combined dryer refrigerated air dryer air filters oil filter & filter element automatic condensate drain system controllers & air audit inverters air leak detection parts & service plug & flow piping system flow sensor and data  logger blower/vacuum pumps fluid handling metallic & non-metallic diaphragm pumps piston pumps electric diesel & oil pumps manual/air operated grease pumps manual/air operated oil pumps waste oil drain receiver fluid metering & dispensing device electronic tire inflator washing tank manual/air operated grease gun hose reels for air, water, grease, oil & electricity progressive cavity pump material handling spring & air balancer manual/air electric hoist air/electric/hydraul winches cordless power tools air starter riveter, Ingersoll  Rand, Niower Systems, SEEPEX., BOGE, SFSCurtis, RISHENG, COAIRE AIR COMPRESSORS, INFINITY, ARMSTRONG, GAST, INMATEC (The World of Gases), CSiTEC, BEKO, SAMOA, POWERLINK, KYUNGWON COMPRESSOR, AIRpipe, FLUID HANDLING TOOLS (Made in Italy), MANN+HUMMEL,  VACON (DRIVEN BY DRIVES), INVT, SIMPLAIR, AIRMAN, Air tools Ratchet, impact wrenches, tire buffers, air hammer/needle scaler, air saw/angle grinder, Air drill, screw driver, ar sander, chipping hammer, paving breaker, digger   Air tools accessories Impact sockets, recoil hose, quick connect couplers, filter regulator & lubricator, Pneumatic tool oil, chisels', 0, 'CRI Bldg., 665 Pres. E. Quirino Ave., Malate Manila', '(02) 567-4389 to 95 to 98 / 0922-8063885', '', '(02) 567-4397', '', 'COD', 'Distributor', 'Ms Agnes (Cebu Branch) -0923-658-9375', 'www.compresstech.com.ph / AFFILIATES\nENERPRO  MARKETING,   INC.\nCRI Bldg., 665 Pres. E. Quirino Ave., Malate Manila\nTrunkline: (632) 567-4389 to 95 to 98\nFax No.: (632) 567-4397\n24 Hour Hotline: 0918-9421152/0922-8161261/0917-6245208\n\nAEONSTAR MULTIPRODUCTS SALES, INC.\n', 'Active'),
(317, 'Access Frontier Technologies, Inc.', 'Electromechanical > Element 14 > Newark  Power > TDK Lambda > Vicor  Test & Measurement > Fluke, Fluke Calibration, Fluke Networks, Pomona, EXFO, ECOM, OFIL, HIOKI  Telecommunication > Amplus communication, Grentech, Emerson Network Power, Maestro Wireless  Enterprise Network > Wireless Network, Wired Network, Network Security, Network Optimization  Outsource > SMT Printing Production & Tools, Safety Equipment  ELECTROMECHANICAL COMPONENT LED Driver, High-Capacitance-Electrolyte Capacitor, Slide Switch (2 series DPDT Through Hole 16A, 250V) TPS2660x Industrial eFuses from Texas Instruments, A7xx Series Aluminum Polymer Capacitors from KEMET OsiSense XS  Inductive Proximity Sensors From Schneider Electric, Industrial RJ45 Push Pull Connector -  variant 14 from TE Connectivity.  POWER POWER MODULE/ON BOARD TYPE, SYSTEM POWER SUPPLY, TDK-LAMBDA Noise Filter, ELC/ELV-SERIES  TEST & MEASUREMENT Fluke 8808A Digital Multimeter, Fluke 8846A AND 8845A Digital Multimeter  Telecommunication 2W-200W Outdoor C-Band Transceiver (70MHz), 2W-200W C Band BUC (L Band) 70MHz & L-Band Satellite Modem, L band to 70MHz Converter, Redundant System,  Ku/C Band PLL/DRO LNB/LNA  Multimeter, Clamp Meter, Industrial Thermal Imager, Earth Ground Tester, Earth Ground Tester,  Airflow Meter, Temperature Humidity Meter, Carbon Monoxide Meter, Aspirator Kit , Particle Counter Contact Thermometer: Fluke 561 Infrared and Contact Thermometer, ', 0, 'Unit # 207 Grand Arcade Bldg., AC Cortez., Mandaue City 6014, Cebu, Philippines', '(032) 420-2429, 420-7818, 239-2629', '', '(032) 345-0510', 'georgeliwag@accessfrontier.net', 'COD', 'Distributor', 'Mr. George W.F. Liwag - Cebu Branch Head', '', 'Active'),
(318, 'Flex-a-Seal Industrial Supply and Services', 'Mechanical Seals, Gland Packings, Gaskets, O-rings, Filter Clothes  1. MECHANICAL SEALS > Single Spring, Multi-Spring, Rubber Bellows Type Seal Design Seal Face Material >Carbon Vs. Ceramic >Carbon Vs Silicone Carbide >Silicone Carbide Vs. Silicone Carbide >Tungsten Carbide Vs. Tungsten Carbide etc.  SECONDARY SEAL (RUBBER ELASTOMER) > Nitrile, Viton, Epdm, Epr, Pure Teflon, Teflon Coated Rubber, Aflas, Expansion Joints, Insulation Glass, Ceramic Cloth, tape & board, All kinds of valves, strainers, couplings, special electrodes, bolts and nuts, electricals, measuring tapes, steel/ceramic/rubber brush on chemical lubricants, filter clothes, all industrial safety equipments', 0, 'Blk. 2, Lot 29 Eufemia Compound Circumferential Rd., Taculing, Bacolod City', '(034) 458-3290 / 213-5221 / 0939-955-3716 / 0998-9896-690 / 0922-8051-480', '', '(034) 458-3290 / 213-5221', 'flexaseal@yahoo.com, simonsingo38@yahoo.com', 'COD', 'Distributor', 'Engr. Simon T. Singo - 0939-955-3716 / 0977-064-5056', 'TIN Number: 946-180-356-000', 'Active'),
(319, 'AVK Philippines Inc.', '1. Gate Valves (Ductile Iron & Bronze) 2. Butterfly Valves (Concretic, Offset, Resilient Seated, Metal Seated) 3. Couplings & Adaptors 4. Fire Hydrants 5. Bail Valves 6. Pressure Control Valves 7. Repair Clamps', 0, '70 Wes Ave. West Triangle Quezon City', '(02) 376-6400 to 01 - 02-376-6399', '', '(02) 332-0609', 'sales@avk.ph', 'COD', 'Distributor', '', '', 'Active'),
(320, 'Bernabe Construction & Industrial Corp.', 'LINE OF WORKS > General Construction - roads, highways, bridges, buildings, site development, etc. >  General steel fabrication. > Car Assembly/Manufacturing Equipment - Painting Oven and booth, Electro-Deposit Coating Line,  Assembly Line and others. > Elevated, Underground and Surface Storage Tanks for water, oil, gas, chemicals, molasses and  pressurized vessels all according to ASME Code, Sec. VIII and API 650 Standards. > Design and Fabrication of Sugar Process Equipment - SRI Clarifier, Evaporator, Juice Heater,  Vacuum Pan, Crystallizer, Mill Installation, Massecuite Reheater. > Conveyors - Belt, Screw Conveyor, Bucket elevator, Sugar intermediate main cane carrier and  Auxiliary Chain Cane Carriers Cement, Mining, Paper mills, among others. > Pressure Vessels, Atmospheric Tanks, Floating Roof and Telescopic Tanks. > Steel forms (Moulds) for Pre-Cast and Pre-stressed concrete. > Bottling - Bottle Washer Carriers (Soaker). > Bailey Bridges and accessories. > Steel Towers and Structural Steel for building, factories and warehouses. > Dam and Irrigation facilities - Penstocks, dam and irrigation gates and accessories. > Water and Sewage Treatment Facilities - Purifier, Clarifier, Water Softeners, Stainless Blending  and Settling Tanks, etc. > Sugar Mills and Mining equipment and facilities. > Hydraulic Tilting Platforms/Truck Dumpers up to 100 tons. > Cane Gantry and other loading /transloading facilities. > ON and OFF the road (Farm and Highway) Trailers - Tanks, Bulk Sugar Trailers, Molasses, etc. > Farm implements - Harrows, Plows, Tractor attachments and other allied implements. > Rail Box cars, Steel Rail Ties and Cane Containers. > Foundry works and machine shops. > Smokestacks, Bugles, Racks, Cyclone, Ducting, Industrial Exhaust Fans and Blowers. > Shearing, Rolling and Bending; Dishing and Flanging services. > Fabricated Rolled Steam or Condensate Pipes. > Water Spray Ponds. > Distillery equipment and facilities - Distilling columns, Bubble caps, etc. > Project Engineering and Management. > Plant erection, Machinery and equipment installation - contract and/or cost plus. > Domestic and International Trading:  A. TAM S.r.l. (Italy) Hydraulic Hook-lift B. BONEL Mfg. (Australia) - Farm implements and Cane Harvesters  (chopped/whole stalk) C. Copper and Stainless Tubing (all sizes) D. Hydraulic Platform Truck Dumpers  (Tippers) E. Special Steel Application - heat and abrasive resisting plates, high tensile up to 155,000 PSI  tensile strength, mill shaft and other special application steel', 0, 'Roosevelt Avenue, Quezon City', '(02) 292-3401 / (02) 292-1540 / (02) 293-7625', '', '(02) 292-1745', 'bernabeconst@yahoo.com  / bernabeconstruction@yahoo.com', 'COD', 'Distributor', '', 'WEBSITE ADDRESS: http://bernabeconstruction.weebly.com', 'Active'),
(321, 'Dawson Technology PTY LTD.', 'PRODUCT LINES 1. Design an dmanufacturer of "Si-TEC Xtend" Integrated Digital Governors Hydraulic Amplifiers 2. CGC (Co-Generator Control) Governors for wide range of steam turbine generators. 3. GSM (Generator System Master) Control for Automatic Grid Synchronizing and load control. 4. ADG (Advanced Digital Governor) for steam turbine drives, (eg. Shredder, Mill, Fan, Knife, etc) 5. Advanced Software for Diagnostic (PC Tune) and data logging & remote monitoring (Data View) 6. Accessories including Opal Annunciator, Temperature, Scanner, Remote I/Os, MPU Expander, Etc. 7. Digital Integrated Governors (including CGC, TGC and ADG) for Diesel Engine Applications.  SERVICES OFFERED: 1. Governor retrofit/upgrade, design for optimum solution, site commissioning and training. 2. Governor services including service/calibration of hydraulic amplifiers & mechanical governors. 3. Design consultancy and the following engineering services using DigSILENT Power Factory Software through our subsidiary company Dawson Engineering.', 0, '231 Holt Street, Eagle Farm Queensland 4009, Australia', '+61 738-684-777', '', '+61 738-684-666', 'remesh@govtec.com', '', '', '', '', 'Inactive'),
(322, 'Deco Machine Shop', 'PRODUCT LINES: Gears, Sprockets, Pins, Bushings, Blowers, Impellers, Compressors, Valves, Seaming, Chucks & Rolls, Bottling Vent Tube, Linear Shafts, Conveyors, Rollers, D2 Punches & Dies.  SERVICES OFFERED: Engine Rebuilding, Computerized (CNC) Machining, Dynamic, Balancing 1 kg -10,000 kg, Zvibratory Stress Relieving, Fabrication and heat treatment of gears, gearbox rebuilding, on site Machining & Repair Exhaust Valve, Satellite Rebuilding, Resurface of Lathe Redways, Blade Sharpening (10fit Max). Laser Alignment of Gensets, Pumps, etc.', 0, 'J. P. Cabaguio Avenue, Davao City', '(082) 226-4338', '', '(082) 226-4339', 'sales@decomach.com', '', 'Machine Shop', '', '', 'Inactive'),
(323, 'Dynamic Castings', 'PRODUCT LINES OR SERVICES OFFERED: 1. MILL ROLLER BEARINGS - Mill Journal Bearing for WALKER MILL (SAE 67), Mill Journal Bearing (SAE 67), Water Cooled Top Jurnal Bearing (SAE 67), Mill Bearing (SAE 62), Top Roll, Bearing Liner (SAE 63) Top Roller Upper half Pintle Side (SAE 67), Top Roll Journal Bearing (SAE 67), Bearing Half Top Roller (SAE 63). 2. CHAIR LINER - Mill Roller Journal Bearing (SAE 67), Bottom Roll Bearing Liner (SAE 67), Bottom Bearing Liner of Mill Feed & Gear Side (SAE 63), Mill Top Roll Bearing Liner (SAE 63). 3. TRAVELLING GRATES - bigelow Traveling Grate Split Type (Aluminum Bronze 9D). 4. CROFT LINERS - Bottom Roll Liner for walker Mill (SAE 67) Top Roller Journal Bearing (SAE 67), Croft Gear  Liner (SAE 67), Split Bearing Liner Assembly for Pillo Block Bearing Final Motion (SAE 67) 5. PISTON LINERS - {iston Segment (SAE 63), Hydraulic Piston Liner For Farrel Mill (SAE 67). 6. PUMP IMPELLERS - Centrifugal Pump Multi-Stage Close Type Assembly (SAE 62). 7. MILL BEARINGS - Bearing Bottom Roller Discharge Pintle Pinion Side (SAE 67).', 0, '473 Gerardo Quano Street, Alang2x, Mandaue City, Metro Cebu', '(032) 345-6171 / 346-0300', '', '', 'cebu@dynacast.ph / pollyngo@dynacast.ph / ck@dynamicpower.ph', '', '', '', '', 'Inactive'),
(324, 'EESI Material and Controls Corp.', 'PRODUCT LINES OR SERVICES OFFERED: 1. SIEMENS SC Process Instrumentation (Germany) - Pressure, Temperature, Flow, Level, Weighing Technology,  Valve Positioners & Protection Relays 2. SIEMENS Drive Technologies & Motion Control - (Germany) - LV & MV Motors, MV & LV Drives, Standard Drives 3. SIEMENS Process Analytics (Germany) - Continuous Gas Analyzers, Process Gas Chromatograph. 4. BAUMER Process Instrumentation (France) - Pressure& temperature Measurement & Control,  Level & Liquid Quality Measurement & Control. 5. PHOENIX Contact 9germany) -Industrial Connectivity and Interface Systems, Industrial Automation,  Surge & Lighting Protection. 6. Temperature Sensors Services Pte. Ltd (singapore) - Temperature Sensors (RTD, TC). 7. Ametek O'' Brien Analytical (USA) - Analyser Sample Transport & Conditoning Systems, Instruments Shelter and Mounting Systems. 8. Dr. A. Kuntze (Germany) - Water/Liquid Quality Measurement & Control System. 9. Rittmeyer (Switzerland) - Flow and Level Measurement & Control for the Hydro-Electric Power Industry. 10. Lacroix Sofrel (France) - Wireless dataloggers and SCADA systems for the water and water industry. NAGMAN Instruments & Electronics Ltd. (India) - Calibration Standards, Systems & Softwares, Test & Measuring  Instruments, Consultancy for Calibration Laboratory Set-up.', 0, '124 A. N. Manapat St., Poblacion Arayat, Pampanga / Unit 1402 14th Floor The One Executive Office Building # 5 West Ave, QC', '(02) 410-3622', '', '(02) 351-7775', 'mar.ignacio@emcc.com.ph / sales@emcc.com.ph / emil.enriquez3 @emcc.com.ph', '', '', '', '', 'Inactive'),
(325, 'Festo, Inc.', '1.	PNEUMATIC, Complete range of cylinder, valves, sensors, filters, regulators, lubricators, vacuum units, valve sensors, terminals, tubing, fittings and accessories. 2. Process Automation: Pneumatic and electronic products, process valves, instrumentation and controls for Process Automation. 3. Electronic: Industrial PC Electronic Programmable Logic Controllers, Software and Interface, etc. 4. System: Design, Installation, Programming and Commissioning of Control Engineering Projects. 5. Didactic: Weekly, Hands on, Seminar for Engineers, Technicians and Technical Instructors, Hardware and Tech ware for Technology Training', 0, 'Km. 18, West Service Road, South Super Highway, 1700 Parañaque City', '1800-10-12(FESTO) 33786', '', '1800-10-14(FESTO) 33786', 'festo_ph@ph.festo.com', '', 'Distributor', '', '', 'Inactive'),
(326, 'ICI Systems Inc.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Endress + Hauser  - Leading Supplier of Measuring Instruments and Automation Solutions for the Industrial Process Engineering Industry. 2. Anton Paar- High Quality Measuring and Analysis Instruements for Laboratory and Process Applications.', 0, '14F Belvedere Tower # 15 San Miguel Ave., Ortigas Center', '(032) 344-1584 (Cebu) / (02) 637-8577 - Head Office', '', '(032) 344-1584 (Cebu) / (02) 633-5127 - Head Office', 'cebusales@icisystems.net / customer.care@icisystems.net', '', 'Distributor / Supplier', '', '', 'Inactive'),
(327, 'Ishan International Pvt. Ltd.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Mill Rollers (Conventional/Perforated) 1.1 Assembly 1.2 Reshelling 2. Gearboxes/Reducers 2.1 Helical 2.2 Special 2.3 Planetary 3. Rope / less coupling 4. Forged Shafts 5. Forged Chains 6. Mill Pinion & Mill Coupling 7. VFD and Motors 8. SS Tubes 9. Boilers 10. Boiling House Equipment 11. Complete Mills and Head Stocks 12. Bronze Bearing Liners and Box Bearing Liners 13. All Sugar, Hydro and Parmaceutical Machineries', 0, 'B-68, Sector-14, Noida-201 301, UP India', '(+91-120) 2518261 / 62', '', '', 'navneet@ishangroup.co.in / ishan-ho@ishangroup.co.in', '', '', '', '', 'Inactive'),
(328, 'Jan Dale Enterprises Corp.', '1. SCHMIDT + HAENSCH QUARTZ  WEDGE SACCHAROMAT 2. SCHMIDT + HAENSCH Automatic Precision Sugar Refractometer 3. Bio-ethanol Cane and Alcohol Analysis 4. Cane Purity Analyzers with Data Acquisition Systems 5. ISI Automatic pH Liming Stations, SPECTRA 6. ISI High Temperature and TDS Sensors 7. ISI Laboratory pH, DO, TDS Electrodes 8. On-line Process Refractometers,  Brix Controllers 9. Automat Level, Pressure and Flow Instruments 10. ITECA, COLOBSERVER, On Line Colour Analyzer for DRY or WET Sugar 11. ITECA, PART, SIZER: On Line Particle Size Analyzer 12. BATCH PAN MICROSCOPE and video Cam System for Sugar Crystals 13. Temperature Sensors Infrared or Probe Type and Temperature Controllers 14. Laboratory pH, DO, TDS, Color and Turbidity Analyzer 15. Water and Waste Water Automation Equipment 16. Control Valves and Accessories 17. ASL Temperature Calibrators and Calibration Baths 18. Repair and Calibration of Refrometers, Saccharimeters and other sugar analyzer 19. Huba Pressure and level transmitters 20. JAN DALE designed In-line Entertainment Protection Systems. 21. JAN DALE designed Floculant Control Systems 22. Repair and Calibration of industrial weighing scales 23. Conversion of Mechanical Scale to Electro, Mechanical 24. Conversion of Servo Weighers to electro, Mechanical 25. JAN DALE / SCHMIDT, HAESCH LAB, PC AUTOMATION', 0, 'G-19 South Star Plaza, South Superhighway, Makati City', '(+632) 813-1396 / (+632) 806-3006', '', '(+632) 813-1397', 'jandalecorporation@yahoo.com', '', 'Distributor / Supplier', '', '', 'Inactive'),
(329, 'JM Brenton Industries Corp.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Gardner Denver Nash Vacuum Pumps & Compressors 2. Borger Rotary Lobe Pumps 3. Griswold Ansi Process Centrifugal Pumps 4. Neptune Chemical Dosing / Metering Pumps 5. Neptune Agitators & Mixers 6. Graco Air Operated Double Diaphragm Pumps', 0, '2nd Flr., JM Bldg., Superhighway Corner Rocketfeller St., Makati City', '(02) 817-5732', '', '(02) 817-5739', 'jmbicorp@pldtdsl.net', '', 'Distributor / Supplier', '', '', 'Inactive'),
(330, 'Manly Plastics Inc.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Pallets 2. Plastic Crates 3. Trolley 4. Pails (Plastic)', 0, '60 West Ave. CBT Condominium Quezon City', '(02) 373-9797 loc. 141', '', '(02) 373-4750', 'sales@sanko.com.ph', '', 'Distributor / Supplier', '', '', 'Inactive'),
(331, 'Kupler DCMC Philippines Corp.', 'PRODUCT LINES OR SERVICES OFFERED: 1. MOBIL LUBRICANTS - Automotive & Industrial Lubricants', 0, 'Paradise Road, Km 9 Sasa Davao City, 8000', '(082) 234-9018 / (082) 234-8088 / (+63) 922-8544013', '', '(082) 373-4750', 'mobilsales.dvo@kuplerdcmc.com', '', 'Distributor / Supplier', '', '', 'Inactive'),
(332, 'MHE - Demag (P) Inc.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Industrial Crane 2. Crane Components 3. Rope and chain Hoists 4. Warehouse Trucks 5. Docking Equipment 6. Building Maintenance Units 7. Aerial Work Platforms 8. Car Parking Systems 9. Profile Rails 10. Fastening Systems', 0, 'Main Ave., Severina Diamond Ind. Estate KM. 16 West Service Road South Expressway, Parañaque City 1700', '786-7500', '', '786-7555', 'jonathan_gonzales@mhe-demag.com', '', 'Distributor / Supplier', '', '', 'Inactive'),
(333, 'Motology Electric Pte Ltd.', 'PRODUCT LINES OR SERVICES OFFERED: 1. Cycloidar Gearmotor 2. Gearbox, Speed Reducer 3. Roller Chain & Sprocket 4. Conveyor Rollers 5. Conveyor Components 6. Conveyor Belt 7. Gear, Grid, Jaw Flexible Coupling 8. Electric Motor Control 9. AC Induction Motor 10. Design, Fabrication & Estimate', 0, 'Unit 1 RGA Bldg., Suba Basbas, Lapu-Lapu City Cebu 6015', '(032) 494-3844', '', '(032) 494-3844', 'tecmesh@pldtsl.net', '', 'Distributor / Supplier', '', '', 'Inactive'),
(334, 'Omron Asia Pacific Pte. Ltd.', 'PRODUCT LINES OR SERVICES OFFERED: 1. FACTORY AUTOMATION SYSTEM Programmable Controllers Programmable Terminal Variable Frequency Inverter Servomotors/Servo Drives Automation Software 2. SENSING DEVICES Fiber Sensor Photoelectric Sensor Proximity Sensor Photomicro Sensor Rotary Encoder Pressure Sensor Displacement/Measurement Sensor Vision Sensors/Machine Vision System Code Readers/OCR Ultrasonic Sensor 3. INDUSTRIAL DEVICES/ELECTRONIC AND MECHANICAL COMPONENTS: General Purpose and Power Relay PCB Relay Solid-state relay Basic Switches Limit Switches Timers/Counters Cam Positioner Simple Logic Controller Switching Power Supply Temperature Controller Intelligent Signal Processor Gdigital Panel Meter Level Controller Level Controller', 0, '2/F King''s Court II Building, 2129 Chino Roces, Avenue Corner Dela Rosa St., 1231 Makati City', '(02) 811-2831 to 36', '', '(02) 811-2583', 'ph_enquiry@ap.omron.com', '', 'Distributor / Supplier', '', 'Manila Represesntative Office', 'Inactive'),
(335, 'P. T. Cerna Corporation', 'PRODUCT LINES OR SERVICES OFFERED: 1. Rockwell Automation 2. Valves & Pumps Automation 3. Steam Engineering 4. Engineering Services 5. Process Instrumentation Products 6. Power and Climate Controls 7. Sew Mechanical Drive Systems 8. Water and Gas Analysis', 0, 'Unit 2, Yusay Bldg., 23rd St., Brgy. 5, Bacolod City', '(034) 708-1932', '', '(034) 441-2193', 'bacolod@ptcerna.com', '', 'Distributor / Supplier', 'Ms. Caneth B. Ariola (Application Sales Engineer) - 0917-324-6701 / 0919-773-1641', '', 'Inactive'),
(336, 'Process Technik Solutions', 'PRODUCT LINES OR SERVICES OFFERED: 1. P+F-Govan (Australia) - Exd Terminal and Junction Boxes, Exd Local Control units & stations, Exd Flameproof Distributions and Control Stations, Exp Purge Solutions, Exd Control Starters and Signalling Devices. 2. TECFLUID (Spain)-Flowmeters, Level Transmitters, Mechanical Counters 3. ORBINOX (Spain) - Knife Gate Valves, Penstocks, Dampers 4. AUER SIGNAGERATE (austria) - Visual Signalling Equipments and Signal Towers, Visual Audible Signalling Equipments, Ex Audible Signalling Equipment, Ex Telephone and Ex Accessories. 5. ELDON ENCLOSURE SYSTEMS (Netherland) IP66 Rated Wall Mounted Panels, IP66 Floor Standing  Enclosures and Accessories 6. MAUSA (Spain) - Continuos and Batch Centrifugals, Separator Centrifugals, Filtration (Rotary Vacuum Filters, Vacuum Belt Filter Pressure Filter), Drying - Peaddle Dryer, Rotary and Cooler, Rotary Flakers) Pumps, (Vacuum Liquid Ring, Lobe Pump, Evaporation (Falling Film, Batch Vacuum Pans). 7. LOESCHE (Germany) - Vertical Grinding Mills for Solid Fuels, (Coal, Biomass, Wooden Pellets), Mobile Grinding Plants for Solid Fuels. 8. PEKOS (Spain) - Ball Valves, Actuated Ball Valves, Special Designed Ball Valves (Anti-Static and for Flammable Mediums). 9. AYVAZ (Turkey) - Expansion Joints, Steam Traps, Steam Separators 10. FAIRFORD (England) - Soft Starters (Three Phase and Single Phase), Synergy Soft Starters, Centris Medium Voltage Soft Starters. 11. CF NIELSEN (Denmark) - Complete Briquetting Line for Biomass (Bagasse, Rice Husk, King Grass, Wood Chips and etc.)', 0, 'Unit 502 Yrreverre Building, No. 888 Mindanao Ave., Brgy. Quezon City', '(044) 896-3450', '', '(044) 896-3450', 'processtechnik@gmail.com', '', '', '', '', 'Inactive'),
(337, 'Sanyoseike Stainless Steel Corporation', 'PRODUCT LINES OR SERVICES OFFERED: 1. Stainless Steel Sheet 2. Stainless Steel Plate 3. Stainless Steel Pipe 4. Stainless Steel Tube 5. Stainless Steel Bars 6. Stainless Steel Coil', 0, '28th Floor, World Trade Exchange Building, Juan Luna St., Binondo Manila', '(02) 247-9777', '', '(02) 247-7877', 'info@sanyoseiki.com.ph', '', '', '', '', 'Inactive'),
(338, 'Schaeffler Philippines, Inc.', '1. Rolling Bearings, housing Units and its Accessories 2. Maintenance Products 2.a Bearing Mounting and Dismounting Tools. 2.b Online and Offline Vibration Analyzer 2.c Laser Alignment tools for shaft, pulleys and belts 3. Lubricants 3.a Food Grade Grease 3.b Grease for High Load Applications 3.c Grease for High Temperature Applications 3.d Grease for High Speed Applications 4. Professional Services 4.a Bearing Technology and Maintenance Training Course 4.b Bearing Failure and Damage Analysis 4.c Precision Alignment and Dynamic Balancing', 0, '5th Floor Optima Bldg., 221 Salcedo St., Legaspi Village, Makati City 1229', '(+632) 759-3583 to 84', '', '(+632) 779-8703 / (+632) 759-3578', 'campoeva@schaeffler.com', '', '', '', '', 'Inactive'),
(339, 'Schneider Electric', 'The Global Specialties in Energy Management As a global specialist in energy management with operations in more than 100 countries, Schneider Electric offers integrated solution across multiple market segments, including leadership positions in Utilities & Infrastructure, Industries & Machines Manufacturers, Non-residential Building, Data Centres & Networks  and in Residential. Focused on making energy safe, reliable, efficient,  productive and green, the group''s 150,000 plus employees achieved sales of 24 billion euros in 2013  through an active commitment to help individuals and organizations make the most of their energy.', 0, 'Manila Office: 24/Fort Legend Tower, Block 7 lot 3, 3rd Ave. Cor. 31st St. Fort Bonifacio Global City, Taguig City 1634', '(02) 976-9999', '', '(02) 976-9961 or 64', 'customercare.ph@schneider-electric.com', '', '', '', '', 'Inactive'),
(340, 'Schneider Electric', 'The Global Specialties in Energy Management As a global specialist in energy management with operations in more than 100 countries, Schneider Electric offers integrated solution across multiple market segments, including leadership positions in Utilities & Infrastructure, Industries & Machines Manufacturers, Non-residential Building, Data Centres & Networks  and in Residential. Focused on making energy safe, reliable, efficient,  productive and green, the group''s 150,000 plus employees achieved sales of 24 billion euros in 2013  through an active commitment to help individuals and organizations make the most of their energy.', 0, '4th Flr, DISPO Building, AC Cortes Ave., Mandaue City Cebu', '(032) 344-7117', '', '(032) 344-7119', 'customercare.ph@schneider-electric.com', '', '', '', '', 'Inactive'),
(341, 'Siemens, Inc.', 'Automation System  Distributed Control Systems (DCS), Programmable Logic Controllers (PLC), Human Machine Interface (HMI), Operator Panels, Industrial PC.  Control Components & System Engineering Motor Protection Circuit Breakers, Contactors, Thermal Overload Relays, Timing Relays, Soft Starter, Motor Management and Control Devices  Sensors and Communication (Process Instrumentation)  Flowmeters, Transmitters and Switches (Level, Pressure, Temperature, etc.) Sensors, Weighing, Communication Switches, Power Supplies.  Large Drives AC & DC Motors, Low Voltage and High Voltage Motors and VFDs, Explosion-proof motors & drives  Motion Control Variable Frequency Drives (VFD) Motion Control Systems, Servo and Linear Motors, SINAMICS  Mechanical Drives Flender Gear Motors, Couplings, Flender Motox', 0, '14/F Salcedo Tower, 169 HV Dela Costa St., Salcedo Village, Makati City 1227', '(632) 814-9861', '', '(632) 814-9807', 'Carolina.araneta@siemens.com / april.santos@siemens.com', '', '', '', '', 'Inactive'),
(342, 'Simpson''s Phils. Inc.', 'PRODUCTS LINE/S OR SERVICES OFFERED 1. Filter Bags, Cartridge & Housing 2. Hayward Strainers, Automatic Self Cleaning 3. Aviation Fuel Filters 4. Industrial Lube/Fuel Filters, Sewage Wastewater System 5. Filter Presses, Agitators & Pressure Leaf Filter 6. Solid/Liquid Separator 7. Cooling Tower Basin Sweeping System 8. Deepwell Sand Separator', 0, '410 D. Lucas Cuadra St., Sta. Quiteria Caloocan City', '(02) 983-7556/983-7546/983-7572', '', '(02) 983-2286', 'elenperlado@simpsonsphil.com', '', '', '', '', 'Inactive'),
(343, 'Spectrum Chemicals Inc.', '1. Internal Water Treatment for Boilers and Cooling Towers 2. Design/Install/Supply/Commissioning of Reverse Osmosis System/Multi-media Filter/Activated/ Water Softener 3. Upgrading/Rehabilitation of R. O. System 4. Premier Vacuum Pumps 5. Longji Electromagnetic Separator/Jonhking Industrial Chains 6. Prathap Mill Rollers/Barriquand Heat Exchangers 7. Design/Supply/Install/Commissioning of Concrete Type Water Clarifier', 0, 'R. 203 Cityland Con. 8, 98 Gil Puyat Ave., Makati City', '(02) 817-3975/892-8536', '', '(02) 892-9536', 'speche888@yahoo.com', '', '', '', '', 'Inactive'),
(344, 'Prime Opus Inc.', 'Sulzer, Netzsch, Leroy Somer, Wirebelt, Addinol, Kongskilde, Haug, Macintyre, Sandvik, Hafco, TPS', 0, 'B 6 L26 Faith Street, St. Catherine Village, Brgy. San Isidro, Sucat Road, Parañaque City', '(632) 820-1421 / (632) 478-6013', '', '(632) 825-8121', 'primeopus@pldtdsl.net', '', 'Exclusive Agent of Netzsch Progressive Cavity Pumps, Addinol Lube Oil, Kongskilde Industries A/s, Sandvik Carbon/Stainless Steel Belts and Wirebelt U. K.', 'Mr. Sidney S. de la Cruz -0998-580-0041', 'Website: www.primeopusinc.com, TIN Number: 209-100-507-000, SSS No. 03-9142882-5, SEC Reg No.: A200018820, Date of Org: Dec. 14, 2000', 'Inactive'),
(345, 'GPM Trading & Engineering Services', 'Water Pumps', 0, 'Lot 888H, National Highway, Alijis, Bacolod City / Cor. Mabini-Luzuriaga Sts., Bacolod City', '(034) 435 0742/433-1464', '', '', 'gpmengineering_services@yahoo.com', 'COD', 'Distributor', '', '', 'Active'),
(346, 'Topbrass Construction & Trading Corp.', 'Ready Mix Concrete', 0, 'Prk. Paho 2, Brgy. Estefania, Bacolod City', '0949-1150-567', '', '', '', 'COD', 'Manufacturer ', 'Mr. Ismael Fuentes Jr.', '', 'Active'),
(347, 'West Point Engineering Supplies', 'PRODUCTS LINE/S OR SERVICES OFFERED 1. NESSTECH Inc Japan - Temperature and Pressure Gauges 2. Camille Bauer Switzerland - Instrumentation And Positioners 3. Additel Corporation USA - Digital Pressure Gauges and Multifunction Calibrators 4. SSS Co., LTD. - Positioners, I/P Converter, Booster Relay and Filter Regulators 5. Kansai Automation Co. LTD - Level Switch, Level Meter, Level Sensor 6. Fossil Power Systems CANADA-Boiler Level Drum and Valves 7. Samson AG Germany - Control Valves, Steam Conditioning Valve, Flow Measurement 8. Fairford Electronics UK - Soft Starters, Synergy 9. V & t Drive - AC Frequency Inverter 10. Aplisens Poland - Pressure, temperature & level products', 0, 'West Point Bldg., Bacood St., Brgy. Patubig, Marilao, Bulacan Philippines 3019', '(044) 248-3301', '', '(044) 248-3309', 'westpointengineering@gmail.com', '', 'Distributor', '', '', 'Inactive'),
(348, 'Yokogawa Philippines, Inc.', 'PRODUCTS LINE/S OR SERVICES OFFERED 1. Factory and Process Automation Control Systems, Programmable Logic Controller (PLC),  Distributed Control System (DCS) Network Based Control Systems (NCS) 2. Field Instruments - Flowmeter, Pressure Transmitter, Temperature Transmitter, Level Transmitter, Control Valves, Valves Positioner, Field Wireless Products. Pressure Gauge, Temperature Gauge, Temperature Senor. 3. Analyzers-Liquid, pH/ORP, Conductivity, Dissolved Oxygen, Turbidity, Gas, Chlorine, Zirconia, Oxygen, Stack Gas Analyzer, Dust Monitor; Recorders and Controllers-Paperless, Strip Chart Recorder,  Controllers and indicators, Signal Conditioner, Power Monitor. 4. Waveform Measurement & Analysis: Oscilloscopes, scopeCorder, Low Speed DAQ & Industrial Recorder, High Speed Data Acquisition Equipment. 5. Optical Measuring Instruments: OTDR, Optical loss Test Set, Optical Spectrum Analyzer, Ethernet Handheld Tester, Optical Power Meters, Optical Light Source, LD Light Source. 6. Power Monitoring Instruments: Precision Power Analyzer, Digital Power Meters, High Performance Power Analyzer, Digital Power Analyzer. 7. Portable Test Instruments: Digital Multimeters, Circuit Testers, Insulation Testers, Earth Tester, Insulation Polytester, C;amp on Powermeters, Wheatstone Bridge, Resistance Box, Slide Resister,  Galvanometer, Luxmeters 8. Generators/Sources: Source Measure Unit, DC Voltage, Current Source, Synthesized Function Generators. 9. Instrumentation Calibration, Instrumentation Bench Repair, Shutdown Maintenance, Commissioning & Start Up System Upgrading, Panel Engineering and Manufac turing, DCS Software/ Hardware Engineering 10. Training: Process Control and Instrumentation Courses, PLC Training, DCS Training.', 0, 'Topy Industries Bldg., No. 3 Economia St., Bagumbayan, Quezon City', '(632) 238-7777', '', '(632) 238-7799', 'feedback@ph.yokogawa.com', '', 'Distributor', '', '', 'Inactive'),
(349, 'Esetek Equipment (Philippines) Inc.', 'PRODUCTS LINE/S OR SERVICES OFFERED 1. Calibration Services 2. Repair 3. Trading 4. Distributor of Fluke, Megger, Kikusui etc.', 0, 'Unit 507-508 Alpap II Bldg., Madrigal Business Park, Investment Drive, Cor. Trade Ave., Alabang, Muntinlupa City', '772-2301', '', '772-2298', 'jesuspadilla@ph/ese-asia.com', '', 'Distributor', '', '', 'Inactive'),
(350, 'Fabcon Philippines, Inc.', 'PRODUCTS LINE/S OR SERVICES OFFERED MILL AND BOILER DEPT. > Unigrator > Lotus Roll > Thyssenkrupp mills > Wer Scrubbers > NQEA Bagasse Bins > NQEA Truck Dumper > Cooling Towers - Designed for Sugar Mill Water Conditions > Hiniron Core Samplers > Domite Cane Knives & Unigrator Hammer Tips > Elecon Planetary Gear Drive  BOILING HOUSE > Thyssenkrupp Centrifugals > Continuous Vacuum Pans and Crystallizers > Fabcon Jsp Syrup Clarifier > Shrijee Sugar Dryer > Evaporators >VRP Energy Savings and Automation  PROCESS CHEMICALS >cma, ZUCLAR, COLORGONE, I-12, VISC-AID, ARW, SUGAR DECOLORANT  BOILER WATER TREATMENT > FABCOL, FABFOS, FABOX, FABSCALEX, FABCAR  REFINERY CHEMICALS >COLORGONE, PUROLITE DECOLORIZING RESINS  ENVIRONMENT 1. Turnkey Design, Construct, Operate for Waste Water Treatment 2. Turnkey Design, Construct, Operate Wet Scrubber 3. Complete Ash Settling Clarifier Design and Construct 4. Closed Loop Cooling Water System', 0, '12/F Jollibee Center Bldg, San Miguel Ave., Pasig City, Philippines-Manila Office / Rm. 203, St. Jude Bldg., San Sebastian-Gatuslao Sts., Bacolod City - Bacolod Office', '633-4234 to 38 / 435-4741', '', '633-4211 / 435-4741', 'dmvellanueva@fabcon.ph', '', 'Distributor', '', '', 'Inactive'),
(351, 'Rurex', '(Complete Heat Exchangers Solutions), Specialize in Charge Air Coolers Servicing, Repair & New Fabrication offering a one-stop solution.   A. Shell and Tube Heat Exchangers    - Provide a complete solutions for shell and tube heat exchangers e.g      oil coolers,heaters,condenser B. Plate Heat Exchangers C. Other Product and Services     a.Dynamic Balancing of Fans & Blowers     b. Repair/Reconditioning of Fans & Blowers     c. Supply of:           1. Pressure vessels           2. Aircon Coil for Marine Vessels          3. Blower Fans          4. "V" Type Rasiator          5. Finned tubes          6. Radiator for Genset          7. Oil Cooler          8. Remote Radiator', 0, 'Cebu Branch: P.C Suico St. Brgy. Tabok Mandaue City Cebu', '(032)343-9861,239-7361', '', '(032) 343-7165', '', '', '', 'Leonardo Pontillo: Sales Mktg (09328677328), (09178013285)', '', 'Inactive'),
(352, 'NCH', 'A. CHEM-AQUA (Water Treatment)     1. Cooling Treatment     2. Boiler Treatment     3. Solid Solutions     4. ROI Calculation     5.On-Site Water Analysis & Report     6. Water Management Plan-Legionella Risk Assessment     7. Automated Equipment Solution     8. Cleaning & Services B. LUBRICANTS     1. Greases & Oils     2. Specialty Lubricants     3.Release Agents     4.Metal Working Fluids     5. Fuel Additives     6.Water Based Parts Cleaning     7. Cleaning & Services C. WASTEWATER     1.Drains     2.Wastewater Treatment Plants     3.Cleaning & Services     4.Lift Stations     5.Grease Traps     6.Odor Control     7.BioAmp Systems D. OTHERS:     1. Premalube Black     2.Premalube Red     3.Premalube Extreme Green     4.Premalube extreme heatshield     5.Premalube Extreme FG     6. Premalube 0     7.Premalube white aerosol     8.Pureplex FG     9.Certop multi-grade SAE 80w-90     10.Certop multi-grade SAE 85w-140     11.Certop 90 FG     12.Certop 140 FG     13.Certop industrial ISO VG 220     14.Certop industrial ISO VG 460     15.Gear-up plus     16.System Purge     17.Hi-top multi-grade     18.Hi-top single grade     19.Dri-lube plus aerosol     20.Excelube plus/bulk     21.Yield aerosol     22.Accel     23.Androil FG     24.Diesel-mate 2000 plus     25. Full Blast     26.CCX-77     27.Hi-gear plus     28.Lok-cease 20/20     29.cool flush     30.cool plus     31.ND-165     32.ND-150     33.Hold fast plus     34.Resist-x plus     35.Voltz     36.Torrent 400', 0, 'Door #20 Mercedez Comm''l Ctr.A. Cortez Avenue, Mandaue Cebu', '(032) 346-5288 / (032) 346-5631', '', '', 'rotchel.mendoza@nch.com', '', '', 'Rotchel Mendoza: Water Treatment Specialist and Field Product Manager', '', 'Active'),
(353, 'Safari', 'Meters, (Power & Water Beyond Frontiers), A. VIOSERIES - Anti- Tamper/pilferage features,large LCD display         register,large laser print serial no., battery back up for display,        longer effective life,full CT-PT equipped. B. ED200Vio 3W C. CT 888i D. 88 series CT 88i E. CT 888- large cyclometer register, large laser print serial no.,       anti-corrosion meter base,CT-PT equipped F. 88 Series CT 88 G. AUTOMATED kWhr Meter Testbench- can be operated thru       special built in keyboard and PC, equipped with automated      photoelectrical scanning head, settings on harmonics waveform      display,progmmable voltage,current frequency & phase angle H.Automated 3P KWHM Testbench I. KWHM Running Tester Bench J. 1P/3P on-site meter calibration-measure normal parameter of      powerline,harmonics,waveform and transformer''s ratio K. 1P on-site meter calibration tester L. Electronic Voltage and Current Loader-rotary dial for V/A input,      single power on and off toggle switch M. iSWITCH- Theatrical-grade work light switch,wall mounting in,      single or multi-gang boxes,normal wiring procedures N. Model SW 15(Multijet Brass Water Meter      a. Magnetic drive polymer counter      b.Rotary vane wheel or impeller      c.Uni-directional/reversible w/ magnetic      d.Copper alloy brass O. Model SW 15i      a.3600  Rotable Magnetic Drive Polymer counter      b. Rotary Vane wheel or impeller      c. Uni-directional/reversible with anti-magnetic shield      d. Copper alloy brass P. Model LS-4B', 0, '#27 VMCC Complex Granada Avenue cor. Santolan Road Q.C.', '(632) 724-7785', '', '', 'safarimeter@hotmail.com / safarimeter@yahoo.com / safarimeter.wordpress.com', '', '', '', '', 'Inactive'),
(354, 'Kyung Dong Electric Co., ltd.', 'A. Interrup switch B. Disconnecting switch C. Disconnecting switch(motor operating drive) D. Cut-out swich E. Power fuse F. Power switchs(kpfv) G.power switchs(kpfc)', 0, '#178 Eunhaengnamoo-ro,Yanggam-myun,Hwaseong-Shi,Kyungggi-do,Korea', '82-31-224-9093', '', '82-31-8059-8144', 'kdec9093@naver.com', '', '', '', 'www.kdelectric.co.kr', 'Inactive');
INSERT INTO `vendor_head` (`vendor_id`, `vendor_name`, `product_services`, `category_id`, `address`, `phone_number`, `mobile_number`, `fax_number`, `email`, `terms`, `type`, `contact_person`, `notes`, `status`) VALUES
(355, 'Dongwoo Electric Corp. / BMJE Marketing and Electrical Services Inc.', 'A.OUTDOOR TYPE VOLTAGE TRANSFORMER DPO-203N      -Insertion between phase and earth (phase and phase)      -Installation in any position      -Dry insulationin resin-outdoor installation      -Eco friendly voltage transformer is encapsulated with silica-filled epoxy resin      -Excellent electric characteristics and mechanical strength      -Maintenance-free      -Standard:IEC 61869-3, Ieee c57.13, JEC 1201      -Max. system voltage: 15.5 kV      -Rated power-frequency withstand voltage: 34 kV      -Rated lightning impulse withstand voltage: 110kV      -Rated frequency: 60Hz      -Rated primary current: 10-5A/600-300A      -Rated secondary current:5A      -Rated short time content: 100In/1s      -Rated Burden: B-1.9(22.5VA)      -Weight: 25kg      -Accuracy Class:0.3      -RF: 1.5      Creepage distance: 440mm  B.OUTDOOR TYPE CURRENT TRANSFORMER DCO-101A      -Installation in any position        -max voltage: 15.5kV      -Rated power frequency:34kV      -rated lightning impluse:110kV      -rated frequency: 60Hz      -rated primary voltage: 14560v      -rated secondary voltage: 208v      -Rated Burden: x(25VA)v      -Weight: 48kg      -Rated voltage factor: 125%      -Thermal Burden: 100VA      -Accuracy Class 0.3      -Voltage ratio: 70:1      -Creepage distance: 823 mm', 0, 'Blk. 209 lot 32, Labayane, St. North Fairview,Quezon City', '441-8431 / 352-1132 / 621-96060', '', '', 'jojo_bmjemarketing@yahoo.com', '', '', '', '', 'Inactive'),
(356, 'Samwon/BMJE Marketing and Electrical Incorporated', 'A.SAMWON TRANSFORMER B. PHASE POWER SUBSTATION TRANSFORMER      -High reliability power transformers are manufactured through insulation        design and optimum cooling structure design using accumulated technology C.POLE MOUNTED      -Pole transformer type for overseas export D.PHASE PAD MOUNTED TRANSFORMER- adequate to be used for a city center a school where the power part is not externally exposed as power is trasmitted through under ground cables. A device to protect the primary and secondary voltage parts can be installed in accordance with the user requirements E.PHASE DISTRIBUTION TRANSFORMER-it has low noise, superior circuit electro magnetic force withstanding and can be installed anywhere,indoor or outdoor', 0, 'Blk 209 Lot 32 Labayane St North Fairview Q.C. Phl. 6112', '441-8431, 372-60665, 352-1132', '', '621-9060', 'jojo_bmjemarketing@yahoo.com', '', '', '', '', 'Inactive'),
(357, 'Tan Delta Electric Corp.', 'SERVICES: A.PREVENTIVE MAINTENANCE,TESTING & COMMISSIONING OF HIGH AND LOW      VOLTAGE SUBSTATION EQUIPMENT      1. AC dielectric Withstand Test up to 500kV      2.Air and Structure Born Ultrasonic detection for(motors,air&gas leaks,corona)      3.AC VLF/DC High Potential Leakage Current Test      4.Battery capacity Discharge      5.Contact Resistance Test      6.Circuit Breaker Analysis      7. Earth and ground resistance      8. Instrument Transformer      9.Insulation Power      10. Insulation resistance Test      11.Generator/motor phase resolve partial discharge test      12.Lightning arrester leakage current test      13. Oil Dielectric Breakdown Voltage(DBV) test      14.Partial discharge analysis      15.Partial Discharge test      16.Power Quality Analysis      17.Protective Relay Testing and calibration      18. Sweep frequency Response Analysis      19.SF6 Gas Analysys (moisture&Purity)      20.SF6 Gas Recovery and Purification      21.SF6 Gas leak Detectio      22.Surge Comparison Test      23.Tap changer analysis      24.Transformer Turns Ratio test      25.Winding Resistance Test B. TRANSFORMER OIL LABORATORY SERVICES      1.Acidity      2.Color and Visual Examination      3.Corrosive sulfur     4.Degree of Polymerizatio     5.Dielectic Breakdown Voltage     6.Dissolve gas analysis     7.Furan Analysis     8.Interfacial Tension Test     9.Liquid power factor test     10.Metal Passivator     11.Oil Conductivity     12.Oxidation Inhibator Content     13.PCB test     14.Particle Count Analysis     15.Relative Density     16.Water-in-oil Analysis C. INFRARED/THERMAL SCANNING SERVICES     1. Electrical System/Mechanical System/Building Inspection     2. Manufacturing Process/Refractory/Furnaces/Energy Audits D. AIR & STRUCTURE BORNE ULTRASONIC INSPECTION SERVICES     1.Leak detection      2. Bearing Condition Monitoring     3. Ultrasound Based Lubrication     4. Steam Trap Inspection     5. Valves and Hydraulics     6. Pump Cavitation     7. Boiler,Heat Exchangers,Condenser Leaks     8.Electrical Corona Discharge     9. Tightness Integrity-wind noise &n water leak     10. Bearings   PRODUCT(PRODUCTS LISTING) A. AC/DC Dielectric Test System    a.1. AC/VLF Hi-pot Tet Set up to 200 kV    a.2. AC volatage/Current Impulse Test System    a.3. AC Resonant Test System    a.4. DC Hi-pot Set up to 350kV B.BATTERY TEST EQUIPMENT    b.1.Discharge/Capacity Test    b.2. Cell Resistance & Voltage Test    b.3. Specific gravity & temperature    b.4. Online Monitoring C.CURRENT INJECTION TEST SETS    c.1.Primary Current Injection uo to 15,000 apms    c.2. Secondary Current Injection/Protection Relay Test Set  D. DIGITAL HANDHELD INSTRUMENTS    d.1. AC/DC Clamp Ammeter    d.2. AC/DC Multimeter    d.3. Multi-Function Installation Tester E. ELECTRICAL TEST INSTRUMENTS    e.1. AC/DC VLF test set 0-12 KV    e.2. AC/DC Variable power supply 40amps,0-300 volts    e.3. Capacitance & Tan Delta/IPF Test set    e.4. Circuit breaker analyzer    e.5.Earth/Ground Resistance Tester    e.6. Instrument Transformer Test set    e.7. Insulation resistance Tester    e.8. Insulation Resistance Tester    e.9. Insulation oil dielectic breakdown voltage test set    e.10. Micro-ohmmeter 0-600 Amps    e.11. Partial discharge analyzer for transformer & rotating machines    e.12.Power Quality Analyzer    e.13. Surge/lightning Arrester Leakage Current Tester    e.14.Sweep Frequency Response Analyzer    e.15.Surge Tester/Analyzer for rotating machines    e.16.Transformer Turns ratio test set    e.17. Winding Ohmmeter & tap changer analyzer F.TRANSFORMER OIL LABORATORY INSTRUMENTS    f.1.Acidity Analyzer    f.2. Colorimeter    f.3. Corrosive sulfur    f.4. Dissolved Gas Ananlyzer    f.5. Furan Analyzer    f.6. Interfacial Tensiometer    f.7. Moisture Content Analyzer    f.8. Oil DBV Tester    f.9. Particle Count Analyzer    f.10.Oil Power Factor Tester    f.11. Viscosity Meter G. PREDICTIVE MAINTENANCE INSTRUMENTS    g.1. Thermal Imaging/Infrared Camera    g.2.Ultrasonic Detection(air/gas leak, bearing & corona) H. SF6 GAS TEST & HANDLING EQUIPMENT    h.1. SF6 Gas Analyzer(purity, moisture)    h.2.SF6 H=Gas infrared leak detector    h.3. SF6 gas recovery & filtration cart I. TRANSFORMER INSULATING OIL/MAINTENANCE EQUIPMENT    i.1. On-line/offline oil regeneration system    i.2. On-line/offline vacuum oil purification system    i.3. On-line OLTC Purifier w/ heater    i.4. Vacuum pumps & dehydration system    i.5. Dry air generator for XFMR Maintenanc J. TRANSFORMER ON-LINE MONITORING/ PROTECTION SYSTEM    j.1. Nitrogen Injection Explosion & fire Extinguising System    j.2.Bushing Monitoring System K. MISCELLANNEOUS PRODUCTS    k.1. Steel Pressed Radiators for transformers    k.2. On load Tap Changers', 0, '34A J.P. Rizal St. Project 4, Quezon City Phl 1109', '(632) 911-5858 / (632) 911-2073', '', '(632) 911-2157', 'sales@tandelta.com.ph / acctg@tandelta.com.ph', '', '', 'Dennis Tolentino- Technical Sales Supervisor, Tel No. 0917-520-9071', '', 'Inactive'),
(358, 'Solid Concrete Solutions', 'The only solid I-section Concrete Pole made in the PHL. Lomg lifespan, high strength  and wide range of sizes/classes. Heat/Fire resistance and corrosion free. The product  is pre-stresse,pre-tensioned rectangular concrete poles of "I" section shape specially  engineered and designed for PHL market. This product like wood and steel poles are  support structures for overhead power conduction and equipment   Advantages:    - The high strength-to-weight ratio of pre-stressed concrete power poles     sets them apart from poles made of other materials. Poles are thin and      functional yet relatively light and convenient to handle.   - Concrete power poles are more durable and resistant to weather and termites   - Do not contain any chemicals that will leech to the ground like those of      wood plates.   - Resilient and will cover from effects of a great degree of overload than any other     structural materials. They remain crack-free at working loads', 0, 'Suite 809 Richmonde Plaza N. 21 San Miguel Avenue cor Lourdes Drive Ortigas Center, Pasig City', '(02) 633-58921 / CP No. 09189208971/09178900565', '', '', 'lornasanguay7714@gmail.com', '', '', '', 'Plant Office: Km 208 Marthur Highway Brgy. Cauringan Sison Pangasinan - (075) 567-6117   Email: stresscrete.1998@gmail.com/spc@yahoo.com', 'Inactive'),
(359, 'Lushun Filtration & Purification', 'PRODUCTS: 1.Leybold Vacuum Pump 2. Vacuum Pump 3.Roots Pump 4. Leybold Roots Pump 5. Germany Water-ring Vacuum Pump 6. Imported Oil Pump 7. Screw Pump 8. Gear Pump 9. Inner Gearing Pump 10. Heater 11. Intelligent Temperature Controller 12. High Quality Wheels 13. Meter 14. Quick Change Coupler 15. Type 304 Stainless Steel Ball Valve 16. Filter 17. PVC Wire Reinforcing Tube 18. Coupling 19. Aluminum Board 20. Photoelectric Switch 21. 304 Check Valve 22. Separator 23.Flow Meter 24. Circuits', 0, 'Xianqiao Industrial Zone, Shapingla District, Chongqing,China  Zip:400037', '0086-23-65226013', '', '0086-23-65226013', 'sale@lushuntec.com', '', '', 'Isabel Wan- Sales Manager    Tel No. 8615826183872   Zip: 400037', '', 'Inactive'),
(360, 'APD Enterprises', 'PRODUCTS: > KSH - Filter Nozzle / PPN Strainer > LISSE - Filter Press, Filter Cloth > HAMON - Cooling Tower Spare Parts > FUCHS - Aerators for Waste Water Treatment > WIKA - Gauges (Pressure, Temperature & Level) > ICOM - VHF Transceiver Radio > INDUSTRIAL CHEMICALS:Ion Exchange Resin, Anti-scalant, Anti-foam    SERVICES: > Reconditioning of Valves & Pumps > Calibrations of Weighing Scale (Truck Scale)', 0, 'Door # 6B, The SITE Bldg., Mt. View (Buri) Road, Mandalagan, Bacolod City', '(034) 441-3732', '', '(034) 441-3732 / Mobile No.: 0915-702-7941 / 0917-585-8038', 'ma_teresagonzales@yahoo.com', '', '', '', 'Website: www.apd-enterprises.com', 'Inactive'),
(361, 'BJ Marthel International, Inc.', 'BJ Marthel International, Inc. is premised on service excellence > Service and maintenance of marine and industrial diesel heavy fuel engines > Installation of industrial diesel engines, general top overhauling of diesel engines/pumps > Complete facilities in the assembly of construction equipment including pre-delivery inspection services > Conducts services on proper operation and maintenance of construction equipment. > Periodic inspection of equipment during the warranty period.  And the following technical services: > Service and maintenance of marine and industrial diesel and heavy fuel engines > Installation of individual engines, general top overhauling of diesel engines and pumps > Repair and Maintenance of our heavy equipment  Products: > Machinery Parts for Diesel Engines > Industrial Machinery and Spare Parts > Marine Diesel Engines, Parts and Accessories > Marine Ship Deck and Engine Auxiliary Equipment and Spare Parts > Stationary and Portable Generator Sets > Construction and Earth Moving Equipment:       Backhoe Loaders, Skid Steer Loaders, Excavators, Motor graders, Vibratory Compactors, Bulldozers         Fire Fighting Trucks and Equipment       Fire Trucks, Fire Extinguishers, Fireman’s Safety Apparel, Fire Hoses  Absorbents for Chemical and Oil Spills > Construction and Hydraulic Tools and Equipment > Sewer and Catch basin Vacuum and Jetting Equipment > Dredgers > Port Cargo Handling Equipment > Water Filtration, Disinfection and Supply Systems > Tools and Equipment for the Power and Telecommunication Industries', 0, 'Door No. 2 Angela Building, Mandalagan Highway, Bacolod City', '(034) 708-7217', '', '', 'iecdbacolod@gmail.com', '', '', '', '', 'Inactive'),
(362, 'GB Turbophil Turbocharger Service Repair & Parts Supply', 'Turbocharger repair parts and services', 0, 'Suba-Masulog Road, Lapu-Lapu City, Cebu', '(32)2606392', '', '', '', '', 'Contractor', 'Mr. Samuel John Rios - 0918-803-8644', '', 'Inactive'),
(363, 'Mustard Seed Systems Corporation - Bacolod', 'Door Access, Switch Hub, Ncomputing', 0, 'Door no. 5 SK Realty Building, Kamagong cor. 6th St, Bacolod City', '(034) 432 1650 / 707-1342', '', '', 'mary09mseedsystem@gmail.com', 'COD', 'Supplier / Contractor', 'Ms. Mary', '', 'Active'),
(364, 'PJL Auto  Center, Inc.', 'A Goodyear Servitek, is your one stop shop for all your vehicle needs and repairs.  It offers a wide selection of automotive tires, lubricants, and imported batteries as wells as car parts and accessories. It also provides repairs and maintenance services such as nitrogen tire fill, computerized engine system diagnosis, computerized wheel alignment, battery life testing, tire changing, wheel balancing, under chassis repair, chamber correction, suspension service, brake system servicing, oil change, total engine overhaul, fuel injection cleaning, air condition repair, among others. We also offer emergency rescue service for your vehicles. And with our highly trained, knowledgeable, and service oriented staff, we are here to address your every automotive need.', 0, 'Lacson Street, Brgy. Mandalagan, Bacolod City', '(034) 441-1222, 441-1444', '', '', 'contact@pjlgroup.ph', '', '', '', '', 'Active'),
(365, ' Tough Performance AutoWorkz', 'Wheel Alignment, Wheel Balancing, Change oil, Car Electrical Repair, Under Chassis Repair, Engine Tune-up, Suspension Modification, Car Body Repair and Painting, Car Audio Accessories, Change Car, Car Tint', 0, 'Circumferential Road, Brgy. Bata (In front of Adam''s Lodge), Bacolod City', '(034) 432 0544 ', '', '', '', '', '', '', '', 'Active'),
(366, 'TOWER Motors SHOP', 'Automotive Repair and Services', 0, 'Purok Hollowblocks, Lacson extension, Alabado street, Bacolod City', ' (034) 707 9947', '', '', '', '', '', '', '', 'Active'),
(367, 'Valing Auto Repair Shop', 'Automotive Repair and Services, Services Offered: Overhauling Engine Brake System Under Chassis And Other Mechanical Repair', 0, ' Lucerne Berne St., Helvetia Heights Subd., Bacolod City', '709 7224', '', '', '', '', '', '', '', 'Active'),
(368, 'H. Y. Hablo Services Company', 'Trucking Services', 0, 'Henrietta Village, Bacolod City', '0922-897-9326', '', '', '', 'COD', 'Trucking Services', 'Sir Yoyo', 'VAT Reg. TIN 450-101-583-0000', 'Active'),
(369, 'Castle''s Electronic Services', 'Electronics, Two Way Radio Products & Services', 0, 'Cor. 2nd Road-Burgos St., Villamonte, Bacolod City', '(034) 435-0992, 434-7429, 433-8467', '', '', '', 'COD', 'Supplier', 'Mr. Calixto Del Castillo III', 'NON VAT Reg. TIN 113-616-541-0000', 'Active'),
(370, 'Rosal Machine Services', 'Machine Shop, Fabrications, Threading, Machining', 0, 'Akishola Circumferential Road, Brgy. Villamonte, Bacolod City', '(034) 708-0216, 0920-983-0092, 0922-879-3905', '', '', '', '15 days PDC', 'Manufacturer', 'Mr. Rey Geronimo - General Manager', 'NON VAT Reg. TIN 475-877-774-0000', 'Active'),
(371, 'Bacolod Freedom Enterprises', 'Hardware, Electrical', 0, 'BS Aquino Drive, Bacolod City', '(034) 433-2130 / 432-0756 / 433-4664', '', '(034) 433-9054', '', 'COD', 'Supplier', 'Ms. Lalyn', '', 'Active'),
(372, 'New Bacolod Pyramid Construction Supply', 'Goulds Pumps Distributor, Pumps, Welding Machine, Tanks', 0, '507 BS Aquino Drive, Capitol Shopping Center, Benigno S. Aquino Drive, Bacolod City', '(034) 433-4648 to 49', '', '433-4649', 'rthurch@yahoo.com.ph', 'Cash', 'Distributor / Supplier', 'Mr. Arthur Ang', '', 'Active'),
(373, 'Arcspray Engineering Services', 'Thermal Spray, Turbine and crankshaft services', 0, 'Laray Road, Rjaj Bldg., B2, Cansaga Consolacion, Cebu', '(032) 423-0948', '', '', 'simonsingo38@yahoo.com / arcsprayengineering@yahoo.com', 'COD', 'Contractor / Supplier', 'Mr. Simon Sigo - 0939-9553-716 / 0977-0645-056', 'Affiliated to Flex-a-seal Industrial Supply and Services', 'Active'),
(374, 'Gendiesel Philippines, Inc.', 'GGensets (Generator Sets), Diesel Engines, Automatic transmissions, and Heavy-duty trucks', 0, 'Liroville Subdivision, Singcang-Airport, Bacolod City', '(034) 433-8518', '', '', '', 'COD', '', '', '', 'Active'),
(375, 'MAXSAVER', 'CCTV  ', 0, 'Rizal St., Bacolod City', '(034) 435-1930', '', '', '', 'COD', 'Supplier ', '', '', 'Active'),
(376, 'Security Warehouse Philppines Inc.', 'CCTV (Rover Systems)', 0, 'Unit CZ204, 2/F Cyberzone, Rizal St., Reclamation Area, Bacolod City', '(034) 704-2271', '', '(034) 704-2271', '', 'COD', 'Distributor', 'Mr. Filart Juridico', '', 'Active'),
(377, 'Zalia Information Technology Solutions (ZITS)', 'CCTV    ', 0, 'Bacolod City', '0933-869-1612 ', '', '', 'lredoblo@gmail.com', '', '', '', '', 'Active'),
(378, 'IPC Security Surveillance System Gadgets & Electronics Center', 'CCTV (Hikvison)', 0, 'Door 4 Sun-In Bldg., Lacson St., Bacolod City', '(034) 704-2330', '', '704-2330', 'ipcbacolod@yahoo.com', 'COD', 'Contractor / Distributor', '', '', 'Active'),
(379, 'Central Sales and Heavy Equipment Service', 'Hydraulic Jacks Repair and Servicing, Heavy Equipment Services', 0, '39-1 Rizal St., Bacolod City', '(034) 435-5860', '', '', '', 'COD-upon completion', 'Repairs & Services for Heavy Equipments', 'Mr. Romeo Andrada', 'TIN No: 077-183-783-199', 'Active'),
(380, 'NCH Philippines Inc.', 'Water Treatment, Cold and High Temp. Sealant, Degreaser', 0, 'Bet. Kms 19 & 20 North Ortigas Ave., Ext., Cainta, 1900 Rizal', '(02) 655-7389 to 7392', '', '(02) 656-8063', '', '30 days upon Delivery of Chemicals', 'Manufacturer, Contractor', 'Engr. Rotchel Mendoza (Chem Aqua)- 09177016793 and Mr. Joem Tayson (Maintenance( - 09238313125', '', 'Active'),
(381, 'Alpha Pacific Electric Co., Incorporated', 'Molded Circuit Breaker, 250 amps, 3 pole, 18 kaic @ 480 VAC without Lugs, Model: EXC250F3250, Brand: Schneider', 0, 'Madison Manor Condominium, Alabang-Zapote Road, Las Pinas City, Metro Manila', '(02) 800-0489 / 800-0870', '', '', '', 'COD', '', 'Mr. Rodel De Lara', '', 'Active'),
(382, 'Lancet Enterprises', '', 0, '2251-C Adonis St, Bgy 862, Zone 094 STA Ana, Manila', '(02) 254-7292', '', '', '', '15 days PDC', '', 'Mr.Alan Ferrer', '', 'Active'),
(383, 'Marshal Electrical & Metal Products Co. Ltd.', '', 0, 'Lot7 Blk2Orion St., Sterling Ind''l. Park, Meycuayan, Bulacan', '(044) 836-1865 / 417 0101', '', '', '', 'COD', '', 'Mr.Kirby King', '', 'Active'),
(384, 'NG CHUA TRADING', '', 0, 'Espana Tower, 2203 Espana Street, City of Manila, Metro Manila', '(02) 354-9808 / 353-7620', '', '', '', 'COD', '', 'Mr. Leo Ace Devis', '', 'Active'),
(385, 'RS Components', '', 0, '21 Floor, Multinational Bancorporation Center, Ayala Avenue, Makati, 1226 Metro Manila', '(02) 888-4030', '', '', '', '30 days PDC upon Delivery', '', 'Ms. Kathy Mendoza', '', 'Active'),
(386, 'Best Electrical Components, Inc.', '', 0, 'Omron-APP Bldg., 40 Buendia Avenue, Between Bautista St. and Dian St., Makati', '(02) 843-0785', '', '(02)843-0675', '', '30 days PDC upon Delivery', '', 'Mr. Ferdie', '', 'Active'),
(387, 'Rozemar Hardware', '', 0, '1528 Alvarez St, Bgy 321, Zone 032 STA Cruz, Manila', '(02) 731-5140', '', '', '', 'COD', '', 'Mr. Chris Austria', '', 'Active'),
(388, 'Portalloy Industrial Supply Corporation', '', 0, '1011-1013 Oroquieta Street Sta. Cruz, Manila', '(02) 733 7957 / 734-8137', '', '', '', 'COD', '', 'Mr. Chris', '', 'Active'),
(389, 'Maximum Electronics & Communications Inc.', '', 0, '123 Kamuning Rd, Diliman, Quezon City, Metro Manila', '(02) 929 9511 / 412-7849', '', '', '', 'COD', '', 'Mr. / Ms. Danny / Helen Ferrer', '', 'Active'),
(390, 'Maximum Electronics & Communications Inc.', '', 0, '23 Kamuning Rd, Diliman, Quezon City, Metro Manila', '(02) 929-9511 / 412-7849', '', '', '', 'COD', '', 'Mr. Danny / Ms. Helen Ferrer', '', 'Active'),
(391, 'Maximum Electronics & Communications Inc.', '', 0, '123 Kamuning Rd, Diliman, Quezon City, Metro Manila', '(02) 929-9511', '', '', '', '', '', '', '', 'Active'),
(392, 'Maximum Electronics & Communications Inc.', 'VHF/FM Portable Radio. Brand: Motorola', 0, '23 Kamuning Rd, Diliman, Quezon City, Metro Manila', '(02) 929-9511', '', '', '', 'COD', '', 'Ms. Helen', '', 'Active'),
(393, 'Blue Sapphire Telecoms', '', 0, 'Unit 1101 Entrata Tower 1, 2609 Civic Drive Filinvest  Alabang, Muntinlupa City', '(02) 846-7876 / (02) 404-8387 / 514-8727 / 553-6526 / 553-6529', '', '(02) 846-2758', 'sales@bstelecoms.com.ph', 'COD', '', 'Ms. Malu Mendoza', '', 'Active'),
(394, 'Maximum Electronics & Communications, Inc.', '', 0, '123 Kamuning Rd, Diliman, Quezon City, Metro Manila', '(02) 929-9511 / 412-7849', '', '', '', 'COD', '', 'Ms. Helen', '', 'Active'),
(395, 'Bacolod Plastic Supply ', 'Plastic Supplies', 0, '5 Hilado St, Bacolod City', '(034) 434-0067', '', '', '', 'COD', '', '', '', 'Active'),
(396, 'CITI Hardware - Tangub Branch', '', 0, 'Araneta Street, Brgy. Tangub, Bacolod City', '(034) 444-0591 / (034) 704-3400', '', '(034) 704-3400', 'tangub@citihardware.com', '', 'COD', '', '', 'Active'),
(397, 'D.C. Cruz Trading Corp. ', '', 0, '158-C Singcang, Bacolod City', '(034) 434-3944', '', '', '', 'COD', '', '', '', 'Active'),
(398, 'Firebase Industrial Supply and Services', '', 0, 'Bacolod City', '(034) 445-0689', '', '', '', '15 days PDC', '', 'Mr. Rommel Genovia', '', 'Active'),
(399, 'Kelvin Nicoli Enterprises', '', 0, 'Gatuslao St, Brgy. 15, Bacolod City', '(034) 476-9756 / (034) 433-4441', '', '', '', 'COD', '', '', '', 'Active'),
(400, 'NNT68 Fishing Supply ', '', 0, 'Luzuriaga St., Bacolod City', '(034) 435-0499', '', '', '', 'COD', '', '', '', 'Active'),
(401, 'Bacolod Triumph Depot', '', 0, 'Hilado St., Bacolod City', '(034) 434-0111', '', '', '', 'COD', '', '', '', 'Active'),
(402, 'Modbus Electrical Supplies Corp.', '', 0, 'The Big Orange Building, 328 Edsa Avenue, Caloocan City, Metro Manila', '(02) 361-0500 / 361-0500', '', '', '', '', '', 'Mr. Allan Que', '', 'Active'),
(403, 'Upshaw Industrial Corporation', '', 0, 'Room 201, VAG Building, Ortigas Avenue, San Juan City, Metro Manila', '(02) 721-5451', '', '', '', '', '', 'Mr. Armando Noga', '', 'Active'),
(404, 'West Point Engineering Supplies', '', 0, 'West Point Bldg. Bacood St. Brgy. Patubig,, Marilao, Bulacan, Patubig Rd, Marilao, Bulacan', '0917 801 4750 / (044) 797-2524', '', '', '', 'COD', '', 'Ms. Jessa Paglinawan', '', 'Active'),
(405, 'West Point Engineering Supplies', '', 0, 'West Point Bldg. Bacood St. Brgy. Patubig,, Marilao, Bulacan, Patubig Rd, Marilao, Bulacan', '0917 801 4750 / (044) 797-2524', '', '', '', '', '', 'Ms. Jessa Paglinawan', '', 'Active'),
(406, 'Test Equipment Connection', '', 0, '30 Skyline Dr, Lake Mary, FL 32746, USA', '+1 407-804-1299 / 800-615-8378  loc. 174', '', '', '', '', '', 'Mr. John Bahng', '', 'Active'),
(407, 'Carvi-Upholstery & Home Supply', '', 0, 'Gonzaga St, Bacolod City', '(034) 434-5020', '', '', '', 'COD', '', '', '', 'Active'),
(408, 'CMC 417 Enterprises Corporation', '', 0, 'Hilado St., Bacolod City', '(034) 476-9756 / 704-1311 / 702-8402', '', '', '', '', '', 'Ms. Rain', '', 'Active'),
(409, 'Chris Marine (Sweden)', '', 0, 'Stenyxegatan 3 Fosie, Malmö', '+46 733 518466', '', '', '', '', '', 'Mr. Ralph Rosengren', '', 'Active'),
(410, 'Asell Tglobal Inc', '', 0, '40 London Street, Capitol Homes Old Balara, 1100 Quezon City, Metro Manila', '709-0842', '', '', '', '', '', 'Mr. Ramil Cornico', '', 'Active'),
(411, 'Panda Construction Supply Incorporated', '', 0, '405 Nueva Street (E T. Yuchengco), Manila City, Metro Manila', '(02) 236-5500 / 716-8361', '', '', '', '', '', 'Mr. Romy', '', 'Active'),
(412, 'Josmee', 'Medical Supplies', 0, 'Bacolod City', '(034) 474-0388', '', '', '', '', '', 'Ms. Johanah', '', 'Active'),
(413, 'Medical Center Trading Corporation', 'Medical Supplies', 0, 'Burgos-Lacson Street, Brgy.19, Bacolod City', '0908 898 0274', '', '', '', '', '', 'Ms. Angelouan Molina', '', 'Active'),
(414, 'Hardware and Industrial Solutions Incorporated', '', 0, '56 Madison Street, Mandaluyong City', '(02) 631-8366 / 638-1432', '', '', 'mventigan@uptown.com.ph', '', '', 'Ms. Melanie Ventigan', '', 'Active'),
(415, 'Rainehans Trading', '', 0, 'Manila', '(02) 756-0674', '', '', 'rainehanstrading@gmail.com', '', '', 'Ms. Alma Yap', '', 'Active'),
(416, 'MD Trade & Spares GmbH', '', 0, 'Alte Kreisstrasse 1, 39171 Sülzetal, Germany', '+49 391 727678-13', '', '', '', '', '', 'Mr. Steven Wdent', '', 'Active'),
(417, 'ENEX Maschinenhandel- und Ersatzteilservice GmbH', '', 0, 'Schnackenburgallee 116, 22525 Hamburg, Germany', '+49 40 5472160', '', '', '', '', '', 'Ms. Susanne Strauss', '', 'Active'),
(418, 'MOTEX Teile GmbH (Philippines)', '', 0, '21423, Winsen (Luhe) , Niedersachsen Germany', '+49-417188570', '', '', '', '', '', 'Mr. Melvin Sitaca', '', 'Active'),
(419, 'Twinco Pte Ltd', '', 0, '3 Loyang Way 4, Singapore 506956', '+65 6542 9618', '', '', '', '', '', 'Mr. Kenneth Ng', '', 'Active'),
(420, 'Industrial & Marine Services Eng (Malaysia)', '', 0, 'Malaysia', '+603 5524 6898', '', '', '', '', '', 'Pang Siew Mei', '', 'Active'),
(421, 'Industrial & Marine Services Eng (Malaysia)', '', 0, 'Malaysia', '+603 5524 6898', '', '', '', '', '', 'Pang Siew Mei', '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aoq_header`
--
ALTER TABLE `aoq_header`
 ADD PRIMARY KEY (`aoq_id`);

--
-- Indexes for table `aoq_items`
--
ALTER TABLE `aoq_items`
 ADD PRIMARY KEY (`aoq_items_id`);

--
-- Indexes for table `aoq_rfq`
--
ALTER TABLE `aoq_rfq`
 ADD PRIMARY KEY (`aoq_rfq_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `enduse`
--
ALTER TABLE `enduse`
 ADD PRIMARY KEY (`enduse_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
 ADD PRIMARY KEY (`purpose_id`);

--
-- Indexes for table `rfq_detail`
--
ALTER TABLE `rfq_detail`
 ADD PRIMARY KEY (`rfq_detail_id`);

--
-- Indexes for table `rfq_head`
--
ALTER TABLE `rfq_head`
 ADD PRIMARY KEY (`rfq_id`);

--
-- Indexes for table `rfq_series`
--
ALTER TABLE `rfq_series`
 ADD PRIMARY KEY (`rfq_series_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
 ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
 ADD PRIMARY KEY (`vendordet_id`);

--
-- Indexes for table `vendor_head`
--
ALTER TABLE `vendor_head`
 ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aoq_header`
--
ALTER TABLE `aoq_header`
MODIFY `aoq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aoq_items`
--
ALTER TABLE `aoq_items`
MODIFY `aoq_items_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aoq_rfq`
--
ALTER TABLE `aoq_rfq`
MODIFY `aoq_rfq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `enduse`
--
ALTER TABLE `enduse`
MODIFY `enduse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=533;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rfq_detail`
--
ALTER TABLE `rfq_detail`
MODIFY `rfq_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rfq_head`
--
ALTER TABLE `rfq_head`
MODIFY `rfq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rfq_series`
--
ALTER TABLE `rfq_series`
MODIFY `rfq_series_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
MODIFY `vendordet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=447;
--
-- AUTO_INCREMENT for table `vendor_head`
--
ALTER TABLE `vendor_head`
MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=422;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

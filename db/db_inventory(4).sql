-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 07:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Accounting Department\r\n'),
(2, 'Auxiliary\r\n'),
(3, 'Bacolod HR'),
(4, 'Billing Department'),
(5, 'EIC'),
(7, 'Environment/PCO'),
(8, 'Finance Department'),
(9, 'Fuel and Lube Management'),
(10, 'Health and Safety'),
(11, 'IT Department'),
(12, 'Laboratory and Chemical'),
(13, 'Maintenance'),
(14, 'Office of the GM'),
(15, 'Operation'),
(16, 'Purchasing Department'),
(17, 'Reconditioning'),
(18, 'Security'),
(19, 'Site HR'),
(20, 'Special Proj/Facilities Imp'),
(21, 'Trading Department'),
(22, 'Warehouse Department'),
(23, 'Progen Warehouse'),
(24, 'Testing Group');

-- --------------------------------------------------------

--
-- Table structure for table `enduse`
--

CREATE TABLE IF NOT EXISTS `enduse` (
`enduse_id` int(11) NOT NULL,
  `enduse_code` varchar(100) DEFAULT NULL,
  `enduse_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enduse`
--

INSERT INTO `enduse` (`enduse_id`, `enduse_code`, `enduse_name`) VALUES
(1, '', 'Air Intake Room\r\n'),
(2, '', 'Control Air Compressor No. 1'),
(3, '', 'Control Air Compressor No. 2'),
(4, '', 'Control Air Compressor No. 3'),
(5, '', 'Canteen\r\n'),
(6, '', 'CENPRI Employees\r\n'),
(7, '', 'Cenpri Warehouse Building\r\n'),
(8, '', 'Cenpri Warehouse Extension\r\n'),
(9, '', 'Clinic Use\r\n'),
(10, '', 'Cooling Tower Basin No. 1 '),
(11, '', 'Cooling Tower Basin No. 2'),
(12, '', 'CV Access Bay Area'),
(13, '', 'DG1 \r\n'),
(14, '', 'DG2\r\n'),
(15, '', 'DG3'),
(16, '', 'DG4'),
(17, '', 'DG5'),
(18, '', 'Guardhouse\r\n'),
(19, '', 'Heavy Fuel Oil Purifier No. 1'),
(20, '', 'Heavy Fuel Oil Purifier No. 2'),
(21, '', 'Heavy Fuel Oil Purifier - Common'),
(22, '', 'Jacket Water Cooler No. 1'),
(23, '', 'Jacket Water Cooler No. 2'),
(24, '', 'Jacket Water Cooler No. 3'),
(25, '', 'Jacket Water Cooler No. 4'),
(26, '', 'Jacket Water Cooler No. 5'),
(27, '', 'Distillation Equipment'),
(28, '', 'Ladies'' Dormitory\r\n'),
(29, '', 'Lube Oil Cooler No. 1'),
(30, '', 'Lube Oil Cooler No. 2'),
(31, '', 'Lube Oil Cooler No. 3'),
(32, '', 'Lube Oil Cooler No. 4'),
(33, '', 'Lube Oil Cooler No. 5'),
(34, '', 'Lube Oil Purifier No. 1'),
(35, '', 'Lube Oil Purifier No. 2'),
(36, '', 'Lube Oil Purifier No. 3'),
(37, '', 'Lube Oil Purifier No. 4'),
(38, '', 'Lube Oil Purifier No. 5'),
(39, '', 'Office Use\r\n'),
(40, '', 'Powerhouse Building\r\n'),
(41, '', 'Progen Warehouse\r\n'),
(42, '', 'Restrooms\r\n'),
(43, '', 'Running Units\r\n'),
(44, '', 'Running Units - Pielstick\r\n'),
(45, '', 'Running Units - Sulzer\r\n'),
(46, '', 'Starting Air Compressor No. 1'),
(47, '', 'Starting Air Compressor No. 2'),
(48, '', 'Starting Air Compressor No. 3'),
(49, '', 'Starting Air Compressor No. 4'),
(50, '', 'Starting Air Compressor No. 5'),
(52, '', 'Steam Equipment'),
(53, '', 'Substation\r\n'),
(54, '', 'Tank Farm\r\n'),
(55, '', 'Trainees on Oil Spill'),
(56, '', 'Bacolod Office'),
(57, '', 'Boiler Circulating Pump No.4'),
(58, '', 'Boiler Condensate Pump Motor'),
(59, '', 'Control Air Compressor - Common'),
(60, '', 'Environment and Pollution Control'),
(61, '', 'Fuel Tank'),
(62, '', 'Guests/VIP'),
(63, '', 'Jacket Water Cooler - Common'),
(64, '', 'Lube Oil Cooler - Common'),
(65, '', 'Lube Oil Purifier - Common'),
(66, '', 'NALCO Water Softener Unit'),
(67, '', 'Progen Office Use'),
(68, '', 'Starting Air Compressor - Common'),
(69, '', 'Starting Air Compressor No. 4 & 5'),
(70, '', 'SEM Water Softener Unit'),
(71, '', 'Sludge Tank'),
(72, '', 'Staffhouse 1 - Site'),
(73, '', 'Staffhouse 2 - Jara'),
(74, '', 'Staffhouse 3 - EDJ'),
(75, '', 'Waste Heat Recovery Boiler - Common'),
(76, '', 'Waste Heat Recovery Boiler No.1'),
(77, '', 'Waste Heat Recovery Boiler No.2'),
(78, '', 'Waste Heat Recovery Boiler No.3'),
(82, '', 'Battery Charger'),
(83, '', 'Heavy Equipment - Boomtruck and Forklift'),
(84, '', 'Heavy Equipment - Boomtruck'),
(85, '', 'Heavy Equipment - Forklift'),
(86, '', 'Microwave Radio Equipment'),
(87, '', 'Switch Gear Room'),
(88, '', 'Control Room'),
(89, '', 'Community'),
(90, '', 'Warehouse Office'),
(92, '', 'Westfalia Separator AG-Lube Oil'),
(93, '', 'Station Load Metering'),
(94, '', 'Service Vehicle Isuzu Crosswind Plate No. FFN706'),
(95, '', 'Heavy Fuel Oil Sludge Basin'),
(96, '', 'Generator Sliding Tools'),
(97, '', 'Smoke Stack'),
(98, '', 'Cooling Tower Basin -  Common'),
(99, '', 'Mechanical Barracks'),
(100, '', '69KV Pole No. 3 and 4'),
(101, '', 'Fluke Clamp Meter'),
(102, '', 'Electrical Consumables'),
(103, '', 'Non Disturbance Monitoring Equipment'),
(104, '', 'Diesel Storage Tank'),
(105, '', 'Power Plant Premises'),
(107, '', 'Fuel and Lube Oil Recovery System'),
(108, '', 'NALCO and SEM Water Softener'),
(109, '', 'Fuel Farm'),
(110, '', 'Honing Machine'),
(111, '', 'Maintenance Reconditioning Area and Fuel Farm Area'),
(112, '', 'Powerhouse Toolbox'),
(113, '', 'Cummins Engine'),
(114, '', 'Isuzu, Pick-up, Fuego, Diesel, 1999'),
(115, '', 'Plant Equipment'),
(116, '', 'Electrical Handtools'),
(117, '', 'Warehouse Beginning Balance'),
(118, '', 'Switch Yard'),
(119, '', 'Deep Well Pump'),
(120, '', 'Drain Pipe in Running Units Sulzer and Smoke Stack'),
(121, '', 'Cooling Tower'),
(122, '', '1.5 MVA Station Transformer DG4 & DG5 Generator Winding/VCB/MOCB/Cable Monitor'),
(123, '', 'Plate Compactor'),
(124, '', 'Microwave Antenna'),
(125, '', 'Asset Management'),
(126, '', 'Operations & Maintenance Consumables'),
(127, '', 'Christmas Lantern'),
(128, '', '40 MVA Power Transformer'),
(129, '', 'Boiler Water Intake'),
(130, '', 'HFO Fuel Piping Insulation and Cladding'),
(131, '', 'Fuel and Lube Oil Management'),
(132, '', 'Settling and Service Tank'),
(133, '', '125 Vdc Battery Charger'),
(134, '', 'NVR CCTV Cameras'),
(135, '', 'Deep Well Facility'),
(136, '', 'Air Compressor'),
(137, '', '40 MVA, 69kV/6.6kV Power Transformer'),
(138, '', 'Deep Well Riser Pipes Pull-out'),
(139, '', 'Barring Gear Motor - Unit 2'),
(140, '', 'Trading'),
(141, '', 'Plant Decoration'),
(142, '', 'Christmas Party Stage'),
(143, '', 'Soft Water Supply Pump'),
(144, '', 'MOCB Units 4 & 5'),
(145, '', 'HFO Settling & Service Tanks'),
(146, '', '4 Units Pielstick Generator'),
(147, '', '3 Units Exhaust Fan ( MCI )'),
(148, '', 'Computer/Electronic device power supply'),
(149, '', 'Fuel Module Booster Pump Unit 2'),
(150, '', 'Boiler Circulating Pump and Motor Units 3 and 4'),
(151, '', 'Jacket Water Pump Motor No.4'),
(152, '', 'Wire Marker Device'),
(153, '', 'Mono Pump Chamber No.1'),
(154, '', 'Microwave Panel'),
(155, '', 'Safety'),
(156, '', 'Fire Hydrant'),
(157, '', 'Generator Master Panel'),
(158, '', 'Acetylene and Oxygen'),
(159, '', 'Fire Safety'),
(160, '', 'Male Common CR'),
(161, '', 'Bus Differential Panel'),
(162, '', 'Honing Machine Compressor Motor'),
(163, '', 'Warehouse Building'),
(164, '', 'Auxiliary Generator'),
(165, '', 'Generator Unit 2'),
(166, '', 'Crane & Flat Bed Trailer'),
(167, '', 'Motor Control Center 3'),
(168, '', 'Facilities Improvement'),
(169, '', 'Turning Gear Motor DG 1-3'),
(170, '', 'Borromeo''s Lot'),
(171, '', 'Unit Panel'),
(172, '', 'Out-of-House Oil Analysis'),
(173, '', 'Toyota Inova'),
(174, '', 'Barring Gear Motor - Unit 3'),
(175, '', 'Control Panel'),
(176, '', 'Cylinder Head Assy & Cylinder At CV Access Bay Area'),
(177, '', 'Circular Saw'),
(178, '', '24VDC Bank Batteries'),
(179, '', 'Drum Table & Chairs'),
(180, '', 'SCADA Room'),
(181, '', 'Engine Driven'),
(182, '', 'Pedestrian Crossing In-front of Main Gate'),
(183, '', 'Microwave Control Panel'),
(184, '', 'Fire Hose Cabinet/Dead End of Fire Sprinkler of Piping'),
(185, '', 'Laboratory Use'),
(186, '', 'Oil Analysis Equipment'),
(187, '', 'Unit 5 Control Air System'),
(188, '', 'Fire Fighting System'),
(189, '', 'Relief Valve Cap for Cylinder Head'),
(190, '', 'Operations Communications'),
(191, '', 'Plant Testing Instrument'),
(192, '', 'Generator Unit 1'),
(193, '', 'New 750kVA Station Service Transformer'),
(194, '', 'Plant Site Security & Monitoring Equipment'),
(195, '', 'Unit 1 - 5 Synchronizing Panels'),
(196, '', 'Lube Oil Priming Pump'),
(197, '', 'CENPRI Signage'),
(198, '', 'Bus Protection Relay'),
(199, '', 'Panel Main Breaker'),
(200, '', 'Oil and Water Mechanical Separator Basin'),
(201, '', 'Flag Pole Fabrication'),
(202, '', 'Electrical Instruments and Plant Equipment Protection'),
(203, '', 'Allan Amoguis'),
(204, '', 'Jacket Water Motor #4, MCCB'),
(205, '', 'Fuel Module 1 and 3, Starting Air Compressor Unit 3 and 5'),
(206, '', 'Air Cooler'),
(207, '', 'Grounding System Lay-out / Installation'),
(208, '', 'Master Control Panel'),
(209, '', 'HFO Recovery Tank'),
(210, '', 'Electrical Equipment'),
(211, '', 'Engine Auxiliary Area Lighting'),
(212, '', 'Running Units Maintenance Tools'),
(213, '', 'DG Unit 4 Linkage Clamp'),
(214, '', 'lant Common Tools, Special Tools and Equipments'),
(215, '', 'Fabrication of Powerhouse Ventilation Louvers'),
(216, '', 'Spare Ideal Generator');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
`purpose_id` int(11) NOT NULL,
  `purpose_desc` text
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`purpose_id`, `purpose_desc`) VALUES
(1, 'Accommodation/Board and Lodging'),
(2, 'Construction'),
(3, 'Corrective Maintenance\r\n'),
(4, 'Feeding/Medical Mission\r\n'),
(5, 'Housekeeping'),
(6, 'Hydration'),
(7, 'Inventory, Preservation, and Tagging'),
(8, 'Office Supplies'),
(9, 'Employee Protection (PPE)'),
(10, 'PMS (1000 R-Hrs)'),
(11, 'PMS (1500 R-Hrs)'),
(12, 'PMS (2000 R-Hrs)'),
(13, 'PMS (3000 R-Hrs)'),
(14, 'PMS (4000 R-Hrs)'),
(15, 'PMS (500 R-Hrs)'),
(16, 'PMS (8000 R-Hrs)'),
(17, 'Reconditioning'),
(18, 'Renovation'),
(19, 'Replacement'),
(20, 'Running Units Consumables'),
(21, 'Security Monitoring'),
(22, 'Testing/Sampling'),
(23, 'Tree Planting'),
(24, 'First Aid Treatment/Medication'),
(25, 'Training on Oil Spill Contingency Planning'),
(26, 'Fabrication of Office Partition'),
(27, 'HFO Fuel Piping Insulation'),
(28, 'HFO Settling and Service Tanks Insulation'),
(29, 'Storage Area Enclosure'),
(31, 'Pipe & Cable Trench Enclosure'),
(32, 'Power House Enclosure - Phase 2'),
(33, 'Supply of Power and Lighting'),
(34, 'Replacement of Cooler Plate and Gasket for Lube Oil Cooler'),
(35, 'Assembling of lube oil cooler plate'),
(36, 'Generator Sliding Tools for Sulzer'),
(37, 'Cylinder Head Hydraulic Tensioning Tool.'),
(38, 'Equipment NGCP Requirements'),
(39, 'Refuel for Heavy Equipment'),
(40, 'Installation of Microwave Radio Equipment'),
(41, 'Staff House Use'),
(42, 'Repair and Maintenance'),
(43, 'Pest Control'),
(44, 'Fire Protection System'),
(45, 'Fabrication of Generator Sliding Tools'),
(46, 'Insullation Works Equipment'),
(47, 'Portable Maintenance Equipment'),
(48, 'Repainting Works'),
(49, 'Adopt An Estero Program of EMB-DENR'),
(50, 'Working Clothes'),
(51, 'Material Recovery'),
(52, 'Power House Enclosure - Phase 1'),
(53, 'Support in Lifting & Sliding of Stator housing'),
(54, 'Station Service No. 2'),
(55, 'Leadership Training'),
(56, 'Water Treatment'),
(57, 'HFO Sludge Basin Cleaning'),
(58, 'Painting Works'),
(59, 'Removal & Transfer of Mechanical Barracks'),
(60, 'Construction of Cantilever Rip-Rap Wall at Main Drain Canal for Protection of Transmission Line Concrete Take Off Pole Foundation'),
(61, 'EIC Consumables'),
(62, 'Refill Hydraulic Oil'),
(63, 'Installation of Pippings'),
(64, 'Fabrication of Platform and Ladder'),
(65, 'Additional Sludge Recovery Storage'),
(66, 'Purifier House Enclosure - North Side'),
(67, 'Body Base Effective Grounding Installation'),
(68, 'Lightings'),
(69, 'Safekeeping of Tools'),
(70, 'Installation and Fabrication'),
(71, 'Installation of Covers for Plant Equipment'),
(72, 'Excess Materials'),
(73, 'Online Monitoring & Alarm'),
(74, 'Electrical Hand Tools for Personal Accountability'),
(75, 'Inventory Beginning Balance'),
(76, 'Waste Heat Recovery Boilers Removal'),
(77, 'Auto Start/Stop of Deep Well Pump Refill to Raw Water Tank'),
(78, 'RTD Wire Jacket Overall Insulation (Insertion of RTD sensors to coil winding for insulation)'),
(79, 'Microwave Antenna Support Structure'),
(80, 'Ventilation of Working Area'),
(81, 'Oil Drain Line (New Installation)'),
(83, 'For Spare Unit on 125 VDC Battery, Bank for Generator'),
(84, '5MW Generator Exciter Contingency Parts'),
(85, 'Fuel For Rental of 0.3 cubic meter Bucket Backhoe'),
(86, 'CV Converted to Warehouse Phase 1'),
(87, 'Anti-Condensate Heater'),
(88, 'Temporary Christmas Decoration'),
(89, 'Sounding Activities'),
(90, 'Ready Spare for 3 Units Sulzer Engines (Speed Sensor Generator)'),
(91, 'Plant Decorations'),
(92, '40MVA Power Transformer, 6.6kV Additional Bus Support (Prevention of Bushing Oil Leak and Crack from Bus Movement)'),
(93, 'Pipe Segment Connecting Plates'),
(94, 'Progen Consumables'),
(95, 'DG4 & DG5 Generator: Correction of Erroneous RTD Probe Sensor Stator Winding Monitoring from PT50 to PT100'),
(96, 'Installation of Solar Powered / AC Powered Navigation Warning Light Flashing (As per Insurance requirement)'),
(97, 'Operations & Maintenance Consumables'),
(98, 'HFO Fuel Piping Insulation and Cladding'),
(99, 'Steel Pole for Microwave Antenna'),
(100, 'Grounding Installation for Microwave Antenna'),
(101, 'For Shells(Waste Heat Recovery Boilers Removal)'),
(102, 'Installation of Air Terminal'),
(103, 'Construction of Sounding Port Platform'),
(104, 'Fabrication of Battery Rack for 125Vdc Battery (100Ah)'),
(105, 'CV Converted to Warehouse Phase - 1 (Foundation)'),
(106, '40MVA Power Transformer Secondary Bus Framing/Support'),
(107, 'Personal Protective Equipment'),
(108, 'Grounding System Lay-out / Installation'),
(109, 'Fabrication of Guying Equalizer Bodies'),
(110, 'Replacement Materials for Riser Pipes and Consumables for Cleaning of Pump'),
(111, 'Repair of Left Bank Condition Canal'),
(112, 'Fabrication of Microwave Antenna Ladder'),
(113, 'Installation of Breaker'),
(114, 'Contingency Parts'),
(115, 'Threading of Lifting Tool'),
(116, 'Fabrication of Anchor Bolts'),
(117, 'Fabrication'),
(118, 'Christmas Prizes'),
(119, 'Additional Replacement Riser Pipes and Adapter'),
(120, 'Christmas Lantern Lightnings, Use for Christmas Party and Plant Light decor for Spirit of Christmas'),
(121, 'For Adjustment/Correction of Item Name'),
(122, 'Cover For MOCB Units'),
(123, 'Insulation of HFO Settling & Service Tanks'),
(124, 'Common Washing Area'),
(125, 'Fabrication of Lifting Frame for 4 Units Generator'),
(126, 'Additional Padlock for Reconditioning Equipment Tool Cabinet'),
(127, 'Uninterrupted Power Supply'),
(128, 'Installation of Protection Relay'),
(129, 'Installation of 5 Units Flood Lights Inside Power Plant Area'),
(130, 'Replacement and Spare of Damaged Mechanical Seal'),
(131, 'Renovation of All Electrical Outlet and Lan Cable'),
(132, 'Microwave Radio Equipment for NGCP Requirements'),
(133, 'Replacement of Damaged and Worn-out Parts'),
(134, 'Identification, Pre-Cleaning & Tagging of Spare Parts for PIELSTICK Engine, at CV Area (Additional )'),
(135, 'Re-Insulation of Jacket Water Motor in 4 Termination'),
(136, 'Microwave DC Supply Termination'),
(137, 'Suction of Header Line'),
(138, 'Lubricant Consumable for Plant Equipment ( Barring Gear, Lube Oil & Heavy Fuel Oil Purifier )'),
(139, 'Office Communication Equipment'),
(140, 'Security Lock'),
(141, 'Power Supply'),
(142, 'Testing Equipment'),
(143, 'BOF Requirement of Bago City Government'),
(144, 'For use in Lightning Strikes Monitoring, Interface on Microwave Antenna Lightning Protection System'),
(145, 'Roof Replacement @ Auxiliary'),
(146, 'Post Insulator Support'),
(147, 'Spare Anti Condensate heater for DG1, DG 2 and DG 3 Generator Winding'),
(148, 'Repainting and Repair of Smock Stack Shade and Structural support'),
(149, 'Reprogramming'),
(150, 'Acetylene and Oxygen Enclosure End Use'),
(151, 'Secondary Fire Exit'),
(152, 'Paint Removal'),
(153, 'Additional Installation of automatic Fire Detection and Alarm(AFDAS) Admin Office'),
(154, 'Grounding of Smoke Stacks'),
(155, 'Bus Differential Protection'),
(156, 'Use as Honing Machine Compressor Motor Feeder'),
(157, 'Laboratory Use'),
(158, 'Consumables for Hauling, Cleaning and Sorting of Electrical Parts in CV Area'),
(159, 'Installation of Smoke Detector'),
(160, 'Fire Safety Training & Fire Drill'),
(161, 'Change Lubricating Oil'),
(162, 'Feeder Supply Station'),
(163, 'Servicing Generator'),
(164, 'Servicing of Primary & Secondary Filters & Reconditioning of Fuel Injector'),
(165, 'Consumption of Heavy Equipment (Bulk Transfer & Re-positioning)'),
(166, 'Installation of AC Powered Navigational Warning Light Flashing(as per insurance requirement)'),
(167, 'For Use In Common Bus Differential Fault & Breaker Failure Protection'),
(168, 'Pump For Bleach / Chlorine To Be Used In 3DTrasar'),
(169, 'Backfilling / Ground Preparation / Canal Rip-rapping (1 side only)'),
(170, 'Equipment/Bulk Material Transfer/Re positioning'),
(171, 'Erection of Temporary Perimeter Fence'),
(172, 'Transferring of Panel'),
(173, 'Tool For Engine Leak Down Test'),
(174, 'Dismantling, Cleaning, Inspection, Crack Testing, Measurement & Evaluation, Reassembling & Preservation '),
(175, 'Polishing In Differential Control Panel'),
(176, 'Fabrication of Wooden Crates For Cylinder Head Assy & Cylinder Liner To Be Shipped to Mindoro'),
(177, 'Giveaway'),
(178, 'Cable Lay-out /  Installation'),
(179, 'For Connecting 2 Reference Grounding Point (Microwave Tower - Substation) to Prevent Potential Difference for the Microwave Device Protection'),
(180, 'Lightings for Maintenance Reconditioning Area and Fuel Farm Area'),
(181, 'Warehouse Cleaning Materials, Measuring Use & for Tagging & Preservation (Additional)'),
(182, 'For Office Documentation Use'),
(183, 'Installation of Switches'),
(184, 'Chemical Dosing for Unit 2 Cooling Tower Basin & Unit 4 Pielstick / DG5'),
(185, 'Labelling Content in Engine Fuel Tank'),
(186, 'Cover for Items ( Pick-up / Delivery )'),
(187, 'Installation of Microwave Control Panel at SCADA Room'),
(188, 'Additional Installation 15 Pcs of Pressure gauge 10 Bars/140 Psi (ASHCROFT)'),
(189, 'Use For Oil Analysis'),
(190, 'Service Vehicle Consumables'),
(191, 'Automation of Centrifugal Pump in Fire Fighting Control System'),
(192, 'Retapping'),
(193, 'Upgrading of AC Transformer'),
(194, 'Safekeeping of Testing Instrument'),
(195, 'Foundation & Enclosure'),
(196, '23 Additional CCTV Requirements at CENPRI Site'),
(197, 'Rectification of Charger Air Cooler Chamber Gas Leak'),
(198, 'Installation of CT and PT Test Points'),
(199, 'Installation of 750 kVa Transformer'),
(200, 'Machining & Fabrication of Unit 1 Lube Oil Priming Pump Shaft(Replacement to Damage Shaft)'),
(201, 'Maintenance & Reconditioning'),
(202, 'Erection of Company Signage at Maria Morena Cross Road'),
(203, 'Fabrication of Powerhouse Ventilation Louvers'),
(204, 'Installation'),
(205, 'Underground LV/HV Raceways for New 750KVA, 230 Volts Station Service Transforme'),
(206, 'Repair of Fabricated Racks for Sulzer & Pielstick Spareparts'),
(207, 'Repair of Air Leak and Re-Gasketing of Air Duct Consumables'),
(208, 'TEAM 3 - Servicing of 5MW Generator'),
(209, 'Installation, Testing & Commissioning of the Automatic Fire Suppression System for the Engine Room'),
(210, 'Installation of Piping in Cooling Tower Drain Chamber-Extension'),
(211, 'Configuration of EasyGen for Interlocking of Unit 4 & 5 NGR'),
(212, 'Enclosure and Termination of SEL 48713 Bus Protection Relay'),
(213, 'Repair of Air Leak and Re-Gasketting of Air Duct Tools Requirement'),
(214, 'Source Air & Ambient Air Monitoring as Per DENR Requirements / Compliance'),
(215, 'Replacement on MGC3 Panel Main Breaker'),
(216, 'Modification of Oil and Water Mechanical Separator Basin'),
(217, 'Repair of Air Leak and Re-Gasketing of Air Duct Consumables'),
(218, 'Flag Pole Fabrication'),
(219, 'Recharging of Battery'),
(220, 'Oil Spill Emergency Use Dispersant.'),
(221, 'For The Use on 8PC2-5 (Talisay Engine Inspection)'),
(222, 'For Air Cooler Thread Repair'),
(223, 'Powerhouse Ventilation: Phase 1 - Installation of Louvers'),
(224, 'For Turbo Drain Charger'),
(225, 'Fabrication of 3 Sample Racks for Warehouse'),
(226, 'Cleaning and Repiping of Sludge Tank No. 2'),
(227, 'Replacement of Damage EPC41 Controller Card End Use'),
(228, 'Installation of Terminal at New Battery'),
(229, 'Insulation & Cladding of Fuel Tanks Piping'),
(230, 'Installation of Current Transformer Support for Bus Differential Fault Protection'),
(231, 'Preservation of Boiler Waste Heat Recovery'),
(232, 'DG#5 Stator Winding Temperature Protection, additional'),
(233, 'Replacement of Busted Light Bulbs'),
(234, 'Maintenance Tools'),
(235, 'Tools Requirement for Repair at Air Duct.'),
(236, 'Powerhouse Ventilation: Phase 2 - Installation of Exhausters'),
(237, 'Deep cleaning, painting and preservation of tools and equipments (Additional)'),
(238, 'Consumables, Tools and Equipment''s for Spare Stator Rewinding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `enduse`
--
ALTER TABLE `enduse`
 ADD PRIMARY KEY (`enduse_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
 ADD PRIMARY KEY (`purpose_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `enduse`
--
ALTER TABLE `enduse`
MODIFY `enduse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=239;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 09:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdmobiledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sd_cancer_table`
--

CREATE TABLE `sd_cancer_table` (
  `id` int(11) NOT NULL,
  `cancer_type` varchar(255) NOT NULL,
  `dictoction_kashayas_juice_every_week` text NOT NULL,
  `dictoction_kashayas_juice_afternoon_each_week` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_cancer_table`
--

INSERT INTO `sd_cancer_table` (`id`, `cancer_type`, `dictoction_kashayas_juice_every_week`, `dictoction_kashayas_juice_afternoon_each_week`) VALUES
(1, 'Lung', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Turmeric Ginger'),
(2, 'Bone', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves\r\n', 'Fenugreek Leaves\r\nMint Leaves'),
(3, 'Brain', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Common Rue Cinnamon'),
(4, 'Blood', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Curry leaves \r\nPiper Betel Leaves'),
(5, 'Kidney/ Prostate', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves'),
(6, 'Breast', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Pongamia Pinnata Neem leaves'),
(7, 'Mouth', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Mint leaves \r\nGinger'),
(8, 'Thyroid/ Pancreatic', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Marigold leaves Tamarind or Drumstick leaves'),
(9, 'Stomach', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Tender Banana shoot Fenugreek leaves'),
(10, 'Skin', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Tender onion shoot Aloevera'),
(11, 'Intestine', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Pongamia Pinnata leaves \r\nFenugreek leaves'),
(12, 'Oesophagus', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves\r\n', 'Mint leaves \r\nGinger\r\n'),
(13, 'Liver', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Common Rue \r\nFenugreek leaves'),
(14, 'Uterus', 'Tristis (Nyctanthes Arbour) Peepal leaves Guava leaves', 'Papaya leaves \r\nPiper Betel leaves');

-- --------------------------------------------------------

--
-- Table structure for table `sd_disease_special_instructions_table`
--

CREATE TABLE `sd_disease_special_instructions_table` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_disease_special_instructions_table`
--

INSERT INTO `sd_disease_special_instructions_table` (`id`, `disease_id`, `instruction`) VALUES
(1, 3, 'Take 3 spoons of Coconut oil/Sesame oil/Safflower oil each one week		'),
(2, 2, 'Avoid Palm Jaggery if HbA1c is above 8.0');

-- --------------------------------------------------------

--
-- Table structure for table `sd_disease_table`
--

CREATE TABLE `sd_disease_table` (
  `id` int(11) NOT NULL,
  `ailment_or_disease` varchar(255) NOT NULL,
  `dictoction_kashayas_juice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_disease_table`
--

INSERT INTO `sd_disease_table` (`id`, `ailment_or_disease`, `dictoction_kashayas_juice`) VALUES
(1, 'Dialysis', 'Tristis (Nyctanthes Arbour) Coriander\nBoerhavia Diffusa Bryophyllum leaves Phyllanthus amarus Giloy leaves / Fenugreek leaves'),
(2, 'Diabetes', 'Mint leaves Drum stick leaves Black plum Tindoora leaves'),
(3, 'Thyroid PCOD Fibroid Hormonal Imbalance', 'Aegle Marmelos leaves / Pongamia Pinnata / Tamarind leaves / Drumstick leaves\nSour Spinach / Piper Betel leaves / Neem leaves Peepal Leaves'),
(4, 'Blood Pressure', 'Aegle Marmelos leaves Holy Basil\nCoriander leaves\nOpuntia Dilleni Cactaceae Rauvolfia Serpentine leaves'),
(5, 'Obesity', 'Peepal leaves / Betel\nleaves\nCumin seeds / Turmeric /\nBermuda grass (Cynodon\ndactylon) / Plam leaves'),
(6, 'Weight Gaining', 'Mustard seeds\nFenugreek seeds\nCumin seeds'),
(7, 'Asthma TB', 'Black Pepper\nGiner\nTurmeric\nPongamia Pinnata'),
(8, 'Pakinson\'s or Alzheimers', 'Turmeric / Cinnamon /\nGinger/ Cinnamon /\nCommon Rue leaves /\nGuava leaves / Drum stick\nleaves\nCoconut oil, Ground oil 3\nspoons each one week'),
(9, 'Kidney Stones', 'Mint leaves/ Coriander\nleaves/ Banana stem pulp/\nSour Spinach leaves/\nAcacia Farnesiana leaves/\nDill weed leaves'),
(10, 'Increase Memory', 'Turmeric Cinnamon Sesame leaves Drum stick leaves'),
(11, 'Gastric Acidity', 'Mint leaves / Piper Betel Leaves / Pongamia Pinnata / Cassia Auriculata / All Spice leaves (Green)'),
(12, 'Arthritis and knee joint pains', 'Tristis (Nyctanthes Arbour) leaves / Peepal leaves / Aegle Marmelos leaves / Sour Spinach leaves / Guava leaves'),
(13, 'Eye Problem', 'Carrot / Mint leaves / Dill weed / All spices leaves (Green) / Drum stick leaves'),
(14, 'Nerves problem', 'Cynodon Dactylon (Scutch grass) / Guava Leaves / Tristis (Nyctanthes Arbour) / Common Rue\n(Ruta Graveolens)'),
(15, 'Liver/Kidney Purification', 'Gout Common Rue (Ruta Graveolens) /\nFenugreek leaves or seeds/ Bryophyllum Acacia Famesiana /\nBoerhavia diffusa'),
(16, 'thyroid PCOD Fibroid Hormonal Imbalance', 'Ash guard Juice / Cucumber Juice / Bottle guard Juice 200ml Kashayas Coriander leaves / Piper Betel leaves\n/ Holy Basil'),
(17, 'Fits/Seizures', 'Turmeric/ Palm leaves / Cynodon Dactylon (Scutch grass)/ Indian Plum (Ziziphus mauritiana)\nCoconut oil, Ground nut oil each one week'),
(18, 'C4, C5, L4,\nL5, Spinal cord', 'Curry leaves Tristis (Nyctanthes Arbour)\nGuava leaves'),
(19, 'Varicose veins', 'Tomato Juice Lvy Gourd leaves\nTristis (Nyctanthes Arbour)\nPapaya leaves'),
(20, 'Prostate\nGlands', 'Boerhavia Diffusa Tristis (Nyctanthes Arbour)\nCoriander leaves Mint leaves Bryophyllum'),
(21, 'Infertility', 'Peepal leaves Neem leaves Drum stick leaves Betel leaves (Remove the stalk)'),
(22, 'Urine\nInfection UTI', 'Bryophyllum leaves Coriander leaves Mint leaves\nDrum stick leaves Boerhavia Diffusa leaves'),
(23, 'ESR\n(Erythrocyte sedimentation', 'Carrot Juice Amla Juice Beetroot Juice'),
(24, 'Skin Issues', 'Aloevera Juice\nCynodon Dactylon leaves Holy Basil leaves Sesame Laddu once\nin a week\nApply sesame oil to skin'),
(25, 'Increase\nPlatelets Dengue', 'Papaya leaves / Drum Stick leaves / Tamarind leaves / Tristis (Nyctanthes Arbour) / Common Rue / Wood apple leaves / Giloy leaves'),
(26, 'Paralysis', 'Aegle Marmelos leaves / Cynodon Dactylon / Giloy leaves/ Mint leaves Coconut oil, Ground nut oil each one week'),
(27, 'Psoriasis', 'Coriander leaves Bacopa monnieri Aloevera juice'),
(28, 'Constipation, Piles', 'Guava leaves\nCassia auriculata leaves Fenugreek leaves Pongamia Pinnata'),
(29, 'HIV', 'Giloy leaves Cynodon Dactylon Beal leaves\nNiger seeds to be eaten'),
(30, 'SLE\n(Lupus', 'Palm leaves Beal leaves\nCynodon Dactylon Coconut oil, Safflower oil 3 spoons each for\none week'),
(31, 'IBS (Irritable Bowel Syndrome)', 'Fenugreek leaves / Papaya leaves / Coriander leaves / Betel leaves\n(without stalk) Mint leaves / Tindora leaves'),
(32, 'Colitis', 'Castor leaves Guava leaves Pongamia Pinnata'),
(33, 'Chicken Guniya', 'Cynodon Dactylon Common Rue Chrysanthemum tea (Own garden) Cyamamela tea'),
(34, 'Aegle Marmelos leaves Cynodon Dactylon Pongamia Pinnata Coconut oil, Safflower oil and Sesame oil 3 spoons each 1 week', 'Aegle Marmelos leaves Cynodon Dactylon Pongamia Pinnata Coconut oil, Safflower oil and Sesame oil 3 spoons each 1 week'),
(35, 'Teeth Issues', 'Palm leaves Peepal Leaves Turmeric'),
(36, '. Uterus\n(Women) Related Issues', 'Custard Apple leaves / Guava leaves /\nDrum stick leaves / Tamarind leaves / Piper Betel leaves/ Peepal leaves'),
(37, 'Pregnancy', 'Chamomile tea (Home made) Lemon grass Mint leaves\nSour Spinach leaves'),
(38, 'Pneumonia', 'Turmeric Cumin seeds Dry ginger\nCynodon Dactylon Giloy leaves'),
(39, 'Fatty liver', 'Aegle Marmelos leaves / Common Rue / Mint leaves / Piper Betel leaves Coconut oil, Sesame oil\n3 spoon each one week'),
(40, 'Attention deficit disorder/ Borderline / Artezam / Hyperactive', 'Tristis (Nyctanthes Arbour)\nPeepal leaves Turmeric'),
(41, 'After Pregnancy', 'Chamomile tea (Home made) Lemon grass Mint leaves\nSour Spinach leaves Castor seeds\n(Remove belly button)');

-- --------------------------------------------------------

--
-- Table structure for table `sd_general_notes`
--

CREATE TABLE `sd_general_notes` (
  `Id` int(11) NOT NULL,
  `Description` varchar(214) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_general_notes`
--

INSERT INTO `sd_general_notes` (`Id`, `Description`) VALUES
(1, 'When you eat foxtail few mothers milk may reduce'),
(2, 'Sour Spinach Dal, Sour Spinach Pickle and take rest of the pickles frequently'),
(3, 'Mother breast feeding is must up to 9 months while stopping mothers milk you can give following milk to baby 3 days coconut milk, 1 day Sesame milk, 1 day Finger millet milk, 1 day Sorghum milk, 1 day Foxtail milk.'),
(4, 'Guava fruit has been hailed as one of the super fruits due   to the numerous health benefits it offers (Add Chilli powder while eating)'),
(5, 'Sour Spinach leaves kashaya is good for all ladies issues'),
(6, 'To get rid of heat in the body Use Mint leaves, Cynodon\r\nDactylon (Scutch grass), Pongamia Pinnata'),
(7, 'De-addiction : Drink following Kashayas to get rid of addiction 1) Pongamia\r\nPinnata 1 week 2) Giloy leaves 1 week 3) Castor Oil plant leaves'),
(8, 'Tea Substitute kashaya\'s : 1) Lemon grass, 2) Kodo husk,\r\n3) Holy Basil, 4) Mint leaves'),
(9, 'Immunity Booster : 1) Cynodon Dactylon, 2) Holy Basil,\r\n3) Giloy leaves, 4) Aegle Marmelos leaves, 5) Pongamia Pinnata,\r\n6) Neem leaves, 7) Peepal leaves each 4 days'),
(10, 'Viral fever : Kodo millet, Little millet porridge and Common Rue\r\nleaves, Tristis (Nyctanthes Arbour) leaves kashaya each 1 week'),
(11, 'Passion fruit is good for sound sleep and stop racing thoughts'),
(12, 'To control loss Motions use : 1) Pongamia pinnata kashaya 2) Mint leaves kashaya.'),
(13, 'To control vomitins use : 1) Holy Basil kashaya, 2) Carom seeds Kashaya'),
(14, 'To avoid bad smell in mouth drink mustard oil.');

-- --------------------------------------------------------

--
-- Table structure for table `sd_kids_note_table`
--

CREATE TABLE `sd_kids_note_table` (
  `id` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_kids_note_table`
--

INSERT INTO `sd_kids_note_table` (`id`, `note`) VALUES
(1, 'Kids problem in speaking : Peepal Leaves'),
(2, 'Improve Iron : Curry leaves, Cynodon\r\ndactylon, Kodo grass'),
(3, 'Purify blood : Curry leaves'),
(4, 'To improve mother milk : Curry leaves, Drumstick leaves, Pearl'),
(5, 'For any fevers : Tristis (Nyctanthes Arbour)'),
(6, 'Constipation : Guava leaves, Betel leaves'),
(7, 'Purify liver : Coriander leaves,\r\nAegle Marmelos leaves'),
(8, 'Fibromyalgia : Common Rue'),
(9, 'Mind peace : Piper Betel leaves\r\n(Remove tip)'),
(10, 'Teeth issues : Brush with Pongamia'),
(11, 'Nose, Ear, Skin : Neem leaves, All Spices'),
(12, 'Deep Sleep : Banana or Banana shoot');

-- --------------------------------------------------------

--
-- Table structure for table `sd_millets_table`
--

CREATE TABLE `sd_millets_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `scientific_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alternative_names` varchar(255) CHARACTER SET latin1 NOT NULL,
  `millet_type` enum('SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS','NEUTRAL GRAINS','NEGATIVE GRAINS') CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `uses` text CHARACTER SET latin1 NOT NULL,
  `nutrition` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `sd_millets_table`
--

INSERT INTO `sd_millets_table` (`id`, `name`, `scientific_name`, `alternative_names`, `millet_type`, `description`, `uses`, `nutrition`) VALUES
(1, 'Browntop Millet', '', '', 'SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS', '', '\"Digestive system, arthritis, obesity,\r\nhypertension, thyroids, eye\r\narthritis, Parkinson’s, epilepsy\"', '{\r\n	\"NIACIN (MG B2)\": 18.5,\r\n	\"RIBOGLAVIN (MG B2)\": 0.027,\r\n	\"THIAMINE (MG B1)\": 3.2,\r\n	\"CARATONE (MG)\": 0,\r\n	\"IRON (MG)\": 0.6,\r\n	\"FIBER (GMS)\": 12.5,\r\n	\"SUGAR/CARBS (GMS)\": 69.7,\r\n	\"CALCUIM (GMS)\": 0.01,\r\n	\"PHOSPHOROUS (MG)\": 0.47,\r\n	\"PROTEIN (GMS)\": 11.5,\r\n	\"MINERALS (GMS)\": 4.2\r\n}'),
(2, 'Kodo Millet', '', '', 'SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS', ' ', 'Blood impurities, anaemia, weakness,\nimmunity, diabetes, constipation, insomnia', '{\"NIACIN (MG B2)\": 2,\r\n    \"RIBOGLAVIN (MG B2)\": 0.09,\r\n    \"THIAMINE (MG B1)\": 0.33,\r\n    \"CARATONE (MG)\": 0,\r\n    \"IRON (MG)\": 2.9,\r\n    \"FIBER (GMS)\": 9,\r\n    \"SUGAR/CARBS (GMS)\": 65.6,\r\n    \"CALCUIM (GMS)\": 0.04,\r\n    \"PHOSPHOROUS (MG)\": 0.24,\r\n    \"PROTEIN (GMS)\": 6.2,\r\n    \"MINERALS (GMS)\": 2.6\r\n  }'),
(3, 'Little Millet', '', '', 'SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS', ' ', 'Uterus, PCOD, male and female, infertility', '{\"NIACIN (MG B2)\": 1.5,\r\n    \"RIBOGLAVIN (MG B2)\": 0.07,\r\n    \"THIAMINE (MG B1)\": 0.3,\r\n    \"CARATONE (MG)\": 0,\r\n    \"IRON (MG)\": 2.8,\r\n    \"FIBER (GMS)\": 9.8,\r\n    \"SUGAR/CARBS (GMS)\": 65.5,\r\n    \"CALCUIM (GMS)\": 0.02,\r\n    \"PHOSPHOROUS (MG)\": 0.28,\r\n    \"PROTEIN (GMS)\": 7.7,\r\n    \"MINERALS (GMS)\": 1.5\r\n  }'),
(4, 'Foxtail Millet', '', '', 'SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS', ' ', 'Nervous system, psychological, disorders,\narthritis, Parkinson?s, epilepsy', '{ \"NIACIN (MG B2)\": 0.7,\r\n    \"RIBOGLAVIN (MG B2)\": 0.11,\r\n    \"THIAMINE (MG B1)\": 0.59,\r\n    \"CARATONE (MG)\": 32,\r\n    \"IRON (MG)\": 6.3,\r\n    \"FIBER (GMS)\": 8,\r\n    \"SUGAR/CARBS (GMS)\": 60.6,\r\n    \"CALCUIM (GMS)\": 0.03,\r\n    \"PHOSPHOROUS (MG)\": 0.29,\r\n    \"PROTEIN (GMS)\": 12.3,\r\n    \"MINERALS (GMS)\": 3.3\r\n  }'),
(5, 'Barnyard Millet', '', '', 'SIRDHANYA OR RICH GRAINS OR POSITIVE GRAINS', ' ', 'Liver, kidney, excess bad, cholesterol,\nendocrine glands', '{\"NIACIN (MG B2)\": 1.5,\r\n    \"RIBOGLAVIN (MG B2)\": 0.08,\r\n    \"THIAMINE (MG B1)\": 0.31,\r\n    \"CARATONE (MG)\": 0,\r\n    \"IRON (MG)\": 2.9,\r\n    \"FIBER (GMS)\": 9.8,\r\n    \"SUGAR/CARBS (GMS)\": 65.5,\r\n    \"CALCUIM (GMS)\": 0.02,\r\n    \"PHOSPHOROUS (MG)\": 0.28,\r\n    \"PROTEIN (GMS)\": 6.2,\r\n    \"MINERALS (GMS)\": 4.4\r\n  }'),
(6, 'Finger Millet', '', '', 'NEUTRAL GRAINS', '', '', '{\"NIACIN (MG B2)\": 1.1,\r\n    \"RIBOGLAVIN (MG B2)\": 0.19,\r\n    \"THIAMINE (MG B1)\": 0.42,\r\n    \"CARATONE (MG)\": 42,\r\n    \"IRON (MG)\": 5.4,\r\n    \"FIBER (GMS)\": 3.6,\r\n    \"SUGAR/CARBS (GMS)\": 72.7,\r\n    \"CALCUIM (GMS)\": 0.33,\r\n    \"PHOSPHOROUS (MG)\": 0.27,\r\n    \"PROTEIN (GMS)\": 7.1,\r\n    \"MINERALS (GMS)\": 2.7\r\n  }'),
(7, 'Jowar Sorghum', '', '', 'NEUTRAL GRAINS', '', '', '{\"NIACIN (MG B2)\": 1.8,\r\n    \"RIBOGLAVIN (MG B2)\": 0.13,\r\n    \"THIAMINE (MG B1)\": 0.37,\r\n    \"CARATONE (MG)\": 47,\r\n    \"IRON (MG)\": 4.1,\r\n    \"FIBER (GMS)\": 1.3,\r\n    \"SUGAR/CARBS (GMS)\": 72.4,\r\n    \"CALCUIM (GMS)\": 0.03,\r\n    \"PHOSPHOROUS (MG)\": 0.28,\r\n    \"PROTEIN (GMS)\": 10.4,\r\n    \"MINERALS (GMS)\": 1.6\r\n  }'),
(8, 'Proso Millet', '', '', 'NEUTRAL GRAINS', '', '', '{\"NIACIN (MG B2)\": 2.3,\r\n    \"RIBOGLAVIN (MG B2)\": 0.18,\r\n    \"THIAMINE (MG B1)\": 0.2,\r\n    \"CARATONE (MG)\": 0,\r\n    \"IRON (MG)\": 5.9,\r\n    \"FIBER (GMS)\": 2.2,\r\n    \"SUGAR/CARBS (GMS)\": 68.9,\r\n    \"CALCUIM (GMS)\": 0.01,\r\n    \"PHOSPHOROUS (MG)\": 0.33,\r\n    \"PROTEIN (GMS)\": 12.5,\r\n    \"MINERALS (GMS)\": 1.9\r\n  }'),
(9, 'Pearl Millet', '', '', 'NEUTRAL GRAINS', '', '', '{\"NIACIN (MG B2)\": \"\",\r\n    \"RIBOGLAVIN (MG B2)\": \"\",\r\n    \"THIAMINE (MG B1)\": \"\",\r\n    \"CARATONE (MG)\": \"\",\r\n    \"IRON (MG)\": \"\",\r\n    \"FIBER (GMS)\": \"\",\r\n    \"SUGAR/CARBS (GMS)\": \"\",\r\n    \"CALCUIM (GMS)\": \"\",\r\n    \"PHOSPHOROUS (MG)\": \"\",\r\n    \"PROTEIN (GMS)\": \"\",\r\n    \"MINERALS (GMS)\": \"\"\r\n  }'),
(10, 'MAIZE', '', '', 'NEUTRAL GRAINS', '', '', '{ \"NIACIN (MG B2)\": 1.4,\r\n    \"RIBOGLAVIN (MG B2)\": 0.1,\r\n    \"THIAMINE (MG B1)\": 0.42,\r\n    \"CARATONE (MG)\": 90,\r\n    \"IRON (MG)\": 2.1,\r\n    \"FIBER (GMS)\": 2.7,\r\n    \"SUGAR/CARBS (GMS)\": 66.2,\r\n    \"CALCUIM (GMS)\": 0.01,\r\n    \"PHOSPHOROUS (MG)\": 0.33,\r\n    \"PROTEIN (GMS)\": 11.1,\r\n    \"MINERALS (GMS)\": \"-\"\r\n  }'),
(11, 'WHEAT', '', '', 'NEGATIVE GRAINS', '', '', '{\"NIACIN (MG B2)\": 5,\r\n    \"RIBOGLAVIN (MG B2)\": 0.17,\r\n    \"THIAMINE (MG B1)\": 0.35,\r\n    \"CARATONE (MG)\": 64,\r\n    \"IRON (MG)\": 5.3,\r\n    \"FIBER (GMS)\": 1.2,\r\n    \"SUGAR/CARBS (GMS)\": 76.2,\r\n    \"CALCUIM (GMS)\": 0.05,\r\n    \"PHOSPHOROUS (MG)\": 0.32,\r\n    \"PROTEIN (GMS)\": 11.8,\r\n    \"MINERALS (GMS)\": 1.5\r\n  }'),
(12, 'PADDY RICE', '', '', 'NEGATIVE GRAINS', '', '', '{ \"NIACIN (MG B2)\": 1.2,\r\n    \"RIBOGLAVIN (MG B2)\": 0.06,\r\n    \"THIAMINE (MG B1)\": 0.06,\r\n    \"CARATONE (MG)\": 0,\r\n    \"IRON (MG)\": 1,\r\n    \"FIBER (GMS)\": 0.2,\r\n    \"SUGAR/CARBS (GMS)\": 79,\r\n    \"CALCUIM (GMS)\": 0.01,\r\n    \"PHOSPHOROUS (MG)\": 0.11,\r\n    \"PROTEIN (GMS)\": 6.9,\r\n    \"MINERALS (GMS)\": 0.6\r\n  }');

-- --------------------------------------------------------

--
-- Table structure for table `sd_millet_diet_cancer_table`
--

CREATE TABLE `sd_millet_diet_cancer_table` (
  `Id` int(11) NOT NULL,
  `cancer_type_id` int(11) NOT NULL,
  `millet_Id` int(11) NOT NULL,
  `number_of_days` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_millet_diet_cancer_table`
--

INSERT INTO `sd_millet_diet_cancer_table` (`Id`, `cancer_type_id`, `millet_Id`, `number_of_days`) VALUES
(1, 1, 3, '2'),
(2, 1, 4, '2'),
(3, 1, 2, '1'),
(4, 1, 5, '1'),
(5, 1, 1, '1'),
(6, 2, 3, '2'),
(7, 2, 2, '2'),
(8, 2, 1, '2'),
(9, 2, 4, '1'),
(10, 2, 5, '1'),
(11, 3, 3, '2'),
(12, 3, 2, '2'),
(13, 3, 1, '2'),
(14, 3, 5, '1'),
(15, 3, 4, '1'),
(16, 4, 3, '2'),
(17, 4, 2, '2'),
(18, 4, 1, '2'),
(19, 4, 5, '1'),
(20, 4, 4, '1'),
(21, 5, 3, '2'),
(22, 5, 1, '2'),
(23, 5, 5, '2'),
(24, 5, 2, '1'),
(25, 5, 4, '1'),
(26, 6, 1, '2'),
(27, 6, 2, '2'),
(28, 6, 3, '1'),
(29, 6, 5, '1'),
(30, 6, 4, '1'),
(31, 7, 3, '2'),
(32, 7, 4, '2'),
(33, 7, 2, '1'),
(34, 7, 5, '1'),
(35, 7, 1, '1'),
(36, 8, 3, '2'),
(37, 8, 2, '2'),
(38, 8, 4, '1'),
(39, 8, 5, '1'),
(40, 8, 1, '1'),
(41, 9, 4, '2'),
(42, 9, 1, '2'),
(43, 9, 3, '1'),
(44, 9, 2, '1'),
(45, 9, 5, '1'),
(46, 10, 1, '2'),
(47, 10, 2, '1'),
(48, 10, 5, '1'),
(49, 10, 3, '1'),
(50, 10, 4, '1'),
(51, 11, 1, '2'),
(52, 11, 2, '2'),
(53, 11, 5, '2'),
(54, 11, 3, '1'),
(55, 11, 4, '1'),
(56, 12, 1, '2'),
(57, 12, 2, '2'),
(58, 12, 3, '2'),
(59, 12, 5, '1'),
(60, 12, 4, '1'),
(61, 13, 1, '2'),
(62, 13, 2, '2'),
(63, 13, 5, '2'),
(64, 13, 3, '1'),
(65, 13, 4, '1'),
(66, 14, 2, '2'),
(67, 14, 5, '2'),
(68, 14, 3, '2'),
(69, 14, 4, '1'),
(70, 14, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sd_millet_diet_diseases_table`
--

CREATE TABLE `sd_millet_diet_diseases_table` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `millet_id` int(11) NOT NULL,
  `number_of_days` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd_millet_diet_diseases_table`
--

INSERT INTO `sd_millet_diet_diseases_table` (`id`, `disease_id`, `millet_id`, `number_of_days`) VALUES
(1, 1, 3, '2'),
(2, 1, 2, '2'),
(3, 1, 4, '1'),
(4, 1, 5, '1'),
(5, 1, 1, '1'),
(6, 2, 4, '2'),
(7, 2, 3, '2'),
(8, 2, 2, '2'),
(9, 2, 5, '1'),
(10, 2, 1, '1'),
(11, 3, 3, '3'),
(12, 3, 4, '1'),
(13, 3, 2, '1'),
(14, 3, 5, '1'),
(15, 3, 1, '1'),
(16, 4, 4, '2'),
(17, 4, 3, '2'),
(18, 4, 2, '2'),
(19, 4, 4, '2'),
(20, 4, 1, '2'),
(21, 5, 3, '3'),
(22, 5, 2, '3'),
(23, 5, 4, '1'),
(24, 5, 5, '1'),
(25, 5, 1, '1'),
(26, 6, 3, '3'),
(27, 6, 2, '3'),
(28, 6, 4, '1'),
(29, 6, 5, '1'),
(30, 6, 1, '1'),
(31, 7, 4, '2'),
(32, 7, 3, '2'),
(33, 7, 2, '2'),
(34, 7, 1, '2'),
(35, 7, 5, '2'),
(36, 8, 4, '3'),
(37, 8, 5, '3'),
(38, 8, 3, '1'),
(39, 8, 2, '1'),
(40, 8, 4, '1'),
(41, 9, 4, '2'),
(42, 9, 3, '2'),
(43, 9, 2, '2'),
(44, 9, 1, '2'),
(45, 9, 5, '2'),
(46, 10, 3, '3'),
(47, 10, 4, '1'),
(48, 10, 2, '1'),
(49, 10, 5, '1'),
(50, 10, 1, '1'),
(51, 11, 4, '3'),
(52, 11, 1, '3'),
(53, 11, 3, '1'),
(54, 11, 2, '1'),
(55, 11, 5, '1'),
(56, 12, 4, '3'),
(57, 12, 1, '3'),
(58, 12, 3, '1'),
(59, 12, 2, '1'),
(60, 12, 5, '1'),
(61, 13, 4, '3'),
(62, 13, 1, '3'),
(63, 13, 2, '1'),
(64, 13, 3, '1'),
(65, 13, 5, '1'),
(66, 14, 3, '3'),
(67, 14, 2, '3'),
(68, 14, 4, '1'),
(69, 14, 5, '1'),
(70, 14, 1, '1'),
(71, 15, 5, '3'),
(72, 15, 4, '1'),
(73, 15, 1, '1'),
(74, 15, 2, '1'),
(75, 15, 3, '1'),
(76, 16, 3, '2'),
(77, 16, 2, '2'),
(78, 16, 5, '3'),
(79, 16, 4, '1'),
(80, 16, 1, '1'),
(81, 17, 4, '3'),
(82, 17, 1, '3'),
(83, 17, 3, '1'),
(84, 17, 2, '1'),
(85, 17, 5, '1'),
(86, 18, 4, '3'),
(87, 18, 1, '3'),
(88, 18, 3, '1'),
(89, 18, 2, '1'),
(90, 18, 5, '1'),
(91, 19, 4, '2'),
(92, 19, 3, '2'),
(93, 19, 2, '2'),
(94, 19, 5, '2'),
(95, 19, 1, '2'),
(96, 20, 3, '2'),
(97, 20, 2, '2'),
(98, 20, 4, '1'),
(99, 20, 5, '1'),
(100, 20, 1, '1'),
(101, 21, 4, '2'),
(102, 21, 3, '2'),
(103, 21, 2, '2'),
(104, 21, 5, '2'),
(105, 21, 1, '2'),
(106, 22, 4, '3'),
(107, 22, 2, '3'),
(108, 22, 4, '1'),
(109, 22, 5, '1'),
(110, 22, 1, '1'),
(111, 23, 2, '2'),
(112, 23, 4, '2'),
(113, 23, 3, '1'),
(114, 23, 5, '1'),
(115, 23, 1, '1'),
(116, 24, 3, '2'),
(117, 24, 2, '2'),
(118, 24, 4, '1'),
(119, 24, 5, '1'),
(120, 24, 1, '1'),
(121, 25, 3, '2'),
(122, 25, 2, '2'),
(123, 25, 5, '1'),
(124, 25, 4, '1'),
(125, 25, 1, '1'),
(126, 26, 1, '2'),
(127, 26, 4, '2'),
(128, 26, 2, '1'),
(129, 26, 3, '1'),
(130, 26, 4, '1'),
(131, 27, 1, '3'),
(132, 27, 4, '3'),
(133, 27, 2, '1'),
(134, 27, 3, '1'),
(135, 27, 5, '1'),
(136, 28, 1, '3'),
(137, 28, 4, '1'),
(138, 28, 2, '1'),
(139, 28, 3, '1'),
(140, 28, 5, '1'),
(141, 29, 2, '3'),
(142, 29, 1, '1'),
(143, 29, 4, '1'),
(144, 29, 3, '1'),
(145, 29, 5, '1'),
(146, 30, 1, '3'),
(147, 30, 4, '3'),
(148, 30, 3, '1'),
(149, 30, 5, '1'),
(150, 30, 2, '1'),
(151, 31, 2, '3'),
(152, 32, 3, '3'),
(153, 33, 1, '1'),
(154, 34, 4, '1'),
(155, 35, 5, '1'),
(156, 36, 2, '3'),
(157, 36, 3, '3'),
(158, 36, 1, '1'),
(159, 36, 4, '1'),
(160, 36, 5, '1'),
(161, 37, 4, '2'),
(162, 37, 3, '2'),
(163, 37, 2, '2'),
(164, 37, 5, '2'),
(165, 37, 1, '2'),
(166, 38, 4, '4'),
(167, 38, 3, '1'),
(168, 38, 2, '1'),
(169, 38, 1, '1'),
(170, 38, 5, '1'),
(171, 39, 3, '3'),
(172, 39, 2, '3'),
(173, 39, 5, '3'),
(174, 39, 1, '1'),
(175, 39, 4, '1'),
(176, 40, 3, '3'),
(177, 40, 4, '1'),
(178, 40, 2, '1'),
(179, 40, 5, '1'),
(180, 40, 1, '1'),
(181, 41, 3, '3'),
(182, 41, 4, '1'),
(183, 41, 2, '1'),
(184, 41, 5, '1'),
(185, 41, 1, '1'),
(186, 41, 9, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sd_cancer_table`
--
ALTER TABLE `sd_cancer_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_disease_special_instructions_table`
--
ALTER TABLE `sd_disease_special_instructions_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_disease_table`
--
ALTER TABLE `sd_disease_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_general_notes`
--
ALTER TABLE `sd_general_notes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sd_kids_note_table`
--
ALTER TABLE `sd_kids_note_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_millets_table`
--
ALTER TABLE `sd_millets_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sb_millets_table_name_unique` (`name`);

--
-- Indexes for table `sd_millet_diet_cancer_table`
--
ALTER TABLE `sd_millet_diet_cancer_table`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_cancer_id` (`cancer_type_id`),
  ADD KEY `fk_millet_cancer_id` (`millet_Id`);

--
-- Indexes for table `sd_millet_diet_diseases_table`
--
ALTER TABLE `sd_millet_diet_diseases_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disease_id` (`disease_id`),
  ADD KEY `millet_id` (`millet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sd_cancer_table`
--
ALTER TABLE `sd_cancer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sd_disease_special_instructions_table`
--
ALTER TABLE `sd_disease_special_instructions_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sd_disease_table`
--
ALTER TABLE `sd_disease_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sd_general_notes`
--
ALTER TABLE `sd_general_notes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sd_kids_note_table`
--
ALTER TABLE `sd_kids_note_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sd_millets_table`
--
ALTER TABLE `sd_millets_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sd_millet_diet_cancer_table`
--
ALTER TABLE `sd_millet_diet_cancer_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sd_millet_diet_diseases_table`
--
ALTER TABLE `sd_millet_diet_diseases_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sd_millet_diet_cancer_table`
--
ALTER TABLE `sd_millet_diet_cancer_table`
  ADD CONSTRAINT `fk_cancer_id` FOREIGN KEY (`cancer_type_id`) REFERENCES `sd_cancer_table` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_millet_cancer_id` FOREIGN KEY (`millet_Id`) REFERENCES `sd_millets_table` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sd_millet_diet_diseases_table`
--
ALTER TABLE `sd_millet_diet_diseases_table`
  ADD CONSTRAINT `fk_diseases_id` FOREIGN KEY (`disease_id`) REFERENCES `sd_disease_table` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_millet_id` FOREIGN KEY (`millet_id`) REFERENCES `sd_millets_table` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sd_millet_diet_diseases_table_ibfk_1` FOREIGN KEY (`disease_id`) REFERENCES `sd_disease_table` (`id`),
  ADD CONSTRAINT `sd_millet_diet_diseases_table_ibfk_2` FOREIGN KEY (`millet_id`) REFERENCES `sd_millets_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 10:08 PM
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
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `Serial_No` int(30) NOT NULL,
  `D_Username` varchar(30) NOT NULL,
  `P_Username` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`Serial_No`, `D_Username`, `P_Username`, `Date`, `Status`) VALUES
(1, 'D-100', 'P-104', '2024-01-03', 'Checked'),
(2, 'D-100', 'P-101', '2024-01-03', 'Checked'),
(3, 'D-100', 'P-100', '2024-01-03', ''),
(1, 'D-101', 'P-102', '2024-01-03', ''),
(2, 'D-101', 'P-103', '2024-01-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_Username` varchar(30) NOT NULL,
  `D_Name` varchar(30) NOT NULL,
  `D_Email` varchar(30) NOT NULL,
  `D_Phone` varchar(30) NOT NULL,
  `D_DOB` date NOT NULL,
  `D_Gender` varchar(30) NOT NULL,
  `D_Address` varchar(30) NOT NULL,
  `D_Salary` varchar(30) NOT NULL,
  `D_Qualification` varchar(30) NOT NULL,
  `D_Speciality` varchar(30) NOT NULL,
  `D_ProfilePicture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_Username`, `D_Name`, `D_Email`, `D_Phone`, `D_DOB`, `D_Gender`, `D_Address`, `D_Salary`, `D_Qualification`, `D_Speciality`, `D_ProfilePicture`) VALUES
('D-100', 'Sabit', 'sabithasan940@gmail.com', '01886730703', '2023-12-26', 'Male', 'Kuratoli, Dhaka', '500', 'MBBS', 'Eye', ''),
('D-101', 'Hasan', 'hasan@gmail.com', '01631730703', '2023-12-31', 'Male', 'Kuratoli, Dhaka', '600', 'MBBS', 'Skin', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('D-100', '123'),
('D-101', '456');

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `P_Username` varchar(30) NOT NULL,
  `VisitReason` varchar(50) NOT NULL,
  `MedicalProblems` varchar(50) NOT NULL,
  `PreviousSurgeries` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`P_Username`, `VisitReason`, `MedicalProblems`, `PreviousSurgeries`, `Date`) VALUES
('P-100', 'Fever ', 'Diabetes, Heart Disease', 'None', '2024-01-03'),
('P-101', 'Chronic liver disease', 'Diabetes, Shortness of Breath', 'EVL, CPC', '2024-01-03'),
('P-102', 'Chronic liver disease', 'Diabetes, Shortness of Breath', 'EVL, CPC', '2024-01-03'),
('P-103', 'Fever', 'Diabetes, Heart Disease', 'None', '2024-01-03'),
('P-104', 'Fever', 'Diabetes, Heart Disease', 'None', '2024-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `Brand_Name` varchar(50) NOT NULL,
  `Generic_Name` varchar(50) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Indications` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`Brand_Name`, `Generic_Name`, `Company_Name`, `Indications`) VALUES
('Tab. Napa 500 mg', 'Paracetamol', 'Beximco Pharmaceuticals Ltd.', 'Napa is indicated for fever, common cold and influenza, headache, toothache, earache, bodyache, myalgia, neuralgia, dysmenorrhoea, sprains, colic pain, back pain, post-operative pain, postpartum pain, inflammatory pain and post vaccination pain in children. It is also indicated for rheumatic osteoarthritic pain and stiffness of joints.'),
('Tab. Rupa 10 mg', 'Rupatadine Fumarate', 'Aristopharma Ltd.', 'Rupa is indicated for the symptomatic treatment of Seasonal Perennial Allergic Rhinitis and Urticaria.'),
('Tab. Finix 20 mg', 'Rabeprazole Sodium', 'Opsonin Pharma Ltd.', 'Finix Gastro-resistant tablets are indicated for the treatment of: Active duodenal ulcer, Active benign gastric ulcer, Symptomatic erosive or ulcerative gastro-esophageal reflux disease (GERD), Gastro-esophageal Reflux Disease Long-term Management (GERD Maintenance), Symptomatic treatment of moderate to very severe gastro-esophageal reflux disease (symptomatic GERD), Zollinger-Ellison Syndrome, In combination with appropriate antibacterial therapeutic regimens for the eradication of Helicobacter pylori in patients with peptic ulcer disease.'),
('Aristo Mom', '10 Vitamin & 6 Mineral [Pregnancy and Breast Feedi', 'Aristropharma Ltd.', 'Aristo Mom is indicated for treatment of vitamin & mineral deficiency in pregnant...'),
('Momvit Plus', '10 Vitamin & 6 Mineral [Pregnancy and Breast Feedi', 'Beximco Pharmaceuticals Ltd.', 'Monvit Plus is indicated for treatment of vitamin & mineral deficiency in pregnant...'),
('Vitora Mom', '10 Vitamin & 6 Mineral [Pregnancy and Breast Feedi', 'Novelta Bestway Pharma Ltd.', 'Vitora Mom is indicated for treatment of vitamin & mineral deficiency in pregnant...'),
('MoniMix Plus', '15 vitamins and minerals', 'Social Marketing Company', 'some of the benefits of ...'),
('A-Pak', 'Aceclofenac', 'Benham Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('A-Pak SR', 'Aceclofenac', 'Benham Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('AC PR', 'Aceclofenac', 'Pacific Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('AC PR SR', 'Aceclofenac', 'Pacific Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Acebid', 'Aceclofenac', 'Beacon Pharmaceuticals PLC', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Aceclof', 'Aceclofenac', 'Premier Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Aceclofenac', 'Aceclofenac', 'Pristine Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Acedol', 'Aceclofenac', 'Concord Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Acedol SR', 'Aceclofenac', 'Concord Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Apeclo', 'Aceclofenac', 'Apex Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Apeclo SR', 'Aceclofenac', 'Apex Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Avenac', 'Aceclofenac', 'Radiant Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Claim', 'Aceclofenac', 'Al-Madina Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Claim ER', 'Aceclofenac', 'Al-Madina Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Flexi', 'Aceclofenac', 'Square Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Flexi SR', 'Aceclofenac', 'Square Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Flexivan', 'Aceclofenac', 'NIPRO JMI Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Flexivan ER', 'Aceclofenac', 'NIPRO JMI Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Freemax', 'Aceclofenac', 'Nuvistra Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Labenac', 'Aceclofenac', 'Labaid Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Labenac SR', 'Aceclofenac', 'Labaid Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Mervan', 'Aceclofenac', 'Aristropharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Mervan SR', 'Aceclofenac', 'Aristropharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Movex', 'Aceclofenac', 'Opsonin Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Movex SR', 'Aceclofenac', 'Opsonin Pharma Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Orcenac', 'Aceclofenac', 'Novatek Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Orcenac SR', 'Aceclofenac', 'Novatek Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Ostoflex', 'Aceclofenac', 'Somatec Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Ostoflex SR', 'Aceclofenac', 'Somatec Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Painkil', 'Aceclofenac', 'Veritas Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Painkil SR', 'Aceclofenac', 'Veritas Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Reservix', 'Aceclofenac', 'Incepta Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Reservix SR', 'Aceclofenac', 'Incepta Pharmaceuticals Ltd.', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Syclofen', 'Aceclofenac', 'MST Pharma', 'Aceclofenac is indicated for the relief of pain and inflammation in osteoarthritis...'),
('Xovir 500mg IV Infusion', 'Acyclovir', 'Beacon Pharmaceuticals Ltd.', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Acerux 200', 'Acyclovir', 'Opsonin Pharma Limited', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Acerux 400', 'Acyclovir', 'Opsonin Pharma Limited', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Acerux ', 'Acyclovir', 'Opsonin Pharma Limited', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Acyvir', 'Acyclovir', 'Aristopharma Limited', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Novirax 200', 'Acyclovir', 'Drug International Ltd.', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Novirax 400', 'Acyclovir', 'Drug International Ltd.', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Simplovir', 'Acyclovir', 'Incepta Pharmaceuticals Ltd.', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Simplovir 500 IV', 'Acyclovir', 'Incepta Pharmaceuticals Ltd.', 'Oral Primary herpes simplex infections Adult: 200 mg 5 times daily every 4 hr for 5-10 days; for severely immuno compromised patients and those with impaired absorption: 400 mg 5 times daily for 5 days. Suppression of recurrent herpes simplex Adult: 800 mg daily in 2-4 divided doses. May reduce to 400-600 mg daily if necessary. Reassess the condition every 6-12 mth. For mild or infrequent recurrences: Episodic treatment may be used: 200 mg 5 times daily for 5 days, preferably begun during the prodromal period. Prophylaxis of herpes simplex in immunocompromised patients Adult: 200-400 mg 4 times daily. Varicella zoster 800 mg 5 times/day for 5-7 days. Herpes zoster 800 mg 5 times/day for 7-10 days.'),
('Albendazole', 'Albendazole', 'Albion Laboratories Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Albendazole-DS', 'Albendazole', 'Albion Laboratories Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('AH', 'Albendazole', 'Drug International Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('AH 400', 'Albendazole', 'Drug International Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Alben', 'Albendazole', 'Eskayef Pharmaceuticals Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Alben DS', 'Albendazole', 'Eskayef Pharmaceuticals Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Almex', 'Albendazole', 'Square Pharmaceuticals PLC.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Almex 400', 'Albendazole', 'Square Pharmaceuticals PLC.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Albizol', 'Albendazole', 'Opsonin Pharma Limited', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Aldoben DS', 'Albendazole', 'Benham Pharmaceuticals Ltd.', 'Echinococcosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses. Max: 800 mg/day. ?60 kg: 400 mg bid. Admin dose for three 28-day cycles w/ a 14-day drug-free interval in between each cycle. Neurocysticercosis Adult: <60 kg: 15 mg/kg daily in 2 divided doses (max: 800 mg/day) for 8-30 days. ?60 kg: 400 mg bid for 8-30 days. Ancylostoma, Ascariasis, Hookworm, Trichostrongylus 400 mg PO once'),
('Zolium 0.5', 'Alprazolam', 'Incepta Pharmaceuticals Ltd.', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Zolium 0.25', 'Alprazolam', 'Incepta Pharmaceuticals Ltd.', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Alprax 0.25', 'Alprazolam', 'Opsonin Pharma Limited', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Alprax 0.5', 'Alprazolam', 'Opsonin Pharma Limited', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Alprax XR 1', 'Alprazolam', 'Opsonin Pharma Limited', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Alprax XR 2', 'Alprazolam', 'Opsonin Pharma Limited', 'Oral Short-term management of anxiety Adult: 0.25-0.5 mg tid, increased to 3-4 mg daily if necessary. Elderly: Initially, 0.25 mg bid/tid. Panic attacks Adult Immediate-release 0.5 mg PO q8hr; may increase q3-4Days by ?1 mg/day Average dose: 5-6 mg/day PO May require up to 10 mg/day PO divided q8hr Extended-release 0.5-1 mg PO qDay; may increase q3-4Days by <1 mg/day Average dose: 3-6 mg PO qDay Anxiety Associated With Depression 1-4 mg/day PO divided q8hr Hepatic impairment: Avoid in severe impairment.'),
('Ambroxol', 'Ambroxol', 'Biopharma Ltd.', 'Syrup: Adults -10 ml (2 teaspoonful), 3 times a day. SR Capsule : Adults - 1 capsule, once daily'),
('Mucosol', 'Ambroxol', 'Beximco Pharmaceuticals Ltd.', 'Syrup: Adults -10 ml (2 teaspoonful), 3 times a day. SR Capsule : Adults - 1 capsule, once daily'),
('Brox', 'Ambroxol', 'Navana Pharmaceuticals Ltd.', 'Syrup: Adults -10 ml (2 teaspoonful), 3 times a day. SR Capsule : Adults - 1 capsule, once daily'),
('Recof', 'Ambroxol', 'Renata Limited', 'Syrup: Adults -10 ml (2 teaspoonful), 3 times a day. SR Capsule : Adults - 1 capsule, once daily'),
('Nexol', 'Ambroxol', 'Aristopharma Limited', 'Syrup: Adults -10 ml (2 teaspoonful), 3 times a day. SR Capsule : Adults - 1 capsule, once daily'),
('LM 5', 'S-Amlodipine Besilate (Levamlodipine)', 'The ACME Laboratories Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('L-Amlo 5', 'S-Amlodipine Besilate (Levamlodipine)', 'Navana Pharmaceuticals Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('Amlevo 5', 'S-Amlodipine Besilate (Levamlodipine)', 'Eskayef Pharmaceuticals Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('Esodip 5', 'S-Amlodipine Besilate (Levamlodipine)', 'Renata Limited', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('Lemodip', 'Levamlodipine Maleate', 'Incepta Pharmaceuticals Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('Lamocard', 'Levamlodipine Maleate', 'Drug International Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.'),
('Lamocard-5', 'Levamlodipine Maleate', 'Drug International Ltd.', 'Levamlodipine is calcium channel blocker and may be used alone or in combination with other anthihypertensive agents for the treatment of hypertension,to lower blood pressure.');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_Username` varchar(30) NOT NULL,
  `P_Name` varchar(30) NOT NULL,
  `P_Phone` varchar(30) NOT NULL,
  `P_Gender` varchar(30) NOT NULL,
  `P_DOB` date NOT NULL,
  `P_Email` varchar(50) NOT NULL,
  `P_Address` varchar(50) NOT NULL,
  `P_BloodGroup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_Username`, `P_Name`, `P_Phone`, `P_Gender`, `P_DOB`, `P_Email`, `P_Address`, `P_BloodGroup`) VALUES
('P-100', 'Amina', '01719182220', 'Female', '2000-11-22', 'amina@gmail.com', 'Basundhara R/A, Dhaka', 'O+'),
('P-101', 'Zayd', '01719182220', 'Male', '2000-11-30', 'zayd@gmail.com', 'Kuril, Dhaka', 'A+'),
('P-102', 'Karim', '01711818919', 'Male', '2000-11-22', 'karim@gmail.com', 'Khilkhet, Dhaka', 'O+'),
('P-103', 'Jamal', '01719182220', 'Male', '2000-11-30', 'jamal@gmail.com', 'Kuril, Dhaka', 'A+'),
('P-104', 'Iqbal', '01719182654', 'Male', '2004-11-30', 'iqbal@gmail.com', 'Basundhara R/A, Dhaka', 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `P_Username` varchar(30) NOT NULL,
  `Disease` varchar(50) NOT NULL,
  `Brand_Name` varchar(50) NOT NULL,
  `Dose` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Condition_Dose` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`P_Username`, `Disease`, `Brand_Name`, `Dose`, `Duration`, `Condition_Dose`, `Date`) VALUES
('P-104', 'Fever', 'Tab. Napa 500 mg', '1+1+1', '5 days', 'After Meal', '2024-01-03'),
('P-104', 'Fever', 'Tab. Napa 500 mg', '1+1+1', '5 days', 'After Meal', '2024-01-03'),
('P-101', 'Chronic liver disease', 'Tab. Napa 500 mg', '1+1+1', '7 Days', 'After Meal', '2024-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_Username`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`P_Username`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

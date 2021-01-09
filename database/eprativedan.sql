-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 08:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eprativedan`
--

-- --------------------------------------------------------

--
-- Table structure for table `afmlo`
--

CREATE TABLE `afmlo` (
  `aId` int(11) NOT NULL,
  `noICAppointed` int(11) NOT NULL,
  `nopBkdLDViolation` int(11) NOT NULL,
  `noChecknaka` int(11) NOT NULL,
  `noFIRLodgedLDViolation` int(11) NOT NULL,
  `noArrestLDViolation` int(11) NOT NULL,
  `nopArvdAftrLDDclrn` int(11) NOT NULL,
  `noConDeplMonIQ` int(11) NOT NULL,
  `noFIRlodgedECAct` int(11) NOT NULL,
  `CRinOprn` varchar(1) NOT NULL,
  `noCallRecvdDCR` int(11) NOT NULL,
  `DCRCompln1` varchar(150) NOT NULL,
  `DCRCompln2` varchar(150) NOT NULL,
  `DCRCompln3` varchar(150) NOT NULL,
  `relgsCongrnBanned` varchar(1) NOT NULL,
  `noLDViolnReport` int(11) NOT NULL,
  `noVehicleSeized` int(11) NOT NULL,
  `totlFineCollected` int(11) NOT NULL,
  `noFIRCrimeotLD` int(11) NOT NULL,
  `noForeignNtnArrived` int(11) NOT NULL,
  `wlSD1` varchar(100) NOT NULL,
  `wlSD2` varchar(100) NOT NULL,
  `wlSD3` varchar(100) NOT NULL,
  `wlSD4` varchar(100) NOT NULL,
  `wlSD5` varchar(100) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afmlo`
--

INSERT INTO `afmlo` (`aId`, `noICAppointed`, `nopBkdLDViolation`, `noChecknaka`, `noFIRLodgedLDViolation`, `noArrestLDViolation`, `nopArvdAftrLDDclrn`, `noConDeplMonIQ`, `noFIRlodgedECAct`, `CRinOprn`, `noCallRecvdDCR`, `DCRCompln1`, `DCRCompln2`, `DCRCompln3`, `relgsCongrnBanned`, `noLDViolnReport`, `noVehicleSeized`, `totlFineCollected`, `noFIRCrimeotLD`, `noForeignNtnArrived`, `wlSD1`, `wlSD2`, `wlSD3`, `wlSD4`, `wlSD5`, `dtofRept`) VALUES
(1, 11, 12, 13, 14, 15, 16, 17, 18, 'Y', 19, 'Complaint 11', 'Complaint 21', 'Complaint 31', 'N', 20, 27, 30000, 23, 24, 'Location 11', 'Location 21', 'Location 31', 'Location 41', 'Location 51', '2020-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `blkcrclmaster`
--

CREATE TABLE `blkcrclmaster` (
  `bcId` int(11) NOT NULL,
  `bcName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blockmuncmaster`
--

CREATE TABLE `blockmuncmaster` (
  `blkId` int(11) NOT NULL,
  `blkName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blockmuncmaster`
--

INSERT INTO `blockmuncmaster` (`blkId`, `blkName`) VALUES
(0, 'All'),
(1, 'Baghmara'),
(2, 'Baliapur'),
(3, 'Chirkunda MC'),
(4, 'Dhanbad'),
(5, 'Dhanbad MC'),
(6, 'Egarkund'),
(7, 'Govindpur'),
(8, 'Jharia MC'),
(9, 'Keliasole'),
(10, 'Nirsa'),
(11, 'Purvi Tundi'),
(12, 'Topchanchi'),
(13, 'Tundi');

-- --------------------------------------------------------

--
-- Table structure for table `checklistescontzonw`
--

CREATE TABLE `checklistescontzonw` (
  `chId` int(11) NOT NULL,
  `blkcrclId` int(11) NOT NULL,
  `IncCmndr` varchar(30) NOT NULL,
  `PS` varchar(30) NOT NULL,
  `contZonePlace` varchar(30) NOT NULL,
  `Enforcementdate` date NOT NULL,
  `WithdrawalDate` date NOT NULL,
  `conTraceDone` varchar(1) NOT NULL,
  `nopIdentified` int(11) NOT NULL,
  `splCellforQuarantine` varchar(1) NOT NULL,
  `testSymptoms` varchar(1) NOT NULL,
  `hthSurveynSurvlnc` varchar(1) NOT NULL,
  `clinicMngmnt` varchar(1) NOT NULL,
  `counselling` varchar(1) NOT NULL,
  `regSensitizn` varchar(1) NOT NULL,
  `ddArApResContnmnt` varchar(1) NOT NULL,
  `supplyEsnMedicine` varchar(1) NOT NULL,
  `supplyEsFacility` varchar(1) NOT NULL,
  `barricade` varchar(1) NOT NULL,
  `controlRoom` varchar(1) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklistescontzonw`
--

INSERT INTO `checklistescontzonw` (`chId`, `blkcrclId`, `IncCmndr`, `PS`, `contZonePlace`, `Enforcementdate`, `WithdrawalDate`, `conTraceDone`, `nopIdentified`, `splCellforQuarantine`, `testSymptoms`, `hthSurveynSurvlnc`, `clinicMngmnt`, `counselling`, `regSensitizn`, `ddArApResContnmnt`, `supplyEsnMedicine`, `supplyEsFacility`, `barricade`, `controlRoom`, `dtofRept`) VALUES
(10, 4, '1', '3', '33', '2020-08-04', '2020-08-04', 'Y', 125, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', '2020-08-05'),
(11, 1, '2', '2', '12', '2020-08-04', '2020-08-12', 'Y', 5, 'Y', 'N', 'Y', 'Y', 'Y', 'N', 'N', 'N', 'Y', 'Y', 'Y', '2020-08-05'),
(12, 4, '45', '4', '3', '2020-08-18', '2020-08-18', 'N', 0, 'N', 'N', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', '2020-08-18'),
(13, 1, '25', '2', '2', '2020-08-05', '2020-08-19', 'Y', 0, 'N', 'Y', 'N', 'Y', 'Y', 'N', 'Y', 'Y', 'N', 'Y', 'Y', '2020-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `csqc`
--

CREATE TABLE `csqc` (
  `csqcId` int(11) NOT NULL,
  `csqcName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csqc`
--

INSERT INTO `csqc` (`csqcId`, `csqcName`) VALUES
(1, 'Sadar Hospital'),
(2, 'PMCH'),
(3, 'Railway Hospital'),
(4, 'SSLNT');

-- --------------------------------------------------------

--
-- Table structure for table `cvdcaseinfo`
--

CREATE TABLE `cvdcaseinfo` (
  `cvciId` int(11) NOT NULL,
  `noPosCase` int(11) NOT NULL,
  `activeCase` int(11) NOT NULL,
  `recvrdCase` int(11) NOT NULL,
  `deathCase` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvdcaseinfo`
--

INSERT INTO `cvdcaseinfo` (`cvciId`, `noPosCase`, `activeCase`, `recvrdCase`, `deathCase`, `dtofRept`) VALUES
(2, 25, 22, 12, 9, '2020-07-30'),
(3, 23, 22, 21, 19, '2020-07-29'),
(4, 25, 22, 12, 9, '2020-07-28'),
(7, 25, 26, 25, 26, '2020-07-31'),
(8, 74, 68, 39, 9, '2020-08-18'),
(9, 47, 40, 34, 7, '2020-08-12'),
(10, 70, 32, 42, 2, '2020-08-13'),
(11, 87, 90, 50, 13, '2020-08-14'),
(12, 120, 67, 87, 9, '2020-08-15'),
(13, 154, 57, 189, 14, '2020-08-16'),
(14, 134, 77, 29, 9, '2020-08-17'),
(15, 70, 32, 25, 2, '2020-08-19'),
(16, 309, 445, 23, 2, '2020-08-21'),
(17, 287, 600, 23, 2, '2020-08-22'),
(18, 287, 600, 23, 2, '2020-08-23'),
(19, 600, 287, 24, 40, '2020-08-24'),
(20, 450, 287, 24, 20, '2020-08-25'),
(21, 450, 500, 500, 12, '2020-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `cvdfacility`
--

CREATE TABLE `cvdfacility` (
  `cvfId` int(11) NOT NULL,
  `cvfNameId` int(11) NOT NULL,
  `DCH` varchar(2) NOT NULL,
  `DCHC` varchar(2) NOT NULL,
  `CCC` varchar(2) NOT NULL,
  `noBedInstalled` int(11) NOT NULL,
  `noBedOccupied` int(11) NOT NULL,
  `noBedVacant` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvdfacility`
--

INSERT INTO `cvdfacility` (`cvfId`, `cvfNameId`, `DCH`, `DCHC`, `CCC`, `noBedInstalled`, `noBedOccupied`, `noBedVacant`, `dtofRept`) VALUES
(1, 3, 'N', 'Y', 'NA', 25, 2, 23, '2020-07-30'),
(2, 2, 'N', 'Y', 'Y', 25, 18, 7, '2020-07-30'),
(3, 5, 'N', 'N', 'NA', 50, 5, 45, '2020-07-30'),
(4, 4, 'N', 'N', 'Y', 50, 6, 44, '2020-07-30'),
(5, 3, 'Y', 'Y', 'Y', 23, 23, 0, '2020-07-31'),
(6, 2, 'N', 'Y', 'Y', 50, 18, 32, '2020-07-31'),
(7, 4, 'N', 'Y', 'Y', 23, 2, 21, '2020-07-31'),
(8, 7, 'Y', 'Y', 'Y', 50, 18, 32, '2020-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `cvdfailityname`
--

CREATE TABLE `cvdfailityname` (
  `cvfNameId` int(11) NOT NULL,
  `cvdFacilityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvdfailityname`
--

INSERT INTO `cvdfailityname` (`cvfNameId`, `cvdFacilityName`) VALUES
(2, 'CHC Baghmara'),
(3, 'CHC Baliapur'),
(4, 'CHC Topchanchi'),
(5, 'CHC Nirsa'),
(6, 'CHC Govindpur'),
(7, 'CHC Dhanbad Sadar (PHC Kenduadih)'),
(8, 'CHC Jharia cum Jorapokhar'),
(9, 'CHC Tundi'),
(10, 'Railway Hospital'),
(11, 'BCCL Regional Hospital Jialgora'),
(12, 'BCCL Regional Hospital Katras'),
(13, 'Central Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `cvhealth`
--

CREATE TABLE `cvhealth` (
  `cvhId` int(11) NOT NULL,
  `noRetPvtDocTrained` int(11) NOT NULL,
  `noPvtHospEnlisted` int(11) NOT NULL,
  `nopHQ` int(11) NOT NULL,
  `nopGQ` int(11) NOT NULL,
  `noHCIsolation` int(11) NOT NULL,
  `nopStamped` int(11) NOT NULL,
  `noN95MaskAvlbl` int(11) NOT NULL,
  `noTLMaskAvlbl` int(11) NOT NULL,
  `noPPEKitAvlbl` int(11) NOT NULL,
  `noIsoBedAvlbl` int(11) NOT NULL,
  `noVTMKitAvlbl` int(11) NOT NULL,
  `noVentWithNPAvlbl` int(11) NOT NULL,
  `nopDepForSpplyES` int(11) NOT NULL,
  `noCovidHosp` int(11) NOT NULL,
  `noHotelLodgeAcqIso` int(11) NOT NULL,
  `noProGearDriver` int(11) NOT NULL,
  `elMortAvlbl` int(11) NOT NULL,
  `noICUBed` int(11) NOT NULL,
  `noIsoBed` int(11) NOT NULL,
  `noBedCovidPatient` int(11) NOT NULL,
  `noBedCovidSerPatient` int(11) NOT NULL,
  `noDocTrICU` int(11) NOT NULL,
  `nopTrContTrace` int(11) NOT NULL,
  `cusContaPlanPlace` int(11) NOT NULL,
  `noParamedicTrained` int(11) NOT NULL,
  `noDeathRespProb` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvhealth`
--

INSERT INTO `cvhealth` (`cvhId`, `noRetPvtDocTrained`, `noPvtHospEnlisted`, `nopHQ`, `nopGQ`, `noHCIsolation`, `nopStamped`, `noN95MaskAvlbl`, `noTLMaskAvlbl`, `noPPEKitAvlbl`, `noIsoBedAvlbl`, `noVTMKitAvlbl`, `noVentWithNPAvlbl`, `nopDepForSpplyES`, `noCovidHosp`, `noHotelLodgeAcqIso`, `noProGearDriver`, `elMortAvlbl`, `noICUBed`, `noIsoBed`, `noBedCovidPatient`, `noBedCovidSerPatient`, `noDocTrICU`, `nopTrContTrace`, `cusContaPlanPlace`, `noParamedicTrained`, `noDeathRespProb`, `dtofRept`) VALUES
(4, 11, 12, 13, 14, 15, 16, 17, 18, 19, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, '2020-08-03'),
(5, 11, 12, 13, 14, 15, 16, 17, 18, 19, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 128, '2020-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `cvsari`
--

CREATE TABLE `cvsari` (
  `cvsId` int(11) NOT NULL,
  `dstId` int(11) NOT NULL,
  `idntForty` int(11) NOT NULL,
  `idntSari` int(11) NOT NULL,
  `idntScreen` int(11) NOT NULL,
  `idntImmune` int(11) NOT NULL,
  `nopScreenSari` int(11) NOT NULL,
  `nopSwabCollec` int(11) NOT NULL,
  `nopScreenCamp` int(11) NOT NULL,
  `nocImmune` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvsari`
--

INSERT INTO `cvsari` (`cvsId`, `dstId`, `idntForty`, `idntSari`, `idntScreen`, `idntImmune`, `nopScreenSari`, `nopSwabCollec`, `nopScreenCamp`, `nocImmune`, `dtofRept`) VALUES
(7, 3, 2, 23, 22, 24, 25, 25, 27, 28, '2020-08-02'),
(8, 2, 2, 23, 22, 24, 25, 25, 12, 28, '2020-08-02'),
(9, 4, 8, 9, 9, 67, 6, 6, 7, 7, '2020-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `dctravail`
--

CREATE TABLE `dctravail` (
  `id` int(11) NOT NULL,
  `gvtdoc` int(11) NOT NULL,
  `pvtdoc` int(11) NOT NULL,
  `retdoc` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dctravail`
--

INSERT INTO `dctravail` (`id`, `gvtdoc`, `pvtdoc`, `retdoc`, `dtofRept`) VALUES
(1, 40, 30, 10, '2020-08-04'),
(2, 200, 100, 20, '2020-08-17'),
(3, 100, 60, 40, '2020-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `departmentdetails`
--

CREATE TABLE `departmentdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentdetails`
--

INSERT INTO `departmentdetails` (`id`, `name`) VALUES
(0, 'All'),
(1, 'PMCH'),
(2, 'IDSP'),
(3, 'CS'),
(4, 'ADM Law & Order'),
(5, 'ADM Supply'),
(6, 'SDO'),
(7, 'CO Office'),
(8, 'BDO Office'),
(9, 'Social Security');

-- --------------------------------------------------------

--
-- Table structure for table `essentialserviceqc`
--

CREATE TABLE `essentialserviceqc` (
  `esqcId` int(11) NOT NULL,
  `centId` int(11) NOT NULL,
  `noBed` int(11) NOT NULL,
  `nopIn` int(11) NOT NULL,
  `nopCompleted` int(11) NOT NULL,
  `DwFacility` varchar(1) NOT NULL,
  `elecFacility` varchar(1) NOT NULL,
  `toiletFacility` varchar(1) NOT NULL,
  `foodFacility` varchar(1) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `essentialserviceqc`
--

INSERT INTO `essentialserviceqc` (`esqcId`, `centId`, `noBed`, `nopIn`, `nopCompleted`, `DwFacility`, `elecFacility`, `toiletFacility`, `foodFacility`, `dtofRept`) VALUES
(1, 2, 100, 24, 12, 'Y', 'Y', 'Y', 'Y', '2020-08-01'),
(2, 3, 100, 28, 21, 'Y', 'Y', 'Y', 'Y', '2020-08-01'),
(3, 4, 100, 23, 28, 'N', 'N', 'N', 'N', '2020-08-01'),
(4, 3, 100, 27, 21, 'Y', 'Y', 'N', 'Y', '2020-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `icmrportalupdation`
--

CREATE TABLE `icmrportalupdation` (
  `ipuId` int(11) NOT NULL,
  `noPosEntrytobeDone` int(11) NOT NULL,
  `noEntryDoneTillYestrday` int(11) NOT NULL,
  `noEntryAddToday` int(11) NOT NULL,
  `totalPending` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icmrportalupdation`
--

INSERT INTO `icmrportalupdation` (`ipuId`, `noPosEntrytobeDone`, `noEntryDoneTillYestrday`, `noEntryAddToday`, `totalPending`, `dtofRept`) VALUES
(1, 90, 20, 13, 12, '2020-07-30'),
(2, 103, 12, 31, 21, '2020-07-30'),
(3, 80, 12, 31, 12, '2020-07-30'),
(4, 25, 65, 65, 5, '2020-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inId` int(11) NOT NULL,
  `thermalScanner` int(11) NOT NULL,
  `gloves` int(11) NOT NULL,
  `sanitizer500ml` int(11) NOT NULL,
  `sanitizer600ml` int(11) NOT NULL,
  `sanitizer5L` int(11) NOT NULL,
  `sanitizer15L` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inId`, `thermalScanner`, `gloves`, `sanitizer500ml`, `sanitizer600ml`, `sanitizer5L`, `sanitizer15L`, `dtofRept`) VALUES
(2, 11, 13, 15, 17, 19, 21, '2020-08-01'),
(3, 100, 250, 120, 130, 110, 100, '2020-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `isolationcentre`
--

CREATE TABLE `isolationcentre` (
  `isoId` int(11) NOT NULL,
  `isoCentreName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isolationcentre`
--

INSERT INTO `isolationcentre` (`isoId`, `isoCentreName`) VALUES
(1, 'PMCH'),
(2, 'BCCL'),
(3, 'Railway');

-- --------------------------------------------------------

--
-- Table structure for table `isolationfacilities`
--

CREATE TABLE `isolationfacilities` (
  `ifId` int(11) NOT NULL,
  `isoId` int(11) NOT NULL,
  `noBed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isolationfacilities`
--

INSERT INTO `isolationfacilities` (`ifId`, `isoId`, `noBed`) VALUES
(1, 1, 100),
(3, 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `department` int(11) NOT NULL,
  `blkId` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`id`, `userid`, `name`, `mobile`, `department`, `blkId`, `designation`, `pwd`, `role`) VALUES
(1, 'admin', 'Abhishek Kumar', '7209565717', 0, 0, 'Network Engineer', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Super Admin'),
(2, 'pmchdeo', 'Ramesh Kumar', '8961549047', 1, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(3, 'idspdeo', 'Suresh Kumar', '8789484602', 2, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(4, 'csdeo', 'Mahesh Kumar', '9478485969', 3, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(5, 'admdeo', 'Kamlesh Kumar', '7654565757', 4, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(6, 'admsdeo', 'Vimlesh Kumar', '8978675656', 5, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(7, 'sdodeo', 'Mithlesh Kumar', '9878675656', 6, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(8, 'codhanbaddeo', 'Mukesh Kumar', '7488968596', 7, 4, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(10, 'cobaghmaradeo', 'Sukesh Kumar', '7485968596', 7, 1, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(11, 'bdobaghmaradeo', 'Samresh Kumar', '7474859685', 8, 1, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(12, 'bdodhanbaddeo', 'Ganesh Kumar', '7496321425', 8, 4, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator'),
(13, 'sscdeo', 'Dinesh Kumar', '9685748596', 9, 0, 'Computer Operator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Data Entry Operator');

-- --------------------------------------------------------

--
-- Table structure for table `quarantinestatusblockwise`
--

CREATE TABLE `quarantinestatusblockwise` (
  `qsbId` int(11) NOT NULL,
  `blkId` int(11) NOT NULL,
  `nopHomeQuarantine` int(11) NOT NULL,
  `nopGovtQuarantine` int(11) NOT NULL,
  `nopCompleteQrtn` int(11) NOT NULL,
  `nopFromOtherCity` int(11) NOT NULL,
  `nopStamped` int(11) NOT NULL,
  `noBedInstalled` int(11) NOT NULL,
  `noOperationalQuarantineCentre` int(11) NOT NULL,
  `noBedsOperationalQuarantine` int(11) NOT NULL,
  `dwFacilityAvlbl` varchar(1) NOT NULL,
  `electricityFacilityAvlbl` varchar(1) NOT NULL,
  `fodFacilityAvlbl` varchar(1) NOT NULL,
  `toiletFacilityAvlbl` varchar(1) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarantinestatusblockwise`
--

INSERT INTO `quarantinestatusblockwise` (`qsbId`, `blkId`, `nopHomeQuarantine`, `nopGovtQuarantine`, `nopCompleteQrtn`, `nopFromOtherCity`, `nopStamped`, `noBedInstalled`, `noOperationalQuarantineCentre`, `noBedsOperationalQuarantine`, `dwFacilityAvlbl`, `electricityFacilityAvlbl`, `fodFacilityAvlbl`, `toiletFacilityAvlbl`, `dtofRept`) VALUES
(1, 1, 8, 9, 9, 9, 9, 9, 9, 9, 'N', 'Y', 'Y', 'N', '2020-08-05'),
(2, 4, 5, 6, 11, 7, 8, 9, 1, 2, 'N', 'N', 'N', 'N', '2020-08-05'),
(3, 1, 120, 25, 200, 12, 15, 15, 20, 10, 'Y', 'Y', 'Y', 'Y', '2020-08-18'),
(4, 4, 1, 2, 3, 4, 5, 6, 7, 8, 'Y', 'Y', 'Y', 'Y', '2020-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `rtndistribution`
--

CREATE TABLE `rtndistribution` (
  `id` int(11) NOT NULL,
  `target` double NOT NULL,
  `distributed` double NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rtndistribution`
--

INSERT INTO `rtndistribution` (`id`, `target`, `distributed`, `dtofRept`) VALUES
(1, 26.2, 24.2, '0000-00-00'),
(2, 80, 28.7, '2020-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `rtpcrtestreport`
--

CREATE TABLE `rtpcrtestreport` (
  `rtpcrTId` int(11) NOT NULL,
  `tdstId` int(11) NOT NULL,
  `opBalPendingSample` int(11) NOT NULL,
  `sampleRecvdToday` int(11) NOT NULL,
  `positiveReport` int(11) NOT NULL,
  `negativeReport` int(11) NOT NULL,
  `repeatSamplePositive` int(11) NOT NULL,
  `sampleRejected` int(11) NOT NULL,
  `sampleTested` int(11) NOT NULL,
  `clBalSamples` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rtpcrtestreport`
--

INSERT INTO `rtpcrtestreport` (`rtpcrTId`, `tdstId`, `opBalPendingSample`, `sampleRecvdToday`, `positiveReport`, `negativeReport`, `repeatSamplePositive`, `sampleRejected`, `sampleTested`, `clBalSamples`, `dtofRept`) VALUES
(1, 3, 921, 375, 3, 595, 8, 1, 607, 689, '2020-07-28'),
(2, 1, 392, 388, 0, 153, 0, 0, 153, 627, '2020-07-28'),
(3, 2, 53, 0, 0, 0, 0, 0, 0, 53, '2020-07-28'),
(4, 4, 186, 84, 0, 0, 0, 0, 0, 270, '2020-07-28'),
(5, 5, 864, 0, 0, 30, 0, 0, 30, 834, '2020-07-28'),
(6, 6, 51, 857, 0, 0, 0, 0, 0, 908, '2020-07-28'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, '2020-07-28'),
(8, 8, 0, 505, 0, 0, 0, 0, 0, 505, '2020-07-28'),
(9, 9, 258, 250, 0, 0, 0, 0, 0, 508, '2020-07-28'),
(10, 3, 202, 17, 17, 18, 19, 14, 68, 151, '2020-07-30'),
(11, 2, 0, 30, 0, 25, 0, 0, 25, 5, '2020-07-30'),
(12, 2, 202, 5, 6, 69, 9, 9, 93, 114, '2020-07-31'),
(13, 1, 26, 66, 6, 66, 6, 8, 86, 6, '2020-07-31'),
(14, 3, 45, 5, 25, 2, 5, 2, 34, 16, '2020-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `scl_sec`
--

CREATE TABLE `scl_sec` (
  `sscId` int(11) NOT NULL,
  `nopSSPension` int(11) NOT NULL,
  `month` varchar(30) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scl_sec`
--

INSERT INTO `scl_sec` (`sscId`, `nopSSPension`, `month`, `dtofRept`) VALUES
(9, 5, '2020-08', '2020-08-05'),
(10, 5, '2020-08-01', '2020-08-06'),
(11, 230, '2020-08-18', '2020-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `sdo`
--

CREATE TABLE `sdo` (
  `sId` int(11) NOT NULL,
  `piGroceryShop` int(11) NOT NULL,
  `piFruitVegVendor` int(11) NOT NULL,
  `piMedia` int(11) NOT NULL,
  `piMedicalShop` int(11) NOT NULL,
  `piWStockist` int(11) NOT NULL,
  `piPrintMedia` int(11) NOT NULL,
  `piTranspGoods` int(11) NOT NULL,
  `piFPS` int(11) NOT NULL,
  `piMilkShop` int(11) NOT NULL,
  `piShopONE` int(11) NOT NULL,
  `piEssentialServices` int(11) NOT NULL,
  `noMonOfficial` int(11) NOT NULL,
  `ndiFlour` int(11) NOT NULL,
  `ndiPulse` int(11) NOT NULL,
  `ndiSalt` int(11) NOT NULL,
  `ndiSugar` int(11) NOT NULL,
  `ndiEdOil` int(11) NOT NULL,
  `noPersonIpHomeDelivery` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdo`
--

INSERT INTO `sdo` (`sId`, `piGroceryShop`, `piFruitVegVendor`, `piMedia`, `piMedicalShop`, `piWStockist`, `piPrintMedia`, `piTranspGoods`, `piFPS`, `piMilkShop`, `piShopONE`, `piEssentialServices`, `noMonOfficial`, `ndiFlour`, `ndiPulse`, `ndiSalt`, `ndiSugar`, `ndiEdOil`, `noPersonIpHomeDelivery`, `dtofRept`) VALUES
(1, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, '2020-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `sId` int(11) NOT NULL,
  `prcntPdsFGPrevMonth` double NOT NULL,
  `prcntPdsAnbFGPrevTwoMonth` double NOT NULL,
  `prcntPdsFGCurMonth` double NOT NULL,
  `nohDistrPdsFGPrevMonthNFSA` int(11) NOT NULL,
  `nohDistrPdsFGCurMonthNFSA` int(11) NOT NULL,
  `nopBenANBRicePrevTwoMonth` int(11) NOT NULL,
  `nohDistFGPrevTwoMonthANB` int(11) NOT NULL,
  `nohDistFG10KGLastMonth` int(11) NOT NULL,
  `nopGvnBenefitStateContFund` int(11) NOT NULL,
  `noDalBhatCentreOprnl` int(11) NOT NULL,
  `nopAteAboveP10PrevDay` int(11) NOT NULL,
  `noCKOprtdByNGO` int(11) NOT NULL,
  `nopAteAbvPt12PrevDay` int(11) NOT NULL,
  `noMigLabour` int(11) NOT NULL,
  `noMigLabourFed` int(11) NOT NULL,
  `noPktDryRationDst` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`sId`, `prcntPdsFGPrevMonth`, `prcntPdsAnbFGPrevTwoMonth`, `prcntPdsFGCurMonth`, `nohDistrPdsFGPrevMonthNFSA`, `nohDistrPdsFGCurMonthNFSA`, `nopBenANBRicePrevTwoMonth`, `nohDistFGPrevTwoMonthANB`, `nohDistFG10KGLastMonth`, `nopGvnBenefitStateContFund`, `noDalBhatCentreOprnl`, `nopAteAboveP10PrevDay`, `noCKOprtdByNGO`, `nopAteAbvPt12PrevDay`, `noMigLabour`, `noMigLabourFed`, `noPktDryRationDst`, `dtofRept`) VALUES
(2, 68.8, 77.5, 64.8, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, '2020-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `testdist`
--

CREATE TABLE `testdist` (
  `dstId` int(11) NOT NULL,
  `dstName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testdist`
--

INSERT INTO `testdist` (`dstId`, `dstName`) VALUES
(1, 'Bokaro'),
(2, 'Deoghar'),
(3, 'Dhanbad'),
(4, 'Dumka'),
(5, 'Giridih'),
(6, 'Godda'),
(7, 'Jamtara'),
(8, 'Pakur'),
(9, 'Sahebganj');

-- --------------------------------------------------------

--
-- Table structure for table `truenattestlab`
--

CREATE TABLE `truenattestlab` (
  `ttlId` int(11) NOT NULL,
  `ttlName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truenattestlab`
--

INSERT INTO `truenattestlab` (`ttlId`, `ttlName`) VALUES
(1, 'Sadar'),
(2, 'PMCH'),
(3, 'Pathkind');

-- --------------------------------------------------------

--
-- Table structure for table `trueneattest`
--

CREATE TABLE `trueneattest` (
  `ttestId` int(11) NOT NULL,
  `ttlId` int(11) NOT NULL,
  `samplesCollectedTillDate` int(11) NOT NULL,
  `testConductedTillDate` int(11) NOT NULL,
  `entriesDonePortal` int(11) NOT NULL,
  `posCaseIdentifyTillDate` int(11) NOT NULL,
  `samplesCollectedToday` int(11) NOT NULL,
  `testConductedToday` int(11) NOT NULL,
  `posIdentifiedToday` int(11) NOT NULL,
  `dtofRept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trueneattest`
--

INSERT INTO `trueneattest` (`ttestId`, `ttlId`, `samplesCollectedTillDate`, `testConductedTillDate`, `entriesDonePortal`, `posCaseIdentifyTillDate`, `samplesCollectedToday`, `testConductedToday`, `posIdentifiedToday`, `dtofRept`) VALUES
(4, 1, 26, 32, 34, 46, 23, 32, 32, '2020-07-27'),
(5, 2, 33, 45, 29, 46, 20, 32, 21, '2020-07-27'),
(6, 2, 20, 34, 33, 39, 12, 31, 45, '2020-07-28'),
(7, 1, 56, 32, 34, 33, 23, 31, 32, '2020-07-28'),
(8, 3, 33, 45, 33, 22, 25, 2, 3, '2020-07-28'),
(9, 2, 25, 4, 12, 10, 11, 13, 16, '2020-07-30'),
(10, 2, 25, 2, 2, 3, 3, 14, 6, '2020-07-30'),
(11, 1, 25, 2, 58, 5, 5, 6, 25, '2020-07-31'),
(12, 2, 26, 2, 3, 3, 3, 25, 7, '2020-07-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afmlo`
--
ALTER TABLE `afmlo`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `blkcrclmaster`
--
ALTER TABLE `blkcrclmaster`
  ADD PRIMARY KEY (`bcId`);

--
-- Indexes for table `blockmuncmaster`
--
ALTER TABLE `blockmuncmaster`
  ADD PRIMARY KEY (`blkId`);

--
-- Indexes for table `checklistescontzonw`
--
ALTER TABLE `checklistescontzonw`
  ADD PRIMARY KEY (`chId`);

--
-- Indexes for table `csqc`
--
ALTER TABLE `csqc`
  ADD PRIMARY KEY (`csqcId`);

--
-- Indexes for table `cvdcaseinfo`
--
ALTER TABLE `cvdcaseinfo`
  ADD PRIMARY KEY (`cvciId`);

--
-- Indexes for table `cvdfacility`
--
ALTER TABLE `cvdfacility`
  ADD PRIMARY KEY (`cvfId`),
  ADD KEY `cvfNameId` (`cvfNameId`);

--
-- Indexes for table `cvdfailityname`
--
ALTER TABLE `cvdfailityname`
  ADD PRIMARY KEY (`cvfNameId`);

--
-- Indexes for table `cvhealth`
--
ALTER TABLE `cvhealth`
  ADD PRIMARY KEY (`cvhId`);

--
-- Indexes for table `cvsari`
--
ALTER TABLE `cvsari`
  ADD PRIMARY KEY (`cvsId`);

--
-- Indexes for table `dctravail`
--
ALTER TABLE `dctravail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmentdetails`
--
ALTER TABLE `departmentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `essentialserviceqc`
--
ALTER TABLE `essentialserviceqc`
  ADD PRIMARY KEY (`esqcId`),
  ADD KEY `centId` (`centId`);

--
-- Indexes for table `icmrportalupdation`
--
ALTER TABLE `icmrportalupdation`
  ADD PRIMARY KEY (`ipuId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inId`);

--
-- Indexes for table `isolationcentre`
--
ALTER TABLE `isolationcentre`
  ADD PRIMARY KEY (`isoId`);

--
-- Indexes for table `isolationfacilities`
--
ALTER TABLE `isolationfacilities`
  ADD PRIMARY KEY (`ifId`),
  ADD UNIQUE KEY `isoId_2` (`isoId`),
  ADD KEY `isoId` (`isoId`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `quarantinestatusblockwise`
--
ALTER TABLE `quarantinestatusblockwise`
  ADD PRIMARY KEY (`qsbId`),
  ADD KEY `blkId` (`blkId`);

--
-- Indexes for table `rtndistribution`
--
ALTER TABLE `rtndistribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtpcrtestreport`
--
ALTER TABLE `rtpcrtestreport`
  ADD PRIMARY KEY (`rtpcrTId`),
  ADD KEY `tdstId` (`tdstId`);

--
-- Indexes for table `scl_sec`
--
ALTER TABLE `scl_sec`
  ADD PRIMARY KEY (`sscId`);

--
-- Indexes for table `sdo`
--
ALTER TABLE `sdo`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `testdist`
--
ALTER TABLE `testdist`
  ADD PRIMARY KEY (`dstId`);

--
-- Indexes for table `truenattestlab`
--
ALTER TABLE `truenattestlab`
  ADD PRIMARY KEY (`ttlId`);

--
-- Indexes for table `trueneattest`
--
ALTER TABLE `trueneattest`
  ADD PRIMARY KEY (`ttestId`),
  ADD KEY `ttlId` (`ttlId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afmlo`
--
ALTER TABLE `afmlo`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blkcrclmaster`
--
ALTER TABLE `blkcrclmaster`
  MODIFY `bcId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blockmuncmaster`
--
ALTER TABLE `blockmuncmaster`
  MODIFY `blkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checklistescontzonw`
--
ALTER TABLE `checklistescontzonw`
  MODIFY `chId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `csqc`
--
ALTER TABLE `csqc`
  MODIFY `csqcId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cvdcaseinfo`
--
ALTER TABLE `cvdcaseinfo`
  MODIFY `cvciId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cvdfacility`
--
ALTER TABLE `cvdfacility`
  MODIFY `cvfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cvdfailityname`
--
ALTER TABLE `cvdfailityname`
  MODIFY `cvfNameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cvhealth`
--
ALTER TABLE `cvhealth`
  MODIFY `cvhId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cvsari`
--
ALTER TABLE `cvsari`
  MODIFY `cvsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dctravail`
--
ALTER TABLE `dctravail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departmentdetails`
--
ALTER TABLE `departmentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `essentialserviceqc`
--
ALTER TABLE `essentialserviceqc`
  MODIFY `esqcId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `icmrportalupdation`
--
ALTER TABLE `icmrportalupdation`
  MODIFY `ipuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `isolationcentre`
--
ALTER TABLE `isolationcentre`
  MODIFY `isoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `isolationfacilities`
--
ALTER TABLE `isolationfacilities`
  MODIFY `ifId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quarantinestatusblockwise`
--
ALTER TABLE `quarantinestatusblockwise`
  MODIFY `qsbId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rtndistribution`
--
ALTER TABLE `rtndistribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rtpcrtestreport`
--
ALTER TABLE `rtpcrtestreport`
  MODIFY `rtpcrTId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `scl_sec`
--
ALTER TABLE `scl_sec`
  MODIFY `sscId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sdo`
--
ALTER TABLE `sdo`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testdist`
--
ALTER TABLE `testdist`
  MODIFY `dstId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `truenattestlab`
--
ALTER TABLE `truenattestlab`
  MODIFY `ttlId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trueneattest`
--
ALTER TABLE `trueneattest`
  MODIFY `ttestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvdfacility`
--
ALTER TABLE `cvdfacility`
  ADD CONSTRAINT `cvdfacility_ibfk_1` FOREIGN KEY (`cvfNameId`) REFERENCES `cvdfailityname` (`cvfNameId`);

--
-- Constraints for table `essentialserviceqc`
--
ALTER TABLE `essentialserviceqc`
  ADD CONSTRAINT `essentialserviceqc_ibfk_1` FOREIGN KEY (`centId`) REFERENCES `csqc` (`csqcId`);

--
-- Constraints for table `isolationfacilities`
--
ALTER TABLE `isolationfacilities`
  ADD CONSTRAINT `isolationfacilities_ibfk_1` FOREIGN KEY (`isoId`) REFERENCES `isolationcentre` (`isoId`);

--
-- Constraints for table `quarantinestatusblockwise`
--
ALTER TABLE `quarantinestatusblockwise`
  ADD CONSTRAINT `quarantinestatusblockwise_ibfk_1` FOREIGN KEY (`blkId`) REFERENCES `blockmuncmaster` (`blkId`);

--
-- Constraints for table `rtpcrtestreport`
--
ALTER TABLE `rtpcrtestreport`
  ADD CONSTRAINT `rtpcrtestreport_ibfk_1` FOREIGN KEY (`tdstId`) REFERENCES `testdist` (`dstId`);

--
-- Constraints for table `trueneattest`
--
ALTER TABLE `trueneattest`
  ADD CONSTRAINT `trueneattest_ibfk_1` FOREIGN KEY (`ttlId`) REFERENCES `truenattestlab` (`ttlId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `training_sessions offered at Skin School`
--

DROP TABLE IF EXISTS `training_sessions`;
CREATE TABLE `training_sessions` (
  -- Unique ID for each training session 
  `trainingID` MEDIUMINT(8) PRIMARY KEY AUTO_INCREMENT, 
  -- Title of training sessions 
  `title` VARCHAR(255) NOT NULL,
  -- Description of the session
  `description` TEXT NOT NULL,
  -- Date and time of the session 
  `session_date` DATETIME NOT NULL,
  -- Cost per person for the session 
  `price_per_person` DECIMAL(7,2) NOT NULL,
  -- Image associated with the session 
  `session_imagepath` VARCHAR(255),
  -- Alt message with the image 
  'image_description' VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking` for training sessions 
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  -- Unqiue ID for each booking 
  `bookingID` mediumint(8) PRIMARY KEY AUTO_INCREMENT,
  -- Foreign key training ID 
  `trainingID` mediumint(8) NOT NULL,
  -- Foreign key customer ID 
  `customerID` mediumint(8) NOT NULL,
  -- Number of people included in the booking 
  `number_people` mediumint(2) NOT NULL,
  -- Total cost of the booking 
  `total_booking_cost` DECIMAL(7,2) NOT NULL,
  -- Additional booking notes 
  `booking_notes` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers` for Skin School
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  -- Unique ID for customer 
  `customerID` mediumint(8) PRIMARY KEY AUTO_INCREMENT,
  -- Hashed password for security 
  `password_hash` char(255) NOT NULL,
  -- First name of customer 
  `customer_forename` varchar(255) NOT NULL,
  -- Last name of customer 
  `customer_surname` varchar(255) NOT NULL,
  -- Customer email address 
  `customer_email` varchar(64) UNIQUE NOT NULL,
  -- Date of birth of customer 
  `date_of_birth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

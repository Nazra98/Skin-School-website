--
-- Dumping data for table `customers`
-- The password is `Fredtest`
--

INSERT INTO `customers` (`customerID`, `password_hash`, `customer_forename`, `customer_surname`,`customer_email`, `date_of_birth`) VALUES
(1,'$2y$10$qOrhpkdI0Mib.Hizs7.6A.hApiW2HfJIH/iut2Q87m/NbSJRcdbx6', 'Fred', 'Brown', 'fred@test.com', '1985-11-13 00:00:00')

--
-- Dumping data for table `training_sessions`
--
INSERT INTO `training_sessions` (`trainingID`, `title`, `description`, `session_date`, `price_per_person`, `session_imagepath`, `image_description`) VALUES
(1, 'K-Beauty Trends', 'Discover the latest korean beauty trends and techniques that are transforming skincare...','2025-01-20 19:00',40, 'kbeautytrend2.jpeg','Korean woman in a picture'),
(2, 'Aging Skin', 'Combat the visible signs of ageing with expert skincare advice and guidance by experts in the industry...','2025-01-21 14:00',80,'maturewomen.jpeg','Picture of a mature woman, pulling her cheek'),
(3, 'Skincare Products', 'Confused about which skincare products are right for you? We will help support you...','2025-01-22 16:00',20, 'skincareproducts.jpeg','skincare products aligned in a picture'),
(4, 'Skin Type', 'Identify your skin type and learn how to care for it with a tailored skincare routine...','2025-01-23 16:00',40,'skin_type.jpeg','4 women with different skin types'),
(5, 'Organic Skincare','Embrace a sustainable skincare routine that is good for your skin by using homemade products...','2025-01-24 19:00',40, 'ORGANIC_SKINCARE.jpeg','varierty of different items, salt, coffee beans'),
(6, 'Begineer Skincare','New to skincare? Get started with our beginners guide to essential skincare tips and tricks...', '2025-01-25 18:00',40,'skincare_b.jpeg','woman with cream on her cheeks'),
(7, 'Glow from Within', 'Dive into how diet impacts skin health and how to combine skincare with proper...','2025-02-01 14:00',30, 'fruit.jpeg', 'citrus fruit picture'),
(8, 'Stress-Free Skin', 'Address how stress impacts the skin and what techniques to use to tackle stress...', '2025-02-02 18:00',20,'stressed.jpeg','woman stressed in picture'),
(9, 'Skincare on a Budget', 'Effective skincare with affordable products and DIY products at home...','2025-02-05 16:00',20,'budget_skincare.jpeg','woman with a facemask in the picture' ),
(10, 'Skincare Travel Guide', 'Skincare tips for travelling, and the best travel sized products to use...','2025-02-06 19:00',30,'travelskincare.jpeg','woman on a airplane with skincare'),
(11, 'Skincare for Seasonal Change', 'Adjusting your skincare routine for different seasons with the...','2025-02-07 15:00',30, 'seasonalskincare.jpeg','Different seasonal leaves with skincare cream in the middle'),
(12, 'Art of Double Cleansing', 'Benefits and techniques of double cleansing for removing,makeup and...', '2025-02-09 18:00',20,'doublecleansing.jpeg', 'woman with cleansing foam on her face');

--
-- Dumping data for table `booking`
--
INSERT INTO `booking` (`trainingID`, `customerID`, `number_people`,`total_booking_cost`, `booking_notes`) VALUES
(1, 01, 2, 80.00, 'Wheelchair access needed'),
(2, 03, 1, 80.00, 'Seating near the front requested'),
(3, 04, 3, 60.00, 'Bringing children; requires assistance'),
(4, 06, 4, 160.00, 'Group discount applied'),
(5, 08, 1, 30.00, 'None'),
(6, 09, 2, 40.00, 'Needs accessible parking'),
(7, 10, 1, 20.00, 'None'),
(8, 02, 3, 60.00, 'Seating near the instructor'),
(9, 08, 2, 80.00, 'Wheelchair access and additional assistance needed'),
(10, 10, 2, 80.00, 'Bringing a toddler; requires flexible seating');

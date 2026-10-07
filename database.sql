-- CareStride (theCareStride.com) Database Dump
-- Created for XAMPP / Live Server MySQL Database Setup

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `doctors`;
DROP TABLE IF EXISTS `appointments`;
DROP TABLE IF EXISTS `inquiries`;
DROP TABLE IF EXISTS `admins`;
SET FOREIGN_KEY_CHECKS=1;

-- Table structure for `doctors`
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `title` VARCHAR(255) NOT NULL,
  `degrees` VARCHAR(255) NOT NULL,
  `experience` VARCHAR(100) DEFAULT '3 Years Experience',
  `gender` VARCHAR(50) DEFAULT 'Male',
  `areas` TEXT,
  `rating` VARCHAR(50) DEFAULT '4.9 / 5.0',
  `reviews_count` INT DEFAULT 100,
  `fee` VARCHAR(100) DEFAULT 'PKR 3,500',
  `bio` TEXT,
  `image` VARCHAR(255) DEFAULT NULL,
  `specialties` TEXT,
  `availability` VARCHAR(255) DEFAULT 'Mon - Sat (9:00 AM - 7:00 PM)',
  `registration` VARCHAR(255) DEFAULT 'PNC / PMDC Verified DPT Doctor',
  `meta_title` VARCHAR(255) DEFAULT '',
  `meta_desc` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `doctors`
INSERT INTO `doctors` (`name`, `slug`, `title`, `degrees`, `experience`, `gender`, `areas`, `rating`, `reviews_count`, `fee`, `bio`, `image`, `specialties`, `availability`, `registration`, `meta_title`, `meta_desc`) VALUES
('Dr. Aamir', 'dr-aamir', 'Pediatric Rehabilitation Specialist', 'DPT (Sargodha Medical College)', '3 Years Experience', 'Male', 'DHA, Johar Town, Gulberg, Model Town', '4.9 / 5.0', 112, 'PKR 3,500', 'Dr. Aamir is a dedicated Pediatric Rehabilitation Specialist graduated from Sargodha Medical College (DPT). He specializes in child disability care, Cerebral Palsy (CP) management, motor delay therapy, and pediatric alignment.', 'dr-aamir.jpg', 'CP Child Rehabilitation, Pediatric Physical Therapy, Delayed Walking, Spasticity Reduction', 'Mon - Sat (9:00 AM - 7:00 PM)', 'PNC / PMDC Verified DPT Doctor', 'Dr. Aamir - Pediatric Rehabilitation Specialist | Home Physio Lahore', 'Book home pediatric physical therapy with Dr. Aamir, DPT (Sargodha Medical College). Specialist in cerebral palsy, pediatric rehab & motor delay care in Lahore.'),
('Dr. Muhammad Mudasir', 'dr-muhammad-mudasir', 'Sports Physiotherapist Specialist', 'DPT (Sargodha Medical College)', '3 Years Experience', 'Male', 'DHA, Johar Town, Gulberg, Garden Town', '4.9 / 5.0', 128, 'PKR 4,000', 'Dr. Muhammad Mudasir completed his DPT at Sargodha Medical College and has 3 years of clinical expertise in athletic sports injury recovery, knee ligament sprains, muscle tear care, and kinesio taping.', 'dr-muhammad-mudasir.jpg', 'Sports Injury Rehab, Ligament Sprains, Hamstring Strains, Kinesio Taping, Runner Knee', 'Mon - Sat (9:00 AM - 7:00 PM)', 'PNC / PMDC Verified DPT Doctor', 'Dr. Muhammad Mudasir - Sports Physiotherapist | CareStride Lahore', 'Book sports injury rehabilitation with Dr. Muhammad Mudasir, DPT (Sargodha Medical College). 3 years experience in sports taping, ligament recovery & muscle strain care.'),
('Dr. Muhammad Mubashir', 'dr-muhammad-mubashir', 'Post-Operative & Surgical Rehabilitation Specialist', 'DPT (Sargodha Medical College)', '5 Years Experience', 'Male', 'DHA Phase 1-9, Johar Town, Gulberg, Model Town, Cantt', '5.0 / 5.0', 185, 'PKR 4,000', 'Dr. Muhammad Mubashir brings 5 years of specialized post-operative clinical rehabilitation experience. Graduated DPT from Sargodha Medical College, he leads home protocols for Total Knee Replacement (TKR), Total Hip Replacement (THR), and complex fracture recovery.', 'dr-muhammad-mubashir.jpg', 'Total Knee Replacement (TKR), Total Hip Replacement (THR), Fracture Care, Post-Surgical Rehab', 'Mon - Sat (8:00 AM - 8:00 PM)', 'PNC / PMDC Verified DPT Doctor', 'Dr. Muhammad Mubashir (5 Yrs Exp) - Post-Surgery Rehab Specialist | CareStride', 'Book post-operative home rehabilitation with Dr. Muhammad Mubashir (5 years experience). Specialist in Total Knee Replacement (TKR), Hip Replacement & fracture care.'),
('Dr. Muhammad Irfan', 'dr-muhammad-irfan', 'Stroke, Frozen Shoulder & Muscle Pain Specialist', 'DPT (Sargodha Medical College)', '4 Years Experience', 'Male', 'DHA, Johar Town, Gulberg, Askari', '4.9 / 5.0', 140, 'PKR 4,000', 'Dr. Muhammad Irfan earned his DPT from Sargodha Medical College and has extensive clinical mastery in stroke recovery, frozen shoulder joint mobilization, sciatica nerve release, and chronic muscle pain management.', 'dr-muhammad-irfan.jpg', 'Stroke Recovery, Frozen Shoulder Mobilization, Sciatica Relief, Muscle Pain Management', 'Mon - Sat (9:00 AM - 7:00 PM)', 'PNC / PMDC Verified DPT Doctor', 'Dr. Muhammad Irfan - Stroke & Frozen Shoulder Specialist | CareStride', 'Book home stroke recovery & frozen shoulder physical therapy with Dr. Muhammad Irfan, DPT (Sargodha Medical College). Specialized in muscle pain and nerve release.'),
('Dr. Rashid', 'dr-rashid', 'Senior Neuro Rehabilitation Specialist', 'DPT (Sargodha Medical College), MS (Riphah International University)', '6 Years Experience', 'Male', 'DHA, Johar Town, Gulberg, Model Town, Bahria Town', '5.0 / 5.0', 210, 'PKR 4,500', 'Dr. Rashid holds a Doctor of Physical Therapy (DPT) from Sargodha Medical College and an MS in Neurological Rehabilitation from Riphah International University. He provides advanced Bobath and PNF neuro care for stroke paralysis, spinal cord injury, and complex movement disorders.', 'dr-rashid.jpg', 'Neuro Rehabilitation, MS Riphah University, Stroke Paralysis, Bobath Technique, Nerve Palsy', 'Mon - Sat (8:00 AM - 8:00 PM)', 'PNC / PMDC Verified DPT Doctor', 'Dr. Rashid (MS Riphah University) - Senior Neuro Rehab Specialist | CareStride', 'Book advanced neurological rehabilitation with Dr. Rashid, MS from Riphah University & DPT Sargodha Medical College. Expert in stroke paralysis & neuro recovery.');

-- Table structure for `appointments`
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `patient_name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `service_slug` VARCHAR(255) DEFAULT '',
  `therapist_slug` VARCHAR(255) DEFAULT '',
  `location_slug` VARCHAR(255) DEFAULT '',
  `address` TEXT NOT NULL,
  `preferred_date` DATE NOT NULL,
  `preferred_time` VARCHAR(100) NOT NULL,
  `symptoms_notes` TEXT,
  `status` VARCHAR(50) DEFAULT 'Pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for `inquiries`
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for `admins`
CREATE TABLE IF NOT EXISTS `admins` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default Admin Credentials (admin / admin123)
INSERT INTO `admins` (`username`, `password`) VALUES
('admin', '$2y$10$w8.m0vL.cW.E5rP3LwzH6uH8p9zK1O2I3U4Y5Z6X7W8V9U0T1S2R3');

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 05:08 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_graduate`
--

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(1) NOT NULL,
  `degree_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degree_name`) VALUES
(1, 'دبلومة'),
(3, 'دكتوراه'),
(2, 'ماجستير');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(5) NOT NULL,
  `dep_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`) VALUES
(8, 'جيولوجيا'),
(3, 'حيوان'),
(7, 'رصد بيئى'),
(5, 'رياضيات وعلوم الحاسب'),
(6, 'علوم بحار'),
(2, 'فيزياء'),
(1, 'كمياء'),
(4, 'نبات');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`fac_id`, `fac_name`) VALUES
(2, 'كلية تربية'),
(3, 'كلية حاسبات و معلومات'),
(4, 'كلية صيدلة'),
(1, 'كلية علوم');

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `gov_id` int(2) NOT NULL,
  `gov_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`gov_id`, `gov_name`) VALUES
(1, 'بورسعيد'),
(2, 'الإسماعيلية'),
(3, 'الإسكندرية'),
(4, 'دمياط'),
(5, 'الشرقية');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(1) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`) VALUES
(1, ''),
(2, 'A'),
(3, 'B'),
(4, 'C'),
(5, 'D'),
(6, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `nat_id` int(11) NOT NULL,
  `nationality` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`nat_id`, `nationality`) VALUES
(1, 'مصر'),
(2, 'سوريا');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `spec_id` int(5) NOT NULL,
  `spec_name` varchar(200) NOT NULL,
  `dep_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`spec_id`, `spec_name`, `dep_name`) VALUES
(1, 'كشف المعادن', 'جيولوجيا'),
(2, 'كمياء حيوية', 'كمياء'),
(3, 'فيزياء الكم', 'فيزياء'),
(4, 'كمياء نووية', 'كمياء'),
(5, 'شبكات الحاسب', 'رياضيات وعلوم الحاسب'),
(6, 'الذكاء الاصطناعى', 'رياضيات وعلوم الحاسب');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_name` varchar(500) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `governorat` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` char(16) NOT NULL,
  `work_place` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_name`, `national_id`, `birth_date`, `birth_place`, `nationality`, `governorat`, `address`, `phone`, `work_place`) VALUES
('محمود على احمد ابراهيم', '03131219980352672', '1990-10-30', 'بورسعيد', 'مصر', 'بورسعيد', 'بورفؤاد-شارع الشعراوى', '0128777777', 'لا يوجد'),
('محمد على على على ', '111111111111', '1989-12-22', 'بورسعيد', 'مصر', 'الإسكندرية', 'الاسكندرية - المعمورة', '01236363363', 'منجم السكرى'),
('محمد عمر اسماعيل احمد', '123456789963258', '1995-07-10', 'دمياط', 'مصر', 'الإسماعيلية', 'الاسماعيلية-شارع الشعراوى', '01287542832', 'هيئة قناة السويس'),
('اية محمد على السيد', '777888999444555', '1996-04-07', 'بورسعيد', 'مصر', 'الإسكندرية', 'بورفؤاد-شارع الشعراوى', '012589665544', 'هيئة قناة السويس');

-- --------------------------------------------------------

--
-- Table structure for table `student_degrees`
--

CREATE TABLE `student_degrees` (
  `std_id` varchar(20) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `specialize` varchar(200) NOT NULL,
  `study_year` char(4) NOT NULL,
  `grade` char(1) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_degrees`
--

INSERT INTO `student_degrees` (`std_id`, `degree`, `specialize`, `study_year`, `grade`, `faculty`, `university`) VALUES
('03131219980352672', 'بكالوريوس', 'الكمياء حيوية', '2016', 'A', 'كلية علوم', 'جامعة بورسعيد'),
('111111111111', 'بكالوريوس', 'جيولوجيا', '2016', 'B', 'كلية علوم', 'جامعة الإسماعيلية'),
('111111111111', 'دبلومة', 'جيولوجيا المعادن', '2016', 'A', 'كلية علوم', 'جامعة بورسعيد'),
('111111111111', 'ماجستير', 'طرق استخراج المعادن', '2017', 'A', 'كلية علوم', 'جامعة بورسعيد'),
('123456789963258', 'بكالوريوس', 'علوم حاسب', '2016', 'B', 'كلية حاسبات و معلومات', 'جامعة الإسماعيلية'),
('123456789963258', 'دبلومة', 'شبكات الحاسب', '2018', 'A', 'كلية علوم', 'جامعة بورسعيد'),
('777888999444555', 'بكالوريوس', 'فيزياء', '2016', 'B', 'كلية علوم', 'جامعة الإسكندرية'),
('777888999444555', 'دبلومة', 'الفيزياء الديناميكية', '2017', 'A', 'كلية علوم', 'جامعة بورسعيد');

-- --------------------------------------------------------

--
-- Table structure for table `student_degree_study`
--

CREATE TABLE `student_degree_study` (
  `std_id` varchar(20) NOT NULL,
  `degree_study` varchar(10) NOT NULL,
  `specialize` varchar(200) NOT NULL,
  `study_year` char(4) NOT NULL,
  `grade` char(1) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `title_ar` varchar(200) NOT NULL,
  `title_en` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_degree_study`
--

INSERT INTO `student_degree_study` (`std_id`, `degree_study`, `specialize`, `study_year`, `grade`, `faculty`, `university`, `title_ar`, `title_en`) VALUES
('03131219980352672', 'دبلومة', 'كيمياء حيوية', '2016', '', '', '', 'تطبيقات الكمياء الحيوية', 'biochemistry applications'),
('111111111111', 'دكتوراه', 'كشف المعادن', '2018', '', '', '', 'الكشف عن المعادن بالتكنولوجيا الحديثة', 'Metal detection with modern technology'),
('123456789963258', 'ماجستير', 'شبكات الحاسب', '2018', '', '', '', 'تطبيقات شبكات الحاسب', 'computer network applications'),
('777888999444555', 'ماجستير', 'فيزياء الكم', '2018', '', '', '', 'التاثيرات الديناميكية فى فيزياء الكم', 'dynamic effects in quantum physics');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `std_id` varchar(20) NOT NULL,
  `sub_id` char(6) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`std_id`, `sub_id`, `grade`) VALUES
('123456789963258', 'f333', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_supervisor`
--

CREATE TABLE `student_supervisor` (
  `std_id` varchar(20) NOT NULL,
  `supervisor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_supervisor`
--

INSERT INTO `student_supervisor` (`std_id`, `supervisor`) VALUES
('03131219980352672', 1),
('03131219980352672', 2),
('03131219980352672', 3),
('03131219980352672', 4);

-- --------------------------------------------------------

--
-- Table structure for table `study_year`
--

CREATE TABLE `study_year` (
  `year_id` int(5) NOT NULL,
  `study_year` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `study_year`
--

INSERT INTO `study_year` (`year_id`, `study_year`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` char(6) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `hours` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`, `hours`) VALUES
('f333', 'خوارزميات', 3),
('m204', 'كمياء تحليلة', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_specialize`
--

CREATE TABLE `subjects_specialize` (
  `sub_id` char(6) NOT NULL,
  `spec_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects_specialize`
--

INSERT INTO `subjects_specialize` (`sub_id`, `spec_name`) VALUES
('f333', 'الذكاء الاصطناعى'),
('f333', 'شبكات الحاسب'),
('m204', 'كمياء حيوية'),
('m204', 'كمياء نووية');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `super_id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rank` varchar(10) NOT NULL,
  `specialize` varchar(200) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `university` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`super_id`, `name`, `rank`, `specialize`, `faculty`, `university`) VALUES
(1, 'اسامة محمد اسماعيل حسن', 'Dr', 'كمياء حيوية', 'كلية علوم', 'جامعة بورسعيد'),
(2, 'حسنين محمد احمد ابراهيم', 'prof', 'علوم وشبكات الحاسب', 'كلية حاسبات و معلومات', 'جامعة الإسماعيلية'),
(3, 'فاطمة محمد السيد حسن', 'Dr', 'فيزياء الكم', 'كلية علوم', 'جامعة الزقازيق'),
(4, 'على محمد على خليل', 'prof', 'كمياء حيوية', 'كلية صيدلة', 'جامعة المنصورة');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors_rank`
--

CREATE TABLE `supervisors_rank` (
  `rank_id` int(2) NOT NULL,
  `rank` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisors_rank`
--

INSERT INTO `supervisors_rank` (`rank_id`, `rank`) VALUES
(1, 'Dr'),
(2, 'prof');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `univ_id` int(11) NOT NULL,
  `univ_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`univ_id`, `univ_name`) VALUES
(5, 'جامعة الإسكندرية'),
(2, 'جامعة الإسماعيلية'),
(4, 'جامعة الزقازيق'),
(6, 'جامعة القاهرة'),
(3, 'جامعة المنصورة'),
(1, 'جامعة بورسعيد');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'boss', '666666'),
(2, 'admin', '123456'),
(3, 'doctor', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `user_id` int(5) NOT NULL,
  `isadmin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`user_id`, `isadmin`) VALUES
(2, 't'),
(1, 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`),
  ADD UNIQUE KEY `degree_name` (`degree_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `dep_name` (`dep_name`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`fac_id`),
  ADD UNIQUE KEY `fac_name` (`fac_name`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`gov_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`nat_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`spec_id`),
  ADD UNIQUE KEY `spec_name` (`spec_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`national_id`),
  ADD UNIQUE KEY `national_id` (`national_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `student_degrees`
--
ALTER TABLE `student_degrees`
  ADD PRIMARY KEY (`std_id`,`degree`) USING BTREE;

--
-- Indexes for table `student_degree_study`
--
ALTER TABLE `student_degree_study`
  ADD PRIMARY KEY (`std_id`,`degree_study`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`std_id`,`sub_id`),
  ADD KEY `std_subject_choose` (`sub_id`);

--
-- Indexes for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  ADD PRIMARY KEY (`std_id`,`supervisor`),
  ADD KEY `supervisor` (`supervisor`);

--
-- Indexes for table `study_year`
--
ALTER TABLE `study_year`
  ADD PRIMARY KEY (`year_id`),
  ADD UNIQUE KEY `study_year` (`study_year`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sub_name` (`sub_name`);

--
-- Indexes for table `subjects_specialize`
--
ALTER TABLE `subjects_specialize`
  ADD PRIMARY KEY (`sub_id`,`spec_name`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`super_id`);

--
-- Indexes for table `supervisors_rank`
--
ALTER TABLE `supervisors_rank`
  ADD PRIMARY KEY (`rank_id`),
  ADD UNIQUE KEY `rank` (`rank`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`univ_id`),
  ADD UNIQUE KEY `univ_name` (`univ_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD KEY `admin_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `nat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_year`
--
ALTER TABLE `study_year`
  MODIFY `year_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `univ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_degrees`
--
ALTER TABLE `student_degrees`
  ADD CONSTRAINT `student_degrees_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_degree_study`
--
ALTER TABLE `student_degree_study`
  ADD CONSTRAINT `student_degree_study_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `std_subject_choose` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subjects_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  ADD CONSTRAINT `student_supervisor_ibfk_3` FOREIGN KEY (`std_id`) REFERENCES `students` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_supervisor_ibfk_4` FOREIGN KEY (`supervisor`) REFERENCES `supervisors` (`super_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects_specialize`
--
ALTER TABLE `subjects_specialize`
  ADD CONSTRAINT `subjects_specialize_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `admin_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

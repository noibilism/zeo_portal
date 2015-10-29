-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 09, 2015 at 03:05 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zeo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
`id` int(11) NOT NULL,
  `uri` varchar(225) DEFAULT NULL,
  `address` text,
  `city_id` int(11) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `lg_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `lgas_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes_subjects`
--

CREATE TABLE `classes_subjects` (
`id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `country_code` varchar(225) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `reg_start` timestamp NULL DEFAULT NULL,
  `reg_close` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_enrolments`
--

CREATE TABLE `exam_enrolments` (
`id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `desc` text,
  `amount` float DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
`id` int(11) NOT NULL,
  `module` varchar(225) DEFAULT NULL,
  `deleted` smallint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `deleted` smallint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted`, `created`, `updated`) VALUES
(1, 'Admin', 0, '2015-10-07 11:44:52', NULL),
(2, 'School', 0, '2015-10-07 11:44:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_resources`
--

CREATE TABLE `roles_resources` (
`id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `deleted` smallint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
`id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_no` varchar(45) DEFAULT NULL,
  `portal_reg_no` varchar(45) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `y_o_e` timestamp NULL DEFAULT NULL,
  `school_type_id` int(11) DEFAULT NULL,
  `history` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `user_id`, `reg_no`, `portal_reg_no`, `address_id`, `email`, `y_o_e`, `school_type_id`, `history`, `created`, `updated`, `deleted`) VALUES
(5, 'Adedokun International Schools', 11, '2323232BB', '33193765', NULL, 'info@adedokun.com', NULL, 1, NULL, '2015-10-08 19:05:40', '2015-10-08 19:59:14', 0),
(6, 'Niyi International School', 12, '12348900', '53587265', NULL, 'niyi@yahoo.com', NULL, 2, NULL, '2015-10-08 20:08:40', '2015-10-08 20:08:40', 0),
(7, 'Dennis International Schools', 13, '09828282', '62617885', NULL, 'info@dennis.com', NULL, 1, NULL, '2015-10-09 12:43:27', '2015-10-09 12:43:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_payments`
--

CREATE TABLE `school_payments` (
`id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `teller` varchar(225) DEFAULT NULL,
  `date_paid` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `ref_no` varchar(225) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_properties`
--

CREATE TABLE `school_properties` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `classrooms` varchar(225) DEFAULT NULL,
  `toilets` varchar(225) DEFAULT NULL,
  `labs` varchar(225) DEFAULT NULL,
  `seats` varchar(225) DEFAULT NULL,
  `computers` varchar(225) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `recognition_status` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `ownership_status` varchar(45) DEFAULT NULL,
  `shifts` varchar(45) DEFAULT NULL,
  `shared` int(1) DEFAULT '0',
  `school_category` varchar(45) DEFAULT NULL,
  `school_association` text,
  `s_d_p` int(1) DEFAULT '0',
  `s_b_m_c` int(1) DEFAULT NULL,
  `p_t_a` int(1) DEFAULT NULL,
  `inspection_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_staffs`
--

CREATE TABLE `school_staffs` (
`id` int(11) NOT NULL,
  `uri` varchar(225) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `type` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_types`
--

CREATE TABLE `school_types` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_types`
--

INSERT INTO `school_types` (`id`, `name`, `created`, `updated`, `deleted`) VALUES
(1, 'Private - Nursery/Primary School', '2015-10-08 16:18:45', NULL, 0),
(2, 'Public Nursery/Primary School', '2015-10-08 16:18:45', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `current_session` int(1) DEFAULT '0',
  `enrolment_start` timestamp NULL DEFAULT NULL,
  `enrolment_stop` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created`, `updated`, `current_session`, `enrolment_start`, `enrolment_stop`) VALUES
(1, '2015/2016', '2015-10-09 14:30:32', '2015-10-09 14:43:52', 1, '2015-07-15 10:23:00', '2015-12-26 16:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_qualifications`
--

CREATE TABLE `staff_qualifications` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) DEFAULT NULL,
  `qualification` varchar(225) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `discipline` varchar(225) DEFAULT NULL,
  `year_acquired` year(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `std_enrolments`
--

CREATE TABLE `std_enrolments` (
`id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `day_boarding` int(1) DEFAULT '0',
  `sex` int(1) DEFAULT '0',
  `d_o_b` timestamp NULL DEFAULT NULL,
  `birth_certificate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted` smallint(1) DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `deleted`, `created`, `updated`, `last_login`) VALUES
(1, 'admin', 'e0ecaaf4aec98738cee57df483d56676c4cba35d', 'admin@home.com', 1, 0, '2015-10-05 17:55:14', '2015-10-07 18:14:45', NULL),
(2, 'school', '8a12380a3dd45230a5a06c73406a2125391fc394', 'school@home.com', 2, 1, '2015-10-05 17:55:14', '2015-10-07 18:18:39', NULL),
(3, 'tolu_skuchy', '5e18a89a59b9282ea9d7be555ff35f3c048c95c4', 'tolu@yahoo.com', 1, 0, '2015-10-07 14:49:44', '2015-10-07 14:49:44', NULL),
(4, 'muiz_skuchy', 'fd1617fe62a487d83330912ca3dff1e10b5c111a', 'muiz@gmail.com', 2, 0, '2015-10-07 14:51:11', '2015-10-07 14:51:11', NULL),
(5, 'abdullah', 'e0ecaaf4aec98738cee57df483d56676c4cba35d', 'abdullah@yahoo.com', 1, 0, '2015-10-07 17:40:10', '2015-10-07 17:40:10', NULL),
(6, 'fortune', '5e18a89a59b9282ea9d7be555ff35f3c048c95c4', 'fortune@yahoo.com', 1, 0, '2015-10-07 17:41:17', '2015-10-07 17:41:17', NULL),
(11, '33193765', '47171ea538e7e8478a1eaf0695e74c648828a44e', 'info@adedokun.com', 2, 0, '2015-10-08 19:05:40', '2015-10-08 19:05:40', NULL),
(12, '53587265', '09c140f38de5621ff98211090af8fbef956d6752', 'niyi@yahoo.com', 2, 0, '2015-10-08 20:08:40', '2015-10-08 20:08:40', NULL),
(13, '62617885', '3a305218365b234852cab840f9f5775e9c000c6b', 'info@dennis.com', 2, 0, '2015-10-09 12:43:27', '2015-10-09 12:43:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
`id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `lga_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_country_id_idx` (`country_id`), ADD KEY `fk_state_id_idx` (`state_id`), ADD KEY `fk_lga_id_idx` (`lg_id`), ADD KEY `fk_cities_id_idx` (`city_id`), ADD KEY `fk_ward_id_idx` (`ward_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_lgas_id_idx` (`lgas_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_subjects`
--
ALTER TABLE `classes_subjects`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_clss_id_idx` (`class_id`), ADD KEY `fk_sbj_id_idx` (`subject_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sess_id_idx` (`session_id`), ADD KEY `fk_added_byy_id_idx` (`added_by`), ADD KEY `fk_updated_byy_id_idx` (`updated_by`);

--
-- Indexes for table `exam_enrolments`
--
ALTER TABLE `exam_enrolments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ses_id_idx` (`session_id`), ADD KEY `fk_stdss_id_idx` (`student_id`), ADD KEY `fk_clsss_id_idx` (`class_id`), ADD KEY `fk_schls_id_idx` (`school_id`), ADD KEY `fk_added_id_idx` (`added_by`), ADD KEY `fk_updated_id_idx` (`updated_by`), ADD KEY `fk_examm_id_idx` (`exam_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_states_id_idx` (`state_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`module`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`name`);

--
-- Indexes for table `roles_resources`
--
ALTER TABLE `roles_resources`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_roles_id_idx` (`role_id`), ADD KEY `fk_resource_id_idx` (`resource_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_users_id_idx` (`user_id`), ADD KEY `fk_adresses_id_idx` (`address_id`), ADD KEY `fk_school_types_id_idx` (`school_type_id`);

--
-- Indexes for table `school_payments`
--
ALTER TABLE `school_payments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ssch_id_idx` (`school_id`), ADD KEY `fk_addded_id_idx` (`added_by`), ADD KEY `fk_upddated_id_idx` (`updated_by`), ADD KEY `fk_fee_id_idx` (`fee_id`);

--
-- Indexes for table `school_properties`
--
ALTER TABLE `school_properties`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sclss_id_idx` (`school_id`);

--
-- Indexes for table `school_staffs`
--
ALTER TABLE `school_staffs`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`school_id`);

--
-- Indexes for table `school_types`
--
ALTER TABLE `school_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_qualifications`
--
ALTER TABLE `staff_qualifications`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_staffs_id_idx` (`staff_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_countries_id_idx` (`country_id`);

--
-- Indexes for table `std_enrolments`
--
ALTER TABLE `std_enrolments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ses_id_idx` (`session_id`), ADD KEY `fk_stdss_id_idx` (`student_id`), ADD KEY `fk_clsss_id_idx` (`class_id`), ADD KEY `fk_schls_id_idx` (`school_id`), ADD KEY `fk_added_id_idx` (`added_by`), ADD KEY `fk_updated_id_idx` (`updated_by`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cls_id_idx` (`class_id`), ADD KEY `fk_schls_id_idx` (`school_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`), ADD KEY `fk_role_id_idx` (`role_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cities_id_idx` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes_subjects`
--
ALTER TABLE `classes_subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_enrolments`
--
ALTER TABLE `exam_enrolments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles_resources`
--
ALTER TABLE `roles_resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `school_payments`
--
ALTER TABLE `school_payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_properties`
--
ALTER TABLE `school_properties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_staffs`
--
ALTER TABLE `school_staffs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_types`
--
ALTER TABLE `school_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff_qualifications`
--
ALTER TABLE `staff_qualifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `std_enrolments`
--
ALTER TABLE `std_enrolments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
ADD CONSTRAINT `fk_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_country_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_lga_id` FOREIGN KEY (`lg_id`) REFERENCES `lgas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_state_id` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ward_id` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `fk_lgas_id` FOREIGN KEY (`lgas_id`) REFERENCES `lgas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classes_subjects`
--
ALTER TABLE `classes_subjects`
ADD CONSTRAINT `fk_clss_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sbj_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
ADD CONSTRAINT `fk_added_byy_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sess_id` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_updated_byy_id` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam_enrolments`
--
ALTER TABLE `exam_enrolments`
ADD CONSTRAINT `fk_addeds_id0` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clsss_id0` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_examm_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_schls_id0` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ses_id0` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_stdss_id0` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_updateds_id0` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
ADD CONSTRAINT `fk_states_id` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roles_resources`
--
ALTER TABLE `roles_resources`
ADD CONSTRAINT `fk_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_roles_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
ADD CONSTRAINT `fk_adresses_id` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_school_types_id` FOREIGN KEY (`school_type_id`) REFERENCES `school_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_payments`
--
ALTER TABLE `school_payments`
ADD CONSTRAINT `fk_addded_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_fee_id` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ssch_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_upddated_id` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_properties`
--
ALTER TABLE `school_properties`
ADD CONSTRAINT `fk_sclss_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_staffs`
--
ALTER TABLE `school_staffs`
ADD CONSTRAINT `fk_schl_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff_qualifications`
--
ALTER TABLE `staff_qualifications`
ADD CONSTRAINT `fk_staffs_id` FOREIGN KEY (`staff_id`) REFERENCES `school_staffs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `fk_countries_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `std_enrolments`
--
ALTER TABLE `std_enrolments`
ADD CONSTRAINT `fk_addedsssss_id` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_clssss_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_schlsssss_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sesssss_id` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_stdsss_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_updatedssss_id` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
ADD CONSTRAINT `fk_cls_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_schls_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
ADD CONSTRAINT `fk_cities_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

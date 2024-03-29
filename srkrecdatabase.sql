-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 07:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srkrec`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `dept` char(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `description`, `url`, `attachment`, `website`, `dept`, `timestamp`) VALUES
(1, 'Seminar: Next Generation Tools for Innovation', '2018-04-25', '2018-04-25', 'A Seminar on Next Generation Tools for Innovation Organized at SRKR Engineerring college on 25th April,2018 by Sri.Pravin Rajpal.', 'event_detail.php?id=1', NULL, NULL, 'CL', '2018-05-13 06:03:24'),
(2, 'Supernova 2K18', '2018-01-05', '2018-01-06', 'Supernova 2K18, National Level Technical Fest organized successfully by Dept. of Civl Engineering. College director S.V.Rangaraju Principal G.Pardhasaradhi Varma and others presided the function.', 'event_detail.php?id=2', NULL, 'https://www.srkrsupernova.com', 'CV', '2018-05-13 06:57:15'),
(3, 'Trance 2K18 ', '2018-01-04', '2018-01-05', 'Trance 2K18, National Level Tech Fest of ECE Department conducted on 4th & 5th January 2018. College director S.V.Rangaraju principal G.Pardhasaradhi Varma and others presided over the function.', 'events_detail.php?id=3', NULL, NULL, 'EC', '2018-05-13 07:03:59'),
(4, 'TechFleet 2K18', '2018-02-20', '2018-02-21', 'A national level conference on Current Trends of Information Technology has been conducted in connection with TechFleet 2k18, the TechFest of IT department', 'event_detail.php?id=4', NULL, NULL, 'IT', '2018-05-13 09:40:13'),
(5, 'SPURTHI 2K18', '2018-02-01', '2018-02-02', 'Spurthi18 is a 4 day national level technical symposium being organised by SRKR-CSE.', 'event_detail.php?id=5', NULL, NULL, 'CS', '2018-05-13 09:42:54'),
(6, 'SANKALP 2K17', '2017-12-28', '2017-12-29', 'SANKALP 2K17 is a National Level Techno Cultural Fest from the Department of EEE , Organised by Association of Electrical Engineers of SRKR Engineering college ,Bhimavaram ', 'event_detail.php?id=6', NULL, NULL, 'ME', '2018-05-13 09:48:00'),
(7, 'Summer Internship @ Tech Centre', '2018-05-04', '2018-05-15', 'Project Oriented Summer Internship from 4th May 2018 on Android, Python, PHP and Java+ORACLE conducted by Technology Centre.', 'event_details.php?id=7', NULL, NULL, 'TC', '2018-05-20 15:30:41'),
(8, '1/4 B.Tech 2nd Sem Final Exams', '2018-05-21', '2018-05-30', 'B.Tech 1st Year 2nd Semester End Exams (for JNTUK Autonomous) scheduled from 21st May 2018.', 'event_details.php?id=8', NULL, NULL, 'CL', '2018-05-20 16:45:09'),
(9, 'First Year Class Work', '2018-07-03', '2018-07-03', 'Inaugural session and First Year Class Work of batch 2018-2022 is scheduled from 3rd July 2018.', 'event_details.php?id=9', NULL, NULL, 'CL', '2018-05-20 16:45:09'),
(10, '2/4, 3/4 & 4/4 Class Work', '2018-06-11', '2018-06-11', 'The classwork for 4/4, 3/4 and 2/4 commence from 11-06-2018 for the academic year2018-2019.', 'event_details.php?id=10', NULL, NULL, 'CL', '2018-05-20 16:45:09'),
(11, 'AICTE-ECI-ISTE CHHATRA VISHWAKARMA AWARDS 2018', '2018-11-19', '2018-11-19', 'All India Council for Technical Education (AICTE), Ministry of Human Resource Development, Govt. of India, Engineering Council of India (ECI), and the Indian Society for Technical Education (ISTE), are jointly holding a competition AICTE-ECI-ISTE Chhatra Vishwakarma Awards-2018 for the students of AICTE approved Degree & Diploma level Technical institutions.\r\n\r\nSRKR Engineering College is hosting AICTE-ECI-ISTE CHHATRA VISHWAKARMA AWARDS 2018 for Andhra Pradesh & Telangana Region on 19th Nov,2018.', 'event_details.php?id=11', NULL, NULL, 'CL', '2018-11-13 09:07:24'),
(12, 'Spardha2k18', '2018-12-14', '2018-11-15', 'Spardha 2K18 A cross departmental Hackathon is conducted at SRKR Engineering College on 14th & 15th December,2018.Students can develop their Idea within 24hrs. Registration and Idea submission is 5th December. For More Details Contact Tech Centre.', 'event_details.php?id=12', NULL, 'http://www.srkrcampus.net/spardha2k18 ', '', '2018-11-29 04:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `description` text,
  `website` varchar(255) DEFAULT NULL,
  `dept` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `start`, `attachment`, `description`, `website`, `dept`, `timestamp`) VALUES
(14, '2018-01-05', NULL, 'Water Resources hydrology wing Chief Engineer Ratna Kumar,SRKR Engineering College principal G Parthasaradhi Varma and others releasing a souvenir at the national symposium in Bhimavaram. ', NULL, 'WC', '2018-05-13 06:45:23'),
(1, '2018-05-08', '', '   Board of Studies meeting is conducted at SRKR Engineering College on 8th May.', NULL, 'CL', '2018-05-13 06:12:13'),
(2, '2018-05-06', NULL, '  A student of SRKR Engineering College from first year Civil department  experimented on ZERO Shadow day.He started\nconducting experiment from 11:30 A.M and proved his exellence.', NULL, '', '2018-05-13 06:26:38'),
(3, '2018-05-03', NULL, ' SRKR Engineering College and USA''s Purdue University signed a research MoU.The Principal G.Paradhasaradhi Varma said that the Mous have been signed as a part of a collabration for Engineering education,and that SRKR was one of the 13 Engineering colleges that signed an MoU. ', NULL, '', '2018-05-13 06:45:24'),
(16, '2018-01-04', NULL, 'Hindustan Aeronautics Limited Chief manager Dunna Srinivas Rao addressing the inaugural meeting of the national student symposium at SRKR Engineering College in Bhimavaram.', NULL, 'CV', '2018-05-13 06:49:38'),
(17, '2018-01-03', NULL, 'SRKR college director S.V.Rangaraju Principal G.Pardhasaradhi Varma and others releasing the national student Supernova2K18 symposium poster in Bhimavram.', NULL, 'CV', '2018-05-13 06:53:30'),
(18, '2018-01-02', NULL, 'SRKR College director S.V.Rangaraju principal G.Pardhasaradhi Varma and others releasing the national student Trance2K18 symposium poster in Bhimavaram.', NULL, 'EC', '2018-05-13 07:01:18'),
(4, '2018-04-22', NULL, ' Research and Development Dean of SRKR Engineering College,P.A.Ramkrishnam Raju asked people not to use plastic that adversely affect the environment.He pointed out that plastic could be a potent Harmone disruptor. ', NULL, '', '2018-05-13 07:05:12'),
(5, '2018-04-23', NULL, '   Earth day was celebrated in SRKR Engineering College on 23rd April,2018 with combined association of Institute of Engineers(IEE)Ap State Centre and IEE of Bhimavaram local centre.', NULL, '', '2018-05-13 07:11:34'),
(19, '2017-12-28', NULL, 'A.P.E.P.D.C.L.S.E.E.Satyanarayana Reddy has been felicitated in SRKR Engineering College Bhimavaram.', NULL, 'CL', '2018-05-13 07:12:48'),
(20, '2017-12-24', NULL, ' Students of 1988-92 batch of S.R.K.R. Engineering College, Bhimavaram, in\r\nWest Godavari district, gathered on the college campus and recalled their\r\nstudent life in the class rooms on completion of 25 years. They met their\r\nteachers and visited the labs and class rooms.', NULL, 'CL', '2018-05-13 07:15:06'),
(21, '2018-02-23', NULL, 'An Engineering final year student of SRKR Engineering college, Bhimavaram won gold medal in the NCC parade and cultural activities and best all round performance conducted on Republic Day parade at NewDelhi.', NULL, 'SP', '2018-05-13 07:18:08'),
(22, '2017-12-20', NULL, 'SRKR Engineering college Mechanical Engineering final year student Md Lutfaan Sadiq will be part of the Andhra University Team in Archery competitions to be held in Bhubaneswar on Dec 26 , according to the physical director of the college P Satyanarayana Raju.', NULL, 'ME', '2018-05-13 07:22:47'),
(6, '2018-04-03', NULL, ' SRKR Engineering College,Bhimavaram has secured 85th rank in national level awarded by National Institutional Ranking Frame Work(NIRF)of Union Human Resources Ministry. \r\n    \r\n    The college stood in first place in the rankings both in both Andhra pradesh and Telangana.On the occasion the college management has conducted success meet in the college.', NULL, '', '2018-05-13 07:24:32'),
(7, '2018-04-02', NULL, '  Reputed software Company TATA Consultancy Services(TCS)has selected the ''solar-powered''wheel chair controlled by voice commands for differently abled person''s project as the best project of the year 2016-2017.This project was signed by SRKR Engineering College of Bimavaram by Mechanical Engineering Students. ', NULL, '', '2018-05-13 07:30:58'),
(23, '2017-12-15', NULL, 'SRKR faculty launched the book on Environment.Many prominent people participated in the workshop of developing the aqua culture using Satellite technology. ', NULL, 'CL', '2018-05-13 09:10:28'),
(8, '2018-03-31', NULL, '   The Students of Electric and Electtronic Engineering(EEE)at SRKR Engineering College in Bhimavaram were selected to University of Applied Sciences,Upper Astria School of Engineering to complete their Engineering studies', NULL, '', '2018-05-13 09:12:31'),
(24, '2017-12-14', NULL, 'In the inter Hockey competitions held by Andhra University , the students of SRKR stood at Third place.\r\n170 Girl students of SRKR are selected for pragati National Scholarship.', NULL, 'SP', '2018-05-13 09:16:22'),
(9, '2018-03-19', NULL, '  Ugadhi Celebrations were held at SRKR Engineering College,Bhimavaram.The college students light the lamp at Ugadhi Lakshmi and performed poojaa.\r\n    \r\n    on the occasion,Panchanga Sravanam was conducted by Kameswara Sarma', NULL, '', '2018-05-13 09:17:09'),
(10, '2018-03-14', NULL, ' Dr.Gollapalli.Nageswara Rao,Vice Chancellor,Andhra University has called upon the Engineering students to be part in the reconstruction of the country', NULL, 'CL', '2018-05-13 09:21:57'),
(25, '2018-01-06', NULL, 'On occasion of Supernova 2K18 Mr.Rajeswar Reddy attended as a chief guest. He addresses the students to have a knowledge on modern construction techniques.', NULL, 'CV', '2018-05-13 09:25:37'),
(11, '2018-03-11', NULL, '  Four students of SRKR Engineering College,Bhimavaram have been selected for the Innovation Fellow Programme offered by the Standard University in USA', NULL, 'TC', '2018-05-13 09:27:09'),
(27, '2018-01-06', NULL, 'SRKR college director S.V.Rangaraju Principal G.Pardhasaradhi Varma CSE HoD Dr.Padma Raju and others releasing the national student Spurthi 2K18 symposium poster in Bhimavram.', NULL, 'CS', '2018-05-13 09:28:28'),
(12, '2018-03-20', NULL, '  EPAM,a Bengaluru based systems developing company director(Head Talent Acquisition)Muralidhar Teppala has said the has said that the engineering researches would result in agriculture sector.', NULL, 'IT', '2018-05-13 09:31:49'),
(26, '2018-01-18', NULL, 'In the AP teachers Chandus Silver Cup tournament, SRKR college staff stood at first place and proved their excellence as on the other side of the coin.', NULL, 'CL', '2018-05-13 09:32:29'),
(13, '2018-03-18', NULL, '   P.vijay Kumar Raju,a senior professor of Mechanical Engineering wing of SRKR Engineering College,Bhimavaram has received the doctorate from Andhra university', NULL, 'ME', '2018-05-13 09:36:57'),
(29, '2018-01-21', NULL, 'SRKR Engineering College has organised a two day International Conference on Applied Science and Technology(ICAST-2018) on jan 24 & 25 according to the college principal G Pardhasaradhi Varma ', NULL, 'CL', '2018-05-13 09:37:37'),
(30, '2018-01-24', NULL, 'Director of Institute and Nuclear Medicine and Allied Sciences(DRDO New Delhi) officials meet young scientists at SRKR.', NULL, 'CL', '2018-05-13 09:40:37'),
(31, '2018-01-30', NULL, 'On the Eve of Spurthi 2k18 ,a national level symposium workshop has been conducted on the latest technology Block chains.', NULL, 'CS', '2018-05-13 09:42:49'),
(32, '2018-01-31', NULL, 'SRKR Engineering College secured second rank in AP and 10th rank in national level at IIT Chennai for National Programme on Technology Enhanced Learning Programme(NPTEL) for its online courses.', NULL, 'CL', '2018-05-13 09:45:53'),
(15, '2018-02-09', NULL, 'SRKR Engineering college,Bhimavaram Information Technology  Final Year Student Allu Swathi Priya received certificate from Guinness world record for Kuchipudi Dance performance .\n', NULL, 'IT', '2018-05-13 09:52:10'),
(33, '2018-02-03', NULL, 'SRKR students attended a meeting with the prominent Innovation Society CEO Valli Kumari Collector Bhaskar on having an Industrialists for every house. ', NULL, 'CL', '2018-05-13 09:57:36'),
(34, '2018-05-15', NULL, '32 SRKREC students got selected for Infosys duirng the off-campus interviews conducted on 15th May 2018.', NULL, 'CL', '2018-05-20 16:40:05'),
(35, '2018-06-17', NULL, 'SRKR Sponsors Rs. 2 Lakh per year for Wonder Kid .B. Tanishqa for creating record in Archery in India Book of Records & Asia Book of Records.', NULL, 'CL', '2018-06-19 04:59:05'),
(36, '2018-11-04', NULL, 'Two teams from SRKR Engineering College, Bhimavaram won the first and third prizes in the college connect Startup Challenge competitions at the recently concluded Fintech festival at Visakhapatnam, according to college principal Dr G Partha Sarathi Varma.\n         In a statement on Saturday,he said the two teams received cash awards of Rs 75,000 and Rs 25,000 respectively from Cheif Minister N Chandra Babu Naidu.', NULL, 'CL', '2018-11-08 09:41:14'),
(37, '2018-11-13', NULL, 'Two projects of the Mechanical Engineering department of SRKR Engineering College here secured two gold medals in the national-level design competitions organised by the Institution of Engineers India (IEI) under the aegis of National Design Research Forum, according to principal Dr G Partha Sarathy Varma.\r\n    The project guide Dr V Durgaprasad said on Monday that Solar-powered walking bike, designed by the final year mechanical engineering students, bagged the gold medal in the environment section. Students team comprising Tumu Kedareswara Aditya, Yadla Ramesh, Yenumala Sivasurya, Palavalasa Srikrishnaveni received the gold medal in the national council.\r\n    In the Mechanical engineering division, Solar-powered multipurpose cultivation system, designed by the team of students comprising Kottada Tarun Kumar, MS Nikhil, KL Prasanna Kumar, I Chaitanya Varma, VLS VIkas and J Ritesh Varma under the guidance mechanical engineer department head Dr Kalidindi Brahma Raju secured the gold medal.\r\n   The college correspondent and secretary, Sagi Vithal Ranga Raju and CEO Sagi Ramakrishna Nishant Varma congratulated the students and the faculty for their achievement. \r\n', NULL, 'ME', '2018-11-13 06:03:46'),
(38, '2018-09-10', NULL, 'The IT Advisor to the Cheif Minister of Andhra Pradesh,Dr J A Chowdary addressed the audience at College Connect Programme organised at SRKR Engineering College,Bhimavaram recently.\r\n\r\nHe insisted that engineering students,after completion of their degree,can help build the soceity as an entrepreneur or product developer.The experts interact with students and select a few of them after which the concerned company will provide a mentor to the college.\r\n\r\n\r\nThe college principal Dr G Parhasaradhi Varma presided over the programme.Eminent experts from the corporate industry like P Raghavendra,P Srinivas,Dr Ramkumar R,Anirudda S Das,Zakkir Hussen and the college technology centre head Dr N Gopalakrishna Murthy also participated in the programme.', NULL, 'CL', '2018-11-13 10:55:20'),
(39, '2018-11-06', NULL, 'Four students of SRKR Engineering College were selected for University Fellowship Programme at Stanford University (USA), said the college principal Dr G Parthasaradhi Varma  here on Monday. He said that A Sai Chandana,studying in the third year ECE,Bhupathiraju Surya Subbaraju of second year Mechanical,N Roshini of Third year IT and N Lavanya of third year IT were selected for the fellowship programme.\r\n\r\nHe said that 358 students would participate in the fellowship programme from 16 various countries from across the world. He said that Google and Microsoft would support the fellowship programme.\r\n', NULL, 'TC', '2018-11-13 11:11:00'),
(40, '2018-11-17', NULL, 'The AICTE,ECI and ISTE will be jointly organising Chhatra Vishwakarma Awards-2018 at SRKR Engineering College,Bhimavaram on November 19.College Principal Dr G Pardhasaradhi Varma Said. On Friday,He released the poster for the event which he said,would encourage young bright students to become more innovtive. Programme coordinator Dr N Gopak Krishnamurthy said arround 816 projects would be displayed at the event.', NULL, 'CL', '2018-11-22 05:40:46'),
(41, '2018-11-20', NULL, 'All India Council For Technical Education (AICTE), Research and Faculty Development Counselor, Professor Dileep Malakhade said that the Engineering Students should come up with ideas and product Designs of Rural development, and Agriculture related areas. For these the AICTE is going to help them financially. On Monday at SRKR Engg College Bhimavaram, at AICTE, ECI & ISTE Chhatra Vishwakarma Awards - 2018 , he addressed this to the students in the meeting before the project Expo. And he also told that, the winners of Chhatra Vishwakarma awards will be taken to the International Expo and would fund about 10 Lakhs for each project financially. He told that students should think Innovatively and develop the projects useful for the society and bring them to the International Expo and claim the 1st places. As a part he told that all the world is using Technology for spraying of pesticides in the fields, but in India there is no such technology and 1300 workers had died during pesticide sprinkling, which is a bad situation.\r\n        He addressed students that, in the Godavari District for the Economy growth, the project in areas like Agriculture and Aqua fields are useful. AICTE regional director Dr.Ramesh Unnikrishnan told that, as the whole India Consists of 70% of the villages he addressed students that, it is encourageable to the students to design their innovative products in the areas of Agriculture. He told that about 60 projects from Twin Telugu states have appeared in the Expo and the best in these projects are selected and would be sent for state level  competition. \r\n         The principal of Srkr Engiuneering College, Dr.G. Pardhasaradhi Varma, addressed students that, the problems related to Rural areas should be studied and some best solutions would be brought by the students. In this program College Secretary and Correspondent Sagi vital RangaRaju, state Information Technology Academy  Program manager Gangadhar, P.Vasanth, College Technology Centre head Dr.N Gopala Krishnamurthy, and Vice- Principal Dr.K.V.S.N Raju had participated.', NULL, '', '2018-11-22 05:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text,
  `date_added` date NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid`, `title`, `url`, `category`, `description`, `date_added`) VALUES
(2, 'SRKREC 35 Years Promotional Video', 'DHWzW6SjERw', 1, NULL, '2016-11-17'),
(3, 'Short Film: Angle of Love', '8agzguvd14A', 4, 'Angle of love short film \r\ncast : Devendra, Aswini, Uday, Anji..........!\r\nEdited by : Gowtham, Pavan\r\nMusic\r\n"Bagundhey" by Vijay Prakash & Hansika', '2016-04-07'),
(4, 'SRKR Engineering College Aerial View', 'eVMBuRV_Yq8', 1, NULL, '2017-04-03'),
(5, 'SRKR COLLEGE ANTHEM ', 'M4lFE_QW9JE', 1, 'About SRKR\r\nLyrics: Rama Jogaiah Sastri\r\n     Singers:Lolla Revanth(indian iodol) and Ramya Behra\r\n     Music: Abburi Ravi"\r\n', '2017-12-10'),
(6, ' SRKRTCS Campus Selection-17', 'eXyKRh4U-gI', 1, 'In SRKR Engineering college  201 Students  were selected in Campus selections  conducted by  TCS .the TCS was conducted campus selection on 3rd week of September 2017.', '2017-09-22'),
(7, 'TOP GATE ranks by SRKR students in media', 'KRbL6wKoZS8', 1, 'Bhimavaram,SRKR Engineering college, Final year Engineering students selected I-Gate campus selection on Sep-2015: Principal Dr.G.Pardhasaradhi  Varma.', '2015-11-21'),
(8, 'Innovative ideas by SRKR students in media', 'U7Isb4ETGHI', 2, 'SRKR Engineering College Innovative Projects (Rajasekhar & Team)\n', '2016-06-17'),
(9, 'Short films by SRKR students DOSTHI', 'VvCGcgBiwBQ', 4, 'A FILM BY SRKR ENGINEERING COLLEGE STUDENTS....\n\nFEEL GOOD MOVIE , FRIENDS INSPIRATION MOVIE , SUSPENSE THRILLER .......', '2014-07-15'),
(10, 'Flashmobs by SRKR students on spurthi', 'S9xFGbOahcg', 3, 'Spurthi 2k18||flashmob||SRKREC||CSE flashmob', '2018-02-01'),
(11, 'Flashmobs by SRKR students on Trance', 'q7UYBG19qe8', 3, 'SRKR ECE TRANCE 2K18 FLASHMOB', '2018-01-24'),
(12, 'Flashmob by SRKR studentson supernova', 'VlpTQzD3qYA', 3, 'Supernova 2k18 was a huge success and on that day a flash mob was  a great treat, this is for those who missed it.', '2018-03-14'),
(13, 'Short films and videos by SRKR STUDENTS about srkr ', 'RqLHKZF8efw', 4, 'The change story SRKR Engineering college fall 2017', '2017-10-12'),
(14, 'Flashmob by SRKR students SANKETHA', 'XbLNky6mkk8', 3, 'Exhilarating performance by Mechanical Mighties in SANKETA''16 , S.R.K.R Engineering College.', '2016-02-19'),
(15, 'Short film by SRKR students cheli NeSogasey ', 'cfTobG6zRmQ', 4, 'Watch Cheli Ne Sogasey Latest Telugu Music Video. A Sajid Abdul Musical "CHELI NEE SOGASE". Features Karthik, Prasamsa. Directed by Uday Kiran. #TeluguSongs #CheliNeSogasey #MusicVideo #TeluguVideoSongs #OfficialMusicVideos #NewMusicVideo #2017TeluguSongs #LoveSongs2017\r\n\r\nBanner : Spider Web Production\r\nStar Cast : Karthik, Prasamsa\r\nMusic : Sajid Abdul\r\nLyrics : Gireesh\r\nSinger : Naveen Jamble\r\nMixing & Mastering : Nived Selvam\r\nD.O.P : Nikhil Deva, Olive Alvin, Kiran Harry, Sravan Kumar Varma, Vinjamuri Pawan\r\nEditing : Karthik Kotha\r\nProducers : Ajay Varma BH, Sravan Kumar Varma\r\nDirector : Uday Kiran', '2017-10-23'),
(16, 'Flashmob by SRKR students on TECHFLEET', 'vammv4sHgVg', 3, '#SRKR IT Fest #2018 Fire in Crowd', '2018-02-21'),
(17, 'Flashmob by SRKR students on SANKALP', '8JVFnlprfIE', 3, 'dance.... SANKALP CULTURALS', '2016-12-22'),
(18, 'VARUN TEJ VISITS SRKR ON EVENT OF THOLIPREMA', 'IBSILfIcGvI', 6, 'VARUN TEJ visited to SRKR for  prerelease function of tholiprema ', '2018-02-03'),
(19, 'RAASHI KHANNA visits SRKR on event of tholiprema', '0PPkD_6Y5Ic', 6, 'Actress raashi Khanna speech about Tholiprema movie in SRKR Engineering college', '2018-02-03'),
(20, 'DILRAJU Visits SRKR on the occassion of Tholiprema Audio', 'FOvTSynx_Z8', 6, 'Tholiprema Audio Launch at SRKR', '2018-02-03'),
(21, 'dance performance by CSE STUDENTS', 'TsvZGyvVV_Q', 5, 'The SRKR Engineering College,Bhimavaram Annual Day celebrations on 15th March,2018.  on that evening conducting cultural and sports Meet\r\n', '2018-03-20'),
(22, 'SRKR ISTE', 'rME7EHZ0VLc', 5, 'About SRKR ISTE', '2017-12-26'),
(23, 'SRKR Foreign Student performance at Annual Day Celebrations ', '_dv5s2hJR-I', 5, 'SRKR Foreign Student performance at Annual Day Celebrations ', '2018-03-15'),
(24, 'Dance performance by ECE students in Annual day celebrations-2018\n', 'S8vqt9drwIU', 5, 'Rangamma mangamma song by ECE student || SRKR engineering college Annual day celebrations-2018\n', '2018-03-15'),
(25, 'Dance by CSE students in silverjublie 2017', 'qt2D7vIJbuE', 5, 'Dance...Dance...And Only...Dance!!!!!! by CSE on silverjublie 2k17', '2017-01-07'),
(26, 'Dance by SRKR EEE students in annual day 2018', 'yZA0RXWJaP4', 5, 'Dance by SRKR EEE students ', '2018-03-16'),
(27, 'DANCE BY ROYALS on annuladay 2k18', 'Rq5D903J0Dk', 5, 'SRKR dance by civilroyals', '2017-04-23'),
(28, 'dacne byEEE and MECHANICAL on annualday 2k18', 'YKuRRNLZGvU', 5, 'Mechanical and Eee STUDENTS PERFORMANCE IN SRKR engineering college Annual day celebrations-2018', '2018-03-15'),
(29, 'dance by SRKR students', 'zSnAvSpG61M', 5, 'Annual day celebration in SRKR ENGINEERING COLLEGE, Bhimavaram in 2018 || a Dance Performance by  BHASKAR , Prudhvi , Radha  , Sundhar and Kiran', '2018-03-27'),
(30, 'SRISRI RAVISHANKAR GURUJI visits SRKR', 'kdaIrCnB2Xo', 6, 'SRI SRI RAVISHANKAR GURUJI AT SRKR ENGINEERING COLLEGE BHIMAVARAM', '2017-12-30'),
(31, 'SRKREC in news and media ', 'QhdzmQv88Yg', 2, 'SRKR ENGINEERING COLLEGE. ..BHIMAVARAM', '2017-03-15'),
(32, 'about DR.D.RANJARAJU GARU by students', 'VRegNrLxsQg', 0, 'video on Dr.D.Ranga Raju garu principal of SRKREC (2006-15) on his felicitation\r\n', '2015-08-31'),
(33, 'SRKREC CIVIL STUDENTS VISITS POLAVARAM', '0Oe3uhMP940', 2, 'SRKR Engineering College,Bhimavaram Civil Engineering  Students visit Polavaram Project on 11th November,2017.for 3rd year students of the Acadamic year 2017-18 field study;', '2017-11-17'),
(34, 'IOP WORKSHOP BY SRKR STUDENTS', 'l5rd45gTUXI', 5, 'IoP workshop', '2016-06-16'),
(35, 'certificate given by APCOUNCIL OF HIGHER EDUCATION', 'SLEHL3d8r0s', 1, 'Andhra Pradesh council of Higher education is announce grades for \nEngg. colleges on the basis of performance Nov,2015: Bhimavram SRKR Engineering college awarded A Grade: college Principal Dr.G.Pardhasaradhi Varma given press information about A grade.\n', '2015-11-27'),
(36, 'JAYAPRAKASH NARAYANA visits SRKR', 'R9Zip2sUcFI', 6, 'Loksatta founder Dr. Jayaprakash Narayana Visit Bhimavaram, SRKR Engineering College, Wet center on 30th April,2016', '2016-05-01'),
(37, 'MECHANICAL students won GOLD MEDALS', 'QpHLkEDx_sE', 2, 'SRKR Engineering College,Bhimavaram Department of Mechanical Engineering Students won two Medals from NDRF Design competition one from Environmental division in Silver medal,Agriculture division got Bronze medal for the academic year 2017 passed out.\n', '2017-10-24'),
(38, 'INNOVATION OF FINAL YEAR STUDENTS', '8Yami-yS2Bc', 5, 'SRKR Engineering College, Mechanical Engineering Final year Students Designed  Renovate cycle it is carry load maximum without any stress.and easily travel nearly 70 to 80 kilometers with any stress\n', '2017-05-17'),
(39, 'GREAT INNOVATION BY SRKR STUDENTS', 'e72tJ1rfUuM', 5, 'An Institution of Engineers(India) R&D funded project done by 4th year mechanical engineering students of S R K R Engineering college under the guidance of Dr. K Brahma Raju M.E Ph.D\n', '2013-05-28'),
(40, 'SRKR students stage performance ON MULTIPLEX', 'XoJO6Xq06OU', 7, '#SRKR 2K18 #CSE FLASH MOB#SPURTHI#GEETHA_MULTIPLEX # BHIMAVARAM', '2018-04-01'),
(41, 'awareness on AYURVEDIC Medicine by SRKR to people in media', 'KzJP5oQ_GPQ', 5, 'Awareness on Ayurvedic Medicine | Organized By SRKR Engineering College | Bhimavaram ', '2017-07-07'),
(42, 'about our SRKR COLLEGE', 'FHA2zzINaf4', 1, 'few things about SRKR engineering college', '2017-02-09'),
(43, 'NATIONAL LEVEL PRIDE TO SRKR IN MEDIA', '0rfeoH7yAlI', 2, 'Bhimavaram SRKR College Got National 10th Place For Online Training Exams 31 01 2018 \n', '2018-02-01'),
(44, 'SUPERMASTHI IN SRKR', 'dJgnlZ6pT1M', 5, 'SUPER MASTI conducted in srkr engineering college bhimavaram', '2017-03-23'),
(45, 'Drums performance in Alumni meet Hyderabad SRKR eng college', 'nb1NVNI_kVo', 7, 'Drums performance by one of the Alumni', '2012-02-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2016 at 07:05 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lnc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE IF NOT EXISTS `chat_table` (
`chat_id` int(11) NOT NULL,
  `chat_username` varchar(100) NOT NULL,
  `chat_message` text NOT NULL,
  `chat_user_photo` varchar(100) NOT NULL,
  `chat_date` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_table`
--

INSERT INTO `chat_table` (`chat_id`, `chat_username`, `chat_message`, `chat_user_photo`, `chat_date`) VALUES
(11, 'arsho', 'This is a demo message using Android mobile', 'user_image_dir/arsho_image.png', '1453839356'),
(12, 'arsho', 'Aslam,\nWhat is the expected output of this program?\n&lt;pre&gt;\n&lt;code&gt;\n#include &lt;stdio.h&gt;\n\nint main() {\n    int i;\n    int prime_number[]={2,3,5,7};\n    for(i=0;i&lt;4;i++)\n    {\n        printf(&quot;%dn&quot;,prime_number[i]);\n    }\n	return 0;\n}\n&lt;/code&gt;\n&lt;/pre&gt;', 'user_image_dir/arsho_image.png', '1453899777'),
(14, 'md_aslam', 'I think &lt;br/&gt;&lt;pre&gt;2&lt;br&gt;3&lt;br&gt;5&lt;br&gt;7&lt;br&gt;&lt;/pre&gt;', 'user_image_dir/md_aslam_image.jpg', '1453904099'),
(15, 'pollmix', 'Yy', 'user_image_dir/user.png', '1454044485'),
(16, 'arsho', 'Welcome Pollob', 'user_image_dir/arsho_image.png', '1454044496');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_category_table`
--

CREATE TABLE IF NOT EXISTS `lesson_category_table` (
`lesson_category_id` int(11) NOT NULL,
  `lesson_category_title` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_category_table`
--

INSERT INTO `lesson_category_table` (`lesson_category_id`, `lesson_category_title`) VALUES
(1, 'Introduction'),
(2, 'Data Types'),
(3, 'Variables'),
(4, 'Operators'),
(5, 'Conditions'),
(6, 'Loops'),
(7, 'Functions'),
(8, 'Arrays'),
(9, 'String'),
(10, 'Scope'),
(11, 'Mathematics'),
(12, 'Input Output'),
(13, 'File I/O'),
(14, 'Structures'),
(15, 'Pointers'),
(16, 'Pre Processors');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_table`
--

CREATE TABLE IF NOT EXISTS `lesson_table` (
`lesson_id` int(11) NOT NULL,
  `lesson_title` varchar(100) NOT NULL,
  `lesson_details` text NOT NULL,
  `lesson_media` varchar(100) NOT NULL,
  `lesson_tags` varchar(100) NOT NULL,
  `lesson_uploader` varchar(100) NOT NULL,
  `lesson_category` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_table`
--

INSERT INTO `lesson_table` (`lesson_id`, `lesson_title`, `lesson_details`, `lesson_media`, `lesson_tags`, `lesson_uploader`, `lesson_category`) VALUES
(3, 'History of C', '&lt;h3 class=&quot;center_text&quot;&gt;Welcome to learn C programming&lt;/h3&gt;\r\n&lt;p&gt;&lt;strong&gt;C&lt;/strong&gt; is a computer programming language developed in 1972 by &lt;strong&gt;Dennis M. Ritchie&lt;/strong&gt; at the Bell Telephone Laboratories to develop the UNIX Operating System. C is a simple and &lt;strong&gt;structure oriented&lt;/strong&gt; programming language.&lt;/p&gt;\r\n&lt;p&gt;C is also called &lt;strong&gt;mother Language&lt;/strong&gt; of all programming Language. It is the most widely use computer programming language, This language is used for develop system software and Operating System. All other programming languages were derived directly or indirectly from C programming concepts.&lt;/p&gt;\r\n&lt;h3 class=&quot;center_text&quot;&gt;History of C&lt;/h3&gt;\r\n&lt;p&gt;C language is developed by &lt;strong&gt;Mr. Dennis Ritchie&lt;/strong&gt;  in the year 1972 at bell laboratory at USA, C is a simple and structure Oriented Programming Language.&lt;/p&gt;\r\n&lt;p&gt;In the year 1988 C programming language standardized by ANSI (American national standard institute), that version is called ANSI-C. In the year of 2000 C programming language standardized by ISO that version is called C-99. All other programming languages were derived directly or indirectly from C programming concepts.&lt;/p&gt;\r\n&lt;h3 class=&quot;center_text&quot;&gt;Prerequisites&lt;/h3&gt;\r\n&lt;p&gt;Before learning C Programming language no need of knowledge of any Computer programming language, C is the basic of all high level programming languages. C is also called mother Language.&lt;/p&gt;\r\n&lt;!-- Bottom preview or next button --&gt;\r\n&lt;hr /&gt;', 'lesson_dir/3_media.jpg', 'Introduction#History#ANSI-C', 'nfs', 'Introduction'),
(4, 'Applications of C', '&lt;h3 class=&quot;center_text&quot;&gt;Applications of C&lt;/h3&gt;\r\n&lt;p&gt;Mainly C Language is used for Develop Desktop application and system software. Some application of C language are given below.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;C programming language can be used to design the system software like operating system and Compiler.&lt;/li&gt;\r\n&lt;li&gt;To develop application software like database and spread sheets.&lt;/li&gt;\r\n&lt;li&gt;For Develop Graphical related application like computer and mobile games.&lt;/li&gt;\r\n&lt;li&gt;To evaluate any kind of mathematical equation use c language.&lt;/li&gt;\r\n&lt;li&gt;C programming language can be used to design the compilers.&lt;/li&gt;\r\n&lt;li&gt;UNIX Kernal is completely developed in C Language.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;For Creating Compilers&lt;/strong&gt; of different Languages which can take input from other language and convert it into lower level machine dependent language.&lt;/li&gt;\r\n&lt;li&gt;C programming language can be used to design Operating System.&lt;/li&gt;\r\n&lt;li&gt;C programming language can be used to design Network Devices.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;!-- Bottom preview or next button --&gt;\r\n&lt;hr /&gt;', '', 'Applications#Introduction', 'nfs', 'Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `task_table`
--

CREATE TABLE IF NOT EXISTS `task_table` (
`task_id` int(11) NOT NULL,
  `task_title` varchar(100) NOT NULL,
  `task_details` text NOT NULL,
  `task_input_file` varchar(200) NOT NULL,
  `task_output_file` varchar(200) NOT NULL,
  `task_hints` varchar(400) NOT NULL,
  `task_media` varchar(200) NOT NULL,
  `task_point` varchar(50) NOT NULL,
  `task_uploader` varchar(100) NOT NULL,
  `task_category` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_table`
--

INSERT INTO `task_table` (`task_id`, `task_title`, `task_details`, `task_input_file`, `task_output_file`, `task_hints`, `task_media`, `task_point`, `task_uploader`, `task_category`) VALUES
(10, 'Hello World', 'You are given a program below. Change it in appropriate place so that it prints &quot;Let''s learn programming&quot;.\r\n&lt;pre&gt;\r\n&lt;code&gt; \r\n#include&lt;stdio.h&gt;\r\nint main(){\r\n    printf(&quot;Hello World\\n&quot;);\r\n    return 0;\r\n}\r\n&lt;/code&gt;\r\n&lt;/pre&gt;', 'task_dir/10_input.in', 'task_dir/10_output.out', 'Check semicolon#Ensure to add newline ''n''#Check spelling#Don''t forget to add header file', '', '5', 'arsho', 'Introduction'),
(13, 'Find the type', 'There are several data given below. Can you determine their types? I will give you a hint, they are either int, float or char.&lt;br&gt;\r\n&lt;pre&gt;\r\n&lt;code&gt;\r\n1. a&lt;br&gt;\r\n2. 2016&lt;br&gt;\r\n3. 44.9&lt;br&gt;\r\n4. 3.14159265&lt;br&gt;\r\n5. 10007&lt;br&gt;\r\n&lt;/code&gt;\r\n&lt;/pre&gt;\r\nYou will have to print 5 lines. In each line print the datatype of the data in that line. If it is an integer then print &lt;strong&gt;&quot;int&quot;&lt;/strong&gt;, if a real number then &lt;strong&gt;&quot;float&quot;&lt;/strong&gt;, otherwise &lt;strong&gt;&quot;char&quot;&lt;/strong&gt;.', 'task_dir/13_input.out', '', 'Check semicolon#Ensure to add newline ''n''#Check spelling#Don''t forget to add header file', '', '10', 'arsho', 'Data Types'),
(14, 'Sorting', 'You are given 3 numbers. You have to sort them in increasing order. &lt;br&gt;\r\nYou should take input a number n first, which denotes the number of different scenarios in the input. After that next n lines each in the input will give you 3 integers. &lt;br&gt;\r\nFor the output, you should output n lines each containing 3 integers in increasing order. They should be separated by space. Don''t print any space after the third integer.&lt;br&gt;\r\nFor example, input can be: \r\n&lt;pre&gt; &lt;code&gt;\r\n2\r\n1 2 5\r\n5 2 3\r\n&lt;/code&gt; &lt;/pre&gt;\r\nThen the output will be:\r\n&lt;pre&gt; &lt;code&gt;\r\n1 2 5\r\n2 3 5\r\n&lt;/code&gt; &lt;/pre&gt;', 'task_dir/14_input.in', 'task_dir/14_output.out', 'Swapping#Check new line#Check spaces', '', '10', 'nfs', 'Variables'),
(15, 'a to the power b', 'You are given two integers a and b. You need to find the value of a^b. The value of a is a positive integer not greater than 10, while b is a non-negative integer less than 4.&lt;br&gt;\r\nYou should take input a number n first, which denotes the number of different scenarios in the input. After that next n lines each in the input will give you 2 integers a and b. \r\nFor the output, you should output n lines each containing an integer which deontes the value of a^b.\r\nFor example, input can be:\r\n&lt;pre&gt; &lt;code&gt;\r\n2\r\n3 2\r\n2 3\r\n&lt;/code&gt; &lt;/pre&gt;\r\nThen the output will be:\r\n&lt;pre&gt; &lt;code&gt;\r\n9\r\n8\r\n&lt;/code&gt; &lt;/pre&gt;', 'task_dir/15_input.in', 'task_dir/15_output.out', 'Check', '', '10', 'nfs', 'Operators'),
(16, 'FizzBuzz', 'You are are given T test scenarios. In each scenario you are given an integer number N. \r\nIf N is divisible by 3 you must print &quot;Fizz&quot;. If N is divisible by 5 you must print &quot;Buzz&quot;. \r\nIf N is divisible by both 3 and 5 you must print &quot;FizzBuzz&quot;. \r\nIt is guaranteed that input will be such that the number is always divisible by 3 or 5 or both.\r\n&lt;br&gt;\r\nINPUT:\r\n&lt;pre&gt;&lt;code&gt;\r\n3\r\n3\r\n10\r\n15\r\n&lt;/code&gt;&lt;/pre&gt;\r\nOUTPUT:\r\n&lt;pre&gt;&lt;code&gt;\r\nFizz\r\nBuzz\r\nFizzBuzz\r\n&lt;/code&gt;&lt;/pre&gt;', 'task_dir/16_input.in', 'task_dir/16_output.out', 'use if else', '', '10', 'nfs', 'Conditions');

-- --------------------------------------------------------

--
-- Table structure for table `user_ranklist`
--

CREATE TABLE IF NOT EXISTS `user_ranklist` (
  `ranklist_username` varchar(100) NOT NULL,
  `number_of_ac` int(11) NOT NULL DEFAULT '0',
  `number_of_submissions` int(11) NOT NULL DEFAULT '0',
  `date_of_last_submission` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ranklist`
--

INSERT INTO `user_ranklist` (`ranklist_username`, `number_of_ac`, `number_of_submissions`, `date_of_last_submission`) VALUES
('arsho', 3, 14, '1454052372'),
('irfan', 0, 0, '0'),
('mahbub', 1, 2, '1453565067'),
('md_aslam', 0, 0, '0'),
('nfs', 2, 4, '1454048505'),
('pollmix', 0, 0, '0'),
('risala', 1, 1, '1453445805'),
('saimun', 1, 1, '1453837571');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `user_occupation` varchar(100) NOT NULL,
  `user_institute` varchar(100) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_website` varchar(50) NOT NULL,
  `user_github` varchar(50) NOT NULL,
  `user_bio` varchar(250) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_username`, `user_password`, `user_email`, `user_fullname`, `user_city`, `user_country`, `user_occupation`, `user_institute`, `user_phone`, `user_website`, `user_github`, `user_bio`, `user_photo`, `user_role`) VALUES
('arsho', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'shovon.sylhet@gmail.com', 'Ahmedur Rahman Shovon', 'Sylhet', 'BD', 'Student', 'IIT, JU', '', 'http://datamate.ws', 'arsho', 'Simple', 'user_image_dir/arsho_image.png', 'Super Admin'),
('irfan', '1e55dbf412cb74d5e2c21fb6452408c7', 'irfan_khan2015@gmail.com', 'Irfan Hasib', 'Dhaka', 'BD', 'Student', 'Notre Dame College', '01738525165', 'http://itdesh.com', 'irfan_ndc', 'Love coding', 'user_image_dir/irfan_image.jpg', 'User'),
('mahbub', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'mahbub_dic@yahoocom', 'Mahbub Alam', 'Dhaka', 'BD', 'Student', 'JU', '017', '', '', '', 'user_image_dir/mahbub_image.jpg', 'User'),
('md_aslam', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'aslam_iit_ju@outlook.com', 'Md. Aslam Hossin', 'Natore', 'BD', 'Student', 'IIT, JU', '01738525162', 'http://datamate.ws', 'md_aslam', '', 'user_image_dir/md_aslam_image.jpg', 'User'),
('nfs', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'nfssdq@gmail.com', 'Md. Nafis Sadique', 'Dhaka', 'BD', 'Student', 'IIT, JU', '', '', '', '', 'user_image_dir/nfs_image.jpg', 'Admin'),
('pollmix', '96e79218965eb72c92a549dd5a330112', 'polboy777@gmail.com', '', '', '', '', '', '', '', '', '', 'user_image_dir/user.png', 'User'),
('risala', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'risala@juniv.edu', 'Risala Tasin Khan', 'Dhaka', 'BD', 'Assistant Professor', 'IIT, JU', '', '', '', '', 'user_image_dir/risala_image.jpg', 'Admin'),
('saimun', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'saimun@gmail.com', 'Mathew J. Saimun', 'New York', 'US', 'Software Engineer', 'IMO', '', 'http://imo.im/', '', '', 'user_image_dir/saimun_image.jpg', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_table`
--

CREATE TABLE IF NOT EXISTS `user_task_table` (
`submission_id` int(11) NOT NULL,
  `submission_username` varchar(100) NOT NULL,
  `submission_task_id` varchar(100) NOT NULL,
  `submission_task_title` varchar(100) NOT NULL,
  `submission_task_category` varchar(100) NOT NULL,
  `submission_verdict` varchar(100) NOT NULL,
  `submission_code` text NOT NULL,
  `submission_date` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task_table`
--

INSERT INTO `user_task_table` (`submission_id`, `submission_username`, `submission_task_id`, `submission_task_title`, `submission_task_category`, `submission_verdict`, `submission_code`, `submission_date`) VALUES
(24, 'nfs', '13', 'Find the type', 'Data Types', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;char\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    \n    return 0;\n}', '1453395997'),
(25, 'arsho', '10', 'Hello World', 'Introduction', 'Wrong answer', '#include &lt;stdio.h&gt;\n\nint main() {\n    int i;\n    int prime_number[]={2,3,5,7};\n    for(i=0;i&lt;4;i++)\n    {\n        printf(&quot;%d\\n&quot;,prime_number[i]);\n    }\n	return 0;\n}', '1453438223'),
(26, 'risala', '10', 'Hello World', 'Introduction', 'Accepted', '#include&lt;stdio.h&gt;\nint main(){\n    printf(&quot;Let''s learn programming\\n&quot;);\n    return 0;\n}', '1453445805'),
(27, 'arsho', '10', 'Hello World', 'Introduction', 'Accepted', '#include&lt;stdio.h&gt;\nint main(){\n    printf(&quot;Let''s learn programming\\n&quot;);\n    return 0;\n}', '1453457117'),
(28, 'arsho', '10', 'Hello World', 'Introduction', 'Wrong answer', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;Learn programming&quot;);\n    return 0;\n}', '1453467975'),
(29, 'arsho', '13', 'Find the type', 'Data Types', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;char\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    \n    return 0;\n}', '1453553432'),
(30, 'arsho', '13', 'Find the type', 'Data Types', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;char\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;float\\n&quot;);\n    printf(&quot;int\\n&quot;);\n    \n    return 0;\n}', '1453556782'),
(31, 'mahbub', '10', 'Hello World', 'Introduction', 'Wrong answer', '#include &lt;stdio.h&gt;\n\nint main() {   \n    printf (&quot;Let''s learn programming&quot;);\n    return 0;\n}', '1453565043'),
(32, 'mahbub', '10', 'Hello World', 'Introduction', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {   \n    printf (&quot;Let''s learn programming\\n&quot;);\n    return 0;\n}', '1453565067'),
(33, 'saimun', '13', 'Find the type', 'Data Types', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;char\\nint\\nfloat\\nfloat\\nint\\n&quot;);\n}', '1453837571'),
(34, 'arsho', '10', 'Hello World', 'Introduction', 'Compilation error', '#include &lt;stdio.h&gt;\n\nint main() {    \n    return 0\n}', '1453903875'),
(35, 'arsho', '10', 'Hello World', 'Introduction', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() { \n    printf(&quot;Let''s learn programming\\n&quot;);\n    return 0;\n}', '1453903899'),
(36, 'arsho', '10', 'Hello World', 'Introduction', 'Wrong answer', '#include &lt;stdio.h&gt;\n\nint main() {    \n    return 0;\n}', '1453903922'),
(37, 'arsho', '10', 'Hello World', 'Introduction', 'Wrong answer', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;Hello World\\n&quot;);\n    return 0;\n}', '1453906876'),
(38, 'arsho', '10', 'Hello World', 'Introduction', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    printf(&quot;Let''s learn programming\\n&quot;);\n    return 0;\n}', '1453906953'),
(39, 'nfs', '14', 'Sorting', 'Variables', 'Accepted', '#include &lt;stdio.h&gt;\n\nint main() {    \n    int ts; scanf(&quot;%d&quot;, &amp;ts);\n    while(ts--){\n        int a, b, c; scanf(&quot;%d %d %d&quot;, &amp;a, &amp;b, &amp;c);\n        if(a &gt; b){\n            int tmp = a; a = b; b = tmp;\n        }\n        if(a &gt; c){\n            int tmp = a; a = c; c = tmp;\n        }\n        if(b &gt; c){\n            int tmp = c; c = b; b = tmp;\n        }\n        printf(&quot;%d %d %d\\n&quot;, a, b, c);\n    }\n    return 0;\n}', '1454048505'),
(40, 'arsho', '15', 'a to the power b', 'Operators', 'Compilation error', '#include &lt;stdio.h&gt;\n#include &lt;math.h&gt;\n\nint main() {    \n    int t,i,a,b;\n    scanf(&quot;%d&quot;,&amp;t);\n    for(i=0;i&lt;t;i++){\n        scanf(&quot;%d%d&quot;,&amp;a,&amp;b);\n        printf(&quot;%0f\\n&quot;,pow(a,b));\n    }\n    return 0;\n}', '1454052001'),
(41, 'arsho', '15', 'a to the power b', 'Operators', 'Compilation error', '#include &lt;stdio.h&gt;\n#include &lt;math.h&gt;\n\nint main() {    \n    int t,i;\n    double a,b;\n    scanf(&quot;%d&quot;,&amp;t);\n    for(i=0;i&lt;t;i++)\n    {\n        scanf(&quot;%lf %lf&quot;,&amp;a,&amp;b);\n        printf(&quot;%.0lf\\n&quot;, pow(a,b));\n    }\n    return 0;\n}', '1454052254'),
(42, 'arsho', '15', 'a to the power b', 'Operators', 'Accepted', '#include &lt;stdio.h&gt;\n#include &lt;math.h&gt;\n\nint main() {    \n    int j,t,i,a,b,res;\n    scanf(&quot;%d&quot;,&amp;t);\n    for(i=0;i&lt;t;i++)\n    {\n        scanf(&quot;%d %d&quot;,&amp;a,&amp;b);\n        res=1;\n        for(j=0;j&lt;b;j++)res*=a;\n        printf(&quot;%d\\n&quot;, res);\n    }\n    return 0;\n}', '1454052372');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
 ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `lesson_category_table`
--
ALTER TABLE `lesson_category_table`
 ADD PRIMARY KEY (`lesson_category_id`);

--
-- Indexes for table `lesson_table`
--
ALTER TABLE `lesson_table`
 ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `task_table`
--
ALTER TABLE `task_table`
 ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user_ranklist`
--
ALTER TABLE `user_ranklist`
 ADD PRIMARY KEY (`ranklist_username`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`user_username`);

--
-- Indexes for table `user_task_table`
--
ALTER TABLE `user_task_table`
 ADD PRIMARY KEY (`submission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lesson_category_table`
--
ALTER TABLE `lesson_category_table`
MODIFY `lesson_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lesson_table`
--
ALTER TABLE `lesson_table`
MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `task_table`
--
ALTER TABLE `task_table`
MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_task_table`
--
ALTER TABLE `user_task_table`
MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 06:23 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `commenter` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment`, `commenter`) VALUES
(4, 1, 'I went and gave this a go. It looks really sleek and I actually like it.  Im just having trouble in one area. I can''t seem to change the RSS feed for the news. It''s providing broken links.  Any way to fix this?', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `follower_user_id` varchar(40) NOT NULL,
  `followed_user_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follower_user_id`, `followed_user_id`) VALUES
('test@test', 'rawan.iav@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likeme`
--

CREATE TABLE IF NOT EXISTS `likeme` (
  `user_id` varchar(40) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likeme`
--

INSERT INTO `likeme` (`user_id`, `post_id`) VALUES
('test@test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `likes` int(11) NOT NULL,
  `unlikes` int(11) NOT NULL,
  `post` varchar(20000) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `numberComments` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `likes`, `unlikes`, `post`, `user_name`, `numberComments`) VALUES
(1, 'rawan.iav@gmail.com', 2, 2, '<p style="text-align:start">&nbsp; &nbsp; &nbsp; All right, y&#39;all -- semi-creepy confession time: I love watching how other people use technology.</p>\r\n\r\n<p style="text-align:start">&nbsp;Not in the &quot;staring longingly into your bedroom window&quot; sense, thankyouverymuch. (C&#39;mon now. We know each better than that, don&#39;t we?!) More in the &quot;seeing how someone else&#39;s&nbsp;</p>\r\n\r\n<p style="text-align:start">&nbsp;phone is set up and what tricks they u<img alt="" dir="ltr" src="http://images.techhive.com/images/article/2016/04/awesome-android-home-screens-sliding-stacker-1-100658053-large.idge.jpg" style="float:left; height:300px; width:200px" />se to get around it&quot; way -- you know, completely casual stuff between two consenting adults.</p>\r\n\r\n<p style="text-align:start">&nbsp;&nbsp; Mobile tech is just such a personal thing, and you can learn a lot about someone by seeing what kind of picture they paint with our common virtual palette. That&#39;s especially true on&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Android, where we all start with the same set of tools but have practically infinite options with how we choose to use them.</p>\r\n\r\n<p style="text-align:start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; And that, I think, is what makes seeing other people&#39;s mobile tech habits most intriguing to me: the notion of getting a glimpse into someone else&#39;s thought process and maybe&nbsp;</p>\r\n\r\n<p style="text-align:start">&nbsp; stumbling onto something inspiring -- a different approach or idea that might provide a fresh way of optimizing or organizing my own Android experience.</p>\r\n\r\n<p style="text-align:start">&nbsp;That&#39;s why I started the&nbsp;<a href="http://www.computerworld.com/article/3058172/android/how-i-use-android-russell-ivanovic.html" style="color: rgb(163, 30, 34);">&quot;How I Use Android&quot; series</a>&nbsp;last April -- to give us all a peek behind the curtains at how high-profile people from the Android world use Android in their own lives. And now, one year later, it&#39;s time to expand our scope and add in some new terrain.</p>\r\n\r\n<p style="text-align:start">&nbsp;Allow me to introduce the latest Android Intelligence series: &quot;Awesome Android home screens.&quot; Each month, we&#39;ll take a look at a regular user&#39;s exceptional home screen setup -- something cool and creative that goes beyond the norm. Most important, it&#39;ll be something you can implement easily on your own, without the need for any custom ROMs or crazily complex configurations.</p>\r\n\r\n<p style="text-align:start"><strong>(Got a creative home screen setup of your own? Send some screenshots to</strong><a href="mailto:AwesomeHomeScreens@gmail.com" style="color: rgb(163, 30, 34);"><strong>AwesomeHomeScreens@gmail.com</strong></a><strong>. Fleeting fame, gaggles of groupies, and a $10 Google Play gift card could be yours!)</strong> Without further ado, here&#39;s our first featured home screen -- a little something I like to call the Sliding Stacker:</p>\r\n\r\n<p style="text-align:start">can&#39;t</p>\r\n\r\n<p style="text-align:start">source: <a href="http://www.computerworld.com/article/3062052/android/awesome-android-home-screens-sliding-stacker.html">http://www.computerworld.com/article/3062052/android/awesome-android-home-screens-sliding-stacker.html</a></p>\r\n', 'Rawan A Alsaham', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unlikeme`
--

CREATE TABLE IF NOT EXISTS `unlikeme` (
  `user_id` varchar(40) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unlikeme`
--

INSERT INTO `unlikeme` (`user_id`, `post_id`) VALUES
('test@test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Name`, `Password`, `phonenumber`) VALUES
('me@ME', 'me', 'me@ME', ''),
('rawan.iav@gmail.com', 'Rawan A Alsaham', 'rawanis', '+96650411'),
('test@te7', 'ah', 'test', ''),
('test@tes', 'jj', 'tes', ''),
('test@test', 'test', 'test', '65766786'),
('tried@tried', 'tried', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD UNIQUE KEY `follower_user_id` (`follower_user_id`,`followed_user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

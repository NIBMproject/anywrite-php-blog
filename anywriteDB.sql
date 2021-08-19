-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2021 at 03:07 PM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anywrite`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` text NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `views` int(11) DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `image`, `createAt`, `user_id`, `views`, `category_id`) VALUES
(41, 'ශ්‍රී දළදා මාළිගාව', '<p><strong>ශ්&zwj;රී දළදා මාළිගාව</strong>&nbsp;යනු&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B6%B6%E0%B7%94%E0%B6%AF%E0%B7%94%E0%B6%BB%E0%B6%A2%E0%B7%8F%E0%B6%AB%E0%B6%B1%E0%B7%8A_%E0%B7%80%E0%B7%84%E0%B6%B1%E0%B7%8A%E0%B7%83%E0%B7%9A\">බුදුරජාණන් වහන්සේගේ&nbsp;</a>වම් දන්තධාතූන් වහන්සේ වර්තමානයේ තැන්පත් කර ඇති&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B6%AF%E0%B7%85%E0%B6%AF%E0%B7%8F_%E0%B6%B8%E0%B7%8F%E0%B7%85%E0%B7%92%E0%B6%9C%E0%B7%8F\">දළදා මාළිගාවයි</a>. වර්තමාන දළදා මාළිගාව ශ්&zwj;රී ලංකාවේ මහනුවර නගරයේ පිහිටා ඇත. උඩරට රාජ්&zwj;යය සමයේ (1592 සිට 1815) මෙය පිහිටා තිබුණේ එවකට පැවති&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B7%83%E0%B7%99%E0%B6%82%E0%B6%9A%E0%B6%A9%E0%B6%9C%E0%B6%BD_%E0%B6%BB%E0%B7%8F%E0%B6%A2%E0%B6%9A%E0%B7%93%E0%B6%BA_%E0%B6%B4%E0%B6%BB%E0%B7%92%E0%B7%81%E0%B7%8A%E2%80%8D%E0%B6%BB%E0%B6%BA\">රාජකීය මාලිගා සංකීර්ණය</a>&nbsp;තුළමය. ශ්&zwj;රී දළදා මාලිගාව මුල්වරට ගොඩනගනු ලැබුයේ&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B6%B4%E0%B7%85%E0%B6%B8%E0%B7%94%E0%B7%80%E0%B6%B1_%E0%B7%80%E0%B7%92%E0%B6%B8%E0%B6%BD%E0%B6%B0%E0%B6%BB%E0%B7%8A%E0%B6%B8%E0%B7%83%E0%B7%96%E0%B6%BB%E0%B7%92%E0%B6%BA_%E0%B6%BB%E0%B6%A2\">පළමුවන විමලධර්මසූරිය</a>&nbsp;(1592-1604) රජතුමා විසිනි. එතුමා ඉදිකළ ශ්&zwj;රී දළදා මාලිගාව පෘතුගීසි ආක්&zwj;රමණික&zwj;යෝ විනාශ කළහ. දැනට දක්නට ලැබෙන පැරණි දෙමහල් වැඩසිටින මාලිගාව ඉදිකරනු ලැබ ඇත්තේ&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B7%81%E0%B7%8A%E2%80%8D%E0%B6%BB%E0%B7%93_%E0%B7%80%E0%B7%93%E0%B6%BB_%E0%B6%B4%E0%B6%BB%E0%B7%8F%E0%B6%9A%E0%B7%8A%E2%80%8D%E0%B6%BB%E0%B6%B8_%E0%B6%B1%E0%B6%BB%E0%B7%9A%E0%B6%B1%E0%B7%8A%E0%B6%AF%E0%B7%8A%E2%80%8D%E0%B6%BB%E0%B7%83%E0%B7%92%E0%B6%82%E0%B7%84_%E0%B6%BB%E0%B6%A2\">ශ්&zwj;රී වීරපරාක්&zwj;රම නරේන්ද්&zwj;රසිංහ</a>&nbsp;(1707 - 1739) රජතුමාය. ඉන්පසු රජ පැමිණි නායක්කර් වංශික ද්&zwj;රවිඩ රජවරු පවා ශ්&zwj;රී දළදා මාලිගාව වැඩි දියුණු කොට ආරක්ෂා කළහ. දළදා මාලිගාව පිහිටා ඇති&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B6%B8%E0%B7%84%E0%B6%B1%E0%B7%94%E0%B7%80%E0%B6%BB\">මහනුවර</a>&nbsp;නගරයම&nbsp;<a href=\"https://si.wikipedia.org/wiki/%E0%B6%BA%E0%B7%94%E0%B6%B1%E0%B7%99%E0%B7%83%E0%B7%8A%E0%B6%9A%E0%B7%9D\">යුනෙස්කෝව</a>&nbsp;විසින් ලෝක උරුමයක් ලෙස නම් කර ඇත.</p><p><br />මල්වතු හා අස්ගිරි යන දෙපාර්ශවයේ ස්වාමීන් වහන්සේලා දිනපතාම දළදා වහන්සේට පූජා සත්කාර කරති. මෙම පූජාව (තේවාව) දිනකට තුන් වරක් (පාන්දර, දවල් සහ සවස) පවත්වයි. බදාදා දිනවල විශේෂ පූජාවක් ලෙස නානුමුර මංගල්&zwj;යය පවත්වයි. මෙහිදී සුවඳ ගැන්වූ ඖෂධීය ජලයෙන් සංකේත වශයෙන් දළදා වහන්සේ ස්නානය කරවනු ලබයි. මෙසේ ස්නානය කරවීමෙන් ලැබෙන ජලයේ රෝග සුව කරීමේ ආනුභාවයක් ඇති බව විශ්වාස කෙරේ.</p>', 'assets/img/articles/2021-08-19 02:38:49pmi.g.sandakelum@gmail.com.jpeg', '2021-08-19 09:08:49', 54, 4, 3),
(42, 'What Is Artificial Intelligence (AI)?', '<p><strong>Artificial intelligence (AI) refers to the simulation of human intelligence in machines that are programmed to think like humans and mimic their actions. The term may also be applied to any machine that exhibits traits associated with a human mind such as learning and problem-solving.</strong></p><p>&nbsp;</p><p>The ideal characteristic of artificial intelligence is its ability to rationalize and take actions that have the best chance of achieving a specific goal. A subset of artificial intelligence is&nbsp;<a href=\"https://www.investopedia.com/terms/m/machine-learning.asp\">machine learning</a>, which refers to the concept that computer programs can automatically learn from and adapt to new data without being assisted by humans.&nbsp;<a href=\"https://www.investopedia.com/terms/d/deep-learning.asp\">Deep learning</a>&nbsp;techniques enable this automatic learning through the absorption of huge amounts of unstructured data such as text, images, or video.</p><p>&nbsp;</p><p>KEY TAKEAWAYS</p><ul><li>Artificial intelligence refers to the simulation of human intelligence in machines.</li><li>The goals of artificial intelligence include learning, reasoning,&nbsp;and perception.</li><li>AI is being used across different industries including finance and healthcare.</li><li>Weak AI tends to be simple and single-task oriented, while strong AI carries on tasks that are more complex and human-like.</li></ul>', 'assets/img/articles/2021-08-19 02:54:58pmcharindubjayanath380@gmail.com.jpeg', '2021-08-19 09:24:58', 55, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Fashion'),
(2, 'Food'),
(3, 'Travel'),
(4, 'Music'),
(5, 'Music'),
(6, 'Lifestyle '),
(7, 'Technology '),
(8, 'Fitness '),
(9, 'Sport'),
(10, 'Health '),
(11, 'Entertainment '),
(12, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `articleId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `createAt`, `articleId`, `user_id`) VALUES
(44, 'බොහොම වැදගත් 🌸', '2021-08-19 14:42:05', 41, 55),
(45, 'wow useful content', '2021-08-19 14:58:04', 42, 54);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL,
  `remenber_token` varchar(255) DEFAULT NULL,
  `img_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telephone`, `address`, `dob`, `join_date`, `password`, `user_type`, `remenber_token`, `img_path`) VALUES
(54, 'sandakelum priyamantha', 'i.g.sandakelum@gmail.com', '+94769438974', '169,Ebbawala', '2000-01-15', '2021-08-19', '$2y$10$AI4UJ.FwGg3f6Cd97x5WDedAqPw32aPApizXw19GuT0Y2YBoWPvrO', 1, NULL, 'assets/img/profiles/i.g.sandakelum@gmail.com.jpeg'),
(55, 'R.G.Charindu Jayanath', 'charindubjayanath380@gmail.com', '0702636147', 'Ampara', '1999-07-02', '2021-08-19', '$2y$10$InzLIRp0wi8A3xhSm2oEp.kAij8UwP4viN1FR9QnilUsJswqNC2Pi', 1, NULL, 'assets/img/profiles/.jpeg'),
(56, 'Lahiru Shantha', 'lahirushantha00j24@gmail.com', '0769657224', '199,Manguldamana,Palatiyawa,Polonnaruwa', '2000-01-24', '2021-08-19', '$2y$10$c6071Kl4lf9khSC2qzsjxO.kcht1YW6Xb.ZzrvZCSi5aSZNbjxU0u', 1, NULL, 'assets/img/profiles/lahirushantha00j24@gmail.com.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

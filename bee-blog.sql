-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2022 lúc 05:03 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bee-blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Travel'),
(2, 'Music'),
(8, 'Food'),
(9, 'Wild Life');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `postID` int(11) NOT NULL,
  `podcastID` int(11) NOT NULL,
  `date` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `podcastID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `content`, `thumbnail`, `title`, `sub_title`, `categoryID`, `userID`) VALUES
(2, 'I love turkey. It happens to be one of my favorite meats, partially because it tastes so good but also because it just gives me those warm and cozy holiday feels. Mike and I actually eat turkey a lot, at all times of the year, because instant.\r\n\r\nA couple of years ago, we did a whole Instant Pot Thanksgiving, just to see if we could. Spoiler alert: we did it! Turkey, stuffing, mashed potatoes, sprouts, the Instant Pot did it all. The thing I was most impressed with was the turkey. It was juicy and incredibly fast. No basting, no guessing, just super simple juicy turkey.\r\nAbsolutely yes! We made a little skin-on boneless turkey breast roast rubbed with butter, garlic, thyme, rosemary, and sage. All the classic turkey flavors you know and love. And bonus, you’ll even get some drippings to make turkey gravy.', 'post-img.jpg', 'Instant Pot Turkey: Perfectly Cooked Turkey in 20 mins', 'Why hang out near the oven all day basting only to end up with a dry bird? Pressure cooking is the way to go: juicy, perfect turkey every time.', 8, 4),
(3, 'Lasagna soup is one pot weeknight meal that comes together super quickly with all the flavors of lasagna.\r\n\r\nIt’s perfect for fall because soup. It has all the usual suspects: lasagna noodles, tangy-sweet tomato sauce, ground meat, and cheese, of course. Basically it’s a lasagna that you can scoop up with a spoon. I actually love making lasagna but sometimes you just have to have lasagna in under 30 minutes. For those times, this one pot weeknight lasagna soup is there for you.\r\nAbsolutely. Just skip out on the meat. You can add some crumbled up firm tofu if you want extra protein. Swap the chicken stock for veggie stock. And for vegans, use vegan cheese or sprinkle on some nutritional yeast for a bit of cheesy jazz.', 'blog-img1.jpg', 'Lasagna Soup: The best weeknight meal 1', 'A simple dump and cook one pot stovetop weeknight lasagna.', 1, 4),
(10, 'Join a motorbike tour and hurtle through Hanoi’s Old Quarter back streets. Hanoi Backstreet Tours is a fantastic tour that uses vintage Minsk motorcycles for the journey. Enjoy the surroundings on the back of these motorcycles, while you ride over famous bridges and stop at authentic markets.\r\nThe well-informed guides, provide you with local knowledge and plenty of information about Hanoi and its history. The tour will also take you around the green region, which is a lovely contrast from the busy morning in the metropolis. The tour covers most of the city’s highlights and is easily one of the most fun things to do in Hanoi!', 'blog-img.jpg', '12 Things To Do in Hanoi, Vietnam', 'Welcome to Hanoi, where the street is king! Experience delicious street food on every corner, watch trains squeeze behind narrow houses, and traffic merge into each other from every possible direction. The energy and vibrancy of this addictive Vietnamese ', 1, 4),
(11, 'Tam Coc is a small town located in Ninh Binh Province. The name Tam Coc, literally translates as ‘three caves,’ referring to Hang Ca, Hang Hai, and Hang Ba. It is part of the wider UNESCO World Heritage site of Trang An Scenic Landscape Complex. Stunning rainforest-covered mountains, enormous valleys, waterways, and limestone cliffs are just a few of the incredible things that make this a UNESCO site.\r\nTam Coc is often compared to Halong Bay on land. Additionally, there is a unique union between nature and spirituality here seen in the birds skimming the water, against a backdrop of ancient mountain-top temples.', 'Tam-Coc-Ninh-Binh-vietnam-1440x1440.jpg', 'Best Things To Do in Ninh Binh & Tam Coc (Vietnam)', 'Discover the natural paradise of Tam Coc in Vietnam: a stunning stretch of flat landscape, with hundreds of limestone karsts towering above calm rice paddies. As a result, it’s no surprise that the area has been nicknamed the ‘Ha Long Bay on land’. Tam Co', 1, 4),
(12, 'Spend hours, wandering slowly through the streets and admiring the French & Asian style houses, shutters, and colors. The architecture provides a real nostalgic feeling and has been perfectly maintained, as a result of its UNESCO status.\r\nStop off at charming coffee shops, some of which have terraces that provide views over the archaic roofs and the river.\r\nDuring the night, lantern-lit streets give a charming and romantic feel.', 'best-things-to-do-hoi-an-night-market-1817x1440.jpg', '14 Things To Do in Hoi An, Vietnam', 'Hoi An: Vietnam’s most loved travel destination, and home to the charming lantern-lit streets of the old town, which lie nestled along the river bank. The Japanese, Chinese and French influences translate back into the street scene where traditional old w', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply`
--

CREATE TABLE `reply` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userrela`
--

CREATE TABLE `userrela` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `userName`, `password`, `avatar`, `is_admin`, `status`, `unique_id`) VALUES
(4, 'johncena@gmail.com', 'John', 'Cena', 'John Cena', '123', 'avatar.jpg', 0, '', 0),
(5, 'ronaldo@gmail.com', 'Cristiano', 'Cristiano', 'Cristiano Ronaldo', '123', 'Cristiano_Ronaldo_2018.jpg', 0, '', 0),
(6, 'messi@gmail.com', 'Lionel', 'Messi', 'Lionel Messi', '123', 'download.jpg', 0, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `podcastID` (`podcastID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `podcastID` (`podcastID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `reply`
--
ALTER TABLE `reply`
  ADD KEY `commentID` (`commentID`);

--
-- Chỉ mục cho bảng `userrela`
--
ALTER TABLE `userrela`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower` (`follower`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `userrela`
--
ALTER TABLE `userrela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`podcastID`) REFERENCES `podcast` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`podcastID`) REFERENCES `podcast` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `podcast`
--
ALTER TABLE `podcast`
  ADD CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `podcast_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`id`);

--
-- Các ràng buộc cho bảng `userrela`
--
ALTER TABLE `userrela`
  ADD CONSTRAINT `userrela_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

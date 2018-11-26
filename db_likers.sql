-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 26 nov. 2018 à 05:39
-- Version du serveur :  10.2.11-MariaDB-log
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `morahhib_likers`
--

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `is_all` int(1) NOT NULL DEFAULT 1,
  `seen` int(1) NOT NULL DEFAULT 0,
  `seen_all` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_state` int(11) NOT NULL,
  `id_service_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `initial_number` int(11) NOT NULL DEFAULT 0,
  `final_number` int(11) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `parameters`
--

CREATE TABLE `parameters` (
  `id` int(11) NOT NULL,
  `lowest_amount_charging` float NOT NULL,
  `free_amount` float NOT NULL,
  `when_charging` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parameters`
--

INSERT INTO `parameters` (`id`, `lowest_amount_charging`, `free_amount`, `when_charging`) VALUES
(1, 5, 10, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `paypals`
--

CREATE TABLE `paypals` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paypals`
--

INSERT INTO `paypals` (`id`, `user`, `signature`, `pass`) VALUES
(1, 'paypal@gmail.com', 'your paypal signature', 'your paypal api password');

-- --------------------------------------------------------

--
-- Structure de la table `recharges`
--

CREATE TABLE `recharges` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `way_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` int(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'supervisor'),
(3, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `lowest_quantity` int(11) NOT NULL,
  `largest_quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `lowest_quantity`, `largest_quantity`, `description`, `type_id`, `active`, `created`) VALUES
(20, 'متابعين أنستجرام أجانب فوري جودة عالية', 1.5, 20, 100000, 'يتم التنفيذ بشكل فوري, الاضافة سريعة جدا, الرجاء التأكد أن الحساب عام وليس خاص', 1, 1, '2016-02-11 20:20:18'),
(21, 'متابعين أنستجرام أجانب جودة عالية', 1.4, 100, 1000000, 'الرجاء التأكد أن الحساب عام وليس خاص, أرسل رابط الحساب', 1, 1, '2016-02-11 20:22:35'),
(22, 'متابعين انستجرام عرب خليجي جودة عالية', 5, 100, 300000, 'الرجاء التأكد أن الحساب عام وليس خاص', 1, 1, '2016-02-11 20:26:42'),
(23, 'متابعين انستجرام عرب خليجي \'حقيقي\'', 10, 100, 30000, 'المتابعين حقيقيين 100% الرجاء التأكد أن الحساب عام وليس خاص', 1, 1, '2016-02-11 20:28:28'),
(24, 'متابعين أنستجرام أجانب \'حقيقي\'', 5, 100, 25500, 'المتابعين حقيقيين 100% الرجاء التأكد أن الحساب عام وليس خاص', 1, 1, '2016-02-11 20:38:50'),
(25, 'متابعين أنستجرام سعوديين', 5, 50, 1250, 'الرجاء التأكد أن الحساب عام وليس خاص', 1, 1, '2016-02-11 20:39:52'),
(26, 'لايكات أنستجرام أجانب فوري جودة عالية', 1.2, 20, 60000, 'اللايكات فورية ضع رابط الصورة .', 1, 1, '2016-02-11 20:49:43'),
(27, 'لايكات أنستجرام عرب خليجي جودة عالية', 2, 100, 25000, 'ضع رابط الصورة', 1, 1, '2016-02-11 20:55:28'),
(28, 'لايكات أنستجرام عرب خليجي \'حقيقي\'', 10, 250, 30000, 'اللايكات حقيقيين 100% ضع رابط الصورة', 1, 1, '2016-02-11 20:56:49'),
(29, 'لايكات إنستقرام أجانب على الصور الحالية', 1.8, 1000, 100000, 'نقوم بتوزيع اللايكات على الصور الحالية في حسابك إبتداءا من أخر صورة الى ما قبلها حسب العدد المطلوب مقارنة بعدد صورك, أرسل رابط الحساب على الشكل التالي http://instagram.com/username/100 , مع تبديل الرقم 100 الى العدد الذي تريد من اللايكات لكل صورة', 1, 1, '2016-02-11 21:02:39'),
(30, 'لايكات إنستقرام عرب خليجي على الصور الحالية', 2.5, 1000, 100000, 'نقوم بتوزيع اللايكات على الصور الحالية في حسابك إبتداءا من أخر صورة الى ما قبلها حسب العدد المطلوب مقارنة بعدد صورك, أرسل رابط الحساب على الشكل التالي http://instagram.com/username/100 , مع تبديل الرقم 100 الى العدد الذي تريد من اللايكات لكل صورة', 1, 1, '2016-02-11 21:03:26'),
(31, 'أنستجرام أوتو لايك أجانب', 2.5, 1000, 100000, 'الخدمة للصور المستقبلية المحددة فقط حسب الكمية المطلوبة، الرجاء التأكد أن الحساب عام وليس خاص, أرسل رابط الحساب على الشكل التالي http://instagram.com/username/100 , مع تبديل الرقم 100 إلى الرقم الذي تريد عليه اللايكات لكل صورة, أرسل رابط الحساب.', 1, 1, '2016-02-11 21:11:53'),
(32, 'أنستجرام أوتو لايك عرب خليجي', 4, 1000, 100000, 'الخدمة للصور المستقبلية المحددة فقط حسب الكمية المطلوبة، الرجاء التأكد أن الحساب عام وليس خاص, أرسل رابط الحساب على الشكل التالي http://instagram.com/username/100 , مع تبديل الرقم 100 إلى الرقم الذي تريد عليه اللايكات لكل صورة, أرسل رابط الحساب.', 1, 1, '2016-02-11 21:12:29'),
(33, 'فيد لايك', 50, 1000, 1000, 'نقوم بإدارة حسابك لمدة شهر وعمل متابعة للحسابات النشيطة وعمل لايكات على صورهم حتى يقوموا بعمل لايكات على صورك، ستحصل على لايكات حقيقية وتعليقات ومتابعين يقوموا بمتابعتك بنفسهم، يجب إرسال أسم حسابك وكلمة المرور في تذكره. ', 1, 1, '2016-02-11 21:14:15'),
(34, 'متابعين تويتر أجانب جودة عالية', 0.45, 100, 1000000, 'ارسل رابط الحساب', 2, 1, '2016-02-11 21:25:35'),
(35, 'متابعين تويتر عرب خليجي جودة عالية', 1, 100, 200000, 'أرسل رابط الحساب', 2, 1, '2016-02-11 21:27:23'),
(36, 'تويتر ريتويت أجانب جودة عالية', 0.8, 20, 1000000, 'أرسل رابط التغريدة', 2, 1, '2016-02-11 21:29:27'),
(37, 'تويتر مفضلة أجانب جودة عالية', 0.8, 20, 1000000, 'أرسل رابط التغريدة', 2, 1, '2016-02-11 21:30:03'),
(38, 'تويتر ريتويت عرب خليجي جودة عالية', 2.5, 50, 1000000, 'أرسل رابط التغريدة', 2, 1, '2016-02-11 21:31:58'),
(39, 'تويتر مفضلة عرب خليجي جودة عالية', 2.5, 50, 100000, 'أرسل رابط التغريدة', 2, 1, '2016-02-11 21:32:57'),
(40, 'مشتركين فايسبوك للجروبات \'حقيقيين\'', 1, 100, 9400, 'ضع رابط الجروب', 3, 1, '2016-02-11 21:45:40'),
(41, 'لايكات فايسبوك للمنشورات/الصور \'حقيقيين\'', 1, 100, 9400, 'أرسل رابط الصورة أو المنشور', 3, 1, '2016-02-11 21:47:30'),
(42, 'لايكات فايسبوك للصفحات عربية حقيقية 100% مع ضمان مدى الحياة', 6, 250, 1000000, 'أرسل رابط الصفحة', 3, 1, '2016-02-11 21:48:09'),
(43, 'مشاهدات فايسبوك للفيديوهات فورية', 1, 10000, 1000000, 'أرسل رابط الفيديو', 3, 1, '2016-02-11 21:50:16'),
(44, 'مشاهدات يوتيوب جودة عالية', 0.85, 1000, 1000000, 'أرسل رابط الفيديو', 4, 1, '2016-02-11 21:55:32'),
(45, 'لايكات يوتيوب \'حقيقية\'', 15, 100, 20000, 'أرسل رابط الفيديو', 4, 1, '2016-02-11 21:56:30'),
(46, 'ديس لايك يوتيوب \'حقيقية\'', 15, 100, 20000, 'أرسل رابط الفيديو', 4, 1, '2016-02-11 21:57:01'),
(47, 'مشتركين يوتيوب \'حقيقيين\'', 15, 100, 10000, 'أرسل رابط القناة', 4, 1, '2016-02-11 21:57:49'),
(48, 'زوار من جوجل', 0.3, 1000, 1000000, 'يرجى إرسال رابط الموقع مختصراً من goo.gl', 8, 1, '2016-02-11 22:02:17'),
(49, 'زوار من تويتر', 0.3, 1000, 1000000, 'يرجى إرسال رابط الموقع مختصراً من goo.gl', 8, 1, '2016-02-11 22:02:53'),
(50, 'زوار من اليوتيوب', 1.3, 1000, 1000000, 'يرجى إرسال رابط الموقع مختصراً من goo.gl', 8, 1, '2016-02-11 22:03:12'),
(51, 'زوار من الفايسبوك', 0.3, 1000, 1000000, 'يرجى إرسال رابط الموقع مختصراً من goo.gl', 8, 1, '2016-02-11 22:03:36'),
(52, 'متابعين سناب شات عرب خليجي', 55, 100, 50000, 'أرسل رابط الحساب', 10, 1, '2016-02-11 22:05:49'),
(53, 'متابعين سناب شات أجانب', 45, 100, 50000, 'أرسل رابط الحساب', 10, 1, '2016-02-11 22:06:53'),
(54, 'حسابات تويتر مفعلة بالايميل مع ايميلاتها', 50, 1000, 20000, 'يتم تقديم الحسابات لك خلال 24 ساعة من الطلب, الحسابات مفعلة من الايميل', 11, 1, '2016-02-11 22:11:49'),
(55, 'حسابات فايسبوك مفعلة بالايميل مع ايميلاتها', 100, 1000, 20000, 'يتم تقديم الحسابات لك خلال 24 ساعة من الطلب, الحسابات مفعلة من الايميل', 11, 1, '2016-02-11 22:13:43'),
(56, 'إيميلات هوتمايل', 20, 1000, 50000, 'يتم تقديم الإيميلات لك خلال 24 ساعة من الطلب, ', 11, 1, '2016-02-11 22:15:37'),
(57, 'إيميلات ياهو', 50, 1000, 100000, 'يتم تقديم الإيميلات لك خلال 24 ساعة من الطلب,', 11, 1, '2016-02-11 22:16:22'),
(58, 'إيميلات جمايل مفعلة بالهاتف', 300, 1000, 20000, 'يتم تقديم الإيميلات لك مع هواتفها خلال 24 ساعة من الطلب, الإيميلات مفعلة من الهاتف', 11, 1, '2016-02-11 22:17:47'),
(59, 'حسابات سناب شات مفعلة من الهاتف \'السعر للحساب الواحد\'', 2.5, 1000, 200000, 'الحساب مفعل من الهاتف منشئ عن طريق الأندرويد , كل 1000 في الكمية تعني حساب واحد , 2000 تعني 2 حسابات , 10000 في الكمية تعني 10 حسابات و هكذا ', 11, 1, '2016-02-11 22:21:09'),
(60, 'حساب بايبال مفعل تفعيل كامل', 15, 1000, 1000, 'أرسل معلوماتك لانشاء الحساب في تذكرة', 11, 1, '2016-02-11 22:21:58'),
(61, 'حساب أدسنس عادي بمعلوماتك', 10, 1000, 1000, 'أرسل معلوماتك لانشاء الحساب في تذكرة', 11, 1, '2016-02-11 22:22:42'),
(62, 'حساب أدسنس عادي أمريكي بمعلوماتك', 20, 1000, 1000, 'للحصول على طريقة الحصول على عنوان امريكي لتفعيل الحساب بالبين كود + طريقة حل مشكلة المعلومات الضريبية بنفسك قم بفتح تذكرة', 11, 1, '2016-02-11 22:24:38'),
(63, 'زوار من الدول العربية', 1.2, 1000, 3000000, 'الزوار من جميع الدول العربية ضع رابط الموقع مختصرا من goo.gl', 8, 1, '2016-02-14 16:26:43'),
(64, 'زوار من دول الخليج العربي', 2, 1000, 3000000, 'الزوار من دول الخليج العربي فقط ضع رابط الموقع مختصرا من goo.gl', 8, 1, '2016-02-14 16:28:02'),
(65, 'زوار عرب مع تحديد الدولة', 3, 1000, 3000000, 'ضع اسم الدول متبوعا برابط الموقع مختصرا من goo.gl على الشكل التالي الدولة:goo.gl/7Oxk6o (الدول المتوفرة حاليا السعودية المغرب مصر قطر البحرين الكويت الأردن الإمارات لبنان تونس الجزائر عمان)', 8, 1, '2016-02-14 16:31:30'),
(66, '10k - instagram', 0.5, 100, 1000, '   ', 1, 1, '2018-09-08 18:56:53');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'في الإنتظار'),
(2, 'مكتمل'),
(3, 'مكتمل جزئيا'),
(4, 'ملغي'),
(5, 'جاري تنفيدها'),
(6, 'رابط خطأ'),
(7, 'في التعويض'),
(8, 'في المراجعة'),
(9, 'الحساب خاص');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'في الانتظار'),
(2, 'تم الرد'),
(3, 'جاري مراجعتها'),
(4, 'مغلقة');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `statu_id` int(11) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0,
  `seenU` int(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `url_icon` varchar(255) NOT NULL DEFAULT 'default.png',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `active`, `url_icon`, `created`) VALUES
(1, 'أنستجرام ', 1, 'default.png', '2015-08-31 11:00:00'),
(2, 'التويتر', 1, 'twitter.png', '2016-02-10 00:00:00'),
(3, 'الفيسبوك', 1, 'facebook.png', '2016-02-12 00:00:00'),
(4, 'اليوتيوب', 1, 'youtube.png', '2016-02-04 00:00:00'),
(8, 'زوار', 1, 'z.png', '2016-02-11 19:53:46'),
(10, 'سناب شات', 1, 's.png', '2016-02-11 20:12:44'),
(11, 'حسابات', 1, '7.png', '2016-02-24 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_paypal` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `capital` float NOT NULL,
  `reduction` float NOT NULL,
  `last_connection` timestamp NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `mail_paypal`, `pass`, `Pseudo`, `country`, `tel`, `capital`, `reduction`, `last_connection`, `active`, `role_id`, `created`, `modified`) VALUES
(1, 'admin@admin.com', '', '91bb83da18e7d77f962963ad0659f10bf0222201', 'Admin', 'maroc ', '', 0, 0, '2018-11-26 15:31:33', 1, 1, '2015-08-08 00:51:24', '2015-08-24 17:49:08'),
(2, 'user@user.com', '', '91bb83da18e7d77f962963ad0659f10bf0222201', 'User', 'maroc', '06000000', 0, 0, '2018-11-26 15:26:19', 1, 3, '2015-12-10 21:27:12', '2015-12-10 21:27:12');

-- --------------------------------------------------------

--
-- Structure de la table `ways`
--

CREATE TABLE `ways` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ways`
--

INSERT INTO `ways` (`id`, `name`) VALUES
(1, 'الادارة'),
(2, 'الكاشيو'),
(3, 'بايبال'),
(4, 'كوبون'),
(5, 'ون كارد');

-- --------------------------------------------------------

--
-- Structure de la table `writings`
--

CREATE TABLE `writings` (
  `id` int(11) NOT NULL,
  `contents` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_tecket` (`ticket_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_services` (`id_service_order`),
  ADD KEY `fk_orders_states` (`id_state`),
  ADD KEY `fk_orders_users` (`id_user`);

--
-- Index pour la table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paypals`
--
ALTER TABLE `paypals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recharges`
--
ALTER TABLE `recharges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recharges_user` (`user_id`),
  ADD KEY `fk_way_recharges` (`way_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_services_types` (`type_id`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tickets_user` (`user_id`),
  ADD KEY `fk_tickets_statu` (`statu_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- Index pour la table `ways`
--
ALTER TABLE `ways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `writings`
--
ALTER TABLE `writings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recharges`
--
ALTER TABLE `recharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT pour la table `ways`
--
ALTER TABLE `ways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `writings`
--
ALTER TABLE `writings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_tecket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_services` FOREIGN KEY (`id_service_order`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `fk_orders_states` FOREIGN KEY (`id_state`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recharges`
--
ALTER TABLE `recharges`
  ADD CONSTRAINT `fk_recharges_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_way_recharges` FOREIGN KEY (`way_id`) REFERENCES `ways` (`id`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_types` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_statu` FOREIGN KEY (`statu_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_tickets_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

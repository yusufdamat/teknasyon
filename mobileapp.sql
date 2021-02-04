-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Şub 2021, 15:05:19
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mobileapp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `appID` varchar(50) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `operating-system` varchar(255) DEFAULT NULL,
  `client_token` varchar(255) DEFAULT NULL,
  `insertDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `devices`
--

INSERT INTO `devices` (`id`, `userID`, `uid`, `appID`, `language`, `operating-system`, `client_token`, `insertDate`) VALUES
(1, 1, '87051424-27225-19535-41340-575792165927863', 'c28525017-7816-18602-35624-19979569451569', 'TR', 'Windows Phone', 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki', '2021-02-01 03:38:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `subscriptionStartDate` datetime DEFAULT NULL,
  `subscriptionEndDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `subscriptionCancel` int(11) DEFAULT NULL,
  `appID` varbinary(50) DEFAULT NULL,
  `deviceID` int(11) DEFAULT NULL,
  `appIdCancel` int(11) DEFAULT NULL,
  `deviceidCancel` int(11) DEFAULT NULL,
  `receiptCode` varchar(100) DEFAULT NULL,
  `insertDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `subscription`
--

INSERT INTO `subscription` (`id`, `userID`, `subscriptionStartDate`, `subscriptionEndDate`, `status`, `subscriptionCancel`, `appID`, `deviceID`, `appIdCancel`, `deviceidCancel`, `receiptCode`, `insertDate`) VALUES
(1, 1, '2021-02-01 06:42:11', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '21393921-2534-16616-39938-509673810154768', NULL),
(2, 1, '2021-02-01 06:42:12', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '234e39321-45002-17742-40976-383324165365353', NULL),
(3, 1, '2021-02-01 06:42:40', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, 'd9c325441-53365-17617-48868-29765247993222', NULL),
(4, 1, '2021-02-01 06:42:40', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '0c2231313-14231-19701-35496-30377411415427', NULL),
(5, 1, '2021-02-01 06:42:41', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '896462018-40334-18298-40062-458622150462566', NULL),
(6, 1, '2021-02-01 06:45:47', '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, 'b3a920804-32871-16878-38686-177463132435088', NULL),
(7, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(8, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(9, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(10, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(11, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(12, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(13, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(14, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(15, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(16, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(17, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(18, 1, NULL, '2021-07-01 06:49:54', 1, 1, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, NULL, NULL),
(19, 1, '2021-02-01 06:49:54', '2021-07-01 06:49:54', 1, NULL, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '29e714254-44623-19239-34485-62602242895930', NULL),
(20, 1, '2021-02-01 06:49:56', '2021-07-01 06:49:54', 1, NULL, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '0c5c55704-12301-19175-41836-302894327010852', NULL),
(21, 1, '2021-02-01 06:49:57', '2021-07-01 06:49:54', 1, NULL, 0x6332383532353031372d373831362d31383630322d33353632342d3139393739353639343531353639, 1, NULL, NULL, '607b63521-57581-19219-37294-227131433453270', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userlogs`
--

CREATE TABLE `userlogs` (
  `logID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `logText` text DEFAULT NULL,
  `insertDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `userlogs`
--

INSERT INTO `userlogs` (`logID`, `userID`, `logText`, `insertDate`) VALUES
(1, 1, 'Yeni Bir Kullanıcı Eklendi', '2021-02-01 06:34:50'),
(2, 1, 'yusuf Kullanıcı Adı Tekrarlı Kayıt Denemesi', '2021-02-01 06:35:08'),
(3, 1, 'yusuf Kullanıcı Adı Tekrarlı Kayıt Denemesi', '2021-02-01 06:35:12'),
(4, 1, '894343407-50567-19286-36387-397604898643896 Id\'li Yeni Cihaz Eklendi', '2021-02-01 06:36:25'),
(5, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:43'),
(6, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:44'),
(7, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:44'),
(8, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:44'),
(9, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:44'),
(10, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:45'),
(11, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:45'),
(12, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:45'),
(13, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:36:45'),
(14, 1, 'UI15iYVRoGHtLW6yQx83TObnAs2CmDFpPZcduEJhal9Nrgwqefk4z7XvMKSBj0 ID Devices İle Giriş Yapıldı', '2021-02-01 06:37:14'),
(15, 1, '327238025-9079-19983-34388-579202639553683 Id\'li Yeni Cihaz Eklendi', '2021-02-01 06:37:39'),
(16, 1, 'uZdlReKQYso93bXCwtT5hPxGqO6a7Hf2Fr0EjpVncIzBkWD8AiUgMNJ1mySvL4 ID Devices İle Giriş Yapıldı', '2021-02-01 06:37:42'),
(17, 1, 'c28525017-7816-18602-35624-19979569451569 Id\'li Yeni Cihaz Eklendi', '2021-02-01 06:38:26'),
(18, 1, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki ID Devices İle Giriş Yapıldı', '2021-02-01 06:38:28'),
(19, 1, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki ID Devices İle Giriş Yapıldı', '2021-02-01 06:38:29'),
(20, 1, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki ID Devices İle Giriş Yapıldı', '2021-02-01 06:38:29'),
(21, 1, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki ID Devices İle Giriş Yapıldı', '2021-02-01 06:38:29'),
(22, 0, 'IYRB0OuMkpoADsrfQWZJvGelV6wcHz281qxhbCanPLK4gtjFXEm95SdT37NiyU Geçersiz Token', '2021-02-01 06:38:47'),
(23, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:23'),
(24, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:23'),
(25, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:24'),
(26, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:24'),
(27, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:24'),
(28, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:25'),
(29, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:25'),
(30, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:25'),
(31, 0, 'Up4EV5xrmJXsABWu7PqGld20gKw1DRIMoyF6ZNnbtOQCHTjac9z8eL3hSYvfki1 Geçersiz Token', '2021-02-01 06:40:25'),
(32, 1, 'Abonelik Başlatıldı', '2021-02-01 06:42:40'),
(33, 1, 'Abonelik Başlatıldı', '2021-02-01 06:42:40'),
(34, 1, 'Abonelik Başlatıldı', '2021-02-01 06:42:41'),
(35, 1, 'Abonelik Başlatıldı', '2021-02-01 06:45:47'),
(36, 0, 'IYRB0OuMkpoADsrfQWZJvGelV6wcHz281qxhbCanPLK4gtjFXEm95SdT37NiyU Geçersiz Token', '2021-02-01 06:45:54'),
(37, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:46:28'),
(38, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:47:11'),
(39, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:48:35'),
(40, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:48:36'),
(41, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:48:53'),
(42, 1, 'Abonelik İptal Edilirken Hata Oluştu', '2021-02-01 06:48:53'),
(43, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:21'),
(44, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:21'),
(45, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:22'),
(46, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:22'),
(47, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:22'),
(48, 1, 'Abonelik İptal Edildi', '2021-02-01 06:49:22'),
(49, 0, ' Geçersiz Token', '2021-02-01 06:49:31'),
(50, 1, 'Aktif Aboneliğiniz Bulunmamaktadır', '2021-02-01 06:49:45'),
(51, 1, 'Aktif Aboneliğiniz Bulunmamaktadır', '2021-02-01 06:49:46'),
(52, 1, 'Aktif Aboneliğiniz Bulunmamaktadır', '2021-02-01 06:49:47'),
(53, 1, 'Aktif Aboneliğiniz Bulunmamaktadır', '2021-02-01 06:49:47'),
(54, 1, 'Aktif Aboneliğiniz Bulunmamaktadır', '2021-02-01 06:49:47'),
(55, 1, 'Abonelik Başlatıldı', '2021-02-01 06:49:54'),
(56, 1, 'Abonelik Başlatıldı', '2021-02-01 06:49:56'),
(57, 1, 'Abonelik Başlatıldı', '2021-02-01 06:49:57'),
(58, 1, 'Aboneliğiniz Uzaltıldı', '2021-02-01 06:50:19'),
(59, 1, 'Aboneliğiniz Uzaltıldı', '2021-02-01 06:50:20'),
(60, 1, 'Aboneliğiniz Uzaltıldı', '2021-02-01 06:50:20'),
(61, 1, 'Aboneliğiniz Uzaltıldı', '2021-02-01 06:50:21'),
(62, 0, ' Geçersiz Token', '2021-02-01 06:50:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `insertDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `status`, `insertDate`) VALUES
(1, 'yusuf', 'yusuf', 1, '2021-02-01 06:34:50');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`logID`) USING BTREE;

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

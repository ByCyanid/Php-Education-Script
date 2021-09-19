-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 14 Eyl 2021, 22:05:32
-- Sunucu sürümü: 10.3.29-MariaDB
-- PHP Sürümü: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknorol_egitim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminp`
--

CREATE TABLE `adminp` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `adminp`
--

INSERT INTO `adminp` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `data_users`
--

CREATE TABLE `data_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `adsoyad` text CHARACTER SET utf8 NOT NULL,
  `telefon` text NOT NULL,
  `email` text NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `data_users`
--

INSERT INTO `data_users` (`id`, `username`, `password`, `adsoyad`, `telefon`, `email`, `durum`) VALUES
(1, 'efeeo', 'efeeo123', 'Efe', '05468502557', 'efeeoffical@gmail.com', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitimler`
--

CREATE TABLE `egitimler` (
  `id` int(11) NOT NULL,
  `egitimbaslik` varchar(9999) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `egitimaciklama` varchar(9999) CHARACTER SET utf8 NOT NULL,
  `egitimvideo` text NOT NULL,
  `egitimlink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `egitimler`
--

INSERT INTO `egitimler` (`id`, `egitimbaslik`, `egitimaciklama`, `egitimvideo`, `egitimlink`) VALUES
(1, 'Deneme ', '<p>efeefefefe</p>\r\n', '20170406062522.jpg', 'deneme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_data`
--

CREATE TABLE `site_data` (
  `id` int(11) NOT NULL,
  `site_name` text CHARACTER SET utf8 NOT NULL,
  `site_aciklama` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `site_data`
--

INSERT INTO `site_data` (`id`, `site_name`, `site_aciklama`) VALUES
(1, 'TeknoRol Eğitim', 'Teknolojide Rolünüz Olsun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `soru` varchar(9999) CHARACTER SET utf8 NOT NULL,
  `cevap` varchar(9999) CHARACTER SET utf8 DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminp`
--
ALTER TABLE `adminp`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `egitimler`
--
ALTER TABLE `egitimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_data`
--
ALTER TABLE `site_data`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminp`
--
ALTER TABLE `adminp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `egitimler`
--
ALTER TABLE `egitimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `site_data`
--
ALTER TABLE `site_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

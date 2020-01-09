SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

DROP DATABASE IF EXISTS `subscriptionGenerator`;

CREATE DATABASE `subscriptionGenerator`;

USE `subscriptionGenerator`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ad` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO 'funcionario' ('nome', 'setor', 'user', 'pass', 'ad') VALUES ('admin', 'admin', 'admin', MD5('admin'), '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO 'modelo' ('nome', 'url') VALUES ('padrao', 'modelo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura`
--

CREATE TABLE IF NOT EXISTS `assinatura` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `modeloid` int(11) NOT NULL,
  `funcionarioid` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

ALTER TABLE `assinatura`
  ADD KEY (`modeloid`),
  ADD KEY (`funcionarioid`);

-- --------------------------------------------------------

ALTER TABLE `assinatura`
  ADD CONSTRAINT `FK_modeloid` FOREIGN KEY (`modeloid`) REFERENCES `modelo` (`id`),
  ADD CONSTRAINT `FK_funcionarioid` FOREIGN KEY (`funcionarioid`) REFERENCES `funcionario` (`id`);
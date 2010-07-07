-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-07-2010 a las 19:23:29
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `astralocean`
--
CREATE DATABASE `astralocean` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `astralocean`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('031fdc5c4c7ed0c543f65d4df9991a60', '192.168.0.2', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1278523235, 'a:11:{s:7:"user_id";s:1:"1";s:8:"username";s:5:"admin";s:15:"commerdiv_email";s:21:"sales@astralocean.net";s:17:"commerdivar_phone";s:47:"+54 9 223 4172599\n+54 9 261 6681990\n54*149*5104";s:17:"commerdives_phone";s:15:"+34 672 148 684";s:14:"prodplan_phone";s:29:"+54 9 223 4001696\n54*175*7041";s:14:"prodplan_email";s:20:"info@astralocean.net";s:5:"skype";s:11:"astralocean";s:10:"date_added";s:19:"2010-06-15 00:00:00";s:13:"last_modified";s:19:"2010-07-06 13:38:00";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `pages`
--

INSERT INTO `pages` (`pages_id`, `pagename`, `content`, `last_modified`) VALUES
(1, 'ourcompany', '<p>Formally created in 2007, the predecessors of Astral Ocean have a vast experience in the fish industry field.</p>\n<p>Headquartered based in the city of Mar del Plata, with subsidiary offices in US and Spain, Astral Ocean is a primary producer of various species of fish found along the South Atlantic Coast of Argentina. Our commitment to quality allows us to service our worldwide customers with the finest fresh and frozen seafood available here in Argentina.</p>\n<p>In addition to the many products we directly process, Astral Ocean Corp. imports and trades various other types of seafood products from around the world. Our sales and marketing network allows us to offer our customers a wide variety of the finest seafood products from around the world.</p>', '2010-07-07 13:21:23'),
(2, 'facilities', '<p>Using state-of-the-art industry technology for catching and processing, we export worldwide superb quality frozen fish products every year.</p>', '2010-07-07 13:21:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_thumb` varchar(255) NOT NULL,
  `content_about` text NOT NULL,
  `content_productcharacteristics` text NOT NULL,
  `content_freezingmethods` text NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `productname`, `image`, `image_thumb`, `content_about`, `content_productcharacteristics`, `content_freezingmethods`, `order`, `date_added`, `last_modified`) VALUES
(18, 'producto1', '12768127774c1a9de939507__39819_9595138889.jpg', '12768127774c1a9de939507__39819_9595138889_thumb.jpg', '<p>dfgdfgdfgs sdfg</p>\n<p>sdfgsdfg</p>', '', '', 3, '2010-06-17 19:12:57', '2010-06-29 09:34:21'),
(19, 'producto4', '12768128474c1a9e2f2464d__huevas_carpa_002.jpg', '12768128474c1a9e2f2464d__huevas_carpa_002_thumb.jpg', '<p>dfgdfgdfgs sdfg</p>\n<p>sdfgsdfg</p>', '', '', 2, '2010-06-17 19:14:07', '2010-06-29 09:34:12'),
(20, 'producto2', '12772103434c20aee794e02__carga-pelada-don_jose_021.jpg', '12772103434c20aee794e02__carga-pelada-don_jose_021_thumb.jpg', '<p>dfgdfgdfgs sdfg</p>\n<p>sdfgsdfg</p>', '', '', 4, '2010-06-22 09:39:03', '2010-06-29 09:34:29'),
(21, 'producto3', '12772103574c20aef596c29__carga-pelada-don_jose_078.jpg', '12772103574c20aef596c29__carga-pelada-don_jose_078_thumb.jpg', '<!-- 		@page { margin: 2cm } 		P { margin-bottom: 0.21cm } -->\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;"><strong>CATCHING METHOD</strong></span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">Trawl.</span></p>\n<p style="margin-bottom: 0cm;">&nbsp;<span style="font-family: Arial,sans-serif;"><strong>PROCESS/PLANT</strong></span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">Number 428, Number 4464, Number 2266</span></p>\n<p style="margin-bottom: 0cm;">&nbsp;<span style="font-family: Arial,sans-serif;"><strong>ABOUT</strong></span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Scientific Name: &ldquo;Merluccius Hubbsi&rdquo;</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Catch Area: FAO 41</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Season: Probably one of the most demanded species from Argentina. Hake, the flagship specie from the South Atlantic Coast is caught all year long. Processed in Mar del Plata and the very South of Argentina as well.</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Presentation: Whole Round/ H+G/ HGT/ Fillet Skin-less/ Fillet Skin-on/ Breaded Fillets/ Disc/ Sausage</span></p>', '<!-- 		@page { margin: 2cm } 		P { margin-bottom: 0.21cm } 		STRONG.ctl { font-weight: normal } -->\n<p style="margin-bottom: 0cm;"><strong class="western"><span style="font-family: Arial,sans-serif;">GRADINGS: </span></strong></p>\n<p style="margin-bottom: 0cm;"><strong class="western"><span style="font-family: Arial,sans-serif;">Whole Round/</span></strong><span style="font-family: Arial,sans-serif;"><strong><br /></strong></span><span style="font-family: Arial,sans-serif;">400 gm-up/ 200-400 gm</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;"><strong>HGT</strong></span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">1200 gm-up/800-1200 gm/500-800 gm/300-500 gm/100-300 gm/ 80-200 gm</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;"><strong>Fillets/</strong></span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">200 gm-Up/ 120-200 gm/ 60-120 gm / 60 gm-up (60-200 gm)</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;"><br /></span><strong class="western"><span style="font-family: Arial,sans-serif;">PACKING STYLES:</span></strong><span style="font-family: Arial,sans-serif;"><strong><br /></strong></span><span style="font-family: Arial,sans-serif;">Block, Interleaved, Interlaminated, IWP<br /><br /></span><strong class="western"><span style="font-family: Arial,sans-serif;">CARTON-SIZE:</span></strong><span style="font-family: Arial,sans-serif;"> </span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">20 kgs </span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">(Picture)</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">21 kgs (3x7kg)</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">(Picture)</span></p>', '<!-- 		@page { margin: 2cm } 		P { margin-bottom: 0.21cm } -->\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Blast Frozen as Whole Round</span></p>\n<p style="margin-bottom: 0cm;"><span style="font-family: Arial,sans-serif;">-Interleaved Fillet </span></p>', 1, '2010-06-22 09:39:17', '2010-07-05 12:02:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `commerdiv_email` varchar(100) NOT NULL,
  `commerdivar_phone` varchar(100) NOT NULL,
  `commerdives_phone` varchar(100) NOT NULL,
  `prodplan_phone` varchar(100) NOT NULL,
  `prodplan_email` varchar(100) NOT NULL,
  `skype` char(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `commerdiv_email`, `commerdivar_phone`, `commerdives_phone`, `prodplan_phone`, `prodplan_email`, `skype`, `date_added`, `last_modified`) VALUES
(1, 'admin', 'mhO9lxdHdHzm+1qMYHDX0STRDpTcyW/p7NA=', 'sales@astralocean.net', '+54 9 223 4172599\n+54 9 261 6681990\n54*149*5104', '+34 672 148 684', '+54 9 223 4001696\n54*175*7041', 'info@astralocean.net', 'astralocean', '2010-06-15 00:00:00', '2010-07-06 13:38:00');

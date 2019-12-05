-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Wrz 2019, 23:51
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `phpshopppingcart_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_admins`
--

CREATE TABLE `sc_admins` (
  `adminID` bigint(20) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUsername` varchar(30) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `adminPasswordRecovery` varchar(32) DEFAULT NULL,
  `adminSecurityCode` varchar(6) DEFAULT NULL,
  `adminSecurityEnable` enum('0','1') NOT NULL DEFAULT '0',
  `adminPower` enum('admin','moderator','editor','visitor') NOT NULL DEFAULT 'visitor',
  `adminStatus` enum('0','1') NOT NULL DEFAULT '1',
  `adminPrimary` enum('0','1') NOT NULL DEFAULT '0',
  `adminLoginIP` varchar(255) DEFAULT NULL,
  `adminLoginDate` datetime DEFAULT NULL,
  `adminAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_coupons`
--

CREATE TABLE `sc_coupons` (
  `couponID` bigint(20) NOT NULL,
  `couponCode` varchar(50) NOT NULL,
  `couponType` enum('amount','percentage') NOT NULL,
  `couponDiscount` varchar(16) NOT NULL,
  `couponTime` bigint(20) DEFAULT NULL,
  `couponUsed` bigint(20) NOT NULL DEFAULT 0,
  `couponStatus` enum('0','1') NOT NULL DEFAULT '1',
  `couponExpire` date DEFAULT NULL,
  `couponUpdate` datetime DEFAULT NULL,
  `couponDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_media`
--

CREATE TABLE `sc_media` (
  `mediaID` bigint(20) NOT NULL,
  `mediaTitle` varchar(100) DEFAULT NULL,
  `mediaName` varchar(535) NOT NULL,
  `mediaType` varchar(30) NOT NULL,
  `mediaSize` bigint(20) NOT NULL,
  `mediaPath` varchar(500) NOT NULL,
  `mediaUploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_members`
--

CREATE TABLE `sc_members` (
  `memberID` bigint(20) NOT NULL,
  `memberFirstName` varchar(50) DEFAULT NULL,
  `memberLastName` varchar(50) DEFAULT NULL,
  `memberEmail` varchar(255) NOT NULL,
  `memberPassword` varchar(32) NOT NULL,
  `memberPasswordRecovery` varchar(32) DEFAULT NULL,
  `memberPhone` varchar(30) DEFAULT NULL,
  `memberCountry` varchar(50) DEFAULT NULL,
  `memberState` varchar(50) DEFAULT NULL,
  `memberCity` varchar(50) DEFAULT NULL,
  `memberAddress` varchar(100) DEFAULT NULL,
  `memberZIP` varchar(30) NOT NULL,
  `memberWishList` text DEFAULT NULL,
  `memberStatus` enum('good','trash','banned','frozen') NOT NULL DEFAULT 'good',
  `memberActivated` enum('0','1') NOT NULL DEFAULT '0',
  `memberUpdated` datetime DEFAULT NULL,
  `memberLoginIP` varchar(255) DEFAULT NULL,
  `memberLoginDate` datetime DEFAULT NULL,
  `memberSignUpIP` varchar(255) DEFAULT NULL,
  `memberSignUpDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_menus`
--

CREATE TABLE `sc_menus` (
  `menuID` bigint(20) NOT NULL,
  `menuName` varchar(50) NOT NULL,
  `menuStatus` enum('available','draft','trash') NOT NULL DEFAULT 'available',
  `menuUpdate` datetime DEFAULT NULL,
  `menuDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_menus_links`
--

CREATE TABLE `sc_menus_links` (
  `linkID` bigint(20) NOT NULL,
  `menuID` bigint(20) NOT NULL,
  `linkParrentID` bigint(20) DEFAULT NULL,
  `linkOrder` int(2) DEFAULT NULL,
  `linkIcon` varchar(100) DEFAULT NULL,
  `linkTitle` varchar(100) DEFAULT NULL,
  `linkText` varchar(100) NOT NULL,
  `linkURL` varchar(500) NOT NULL,
  `linkUpdate` datetime DEFAULT NULL,
  `l;inkAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_options`
--

CREATE TABLE `sc_options` (
  `optionID` bigint(20) NOT NULL,
  `optionName` varchar(255) NOT NULL,
  `optionValue` text NOT NULL,
  `optionLoad` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `sc_options`
--

INSERT INTO `sc_options` (`optionID`, `optionName`, `optionValue`, `optionLoad`) VALUES
(1, 'SITE_NAME', 'PHP Shopping Cart', '1'),
(2, 'SITE_NAME_SHOW', '1', '1'),
(3, 'SITE_LANG', 'en_US', '1'),
(4, 'SITE_THEME', 'Default', '1'),
(5, 'SITE_META_TAGS', 'HP Shopping Cart, learn code, php, mysqli, html, css, more', '1'),
(6, 'SITE_META_DESC', 'Learn how to create an amazing PHP Shoppping Cart', '1'),
(7, 'SITE_META_CHARSET', 'UTF-8', '1'),
(8, 'SITE_COPY', '&copy; 2019 Lukasz Rutkowsky', '1'),
(9, 'SITE_DEV_MODE', '1', '1'),
(12, 'SITE_PAGE_HOME', '1', '1'),
(13, 'SITE_UPDATE', '29-09-2019', '1'),
(14, 'SHOP_STATUS', '1', '1'),
(15, 'SHOP_CURRENCY', 'USD', '1'),
(16, 'SHOP_CURRENCY_ICON', 'fa fa-usd', '1'),
(17, 'SHOP_CURRENCY_TS', 'a', '1'),
(18, 'SHOP_CURRENCY_DS', 'd', '1'),
(19, 'SHOP_CURRENCY_ND', '2', '1'),
(20, 'SHOP_ORDER_MIN', '10.00', '1'),
(21, 'SHOP_ORDER_MAX', '100,000.00', '1'),
(22, 'SHOP_ORDER_MEMBERS', '0', '1'),
(23, 'SHOP_ORDER_SHIPPING', '0', '1'),
(24, 'SHOP_ORDER_TAXES', '1', '1'),
(25, 'SHOP_ORDER_COUPONS', '1', '1'),
(26, 'SHOP_UNIT_WEIGHT', 'kg', '1'),
(27, 'SHOP_UNIT_DIM', 'cm', '1'),
(28, 'SHOP_COST_WEIGHT', '1.00', '1'),
(29, 'SHOP_COST_DIM', '1.50', '1'),
(30, 'SHOP_REVIEWS_AUTO', '1', '1'),
(31, 'LAYOUT_MENU_TOP', '1', '1'),
(32, 'LAYOUT_MENU_MAIN', '1', '1'),
(33, 'LAYOUT_MENU_BOTTOM', '1', '1'),
(34, 'LAYOUT_SIDEBAR', '1', '1'),
(35, 'LAYOUT_SIDEBAR_POSITION', 'right', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_orders`
--

CREATE TABLE `sc_orders` (
  `orderID` bigint(20) NOT NULL,
  `memberID` bigint(20) DEFAULT NULL,
  `orderEmail` varchar(255) NOT NULL,
  `orderPhone` varchar(30) NOT NULL,
  `orderFirstName` varchar(50) NOT NULL,
  `orderLastName` varchar(50) NOT NULL,
  `orderCompanyName` varchar(100) NOT NULL,
  `orderTotal` varchar(16) NOT NULL,
  `orderDiscount` varchar(16) DEFAULT NULL,
  `orderTaxes` varchar(16) DEFAULT NULL,
  `orderShipping` varchar(16) DEFAULT NULL,
  `orderStatus` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending',
  `orderSandbox` enum('0','1') NOT NULL DEFAULT '0',
  `orderUpdate` datetime DEFAULT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_orders_items`
--

CREATE TABLE `sc_orders_items` (
  `itemID` bigint(20) NOT NULL,
  `orderID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `itemQuantity` int(10) NOT NULL,
  `itemFeatures` text DEFAULT NULL,
  `itemPrice` varchar(16) NOT NULL,
  `itemTotal` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_orders_payments`
--

CREATE TABLE `sc_orders_payments` (
  `paymentID` bigint(20) NOT NULL,
  `orderID` bigint(20) NOT NULL,
  `paymentAmount` varchar(16) NOT NULL,
  `paymentFee` varchar(16) DEFAULT NULL,
  `paymentCurrency` varchar(3) NOT NULL DEFAULT 'USD',
  `paymentMethod` varchar(30) NOT NULL,
  `paymentTransactionID` varchar(255) DEFAULT NULL,
  `paymentTransactionNumber` varchar(255) DEFAULT NULL,
  `paymentTransactionType` varchar(30) NOT NULL,
  `paymentReceiverID` varchar(255) DEFAULT NULL,
  `paymentReceiverEmail` varchar(255) DEFAULT NULL,
  `paymentReceiverCurrency` varchar(3) DEFAULT 'USD',
  `paymentReceiverFee` varchar(16) NOT NULL,
  `paymentPayerID` varchar(255) DEFAULT NULL,
  `paymentPayerStatus` varchar(255) DEFAULT NULL,
  `paymentNotifyVersion` varchar(255) DEFAULT NULL,
  `paymentVerifySIgn` varchar(255) NOT NULL,
  `paymentType` varchar(30) NOT NULL,
  `paymentStatus` varchar(30) NOT NULL,
  `paymentUpdate` datetime DEFAULT NULL,
  `paymentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_orders_shippings`
--

CREATE TABLE `sc_orders_shippings` (
  `shippingID` bigint(20) NOT NULL,
  `orderID` bigint(20) NOT NULL,
  `shippingCountry` varchar(50) NOT NULL,
  `shippingState` varchar(50) DEFAULT NULL,
  `shippingCity` varchar(50) NOT NULL,
  `shippingAddress` varchar(100) NOT NULL,
  `shippingZIP` varchar(30) DEFAULT NULL,
  `shippingStatus` enum('delivered','pending','inDelivery') NOT NULL DEFAULT 'pending',
  `shippingMethod` varchar(50) DEFAULT NULL,
  `shippingDeliveredDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_pages`
--

CREATE TABLE `sc_pages` (
  `pageID` bigint(20) NOT NULL,
  `pageTitle` varchar(100) NOT NULL,
  `pageURL` varchar(500) NOT NULL,
  `pageKeywords` varchar(255) DEFAULT NULL,
  `pageAboutShort` varchar(100) DEFAULT NULL,
  `pageAboutLong` longtext DEFAULT NULL,
  `pageScriptTop` text DEFAULT NULL,
  `pageScriptBottom` text DEFAULT NULL,
  `pageSidebarPosition` enum('none','left','right') NOT NULL DEFAULT 'right',
  `pageViews` bigint(20) NOT NULL DEFAULT 0,
  `pageStatus` enum('public','draft','trash') NOT NULL DEFAULT 'public',
  `pageUpdate` datetime DEFAULT NULL,
  `pageAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_products`
--

CREATE TABLE `sc_products` (
  `productID` bigint(20) NOT NULL,
  `productSKU` varchar(255) DEFAULT NULL,
  `productName` varchar(100) NOT NULL,
  `productThumbnail` varchar(500) DEFAULT NULL,
  `productURL` varchar(500) NOT NULL,
  `productStock` int(10) DEFAULT NULL,
  `productPrice` varchar(16) NOT NULL,
  `productPriceSale` varchar(16) NOT NULL,
  `productAboutShort` varchar(100) NOT NULL,
  `productAboutLong` longtext NOT NULL,
  `productKeywords` varchar(255) NOT NULL,
  `brandID` bigint(20) DEFAULT NULL,
  `categoryID` text DEFAULT NULL,
  `productWeight` varchar(16) DEFAULT NULL,
  `productDimensionLenght` varchar(16) DEFAULT NULL,
  `productDimensionWidth` varchar(16) DEFAULT NULL,
  `productDimensionHeight` varchar(16) DEFAULT NULL,
  `productSuggetions` text DEFAULT NULL,
  `productComments` enum('0','1') NOT NULL DEFAULT '1',
  `productSidebarID` bigint(20) DEFAULT NULL,
  `productSidebarPosision` enum('none','left','right') NOT NULL DEFAULT 'right',
  `productViews` bigint(20) NOT NULL DEFAULT 0,
  `productSold` bigint(20) NOT NULL DEFAULT 0,
  `productCSS` text DEFAULT NULL,
  `productStatus` enum('available','hidden','draft','trash') NOT NULL DEFAULT 'available',
  `productUpdate` datetime DEFAULT NULL,
  `productAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_products_brands`
--

CREATE TABLE `sc_products_brands` (
  `brandID` bigint(20) NOT NULL,
  `brandName` varchar(100) NOT NULL,
  `brandURL` varchar(500) NOT NULL,
  `brandAboutLong` longtext DEFAULT NULL,
  `brandThumbnail` varchar(500) DEFAULT NULL,
  `brandSidebarID` bigint(20) NOT NULL,
  `brandSidebarPosition` enum('none','left','right') NOT NULL DEFAULT 'right',
  `brandStatus` enum('available','draft','hidden','trash') NOT NULL DEFAULT 'available',
  `brandDate` datetime DEFAULT NULL,
  `brandAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_products_categories`
--

CREATE TABLE `sc_products_categories` (
  `categoryID` bigint(20) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryURL` varchar(500) NOT NULL,
  `categoryThumbnail` varchar(500) DEFAULT NULL,
  `categoryAboutLong` longtext DEFAULT NULL,
  `categorySidebarID` bigint(20) DEFAULT NULL,
  `categorySidebarPosition` enum('none','left','right') NOT NULL DEFAULT 'right',
  `categoryStatus` enum('available','draft','hidden','trash') NOT NULL DEFAULT 'available',
  `categoryDate` datetime DEFAULT NULL,
  `categoryAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_products_reviews`
--

CREATE TABLE `sc_products_reviews` (
  `reviewID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `memberID` bigint(20) NOT NULL,
  `reviewText` text NOT NULL,
  `reviewRating` enum('1','2','3','4','5') DEFAULT NULL,
  `reviewStatus` enum('approved','pending','spam','trash') NOT NULL DEFAULT 'pending',
  `reviewIP` varchar(255) NOT NULL,
  `reviewUpdate` datetime DEFAULT NULL,
  `reviewAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_sidebars`
--

CREATE TABLE `sc_sidebars` (
  `sidebarID` bigint(20) NOT NULL,
  `sidebarName` varchar(50) NOT NULL,
  `widgetsID` text NOT NULL,
  `sidebarStatus` enum('available','trash') NOT NULL DEFAULT 'available',
  `sidebarUpdate` datetime DEFAULT NULL,
  `sidebarAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_sidebar_widgets`
--

CREATE TABLE `sc_sidebar_widgets` (
  `widgetID` bigint(20) NOT NULL,
  `widgetTitle` varchar(50) NOT NULL,
  `widgetTitleHide` enum('0','1') NOT NULL DEFAULT '1',
  `widgetType` varchar(20) NOT NULL,
  `widgetOption1` varchar(500) DEFAULT NULL,
  `widgetOption2` varchar(500) DEFAULT NULL,
  `widgetOption3` varchar(500) DEFAULT NULL,
  `widgetText` text NOT NULL,
  `widgetStatus` enum('available','graft','trash') NOT NULL DEFAULT 'available',
  `widgetUpdate` datetime DEFAULT NULL,
  `widgetDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_themes`
--

CREATE TABLE `sc_themes` (
  `themeID` bigint(20) NOT NULL,
  `themeName` varchar(50) NOT NULL,
  `themePath` varchar(500) NOT NULL,
  `themeAuthor` varchar(100) NOT NULL,
  `themeAbout` varchar(500) NOT NULL,
  `themeCSS` longtext DEFAULT 'NULL',
  `themeStatus` enum('available','draft','trash') NOT NULL DEFAULT 'available',
  `themeCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sc_traffic`
--

CREATE TABLE `sc_traffic` (
  `trafficID` bigint(20) NOT NULL,
  `trafficIP` varchar(255) NOT NULL,
  `trafficCountryName` varchar(50) NOT NULL,
  `trafficCountryCode` varchar(3) NOT NULL,
  `trafficState` varchar(50) DEFAULT NULL,
  `trafficCity` varchar(50) NOT NULL,
  `trafficAddressURL` text NOT NULL,
  `trafficAddressFrom` text DEFAULT NULL,
  `trafficBrowser` varchar(50) NOT NULL,
  `trafficOS` varchar(50) NOT NULL,
  `trafficDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sc_admins`
--
ALTER TABLE `sc_admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indeksy dla tabeli `sc_coupons`
--
ALTER TABLE `sc_coupons`
  ADD PRIMARY KEY (`couponID`);

--
-- Indeksy dla tabeli `sc_media`
--
ALTER TABLE `sc_media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indeksy dla tabeli `sc_members`
--
ALTER TABLE `sc_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indeksy dla tabeli `sc_menus`
--
ALTER TABLE `sc_menus`
  ADD PRIMARY KEY (`menuID`);

--
-- Indeksy dla tabeli `sc_menus_links`
--
ALTER TABLE `sc_menus_links`
  ADD PRIMARY KEY (`linkID`);

--
-- Indeksy dla tabeli `sc_options`
--
ALTER TABLE `sc_options`
  ADD PRIMARY KEY (`optionID`);

--
-- Indeksy dla tabeli `sc_orders`
--
ALTER TABLE `sc_orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indeksy dla tabeli `sc_orders_items`
--
ALTER TABLE `sc_orders_items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indeksy dla tabeli `sc_orders_payments`
--
ALTER TABLE `sc_orders_payments`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indeksy dla tabeli `sc_orders_shippings`
--
ALTER TABLE `sc_orders_shippings`
  ADD PRIMARY KEY (`shippingID`);

--
-- Indeksy dla tabeli `sc_pages`
--
ALTER TABLE `sc_pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indeksy dla tabeli `sc_products`
--
ALTER TABLE `sc_products`
  ADD PRIMARY KEY (`productID`);

--
-- Indeksy dla tabeli `sc_products_brands`
--
ALTER TABLE `sc_products_brands`
  ADD PRIMARY KEY (`brandID`);

--
-- Indeksy dla tabeli `sc_products_categories`
--
ALTER TABLE `sc_products_categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indeksy dla tabeli `sc_products_reviews`
--
ALTER TABLE `sc_products_reviews`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indeksy dla tabeli `sc_sidebars`
--
ALTER TABLE `sc_sidebars`
  ADD PRIMARY KEY (`sidebarID`);

--
-- Indeksy dla tabeli `sc_sidebar_widgets`
--
ALTER TABLE `sc_sidebar_widgets`
  ADD PRIMARY KEY (`widgetID`);

--
-- Indeksy dla tabeli `sc_themes`
--
ALTER TABLE `sc_themes`
  ADD PRIMARY KEY (`themeID`);

--
-- Indeksy dla tabeli `sc_traffic`
--
ALTER TABLE `sc_traffic`
  ADD PRIMARY KEY (`trafficID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `sc_admins`
--
ALTER TABLE `sc_admins`
  MODIFY `adminID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_coupons`
--
ALTER TABLE `sc_coupons`
  MODIFY `couponID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_media`
--
ALTER TABLE `sc_media`
  MODIFY `mediaID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_members`
--
ALTER TABLE `sc_members`
  MODIFY `memberID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_menus`
--
ALTER TABLE `sc_menus`
  MODIFY `menuID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_menus_links`
--
ALTER TABLE `sc_menus_links`
  MODIFY `linkID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_options`
--
ALTER TABLE `sc_options`
  MODIFY `optionID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `sc_orders`
--
ALTER TABLE `sc_orders`
  MODIFY `orderID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_orders_items`
--
ALTER TABLE `sc_orders_items`
  MODIFY `itemID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_orders_payments`
--
ALTER TABLE `sc_orders_payments`
  MODIFY `paymentID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_orders_shippings`
--
ALTER TABLE `sc_orders_shippings`
  MODIFY `shippingID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_pages`
--
ALTER TABLE `sc_pages`
  MODIFY `pageID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_products`
--
ALTER TABLE `sc_products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_products_brands`
--
ALTER TABLE `sc_products_brands`
  MODIFY `brandID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_products_categories`
--
ALTER TABLE `sc_products_categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_products_reviews`
--
ALTER TABLE `sc_products_reviews`
  MODIFY `reviewID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_sidebars`
--
ALTER TABLE `sc_sidebars`
  MODIFY `sidebarID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_sidebar_widgets`
--
ALTER TABLE `sc_sidebar_widgets`
  MODIFY `widgetID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_themes`
--
ALTER TABLE `sc_themes`
  MODIFY `themeID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sc_traffic`
--
ALTER TABLE `sc_traffic`
  MODIFY `trafficID` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 04:51 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `payment_method` int(11) NOT NULL DEFAULT 1,
  `transfer_method` varchar(200) NOT NULL,
  `total` int(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_voucher` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `date`, `end_date`, `status`, `payment_method`, `transfer_method`, `total`, `discount`, `id_voucher`, `id_user`) VALUES
(19, '2023-11-22 09:33:13', '2023-11-23 12:22:59', 0, 1, 'Giao hàng tiêu chuẩn', 25400000, 0, 0, 3),
(20, '2023-11-22 10:13:33', '2023-11-30 18:18:07', 5, 1, 'Giao hàng tiêu chuẩn', 127090000, 0, 0, 3),
(21, '2023-11-22 17:47:51', '2023-11-24 14:24:14', 5, 1, 'Giao hàng tiêu chuẩn', 57195000, 19065000, 3, 3),
(22, '2023-11-24 17:29:49', '2023-11-27 14:23:32', 0, 1, 'Giao hàng tiêu chuẩn', 50860000, 0, 0, 7),
(23, '2023-11-24 17:49:12', '2023-11-26 15:34:34', 0, 1, 'Giao hàng tiêu chuẩn', 87792000, 6608000, 5, 7),
(24, '2023-11-26 11:51:18', '2023-11-25 13:23:23', 0, 1, 'Giao hàng tiêu chuẩn', 25400000, 0, 0, 3),
(25, '2023-11-27 16:47:05', '2023-11-30 18:17:49', 5, 1, 'Giao hàng tiêu chuẩn', 25430000, 0, 0, 7),
(26, '2023-12-01 14:21:24', '2023-12-01 18:21:56', 5, 1, 'Giao hàng tiêu chuẩn', 9727020, 0, 0, 7),
(27, '2023-12-01 17:26:07', '2023-12-01 18:20:47', 5, 1, 'Giao hàng tiêu chuẩn', 24500000, 0, 0, 7),
(28, '2023-12-01 17:29:03', '2023-12-01 18:20:14', 5, 1, 'Giao hàng tiêu chuẩn', 76200000, 0, 0, 7),
(29, '2023-12-01 17:36:55', '2023-12-01 19:19:47', 5, 1, 'Giao hàng tiêu chuẩn', 70949700, 5340300, 5, 7),
(30, '2023-12-02 12:07:57', '2023-12-02 06:09:04', 5, 1, 'Giao hàng tiêu chuẩn', 101660000, 0, 0, 7),
(31, '2023-12-10 22:02:33', '2023-12-11 01:43:38', 5, 2, 'Giao hàng tiêu chuẩn', 2918106, 324234, 1, 7),
(32, '2023-12-11 00:45:17', '2023-12-11 01:51:03', 5, 1, 'Giao hàng tiêu chuẩn', 25400000, 0, 0, 7),
(33, '2023-12-11 01:10:59', '0000-00-00 00:00:00', 0, 1, 'Giao hàng tiêu chuẩn', 50860000, 0, 0, 7),
(34, '2023-12-11 01:25:08', '0000-00-00 00:00:00', 0, 2, 'Giao hàng tiêu chuẩn', 23423400, 0, 0, 7),
(35, '2023-12-11 01:26:44', '2023-12-11 02:10:59', 5, 2, 'Giao hàng tiêu chuẩn', 46846800, 0, 0, 7),
(36, '2023-12-11 01:55:14', '2023-12-11 01:56:14', 5, 1, 'Giao hàng tiêu chuẩn', 50800000, 0, 0, 7),
(37, '2023-12-11 02:05:30', '2023-12-11 02:10:19', 5, 1, 'Giao hàng tiêu chuẩn', 49000000, 0, 0, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `id_user`) VALUES
(1, 1),
(2, 3),
(3, 7),
(7, 10),
(4, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name_category` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `image`, `is_deleted`) VALUES
(1, 'Sofa', 'sofa-9.jpg', 0),
(2, 'Bàn', 'table.jpg', 0),
(4, 'Giường ngủ', 'bed.jpg', 0),
(5, 'Tủ quần áo', 'mau-tu-quan-ao.jpg', 0),
(10, 'Tủ giày', 'BST-Coastal-4-768x512.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_product_detail` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image`, `id_product_detail`) VALUES
(1, 'sofa-20.jpg', 2),
(2, 'sofa-21.jpg', 2),
(3, 'sofa-1.jpg', 1),
(4, 'sofa-2.jpg', 1),
(5, 'sofa-3.jpg', 1),
(6, 'sofa-4.jpg', 1),
(7, 'sofa-11.jpg', 3),
(10, 'sofa-15.jpg', 3),
(11, 'ban-3.jpg', 4),
(19, 'roronoa-zoro.jpg', 10),
(35, 'Ghe-69-cao-cap-tai-Noi-That-Xuyen-A.jpg', 19),
(36, 'Giuong-Coastal-1m8-xanh-1-768x511.jpg', 8),
(45, 'sofa-Coastal-2-cho-vai-vang-2-1-768x511.jpg', 9),
(46, 'Sofa-Coastal-2-cho-vai-xanh-1-768x511.jpg', 20),
(47, 'Sofa-Coastal-2-cho-vai-xanh-2-768x511.jpg', 20),
(48, 'Sofa-Coastal-3-cho-2-768x511.jpg', 23),
(49, 'Sofa-Coastal-3-cho-3-768x511.jpg', 23),
(50, 'sofa_vai_poppy_mau_hong-768x511.jpg', 12),
(52, 'sofa-1018063-768x511.jpg', 12),
(53, 'sofa-101806-13-768x511.jpg', 26),
(54, 'sofa-1018063-768x511.jpg', 26),
(55, '500-73906-nha-xinh-phong-khach-sofa3cho-bridge2.jpg', 13),
(56, '500-73906-nha-xinh-phong-khach-sofa3cho-bridge3.jpg', 13),
(57, '1000-san-pham-nha-xinh38-3-768x511.jpg', 27),
(58, 'Sofa-Bridge-3-cho-hien-dai-da-cognac-4-768x495.jpg', 27),
(59, 'Sofa-Bridge-3-cho-hien-dai-da-cognac-5-768x495.jpg', 27),
(60, 'bridge-kem-3-nghieng-500.jpg', 28),
(61, 'sofa-bridge-86220-768x511.jpg', 28),
(62, 'sofa-miami-2-cho-boc-vai-vang-2-768x511.jpg', 29),
(63, 'Sofa-Miami-2-cho-vai-xam-1-768x511.jpg', 14),
(64, '102411-sofa-elegance-mau-den-da-brown-3_1-768x511.jpg', 31),
(65, 'sofa-ona-her-3-cho-da-xanh-s4-1-768x511.jpg', 16),
(66, 'sofa-3-cho-ona-her-da-nau-1-768x511.jpg', 32),
(67, 'ona-him-da-xanh-768x512.jpg', 16),
(68, 'SOFA-JADORA-25-CHO-VAI-VACT8594-VACT3120-1-768x511.jpg', 17),
(69, 'Ban-nuoc-Fence-8-768x511.jpg', 18),
(70, '500-71317-nha-xinh-phong-khach-ban-nuoc2.jpg', 33),
(71, 'BAN-BEN-RETIRO-GOLD-L-40X10-16713485L-1-768x511.jpg', 35),
(72, 'BAN-BEN-RETIRO-GOLD-L-40X10-16713485L-2-768x511.jpg', 35),
(73, 'ban-ben-dubai-1-768x511.gif', 36),
(74, 'Giuong-Coastal-1m8-vang-1-768x511.jpg', 37),
(75, '3_91088_21-768x513.jpg', 38),
(76, 'phong-ngu-giuong-hoc-keo-iris-6-768x512.jpg', 39),
(77, 'phong-ngu-giuong-hoc-keo-iris-8-768x512.jpg', 39),
(78, '103444-giuong-softly-1m8-vai-s8w-light-13-768x511.jpg', 42),
(79, 'giuong-leman-1m8-vai-vact7464-2-768x511.jpg', 43),
(80, 'Tu-ao-Wabrobe-02-2-768x511.jpg', 44),
(81, 'Tu-ao-Acrylic-1-768x511.jpg', 45),
(82, 'tu-ao-hien-dai-4.jpg', 46);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name_product` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `origin_price` int(11) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `material` varchar(200) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(200) NOT NULL,
  `id_category` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `description`, `price`, `origin_price`, `thumbnail`, `material`, `sold`, `created_at`, `id_category`, `is_deleted`) VALUES
(1, 'Sofa Bolero 3 chỗ', 'Sofa Bolero 3 chỗ và Đôn vải xanh 18 sở hữu phần chân kim loại được sơn đen và phần nệm được bọc vải cao cấp màu xanh dương. Kiểu dáng thiết kế của sofa Bolero tuy đơn giản nhưng lại mang đến sự tinh tế cho không gian phòng khách còn là sản phẩm sofa đáng sở hữu bởi thiết kế và trải nghiệm sử dụng.', 6500000, 10969000, 'sofa-5.jpg', 'Kim loại, Vải', 9, '12/11/2023', 1, 0),
(2, 'Sofa Miami 3 chỗ + 1 armchair', 'Sofa Miami 3 chỗ và 1 armchair đặc trưng của phong cách Scandinavian đơn giản. Kiểu dáng hướng đến sự phù hợp với nhiều đối tượng sử dụng khác nhau. Thiết kế dạng 3.1 chỗ cho phép chủ nhân có thêm nhiều lựa chọn trong việc sắp đặt để có không gian phòng khách ưng ý. Lưng sofa bọc cách điệu tạo điểm nhấn cho cả không gian phòng khách nhà bạn. Tại Nhà Xinh có đa dạng các mẫu sofa đẹp hiện đại với kiểu dáng phong phú, phù hợp với nhiều thiết kế phòng khách.', 25400000, 27900000, 'sofa-16.jpg', 'Gỗ', 6, '14/11/2023', 1, 0),
(3, 'Bàn nước Elegance', 'Bàn nước Elegance với thiết kế tối giản nhưng vẫn toát lên nét sang trọng và tinh tế. Nhờ kết cấu độc đáo nên sản phẩm có trọng lượng nhẹ nhàng nhưng vô cùng chắc chắn. Sản phẩm phù hợp với không gian nội thất hiện đại và đặc biệt là phong cách Scandinavian.', 25430000, 26470000, 'ban-2.jpg', 'Gỗ Ash', 3, '16-11-2023', 2, 0),
(9, 'Giường Coastal 1m8', 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.', 3000000, 5800000, 'BST-Coastal-4-768x512.jpg', 'Gỗ Ash', 0, '2023-11-24', 4, 0),
(10, 'Sofa Coastal 2 chỗ', 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, \"cân\" mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.', 3050300, 5900000, 'sofa-Coastal-2-cho-vai-vang-4-768x511.jpg', 'Gỗ', 0, '2023-11-24', 1, 0),
(11, 'san phẩm', 'asdsad', 20000000, 123123, 'ban-1.jpg', 'fgsdfgd', 0, '2023-11-24', 5, 1),
(12, 'Sofa Twoback 2,5 chỗ hiện đại vải Diego', 'Sofa Twoback 2.5 chỗ với gam màu xanh tươi mát, nhã nhặn. Kết cấu khung làm từ gỗ thông của Newzerland, bọc nệm vải cao cấp tạo cảm giác thoải mái. Sofa Twoback là 1 lựa chọn tối ưu cho không gian phòng khách hiện đại.', 7090000, 8950340, 'sofa_twoback_25_cho-768x511.jpg', 'Gỗ', 0, '2023-11-24', 1, 0),
(13, 'Sofa Poppy', 'Sofa Poppy', 4405000, 7903493, 'cam-hung-he-sang-sofa-poppy3-768x511.jpg', 'Gỗ', 0, '2023-11-24', 1, 0),
(14, 'Sofa Bridge 3 chỗ hiện đại', 'Sofa Bridge 3 chỗ với phần khung ghế được làm từ gỗ sồi tự nhiên nhập khẩu từ Mỹ mang đến một thiết kế chắc chắn, bền vững theo thời gian. Điểm nhấn là phần tay vịn được gọt dũa tinh xảo với các đường vân gỗ cách điệu độc đáo. Những xúc chạm tinh tế sẽ được khơi nguồn khi chạm tay nhẹ lên bề mặt sản phẩm, vì chất liệu da tự nhiên cao cấp sẽ đem lại cảm giác mềm mại và chân thực. Sản phẩm có đa dạng lựa chọn với 3 màu sắc khác nhau: màu beige, màu cognac và màu đen. Sofa Bridge 3 chỗ là sản phẩm phù hợp cho không gian phòng khách sang trọng và tao nhã.', 5904030, 7893003, '500-nhaxinh-phong-khach-sofa-bridge.jpg', 'Gỗ sồi', 0, '2023-11-24', 1, 0),
(15, 'Sofa Miami 2 chỗ', 'Sofa Miami khoác lên mình một màu xám tinh tế, tối giản, mang đến không gian phòng khách hiện đại, trang nhã. Sofa Miami 2 chỗ vải xám sử dụng khung gỗ bọc vải kết hợp cùng với phần nệm ngồi có thể tháo rời, dễ dàng vệ sinh hiệu quả.', 3943200, 5894000, 'phong-khach-miami-vang-2-cho-768x511.jpg', 'Gỗ', 0, '2023-11-24', 1, 0),
(16, 'Sofa 3 chỗ Elegance', 'Sofa 3 chỗ trong bộ sưu tập mới Elegance, bộ sưu tập được lấy cảm hứng từ nội thất tinh xảo, nhẹ nhàng, nền nã nhưng đơn giản Elegance là sự kết hợp tuyệt hảo giữa sự bền chắc và trọng lượng tối giản. Sofa 3 chỗ da xanh có phần khung bằng gỗ tần bì đặc, tự nhiên được nhập khẩu từ Mỹ, phần nệm được bọc da bò S4 nhập khẩu Italy.', 7987000, 12903000, '102421-sofa-elegance-3-cho-mau-tu-nhien-da-xanh-768x511.jpg', 'Gỗ Ash, da bò', 0, '2023-11-24', 1, 0),
(17, 'Sofa ONA HER 3 chỗ', 'Sofa 3 chỗ ONA HER với bề mặt lớp da phủ cao cấp, mang đến trải nghiệm tinh tế mỗi khi chạm nhẹ lên bề mặt sản phẩm. Chân gỗ oak cùng đường nét bo tròn và thu nhỏ dần xuống phía dưới, tạo nên một thiết kế tinh xảo mà đầy vững chắc. Một tỉ lệ hoàn hảo cùng các đường may tỉ mỉ, sofa ONA HER giúp không gian căn hộ toát lên nét sang trọng và đẳng cấp.', 8900000, 10930000, 'ona-him-da-xanh-nau-768x511.jpg', 'Gỗ Oak, da bò', 0, '2023-11-24', 1, 0),
(18, 'Sofa Jadora 2.5 chỗ vải VACT8594/VACT3120', 'Sofa Jadora là sản phẩm được thiết kế và sản xuất bởi Nhà Xinh. Với kiểu dáng rộng rãi cùng phần đệm ngồi êm ái, Jadora hứa hẹn sẽ mang đến cho người dùng trải nghiệm thư thái nhất. Trong phiên bản mới, Jadora khoác lên mình màu sắc trang nhã, hiện đại với sự kết hợp của các tông màu mới mẻ sẽ là điểm nhấn tuyệt vời cho tổ ấm của bạn. Thiết kế tựa như một chiếc giường ngủ, sofa Jadora rất phù hợp để bạn ngồi đọc sách hoặc ngả lưng thư giãn. Sản phẩm dễ dàng phối hợp được với nhiều thiết kế khác như bàn nước hoặc bàn bên để tạo nên không gian sống độc đáo.', 8790900, 13789000, 'JADORA-SAC-MAU-TRANG-NHA-768x512.jpg', 'Khung gỗ - Nệm bọc vải 2 màu - 5 gối', 1, '2023-11-24', 1, 0),
(19, 'Bàn nước Fence', 'Bàn nước Fence, kim loại, kính', 7500000, 9600000, 'Ban-nuoc-Fence-768x511.jpg', 'Kim loại', 0, '2023-11-24', 2, 0),
(20, 'sofa ~ ', 'ghe tinh yeu bao phe voi em ny bao lien dinh vs a quan nguyen okeeee em yeeu ', 1000, 1000000, 'Ghe-69-cao-cap-tai-Noi-That-Xuyen-A.jpg', 'da and go', 0, '2023-11-27', 1, 1),
(21, 'Bàn nước Cognac', 'Bàn nước Cognac được nhập khẩu, kết hợp độc đáo giữa gỗ mộc mạc và chân thép cho phòng khách nhà bạn thêm phong cách', 4060000, 5900000, 'phong-khach-cognac-5001.jpg', 'Gỗ Ash', 0, '2023-12-11', 2, 0),
(22, 'Bàn nước Cognac 2', 'Bàn nước Cognac mẫu 2 là sản phẩm mang phong cách cổ điển đến từ pháp, nó hoàn hảo từ sự kết hợp giữa khung kim loại và gỗ tái chế, sẽ thật tuyệt cho những cá nhân sành điệu đang tìm kiếm chiếc bàn nước này. Dòng sản phẩm phù hợp với hầu hết các thiết kế nhà hiện đại, đương đại hoặc chiết trung. Hình dạng vuông tạo nên sự phù hợp thực tế và chức năng trong không gian phòng của bạn.', 6060000, 7800000, 'ban-nuoc-cognac2-768x461.jpg', 'Gỗ tái chế', 0, '2023-12-11', 2, 0),
(23, 'Bàn bên Retiro gold L', 'Bàn bên Retiro gold L', 2800700, 3839999, 'BAN-BEN-RETIRO-GOLD-L-40X10-16713485L-2-3-768x511.jpg', 'Kim loại', 0, '2023-12-11', 2, 0),
(24, 'Bàn Dubai', 'Bàn bên Dubai là sản phẩm nằm trong bộ sưu tập (Dubai) line hàng đến từ đội ngủ thiết kế Nhà Xinh Mang phong cách RUSTIC tạo nên nét duyên dáng độc đáo cho ngôi nhà. Được thiết kế với khung kim loại sơn tĩnh điện trang trí, mặt bàn bằng gỗ (MDF) phủ lớp Laminate tạo nét đặc trưng cho phong cách trang trí của bạn. Một sản phẩm hợp xu hướng cho bất kỳ phòng nào, nó hoàn hảo để sử dụng làm bàn cuối ghế sofa hoặc làm bàn đầu giường trong phòng ngủ.', 3800700, 5639000, 'ban-ben-dubai-768x511.gif', 'Kim loại', 0, '2023-12-11', 2, 0),
(25, 'Giường ngủ gỗ Maxine', 'Giường ngủ gỗ Maxine 1m8 với đường nét hài hòa cùng thiết kế tinh xảo tạo vẻ ngoài sang trọng. Sản phẩm sử dụng khung gỗ hoàn thiện MDF veneer Walnut nên rất chắc chắn. Sản phẩm đem đến trải nghiệm thư giãn giúp bạn tận hưởng trọn vẹn giấc ngủ ngon. Giường Maxine có 2 kích thước là 1m6 và 1m8 cho bạn thoải mái lựa chọn theo nhu cầu sử dụng.', 6780000, 8900000, 'phong-ngu-maxine-768x511.jpg', 'Gỗ Okumi', 0, '2023-12-11', 4, 0),
(26, 'Giường hộc kéo Iris', 'Giường hộc kéo Iris 1m6 với thiết kế đóng nút đầu giường, điểm đặc biệt là bốn ngăn chứa đồ rộng thuận tiện cất những vật dụng trong phòng ngủ như gối, mền, drap hết sức gọn gàng. Chắc chắn sẽ là sự lựa chọn tối ưu cho không gian phòng ngủ hiện đại. Giường hộc kéo Iris có 2 kích thước 1m6 và 1m8, đa dạng màu sắc.', 7800600, 12980000, 'phong-ngu-giuong-hoc-keo-iris-4-768x512.jpg', 'Gỗ', 0, '2023-12-11', 4, 0),
(27, 'Giường ngủ Wynn', 'Giường ngủ bọc vải tổng hợp Wynn 1m8 (thuộc thương hiệu Calliragis - nội thất nhập khẩu Ý) với thiết kế độc đáo, sang trọng xen lẫn giữa nét hiện đại và chút cổ điển thể hiện ở những nút nhấn phần bọc đầu giường, màu nâu sang trọng cho không gian phòng ngủ thêm tinh tế mang lại cảm giác thoải mái.', 10800000, 15900000, 'phong-ngu-wynn1-500.jpg', 'G', 0, '2023-12-11', 4, 0),
(28, 'Giường ngủ bọc vải Softly G', 'Giường ngủ bọc vải Softly G 1m6 S9C được nhập khẩu từ thương hiệu nổi tiếng Calligaris của Ý, với đầu giường lớn, có đệm, vỏ bọc vải có thể tháo rời hoàn toàn. Giường Softly là lựa chọn hoàn hảo cho phòng ngủ thanh lịch.', 5670000, 6570000, 'Giuong-ngu-boc-vai-Softly-G-1m6-S8W-2-768x495.jpg', 'Gỗ', 0, '2023-12-11', 4, 0),
(29, 'Giường Leman', 'Giường Leman 1m8 vải VACT7464', 6700000, 9600000, 'giuong-leman-1m8-111430-768x511.jpg', 'Gỗ', 0, '2023-12-11', 4, 0),
(30, 'Tủ áo Wabrobe', 'Tủ áo Wabrobe', 8800000, 11870000, 'Tu-ao-Wabrobe-02-768x511.jpg', 'MDF Laminate', 0, '2023-12-11', 5, 0),
(31, 'Tủ áo Acrylic', 'Tủ áo Acrylic', 4560000, 5400000, 'Tu-ao-Acrylic-768x511.jpg', 'Thùng MFC', 0, '2023-12-11', 5, 0),
(32, 'Tủ áo hiện đại', 'Mẫu tủ áo hiện đại của Nhà Xinh với thiết kế giản đơn, tối đa tiện ích bằng nhiều ngăn kéo và khoảng trống để cất trữ quần áo và đồ đạc.', 5670000, 6700000, 'tu-ao-hien-dai-500.jpg', 'MFC', 0, '2023-12-11', 5, 0),
(33, 'Tủ áo hiện đại', 'Mẫu tủ áo hiện đại của Nhà Xinh với thiết kế giản đơn, tối đa tiện ích bằng nhiều ngăn kéo và khoảng trống để cất trữ quần áo và đồ đạc.', 4509000, 567000, '3-99496-1-768x511.jpg', 'MFC', 0, '2023-12-11', 5, 0),
(34, 'Tủ áo Maxine', 'Tủ áo Maxine chứa đựng đầy đủ công năng tối ưu cho việc cất trữ quần áo bằng việc bố trí sắp xếp hợp lý các ngăn tủ. Những chi tiết về phụ kiện cao cấp giúp cho việc thao tác nhẹ nhàng. Bề ngoài, tủ được thiết kế duyên dáng và thu hút với sắc nâu trầm và kim loại đồng. Maxine – Nét nâu trầm sang trọng Maxine, mang thiết kế vượt thời gian, gửi gắm và gói gọn lại những nét đẹp của thiên nhiên và con người nhưng vẫn đầy tính ứng dụng cao trong suốt hành trình phiêu lưu của nhà thiết kế người Pháp Dominique Moal. Bộ sưu tập nổi bật với màu sắc nâu trầm sang trọng, là sự kết hợp giữa gỗ, da bò và kim loại vàng bóng. Đặc biệt trên mỗi sản phẩm, những nét bo viên, chi tiết kết nối được sử dụng kéo léo tạo ra điểm nhất rất riêng cho bộ sưu tập. Maxine thể hiện nét trầm tư, thư giãn để tận hưởng không gian sống trong nhịp sống hiện đại. Sản phẩm thuộc BST Maxine được sản xuất tại Việt Nam.', 4560000, 5300000, '3_91000_1-768x513.jpg', 'Gỗ Okumi', 0, '2023-12-11', 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_bill`
--

CREATE TABLE `products_bill` (
  `id` int(10) NOT NULL,
  `amount_buy` int(10) NOT NULL,
  `id_product_detail` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_bill`
--

INSERT INTO `products_bill` (`id`, `amount_buy`, `id_product_detail`, `id_bill`) VALUES
(24, 1, 3, 19),
(25, 2, 3, 20),
(26, 3, 5, 20),
(27, 1, 3, 21),
(28, 2, 5, 21),
(29, 2, 4, 22),
(30, 1, 3, 23),
(31, 2, 2, 23),
(32, 1, 9, 23),
(33, 1, 3, 24),
(34, 1, 4, 25),
(35, 3, 18, 26),
(36, 1, 1, 27),
(37, 3, 3, 28),
(38, 3, 4, 29),
(39, 2, 3, 30),
(40, 2, 5, 30),
(41, 1, 18, 31),
(42, 1, 3, 32),
(43, 2, 4, 33),
(44, 1, 17, 34),
(45, 2, 17, 35),
(46, 2, 3, 36),
(47, 2, 2, 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_cart`
--

CREATE TABLE `products_cart` (
  `id` int(10) NOT NULL,
  `amount_buy` int(10) NOT NULL,
  `id_product_detail` int(10) NOT NULL,
  `id_cart` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_cart`
--

INSERT INTO `products_cart` (`id`, `amount_buy`, `id_product_detail`, `id_cart`) VALUES
(7, 3, 3, 1),
(12, 1, 5, 1),
(38, 1, 4, 2),
(39, 1, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `code_color` varchar(200) NOT NULL,
  `color` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `size` varchar(255) NOT NULL,
  `id_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_detail`
--

INSERT INTO `products_detail` (`id`, `amount`, `code_color`, `color`, `image`, `size`, `id_product`) VALUES
(1, 10, '#80A3B7', 'xanh dương', 'sofa-1.jpg', 'D2250 - R900 - C790/Đôn D720-R720-C420', 1),
(2, 12, '#9F9F9F', 'xám đậm', 'sofa-19.jpg', 'D2250 - R900 - C790/Đôn D720-R720-C420', 1),
(3, 8, '#eaebee', 'xám nhạt', 'sofa-10.jpg', 'D1965 - R835 - C805', 2),
(4, 25, '#D9CCA1', 'gốc', 'ban-1.jpg', 'D1200 - R600 - C400 mm', 3),
(5, 32, '#846A5C', 'nâu', 'ban-5.jpg', 'D1200 - R600 - C400 mm', 3),
(6, 97, '#595959', 'đen', 'ban-7.jpg', 'D1200 - R600 - C400 mm', 3),
(8, 30, '#5c7f9a', 'xanh', 'Giuong-Coastal-1m8-xanh-768x511.jpg', 'D2000 - R1800 - C1080 mm', 9),
(9, 10, '#c1a463', 'vàng', 'sofa-Coastal-2-cho-vai-vang-1-1-768x511.jpg', 'D2300 - R800 - C760 mm', 10),
(10, 32, '#903c3c', 'adasdas', 'mau-tu-quan-ao.jpg', 'aqe12312', 11),
(11, 23, '#3d6f8c', 'Xanh dương', '75794-768x511.jpg', 'D1950-R900-C850', 12),
(12, 43, '#e58e7e', 'Màu cam - Góc trái', 'sofa_vai_poppy_mau_hong_12-6-768x511.jpg', 'D2400/1350 - R830 - C700 mm', 13),
(13, 32, '#232427', 'Màu đen', 'sofa-bride-go-goi-da-bo-that-cao-cap-hien-dai-dang-cap-sang-trong-768x511.jpg', 'D2100 - R900 - C750 mm', 14),
(14, 6, '#879593', 'Màu xám', 'Sofa-Miami-2-cho-vai-xam-768x511.jpg', 'D1700 - R850 - C770 mm', 15),
(15, 23, '#2b5056', 'xanh', 'ban-2.jpg', 'D2250 - R905 - C790 mm', 16),
(16, 12, '#385e60', 'Màu xanh', 'sofa-ona-her-3-cho-da-xanh-s4-768x511.jpg', 'D2000 - R880 - C700mm', 17),
(17, 5, '#593636', 'Màu cam nâu', 'SOFA-JADORA-25-CHO-VAI-VACT8594-VACT3120-768x511.jpg', 'D2200 - R1200 - C650/850 mm', 18),
(18, 7, '#5b5a5e', 'Màu đen', 'Ban-nuoc-Fence-1-768x511.jpg', 'D1200 - R360 - C600 mm', 19),
(19, 1, '#8e0101', 'do sam', 'Ghe-69-cao-cap-tai-Noi-That-Xuyen-A.jpg', '323x234', 20),
(20, 8, '#426e85', 'Xanh dương', 'Sofa-Coastal-2-cho-vai-xanh-768x511.jpg', 'D2300 - R800 - C760 mm', 10),
(23, 6, '#849ca8', 'Xanh nhạt', 'Sofa-Coastal-3-cho-768x511.jpg', 'D2300 - R800 - C760 mm', 10),
(26, 4, '#ffffff', 'Màu cam - Góc phải', 'Định dạng file không đúng.', 'D2400/1350 - R830 - C700 mm', 13),
(27, 6, '#ab6e53', 'Màu nâu', 'Định dạng file không đúng.', 'D2100 - R900 - C750 mm', 14),
(28, 4, '#cfc4a9', 'Màu be', 'Định dạng file không đúng.', 'D2100- R900- C750 mm', 14),
(29, 5, '#ba9c50', 'Màu vàng', 'sofa-miami-2-cho-boc-vai-vang-1-768x511.jpg', 'D1700 - R850 - C770 mm', 15),
(30, 9, '#8c4019', 'Màu nâu', 'Định dạng file không đúng.', 'D2250 - R905 - C790 mm', 16),
(31, 8, '#8a5c27', 'Màu vàng sẫm', 'Định dạng file không đúng.', 'D2250 - R905 - C790 mm', 16),
(32, 17, '#5e4b42', 'Màu nâu sẫm', 'sofa-3-cho-ona-her-da-nau-768x511.jpg', 'D2000 - R880 - C700mm', 17),
(33, 5, '#8e8479', 'Màu xám', '1000-ban-nuoc-cognac-768x511.jpg', 'D1500 - R750 - C450 mm', 21),
(34, 5, '#cfa361', 'Màu vàng', 'ban_nuoc_cognac_2_chan_sat_pjf078_12-768x511.jpg', 'D1200- R900- C400 mm', 22),
(35, 5, '#bbb9ae', 'Màu kim loại', 'BAN-BEN-RETIRO-GOLD-L-40X10-16713485L-768x511.jpg', '400x1010 mm', 23),
(36, 4, '#8f6654', 'Màu nâu', 'ban_ben_dubai_1-768x511.jpg', 'D450-R450-C500', 24),
(37, 5, '#d2c39f', 'Màu vàng', 'Giuong-Coastal-1m8-vang-2-768x511.jpg', 'D2000 - R1800 - C1080 mm', 9),
(38, 5, '#704735', 'Màu đỏ nâu', '3_91088_11-768x513.jpg', '1m8', 25),
(39, 7, '#ffffff', 'Màu xám cao cấp', 'giuong_iris_1m6_stone.jpg', '1m8', 26),
(40, 5, '#b6ada8', 'Màu xám', 'giuong-wynn1-1000-768x511.jpg', '1m8', 27),
(41, 5, '#7b9e97', 'Màu xanh', 'Giuong-ngu-boc-vai-Softly-G-1m6-S9C-300x194.jpg', '1', 28),
(42, 6, '#ffffff', 'Màu xám', '103444-giuong-softly-1m8-vai-s8w-light-768x511.jpg', '1m8', 28),
(43, 6, '#ffffff', 'Màu xám', 'giuong-leman-1m8-111430-1-768x511.jpg', '1m8', 29),
(44, 7, '#ffffff', 'Màu nâu', 'Tu-ao-Wabrobe-02-1-768x511.jpg', 'D3800 - R670 - C2400 mm', 30),
(45, 4, '#e4e8eb', 'Màu bạc', 'Tu-ao-Acrylic-2-768x511.jpg', 'D1600 - R600 - C2000 mm', 31),
(46, 3, '#ffffff', 'Màu xanh rêu', 'tu-ao-hien-dai-5-500.jpg', 'D1600-R600-C2000mm', 32),
(47, 4, '#70513d', 'Màu nâu', '3-99496-1-768x511.jpg', 'D1600-R600-C2000mm', 33),
(48, 4, '#7c4936', 'Màu đỏ nâu', '3_91000_2-768x513.jpg', 'D1200 - R600 - C2100mm', 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `stars` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `content`, `stars`, `created_at`, `id_product`, `id_user`) VALUES
(1, 'Sản phẩm nice !!', 4, '13/11/2023', 1, 1),
(2, 'Sản phẩm tốt !!!', 5, '13/11/2023', 1, 1),
(5, 'Hang qua dep', 5, '2023-11-26', 2, 3),
(6, 'Hang tuyet voi', 4, '2023-11-26', 3, 3),
(7, 'Hang chat luong cao', 5, '2023-11-27', 3, 7),
(8, 'Sản phẩm tốt quá', 5, '2023-12-02', 2, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tell` varchar(13) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `tell`, `full_name`, `password`, `address`, `birthday`, `avatar`, `role`, `is_deleted`) VALUES
(1, 'abc@gmail.com', '023466789', 'Nguyen Van Anh', '123456', 'Hà Nội', '2023-11-25', 'roronoa-zoro.jpg', 1, 0),
(3, 'anhvanhoa.it@gmail.com', '098765432', 'Hoang Duy Khanh', '654321', 'Ha Nôi', '2023-11-02', '340080370_920826449186570_378768722843621066_n.jpg', 0, 0),
(7, 'manage@gmail.com', '0328742632342', 'Manage Web', '654321', 'Hai duong', '2023-11-22', '', 2, 0),
(10, 'user@gmail.com', '9898796', 'Ơ quá nhiều', '123456', 'Hà Nam', '2023-11-08', '', 0, 0),
(12, 'uuser@gmail.com', '', 'Ơ quá nhiều', 'asdfgh', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) NOT NULL,
  `code` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL,
  `unit` tinyint(1) NOT NULL DEFAULT 0,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `discount`, `unit`, `start`, `end`, `is_deleted`) VALUES
(1, 'Adc50k0', 10, 0, '2023-12-02', '2023-12-10', 0),
(2, 'BCDV100k', 20, 0, '2023-11-30', '2023-12-01', 0),
(3, 'sdfhjsdf', 25, 0, '2023-11-30', '2023-12-05', 0),
(4, 'ssdsfd', 15, 0, '2023-11-23', '2023-12-02', 0),
(5, 'dsfsdfD', 7, 0, '2023-11-24', '2023-11-29', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsdf` (`id_user`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsdssd` (`id_user`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_products_detail` (`id_product_detail`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_categori` (`id_category`);

--
-- Chỉ mục cho bảng `products_bill`
--
ALTER TABLE `products_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fdfdfd` (`id_product_detail`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `products_cart`
--
ALTER TABLE `products_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsdsd` (`id_cart`),
  ADD KEY `id_product_detail` (`id_product_detail`);

--
-- Chỉ mục cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsds` (`id_product`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `reviews_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `products_bill`
--
ALTER TABLE `products_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `products_cart`
--
ALTER TABLE `products_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `dsdf` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `dsdssd` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_product_detail`) REFERENCES `products_detail` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lk_categori` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `products_bill`
--
ALTER TABLE `products_bill`
  ADD CONSTRAINT `fdfdfd` FOREIGN KEY (`id_product_detail`) REFERENCES `products_detail` (`id`),
  ADD CONSTRAINT `products_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`);

--
-- Các ràng buộc cho bảng `products_cart`
--
ALTER TABLE `products_cart`
  ADD CONSTRAINT `products_cart_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `products_cart_ibfk_2` FOREIGN KEY (`id_product_detail`) REFERENCES `products_detail` (`id`);

--
-- Các ràng buộc cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `dsds` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

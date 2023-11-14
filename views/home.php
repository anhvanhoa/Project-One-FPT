<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nội thất Nhà Xinh | Nội thất cao cấp</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/asset/js/main.js" defer></script>
    <link rel="stylesheet" href="/asset/css/swiper-bundle.min.css" />
</head>

<body>
    <div class="bg-white">
        <?php include('partials/header.php') ?>
        <div class="relative isolate bg-cover bg-bottom bg-[url('/asset/images/banner.jpg')] h-[500px]">
            <div class="bg-black/30 absolute inset-0 flex flex-col items-center justify-center w-full px-72">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                        Thiết kế nội thất Nhà Xinh
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-white">
                        Với kinh nghiệm hơn 23 năm trong lĩnh vực thiết kế và hoàn thiện nội thất cùng đội ngũ thiết
                        kế chuyên nghiệp, Nhà Xinh mang đến giải pháp toàn diện trong nội thất.
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-16">
                    <h2 class="text-2xl font-bold text-gray-900">Sản phẩm bán chạy</h2>
                    <?php include('components/selling.php') ?>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-16 gap-y-2 px-4 py-20 sm:px-6 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Cửa hàng của chúng tôi</h2>
                    <dl class="mt-8 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="font-medium text-lg text-gray-900">Cửa hàng tại Hồ Chí Minh</dt>
                            <dd class="mt-2 text-gray-500">
                                107 - 109 Xa Lộ Hà Nội, Phường Thảo Điền, Quận 2, Thành phố Hồ Chí Minh
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="font-medium text-lg text-gray-900">Cửa hàng tại Hà Nội</dt>
                            <dd class="mt-2 text-gray-500">
                                Tầng 2, Vincom Mega Mall, KĐT Vinhomes Smart City, Phường Đại Mỗ, Quận Nam Từ Liêm,
                                Hà Nội
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:gap-8 mt-10">
                    <img src="/asset/images/store-1.jpg" alt="Walnut card tray with white powder coated steel divider and 3 punchout holes." class="rounded-lg bg-gray-100 aspect-video object-cover" />
                    <img src="/asset/images/store-3.jpg" alt="Side of walnut card tray with card groove and recessed card area." class="rounded-lg bg-gray-100 aspect-video object-cover" />
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sản phẩm gợi ý</h2>
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <?php include('components/product.php') ?>
                </div>
                <div class="flex justify-center mt-8">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-6 rounded">Loading</button>
                </div>
            </div>
        </div>
        <?php include('partials/footer.php') ?>
        <script src="/asset/js/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                keyboard: {
                    enabled: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>
    </div>
</body>

</html>
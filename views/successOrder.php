<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <title>Thông tin thanh toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white">
        <?php include('partials/header.php') ?>
        <main>
            <div class="bg-white mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-4">
                <main class="grid place-items-center bg-white px-6 py-24 lg:px-8">
                    <div class="text-center">
                        <p class="text-base font-semibold text-indigo-600">Thành công</p>
                        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Cảm ơn bạn đã đặt hàng</h1>
                        <p class="mt-6 text-base leading-7 text-gray-600">Cảm ơn bạn đã đặt niềm tin ở chũng tôi</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="?act=orders" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Xem đơn hàng</a>
                            <a href="/" class="text-sm font-semibold text-gray-900">Về trang chủ <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </main>
            </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>

</body>

</html>
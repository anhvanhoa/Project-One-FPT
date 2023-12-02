<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng chi tiết</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div>
        <?php include('partials/header.php') ?>
    </div>
    <main class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex flex-col items-center border-b py-4 sm:flex-row bg-black/70 px-4 rounded-lg text-white">
            <div>
                <a href="#" class="text-lg font-semibold text-white">Mã đơn hàng: #<?= $bill['id'] ?></a>
                <p class="text-sm">Thời gian bắt đầu: <?= $bill['date'] ?></p>
                <p class="text-sm">Thời gian kết thúc: <?= $bill['end_date'] ?></p>
            </div>
            <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                <div class="relative">
                    <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                        <?php if ($bill['status'] == 0) {
                        ?>
                            <span class="font-semibold text-red-500 bg-white px-3 py-2 rounded-md">Đơn đã hủy</span>
                        <?php
                        }
                        foreach ($listStatus as $status) {
                            if ($bill['status'] == 0) continue;
                        ?>
                            <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                <?php
                                if ($status <= $bill['status']) {
                                ?>
                                    <a class="flex h-6 w-6 items-center justify-center rounded-full bg-green-600 text-xs font-semibold" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </a>
                                <?php
                                } elseif ($status == ($bill['status'] + 1)) {
                                ?>
                                    <a class="flex h-6 w-6 items-center justify-center rounded-full bg-orange-400 text-xs font-semibold text-white ring-offset-2" href="#">2</a>
                                <?php
                                } else {
                                ?>
                                    <a class="flex h-6 w-6 items-center justify-center rounded-full text-gray-300/60 bg-gray-400/60 text-xs font-semibold" href="#"><?= $status ?></a>
                                <?php
                                }
                                ?>
                                <span class=""><?= getStatus($status)['name'] ?></span>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-11 mt-8">
            <div class="px-8 sticky top-0">
                <h3 class="text-xl font-semibold">Thông tin nhận hàng</h3>
                <dl class="divide-y divide-gray-100 mt-5">
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Họ & Tên</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p><?= $user['full_name'] ?></p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Số điện thoại</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex">
                            <p><?= $user['tell'] ?></p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Địa chỉ</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p><?= $user['address'] ?></p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Phương thanh toán</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p><?= $bill['payment_method'] ?></p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tổng tiền hàng</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p><?= number_format($bill['total'] + $bill['discount'], 0, '.', '.') ?> &#8363;</p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Giảm giá</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p>- <?= number_format($bill['discount'], 0, '.', '.') ?> &#8363;</p>
                        </dd>
                    </div>
                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Phí vận chuyển</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p>- 0 &#8363;</p>
                        </dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xl font-medium leading-6 text-gray-900">Thành tiền</dt>
                        <dd class="mt-1 text-xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <p class=""><?= number_format($bill['total'], 0, '.', '.') ?> &#8363;</p>
                        </dd>
                    </div>
                </dl>
                <?php
                if ($bill['status'] == 1) {
                ?>
                    <a href="?act=cancel-order&id=<?= $bill['id'] ?>" class="inline-block mt-2 py-1 px-4 rounded-md font-medium text-white bg-red-500">Hủy đơn</a>
                <?php
                }
                ?>
            </div>
            <div>
                <h3 class="text-xl font-semibold">Sản phẩm</h3>
                <?php
                foreach ($products as $product) {
                    extract($product);
                ?>
                    <div class="flex py-3 border-b">
                        <div class="h-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            <img src="/asset/images/<?= $image ?>" alt="<?= $name_product ?>" class="h-full w-full aspect-square object-contain object-center" />
                        </div>
                        <div class="ml-4 flex flex-1 flex-col mt-2">
                            <div>
                                <div class="flex justify-between items-start text-base font-medium text-gray-900">
                                    <div>
                                        <h3>
                                            <a href="#"><?= $name_product ?></a>
                                        </h3>
                                        <div class="flex items-center gap-1">
                                            <p class="text-sm w-4 h-4 rounded-lg" style="background-color: <?= $code_color ?>;"></p>
                                            <p class="text-sm capitalize"><?= $color ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="ml-4"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                        <p class="text-gray-500 font-normal text-right text-sm mr-3">x <?= $amount_buy ?></p>
                                        <?php
                                        if ($bill['status'] == 5) {
                                        ?>
                                            <a href="?act=product&id=<?= $id ?>&review=<?= $bill['id'] ?>" class="inline-block ml-6 mt-4 py-1 px-2 rounded-md font-normal text-white bg-sky-500">Đánh giá</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>
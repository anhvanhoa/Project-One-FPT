<?php extract($user) ?>
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
            <div class="bg-white">
                <!-- <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
                <a href="#" class="text-2xl font-bold text-gray-800">sneekpeeks</a>
                <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                    <div class="relative">
                        <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                            <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </a>
                                <span class="font-semibold text-gray-900">Shop</span>
                            </li>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2" href="#">2</a>
                                <span class="font-semibold text-gray-900">Shipping</span>
                            </li>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">3</a>
                                <span class="font-semibold text-gray-500">Payment</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
                <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                    <div class="px-4 pt-8">
                        <p class="text-xl font-medium">Sản phẩm</p>
                        <p class="text-gray-400">Kiểm tra sản phẩm đã chọn</p>
                        <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                            <form action="" method="POST" id="form-checkout">
                                <?php
                                foreach ($products as $product) {
                                    extract($product);
                                ?>
                                    <input type="hidden" value="<?= $id ?>" name="id-product-detail[]">
                                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                                        <img class="m-2 h-24 w-28 rounded-md border object-contain object-center" src="/asset/images/<?= $image ?>" alt="" />
                                        <div class="flex w-full flex-col px-4 py-4">
                                            <span class="font-semibold"><?= $name_product ?></span>
                                            <span class="float-right text-gray-500 capitalize"><?= $color ?></span>
                                            <p class="text-lg font-semibold"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <input type="submit" name="btn-checkout" hidden>
                            </form>
                        </div>
                        <p class="mt-8 text-lg font-medium">Phương thức vận chuyển</p>
                        <div class="mt-5 grid gap-6">
                            <div class="relative">
                                <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                                <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                                <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_1">
                                    <img class="w-14 object-contain" src="asset/images/van-chuyen.jpg" alt="" />
                                    <div class="ml-5">
                                        <span class="mt-2 font-semibold">Hình thức vận chuyển tiêu chuẩn</span>
                                        <p class="text-slate-500 text-sm leading-6">4 - 5 ngày</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                        <p class="text-xl font-medium">Thông tin đặt hàng</p>
                        <p class="text-gray-400">Hoàn tất đơn đặt hàng của bạn bằng cách cung cấp thông tin.</p>
                        <div class="">
                            <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                            <div class="relative">
                                <input disabled value="<?= $email ?>" type="email" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <div class="flex-1">
                                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Tên đặt hàng</label>
                                    <input disabled value="<?= $full_name ?>" type="text" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                                </div>
                                <div>
                                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Số điện thoại</label>
                                    <input disabled value="<?= $tell ?>" type="text" name="billing-zip" class="flex-1 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
                                </div>
                            </div>
                            <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Địa chỉ</label>
                            <div class="flex">
                                <input disabled value="<?= $address ?>" type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
                            </div>
                            <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Mã giảm giá</label>
                            <div class="relative flex items-center gap-3">
                                <input type="text" id="code-discount" maxlength="8" class="uppercase w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="NHAXINH20" />
                                <!-- <a id="btn-code" class="w-1/5 rounded-md bg-gray-900 py-2 text-center font-medium text-white" href="">Áp dụng</a> -->
                                <button id="btn-code" class="w-1/5 rounded-md bg-gray-900 py-2 text-center font-medium text-white">Áp dụng</button>
                            </div>
                            <p class="ml-1 uppercase"><?= $cartUser['code'] ?></p>
                            <div class="flex items-center justify-between mt-4">
                                <p class="text-sm font-medium text-gray-900">Phương thức thanh toán:</p>
                                <p class="font-semibold text-gray-900">Thanh toán khi nhận hàng</p>
                            </div>
                            <div class="mt-6 border-t border-b py-2">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">Tổng tiền đơn hàng</p>
                                    <p class="font-semibold text-gray-900"><?= number_format($cartUser['total_sub'], 0, '.', '.') ?> &#8363;</p>
                                </div>
                                <div class="flex items-center justify-between mt-2 <?= $cartUser['discount'] ? '' : 'hidden' ?>">
                                    <p class="text-sm font-medium text-gray-900">Giảm giá</p>
                                    <p class="font-semibold text-gray-900">- <?= number_format($cartUser['discount'], 0, '.', '.') ?> &#8363;</p>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <p class="text-sm font-medium text-gray-900">Vận chuyển</p>
                                    <p class="font-semibold text-gray-900">Miễn phí</p>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Tổng</p>
                                <p class="text-2xl font-semibold text-gray-900"><?= number_format($cartUser['total'], 0, '.', '.') ?> &#8363;</p>
                            </div>
                        </div>
                        <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Đặt hàng</button>
                    </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>
    <script>
        const inputCode = document.querySelector("#code-discount");
        const formCheckout = document.querySelector("#form-checkout");
        const btn = document.querySelector("#btn-code");
        const btnCheckout = document.querySelector("input[name='btn-checkout']");
        btn.onclick = () => {
            btnCheckout.click()
        }
        inputCode.oninput = () => {
            formCheckout.action = '?act=checkout&code-discount=' + inputCode.value
        }
    </script>
</body>

</html>
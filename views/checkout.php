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
            <div id="sticky-banner" tabindex="-1" class="hidden border-orange-400 bg-orange-100 fixed bottom-0 start-0 z-50 justify-between w-full p-4 border-t">
                <div class="flex items-center mx-auto">
                    <p class="flex items-center text-base text-orange-600 font-semibold">
                        <span id="message-error"></span>
                    </p>
                </div>
            </div>
            <div class="bg-white">
                <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                    <div class="px-4 pt-8">
                        <p class="text-xl font-medium">Sản phẩm</p>
                        <p class="text-gray-400">Kiểm tra sản phẩm đã chọn</p>
                        <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                            <form action="" method="POST" id="form-checkout">
                                <?php
                                $i = -1;
                                foreach ($products as $product) {
                                    $i++;
                                    extract($product);
                                ?>
                                    <input type="hidden" value="<?= $id ?>" name="id-cart-detail[]">
                                    <input type="hidden" value="<?= $amount_buy ?>" name="amount-buy[]">
                                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                                        <img class="m-2 h-24 w-28 rounded-md border object-contain object-center" src="/asset/images/<?= $image ?>" alt="" />
                                        <div class="flex w-full flex-col px-4 py-4">
                                            <span class="font-semibold"><?= $name_product ?></span>
                                            <span class="float-right text-gray-500 capitalize"><?= $color ?></span>
                                            <div class="flex justify-between">
                                                <p class="text-lg font-semibold"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                                <p><?= $amount_buy ?></p>
                                            </div>
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
                                <input id="required" required value="<?= $email ?>" type="email" class="pointer-events-none w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <div class="flex-1">
                                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Tên đặt hàng</label>
                                    <input id="required" required value="<?= $full_name ?>" type="text" class="pointer-events-none w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                                </div>
                                <div>
                                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Số điện thoại</label>
                                    <input id="required" value="<?= $tell ?>" type="text" name="billing-zip" class="pointer-events-none flex-1 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" required />
                                </div>
                            </div>
                            <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Địa chỉ</label>
                            <div class="flex">
                                <input id="required" value="<?= $address ?>" type="text" id="card-no" name="card-no" class="pointer-events-none w-full rounded-md border border-gray-200 px-2 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" required />
                            </div>
                            <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Mã giảm giá</label>
                            <div class="relative flex items-center gap-3">
                                <input type="text" id="code-discount" maxlength="8" class="uppercase w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="NHAXINH20" />
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
                        <form id="order-form" action="?act=success-order" method="POST">
                            <?php
                            foreach ($cartUser as $key => $value) {
                                if (is_array($value))  $value = json_encode($value);
                                if ($value == null)  $value = json_encode($value);
                            ?>
                                <input type="hidden" value='<?= $value ?>' name="<?= $key ?>">
                            <?php
                            }
                            ?>
                            <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Đặt hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>
    <script>
        const inputCode = document.querySelector("#code-discount");
        const formCheckout = document.querySelector("#form-checkout");
        const btn = document.querySelector("#btn-code");
        const orderForm = document.querySelector("#order-form");
        const btnCheckout = document.querySelector("input[name='btn-checkout']");
        btn.onclick = () => {
            btnCheckout.click()
        }
        inputCode.oninput = () => {
            formCheckout.action = '?act=checkout&code-discount=' + inputCode.value
        }
        const required = document.querySelectorAll('input[id="required"]');
        const stickyBanner = document.querySelector('#sticky-banner'),
            messageError2 = stickyBanner.querySelector('#message-error');
        orderForm.onsubmit = (e) => {
            let isCheck = false
            required.forEach(item => {
                if (!item.value) isCheck = true;
            });
            if (isCheck) {
                e.preventDefault()
                stickyBanner.classList.toggle('hidden');
                stickyBanner.classList.toggle('flex');
                messageError2.innerHTML = "Vui lòng cập nhật đầy đủ thông tin tài khoản";
                setTimeout(() => {
                    stickyBanner.classList.toggle('hidden');
                    stickyBanner.classList.toggle('flex');
                    messageError2.innerHTML = "";
                }, 2000);
            }
        }
    </script>
</body>

</html>
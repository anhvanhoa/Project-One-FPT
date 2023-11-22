<?php extract($cartUser) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏi hàng</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
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
            <div class="relative z-10 my-10 px-2 md:px-8 mb-36">
                <div class="pointer-events-auto lg:max-w-7xl mx-auto">
                    <div class="flex h-full flex-col bg-white">
                        <form id="form-cart" method="POST" action="?act=delete-cart">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-3xl font-medium text-gray-900 py-2" id="slide-over-title">
                                        Giỏi hàng
                                    </h2>
                                </div>
                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            <?php if (count($carts) == 0) { ?>
                                                <h4 class="py-8 text-center text-red-600 font-semibold">Giỏi hàng trống</h4>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            foreach ($carts as $cart) {
                                                extract($cart);
                                            ?>
                                                <li class="flex py-6">
                                                    <input id="checkbox-<?= $id ?>" type="checkbox" name="id-cart-detail[]" value="<?= $id ?>" class="mr-4 w-4" />
                                                    <input type="checkbox" hidden name="amount-buy[]" value="<?= $amount_buy ?>" />
                                                    <label for="checkbox-<?= $id ?>" class="h-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img src="/asset/images/<?= $image ?>" alt="<?= $name_product ?>" class="h-full w-full aspect-square object-contain object-center" />
                                                    </label>
                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <a href="#"><?= $name_product ?></a>
                                                                </h3>
                                                                <p class="ml-4"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                                            </div>
                                                            <div class="flex items-center gap-1">
                                                                <p class="mt-1 text-sm w-4 h-4 rounded-lg" style="background-color: #<?= $code_color ?>;"></p>
                                                                <p class="text-sm capitalize"><?= $color ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <div class="flex">
                                                                <div class="flex items-center justify-between bg-gray-100 mt-4 rounded-md text-sm px-1 py-0.5">
                                                                    <input min="1" max="<?= $amount ?>" id='amount' class="pl-1 min-w-10 max-w-[50px]" type="number" value="<?= $amount_buy ?>">
                                                                    <a data-id="<?= $id ?>" href="#" class="text-gray-600 cursor-pointer hover:text-indigo-600 p-1">
                                                                        Xác nhận
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a href="?act=delete-cart&id=<?= $id ?>" class="px-2 font-medium text-red-600 hover:text-red-400">
                                                                Xóa
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-lg font-medium text-gray-900">
                                    <p>Tổng tiền</p>
                                    <p><?= number_format($total, 0, '.', '.') ?> &#8363;</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Vận chuyển và thuế được tính khi thanh toán.</p>
                                <div class="mt-6 flex justify-end text-center text-sm text-gray-500">
                                    <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Tiếp tục mua sắm
                                        <span aria-hidden="true"> &rarr;</span>
                                    </a>
                                </div>
                            </div>
                            <div id="action" class="mt-6 flex gap-5 pointer-events-none opacity-70">
                                <button name="btn-delete" type="submit" class="flex items-center justify-center rounded-md border border-transparent bg-red-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-700">Xóa</button>
                                <button name="btn-checkout" type="submit" class="flex flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Thanh toán</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>
    <script>
        const inputChecks = document.querySelectorAll('input[name="id-cart-detail[]"]');
        const btnAction = document.getElementById('action');
        const amounts = document.querySelectorAll('#amount');
        const stickyBanner = document.querySelector('#sticky-banner'),
            messageError2 = stickyBanner.querySelector('#message-error');
        const btnDelete = document.querySelector('button[name="btn-delete"]'),
            form = document.querySelector('#form-cart'),
            btnCheckout = document.querySelector('button[name="btn-checkout"]');
        btnDelete.onmouseenter = () => form.action = '?act=delete-cart';
        btnCheckout.onmouseenter = () => form.action = '?act=checkout';
        inputChecks.forEach(item => {
            item.onchange = () => {
                item.nextElementSibling.checked = item.checked;
                checkInput();
            };
        })
        amounts.forEach(amount => {
            amount.onfocus = () => {
                let amount_buy = amount.value;
                amount.onblur = () => {
                    if (!amount.value || amount.value == 0) {
                        amount.value = amount_buy;
                    } else {
                        const id = amount.nextElementSibling.dataset.id;
                        amount.nextElementSibling.href = `?act=cart&amount=${amount.value}&id=${id}`
                    }
                }
            }
        })

        function checkInput() {
            let check = false;
            inputChecks.forEach(item => {
                if (item.checked) check = true;
            })
            if (check) {
                btnAction.classList.remove('pointer-events-none');
                btnAction.classList.remove('opacity-70');
            } else {
                btnAction.classList.add('pointer-events-none');
                btnAction.classList.add('opacity-70');
            }
        }
        form.onsubmit = (e) => {
            let isCheck = false
            inputChecks.forEach(item => {
                if (item.checked) isCheck = true
            })
            if (!isCheck) {
                e.preventDefault();
                stickyBanner.classList.toggle('hidden');
                stickyBanner.classList.toggle('flex');
                messageError2.innerHTML = "Vui lòng chọn sản phẩm";
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
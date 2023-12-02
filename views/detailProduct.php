<?php extract($productDetail) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <title><?= $name_product ?></title>
    <link rel="stylesheet" href="/asset/css/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white">
        <div id="sticky-banner" tabindex="-1" class="hidden border-orange-400 bg-orange-100 fixed bottom-0 start-0 z-50 justify-between w-full p-4 border-t">
            <div class="flex items-center mx-auto">
                <p class="flex items-center text-base text-orange-600 font-semibold">
                    <span id="message-error"></span>
                </p>
            </div>
        </div>
        <?php include('partials/header.php') ?>
        <main>
            <div class="bg-white">
                <div class="pt-6">
                    <nav aria-label="Breadcrumb">
                        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                            <li>
                                <div class="flex items-center">
                                    <a href="#" class="mr-2 text-sm font-medium text-gray-900"><?= $name_category ?></a>
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                    </svg>
                                </div>
                            </li>
                            <li class="text-sm">
                                <p aria-current="page" class="font-medium text-gray-500 hover:text-gray-600"><?= $name_product ?></p>
                            </li>
                        </ol>
                    </nav>
                    <!-- Product info -->
                    <div class="mx-auto max-w-2xl px-4 pb-16 pt-4 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-4">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper select-none">
                                    <div class="swiper-slide">
                                        <div class="h-[430px]">
                                            <img src="/asset/images/<?= $thumbnail ?>" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center rounded-lg overflow-hidden" />
                                        </div>
                                    </div>
                                    <?php foreach ($images as $img) {
                                        extract($img);
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="h-[430px]">
                                                <img src="/asset/images/<?= $image ?>" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center rounded-lg overflow-hidden" />
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="swiper-button-next btn-next-img"></div>
                                <div class="swiper-button-prev btn-prev-img"></div>
                            </div>
                            <h1 class="mt-4 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                                <?= $name_product ?>
                            </h1>
                        </div>
                        <!-- Options -->
                        <div class="mt-4 lg:row-span-3 lg:mt-0 lg:sticky lg:top-24 lg:h-screen">
                            <h2 class="sr-only">Product information</h2>
                            <div class="flex items-end gap-5">
                                <p class="text-3xl tracking-tight text-gray-900 font-medium"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                <del class="text-xl tracking-tight text-gray-500 font-medium"><?= number_format($origin_price, 0, '.', '.') ?> &#8363;</del>
                            </div>
                            <!-- Reviews -->
                            <div class="mt-6">
                                <h3 class="sr-only">Reviews</h3>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <p class="pr-2"><?= (float)$avg_star ?></p>
                                        <?php
                                        for ($i = 0; $i < 5; $i++) {
                                            $avg_star = floor((float)$avg_star);
                                        ?>
                                            <svg class="<?= $i < $avg_star ? 'text-orange-500' : 'text-gray-200' ?> h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                            </svg>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <p class="sr-only"> 4 out of 5 stars</p>
                                    <a href="#reviews" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500"><?= count($reviews) ?> đánh giá</a>
                                </div>
                            </div>
                            <form class="mt-10" method="POST" action="">
                                <div>
                                    <h3 class="font-medium text-gray-900">Màu sắc</h3>
                                    <fieldset class="mt-4">
                                        <legend class="sr-only">Choose a color</legend>
                                        <div class="flex items-center space-x-3">
                                            <?php foreach ($product_details as $value) {
                                                extract($value)
                                            ?>
                                                <label data-id="<?= $id ?>" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                                    <input type="radio" name="color-choice" value="<?= $amount ?>" class="sr-only" aria-labelledby="color-choice-0-label" />
                                                    <span id="color-choice-0-label" class="sr-only">White</span>
                                                    <span aria-hidden="true" style="background-color: <?= $code_color ?>;" class="h-8 w-8 rounded-full border border-black border-opacity-10"></span>
                                                </label>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="mt-4">
                                    <h3 class="font-medium text-gray-900">Số lượng</h3>
                                    <div class="flex">
                                        <div class="flex items-center justify-between bg-gray-100 mt-4 p-1 rounded-md">
                                            <div id="plus" class="p-1 text-gray-600 cursor-pointer hover:text-indigo-600 hover:bg-indigo-800/20 rounded-[50%]">
                                                <svg class="p-[2px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12h6m6 0h-6m0 0V6m0 6v6" />
                                                </svg>
                                            </div>
                                            <div class="px-2 text-lg">
                                                <p data-max="<?= $product_details[0]['amount'] ?>" id='amount'>1</p>
                                            </div>
                                            <div id="minus" class="p-1 text-gray-600 cursor-pointer hover:text-indigo-600 hover:bg-indigo-800/20 rounded-[50%]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                                                    <path fill="currentColor" d="M26 17H10a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2Z" class="clr-i-outline clr-i-outline-path-1" />
                                                    <path fill="none" d="M0 0h36v36H0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product-detail">
                                <div class="mt-8">
                                    <h3 class=" font-medium text-gray-900">Vật liệu</h3>
                                    <p><?= $material ?></p>
                                </div>
                                <!-- Sizes -->
                                <div class="mt-5">
                                    <div class="">
                                        <h3 class="font-medium text-gray-900">Kích thước</h3>
                                        <p><?= $size ?></p>
                                    </div>
                                </div>
                                <input type="hidden" name="amount" value='1'>
                                <button name="add-cart" type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-sky-500 px-8 py-3 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                    Thêm giỏ hàng
                                </button>
                            </form>
                        </div>
                        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-6 lg:pr-8 lg:pt-6">
                            <!-- Description and details -->
                            <div>
                                <h3 class="sr-only">Description</h3>
                                <div class="space-y-6">
                                    <p class="text-lg text-gray-900">
                                        <?= $description ?>
                                    </p>
                                </div>
                            </div>
                            <?php if (count($product_suggests)) { ?>
                                <h2 class="mt-6 text-xl font-bold tracking-tight text-gray-900">Sản phẩm gợi ý</h2>
                            <?php
                            }
                            ?>
                            <div>
                                <div class="swiper mySwiper-1">
                                    <div class="swiper-wrapper">
                                        <?php
                                        for ($i = 0; $i < count($product_suggests); $i += 3) {
                                            $product_suggest = array_slice($product_suggests, $i, 3);
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="mt-6 grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-3 xl:gap-x-8">
                                                    <?php
                                                    foreach ($product_suggest as $value) {
                                                        extract($value);
                                                    ?>
                                                        <div class="group relative">
                                                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-white lg:aspect-none group-hover:opacity-75 shadow-md">
                                                                <img src="/asset/images/<?= $thumbnail ?>" alt="<?= $name_product ?>" class="h-full w-full aspect-video object-cover object-center lg:h-full lg:w-full" />
                                                            </div>
                                                            <div class="mt-4">
                                                                <div>
                                                                    <h3 class="text-lg text-gray-700">
                                                                        <a href="/?act=product&id=<?= $id ?>">
                                                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                                                            <?= $name_product ?>
                                                                        </a>
                                                                    </h3>
                                                                    <p class="text-base font-medium text-gray-900"><?= number_format($price, 0, ',', '.') ?> &#8363;</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="swiper-button-next btn-next-pro"></div>
                                    <div class="swiper-button-prev btn-prev-pro"></div>
                                </div>
                            </div>
                            <div id="reviews" class="mt-8">
                                <section class="bg-white antialiased">
                                    <div class="mx-auto">
                                        <div class="flex justify-between items-center mb-6">
                                            <h2 class="text-lg lg:text-xl font-bold text-gray-900">Đánh giá <?= count($reviews) ?></h2>
                                        </div>
                                        <form class="mb-6 <?= $isReview ? 'block' : 'hidden' ?>" action="?act=review" method="POST">
                                            <div class="flex gap-x-6">
                                                <div class="flex-1 py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                                                    <label for="comment" class="sr-only">Your comment</label>
                                                    <input type="hidden" name="stars" required>
                                                    <input type="hidden" name="id-product" value="<?= $productDetail['id'] ?>">
                                                    <textarea id="comment" name="content" rows="6" class="resize-none px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Viết đánh giá ....." required></textarea>
                                                </div>
                                                <div>
                                                    <div class="flex space-x-1">
                                                        <svg id='star' class="text-gray-200 cursor-pointer h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                        <svg id='star' class="text-gray-200 cursor-pointer h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                        <svg id='star' class="text-gray-200 cursor-pointer h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                        <svg id='star' class="text-gray-200 cursor-pointer h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                        <svg id='star' class="text-gray-200 cursor-pointer h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-red-600 text-sm" id="message-error"></p>
                                                </div>
                                            </div>
                                            <button type="submit" name="btn-review" id="review" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center bg-sky-500 rounded-lg text-white">
                                                Đánh giá
                                            </button>
                                            <button type="reset" id="cancel-review" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center bg-gray-200 rounded-lg">
                                                Hủy
                                            </button>
                                        </form>
                                        <?php
                                        if (empty($reviews)) echo "Không có đánh giá";
                                        foreach ($reviews as $review) {
                                            extract($review);
                                        ?>
                                            <article class="mt-8 text-base bg-white rounded-lg">
                                                <footer class="flex justify-between items-center mb-2">
                                                    <div class="flex items-center">
                                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="/asset/images/<?= $avatar ? $avatar : 'avatar-default.jpg' ?>"><?= $full_name ?></p>
                                                        <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08" title="February 8th, 2022"><?= $created_at ?></time></p>
                                                    </div>
                                                </footer>
                                                <p class="text-gray-500"><?= $content ?></p>
                                                <div class="flex items-center mt-2 space-x-1">
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {
                                                    ?>
                                                        <svg class="<?= $i <= $stars ? 'text-orange-500' : 'text-gray-200' ?> h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                        </svg>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </article>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>
    <script>
        const chooseColors = document.querySelectorAll('input[name="color-choice"]'),
            btnAddCart = document.querySelector('button[name="add-cart"]'),
            inputProductDetail = document.querySelector('input[name="product-detail"]');
        const plus = document.querySelector('#plus'),
            amount = document.querySelector('#amount'),
            inputAmount = document.querySelector('input[name="amount"]'),
            minus = document.querySelector('#minus');
        let amountBuy = 1;
        amountBuy = amount.dataset.max;
        chooseColors.forEach((item) => {
            const parent = item.parentElement;
            let idPro = parent.dataset.id;
            item.onclick = () => {
                amountBuy = item.value;
                if (Number(amount.innerText) > item.value) amount.innerText = item.value;
                const choice = document.querySelector('.ring-offset-1.ring-2');
                if (choice || parent == choice) {
                    choice.classList.remove('ring-offset-1');
                    choice.classList.remove('ring-2');
                    inputProductDetail.value = '';
                    if (parent == choice) return;
                }
                parent.classList.add('ring-offset-1');
                parent.classList.add('ring-2');
                inputProductDetail.value = idPro;
            };
        });

        const stars = document.querySelectorAll('#star');
        // const cancelReview = document.querySelector("#cancel-review");
        const review = document.querySelector('#review');
        const inputStar = document.querySelector('input[name="stars"]');
        const messageError = document.querySelector('#message-error');
        stars.forEach((item, index) => {
            item.onclick = () => {
                inputStar.value = index + 1;
                stars.forEach((item) => item.classList.remove('text-orange-500'));
                messageError.innerText = '';
                for (let i = 0; i < index + 1; i++) {
                    stars[i].classList.add('text-orange-500');
                }
            };
        });
        // cancelReview.onclick = () => {
        //     stars.forEach((item) => item.classList.remove('text-orange-500'));
        //     inputStar.value = 0;
        // };

        // review.onclick = (e) => {
        //     if (!inputStar.value) {
        //         e.preventDefault();
        //         messageError.innerText = 'Vui lòng chọn sao';
        //     }
        // };

        plus.onclick = () => {
            if (Number(amount.innerText) >= amountBuy) return;
            inputAmount.value = amount.innerText = Number(amount.innerText) + 1;
        };

        minus.onclick = () => {
            if (Number(amount.innerText) <= 1) return;
            amount.innerText = Number(amount.innerText) - 1;
            inputAmount.value = Number(amount.innerText) - 1;
        };

        const stickyBanner = document.querySelector('#sticky-banner'),
            messageError2 = stickyBanner.querySelector('#message-error');
        btnAddCart.onclick = (e) => {
            if (!inputProductDetail.value) {
                e.preventDefault();
                stickyBanner.classList.toggle('hidden');
                stickyBanner.classList.toggle('flex');
                messageError2.innerHTML = "Vui lòng chọn sản phẩm";
                setTimeout(() => {
                    stickyBanner.classList.toggle('hidden');
                    stickyBanner.classList.toggle('flex');
                    messageError.innerHTML = "";
                }, 2000);
            }
        }
        if (messageError2.innerText) {
            stickyBanner.classList.toggle('hidden');
            stickyBanner.classList.toggle('flex');
            setTimeout(() => {
                stickyBanner.classList.toggle('hidden');
                stickyBanner.classList.toggle('flex');
                messageError2.innerHTML = "";
            }, 2000);
        }
    </script>
    <script src="/asset/js/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
            },
            navigation: {
                nextEl: '.btn-next-img',
                prevEl: '.btn-prev-img',
            },
        });
        new Swiper('.mySwiper-1', {
            slidesPerView: 1,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
            },
            navigation: {
                nextEl: '.btn-next-pro',
                prevEl: '.btn-prev-pro',
            },
        });
    </script>
</body>

</html>
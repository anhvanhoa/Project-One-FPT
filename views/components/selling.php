<div class="relative">
    <div class="absolute inset-x-0 -z-1 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="
                                    clip-path: polygon(
                                        74.1% 44.1%,
                                        100% 61.6%,
                                        97.5% 26.9%,
                                        85.5% 0.1%,
                                        80.7% 2%,
                                        72.5% 32.5%,
                                        60.2% 62.4%,
                                        52.4% 68.1%,
                                        47.5% 58.3%,
                                        45.2% 34.5%,
                                        27.5% 76.7%,
                                        0.1% 64.9%,
                                        17.9% 100%,
                                        27.6% 76.8%,
                                        76.1% 97.7%,
                                        74.1% 44.1%
                                    );
                                "></div>
    </div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            for ($i = 0; $i < count($productsSelling); $i += 3) {
                $productSelling = array_slice($productsSelling, $i, 3);
            ?>
                <div class="swiper-slide">
                    <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                        <?php
                        foreach ($productSelling as $value) {
                            extract($value);
                        ?>
                            <div class="group relative">
                                <a href="?act=product&id=<?= $id ?>">
                                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                                        <img src="/asset/images/<?= $thumbnail ?>" alt="<?= $name_product ?>" class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="pl-1 mt-2">
                                        <h3 class="text-lg">
                                            <?= number_format($price, 0, ",", ".") ?> &#8363;
                                        </h3>
                                        <p class="font-semibold text-xl text-gray-900">
                                            <?= $name_product ?>
                                        </p>
                                    </div>
                                </a>
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
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<div class="relative">
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
                                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-80 sm:h-64">
                                        <img src="/asset/images/<?= $thumbnail ?>" alt="<?= $name_product ?>" class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="pl-1 mt-2 text-white">
                                        <h3 class="text-xl">
                                            <?= $name_product ?>
                                        </h3>
                                        <p class="text-2xl font-semibold">
                                            <?= number_format($price, 0, ",", ".") ?> &#8363;
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
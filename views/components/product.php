<?php
foreach ($products as $product) {
    extract($product);
?>
    <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-white lg:aspect-none group-hover:opacity-75 shadow-md">
            <img src="/asset/images/<?= $thumbnail ?>" alt="<?= $name_product ?>" class="aspect-video w-full object-cover object-center lg:h-full lg:w-full" />
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
<?php } ?>
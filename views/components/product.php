<?php
foreach ($products as $product) {
    extract($product);
?>
    <div class="group relative rounded-sm bg-white overflow-hidden group flex flex-col justify-between">
        <div class="pb-6">
            <div class="w-full overflow-hidden bg-white lg:aspect-none group-hover:opacity-75 border-b">
                <img src="/asset/images/<?= $thumbnail ?>" alt="<?= $name_product ?>" class="aspect-[9/6] w-full object-cover lg:h-full lg:w-full" />
            </div>
            <div class="mt-2 px-4">
                <div>
                    <h3 class="text-lg first-letter:capitalize">
                        <a href="/?act=product&id=<?= $id ?>">
                            <span aria-hidden="true" class="absolute inset-0 p-2">
                            </span>
                            <?= $name_product ?>
                        </a>
                    </h3>
                    <p class="mt-1 inline-block rounded-md text-lg text-rose-500 font-medium"><?= number_format($price, 0, ',', '.') ?> &#8363;</p>
                </div>
            </div>
        </div>
        <div class="text-center font-medium bg-sky-100 text-sky-600 py-2 border border-sky-600 group-hover:bg-sky-600 group-hover:text-white">
            Chi tiết sản phẩm
        </div>
    </div>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Sửa sản phẩm</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto px-4 max-w-6xl py-6 sm:px-6 lg:px-8">
                <div class="flex items-end gap-3">
                    <div class="">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Chọn chi tiêt sản phẩm</label>
                        <div class="mt-2">
                            <select name="id-detail" class="pl-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <?php
                                foreach ($productsDetail as $productDetail) {
                                    extract($productDetail)
                                ?>
                                    <option value="<?= $id ?>"><?= $color ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <a id="edit-detail" href="?act=edit-detail-product&id=<?= $productsDetail[0]['id'] ?>&id-pro=<?= $product['id'] ?>" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Sửa chi tiết sản phẩm</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-6 border-b border-gray-900/10 pb-12">
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Tên sản phẩm</label>
                                            <div class="mt-2">
                                                <input value="<?= $product['name_product'] ?>" required type="text" name="name-product" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Giá bán</label>
                                            <div class="mt-2">
                                                <input value="<?= $product['price'] ?>" required type="number" name="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Giá gốc</label>
                                            <div class="mt-2">
                                                <input value="<?= $product['origin_price'] ?>" required type="number" name="origin-price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Vật liệu</label>
                                            <div class="mt-2">
                                                <input value="<?= $product['material'] ?>" required type="text" name="material" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Danh mục</label>
                                            <div class="mt-2">
                                                <select required name="id-category" class="pl-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        extract($category)
                                                    ?>
                                                        <option <?= $product['id_category'] == $id ? 'selected' : '' ?> value="<?= $id ?>"><?= $name_category ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Mô tả</label>
                                    <div class="mt-2">
                                        <textarea required id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $product['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Hình ảnh</label>
                                    <div class="flex justify-between rounded-lg border border-dashed border-gray-900/25 py-4 px-4 gap-5">
                                        <img class="mt-6 w-1/2 h-72 object-cover" src="/asset/images/<?= $product['thumbnail'] ?>" alt="">
                                        <div class="w-1/2">
                                            <div class=" justify-center flex items-center text-sm leading-6 text-gray-600">
                                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Tải ảnh lên</span>
                                                    <input id="file-upload" name="thumbnail" type="file" class="sr-only pl-2">
                                                </label>
                                            </div>
                                            <img class="w-full h-72 object-cover" id="image" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="?act=products" class="text-sm font-semibold leading-6 text-gray-900">Hủy</a>
                        <button name="update-product" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lưu</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
<script>
    const inputFile = document.querySelector('input[type="file"]');
    const idDetail = document.querySelector('select[name="id-detail"]');
    const image = document.querySelector('#image');
    const btnEdit = document.querySelector('#edit-detail');
    inputFile.onchange = (e) => {
        const file = e.target.files[0];
        const url = URL.createObjectURL(file);
        image.src = url;
    }
    idDetail.onchange = (e) => {
        btnEdit.href = `?act=edit-detail-product&id=${e.target.value}`;
    }
</script>

</html>
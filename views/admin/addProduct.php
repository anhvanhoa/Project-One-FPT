<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Thêm sản phẩm</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto px-4 max-w-6xl py-6 sm:px-6 lg:px-8">
                <div id="alert-border-2"
                    class="<?= $error ? 'flex' : 'hidden' ?> items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        <?= $error ?>
                    </div>
                </div>
                <form action="?act=add-product" method="POST" enctype="multipart/form-data">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-6 border-b border-gray-900/10 pb-12">
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Tên sản
                                                phẩm</label>
                                            <div class="mt-2">
                                                <input maxlength="255" required type="text" name="name-product"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Giá
                                                bán</label>
                                            <div class="mt-2">
                                                <input min="1" required type="number" name="price"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Giá
                                                gốc</label>
                                            <div class="mt-2">
                                                <input min="1" required type="number" name="origin-price"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900">Vật
                                                liệu</label>
                                            <div class="mt-2">
                                                <input maxlength="100" required type="text" name="material"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <!-- <div class="sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Ngày đăng</label>
                                            <div class="mt-2">
                                                <input required type="date" name="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div> -->
                                        <div class="sm:col-span-3">
                                            <label for="country"
                                                class="block text-sm font-medium leading-6 text-gray-900">Danh
                                                mục</label>
                                            <div class="mt-2">
                                                <select required name="id-category"
                                                    class="pl-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        extract($category)
                                                            ?>
                                                        <option value="<?= $id ?>">
                                                            <?= $name_category ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Mô
                                        tả</label>
                                    <div class="mt-2">
                                        <textarea required id="about" name="description" rows="3"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="cover-photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Hình ảnh</label>
                                    <div
                                        class="flex justify-between rounded-lg border border-dashed border-gray-900/25 py-4 px-4">
                                        <div
                                            class="w-1/2 justify-center flex items-center text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Tải ảnh lên</span>
                                                <input required id="file-upload" name="thumbnail" type="file"
                                                    class="sr-only pl-2">
                                            </label>
                                        </div>
                                        <img class="w-1/2 h-72 object-cover" id="image" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Hủy</button>
                        <button name="add-product" type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tiếp
                            tục</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
<script>
    const inputFile = document.querySelector('input[type="file"]');
    const image = document.querySelector('#image');
    inputFile.onchange = (e) => {
        const file = e.target.files[0];
        const url = URL.createObjectURL(file);
        image.src = url;
    }
</script>

</html>
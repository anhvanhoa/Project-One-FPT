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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Thêm chi tiết sản phẩm</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto px-4 max-w-7xl py-6 sm:px-6 lg:px-8">
                <div id="alert-border-2"
                    class="<?= $error ? 'flex' : 'hidden' ?> items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div id="msg" class="ms-3 text-sm font-medium">
                        <?= $error ?>
                    </div>
                </div>
                <form id="form" method="POST" action="" enctype="multipart/form-data">
                    <p class="mt-2 font-semibold text-lg">Sản phẩm:
                        <?= $pro['name_product'] ?>
                    </p>
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-6 border-b border-gray-900/10 pb-12">
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Số
                                                lượng</label>
                                            <div class="mt-2">
                                                <input value="<?= $productDetail['amount'] ?>" type="number"
                                                    name="amount"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Kích
                                                thước</label>
                                            <div class="mt-2">
                                                <input value="<?= $productDetail['size'] ?>" type="text" name="size"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Tên
                                                màu</label>
                                            <div class="mt-2">
                                                <input value="<?= $productDetail['color'] ?>" type="text" name="color"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="last-name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Mã màu</label>
                                            <div class="mt-2">
                                                <input value="<?= $productDetail['code_color'] ?>" type="color"
                                                    name="code-color" value="#ffffff"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="cover-photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Hình ảnh</label>
                                    <div
                                        class="flex justify-between rounded-lg border border-dashed border-gray-900/25 py-4 px-4 gap-5">
                                        <img class="aspect-video mt-6 w-1/2 object-cover"
                                            src="/asset/images/<?= $productDetail['image'] ?>" alt="">
                                        <div class="w-1/2">
                                            <div
                                                class=" justify-center flex items-center text-sm leading-6 text-gray-600 aspect-video]">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Tải ảnh lên</span>
                                                    <input id="file-upload" name="image" type="file"
                                                        class="sr-only pl-2">
                                                </label>
                                            </div>
                                            <img class="w-full h-72 object-cover" id="image" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-10 col-span-6">
                                    <?php
                                    foreach ($listImage as $img) {
                                        extract($img);
                                        ?>
                                        <div>
                                            <p><a class="text-red-700"
                                                    href="?act=delete-image&id-img=<?= $id ?>&id=9&id-pro=10">Xóa ảnh</a>
                                            </p>
                                            <img src="/asset/images/<?= $image ?>" alt=""
                                                class="aspect-[9/6] w-28 object-cover">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Hình
                                        ảnh khác</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                            <input id="images" type="file" multiple name="images[]"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="janesmith pl-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button name="update-product" type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lưu</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const images = document.querySelector('#images')
        const msg = document.querySelector('#msg')
        const form = document.getElementById('form')
        images.onchange = ({ target }) => {
            if (target.files.length + <?= count($listImage) ?> > 5) {
                msg.parentElement.classList.remove('hidden')
                msg.parentElement.classList.add('flex')
                msg.innerHTML = "Không chọn quá 5 tệp"
                form.onsubmit = (e) => { if (target.files.length + <?= count($listImage) ?> > 5) e.preventDefault() }
            } else {
                msg.parentElement.classList.add('hidden')
                msg.parentElement.classList.remove('flex')
                msg.innerHTML = ""
            }
        }
        const inputFile = document.querySelector('#file-upload');
        const image = document.querySelector('#image');
        inputFile.onchange = (e) => {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            image.src = url;
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thay đổi mật khẩu</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include('partials/header.php') ?>
    <div class="max-w-2xl mx-auto mt-8 mb-12">
        <div id="alert-border-2" class="<?= $error ? 'flex' : 'hidden' ?> items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                <?= $error ?>
            </div>
        </div>
        <form method="POST" action="?act=change-password" enctype="multipart/form-data">
            <div class="space-y-12">
                <div class="pb-4">
                    <h2 class="text-2xl font-semibold leading-7 text-gray-900">Thay đổi mật khẩu</h2>
                </div>
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu hiện tại</label>
                            <div class="mt-2">
                                <input maxlength="50" required type="password" name="pass-current" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" maxlength="50" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu mới</label>
                            <div class="mt-2">
                                <input required name="pass" type="password" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" maxlength="50" class="block text-sm font-medium leading-6 text-gray-900">Nhập lại mật khẩu</label>
                            <div class="mt-2">
                                <input required name="pass-confirm" type="password" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit" name="update-pass" class="rounded-md bg-sky-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cập nhập
                </button>
                <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Hủy</button>
            </div>
        </form>
    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>
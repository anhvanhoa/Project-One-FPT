<!-- <?php extract($account) ?> -->
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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Thông tin tài khoản</h1>
            </div>
        </header>
        <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div>
                <form action="" method="POST">
                    <div class="mt-6 border-t border-gray-100">
                        <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Họ & Tên</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p>
                                        <?= $full_name ?>
                                    </p>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex">
                                    <input name="email" class="bg-white pl-2 pointer-events-none" type="text"
                                        value="<?= $email ?>">
                                    <div class="p-2 cursor-pointer hover:text-indigo-600" id="edit-input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 21 21">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 4a2.121 2.121 0 0 1 0 3l-9.5 9.5l-4 1l1-3.944l9.504-9.552a2.116 2.116 0 0 1 2.864-.125zm-1.5 2.5l1 1" />
                                        </svg>
                                    </div>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Mật khẩu</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex">
                                    <input name="password" class="bg-white pl-2 pointer-events-none" type="text"
                                        value="<?= $password ?>">
                                    <div class="p-2 cursor-pointer hover:text-indigo-600" id="edit-input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 21 21">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 4a2.121 2.121 0 0 1 0 3l-9.5 9.5l-4 1l1-3.944l9.504-9.552a2.116 2.116 0 0 1 2.864-.125zm-1.5 2.5l1 1" />
                                        </svg>
                                    </div>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Số điện thoại</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex">
                                    <input name="tell" class="bg-white pl-2 pointer-events-none" type="text"
                                        value="<?= $tell ?>">
                                    <div class="p-2 cursor-pointer hover:text-indigo-600" id="edit-input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 21 21">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 4a2.121 2.121 0 0 1 0 3l-9.5 9.5l-4 1l1-3.944l9.504-9.552a2.116 2.116 0 0 1 2.864-.125zm-1.5 2.5l1 1" />
                                        </svg>
                                    </div>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Địa chỉ</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p>
                                        <?= $address ?>
                                    </p>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Vai trò</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p>
                                        <?= $role ?>
                                    </p>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Ngày sinh</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p>
                                        <?= $birthday ?>
                                    </p>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Đại diện</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p>
                                        <?= $avatar ?>
                                    </p>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Hành động</dt>
                                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0 flex gap-10">
                                    <button name="update" type="submit"
                                        class="text-base text-indigo-600 font-medium hover:underline underline-offset-2">Cập
                                        nhập</button>
                                    <a href="?act=accounts"
                                        class="text-base text-orange-500 font-medium hover:underline underline-offset-2">Danh
                                        sách</a>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const edits = document.querySelectorAll('#edit-input');
        edits.forEach(ele => {
            ele.onclick = () => {
                ele.previousElementSibling.classList.toggle('pointer-events-none');
                ele.previousElementSibling.focus()
            }
            ele.previousElementSibling.onblur = () => {
                ele.previousElementSibling.classList.toggle('pointer-events-none');
            }
        })
    </script>
</body>

</html>
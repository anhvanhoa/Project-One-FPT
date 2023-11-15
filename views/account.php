<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tài khoản - <?= $user['full_name'] ?></title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include('partials/header.php') ?>
    <div class="max-w-2xl mx-auto mt-8 mb-12">
        <form method="POST" action="?act=account" enctype="multipart/form-data">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-2xl font-semibold leading-7 text-gray-900">Tài khoản</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Đây là thông tin tài khoản của bạn
                    </p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Hình ảnh</label>
                            <div class="mt-6 flex items-center gap-x-3">
                                <img id="avatar-user" src="/asset/images/<?= $user['avatar'] ? $user['avatar'] : 'avatar-default.jpg' ?>" class="w-16 aspect-square rounded-[50%]" alt="">
                                <label for="avatar" class="cursor-pointer rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Thay đổi
                                    <input type="file" name="avatar" hidden id="avatar">
                                </label>
                                <p class="name-img"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Họ & Tên</label>
                            <div class="mt-2">
                                <input required max="200" value="<?= $user['full_name'] ?>" type="text" name="full-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Ngày sinh</label>
                            <div class="mt-2">
                                <input required value="<?= $user['birthday'] ?>" type="date" name="birthday" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input value="<?= $user['email'] ?>" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại</label>
                            <div class="mt-2">
                                <input required value="<?= $user['tell'] ?>" max="11" name="tell" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Địa chỉ</label>
                            <div class="mt-2">
                                <input required value="<?= $user['address'] ?>" type="text" name="address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Hủy</button>
                <button type="submit" name="update" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cập nhập
                </button>
            </div>
        </form>
    </div>
    <?php include('partials/footer.php') ?>
    <script>
        const inputFile = document.querySelector('input[name="avatar"]');
        const nameFile = document.querySelector('.name-img');
        const avatar = document.getElementById('avatar-user');
        inputFile.onchange = ({
            target
        }) => {
            nameFile.innerText = target.files[0].name
            const url = URL.createObjectURL(target.files[0])
            avatar.src = url;
        }
    </script>
</body>

</html>
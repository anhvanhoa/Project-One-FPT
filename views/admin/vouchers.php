<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nhà Xinh</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Danh sách voucher</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="flex mb-4">
                    <a href="/admin?act=add-voucher"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tạo
                        voucher</a>
                </div>
                <div class="flex mt-6 gap-10">
                    <div class="flex-1 rounded-lg shadow">
                        <div class="relative overflow-x-auto sm:rounded-lg max-h-[400px]">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-600">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Mã giảm giá
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Phầm trăm
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Bắt đầu
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kết thúc
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vouchers as $voucher) {
                                        extract($voucher);
                                        ?>
                                        <tr>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                <?= $id ?>
                                            </th>
                                            <td class="px-6 py-4 uppercase">
                                                <?= $code ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $discount ?>%
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $start ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $end ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="/admin?act=edit-voucher&id=<?= $id ?>"
                                                    class="font-medium text-blue-600  hover:underline">Sửa</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
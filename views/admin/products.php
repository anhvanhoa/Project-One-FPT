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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Quản lý sản phẩm</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="flex mb-4">
                    <a href="/admin?act=add-product" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Thêm sản phẩm</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500  ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2  border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tên
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hình ảnh
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Giá bán
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Giá gốc
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mô tả
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Vật liệu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Số lượn bán
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ngày đăng
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Id danh mục
                                </th>
                                <th scope="col" class="px-6 py-3 sticky right-0 bg-slate-300">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $product) {
                                extract($product);
                            ?>
                                <tr class="bg-white hover:bg-gray-50 ">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500  ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2  border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <?= $id ?>
                                    </th>
                                    <td class="px-6 py-4 truncate">
                                        <?= $name_product ?>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <?= $thumbnail ?>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <?= number_format($price, 0, '.', '.') ?> &#8363;
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <?= number_format($origin_price, 0, '.', '.') ?> &#8363;
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="w-52 truncate">
                                            <?= $description ?>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <p class="w-36 truncate">
                                            <?= $material ?>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <p class="w-24 truncate">
                                            <?= $sold ?>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <?= $created_at ?>
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        <p class="w-24 truncate">
                                            <?= $id_category ?>
                                        </p>
                                    </td>
                                    <td class="flex items-center px-6 py-4 sticky right-0 bg-white border-l">
                                        <a href="/admin?act=edit-category" class="font-medium text-blue-600  hover:underline">Sửa</a>
                                        <a href="#" class="font-medium text-red-600 hover:underline ms-3">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
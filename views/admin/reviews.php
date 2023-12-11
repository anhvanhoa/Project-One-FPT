<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nhà Xinh</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Danh sách đánh giá</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
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
                                            Nội dung
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sao
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Thời gian
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            sản phẩm
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tài khoản
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($reviews as $review) {
                                        extract($review);
                                        ?>
                                        <tr>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                <?= $id ?>
                                            </th>
                                            <td class="px-6 py-4 uppercase">
                                                <?= $content ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $stars ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $created_at ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $name_product ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $full_name ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="/admin?act=hidden-review&id=<?= $id ?>&status=1"
                                                    class="<?= $is_deleted == 0 ? '' : 'hidden' ?> font-medium text-red-600  hover:underline">Ẩn</a>
                                                <a href="/admin?act=hidden-review&id=<?= $id ?>&status=0"
                                                    class="<?= $is_deleted != 0 ? '' : 'hidden' ?> font-medium text-blue-600  hover:underline">Hiện</a>
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
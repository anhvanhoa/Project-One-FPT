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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Danh sách đơn hàng</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="flex mt-10 gap-10">
                    <div class="flex-1 rounded-lg shadow">
                        <div class="relative overflow-x-auto sm:rounded-lg max-h-[400px]">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-600">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Id
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ngày
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Người mua
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tiền
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Trạng thái
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($bills as $bill) {
                                        extract($bill);
                                    ?>
                                        <tr>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                <?= $id ?>
                                            </th>
                                            <td class="px-6 py-4">
                                                <?= $date ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $full_name ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= number_format($total, 0, '.', '.') ?> &#8363;
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus($status)['color'] ?>"><?= getStatus($status)['name'] ?></span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="?act=detail-bill&id=<?= $id ?>" class="text-blue-600 font-semibold">Chi tiết</a>
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
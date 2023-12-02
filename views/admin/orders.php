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
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Danh sách đơn hàng</h1>
                <div class="flex gap-4">
                    <form action="">
                        <input type="hidden" name='act' value="bills" class="bg-gray-100 rounded-md px-2 py-2" placeholder="Tìn kiếm danh nục">
                        <input type="date" name='q' class="bg-gray-100 rounded-md px-2 py-2" placeholder="Tìn kiếm đơn hàng">
                        <button type="submit" class="text-white bg-sky-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Tìm</button>
                    </form>
                </div>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <p class="text-xl pt-1.5 mr-2">Trạng thái</p>
                    <nav>
                        <a href="?act=bills" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(2)['color'] ?>">Tất cả</a>
                        <a href="?act=bills&status=0" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(0)['color'] ?>"><?= getStatus(0)['name'] ?></a>
                        <a href="?act=bills&status=1" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(1)['color'] ?>"><?= getStatus(1)['name'] ?></a>
                        <a href="?act=bills&status=2" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(2)['color'] ?>"><?= getStatus(2)['name'] ?></a>
                        <a href="?act=bills&status=3" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(3)['color'] ?>"><?= getStatus(3)['name'] ?></a>
                        <a href="?act=bills&status=4" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(4)['color'] ?>"><?= getStatus(4)['name'] ?></a>
                        <a href="?act=bills&status=5" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(5)['color'] ?>"><?= getStatus(5)['name'] ?></a>
                    </nav>
                </div>
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
                                                <div class="mt-2 <?= $status == 0 || $status == 5 ? 'hidden' : '' ?>">
                                                    <a href="?act=status&id=<?= $id ?>&status=<?= $status + 1 ?>" class="text-blue-600 font-semibold">Cập nhập -></a>
                                                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"><?= getStatus($status + 1)['name'] ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (empty($bills)) {
                            ?>
                                <p class="text-rose-600 py-3 text-center">Không có đơn hàng nào</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
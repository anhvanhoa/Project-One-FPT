<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <title>Thông tin thanh toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white flex flex-col min-h-screen">
        <?php include('partials/header.php') ?>
        <main class="flex-1">
            <div class="bg-white mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8 mt-10">
                <h1 class="text-2xl font-semibold">Danh sách đơn hàng</h1>
                <div class="flex items-center">
                    <p class="text-xl pt-0.5 mr-2">Trạng thái</p>
                    <nav>
                        <a href="?act=orders&status=0" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(0)['color'] ?>"><?= getStatus(0)['name'] ?></a>
                        <a href="?act=orders&status=1" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(1)['color'] ?>"><?= getStatus(1)['name'] ?></a>
                        <a href="?act=orders&status=2" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(2)['color'] ?>"><?= getStatus(2)['name'] ?></a>
                        <a href="?act=orders&status=3" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(3)['color'] ?>"><?= getStatus(3)['name'] ?></a>
                        <a href="?act=orders&status=4" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(4)['color'] ?>"><?= getStatus(4)['name'] ?></a>
                        <a href="?act=orders&status=5" class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus(5)['color'] ?>"><?= getStatus(5)['name'] ?></a>
                    </nav>
                </div>
                <?php
                if (count($bills) == 0) {
                ?>
                    <p class="text-center text-lg text-red-600 mt-8">Chưa có đơn hàng</p>
                <?php
                }
                ?>
                <ul role="list" class="divide-y divide-gray-100 mt-5">
                    <?php
                    foreach ($bills as $bill) {
                        extract($bill);
                    ?>
                        <a href="?act=order&id=<?= $id ?>">
                            <li class="flex justify-between gap-x-6 py-5 cursor-pointer hover:bg-gray-50 px-5 rounded-lg border-b">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-lg text-indigo-500 font-semibold leading-6">#<?= $id ?></p>
                                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">Thời gian: <?= $date ?></p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-lg font-semibold leading-6 text-gray-900"><?= number_format($total, 0, '.', '.') ?> &#8363;</p>
                                    <span class="mt-3 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset <?= getStatus($status)['color'] ?>"><?= getStatus($status)['name'] ?></span>
                                </div>
                            </li>
                        </a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </main>
        <?php include('partials/footer.php') ?>
    </div>
</body>

</html>
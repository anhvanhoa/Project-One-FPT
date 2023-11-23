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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Chi tiết đơn hàng</h1>
            </div>
        </header>
        <main>
            <section class="bg-gray-100 py-10">
                <div class="max-w-2xl mx-auto py-0 md:py-10">
                    <a class="text-blue-600 font-semibold " href="?act=bills">Danh sách đơn hàng</a>
                    <div class="flex justify-between p-6 shadow-md my-3 bg-white">
                        <div>
                            <span class="font-semibold mr-1">Trạng thái:</span>
                            <span><?= getStatus($bill['status'])['name'] ?></span>
                        </div>
                        <div>
                            <a href="?act=status&id=<?= $bill['id'] ?>&status=<?= $bill['status'] + 1 ?>" class="text-blue-600 font-semibold <?= $bill['status'] == 0 || $bill['status'] == 5 ? 'hidden' : '' ?>">Cập nhập</a>
                            <a href="?act=status&id=<?= $bill['id'] ?>&status=0" class="text-red-600 font-semibold ml-2 <?= $bill['status'] != 1 ? 'hidden' : '' ?>">Hủy</a>
                        </div>
                    </div>
                    <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
                        <div class="md:rounded-b-md  bg-white">
                            <div class="p-9 border-b border-gray-200">
                                <div class="space-y-6">
                                    <div class="flex justify-between items-top">
                                        <div class="space-y-4">
                                            <div>
                                                <img class="h-6 object-cover mb-4" src="/asset/images/logo.jpg">
                                            </div>
                                            <div>
                                                <p class="font-medium text-sm text-gray-400 mb-1"> Thông tin </p>
                                                <p> <?= $bill['full_name'] ?> </p>
                                                <p> <?= $bill['tell'] ?> </p>
                                                <p> <?= $bill['address'] ?> </p>
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <div>
                                                <p class="font-bold text-lg"> #<?= $bill['id'] ?> </p>
                                            </div>
                                            <div>
                                                <p class="font-medium text-sm text-gray-400  mb-1"> Thời gian đặt </p>
                                                <p> <?= $bill['date'] ?> </p>
                                            </div>
                                            <div>
                                                <p class="font-medium text-sm text-gray-400"> Thời gian kết thúc </p>
                                                <p> 57 630 182 446 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="w-full divide-y divide-gray-200 text-sm">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Tên sản phẩm </th>
                                        <th scope="col" class="py-3 text-left font-semibold text-gray-400"> </th>
                                        <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Số lượng </th>
                                        <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Giá tiền </th>
                                        <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <?php
                                    foreach ($products as $product) {
                                        extract($product);
                                    ?>
                                        <tr>
                                            <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                                                <div>
                                                    <p><?= $name_product ?></p>
                                                    <div class="flex gap-x-2">
                                                        <p class="text-sm text-gray-400 capitalize"> <?= $color ?> </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap text-gray-600 truncate"></td>
                                            <td class="whitespace-nowrap text-gray-600 truncate"> <?= $amount_buy ?> </td>
                                            <td class="whitespace-nowrap text-gray-600 truncate"> <?= number_format($price, 0, '.', '.') ?> &#8363; </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="p-9 border-b border-gray-200">
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="text-gray-500 text-sm"> Tổng tiền đơn hàng </p>
                                        </div>
                                        <p class="text-gray-500 text-sm"> <?= number_format($bill['total'] + $bill['discount'], 0, '.', '.') ?> &#8363; </p>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="text-gray-500 text-sm"> Giảm giá </p>
                                        </div>
                                        <p class="text-gray-500 text-sm"> - <?= number_format($bill['discount'], 0, '.', '.') ?> &#8363; </p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-9 border-b border-gray-200">
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="font-bold text-black text-lg"> Thành tiền </p>
                                        </div>
                                        <p class="font-bold text-black text-lg"> <?= number_format($bill['total'], 0, '.', '.') ?> &#8363;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
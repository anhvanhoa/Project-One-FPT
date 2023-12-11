<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <?php
    // require_once("./config.php");
    // $vnp_SecureHash = $_GET['vnp_SecureHash'];
    // $inputData = array();
    // foreach ($_GET as $key => $value) {
    //     if (substr($key, 0, 4) == "vnp_") {
    //         $inputData[$key] = $value;
    //     }
    // }
    
    // unset($inputData['vnp_SecureHash']);
    // ksort($inputData);
    // $i = 0;
    // $hashData = "";
    // foreach ($inputData as $key => $value) {
    //     if ($i == 1) {
    //         $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    //     } else {
    //         $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
    //         $i = 1;
    //     }
    // }
    
    // $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <div class="flex flex-col h-screen">
        <?php include('partials/header.php') ?>
        <div class="max-w-7xl mx-auto mt-10 px-8 flex-1">
            <h1 class="text-2xl py-2 font-semibold">Kết quả thanh toán</h1>
            <div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Mã đơn hàng:</label>
                    <label>
                        <?= $dataVnPay['vnp_TxnRef'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Số tiền:</label>
                    <label>
                        <?= number_format($dataVnPay['vnp_Amount'] / 100, 0, '.', '.') ?> VND
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Nội dung thanh toán:</label>
                    <label>
                        <?= $dataVnPay['vnp_OrderInfo'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Mã phản hồi (vnp_ResponseCode):</label>
                    <label>
                        <?= $dataVnPay['vnp_ResponseCode'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Mã GD Tại VNPAY:</label>
                    <label>
                        <?= $dataVnPay['vnp_TransactionNo'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Mã Ngân hàng:</label>
                    <label>
                        <?= $dataVnPay['vnp_BankCode'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Thời gian thanh toán:</label>
                    <label>
                        <?= $dataVnPay['vnp_PayDate'] ?>
                    </label>
                </div>
                <div>
                    <label class="font-semibold mr-1 mb-2">Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($dataVnPay['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>
                    </label>
                </div>
            </div>
            <a href="/" type="submit"
                class="mt-3 text-white bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Về
                trang chủ</a>
            <p>
                &nbsp;
            </p>
            <div class="footer">
                <p>&copy; VNPAY
                    <?php echo date('Y') ?>
                </p>
            </div>
        </div>
        <?php include('partials/footer.php') ?>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nhà Xinh</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/asset/css/style.css">
    <script src="/asset/js/apexcharts.js"></script>
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Thống kê doanh thu</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex gap-10">
                    <div class="max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <?php
                            $total = 0;
                            foreach ($moneys as $money) {
                                $total += $money['total'];
                            } ?>
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">
                                    <?= number_format($total, 0, '.', '.') ?> &#8363;
                                </h5>
                                <p class="text-base font-normal text-gray-500">Tổng doanh thu</p>
                            </div>
                        </div>
                        <div id="legend-chart-2"></div>
                    </div>
                    <div class="h-full max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <?php
                            $total2 = 0;
                            foreach ($moneysToday as $today) {
                                $total2 += $today['total'];
                            } ?>
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">
                                    <?= number_format($total2, 0, '.', '.') ?> &#8363;
                                </h5>
                                <p class="text-base font-normal text-gray-500">Doanh số hôm nay</p>
                            </div>
                        </div>
                        <div id="legend-chart-3"></div>
                    </div>
                    <div class="h-full max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">
                                    <?= number_format($totalMoney, 0, '.', '.') ?> &#8363;
                                </h5>
                                <p class="text-base font-normal text-gray-500">Doanh số tháng này</p>
                            </div>
                        </div>
                        <div id="legend-chart"></div>
                    </div>
                </div>
                <script>
                    window.addEventListener("load", function () {
                        let options = {
                            series: [{
                                name: "Tổng tiền / ngày",
                                data: <?= json_encode($dataMoney) ?>,
                                color: "#1A56DB",
                            },],
                            chart: {
                                mxHeight: "300",
                                maxWidth: "300",
                                type: "area",
                                fontFamily: "Inter, sans-serif",
                                dropShadow: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            tooltip: {
                                enabled: true,
                                x: {
                                    show: false,
                                },
                            },
                            legend: {
                                show: true
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    opacityFrom: 0.55,
                                    opacityTo: 0,
                                    shade: "#1C64F2",
                                    gradientToColors: ["#1C64F2"],
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 6,
                            },
                            grid: {
                                show: false,
                                strokeDashArray: 4,
                                padding: {
                                    left: 2,
                                    right: 2,
                                    top: -26
                                },
                            },
                            xaxis: {
                                categories: <?= json_encode($listDay) ?>,
                                labels: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                            },
                            yaxis: {
                                show: false,
                                labels: {
                                    formatter: function (value) {
                                        return Intl.NumberFormat('vi').format(value) + ' &#8363;';
                                    }
                                }
                            },
                        }
                        if (document.getElementById("legend-chart") && typeof ApexCharts !== 'undefined') {
                            const chart = new ApexCharts(document.getElementById("legend-chart"), options);
                            chart.render();
                        }
                    });
                    window.addEventListener("load", function () {
                        let options = {
                            series: [{
                                name: "Tiền / Đơn",
                                data: [<?php foreach ($moneysToday as $today) {
                                    echo $today['total'] . ',';
                                } ?>],
                                color: "#1A56DB",
                            },],
                            chart: {
                                mxHeight: "300",
                                maxWidth: "300",
                                type: "area",
                                fontFamily: "Inter, sans-serif",
                                dropShadow: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            tooltip: {
                                enabled: true,
                                x: {
                                    show: false,
                                },
                            },
                            legend: {
                                show: true
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    opacityFrom: 0.55,
                                    opacityTo: 0,
                                    shade: "#1C64F2",
                                    gradientToColors: ["#1C64F2"],
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 6,
                            },
                            grid: {
                                show: false,
                                strokeDashArray: 4,
                                padding: {
                                    left: 2,
                                    right: 2,
                                    top: -26
                                },
                            },
                            xaxis: {
                                categories: [<?php foreach ($moneysToday as $today) {
                                    echo $today['id'] . ',';
                                } ?>],
                                labels: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                            },
                            yaxis: {
                                show: false,
                                labels: {
                                    formatter: function (value) {
                                        return Intl.NumberFormat('vi').format(value) + ' &#8363;';
                                    }
                                }
                            },
                        }
                        if (document.getElementById("legend-chart-3") && typeof ApexCharts !== 'undefined') {
                            const chart = new ApexCharts(document.getElementById("legend-chart-3"), options);
                            chart.render();
                        }
                    });
                    window.addEventListener("load", function () {
                        let options = {
                            series: [{
                                name: "Tiền / Đơn",
                                data: [<?php foreach ($moneys as $money) {
                                    echo $money['total'] . ',';
                                } ?>],
                                color: "#226f54",
                            },],
                            chart: {
                                mxHeight: "300",
                                maxWidth: "100%",
                                type: "area",
                                fontFamily: "Inter, sans-serif",
                                dropShadow: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            tooltip: {
                                enabled: true,
                                x: {
                                    show: false,
                                },
                            },
                            legend: {
                                show: true
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    opacityFrom: 0.55,
                                    opacityTo: 0,
                                    shade: "#1C64F2",
                                    gradientToColors: ["#1C64F2"],
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 6,
                            },
                            grid: {
                                show: false,
                                strokeDashArray: 4,
                                padding: {
                                    left: 2,
                                    right: 2,
                                    top: -26
                                },
                            },
                            xaxis: {
                                categories: [<?php foreach ($moneys as $money) {
                                    $id = $money['id'];
                                    echo "'$id' ,";
                                } ?>],
                                labels: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                            },
                            yaxis: {
                                show: false,
                                labels: {
                                    formatter: function (value) {
                                        return Intl.NumberFormat('vi').format(value) + ' &#8363;';
                                    }
                                }
                            },
                        }
                        if (document.getElementById("legend-chart-2") && typeof ApexCharts !== 'undefined') {
                            const chart = new ApexCharts(document.getElementById("legend-chart-2"), options);
                            chart.render();
                        }
                    });
                </script>
            </div>
        </main>
    </div>
</body>

</html>
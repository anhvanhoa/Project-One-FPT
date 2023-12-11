<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nhà Xinh</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/asset/js/apexcharts.js"></script>
</head>

<body>
    <div class="min-h-full">
        <?php include('partials/header.php') ?>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Thống kê sản phẩm</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex gap-10">
                    <!-- <div class="max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <?php
                            // $total = 0;
                            // foreach ($moneys as $money) {
                            //     $total += $money['total'];
                            // } 
                            ?>
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">Lượt bán sản phẩm</h5>
                                <p class="text-base font-normal text-gray-500">Lượt bán</p>
                            </div>
                        </div>
                        <div id="legend-chart-2"></div>
                    </div> -->

                    <div class="max-w-sm mt-10 w-full bg-white rounded-lg shadow p-4 md:p-6">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200">
                            <div class="flex items-center">
                                <div>
                                    <h5 class="leading-none text-2xl font-bold text-gray-900 pb-1">
                                        <?php
                                        $init = 0;
                                        foreach ($productSold as $soldS) {
                                            extract($soldS);
                                            $init += (int) $sold;
                                        }
                                        echo $init;
                                        ?>
                                    </h5>
                                    <p class="text-sm font-normal ">Tổng lượt bán</p>
                                </div>
                            </div>
                        </div>
                        <div id="column-chart"></div>
                    </div>

                    <script>
                        // ApexCharts options and config
                        window.addEventListener("load", function () {
                            const options = {
                                colors: ["#1A56DB", "#FDBA8C"],
                                series: [
                                    {
                                        name: "Lượt bán",
                                        color: "#1A56DB",
                                        data: [<?php foreach ($productSold as $soldS) {
                                            extract($soldS);
                                            echo "{x: '$name_product',y: $sold}" . ',';
                                        } ?>],
                                    },
                                ],
                                chart: {
                                    type: "bar",
                                    height: "320px",
                                    fontFamily: "Inter, sans-serif",
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: "70%",
                                        borderRadiusApplication: "end",
                                        borderRadius: 8,
                                    },
                                },
                                tooltip: {
                                    shared: true,
                                    intersect: false,
                                    style: {
                                        fontFamily: "Inter, sans-serif",
                                    },
                                },
                                states: {
                                    hover: {
                                        filter: {
                                            type: "darken",
                                            value: 1,
                                        },
                                    },
                                },
                                stroke: {
                                    show: true,
                                    width: 0,
                                    colors: ["transparent"],
                                },
                                grid: {
                                    show: false,
                                    strokeDashArray: 4,
                                    padding: {
                                        left: 2,
                                        right: 2,
                                        top: -14
                                    },
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                legend: {
                                    show: false,
                                },
                                xaxis: {
                                    floating: false,
                                    labels: {
                                        show: true,
                                        style: {
                                            fontFamily: "Inter, sans-serif",
                                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                        }
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
                                },
                                fill: {
                                    opacity: 1,
                                },
                            }

                            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                                chart.render();
                            }
                        });
                    </script>

                    <!-- <div class="h-full max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <?php
                            $total2 = 0;
                            foreach ($moneysToday as $today) {
                                $total2 += $today['total'];
                            } ?>
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2"><?= number_format($total2, 0, '.', '.') ?> &#8363;</h5>
                                <p class="text-base font-normal text-gray-500">Doanh số hôm nay</p>
                            </div>
                        </div>
                        <div id="legend-chart-3"></div>
                    </div>
                    <div class="h-full max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-10">
                        <div class="flex justify-between mb-5">
                            <div>
                                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2"><?= number_format($totalMoney, 0, '.', '.') ?> &#8363;</h5>
                                <p class="text-base font-normal text-gray-500">Doanh số tháng này</p>
                            </div>
                        </div>
                        <div id="legend-chart"></div>
                    </div> -->
                </div>
                <script>
                    window.addEventListener("load", function () {
                        let options = {
                            series: [{
                                name: "Tổng tiền / ngày",
                                data: [],
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
                                categories: [],
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
                                data: [],
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
                                categories: [],
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
                                name: "Lượt bán",
                                data: [<?php foreach ($productSold as $sold) {
                                    echo $sold['sold'] . ',';
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
                                categories: [<?php foreach ($productSold as $sold) {
                                    extract($sold);
                                    echo "'$name_product',";
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
                                        return Intl.NumberFormat('vi').format(value) + ' lượt';
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
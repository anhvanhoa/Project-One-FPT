<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $category['name_category'] ?> - Nhà Xinh</title>
    <link rel="icon" href="/asset/images/favicon.ico" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="/asset/css/style.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include('partials/header.php') ?>
    <div class="px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div style="background-image: url(/asset/images/<?= $category['image'] ?>);" class="h-[400px] mt-4 rounded-xl bg-center"></div>
    </div>
    <div class="bg-white">
        <div>
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>
                <div class="fixed inset-0 z-40 flex">
                    <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                            <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                <li>
                                    <a href="#" class="block px-2 py-3">Totes</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                                </li>
                            </ul>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Color</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-1">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">New Arrivals</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Size</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-2">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-mobile-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">Danh mục - <?= $category['name_category'] ?></h1>
                </div>
                <section aria-labelledby="products-heading" class="pb-12 pt-6">
                    <h2 id="products-heading" class="sr-only">Products</h2>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        <form class="hidden lg:block">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                <li>
                                    <a href="#">Totes</a>
                                </li>
                                <li>
                                    <a href="#">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#">Laptop Sleeves</a>
                                </li>
                            </ul>

                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Color</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-0">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-0" class="ml-3 text-sm text-gray-600">White</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Green</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-1">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600">New Arrivals</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-category-1" class="ml-3 text-sm text-gray-600">Sale</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-category-2" class="ml-3 text-sm text-gray-600">Travel</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-category-3" class="ml-3 text-sm text-gray-600">Organization</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-category-4" class="ml-3 text-sm text-gray-600">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900">Size</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-2">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-0" class="ml-3 text-sm text-gray-600">2L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-1" class="ml-3 text-sm text-gray-600">6L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-2" class="ml-3 text-sm text-gray-600">12L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-3" class="ml-3 text-sm text-gray-600">18L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-4" class="ml-3 text-sm text-gray-600">20L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="filter-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="filter-size-5" class="ml-3 text-sm text-gray-600">40L</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <div class="bg-white">
                                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                                    <h2 class="sr-only">Products</h2>
                                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                        <?php
                                        foreach ($products as $product) {
                                            extract($product);
                                        ?>
                                            <a href="#" class="group">
                                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                                    <img src="/asset/images/<?= $thumbnail ?>" />
                                                </div>
                                                <h3 class="mt-4 text-sm text-gray-700"><?= $name_product ?></h3>
                                                <p class="mt-1 text-lg font-medium text-gray-900"><?= number_format($price, 0, '.', '.') ?> &#8363;</p>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between mb-12">
                    <div>
                        <p class="text-sm text-gray-700">
                            Hiện thị
                            <span class="font-medium"><?= $products_page['current_page'] ?></span>
                            /
                            <span class="font-medium"><?= $products_page['page'] ?></span>
                            trang
                        </p>
                    </div>
                    <div class="flex item-center">
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <a href="/?act=products&id=<?= $_GET['id'] ?>&page=<?= $products_page['current_page'] - 1 ?>" class="<?= $products_page['current_page'] == 1 ? 'pointer-events-none' : '' ?> relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <?php
                            for ($i = 1; $i <= $products_page['page']; $i++) {
                                if (($products_page['current_page'] - 3 < $i && $i <= $products_page['current_page']) || ($i > $products_page['current_page'] && $i < $products_page['current_page'] + 3)) {
                                    $default = "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0";
                                    $active = "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600";
                            ?>
                                    <a style="" href="/?act=products&id=<?= $_GET['id'] ?>&page=<?= $i  ?>" aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold <?= $products_page['current_page'] == $i  ? $active : $default ?>"> <?= $i ?> </a>
                            <?php
                                }
                            }
                            ?>
                            <a href="/?act=products&id=<?= $_GET['id'] ?>&page=<?= $products_page['current_page'] + 1 ?>" class="<?= $products_page['current_page'] == $products_page['page'] ? 'pointer-events-none' : '' ?> relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </main>
            <?php include('partials/footer.php') ?>
        </div>
    </div>
</body>

</html>
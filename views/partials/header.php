<div class="relative z-40 lg:hidden hidden menu" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-40 flex">
        <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
            <div class="flex px-4 pb-2 pt-5">
                <button type="button" class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 close-menu">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                </div>
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                </div>
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create account</a>
                </div>
            </div>

            <div class="border-t border-gray-200 px-4 py-6">
                <a href="#" class="-m-2 flex items-center p-2">
                    <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 flex-shrink-0" />
                    <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
                    <span class="sr-only">, change currency</span>
                </a>
            </div>
        </div>
        <div class="flex-1 bg-black bg-opacity-25 overlay"></div>
    </div>
</div>
<header class="z-20 bg-white border-b border-gray-200 sticky top-0">
    <nav aria-label="Top" class="bg-white relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-2">
        <div>
            <div class="flex h-16 items-center">
                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden open-menu">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Logo -->
                <div class="ml-4 flex lg:ml-0">
                    <a href="/">
                        <span class="sr-only">Your Company</span>
                        <img class="h-9 sm:h-11 w-auto rounded-md" src="/asset/images/logo.jpg" alt="" />
                    </a>
                </div>

                <!-- Flyout menus -->
                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="flex h-full space-x-8">
                        <!-- <a href="#" class="flex items-center text-sm font-medium border-indigo-600 text-indigo-600 border-b-2"></a> -->
                        <?php
                        foreach ($categories as $category) {
                            extract($category);
                        ?>
                            <a href="?act=products&id=<?= $id ?>" class="flex items-center font-medium text-gray-700 hover:text-gray-800"><?= $name_category ?></a>
                        <?php } ?>
                    </div>
                </div>

                <div class="ml-auto flex items-center">
                    <div class="hidden lg:flex-1 lg:items-center lg:justify-end lg:space-x-6 <?= isset($_SESSION['user']) ? 'lg:hidden' : 'lg:flex' ?>">
                        <a href="/?act=login" class="text-base font-medium text-gray-700 hover:text-gray-800">Đăng nhập</a>
                        <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                        <a href="/?act=register" class="text-base font-medium text-gray-700 hover:text-gray-800">Đăng ký</a>
                    </div>
                    <div class="relative text-left group hidden <?= isset($_SESSION['user']) ? 'lg:inline-block' : 'lg:hidden' ?>">
                        <div>
                            <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white py-2 text-base font-semibold text-gray-900 group" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <p class="group-hover:text-indigo-500 text-gray-600 pr-1">
                                    <?= isset($_SESSION['user']) ? $_SESSION['user']['full_name'] : '' ?>
                                </p>
                                <svg class="group-hover:text-indigo-500 text-gray-400" class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="12" cy="6" r="4" />
                                        <path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div class="group-hover:block hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none after:content[''] after:absolute after:w-36 after:h-5 after:-top-4 after:right-0" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="?act=account" class="text-gray-700 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Tài khoản</a>
                                <a href="?act=change-password" class="text-gray-700 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Đổi mật khẩu</a>
                                <a href="?act=orders" class="text-gray-700 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Đơn hàng</a>
                                <a href="/admin" class="<?= $_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2 ? '' : 'hidden' ?> text-gray-700 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Quản trị</a>
                                <form method="POST" action="?act=logout" role="none">
                                    <button name="logout" type="submit" class="text-red-500 hover:bg-red-50 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search -->
                    <div class="flex lg:ml-6">
                        <button id="btn-search" class="p-2 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Search</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>
                    <!-- Cart -->
                    <div class="ml-4 flow-root lg:ml-6">
                        <a href="/?act=cart" class="group -m-2 flex items-center p-2">
                            <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"> <?= isset($_SESSION['user']) ? $_SESSION['user']['count_cart'] : 0 ?></span>
                            <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div title="Voucher" class="z-10 fixed bottom-5 -rotate-12 left-3 bg-indigo-600 p-3 rounded-[50%]">
        <a href="#">
            <img src="/asset/images/git.png" alt="" class="w-12 animate-bounce">
        </a>
    </div>
    <div>
        <form autocomplete="false" autocapitalize="false" method="GET" action="" id="search" class="-z-10 top-0 transition-all border-t bg-white border-gray-200 absolute left-1/2 -translate-x-1/2 w-full h-14 max-w-7xl flex items-center px-8 gap-3">
            <input type="hidden" name='act' value="search">
            <input class="rounded-md bg-white h-10 flex-1 pl-2" type="text" placeholder="Tìm kiếm" name="keyword">
            <button type="submit" class="py-2 text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 font-medium rounded-md text-sm px-5 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
        <div id="overlay" class="hidden bg-black/80 fixed z-[2] inset-0"></div>
    </div>
</header>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="/asset/css/style.css" />
    </head>

    <body>
        <div class="relative z-40 lg:hidden hidden menu" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-40 flex">
                <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                    <div class="flex px-4 pb-2 pt-5">
                        <button
                            type="button"
                            class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 close-menu"
                        >
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
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
                            <img
                                src="https://tailwindui.com/img/flags/flag-canada.svg"
                                alt=""
                                class="block h-auto w-5 flex-shrink-0"
                            />
                            <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
                            <span class="sr-only">, change currency</span>
                        </a>
                    </div>
                </div>
                <div class="flex-1 bg-black bg-opacity-25 overlay"></div>
            </div>
        </div>
        <header class="relative bg-white">
            <p
                class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8"
            >
                Get free delivery on orders over $100
            </p>
            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center">
                        <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                        <button
                            type="button"
                            class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden open-menu"
                        >
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open menu</span>
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                />
                            </svg>
                        </button>

                        <!-- Logo -->
                        <div class="ml-4 flex lg:ml-0">
                            <a href="/">
                                <span class="sr-only">Your Company</span>
                                <img class="h-10 w-auto rounded-sm" src="/asset/images/logo.jpg" alt="" />
                            </a>
                        </div>

                        <!-- Flyout menus -->
                        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8">
                                <a
                                    href="#"
                                    class="flex items-center text-base font-medium border-indigo-600 text-indigo-600 border-b-2"
                                ></a>
                                <!-- <?php
                                foreach ($categories as $category) {
                                    extract($category);
                                ?>
                                <a
                                    href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                                    ><?= $name ?></a
                                >
                                <?php } ?> -->
                            </div>
                        </div>

                        <div class="ml-auto flex items-center">
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="/?act=login" class="text-sm font-medium text-gray-700 hover:text-gray-800"
                                    >Đăng nhập</a
                                >
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="/?act=register" class="text-sm font-medium text-gray-700 hover:text-gray-800"
                                    >Đăng ký</a
                                >
                            </div>
                            <!-- Search -->
                            <div class="flex lg:ml-6">
                                <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <svg
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                        />
                                    </svg>
                                </a>
                            </div>

                            <!-- Cart -->
                            <div class="ml-4 flow-root lg:ml-6">
                                <a href="/?act=cart" class="group -m-2 flex items-center p-2">
                                    <svg
                                        class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                        />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"
                                        >0</span
                                    >
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- <?php include('partials/header.php') ?> -->
        <div class="max-w-2xl mx-auto mt-8 mb-12">
            <form>
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            This information will be displayed publicly so be careful what you share.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="username" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Username</label
                                >
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                    >
                                        <input
                                            type="text"
                                            name="username"
                                            id="username"
                                            autocomplete="username"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="janesmith"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Photo</label
                                >
                                <div class="mt-2 flex items-center gap-x-3">
                                    <svg
                                        class="h-12 w-12 text-gray-300"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <button
                                        type="button"
                                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                    >
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Use a permanent address where you can receive mail.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Full name</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        name="first-name"
                                        id="first-name"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Email address</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Phone Number</label
                                >
                                <div class="mt-2">
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900"
                                    >Street address</label
                                >
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        name="street-address"
                                        id="street-address"
                                        autocomplete="street-address"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button
                        type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
        <!-- <?php include('partials/footer.php') ?> -->
        <footer class="relative isolate overflow-hidden bg-[#303035] py-16 sm:py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                    <div class="max-w-xl lg:max-w-lg">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                            Subscribe to our newsletter.
                        </h2>
                        <p class="mt-4 text-lg leading-8 text-gray-300">
                            Nostrud amet eu ullamco nisi aute in ad minim nostrud adipisicing velit quis. Duis tempor
                            incididunt dolore.
                        </p>
                        <div class="mt-6 flex max-w-md gap-x-4">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input
                                id="email-address"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required
                                class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                                placeholder="Enter your email"
                            />
                            <button
                                type="submit"
                                class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                            >
                                Subscribe
                            </button>
                        </div>
                    </div>
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                        <div class="flex flex-col items-start">
                            <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                                <svg
                                    class="h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                                    />
                                </svg>
                            </div>
                            <dt class="mt-4 font-semibold text-white">Weekly articles</dt>
                            <dd class="mt-2 leading-7 text-gray-400">
                                Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo
                                amet.
                            </dd>
                        </div>
                        <div class="flex flex-col items-start">
                            <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                                <svg
                                    class="h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002"
                                    />
                                </svg>
                            </div>
                            <dt class="mt-4 font-semibold text-white">No spam</dt>
                            <dd class="mt-2 leading-7 text-gray-400">
                                Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt
                                anim.
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </footer>
    </body>
</html>

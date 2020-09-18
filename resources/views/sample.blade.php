<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sample</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body class="h-screen font-sans antialiased bg-gray-custom-100 font-medium text-black-another">
        <nav class="flex items-center justify-between py-2 px-12 bg-white">
            <div>
                <div class="rounded-full p-4 bg-gradient-to-br from-yellow-custom-300 to-red-custom-500"></div>
            </div>

            <div>
                <ul class="flex items-center justify-between space-x-10 text-sm p-2">
                    <li>
                        <a href="#" class="px-1 py-4 border-b-2 border-indigo-custom-300 text-indigo-custom-300">Dashboard</a>
                    </li>

                    <li>
                        <a href="#" class="py-5 border-b-2 border-transparent">Entry</a>
                    </li>

                    <li>
                        <a href="#" class="py-5 border-b-2 border-transparent">Enquiry</a>
                    </li>

                    <li>
                        <a href="#" class="py-5 border-b-2 border-transparent">Report</a>
                    </li>

                    <li>
                        <a href="#" class="py-5 border-b-2 border-transparent">Support</a>
                    </li>
                </ul>
            </div>

            <button class="text-indigo-custom-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </nav>

        <main class="space-y-5 px-12 py-6">
            <section class="space-y-4">
                <header class="font-light text-lg">Quick Actions</header>

                <div class="grid grid-cols-4 gap-4">
                    <div class="flex flex-col space-y-8 px-3 py-6 bg-indigo-custom-300 rounded-lg text-white">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="font-semibold">
                                PAWN
                            </span>

                            <span class="font-light">
                                (F11)
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-8 px-3 py-6 bg-indigo-custom-300 rounded-lg text-white">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="font-semibold">
                                REDEEM
                            </span>

                            <span class="font-light">
                                (F12)
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-8 px-3 py-6 bg-indigo-custom-300 rounded-lg text-white">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="font-semibold">
                                RENEW
                            </span>

                            <span class="font-light">
                                (F10)
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-8 px-3 py-6 bg-indigo-custom-300 rounded-lg text-white">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="font-semibold">
                                REPRINT
                            </span>

                            {{-- <span class="font-light">
                                (F11)
                            </span> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section class="space-y-4">
                <header class="font-light text-2xl">On Hand Amount for <span class="font-bold">AQ</span></header>

                <div class="grid grid-rows-2 grid-cols-4 gap-4">
                    <div class="flex flex-col space-y-4 rounded-lg p-4 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-green-custom-25 text-green-custom-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-green-custom-600">OPENING</span>

                            <span class="font-bold text-md text-black">RM 5,000.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-blue-custom-50 text-blue-custom-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>

                            <div class="flex items-start">
                                <div class="rounded-full px-4 py-px bg-blue-custom-500 text-xs text-white">1</div>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-blue-custom-500">REDEEM</span>

                            <span class="font-bold text-md text-black">RM 2,000.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-purple-custom-50 text-purple-custom-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-purple-custom-500">INTEREST</span>

                            <span class="font-bold text-md text-black">RM 750.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-red-custom-50 text-red-custom-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>

                            <div class="rounded-full px-4 py-px bg-red-custom-500 text-xs text-white">1</div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-red-custom-500">PAWN</span>

                            <span class="font-bold text-md text-black">RM 5,000.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-green-custom-100 text-green-custom-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>

                            <div class="flex items-start">
                                <div class="rounded-full px-4 py-px bg-green-custom-200 text-xs text-white">1</div>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-green-custom-200">TICKET</span>

                            <span class="font-bold text-md text-black">RM 10.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-orange-custom-50 text-orange-custom-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-orange-custom-400">TRANSFER</span>

                            <span class="font-bold text-md text-black">RM 5,000.00</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-green-custom-50 text-green-custom-900">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-green-custom-900">CLOSING</span>

                            <span class="font-bold text-md text-black">N/A</span>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-4 rounded-lg p-3 bg-white border border-gray-300">
                        <div class="flex items-start justify-between">
                            <div class="rounded p-1 bg-brown-custom-50 text-brown-custom-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-medium text-sm text-brown-custom-500">ON HAND</span>

                            <span class="font-bold text-md text-black">RM 1,500.00</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
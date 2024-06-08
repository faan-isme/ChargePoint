<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex lg:hidden items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full  lg:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full  px-3 py-4 overflow-y-auto bg-[#000D81] dark:bg-gray-800">
        <h1 class="font-baloo text-3xl mt-5 mb-10 ms-4 text-white">Chargepoint</h1>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/admin/datapendaftaran"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">Data Pendaftaran</span>
                </a>
            </li>
            <li>
                <a href="/admin/accpendaftaran"
                    class="flex items-center p-2 text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <span class="flex-1 ms-3 whitespace-nowrap">ACC Pendaftaran</span>

                </a>
            </li>
            <li>
                <a href="/admin/prosespendaftaran"
                    class="flex items-center p-2 text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <span class="flex-1 ms-3 whitespace-nowrap">Proses Pendaftaran</span>

                </a>
            </li>

            <li>
                <a href=""
                    class="flex items-center p-2 text-white hover:text-black rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <span class="flex-1 ms-3 whitespace-nowrap">LogOut</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

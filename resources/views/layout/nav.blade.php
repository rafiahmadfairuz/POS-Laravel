<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full  sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full rounded-e-3xl shadow-2xl flex flex-col justify-between px-3 py-4 overflow-y-auto bg-gray-50 border-r border-emerald-200 border">

        <ul class="space-y-2 font-medium">
            <h1 class="font-bold text-2xl border-b p-2"><span class="font-extralight">Web</span><span class="text-blue-500">POS</span> </h1>
            <li>
                <a href="{{ route('Dashboard.index') }}"
                    class="flex items-center gap-5 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center gap-5 w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fas fa-address-book"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Contacts</span>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('Customer.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-user-friends"></i>
                            Customers</a>
                    </li>
                    <li>
                        <a href="{{route('CustomerGroup.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-users"></i>
                            Customer Group</a>
                    </li>
                    <li>
                        <a href="{{route('Supplier.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-truck"></i>
                            Suppliers</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center gap-5 w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
                    <i class="fas fa-box"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Products</span>
                </button>
                <ul id="dropdown-product" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('Product.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-box-open"></i>
                            All Products</a>
                    </li>
                    <li>
                        <a href="{{route('Inventory.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-warehouse"></i>
                            Inventory</a>
                    </li>
                    <li>
                        <a href="{{route('Brand.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-tag"></i>
                            Brand</a>
                    </li>
                    <li>
                        <a href="{{route('Group.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-tags"></i>
                            Group</a>
                    </li>
                    <li>
                        <a href="{{route('Category.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-th-list"></i>
                            Categories</a>
                    </li>
                    <li>
                        <a href="{{route('Unit.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-ruler"></i>
                            Units</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}"
                    class="flex items-center gap-5 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="ms-3">Purchases</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center gap-5 w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-report" data-collapse-toggle="dropdown-report">
                    <i class="fas fa-chart-line"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Reports</span>
                </button>
                <ul id="dropdown-report" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('Product.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-file-pdf"></i>
                            Report PDF</a>
                    </li>
                    <li>
                        <a href="{{route('Inventory.index')}}"
                            class="flex items-center gap-5 w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-file-excel"></i>
                            Report Excel</a>
                    </li>
                </ul>
            </li>
        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center align-bottom text-red-500 p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="fas fa-sign-out-alt"></i>
                <span class="ms-3">Logout</span>
            </button>
        </form>

    </div>
</aside>

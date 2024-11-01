<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full rounded-e-3xl shadow-2xl flex flex-col justify-between px-3 py-4 overflow-y-auto bg-gray-50 border-r border-emerald-200 border">
        <ul class="space-y-2 font-medium">
            <h1 class="font-bold text-2xl border-b p-2">
                <span class="font-extralight">Web</span><span class="text-blue-500">POS</span>
            </h1>
            <li>
                <x-link href="{{ route('Dashboard.index') }}">
                    <i class="fas fa-tachometer-alt"></i><span class="ms-3">Dashboard</span>
                </x-link>
            </li>
            <li>

                    <li>
                        <x-link href="{{ route('Customer.index') }}">
                            <i class="fas fa-user-friends"></i><span class="ms-3">Customers</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('CustomerGroup.index') }}">
                            <i class="fas fa-users"></i><span class="ms-3">Customer Group</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Supplier.index') }}">
                            <i class="fas fa-truck"></i><span class="ms-3">Suppliers</span>
                        </x-link>
                    </li>

            </li>
            <li>

                    <li>
                        <x-link href="{{ route('Product.index') }}">
                            <i class="fas fa-box-open"></i><span class="ms-3">All Products</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Inventory.index') }}">
                            <i class="fas fa-warehouse"></i><span class="ms-3">Inventory</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Brand.index') }}">
                            <i class="fas fa-tag"></i><span class="ms-3">Brand</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Group.index') }}">
                            <i class="fas fa-tags"></i><span class="ms-3">Group</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Category.index') }}">
                            <i class="fas fa-th-list"></i><span class="ms-3">Categories</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Unit.index') }}">
                            <i class="fas fa-ruler"></i><span class="ms-3">Units</span>
                        </x-link>
                    </li>

            </li>
            <li>
                <x-link href="{{ route('transaksi.baru') }}">
                    <i class="fas fa-shopping-cart"></i><span class="ms-3">Purchases</span>
                </x-link>
            </li>
            <li>

                    <li>
                        <x-link href="{{ route('Product.index') }}">
                            <i class="fas fa-file-pdf"></i><span class="ms-3">Report PDF</span>
                        </x-link>
                    </li>
                    <li>
                        <x-link href="{{ route('Inventory.index') }}">
                            <i class="fas fa-file-excel"></i><span class="ms-3">Report Excel</span>
                        </x-link>
                    </li>
              
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center align-bottom text-red-500 p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="fas fa-sign-out-alt"></i><span class="ms-3">Logout</span>
            </button>
        </form>
    </div>
</aside>

<x-app>
    @section('title', 'Contact | Supplier')
    <section class="py-4">
       <x-nav></x-nav>
        <!-- container -->
        <!-- Modal -->
        @include('layout.successModal')
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new Supplier</h2>
                @include('layout.form.supplierForm')
            </div>
        </div>
        <!-- TABLE -->
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Index List</h2>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Full name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr class="bg-white border-b">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $supplier->firstName }} {{ $supplier->lastName }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $supplier->company }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $supplier->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $supplier->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href=" {{ route('Supplier.edit', $supplier->id) }} " type="button" class=text-sm
                                            font-medium text-red-500">Edit</a> |
                                        <form action="{{ route('Supplier.destroy', $supplier->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-medium text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layout.successModalScript')


</x-app>

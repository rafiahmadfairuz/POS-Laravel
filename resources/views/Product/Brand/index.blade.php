<x-app>
    @section('title', 'Products | Brand')
    <section class="py-4">
        <x-nav></x-nav>

        <!-- container -->
        <!-- Modal -->
        @include('layout.successModal')
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new Brand</h2>
                @include('layout.form.brandForm')
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
                                    Brand Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{ $brand->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href=" {{ route('Brand.edit', $brand->id) }} " type="button" class=text-sm
                                            font-medium text-red-500">Edit</a> |
                                        <form action="{{ route('Brand.destroy', $brand->id) }}" method="POST"
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

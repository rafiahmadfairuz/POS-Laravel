@extends('layout.head')

<body>
    @section('title', 'Customer Groups')
    <section class="py-4">
        @include('layout.nav')
        <!-- Modal -->
        @include('layout.successModal')
        <!-- container -->
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new group for customers</h2>
                <form enctype="multipart/form-data" action="{{ route('CustomerGroup.store') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="flex flex-wrap">
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Customer Group
                                Name</label>
                            <input value="{{ old('title') }}" type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Group Name">
                            @error('title')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount</label>
                            <input value="{{ old('discount') }}" type="number" step="0.01" name="discount" id="discount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Discount. Default is 0">
                            @error('discount')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4">
                            <label for="is_default" class="block mb-2 text-sm font-medium text-gray-900">Select any
                                Group</label>
                            <select id="is_default" name="is_default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            @error('is_default')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">Add
                        Group</button>
                </form>
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
                                    Group name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Discount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Default
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b">
                                @foreach ($customer_groups as $customer_group)
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $customer_group->title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $customer_group->discount }} %
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($customer_group->is_default)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href=" {{ route('CustomerGroup.edit', $customer_group->id) }} " type="button"
                                                class=text-sm font-medium text-red-500">Edit</a> | |
                                            <form action="{{ route('CustomerGroup.destroy', $customer_group->id) }}"
                                                method="POST" class="inline">
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
</body>

</html>
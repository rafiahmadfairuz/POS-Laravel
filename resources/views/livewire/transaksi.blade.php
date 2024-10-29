@extends('layout.head')
<body>
    @section('title', 'All Products')
    <section class="py-4">
        @include('layout.nav')
        <!-- container -->
        <!-- Modal -->
        @include('layout.successModal')
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-10 border-2  border-gray-200 border-dashed rounded-lg">
                    <div class="w-full mb-4 mr-4">
                        <input wire:model="search" type="text" placeholder="Masukkan SKU Barang"
                            class="bg-gray-50 border p-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ">
                        @error('search')
                            @include('layout.form.errorMessage')
                        @enderror
                    </div>
                    
                <form enctype="multipart/form-data"  method="POST">
                    @csrf
                    <div class="flex  justify-between p-5 gap-10">
                        <div class="w-3/6">
                            <div class="">
                                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900">Resi : </h2>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        SKU
                                                    </th>
                                                     <th scope="col" class="px-6 py-3">
                                                        Product Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Quantity
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Price
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($produkDibeli as $produk )
                                                <tr>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->sku  }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->name }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->category->title }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->purchase_price }}
                                                    </td>
                                                    </td>
                                                    {{-- <td scope="col" class="px-6 py-3">
                                                        <form action="{{ route('Product.destroy', $product->id) }}" method="POST"
                                                            class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-sm font-medium text-red-500">Delete</button>
                                                        </form>
                                                    </td> --}}
                                                </tr>
                                                @empty
                                                    <td colspan="5" class="text-center">Masih Kosong</td>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-3/6 flex flex-col gap-10">
                              <div class="kotak border shadow-lg rounded-md h-3/6 w-full p-4 bg-slate-50">
                                 <p class="font-bold">Total Pembelian</p>
                                 <span>Rp. </span>
                              </div>
                              <div class="kotak border shadow-lg rounded-md h-3/6 w-full p-4 bg-slate-50">
                                <div class="w-full mb-4 mr-4">
                                    <label for="title" class="block mb-2 text-sm text-gray-900 font-bold">Input
                                        Bayar</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                    @error('title')
                                        @include('layout.form.errorMessage')
                                    @enderror
                                </div>
                              </div>
                        </div>
                       
                    </div>
                    <button type="submit"
                        class="inline-flex  items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">
                        Bayar</button>
                </form>
            </div>
        </div>
    </section>
    @include('layout.successModalScript')
    @livewireScripts
</body>
</html>
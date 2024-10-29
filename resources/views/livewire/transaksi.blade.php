 <section class="py-4">
        @include('layout.nav')
        <!-- container -->
        <!-- Modal -->
        @include('layout.successModal')
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-10 border-2 flex align-items-center  border-gray-200 border-dashed rounded-lg">
                @if (!$transaksiAktif)
                <button wire:click='transaksiBaru'  class=" items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg"> + Transaksi Baru</button>
                @else
                <button wire:click='batalTransaksi'  class=" items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg"> Batal Transaksi</button>
                @endif
                <div wire:loading class=" ms-10 mt-5 w-10 h-10 border-4 border-t-4 border-gray-200 rounded-full animate-spin shadow-lg" style="border-top-color: #3498db;"></div>
            </div>
        </div>
        @if($transaksiAktif)
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-10 border-2  border-gray-200 border-dashed rounded-lg">
                    <div class="w-full mb-4 mr-4">
                        <form wire:submit='updateCari'>
                            <input wire:model="cari" type="text" placeholder="Masukkan SKU Barang"
                            class="bg-gray-50 border p-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ">
                        @error('cari')
                            @include('layout.form.errorMessage')
                        @enderror
                        </form>
                </div>


                    <div class="flex  justify-between p-5 gap-10">
                        <div class="w-3/6">
                            <div class="">
                                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">

                <h2 class="mb-4 text-xl font-bold text-gray-900">Resi : {{ $transaksiAktif->resi }}</h2>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        No
                                                    </th>
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
                                                    <th scope="col" class="px-6 py-3">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($produkTransaksi as $produk )
                                                <tr>
                                                    <th scope="row"
                                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $loop->iteration }}</th>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->produk->sku  }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->produk->name }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->jumlah }}
                                                    </td>
                                                    <td scope="col" class="px-6 py-4">
                                                        {{ $produk->produk->purchase_price }}
                                                    </td>
                                                    <td>
                                                        <button wire:click="hapusSatuProduk({{ $produk->id }})"
                                                            class="p-2 border border-gray-300 rounded-lg bg-gray-100 hover:bg-red-100 transition-all duration-300 ease-in-out">
                                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                            </svg>
                                                        </button>
                                                    </td>

                                                </tr>
                                                @endforeach

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
                                 <span>{{ number_format($totalSemuaBelanja, '2', '.', ',') }}</span>
                              </div>
                              <div class="kotak border shadow-lg rounded-md h-3/6 w-full p-4 bg-slate-50">
                                <div class="w-full mb-4 mr-4">
                                    <label for="title" class="block mb-2 text-sm text-gray-900 font-bold">Input
                                        Bayar</label>
                                    <input type="number" wire:model.live='bayar' name="harga" id="harga"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                </div>

                              </div>
                              <div class="kotak border shadow-lg rounded-md h-3/6 w-full p-4 bg-slate-50">
                                <p class="font-bold">Kembalian</p>
                                <span>Rp. </span>
                                <span>{{ number_format($kembalian, '0', '.', ',') }}</span>
                             </div>
                             @if($kembalian >= 0 && $bayar != 0)
                             <button wire:click='selesaikanPembayaran' class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar</button>
                             @elseif($kembalian < 0)
                             <h1 class="font-bold text-xl text-red-500">Uangmu Masih Kurang !!</h1>
                             @endif

                    </div>
            </div>
        </div>
        @else
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">History Transaction</h2>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Resi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Pembelian
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataLaporan as $laporan)
                                <tr>
                                    <td scope="col" class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td scope="col" class="px-6 py-4">
                                        {{ $laporan->resi  }}
                                    </td>
                                    <td scope="col" class="px-6 py-4">
                                        {{ $laporan->total }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </section>
    @include('layout.successModalScript')


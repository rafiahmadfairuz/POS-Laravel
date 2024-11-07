<section id="header">
    <a href="#" class="logo">TesTes</a>
    <div>
        <ul id="navbar">
            <li><x-link href="{{ route('display.produk') }}">Home</x-link></li>
            <li><x-link href="{{ route('full.produk') }}">Shop</x-link></li>
            <li id="lg-bag"><x-link href="{{ route('cart.produk') }}"><i class="fa-solid fa-cart-shopping"></i></x-link></li>
            <li><x-link id="close" href="{{ route('display.produk') }}"><i class="far fa-times"></i><</x-link></li>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

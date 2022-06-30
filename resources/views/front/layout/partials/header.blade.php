<header>
    <div class="nav-left">
        <div class="logo">
            {{-- <img src="{{Storage::url('ibm.svg')}}" alt=""> --}}
        </div>
        <div class="title">
            <h1>International Business Machines</h1>
        </div>
    </div>
    <div class="nav-right">
        <div class="hamburger">
            <span class="bar1"></span>  
            <span class="bar2"></span>  
            <span class="bar3"></span> 
        </div>
        <div class="menu">
            <ul class="menu-ul">
                <li><button class="menu-button" data-section="home" data-url="{{route('front_home')}}">Inicio</button></li>
                <li><button class="menu-button" data-section="faqs" data-url="{{route('front_faqs')}}">Faqs</button></li>
                <li><button class="menu-button" data-section="products" data-url="{{route('front_products')}}">Productos</button></li>
                <li><button class="menu-button" data-section="contact" data-url="{{route('front_contact')}}">Contacto</button></li>
                <li><button class="menu-button" data-section="cart" data-url="{{route('front_cart')}}">Carrito</button></li>
            </ul>
        </div>
    </div>
</header>
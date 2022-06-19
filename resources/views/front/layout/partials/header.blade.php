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
                <li><button class="menu-button" data-url="{{route('front_home')}}">Inicio</button></li>
                <li><button class="menu-button" data-url="{{route('front_faqs')}}">Faqs</button></li>
                <li><button class="menu-button" data-url="{{route('front_products')}}">Productos</button></li>
                <li><button class="menu-button" data-url="{{route('front_contact')}}">Contacto</button></li>
                <li><button class="menu-button" data-url="{{route('front_cart')}}">Caja</button></li>
            </ul>
        </div>
    </div>
</header>
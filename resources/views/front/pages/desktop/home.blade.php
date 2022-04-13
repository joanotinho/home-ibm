@extends('front.layout.master')

@section('content')

    <div class="slider">
        <div class="slider-image center">
            <img src="{{Storage::url('IBM-PC-ordenador-personal-lanzado_1379872391_104580219_1200x675.webp')}}" alt="" class="main background">
        </div>
        <div class="slider-title">
            <h2>Un título que evoca emociones</h2>
        </div>
        <div class="featured-button">
            <button>Más info</button>
        </div>
    </div>
    <div class="categories">
        <div class="categories-title center">
            <h3>Otro título</h3>
        </div>
        <div class="categories-products desktop-four-columns mobile-single-column">
            <div class="column">
                <div class="categories-product">
                    <div class="categories-product-image">
                        <img src="{{Storage::url('IBM-PC.webp')}}" alt="">
                    </div>
                    <div class="categories-product-title">
                        <h3>Ordenadores</h3>
                    </div>
                    <div class="categories-product-author">
                        <p>Joan Baixauli</p>
                    </div>
                    <div class="categories-product-description">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, adipisci?
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="categories-product">
                    <div class="categories-product-image">
                        <img src="{{Storage::url('IBM-MONITOR.webp')}}" alt="">
                    </div>
                    <div class="categories-product-title">
                        <h3>Monitores</h3>
                    </div>
                    <div class="categories-product-author">
                        <p>Joan Baixauli</p>
                    </div>
                    <div class="categories-product-description">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, adipisci?
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="categories-product">
                    <div class="categories-product-image">
                        <img src="{{Storage::url('IBM-TECLADO.webp')}}" alt="">
                    </div>
                    <div class="categories-product-title">
                        <h3>Teclados</h3>
                    </div>
                    <div class="categories-product-author">
                        <p>Joan Baixauli</p>
                    </div>
                    <div class="categories-product-description">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, adipisci?
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="categories-product">
                    <div class="categories-product-image">
                        <img src="{{Storage::url('ibm-mouse.webp')}}" alt="">
                    </div>
                    <div class="categories-product-title">
                        <h3>Ratones</h3>
                    </div>
                    <div class="categories-product-author">
                        <p>Joan Baixauli</p>
                    </div>
                    <div class="categories-product-description">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, adipisci?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services center">
        <div class="desktop-two-columns mobile-single-column">
            <div class="column">
                <div class="services-description">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nostrum eligendi est, eos fuga vitae corporis natus libero assumenda? Quam tempore quia quisquam nemo eligendi omnis culpa quaerat tenetur temporibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis pariatur ipsam sed nostrum! Ipsam voluptas sapiente fugit distinctio repudiandae debitis id, in corporis deleniti aspernatur consequatur! Voluptatibus exercitationem rem magnam.</p>
                </div>
            </div>
            <div class="column">
                <div class="services-image">
                    <img src="{{Storage::url('ibm-laptop.webp')}}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
        
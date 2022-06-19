<div class="product-datasheet">
    <div class="two-columns">
        <div class="column">
            <div class="product-datasheet-images">
                <div class="single-column product-datasheet-main-image">
                    <div class="column">
                    </div>
                    
                </div>
                <div class="five-columns product-datasheet-secondary-images">
                    
                </div>
            </div>
        </div>
        <div class="column">
            <form class="front-form" action="{{route("front_cart_store")}}">

                <input type="hidden" name="price_id" value="{{isset($product->prices->first()->id) ? $product->prices->first()->id : ''}}">
                <input class="repeat-value" type="hidden" name="repeat-number" data-value="">

                <div class="product-datasheet-main">
                    <div class="product-datasheet-title">
                        <h3>{{$product->title}}</h3>
                    </div>
                    <div class="product-datasheet-price">
                        <span>{{$product->prices->first()->base_price}}€</span>
                    </div>
                    <div class="product-datasheet-description">
                        <ul>
                            {!!$product->description!!}
                        </ul>
                    </div>
                    <div class="two-columns product-datasheet-stock">
                        <div class="column">
                            <span>Cantidad:</span>
                        </div>
                        <div class="column">
                            @include('front.components.desktop.plusMinusButton')
                        </div>
                    </div>
                    <div class="product-datasheet-buy-buttons">
                        <div class="two-columns">
                            <div class="column">
                                <div class="cart-button">
                                    <button>
                                        <svg viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M10,0V4H8L12,8L16,4H14V0M1,2V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18Z" />
                                        </svg>
                                        <span>Añadir al carro</span>
                                    </button>
                                </div>
                            </div>
                            <div class="column">
                                <div class="buy-button">
                                    <button>
                                        <span>Comprar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tabs-container">
        <div class="tabs">
            <div class="tab active" data-tab-target="description">
                <span>Descripción</span>
            </div>
            <div class="tab" data-tab-target="opinions">
                <span>Opiniones</span>
            </div>
            <div class="tab" data-tab-target="specs">
                <span>Especificaciones</span>
            </div>
        </div>
        <div class="tabs-contents">
            <div class="tab-content active" data-tab-content="description">
                <span>
                    {!!$product->features!!}
                </span>
            </div>
            <div class="tab-content" data-tab-content="opinions">
                <span>
                    El principito es una narración corta del escritor francés Antoine de Saint-Exupéry, que trata de la historia de un pequeño príncipe que parte de su asteroide a una travesía por el universo, en la cual descubre la extraña forma en que los adultos ven la vida y comprende el valor del amor y la amistad.
                    El principito es tenido como uno de los mejores libros de todos los tiempos y un clásico contemporáneo de la literatura universal.
                </span>
            </div>
            <div class="tab-content" data-tab-content="specs">
                <span>
                    El libro relata las aventuras y desventuras de un hidalgo de 50 años llamado Alonso Quijano, quien decide ser un caballero andante como aquellos que aparecen en sus libros de caballerías favoritos.
                    Las hazañas de don Quijote están contenidas en dos tomos que narran tres salidas. Por un lado, la “Primera parte” denominada como El ingenioso Hidalgo Don Quijote de la Mancha está formada por 52 capítulos y en ella se encuentran la primera salida y la segunda salida.
                </span>
            </div>
        </div>
    </div>
</div>
<x-savedChangesStatus></x-savedChangesStatus>
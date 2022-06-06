<div class="gallery">
    <div class="two-columns">
        <div class="column column-aside">
            <div class="single-column">
                <div class="column">
                    <div class="categories">
                        <div class="categories-title">
                            <h3>Categorías</h3>
                        </div>
                        <select name="categories" id="products-categories" class="categories-select">
                            <option value="blank">Seleccione una opción</option>
                            <option value="ordenadores">Ordenadores</option>
                            <option value="teclados">Teclados</option>
                            <option value="ratones">Ratones</option>
                            <option value="monitores">Monitores</option>
                        </select>
                    </div>
                    <div class="filter center" id="filter">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14,12V19.88C14.04,20.18 13.94,20.5 13.71,20.71C13.32,21.1 12.69,21.1 12.3,20.71L10.29,18.7C10.06,18.47 9.96,18.16 10,17.87V12H9.97L4.21,4.62C3.87,4.19 3.95,3.56 4.38,3.22C4.57,3.08 4.78,3 5,3V3H19V3C19.22,3 19.43,3.08 19.62,3.22C20.05,3.56 20.13,4.19 19.79,4.62L14.03,12H14Z" />
                        </svg>
                        <span>FILTRAR</span>
                        <ul>
                            <li>
                                <input type="checkbox">
                                <span>Ordenadores</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span>Teclados</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span>Ratones</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span>Monitores</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="column column-main">
            <div class="main-top">
                <div class="two-columns">
                    <div class="column">
                        <h3>Teclados</h3>
                    </div>
                    <div class="column">
                        <select name="" id="">
                            <option value="">Selecciona una opción</option>
                            <option value="">Destacados</option>
                            <option value="">Ofertas</option>
                            <option value="">De mayor a menor precio</option>
                            <option value="">De menor a mayor precio</option>
                        </select>
                    </div>
                </div>
            </div>
            @if(isset($products))
                <div class="products">
                    <div class="three-columns">
                        @foreach($products as $product)
                            <div class="column">
                                <div class="product">
                                    <div class="product-image">
                                        <img src="{{Storage::url('hp-x32c.webp')}}" alt="">
                                    </div>
                                    <div class="product-title">
                                        <h3>{{$product->title}}</h3>
                                    </div>
                                    <div class="product-price">
                                        <span>{{$product->price}}€</span>
                                    </div>
                                    <div class="product-button">
                                        <a href="/producto">Ver ficha</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
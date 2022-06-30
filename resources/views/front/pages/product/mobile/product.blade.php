<div class="page-section" id="product">
    <div class="product-datasheet">
        <div class="single-column">
            <div class="column">
                <div class="product-datasheet-images">
                    <div class="product-datasheet-main-image">
                        <div class="column">
                            <img src="{{Storage::url('hp-x32c.webp')}}" alt="">
                        </div>
                        
                    </div>
                    <div class="five-columns product-datasheet-secondary-images">
                        <div class="column"><img src="{{Storage::url('1673-hp-x32c.webp')}}" alt=""></div>
                        <div class="column"><img src="{{Storage::url('2390-hp-x32c.webp')}}" alt=""></div>
                        <div class="column"><img src="{{Storage::url('3306-hp-x32c.webp')}}" alt=""></div>
                        <div class="column"><img src="{{Storage::url('4458-hp-x32c.webp')}}" alt=""></div>
                        <div class="column"><img src="{{Storage::url('5241-hp-x32c.webp')}}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="product-datasheet-main">
                    <div class="product-datasheet-title">
                        <h3>HP X32c 31.5" LED FullHD 165Hz FreeSync Premium Curva</h3>
                    </div>
                    <div class="product-datasheet-price">
                        <span>304,40€</span>
                    </div>
                    <div class="product-datasheet-description">
                        <ul>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem earum eveniet sint voluptatum laboriosam, voluptate optio tenetur fugiat consequatur ullam fugit, labore odit neque quod natus at, enim explicabo dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, fugiat. Aut at harum assumenda accusantium eligendi, magni dolores tenetur architecto perferendis aperiam aliquid eius, quidem quae cumque dicta similique et.</p>
                        </ul>
                    </div>
                    <div class="single-column product-datasheet-stock">
                        <div class="column">

                            <span>Cantidad:</span>

                            @include('front.components.mobile.plusMinusButton')
                        </div>
                    </div>
                    <div class="product-datasheet-buy-buttons">
                        <div class="single-column">
                            <div class="column">
                                <div class="cart-button">
                                    <button>
                                        <svg viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M10,0V4H8L12,8L16,4H14V0M1,2V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18Z" />
                                        </svg>
                                        <span>Añadir al carro</span>
                                    </button>
                                </div>
                                <div class="buy-button">
                                    <button>
                                        <span>Comprar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="selects-container">
            <div class="single-column">
                <div class="column">
                    <div class="field">
                        <div class="options-select">
                            <select name="options-select" id="">
                                <option value="descripcion" class="option">descripción</option>
                                <option value="opiniones" class="option">Opiniones</option>
                                <option value="especificaciones" class="option">Especificaciones</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="contents-container">
                            <div class="options">
                                <div class="contents">
                                    <div class="content show" data-option="descripcion">
                                        <p>
                                            El libro relata las aventuras y desventuras de un hidalgo de 50 años llamado Alonso Quijano, quien decide ser un caballero andante como aquellos que aparecen en sus libros de caballerías favoritos.
                                            Las hazañas de don Quijote están contenidas en dos tomos que narran tres salidas. Por un lado, la “Primera parte” denominada como El ingenioso Hidalgo Don Quijote de la Mancha está formada por 52 capítulos y en ella se encuentran la primera salida y la segunda salida.
                                        </p>
                                    </div>
                                    <div class="content" data-option="opiniones">
                                        <p>
                                            El principito es una narración corta del escritor francés Antoine de Saint-Exupéry, que trata de la historia de un pequeño príncipe que parte de su asteroide a una travesía por el universo, en la cual descubre la extraña forma en que los adultos ven la vida y comprende el valor del amor y la amistad.
                                            El principito es tenido como uno de los mejores libros de todos los tiempos y un clásico contemporáneo de la literatura universal.
                                        </p>
                                    </div>
                                    <div class="content" data-option="especificaciones">
                                        <p>
                                            1984 de George Orwell es una novela de distopía cuya trama ocurre en Oceanía, un país dominado por un gobierno totalitario que mantiene en constante vigilancia a sus ciudadanos e, incluso, insiste en espiar sus pensamientos para mantener el orden.
                                            La novela es una de las obras más icónicas del siglo XX por su denuncia de prácticas establecidas por gobiernos como los de Franco y Stalin, las cuales han sido adoptadas por muchos dictadores a lo largo de la historia.                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>                                                
                    </div>
                </div>
            </div>
    </div>
    <x-savedChangesStatus></x-savedChangesStatus>
</div>

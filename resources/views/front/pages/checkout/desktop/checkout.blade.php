<div class="page-section" id="checkout">
    <div class="checkout-container">
        <form class="front-form" id="checkout-form">
            <div class="two-columns checkout-main">
                <div class="column">
                    <div class="checkout-left">
                        <div class="checkout-title">
                            <h3>Billing details</h3>
                        </div>
                        <div class="two-columns">
                            <div class="column">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="required" data-type="nombre">
                            </div>
                            <div class="column">
                                <label for="surnames">Apellidos</label>
                                <input type="text" name="surnames" id="surnames" class="required" data-type="apellidos">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="">Nombre de empresa (opcional)</label>
                                <input type="text" name="company" id="">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="country">País / Región</label>
                                <select id="country" name="country" class="required" data-type="país">
                                    <option value="">Selecciona un país</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="province">Provincia</label>
                                <select id="province" name="province" class="required" data-type="província">
                                    <option value="">Select your province</option>
                                    <option value="Álava/Araba">Álava/Araba</option>
                                    <option value="Albacete">Albacete</option>
                                    <option value="Alicante">Alicante</option>
                                    <option value="Almería">Almería</option>
                                    <option value="Asturias">Asturias</option>
                                    <option value="Ávila">Ávila</option>
                                    <option value="Badajoz">Badajoz</option>
                                    <option value="Baleares">Baleares</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Burgos">Burgos</option>
                                    <option value="Cáceres">Cáceres</option>
                                    <option value="Cádiz">Cádiz</option>
                                    <option value="Cantabria">Cantabria</option>
                                    <option value="Castellón">Castellón</option>
                                    <option value="Ceuta">Ceuta</option>
                                    <option value="Ciudad Real">Ciudad Real</option>
                                    <option value="Córdoba">Córdoba</option>
                                    <option value="Cuenca">Cuenca</option>
                                    <option value="Gerona/Girona">Gerona/Girona</option>
                                    <option value="Granada">Granada</option>
                                    <option value="Guadalajara">Guadalajara</option>
                                    <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                    <option value="Huelva">Huelva</option>
                                    <option value="Huesca">Huesca</option>
                                    <option value="Jaén">Jaén</option>
                                    <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                    <option value="La Rioja">La Rioja</option>
                                    <option value="Las Palmas">Las Palmas</option>
                                    <option value="León">León</option>
                                    <option value="Lérida/Lleida">Lérida/Lleida</option>
                                    <option value="Lugo">Lugo</option>
                                    <option value="Madrid">Madrid</option>
                                    <option value="Málaga">Málaga</option>
                                    <option value="Melilla">Melilla</option>
                                    <option value="Murcia">Murcia</option>
                                    <option value="Navarra">Navarra</option>
                                    <option value="Orense/Ourense">Orense/Ourense</option>
                                    <option value="Palencia">Palencia</option>
                                    <option value="Pontevedra">Pontevedra</option>
                                    <option value="Salamanca">Salamanca</option>
                                    <option value="Segovia">Segovia</option>
                                    <option value="Sevilla">Sevilla</option>
                                    <option value="Soria">Soria</option>
                                    <option value="Tarragona">Tarragona</option>
                                    <option value="Tenerife">Tenerife</option>
                                    <option value="Teruel">Teruel</option>
                                    <option value="Toledo">Toledo</option>
                                    <option value="Valencia">Valencia</option>
                                    <option value="Valladolid">Valladolid</option>
                                    <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                    <option value="Zamora">Zamora</option>
                                    <option value="Zaragoza">Zaragoza</option>
                                    </select>
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="adress">Dirección</label>
                                <input type="text" name="address" id="address" placeholder="Número y calle" class="required" data-type="dirección">                                    
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <input type="text" name="extra_address" id="extra_address" placeholder="apartamento, suite, unidad, etc. (opcional)">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" id="city" placeholder="" class="required" data-type="ciudad">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="postal_code">ZIP</label>
                                <input type="text" name="postal_code" id="postal_code" placeholder="" class="required" data-type="zip">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="phonenumber">Teléfono</label>
                                <input type="tel" name="phonenumber" id="phonenumber" placeholder="" class="required" data-type="teléfono">
                            </div>
                        </div>
                        <div class="single-column">
                            <div class="column">
                                <label for="email">Dirección Email</label>
                                <input type="email" name="email" id="email" placeholder="" class="required" data-type="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="checkout-right">
                        <div class="checkout-title">
                            <h3>Tu pedido</h3>
                        </div>
                        <div class="checkout-right-main">
                            <div class="two-columns">
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <span>Producto</span>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <span>Subtotal</span>
                                    </div>
                                </div>
                            </div>
                            <div class="two-columns">
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <div class="subtotal-title">
                                            <span>Subtotal</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <div class="subtotal-price">
                                            <span>15.00€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two-columns">
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <div class="total-title">
                                            <span>Total</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="checkout-main-item">
                                        <div class="total-price">
                                            <span>15.00€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-methods">
                                @foreach($payment_methods as $payment_method)
                                    <div class="single-column">
                                        <div class="column">
                                            <div class="payment-method">
                                                <input type="radio" name="paymentmethod" id="{{$payment_method->name}}" value="{{$payment_method->id}}">
                                                <label for="{{$payment_method->name}}">{{$payment_method->title}}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="single-column">
                                <div class="column">
                                    <div class="place-order">
                                        <div class="place-order-description">
                                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purpouses described in our privacy policy</p>
                                        </div>
                                        <div class="place-order-button" data-url="{{route('front_checkout_store')}}">
                                            <button class="submit-button" id="submit-button" type="submit">Place order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

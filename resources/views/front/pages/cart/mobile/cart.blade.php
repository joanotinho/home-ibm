<div class="mobile-cart">
    <div class="two-columns cart-product">
        <div class="column">
            <div class="product-image">
                <img src="{{Storage::url('msi-g241.webp')}}" alt="">
            </div>
        </div>
        <div class="column">
            <div class="single-column">
                <div class="column">
                    <div class="cart-title">
                        <span>MSI Optix G241 23.8" LED IPS FullHD 144Hz FreeSync</span>  
                    </div>  
                </div>
            </div>
            <div class="single-column">
                <div class="cart-stock">
                    @include('front.components.desktop.plusMinusButton')
                </div>
            </div>
            <div class="total-price">
                <div class="two-columns">
                    <div class="column">
                        <span>Precio:</span>
                    </div>
                    <div class="column">
                        <div class="total">
                            <span>188,99€</span>
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-taxes-container">
        <div class="cart-taxes">
            <div class="desktop-two-columns mobile-two-columns cart-tax">
                <div class="column">
                    <span>21% de IVA</span>
                </div>
                <div class="column">
                    <span>39.69€</span>
                </div>
            </div>
            <div class="desktop-two-columns mobile-two-columns cart-tax">
                <div class="column">
                    <span>Gastos de envío</span>
                </div>
                <div class="column">
                    <span>11,99€</span>
                </div>
            </div>
            <div class="desktop-two-columns mobile-two-columns cart-tax">
                <div class="column">
                    <span>Total</span>
                </div>
                <div class="column">
                    <span>188,99€</span>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-button center">
        <a href="/caja">Siguiente</a>
    </div>
</div>
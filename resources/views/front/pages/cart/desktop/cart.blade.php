<div class="desktop-cart">
    <div class="table-top-bar">
        <table>
            <tr class="cart-header">
                <th class="table-header-title">Cesta</th>
                <th class="table-header-removal"></th>
                <th class="table-header-price">Precio</th>
                <th class="table-header-quantity">Cantidad</th>
                <th class="table-header-total">Total</th>
            </tr>
        </table>
       
    </div>
    {{-- @if(isset($carts)) --}}
        @foreach ($carts as $cart)
            <table>
                <tr class="cart-product">
                    <td class="table-product-image center">
                        {{-- <img src="{{Storage::url('msi-g241.webp')}}" alt=""> --}}
                        <span>{{$cart->price->product->title}}</span>
                    </td>
                    <td class="table-product-description center"></td>
                    <td class="table-product-price center">{{$cart->price->base_price}}€</td>
                    <td class="table-product-quantity center">
                        <div class="cart-stock">
                            <div class="stock-counter">
                                <div class="stock-button" data-stock-button-value="+">
                                    <button>+</button>
                                </div>
                                <input name="amount" type="number" id="amount" class="number-display" value="{{$cart->quantity}}" min="1" max="100" onkeydown="return false">
                                <div class="stock-button" data-stock-button-value="-">
                                    <button>-</button>
                                </div> 
                            </div>
                        </div>
                    </td>
                    <td class="table-product-total center"></td>
                </tr>
            </table>            
        @endforeach
    {{-- @endif --}}
    <div class="cart-taxes-container">
        <div class="cart-taxes">
            <div class="two-columns cart-tax">
                <div class="column">
                    <span>21% de IVA</span>
                </div>
                <div class="column">
                    <span>39.69€</span>
                </div>
            </div>
            <div class="two-columns cart-tax">
                <div class="column">
                    <span>Gastos de envío</span>
                </div>
                <div class="column">
                    <span>11,99€</span>
                </div>
            </div>
            <div class="two-columns cart-tax">
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
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
                        <form action="" class="front-form">
                            <div class="cart-stock">
                                <div class="cart-stock-counter">
                                    <div class="cart-stock-button" data-stock-button-value="+" data-url="{{route('front_cart_plus', ['fingerprint' => $fingerprint, 'price_id' => $cart->price_id])}}">
                                        <button type="button">+</button>
                                    </div>
                                    <input name="amount" type="number" class="number-display" value="{{$cart->quantity}}" min="1" max="100" onkeydown="return false">
                                    <div class="cart-stock-button" data-stock-button-value="-" data-url="{{route('front_cart_minus', ['fingerprint' => $fingerprint, 'price_id' => $cart->price_id])}}">
                                        <button type="button">-</button>
                                    </div> 
                                </div>
                            </div>
                        </form>
                    </td>
                    <td class="table-product-total center">
                        {{$cart->price->base_price * $cart->quantity}}€
                    </td>
                </tr>
            </table>            
        @endforeach
    {{-- @endif --}}
    <div class="cart-taxes-container">
        <div class="cart-taxes">
            <div class="two-columns cart-tax">
                <div class="column">
                    <span>Coste IVA</span>
                </div>
                <div class="column">
                    <span>
                        <span class="cart-tax-value">{{number_format((float)($cart->quantity * $cart->price->base_price / $cart->price->tax->multiplier), 2, ',', '')}}€</span>
                    </span>
                </div>
            </div>
            <div class="two-columns cart-tax">
                <div class="column">
                    <span>Total</span>
                </div>
                <div class="column">
                    <span>
                        {{-- @foreach ($carts as $cart)
                            {{$cart->price->base_price * $cart->quantity}}€
                        @endforeach --}}
                        {{$total}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-button center">
        <a href="/caja">Siguiente</a>
    </div>
</div>
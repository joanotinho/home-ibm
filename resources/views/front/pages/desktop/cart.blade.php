@extends('front.layout.master')

@section('content')
    <div class="desktop-cart">
        <table>
            <tr class="cart-header">
                <th class="table-header-title">Cesta</th>
                <th class="table-header-removal"></th>
                <th class="table-header-price">Precio</th>
                <th class="table-header-quantity">Cantidad</th>
                <th class="table-header-total">Total</th>
            </tr>
            <tr class="cart-product">
                <td class="table-product-image center">
                    <img src="{{Storage::url('msi-g241.webp')}}" alt="">
                </td>
                <td class="table-product-description center">MSI Optix G241 23.8" LED IPS FullHD 144Hz FreeSync</td>
                <td class="table-product-price center">189,99€</td>
                <td class="table-product-quantity center">
                    <div class="cart-stock">
                        @include('front.components.plusMinusButton')
                    </div>
                </td>
                <td class="table-product-total center">189,99</td>
            </tr>
        </table>
        <table>
            <tr class="cart-header">
                <th class="table-header-title">Cesta</th>
                <th class="table-header-removal"></th>
                <th class="table-header-price">Precio</th>
                <th class="table-header-quantity">Cantidad</th>
                <th class="table-header-total">Total</th>
            </tr>
            <tr class="cart-product">
                <td class="table-product-image center">
                    <img src="{{Storage::url('msi-g241.webp')}}" alt="">
                </td>
                <td class="table-product-description center">MSI Optix G241 23.8" LED IPS FullHD 144Hz FreeSync</td>
                <td class="table-product-price center">189,99€</td>
                <td class="table-product-quantity center">
                    <div class="cart-stock">
                        @include('front.components.plusMinusButton')
                    </div>
                </td>
                <td class="table-product-total center">189,99</td>
            </tr>
        </table>
        <div class="cart-taxes-container">
            <div class="cart-taxes">
                <div class="desktop-two-columns cart-tax">
                    <div class="column">
                        <span>21% de IVA</span>
                    </div>
                    <div class="column">
                        <span>39.69€</span>
                    </div>
                </div>
                <div class="desktop-two-columns cart-tax">
                    <div class="column">
                        <span>Gastos de envío</span>
                    </div>
                    <div class="column">
                        <span>11,99€</span>
                    </div>
                </div>
                <div class="desktop-two-columns cart-tax">
                    <div class="column">
                        <span>Total</span>
                    </div>
                    <div class="column">
                        <span>188,99€</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-cart">
        <div class="mobile-two-columns cart-product">
            <div class="column">
                <div class="product-image">
                    <img src="{{Storage::url('msi-g241.webp')}}" alt="">
                </div>
            </div>
            <div class="column">
                <div class="mobile-single-column">
                    <div class="column">
                        <div class="cart-title">
                            <span>MSI Optix G241 23.8" LED IPS FullHD 144Hz FreeSync</span>  
                        </div>  
                    </div>
                </div>
                <div class="mobile-single-column">
                    <div class="cart-stock">
                        @include('front.components.plusMinusButton')
                    </div>
                </div>
                <div class="mobile-single-column">
                    <div class="column">
                        <div class="column">
                            <div class="price">
                                <span>188,99€</span>
                            </div>
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
            <button>Siguiente</button>
        </div>
    </div>
@endsection
<div class="gallery">
    <div class="two-columns">
        <div class="column column-aside">
            <div class="single-column">
                <div class="column">
                    <div class="categories">
                        <div class="categories-title">
                            <h3>Categorías</h3>
                        </div>
                        <div class="categories-content">
                            <ul>
                                @foreach ($product_categories as $product_category)
                                    <li class="category-button {{ isset($category) && $product_category->id == $category->id ? 'active' : ''}}" data-url="{{route('front_product_category', ['category' => $product_category->id])}}">
                                        {{ $product_category->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
                        <select name="select" class="order-select">
                            <option class="order-option" value="" {{ isset($order) && $order == '' ? 'selected' : ''}}>Ordenar por</option>
                            <option class="order-option" value="{{route('front_product_order', ['order' => 'desc'])}}" {{ isset($order) && $order == 'desc' ? 'selected' : ''}}>De mayor a menor precio</option>
                            <option class="order-option" value="{{route('front_product_order', ['order' => 'asc'])}}" {{ isset($order) && $order == 'asc' ? 'selected' : ''}}>De menor a mayor precio</option>
                        </select>
                    </div>
                </div>
            </div>
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
                                        <span>{{$product->prices->first()->base_price}}€</span>
                                    </div>
                                    <div class="product-button">
                                        <a data-url="{{route('front_product', ['product' => $product->id])}}">Ver ficha</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
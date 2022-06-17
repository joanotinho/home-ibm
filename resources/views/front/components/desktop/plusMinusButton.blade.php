<div class="cart-stock">
    <div class="stock-counter">
        <div class="stock-button" data-stock-button-value="+">
            <button>+</button>
        </div>
        <input name="amount" type="number" id="amount" class="number-display" value="{{ isset($cart) && $cart == '' ? $cart : '1'}}" min="1" max="100" onkeydown="return false">
        <div class="stock-button" data-stock-button-value="-">
            <button>-</button>
        </div> 
    </div>
</div>
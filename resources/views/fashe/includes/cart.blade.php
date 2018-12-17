<div class="header-wrapicon2 m-r-13">
    <img src="{{ asset('fashe') }}/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown show-header-cart" alt="ICON">
    <span class="header-icons-noti header-cart-count">0</span>

    <!-- Header cart noti -->
    <div class="header-cart header-dropdown">

        <div class="header-cart-buttons">
            <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="{{ route('show.cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    @lang("langue.view_cart")
                </a>
            </div>

            <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 clear_cart">
                    @lang("langue.clear_cart")
                </a>
            </div>
        </div>

        <div class="header-cart-total">
            @lang("langue.cart_total"): $ <span class="header-cart-summa" id="header-cart-summa">0.00</span>
        </div>
        <br>
        <ul class="header-cart-wrapitem-cart" data-has-view="no">
    </div>
</div>

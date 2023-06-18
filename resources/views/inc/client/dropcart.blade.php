@if (auth()->check())
    @if ($commande)
        <div class="cart-dropdown" id="cart-dropdown">
            <div class="cart-content-wrap">
                <div class="cart-header">
                    <h2 class="header-title">Examen du panier</h2>
                    <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
                </div>

                <div class="cart-body">
                    <ul class="cart-item-list">
                        @php $count = 0 @endphp
                        @foreach ($commande->lignecommandes as $lc)
                            @if ($count < 3)
                                <li class="cart-item">
                                    <div class="item-img">
                                        <a href="single-product.html"><img src="/{{ $lc->customproduct->photo }}"
                                                alt="{{ $lc->customproduct->name }}"></a>
                                        <a href="{{ route('command.delete', ['idlc' => $lc->id]) }}"
                                            class="close-btn"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title"><a
                                                href="single-product-3.html">{{ $lc->customproduct->name }}</a></h3>
                                        <div class="item-price">Taille: <span
                                                class="currency-symbol">
                                                {{ $lc->selected_size }}</span></div>
                                        <div class="item-price">{{ $lc->customproduct->price }}<span
                                                class="currency-symbol">
                                                DT</span></div>
                                                @if ($lc->customproduct->etat == "en attente")
                                                <span class="badge badge-warning">en attente</span>
                                               @else
                                               <span class="badge badge-success">Valide</span>
                                               @endif
                                               <div class="item-price">Quantité: <span
                                                class="currency-symbol">
                                                {{ $lc->qte }}</span></div>
                                       
                                    </div>
                                </li>
                                @php $count++ @endphp
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="cart-footer">
                    <h3 class="cart-subtotal">
                        <span class="subtotal-title">Totale:</span>
                        <span class="subtotal-amount">{{ $commande->getTotal() }} TND</span>
                    </h3>
                    <div class="group-btn">
                        <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary viewcart-btn">Voir le panier</a>
                        <a href="{{ route('checkout') }}" class="axil-btn btn-bg-secondary checkout-btn">Vérifier</a>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="cart-dropdown" id="cart-dropdown">
            <div class="cart-content-wrap">
                <div class="cart-header">
                    <h2 class="header-title">Examen du panier</h2>
                    <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
                </div>

                <div class="cart-body">



                    <div class="group-btn">
                        <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary viewcart-btn">Voir le panier</a>

                    </div>
                </div>

            </div>
        </div>
    @endif
@endif

<style>
    .badge-success {
        color: #1aae6f;
        background-color: #b0eed3;

    }

    .badge {
        text-transform: uppercase;
    }

    .badge-warning {
        color: #ff3709;
        background-color: #fee6e0;
    }

    .badge {
        text-transform: uppercase;
    }
</style>
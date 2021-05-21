<x-app-layout>    
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Checkout payment</x-title>
            <div class="w-1/3 mx-auto">
                <form id="payment-form" action="{{route('orders.store')}}" class="my-5 p-5 rounded-md">
                    @csrf
                    <div id="card-element" class="border-2 bg-white p-3 rounded-md">
                        <!-- Elements will create input elements here -->
                    </div>
                    
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                    
                    <div class="text-center mt-5">
                        <x-button id="submit" class="text-xl">Pay £{{Session::get('cart')->total_price}}</x-button>
                    </div>
                   
                </form>
            </div>
    </x-slot>
    
    @push('scripts')

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        //set up
        var stripe = Stripe('pk_test_51IsQsoEsVakBTXvJMYhg4MyBGK7VE8059bxyFiq4mfhTpcYpQOTaozRveu5y2dWZ8oupy3q5VqiUEF2IJt9dnQu500gieQvVpw');
        var elements = stripe.elements();
        var style = {
        base: {
            color: "#32325d",
        }
        };
        //mount card elements
        var card = elements.create("card", { style: style });
        card.mount("#card-element");
        //display card details errors
        card.on('change', ({error}) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        let form = document.getElementById('payment-form');
        //send request to stripe on form submit
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            form.submit.disabled = true;
            stripe.confirmCardPayment('{{ $clientSecret }}', {
                payment_method: {
                    card: card,
                }
            }).then(function(result) {
                if (result.error) {
                    console.log(result.error.message);
                    form.submit.disabled = false;
                } else {
                    //if payment succeed, send request to checkout controller
                    if (result.paymentIntent.status === 'succeeded') {
                        let paymentIntent = result.paymentIntent;
                        let url = form.action;
                        let csrf = form._token.value;
                    
                        fetch(
                            url,
                            {
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                method: 'POST',
                                body: JSON.stringify({
                                    paymentIntent
                                })
                            }
                        ).then( data => {
                            console.log(data);
                            window.location.href = 'thank-you';
                        }).catch( error => {
                            console.log(error);
                        });
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
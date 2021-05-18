<x-app-layout>    
    <x-slot name="content">
        <div class="flex flex-col mx-auto container">
            <x-title>Checkout payment</x-title>

            <div class="w-1/3 mx-auto">
                <form id="payment-form" class="my-5 p-5 rounded-md">
                    <div id="card-element" class="border-2 bg-white p-3 rounded-md">
                        <!-- Elements will create input elements here -->
                    </div>
                    
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                    
                    <div class="text-center mt-5">
                        <x-button id="submit">Submit Payment</x-button>
                    </div>
                   
                </form>
            </div>
    </x-slot>
    
    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51IsQsoEsVakBTXvJMYhg4MyBGK7VE8059bxyFiq4mfhTpcYpQOTaozRveu5y2dWZ8oupy3q5VqiUEF2IJt9dnQu500gieQvVpw');
        var elements = stripe.elements();
        var style = {
        base: {
            color: "#32325d",
        }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.on('change', ({error}) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();
            // If the client secret was rendered server-side as a data-secret attribute
            // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
            stripe.confirmCardPayment('{{ $clientSecret }}', {
                payment_method: {
                    card: card,
                }
            }).then(function(result) {
                if (result.error) {
                    console.log(result.error.message);
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        console.log(result.paymentIntent);
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
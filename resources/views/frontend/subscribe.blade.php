@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body col-md-8">
                 <input id="card-holder-name" type="text" class="form-control" placeholder="Card holder name">

                 <!-- Stripe Elements Placeholder -->
                 <div id="card-element" class="form-control mt-3"></div>

                 <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-success mt-3">
                     Process Payment 
                 </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('pk_test_HPZ87TAiQ2wAaEM4kXhRMPkE00Agya1J8b');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            // Display "error.message" to the user...
            console.log(error.message);
        } else {
            // The card has been verified successfully...
            axios.post('/subscribe', {
                paymentMethod: setupIntent,
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (error) {
                console.log(error);
              });

        }
    });
</script>
@endsection

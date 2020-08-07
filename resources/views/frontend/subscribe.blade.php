@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

              <div id="errors">

              </div>


                <div class="card-header" style="border:none"><h5>Complete Your Payment</h5></div>
            <div class="breadcrumb">
                    
                <div class="card-body">

                @if($plan=='yearly')
                <input type="hidden" name="plan" id="plan" value="price_1HDOSpH1fI2EIRYNDWjvhjmN">
                @else
                <input type="hidden" name="plan" id="plan" value="price_HJF2CNzKvUqvFW">
                @endif

                 <input id="card-holder-name" type="text" class="form-control" placeholder="Card holder name">

                 <textarea id="line1" rows="2" class="form-control mt-3" required>Enter Your Address</textarea>
                 <input type="number" id="postal_code" class="form-control mt-3" placeholder="Enter postal code" size="6" required autocomplete="of" >
                 <input type="text" id="city" class="form-control mt-3" placeholder="Enter Your City" required >
                 <input type="text" id="state" class="form-control mt-3" placeholder="Enter Your State" required>
                 <input type="text" id="country" class="form-control mt-3" placeholder="Enter Your Country" required>

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
    const plan = document.getElementById('plan').value;
    const line1 = document.getElementById('line1');
    const postal_code = document.getElementById('postal_code');
    const city = document.getElementById('city');
    const state = document.getElementById('state');
    const country = document.getElementById('country');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement
                }
            }
        );

        if (error) {
            // Display "error.message" to the user...
            $('#errors').attr('class','alert alert-danger');
            console.log(error.message);
            $('#errors').html('<li>'+error.message+'</li>');
        } else {
            // The card has been verified successfully...
            axios.post('/subscribe', {
                paymentMethod: setupIntent,
                name:cardHolderName.value,
                plan:plan,
                line1:line1.value,
                postal_code:postal_code.value,
                city:city.value,
                state:state.value,
                country:country.value,
              })
              .then(function (response) {
                console.log(response.data);
               alert('congrats you successfully paid for subscription');
                window.location.href = response.data.redirect;
              })
              .catch(function (error) {
                var allerrors=error.response.data.errors;
                    
             $('#errors').attr('class','alert alert-danger');
               for (x in allerrors) {
                $('#errors').append('<li>'+allerrors[x][0]+'</li>')
               }


              });

        }
    });
</script>
@endsection

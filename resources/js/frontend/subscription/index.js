const { transform } = require("lodash");

let stripeCheckout = {
    init: function() {
        stripeCheckout.formSubmit();
    },

    formSubmit: function () {
        const stripe = Stripe(stripeKey);
        const elements = stripe.elements()
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '14px',
                color: '#32325d',
            },
        };
        const cardElement = elements.create('card', {style: style});
        cardElement.mount('#card-element')
        
        const cardHolderName = document.getElementById('cardholder')
        const btn = $('#checkout');
        const btnName = btn.text();
        const frm = $('#payment-form');
 
        btn.on('click', async () => {
            // attach card
            if (frm.valid()) {
                let url = frm.attr('action');
                let type = frm.attr('method');
                $('#card-error').text('');
                
                showButtonLoader(btn, btnName, true); 
                const paymentSource = $('.payment-source:checked').val(); 
                if (paymentSource == 'new-card') {
                    let clientSecret = btn.data('secret');
                    const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, 
                        {
                            payment_method: {
                                card: cardElement,
                                billing_details: {
                                    name: cardHolderName.value
                                }   
                            }
                        }
                    )
                    if (error) {
                        $('#card-error').text(error.message)
                        showButtonLoader(btn, btnName, false); 
                        return false;
                    } else {
                        $('#token').val(setupIntent.payment_method);
                    }
                } else {
                    $('#token').val(paymentSource);
                }
                
                $.ajax({
                    type: type,
                    url: url,
                    data: frm.serialize(),
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message);
                            setTimeout(function() {
                                window.location.href = route('frontend.pricing');
                                }, 2000);
                        }
                    },
                    error: function(err) {
                        handleError(err);
                        showButtonLoader(btn, btnName, false); 
                    },
                    complete: function() {
                        // showButtonLoader(btn, btnName, false);
                    }
                });
            }
        })
    },
}

$(function() {
    stripeCheckout.init();
});
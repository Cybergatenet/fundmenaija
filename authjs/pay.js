// PAYSTACK AUTH
// const p_method = document.querySelector('#p_method');
// const paymentForm = document.getElementById('form');
// paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack() {
    // e.preventDefault();
<<<<<<< HEAD
    
=======

>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
    let handler = PaystackPop.setup({
        key: 'pk_live_4f0d9358be6a7d2d6eb726920a093e9b4cd3c7c4', 
        email: document.getElementById("email").value,
        amount: document.getElementById("amount").value * 100,
        ref: 'FMN'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
            // alert('Window closed.');
            const answer = confirm('Donation Cancelled. Try Again?');
            if(answer){
                // window.location.href = './pay.php?status=cancelled';
                // window.location.href = 'javascript://history.go(-1)';
                window.location.href = '#';
            }else{
                // window.location.href = './donate.php'
                window.location.href = 'javascript://history.go(-1)';
            }
        },
        callback: function(response){
            let message = 'Payment completed! Reference: ' + response.reference;
            alert(message);
            windon.location = '../auth/paystack.php?reference='+ response.reference;
        }
    });

    handler.openIframe();
}   


// PAYSTACK AUTH
// const p_method = document.querySelector('#p_method');
// const paymentForm = document.getElementById('form');
// paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack() {
// e.preventDefault();

let handler = PaystackPop.setup({
    key: 'pk_test_400dc6fa6473e00bef61e62ab26752d0f57be1fb', 
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


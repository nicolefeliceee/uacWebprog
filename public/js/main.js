addBtn = document.getElementById('addBtn');
wallet = document.getElementById('wallet');



minusBtn.addEventListener('click', function(){
    // console.log(parseInt(wallet.value));
    if(wallet.value<=99){
        wallet.value=0;
    }
    else{
        wallet.value = parseInt(wallet.value) - 100;
    }
})
addBtn.addEventListener('click', function(){
    // console.log(parseInt(wallet.value));
    wallet.value = parseInt(wallet.value) + 100;
})

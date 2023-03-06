const glazeChoices = document.querySelectorAll(".one");

const price = document.getElementById("money");

const arr = [0,0,0];

glazeChoices.forEach(element => {
    element.addEventListener('click',function(e){
        const choice = e.target.dataset["rt"];
       
        if(choice != "standard") {
            arr[0] = 2;
        } else {
            arr[0] = 0;
        }

        price.value = tally(arr);
    });
});



function tally (arrr){
    let sum = 0;
    arrr.forEach(element => {
        sum += element;
    });

    return sum;

}

const quantity = document.getElementById("quantity");

quantity.addEventListener("input", function(){
    if(quantity.value < 1){
        quantity.value = 1;
    }
})
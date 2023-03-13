
// Document objects

const glazeCheckedItems = document.querySelectorAll(".glaze-check");
const toppings = document.querySelectorAll(".toppings");
const fillings = document.querySelectorAll(".fillings");

const price = document.getElementById("money");


// Stores default radio and checked states for glaze type, toppings, and filling.
const storeGlaze = [true, false, false, false];
const storeToppings =[false,false,false,false,false,false];
const storeFilling =[true,false,false,false];

// Stores the cost for items checked per a section.
let tally = [0,0,0];

// Gets the error message for max amount of toppings.
const errorToppings = document.querySelector(".errorToppings");

setStoredItems(glazeCheckedItems,storeGlaze,"glazeChecked");
setStoredItems(toppings, storeToppings, "toppingsChecked");
setStoredItems(fillings, storeFilling,"fillingsChecked");

function setStoredItems (items, itemsToStore, type){
    items.forEach(item =>{
        item.addEventListener('change', function(){
            for(let i = 0; i < items.length; i++){
                itemsToStore[i] = items[i].checked;
            }
            localStorage.setItem(type,JSON.stringify(itemsToStore));
            setTally(storeGlaze,0);
            setTally(storeFilling,1);
            setTallyToppings(storeToppings);
            storeCostValues(tally);
            getStoredCostValues();
            setTotalDisplay();
        });
    });
}

window.addEventListener("load", function(){
    mantainItems(storeGlaze,glazeCheckedItems,"glazeChecked");
    mantainItems(storeToppings,toppings,"toppingsChecked");
    mantainItems(storeFilling,fillings,"fillingsChecked");

    if(JSON.parse(localStorage.getItem("tally") !== null)){
        getStoredCostValues();
    }

    setTotalDisplay();
});


function mantainItems(storedCheckedItems,itemsUpdated,type){
    const storedItems = JSON.parse(localStorage.getItem(type));
    if(storedItems !== null){
        for(let i = 0; i < storedCheckedItems.length; i++){
            itemsUpdated[i].checked = storedItems[i]
        }
    }
}

toppings.forEach(topping =>{
    topping.addEventListener('click', function(e){
        setToppingsCount(topping, e, errorToppings);
    });
});


function setToppingsCount(itemChecked,target,error){
    let count = JSON.parse(localStorage.getItem("toppingsCount"));

    if(count === null){
        localStorage.setItem("toppingsCount",JSON.stringify(count));
        count = 0;
    }

    if(itemChecked.checked === true){
        count++;
    } else{
        count --;
    }

    localStorage.setItem("toppingsCount",JSON.stringify(count));

    if(count < 3){
        error.style.display = "none";
    } else if(count > 3){
        count = 3;
        target.target.checked = false;
        error.style.display = "block";
        setStoredItems(toppings, storeToppings, "toppingsChecked")
    }

    localStorage.setItem("toppingsCount",JSON.stringify(count));
}

// Ensures quantity input cannot go below 0;

quantity.addEventListener("input", function(){
    const quantity = document.getElementById("quantity");
    if(quantity.value < 1){
        quantity.value = 1;
    }
    storeCostValues(tally);
    setTotalDisplay();
});


function setTally(checkedItems, index){
    if(checkedItems[0] === true){
        tally[index] = 0;
    } else {
        tally[index] = 2;
    }

}

function setTallyToppings(checkedItems){
    let sum = 0;
    checkedItems.forEach(item => {
        if(item === true){
            sum += 1;
        }
    });
    tally[2] = sum * 2;
}


function setTotalDisplay (){
    const totalDisplay = document.getElementById("money");
    const quanityElement = document.getElementById("quantity");
    let quanityVal = quanityElement.value;
    let total = 4;
    let sum = 0;

    if(tally !== null){
        tally.forEach(number =>{
            sum += number;
        });
    }
   
    total += sum;
    total *= quanityVal; 
    totalDisplay.value = total;
}


function storeCostValues (tallyArray){
    const quantity = document.getElementById("quantity");
    localStorage.setItem("tally",JSON.stringify(tallyArray));
    localStorage.setItem("quantity",JSON.stringify(quantity.value));
}

function getStoredCostValues(){
    const quanity = document.getElementById("quantity");
    tally = JSON.parse(localStorage.getItem("tally"));
    quanity.value = JSON.parse(localStorage.getItem("quantity"));
}
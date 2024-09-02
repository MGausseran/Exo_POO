class fruit {
    constructor(taxes, discount){
        this.taxes=taxes;
        this.discount=discount;
    }
}

class banana extends fruit {
    constructor(taxes, discount, price, number) {
        super(taxes, discount);
        this.price=price;
        this.number=number;
    }
}

class apple extends fruit {
    constructor(taxes, discount, price, number) {
        super(taxes, discount);
        this.price=price;
        this.number=number;
    }
}

class bottle {
    constructor(taxes, price, number) {
        this.taxes=taxes;
        this.price=price;
        this.number=number;
    }
}

const bananasInTheBasket = new banana(0.06,0.5,1,6);
const applesInTheBasket = new apple(0.06,0.5,1.5,3);
const bottlesInTheBasket = new bottle(0.21,10,2);

const priceOfFruitsInTheBasket = bananasInTheBasket.number*bananasInTheBasket.price+applesInTheBasket.number*applesInTheBasket.price;
const priceOfFruitsAfterDiscount = priceOfFruitsInTheBasket * (1-bananasInTheBasket.discount);

const totalPriceOfTheBasket = ((bananasInTheBasket.number*bananasInTheBasket.price)+(applesInTheBasket.number*applesInTheBasket.price)+(bottlesInTheBasket.number*bottlesInTheBasket.price));
const totalPriceOfTheBasketWithDiscountOnFruits = totalPriceOfTheBasket-priceOfFruitsAfterDiscount;

console.log(bananasInTheBasket.number*bananasInTheBasket.price);
console.log(applesInTheBasket.number*applesInTheBasket.price);
console.log(priceOfFruitsInTheBasket);
console.log(bottlesInTheBasket.number*bottlesInTheBasket.price)
console.log("The basket costs : "+totalPriceOfTheBasket+"€.");
console.log("With a 50% discount on fruits, the basket would cost: "+totalPriceOfTheBasketWithDiscountOnFruits+"€.");

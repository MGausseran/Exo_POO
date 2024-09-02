class fruit {
    constructor(taxes){
        this.taxes=taxes;
    }
}

class banana extends fruit {
    constructor(taxes, price, number) {
        super(taxes);
        this.price=price;
        this.number=number;
    }
}

class apple extends fruit {
    constructor(taxes, price, number) {
        super(taxes);
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

const bananasInTheBasket = new banana(0.06,1,6);
const applesInTheBasket = new apple(0.06,1.5,3);
const bottlesInTheBasket = new bottle(0.21,10,2);

const totalPriceOfTheBasket = "The basket contains " + bananasInTheBasket.number + ", " + applesInTheBasket.number + " and " + bottlesInTheBasket.number + ". The baskets costs " + ((bananasInTheBasket.number*bananasInTheBasket.price)+(applesInTheBasket.number*applesInTheBasket.price)+(bottlesInTheBasket.number*bottlesInTheBasket.price));

console.log(bananasInTheBasket.number*bananasInTheBasket.price);
console.log(applesInTheBasket.number*applesInTheBasket.price);
console.log(bottlesInTheBasket.number*bottlesInTheBasket.price)
console.log(totalPriceOfTheBasket);

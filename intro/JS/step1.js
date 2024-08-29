class beverage {
    constructor(color, price, temperature = "cold") {
        this.color=color;
        this.price=price;
        this.temperature=temperature;
    }
    
beverageInfos() {
    console.log(`This beverage has a ${this.color}, is served ${this.temperature} and cost ${this.price} euros.`)

}
}

const duvel = new beverage('blond', 3.50, "hot");
duvel.beverageInfos();
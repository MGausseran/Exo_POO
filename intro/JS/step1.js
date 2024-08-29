class beverage {
    constructor(color, price, temperature = "cold") {
        this.color=color;
        this.price=price;
        this.temperature=temperature;
    }
    
beverageInfos() {
    console.log(`${this.name} - This beverage has a ${this.color}, is served ${this.temperature}, has an alcohol rate estimated of ${this.alcoholContent} and cost ${this.price} euros. `)

}
}

class beer extends beverage {
constructor(color, price, temperature, name, alcoholContent) {
    super(color, price, temperature);
    this.name=name;
    this.alcoholContent=alcoholContent;
}
}

const duvel = new beer('blond', 3.50, "hot", "Duvel", 8.5);
duvel.beverageInfos();
class beverage {
    #color;
    #price;
    #temperature;
    constructor(color, price, temperature = "cold") {
        this.#color = color;
        this.#price = price;
        this.#temperature = temperature;
    }

    #beverageInfos(name, alcoholContent) {
        console.log(`${name} - This beverage has a ${this.#color} color, is served ${this.#temperature}, has an alcohol content of ${alcoholContent}% and costs ${this.#price} euros.`);
    }

    getBeverageInfos(name, alcoholContent) {
        this.#beverageInfos(name, alcoholContent);
    }
}

class beer extends beverage {
    #name;
    #alcoholContent;
    constructor(color, price, temperature, name, alcoholContent) {
        super(color, price, temperature);
        this.#name = name;
        this.#alcoholContent = alcoholContent;
    }

    // Méthode pour obtenir les informations complètes sur la bière
    getBeerInfos() {
        this.getBeverageInfos(this.#name, this.#alcoholContent);
    }
}

const duvel = new beer('blond', 3.50, "hot", "Duvel", 8.5);
duvel.getBeerInfos(); // Affiche "Duvel, 8.5% alcohol"
duvel.getBeerInfos(); // Affiche "Duvel - This beverage has a blond color, is served hot, has an alcohol content of 8.5% and costs 3.5 euros."

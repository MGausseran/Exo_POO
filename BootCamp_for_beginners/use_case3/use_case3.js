class content {
    constructor(breaking = false, title, text) {
        this.breaking = breaking;
        this.title = title;
        this.text = text;
        //On appelle la fonction si au moment de la création de l'objet, le breaking est 'true'
        if (this.breaking === true) {
            this.title = this.addBreaking();
        }
    }

    addBreaking() {
        let breakingtext = "BREAKING: ";
        return breakingtext + this.title;
    }
}


class ad {
    constructor(title, text) {
        this.title = title.toUpperCase();
        this.text = text.toUpperCase();
    }
}

class vacancy {
    constructor(title, text) {
        this.title = title;
        this.text = text;
        const applyText = "- apply now!"
        this.text = text + applyText;

    }
}

let article1 = new content(true, "Ceci est le premier article", "Ceci est le texte du premier article");
let article2 = new content(false, "Ceci est le second article", "Ceci est le texte du second article");
let ad1 = new ad("Ceci est une pub", "Ceci est le texte de la pub");
let vacancy1 = new vacancy("Ceci est le titre du poste vacant", "Ceci est le texte du poste vacant");


console.log(article1);
console.log(article2);
console.log(ad1);
console.log(vacancy1);

let contentOfAWebsite = [article1.breaking, article1.title, article1.text, article2.breaking, article2.title, article2.text, ad1.title, ad1.text, vacancy1.title, vacancy1.text];

console.log(contentOfAWebsite);
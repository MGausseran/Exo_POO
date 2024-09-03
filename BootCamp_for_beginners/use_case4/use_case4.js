class student {
    constructor(name, grade) {
        this.name = name;
        this.grade = grade;
    }
}

const groupe1 = [
    new student('Alice', 16),
    new student('Bob', 18),
    new student('Charlie', 14),
    new student('David', 17),
    new student('Eva', 19),
    new student('Frank', 12),
    new student('Grace', 15),
    new student('Hannah', 13),
    new student('Ian', 20),
    new student('Judy', 11),
];

const groupe2 = [
    new student('Klaus', 16),
    new student('Lily', 17),
    new student('Mona', 18),
    new student('Nick', 14),
    new student('Olivia', 19),
    new student('Paul', 15),
    new student('Quincy', 13),
    new student('Rachel', 20),
    new student('Steve', 12),
    new student('Tina', 11)
];


function calculateAverageScore(groupe) {
    //On récupère la longueur du groupe
    let totalStudents = groupe.length;
    //On additionne les valeurs de student.grade pour objet student du groupe, en initiant une valeur chiffrée de départ à 0, à laquelle l'accumulator viendra additionner les notes de chaque student au fur et à mesure
    let totalScore = groupe.reduce((accumulator, student) => {
        return accumulator + student.grade;
    }, 0);
    let averageScore = totalScore / totalStudents;
    return averageScore;
}

function transferStudent(groupe1, groupe2, studentName) {
    //On récupère l'index de l'étudiant dans groupe1 (findIndex fonctionne mieux sur les éléments complexes, comme un objet dans le cas présent)
    let index = groupe1.findIndex(student => student.name === studentName);
    
    //On vérifie si l'étudiant existe, en s'assurant que l'index a bien une valeur différente de -1. (Car -1 n'étant pas un index valide, cela signifie que l'étudiant n'existe pas dans le groupe)
    if (index !== -1) {
        //On le retire du groupe 1, en donnant comme arguments à la méthode splice l'index dans le tableau à partir duquel faire la modification et le nombre d'éléments à supprimer à partir de l'index (ici, 1). Cela va créer un nouveau tableau, dans lequel l'élément se verra attribuer l'index 0.
        let studentToTransfer = groupe1.splice(index, 1)[0];
        //Et on le rajoute au groupe 2
        groupe2.push(studentToTransfer);
    }
}

let scoreGroupe1 = calculateAverageScore(groupe1);
let scoreGroupe2 = calculateAverageScore(groupe2);

//On transfère Alice du groupe 1 au groupe 2, en prévoyant un affichage console du groupe 1 avant et après transfert. 
console.log("Groupe 1 avant transfert : ")
groupe1.forEach(student => console.log(student.name));
transferStudent(groupe1, groupe2, 'Alice');
console.log("Groupe 1 après transfert : ")
groupe1.forEach(student => console.log(student.name));
console.log(scoreGroupe1);
console.log(scoreGroupe2);

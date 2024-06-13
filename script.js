const cards = [
    'ressources/fiat1.png',
    'ressources/renault.png',
    'ressources/seat.png',
    'ressources/seat2.png',
    'ressources/skoda.png',
    'ressources/téléchargement.png',
    'ressources/toyota.png',
    'ressources/voiture3.png'
];

const gameBoard = document.getElementById('game-board');

/*fonction qui crée la card*/
    function createCard (Link){
        const card = document.createElement('div');
        card.classList.add('card');
        card.dataset.value = Link;
    
        const cardContent = document.createElement('img');
        cardContent.classList.add('card-content');
        cardContent.src = Link;

        card.appendChild(cardContent);
        card.addEventListener('click',onCardClick);
        return card;
    }

    
/*fonction pour doubler les cards*/
function duplicateArray (arraySimple){
    let arrayDouble =[];
    /* les ... ajoutent une a une les valeurs du tableau plutot que de mettre le tableau en entier à l'index*/
    arrayDouble.push(...arraySimple);
    arrayDouble.push(...arraySimple);
    return arrayDouble;
    }
    let allCards = duplicateArray (cards);
    
    //mélanger le tableau
function shuffleArray(arrayToShuffle){
    const arrayShuffled = arrayToShuffle.sort(() => 0.5 - Math.random());
    return arrayShuffled;
    }

    allCards = shuffleArray(allCards);

    /*fonction qui crée une carte pour chaque ligne du tableau*/
    allCards.forEach(card=>{
        const cardHtml = createCard(card);
        gameBoard.appendChild(cardHtml);
    })

let selectedCards = [];

/*fontion qui change la classe au click et compare*/
function onCardClick(e){

    //avant de retourner la carte, on vérifie si la carte est la même que celle du premier click s'il y en a une
    const clickedCard = e.target.parentElement;
    clickedCard.classList.add('disable-clicks');

        //changement de classe retourné
    clickedCard.classList.add("flip");

    //ajout au tableau de comparaison et comparaison
    selectedCards.push(clickedCard);
    if (selectedCards.length == 2){
        //ajout d'une classe pour ne pas clicker sur une autre carte pendant la comparaison et le rimeout
        gameBoard.classList.add('disable-clicks');
        
        setTimeout(()=>{
            if (selectedCards[0].dataset.value == selectedCards[1].dataset.value){
                alert("Vous avez trouvé une paire!");
                selectedCards[0].classList.add("paired");
                selectedCards[1].classList.add("paired");
                selectedCards[0].removeEventListener('click',onCardClick);
                selectedCards[1].removeEventListener('click',onCardClick);
                const allCardsNotPaired=document.querySelectorAll('.card:not(.paired)');
                if(allCardsNotPaired.length==0){
                    alert('Bravo vous Avez tout trouvé');
                }
            }
            else{
                alert("Les deux images ne sont pas les bonnes!");
                selectedCards[0].classList.remove("flip");
                selectedCards[1].classList.remove("flip");
                selectedCards[0].classList.remove('disable-clicks');
                selectedCards[1].classList.remove('disable-clicks');
            }
            selectedCards = [];
            //retrait de la classe disableclicks après le timeout
            gameBoard.classList.remove('disable-clicks');
        }, 2000);
    } 
}


//empecher de recliquer sur la même card pour valider une paire.
//faire un compteur de cartes pour valider la fin de partie
// faire un cookie de session pour enregistrer le nombre de parties gagnées.
//ajouter un chronometre en début de partie pour donner un score en fin de partie
//ajout bouton pour recommencer une partie sans rafraîchir la page

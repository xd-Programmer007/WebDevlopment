console.log("welcome to Tic Tac Toe")

let music = new Audio("music.mp3")
let audioTurn = new Audio("ting.mp3")
let gameOver = new Audio("gameover.mp3")

let turn = "X"

//Function to change the turn
const changeTurn = () =>{
    turn = (turn === 'X')?'O':'X';
}

//Function to check for a win
const checkWin = () => {
    let didWin = false;
    let text = '';
    let temp = document.querySelectorAll('.boxtext');
    for(let i = 0; i < temp.length; i++){
        var c = temp[i].innerText;
        c = (c === ''?'.':c)
        if(c !== undefined)
            text += c;
    }
    if(text[0] == text[4] && text[4] == text[8] && text[8] == turn ){
        //turn won the game
        didWin = true;
    }
    if(text[2] == text[4] && text[4] == text[6] && text[6] == turn ){
        // turn won the game
        didWin = true;
    } 
    for(let i = 0 , j =0 ; i < 3; i++,j =3*i){
        if((text[i] == text[i+3] && text[i+3] == text[i+6] && text[i] == turn )|| (text[j] == text[j+1] && text[j+1] == text[j+2] && text[j] == turn))
        {
            //turn won break;
            didWin =true;
            break;
        }

    }
    if(didWin){
        display_gif();
        resetFunc();
        gameOver.play();

    }
    
}

// Game Logic

let boxes = document.getElementsByClassName('box');

const display_gif = () =>{
    document.querySelector('.imgbox img').style.display = 'inline-block';
}
Array.from(boxes).forEach(element =>{
    let boxtext = element.querySelector('.boxtext');
    element.addEventListener('click',() =>{
        if(boxtext.innerText === ''){
            boxtext.innerText = turn;
            checkWin();
            changeTurn();
            audioTurn.play();
            document.getElementsByClassName("info")[0].innerText = "Turn for " + turn;
        }
    })
})
const resetFunc = () =>{
    let boxes = document.querySelectorAll('.boxtext');
    for(let i = 0; i < boxes.length ; i++)
        boxes[i].innerText = '';
}
document.getElementById('reset').addEventListener('click',() => {
    
    resetFunc();
    
})
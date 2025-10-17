//Variables
let player = "X";
let board = ["", "", "", "", "", "", "", "", ""];
let turn = document.getElementById("turn");
let result = document.getElementById("result");

function play(square) {
	if (board[square] == "") {
		board[square] = player;
		document.getElementById(square).innerHTML = player;
		checkForWinner();
		player = (player == "X") ? "O" : "X";
		turn.innerHTML = "Turno de " + player;
	}
}

function checkForWinner() {
	if (board[0] == player && board[1] == player && board[2] == player ||
	    board[3] == player && board[4] == player && board[5] == player ||
	    board[6] == player && board[7] == player && board[8] == player ||
	    board[0] == player && board[3] == player && board[6] == player ||
	    board[1] == player && board[4] == player && board[7] == player ||
	    board[2] == player && board[5] == player && board[8] == player ||
	    board[0] == player && board[4] == player && board[8] == player ||
	    board[2] == player && board[4] == player && board[6] == player) {
		result.innerHTML = "¡" + player + " gana!";
		for (let i = 0; i < 9; i++) {
			document.getElementById(i).removeEventListener("click", clickHandler);
		}
	} else if (!board.includes("")) {
		result.innerHTML = "¡Empate!";
	}
}

function clickHandler() {
	play(this.id);
}

for (let i = 0; i < 9; i++) {
	document.getElementById(i).addEventListener("click", clickHandler);
}

turn.innerHTML = "Turno de " + player;

function reset() {
	player = "X";
	board = ["", "", "", "", "", "", "", "", ""];
	turn.innerHTML = "Turno de " + player;
	result.innerHTML = "";
	for (let i = 0; i < 9; i++) {
		document.getElementById(i).innerHTML = "";
		document.getElementById(i).addEventListener("click", clickHandler);
	}
}
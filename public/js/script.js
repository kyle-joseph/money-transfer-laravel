const tab = document.querySelectorAll(".sendtab");
const prev = document.querySelector(".prevBtn");
const next = document.querySelector(".nextBtn");
const submitBtn = document.querySelector(".step-btn input[type=submit]");
const progli = document.querySelectorAll(".progress .details ul li");

let amount = 0;
let senderDetails = [];
let receiverDetails = [];

let current = 0;
next.addEventListener("click", function () {
	nextPrev(1);
});

prev.addEventListener("click", function () {
	nextPrev(-1);
});

showtab(current);

function showtab(ind) {
	if (current == 0) {
		prev.style.display = "none";
	}
	else {
		prev.style.display = "inline";
	}

	if (current == 3) {
		next.style.display = "none";
		submitBtn.style.display = "inline";
		paymentSummary();
	}
	else {
		submitBtn.style.display = "none";
		next.style.display = "inline";
	}

	tab[ind].style.display = "block";
}

function nextPrev(ind) {
	if (sendValidation() && ind == 1) {
		tab[current].style.display = "none"
		current = current + ind;
		progli[current].classList.add('current');
		progli[current - 1].classList.remove('current')
		progli[current - 1].classList.add('completed')
		showtab(current);
		window.scrollTo(0, 0);
	}

	if (ind == -1) {
		let all = true;
		let inp = tab[current].querySelectorAll(".form input");
		let lbl = tab[current].querySelectorAll(".form .label-name");

		for (let i = 0; i < inp.length; i++) {
			if (inp[i].value != "") {
				all = false;
			}
		}

		if (all) {
			for (let i = 0; i < inp.length; i++) {
				lbl[i].style.borderColor = "#6972F0";
			}
		}
		tab[current].style.display = "none"
		current = current + ind;
		progli[current].classList.add('current');
		progli[current+1].classList.remove('current');
		progli[current].classList.remove('completed');
		showtab(current);
		window.scrollTo(0, 0);
	}
	

}

function sendValidation() {
	let sakto = true;
	let inp = tab[current].querySelectorAll(".form input");
	let lbl = tab[current].querySelectorAll(".form .label-name");

	for (let i = 0; i < inp.length; i++) {
		if (inp[i].value == "") {
			lbl[i].style.borderColor = "#D31919";
			sakto = false;
		}

		if (current == 0) {
			if (isNaN(inp[0].value)) {
				lbl[i].style.borderColor = "#D31919";
				sakto = false;
			}
			else{
				if(parseInt(inp[0].value) < 1 || parseInt(inp[0].value) > 50000){
					lbl[i].style.borderColor = "#D31919";
					sakto = false;
				}
			}
		}
		else if (current == 1 || current == 2) {
			if (i == 3) {
				if (isNaN(inp[i].value) || inp[i].value.length != 11) {
					lbl[i].style.borderColor = "#D31919";
					sakto = false;
				}
			}
			else{
				let num = /[0-9]/g;
				if(inp[i].value.match(num)){
					lbl[i].style.borderColor = "#D31919";
					sakto = false;
				}
			}
		}
		if(current == 2){
			if(i == 3){
				if(inp[i].value == senderDetails[3]){
					lbl[i].style.borderColor = "#D31919";
					sakto = false;
				}
			}
		}

		inp[i].addEventListener("click", function () {
			lbl[i].style.borderColor = "#6972F0";
		});

		inp[i].addEventListener("keypress", function () {
			lbl[i].style.borderColor = "#6972F0";
		});
	}
	if (sakto) {
		switch (current) {
			case 0:
				amount = inp[0].value;
				console.log(amount);
				break;
			case 1:
				senderDetails = addSendRev();
				break;
			case 2:
				receiverDetails = addSendRev();
				break;
			case 3:
				paymentSummary();
				break;
		}

	}
	return sakto;
}
function addSendRev() {
	let inp = tab[current].querySelectorAll(".form input");
	let details = [];
	for (let i = 0; i < inp.length; i++) {
		details.push(inp[i].value);
	}
	return details;
}
function paymentSummary() {
	let sendli = document.querySelectorAll(".sendSummary li");
	let recli = document.querySelectorAll(".recSummary li");
	let amoli = document.querySelectorAll(".amountSummary li");

	sendli[0].innerHTML = senderDetails[0] + " " + senderDetails[1] + " " + senderDetails[2];
	sendli[1].innerHTML = senderDetails[3]
	sendli[2].innerHTML = senderDetails[4] + " " + senderDetails[5] + " " + senderDetails[6];

	recli[0].innerHTML = receiverDetails[0] + " " + receiverDetails[1] + " " + receiverDetails[2];
	recli[1].innerHTML = receiverDetails[3]
	recli[2].innerHTML = receiverDetails[4] + " " + receiverDetails[5] + " " + receiverDetails[6];

	amoli[0].innerHTML = "Php " + amount;
}

function searchValidate(){
	const searchLbl = document.querySelector('.search-form .form label');
	let ctrlNum = document.forms["searchForm"]["ctrlNum"];
	let ctrl = ctrlNum.value;
	let matched = /MTS/g;
	if(ctrl == "" || ctrl.length != 15 || !ctrl.match(matched)){
		searchLbl.style.borderColor = "#D31919";
		ctrlNum.addEventListener("click", function () {
			searchLbl.style.borderColor = "#6972F0";
		});
		ctrlNum.addEventListener("keypress", function () {
			searchLbl.style.borderColor = "#6972F0";
		});
		return false;
	}
}

function editValidation(){
	let isTrue = true;
	let input = document.querySelectorAll('#edit-form .form input[type=text]');
	let label = document.querySelectorAll('#edit-form .form label');
	for(let i = 0; i < input.length; i++){
		if(input[i].value == ""){
			label[i].style.borderColor = "#D31919";
			isTrue = false;
		}
		if(i == 2 || i == 8){
			if (isNaN(input[i].value) || input[i].value.length != 11) {
				label[i].style.borderColor = "#D31919";
				isTrue = false;
			}
		}
		else{
			let num = /[0-9]/g;
			if(input[i].value.match(num)){
				label[i].style.borderColor = "#D31919";
				isTrue = false;
			}
		}
		input[i].addEventListener("click", function () {
			label[i].style.borderColor = "#6972F0";
		});
		input[i].addEventListener("keypress", function () {
			label[i].style.borderColor = "#6972F0";
		});
	}
	console.log(isTrue);
	return isTrue;
}
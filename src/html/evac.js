let btnOpen = document.querySelector(".btnOpen");
let box = document.querySelector(".box");
let body = document.querySelector("#modalbody");
let close = document.querySelector(".close");
let hidethis = document.querySelector(".hidethese");


btnOpen.addEventListener("click", ()=>{
	hidethis.style.display="none";
	box.style.display="block";
	// body.style.backgroundColor="#222";
	hidethis.style.display="none";
})

close.addEventListener("click", ()=>{
	hidethis.style.display="block";
	box.style.display="none";
	// body.style.backgroundColor="#222";
	
})
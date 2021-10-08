// Selectors
const bodyElement = document.querySelector('body');
const divPrivacyPolicyElement = document.createElement('div');


// Create Elements
let smallElement = document.createElement('small');
let linkElement = document.createElement('a'); 
let buttonAcceptElement = document.createElement('button');

// Sets Atributes
// Set Class Elements
divPrivacyPolicyElement.setAttribute('class','privacy-policy');
smallElement.setAttribute('class','privacy-small');
linkElement.setAttribute('class','privacy-link');
buttonAcceptElement.setAttribute('class','privacy-button');

// Set Links and target
linkElement.setAttribute('href','https://marketing.way.digital/politica_de_privacidade/');
linkElement.setAttribute('target','_blank');
// Set type for button
buttonAcceptElement.setAttribute('type','submit');

// TextElements

let textElement = document.createTextNode('Ao usar nosso site, você reconhece que leu e entendeu a nossa, ');
let linkText = document.createTextNode('politica de privacidade.');
let buttonText = document.createTextNode('Aceito');

// Appends
linkElement.appendChild(linkText);
buttonAcceptElement.appendChild(buttonText);
smallElement.appendChild(textElement);
smallElement.appendChild(linkElement);
divPrivacyPolicyElement.appendChild(smallElement);
divPrivacyPolicyElement.appendChild(buttonAcceptElement);
bodyElement.appendChild(divPrivacyPolicyElement);


// Events
buttonAcceptElement.addEventListener('click', (e) => {
  divPrivacyPolicyElement.classList.toggle('closed');
  smallElement.classList.add('none');
  buttonAcceptElement.classList.add('none');
  localStorage.setItem('userlocal','true');
  
})

var privacyElement = localStorage.getItem('userlocal');

if(privacyElement == 'true') {
  divPrivacyPolicyElement.setAttribute('style','display:none!important;');
}

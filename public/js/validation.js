const form = document.querySelector('form[novalidate]');

form.addEventListener('submit', event => {
  let fields = document.querySelectorAll('.form-field');
  let inputs = document.querySelectorAll('.form-field input');
  let feedbacks = document.querySelectorAll('.form-field .feedback');

  for(let i = 0; i < fields.length; i++) {
    if(!inputs[i].validity.valid) {
      showError(fields[i], inputs[i], feedbacks[i]);
      event.preventDefault();
    } else {
      if(inputs[i].name === 'tos'){
        feedbacks[i].innerHTML = 'I agree to <a href="#" class="link">terms of service</a>'
      } else {
        feedbacks[i].innerText = '';
      }
      fields[i].className = 'form-field';
    }
  }
});

function showError(field, input, feed) {
	if(input.validity.valueMissing) {
    if(input.name === 'email') {
      feed.innerText = 'Email address is required'
    } 
    else if(input.name === 'tos') { 
      feed.innerHTML = 'You must accept the <a href="#" class="link">terms of service</a>'
    }
	} 
	else if(input.validity.patternMismatch) {
    let re = /\S+@\S+\.co$/;
    if(input.name === 'email') {
      if(re.test(input.value)) {
        feed.innerText = 'We are not accepting subscriptions from Columbia emails';
      } else {
        feed.innerText = 'Please provide a valid e-mail address';
      }
    }
	} 
	field.className = 'form-field is-invalid';
}
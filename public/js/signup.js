


document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const usernameValue = document.getElementById('username').value;
    const emailValue = document.getElementById('email').value;
    const passwordValue = document.getElementById('password').value;

    const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    const passwordRegex = /^([A-Za-z0-9_]){6,}$/;

    const isValidUsername = usernameRegex.test(usernameValue);
    const isValidEmail = emailRegex.test(emailValue);
    const isValidPassword = passwordRegex.test(passwordValue);

    if (!isValidUsername ) {
      showMessage('Please check your username.');
      return;
    }
    if ( !isValidEmail) {
      showMessage('this email is invalid.');
      return;
    }
    if (!isValidPassword) {
      showMessage('the password most be more than 6 letters.');
      return;
    }
    
    
    document.getElementById('myForm').submit();
  });

  function showMessage(message) {
    const flashMessage = document.getElementById('flash-message');
    flashMessage.textContent = message;
    flashMessage.classList.remove('hidden');

    setTimeout(function() {
      flashMessage.classList.add('hidden');
    }, 3000);
  }
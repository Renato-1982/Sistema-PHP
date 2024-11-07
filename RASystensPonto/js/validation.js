// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()

  function mostrarSenha(){
    var inputPass = document.getElementById('senha')
    var btnShowPass = document.getElementById('btn-senha')

    if(inputPass.type === 'password'){
      inputPass.setAttribute('type','text')
      btnShowPass.classList.replace('bi-eye-fill','bi-eye-slash-fill')
    }else{
      inputPass.setAttribute('type','password')
      btnShowPass.classList.replace('bi-eye-slash-fill','bi-eye-fill')
    }
  }

  function mostrarSenhaConfirma(){
    var inputPassConfirma = document.getElementById('senhaconfirma')
    var btnShowPassConfirma = document.getElementById('btn-senhaConfirma')

    if(inputPassConfirma.type === 'password'){
      inputPassConfirma.setAttribute('type','text')
      btnShowPassConfirma.classList.replace('bi-eye-fill','bi-eye-slash-fill')
    }else{
      inputPassConfirma.setAttribute('type','password')
      btnShowPassConfirma.classList.replace('bi-eye-slash-fill','bi-eye-fill')
    }
  }
import JustValidate from "just-validate";

export let validator = (form) => {
  
  const elements = document.querySelectorAll('.required');
  const errorsContainer = document.querySelector('.errors-container')
  const errors = document.querySelectorAll('.just-validate-error-label');

  let validate = new JustValidate('#' + form.id,
    {
      errorFieldCssClass: 'is-invalid',
      errorLabelStyle: {
        color: 'red',
        textDecoration: 'underlined',
      },
      focusInvalidField: true,
      lockForm: true,
      errorsContainer: '.errors-container',
    }
  )

  if (!errorsContainer.hasChildNodes()) {
    errorsContainer.classList.remove('active');
  }

  elements.forEach(element => {

    if(element.classList.contains('is-invalid')) {
      validate.destroy();
    }

    validate
    // En caso de que cada elemento que tenga la clase 'required' esté vacío, avisar con error
    .addField('#' + element.id, [
      {
        rule: 'required',
        errorMessage: 'el campo ' +  element.dataset.type + ' no puede estar vacio', 
      }
    ])

  });
  
  return validate;
};
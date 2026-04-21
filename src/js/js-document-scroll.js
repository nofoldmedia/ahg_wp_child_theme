document.addEventListener('DOMContentLoaded', () => {

  const 
  
    varHeader = document.querySelector('.t-p-header__group');

  window.addEventListener('scroll', () => {

    const 
    
      scrollTop = window.scrollY;

    if (scrollTop >= 100) {

      // btn.style.cssText = 'position:fixed; top:0; margin-top:0';

      varHeader.classList.add('darken')
      

    } else {

      varHeader.classList.remove('darken')

    }

  });

});
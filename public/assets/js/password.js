window.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelectorAll('.btn.password');
  btn.forEach( i => {
    
    i.addEventListener('click', (ev) => {
      ev.preventDefault();
      const icon = ev.currentTarget.querySelector('i');
      const container = ev.currentTarget.closest('.input-group');
      const input = container.querySelector('input');
      const attri = input.getAttribute('type');
      
      icon.classList.toggle('fa-eye');
      icon.classList.toggle('fa-eye-slash');
      input.setAttribute('type', attri == 'password'? 'text': 'password');
    })
  })
})
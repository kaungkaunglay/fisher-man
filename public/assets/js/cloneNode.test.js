window.addEventListener('DOMContentLoaded', ()=> {

  const template = document.querySelectorAll('template[data-clone]');

  template.forEach(temp => {

    const toAttach = temp.getAttribute('data-target');
    const target = document.querySelector(`[data-list=${toAttach}]`);
    const attachTimes = temp.getAttribute('data-clone');

    console.log(target)
    
    for(let t = 0; t < attachTimes; t ++) {

      target.innerHTML += temp.innerHTML;
      console.log(`Clone-${t} from (${temp.nodeName}) attached to ${target.nodeName}(${toAttach})`);
    }
  })
})
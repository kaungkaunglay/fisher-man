  document.addEventListener('DOMContentLoaded', () => {
    const cardListBtns = document.querySelectorAll('#card-list-btn');
    const rowListBtns = document.querySelectorAll('#row-list-btn');
    const viewLists = document.querySelectorAll('#view-list');
    
    viewLists.forEach(viewList => {
      viewList.className = 'card-list';
    });
    
    cardListBtns.forEach(button => {
      button.addEventListener('click', () => {
        const index = Array.from(cardListBtns).indexOf(button);
        if (viewLists[index]) {
          viewLists[index].className = 'card-list';
        }
      });
    });
    
    rowListBtns.forEach(button => {
      button.addEventListener('click', () => {
        const index = Array.from(rowListBtns).indexOf(button);
        if (viewLists[index]) {
          viewLists[index].className = 'row-list';
        }
      });
    });
  });

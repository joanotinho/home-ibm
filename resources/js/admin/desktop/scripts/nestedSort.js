import NestedSort from "nested-sort"

export let nestedSort = () => {

  const nestedSorts = document.querySelectorAll('.nested-sort').forEach(function (list) {
    
    const nestedSortContainer = list.closest('.nested-sort-container')
    const sortingButton = nestedSortContainer.querySelector('.sorting-button');
    const items = nestedSortContainer.querySelectorAll('.nested-sort-item');
    const data = [];
    let editableValue = false;

    if (sortingButton) {
      
      let nested = () => {
      
        new NestedSort ({
    
          data: data,
      
          actions: {
            onDrop(data) {
              
              console.log(data)
            }
          },
      
          el: list,
          listClassNames: ['nested-sort'],
          listItemClassNames: ['nested-sort-item'],
          droppingEdge: 5,
          nestingLevels: 0,
          init: editableValue
        })
      }
      
      items.forEach(item => {

        let dato = {
          id: item.dataset.id,
          text: item.innerHTML,
        }

        data.push(dato);
      });
      
      sortingButton.addEventListener('click', (e) => {

        e.preventDefault();

        editableValue = !editableValue;

        nested();

        sortingButton.classList.toggle('active');
      });
    }
  });
}
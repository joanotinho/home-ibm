import NestedSort from "nested-sort"

export let nestedSort = () => {

  // const nestedSorts = document.querySelectorAll('.nested-sort').forEach(function (list) {

  //   const nestedSortContainer = list.closest('.nested-sort-container')
  //   const sortingButtons = nestedSortContainer.querySelectorAll('.sorting-button');
  //   const items = nestedSortContainer.querySelectorAll('.nested-sort-item');
  //   let editableValue = false;
    
  //   const data = [];
  
  //   items.forEach(item => {

  //     let dato = {
  //       id: item.dataset.id,
  //       text: item.innerHTML,
  //     }

  //     data.push(dato);
  //   });

  //   sortingButtons.forEach(sortingButton => {
  //     sortingButton.addEventListener('click', () => {
  //       editableValue = !editableValue;
  //       toggleEdit();
  //     });
  //   });

  //   const toggleEdit = () => {
  //     new NestedSort ({
  //       data: data,
    
  //       actions: {
  //         onDrop(data) {
            
  //           console.log(data)
  //         }
  //       },
    
  //       el: list,
  //       listClassNames: ['nested-sort'],
  //       listItemClassNames: ['nested-sort-item'],
  //       droppingEdge: 5,
  //       nestingLevels: 0,
  //       init: editableValue
  //     })    
  //   }
  // });
}
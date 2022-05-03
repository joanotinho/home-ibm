export let nestedSort = () => {
  new NestedSort({
    data: [
      { id: 1, text: "Item 1" },
      { id: 11, text: "Item 1-1", parent: 1 },
      { id: 2, text: "Item 2" },
      { id: 3, text: "Item 3" },
      { id: 111, text: "Item 1-1-1", parent: 11 },
      { id: 112, text: "Item 1-1-2", parent: 11 },
      { id: 31, text: "Item 3-1", parent: 3 }
    ],
    actions: {
      onDrop(data) { // receives the new list structure JSON after dropping an item
        console.log(data)
      }
    },
    el: '#nested-sort', // a wrapper for the dynamically generated list element
    listClassNames: ['nested-sort'], // an array of custom class names for the dynamically generated list element
    renderListItem: (el, { id }) => {
      if (id === 2) el.textContent += ' (this is a custom rendered item)'
      return el
    }
  })
}
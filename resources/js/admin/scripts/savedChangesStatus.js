export let savedChangesStatus = () => {
    const savedChangesContainer = document.querySelector('.saved-changes-container');
    const savedChangesTitle = document.querySelector('#saved-changes-title');
    const savedChangesDescription = document.querySelector('#saved-changes-description');

    
    savedChangesContainer.classList.add('visible');

    if(savedChangesContainer.classList.contains('success')) {

        savedChangesTitle.innerHTML = 'Saved changes';
        savedChangesDescription.innerHTML = 'Your changes have been saved successfully';

    } else if(savedChangesContainer.classList.contains('error')) {

        savedChangesTitle.innerHTML = 'Error';
        savedChangesDescription.innerHTML = 'Your changes have not been saved successfully';

    }
} 
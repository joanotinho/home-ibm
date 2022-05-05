    export let loadImage = () => {
    
    const imageInputs = document.querySelectorAll('.image-input');

    imageInputs.forEach(imageInput => {

        const randomId = Math.floor(Math.random() * (1000000 - 1)) + 1;

        const singleImageContainer = imageInput.closest('.single-image-container');
        const multipleImagesContainer = imageInput.closest('.multiple-images-container');

        if (singleImageContainer) {
            const imageContainer = singleImageContainer.querySelector('.image-container');
            const image = singleImageContainer.querySelector('.image');
            const label = singleImageContainer.querySelector('.image-label');
            const deleteButton = singleImageContainer.querySelector('.delete-image');
            let inputValues = [];
            imageInput.addEventListener('change', (event) => {


                if (event.target.files[0]) {

                    deleteButton.classList.add('active');
        
                    
                    if (!inputValues.includes(imageInput.value)) {
                        
                        image.src = URL.createObjectURL(event.target.files[0]);
                        imageContainer.classList.remove('first-image-container');

                        
                        deleteButton.addEventListener('click', () => {
                            
                            inputValues = inputValues.filter(value => value !== imageInput.value);
                            console.log(inputValues);
                            imageContainer.classList.add('first-image-container');
                            image.src = '';
                            deleteButton.classList.remove('active');
                        });
                    }
                    
                    imageInput.name = "images-" + randomId;
                    label.htmlFor = randomId;
                    console.log(randomId);
                }
            });
        }

        if (multipleImagesContainer) {
            
            const imageContainer = multipleImagesContainer.querySelector('.image-container');
            let inputValues = [];
    
            imageInput.addEventListener('change', (event) => {  
                
                if (event.target.files[0]) {
    
                    if (multipleImagesContainer) {
                        const clone = imageContainer.cloneNode(true);
                        const clonedInput = clone.querySelector('.image-input');
                        const clonedImage = clone.querySelector('.image');
                        const clonedLabel = clone.querySelector('.image-label');
            
                        console.log(inputValues);
            
                        if (!inputValues.includes(clonedInput.value)) {
            
                            const clonedDelete = clone.querySelector('.delete-image');
                            clone.classList.remove('first-image-container');
                            clonedImage.classList.add('cloned-image');
            
                            multipleImagesContainer.appendChild(clone);
                            inputValues.push(clonedInput.value);
            
                            clonedImage.src = URL.createObjectURL(event.target.files[0]);
                
                            clonedDelete.classList.add('active');
                
                            clonedDelete.addEventListener('click', () => {
                                inputValues = inputValues.filter(value => value !== clonedInput.value);
                                clone.remove();
                                console.log(inputValues);
                            });
                            
                            clonedInput.name = "images-" + randomId;
                            clonedLabel.htmlFor = randomId;
                            console.log(randomId);
                        }
                    }
                    
                }
            });
        }
    });
}
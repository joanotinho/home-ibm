    export let loadImage = () => {
    
    const imageInputs = document.querySelectorAll('.image-input');

    imageInputs.forEach(imageInput => {

        const imagesContainer = imageInput.closest('.images-container');
        const imageContainer = imagesContainer.querySelector('.image-container');

        imageInput.addEventListener('change', (event) => {

            const clone = imageContainer.cloneNode(true);
            const clonedInput = clone.querySelector('.image-input');
            const clonedImage = clone.querySelector('.image');
            const clonedLabel = clone.querySelector('.image-label');

            clone.classList.remove('first-image-container');
            clonedImage.classList.add('cloned-image');

            imagesContainer.appendChild(clone);

            clonedImage.src = URL.createObjectURL(event.target.files[0]);
            
            const randomId = Math.floor(Math.random() * (1000000 - 1)) + 1;
            clonedInput.name = "images-" + randomId;
            clonedLabel.htmlFor = randomId;
            console.log(randomId);
        });
    });
}
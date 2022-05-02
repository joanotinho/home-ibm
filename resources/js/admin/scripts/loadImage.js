    export let loadImage = () => {
        
    // const imageInputs = document.querySelectorAll('.image-input');

    // imageInputs.forEach(imageInput => {

    //     const multipleImages = imageInput.closest('.multiple-images');
    //     const imagesContainer = multipleImages.querySelector('.images');
    //     const firstImage = multipleImages.querySelector('.first-image');
    //     // const firstImage = multipleImagesForm.querySelector('.last-image');

    //     imageInput.addEventListener('change', (event) => {

    //         firstImage.cloneNode(false);
    //         const clone = firstImage.cloneNode(true);
    //         clone.classList.remove('first-image');
    //         imagesContainer.appendChild(clone);
    //         clone.src = URL.createObjectURL(event.target.files[0]);

    //         console.log(clone);
    //     });

    //     if (firstImage){
    //         console.log(firstImage)
    //     } else {
    //         alert("no existe")
    //     }
    // });
    
    const imageInputs = document.querySelectorAll('.image-input');

    imageInputs.forEach(imageInput => {

        const imagesContainer = imageInput.closest('.images-container');
        const firstImageContainer = imagesContainer.querySelector('.first-image-container');

        imageInput.addEventListener('change', (event) => {

            if (event.target.files[0]) {

                const clonedInput = firstImageContainer.querySelector('.image-input');
                const clonedLabel = firstImageContainer.querySelector('.image-label');
                const clone = firstImageContainer.cloneNode(true);
                const clonedImage = clone.querySelector('.image');
    
                clone.classList.remove('first-image-container');
                clonedImage.classList.add('cloned-image')
                imagesContainer.appendChild(clone);

                clonedImage.src = URL.createObjectURL(event.target.files[0]);

                const randomId = Math.floor(Math.random() * (1000000 - 1)) + 1;
                clonedInput.name = "images-"+randomId;
                clonedLabel.htmlFor = randomId;
                console.log(randomId);
            } else {
                console.log("no hay archivo");
            }
            
        });
    });
}
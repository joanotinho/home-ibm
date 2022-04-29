    export let loadImage = () => {
    // const imageLabel = document.querySelector('.image-label');
    // const imageInput = document.querySelector('.image-input');
    // const imageOutput = document.querySelector('.image-output');

    // imageInput.addEventListener('change', (event) => {
        
        // imageOutput.src = URL.createObjectURL(event.target.files[0]);
    //     imageOutput.parentNode.classList.add('active');
    // })


    const imageInputs = document.querySelectorAll('.image-input');

    imageInputs.forEach(imageInput => {

        const multipleImagesForm = imageInput.closest('.multiple-images-form');
        const imagesContainer = multipleImagesForm.querySelector('.images');
        const lastImage = multipleImagesForm.querySelector('.first-image');
        // const firstImage = multipleImagesForm.querySelector('.last-image');

        imageInput.addEventListener('change', (event) => {
            setTimeout(() => {
                
            }, 2000);
            lastImage.cloneNode(true);
            const clone = lastImage.cloneNode(true);
            clone.classList.remove('first-image');
            imagesContainer.appendChild(clone);
            clone.src = URL.createObjectURL(event.target.files[0]);
        });

        if (lastImage){
            console.log(lastImage)
        } else {
            alert("no existe")
        }
    });
}
export let dragDrop = () => {

    // get our elements
    const slides = document.querySelectorAll('.draggable-field');

    slides.forEach((slide, index) => {
        
        const slider = slide.closest('.draggable-container');
        const background = slider.querySelector('.draggable-background');

        // set up our state
        let isDragging = false,
        startPos = 0,
        currentTranslate = 0,
        animationID = 0

        // add our event listeners
        const sildeItem = slide.querySelector('.draggable-item');

        // disable default image drag
        sildeItem.addEventListener('dragstart', (e) => e.preventDefault())

        // touch events
        slide.addEventListener('touchstart', (event) => {
            
            startPos = getPositionX(event)
            isDragging = true
            animationID = requestAnimationFrame(animation)
            slide.classList.add('grabbing')
        });

        slide.addEventListener('touchend', () => {

            cancelAnimationFrame(animationID)
            isDragging = false

            if (currentTranslate < -100) {

                console.log("has eliminado el elemento")

                slide.classList.add('slide');
                currentTranslate = -1000;
                
                document.dispatchEvent(new CustomEvent('deleteUserSlide'));
                
                setTimeout(() => {
                    
                    background.classList.remove('green')
                    background.classList.remove('red')

                    slide.classList.remove('slide');
                }, 150);
            }

            if (currentTranslate > 100) {

                console.log("has entrado en modo edición")
                
                currentTranslate = 1000;
                slide.classList.add('slide');

                document.dispatchEvent(new CustomEvent('editUserSlide'));

                setTimeout(() => {
                    
                    background.classList.remove('green')
                    background.classList.remove('red')

                    slide.classList.remove('slide');
                }, 150);

            } else if (currentTranslate > -100 && currentTranslate < 100) {

                currentTranslate = 0;

            }

            slide.classList.remove('grabbing')
        });


        slide.addEventListener('touchmove', (event) => {

            if (isDragging) {

                const currentPosition = getPositionX(event)
                currentTranslate = currentPosition - startPos

                if (currentTranslate > 1) {
                    
                    background.classList.add('green')
                    background.classList.remove('red')
                    
                } else if (currentTranslate < 0) {

                    background.classList.remove('green')
                    background.classList.add('red')
                }
            }
        })

        // make responsive to viewport changes
        // window.addEventListener('resize', setPositionByIndex)

        // prevent menu popup on long press
        window.oncontextmenu = function (event) {

            event.preventDefault()
            event.stopPropagation()
            return false
        }

        function getPositionX(event) {

            return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX
        }

        function animation() {

            setSliderPosition()
            if (isDragging) requestAnimationFrame(animation)
        }


        function setSliderPosition() {

            slide.style.transform = `translateX(${currentTranslate}px)`
        }        
    });

}
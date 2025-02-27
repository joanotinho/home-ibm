export let faqs = () => {
    
    let faqContents = document.querySelectorAll('.faq-content');
    let faqGlobals = document.querySelectorAll('.faq');

    document.addEventListener("faqs",( event =>{
        faqs();
    }), {once: true});
    
    faqContents.forEach(faqContent => {

        const faq = faqContent.closest('.faq');
        const arrow = faq.querySelector('.arrow');

        arrow.addEventListener('click', () => {
            
            if (faq.classList.contains('active')) {

                faqGlobals.forEach(faqGlobal => {

                    faqGlobal.classList.remove('active');
                });

            } else {

                faqGlobals.forEach(faqGlobal => {

                    faqGlobal.classList.remove('active');
                });

                faq.classList.toggle('active');
            }
        });
    });
}
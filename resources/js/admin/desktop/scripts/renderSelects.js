export let renderSelects = () => {
    const citySelects = document.querySelectorAll('.city-select');

    citySelects.forEach(citySelect => {

        const container = citySelect.closest('.selects-container');
        const countrySelect = container.querySelector('.country-select select');

        if (countrySelect) {

            countrySelect.addEventListener('change', (e) => {
                
                const country = e.target.value;
                const cities = citySelect.querySelectorAll('option');
                
                cities.forEach(city => {


                    if(country == city.dataset.country) {
                        
                        city.classList.add('show');
                    } else {
                        
                        city.classList.remove('show');
                    }
                });
            });
        }
    });
}
import { ClientJS } from 'clientjs';

export let fingerprint = () => {

    if(localStorage.getItem('fp') == null){

        const client = new ClientJS();

        let data = new FormData();

        data.append('fingerprint', client.getFingerprint());
        data.append('browser', client.getBrowser());
        data.append('browser_version', client.getBrowserVersion());
        data.append('os', client.getOS());
        data.append('os_version', client.getOSVersion());
        data.append('resolution', client.getCurrentResolution());

        let sendPostRequest = async () => {

            let response = await fetch('/fingerprint', {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                method: 'POST',
                body: data
            })
            .then(response => {

                if (!response.ok) throw response;

                return response.json();
            })
            .then(json => {
                
                localStorage.setItem('fp', json.fingerprint);
            })
            .catch ( error =>  {

                if(error.status == '500'){
                    console.log(error);
                };
            }

            );

        };

        sendPostRequest();

    }

};
   
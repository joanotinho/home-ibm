import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export let renderCkeditor = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderCkeditor();
    }));

    window.ckeditors = [];


    document.querySelectorAll('.ckeditor').forEach(ckeditor => {

        ClassicEditor.create(ckeditor, {
            
            toolbar: {
                items: [
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            }
        })
        .then( classicEditor => {
            ckeditors[ckeditor.name] = classicEditor;
        })
        .catch( error => {
            console.error(error);
        } );
    });
}
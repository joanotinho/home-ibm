import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export let ckeditor = () => {

    let editors = document.querySelectorAll('.ckeditor');

    window.ckeditors = ckeditor;
    
    editors.forEach(editor => {

        ClassicEditor.create(editor)
        .then( editor => {
        })
        .catch( error => {
            console.error(error);
        } );
    });
}
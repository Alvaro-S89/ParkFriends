import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Inserta tu imagen',
    acceptedFiles: ".jpg,.png,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="postImage"]').value.trim()){
            const publishedImage = {};
            publishedImage.size = 1500;
            publishedImage.name = document.querySelector('[name="postImage"]').value;

            this.options.addedfile.call(this, publishedImage);
            this.options.thumbnail.call(this, publishedImage, `/uploads/${publishedImage.name}`);

            publishedImage.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on("success", function(file, response){
    document.querySelector('[name="postImage"]').value = response.imagen;
});

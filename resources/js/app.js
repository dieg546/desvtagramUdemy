import './bootstrap';
import 'flowbite';

import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const Drop = new Dropzone('#dropzone',{

    dictDefaultMessage: 'Sube tu imagen aquí',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile:'Borrar archivo',
    maxFiles:6,
    uploadMultiple: false,

    init: function(){

        if(document.querySelector('[name="imagen"]').value.trim()){

            const ImagenPublicada = {};
            ImagenPublicada.size=1234;
            ImagenPublicada.name=document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this,ImagenPublicada);
            this.options.thumbnail.call(this,ImagenPublicada,`/uploads/${ImagenPublicada.name}`);

            ImagenPublicada.previewElement.classList.add('dz-success','dz-complete');

        }

    }

})

Drop.on('removedfile', function(){

    document.querySelector('[name="imagen"]').value='';

})

Drop.on('success',function (file, response) {
    
    document.querySelector('[name="imagen"]').value = response.imagen;

})
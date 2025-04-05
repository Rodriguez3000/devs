
import Dropzone from "dropzone";


Dropzone.autoDiscover=false;


const dropzone= new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles:".png, .jpg,.jpeg, .gif",
    addRemoveLinks:true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles:1,
    uploadMultiple:false,

    init: function () {
        //se ejecuta solamente si hay un mane primero 
        if(document.querySelector('[name="imagen"]').value.trim()){
            //creamos un objero que se inicialica bacio
            const imagenPublicada= {};
            imagenPublicada.size=1234;
            imagenPublicada.name=document.querySelector('[name="imagen"]').value;
            //call se manda a llamar automatica mente 
            
            this.options.addedfile.call(this,imagenPublicada);
            

            this.options.thumbnail.call(this,imagenPublicada, `/uploads/${imagenPublicada.name}`
            );
            
            //CLASES de dropzone
            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');

        }
    }

});


dropzone.on ("success", function(file,response){
    console.log(response.imagen);
    document.querySelector('[name="imagen"]').value= response.imagen;
});

dropzone.on ("error", function(file,message){
    console.log(message);
});

dropzone.on ("removedfile", function(){
    document.querySelector('[name="imagen"]').value="";
});

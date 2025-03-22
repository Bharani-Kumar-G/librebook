import './bootstrap';

import Alpine from 'alpinejs';
import $ from 'jquery';
import Cropper from 'cropperjs';
window.$ = window.jQuery = $;

window.Alpine = Alpine;

Alpine.start();

$('#profile_image').on('click', (e)=>{
    $('#profile-image-cropper-modal').show();
})

$('#close-btn').on('click', (e)=>{
    $('#profile-image-cropper-modal').hide();
})
var reader;
var cropper;
var profileImage = document.getElementById('profile-image');
$('#profile-image-file').on('change', (e)=>{
    var file = e.target.files[0];
    var done = function (url) {
        profileImage.src = url;

    };
    if(file){
        reader = new FileReader();
        reader.onload = (e)=>{
            done(reader.result);
        }
        reader.readAsDataURL(file);
    }
    cropper = new Cropper(profileImage, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
    });
    $('#crop').on('click', (e)=>{
        console.log(cropper.getCroppedCanvas())
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                console.log(base64data)
            }
        })
    })
})


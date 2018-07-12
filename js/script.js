jQuery(document).ready(function ($) {
var checkboxes = document.getElementById('liste-utilisateurs').querySelectorAll('input[type=checkbox]');

for (var i = 0; i < checkboxes.length; i++) {
    var checkbox = checkboxes[i];
    
    checkbox.addEventListener('click', function(event) {
        
        var loading = event.target.parentNode.querySelector('label > i.fa');
        loading.classList.remove('hidden');
        
        var formData = new FormData();
        formData.append('utilisateur_id', event.target.dataset.id);
        formData.append('actif', event.target.checked);
        
        fetch('update_utilisateur.php', {method: 'POST', body: formData})
        .then(function(response){ return response.json(); })
        .then(function(data) {
            loading.classList.add('hidden');
        });
    });
    
}

$('select.select2').select2();


var checkboxes = document.getElementById('liste-entreprise').querySelectorAll('input[type=checkbox]');

for (var i = 0; i < checkboxes.length; i++) {
    var checkbox = checkboxes[i];
    
    checkbox.addEventListener('click', function(event) {
        
        var loading = event.target.parentNode.querySelector('label > i.fa');
        loading.classList.remove('hidden');
        
        var formData = new FormData();
        formData.append('utilisateur_id', event.target.dataset.id);
        formData.append('actif', event.target.checked);
        
        fetch('update_utilisateur.php', {method: 'POST', body: formData})
        .then(function(response){ return response.json(); })
        .then(function(data) {
            loading.classList.add('hidden');
        });
    });
    
}

$('select.select2').select2();
    
}); 


 $('.menuToggle').click(function(){
    $('body').toggleClass('open-menu'); 
    });



function show1(){
  document.getElementById('liste-utilisateurs').style.display ='block';
}
function show2(){
  document.getElementById('liste-utilisateurs').style.display = 'block';
}


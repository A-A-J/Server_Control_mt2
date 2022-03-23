Notiflix.Notify.Init();

//modal
if ( document.getElementById('exampleModal') !== null ) {
    var myModalEl = document.getElementById('exampleModal');
    var modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
        document.querySelectorAll('#players').forEach((item)=> item.innerHTML = '');
        modal_add(false);
        msg_alert('d-flex', 'd-none');
    });
}

function disabledTage(typeTage, typeDisabled) {
    document.querySelectorAll(typeTage).forEach((x,y)=>x.disabled = typeDisabled)
}

function loader(show, i, xx){
    if(show == 'show'){
        document.querySelector(xx).classList.add('d-none');
        document.querySelector(i).insertAdjacentHTML('beforeend', '<i id="loader" class="fas fa-spinner fa-spin"></i>');
        document.querySelector('body').classList.add('pe-none');
    }else{
        document.querySelector('body').classList.remove('pe-none');
        document.querySelector(xx).classList.remove('d-none');
        document.querySelector('#loader').parentNode.removeChild(document.querySelector('#loader'));
    }
}

//msg error
function msg_alert(remove='d-flex', add='d-none', text=null){
    $('#data>div').text(text);
    $('#data').removeClass(remove);
    $('#data').addClass(add);
}
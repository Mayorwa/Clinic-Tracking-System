var toggle = document.querySelector('.sidebar__toggle'),
    page = document.querySelector('.page'),
    sidebar = document.querySelector('.sidebar'),
    headerToggle = document.querySelector('.header__toggle'),
    logo = document.querySelector('.header__logo'),
    close = document.querySelector('.sidebar__close'),
    sidebar__user = document.querySelector('.sidebar__user'),
    sidebar__detail = document.querySelector('.sidebar__details'),
    deleteModal = document.querySelector('#deleteModal'),
    close_deleteModal = document.querySelectorAll('#close_deleteModal'),
    open_deleteModal = document.querySelector('#open_deleteModal'),
    createModal = document.querySelector('#createModal'),
    close_createModal = document.querySelectorAll('#close_createModal'),
    open_createModal = document.querySelector('#open_createModal');
    question_wrap = document.querySelector('#question_wrap');
    number_of_inputs = document.querySelector('#number_of_inputs');

toggle.addEventListener('click', function () {
    sidebar.classList.toggle('active');
    page.classList.toggle('wide');
});

headerToggle.addEventListener('click', function () {
    sidebar.classList.add('active');
    page.classList.add('toggle');
    logo.classList.add('hidden');
    document.querySelectorAll('body').classList.add('no-scroll');
    document.querySelectorAll('html').classList.add('no-scroll');
});

close.addEventListener('click', function () {
    sidebar.classList.remove('active');
    page.classList.remove('toggle');
    logo.classList.remove('hidden');
    document.querySelectorAll('body').classList.remove('no-scroll');
    document.querySelectorAll('html').classList.remove('no-scroll');
});
sidebar__user.addEventListener('click', function () {
    sidebar__user.classList.toggle('active');
    sidebar__detail.classList.toggle('show');
});

open_createModal.addEventListener('click', function () {
    createModal.classList.add('active');
});

close_createModal.forEach(item => {
    item.addEventListener('click', function () {
        createModal.classList.remove('active');
    });
});

open_deleteModal.addEventListener('click', function () {
    deleteModal.classList.add('active');
});

close_deleteModal.forEach(item => {
    item.addEventListener('click', function () {
        deleteModal.classList.remove('active');
    });
});

function add_input(){
    let no_of_inputs = parseInt(number_of_inputs.value)+1;
    let new_input="<input type='text' class='modal__input' name='questions[]' placeholder='e.g enter a question' id='question_"+no_of_inputs+"'>";
    question_wrap.innerHTML += new_input;
    number_of_inputs.value = no_of_inputs;
}
function remove_input(){
    let no_of_inputs = parseInt(number_of_inputs.value);
    if(no_of_inputs > 1){
        document.querySelector('#question_'+no_of_inputs).remove();
        no_of_inputs.value = no_of_inputs-1;
    }
}
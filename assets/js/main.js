var toggle = document.querySelector('.sidebar__toggle'),
    page = document.querySelector('.page'),
    sidebar = document.querySelector('.sidebar'),
    headerToggle = document.querySelector('.header__toggle'),
    logo = document.querySelector('.header__logo'),
    close = document.querySelector('.sidebar__close'),
    sidebar__user = document.querySelector('.sidebar__user'),
    sidebar__detail = document.querySelector('.sidebar__details'),
    createModal = document.querySelector('#createModal'),
    close_createModal = document.querySelectorAll('#close_createModal'),
    open_createModal = document.querySelector('#open_createModal');
    question_1 = document.querySelector('#question_1');
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

function open_deleteModal(id){
    document.querySelector(id).classList.add('active');
}
function close_deleteModal(id){
    document.querySelector(id).classList.remove('active');
}

function add_input(){
    let no_of_inputs = parseInt(number_of_inputs.value)+1;

    let clone = document.querySelector('#question_1').cloneNode(true);
    clone.id = "question_" + no_of_inputs;

    document.querySelector('#question_1').parentNode.appendChild(clone);

    number_of_inputs.value = no_of_inputs;

    document.querySelector("#question_" + no_of_inputs+" input").value = "";
    document.querySelector("#question_" + no_of_inputs+" select").selectedIndex  = 0;

}
function remove_input(){
    let no_of_inputs = parseInt(number_of_inputs.value);
    if(no_of_inputs > 1){
        document.querySelector('#question_'+no_of_inputs).remove();
        number_of_inputs.value = no_of_inputs-1;
    }

}
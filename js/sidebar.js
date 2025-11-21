const sidebar = document.querySelector('.sidebar');
const sidebarBtn = sidebar.querySelector('.btn_sidebar');
const main = document.querySelector('.conteudo_principal');

sidebarBtn.addEventListener('click', ()=>{
    sidebar.classList.toggle('open');
    
    main.classList.toggle('extend');
    console.log(main);
});
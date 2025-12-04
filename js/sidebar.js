const sidebar = document.querySelector('.sidebar');
const sidebarBtn = sidebar.querySelector('.btn_sidebar');
const main = document.querySelector('.conteudo_principal');

// "lembra" como o usuário deixou a sidebar
function carregarEstadoSidebar(){
    const estadoSidebar = localStorage.getItem('sidebarStatus') === 'closed';

    if (estadoSidebar) {
        sidebar.classList.add('open');

        if (main) {
            main.classList.add('extend');
        }
    } else {
        sidebar.classList.remove('open');

        if (main) {
            main.classList.remove('extend');
        }
    }
}

carregarEstadoSidebar();

sidebarBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    
    sidebar.classList.toggle('open');
    
    if (main){
        main.classList.toggle('extend');
    }

    // armazena se sidebar está aberta ou fechada
    if (sidebar.classList.contains('open')) {
        localStorage.setItem('sidebarStatus', 'closed');
    } else {
        localStorage.setItem('sidebarStatus', 'open');
    }
});
// Formatação do cnpj no card de seguradora
const tagsSpan = document.querySelectorAll(".cnpj");

function formatarCnpj(tag) {
    tag = tag.replace(/\D/g, ""); // remove tudo que não é digito
    tag = tag.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    return tag;
}

tagsSpan.forEach((el)=>{
    el.innerText = formatarCnpj(el.innerText);
});

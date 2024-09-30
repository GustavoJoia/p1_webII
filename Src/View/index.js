const select = document.getElementById('acao');
const tabela = document.getElementById('tabelaProdutos');
const id = document.getElementById('id');
const nome = document.getElementById('nome');
const desc = document.getElementById('descricao');
const preco = document.getElementById('preco');
const estoque = document.getElementById('estoque');

const labels = document.querySelectorAll('label')

function toggleTable() {

    switch (select.value) {
        case 'GET':
            labels[0].style.display = 'flex'
            labels[1].style.display = 'none'
            labels[2].style.display = 'none'
            labels[3].style.display = 'none'
            labels[4].style.display = 'none'
            id.style.display = 'flex'
            nome.style.display = 'none'
            desc.style.display = 'none'
            preco.style.display = 'none'
            estoque.style.display = 'none'
            tabela.style.display = 'flex'
            break;
    
        case 'POST':
            labels[0].style.display = 'none'
            labels[1].style.display = 'flex'
            labels[2].style.display = 'flex'
            labels[3].style.display = 'flex'
            labels[4].style.display = 'flex'
            id.style.display = 'none'
            nome.style.display = 'flex'
            desc.style.display = 'flex'
            preco.style.display = 'flex'
            estoque.style.display = 'flex'
            tabela.style.display = 'none'
            break;

        case 'PUT':
            labels[0].style.display = 'flex'
            labels[1].style.display = 'flex'
            labels[2].style.display = 'flex'
            labels[3].style.display = 'flex'
            labels[4].style.display = 'flex'
            id.style.display = 'flex'
            nome.style.display = 'flex'
            desc.style.display = 'flex'
            preco.style.display = 'flex'
            estoque.style.display = 'flex'
            tabela.style.display = 'none'
            break;

        case 'DELETE':
            labels[0].style.display = 'flex'
            labels[1].style.display = 'none'
            labels[2].style.display = 'none'
            labels[3].style.display = 'none'
            labels[4].style.display = 'none'
            id.style.display = 'flex'
            nome.style.display = 'none'
            desc.style.display = 'none'
            preco.style.display = 'none'
            estoque.style.display = 'none'
            tabela.style.display = 'none'
            break;
    }
    if (select.value === 'GET') {
        tabela.style.display = 'table'; // Mostra a tabela
    } else {
        tabela.style.display = 'none'; // Esconde a tabela
    }
}

select.addEventListener('change',toggleTable)
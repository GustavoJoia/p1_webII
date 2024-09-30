

let submit = document.querySelector('button')
let s = document.getElementById('acao')

let idP = document.querySelector('#id').value
let nomeP = document.querySelector('#nome').value
let descP = document.querySelector('#descricao').value
let precoP = document.querySelector('#preco').value
let estoqueP = document.querySelector('#estoque').value



document.querySelector('form').addEventListener('submit', async(e)=>{
    e.preventDefault();
    let base_url = 'http://localhost:8080/produtos'
    let options_produtos

    switch (s.value) {
        case 'GET':
            options_produtos = {
                method: 'GET',
                mode: 'cors',
                headers:{
                    'Content-Type': 'application/json'
                }
            }
            break;
        case 'POST':
            let obj = {
                nomeProduto: nomeP,
                descProduto: descP,
                estoqueProduto: estoqueP,
                precoProduto: precoP
            }
            options_produtos = {
                method: 'POST',
                mode: 'cors',
                headers:{
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(obj)
            }
            break;
    
        case 'PUT':
            options_produtos = {
                method: 'PUT',
                mode: 'cors',
                headers:{
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    nomeProduto: nomeP,
                    descProduto: descP,
                    estoqueProduto: estoqueP,
                    precoProduto: precoP
                })
            }
            base_url+=`/${idP}`
            break;
        
        case 'DELETE':
            base_url+=`/${idP}`
            options_produtos = {
                method: 'DELETE',
                mode: 'cors',
                headers:{
                    'Content-Type': 'application/json'
                }
            }
            break;
    }

    fetch(base_url,options_produtos)
    .then(response=>response.json())
    .then(produtos=>{
        if(s.value=='GET'){
            console.log(produtos)
            let tabela_produtos = document.querySelector('#tabelaProdutos').children[1]
            tabela_produtos.innerHTML = ''

            produtos.forEach(produto=>{
                let tr = `<tr>
                    <td>${produto.idProduto}</td>
                    <td>${produto.nomeProduto}</td>
                    <td>${produto.descProduto}</td>
                    <td>${produto.precoProduto}</td>
                    <td>${produto.userInsert}</td>
                    <td>${produto.data_hora}</td>
                </tr>`
                tabela_produtos.insertAdjacentHTML('beforeend',tr)
            })

        } else {
            console.log(produtos)
        }
    })

})




let tabela_logs = document.querySelector('#tabelaLogs').children[1]
tabela_logs.innerHTML = ''
let logs_url = 'http://localhost:8080/logs'
let options_logs = {
    method: 'GET'
}
fetch(logs_url,options_logs)
.then(response=>response.json())
.then(logs=>{

    logs.forEach(log => {
        let tr = `<tr>
                <td>${log.idLog}</td>
                <td>${log.acaoLog}</td>"
                <td>${log.userInsert}</td>
                <td>${log.idProduto}</td>
                <td>${log.data_hora}</td>
            </tr>`
        tabela_logs.insertAdjacentHTML('beforeend',tr)
    });    

})
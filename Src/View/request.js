import dateFormat from "./dateFormat.js"
import formatarParaBRL from "./moneyFormat.js"

let submit = document.querySelector('button')
let s = document.getElementById('acao')

let idP = document.querySelector('#id')
let nomeP = document.querySelector('#nome')
let descP = document.querySelector('#descricao')
let precoP = document.querySelector('#preco')
let estoqueP = document.querySelector('#estoque')

let form = document.querySelector('form')

form.addEventListener('submit',(e)=>{
    e.preventDefault()
    

    let produtos_url = 'http://localhost:8080/produtos'
    let protudos_options

    switch (s.value) {

        case 'GET':

            if(idP.value!=''){
                produtos_url+=`/${idP.value}`
            }
            
            fetch(produtos_url)
            .then(response=>response.json())
            .then(produtos=>{

                let tabela_produtos = document.querySelector('#tabelaProdutos').children[1]
                tabela_produtos.innerHTML = ''
                try {
                    produtos.forEach(produto=>{
                        let tr = `<tr>
                            <td>${produto.idProduto}</td>
                            <td>${produto.nomeProduto}</td>
                            <td>${produto.descProduto}</td>
                            <td>${formatarParaBRL(produto.precoProduto)}</td>
                            <td>${produto.estoqueProduto}</td>
                            <td>${produto.userInsert}</td>
                            <td>${dateFormat(produto.data_hora)}</td>
                        </tr>`
                        tabela_produtos.insertAdjacentHTML('beforeend',tr)
                    })
                } catch (error) {
                    let tr = `<tr>
                            <td>${produtos.idProduto}</td>
                            <td>${produtos.nomeProduto}</td>
                            <td>${produtos.descProduto}</td>
                            <td>${formatarParaBRL(produtos.precoProduto)}</td>
                            <td>${produtos.estoqueProduto}</td>
                            <td>${produtos.userInsert}</td>
                            <td>${dateFormat(produtos.data_hora)}</td>
                        </tr>`
                    tabela_produtos.insertAdjacentHTML('beforeend',tr)
                }
                

            })
            
            break;
    

        case 'POST':

            let post_obj = {
                nomeProduto: nomeP.value,
                descProduto: descP.value,
                precoProduto: precoP.value,
                estoqueProduto: estoqueP.value
            }
            let post_options = {
                method: 'POST',
                mode: 'cors',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(post_obj)
            }

            fetch(produtos_url,post_options)
            .then(response=>response.json())
            .then(response=>{
                console.log(response)
            })

            break;

            case 'PUT':

            let put_obj = {
                nomeProduto: nomeP.value,
                descProduto: descP.value,
                precoProduto: precoP.value,
                estoqueProduto: estoqueP.value
            }
            let put_options = {
                method: 'PUT',
                mode: 'cors',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(put_obj)
            }

            produtos_url+=`/${idP.value}`

            fetch(produtos_url,put_options)
            .then(response=>response.json())
            .then(response=>{
                console.log(response)
            })

            break;

        case 'DELETE':

            let delete_options = {
                method: 'DELETE',
                mode: 'cors',
                headers:{
                    'Content-Type':'application/json'
                }
            }

            produtos_url+=`/${idP.value}`

            fetch(produtos_url,delete_options)
            .then(response=>response.json())
            .then(response=>{
                console.log(response)
            })

            break

    }


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
                <td>${log.acaoLog}</td>
                <td>${log.userInsert}</td>
                <td>${log.idProduto}</td>
                <td>${dateFormat(log.data_hora)}</td>
            </tr>`
        tabela_logs.insertAdjacentHTML('beforeend',tr)
    });    

})
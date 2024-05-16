

function openModal(){
    const dialog = document.querySelector('dialog');
    dialog.showModal();
};    

function closeModal(){
    const dialog = document.querySelector('dialog');
    dialog.close();
};  

async function addItem(idList,itemId, itemName, itemObs, itemCat, path){
    const tableBody = document.querySelector('.body');
    const min = document.getElementById('min'+itemId).value;
    const max = document.getElementById('max'+itemId).value;
    if(Number(min) <= Number(max)) {
    let dataForm = `idList=${idList}&itemId=${itemId}&min=${min}&max=${max}`;
    await fetch(path, {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dataForm
    })
    tableBody.innerHTML += `
    <tr class="table__content__row">
        <td class="table__content__row__data">
            <button disabled class="table__content__row__data__button">
                <img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/edit-icon.png" width="24" height="24" >
            </button>
            <button disabled class="table__content__row__data__button" onClick="return confirm('Você quer mesmo deletar esse item?')">
                <img src="https://icons.iconarchive.com/icons/pictogrammers/material/128/delete-alert-icon.png" width="24" height="24">
            </button>
        </td>
        <td class="table__content__row__data">${itemName}</td>
        <td class="table__content__row__data">${itemObs}</td>
        <td class="table__content__row__data">${itemCat}</td>
        <td class="table__content__row__data">❌</td>
        <td class="table__content__row__data">R$${min}</td>
        <td class="table__content__row__data">R$${max}</td>
        <td class="table__content__row__data">R$0</td>
    </tr>`
    } else {
        alert('Valor minímo maior que o máximo, cadastre os valores corretamente!')
    }
    document.getElementById('min'+itemId).value = "";
    document.getElementById('max'+itemId).value = "";
}


async function editRow(correlationId){
    let minNode = document.getElementById(`minValue${correlationId}`);
    let maxNode = document.getElementById(`maxValue${correlationId}`);
    let payedNode = document.getElementById(`payed${correlationId}`);

    if(minNode.querySelector('input') == null) {
        this.event.currentTarget.innerHTML = '<img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/save-icon.png" width="24" height="24">';
    
    
        minNode.innerHTML = `<input type="number" id="inputMin${correlationId}" value='${minNode.innerHTML.slice(2)}'/>`;
        maxNode.innerHTML = `<input type="number" id="inputMax${correlationId}" value='${maxNode.innerHTML.slice(2)}'/>`;
        payedNode.innerHTML = `<input type="number" id="inputPayed${correlationId}" value='${payedNode.innerHTML.slice(2)}'/>`;
    }else {
        this.event.currentTarget.innerHTML = '<img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/edit-icon.png" width="24" height="24">';
        await resetRow(minNode,maxNode,payedNode, correlationId);
    }

}


async function resetRow(min, max, payed, correlationId){
    let minValue = document.getElementById(`inputMin${correlationId}`).value;
    let maxValue = document.getElementById(`inputMax${correlationId}`).value;
    let payedValue = document.getElementById(`inputPayed${correlationId}`).value;

    let dataForm = `min=${minValue}&max=${maxValue}&payed=${payedValue}`;
    await fetch('http://localhost/wishmeu/public/item/edititemlist/'+correlationId, {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dataForm
    })

    
    min.innerHTML = 'R$'+minValue;
    max.innerHTML = 'R$'+maxValue;
    payed.innerHTML = 'R$'+payedValue;
}
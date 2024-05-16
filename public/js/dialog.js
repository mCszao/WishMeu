

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
    <tr class="table__content__row" id="${itemId}">
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
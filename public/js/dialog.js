

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
    const min = Number(document.getElementById('min'+itemId).value);
    const max = Number(document.getElementById('max'+itemId).value);
    
    if(min <= max) {
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
        </tr>`;
        resetFieldsItemAfterSend(itemId);
        reRenderScreen(min, max);
        document.getElementById('withoutItems').style.display = "none";
        return;
    } 
    alert('Valor minímo maior que o máximo, cadastre os valores corretamente!');
}

function resetFieldsItemAfterSend(itemFieldId){
    document.getElementById('min'+itemFieldId).value = "";
    document.getElementById('max'+itemFieldId).value = "";
}

function reRenderScreen(minItem, maxItem) {
    let totMin = Number(document.getElementById('totalMin').innerHTML);
    let totMax = Number(document.getElementById('totalMax').innerHTML);
    document.getElementById('totalMin').innerHTML = totMin+ minItem;
    document.getElementById('totalMax').innerHTML = totMax+ maxItem;
}


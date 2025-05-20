

function openModal(){
    const dialog = document.querySelector('dialog');
    dialog.showModal();
};    

function closeModal(){
    const dialog = document.querySelector('dialog');
    dialog.close();
};  

async function addItem(idList,itemId, itemName, itemObs, itemCat){
    const tableBody = document.querySelector('.body');
    const min = Number(document.getElementById('min'+itemId).value);
    const max = Number(document.getElementById('max'+itemId).value);
    
    if(min <= max) {
        let dataForm = `idList=${idList}&itemId=${itemId}&min=${min}&max=${max}`;
        await fetch('http://localhost/wishmeu/public/item/additemlist', {
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


async function filterItems(idList){
    let items = await fetch('http://localhost/wishmeu/public/item', {
            method: 'GET',
        }).then(response => response.json());
    const filteredItems = items.filter(item => item.name.toLowerCase().match(document.getElementById('search').value.toLowerCase()) || item.cat_name.toLowerCase().match(document.getElementById('search').value.toLowerCase()))
    const listItemsView = document.querySelector('.modal__ul');
    listItemsView.innerHTML = "";
    if(filteredItems.length > 0) {
        filteredItems.forEach(item => renderItemOnList(item, idList));
        return;
    }
    listItemsView.innerHTML = '<h2>Nenhum item foi encontrado</h2>';
}

function renderItemOnList(item, idList) {
    document.querySelector('.modal__ul').innerHTML += `
    <li class="modal__ul__item" id="${item.id}">
        <p class="modal__ul__item__p">
            ${item.name.length > 16  ? item.name.substring(0, 16) + '...' : item.name}
        </p>
        <div class="modal__ul__item__container">
            <label for="min_value">min R$</label>
            <input class="modal__ul__item__container__input" type="number" name="min_value" id="min${item.id}">

            <label for="max_value">max R$</label>
            <input class="modal__ul__item__container__input" type="number" name="max_value" id="max${item.id}">
            <button class="modal__ul__item__container__button" onClick="addItem('${idList}', '${item.id}','${item.name}', '${item.observations}', '${item.cat_name}')">Adicionar</button>
        </div>
    </li>
    `
}
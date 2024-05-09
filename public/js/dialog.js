

function openModal(){
    const dialog = document.querySelector('dialog');
    dialog.showModal();
};    

function closeModal(){
    const dialog = document.querySelector('dialog');
    dialog.close();
};  

async function addItem(idList,itemId, itemName, itemObs, path){
    const tableBody = document.querySelector('.body');
    let dataForm = `idList=${idList}&itemId=${itemId}`;
    let response = await fetch(path, {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dataForm
    })
    
        let json = response.json();
        console.log(json);  
    tableBody.innerHTML += `
    <tr class="table__content__row" id="${itemId}">
        <td class="table__content__row__data">${itemName}</td>
        <td class="table__content__row__data">${itemObs}</td>
        <td class="table__content__row__data">${itemObs}</td>
        <td class="table__content__row__data">0</td>
        <td class="table__content__row__data">R$0</td>
        <td class="table__content__row__data">R$0</td>
        <td class="table__content__row__data">R$0</td>
    </tr>`
}
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
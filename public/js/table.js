async function editRow(correlationId){
    let minNode = document.getElementById(`minValue${correlationId}`);
    let maxNode = document.getElementById(`maxValue${correlationId}`);
    let payedNode = document.getElementById(`payed${correlationId}`);

    if(minNode.querySelector('input') == null) {
        this.event.currentTarget.innerHTML = '<img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/save-icon.png" width="24" height="24">';
        let minIptValue = Number(minNode.innerHTML.slice(2));
        let maxIptValue = Number(maxNode.innerHTML.slice(2));
        let payedIptValue = Number(payedNode.innerHTML.slice(2));
        calculateTotals(minIptValue,maxIptValue, payedIptValue, "-");
        minNode.innerHTML = `<input type="number" id="inputMin${correlationId}" value='${minIptValue}'/>`;
        maxNode.innerHTML = `<input type="number" id="inputMax${correlationId}" value='${maxIptValue}'/>`;
        payedNode.innerHTML = `<input type="number" id="inputPayed${correlationId}" value='${payedIptValue}'/>`;
    }else {
        let minValue = Number(document.getElementById(`inputMin${correlationId}`).value);
        let maxValue = Number(document.getElementById(`inputMax${correlationId}`).value);
        if(minValue > maxValue) {
            alert('Valor minímo maior que o máximo!');
            return;
        }
        resetRow(minValue, maxValue, minNode, maxNode, payedNode, correlationId);
        this.event.currentTarget.innerHTML = '<img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/edit-icon.png" width="24" height="24">';
    }

}


async function resetRow(minValue, maxValue, min, max, payed, correlationId){
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
    calculateTotals(minValue,maxValue, payedValue, "+");
}

function calculateTotals(minItem, maxItem, payedItem, operator) {
    if(operator == "" || operator == null) {
        return;
    }
    let totMin = Number(document.getElementById('totalMin').innerHTML);
    let totMax = Number(document.getElementById('totalMax').innerHTML);
    let totPayed = Number(document.getElementById('totalPayed').innerHTML);
    switch (operator) {
        case '+':
            document.getElementById('totalMin').innerHTML = totMin + minItem;
            document.getElementById('totalMax').innerHTML = totMax + maxItem;
            document.getElementById('totalPayed').innerHTML = Number(totPayed) + Number(payedItem);
            break;
        case '-':
            document.getElementById('totalMin').innerHTML = totMin - minItem;
            document.getElementById('totalMax').innerHTML = totMax - maxItem;
            document.getElementById('totalPayed').innerHTML = totPayed - payedItem;
            break;
    }

}


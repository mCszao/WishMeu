<?php $render('header', ['title' => 'Detalhes da Lista']); ?>
<style>
.container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-left: 5%;
  margin-top: 25px;
  width: 80vw;
}
.container__header__title {
  font-size: 2.5rem;
  flex: 2 1 auto;
}

.container__header__description {
  font-size: 1.5rem;
  flex: 2 1 auto;
}

.table {
  text-align: center;
  color: white;
  box-shadow: 0 0 8px, rgba(0, 0, 0, 0.615);
}
.table__head {
  background-color:#025951;
}
.table__head__column {
  padding: 1rem;
}

.table__content {
  background-color: #034159;
}

.table__content__row {
  font-weight: 600;
}

.table__content__row__data {
  padding: 1rem;
}

.box-emptyList {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 1.5rem;
  padding: 1rem;
  font-family: Arial, Helvetica, sans-serif;
  border: 2px solid gray;
  border-radius: 1rem;
  margin: 10px auto;

  
}

.container__header {
  display: flex;
  justify-content: center;
  align-items: center;
}

.container__header__button {
  font-size: 1rem;
  border-radius: 0.2rem;
  flex: 1 1 auto;
  padding: 1rem;
  background-color: #0CF25D; 

}

.container__header__button:hover {
  cursor: pointer;
  transition: ease-in 0.2s;
  box-shadow: 5px 5px 0px 1px #000000;
}

.table__content__row__data__button{
  border-radius: 1rem;
  cursor: pointer;
}

.button-conclued:hover{
  transform: scale(1.2);
  cursor: pointer;
}


</style>

<?php $render('modal', ['items' => $items, 'list' => $idList]); ?>

<script src="<?=$base.'/js/table.js'?>"></script>

<section class="container">
  <header class="container__header">
    <a href="<?=$base."/list/copy/".$idList?>">
      <abbr title="Copiar Lista">
        <img src="https://icons.iconarchive.com/icons/custom-icon-design/mono-general-2/128/copy-icon.png" width="15" height="15">
      </abbr>
    </a>
    <h1 class="container__header__title"><?=$name?></h1>
    <button class="container__header__button open-add-item" onClick="openModal()">Adicionar Item</button>
  </header> 
  <h3 class="container__header__description"><?=$description?></h3>
  <table class="table">
    <thead class="table__head">
      <th class="table__head__column">Editar/Deletar</th>
      <th class="table__head__column">Nome</th>
      <th class="table__head__column">Observações</th>
      <th class="table__head__column">Categoria</th>
      <th class="table__head__column">Concluído</th>
      <th class="table__head__column">min</th>
      <th class="table__head__column">max</th>
      <th class="table__head__column">Pago</th>
    </thead>
    <tbody class="table__content body">
        <?php if(empty($list[0]['item_list_id'])): ?>
            <h2 id="withoutItems">Sem items</h2>
        <?php else: ?>
            <?php foreach($list as $item):   
                $totMin += $item['min_value'];
                $totMax += $item['max_value'];
                $tot += $item['payed_value'];
                $correlationId = $item['item_list_id'];
                ?>
                
                <tr class="table__content__row">
                    <td class="table__content__row__data">
                        <button class="table__content__row__data__button" onClick="editRow(<?=$correlationId?>)">
                            <img src="https://icons.iconarchive.com/icons/arturo-wibawa/akar/128/edit-icon.png" width="24" height="24" >
                        </button>
                        <a class="img-delete" id="<?=$correlationId?>" href="<?="$base/item/deleteitemlist/$correlationId"?>" onClick="return confirm('Você quer mesmo deletar esse item?')">
                            <img src="https://icons.iconarchive.com/icons/pictogrammers/material/128/delete-alert-icon.png" width="24" height="24">
                        </a>
                    </td>
                    <td class="table__content__row__data"><?=$item['item_name']?></td>
                    <td class="table__content__row__data"><?=$item['observations']?></td>
                    <td class="table__content__row__data"><?=$item['categorie_name']?></td>
                    <td class="table__content__row__data button-conclued" id="<?="conclued$correlationId"?>" onClick="toggleConclued(<?=$correlationId?>)"><?=$item['conclued'] == 0 ? '❌' : '✅'?></td>
                    <td class="table__content__row__data" id="<?="minValue$correlationId"?>">R$<?=$item['min_value']?></td>
                    <td class="table__content__row__data" id="<?="maxValue$correlationId"?>">R$<?=$item['max_value']?></td>
                    <td class="table__content__row__data" id="<?="payed$correlationId"?>">R$<?=$item['payed_value']?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>    
        <tfoot>
                <tr class="table__content__row">
                    <td class="table__content__row__data" colspan='5'></td>
                    <td class="table__content__row__data"><strong>Total min: R$</strong><i id="totalMin"><?=$totMin?></i></td>
                    <td class="table__content__row__data"><strong>Total max: R$</strong><i id="totalMax"><?=$totMax?></i></td>
                    <td class="table__content__row__data"><strong>Total Pago: R$</strong><i id="totalPayed"><?=$tot?></i></td>
                </tr>
        </tfoot> 
    </tbody>
  </table>
</section>


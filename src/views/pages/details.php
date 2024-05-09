<?php $render('header', ['title' => 'Detalhes da Lista']); ?>
<style>
.container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-left: 10%;
  
}
.container__title {
  font-size: 2rem;
}

.table {
  text-align: center;
  box-shadow: 0 0 8px, rgba(0, 0, 0, 0.615);
}
.table__head {
  background-color: #faebd79d;
}
.table__head__column {
  padding: 1rem;
}

.table__content {
  background-color: #faebd79d;
}

.table__content__row {
  font-weight: 600;
  color: #808080;
}

.table__content__row__data {
  padding: 1rem;
}

.modal {
  width: 50vw;
  max-height: 50vh;
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
</style>

<script src="<?=$base.'/js/dialog.js'?>"></script>


<dialog class="modal">
      <button class="modal__button close" onClick="closeModal()">Fechar</button>
      <ul>
        <?php foreach($items as $item): 
          $itemId = $item['id'];
          $itemName = $item['name'];
          $itemObs = $item['observations'];
          $params = "$idList, $itemId,'$itemName', '$itemObs', '$base/item/additemlist'";
          echo $params;
          ?>
          
          <li id="<?=$itemId?>" onClick="addItem(<?=$params?>)"><?=$itemName?></li>
        <?php endforeach; ?>
      </ul>
    </dialog>
<section class="container">
  <header class="container__header">
    <h1 class="container__header__title"><?=$name?></h1>
    <button class="container__header__button open-add-item" onClick="openModal()">Adicionar Item</button>
  </header> 
  <table class="table">
    <thead class="table__head">
      <th class="table__head__column">Nome</th>
      <th class="table__head__column">Observações</th>
      <th class="table__head__column">Categoria</th>
      <th class="table__head__column">Concluído</th>
      <th class="table__head__column">min</th>
      <th class="table__head__column">max</th>
      <th class="table__head__column">Pago</th>
    </thead>
    <tbody class="table__content body">
        <?php if($withoutItem): ?>
            <h2>Sem items</h2>
        <?php else: ?>
            <?php foreach($list as $item):   
                $totMin += $item['min_value'];
                $totMax += $item['max_value'];
                $tot += $item['payed_value'];
                ?>
                <tr class="table__content__row">
                    <td class="table__content__row__data"><?=$item['item_name']?></td>
                    <td class="table__content__row__data"><?=$item['observations']?></td>
                    <td class="table__content__row__data"><?=$item['categorie_name']?></td>
                    <td class="table__content__row__data"><?=$item['conclued']?></td>
                    <td class="table__content__row__data">R$<?=$item['min_value']?></td>
                    <td class="table__content__row__data">R$<?=$item['max_value']?></td>
                    <td class="table__content__row__data">R$<?=$item['payed_value']?></td>
                </tr>
            <?php endforeach; ?>
            <tfoot>
                <tr class="table__content__row">
                    <td class="table__content__row__data" colspan='4'></td>
                    <td class="table__content__row__data"><strong>Total max: R$</strong><?=$totMin?></td>
                    <td class="table__content__row__data"><strong>Total max: R$</strong><?=$totMax?></td>
                    <td class="table__content__row__data"><strong>Total Pago: R$</strong><?=$tot?></td>
                </tr>
            </tfoot>
        <?php endif;?>     
    </tbody>
  </table>
</section>


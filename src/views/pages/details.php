<?php $render('header', ['title' => 'Detalhes da Lista']); ?>
<style>
.container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-left: 5%;
  margin-top: 25px;
  
}
.container__header__title {
  font-size: 2.5rem;
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

.modal {
  border: none;
  width: 70vw;
  height: 70vh;
  background-color: #025951;
  border-radius: .2rem;
  border: 1px solid #fff;

}

.modal::backdrop{
  background-color: black;
  opacity: 0.5;

}
.modal::-webkit-scrollbar {
  display: none;
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

.modal__ul__item {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 1rem;
  width: 80%;
  max-height: 60vh;
  width: 50vw;
  margin: 0.5rem auto 0.5rem auto;
  transition: ease .2s;
  border: 1px solid #fff;
  border-radius: .2rem;
  font-weight: bold;
}

.modal__ul__item__p {
  font-size: 2rem;
  font-weight: bold;
}

.modal__ul__item__container {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  border: 1px solid #fff;
  padding: 0.5rem;

}

.modal__ul__item__container__button {
  cursor: pointer;
  background-color: #0CF25D; 
}
.modal__ul__item:hover {
  color: white;
  transform: scale(1.1);
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
.moda__title{
  margin-top: 3rem;
  font-size: 2rem;
  color: #fff;
}

.modal__button {
  position: fixed;
  border-radius: 1rem;
  padding: .5rem;
  color: red;
  font-family: monospace;
  font-weight: bold;
  font-size: 1.2rem;
}
.modal__button:hover{
  cursor: pointer;
}
</style>

<script src="<?=$base.'/js/dialog.js'?>"></script>


<dialog class="modal">
      <button class="modal__button close" onClick="closeModal()">Voltar</button>
      <h2 class="moda__title">Selecione um Item</h2>
      <ul type="none" class="modal__ul">
        <?php foreach($items as $item): 
          $itemId = $item['id'];
          $itemName = $item['name'];
          $itemObs = $item['observations'];
          $itemCat = $item['cat_name'];
          $params = "$idList, $itemId,'$itemName', '$itemObs', '$itemCat' , '$base/item/additemlist'";
          ?>
          
          <li class="modal__ul__item" id="<?=$itemId?>">
            <p class="modal__ul__item__p">
              <?=(strlen($itemName) > 16 ) ? substr($itemName, 0, 16).'...' : $itemName?>
            </p>
            <div class="modal__ul__item__container">
              <label for="min_value">min R$</label>
              <input class="modal__ul__item__container__input" type="number" name="min_value" id="min<?=$itemId?>">

              <label for="max_value">max R$</label>
              <input class="modal__ul__item__container__input" type="number" name="max_value" id="max<?=$itemId?>">
              <button class="modal__ul__item__container__button" onClick="addItem(<?=$params?>)">Adicionar</button>
            </div>
          </li>
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
                    <td class="table__content__row__data"><?=$item['conclued'] == 0 ? '❌' : '✅'?></td>
                    <td class="table__content__row__data">R$<?=$item['min_value']?></td>
                    <td class="table__content__row__data">R$<?=$item['max_value']?></td>
                    <td class="table__content__row__data">R$<?=$item['payed_value']?></td>
                </tr>
            <?php endforeach; ?>
            <tfoot>
                <tr class="table__content__row">
                    <td class="table__content__row__data" colspan='4'></td>
                    <td class="table__content__row__data"><strong>Total min: R$</strong><?=$totMin?></td>
                    <td class="table__content__row__data"><strong>Total max: R$</strong><?=$totMax?></td>
                    <td class="table__content__row__data"><strong>Total Pago: R$</strong><?=$tot?></td>
                </tr>
            </tfoot>
        <?php endif;?>     
    </tbody>
  </table>
</section>


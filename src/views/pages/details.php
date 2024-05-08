<?php $render('header', ['title' => 'Detalhes da Lista']); ?>
<style>
    .container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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



<section class="container">
  <h1 class="container__title"><?=$name?></h1> 
  <table class="table">
    <thead class="table__head">
      <th class="table__head__column">Nome</th>
      <th class="table__head__column">Observações</th>
      <th class="table__head__column">Categoria</th>
      <th class="table__head__column">min</th>
      <th class="table__head__column">max</th>
      <th class="table__head__column">Pago</th>
      <th class="table__head__column">Concluído</th>
    </thead>
    <tbody class="table__content">
        <?php if($withoutItem): ?>
            <h2>Sem items</h2>
        <?php else:?>
            <?php foreach($list as $item): ?>
                <tr class="table__content__row">
                <td class="table__content__row__data"><?=$item['item_name']?></td>
                <td class="table__content__row__data"><?=$item['observations']?></td>
                <td class="table__content__row__data"><?=$item['categorie_name']?></td>
                <td class="table__content__row__data"><?=$item['min_value']?></td>
                <td class="table__content__row__data"><?=$item['max_value']?></td>
                <td class="table__content__row__data"><?=$item['payed_value']?></td>
                <td class="table__content__row__data"><?=$item['conclued']?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif;?>     
    </tbody>
  </table>
</section>


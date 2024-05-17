
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
          $params = "$list, $itemId,'$itemName', '$itemObs', '$itemCat' , '$base/item/additemlist'";
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
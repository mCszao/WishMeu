<style>
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
.modal__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.modal__header__title{
  margin-top: 3rem;
  font-size: 2rem;
  color: #fff;
}

.modal__header__button {
  position: fixed;
  border-radius: 1rem;
  padding: .5rem;
  color: red;
  font-family: monospace;
  font-weight: bold;
  font-size: 1.2rem;
}
.modal__header__button:hover{
  cursor: pointer;
}
.modal__header__input{
  border: none;
  background-color: #fff;
  height: 1.2rem;
  width: 60%;
  border-radius: 0.5rem;
  cursor: pointer;
  padding: 1.2rem;
  font-size: 1.3rem;
  font-weight: 600;
}
.modal__header__input:focus{
  outline: none;
}
</style>
<script src="<?=$base.'/js/dialog.js'?>"></script>

<dialog class="modal">
    <header class="modal__header">
      <div>
        <button class="modal__header__button close" onClick="closeModal()">Voltar</button>
        <h2 class="modal__header__title">Selecione um Item</h2>
      </div>
      <input class="modal__header__input" placeholder="Digite o nome de um item" type="text" name="search" id="search" onKeyPress="filterItems('<?=$list?>')">
    </header>
    <ul type="none" class="modal__ul">
        <?php foreach($items as $item): 
          $itemId = $item['id'];
          $itemName = $item['name'];
          $itemObs = $item['observations'];
          $itemCat = $item['cat_name'];
          $params = "$list, $itemId,'$itemName', '$itemObs', '$itemCat'";
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
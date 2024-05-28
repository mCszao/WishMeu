DELIMITER //
CREATE PROCEDURE copy_wishlist (name_list VARCHAR(100), list_origin INT)
BEGIN
	INSERT INTO wishlists (NAME, DESCRIPTION) VALUES (name_list, 'Descrição da Lista');
	INSERT INTO itemtolists (id_list, id_item, min_value, max_value, payed_value) SELECT (SELECT id FROM wishlists WHERE NAME = name_list) id_lista, id_item item ,min_value, max_value, payed_value FROM itemtolists where id_list = list_origin;
END //
DELIMITER ;

CALL copy_wishlist('Lista copiada da lista...', id_origin);
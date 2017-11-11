DELIMITER //
CREATE TRIGGER trg_updatedStockPurchase AFTER INSERT ON purchase_details
FOR EACH ROW BEGIN
	UPDATE products SET stock = stock + NEW.quantity 
	WHERE products.id = NEW.product_id;
END
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER trg_updatedStockRecipes AFTER INSERT ON sale_details
FOR EACH ROW BEGIN
	UPDATE products SET stock = stock - NEW.quantity 
	WHERE products.id = NEW.product_id;
END
//
DELIMITER ;
-- 1. Lấy ra họ và tên của những khách hàng mua hàng trong tháng 6/2014
-- 2. Lấy ra tên thành phố của khách hàng dùng gmail
-- 3. Lấy ra email của khách hàng ở thành phố 'Beaverton'
-- 4. Lấy ra danh sách sản phẩm thuộc danh mục có tên chứa chữ 'a' và có giá lớn hơn 500$
SELECT firstName, lastName 
FROM customers
INNER JOIN orders 
ON	customers.customerID = orders.customerID
WHERE	orderDate LIKE "2014-06%"

SELECT city 
FROM addresses 
INNER JOIN customers 
ON addresses.customerID = customers.customerID 
WHERE emailAddress LIKE "%@gmail.%"

SELECT `emailAddress` 
FROM `customers` 
INNER JOIN addresses
ON customers.customerID = addresses.customerID
WHERE city ="Beaverton"


SELECT productName 
FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID
WHERE categoryName LIKE "%a%" AND listPrice > 500

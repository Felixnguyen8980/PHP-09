-- 1. Lấy sản phẩm giảm giá cao nhất
-- 2. LẤy sản phẩm có giá nhỏ nhất
-- 3. Tổng giá của những sản phẩm thuộc danh mục Guitars
-- 4. Có bao nhiêu sản phẩm thuộc danh mục Drums 
-- 5. Giá trung bình của những sản phầm danh mục Guitars
SELECT *
FROM products
WHERE discountPercent = (SELECT MAX(discountPercent) FROM products);


SELECT *
FROM products
WHERE discountPercent = (SELECT MIN(discountPercent) FROM products);

SELECT SUM(listPrice)
FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID
WHERE categoryName = 'Guitars'


SELECT SUM(listPrice)
FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID
WHERE categoryName = 'Guitars'

SELECT COUNT(productName)
FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID
WHERE categoryName = 'Drums'

SELECT AVG(listPrice)
FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID
WHERE categoryName = 'Guitars'
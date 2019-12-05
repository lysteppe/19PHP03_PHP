1. Lấy ra danh sách sản phẩm thuộc danh mục "Guitars" có gía lớn hơn 500

SELECT * FROM `categories` WHERE categoryName = "Guitars"

2. Lấy ra danh sách sản phẩm được thêm vào tháng 7/2014, có giá lớn hơn 300, 
và sắp xếp giảm dần theo giá

SELECT productName, dateAdded, listPrice
FROM products
WHERE dateAdded LIKE '2014-07%' AND listPrice >300 
ORDER BY listPrice DESC

3. Lấy ra danh sách sản phẩm mà tên có chứa chữ "o", thuộc danh mục "Basses"
sắp xếp giảm dần theo tên

SELECT productName, categoryName
FROM products, categories
WHERE productName LIKE '%o%' AND categoryName = "Basses"
ORDER BY productName DESC

4. Lấy ra danh sách sản phẩm mà khách hàng sử dụng gmail để mua

SELECT productName, emailAddress
FROM customers, products
WHERE emailAddress IS NOT NULL

5. Lấy ra danh sách sản phẩm có giá lơn hơn 300, đăng năm 2014, giới
hạn lấy 4 sản phẩm và sắp xếp theo giảm giá giảm dần

SELECT productName, listPrice, dateAdded
FROM products
WHERE listPrice > 300 AND dateAdded like '2014%'
ORDER BY listPrice DESC
limit 0 , 4

6. Lấy ra tên thành phố mà khách hàng đã mua sản phẩm "Yamaha FG700S"

SELECT city, productName
FROM addresses
WHERE 

SELECT city, productName, o.orderID, name, itemPrice, quantity
FROM customers c
   INNER JOIN orders o
      ON c.customerID = o.customerID
   INNER JOIN orderItems oi
      ON o.orderID = oi.orderID
   INNER JOIN products p
      ON oi.productID = p.productID
ORDER BY o.orderID

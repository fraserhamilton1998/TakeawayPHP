tee /mypath/log.txt;

warnings;
DROP TABLE OrderHistory;
DROP TABLE Orders;
DROP TABLE Customer;
DROP TABLE Restaurant;






CREATE TABLE Restaurant(
    RestaurantID VARCHAR(40) PRIMARY KEY,
    PointsDeliver INT,
    PointsCollection INT

)ENGINE=INNODB;

CREATE TABLE Customer (
    Username VARCHAR(10) PRIMARY KEY,
    FName VARCHAR(20),
    LName VARCHAR(20),
    Email VARCHAR(320),
    Address VARCHAR(100),
    City VARCHAR(100),
    Postcode VARCHAR(10),
    TotalPoints INT

)ENGINE=INNODB;

CREATE TABLE Orders(
    OrderNumber INT PRIMARY KEY AUTO_INCREMENT,
    RestaurantName VARCHAR(40),
    OrderPoints INT,
    OrderType VARCHAR(1),
    FOREIGN KEY (RestaurantName) REFERENCES Restaurant(RestaurantID)

)ENGINE=INNODB;

CREATE TABLE OrderHistory(
    CustomerID VARCHAR(10),
    OrderID INT,
    PRIMARY KEY (CustomerID, OrderID),
    FOREIGN KEY (CustomerID) REFERENCES Customer(Username) ,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderNumber) 

)ENGINE=INNODB;

-- Test Value

INSERT INTO Restaurant VALUES ('Pizza Tonight',10,0);
INSERT INTO Restaurant VALUES ('Himalaya',7,0);
INSERT INTO Restaurant VALUES ('Speedy Meal',5,7);
INSERT INTO Restaurant VALUES ('Burgerzilla',0,8);
INSERT INTO Restaurant VALUES ('Best Burritos',0,8);


INSERT INTO Customer VALUES ('fraserh121','Fraser','Hamilton','fraserh121@gmail.com','19 Craighlaw Avenue','Glasgow','G760ET',17);
INSERT INTO Customer VALUES ('GaryC','Gary','Craig','weementalgaz@gmail.com','20 Wee Pie Road','Glasgow','G760FF',15);
INSERT INTO Customer VALUES ('JM','Jamie','Muir','JMuir6969@btinternet.com','1 East Lothian Avenue','Edinburgh','EH112KL',18);

INSERT INTO Orders(RestaurantName,OrderPoints,OrderType)  VALUES ('Pizza Tonight',10,'D');
INSERT INTO Orders(RestaurantName,OrderPoints,OrderType) VALUES ('Best Burritos',8,'C');
INSERT INTO Orders(RestaurantName,OrderPoints,OrderType) VALUES ('Himalaya',7,'D');
INSERT INTO Orders(RestaurantName,OrderPoints,OrderType) VALUES ('Pizza Tonight',10,'D');
INSERT INTO Orders(RestaurantName,OrderPoints,OrderType) VALUES ('Burgerzilla',8,'C');
INSERT INTO Orders(RestaurantName,OrderPoints,OrderType) VALUES ('Himalaya',7,'D');

INSERT INTO OrderHistory VALUES ('fraserh121',1);
INSERT INTO OrderHistory VALUES ('GaryC',2);
INSERT INTO OrderHistory VALUES ('fraserh121',3);
INSERT INTO OrderHistory VALUES ('JM',4);
INSERT INTO OrderHistory VALUES ('JM',5);
INSERT INTO OrderHistory VALUES ('GaryC',6);

notee;

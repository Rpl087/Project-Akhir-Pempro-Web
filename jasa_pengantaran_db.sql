-- Buat tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    user_type ENUM('admin', 'member') NOT NULL
);

-- Buat tabel shipments
CREATE TABLE shipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    tracking_number VARCHAR(50) NOT NULL UNIQUE,
    status VARCHAR(50) NOT NULL,
    shipment_date DATE NOT NULL,
    sender VARCHAR(100) NOT NULL,
    receiver VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tambahkan data dummy ke tabel users
INSERT INTO users (username, password, name, email, phone, user_type)
VALUES 
('admin1', 'adminpassword1', 'Admin One', 'admin1@example.com', '1111111111', 'admin'),
('admin2', 'adminpassword2', 'Admin Two', 'admin2@example.com', '2222222222', 'admin'),
('croeroe', 'memberpassword1', 'Christian Roeroe', 'croeroe@example.com', '3333333333', 'member'),
('rlengkong', 'memberpassword2', 'Romal Lengkong', 'rlengkong@example.com', '4444444444', 'member'),
('fkoem', 'memberpassword3', 'Feykha Koem', 'fkoem@example.com', '5555555555', 'member'),
('mpalenewen', 'memberpassword4', 'Marvell Palenewen', 'mpalenewen@example.com', '6666666666', 'member');

-- Tambahkan data dummy ke tabel shipments
INSERT INTO shipments (user_id, tracking_number, status, shipment_date, sender, receiver)
VALUES 
(3, 'TRACK123', 'Shipped', '2024-06-01', 'Sender One', 'Receiver One'),
(4, 'TRACK456', 'In Transit', '2024-06-02', 'Sender Two', 'Receiver Two'),
(5, 'TRACK789', 'Delivered', '2024-06-03', 'Sender Three', 'Receiver Three'),
(6, 'TRACK101', 'Pending', '2024-06-04', 'Sender Four', 'Receiver Four');